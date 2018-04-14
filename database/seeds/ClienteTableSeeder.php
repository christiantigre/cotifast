<?php

use Illuminate\Database\Seeder;
use App\Cliente;

class ClienteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cliente::create( [
'id'=>1,
'nombre'=>'Christian',
'apellido'=>'Tigre',
'cedula'=>'0105118509',
'ruc'=>'0105118509001',
'email'=>'andrestigre69@gmail.com',
'telefono'=>'2203584',
'cel_movi'=>'0992702599',
'cel_claro'=>'0985288525',
'wts'=>'0992702599',
'direccion'=>'Jaime Roldós y Manuel Moreno',
'fecha_nacimiento'=>'2018-03-03',
'estado_civil'=>'1',
'genero'=>'1',
'activo'=>1,
'pais_id'=>1,
'provincia_id'=>1,
'canton_id'=>3,
'created_at'=>'2018-04-05 21:43:31',
'updated_at'=>'2018-04-05 21:43:31'
] );
    }
}
