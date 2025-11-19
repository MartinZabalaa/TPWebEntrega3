<?php
require_once './app/models/model.producto.php';
require_once './app/models/model.marca.php';
require_once './app/views/view.json.php';

class ProductoApiController {
    private $model;
    private $marcaModel;
    private $view;

    public function __construct() {
        $this->model = new ProductoModel();
        $this->marcaModel = new MarcaModel();
        $this->view = new JSONView();
    }

    public function getProductos($req, $res) {
        $orderBy = isset($_GET['orderBy']) ? $_GET['orderBy'] : false;

        $productos = $this->model->ObtenerProductos($orderBy);
        $this->view->response($productos, 200);
    }

    public function getProducto($req, $res) {
        $id = $req->params->id;
        $producto = $this->model->obtenerProductoPorId($id);

        if ($producto)
            $this->view->response($producto, 200);
        else
            $this->view->response(["error" => "Producto no encontrado"], 404);
    }

    public function getProductosPorMarca($req, $res) {
        $nombre_marca = $req->params->nombre;
        $productos = $this->marcaModel->obtenerProductosPorMarca($nombre_marca);

        if ($productos)
            $this->view->response($productos, 200);
        else
            $this->view->response(["error" => "No hay productos para esa marca"], 404);
    }

    public function addProducto($req, $res) {
        $body = $req->body;
        $id = $this->model->insertoProductos($body->nombre_marca, $body->categoria, $body->modelo, $body->descripcion, $body->precio);
        $this->view->response(["id" => $id, "mensaje" => "Producto creado"], 201);
    }

    public function updateProducto($req, $res) {
        $id = $req->params->id;
        $body = $req->body;

        $producto = $this->model->obtenerProductoPorId($id);
        if (!$producto) {
            $this->view->response(["error" => "Producto no encontrado"], 404);
            return;
        }

        $this->model->cambioValoresProducto($id, $body->categoria, $body->modelo, $body->descripcion, $body->precio);
        $this->view->response(["mensaje" => "Producto actualizado"], 200);
    }


    public function deleteProducto($req, $res) {
        $id = $req->params->id;
        $producto = $this->model->obtenerProductoPorId($id);

        if (!$producto) {
            $this->view->response(["error" => "Producto no encontrado"], 404);
            return;
        }

        $this->model->eliminarProducto($id);
        $this->view->response(["mensaje" => "Producto eliminado"], 200);
    }
}
