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
        Schema::create('comments_doctors', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('doctor_id');
            $table->timestamp('date')->useCurrent();
            $table->text('text');

            $table->index('client_id', 'comments_doctors_clients_idx');
            $table->index('doctor_id', 'comments_doctors_doctors_idx');
            $table->foreign('client_id', 'comments_doctors_clients_fk')
                ->on('clients')
                ->references('id');
            $table->foreign('doctor_id', 'comments_doctors_doctors_fk')
                ->on('doctors')
                ->references('id');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments_doctors');
    }
};
