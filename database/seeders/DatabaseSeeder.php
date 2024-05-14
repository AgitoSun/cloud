<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'email' => 'zeke1@mail.ru',
         ]);

        \App\Models\Profile::create([
            'name' => 'Максим',
            'surname' => 'Подлегаев',
            'is_admin' => true,
            'user_id' => 1,
        ]);

        \App\Models\Setting::create([
            'user_id' => 1,
            'storage_limit' => 50,
        ]);
    }
}
