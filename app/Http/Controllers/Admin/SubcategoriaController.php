<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Subcategorium;
use App\Categorium;
use Illuminate\Http\Request;

class SubcategoriaController extends Controller
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
            $subcategoria = Subcategorium::where('Subcategoria', 'LIKE', "%$keyword%")
                ->orWhere('detalle', 'LIKE', "%$keyword%")
                ->orWhere('activo', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $subcategoria = Subcategorium::paginate($perPage);
        }

        return view('admin.subcategoria.index', compact('subcategoria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        $categorias = Categorium::orderBy('id', 'ASC')->pluck('categoria', 'id');
        return view('admin.subcategoria.create',compact('categorias'));
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
        
        $requestData = $request->all();
        
        Subcategorium::create($requestData);

        return redirect('admin/subcategoria')->with('flash_message', 'Subcategorium added!');
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
        $subcategorium = Subcategorium::findOrFail($id);

        return view('admin.subcategoria.show', compact('subcategorium'));
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
        $categorias = Categorium::orderBy('id', 'ASC')->pluck('categoria', 'id');
        $subcategorium = Subcategorium::findOrFail($id);

        return view('admin.subcategoria.edit', compact('subcategorium','categorias'));
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
        
        $requestData = $request->all();
        
        $subcategorium = Subcategorium::findOrFail($id);
        $subcategorium->update($requestData);

        return redirect('admin/subcategoria')->with('flash_message', 'Subcategorium updated!');
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
        Subcategorium::destroy($id);

        return redirect('admin/subcategoria')->with('flash_message', 'Subcategorium deleted!');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    
}


