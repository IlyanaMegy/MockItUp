<?php

namespace App\Entity;

use App\Repository\ChannelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChannelRepository::class)
 * @ORM\Table(name="channels")
 */
class Channel
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
    private $name;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $logoUrl;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $bgURL;

    /**
     * @ORM\OneToMany(targetEntity=Tag::class, mappedBy="channel")
     */
    private $tags;

    /**
     * @ORM\Column(type="integer")
     */
    private $ownerId;

    /**
     * @ORM\Column(type="integer")
     */
    private $subscriberNb;

    /**
     * @ORM\OneToMany(targetEntity=Subscriber::class, mappedBy="channel")
     */
    private $subscribers;

    /**
     * @ORM\Column(type="integer")
     */
    private $postNb;

    /**
     * @ORM\OneToMany(targetEntity=Post::class, mappedBy="channel")
     */
    private $posts;

    public function __construct()
    {
        $this->tags = new ArrayCollection();
        $this->subscribers = new ArrayCollection();
        $this->posts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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

    public function getLogoUrl(): ?string
    {
        return $this->logoUrl;
    }

    public function setLogoUrl(string $logoUrl): self
    {
        $this->logoUrl = $logoUrl;

        return $this;
    }

    public function getBgURL(): ?string
    {
        return $this->bgURL;
    }

    public function setBgURL(string $bgURL): self
    {
        $this->bgURL = $bgURL;

        return $this;
    }

    /**
     * @return Collection|Tag[]
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    public function addTag(Tag $tag): self
    {
        if (!$this->tags->contains($tag)) {
            $this->tags[] = $tag;
            $tag->setChannel($this);
        }

        return $this;
    }

    public function removeTag(Tag $tag): self
    {
        if ($this->tags->removeElement($tag)) {
            // set the owning side to null (unless already changed)
            if ($tag->getChannel() === $this) {
                $tag->setChannel(null);
            }
        }

        return $this;
    }

    public function getOwnerId(): ?int
    {
        return $this->ownerId;
    }

    public function setOwnerId(int $ownerId): self
    {
        $this->ownerId = $ownerId;

        return $this;
    }

    public function getSubscriberNb(): ?int
    {
        return $this->subscriberNb;
    }

    public function setSubscriberNb(int $subscriberNb): self
    {
        $this->subscriberNb = $subscriberNb;

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
            $subscriber->setChannel($this);
        }

        return $this;
    }

    public function removeSubscriber(Subscriber $subscriber): self
    {
        if ($this->subscribers->removeElement($subscriber)) {
            // set the owning side to null (unless already changed)
            if ($subscriber->getChannel() === $this) {
                $subscriber->setChannel(null);
            }
        }

        return $this;
    }

    public function getPostNb(): ?int
    {
        return $this->postNb;
    }

    public function setPostNb(int $postNb): self
    {
        $this->postNb = $postNb;

        return $this;
    }

    /**
     * @return Collection|Post[]
     */
    public function getPosts(): Collection
    {
        return $this->posts;
    }

    public function addPost(Post $post): self
    {
        if (!$this->posts->contains($post)) {
            $this->posts[] = $post;
            $post->setChannel($this);
        }

        return $this;
    }

    public function removePost(Post $post): self
    {
        if ($this->posts->removeElement($post)) {
            // set the owning side to null (unless already changed)
            if ($post->getChannel() === $this) {
                $post->setChannel(null);
            }
        }

        return $this;
    }
}
