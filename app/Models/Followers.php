<?php

namespace App\Models;

use PDO;
use Framework\Model;

class Followers extends Model
{
    public static function getAllFollowers(int $user_id): array
    {
        $stmt = static::db()->prepare('SELECT * FROM followers WHERE user_id = :user_id');
        $stmt->execute([':user_id' => $user_id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function countFollowers(int $user_id): int
    {
        $stmt = static::db()->prepare('SELECT COUNT(*) FROM followers WHERE user_id = :user_id');
        $stmt->execute([':user_id' => $user_id]);

        return $stmt->fetchColumn();
    }
}
