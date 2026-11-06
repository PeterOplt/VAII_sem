<?php

namespace App\Models;

use Framework\Core\IIdentity;
use Framework\Core\Model;

class User extends Model implements IIdentity
{

    public const ROLE_USER = 'user';
    public const ROLE_ADMIN = 'admin';

    protected ?int $id = null;
    protected ?string $username = null;
    protected ?string $email = null;
    protected ?string $passwordHash = null;
    protected ?string $role = self::ROLE_USER;
    protected ?int $totalPoints = 0;
    protected ?string $avatarPath = null;

    protected static ?array $fillable = ['username', 'email'];

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(?string $role): void
    {
        if (!in_array($role, [self::ROLE_USER, self::ROLE_ADMIN], true)) {
            throw new \InvalidArgumentException("Neplatná rola: $role");
        }
        $this->role = $role;
    }

    public function getTotalPoints(): ?int
    {
        return $this->totalPoints;
    }

    public function setTotalPoints(?int $totalPoints): void
    {
        $this->totalPoints = $totalPoints;
    }

    public function getAvatarPath(): ?string
    {
        return $this->avatarPath;
    }

    public function setAvatarPath(?string $avatarPath): void
    {
        $this->avatarPath = $avatarPath;
    }


    public function getName(): string
    {
        return $this->username ?? '';
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): void
    {
        $this->username = $username;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function setPassword(string $password): void
    {
        $this->passwordHash = password_hash($password, PASSWORD_DEFAULT);
    }

    public function verifyPassword(string $password): bool
    {
        return $this->passwordHash !== null && password_verify($password, $this->passwordHash);
    }

    public function isAdmin(): bool
    {
        return $this->role === self::ROLE_ADMIN;
    }

    public static function findByUsername(string $username): ?User
    {
        $users = self::getAll('`username` = ?', [$username], null, 1);
        return $users[0] ?? null;
    }

    public static function findByEmail(string $email): ?User
    {
        $users = self::getAll('`email` = ?', [$email], null, 1);
        return $users[0] ?? null;
    }

    /** @return Driver[] */
    public function getFavoriteDrivers(): array
    {
        return UserFavoriteDriver::getDriversForUser($this->id);
    }
}