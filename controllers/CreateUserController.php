<?php
  class CreateUserController {
    private IUserRepository $userRepository;

    public function __construct(IUserRepository $userRepository) {
      $this->userRepository = $userRepository;
    }

    public function handle() {
      $request = Request::body();

      $validation = Request::validator([
        'name',
        'email',
        'password'
      ]);

      if (!$validation) {
        return (new AppError('Parameters not passed', 401))->exception();
      }

      $emailExist = $this->userRepository->findByEmail($request['email']);

      if ($emailExist) {
        return (new AppError('Users already exists', 400))->exception();
      }

      $request['password'] = password_hash($request['password'] , PASSWORD_DEFAULT, ['cost' => 15]);

      try {
        $this->userRepository->create($request);
      } catch(Exception $err) {
        return (new AppError($err->getMessage(), 500))->exception();
      } 

      $user = $this->userRepository->findByEmail($request['email'])[0];

      return Response::json($user);
    }
  }