<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReservationRepository::class)
 */
class Reservation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $confirmee;

    /**
     * @ORM\Column(type="boolean")
     */
    private $annulee;

    /**
     * @ORM\ManyToOne(targetEntity=Trajet::class, inversedBy="reservation")
     */
    private $trajet;

    /**
     * @ORM\ManyToOne(targetEntity=Passager::class, inversedBy="reservations")
     */
    private $passager;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="reservations")
     */
    private $user;
   

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getConfirmee(): ?bool
    {
        return $this->confirmee;
    }

    public function setConfirmee(bool $confirmee): self
    {
        $this->confirmee = $confirmee;

        return $this;
    }

    public function getAnnulee(): ?bool
    {
        return $this->annulee;
    }

    public function setAnnulee(bool $annulee): self
    {
        $this->annulee = $annulee;

        return $this;
    }

    public function getTrajet(): ?Trajet
    {
        return $this->trajet;
    }

    public function setTrajet(?Trajet $trajet): self
    {
        $this->trajet = $trajet;

        return $this;
    }

    public function getPassager(): ?Passager
    {
        return $this->passager;
    }

    public function setPassager(?Passager $passager): self
    {
        $this->passager = $passager;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

   
}
