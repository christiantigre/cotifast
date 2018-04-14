<?php

use Illuminate\Database\Seeder;
use App\producto;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
Producto::create( [
'id'=>1,
'producto'=>'Base Ventilador para laptop con elevador.',
'cod_barra'=>'098098',
'pre_compra'=>30.00,
'pre_venta'=>55.00,
'cantidad'=>'5',
'fecha_ingreso'=>'2018-04-01',
'compras'=>'5',
'ventas'=>NULL,
'saldo'=>'5',
'imagen'=>'uploads/productos/74528.base1.jpg',
'name_img'=>'74528.base1.jpg',
'nuevo'=>1,
'promocion'=>1,
'catalogo'=>1,
'activo'=>1,
'propaganda'=>'Base de doble USB potencia al máximo para enfriar tu pc.',
'categoria_id'=>9,
'subcategoria_id'=>1,
'marca_id'=>1,
'created_at'=>'2018-04-02 20:58:29',
'updated_at'=>'2018-04-02 20:58:29'
] );
    }
}
