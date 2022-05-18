<?php

namespace App\Entity;

use App\Repository\ContratRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    private $frais_transport;

  

    #[ORM\Column(type: 'integer')]
    private $Num_Contrat_Cadre;

    


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

    #[ORM\OneToMany(mappedBy: 'contrat', targetEntity: FicheIntervention::class)]
    private $interventions;

    #[ORM\ManyToOne(targetEntity: TypeContrat::class)]
    private $type;

    #[ORM\ManyToOne(targetEntity: Expert::class, inversedBy: 'contrats')]
    #[ORM\JoinColumn(nullable: false)]
    private $Expert;

    #[ORM\ManyToOne(targetEntity: Expert::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $Interim;

    

    public function __construct()
    {
        $this->interventions = new ArrayCollection();
    }

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


    public function getFraisTransport(): ?string
    {
        return $this->frais_transport;
    }

    public function setFraisTransport(string $frais_transport): self
    {
        $this->frais_transport = $frais_transport;

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





    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getRemunerationTotale(): ?float
    {
        return $this->Remuneration_totale;
    }

    public function setRemunerationTotale(?float $Remuneration_totale): self
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

    /**
     * @return Collection<int, FicheIntervention>
     */
    public function getInterventions(): Collection
    {
        return $this->interventions;
    }

    public function addIntervention(FicheIntervention $intervention): self
    {
        if (!$this->interventions->contains($intervention)) {
            $this->interventions[] = $intervention;
            $intervention->setContrat($this);
        }

        return $this;
    }

    public function removeIntervention(FicheIntervention $intervention): self
    {
        if ($this->interventions->removeElement($intervention)) {
            // set the owning side to null (unless already changed)
            if ($intervention->getContrat() === $this) {
                $intervention->setContrat(null);
            }
        }

        return $this;
    }

    public function getType(): ?TypeContrat
    {
        return $this->type;
    }

    public function setType(?TypeContrat $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getExpert(): ?Expert
    {
        return $this->Expert;
    }

    public function setExpert(?Expert $Expert): self
    {
        $this->Expert = $Expert;

        return $this;
    }

    public function getInterim(): ?Expert
    {
        return $this->Interim;
    }

    public function setInterim(?Expert $Interim): self
    {
        $this->Interim = $Interim;

        return $this;
    }

   
}
