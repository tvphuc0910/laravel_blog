<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            'name' => 'Thuy',
            'level' => 1,
            'email' => 'thuynguyenminh62@gmail.com',
            'password' => 'nguyenminhthuy05072002@',
        ];
        User::create($data);

        $data = [
            'name' => 'Phuc',
            'level' => 1,
            'email' => 'tvphuc0910@gmail.com',
            'password' => 'tranvanphuc123',
        ];
        User::create($data);
    }
}
