<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**********************create patient *************************/
        DB::table('users')->insert([
            'name' => 'selima',
            'prenom' =>'selima',
            'email' => 'selima@gmail.com',
            'role'=>'patient',
            'photoprofile' =>'profile.png',
            'civilite' =>'madame',
            'password' => bcrypt('password'),            
        ]);
       
         /**********************create professionnel *************************/
        DB::table('users')->insert([
            'name' => 'saif eddinne',
            'prenom' =>'hajji',
            'email' => 'saifeddine@gmail.com',
            'role'=>'professionnel',
            'photoprofile' =>'profile.png',
            'civilite' =>'madame',
            'password' => bcrypt('password'),            
        ]);
          /**********************create admin *************************/
        DB::table('users')->insert([
            'name' => 'nada',
            'prenom' =>'nada',
            'email' => 'nada@email.com',
            'role'=>'admin',
            'photoprofile' =>'profile.png',
            'civilite' =>'madame',
            'password' => bcrypt('password'),            
        ]);
    }
}
