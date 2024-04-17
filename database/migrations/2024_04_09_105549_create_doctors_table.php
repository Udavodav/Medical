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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->date('birthday');
            $table->unsignedBigInteger('competence_id');
            $table->unsignedBigInteger('user_id');

            $table->index('competence_id', 'doctors_competences_idx');
            $table->foreign('competence_id', 'doctors_competences_fk')
                ->on('competences')
                ->references('id');

            $table->index('user_id', 'doctors_users_idx');
            $table->foreign('user_id', 'doctors_users_fk')
                ->on('users')
                ->references('id');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
