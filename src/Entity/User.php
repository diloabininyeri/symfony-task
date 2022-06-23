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
    public const  ROLE_ADMIN = 'ROLE_ADMIN';
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
    private $rentedVehicles;

    #[ORM\Column(type: 'string', length: 255, nullable: true, name: 'full_name')]
    private $fullName;

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

    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    public function setFullName(?string $fullName): self
    {
        $this->fullName = $fullName;

        return $this;
    }

    /**
     * @param array $roles
     * @return $this
     */
    public function removeRoles(array $roles): self
    {
        $this->roles = array_diff($this->roles, $roles);
        return $this;
    }

    /**
     * @param string $role
     * @return $this
     */
    public function addRole(string $role): self
    {
        return $this->addRoles([$role]);
    }

    /**
     * @param array $roles
     * @return $this
     */
    public function addRoles(array $roles): self
    {
        $this->roles = array_unique(
            array_merge($this->roles, $roles)
        );
        return $this;
    }

    /**
     * @return $this
     */
    public function giveRoleAdminPermission(): self
    {
        return $this->addRole(self::ROLE_ADMIN);
    }

    /**
     * @return $this
     */
    public function removeAdminPermission(): self
    {
        return $this->removeRoles([self::ROLE_ADMIN]);
    }

    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return in_array(self::ROLE_ADMIN, $this->roles, true);
    }
}
