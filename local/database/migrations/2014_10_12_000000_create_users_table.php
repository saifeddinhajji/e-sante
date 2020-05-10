<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('prenom');
            $table->string('password');

            $table->string('role')->default('patient')->comment('admin or patient or professionnel');
            
            $table->string('telephone')->nullable();
            $table->string('civilite')->nullable();
            $table->string('codepostal')->nullable();
            $table->string('ville')->nullable();
            $table->string('photoprofile')->default('profile.png');
            
            $table->date('date_naissance')->nullable();;
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
