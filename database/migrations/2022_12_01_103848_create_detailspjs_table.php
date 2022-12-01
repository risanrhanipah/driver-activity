<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailspjsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailspjs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('spj_id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('keperluan');
            $table->unsignedBigInteger('nominal');
            $table->integer('jumlah');
            $table->integer('total');
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
        Schema::dropIfExists('detailspjs');
    }
}