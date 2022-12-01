<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->datetime('date_in');
            $table->datetime('date_out')->nullable();
            $table->time('start_ot')->nullable();
            $table->time('finish_ot')->nullable();
            $table->integer('jumlah_ot')->nullable();
            $table->integer('km_in')->nullable();
            $table->integer('km_out')->nullable();
            $table->integer('usage')->nullable();
            // $table->integer('progress')->comment('progress (%)');
            $table->text('ket')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendances');
    }
}
