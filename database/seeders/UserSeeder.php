<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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

        $data = [
            'name' => 'Phuc',
            'level' => 1,
            'email' => 'tvphuc0910@gmail.com',
            'password' => Hash::make('tranvanphuc123'),
        ];
        User::create($data);
    }
}
