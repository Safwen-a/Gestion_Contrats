<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $Name;

    #[ORM\Column(type: 'string', length: 255)]
    private $Nom_Complet;


    #[ORM\Column(type: 'string', length: 255)]
    private $pays;

    #[ORM\OneToMany(mappedBy: 'client_id', targetEntity: Projet::class)]
    private $projets;

    #[ORM\ManyToOne(targetEntity: Categorie::class, inversedBy: 'clients',)]
    #[ORM\JoinColumn(nullable: false)]
    private $categorie;

    #[ORM\OneToMany(mappedBy: 'client', targetEntity: Contrat::class)]
    private $contrats;

    #[ORM\ManyToMany(targetEntity: Compteur::class, mappedBy: 'relation_cl')]
    private $compteurs;

    public function __construct()
    {
        $this->projets = new ArrayCollection();
        $this->contrats = new ArrayCollection();
        $this->compteurs = new ArrayCollection();
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

    public function getNomComplet(): ?string
    {
        return $this->Nom_Complet;
    }

    public function setNomComplet(string $Nom_Complet): self
    {
        $this->Nom_Complet = $Nom_Complet;

        return $this;
    }


    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * @return Collection<int, Projet>
     */
    public function getProjets(): Collection
    {
        return $this->projets;
    }

    public function addProjet(Projet $projet): self
    {
        if (!$this->projets->contains($projet)) {
            $this->projets[] = $projet;
            $projet->setClientId($this);
        }

        return $this;
    }

    public function removeProjet(Projet $projet): self
    {
        if ($this->projets->removeElement($projet)) {
            // set the owning side to null (unless already changed)
            if ($projet->getClientId() === $this) {
                $projet->setClientId(null);
            }
        }

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
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
            $contrat->setClient($this);
        }

        return $this;
    }

    public function removeContrat(Contrat $contrat): self
    {
        if ($this->contrats->removeElement($contrat)) {
            // set the owning side to null (unless already changed)
            if ($contrat->getClient() === $this) {
                $contrat->setClient(null);
            }
        }

        return $this;
    }
    public function __toString(): string {
        return $this->Name.":".$this->Nom_Complet;
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
            $compteur->addRelationCl($this);
        }

        return $this;
    }

    public function removeCompteur(Compteur $compteur): self
    {
        if ($this->compteurs->removeElement($compteur)) {
            $compteur->removeRelationCl($this);
        }

        return $this;
    }
}
