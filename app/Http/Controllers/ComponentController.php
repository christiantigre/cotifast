<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\item_proforma;
use App\Iva;

class ComponentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function saveproducto(Request $request){    
        if($request->ajax()){
            $item = new item_proforma;        
            $item->producto = $request->producto;
            $item->codbarra = $request->codbarra;
            $item->precio = $request->precio;
            $item->cant = $request->cantidad;
            $item->descuento = $request->descuento;
            $item->total = ($request->precio*$request->cantidad);
            $item->id_producto = $request->id_producto;
            if($item->save()){
                return response()->json(["mensaje"=>"Registrado con exito","data"=>$request->all()]);
            }else{
                return response()->json(["mensaje"=>"Error !!! al guardar","data"=>$request->all()]);
            }
            /*$cliente = ItemVenta::create($requestData);
            return response()->json($cliente);*/
        }
    }


    /*Muestra los items del carrito proforma*/


    public function listallitems()
    {
        $carrito = item_proforma::orderBy('id','ASC')->get();
        $total = item_proforma::sum('total');

        $iva = Iva::where('activo', 1)->first();
        $iva_valor=$iva->iva;
        $iva_id=$iva->id;
        /*$iva_valor=12;
        $iva_id=1;*/
        $iva_mostrar = ($iva_valor*1);
        $mult = $iva_valor+100;
        $iva_final = $mult/100;

        $subtotal = ($total/$iva_final);
        $valor_con_iva = ($total-$subtotal);

        return view('admin/proforma/list-cartitems', compact('carrito'),array(
            'total' =>  $total,
            'iva' =>  $valor_con_iva,
            'subtotal' =>  $subtotal,
            'ivavalor' =>  $iva_mostrar,
            'idiva' =>  $iva_id
        ));
    }

    /*Para vaciar los items del carrito proforma*/

    public function trashItem(Request $request){
        if ($request->ajax()) {        
            if(item_proforma::truncate()){
                return response()->json(["mensaje"=>"Vaciado con exito","data"=>"Vaciado"]);
            }else{
                return response()->json(["mensaje"=>"Error !!! al vaciar","data"=>$request->all()]);
            }
        }else{
         return response()->json(["mensaje"=>$request->all()]);   
     }
 }

 public function deleteItem(Request $request){
   if ($request->ajax()) {        
    $item = item_proforma::find($request->id);
    if($item->delete()){
        return response()->json(["mensaje"=>"Eliminado con exito","data"=>"Eliminado"]);
    }else{
        return response()->json(["mensaje"=>"Error !!! al eliminar","data"=>$request->all()]);
    }
}else{
 return response()->json(["mensaje"=>$request->all()]);   
}
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
}
