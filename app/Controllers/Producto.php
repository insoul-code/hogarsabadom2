<?php

namespace App\Controllers;

use App\Models\ProductoModelo;

class Producto extends BaseController{
    
    public function index(){
        return view('registroProducto');
    }

    public function registrar(){

        //1. Recibir los datos del formulario
        $product=$this->request->getPost("product");
        $photo=$this->request->getPost("photo");
        $price=$this->request->getPost("price");
        $type=$this->request->getPost("type");
        $description=$this->request->getPost("description");

        // Se aplican validaciones
        if($this->validate('formularioProducto')){
            try{
                //Sacar una copia de la clase
                $modelo=new ProductoModelo;

                //Armo el paquete de datos a registrar
                $datos=array(
                    "nombre"=>$product,
                    "foto"=>$photo,
                    "precio"=>$price,
                    "tipo"=>$type,
                    "descripcion"=>$description
                );

                //Agrego los datos
                $modelo->insert($datos);

                //Entrego una respuesta
                $mensaje = "Producto agregado correctamente";
                return redirect()->to(site_url('/productos'))->with('mensaje',$mensaje);

            }catch(\Exception $error){
                $mensaje=$error->getMessage();
                return redirect()->to(site_url('/productos'))->with('mensaje',$mensaje);
            }
        }else{
            $mensaje="Campos sin llenar mi fai";
            return redirect()->to(site_url('/productos'))->with('mensaje',$mensaje);
        }
    }

    public function buscar(){
        try{
            $modelo= new ProductoModelo();

            $resultado = $modelo->findAll();

            $productos=array("productos"=>$resultado);
            return view('listaProductos', $productos);

        }catch(\Exception $error){
            $mensaje=$error->getMessage();
            return redirect()->to(site_url('/productos'))->with('mensaje',$mensaje);
        }
    }

    public function eliminar($id){
        try{
            $modelo=new ProductoModelo;

            $modelo->where('id', $id)->delete();
            //Entrego una respuesta
            $mensaje = "Producto eliminado correctamente";
            return redirect()->to(site_url('/productos/listado'))->with('mensajeCorrect',$mensaje);

        }catch(\Exception $error){
            $mensaje=$error->getMessage();
            return redirect()->to(site_url('/productos/listado'))->with('mensajeIncorrect',$mensaje);
        }
    }

    public function editar($id){
        //1. Recibir los datos del formulario
        $product=$this->request->getPost("product");
        $price=$this->request->getPost("price");
        $type=$this->request->getPost("tipo");
        $description=$this->request->getPost("descripcion");

        // Se aplican validaciones
        if($this->validate('formularioEdicion')){
            try{
                //Sacar una copia de la clase
                $modelo=new ProductoModelo;

                //Armo el paquete de datos a registrar
                $datos=array(
                    "nombre"=>$product,
                    "precio"=>$price,
                    "tipo"=>$type,
                    "descripcion"=>$description
                );

                //Agrego los datos
                $modelo->update($id, $datos);

                //Entrego una respuesta
                $mensaje = "Producto editado correctamente";
                return redirect()->to(site_url('/productos/listado'))->with('mensajeCorrect',$mensaje);

            }catch(\Exception $error){
                $mensaje=$error->getMessage();
                return redirect()->to(site_url('/productos/listado'))->with('mensajeIncorrect',$mensaje);
            }
        }else{
            $mensaje="Campos sin llenar mi fai";
            return redirect()->to(site_url('/productos'))->with('mensaje',$mensaje);
        }
    }

    public function filtro_producto(){
        $filtro=$this->request->getPost("tipo");
       
        $modelo= new ProductoModelo();

        $resultado = $modelo->where('tipo', $filtro)
               ->findAll();

            $productos=array("productos"=>$resultado);
            return view('listaProductos', $productos);
    }
}
