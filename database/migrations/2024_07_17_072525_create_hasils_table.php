<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasils', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('respondens_id')->constrained('respondens')->onDelete('cascade');
            $table->foreignId('survey_id')->constrained('surveys')->onDelete('cascade');
            $table->foreignId('kuisioner_id')->constrained('kuisioners')->onDelete('cascade');
            $table->foreignId('jawabans_id')->constrained('jawabans')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hasils');
    }
};
