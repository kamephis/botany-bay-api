<?php

namespace App\Entity;

use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Doctrine\Orm\Filter\BooleanFilter;
use App\Repository\PlantRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\ApiFilter;

#[ORM\Entity(repositoryClass: PlantRepository::class)]
#[ApiResource(
    description: 'This API resource allows for CRUD operations on plant data.',
    paginationItemsPerPage: 20
)]
#[ApiFilter(BooleanFilter::class, properties: ['published'])]
class Plant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 128)]
    #[ApiFilter(SearchFilter::class, strategy: 'partial')]
    private ?string $scientific_name = null;

    #[ORM\Column(length: 128, nullable: true)]
    #[ApiFilter(SearchFilter::class, strategy: 'partial')]
    private ?string $common_name = null;

    #[ORM\Column(length: 128)]
    private ?string $family = null;

    #[ORM\Column(length: 128, nullable: true)]
    private ?string $genus = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $uses = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image_url = null;

    #[ORM\Column]
    private ?bool $published = null;

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

    public function getFamily(): ?string
    {
        return $this->family;
    }

    public function setFamily(string $family): self
    {
        $this->family = $family;

        return $this;
    }

    public function getGenus(): ?string
    {
        return $this->genus;
    }

    public function setGenus(?string $genus): self
    {
        $this->genus = $genus;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getUses(): ?string
    {
        return $this->uses;
    }

    public function setUses(?string $uses): self
    {
        $this->uses = $uses;

        return $this;
    }

    public function getImageUrl(): ?string
    {
        return $this->image_url;
    }

    public function setImageUrl(string $image_url): self
    {
        $this->image_url = $image_url;

        return $this;
    }

    public function isPublished(): ?bool
    {
        return $this->published;
    }

    public function setPublished(bool $published): self
    {
        $this->published = $published;

        return $this;
    }
}
