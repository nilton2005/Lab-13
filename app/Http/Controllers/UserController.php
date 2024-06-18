<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\support\Facades\Mail;
use Illuminate\support\Str;



class UserController extends Controller
{
    //middleware de seguridad
    public function __construct(){
        $this->middleware('guest')->except(['getLogout']);
    }

    public function getLogin(){
        return view('prestamos/users.login');
    }

    public function postLogin(Request $request){
        // Validacion
        $rules = [
            'email' => 'required|email',
            'password' => 'required| min:5',
        ];
        // messages

        $message = [
            'email.required'=>'El correo es obligatario',
            'email.email' => 'Deve ser un correo válido',
            'password.required' => 'La contraseña es obligatorio',
            'password.min' => 'La contraseña deve ser igual o mayor a 5',

        ];

        // Validation
         
        $validator = Validator :: make($request->all(),$rules,$message);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'se ha producido un error')->with('typealert','danger');
        else:
            if(Auth::attempt(['email'=>$request->input('email'), 'password' => $request->input('password')],true)):
                return redirect('prestamos/create');
            else:
                return back()->with('message','El usuario no existe o contraseña erronea')->with('typealert','danger');
            endif;
        endif;
    }

    public function getRegister(){
        return view('prestamos.users/register');
    }

    public function postRegister(Request $request){
        //reglas de validacion
        $rules = [
            'name' =>'required|max:50',
            'dni' =>'required|integer| min:8',
            'email' =>'required|email|unique:App\User,email',
            'password' =>'required | min:5',
            'cpassword' =>'required|min:5|same:password',
            'direccion'=>'required'
        ];

        //mensajes de error
        $messages = [
            'name.required' => 'Su nombre es necesario.',
            'name.max' => 'El nombre debe tener maximo 20 caracteres.',
            'dni.required' => 'El DNI es importante',
            'dni.integer' => 'El dni es un numero',
            'dni.min' =>'El deve  ser un dni válido',
            'email.required' => 'El email es obligatorio.',
            'email.email' => 'Asegurese de poner xxx@gmail.com.',
            'email.unique' => 'El email ya existe.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener minimo 5 caracteres.',
            'cpassword.required' => 'La confirmacion de contraseña es obligatoria.',
            'cpassword.same' => 'Las contraseñas no coinciden.',
            'direccion.required' => 'Direccion es obligatoria',
        ];



        $validator = Validator::make($request->all(),$rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger');
        else:
            $user = new User;
            $user->name = e($request->input('name'));
            $user->email = e($request->input('email'));
            $user->dni = e($request->input('dni'));
            $user->direccion = e($request->input('direccion'));
            $user->password = Hash::make($request->input('password'));
           
            if ($user->save()):
                return redirect('prestamos/create/login')->with('message', 'Usuario registrado correctamente')->with('typealert','success');
            endif;
        endif;
    }

    public function getLogout(){
        Auth::logout();
        return redirect('/prestamos');
    }



}
