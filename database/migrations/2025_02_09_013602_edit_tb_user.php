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
        Schema::table('tb_users', function (Blueprint $table) {
            //remover columa store_name
            $table->dropColumn('store_name');
        });

        Schema::table('tb_store', function (Blueprint $table) {
            //add columa store_name
            $table->dropColumn('name');
            $table->string('store_name')->after('id_user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
