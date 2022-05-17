<?php

namespace App\Entity;

use App\Repository\ExpertRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExpertRepository::class)]
class Expert 
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    private $email;
    
    
    #[ORM\Column(type: 'integer', nullable:true)]
    private $Nombre_H_Fait;

    #[ORM\Column(type: 'string', length: 255)]
    private $Name;

    #[ORM\Column(type: 'string', length: 255)]
    private $FirstName;

    #[ORM\Column(type: 'integer',nullable:true)]
    private $Tel;

    #[ORM\OneToMany(mappedBy: 'Expert', targetEntity: FicheIntervention::class)]
    private $Fiches_Intervention;

    #[ORM\ManyToMany(targetEntity: Contrat::class, mappedBy: 'TeamExperts')]
    private $contrats;

    public function __construct()
    {
        $this->Fiches_Intervention = new ArrayCollection();
        $this->contrats = new ArrayCollection();
    }

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

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->FirstName;
    }

    public function setFirstName(string $FirstName): self
    {
        $this->FirstName = $FirstName;

        return $this;
    }

    public function getTel(): ?int
    {
        return $this->Tel;
    }

    public function setTel(int $Tel): self
    {
        $this->Tel = $Tel;

        return $this;
    }

    /**
     * @return Collection<int, FicheIntervention>
     */
    public function getFichesIntervention(): Collection
    {
        return $this->Fiches_Intervention;
    }

    public function addFichesIntervention(FicheIntervention $fichesIntervention): self
    {
        if (!$this->Fiches_Intervention->contains($fichesIntervention)) {
            $this->Fiches_Intervention[] = $fichesIntervention;
            $fichesIntervention->setExpert($this);
        }

        return $this;
    }

    public function removeFichesIntervention(FicheIntervention $fichesIntervention): self
    {
        if ($this->Fiches_Intervention->removeElement($fichesIntervention)) {
            // set the owning side to null (unless already changed)
            if ($fichesIntervention->getExpert() === $this) {
                $fichesIntervention->setExpert(null);
            }
        }

        return $this;
    }
   
    public function ajouterExpert(User $utilisateur): Response
    {
        foreach ($this as $key => $value) {

            foreach ($Roles as $key => $value) {
               if ($value =="ROLE_EXPERT"){
                  $this->setName =($utilisateur->FirstName ); 
                  $this->setName($utilisateur->Nom) ;
               }
              }
          }
    }
public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }
    public function __toString():string {
        return $this->Name ;
    }

    /**
     * @return Collection<int, Contrat>
     */
    public function getContrats(): Collection
    {
        return $this->contrats;
    }

    public function addContrat(Contrat $contrat): self
    {
        if (!$this->contrats->contains($contrat)) {
            $this->contrats[] = $contrat;
            $contrat->addTeamExpert($this);
        }

        return $this;
    }

    public function removeContrat(Contrat $contrat): self
    {
        if ($this->contrats->removeElement($contrat)) {
            $contrat->removeTeamExpert($this);
        }

        return $this;
    }

}
