<?php

namespace App\Entity;

use App\Repository\ConsommeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConsommeRepository::class)]
class Consomme
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_consommation = null;

    #[ORM\Column]
    private ?int $quantite_consomme = null;

    #[ORM\ManyToOne(inversedBy: 'consommations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Chantier $chantier = null;

    #[ORM\ManyToOne(inversedBy: 'consommations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?StockConsommable $stock_consommable = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateConsommation(): ?\DateTimeInterface
    {
        return $this->date_consommation;
    }

    public function setDateConsommation(\DateTimeInterface $date_consommation): static
    {
        $this->date_consommation = $date_consommation;
        return $this;
    }

    public function getQuantiteConsomme(): ?int
    {
        return $this->quantite_consomme;
    }

    public function setQuantiteConsomme(int $quantite_consomme): static
    {
        $this->quantite_consomme = $quantite_consomme;
        return $this;
    }

    public function getChantier(): ?Chantier
    {
        return $this->chantier;
    }

    public function setChantier(?Chantier $chantier): static
    {
        $this->chantier = $chantier;
        return $this;
    }

    public function getStockConsommable(): ?StockConsommable
    {
        return $this->stock_consommable;
    }

    public function setStockConsommable(?StockConsommable $stock_consommable): static
    {
        $this->stock_consommable = $stock_consommable;
        return $this;
    }

    public function __toString(): string
    {
        return 'Consommation #' . $this->id;
    }
}
