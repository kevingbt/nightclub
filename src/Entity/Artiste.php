<?php

namespace App\Entity;

use App\Repository\ArtisteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArtisteRepository::class)]
class Artiste
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    private ?string $nom = null;

    #[ORM\Column(length: 10)]
    private ?string $prenom = null;

    #[ORM\Column]
    private ?int $telephone = null;

    #[ORM\Column(length: 20)]
    private ?string $email = null;

    /**
     * @var Collection<int, Soiree>
     */
    #[ORM\ManyToMany(targetEntity: Soiree::class, mappedBy: 'soiree_artiste')]
    private Collection $artiste_soiree;

    public function __construct()
    {
        $this->artiste_soiree = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(int $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection<int, Soiree>
     */
    public function getArtisteSoiree(): Collection
    {
        return $this->artiste_soiree;
    }

    public function addArtisteSoiree(Soiree $artisteSoiree): static
    {
        if (!$this->artiste_soiree->contains($artisteSoiree)) {
            $this->artiste_soiree->add($artisteSoiree);
            $artisteSoiree->addSoireeArtiste($this);
        }

        return $this;
    }

    public function removeArtisteSoiree(Soiree $artisteSoiree): static
    {
        if ($this->artiste_soiree->removeElement($artisteSoiree)) {
            $artisteSoiree->removeSoireeArtiste($this);
        }

        return $this;
    }
}
