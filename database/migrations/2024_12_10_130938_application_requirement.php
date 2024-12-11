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
        Schema::disableForeignKeyConstraints();

        Schema::create('application_requirement', function (Blueprint $table) {
            $table->unsignedBigInteger('application_id');
            $table->foreign('application_id')->references('id')->on('applications');
            $table->unsignedBigInteger('requirement_id');
            $table->foreign('requirement_id')->references('id')->on('requirements');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application_requirement');
    }
};
