<?php

use Illuminate\Database\Seeder;
use App\Subcategorium as Subcategoria;

class SubcategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subcategoria::create( [
'id'=>1,
'Subcategoria'=>'s/n',
'detalle'=>'s/n',
'activo'=>1,
'categoria_id'=>'1',
'created_at'=>'2018-03-30 00:49:08',
'updated_at'=>'2018-03-30 00:59:50'
] );

    }
}
