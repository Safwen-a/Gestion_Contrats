<?php

namespace App\Entity;

use App\Repository\FicheInterventionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FicheInterventionRepository::class)]
class FicheIntervention
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $Nom_Intervention;

    #[ORM\Column(type: 'date')]
    private $Date_Intervention;



    #[ORM\Column(type: 'integer')]
    private $Nombre_H_realise;

    #[ORM\Column(type: 'text')]
    private $description;

    #[ORM\Column(type: 'string', length: 255)]
    private $Lieu_Intervention;

    #[ORM\ManyToOne(targetEntity: Expert::class, inversedBy: 'Fiches_Intervention')]
    private $Expert;

    #[ORM\ManyToOne(targetEntity: Contrat::class, inversedBy: 'interventions')]
    private $contrat;

    #[ORM\ManyToOne(targetEntity: TypeIntervention::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $Type;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomIntervention(): ?string
    {
        return $this->Nom_Intervention;
    }

    public function setNomIntervention(string $Nom_Intervention): self
    {
        $this->Nom_Intervention = $Nom_Intervention;

        return $this;
    }

    public function getDateIntervention(): ?\DateTimeInterface
    {
        return $this->Date_Intervention;
    }

    public function setDateIntervention(\DateTimeInterface $Date_Intervention): self
    {
        $this->Date_Intervention = $Date_Intervention;

        return $this;
    }


    public function getNombreHRealise(): ?int
    {
        return $this->Nombre_H_realise;
    }

    public function setNombreHRealise(int $Nombre_H_realise): self
    {
        $this->Nombre_H_realise = $Nombre_H_realise;

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

    public function getLieuIntervention(): ?string
    {
        return $this->Lieu_Intervention;
    }

    public function setLieuIntervention(string $Lieu_Intervention): self
    {
        $this->Lieu_Intervention = $Lieu_Intervention;

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

    public function getContrat(): ?Contrat
    {
        return $this->contrat;
    }

    public function setContrat(?Contrat $contrat): self
    {
        $this->contrat = $contrat;

        return $this;
    }

    public function getType(): ?TypeIntervention
    {
        return $this->Type;
    }

    public function setType(?TypeIntervention $Type): self
    {
        $this->Type = $Type;

        return $this;
    }
}
