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

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\Column(length: 50)]
    private ?string $type = null;

    #[ORM\Column]
    private ?int $quantite_total = null;

    #[ORM\Column]
    private ?int $quantite_disponible = null;

    #[ORM\Column(length: 50)]
    private ?string $etat = null;

    /**
     * @var Collection<int, Utilise>
     */
    #[ORM\OneToMany(targetEntity: Utilise::class, mappedBy: 'materiel')]
    private Collection $utilisations;

    public function __construct()
    {
        $this->utilisations = new ArrayCollection();
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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getQuantiteTotal(): ?int
    {
        return $this->quantite_total;
    }

    public function setQuantiteTotal(int $quantite_total): static
    {
        $this->quantite_total = $quantite_total;

        return $this;
    }

    public function getQuantiteDisponible(): ?int
    {
        return $this->quantite_disponible;
    }

    public function setQuantiteDisponible(int $quantite_disponible): static
    {
        $this->quantite_disponible = $quantite_disponible;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): static
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * @return Collection<int, Utilise>
     */
    public function getUtilisations(): Collection
    {
        return $this->utilisations;
    }

    public function addUtilisation(Utilise $utilisation): static
    {
        if (!$this->utilisations->contains($utilisation)) {
            $this->utilisations->add($utilisation);
            $utilisation->setMateriel($this);
        }

        return $this;
    }

    public function removeUtilisation(Utilise $utilisation): static
    {
        if ($this->utilisations->removeElement($utilisation)) {
            // set the owning side to null (unless already changed)
            if ($utilisation->getMateriel() === $this) {
                $utilisation->setMateriel(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->nom;
    }
}
