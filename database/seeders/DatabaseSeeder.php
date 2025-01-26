<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Option;
use App\Models\Property;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'email' => 'antaress@gmail.com',
            'name' => 'antaress',
            'password' => Hash::make('root')
        ]);
        $options = Option::factory(12)->create();
        Property::factory(50)
            ->hasAttached($options->random(4))
            ->create();
    }
}
