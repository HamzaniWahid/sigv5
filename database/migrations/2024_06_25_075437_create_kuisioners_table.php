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
        Schema::create('kuisioners', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('surveys_id')->constrained()->onDelete('cascade');
            $table->string('pertanyaan');
            $table->enum('tipe', ['isian', 'pilihan_ganda']);
            $table->integer('level')->nullable();
            $table->integer('syarat')->nullable();
            // $table->foreignId('hasil_id')->nullable()->constrained('kuisioner_hasils')->onDelete('cascade');
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
        Schema::dropIfExists('kuisioners');
    }
};
