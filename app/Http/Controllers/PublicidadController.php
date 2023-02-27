<?php

namespace App\Http\Controllers;

use App\Models\publicidad;
use App\Models\ImagenPublicitaria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class PublicidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $publicidades = publicidad::join('imagen_publicitarias','publicidads.id','=','imagen_publicitarias.publicidad_id')
                        ->select('publicidads.*', 'imagen_publicitarias.nombre as imagen' )
                        ->get();
        return response::json($publicidades);
    }


    public function publicidad($id)
    {

        $entidad = publicidad::where('publicidads.id',$id)->join('imagen_publicitarias','publicidads.id','=','imagen_publicitarias.publicidad_id')
        ->select('publicidads.*', 'imagen_publicitarias.nombre as imagen' )
        ->first();

        return response::json($entidad);
    }
    public function publicidadapi($id)
    {

        return response([
            'publicidad' => publicidad::where('id', $id)->with('imagenpublicitaria')->get()
        ], 200);
    }
    public function listadoPubliciadades(){
        $publicidad = publicidad::join('imagen_publicitarias','publicidads.id','=','imagen_publicitarias.publicidad_id')
        ->select('publicidads.*', 'imagen_publicitarias.nombre as imagen' )
        ->get();

        return response()->json([
            'publicidad' => $publicidad
        ]);
    }
    public function listado()
    {
        $entidades = publicidad::join('imagen_publicitarias','publicidads.id','=','imagen_publicitarias.publicidad_id')
        ->select('publicidads.*', 'imagen_publicitarias.nombre as imagen' )
        ->get();

        $data['data'] = $entidades;
        return response::json($data);
    }
    public function list()
    {

        $pageConfigs = ['pageHeader' => false];
        return view('/content/publicidad/list', ['pageConfigs' => $pageConfigs]);
    }

    public function crear(Request $request)
    {
        $publicidad = new publicidad();

        $publicidad->nombre = $request->nombre;
        $publicidad->duracion = $request->duracion;
        $publicidad->propietario = $request->propietario;
        $publicidad->save();

            $this->validate($request, [
                'imagen_publicitaria' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);


            $image_path = $request->file('imagen_publicitaria')->store('imagen', 'public');

            $formato = request()->file('imagen_publicitaria')->getClientOriginalExtension();

            $data = ImagenPublicitaria::create([
                'nombre' => $image_path,
				'formato' => $formato,
				'publicidad_id' => $publicidad->id,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s"),
            ]);


            $this->validate($request, [
                'banner' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

        return back();
    }
    public function editar(Request $request)
    {

        $publicidad = publicidad::find($request->id1);

        $publicidad->nombre = $request->nombre;
        $publicidad->duracion = $request->duracion;
        $publicidad->propietario = $request->propietario;
        $publicidad->save();

            $this->validate($request, [
                'imagen_publicitaria1' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $image_path = $request->file('imagen_publicitaria1')->store('imagen', 'public');

            $formato = request()->file('imagen_publicitaria1')->getClientOriginalExtension();

            $data = ImagenPublicitaria::where('publicidad_id',$publicidad->id)->update([
                'nombre' => $image_path,
				'formato' => $formato,
				'publicidad_id' => $publicidad->id,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s"),
            ]);



        return back();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\publicidad  $publicidad
     * @return \Illuminate\Http\Response
     */
    public function show(publicidad $publicidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\publicidad  $publicidad
     * @return \Illuminate\Http\Response
     */
    public function edit(publicidad $publicidad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\publicidad  $publicidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, publicidad $publicidad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\publicidad  $publicidad
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {

        $entidad = publicidad::find($id);


        $imagen = ImagenPublicitaria::where('publicidad_id',$entidad->id)->delete();

        $entidad->delete();

        return response('Publicidad eliminada correctamente.', 200);
    }
}
