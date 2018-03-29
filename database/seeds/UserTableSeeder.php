<?php

use Illuminate\Database\Seeder;
use App\Admin;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Admin::create( [
    		'id'=>1,
    		'name'=>'Andres',
    		'email'=>'andrescondo17@gmail.com',
    		'password'=>'$2y$10$SaPuoepEG0wCOWx99h0UeeRjgebiLXUWsiVeAsL67TU3LlPM4Tfe2',
    		'remember_token'=>NULL,
    		'created_at'=>'2018-03-29 20:29:32',
    		'updated_at'=>'2018-03-29 20:29:32'
    	] );


    }
}
