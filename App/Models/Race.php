<?php

namespace App\Models;

use Framework\Core\Model;

class Race extends Model
{
    protected ?int $id = null;
    protected ?string $name = null;
    protected ?string $country = null;
    protected ?string $location = null;
    protected ?string $circuitName = null;
    protected ?string $raceDate = null;
    protected ?int $laps = null;
    protected ?string $description = null;
    protected ?string $imagePath = null;
    protected ?int $resultP1DriverId = null;
    protected ?int $resultP2DriverId = null;
    protected ?int $resultP3DriverId = null;

    protected static ?array $fillable = ['name', 'location', 'circuitName', 'raceDate', 'laps', 'description', 'country'];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(?string $location): void
    {
        $this->location = $location;
    }

    public function getCircuitName(): ?string
    {
        return $this->circuitName;
    }

    public function setCircuitName(?string $circuitName): void
    {
        $this->circuitName = $circuitName;
    }

    public function getRaceDate(): ?string
    {
        return $this->raceDate;
    }

    public function setRaceDate(?string $raceDate): void
    {
        $this->raceDate = $raceDate;
    }

    public function getLaps(): ?int
    {
        return $this->laps;
    }

    public function setLaps(?int $laps): void
    {
        $this->laps = $laps;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getImagePath(): ?string
    {
        return $this->imagePath;
    }

    public function setImagePath(?string $imagePath): void
    {
        $this->imagePath = $imagePath;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): void
    {
        $this->country = $country;
    }


    public function getResultP1DriverId(): ?int
    {
        return $this->resultP1DriverId;
    }

    public function setResultP1DriverId(?int $resultP1DriverId): void
    {
        $this->resultP1DriverId = $resultP1DriverId;
    }

    public function getResultP2DriverId(): ?int
    {
        return $this->resultP2DriverId;
    }

    public function setResultP2DriverId(?int $resultP2DriverId): void
    {
        $this->resultP2DriverId = $resultP2DriverId;
    }

    public function getResultP3DriverId(): ?int
    {
        return $this->resultP3DriverId;
    }

    public function setResultP3DriverId(?int $resultP3DriverId): void
    {
        $this->resultP3DriverId = $resultP3DriverId;
    }

    public function raceEnded(): bool
    {
        return $this->raceDate < date('Y-m-d H:i:s');
    }

    public function hasResult(): bool
    {
        return $this->resultP1DriverId !== null && $this->resultP2DriverId !== null && $this->resultP3DriverId !== null;
    }

    public function getResultDriverP1(): ?Driver
    {
        return $this->getOneRelated(Driver::class, 'resultP1DriverId');
    }

    public function getResultDriverP2(): ?Driver
    {
        return $this->getOneRelated(Driver::class, 'resultP2DriverId');
    }

    public function getResultDriverP3(): ?Driver
    {
        return $this->getOneRelated(Driver::class, 'resultP3DriverId');
    }

    /** @return Prediction[] */
    public function getPredictions(): array
    {
        return $this->getAllRelated(Prediction::class, 'raceId');
    }
}