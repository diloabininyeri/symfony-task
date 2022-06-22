<?php

/**@noinspection PhpUnused */

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    private ?string $email;

    #[ORM\Column(type: 'json')]
    private array $roles = [];

    #[ORM\Column(type: 'string')]
    private string $password;

    /**
     * @todo  may type declaration will be remove ,because symfony cant assign it  by orm when type declared ...
     */
    #[ORM\OneToMany(mappedBy: 'users', targetEntity: RentedVehicle::class), ORM\JoinColumn(name: 'user_id')]
    private  $rentedVehicles;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private bool $is_admin=false;

    public function __construct()
    {
        $this->rentedVehicles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string)$this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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
            $rentedVehicle->setUsers($this);
        }

        return $this;
    }

    public function removeRentedVehicle(RentedVehicle $rentedVehicle): self
    {
        // set the owning side to null (unless already changed)
        if ($this->rentedVehicles->removeElement($rentedVehicle) && $rentedVehicle->getUsers() === $this) {
            $rentedVehicle->setUsers(null);
        }

        return $this;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function isIsAdmin(): ?bool
    {
        return $this->is_admin;
    }

    public function setIsAdmin(?bool $is_admin): self
    {
        $this->is_admin = $is_admin;

        return $this;
    }
}
