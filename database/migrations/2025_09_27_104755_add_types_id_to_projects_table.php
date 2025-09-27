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
        Schema::table('projects', function (Blueprint $table) {
            // aggiungo la colonna type_id come chiave esterna
            $table->foreignId('type_id')->after('technologies_used')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropForeign(['projects_type_id_foreign']);// tolgo la foreign key
            $table->dropColumn('type_id');// tolgo la colonna type_id
        });
    }
};
