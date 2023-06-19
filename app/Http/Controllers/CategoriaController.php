<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            "data" => Categoria::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // VALIDAR SI LLEGA EL NOMBRE
       // $request->validate(Categoria::$rules, Categoria::$messages);

       // INSERTO REGISTRO NUEVO
       $nuevaCategoria = Categoria::create($request->input());

        return response()->json([
            "mensaje" => "Categoría creada exitosamente",
            "data" => $nuevaCategoria
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        return response()->json([
            "data" => $categoria
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        try {
            $categoriaNueva = $categoria->update($request->input());

            return response()->json([
                "mensaje" => "Categoría editada exitosamente",
                "data" => $categoria
            ]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        try {
            $categoria->delete();
            return response()->json([
                "estado" => 200,
                "mensaje" =>  "Categoria eliminada exitósamente",
                "data" => $categoria
            ]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
