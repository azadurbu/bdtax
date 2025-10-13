<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\User;
use Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth/login');
    }


    public function submit(Request $request)
    {

    	$validator = $this->_validateuser($request->all());
    	if ($validator->fails()) {
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
        }
        //echo Hash::make($request->password);
        //exit();
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
        	$id = Auth::user()->role_id;
        	if($id==1 || $id==5){
        		return redirect()->intended('individual/order');
        	}

        	$this->_getlogout();

        	return redirect('/')->withSucess('Error',1);
            // Authentication passed...
            
        }

        return redirect('/')->withSucess('Error',1);
    }

    /* Private  function that perform  valiadation */

    private function _validateuser($requestData) {

        return Validator::make($requestData, [
                    
                    'email' => 'required|string|email',
                    'password' => 'required',
        ]);

       
        
    }

    public function logout() {
        $this->_getlogout();
        return redirect()->intended('/');
    }

    private function _getlogout() {
        Session::flush();
        Auth::logout();
        
    }
}
