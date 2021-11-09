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

    public function eliminar($id){
        try{
            $modelo= new \App\Models\UsersModel();

            $modelo->where('id', $id)->delete();
            //Entrego una respuesta
            $mensaje = "Usuario eliminado correctamente";
            return redirect()->to(site_url('users/list'))->with('mensaje',$mensaje);

        }catch(\Exception $error){
            $mensaje=$error->getMessage();
            return redirect()->to(site_url('users/list'))->with('mensaje',$mensaje);
        }
    }

    public function editar($id){

        $nombre=$this->request->getPost("name");
        $email=$this->request->getPost("email");
        $rol=$this->request->getPost("rol");

        // Se aplican validaciones
        if($this->validate('formularioEdicionUser')){
            try{
                //Sacar una copia de la clase
                $modelo= new \App\Models\UsersModel();

                //Armo el paquete de datos a registrar
                $datos=array(
                    "name"=>$nombre,
                    "email"=>$email,
                    "rol"=>$rol
                );

                //Agrego los datos
                $modelo->update($id, $datos);

                //Entrego una respuesta
                $mensaje = "Usuario editado correctamente";
                return redirect()->to(site_url('users/list'))->with('mensaje',$mensaje);

            }catch(\Exception $error){
                $mensaje=$error->getMessage();
                return redirect()->to(site_url('users/list'))->with('mensaje',$mensaje);
            }
        }else{
            $mensaje="Campos sin llenar mi fai";
            return redirect()->to(site_url('users/list'))->with('mensaje',$mensaje);
        }
    }
}