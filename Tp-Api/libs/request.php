<?php

class Request {
    public $body;
    public $params;
    public $method;
    public $path;

    public function __construct() {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->path = $_GET['resource'] ?? '';
        $this->params = null;

        // Si hay contenido en el body (por ejemplo en POST o PUT)
        $input = file_get_contents('php://input');
        if (!empty($input)) {
            $this->body = json_decode($input);
        } else {
            $this->body = null;
        }
    }
}
