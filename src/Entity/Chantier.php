<?php

namespace App\Entity;

use App\Repository\ChantierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChantierRepository::class)]
class Chantier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $nom_chantier = null;

    #[ORM\Column(length: 250)]
    private ?string $adresse = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date_debut = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date_fin_prevue = null;

    #[ORM\Column(length: 20)]
    private ?string $statut = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'chantiers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Client $client = null;

    /**
     * @var Collection<int, Devis>
     */
    #[ORM\OneToMany(targetEntity: Devis::class, mappedBy: 'chantier')]
    private Collection $devis;

    /**
     * @var Collection<int, Intervention>
     */
    #[ORM\OneToMany(targetEntity: Intervention::class, mappedBy: 'chantier')]
    private Collection $interventions;

    /**
     * @var Collection<int, Utilise>
     */
    #[ORM\OneToMany(targetEntity: Utilise::class, mappedBy: 'chantier')]
    private Collection $utilisations;

    /**
     * @var Collection<int, Consomme>
     */
    #[ORM\OneToMany(targetEntity: Consomme::class, mappedBy: 'chantier')]
    private Collection $consommations;

    public function __construct()
    {
        $this->devis = new ArrayCollection();
        $this->interventions = new ArrayCollection();
        $this->utilisations = new ArrayCollection();
        $this->consommations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomChantier(): ?string
    {
        return $this->nom_chantier;
    }

    public function setNomChantier(string $nom_chantier): static
    {
        $this->nom_chantier = $nom_chantier;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getDateDebut(): ?\DateTime
    {
        return $this->date_debut;
    }

    public function setDateDebut(\DateTime $date_debut): static
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    public function getDateFinPrevue(): ?\DateTime
    {
        return $this->date_fin_prevue;
    }

    public function setDateFinPrevue(\DateTime $date_fin_prevue): static
    {
        $this->date_fin_prevue = $date_fin_prevue;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): static
    {
        $this->statut = $statut;

        return $this;
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

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): static
    {
        $this->client = $client;

        return $this;
    }

    /**
     * @return Collection<int, Devis>
     */
    public function getDevis(): Collection
    {
        return $this->devis;
    }

    public function addDevi(Devis $devi): static
    {
        if (!$this->devis->contains($devi)) {
            $this->devis->add($devi);
            $devi->setChantier($this);
        }

        return $this;
    }

    public function removeDevi(Devis $devi): static
    {
        if ($this->devis->removeElement($devi)) {
            // set the owning side to null (unless already changed)
            if ($devi->getChantier() === $this) {
                $devi->setChantier(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Intervention>
     */
    public function getInterventions(): Collection
    {
        return $this->interventions;
    }

    public function addIntervention(Intervention $intervention): static
    {
        if (!$this->interventions->contains($intervention)) {
            $this->interventions->add($intervention);
            $intervention->setChantier($this);
        }

        return $this;
    }

    public function removeIntervention(Intervention $intervention): static
    {
        if ($this->interventions->removeElement($intervention)) {
            // set the owning side to null (unless already changed)
            if ($intervention->getChantier() === $this) {
                $intervention->setChantier(null);
            }
        }

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
            $utilisation->setChantier($this);
        }

        return $this;
    }

    public function removeUtilisation(Utilise $utilisation): static
    {
        if ($this->utilisations->removeElement($utilisation)) {
            // set the owning side to null (unless already changed)
            if ($utilisation->getChantier() === $this) {
                $utilisation->setChantier(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Consomme>
     */
    public function getConsommations(): Collection
    {
        return $this->consommations;
    }

    public function addConsommation(Consomme $consommation): static
    {
        if (!$this->consommations->contains($consommation)) {
            $this->consommations->add($consommation);
            $consommation->setChantier($this);
        }

        return $this;
    }

    public function removeConsommation(Consomme $consommation): static
    {
        if ($this->consommations->removeElement($consommation)) {
            // set the owning side to null (unless already changed)
            if ($consommation->getChantier() === $this) {
                $consommation->setChantier(null);
            }
        }

        return $this;
    }
}
