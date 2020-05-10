<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRendezVousTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rendezvous', function (Blueprint $table) {
            $table->id();        
            $table->datetime('date');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('hopital_id')->unsigned()->index();
            $table->text('description')->nullable();
            $table->string('etat')->default('atende')->comment('refuse or accepte or atende');
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
        Schema::dropIfExists('rendezvous');
    }
}
