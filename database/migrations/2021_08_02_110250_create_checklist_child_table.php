<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChecklistChildTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checklist_child', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('child_id');
            $table->foreign('child_id')->references('id')->on('children')->onDelete('cascade');
            $table->unsignedBigInteger('checklist_id');
            $table->foreign('checklist_id')->references('id')->on('checklists')->onDelete('cascade');
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
        Schema::dropIfExists('checklist_child');
    }
}
