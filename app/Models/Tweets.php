<?php

namespace App\Models;

use PDO;
use Framework\Model;

class Tweets extends Model
{
    public static function getAllFromUser(int $user_id): array
    {
        $stmt = static::db()->prepare('SELECT * FROM tweets WHERE user_id = :user_id');
        $stmt->execute([':user_id' => $user_id]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function addTweet(array $params): bool
    {
        $sql = 'INSERT INTO tweets (user_id, content, date_created, date_updated)
                VALUES (:user_id, :content, :date_created, :date_updated)';

        $stmt = static::db()->prepare($sql);

        return $stmt->execute([
            ':user_id' => $params['user_id'],
            ':content' => $params['content'],
            ':date_created' => time(),
            ':date_updated' => time(),
        ]);
    }

    public static function deleteTweet(int $id): array
    {
        $stmt = static::db()->prepare('DELETE FROM tweets WHERE id = :id');

        return $stmt->execute([':id' => $id]);
    }
}
