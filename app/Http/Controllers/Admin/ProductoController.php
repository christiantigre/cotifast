<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Producto;
use App\Categorium;
use App\Subcategorium;
use App\Marca;
use Illuminate\Http\Request;

class ProductoController extends Controller
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
            $producto = Producto::where('producto', 'LIKE', "%$keyword%")
                ->orWhere('cod_barra', 'LIKE', "%$keyword%")
                ->orWhere('pre_compra', 'LIKE', "%$keyword%")
                ->orWhere('pre_venta', 'LIKE', "%$keyword%")
                ->orWhere('cantidad', 'LIKE', "%$keyword%")
                ->orWhere('fecha_ingreso', 'LIKE', "%$keyword%")
                ->orWhere('compras', 'LIKE', "%$keyword%")
                ->orWhere('ventas', 'LIKE', "%$keyword%")
                ->orWhere('saldo', 'LIKE', "%$keyword%")
                ->orWhere('imagen', 'LIKE', "%$keyword%")
                ->orWhere('name_img', 'LIKE', "%$keyword%")
                ->orWhere('nuevo', 'LIKE', "%$keyword%")
                ->orWhere('promocion', 'LIKE', "%$keyword%")
                ->orWhere('catalogo', 'LIKE', "%$keyword%")
                ->orWhere('activo', 'LIKE', "%$keyword%")
                ->orWhere('propaganda', 'LIKE', "%$keyword%")
                ->orWhere('categoria_id', 'LIKE', "%$keyword%")
                ->orWhere('subcategoria_id', 'LIKE', "%$keyword%")
                ->orWhere('marca_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $producto = Producto::paginate($perPage);
        }

        return view('admin.producto.index', compact('producto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $categorias = Categorium::orderBy('id', 'DESC')->pluck('Categoria', 'id');
        $subcategorias = Subcategorium::orderBy('id', 'DESC')->pluck('Subcategoria', 'id');
        $marcas = Marca::orderBy('id', 'DESC')->pluck('Marca', 'id');
        return view('admin.producto.create',compact('categorias','subcategorias','marcas'));
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
			'producto' => 'max:191'
		]);
        $requestData = $request->all();
        

        if ($request->hasFile('imagen')) {
            foreach($request['imagen'] as $file){
                $uploadPath = public_path('/uploads/imagen');

                $extension = $file->getClientOriginalExtension();
                $fileName = rand(11111, 99999) . '.' . $extension;

                $file->move($uploadPath, $fileName);
                $requestData['imagen'] = $fileName;
            }
        }

        Producto::create($requestData);

        return redirect('admin/producto')->with('flash_message', 'Producto added!');
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
        $producto = Producto::findOrFail($id);

        return view('admin.producto.show', compact('producto'));
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
        $producto = Producto::findOrFail($id);

        return view('admin.producto.edit', compact('producto'));
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
			'producto' => 'max:191'
		]);
        $requestData = $request->all();
        

        if ($request->hasFile('imagen')) {
            foreach($request['imagen'] as $file){
                $uploadPath = public_path('/uploads/imagen');

                $extension = $file->getClientOriginalExtension();
                $fileName = rand(11111, 99999) . '.' . $extension;

                $file->move($uploadPath, $fileName);
                $requestData['imagen'] = $fileName;
            }
        }

        $producto = Producto::findOrFail($id);
        $producto->update($requestData);

        return redirect('admin/producto')->with('flash_message', 'Producto updated!');
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
        Producto::destroy($id);

        return redirect('admin/producto')->with('flash_message', 'Producto deleted!');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
    
}
