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
        Schema::create('kuisioner_jawabans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kuisioner_id')->constrained()->onDelete('cascade');
            $table->string('jawaban');
            $table->string('keterangan')->nullable();
            $table->boolean('lainnya')->default(false);
            $table->integer('level');
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
        Schema::dropIfExists('kuisioner_jawabans');
    }
};
