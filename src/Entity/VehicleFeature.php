<?php

namespace App\Entity;

use App\Repository\VehicleFeatureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[
        ORM\OneToMany(mappedBy: 'feature', targetEntity: VehicleValue::class),
        ORM\JoinColumn(name: "feature_id", referencedColumnName: "id")
    ]
    private $vehicleValues;

    public function __construct()
    {
        $this->vehicleValues = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, VehicleValue>
     */
    public function getVehicleValues(): Collection
    {
        return $this->vehicleValues;
    }

    public function addVehicleValue(VehicleValue $vehicleValue): self
    {
        if (!$this->vehicleValues->contains($vehicleValue)) {
            $this->vehicleValues[] = $vehicleValue;
            $vehicleValue->setFeature($this);
        }

        return $this;
    }

    public function removeVehicleValue(VehicleValue $vehicleValue): self
    {
        if ($this->vehicleValues->removeElement($vehicleValue)) {
            // set the owning side to null (unless already changed)
            if ($vehicleValue->getFeature() === $this) {
                $vehicleValue->setFeature(null);
            }
        }

        return $this;
    }
}
