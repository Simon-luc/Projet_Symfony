<?php

namespace App\Entity;

use App\Repository\UtiliseRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UtiliseRepository::class)]
class Utilise
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date_de_fin = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date_de_debut = null;

    #[ORM\ManyToOne(inversedBy: 'utilisations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Chantier $chantier = null;

    #[ORM\ManyToOne(inversedBy: 'utilisations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Materiel $materiel = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDeFin(): ?\DateTime
    {
        return $this->date_de_fin;
    }

    public function setDateDeFin(\DateTime $date_de_fin): static
    {
        $this->date_de_fin = $date_de_fin;

        return $this;
    }

    public function getDateDeDebut(): ?\DateTime
    {
        return $this->date_de_debut;
    }

    public function setDateDeDebut(\DateTime $date_de_debut): static
    {
        $this->date_de_debut = $date_de_debut;

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

    public function getMateriel(): ?Materiel
    {
        return $this->materiel;
    }

    public function setMateriel(?Materiel $materiel): static
    {
        $this->materiel = $materiel;

        return $this;
    }
}
