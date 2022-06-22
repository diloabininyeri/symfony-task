<?php

namespace App\Entity;

use App\Repository\VehicleFeatureRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VehicleFeatureRepository::class)]
class VehicleFeature
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[
        ORM\ManyToOne(targetEntity: VehicleCategory::class, inversedBy: 'vehicleFeatures'),
        ORM\JoinColumn(name: "category_id", referencedColumnName: "id")
    ]
    private $category;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCategory(): ?VehicleCategory
    {
        return $this->category;
    }

    public function setCategory(?VehicleCategory $category): self
    {
        $this->category = $category;

        return $this;
    }
}
