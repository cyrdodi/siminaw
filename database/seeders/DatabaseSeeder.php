<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\DataLocation;
use App\Models\User;
use App\Models\Usage;
use App\Models\Vendor;
use App\Models\DevGovt;
use App\Models\Platform;
use App\Models\Developer;
use App\Models\ServiceType;
use App\Models\PlatformGroup;
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

    User::create([
      'organization_id' => 1,
      'name' => 'Cyrillus Dodi TY',
      'email' => 'dodi.diskomsantik@gmail.com',
      'password' => bcrypt('12345678'),
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

    PlatformGroup::create([
      'id' => 1,
      'name' => 'Website'
    ]);
    PlatformGroup::create([
      'id' => 2,
      'name' => 'Desktop'
    ]);
    PlatformGroup::create([
      'id' => 3,
      'name' => 'Mobile'
    ]);

    Platform::create([
      'name' => 'Website Informasi',
      'platform_group_id' => '1'
    ]);
    Platform::create([
      'name' => 'Aplikasi Website',
      'platform_group_id' => '1'
    ]);
    Platform::create([
      'name' => 'Aplikasi Desktop',
      'platform_group_id' => '2'
    ]);
    Platform::create([
      'name' => 'Android',
      'platform_group_id' => '3'
    ]);
    Platform::create([
      'name' => 'iOS',
      'platform_group_id' => '3'
    ]);

    Usage::create([
      'name' => 'Aplikasi Umum',
      'description' => 'Aplikasi yang umum digunakan OPD lain'
    ]);
    Usage::create([
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
      'name' => 'ANRI',
      'contacts' => []
    ]);
    Vendor::create([
      'name' => 'PT Maju Mundur',
      'contacts' => []
    ]);

    DataLocation::create([
      'name' => 'Diskomsantik'
    ]);
    DataLocation::create([
      'name' => 'PDN Kominfo'
    ]);
    DataLocation::create([
      'name' => 'Google Cloud Platform'
    ]);
    DataLocation::create([
      'name' => 'AWS'
    ]);
  }
}
