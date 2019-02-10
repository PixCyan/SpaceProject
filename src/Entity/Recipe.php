<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RecipeRepository")
 */
class Recipe
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $userRequiredLevel;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     *
     * @ORM\OneToMany(targetEntity="RecipeComponent",mappedBy="recipe")
     */
    private $recipeComponent;

    /**
     * Recipe constructor.
     */
    public function __construct()
    {
        $this->recipeComponent = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getUserRequiredLevel()
    {
        return $this->userRequiredLevel;
    }

    /**
     * @param mixed $userRequiredLevel
     */
    public function setUserRequiredLevel($userRequiredLevel): void
    {
        $this->userRequiredLevel = $userRequiredLevel;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return Collection|RecipeComponent[]
     */
    public function getRecipeComponent(): Collection
    {
        return $this->recipeComponent;
    }

    /**
     * @param RecipeComponent recipeComponent
     */
    public function addRecipeComponent(RecipeComponent $recipeComponent): void
    {
        $this->recipeComponent->add($recipeComponent);
    }

    /**
     * @param RecipeComponent recipeComponent
     */
    public function removeRecipeComponent(RecipeComponent $recipeComponent): void
    {
        $this->recipeComponent->remove($recipeComponent);
    }
}
