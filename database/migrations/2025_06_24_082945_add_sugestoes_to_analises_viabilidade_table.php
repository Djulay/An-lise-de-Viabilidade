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
        Schema::table('analises_viabilidade', function (Blueprint $table) {
            $table->text('sugestoes')->nullable();
        });
    }

    public function down()
    {
        Schema::table('analises_viabilidade', function (Blueprint $table) {
            $table->dropColumn('sugestoes');
        });
    }
};
