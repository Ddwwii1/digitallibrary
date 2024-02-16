<?php

namespace Database\Seeders;


use App\Models\Users;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'id' => 1,
                'username' => 'Admin',
                'password' => Hash::make('admin'),
                'email' => 'admin@gmail.com',
                'nama_lengkap' => 'admin',
                'level_user' => 'Admin',
                'alamat' => 'Jombang'

            ],
            [
                'id' => 2,
                'username' => 'Mubin',
                'password' => Hash::make('petugas'),
                'email' => 'petugas@gmail.com',
                'nama_lengkap' => 'mubin',
                'level_user' => 'Petugas',
                'alamat' => 'XOW'
            ],
            [
                'id' => 3,
                'username' => 'Jamal',
                'password' => Hash::make('jamal'),
                'email' => 'jamal@gmail.com',
                'nama_lengkap' => 'jamal',
                'level_user' => 'Peminjam',
                'alamat' => 'PULO'
            ]
        ];
        Schema::disableForeignKeyConstraints();
        Users::insert($users);
        Schema::enableForeignKeyConstraints();
    }
}
