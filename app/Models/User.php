<?php

namespace App\Models;

use PDO;
use Framework\Model;

class User extends Model
{
    public static function getAll(): array
    {
        $stmt = static::db()->query('SELECT * FROM users');

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getByEmail(string $email): array
    {
        $stmt = static::db()->prepare('SELECT * FROM users WHERE email = :email');
        $stmt->execute([':email' => $email]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function getByName(string $name): array
    {
        $stmt = static::db()->prepare('SELECT * FROM users WHERE name = :name');
        $stmt->execute([':name' => $name]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function getNameByEmail(string $email): string
    {
        $stmt = static::db()->prepare('SELECT name FROM users WHERE email = :email');
        $stmt->execute([':email' => $email]);

        return $stmt->fetchColumn();
    }

    public static function getIdByEmail(string $email): string
    {
        $stmt = static::db()->prepare('SELECT id FROM users WHERE email = :email');
        $stmt->execute([':email' => $email]);

        return $stmt->fetchColumn();
    }

    public static function emailExist(string $email): bool
    {
        $stmt = static::db()->prepare('SELECT COUNT(*) FROM users WHERE email = :email');
        $stmt->execute([':email' => $email]);

        return ($stmt->fetchColumn() > 0) ? true : false;
    }

    public static function nameExist(string $name): bool
    {
        $stmt = static::db()->prepare('SELECT COUNT(*) FROM users WHERE name = :name');
        $stmt->execute([':name' => $name]);

        return ($stmt->fetchColumn() > 0) ? true : false;
    }

    public static function create(array $params): bool
    {
        $sql = 'INSERT INTO users (email, name, password, registered, last_login)
                VALUES (:email, :name, :password, :registered, :last_login)';

        $stmt = static::db()->prepare($sql);

        return $stmt->execute([
            ':email' => $params['email'],
            ':name' => $params['name'],
            ':password' => self::hashPassword($params['password']),
            ':registered' => time(),
            ':last_login' => time(),
        ]);
    }

    public static function hashPassword(string $password): string
    {
        return hash('sha256', PASS_SALT . $password);
    }

    public static function login(string $email, string $password): bool
    {
        $stmt = static::db()->prepare('SELECT COUNT(*) FROM users WHERE email = :email AND password = :password');
        $stmt->execute([
            ':email' => $email,
            ':password' => self::hashPassword($password),
        ]);
        $return = ($stmt->fetchColumn() > 0) ? true : false;

        return $return;
    }

    public static function isAuth(): bool
    {
        // check session
        if (isset($_SESSION['id'])) {
            return true;
        } elseif (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
            if(self::login($_COOKIE['email'], $_COOKIE['password']) === true) {
                $_SESSION['name'] = self::getNameByEmail($_COOKIE['email']);
                $_SESSION['email'] = $_COOKIE['email'];
                $_SESSION['id'] = self::getIdByEmail($_COOKIE['email']);
                return true;
            }
        } else {
            return false;
        }
        return false;
    }
}
