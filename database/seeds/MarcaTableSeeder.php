<?php

use Illuminate\Database\Seeder;
use App\Marca;

class MarcaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Marca::create( [
    		'id'=>1,
    		'created_at'=>'2018-03-30 01:17:17',
    		'updated_at'=>'2018-03-30 01:17:17',
    		'Marca'=>'s/n',
    		'detalle'=>'s/n',
    		'activo'=>'1'
    	] );


    }
}
