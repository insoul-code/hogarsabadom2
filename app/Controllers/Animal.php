<?php

namespace App\Controllers;

use App\Models\AnimalModelo;

class Animal extends BaseController{
    
    public function index(){
        return view('registroAnimal');
    }

    public function registrarAnimal(){

        //1. Recibir los datos del formulario
        $nombre=$this->request->getPost("nombre");
        $foto=$this->request->getPost("foto");
        $edad=$this->request->getPost("edad");
        $tipo=$this->request->getPost("tipo");
        $descripcion=$this->request->getPost("descripcion");

        // Se aplican validaciones
        if($this->validate('formularioAnimal')){
            try{
                //Sacar una copia de la clase
                $modelo=new AnimalModelo();

                //Armo el paquete de datos a registrar
                $datos=array(
                    "nombre"=>$nombre,
                    "foto"=>$foto,
                    "edad"=>$edad,
                    "tipo"=>$tipo,
                    "descripcion"=>$descripcion
                );

                //Agrego los datos
                $modelo->insert($datos);

                //Entrego una respuesta
                $mensaje = "Animal agregado correctamente";
                return redirect()->to(site_url('/animales'))->with('mensaje',$mensaje);

            }catch(\Exception $error){
                $mensaje=$error->getMessage();
                return redirect()->to(site_url('/animales'))->with('mensaje',$mensaje);
            }
        }else{
            $mensaje="Campos sin llenar mi fai";
            return redirect()->to(site_url('/animales'))->with('mensaje',$mensaje);
        }
    }

    public function buscarAnimal(){
        try{
            $modelo= new AnimalModelo();

            $resultado = $modelo->findAll();

            $animales=array("animales"=>$resultado);
            return view('listaAnimales', $animales);

        }catch(\Exception $error){
            $mensaje=$error->getMessage();
            return redirect()->to(site_url('/listaAnimales'))->with('mensaje',$mensaje);
        }
    }

    public function eliminar($id){
        try{
            $modelo=new AnimalModelo();

            $modelo->where('id', $id)->delete();
            //Entrego una respuesta
            $mensaje = "Animal eliminado correctamente";
            return redirect()->to(site_url('/animales/listado'))->with('mensajeCorrect',$mensaje);

        }catch(\Exception $error){
            $mensaje=$error->getMessage();
            return redirect()->to(site_url('/animales/listado'))->with('mensajeIncorrect',$mensaje);
        }
    }

    public function editar($id){

        $nombre=$this->request->getPost("nombre");
        $edad=$this->request->getPost("edad");

        // Se aplican validaciones
        if($this->validate('formularioEdicionAnimal')){
            try{
                //Sacar una copia de la clase
                $modelo=new AnimalModelo();

                //Armo el paquete de datos a registrar
                $datos=array(
                    "nombre"=>$nombre,
                    "edad"=>$edad
                );

                //Agrego los datos
                $modelo->update($id, $datos);

                //Entrego una respuesta
                $mensaje = "Animal editado correctamente";
                return redirect()->to(site_url('/animales/listado'))->with('mensajeCorrect',$mensaje);

            }catch(\Exception $error){
                $mensaje=$error->getMessage();
                return redirect()->to(site_url('/animales/listado'))->with('mensajeIncorrect',$mensaje);
            }
        }else{
            $mensaje="Campos sin llenar mi fai";
            return redirect()->to(site_url('/animales/listado'))->with('mensaje',$mensaje);
        }
    }

<<<<<<< HEAD
    public function filtro_animal(){
        $filtro=$this->request->getPost("tipo");
       
        $modelo= new AnimalModelo();

        $resultado = $modelo->where('tipo', $filtro)
               ->findAll();

        $animales=array("animales"=>$resultado);
        return view('listaAnimales', $animales);
    }

    public function buscar_animales_filtro($tipo){
        try{
            $modelo= new AnimalModelo();

            $resultado = $modelo->where('tipo', $tipo)
                   ->findAll();

            $animales=array("animales"=>$resultado);
            return view('listaAnimales', $animales);

        }catch(\Exception $error){
            $mensaje=$error->getMessage();
            return redirect()->to(site_url('/listaAnimales'))->with('mensaje',$mensaje);
        }
    }

=======
    public function editarNotes($id){

        $descripcion=$this->request->getPost("descripcion");

        // Se aplican validaciones
        if($this->validate('formularioEdicionNotes')){
            try{
                //Sacar una copia de la clase
                $modelo=new AnimalModelo();

                //Armo el paquete de datos a registrar
                $datos=array(
                    "descripcion"=>$descripcion
                );

                //Agrego los datos
                $modelo->update($id, $datos);

                //Entrego una respuesta
                $mensaje = "Nota agregada correctamente";
                return redirect()->to(site_url('/animales/listado'))->with('mensajeCorrect',$mensaje);

            }catch(\Exception $error){
                $mensaje=$error->getMessage();
                return redirect()->to(site_url('/animales/listado'))->with('mensajeIncorrect',$mensaje);
            }
        }else{
            $mensaje="Campos sin llenar mi fai";
            return redirect()->to(site_url('/animales/listado'))->with('mensaje',$mensaje);
        }
    }
>>>>>>> fe6c86559351ed0e0f72719c2d99fe4ab9e90968
}


