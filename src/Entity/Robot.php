<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Robot
 * @package App\Entity
 * @ORM\MappedSuperclass
 */
abstract class Robot
{
    const STATE_GOOD = 1;
    const STATE_DAMAGED = 2;
    const STATE_TO_REPAIR = 3;

    const TYPE_SPEED = "Rapide";
    const TYPE_AVERAGE_SPEED = "Moyen";
    const TYPE_SLOW = "Lent";
    const TYPE_TRADING = "Marchand"; //TODO vaisseau permettant d'apporter des ressources de quête

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    protected $name;

    /**
     * Active time in minutes
     * @var integer
     *
     * @ORM\Column(type="integer")
     */
    protected $durability = 500;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     */
    protected $state = self::STATE_GOOD;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $type;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     */
    protected $productionSpeed;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="robots")
     */
    private $user;

    //TODO coût des robots avec les matériaux associés -- table à part pour faire la correspondance

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getDurability(): int
    {
        return $this->durability;
    }

    /**
     * @param int $durability
     */
    public function setDurability(int $durability): void
    {
        $this->durability = $durability;
    }

    /**
     * @return int
     */
    public function getState(): int
    {
        return $this->state;
    }

    /**
     * @param int $state
     */
    public function setState(int $state): void
    {
        $this->state = $state;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getProductionSpeed(): int
    {
        return $this->productionSpeed;
    }

    /**
     * @param int $productionSpeed
     */
    public function setProductionSpeed(int $productionSpeed): void
    {
        $this->productionSpeed = $productionSpeed;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }

}
