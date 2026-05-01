<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; 
use App\Models\Kategori; 

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Gunakan updateOrCreate agar jika email sudah ada, dia hanya mengupdate (tidak error)
        // Jika email belum ada, baru dia membuat data baru.

        User::updateOrCreate(
            ['email' => 'DBA@gmail.com'],
            ['nama' => 'Administrator', 'role' => User::SUPERADMIN, 'status' => 1, 'hp' => '0812345678901', 'password' => bcrypt('Burger3n@k')]
        ); 

        User::updateOrCreate(
            ['email' => 'adminBQ@gmail.com'],
            ['nama' => 'AdminBQ', 'role' => User::ADMIN, 'status' => 1, 'hp' => '081234567892', 'password' => bcrypt('Burger3n@k')]
        );

        User::updateOrCreate(
            ['email' => 'staffBQ@gmail.com'],
            ['nama' => 'StaffBQ', 'role' => User::STAFF, 'status' => 1, 'hp' => '081234567893', 'password' => bcrypt('Burger3n@k')]
        );

        User::updateOrCreate(
            ['email' => 'managerBQ@gmail.com'],
            ['nama' => 'ManagerBQ', 'role' => User::MANAGER, 'status' => 1, 'hp' => '081234567894', 'password' => bcrypt('Burger3n@k')]
        );

        // DATA BARU YANG MAU DITAMBAHKAN
        User::updateOrCreate(
            ['email' => 'customer@gmail.com'],
            ['nama' => 'Customer', 'role' => User::CUSTOMER, 'status' => 1, 'hp' => '081234567895', 'password' => bcrypt('galuh-d3v')]
        );

        // Untuk Kategori juga sebaiknya gunakan updateOrCreate agar tidak duplikat jika dijalankan lagi
        Kategori::updateOrCreate(['nama_kategori' => 'Makanan']); 
        Kategori::updateOrCreate(['nama_kategori' => 'Minuman']); 
        Kategori::updateOrCreate(['nama_kategori' => 'Cemilan']); 
    } 
}