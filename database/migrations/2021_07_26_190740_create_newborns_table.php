<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewbornsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newborns', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('child_id');
            $table->foreign('child_id')->references('id')->on('children')->onDelete('cascade');
            $table->string('apgar_score');
            $table->float('birth_height');
            $table->float('birth_hcm');
            $table->string('skin');
            $table->string('eyes');
            $table->float('temperature');
            $table->text('notes');
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
        Schema::dropIfExists('newborns');
    }
}
