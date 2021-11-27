<?php
  class DeleteUserController {
    private IUserRepository $userRepository;

    public function __construct(IUserRepository $userRepository) {
      $this->userRepository = $userRepository;
    }

    public function handle() {
      $id = Request::params();

      if (!is_numeric($id)) {
        return (new AppError('Param is not numeric', 500))->exception();
      }

      $user = $this->userRepository->findById($id);

      if (empty($user)) {
        return (new AppError('User non exists', 404))->exception();
      }

      
      try {
        $this->userRepository->deleteById(['id' => intval($id)]);
      } catch(Exception $err) {
        return (new AppError($err->getMessage(), 500))->exception();
      } 

      return Response::status(202);
    }
  }