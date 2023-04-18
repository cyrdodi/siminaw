<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Jenis;
use App\Models\DevGovt;
use App\Models\Developer;
use App\Models\Penggunaan;
use App\Models\ServiceType;
use Illuminate\Database\Seeder;

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

    $this->call([
      OrganizationSeeder::class
    ]);


    Developer::create([
      'name' => 'In House'
    ]);
    Developer::create([
      'name' => 'Vendor'
    ]);
    Developer::create([
      'name' => 'Pusat/K/L'
    ]);
    Developer::create([
      'name' => 'Diskomsantik'
    ]);

    Jenis::create([
      'name' => 'Website Informasi',
      'group' => '1'
    ]);
    Jenis::create([
      'name' => 'Aplikasi Website',
      'group' => '1'
    ]);
    Jenis::create([
      'name' => 'Aplikasi Desktop',
      'group' => '2'
    ]);
    Jenis::create([
      'name' => 'Android',
      'group' => '3'
    ]);
    Jenis::create([
      'name' => 'iOS',
      'group' => '3'
    ]);

    Penggunaan::create([
      'name' => 'Aplikasi Umum',
      'description' => 'Aplikasi yang umum digunakan OPD lain'
    ]);
    Penggunaan::create([
      'name' => 'Aplikasi Khusus',
      'description' => 'Aplikasi yang khusus digunakan di satu OPD'
    ]);

    ServiceType::create([
      'name' => 'Government to Government (G2G)',
      'description' => 'Layanan antar pemerintahan/OPD'
    ]);

    ServiceType::create([
      'name' => 'Government to Business (G2B)',
      'description' => 'Layanan dari pemerintah ke bisnis/pelaku usaha'
    ]);

    ServiceType::create([
      'name' => 'Government to Employee (G2E)',
      'description' => 'Layanan dari pemerintah ke pegawai'
    ]);

    ServiceType::create([
      'name' => 'Government to Society (G2S)',
      'description' => 'Layanan dari pemerintah ke masyarakat umum'
    ]);

    ServiceType::create([
      'name' => 'Government to Citizen (G2C)',
      'description' => 'Layanan dari pemerintah ke penduduk'
    ]);

    DevGovt::create([
      'name' => 'ANRI'
    ]);
  }
}
