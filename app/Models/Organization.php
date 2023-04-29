<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Organization extends Model
{
  use HasFactory, SoftDeletes;

  protected $casts = ['pivot.contacts' => 'array'];

  protected $fillable = [
    'name',
    'acronym',
    'address'
  ];

  public function applications(): BelongsToMany
  {
    return $this->belongsToMany(Application::class)->withPivot('contacts');
  }
}
