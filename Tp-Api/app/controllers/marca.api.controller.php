<?php
require_once './app/models/model.marca.php';
require_once './app/views/view.json.php';

class MarcaApiController
{
    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new MarcaModel();
        $this->view = new JSONView();
    }

    public function getMarcas($req, $res)
    {
        $orderBy = isset($_GET['orderBy']) ? $_GET['orderBy'] : false;

        $marcas = $this->model->ObtenerMarcas($orderBy);
        $this->view->response($marcas, 200);
    }


    public function getMarca($req, $res)
    {
        $id = $req->params->id;
        $marca = $this->model->obtenerIDmarca($id);

        if ($marca)
            $this->view->response($marca, 200);
        else
            $this->view->response(["error" => "Marca no encontrada"], 404);
    }


    public function addMarca($req, $res)
    {
        $body = $req->body;

        if (empty($body->nombre) || empty($body->importador) || empty($body->pais_origen)) {
            $this->view->response(["error" => "Datos incompletos"], 400);
            return;
        }

        $id = $this->model->insertoMarcas($body->nombre, $body->importador, $body->pais_origen);
        $this->view->response(["id" => $id, "mensaje" => "Marca creada"], 201);
    }

 
    public function updateMarca($req, $res)
    {
        $id = $req->params->id;
        $body = $req->body;

        $marca = $this->model->obtenerIDmarca($id);
        if (!$marca) {
            $this->view->response(["error" => "Marca no encontrada"], 404);
            return;
        }

        $this->model->cambioValoresMarca($id, $body->importador, $body->pais_origen);
        $this->view->response(["mensaje" => "Marca actualizada"], 200);
    }

   
    public function deleteMarca($req, $res)
    {
        $id = $req->params->id;
        $marca = $this->model->obtenerIDmarca($id);

        if (!$marca) {
            $this->view->response(["error" => "Marca no encontrada"], 404);
            return;
        }

        $this->model->eliminarMarca($marca->nombre);
        $this->view->response(["mensaje" => "Marca eliminada"], 200);
    }
}
