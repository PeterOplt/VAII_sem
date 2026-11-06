<?php

namespace App\Models;

use Framework\Core\Model;

class Team extends Model
{
    protected ?int $id = null;
    protected ?string $name = null;
    protected ?string $baseLocation = null;
    protected ?string $powerUnit = null;
    protected ?string $logoPath = null;

    protected static ?array $fillable = ['name', 'baseLocation', 'powerUnit'];

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getBaseLocation(): ?string
    {
        return $this->baseLocation;
    }

    public function setBaseLocation(?string $baseLocation): void
    {
        $this->baseLocation = $baseLocation;
    }

    public function getPowerUnit(): ?string
    {
        return $this->powerUnit;
    }

    public function setPowerUnit(?string $powerUnit): void
    {
        $this->powerUnit = $powerUnit;
    }

    public function getLogoPath(): ?string
    {
        return $this->logoPath;
    }

    public function setLogoPath(?string $logoPath): void
    {
        $this->logoPath = $logoPath;
    }
}