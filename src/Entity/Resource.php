<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ResourceRepository")
 */
class Resource
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
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picture;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isTraderOnly;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isCraftableOnly;

    /**
     * @ORM\OneToMany(targetEntity="RecipeComponent", mappedBy="resource")
     */
    private $recipeComponent;

    /**
     * @ORM\OneToMany(targetEntity="Warehouse", mappedBy="resource")
     */
    private $warehouse;

    //TODO relation avec la zone

    /**
     * Resource constructor.
     */
    public function __construct()
    {
        $this->recipeComponent = new ArrayCollection();
        $this->warehouse = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getUserRequiredLevel(): ?int
    {
        return $this->userRequiredLevel;
    }

    public function setUserRequiredLevel(int $userRequiredLevel): self
    {
        $this->userRequiredLevel = $userRequiredLevel;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getIsTraderOnly(): ?bool
    {
        return $this->isTraderOnly;
    }

    public function setIsTraderOnly(bool $isTraderOnly): self
    {
        $this->isTraderOnly = $isTraderOnly;

        return $this;
    }

    public function getIsCraftableOnly(): ?bool
    {
        return $this->isCraftableOnly;
    }

    public function setIsCraftableOnly(bool $isCraftableOnly): self
    {
        $this->isCraftableOnly = $isCraftableOnly;

        return $this;
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

    /**
     * @return Collection|Warehouse[]
     */
    public function getWarehouse(): Collection
    {
        return $this->warehouse;
    }

    /**
     * @param Warehouse recipeComponent
     */
    public function addWarehouse(Warehouse $warehouse): void
    {
        $this->warehouse->add($warehouse);
    }

    /**
     * @param Warehouse recipeComponent
     */
    public function removeWarehouse(Warehouse $warehouse): void
    {
        $this->warehouse->remove($warehouse);
    }
}
