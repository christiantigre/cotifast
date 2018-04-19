<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Cliente;
use Illuminate\Http\Request;

use App\Pais;
use App\Provincias;
use App\Canton;

use Session;
use Carbon\Carbon;
use App\SvLog;

class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except' => 'logout']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $cliente = Cliente::where('nombre', 'LIKE', "%$keyword%")
                ->orWhere('apellido', 'LIKE', "%$keyword%")
                ->orWhere('cedula', 'LIKE', "%$keyword%")
                ->orWhere('ruc', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('telefono', 'LIKE', "%$keyword%")
                ->orWhere('cel_movi', 'LIKE', "%$keyword%")
                ->orWhere('cel_claro', 'LIKE', "%$keyword%")
                ->orWhere('wts', 'LIKE', "%$keyword%")
                ->orWhere('direccion', 'LIKE', "%$keyword%")
                ->orWhere('fecha_nacimiento', 'LIKE', "%$keyword%")
                ->orWhere('estado_civil', 'LIKE', "%$keyword%")
                ->orWhere('genero', 'LIKE', "%$keyword%")
                ->orWhere('activo', 'LIKE', "%$keyword%")
                ->orWhere('pais_id', 'LIKE', "%$keyword%")
                ->orWhere('provincia_id', 'LIKE', "%$keyword%")
                ->orWhere('canton_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $cliente = Cliente::paginate($perPage);
        }

        return view('admin.cliente.index', compact('cliente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $paises = Pais::orderBy('id', 'DESC')->pluck('pais', 'id');
        $provincias = Provincias::orderBy('id', 'ASC')->pluck('provincia', 'id');
        $cantones = Canton::orderBy('id', 'ASC')->pluck('canton', 'id');
        return view('admin.cliente.create',compact('paises','provincias','cantones'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'nombre' => 'nullable|max:75',
			'apellido' => 'nullable|max:75',
			'cedula' => 'nullable|numeric|unique:clientes',
			'ruc' => 'nullable|numeric|unique:clientes',
			'email' => 'required|unique:clientes',
			'telefono' => 'nullable',
			'cel_movi' => 'nullable|numeric',
			'cel_claro' => 'nullable|numeric',
			'wts' => 'nullable|numeric',
			'direccion' => 'nullable|max:191'
		]);
        $requestData = $request->all();

        try {
            
            Cliente::create($requestData);
            Session::flash('flash_message', 'Cliente Guardado correctamente');     
            $this->genLog("Registró cliente : ".$requestData['nombre'].' '.$requestData['apellido']);
            
        } catch (\Exception $e) {
            Session::flash('warning', 'Error al registrar!!!');       
            $this->genLog("Error al registrar : ".$requestData['nombre'].' '.$requestData['apellido']);
        }
        

        return redirect('admin/cliente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);

        return view('admin.cliente.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {

        $paises = Pais::orderBy('id', 'DESC')->pluck('pais', 'id');
        $provincias = Provincias::orderBy('id', 'ASC')->pluck('provincia', 'id');
        $cantones = Canton::orderBy('id', 'ASC')->pluck('canton', 'id');


        $cliente = Cliente::findOrFail($id);

        return view('admin.cliente.edit', compact('cliente','paises','provincias','cantones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'nullable|max:75',
            'apellido' => 'nullable|max:75',
            'cedula' => 'nullable|numeric|unique:clientes,cedula,'.$id,
            'ruc' => 'nullable|numeric|unique:clientes,ruc,'.$id,
            'email' => 'required|unique:clientes,email,'.$id,
            'telefono' => 'nullable',
            'cel_movi' => 'nullable|numeric',
            'cel_claro' => 'nullable|numeric',
            'wts' => 'nullable|numeric',
            'direccion' => 'nullable|max:191'
        ]);

        $requestData = $request->all();

        try {

            $cliente = Cliente::findOrFail($id);
            $cliente->update($requestData);
            Session::flash('flash_message', 'Actualizado correctamente');
            $this->genLog("Actualizó información del cliente :".$requestData['nombre'].' '.$requestData['apellido']);
            
        } catch (\Exception $e) {
            $this->genLog("Error al actualizar información");
            Session::flash('warning', 'Error al Actualizar '.$e);   
        }
        
       

        return redirect('admin/cliente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Cliente::destroy($id);

        return redirect('admin/cliente')->with('flash_message', 'Cliente deleted!');
    }

    public function genLog($mensaje)
    {
        $area = 'Clientes';
        $logs = Svlog::log($mensaje,$area);
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

}
