<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Application extends Model
{
  use HasFactory;
  protected $casts = ['technologies' => 'array', 'organizations.detail' => 'array'];

  protected $fillable = ['name', 'description', 'penggunaan_id', 'jenis_id', 'technologies', 'is_using_electronic_certificate', 'electronic_certificate_name', 'is_electronic_system_registered', 'data_location_id', 'is_integrated_with_central_govt', 'service_type_id', 'url', 'developer_id', 'vendor_id', 'dev_govt_id', 'is_online', 'is_active', 'user_id', 'options->enabled'];

  public function penggunaan()
  {
    return $this->belongsTo(Penggunaan::class);
  }

  public function jenis()
  {
    return $this->belongsTo(Jenis::class);
  }

  public function dataLocation()
  {
    return $this->belongsTo(DataLocation::class);
  }

  public function serviceType()
  {
    return $this->belongsTo(ServiceType::class);
  }

  public function developer()
  {
    return $this->belongsTo(Developer::class);
  }

  public function vendor()
  {
    return $this->belongsTo(Vendor::class);
  }

  public function devGovt()
  {
    return $this->belongsTo(DevGovt::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function organizations(): BelongsToMany
  {
    return $this->belongsToMany(Organization::class)
      ->withPivot(['detail']);
  }
}
