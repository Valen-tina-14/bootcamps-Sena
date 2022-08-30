<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use File;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1.leer el archivo de datos 
        $json=File::get('database/_data/users.json');
        //2.convertir los datos del json en un arreglo
        $arreglo_usuarios=json_decode($json);
        //3.recorrer el arreglo
       //var_dump($arreglo_usuarios);
       foreach($arreglo_usuarios as $usuario){
         //4.por cada elemento del arreglo crear 
        //un <<entity>> 
        //se utiliza el metodo::create
        User::create([
            "name" => $usuario->name,
            "email" => $usuario->email,
            "password" => Hash::make($usuario->password)
        ]);
       }
    }
}
