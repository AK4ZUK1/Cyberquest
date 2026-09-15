<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pks', function (Blueprint $table) {
            $table->foreignId('facilitator_id')->nullable()->constrained('facilitators')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('pks', function (Blueprint $table) {
            $table->dropForeign(['facilitator_id']);
            $table->dropColumn('facilitator_id');
        });
    }
};