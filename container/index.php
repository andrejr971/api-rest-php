<?php
  require_once 'repositories/implementations/UserRepository.php';

  require_once 'controllers/CreateUserController.php';
  require_once 'controllers/ListAllUsersController.php';
  require_once 'controllers/UpdateUserController.php';
  require_once 'controllers/DeleteUserController.php';

  $user = new User(Database::getConnection());
  $userRepository = new UserRepository($user);

  $createUserController = new CreateUserController($userRepository);
  $listAllUsersController = new ListAllUsersController($userRepository);
  $updateUserController = new UpdateUserController($userRepository);
  $deleteUserController = new DeleteUserController($userRepository);