<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void {
        Student::factory( 50 )->create();
        User::factory( 10 )->create();

        User::factory()->create( [
            'name'     => 'Test User',
            'email'    => 'test@example.com',
            'phone'    => '01317785525',
            'password' => Hash::make( 'password' ),
        ] );
    }
}
