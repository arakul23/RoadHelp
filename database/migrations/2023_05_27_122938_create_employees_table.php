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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('surname');
            $table->text('patronymic');
            $table->bigInteger('country_id')->unsigned();
            $table->text('special_marks');
            $table->text('referral_link')->nullable();
            $table->integer('count_visit')->default(0);
            $table->foreign('country_id')->references('id')->on('countries')
                ->restrictOnDelete()
                ->restrictOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
