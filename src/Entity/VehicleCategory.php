<?php

namespace App\Entity;

use App\Repository\VehicleCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VehicleCategoryRepository::class),ORM\Table(name: 'vehicle_categories')]
class VehicleCategory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'text')]
    private $description;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: Vehicle::class)]
    private $vehicles;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: VehicleFeature::class)]
    private $vehicleFeatures;

    public function __construct()
    {
        $this->vehicles = new ArrayCollection();
        $this->vehicleFeatures = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Vehicle>
     */
    public function getVehicles(): Collection
    {
        return $this->vehicles;
    }

    public function addVehicle(Vehicle $vehicle): self
    {
        if (!$this->vehicles->contains($vehicle)) {
            $this->vehicles[] = $vehicle;
            $vehicle->setCategory($this);
        }

        return $this;
    }

    public function removeVehicle(Vehicle $vehicle): self
    {
        if ($this->vehicles->removeElement($vehicle)) {
            // set the owning side to null (unless already changed)
            if ($vehicle->getCategory() === $this) {
                $vehicle->setCategory(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, VehicleFeature>
     */
    public function getVehicleFeatures(): Collection
    {
        return $this->vehicleFeatures;
    }

    public function addVehicleFeature(VehicleFeature $vehicleFeature): self
    {
        if (!$this->vehicleFeatures->contains($vehicleFeature)) {
            $this->vehicleFeatures[] = $vehicleFeature;
            $vehicleFeature->setCategory($this);
        }

        return $this;
    }

    public function removeVehicleFeature(VehicleFeature $vehicleFeature): self
    {
        if ($this->vehicleFeatures->removeElement($vehicleFeature)) {
            // set the owning side to null (unless already changed)
            if ($vehicleFeature->getCategory() === $this) {
                $vehicleFeature->setCategory(null);
            }
        }

        return $this;
    }
}
