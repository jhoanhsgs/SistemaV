<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
            $this->call([RolerSeeder::class]);

            User::create([
                'name'=> "admin",
                'email'=>"admin@admin.com",
                'password'=>Hash::make('12345678'),
                ])->assignRole('admin');

                User::create([
                    'name'=> "jhoan",
                    'email'=>"jhoanm499@gmail.com",
                    'password'=>Hash::make('123'),
                    ])->assignRole('usuario');

                    $this->call([CategoriasSeeder::class]);
    }
}
