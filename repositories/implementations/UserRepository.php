<?php
  require_once 'repositories/IUserRepository.php';

  class UserRepository implements IUserRepository {
    private User $userEntity;

    public function __construct(User $userEntity) {
      $this->userEntity = $userEntity;
    }

    public function findAll() {
      $sql = 'SELECT * FROM users';

      $peoples = $this->userEntity::select($sql, [], true);

      return $peoples;
    }

    public function findById($id) {
      $sql = 'SELECT * FROM users WHERE id = :id';

      $peoples = $this->userEntity::select($sql, ['id' => $id], true);

      return $peoples;
    }

    public function findByEmail($email) {
      $sql = 'SELECT * FROM users WHERE email = :email';

      $peoples = $this->userEntity::select($sql, ['email' => $email], true);

      return $peoples;
    }

    public function create(Array $people) {
        try {
          $this->userEntity::insert($people);
        } catch(Exception $err) {
          return (new AppError('Failed to add a new record' . $err->getMessage(), 400))->exception();
        }
      
      return;
    }

    public function update(array $data, array $conditions): bool {
      return $this->userEntity::update($data, $conditions);
    }

    public function deleteById(array $data): bool {
      return $this->userEntity::delete($data);
    }
  }