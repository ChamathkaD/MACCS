<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('midwife_id')->nullable();
            $table->foreign('midwife_id')->references('id')->on('midwives')->onDelete('cascade');
            $table->morphs('appointmentable');
            $table->date('date');
            $table->time('time');
            $table->string('venue');
            $table->text('notes')->nullable();
            $table->date('reschedule_date')->nullable();
            $table->time('reschedule_time')->nullable();
            $table->string('reschedule_venue')->nullable();
            $table->text('reschedule_notes')->nullable();
            $table->boolean('is_approved')->default(false);
            $table->boolean('is_declined')->default(false);
            $table->boolean('is_canceled')->default(false);
            $table->text('cancellation_reason')->nullable();
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
        Schema::dropIfExists('appointments');
    }
}
