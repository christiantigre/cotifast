<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Admin;
use App\Proforma;
use App\Cliente;
use App\Producto;
use App\item_proforma;
use App\itemsdetall;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use App\SvLog;

class ProformaController extends Controller
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
            $proforma = Proforma::where('fecha_proforma', 'LIKE', "%$keyword%")
                ->orWhere('total', 'LIKE', "%$keyword%")
                ->orWhere('destinatario_mail', 'LIKE', "%$keyword%")
                ->orWhere('secuencial_proforma', 'LIKE', "%$keyword%")
                ->orWhere('detalles_proforma', 'LIKE', "%$keyword%")
                ->orWhere('cliente_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $proforma = Proforma::paginate($perPage);
        }

        return view('admin.proforma.index', compact('proforma'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        /*Extrae info del usuario autenticado*/
        try {
            $mailAdmin = auth('admin')->user()->email;
            $adminid = auth('admin')->user()->id;
            $administrador = Admin::findOrFail($adminid);
            $dataArray['mail'] = $mailAdmin;          
            $dataArray['iduser'] = $adminid;          
        } catch (\Exception $e) {            
            $administrador = Admin::findOrFail(1);
        }
        $username = $administrador['name'];
        $userid = $administrador['id'];
        $useremail = $administrador['email'];
        /*Genera el numero de secuencia*/
        $cant_proformas = Proforma::count();
        $cant_incr = $cant_proformas+1;
        $numbers     = $this->generate_numbers($cant_incr, 1, 9);
        $numero_proforma = implode("", $numbers);
        /*Genera la fecha que se genera la proforma*/
        $carbon = Carbon::now(new \DateTimeZone('America/Guayaquil'));
        $fecha_proforma = $carbon->now()->format('Y-m-d H:i:s');

        item_proforma::truncate();

        $clientes = Cliente::all();

        $products = Producto::where('cantidad', '>', 0)->where('activo',1)->orderBy('id','ASC')->get();

        return view('admin.proforma.create',compact('cant_incr','numero_proforma','fecha_proforma','username','userid','useremail','clientes','products'));
    }


    public static function generate_numbers($start, $count, $digits)
    {
        $result = array();
        for ($n = $start; $n < $start + $count; $n++) {
            $result[] = str_pad($n, $digits, "0", STR_PAD_LEFT);
        }
        return $result;
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
			'fecha_proforma' => 'required'
		]);
        $producto = item_proforma::get();
        $requestData = $request->all();
        $carbon = new Carbon();
        $date = $carbon->now();
        $dataVenta['fecha_proforma'] = $date->format('Y-m-d');
        $dataVenta['secuencial_proforma'] = $request->secuencial_proforma;
        $dataVenta['vendedor'] = $request->vendedor;
        $dataVenta['cliente_id'] = $request->cliente_id;
        $dataVenta['cliente'] = $request->cliente;
        $dataVenta['documento_ruc'] = $request->documento_ruc;
        $dataVenta['documento_ced'] = $request->documento_ced;
        $dataVenta['destinatario_mail'] = $request->destinatario_mail;
        $dataVenta['contactos'] = $request->contactos;
        $dataVenta['direccion_cliente'] = $request->direccion_cliente;
        try {
            
            $proforma = Proforma::create($requestData);
            foreach ($producto as $product) {
                $requestData_returned = $this->saveItem($product, $proforma->id);
                $requestData_returned->save();
            }
            Session::flash('flash_message', 'Guardado correctamente');
            $this->genLog("Proforma Registrada de id : ".$proforma->id);
        } catch (\Exception $e) {
            Session::flash('warning', 'Error al Guardar');  
            $this->genLog("Error al registrar proforma id : ".$proforma->id); 
        }

        return redirect('admin/proforma');
    }

    //Recibe parametros de la funcion store para guardar el detalle de la factura.
    protected function saveItem($product, $proforma_id)
    {
        $requestData = new itemsdetall;
        $requestData->producto = $product->producto;
        $requestData->codbarra = $product->codbarra;
        $requestData->precio = $product->precio;
        $requestData->cant = $product->cant;
        $requestData->total = $product->total;
        $requestData->id_proforma = $proforma_id;
        $requestData->id_producto = $product->id_producto;
        return $requestData;
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
        $proforma = Proforma::findOrFail($id);

        return view('admin.proforma.show', compact('proforma'));
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
        $proforma = Proforma::findOrFail($id);

        return view('admin.proforma.edit', compact('proforma'));
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
			'fecha_proforma' => 'required'
		]);
        $requestData = $request->all();
        
        $proforma = Proforma::findOrFail($id);
        $proforma->update($requestData);

        return redirect('admin/proforma')->with('flash_message', 'Proforma updated!');
    }

public function extraerdatoscliente(Request $request){
    if ($request->ajax()) {
        $cliente = Cliente::orderBy('id','DESC')->where('id',$request->id)->first();
        return response()->json($cliente);
    }
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
        Proforma::destroy($id);

        return redirect('admin/proforma')->with('flash_message', 'Proforma deleted!');
    }

    public function genLog($mensaje)
    {
        $area = 'Proformas';
        $logs = Svlog::log($mensaje,$area);
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    
}
