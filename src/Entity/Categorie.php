<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorieRepository::class)
 */
class Categorie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity=Createur::class, mappedBy="categories")
     */
    private $createurs;

    public function __construct()
    {
        $this->createurs = new ArrayCollection();
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

    /**
     * @return Collection|Createur[]
     */
    public function getCreateurs(): Collection
    {
        return $this->createurs;
    }

    public function addCreateur(Createur $createur): self
    {
        if (!$this->createurs->contains($createur)) {
            $this->createurs[] = $createur;
        }

        return $this;
    }

    public function removeCreateur(Createur $createur): self
    {
        $this->createurs->removeElement($createur);

        return $this;
    }
}
