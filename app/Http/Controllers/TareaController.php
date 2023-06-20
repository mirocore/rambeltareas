<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $listado = Tarea::all();

            return response()->json([
                "data" => $listado
            ]);
        }catch(\Throwable $th){
            // Lanzar error
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $nuevaTarea = Tarea::create( $request->input() );

            return response()->json([
                "mensaje" => "Tarea creada exitósamente",
                "data" => $nuevaTarea
            ]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Tarea $tarea)
    {
        try {
            return response()->json([
                "data" => $tarea
            ]);
        } catch (\Throwable $th) {
            //throw $th;
        }
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarea $tarea)
    {
        try {
            $tarea->update($request->input());
            return response()->json([
                "mensaje" => "Tarea editada exitosamente",
                "data" => $tarea
            ]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarea $tarea)
    {
        try{
            $tarea->delete();
            return response()->json([
                "mensaje" => "Tarea eliminada exitosamente",
                "data" => $tarea
            ]);
        }catch(\Throwable $th){

        }
    }


    public function cambiarEstado(Tarea $tarea){
        try {
            if($tarea["estado"] === 1){
                $nuevoEstado = 0;
            }else if($tarea["estado"] === 0){
                $nuevoEstado = 1;
            }
            
            $tarea["estado"] = $nuevoEstado;
            $tarea->save();

            return response()->json([
                "data" => $tarea
            ]);
        } catch (\Throwable $th) {
            //throw $th;
        };
    }
}
