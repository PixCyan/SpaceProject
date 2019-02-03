<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RobotARepository")
 */
class RobotA extends Robot
{
    public function __construct() {
        $this->setName("AAA");
        $this->setType(Robot::TYPE_SLOW);
        $this->setProductionSpeed(5);
    }
}
