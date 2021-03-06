<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AffecterRepository")
 */
class Affecter
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $licence;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nb;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="affecters")
     * @ORM\JoinColumn(nullable=false)
     */
    private $User;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Logiciel", inversedBy="affecters")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Logiciel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLicence(): ?string
    {
        return $this->licence;
    }

    public function setLicence(string $licence): self
    {
        $this->licence = $licence;

        return $this;
    }

    public function getNb(): ?string
    {
        return $this->nb;
    }

    public function setNb(string $nb): self
    {
        $this->nb = $nb;

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

    public function getLogiciel(): ?Logiciel
    {
        return $this->Logiciel;
    }

    public function setLogiciel(?Logiciel $Logiciel): self
    {
        $this->Logiciel = $Logiciel;

        return $this;
    }
}
