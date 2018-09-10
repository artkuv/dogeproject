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

    public static function Follow(int $user_id, int $follow): bool
    {
        $stmt = static::db()->prepare('INSERT INTO followers SET user_id = :user_id, follows_user_id = :follow');

        return $stmt->execute([
            ':user_id' => $user_id,
            ':follow' => $follow
        ]);
    }

    public static function unFollow(int $user_id, int $follow): bool
    {
        $stmt = static::db()->prepare('DELETE FROM followers WHERE user_id = :user_id AND follows_user_id = :follow');

        return $stmt->execute([
            ':user_id' => $user_id,
            ':follow' => $follow
        ]);
    }

    public static function isFollow(int $user_id, int $follow): bool
    {
        $stmt = static::db()->prepare('SELECT COUNT(*) FROM followers WHERE user_id = :user_id AND follows_user_id = :follow');

        $stmt->execute([
            ':user_id' => $user_id,
            ':follow' => $follow
        ]);

        return ($stmt->fetchColumn() > 0) ? true : false;
    }
}
