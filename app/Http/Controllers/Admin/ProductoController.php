<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Producto;
use App\Categorium;
use App\Subcategorium;
use App\Marca;
use Illuminate\Http\Request;
use Session;
use Carbon\Carbon;
use App\SvLog;
use Image;
use Illuminate\Support\Facades\Input;

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
        $rules = [
            'producto' => 'required|max:191',
            'cod_barra'=>'unique:productos|max:99999999999999999999',
            'pre_compra'=>'numeric',
            'pre_venta'=>'numeric',
            'cantidad'=>'numeric',
            'saldo'=>'numeric|nullable',
            'imagen' => 'mimes:jpg,jpeg,gif,png',
        ];

        $messages = [
            'pre_compra.numeric'=>'Caractér invalido',
            'pre_venta.numeric'=>'Caractér invalido',
            'cod_barra.unique'=>'Este codigo de barra ya esta en uso.',
            'cantidad.numeric'=>'Cantidad incorrecta',
            'cantidad.max'=>'Cantidad fuera de rango permitido'
        ];

        $this->validate($request, $rules, $messages);

        $requestData = $request->all();
        if ($request->hasFile('imagen')) {
            $file = Input::file('imagen');
            $uploadPath = public_path('uploads/productos/');
            $extension = $file->getClientOriginalName();
            $image  = Image::make($file->getRealPath());
            $image->resize(300, 300);
            $extension = rand(11111, 99999) . '.' . $extension;
            if (file_exists($uploadPath.$extension)) {
                unlink($uploadPath.$extension);                
            }
            try {
                $image->save($uploadPath.$extension);
                $requestData['imagen'] = 'uploads/productos/'.$extension;
                $requestData['name_img'] = $extension;
                $this->genLog("Subió imagen producto ".$extension); 
            } catch (\Exception $e) {
                $this->genLog("Error al subir imagen ".$extension); 
            }


        }

        try {
            $requestData['compras'] = $requestData['cantidad'];
            $requestData['saldo'] = $requestData['cantidad'];

            Producto::create($requestData);
            Session::flash('flash_message', 'Producto Guardado correctamente');     
            $this->genLog("Registró producto : ".$requestData['producto']); 

        } catch (\Exception $e) {

            Session::flash('warning', 'Error al registrar producto!!!');       
            $this->genLog("Error al registrar : ".$requestData['producto']);    
        }

        return redirect('admin/producto');
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
        $categorias = Categorium::orderBy('id', 'DESC')->pluck('Categoria', 'id');
        $subcategorias = Subcategorium::orderBy('id', 'DESC')->pluck('Subcategoria', 'id');
        $marcas = Marca::orderBy('id', 'DESC')->pluck('Marca', 'id');
        $producto = Producto::findOrFail($id);

        return view('admin.producto.edit', compact('producto','categorias','subcategorias','marcas'));
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
            'producto' => 'required|max:191',
            'cod_barra' => 'required|max:99999999999999999999|unique:productos,cod_barra,'.$id,
            'pre_compra'=>'numeric',
            'pre_venta'=>'numeric',
            'cantidad'=>'numeric',
            'saldo'=>'numeric|nullable',
            'imagen' => 'mimes:jpg,jpeg,gif,png',
       ]);
        $requestData = $request->all();
        

        if ($request->hasFile('imagen')) {
            $file = Input::file('imagen');
            $uploadPath = public_path('uploads/productos/');
            $extension_ext = $file->getClientOriginalExtension();
            $extension = $file->getClientOriginalName();
            $image  = Image::make($file->getRealPath());
            //$image->resize(1200, 900);
            $fileName = rand(11111, 99999) . '.' . $extension;
            //$fileName = 'logo.' . $extension_ext;
            $image->save($uploadPath.$fileName);
            //$file->move($uploadPath, $fileName);
            $requestData['imagen'] = 'uploads/productos/'.$fileName;
            $requestData['name_img'] = $fileName;
            $item_delete = Producto::findOrFail($id);   
            $move = $item_delete['name_img'];
            $old = public_path('uploads/productos/').$move;
            if(!empty($move)){
                if(\File::exists($old)){
                    unlink($old);
                }
            }

            $this->genLog("Actualizó el imagen del producto");
        }

            $requestData['compras'] = $requestData['cantidad'];

        try {

            $producto = Producto::findOrFail($id);
            $producto->update($requestData);
            Session::flash('flash_message', 'Actualizado correctamente');
            $this->genLog("Actualizó información del producto");
            
        } catch (\Exception $e) {
            $this->genLog("Error al actualizar información del producto");
            Session::flash('warning', 'Error al Actualizar '.$e);
        }
        

        return redirect('admin/producto');
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

    public function genLog($mensaje)
    {
        $area = 'Productos';
        $logs = Svlog::log($mensaje,$area);
    }
    
}
