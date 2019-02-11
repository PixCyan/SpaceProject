<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(fields={"name"}, message="There is already an account with this name")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $name;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     *
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @var boolean new user
     *
     * @ORM\Column(type="boolean")
     */
    private $isNew = true;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    private $level = 0;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    private $expercience = 0;

    //TODO liaison avec les ressources (+ quantité possédée) --> Entrpot

    /**
     * @var int
     *
     * Définit le nombre de robots autorisés pour le joueur
     * @ORM\Column(type="integer")
     */
    private $robotsLimit = 3;

    /**
     * @ORM\OneToMany(targetEntity="Robot", mappedBy="user")
     */
    private $robots;

    /**
     * @ORM\OneToMany(targetEntity="Warehouse", mappedBy="user")
     */
    private $warehouse;

    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->robots = new ArrayCollection();
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
     *
     * @return User
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->name;
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

    /**
     * @param array $roles
     *
     * @return User
     */
    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    /**
     * @param string $password
     *
     * @return User
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return bool
     */
    public function isNew(): bool
    {
        return $this->isNew;
    }

    /**
     * @param bool $isNew
     */
    public function setIsNew(bool $isNew): void
    {
        $this->isNew = $isNew;
    }

    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * @param int $level
     */
    public function setLevel(int $level): void
    {
        $this->level = $level;
    }

    /**
     * @return int
     */
    public function getExpercience(): int
    {
        return $this->expercience;
    }

    /**
     * @param int $expercience
     */
    public function setExpercience(int $expercience): void
    {
        $this->expercience = $expercience;
    }

    /**
     * @return int
     */
    public function getRobotsLimit(): int
    {
        return $this->robotsLimit;
    }

    /**
     * @param int $robotsLimit
     */
    public function setRobotsLimit(int $robotsLimit): void
    {
        $this->robotsLimit = $robotsLimit;
    }

    /**
     * @return Collection|Robot[]
     */
    public function getRobots(): Collection
    {
        return $this->robots;
    }

    /**
     * @param Robot $robot
     */
    public function addRobot(Robot $robot): void
    {
        $this->robots->add($robot);
    }

    /**
     * @param Robot $robot
     */
    public function removeRobot(Robot $robot): void
    {
        $this->robots->remove($robot);
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getResource(): ?Warehouse
    {
        return $this->resource;
    }

    public function setResource(?Warehouse $resource): self
    {
        $this->resource = $resource;

        return $this;
    }
}
