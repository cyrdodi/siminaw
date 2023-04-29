<?php

namespace App\Models;

use App\Models\Platform;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Application extends Model
{
  use HasFactory;
  protected $casts = ['technologies' => 'array', 'organizations.contacts' => 'array'];

  protected $fillable = ['name', 'description', 'usage_id', 'platform_id', 'technologies', 'is_using_electronic_certificate', 'electronic_certificate_name', 'is_electronic_system_registered', 'data_location_id', 'is_integrated_with_central_govt', 'service_type_id', 'url', 'developer_id', 'vendor_id', 'dev_govt_id', 'is_online', 'is_active', 'user_id', 'options->enabled'];

  public function usage()
  {
    return $this->belongsTo(Usage::class);
  }

  public function platform()
  {
    return $this->belongsTo(Platform::class);
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
      ->withPivot(['contacts']);
  }
}
