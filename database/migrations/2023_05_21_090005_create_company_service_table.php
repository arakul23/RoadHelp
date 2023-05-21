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
        Schema::create('company_service', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('company_id')->unsigned();
            $table->bigInteger('service_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreign('service_id')->references('id')->on('services')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_service');
    }
};
