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

    #[ORM\Column(type: 'string', length: 255)]
    private $Contrat_Cadre;

    #[ORM\Column(type: 'string', length: 255)]
    private $Contrat_Normale;

    #[ORM\Column(type: 'string', length: 255)]
    private $Avenant;

    #[ORM\OneToMany(mappedBy: 'Type', targetEntity: Contrat::class)]
    private $Contrats;

    public function __construct()
    {
        $this->Contrats = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContratCadre(): ?string
    {
        return $this->Contrat_Cadre;
    }

    public function setContratCadre(string $Contrat_Cadre): self
    {
        $this->Contrat_Cadre = $Contrat_Cadre;

        return $this;
    }

    public function getContratNormale(): ?string
    {
        return $this->Contrat_Normale;
    }

    public function setContratNormale(string $Contrat_Normale): self
    {
        $this->Contrat_Normale = $Contrat_Normale;

        return $this;
    }

    public function getAvenant(): ?string
    {
        return $this->Avenant;
    }

    public function setAvenant(string $Avenant): self
    {
        $this->Avenant = $Avenant;

        return $this;
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
}
