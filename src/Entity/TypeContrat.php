<?php

namespace App\Entity;

use App\Repository\TypeContratRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeContratRepository::class)]
class TypeContrat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    

    #[ORM\OneToMany(mappedBy: 'Type', targetEntity: Contrat::class)]
    private $Contrats;

    #[ORM\Column(type: 'string', length: 255)]
    private $Nom_Type;

    public function __construct()
    {
        $this->Contrats = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

   

    /**
     * @return Collection<int, Contrat>
     */
    public function getContrats(): Collection
    {
        return $this->Contrats;
    }

    public function addContrat(Contrat $contrat): self
    {
        if (!$this->Contrats->contains($contrat)) {
            $this->Contrats[] = $contrat;
            $contrat->setType($this);
        }

        return $this;
    }

    public function removeContrat(Contrat $contrat): self
    {
        if ($this->Contrats->removeElement($contrat)) {
            // set the owning side to null (unless already changed)
            if ($contrat->getType() === $this) {
                $contrat->setType(null);
            }
        }

        return $this;
    }

    public function getNomType(): ?string
    {
        return $this->Nom_Type;
    }

    public function setNomType(string $Nom_Type): self
    {
        $this->Nom_Type = $Nom_Type;

        return $this;
    }
}
