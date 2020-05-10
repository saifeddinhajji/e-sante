<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFourmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forums', function (Blueprint $table) {
            $table->id();          
            $table->string('titre');
            $table->string('sujet');
            $table->text('description');
            $table->text('urlvideo')->nullable();;
            $table->text('image')->nullable();;
            $table->integer('user_id')->unsigned()->index();
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
        Schema::dropIfExists('forums');
    }
}
