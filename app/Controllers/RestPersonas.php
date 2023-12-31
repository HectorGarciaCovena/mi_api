<?php
namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\PersonasModel;

//Definición del Controlador y sus Propiedades
class RestPersonas extends ResourceController
{
    protected $modelName = 'App\Models\PersonasModel';
    protected $format    = 'json';

    public function index()
    {
        $model = new PersonasModel(); //Crea una instancia del modelo "PersonasModel"
        return $this->respond($model->findAll()); //obtiene todos los registros
    }

    // Función que OBTIENE los elementos de la API
    public function show($id = null) //Muestra un elemento específico de la API según su ID
    {
        $model = new PersonasModel();
        $data = $model->find($id);

        //Si el registro existe, responde con la información obtenida; 
        //de lo contrario, responde con un mensaje de error.
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('No se encontró el registro con el ID ' . $id);
        }
    }

    // Función que INSERTA un elemento de la API
    public function create()
    {
        $model = new PersonasModel();
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'edad' => $this->request->getPost('edad'),
            'correo' => $this->request->getPost('correo')
        ];

        $data = $this->request->getJSON(); // Convierte la información obtenida en formato JSON
        
        $model->insert($data); //Inserta un nuevo registro

        return $this->respondCreated($data); 
        
    }

    // Función que ACTUALIZA un elemento de la API
    public function update($id = null)
    {
        $model = new PersonasModel();
        $data = [
            'nombre' => $this->request->getRawInput('nombre'),
            'apellido' => $this->request->getRawInput('apellido'),
            'edad' => $this->request->getRawInput('edad'),
            'correo' => $this->request->getRawInput('correo'),
        ];

        $data = $this->request->getJSON(); // Convierte la información obtenida en formato JSON

        $model->update($id, $data); //Utiliza este método del modelo para ACTUALIZAR el registro

        return $this->respond($model->find($id));
    }

    // Función que ELIMINA un elemento de la API
    public function delete($id = null)
    {
        $model = new PersonasModel();
        
        $model->delete($id); //Utiliza este método del modelo para ELIMINAR el registro

        return $this->respondDeleted(['id' => $id]);
    }
}