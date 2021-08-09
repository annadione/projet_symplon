<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\TrainRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=TrainRepository::class)
 * @ApiResource()
 */
class Train
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $numero_train;

    /**
     * @ORM\Column(type="time")
     */
    private $heure_depart;

    /**
     * @ORM\Column(type="time")
     */
    private $heure_arrivee;

    /**
     * @ORM\Column(type="date")
     */
    private $date_depart;

    /**
     * @ORM\Column(type="date")
     */
    private $date_arrivee;

    /**
     * @ORM\OneToMany(targetEntity=Trajet::class, mappedBy="train")
     */
    private $trajets;


    public function __construct()
    {
        $this->trajet = new ArrayCollection();
        $this->trajets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroTrain(): ?int
    {
        return $this->numero_train;
    }

    public function setNumeroTrain(int $numero_train): self
    {
        $this->numero_train = $numero_train;

        return $this;
    }

    public function getHeureDepart(): ?\DateTimeInterface
    {
        return $this->heure_depart;
    }

    public function setHeureDepart(\DateTimeInterface $heure_depart): self
    {
        $this->heure_depart = $heure_depart;

        return $this;
    }

    public function getHeureArrivee(): ?\DateTimeInterface
    {
        return $this->heure_arrivee;
    }

    public function setHeureArrivee(\DateTimeInterface $heure_arrivee): self
    {
        $this->heure_arrivee = $heure_arrivee;

        return $this;
    }

    public function getDateDepart(): ?\DateTimeInterface
    {
        return $this->date_depart;
    }

    public function setDateDepart(\DateTimeInterface $date_depart): self
    {
        $this->date_depart = $date_depart;

        return $this;
    }
    public function __toString()
    {
        return $this->numero_train;
    }

    public function getDateArrivee(): ?\DateTimeInterface
    {
        return $this->date_arrivee;
    }

    public function setDateArrivee(\DateTimeInterface $date_arrivee): self
    {
        $this->date_arrivee = $date_arrivee;

        return $this;
    }

    /**
     * @return Collection|Trajet[]
     */
    public function getTrajets(): Collection
    {
        return $this->trajets;
    }

    public function addTrajet(Trajet $trajet): self
    {
        if (!$this->trajets->contains($trajet)) {
            $this->trajets[] = $trajet;
            $trajet->setTrain($this);
        }

        return $this;
    }

    public function removeTrajet(Trajet $trajet): self
    {
        if ($this->trajets->removeElement($trajet)) {
            // set the owning side to null (unless already changed)
            if ($trajet->getTrain() === $this) {
                $trajet->setTrain(null);
            }
        }

        return $this;
    }


}
