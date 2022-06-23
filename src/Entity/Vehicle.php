<?php

/** @noinspection PhpUnused */

namespace App\Entity;

use App\Repository\VehicleRepository;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 *@todo When type declaration is made, symfony throws an error. In some properties, type declaration can be removed to avoid this error.
 */
#[ORM\Entity(repositoryClass: VehicleRepository::class), ORM\Table(name: 'vehicles')]
class Vehicle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    /**
     * @property-read int $id
     */
    private int $id;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 255)]
    private string $name;

    /**
     * @var DateTimeImmutable|null
     */
    #[ORM\Column(type: 'datetime_immutable')]
    private ?DateTimeImmutable $created_at;

    /**
     * @var DateTimeImmutable|null
     */
    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    private ?DateTimeImmutable $updated_at;

    /**
     * @var string
     */
    #[ORM\Column(type: 'string', length: 255)]
    private string $image;

    /**
     * @var Color|null
     */
    #[
        ORM\ManyToOne(targetEntity: Color::class, inversedBy: 'vehicles', /*fetch: 'EAGER'*/),
        ORM\JoinColumn(name: "color_id", referencedColumnName: "id")
    ]
    private ?Color $color;

    /**
     * @var ArrayCollection
     */
    #[ORM\OneToMany(mappedBy: 'vehicles', targetEntity: RentedVehicle::class)]
    private $rentedVehicles;

    /**
     * @var VehicleCategory|null
     */
    #[
        ORM\ManyToOne(targetEntity: VehicleCategory::class, inversedBy: 'vehicles'),
        ORM\JoinColumn(name: "category_id", referencedColumnName: "id")
    ]
    private ?VehicleCategory $category;

    /**
     * @var VehicleBrand|null
     */
    #[
        ORM\ManyToOne(targetEntity: VehicleBrand::class, inversedBy: 'vehicles'),
        ORM\JoinColumn(name: "brand_id", referencedColumnName: "id")
    ]
    private ?VehicleBrand $brand;

    /**
     * @var bool
     */
    #[ORM\Column(type: 'boolean')]
    private bool $is_availability = true;

    #[
        ORM\OneToMany(mappedBy: 'vehicle', targetEntity: VehicleValue::class),
        ORM\JoinColumn(name: "vehicle_id", referencedColumnName: "id") //@todo this line can be remove
    ]
    private $value; //default vehicle rent status is true ,can be change according the status

    /**
     *
     */
    public function __construct()
    {
        $this->rentedVehicles = new ArrayCollection();
        $this->value = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return DateTimeImmutable|null
     */
    public function getCreatedAt(): ?DateTimeImmutable
    {
        return $this->created_at;
    }

    /**
     * @param DateTimeImmutable $created_at
     * @return $this
     */
    public function setCreatedAt(DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * @return DateTimeImmutable|null
     */
    public function getUpdatedAt(): ?DateTimeImmutable
    {
        return $this->updated_at;
    }


    /**
     * @param DateTimeImmutable|null $updated_at
     * @return $this
     */
    public function setUpdatedAt(?DateTimeImmutable $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @param string $image
     * @return $this
     */
    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Color|null
     */
    public function getColor(): ?Color
    {
        return $this->color;
    }

    /**
     * @param Color|null $color
     * @return $this
     */
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

    /**
     * @param RentedVehicle $rentedVehicle
     * @return $this
     */
    public function addRentedVehicle(RentedVehicle $rentedVehicle): self
    {
        if (!$this->rentedVehicles->contains($rentedVehicle)) {
            $this->rentedVehicles[] = $rentedVehicle;
            $rentedVehicle->setVehicles($this);
        }

        return $this;
    }

    /**
     * @param RentedVehicle $rentedVehicle
     * @return $this
     */
    public function removeRentedVehicle(RentedVehicle $rentedVehicle): self
    {
        // set the owning side to null (unless already changed)
        if ($this->rentedVehicles->removeElement($rentedVehicle) && $rentedVehicle->getVehicles() === $this) {
            $rentedVehicle->setVehicles(null);
        }

        return $this;
    }

    /**
     * @return VehicleCategory|null
     */
    public function getCategory(): ?VehicleCategory
    {
        return $this->category;
    }

    /**
     * @param VehicleCategory|null $category
     * @return $this
     */
    public function setCategory(?VehicleCategory $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return VehicleBrand|null
     */
    public function getBrand(): ?VehicleBrand
    {
        return $this->brand;
    }

    /**
     * @param VehicleBrand|null $brand
     * @return $this
     */
    public function setBrand(?VehicleBrand $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function isIsAvailability(): ?bool
    {
        return $this->is_availability;
    }

    /**
     * @param bool $is_availability
     * @return $this
     */
    public function setIsAvailability(bool $is_availability): self
    {
        $this->is_availability = $is_availability;

        return $this;
    }

    /**
     * @return bool
     */
    public function isCanRent(): bool
    {
        return $this->is_availability;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return Collection<int, VehicleValue>
     */
    public function getValue(): Collection
    {
        return $this->value;
    }

    public function addValue(VehicleValue $value): self
    {
        if (!$this->value->contains($value)) {
            $this->value[] = $value;
            $value->setVehicle($this);
        }

        return $this;
    }

    public function removeValue(VehicleValue $value): self
    {
        if ($this->value->removeElement($value)) {
            // set the owning side to null (unless already changed)
            if ($value->getVehicle() === $this) {
                $value->setVehicle(null);
            }
        }

        return $this;
    }
}
