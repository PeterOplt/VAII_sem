<?php

namespace App\Models;

use Framework\Core\Model;

class Prediction extends Model
{
    protected ?int $id = null;
    protected ?int $userId = null;
    protected ?int $raceId = null;
    protected ?int $predictedP1DriverId = null;
    protected ?int $predictedP2DriverId = null;
    protected ?int $predictedP3DriverId = null;
    protected ?int $pointsEarned = 0;
    protected ?string $createdAt = null;

    protected static ?array $fillable = ['predictedP1DriverId', 'predictedP2DriverId', 'predictedP3DriverId'];

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

    public function getRaceId(): ?int
    {
        return $this->raceId;
    }

    public function setRaceId(?int $raceId): void
    {
        $this->raceId = $raceId;
    }

    public function getPredictedP1DriverId(): ?int
    {
        return $this->predictedP1DriverId;
    }

    public function setPredictedP1DriverId(?int $predictedP1DriverId): void
    {
        $this->predictedP1DriverId = $predictedP1DriverId;
    }

    public function getPredictedP2DriverId(): ?int
    {
        return $this->predictedP2DriverId;
    }

    public function setPredictedP2DriverId(?int $predictedP2DriverId): void
    {
        $this->predictedP2DriverId = $predictedP2DriverId;
    }

    public function getPredictedP3DriverId(): ?int
    {
        return $this->predictedP3DriverId;
    }

    public function setPredictedP3DriverId(?int $predictedP3DriverId): void
    {
        $this->predictedP3DriverId = $predictedP3DriverId;
    }

    public function getPointsEarned(): ?int
    {
        return $this->pointsEarned;
    }

    public function setPointsEarned(?int $pointsEarned): void
    {
        $this->pointsEarned = $pointsEarned;
    }

    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function save(): void
    {
        // Framework pri INSERT posiela všetky stĺpce, aj null.
        // Preto čas vytvorenia doplníme tu, inak by DB odmietla NULL.
        if ($this->createdAt === null) {
            $this->createdAt = date('Y-m-d H:i:s');
        }
        parent::save();
    }

    public function getUser(): ?User
    {
        return $this->getOneRelated(User::class);
    }

    public function getRace(): ?Race
    {
        return $this->getOneRelated(Race::class);
    }

    public function getPredictedDriverP1(): ?Driver
    {
        return $this->getOneRelated(Driver::class, 'predictedP1DriverId');
    }

    public function getPredictedDriverP2(): ?Driver
    {
        return $this->getOneRelated(Driver::class, 'predictedP2DriverId');
    }

    public function getPredictedDriverP3(): ?Driver
    {
        return $this->getOneRelated(Driver::class, 'predictedP3DriverId');
    }

    public static function findForUserAndRace(int $userId, int $raceId): ?Prediction
    {
        $predictions = self::getAll('`userId` = ? AND `raceId` = ?', [$userId, $raceId], null, 1);
        return $predictions[0] ?? null;
    }

    // Tip je platný len ak sú vyplnení všetci traja a každý je iný jazdec
    public function hasValidDrivers(): bool
    {
        $drivers = [$this->predictedP1DriverId, $this->predictedP2DriverId, $this->predictedP3DriverId];
        if (in_array(null, $drivers, true)) {
            return false;
        }
        return count(array_unique($drivers)) === 3;
    }
}