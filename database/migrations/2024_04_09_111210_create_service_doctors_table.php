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
        Schema::create('service_doctors', function (Blueprint $table) {
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('doctor_id');

            $table->primary(['service_id', 'doctor_id'],'service_doctors_pk');
            $table->foreign('service_id', 'service_doctors_services_fk')
                ->on('services')
                ->references('id');
            $table->foreign('doctor_id', 'service_doctors_doctors_fk')
                ->on('doctors')
                ->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_doctors');
    }
};
