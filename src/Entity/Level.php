<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LevelRepository")
 */
class Level
{
    /**
     * @var integer
     *
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     */
    private $requiredExperience;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getRequiredExperience(): int
    {
        return $this->requiredExperience;
    }

    /**
     * @param int $requiredExperience
     */
    public function setRequiredExperience(int $requiredExperience): void
    {
        $this->requiredExperience = $requiredExperience;
    }
}
