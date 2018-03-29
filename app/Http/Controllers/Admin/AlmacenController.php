<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Almacen;
use Illuminate\Http\Request;

use App\Pais;
use App\Provincias;
use App\Canton;

use Session;
use Carbon\Carbon;
use App\SvLog;

use Image;
use Illuminate\Support\Facades\Input;

class AlmacenController extends Controller
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
        $this->genLog("Visualizó Configuración Almacen"); 

        if (!empty($keyword)) {
            $almacen = Almacen::where('almacen', 'LIKE', "%$keyword%")
            ->orWhere('propietario', 'LIKE', "%$keyword%")
            ->orWhere('gerente', 'LIKE', "%$keyword%")
            ->orWhere('pag_web', 'LIKE', "%$keyword%")
            ->orWhere('razon_social', 'LIKE', "%$keyword%")
            ->orWhere('ruc', 'LIKE', "%$keyword%")
            ->orWhere('email', 'LIKE', "%$keyword%")
            ->orWhere('fecha_inicio', 'LIKE', "%$keyword%")
            ->orWhere('logo', 'LIKE', "%$keyword%")
            ->orWhere('slogan', 'LIKE', "%$keyword%")
            ->orWhere('name_logo', 'LIKE', "%$keyword%")
            ->orWhere('activo', 'LIKE', "%$keyword%")
            ->orWhere('telefono', 'LIKE', "%$keyword%")
            ->orWhere('fax', 'LIKE', "%$keyword%")
            ->orWhere('cel_movi', 'LIKE', "%$keyword%")
            ->orWhere('cel_claro', 'LIKE', "%$keyword%")
            ->orWhere('watsapp', 'LIKE', "%$keyword%")
            ->orWhere('fb', 'LIKE', "%$keyword%")
            ->orWhere('tw', 'LIKE', "%$keyword%")
            ->orWhere('ins', 'LIKE', "%$keyword%")
            ->orWhere('gg', 'LIKE', "%$keyword%")
            ->orWhere('funcion_empresa', 'LIKE', "%$keyword%")
            ->orWhere('dirMatriz', 'LIKE', "%$keyword%")
            ->orWhere('dirSucursal', 'LIKE', "%$keyword%")
            ->orWhere('latitud', 'LIKE', "%$keyword%")
            ->orWhere('longitud', 'LIKE', "%$keyword%")
            ->orWhere('pais_id', 'LIKE', "%$keyword%")
            ->orWhere('provincia_id', 'LIKE', "%$keyword%")
            ->orWhere('obligado_contabilidad', 'LIKE', "%$keyword%")
            ->orWhere('path_certificado', 'LIKE', "%$keyword%")
            ->orWhere('clave_certificado', 'LIKE', "%$keyword%")
            ->orWhere('modo_ambiente', 'LIKE', "%$keyword%")
            ->orWhere('tipo_emision', 'LIKE', "%$keyword%")
            ->orWhere('habilitar_facelectronica', 'LIKE', "%$keyword%")
            ->orWhere('auth_sri', 'LIKE', "%$keyword%")
            ->orWhere('codestablecimiento', 'LIKE', "%$keyword%")
            ->orWhere('codpntemision', 'LIKE', "%$keyword%")
            ->paginate($perPage);
        } else {
            $almacen = Almacen::paginate($perPage);
        }

        return view('admin.almacen.index', compact('almacen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $paises = Pais::orderBy('id', 'DESC')->pluck('pais', 'id');
        $provincias = Provincias::orderBy('id', 'ASC')->pluck('provincia', 'id');
        $cantones = Canton::orderBy('id', 'ASC')->pluck('canton', 'id');
        return view('admin.almacen.create',compact('paises','provincias','cantones'));        
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
            'almacen' => 'required|max:75',
            'propietario' => 'max:75',
            'gerente' => 'max:75',
            'pag_web' => 'max:191',
            'razon_social' => 'max:75',
            'ruc' => 'max:999999999999999',
            'email' => 'max:75|email',
            'fecha_inicio' => 'max:15',
            'telefono' => 'max:15',
            'cel_movi' => 'max:15',
            'cel_claro' => 'max:15',
            'watsapp' => 'max:15',
            'dir' => 'max:191',
            'latitud' => 'max:50',
            'longitud' => 'max:50',            
            'logo' => 'mimes:jpeg,png|max:1500'
        ]);

        $requestData = $request->all();

        if ($request->hasFile('logo')) {
            $file = Input::file('logo');
            $uploadPath = public_path('uploads/logo/');
            //$extension = $file->getClientOriginalExtension();
            $extension = $file->getClientOriginalName();
            $image  = Image::make($file->getRealPath());
            //$image->resize(1200, 900);
            $fileName = rand(11111, 99999) . '.' . $extension;
            $image->save($uploadPath.$fileName);
            //$file->move($uploadPath, $fileName);
            $requestData['logo'] = 'uploads/logo/'.$fileName;
            $requestData['name_logo'] = $fileName;
        }
        


        if ($request->hasFile('path_certificado')) {
            $certificate = Input::file('path_certificado');
            $uploadPath = public_path('archivos/certificado/');
            $filename = $certificate->getClientOriginalExtension();
            $name = $certificate->getClientOriginalName();
            if (file_exists($uploadPath.$name)) {
                unlink($uploadPath.$name);                
            }
            try {
                    $certificate->move($uploadPath,$name);
                    $requestData['path_certificado'] = $uploadPath.$name;
                    $this->genLog("Subió archivo firma electrónica"); 
                } catch (\Exception $e) {
                    $this->genLog("Error al subir firma electrónica"); 
                }
        }
        
        try {
            Almacen::create($requestData);
            Session::flash('flash_message', 'Guardado correctamente');
            $this->genLog("Registró información de la empresa");
        } catch (\Exception $e) {
            Session::flash('warning', 'Error al Guardar '.$e);            
            $this->genLog("No se registró la empresa");
        }

        return redirect('admin/almacen');
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
        $almacen = Almacen::findOrFail($id);

        return view('admin.almacen.show', compact('almacen'));
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
        $almacen = Almacen::findOrFail($id);

        $paises = Pais::orderBy('id', 'DESC')->pluck('pais', 'id');
        $provincias = Provincias::orderBy('id', 'ASC')->pluck('provincia', 'id');
        $cantones = Canton::orderBy('id', 'ASC')->pluck('canton', 'id');

        return view('admin.almacen.edit', compact('almacen','paises','provincias','cantones'));
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
         'almacen' => 'required|max:75',
         'propietario' => 'max:75',
         'gerente' => 'max:75',
         'pag_web' => 'max:75',
         'razon_social' => 'max:75',
         'ruc' => 'max:999999999999999',
         'email' => 'max:75|email',
         'fecha_inicio' => 'max:15',
         'telefono' => 'max:15',
         'cel_movi' => 'max:15',
         'cel_claro' => 'max:15',
         'watsapp' => 'max:15',
         'dir' => 'max:191',
         'latitud' => 'max:50',
         'longitud' => 'max:50'
     ]);
        $requestData = $request->all();
        

        if ($request->hasFile('logo')) {
            $file = Input::file('logo');
            $uploadPath = public_path('uploads/logo/');
            $extension_ext = $file->getClientOriginalExtension();
            $extension = $file->getClientOriginalName();
            $image  = Image::make($file->getRealPath());
            //$image->resize(1200, 900);
            $fileName = rand(11111, 99999) . '.' . $extension;
            //$fileName = 'logo.' . $extension_ext;
            $image->save($uploadPath.$fileName);
            //$file->move($uploadPath, $fileName);
            $requestData['logo'] = 'uploads/logo/'.$fileName;
            $requestData['name_logo'] = $fileName;
            $item_delete = Almacen::findOrFail($id);   
            $move = $item_delete['name_logo'];
            $old = public_path('uploads/logo/').$move;
            if(!empty($move)){
                if(\File::exists($old)){
                    unlink($old);
                }
            }
            $this->genLog("Actualizó el logo de la empresa");
        }
        


        if ($request->hasFile('path_certificado')) {
            $certificate = Input::file('path_certificado');
            $uploadPath = public_path('archivos/certificado/');
            $filename = $certificate->getClientOriginalExtension();
            $name = $certificate->getClientOriginalName();
            if (file_exists($uploadPath.$name)) {
                unlink($uploadPath.$name);                
            }
            try {
                    $certificate->move($uploadPath,$name);
                    $requestData['path_certificado'] = $uploadPath.$name;
                    $this->genLog("Actualizó archivo firma electrónica"); 
                } catch (\Exception $e) {
                    $this->genLog("Error al subir firma electrónica"); 
                }
        }

        try {
            $almacen = Almacen::findOrFail($id);
            $almacen->update($requestData);
            Session::flash('flash_message', 'Actualizado correctamente');
            $this->genLog("Actualizó información de la empresa");
        } catch (\Exception $e) {
            $this->genLog("Error al actualizar información de la empresa");
            Session::flash('warning', 'Error al Actualizar '.$e);            
        }

       

        return redirect('admin/almacen');
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
        Almacen::destroy($id);

        return redirect('admin/almacen')->with('flash_message', 'Almacen deleted!');
    }

    public function genLog($mensaje)
    {
        $area = 'Configuración almacen';
        $logs = Svlog::log($mensaje,$area);
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
    
}
