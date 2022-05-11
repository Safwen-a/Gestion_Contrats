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

    

    #[ORM\Column(type: 'string', length: 255)]
    private $etat_contrat="dddd";

    #[ORM\Column(type: 'string', length: 255)]
    private $description="dddd";

   

    #[ORM\Column(type: 'decimal', precision: 10, scale: '0')]
    private $forfait;

    #[ORM\Column(type: 'decimal', precision: 10, scale: '0')]
    private $frais_transport;

    #[ORM\Column(type: 'array')]
    private $type = [];

    #[ORM\Column(type: 'integer')]
    private $Num_Contrat_Cadre;

    

    #[ORM\Column(type: 'array')]
    private $TeamExperts = [];

    #[ORM\ManyToOne(targetEntity: Client::class, inversedBy: 'contrats')]
    private $client;

    #[ORM\Column(type: 'float', nullable: true)]
    private $Remuneration_totale;

    #[ORM\Column(type: 'float', nullable: true)]
    private $expertjours;

    #[ORM\Column(type: 'float', nullable: true)]
    private $HommeJours;

    #[ORM\Column(type: 'float', nullable: true)]
    private $Frais_Service;

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

    public function getRemuneration_Totale(): ?float
    {
        return $this->Remuneration_totale;
    }

    public function setRemuneration_Totale(?float $Remuneration_totale): self
    {
        $this->Remuneration_totale = $Remuneration_totale;

        return $this;
    }

    public function getExpertjours(): ?float
    {
        return $this->expertjours;
    }

    public function setExpertjours(?float $expertjours): self
    {
        $this->expertjours = $expertjours;

        return $this;
    }

    public function getHommeJours(): ?float
    {
        return $this->HommeJours;
    }

    public function setHommeJours(?float $HommeJours): self
    {
        $this->HommeJours = $HommeJours;

        return $this;
    }

    public function getFraisService(): ?float
    {
        return $this->Frais_Service;
    }

    public function setFraisService(?float $Frais_Service): self
    {
        $this->Frais_Service = $Frais_Service;

        return $this;
    }
   
}
