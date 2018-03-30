<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Descuento;
use Illuminate\Http\Request;

class DescuentoController extends Controller
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
            $descuento = Descuento::where('descuento', 'LIKE', "%$keyword%")
                ->orWhere('detalle', 'LIKE', "%$keyword%")
                ->orWhere('activo', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $descuento = Descuento::paginate($perPage);
        }

        return view('admin.descuento.index', compact('descuento'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.descuento.create');
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
            'descuento' => 'required|numeric|unique:descuentos',
        ]);

        $requestData = $request->all();
        
        Descuento::create($requestData);

        return redirect('admin/descuento')->with('flash_message', 'Descuento added!');
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
        $descuento = Descuento::findOrFail($id);

        return view('admin.descuento.show', compact('descuento'));
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
        $descuento = Descuento::findOrFail($id);

        return view('admin.descuento.edit', compact('descuento'));
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
            'descuento' => 'required|numeric|unique:descuentos,descuento,'.$id,
        ]);
        
        $requestData = $request->all();
        
        $descuento = Descuento::findOrFail($id);
        $descuento->update($requestData);

        return redirect('admin/descuento')->with('flash_message', 'Descuento updated!');
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
        Descuento::destroy($id);

        return redirect('admin/descuento')->with('flash_message', 'Descuento deleted!');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
    
}
