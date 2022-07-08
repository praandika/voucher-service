<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::insert([
            [
                'name' => 'Admin',
                'username' => 'admin',
                'password' => Hash::make('bismagroup'),
                'created_at' => Carbon::now('GMT+8')->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
