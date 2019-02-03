<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RobotCRepository")
 */
class RobotC extends Robot
{
    public function __construct() {
        $this->setName("CCC");
        $this->setType(Robot::TYPE_SPEED);
        $this->setProductionSpeed(1);
    }
}
