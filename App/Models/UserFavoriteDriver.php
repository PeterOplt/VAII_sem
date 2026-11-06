<?php

namespace App\Models;

use Framework\Core\Model;

class UserFavoriteDriver extends Model
{
    protected static ?string $tableName = 'user_favorite_drivers';

    protected ?int $id = null;
    protected ?int $userId = null;
    protected ?int $driverId = null;


    protected static ?array $fillable = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(?int $userId): void
    {
        $this->userId = $userId;
    }

    public function getDriverId(): ?int
    {
        return $this->driverId;
    }

    public function setDriverId(?int $driverId): void
    {
        $this->driverId = $driverId;
    }

    public function getUser(): ?User
    {
        return $this->getOneRelated(User::class);
    }

    public function getDriver(): ?Driver
    {
        return $this->getOneRelated(Driver::class);
    }

    public static function findForUserAndDriver(int $userId, int $driverId): ?UserFavoriteDriver
    {
        $rows = self::getAll('`userId` = ? AND `driverId` = ?', [$userId, $driverId], null, 1);
        return $rows[0] ?? null;
    }

    /** @return Driver[] */
    public static function getDriversForUser(int $userId): array
    {
        return Driver::getAll(
            '`id` IN (SELECT `driverId` FROM `user_favorite_drivers` WHERE `userId` = ?)',
            [$userId],
            '`lastName` ASC'
        );
    }
}