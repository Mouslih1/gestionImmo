<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Option;
use App\Models\Property;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
/*
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'MOUSLIH marouane',
            'email' => 'maromouslih@gmail.com',
            'password' => Hash::make('0000')
        ]);

        $options = Option::factory(6)->create();

        Property::factory(50)->hasAttached($options->random(3))->create();
*/
    }
}
