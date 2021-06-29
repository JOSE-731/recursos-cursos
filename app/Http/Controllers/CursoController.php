<?php

namespace App\Http\Controllers;

use App\Curso;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Obtenemos el campo search que tiene los datos que se van a buscar
        //Metodo trim para borrar los espacios
        $data = trim($request->get('search'));

        //Se usa like para coincidencias 
        $cursos = DB::table('cursos')
                      ->select('nombre_curso', 'imagen', 'direccion_url', 'idioma')
                      ->where('nombre_curso', 'LIKE', '%'.$data.'%')->get();

        // //Obtengo el nombre, imagen url y idioma de el curso
        // $cursos = DB::table('cursos')->select('nombre_curso', 'imagen', 'direccion_url', 'idioma')->get();

        return view('index', compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cursos = DB::table('cursos')->select('id', 'nombre_curso', 'direccion_url')->get();
        $categorias = DB::table('categorias')->select('id', 'nombre_categoria')->get();

        return view('create', compact('categorias', 'cursos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          //Creamos una variable y le pasamos lo que traemos por reques

        //$datosEmpleados=request()->all();
        $datosCursos=request()->except('_token');

        //Guardar la imagen

        if($request->hasFile('imagen')){
            $datosCursos['imagen']=$request->file('imagen')->store('uploads', 'public');
        }
     
        //Guardamos en la bd los valores que treamoes por request
        Curso::insert($datosCursos);
     

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function show(Curso $curso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function edit(Curso $curso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Curso $curso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curso $curso)
    {
        $curso->delete();
        return back();
    }

    public function frontend (Request $request){

        $data = trim($request->get('search'));

        $frontend = DB::table('cursos')
                        ->select('nombre_curso', 'imagen', 'direccion_url', 'idioma')
                        ->where('id_categoria', '=', 1, 'AND', 'nombre_curso', 'LIKE', '%'.$data.'%')
                        ->Where('nombre_curso', 'LIKE', '%'.$data.'%')
                        ->get();

                        //->where('nombre_curso', 'LIKE', '%'.$data.'%')->get();

        return view('frontend', ['frontend' => $frontend]);
    }

    public function backend (Request $request){

        $data = trim($request->get('search'));

        $backend = DB::table('cursos')
                        ->select('nombre_curso', 'imagen', 'direccion_url', 'idioma')
                        ->where('id_categoria', '=', 2, 'AND', 'nombre_curso', 'LIKE', '%'.$data.'%')
                        ->Where('nombre_curso', 'LIKE', '%'.$data.'%')
                        ->get();

                        //->where('nombre_curso', 'LIKE', '%'.$data.'%')->get();

        return view('backend', ['backend' => $backend]);
    }
    
}
