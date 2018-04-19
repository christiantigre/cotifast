<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Perfil;
use App\Admin;
use Illuminate\Http\Request;

class PerfilController extends Controller
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
            $perfil = Perfil::where('nombre', 'LIKE', "%$keyword%")
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
                ->orWhere('tipo_usuario', 'LIKE', "%$keyword%")
                ->orWhere('estado_civil', 'LIKE', "%$keyword%")
                ->orWhere('genero', 'LIKE', "%$keyword%")
                ->orWhere('activo', 'LIKE', "%$keyword%")
                ->orWhere('pais_id', 'LIKE', "%$keyword%")
                ->orWhere('provincia_id', 'LIKE', "%$keyword%")
                ->orWhere('canton_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $perfil = Perfil::paginate($perPage);
        }

        return view('admin.perfil.index', compact('perfil'));
    }

    public function cuenta_perfil(Request $request){
        $mailAdmin = auth('admin')->user()->email;
        $usuario = Perfil::where('email', '=', $mailAdmin)->first();
        $credenciales = Admin::where('email', '=', $mailAdmin)->first();
        return view('perfil.cuenta',compact('usuario','credenciales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.perfil.create');
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
			'cedula' => 'nullable',
			'ruc' => 'nullable',
			'email' => 'nullable',
			'telefono' => 'nullable',
			'cel_movi' => 'nullable',
			'cel_claro' => 'nullable',
			'wts' => 'nullable',
			'direccion' => 'nullable|max:191'
		]);
        $requestData = $request->all();
        
        Perfil::create($requestData);

        return redirect('admin/perfil')->with('flash_message', 'Perfil added!');
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
        $perfil = Perfil::findOrFail($id);

        return view('admin.perfil.show', compact('perfil'));
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
        $perfil = Perfil::findOrFail($id);

        return view('admin.perfil.edit', compact('perfil'));
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
			'cedula' => 'nullable',
			'ruc' => 'nullable',
			'email' => 'nullable',
			'telefono' => 'nullable',
			'cel_movi' => 'nullable',
			'cel_claro' => 'nullable',
			'wts' => 'nullable',
			'direccion' => 'nullable|max:191'
		]);
        $requestData = $request->all();
        
        $perfil = Perfil::findOrFail($id);
        $perfil->update($requestData);

        return redirect('admin/perfil')->with('flash_message', 'Perfil updated!');
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
        Perfil::destroy($id);

        return redirect('admin/perfil')->with('flash_message', 'Perfil deleted!');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

}
