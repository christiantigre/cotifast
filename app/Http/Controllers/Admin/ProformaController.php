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
use App\Almacen;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use App\SvLog;
use App\Clausula;

use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

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
            $proforma = Proforma::orderBy('id','ACS')->paginate($perPage);
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
        $dataProforma = $request->all();
        $carbon = new Carbon();
        $date = $carbon->now();
        $dataProforma['fecha_proforma'] = $date->format('Y-m-d');
        $dataProforma['secuencial_proforma'] = $request->secuencial_proforma;
        $dataProforma['vendedor'] = $request->vendedor;
        $dataProforma['cliente_id'] = $request->cliente_id;
        $dataProforma['cliente'] = $request->cliente;
        $dataProforma['documento_ruc'] = $request->documento_ruc;
        $dataProforma['documento_ced'] = $request->documento_ced;
        $dataProforma['destinatario_mail'] = $request->destinatario_mail;
        $dataProforma['contactos'] = $request->contactos;
        $dataProforma['direccion_cliente'] = $request->direccion_cliente;

        $dataProforma['subtotal'] = $request['subtotal'];
        $dataProforma['iva_cero'] = $request['iva_cero'];
        $dataProforma['iva_calculado'] = $request['iva_calculado'];
        $dataProforma['porcentaje_iva'] = $request['porcentaje_iva'];
        $dataProforma['id_iva'] = $request['idiva']; 
        $dataProforma['total'] = $request['total']; 

        try {
            
            $proforma = Proforma::create($dataProforma);
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
    
    public function verproforma($id)
    {
        $this->genLog("Visualizó proforma id: ".$id);

            //$proforma = Proforma::orderBy('id', 'DESC')->where('id', $id)->get();
            $proforma = Proforma::findOrFail($id);
            $detalles_proforma = $proforma->detalles_proforma;
            $num_secuencial = $proforma->secuencial_proforma;
            $nom_proforma = "Proforma-#.-".$num_secuencial;
            $numero_secuencial = $proforma->secuencial_proforma;
            $detallproforma= itemsdetall::where('id_proforma',$id)->get();
            $almacen = Almacen::orderBy('id', 'DESC')->where('id', 1)->get();
            $clausulas = Clausula::Where('activo','1')->get();
            //$preclausulas = "Desarrollado por PcSolution´s Gualaceo - Cuenca, Av. Jaime Roldós y Manuel Moreno.";
            $pdf     = \PDF::loadView('pdf.proforma', [
                'proforma'      => $proforma,
                'detallproforma'    => $detallproforma,
                'detalles_proforma' => $detalles_proforma,
                'almacen'        => $almacen,
                'clausulas'  => $clausulas,
                'nom_proforma'  => $nom_proforma,
                'numero_secuencial'=>$numero_secuencial
            ]);

        //return $pdf->download($nom_factura.'.pdf');
            return $pdf->stream();
            return view('pdf.proforma',compact('proforma','detallproforma','detalles_proforma','almacen','clausulas','nom_proforma','numero_secuencial','preclausula'));

        //return view('admin.proforma.show', compact('proforma'));
    }

    public function downloadproforma($id)
    {
        $this->genLog("Descargó proforma id: ".$id);

            //$proforma = Proforma::orderBy('id', 'DESC')->where('id', $id)->get();
            $proforma = Proforma::findOrFail($id);
            $detalles_proforma = $proforma->detalles_proforma;
            $num_secuencial = $proforma->secuencial_proforma;
            $nom_proforma = "Proforma-#.-".$num_secuencial;
            $numero_secuencial = $proforma->secuencial_proforma;
            $detallproforma= itemsdetall::where('id_proforma',$id)->get();
            $almacen = Almacen::orderBy('id', 'DESC')->where('id', 1)->get();
            $clausulas = Clausula::Where('activo','1')->get();
            //$preclausulas = "Desarrollado por PcSolution´s Gualaceo - Cuenca, Av. Jaime Roldós y Manuel Moreno.";
            $pdf     = \PDF::loadView('pdf.proforma', [
                'proforma'      => $proforma,
                'detallproforma'    => $detallproforma,
                'detalles_proforma' => $detalles_proforma,
                'almacen'        => $almacen,
                'clausulas'  => $clausulas,
                'nom_proforma'  => $nom_proforma,
                'numero_secuencial'=>$numero_secuencial
            ]);

        return $pdf->download($nom_proforma.'.pdf');
    }

    public function send_mail($id){

        $this->genLog("Descargó proforma id: ".$id);

            //$proforma = Proforma::orderBy('id', 'DESC')->where('id', $id)->get();
            $proforma = Proforma::findOrFail($id);
            $detalles_proforma = $proforma->detalles_proforma;
            $num_secuencial = $proforma->secuencial_proforma;
            $nom_proforma = "Proforma-#.-".$num_secuencial;
            $numero_secuencial = $proforma->secuencial_proforma;
            $detallproforma= itemsdetall::where('id_proforma',$id)->get();
            $almacen = Almacen::orderBy('id', 'DESC')->where('id', 1)->get();
            $clausulas = Clausula::Where('activo','1')->get();
            //$preclausulas = "Desarrollado por PcSolution´s Gualaceo - Cuenca, Av. Jaime Roldós y Manuel Moreno.";
            $pdf     = \PDF::loadView('pdf.proforma', [
                'proforma'      => $proforma,
                'detallproforma'    => $detallproforma,
                'detalles_proforma' => $detalles_proforma,
                'almacen'        => $almacen,
                'clausulas'  => $clausulas,
                'nom_proforma'  => $nom_proforma,
                'numero_secuencial'=>$numero_secuencial
            ])->save(public_path('/files/'.$nom_proforma.'.pdf'));


        $data = array(
            'name'    => $proforma->cliente,
            'mail'    => $proforma->destinatario_mail,
            'subject' => 'Le adjunto el archivo cotizado que corresponde a su pedido.',
            'archivo' => public_path('/files/'.$nom_proforma.'.pdf')
        );
        $archivo = public_path('/files/'.$nom_proforma.'.pdf');
        $to = $proforma->destinatario_mail;
        Mail::to($to)->send(new SendMail($data,$archivo,$nom_proforma));
            if (file_exists($archivo)) {
                unlink($archivo);                
            }

            Proforma::find($id)->update(['enviado' => 1]);

            Session::flash('flash_message', 'Cotización Enviada correctamente a '.$proforma->cliente); 

            return redirect('admin/proforma');

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
