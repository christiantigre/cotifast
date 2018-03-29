<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Categorium;
use Illuminate\Http\Request;

class CategoriaController extends Controller
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
            $categoria = Categorium::where('categoria', 'LIKE', "%$keyword%")
                ->orWhere('detalle', 'LIKE', "%$keyword%")
                ->orWhere('activo', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $categoria = Categorium::paginate($perPage);
        }

        return view('admin.categoria.index', compact('categoria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.categoria.create');
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
        
        Categorium::create($requestData);

        return redirect('admin/categoria')->with('flash_message', 'Categorium added!');
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
        $categorium = Categorium::findOrFail($id);

        return view('admin.categoria.show', compact('categorium'));
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
        $categorium = Categorium::findOrFail($id);

        return view('admin.categoria.edit', compact('categorium'));
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
        
        $categorium = Categorium::findOrFail($id);
        $categorium->update($requestData);

        return redirect('admin/categoria')->with('flash_message', 'Categorium updated!');
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
        Categorium::destroy($id);

        return redirect('admin/categoria')->with('flash_message', 'Categorium deleted!');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
    
}
