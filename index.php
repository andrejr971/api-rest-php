<?php
  ini_set('display_errors', 1);

  require_once 'database/index.php';
  require_once 'entities/index.php';
  require_once 'container/index.php';
  require_once 'config/Response.php';
  require_once 'config/Request.php';
  require_once 'config/AppError.php';


  header('Access-Control-Allow-Origin: *');
  header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
  header("Access-Control-Allow-Headers: Origin, Content-Type");
  header('Content-Type: application/json');
  header('Access-Control-Max-Age: 86400');
  
  switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
      $createUserController->handle();
      break;
    case 'GET':
      $listAllUsersController->handle();
      break;
    case 'PUT':
      $updateUserController->handle();
      break;
    case 'DELETE':
      $deleteUserController->handle();
      break;
    default:
      (new AppError('Route not found', 404))->exception();
      break;
  } 
