<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admininfo;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    private $id;

    public function generateRandomNumber()
    {
        $this->id = mt_rand(1, 100000);
    }

    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        $this->generateRandomNumber();

        Admininfo::create([
            'admin_id' => $this->id,
            'username' => 'Username',
            'email' => $this->id.'@example.com',
            'password' => bcrypt('admin@123')
        ]);
    }
}