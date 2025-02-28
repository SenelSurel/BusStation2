<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('stations', function (Blueprint $table) {
            $table->foreignId('direction_id')->constrained('districts')->onDelete('cascade');
            $table->foreignId('destination_id')->constrained('districts')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('stations', function (Blueprint $table) {
            $table->dropForeign(['direction_id']);
            $table->dropForeign(['destination_id']);
        });
    }
};
