<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(EcuadTableSeeder::class);
        $this->call(AlmacenTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(SubcategoryTableSeeder::class);
        $this->call(MarcaTableSeeder::class);
        $this->call(DescuentosTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(ClienteTableSeeder::class);
    }
}
