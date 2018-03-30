<?php

use Illuminate\Database\Seeder;
use App\Descuento;

class DescuentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	Descuento::create( [
    		'id'=>1,
    		'descuento'=>'0.00',
    		'activo'=>1,
    		'created_at'=>'2018-03-09 22:32:19',
    		'updated_at'=>'2018-03-09 22:38:21'
    	] );

        Descuento::create( [
    		'id'=>2,
    		'descuento'=>'5.00',
    		'activo'=>1,
    		'created_at'=>'2018-03-09 22:32:19',
    		'updated_at'=>'2018-03-09 22:38:21'
    	] );
    	
    	Descuento::create( [
    		'id'=>3,
    		'descuento'=>'10.00',
    		'activo'=>1,
    		'created_at'=>'2018-03-09 22:35:48',
    		'updated_at'=>'2018-03-09 22:38:29'
    	] );
    	
    	Descuento::create( [
    		'id'=>4,
    		'descuento'=>'15.00',
    		'activo'=>1,
    		'created_at'=>'2018-03-09 22:36:04',
    		'updated_at'=>'2018-03-09 22:38:41'
    	] );
    	
    	Descuento::create( [
    		'id'=>5,
    		'descuento'=>'20.00',
    		'activo'=>1,
    		'created_at'=>'2018-03-09 22:38:57',
    		'updated_at'=>'2018-03-09 22:38:57'
    	] );
    	
    	Descuento::create( [
    		'id'=>6,
    		'descuento'=>'25.00',
    		'activo'=>1,
    		'created_at'=>'2018-03-09 22:39:04',
    		'updated_at'=>'2018-03-09 22:39:04'
    	] );
    	
    	Descuento::create( [
    		'id'=>7,
    		'descuento'=>'30.00',
    		'activo'=>1,
    		'created_at'=>'2018-03-09 22:40:03',
    		'updated_at'=>'2018-03-09 22:40:03'
    	] );
    	
    	Descuento::create( [
    		'id'=>8,
    		'descuento'=>'35.00',
    		'activo'=>1,
    		'created_at'=>'2018-03-09 22:40:13',
    		'updated_at'=>'2018-03-09 22:40:13'
    	] );
    	
    	Descuento::create( [
    		'id'=>9,
    		'descuento'=>'40.00',
    		'activo'=>1,
    		'created_at'=>'2018-03-09 22:40:20',
    		'updated_at'=>'2018-03-09 22:40:20'
    	] );
    	
    	Descuento::create( [
    		'id'=>10,
    		'descuento'=>'45.00',
    		'activo'=>1,
    		'created_at'=>'2018-03-09 22:40:26',
    		'updated_at'=>'2018-03-09 22:40:26'
    	] );
    	
    	Descuento::create( [
    		'id'=>11,
    		'descuento'=>'50.00',
    		'activo'=>1,
    		'created_at'=>'2018-03-09 22:40:31',
    		'updated_at'=>'2018-03-09 22:40:31'
    	] );
    	
    	Descuento::create( [
    		'id'=>12,
    		'descuento'=>'55.00',
    		'activo'=>1,
    		'created_at'=>'2018-03-09 22:40:37',
    		'updated_at'=>'2018-03-09 22:40:37'
    	] );
    	
    	Descuento::create( [
    		'id'=>13,
    		'descuento'=>'60.00',
    		'activo'=>1,
    		'created_at'=>'2018-03-09 22:40:44',
    		'updated_at'=>'2018-03-09 22:40:44'
    	] );
    	
    	Descuento::create( [
    		'id'=>14,
    		'descuento'=>'65.00',
    		'activo'=>1,
    		'created_at'=>'2018-03-09 22:40:54',
    		'updated_at'=>'2018-03-09 22:40:54'
    	] );
    	
    	Descuento::create( [
    		'id'=>15,
    		'descuento'=>'70.00',
    		'activo'=>1,
    		'created_at'=>'2018-03-09 22:41:11',
    		'updated_at'=>'2018-03-09 22:41:11'
    	] );
    	
    	Descuento::create( [
    		'id'=>16,
    		'descuento'=>'75.00',
    		'activo'=>1,
    		'created_at'=>'2018-03-09 22:41:33',
    		'updated_at'=>'2018-03-09 22:41:33'
    	] );
    	
    	Descuento::create( [
    		'id'=>17,
    		'descuento'=>'80.00',
    		'activo'=>1,
    		'created_at'=>'2018-03-09 22:41:40',
    		'updated_at'=>'2018-03-09 22:41:40'
    	] );
    	
    	Descuento::create( [
    		'id'=>18,
    		'descuento'=>'85.00',
    		'activo'=>1,
    		'created_at'=>'2018-03-09 22:41:48',
    		'updated_at'=>'2018-03-09 22:41:48'
    	] );
    	
    	Descuento::create( [
    		'id'=>19,
    		'descuento'=>'90.00',
    		'activo'=>1,
    		'created_at'=>'2018-03-09 22:41:53',
    		'updated_at'=>'2018-03-09 22:41:53'
    	] );
    	
    	Descuento::create( [
    		'id'=>20,
    		'descuento'=>'95.00',
    		'activo'=>1,
    		'created_at'=>'2018-03-09 22:42:00',
    		'updated_at'=>'2018-03-09 22:42:00'
    	] );
    	
    	Descuento::create( [
    		'id'=>21,
    		'descuento'=>'100.00',
    		'activo'=>1,
    		'created_at'=>'2018-03-09 22:42:05',
    		'updated_at'=>'2018-03-09 22:42:05'
    	] );
    }
}
