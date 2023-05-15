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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->bigInteger('region_id')->unsigned();
            $table->bigInteger('city_id')->unsigned();
            $table->foreign('region_id')->references('id')->on('regions')
                ->restrictOnDelete()
                ->cascadeOnUpdate();
            $table->foreign('city_id')->references('id')->on('cities')
                ->restrictOnDelete()
                ->cascadeOnUpdate();
            $table->text('address');
            $table->text('phone_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
