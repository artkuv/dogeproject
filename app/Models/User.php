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

    public static function getById(int $id): array
    {
        $stmt = static::db()->prepare('SELECT * FROM users WHERE id = :id');
        $stmt->execute([':id' => $id]);

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

    public static function getAvatarById(int $id): string
    {
        $stmt = static::db()->prepare('SELECT avatar FROM users WHERE id = :id');
        $stmt->execute([':id' => $id]);

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

    public static function idExist(int $id): bool
    {
        $stmt = static::db()->prepare('SELECT COUNT(*) FROM users WHERE id = :id');
        $stmt->execute([':id' => $id]);

        return ($stmt->fetchColumn() > 0) ? true : false;
    }

    public static function create(array $params): bool
    {
        $sql = 'INSERT INTO users (email, name, password, ip, registered, last_login)
                VALUES (:email, :name, :password, :ip, :registered, :last_login)';

        $stmt = static::db()->prepare($sql);

        return $stmt->execute([
            ':email' => $params['email'],
            ':name' => $params['name'],
            ':password' => self::hashPassword($params['password']),
            ':ip' => ip2long($_SERVER['REMOTE_ADDR']),
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

    public static function changeAvatar(string $link, int $id): bool
    {
        $stmt = static::db()->prepare('UPDATE users SET avatar = :link WHERE id = :id');

        return $stmt->execute([
            ':link' => $link,
            ':id' => $id
        ]);
    }

    public static function changeName(string $name, int $id): bool
    {
        $stmt = static::db()->prepare('UPDATE users SET name = :name WHERE id = :id');

        return $stmt->execute([
            ':name' => $name,
            ':id' => $id
        ]);
    }

    public static function changeEmail(string $email, int $id): bool
    {
        $stmt = static::db()->prepare('UPDATE users SET email = :email WHERE id = :id');

        return $stmt->execute([
            ':email' => $email,
            ':id' => $id
        ]);
    }

    public static function changeAbout(string $about, int $id): bool
    {
        $stmt = static::db()->prepare('UPDATE users SET about = :about WHERE id = :id');

        return $stmt->execute([
            ':about' => $about,
            ':id' => $id
        ]);
    }

    public static function changePassword(string $password, int $id): bool
    {
        $stmt = static::db()->prepare('UPDATE users SET password = :password WHERE id = :id');

        return $stmt->execute([
            ':password' => self::hashPassword($password),
            ':id' => $id
        ]);
    }
}
