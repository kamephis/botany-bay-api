<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\SpeciesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SpeciesRepository::class)]
#[ApiResource]
class Species
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 128)]
    private ?string $scientific_name = null;

    #[ORM\Column(length: 128, nullable: true)]
    private ?string $common_name = null;

    #[ORM\Column]
    private ?int $taxonomy = null;

    #[ORM\Column]
    private array $morphology = [];

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $distribution = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ecology = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cultivation = null;

    #[ORM\Column(nullable: true)]
    private ?int $conservation_status = null;

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

    public function getCommonName(): ?string
    {
        return $this->common_name;
    }

    public function setCommonName(?string $common_name): self
    {
        $this->common_name = $common_name;

        return $this;
    }

    public function getTaxonomy(): ?int
    {
        return $this->taxonomy;
    }

    public function setTaxonomy(int $taxonomy): self
    {
        $this->taxonomy = $taxonomy;

        return $this;
    }

    public function getMorphology(): array
    {
        return $this->morphology;
    }

    public function setMorphology(array $morphology): self
    {
        $this->morphology = $morphology;

        return $this;
    }

    public function getDistribution(): ?string
    {
        return $this->distribution;
    }

    public function setDistribution(?string $distribution): self
    {
        $this->distribution = $distribution;

        return $this;
    }

    public function getEcology(): ?string
    {
        return $this->ecology;
    }

    public function setEcology(?string $ecology): self
    {
        $this->ecology = $ecology;

        return $this;
    }

    public function getCultivation(): ?string
    {
        return $this->cultivation;
    }

    public function setCultivation(?string $cultivation): self
    {
        $this->cultivation = $cultivation;

        return $this;
    }

    public function getConservationStatus(): ?int
    {
        return $this->conservation_status;
    }

    public function setConservationStatus(?int $conservation_status): self
    {
        $this->conservation_status = $conservation_status;

        return $this;
    }
}
