<?php

namespace Database\Seeders;

use App\Models\Family;
use App\Models\Option;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Storage::deleteDirectory('products');
        Storage::makeDirectory('products');

        User::factory()->create([
            'name' => 'Cesar Garcia',
            'email' => 'cesar@c.c',
            'password' => bcrypt('12345678')
        ]);

        $this->call([
            family_sedeer::class,
            OptionSeed::class,
        ]);

        Product::factory(100)->create();
    }
}
