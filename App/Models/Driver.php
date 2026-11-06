<?php

namespace App\Models;

use Framework\Core\Model;

class Driver extends Model
{
    protected ?int $id = null;
    protected ?string $firstName = null;
    protected ?string $lastName = null;
    protected ?int $number = null;
    protected ?string $nationality = null;
    protected ?int $teamId = null;
    protected ?string $imagePath = null;

    protected static ?array $fillable = ['firstName', 'lastName', 'number', 'nationality', 'teamId'];
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(?int $number): void
    {
        $this->number = $number;
    }

    public function getNationality(): ?string
    {
        return $this->nationality;
    }

    public function setNationality(?string $nationality): void
    {
        $this->nationality = $nationality;
    }

    public function getTeamId(): ?int
    {
        return $this->teamId;
    }

    public function setTeamId(?int $teamId): void
    {
        $this->teamId = $teamId;
    }

    public function getImagePath(): ?string
    {
        return $this->imagePath;
    }

    public function setImagePath(?string $imagePath): void
    {
        $this->imagePath = $imagePath;
    }

    public function getTeam(): ?Team
    {
        return $this->getOneRelated(Team::class, 'teamId');
    }

    public function getId(): ?int
    {
        return $this->id;
    }

}