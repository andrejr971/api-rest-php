<?php
  require_once 'config/Model.php';

  class User extends Model {
    public function __construct(PDO $connection) {
      self::setConnection($connection);
      self::setTable('users');
    }
  }