<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('platforms', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->unsignedBigInteger('platform_group_id');
      $table->timestamps();

      $table->foreign('platform_group_id')->references('id')->on('platform_group');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('platforms');
  }
};
