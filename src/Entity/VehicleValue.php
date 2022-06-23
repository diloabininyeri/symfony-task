<?php

namespace App\Entity;

use App\Repository\VehicleValueRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VehicleValueRepository::class)]
class VehicleValue
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $value;

    #[ORM\ManyToOne(targetEntity: Vehicle::class, inversedBy: 'value')]
    private $vehicle;

    #[ORM\ManyToOne(targetEntity: VehicleFeature::class, inversedBy: 'vehicleValues')]
    private $feature;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(string $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getVehicle(): ?Vehicle
    {
        return $this->vehicle;
    }

    public function setVehicle(?Vehicle $vehicle): self
    {
        $this->vehicle = $vehicle;

        return $this;
    }

    public function getFeature(): ?VehicleFeature
    {
        return $this->feature;
    }

    public function setFeature(?VehicleFeature $feature): self
    {
        $this->feature = $feature;

        return $this;
    }
}
