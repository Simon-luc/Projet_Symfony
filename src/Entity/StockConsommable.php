<?php

namespace App\Entity;

use App\Repository\StockConsommableRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StockConsommableRepository::class)]
class StockConsommable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\Column(length: 50)]
    private ?string $unite = null;

    #[ORM\Column]
    private ?int $quantite = null;

    #[ORM\Column]
    private ?int $base_critique = null;

    #[ORM\OneToMany(mappedBy: 'stock_consommable', targetEntity: Consomme::class)]
    private Collection $consommations;

    public function __construct()
    {
        $this->consommations = new ArrayCollection();
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

    public function getUnite(): ?string
    {
        return $this->unite;
    }

    public function setUnite(string $unite): static
    {
        $this->unite = $unite;
        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): static
    {
        $this->quantite = $quantite;
        return $this;
    }

    public function getBaseCritique(): ?int
    {
        return $this->base_critique;
    }

    public function setBaseCritique(int $base_critique): static
    {
        $this->base_critique = $base_critique;
        return $this;
    }

    public function getConsommations(): Collection
    {
        return $this->consommations;
    }

    public function addConsommation(Consomme $consommation): static
    {
        if (!$this->consommations->contains($consommation)) {
            $this->consommations->add($consommation);
            $consommation->setStockConsommable($this);
        }

        return $this;
    }

    public function removeConsommation(Consomme $consommation): static
    {
        if ($this->consommations->removeElement($consommation)) {
            if ($consommation->getStockConsommable() === $this) {
                $consommation->setStockConsommable(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->nom;
    }
}
