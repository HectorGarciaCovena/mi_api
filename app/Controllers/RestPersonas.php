<?php
namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\PersonasModel;

class RestPersonas extends ResourceController
{
    protected $modelName = 'App\Models\PersonasModel';
    protected $format    = 'json';

    public function index()
    {
        $model = new PersonasModel();
        return $this->respond($model->findAll());
    }

    public function show($id = null)
    {
        $model = new PersonasModel();
        $data = $model->find($id);

        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('No se encontró el registro con el ID ' . $id);
        }
    }

    public function create()
    {
        $model = new PersonasModel();
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'edad' => $this->request->getPost('edad'),
            'correo' => $this->request->getPost('correo')
        ];

        $data = $this->request->getJSON();
        
        $model->insert($data);

        return $this->respondCreated($data);
        
    }

    public function update($id = null)
    {
        $model = new PersonasModel();
        $data = [
            'nombre' => $this->request->getRawInput('nombre'),
            'apellido' => $this->request->getRawInput('apellido'),
            'edad' => $this->request->getRawInput('edad'),
            'correo' => $this->request->getRawInput('correo'),
        ];

        $data = $this->request->getJSON();

        $model->update($id, $data);

        return $this->respond($model->find($id));
    }

    public function delete($id = null)
    {
        $model = new PersonasModel();
        
        $model->delete($id);

        return $this->respondDeleted(['id' => $id]);
    }
}