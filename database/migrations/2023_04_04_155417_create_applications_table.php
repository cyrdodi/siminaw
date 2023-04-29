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
    Schema::create('applications', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->text('description');
      $table->unsignedBigInteger('usage_id');
      $table->unsignedBigInteger('platform_id');
      $table->json('technologies');
      $table->boolean('is_using_electronic_certificate')->nullable();
      $table->string('electronic_certificate_name')->nullable();
      $table->boolean('is_electronic_system_registered')->nullable();
      $table->unsignedBigInteger('data_location_id');
      $table->boolean('is_integrated_with_central_govt')->nullable();
      $table->unsignedBigInteger('service_type_id');
      $table->string('url')->nullable();
      $table->unsignedBigInteger('developer_id');
      $table->unsignedBigInteger('vendor_id')->nullable();
      $table->unsignedBigInteger('dev_govt_id')->nullable();
      $table->boolean('is_online');
      $table->boolean('is_active');
      $table->unsignedBigInteger('user_id');
      $table->timestamps();

      $table->foreign('usage_id')->references('id')->on('usage');
      $table->foreign('platform_id')->references('id')->on('platforms');
      $table->foreign('data_location_id')->references('id')->on('data_locations');
      $table->foreign('service_type_id')->references('id')->on('service_types');
      $table->foreign('developer_id')->references('id')->on('developers');
      $table->foreign('vendor_id')->references('id')->on('vendors');
      $table->foreign('dev_govt_id')->references('id')->on('dev_govt');
      $table->foreign('user_id')->references('id')->on('users');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('applications');
  }
};
