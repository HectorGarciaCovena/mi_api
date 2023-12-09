<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

//Definimos la función
    public function datos(){

    // Se declara la variable de tipo arreglo
    $variable= array(

        "id"=>"01",
        "Nombres"=>"Héctor Miguel",
        "Apellidos"=>"García COveña",
        "Cédula"=>"1311719296"
    );

    // Convertimos los datos del arreglo en JSON
    return $this->response->setJson($variable);
}

public function animal(){

    $variable= array(

        "id"=>"01",
        "Tipo"=>"Perro",
        "Raza"=>"PitBull",
        "Sexo"=>"Macho"

    );

    return $this->response->setJson($variable);
}

public function fruta(){

    $variable= array(

        "id"=>"01",
        "Nombre"=>"Naranja",
        "Categoría"=>"Cítrico",
        "Aporte Nutritivo"=>"Vitamina C"

    );

    return $this->response->setJson($variable);
}

public function coche(){

    $variable= array(

        "id"=>"01",
        "Marca"=>"Toyota",
        "Año"=>"2023",
        "Precio"=>"$20.000"

    );

    return $this->response->setJson($variable);
}

}
