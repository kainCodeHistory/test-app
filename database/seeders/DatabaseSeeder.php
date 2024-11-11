<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
        $this->seedDefaultUsers(2);
    }
    private function seedDefaultUsers(int $quantity)
    {
        for ($k = 0; $k < $quantity; $k++) {
            $suffix = substr('0' . ($k + 1), -2);
            \App\Models\User::factory()->create([
                'username' => 'user' . $suffix,
                'email' => 'user' . $suffix . '@tests.com',
                'nickname' =>'user' . $suffix,
                'password' => Hash::make('123456')
            ]);
        }
    }
}
