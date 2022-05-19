<?php

namespace App\Entity;

use App\Repository\NotificationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NotificationRepository::class)]
class Notification
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $message;

    #[ORM\Column(type: 'datetime')]
    private $date_notification;

    #[ORM\Column(type: 'boolean')]
    private $readed;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'notifications')]
    private $User;




    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getDateNotification(): ?\DateTimeInterface
    {
        return $this->date_notification;
    }

    public function setDateNotification(\DateTimeInterface $date_notification): self
    {
        $this->date_notification = $date_notification;

        return $this;
    }

    public function isReaded(): ?bool
    {
        return $this->readed;
    }

    public function setReaded(bool $readed): self
    {
        $this->readed = $readed;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): self
    {
        $this->User = $User;

        return $this;
    }


}
