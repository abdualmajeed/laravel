<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'          => 'abdo',
            'email'         => 'abdo@admin.com',
            'password'      => Hash::make('19841984'),
            'phone'         => '772132475',
        ])->attachRole('admin');
        User::create([
            'name'          => 'alaa',
            'email'         => 'alaa@gmail.com',
            'password'      => Hash::make('12345'),
            'phone'         => '772132475',
        ])->attachRole('client');



    }

}
