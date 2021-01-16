<?php

namespace App\Entity;

use App\Repository\ProfilRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProfilRepository::class)
 */
class Profil
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $username;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $country;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $gender;

    /**
     * @ORM\Column(type="datetime")
     */
    private $birthDate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $picUrl;

    /**
     * @ORM\OneToMany(targetEntity=Subscription::class, mappedBy="profil")
     */
    private $subscriptions;

    /**
     * @ORM\OneToMany(targetEntity=Friend::class, mappedBy="profil")
     */
    private $friends;

    /**
     * @ORM\OneToMany(targetEntity=Subscriber::class, mappedBy="profil")
     */
    private $subscribers;

    /**
     * @ORM\OneToMany(targetEntity=JoinedChan::class, mappedBy="profil")
     */
    private $joinedChans;

    /**
     * @ORM\OneToMany(targetEntity=OwnedChan::class, mappedBy="profil")
     */
    private $ownedChans;

    /**
     * @ORM\Column(type="integer")
     */
    private $age;

    public function __construct()
    {
        $this->subscriptions = new ArrayCollection();
        $this->friends = new ArrayCollection();
        $this->subscribers = new ArrayCollection();
        $this->joinedChans = new ArrayCollection();
        $this->ownedChans = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthDate(\DateTimeInterface $birthDate): self
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    public function getPicUrl(): ?string
    {
        return $this->picUrl;
    }

    public function setPicUrl(string $picUrl): self
    {
        $this->picUrl = $picUrl;

        return $this;
    }

    /**
     * @return Collection|Subscription[]
     */
    public function getSubscriptions(): Collection
    {
        return $this->subscriptions;
    }

    public function addSubscription(Subscription $subscription): self
    {
        if (!$this->subscriptions->contains($subscription)) {
            $this->subscriptions[] = $subscription;
            $subscription->setProfil($this);
        }

        return $this;
    }

    public function removeSubscription(Subscription $subscription): self
    {
        if ($this->subscriptions->removeElement($subscription)) {
            // set the owning side to null (unless already changed)
            if ($subscription->getProfil() === $this) {
                $subscription->setProfil(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Friend[]
     */
    public function getFriends(): Collection
    {
        return $this->friends;
    }

    public function addFriend(Friend $friend): self
    {
        if (!$this->friends->contains($friend)) {
            $this->friends[] = $friend;
            $friend->setProfil($this);
        }

        return $this;
    }

    public function removeFriend(Friend $friend): self
    {
        if ($this->friends->removeElement($friend)) {
            // set the owning side to null (unless already changed)
            if ($friend->getProfil() === $this) {
                $friend->setProfil(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Subscriber[]
     */
    public function getSubscribers(): Collection
    {
        return $this->subscribers;
    }

    public function addSubscriber(Subscriber $subscriber): self
    {
        if (!$this->subscribers->contains($subscriber)) {
            $this->subscribers[] = $subscriber;
            $subscriber->setProfil($this);
        }

        return $this;
    }

    public function removeSubscriber(Subscriber $subscriber): self
    {
        if ($this->subscribers->removeElement($subscriber)) {
            // set the owning side to null (unless already changed)
            if ($subscriber->getProfil() === $this) {
                $subscriber->setProfil(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|JoinedChan[]
     */
    public function getJoinedChans(): Collection
    {
        return $this->joinedChans;
    }

    public function addJoinedChan(JoinedChan $joinedChan): self
    {
        if (!$this->joinedChans->contains($joinedChan)) {
            $this->joinedChans[] = $joinedChan;
            $joinedChan->setProfil($this);
        }

        return $this;
    }

    public function removeJoinedChan(JoinedChan $joinedChan): self
    {
        if ($this->joinedChans->removeElement($joinedChan)) {
            // set the owning side to null (unless already changed)
            if ($joinedChan->getProfil() === $this) {
                $joinedChan->setProfil(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|OwnedChan[]
     */
    public function getOwnedChans(): Collection
    {
        return $this->ownedChans;
    }

    public function addOwnedChan(OwnedChan $ownedChan): self
    {
        if (!$this->ownedChans->contains($ownedChan)) {
            $this->ownedChans[] = $ownedChan;
            $ownedChan->setProfil($this);
        }

        return $this;
    }

    public function removeOwnedChan(OwnedChan $ownedChan): self
    {
        if ($this->ownedChans->removeElement($ownedChan)) {
            // set the owning side to null (unless already changed)
            if ($ownedChan->getProfil() === $this) {
                $ownedChan->setProfil(null);
            }
        }

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }
}
