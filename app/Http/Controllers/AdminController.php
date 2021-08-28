<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.admin_dashboard');
    }
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            //dd($request->all());
            $credentials = [
                'email' => $request->email,
                'password' => $request->password
            ];
            if (Auth::guard('admin')->attempt($credentials)) {
                return redirect()->route('dashboard');
            } else {
                $this->setError('Credentials does not match');
                redirect()->back();
            }
        }
        return view('admin.admin_login');
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        $this->setSuccess('You have been Logged Out');
        return redirect()->route('login');
    }
}