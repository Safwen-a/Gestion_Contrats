<?php

namespace App\Entity;

use App\Repository\FinancierRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FinancierRepository::class)]
class Financier extends User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }
}
