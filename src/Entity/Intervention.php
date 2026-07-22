<?php

namespace App\Entity;

use App\Repository\InterventionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InterventionRepository::class)]
class Intervention
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 250)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $duree = null;

    #[ORM\Column(length: 150)]
    private ?string $type_intervention = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date_intervention = null;

    #[ORM\ManyToOne(inversedBy: 'interventions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateur $utilisateur = null;

    #[ORM\ManyToOne(inversedBy: 'interventions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Chantier $chantier = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(int $duree): static
    {
        $this->duree = $duree;

        return $this;
    }

    public function getTypeIntervention(): ?string
    {
        return $this->type_intervention;
    }

    public function setTypeIntervention(string $type_intervention): static
    {
        $this->type_intervention = $type_intervention;

        return $this;
    }

    public function getDateIntervention(): ?\DateTime
    {
        return $this->date_intervention;
    }

    public function setDateIntervention(\DateTime $date_intervention): static
    {
        $this->date_intervention = $date_intervention;

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): static
    {
        $this->utilisateur = $utilisateur;

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
}
