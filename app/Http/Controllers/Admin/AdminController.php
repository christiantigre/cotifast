<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Carbon\Carbon;
use App\Proforma;
use App\Producto;
use App\Cliente;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except' => 'logout']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carbon = Carbon::now(new \DateTimeZone('America/Guayaquil'));
        $fecha_hoy = $carbon->now()->format('Y-m-d');

        $count_proformashoy = Proforma::where('fecha_proforma', $fecha_hoy)->count();

        $valor_proformas = Proforma::where('fecha_proforma', $fecha_hoy)->sum('total');

        $productos_total = Producto::where('activo','1')->count();

        $productos_bajoonventario = Producto::where('cantidad','<','5')->count();

        $perPage = 5;
        $productos = Producto::where('cantidad','<','10')->paginate($perPage);

        $proformas = Proforma::orderBy('secuencial_proforma','DESC')->where('fecha_proforma', $fecha_hoy)->paginate($perPage); 

        $clientes = Cliente::where('activo','1')->count(); 

        return view('home',compact('fecha_hoy','count_proformashoy','valor_proformas','productos_total','productos_bajoonventario','productos','proformas','clientes'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
}
