<?php

namespace App\Controllers;

class Users extends BaseController
{
    public function index()
    {
        $userModel = new \App\Models\UsersModel();
        $loggedUserID= session()->get('loggedUser');
        $userInfo = $userModel->find($loggedUserID);
        $data = [
            'title'=>'Users',
            'userInfo'=>$userInfo
        ];
        return view('users/index', $data);
    }

    function profile(){
        $userModel = new \App\Models\UsersModel();
        $loggedUserID= session()->get('loggedUser');
        $userInfo = $userModel->find($loggedUserID);
        $data = [
            'title'=>'Profile',
            'userInfo'=>$userInfo
        ];
        return view('users/profile', $data);
    }

    public function buscarUsers(){
        try{
            $modelo= new \App\Models\UsersModel();
            $rolLogged= session()->get('rolLogged');
            $rol = $modelo->find($rolLogged);
            $data = [
                'title'=>'Users',
                'userRol'=>$rol
            ];
            $resultado = $modelo->findAll();

            $users=array("users"=>$resultado);
            return view('users/list', $users, $data);

        }catch(\Exception $error){
            $mensaje=$error->getMessage();
            return redirect()->to(site_url('users/list'))->with('mensaje',$mensaje);
        }
    }
}