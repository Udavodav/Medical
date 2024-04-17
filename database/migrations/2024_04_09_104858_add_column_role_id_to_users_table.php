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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id');

            $table->index('role_id','users_roles_idx');
            $table->foreign('role_id', 'users_roles_fk')
                ->on('roles')
                ->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_roles_fk');
            $table->dropIndex('users_roles_idx');
            $table->dropColumn('role_id');
        });
    }
};
