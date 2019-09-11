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
        //factory(App\Brand::class, 50)->create();
        //factory(\App\Product::class, 100)->create();
        //factory(\App\Category::class, 50)->create();
        //$this->call(RoleTableSeeder::class);
        factory(\App\User::class, 50)->create();
    }
}
