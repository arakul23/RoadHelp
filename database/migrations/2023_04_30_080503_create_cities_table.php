<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->bigInteger('region_id')->unsigned();
            $table->bigInteger('area_id')->unsigned();
            $table->foreign('region_id')->references('id')->on('regions')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->foreign('area_id')->references('id')->on('areas')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
