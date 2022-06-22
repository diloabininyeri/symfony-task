<?php

namespace App\Entity;

use App\Repository\VehicleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VehicleRepository::class), ORM\Table(name: 'vehicles')]
class Vehicle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'datetime_immutable')]
    private $created_at;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    private $updated_at;

    #[ORM\Column(type: 'string', length: 255)]
    private $image;

    #[
        ORM\ManyToOne(targetEntity: Color::class, inversedBy: 'vehicles', /*fetch: 'EAGER'*/),
        ORM\JoinColumn(name: "color_id", referencedColumnName: "id")
    ]
    private $color;

    #[ORM\OneToMany(mappedBy: 'vehicles', targetEntity: RentedVehicle::class)]
    private $rentedVehicles;

    #[
        ORM\ManyToOne(targetEntity: VehicleCategory::class, inversedBy: 'vehicles'),
        ORM\JoinColumn(name: "category_id", referencedColumnName: "id")
    ]
    private $category;

    #[
        ORM\ManyToOne(targetEntity: VehicleBrand::class, inversedBy: 'vehicles'),
        ORM\JoinColumn(name: "brand_id", referencedColumnName: "id")
    ]
    private $brand;

    #[ORM\Column(type: 'boolean')]
    private $is_avaliablity;

    public function __construct()
    {
        $this->rentedVehicles = new ArrayCollection();
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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getColor(): ?Color
    {
        return $this->color;
    }

    public function setColor(?Color $color): self
    {
        $this->color = $color;

        return $this;
    }

    /**
     * @return Collection<int, RentedVehicle>
     */
    public function getRentedVehicles(): Collection
    {
        return $this->rentedVehicles;
    }

    public function addRentedVehicle(RentedVehicle $rentedVehicle): self
    {
        if (!$this->rentedVehicles->contains($rentedVehicle)) {
            $this->rentedVehicles[] = $rentedVehicle;
            $rentedVehicle->setVehicles($this);
        }

        return $this;
    }

    public function removeRentedVehicle(RentedVehicle $rentedVehicle): self
    {
        if ($this->rentedVehicles->removeElement($rentedVehicle)) {
            // set the owning side to null (unless already changed)
            if ($rentedVehicle->getVehicles() === $this) {
                $rentedVehicle->setVehicles(null);
            }
        }

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

    public function getBrand(): ?VehicleBrand
    {
        return $this->brand;
    }

    public function setBrand(?VehicleBrand $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function isIsAvaliablity(): ?bool
    {
        return $this->is_avaliablity;
    }

    public function setIsAvaliablity(bool $is_avaliablity): self
    {
        $this->is_avaliablity = $is_avaliablity;

        return $this;
    }
}
