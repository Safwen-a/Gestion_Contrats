<?php

namespace App\Entity;

use App\Repository\CompteurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompteurRepository::class)]
class Compteur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'date')]
    private $date;

    #[ORM\Column(type: 'integer')]
    private $nombre_heure;

    #[ORM\ManyToMany(targetEntity: Expert::class, inversedBy: 'compteurs')]
    private $relation_ex;

    #[ORM\ManyToMany(targetEntity: Projet::class, inversedBy: 'compteurs')]
    private $relation_pr;

    #[ORM\ManyToMany(targetEntity: Client::class, inversedBy: 'compteurs')]
    private $relation_cl;

    public function __construct()
    {
        $this->relation_ex = new ArrayCollection();
        $this->relation_pr = new ArrayCollection();
        $this->relation_cl = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getNombreHeure(): ?int
    {
        return $this->nombre_heure;
    }

    public function setNombreHeure(int $nombre_heure): self
    {
        $this->nombre_heure = $nombre_heure;

        return $this;
    }

    /**
     * @return Collection<int, Expert>
     */
    public function getRelationEx(): Collection
    {
        return $this->relation_ex;
    }

    public function addRelationEx(Expert $relationEx): self
    {
        if (!$this->relation_ex->contains($relationEx)) {
            $this->relation_ex[] = $relationEx;
        }

        return $this;
    }

    public function removeRelationEx(Expert $relationEx): self
    {
        $this->relation_ex->removeElement($relationEx);

        return $this;
    }

    /**
     * @return Collection<int, Projet>
     */
    public function getRelationPr(): Collection
    {
        return $this->relation_pr;
    }

    public function addRelationPr(Projet $relationPr): self
    {
        if (!$this->relation_pr->contains($relationPr)) {
            $this->relation_pr[] = $relationPr;
        }

        return $this;
    }

    public function removeRelationPr(Projet $relationPr): self
    {
        $this->relation_pr->removeElement($relationPr);

        return $this;
    }

    /**
     * @return Collection<int, Client>
     */
    public function getRelationCl(): Collection
    {
        return $this->relation_cl;
    }

    public function addRelationCl(Client $relationCl): self
    {
        if (!$this->relation_cl->contains($relationCl)) {
            $this->relation_cl[] = $relationCl;
        }

        return $this;
    }

    public function removeRelationCl(Client $relationCl): self
    {
        $this->relation_cl->removeElement($relationCl);

        return $this;
    }
}
