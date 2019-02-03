<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RobotBRepository")
 */
class RobotB extends Robot
{
    public function __construct() {
        $this->setName("BBB");
        $this->setType(Robot::TYPE_AVERAGE_SPEED);
        $this->setProductionSpeed(2);
    }
}
