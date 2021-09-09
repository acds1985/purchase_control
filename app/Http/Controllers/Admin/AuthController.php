<?php

namespace PurchaseControl\Http\Controllers\Admin;

use Illuminate\Http\Request;
use PurchaseControl\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function showLoginForm(){
        return view('admin.index');
    }
}
