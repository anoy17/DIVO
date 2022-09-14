<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addfiles', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id('id');
            $table->unsignedBigInteger('warehouse');
            $table->unsignedBigInteger('roomnumber');
            $table->unsignedBigInteger('racknumber');
            $table->unsignedBigInteger('boxnumber');
            $table->string('filename');
            $table->string('filenumber');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->foreign('warehouse')->references('id')->on('addwarehouses')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('roomnumber')->references('id')->on('addrooms')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('racknumber')->references('id')->on('addracks')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('boxnumber')->references('id')->on('addboxes')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addfiles');
    }
}
