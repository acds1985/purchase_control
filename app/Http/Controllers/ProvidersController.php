<?php

namespace PurchaseControl\Http\Controllers;

use PurchaseControl\Providers;
use Illuminate\Http\Request;
use PurchaseControl\Http\Requests\Providers as RequestsProviders;

class ProvidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers = Providers::all();

        return view('admin.providers.index', [
            'providers' => $providers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.providers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestsProviders $request)
    {
       $providerCreate = Providers::create($request->all());

       return redirect()->route('providers.edit', [
            'provider' => $providerCreate->id
        ])->with([
            'color'=>'alert-success',
            'message' => 'Fornecedor cadastrado com sucesso.'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \PurchaseControl\Providers  $providers
     * @return \Illuminate\Http\Response
     */
    public function show(Providers $providers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \PurchaseControl\Providers  $providers
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $provider = Providers::where('id', $id)->first();

        return view('admin.providers.edit',[
            'provider' => $provider
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \PurchaseControl\Providers  $providers
     * @return \Illuminate\Http\Response
     */
    public function update(RequestsProviders $request, $id)
    {
        $provider = Providers::where('id', $id)->first();;
       
        $provider->fill($request->all());

        if(!$provider->save())
        {
            return redirect()->back()->withInput()->withErrors();
        }

        return redirect()->route('providers.edit', [
            'provider' => $provider->id
        ])->with([
            'color'=>'alert-success',
            'message' => 'Fornecedor atualizado com Sucesso!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \PurchaseControl\Providers  $providers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Providers $providers)
    {
        //
    }
}
