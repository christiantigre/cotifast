<?php

use Illuminate\Database\Seeder;
use App\Categorium as Categoria;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create( [
'id'=>1,
'categoria'=>'Banner',
'detalle'=>'Baner de 12mm x 35mm',
'activo'=>1,
'created_at'=>'2018-03-30 00:49:08',
'updated_at'=>'2018-03-30 00:59:50'
] );
			
Categoria::create( [
'id'=>2,
'categoria'=>'Rotulo',
'detalle'=>'Rotulos pequeños',
'activo'=>1,
'created_at'=>'2018-03-30 01:01:16',
'updated_at'=>'2018-03-30 01:01:16'
] );
			
Categoria::create( [
'id'=>3,
'categoria'=>'Tarjetas',
'detalle'=>'Tarjetas de presentación',
'activo'=>1,
'created_at'=>'2018-03-30 01:01:41',
'updated_at'=>'2018-03-30 01:01:41'
] );
			
Categoria::create( [
'id'=>4,
'categoria'=>'Volantes',
'detalle'=>'Hojas volantes',
'activo'=>1,
'created_at'=>'2018-03-30 01:02:01',
'updated_at'=>'2018-03-30 01:02:01'
] );
			
Categoria::create( [
'id'=>5,
'categoria'=>'Letrero reglamentario municipio',
'detalle'=>'Letreros de 1.20cm x 0.70',
'activo'=>1,
'created_at'=>'2018-03-30 01:02:46',
'updated_at'=>'2018-03-30 01:02:58'
] );
			
Categoria::create( [
'id'=>6,
'categoria'=>'Diseño de logo',
'detalle'=>'Diseño de logo',
'activo'=>1,
'created_at'=>'2018-03-30 01:03:15',
'updated_at'=>'2018-03-30 01:04:05'
] );
			
Categoria::create( [
'id'=>7,
'categoria'=>'Diseño de tarjetas',
'detalle'=>'Diseño de tarjetas',
'activo'=>1,
'created_at'=>'2018-03-30 01:03:26',
'updated_at'=>'2018-03-30 01:03:55'
] );
			
Categoria::create( [
'id'=>8,
'categoria'=>'Diseño corporativo',
'detalle'=>'Diseño corporativo',
'activo'=>1,
'created_at'=>'2018-03-30 01:03:43',
'updated_at'=>'2018-03-30 01:04:16'
] );
    }
}
