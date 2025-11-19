<?php
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');


include_once "./app/controllers/marca.api.controller.php";
include_once "./app/controllers/producto.api.controller.php";


include_once "./app/middlewares/leerSesion.php";
include_once "./app/middlewares/mandarteLogin.php";

require_once "libs/router.php";
require_once "libs/request.php";
require_once "libs/response.php";

$router = new Router();

// Rutas para productos
$router->addRoute('productos', 'GET', 'ProductoApiController', 'getProductos');
$router->addRoute('productos/:id', 'GET', 'ProductoApiController', 'getProducto');
$router->addRoute('productos', 'POST', 'ProductoApiController', 'addProducto');
$router->addRoute('productos/:id', 'PUT', 'ProductoApiController', 'updateProducto');
$router->addRoute('productos/:id', 'DELETE', 'ProductoApiController', 'deleteProducto');
$router->addRoute('productos/marca/:nombre', 'GET', 'ProductoApiController', 'getProductosPorMarca');

// Rutas para marcas
$router->addRoute('marcas', 'GET', 'MarcaApiController', 'getMarcas');
$router->addRoute('marcas/:id', 'GET', 'MarcaApiController', 'getMarca');
$router->addRoute('marcas', 'POST', 'MarcaApiController', 'addMarca');
$router->addRoute('marcas/:id', 'PUT', 'MarcaApiController', 'updateMarca');
$router->addRoute('marcas/:id', 'DELETE', 'MarcaApiController', 'deleteMarca');

// Ejecuta el router
$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
