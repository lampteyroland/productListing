<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class   DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//         User::factory(10)->create();

         $user = User::factory()->create([
             'name' => 'Roland Lamptey',
             'email' => 'roland@roland.com',
         ]);

        Product::factory(10)->create(
           [
               'user_id' => $user->id
           ]
        );

    }
}
