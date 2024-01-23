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
        Schema::create(
            'stages',
            function (Blueprint $table) {
                $table->id();
                $table->string('type', 255)->nullable();
                $table->string('end_of_internship_certificate', 255)->nullable();
                $table->string('rapport', 255)->nullable();
                $table->unsignedBigInteger('company_id');
                $table->unsignedBigInteger('etudiant_id');
                $table->unsignedBigInteger('encadrant_id');
                $table->string('journal');
                $table->boolean('affected');
                $table->string('letter');
                $table->dateTime('dateD_stage');
                $table->dateTime('dateF_stage');
                $table->dateTime('dateS');
                $table->string('etat');
                $table->string('etat_societe');
                $table->timestamps();
                $table->foreign('company_id')->references('id')->on('users');
                $table->foreign('etudiant_id')->references('id')->on('users');
                $table->foreign('encadrant_id')->references('id')->on('users');
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stages');
    }
};
