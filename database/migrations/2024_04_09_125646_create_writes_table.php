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
        Schema::create('writes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('doctor_id');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('service_id');
            $table->date('date_write');
            $table->string('time_write');

            $table->index('doctor_id', 'writes_doctors_idx');
            $table->index('client_id', 'writes_clients_idx');
            $table->index('service_id', 'writes_services_idx');

            $table->foreign('doctor_id', 'writes_doctors_fk')
                ->on('doctors')
                ->references('id');
            $table->foreign('client_id', 'writes_clients_fk')
                ->on('clients')
                ->references('id');
            $table->foreign('service_id', 'writes_services_fk')
                ->on('services')
                ->references('id');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('writes');
    }
};
