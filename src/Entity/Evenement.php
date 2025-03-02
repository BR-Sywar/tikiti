<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Entreprise;
use App\Entity\Evenement;
use App\Entity\Ticket;
use App\Entity\HoraireTravail;
use App\Entity\Categories;






/**
 * @ORM\Entity(repositoryClass="App\Repository\EvenementRepository")
 */
class Evenement
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     *
     * @ORM\Column(type="string")
     */
    private $titre;
   /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Entreprise", inversedBy="event")
     * @ORM\JoinColumn(nullable=false)
     */
    private $entreprise;
      /**
     *
     * @ORM\Column(type="date")
     */
    private $dateDebut;
  /**
     *
     * @ORM\Column(type="date")
     */
    private $dateFin;
  /**
     *
     * @ORM\Column(type="string")
     */
    private $heureDebut;
  /**
     *
     * @ORM\Column(type="string")
     */
    private $heureFin;

    private $dateDebutTemp;
    private $dateFinTemp;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getHeureDebut(): ?string
    {
        return $this->heureDebut;
    }

    public function setHeureDebut(string $heureDebut): self
    {
        $this->heureDebut = $heureDebut;

        return $this;
    }

    public function getHeureFin(): ?string
    {
        return $this->heureFin;
    }

    public function setHeureFin(string $heureFin): self
    {
        $this->heureFin = $heureFin;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getEntreprise(): ?Entreprise
    {
        return $this->entreprise;
    }

    public function setEntreprise(?Entreprise $entreprise): self
    {
        $this->entreprise = $entreprise;

        return $this;
    }
    public function getDateDebutTemp(): ?string
    {
        return $this->dateDebutTemp;
    }

    public function setDateDebutTemp(string $dateDebutTemp): self
    {
        $this->dateDebutTemp = $dateDebutTemp;

        return $this;
    }
    public function getDateFinTemp(): ?string
    {
        return $this->dateFinTemp;
    }

    public function setDateFinTemp(string $dateFinTemp): self
    {
        $this->dateFinTemp = $dateFinTemp;

        return $this;
    }
    
    
}
