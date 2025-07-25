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
        Schema::table('harga_tindakans', function (Blueprint $table) {
            $table->unsignedInteger('visit_type_id')->nullable()->after('id');

            // Tambahkan foreign key
            $table->foreign('visit_type_id')->references('id')->on('visit_types')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('harga_tindakans', function (Blueprint $table) {
            $table->dropForeign(['visit_type_id']);
            $table->dropColumn('visit_type_id');
        });
    }
};
