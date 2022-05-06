<?php

namespace App\Entity;

use App\Repository\ExpertRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExpertRepository::class)]
class Expert extends User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $Etat_expert;

    #[ORM\Column(type: 'integer')]
    private $Nombre_H_Fait;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEtatExpert(): ?string
    {
        return $this->Etat_expert;
    }

    public function setEtatExpert(string $Etat_expert): self
    {
        $this->Etat_expert = $Etat_expert;

        return $this;
    }

    public function getNombreHFait(): ?int
    {
        return $this->Nombre_H_Fait;
    }

    public function setNombreHFait(int $Nombre_H_Fait): self
    {
        $this->Nombre_H_Fait = $Nombre_H_Fait;

        return $this;
    }
}
