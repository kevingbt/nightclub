<?php

namespace App\Entity;

use App\Repository\MaterielRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MaterielRepository::class)]
class Materiel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 15)]
    private ?string $nom = null;

    /**
     * @var Collection<int, MaterielSoiree>
     */
    #[ORM\OneToMany(targetEntity: MaterielSoiree::class, mappedBy: 'materiel')]
    private Collection $materiel_soiree;

    public function __construct()
    {
        $this->materiel_soiree = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection<int, MaterielSoiree>
     */
    public function getMaterielSoiree(): Collection
    {
        return $this->materiel_soiree;
    }

    public function addMaterielSoiree(MaterielSoiree $materielSoiree): static
    {
        if (!$this->materiel_soiree->contains($materielSoiree)) {
            $this->materiel_soiree->add($materielSoiree);
            $materielSoiree->setMateriel($this);
        }

        return $this;
    }

    public function removeMaterielSoiree(MaterielSoiree $materielSoiree): static
    {
        if ($this->materiel_soiree->removeElement($materielSoiree)) {
            // set the owning side to null (unless already changed)
            if ($materielSoiree->getMateriel() === $this) {
                $materielSoiree->setMateriel(null);
            }
        }

        return $this;
    }
}
