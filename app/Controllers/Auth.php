<?php

namespace App\Controllers;
use App\Libraries\Hash;

class Auth extends BaseController{
    
    public function __construct()
    {
        helper(['url','form']);
    }
    public function index(){
        return view('auth/login');
    }

    public function register(){
        return view('auth/register');
    }
    public function save(){
        // $validation = $this->validate([
        //     'name'=>'required',
        //     'email'=>'required|valid_email|is_unique[users.email]',
        //     'pass'=>'required|min_length[5]|max_length[12]',
        //     'cpass'=>'required|min_length[5]|max_length[12]|matches[pass]'
        // ]);
        
        $validation = $this->validate([
            'name'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'Nombre completo es requerido'
                ]
                ],
            'email'=>[
                'rules'=>'required|valid_email|is_unique[users.email]',
                'errors'=>[
                    'required'=>'Correo electrónico es requerido',
                    'valid_email'=>'Debes ingresar un correo valido',
                    'is_unique'=>'El correo ya tiene una cuenta'
                ]
                ],
            'pass'=>[
                'rules'=>'required|min_length[5]|max_length[12]',
                'errors'=>[
                    'required'=>'Contraseña es requerida',
                    'min_length'=>'Debe contener almenos 5 carácteres',
                    'max_length'=>'No Debe contener más de 12 carácteres'
                ]
                ],
            'cpass'=>[
                'rules'=>'required|min_length[5]|max_length[12]|matches[pass]',
                'errors'=>[
                    'required'=>'Contraseña confirmada es requerida',
                    'min_length'=>'Debe contener almenos 5 carácteres',
                    'max_length'=>'No Debe contener más de 12 carácteres',
                    'matches'=>'Las contraseñas deben coincidir'
                ]
                ],
        ]);

        if(!$validation){
            return view('auth/register', ['validation'=>$this->validator]);
        }else{
            $name = $this->request->getPost('name');
            $email = $this->request->getPost('email');
            $pass = $this->request->getPost('pass');
            $rol = "user";

            $values = [
                'name'=>$name,
                'email'=>$email,
                'password'=>Hash::make($pass),
                'rol'=> $rol
            ];

            $usersModel = new \App\Models\UsersModel();
            $query = $usersModel->insert($values);
            if(!$query){
                return redirect()->back()->with('fail', '¡Algo salió mal!');
                // return redirect()->to('register')->with('fail', '¡Algo salió mal!');
            }else{
                // return redirect()->to('auth/register')->with('success', '¡Genial, te haz registrado!');
                $last_id = $usersModel->insertID();
                $user_name = $values['name'];
                session()->set('loggedUser', $last_id);
                session()->set('nameLogged', $user_name);
                return redirect()->to('/');
            }
        }
    }

    function check(){
        $validation = $this->validate([
            'email'=>[
                'rules'=>'required|valid_email|is_not_unique[users.email]',
                'errors'=>[
                    'required'=>'El correo electrónico es requerido',
                    'valid_email'=>'Ingrese un correo valido',
                    'is_not_unique'=>'Este correo electrónico no está registrado'
                ]
                ],
            'pass'=>[
                'rules'=>'required|min_length[5]|max_length[12]',
                'errors'=>[
                    'required'=>'Contraseña es requerida',
                    'min_length'=>'Debe contener almenos 5 carácteres',
                    'max_length'=>'No Debe contener más de 12 carácteres'
                ]
                ],
        ]);

        if(!$validation){
            return view('auth/login',['validation'=>$this->validator]);
        }else{
            $email = $this->request->getPost('email');
            $pass = $this->request->getPost('pass');
            $usersModel = new \App\Models\UsersModel();
            $user_info = $usersModel->where('email', $email)->first();
            $check_password = Hash::check($pass, $user_info['password']);

            if(!$check_password){
                session()->setFlashdata('fail', 'Contraseña incorrecta');
                return redirect()->to('/auth')->withInput();
            }else{
                $user_id = $user_info['id'];
                $user_rol = $user_info['rol'];
                $user_name = $user_info['name'];
                session()->set('loggedUser', $user_id);
                session()->set('rolLogged', $user_rol);
                session()->set('nameLogged', $user_name);
                return redirect()->to('/');
            }
        }
    }

    function logout(){
        if(session()->has('loggedUser')){
            session()->remove('loggedUser');
            session()->remove('rolLogged');
            return redirect()->to('/auth?access=out')->with('fail','Haz cerrado sesión');
        }
    }
}