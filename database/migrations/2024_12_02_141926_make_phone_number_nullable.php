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
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone_number')->nullable()->change();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

// Zelfs als het telefoonnummer bij registratie niet wordt ingevuld, kunnen gebruikers het later aanvullen of wijzigen.
// Het hebben van een veld in de database maakt dit eenvoudig mogelijk. (nullable)

