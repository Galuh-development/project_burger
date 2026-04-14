<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([ 
            'nama' => 'Administrator','email' => 'DBA@gmail.com','role' => User::SUPERADMIN, 'status' => 1,'hp' => '0812345678901','password' => bcrypt('Burger3n@k'), 
        ]); 
        #untuk record berikutnya silahkan, beri nilai berbeda pada nilai: nama, email, hp dengan nilai masing-masing anggota kelompok 
        User::create([ 
            'nama' => 'AdminBQ','email' => 'adminBQ@gmail.com','role' => User::ADMIN,'status' => 1,'hp' => '081234567892','password' => bcrypt('Burger3n@k'), 
        ]);
        User::create([ 
            'nama' => 'StaffBQ','email' => 'staffBQ@gmail.com','role' => User::STAFF,'status' => 1,'hp' => '081234567893','password' => bcrypt('Burger3n@k'), 
        ]);
        User::create([ 
            'nama' => 'ManagerBQ','email' => 'managerBQ@gmail.com','role' => User::MANAGER,'status' => 1,'hp' => '081234567894','password' => bcrypt('Burger3n@k'), 
        ]);
        #data kategori 
        kategori::create([ 
        'nama_kategori' => 'Makanan', 
        ]); 
        kategori::create([ 
        'nama_kategori' => 'Minuman', 
        ]); 
        kategori::create([ 
        'nama_kategori' => 'Cemilan', 
        ]); 
    } 
} 


