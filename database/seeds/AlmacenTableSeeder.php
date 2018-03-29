<?php

use Illuminate\Database\Seeder;
use App\Almacen;

class AlmacenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Almacen::create( [
    		'id'=>1,
    		'almacen'=>'NameEmp',
    		'propietario'=>'name lastname',
    		'gerente'=>'name lastname',
    		'pag_web'=>'linkweb.com',
    		'razon_social'=>'name lastname',
    		'ruc'=>'0101001101001',
    		'email'=>'mailempresa@gmail.com',
    		'fecha_inicio'=>'2018-03-03',
    		'logo'=>'uploads/logo/20435.logo pc RGB.png',
    		'slogan'=>'Web, Multimedia etc',
    		'name_logo'=>'20435.logo pc RGB.png',
    		'activo'=>1,
    		'telefono'=>'2593-555',
    		'fax'=>'2593-555',
    		'cel_movi'=>'0991231230',
    		'cel_claro'=>'0991231230',
    		'watsapp'=>'0991231230',
    		'fb'=>'linkweb.com',
    		'tw'=>'linkweb.com',
    		'ins'=>'linkweb.com',
    		'gg'=>'linkweb.com',
    		'funcion_empresa'=>'Compra Venta de tecnología.',
    		'dirMatriz'=>'Gualaceo',
    		'dirSucursal'=>'Gualaceo',
    		'latitud'=>'098',
    		'longitud'=>'098',
    		'pais_id'=>1,
    		'provincia_id'=>1,
    		'canton_id'=>3,
    		'obligado_contabilidad'=>1,
    		'path_certificado'=>'C:\\Users\\Andres\\Dropbox\\Dropbox\\cotifast\\public\\archivos/certificado/christian_andres_tigre_condo.p12',
    		'clave_certificado'=>'passwordfile',
    		'modo_ambiente'=>1,
    		'tipo_emision'=>1,
    		'habilitar_facelectronica'=>1,
    		'auth_sri'=>'1234567890',
    		'codestablecimiento'=>'001',
    		'codpntemision'=>'001',
    		'created_at'=>'2018-03-29 21:13:12',
    		'updated_at'=>'2018-03-29 21:41:21'
    	] );
    }
}
