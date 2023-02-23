<?php

namespace App\Http\Controllers;

use App\Models\Entidad;
use App\Models\Logo;
use App\Models\CorreosAtencion;
use App\Models\lineasAtencion;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class EntidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entidades = Entidad::all();

        return $entidades;
    }

    public function entidad($id)
    {

        $entidad = Entidad::where('entidads.id',$id)->join('logos','entidads.id','=','logos.entidad_id')
        ->join('banners','entidads.id','=','banners.entidad_id')
        ->select('entidads.*', 'logos.nombre as logo','banners.nombre as banner')
        ->first();

        return response::json($entidad);
    }

    public function directorio($id)
    {

        $entidad = Entidad::where('entidads.id',$id)->join('logos','entidads.id','=','logos.entidad_id')
        ->join('banners','entidads.id','=','banners.entidad_id')
        ->select('entidads.*', 'logos.nombre as logo','banners.nombre as banner')
        ->first();

        $lineasAtencion = lineasAtencion::where('entidad_id', $entidad->id)->get();
        $correosAtencion = CorreosAtencion::where('entidad_id', $entidad->id)->get();


        $breadcrumbs = [
            ['link' => "/", 'name' => "Inicio"], ['link' => "/entidad/list", 'name' => "Entidades"], ['name' => "directorio"]
        ];
        return view('/content/entidades/directorio', [
            'breadcrumbs' => $breadcrumbs,
            'entidad' => $entidad,
            'lineasAtencion' => $lineasAtencion,
            'correosAtencion' => $correosAtencion
        ]);
    }

    public function listado()
    {
        $entidades = Entidad::join('logos','entidads.id','=','logos.entidad_id')
                              ->select('entidads.nombre as nombre','entidads.tipoentidad as tipoentidad', 'entidads.descripcion as descripcion', 'logos.nombre as logo','entidads.id as id')
                              ->get();

        $data['data'] = $entidades;
        return response::json($data);
    }
    public function list()
    {

        $pageConfigs = ['pageHeader' => false];
        return view('/content/entidades/list', ['pageConfigs' => $pageConfigs]);
    }
    public function crear(Request $request)
    {
        $entidad = new Entidad();

        $entidad->nombre = $request->nombre;
        $entidad->descripcion = $request->descripcion;
        $entidad->tipoentidad = $request->tipoentidad;
        $entidad->linkpagina = $request->linkpagina;
        $entidad->linkpqrsd = $request->linkpqrsd;
        $entidad->save();

            $this->validate($request, [
                'logo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);


            $image_path = $request->file('logo')->store('logo', 'public');

            $formato = request()->file('logo')->getClientOriginalExtension();

            $data = Logo::create([
                'nombre' => $image_path,
				'formato' => $formato,
				'entidad_id' => $entidad->id,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s"),
            ]);


            $this->validate($request, [
                'banner' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);


            $image_path = $request->file('banner')->store('banner', 'public');

            $formato = request()->file('banner')->getClientOriginalExtension();

            $data = Banner::create([
                'nombre' => $image_path,
				'formato' => $formato,
				'entidad_id' => $entidad->id,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s"),
            ]);
        return back();
    }
    public function editar(Request $request)
    {

        $entidad = Entidad::find($request->id1);

        $entidad->nombre = $request->nombre1;
        $entidad->descripcion = $request->descripcion1;
        $entidad->tipoentidad = $request->tipoentidad1;
        $entidad->linkpagina = $request->linkpagina1;
        $entidad->linkpqrsd = $request->linkpqrsd1;
        $entidad->save();


            $this->validate($request, [
                'logo1' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $image_path = $request->file('logo1')->store('logo', 'public');

            $formato = request()->file('logo1')->getClientOriginalExtension();

            $data = Logo::where('entidad_id',$entidad->id)->update([
                'nombre' => $image_path,
				'formato' => $formato,
				'entidad_id' => $entidad->id,
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s"),
            ]);


            $this->validate($request, [
                'banner1' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);


            $image_path1 = $request->file('banner1')->store('banner', 'public');

            $formato = request()->file('banner1')->getClientOriginalExtension();

            $data = Banner::where('entidad_id',$entidad->id)->update([
                'nombre' => $image_path,
				'formato' => $formato,
				'entidad_id' => $entidad->id,
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
    public function lineastelefonicas($id)
    {
        $lineas = LineasAtencion::where('entidad_id', $id)->get();
        $data['data'] = $lineas;
        return response::json($data);
    }

    public function correos($id)
    {
        $correos = CorreosAtencion::where('entidad_id', $id)->get();

        $data['data'] = $correos;
        return response::json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function crearLinea(Request $request)
    {
        try {
            $linea = LineasAtencion::create([
                'entidad_id' => $request->entidad_id,
                'nombre' => $request->nombre,
                'linea' => $request->linea,
                'opcion' => $request->opcion
            ]);
            return back();
        } catch (\Throwable $th) {
            return false;
        }





    }
    public function crearCorreo(Request $request)
    {
        try {
            $correo = CorreosAtencion::create([
                'entidad_id' => $request->entidad_id,
                'nombre' => $request->nombre,
                'correo' => $request->linea
            ]);
            return back();
        } catch (\Throwable $th) {
            return false;
        }
    }
    public function editarLinea(Request $request)
    {
        try {
            $correo = LineasAtencion::update([
                'entidad_id' => $request->entidad_id,
                'nombre' => $request->nombre,
                'linea' => $request->linea,
                'opcion' => $request->opcion
            ]);
            return back();
        } catch (\Throwable $th) {
            return false;
        }
    }
    public function editarCorreo(Request $request)
    {
        try {
            $correo = CorreosAtencion::update([
                'entidad_id' => $request->entidad_id,
                'nombre' => $request->nombre,
                'correo' => $request->linea
            ]);
            return back();
        } catch (\Throwable $th) {
            return false;
        }
    }
    public function eliminarLinea($id)
    {
        $entidad = LineasAtencion::find($id);
        $entidad->delete();

        return response('Linea de atención eliminada correctamente.', 200);
    }
    public function eliminarCorreo($id)
    {
        $entidad = CorreosAtencion::find($id);
        $entidad->delete();

        return response('Correo de atención eliminada correctamente.', 200);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Entidad  $entidad
     * @return \Illuminate\Http\Response
     */
    public function show(Entidad $entidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Entidad  $entidad
     * @return \Illuminate\Http\Response
     */
    public function edit(Entidad $entidad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Entidad  $entidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Entidad $entidad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Entidad  $entidad
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {

        $entidad = Entidad::find($id);


        $logo = Logo::where('entidad_id',$entidad->id)->delete();
        $banner = Banner::where('entidad_id',$entidad->id)->delete();
        $linea = LineasAtencion::where('entidad_id',$entidad->id)->delete();
        $correo = CorreosAtencion::where('entidad_id',$entidad->id)->delete();
        $entidad->delete();

        return response('Entidad eliminada correctamente.', 200);
    }
}
