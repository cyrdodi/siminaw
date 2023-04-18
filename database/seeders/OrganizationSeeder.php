<?php

namespace Database\Seeders;

use App\Models\Organization;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrganizationSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    Organization::create([
      'name' => 'Dinas Komunikasi Informatika Sandi dan Statistik',
      'acronym' => 'Diskomsantik',
      'address' => 'Pandeglang'
    ]);
    Organization::create([
      'name' => 'Sekretariat Daerah',
      'acronym' => 'Setda',
      'address' => 'Pandeglang'
    ]);
  }
}
