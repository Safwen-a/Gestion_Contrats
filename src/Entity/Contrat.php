<?php

namespace App\Entity;

use App\Repository\ContratRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContratRepository::class)]
class Contrat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $Name;

    #[ORM\Column(type: 'integer')]
    private $Num_Contrat;

    #[ORM\Column(type: 'date')]
    private $start;

    #[ORM\Column(type: 'date')]
    private $end;

    #[ORM\Column(type: 'integer')]
    private $nombre_H_totale;

    #[ORM\Column(type: 'integer')]
    private $nombre_H_restant;

    #[ORM\Column(type: 'string', length: 255)]
    private $etat_contrat;

    #[ORM\Column(type: 'string', length: 255)]
    private $description;

    #[ORM\Column(type: 'decimal', precision: 10, scale: '0')]
    private $prix;

    #[ORM\Column(type: 'decimal', precision: 10, scale: '0')]
    private $forfait;

    #[ORM\Column(type: 'decimal', precision: 10, scale: '0')]
    private $frais_transport;

    #[ORM\Column(type: 'array')]
    private $type = [];

    #[ORM\Column(type: 'integer')]
    private $Num_Contrat_Cadre;

    #[ORM\Column(type: 'integer')]
    private $Nb_expert_jours;

    #[ORM\Column(type: 'integer')]
    private $Homme_Jours_Experts;

    #[ORM\Column(type: 'array')]
    private $TeamExperts = [];

    #[ORM\ManyToOne(targetEntity: Client::class, inversedBy: 'contrats')]
    private $client;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getNumContrat(): ?int
    {
        return $this->Num_Contrat;
    }

    public function setNumContrat(int $Num_Contrat): self
    {
        $this->Num_Contrat = $Num_Contrat;

        return $this;
    }

    public function getStart(): ?\DateTimeInterface
    {
        return $this->start;
    }

    public function setStart(\DateTimeInterface $start): self
    {
        $this->start = $start;

        return $this;
    }

    public function getEnd(): ?\DateTimeInterface
    {
        return $this->end;
    }

    public function setEnd(\DateTimeInterface $end): self
    {
        $this->end = $end;

        return $this;
    }

    public function getNombreHTotale(): ?int
    {
        return $this->nombre_H_totale;
    }

    public function setNombreHTotale(int $nombre_H_totale): self
    {
        $this->nombre_H_totale = $nombre_H_totale;

        return $this;
    }

    public function getNombreHRestant(): ?int
    {
        return $this->nombre_H_restant;
    }

    public function setNombreHRestant(int $nombre_H_restant): self
    {
        $this->nombre_H_restant = $nombre_H_restant;

        return $this;
    }

    public function getEtatContrat(): ?string
    {
        return $this->etat_contrat;
    }

    public function setEtatContrat(string $etat_contrat): self
    {
        $this->etat_contrat = $etat_contrat;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getForfait(): ?string
    {
        return $this->forfait;
    }

    public function setForfait(string $forfait): self
    {
        $this->forfait = $forfait;

        return $this;
    }

    public function getFraisTransport(): ?string
    {
        return $this->frais_transport;
    }

    public function setFraisTransport(string $frais_transport): self
    {
        $this->frais_transport = $frais_transport;

        return $this;
    }

    public function getType(): ?array
    {
        return $this->type;
    }

    public function setType(array $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getNumContratCadre(): ?int
    {
        return $this->Num_Contrat_Cadre;
    }

    public function setNumContratCadre(int $Num_Contrat_Cadre): self
    {
        $this->Num_Contrat_Cadre = $Num_Contrat_Cadre;

        return $this;
    }

    public function getNbExpertJours(): ?int
    {
        return $this->Nb_expert_jours;
    }

    public function setNbExpertJours(int $Nb_expert_jours): self
    {
        $this->Nb_expert_jours = $Nb_expert_jours;

        return $this;
    }

    public function getHommeJoursExperts(): ?int
    {
        return $this->Homme_Jours_Experts;
    }

    public function setHommeJoursExperts(int $Homme_Jours_Experts): self
    {
        $this->Homme_Jours_Experts = $Homme_Jours_Experts;

        return $this;
    }

    public function getTeamExperts(): ?array
    {
        return $this->TeamExperts;
    }

    public function setTeamExperts(array $TeamExperts): self
    {
        $this->TeamExperts = $TeamExperts;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }
}
