<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\FamilyRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: FamilyRepository::class)]
#[ApiResource]
class Family
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 128)]
    private ?string $scientific_name = null;

    #[ORM\Column(length: 128, nullable: true)]
    private ?string $botanical_name = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getScientificName(): ?string
    {
        return $this->scientific_name;
    }

    public function setScientificName(string $scientific_name): self
    {
        $this->scientific_name = $scientific_name;

        return $this;
    }

    public function getBotanicalName(): ?string
    {
        return $this->botanical_name;
    }

    public function setBotanicalName(?string $botanical_name): self
    {
        $this->botanical_name = $botanical_name;

        return $this;
    }

    public function __toString(): string
    {
        return $this->botanical_name;
    }
}
