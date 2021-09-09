<?php

namespace PurchaseControl\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PurchaseControl\Autorization;
use PurchaseControl\Clients;
use PurchaseControl\User;

class AuthController extends Controller
{
    public function showLoginForm(){
        if(Auth::check() === true)
        {
            return redirect()->route('home');
        }
        return view('admin.index');
    }

    public function home()
    {
        $autorizations = Autorization::limit(5)->orderBy('id','desc')->get();
        $total_afs = Autorization::count();
        $total_autizadas = Autorization::where('status',1)->sum('price');

        //clients
        $clientes = Clients::count();

        //ticket
        $ticket = $total_autizadas / $clientes;

        return view('admin.dashboard', [
            'autorizations'=> $autorizations,
            'total' => $total_afs,
            'total_autorizadas' => $total_autizadas,
            'clients' => $clientes,
            'ticket' => $ticket
        ]);
    }

    public function login(Request $resquest)
    {
        if(in_array('',$resquest->only('email', 'password')))
        {
            $json['type'] = "error";
            $json['message'] = $this->message->error('Opa, informe todos os dados para logar!')->render();
            return response()->json($json);
        }

        if(!filter_var($resquest->email, FILTER_VALIDATE_EMAIL))
        {
            $json['type'] = "error";
            $json['message'] = "Opa, E-mail invalido!";
            return response()->json($json);
        }

        $credentials = [
            'email'=> $resquest->email,
            'password'=> $resquest->password,
            'status' => 1
        ];


        if(!Auth::attempt($credentials))
        {
            $json['type'] = "error";
            $json['message'] = "Opa, verifique seus dados ou contate o Administrador!";
            return response()->json($json);
        }

        $this->authenticated($resquest->getClientIp());
        $json['redirect']= route('home');
        return response()->json($json);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function authenticated(string $ip)
    {
        $user = User::where('id', Auth::user()->id);
        $user->update([
            'last_login_at' => date('Y-m-d H:i:s'),
            'last_login_ip' => $ip
        ]);
    }
}
