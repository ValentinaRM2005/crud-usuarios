<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrudController extends Controller
{
    public function index(){
        $datos = DB::select(" select * from usuario ");
        return view("welcome")-> with("datos", $datos);
    }

    public function create(Request $request){
        try {
            $sql = DB::insert("insert into usuario(id_usuario, nombres, apellidos, email, clave) values(?, ?, ?, ?, ?)", [
                $request->AgregarIdUsuario,
                $request->AgregarNombres,
                $request->AgregarApellidos,
                $request->AgregarUsuario,
                $request->AgregarClave
            ]);
        } catch (\Throwable $th) {
            $sql = 0;
        }
        if($sql == true){
            return back()->with("Correcto", "Usuario agregado correctamente");
        }
        else{
            return back()->with("Incorrecto", "Error al agregar el usuario"); 
        }
    }

    public function update(Request $request){
        try {
            $sql = DB::update("update usuario set nombres=?, apellidos=?, email=?, clave=? where id_usuario=?",[
                $request->EditarNombres,
                $request->EditarApellidos,
                $request->EditarUsuario,
                $request->EditarClave,
                $request->EditarIdUsuario
            ]);
            //Evita que salga error si se envía el formulario sin modificar nada
            if ($sql == 0) {
                $sql = 1;
            }
        } catch (\Throwable $th) {
            $sql = 0;
        }
        if($sql == true){
            return back()->with("Correcto", "Usuario editado correctamente");
        }
        else{
            return back()->with("Incorrecto", "Error al editar el usuario"); 
        }
        
    }

    public function delete($id){
        try {
            $sql = DB::delete("delete from usuario where id_usuario=$id");
        } catch (\Throwable $th) {
            $sql = 0;
        }
        if($sql == true){
            return back()->with("Correcto", "Usuario eliminado correctamente");
        }
        else{
            return back()->with("Incorrecto", "Error al eliminar el usuario"); 
        }
    }
}
