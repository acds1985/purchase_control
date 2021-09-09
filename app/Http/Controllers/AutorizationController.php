<?php

namespace PurchaseControl\Http\Controllers;

use PurchaseControl\Autorization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PurchaseControl\Branches;
use PurchaseControl\Clients;
use PurchaseControl\Http\Requests\Autorization as RequestsAutorization;
use PurchaseControl\Providers;

class AutorizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $autorizations = Autorization::all();

        return view('admin.autorization.index', [
            'autorizations' => $autorizations
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Clients::all();
        $branches = Branches::all();
        $providers = Providers::all();

        return view('admin.autorization.create',[
           'clients' =>$clients,
           'branches' => $branches,
           'providers' => $providers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestsAutorization $request)
    {
        $autorizationCreate = Autorization::create($request->all());
        /*
        $autori =  new Autorization();
        $autori->fill($request->all());

        var_dump($autori->getAttributes());
        exit;*/
        return redirect()->route('autorization.index',[

        ])->with([
            'color' => 'alert-success',
            'message' => 'Autorizacao de fornecimento criada com sucesso, aguarde liberacao.'
        ]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \PurchaseControl\Autorization  $autorization
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $autorization = Autorization::where('id',$id)->first();
        
        return view('admin.autorization.profile',[
            'autorization' =>$autorization
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \PurchaseControl\Autorization  $autorization
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \PurchaseControl\Autorization  $autorization
     * @return \Illuminate\Http\Response
     */
    public function update(RequestsAutorization $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \PurchaseControl\Autorization  $autorization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Autorization $autorization)
    {
        //
    }

    public function inative($id)
    {
        if($autorization = Autorization::where('id', $id)->first()){
            
            $autorization->status = 3;
            if($autorization->save()){
                return redirect()->route('autorization.index')->with([
                    'color' => 'alert-success',
                    'message' => 'AF cancelada com sucesso.'
                ]);
            }else{
                return redirect()->route('autorization.index')->with([
                    'color' => 'alert-danger',
                    'message' => 'Não foi possivel inativar esta AF.'
                ]);
            }            
        }else{
            return redirect()->route('autorization.index')->with([
                'color' => 'alert-danger',
                'message' => 'A AF que vc está tentando acessar não existe.'
            ]);
        }
    }

    public function autorize_form($id)
    {
        return view('admin.autorization.autorize',[
            'id'=>$id
        ]);
    }

    public function autorize($id)
    {
        if($autorization = Autorization::where('id', $id)->first()){
            
            if(empty($autorization->token)){
                $token = rand(1000,9999);
                $autorization->token = $token;
                $autorization->save();
                
                Mail::send('admin.autorization.email', [
                    'af' => $autorization->id,
                    'token' => $autorization->token,
                    'user' => Auth::user()->name],
                    function ($message) {
                    $message->from('no-reply@exsfood.com.br', 'no-reply');
                    $message->to(Auth::user()->email, Auth::user()->name);
                    $message->subject('Token de Aprovação');
                    
                });
                
                return redirect()->route('autorization.autorize_form', [
                    'id' => $id
                ])->with([
                    'color' => 'alert-success',
                    'message' => 'Token enviado, verifique seu e-mail.'
                ]);
            }else{
                return redirect()->route('autorization.autorize_form', [
                    'id' => $id,
                    'token' => true
                ])->with([
                    'color' => 'alert-danger',
                    'message' => 'Token já enviado, verifique o seu e-mail.'
                ]);
            }       
            
        }else{
            return redirect()->route('autorization.index')->with([
                'color' => 'alert-danger',
                'message' => 'A AF que vc está tentando acessar não existe.'
            ]);
        }
    }

    public function confirm(Request $request)
    {
        $id = request('id');

        $autorization = Autorization::where('id', $id)->first();
        
        if($autorization->token === request('token'))
        {
            $autorization->status = 1;
            $autorization->authorized_by = Auth::user()->name;
            $autorization->authorized_in = date('Y-m-d');
            $autorization->save();

            return redirect()->route('autorization.index', [
               
            ])->with([
                'color' => 'alert-success',
                'message' => 'AF autorizada com sucesso!.'
            ]);

        }else{
            return redirect()->route('autorization.autorize_form', [
                'id' => $id
            ])->with([
                'color' => 'alert-danger',
                'message' => 'Token Errado, verifique seu e-mail.'
            ]);
        }
              
    }
}
