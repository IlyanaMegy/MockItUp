<?php

namespace App\Entity;

use App\Repository\OwnedChanRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OwnedChanRepository::class)
 * @ORM\Table(name="ownedchans")
 */
class OwnedChan
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $chanId;

    /**
     * @ORM\ManyToOne(targetEntity=Profil::class, inversedBy="ownedChans")
     */
    private $profil;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getChanId(): ?int
    {
        return $this->chanId;
    }

    public function setChanId(int $chanId): self
    {
        $this->chanId = $chanId;

        return $this;
    }

    public function getProfil(): ?Profil
    {
        return $this->profil;
    }

    public function setProfil(?Profil $profil): self
    {
        $this->profil = $profil;

        return $this;
    }
}
