<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Request;
use Illuminate\Routing\Controller as BaseController;
use Session;
use App\Models\Utente;



class LoginController extends BaseController
{
    public function login()
    {
        return view('login');
    }

    public function do_login(){
        if(Session::has('user_id')){
            return redirect('/');
        }
        $error = array();
        if(!empty(Request::post('username')) && !empty(Request::post('password'))){
            $user = Utente::where('username', Request::post('username'))->first();
            if(!$user){
                $error['username'] = "Username non trovato";
            } else {
                if(!password_verify(Request::post('password'), $user->password)){
                    $error['password'] = "Password errata";
                }
            }
        } else {
            $error['username'] = "Inserisci username e password";
        }
        if(count($error) == 0){
            Session::put('user_id', $user->id);
            Session::put('username', $user->username);
            return redirect('/');
        } else {
            //dd($error);
            return redirect('login')->withInput()->withErrors($error);
        }
    }

    public function signup()
    {
        if(!Session::has('user_id')){
            return redirect('/');
        }
        return view('register');
    }

    public function check($field)
    {
        if(empty(Request::get('q'))) {
            return ['exists' => false];
        }
        if(!in_array($field, ['username', 'email'])) {
            return ['exists' => false];
        }

        $user = Utente::where($field, Request::get('q'))->first();
        return ['exists' => $user ? true : false];
    }

    public function do_signup()
    {

        
        $error = array();
    
        // Verifica l'esistenza di dati POST
        if (!empty(Request::get("username")) && !empty(Request::get("password")) && !empty(Request::get('email')) && !empty(Request::get('name')) && 
            !empty(Request::get('surname')))
        {
            
            # USERNAME
            // Controlla che l'username rispetti il pattern specificato
            if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $_POST['username'])) {
                $error['username'] = "Username non valido";
            } else {
                if(Utente::where('username', Request::get('username'))->first())
                {
                    dd(Utente::where('username', Request::get('username'))->first());
                    $error['username'] = "Username già utilizzato";
                }
            }
            # PASSWORD
            if (strlen(Request::get("password")) < 8) {
                $error['password'] = "Caratteri password insufficienti";
            } 
            # EMAIL
            if (!filter_var(Request::get('email'), FILTER_VALIDATE_EMAIL)) {
                $error['email'] = "Email non valida";
            } else {
                if(Utente::where('email', Request::get('email'))->first())
                {
                    $error['email'] = "Email già utilizzata";
                }
            }
    

            # REGISTRAZIONE NEL DATABASE
            if (count($error) == 0) {
                
                $user = Utente::where('username', request('username'))->first();

                if($user){
                    return;
                }

                
    
                $user = new Utente;
                $user->name = Request::get('name');
                $user->surname = Request::get('surname');
                $user->email = Request::get('email');
                $user->username = Request::get('username');
                $user->password = password_hash(request('password'), PASSWORD_BCRYPT);
                
                $user->save();
                Session::put('user_id', $user->id);

                return redirect('/login');
            }

        }
        else {
            $error[] = "Compila tutti i campi";
        }
        return redirect('register')->withInput()->withErrors($error);
    }


    public function logout()
    {
        Session::flush();
        return redirect('/');
    }
}
