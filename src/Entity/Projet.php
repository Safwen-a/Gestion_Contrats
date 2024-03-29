<?php

namespace App\Entity;

use App\Repository\ProjetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjetRepository::class)]
class Projet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $Cluster;

    #[ORM\Column(type: 'string', length: 255)]
    private $Nom_projet;

    #[ORM\Column(type: 'string', length: 255)]
    private $Nom_charge_dossier;

    #[ORM\Column(type: 'string', length: 255)]
    private $Lieu_intervention;

    #[ORM\ManyToOne(targetEntity: Client::class, inversedBy: 'projets')]
    private $client_id;

    #[ORM\ManyToMany(targetEntity: Compteur::class, mappedBy: 'relation_pr')]
    private $compteurs;

    public function __construct()
    {
        $this->compteurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCluster(): ?string
    {
        return $this->Cluster;
    }

    public function setCluster(string $Cluster): self
    {
        $this->Cluster = $Cluster;

        return $this;
    }

    public function getNomProjet(): ?string
    {
        return $this->Nom_projet;
    }

    public function setNomProjet(string $Nom_projet): self
    {
        $this->Nom_projet = $Nom_projet;

        return $this;
    }

    public function getNomChargeDossier(): ?string
    {
        return $this->Nom_charge_dossier;
    }

    public function setNomChargeDossier(string $Nom_charge_dossier): self
    {
        $this->Nom_charge_dossier = $Nom_charge_dossier;

        return $this;
    }

    public function getLieuIntervention(): ?string
    {
        return $this->Lieu_intervention;
    }

    public function setLieuIntervention(string $Lieu_intervention): self
    {
        $this->Lieu_intervention = $Lieu_intervention;

        return $this;
    }

    public function getClientId(): ?Client
    {
        return $this->client_id;
    }

    public function setClientId(?Client $client_id): self
    {
        $this->client_id = $client_id;

        return $this;
    }

    /**
     * @return Collection<int, Compteur>
     */
    public function getCompteurs(): Collection
    {
        return $this->compteurs;
    }

    public function addCompteur(Compteur $compteur): self
    {
        if (!$this->compteurs->contains($compteur)) {
            $this->compteurs[] = $compteur;
            $compteur->addRelationPr($this);
        }

        return $this;
    }

    public function removeCompteur(Compteur $compteur): self
    {
        if ($this->compteurs->removeElement($compteur)) {
            $compteur->removeRelationPr($this);
        }

        return $this;
    }
}
