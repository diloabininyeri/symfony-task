<?php

namespace App\Entity;

use App\Repository\RentedVehicleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RentedVehicleRepository::class),ORM\Table(name: 'rented_vehicles')]
class RentedVehicle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $user_id;

    #[ORM\Column(type: 'datetime_immutable')]
    private $created_at;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    private $updated_at;

    #[ORM\Column(type: 'integer')]
    private $vehicle_id;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'rentedVehicles'),ORM\JoinColumn(name: 'user_id')]
    private $users;

    #[ORM\ManyToOne(targetEntity: Vehicle::class, inversedBy: 'rentedVehicles'),ORM\JoinColumn(name: 'vehicle_id')]
    private $vehicles;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getVehicleId(): ?int
    {
        return $this->vehicle_id;
    }

    public function setVehicleId(int $vehicle_id): self
    {
        $this->vehicle_id = $vehicle_id;

        return $this;
    }

    public function getUsers(): ?User
    {
        return $this->users;
    }

    public function setUsers(?User $users): self
    {
        $this->users = $users;

        return $this;
    }

    public function getVehicles(): ?Vehicle
    {
        return $this->vehicles;
    }

    public function setVehicles(?Vehicle $vehicles): self
    {
        $this->vehicles = $vehicles;

        return $this;
    }
}
