<?php

namespace Database\Seeders;

use App\Models\category;
use App\Models\Product;
use App\Models\store;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      //  store::factory(5)->create();
    //category::factory(5)->create();
    //  Product::factory(10)->create();

    $this->call(UserSeerder::class);
    }
}
