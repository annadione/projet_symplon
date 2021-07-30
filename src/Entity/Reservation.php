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
     * @ORM\OneToMany(targetEntity=Passager::class, mappedBy="reservation")
     */
    private $relation;

    /**
     * @ORM\ManyToOne(targetEntity=Passager::class, inversedBy="reservations")
     */
    private $passager;

    public function __construct()
    {
        $this->relation = new ArrayCollection();
    }

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

    /**
     * @return Collection|Passager[]
     */
    public function getRelation(): Collection
    {
        return $this->relation;
    }

    public function addRelation(Passager $relation): self
    {
        if (!$this->relation->contains($relation)) {
            $this->relation[] = $relation;
            $relation->setReservation($this);
        }

        return $this;
    }

    public function removeRelation(Passager $relation): self
    {
        if ($this->relation->removeElement($relation)) {
            // set the owning side to null (unless already changed)
            if ($relation->getReservation() === $this) {
                $relation->setReservation(null);
            }
        }

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
}
