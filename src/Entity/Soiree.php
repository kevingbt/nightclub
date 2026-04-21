<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
use App\Repository\SoireeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SoireeRepository::class)]
class Soiree
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(
        min:5,
        minMessage:'Ce titre est trop court. Rallongez-le un peu pour votre SEO.',
    )]
    private ?string $titre = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $dateSoiree = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $dateCreation = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $statut = null;

    /**
     * @var Collection<int, Artiste>
     */
    #[ORM\ManyToMany(targetEntity: Artiste::class, inversedBy: 'artiste_soiree')]
    private Collection $soiree_artiste;

    #[ORM\ManyToOne(inversedBy: 'soiree_theme')]
    private ?Theme $theme_soiree = null;

    /**
     * @var Collection<int, MaterielSoiree>
     */
    #[ORM\OneToMany(targetEntity: MaterielSoiree::class, mappedBy: 'soiree')]
    private Collection $materiel_soiree;

    public function __construct()
    {
        $this->soiree_artiste = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDateSoiree(): ?\DateTimeImmutable
    {
        return $this->dateSoiree;
    }

    public function setDateSoiree(\DateTimeImmutable $dateSoiree): static
    {
        $this->dateSoiree = $dateSoiree;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeImmutable
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeImmutable $dateCreation): static
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(?string $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * @return Collection<int, Artiste>
     */
    public function getSoireeArtiste(): Collection
    {
        return $this->soiree_artiste;
    }

    public function addSoireeArtiste(Artiste $soireeArtiste): static
    {
        if (!$this->soiree_artiste->contains($soireeArtiste)) {
            $this->soiree_artiste->add($soireeArtiste);
        }

        return $this;
    }

    public function removeSoireeArtiste(Artiste $soireeArtiste): static
    {
        $this->soiree_artiste->removeElement($soireeArtiste);

        return $this;
    }

    public function getThemeSoiree(): ?Theme
    {
        return $this->theme_soiree;
    }

    public function setThemeSoiree(?Theme $theme_soiree): static
    {
        $this->theme_soiree = $theme_soiree;

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
            $materielSoiree->setSoiree($this);
        }

        return $this;
    }

    public function removeMaterielSoiree(MaterielSoiree $materielSoiree): static
    {
        if ($this->materiel_soiree->removeElement($materielSoiree)) {
            // set the owning side to null (unless already changed)
            if ($materielSoiree->getSoiree() === $this) {
                $materielSoiree->setSoiree(null);
            }
        }

        return $this;
    }

}
