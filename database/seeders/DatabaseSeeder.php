<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Guardian;
use App\Models\Kid;
use App\Models\MedicalHistory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
           UserSeeder::class,
           KidSeeder::class,
            GuardianSeeder::class,
            MedicalHistorySeeder::class,
        ]);

        Kid::factory(95)->create();
        Guardian::factory(95)->create();
        MedicalHistory::factory(95)->create();
    }
}
