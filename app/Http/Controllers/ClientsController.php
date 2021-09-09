<?php

namespace PurchaseControl\Http\Controllers;

use PurchaseControl\Clients;
use Illuminate\Http\Request;
use PurchaseControl\Autorization;
use PurchaseControl\Http\Requests\Clients as RequestsClients;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Clients::all();
        return view('admin.clients.index',[
            'clients'=>$clients
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestsClients $request)
    {
        $clientsCreate = Clients::create($request->all());
        
        return redirect()->route('clients.edit', [
            'client' => $clientsCreate->id
        ])->with([
            'color'=>'alert-success',
            'message' => 'Cliente Cadastrado com Sucesso!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \PurchaseControl\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client =  Clients::where('id', $id)->first();
        $autorizations = Autorization::where('client', $id)->get();

        return view('admin.clients.profile',[
            'client' => $client,
            'autorizations' => $autorizations
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \PurchaseControl\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client =  Clients::where('id', $id)->first();

        return view('admin.clients.edit', [
            'client' => $client
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \PurchaseControl\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function update(RequestsClients $request, $id)
    {
        $client = Clients::where('id', $id)->first();;
       
        $client->fill($request->all());

        if(!$client->save())
        {
            return redirect()->back()->withInput()->withErrors();
        }

        return redirect()->route('clients.edit', [
            'client' => $client->id
        ])->with([
            'color'=>'alert-success',
            'message' => 'Cliente Atualizado com Sucesso!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \PurchaseControl\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clients $clients)
    {
        //
    }
}
