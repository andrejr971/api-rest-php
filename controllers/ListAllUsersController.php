<?php
  class ListAllUsersController {
    private IUserRepository $userRepository;

    public function __construct(IUserRepository $userRepository) {
      $this->userRepository = $userRepository;
    }

    public function handle() {
      $id = Request::params();

      if (is_numeric($id)) {
        $user = $this->userRepository->findById($id);

      if (empty($user)) {
        return (new AppError('User not found', 404))->exception();
      }

        return Response::json($user[0]);
      }

      $users = $this->userRepository->findAll();

      return Response::json($users);
    }
  }