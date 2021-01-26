<?php

namespace App\Entity;

use App\Repository\TagRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TagRepository::class)
 * @ORM\Table(name="tags")
 */
class Tag
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="binary")
     */
    private $humor;

    /**
     * @ORM\Column(type="binary")
     */
    private $politic;

    /**
     * @ORM\Column(type="binary")
     */
    private $travel;

    /**
     * @ORM\Column(type="binary")
     */
    private $religion;

    /**
     * @ORM\Column(type="binary")
     */
    private $food;

    /**
     * @ORM\Column(type="binary")
     */
    private $music;

    /**
     * @ORM\Column(type="binary")
     */
    private $art;

    /**
     * @ORM\Column(type="binary")
     */
    private $science;

    /**
     * @ORM\Column(type="binary")
     */
    private $sport;

    /**
     * @ORM\Column(type="binary")
     */
    private $animes;

    /**
     * @ORM\Column(type="binary")
     */
    private $gaming;

    /**
     * @ORM\Column(type="binary")
     */
    private $drawing;

    /**
     * @ORM\Column(type="binary")
     */
    private $hightech;

    /**
     * @ORM\Column(type="binary")
     */
    private $books;

    /**
     * @ORM\Column(type="binary")
     */
    private $philosophy;

    /**
     * @ORM\Column(type="binary")
     */
    private $poems;

    /**
     * @ORM\Column(type="binary")
     */
    private $movie;

    /**
     * @ORM\Column(type="binary")
     */
    private $education;

    /**
     * @ORM\Column(type="binary")
     */
    private $culture;

    /**
     * @ORM\Column(type="binary")
     */
    private $aesthetism;

    /**
     * @ORM\Column(type="binary")
     */
    private $photography;

    /**
     * @ORM\Column(type="binary")
     */
    private $nature;

    /**
     * @ORM\Column(type="binary")
     */
    private $mode;

    /**
     * @ORM\Column(type="binary")
     */
    private $beauty;

    /**
     * @ORM\ManyToOne(targetEntity=Post::class, inversedBy="tags")
     */
    private $post;

    /**
     * @ORM\ManyToOne(targetEntity=Channel::class, inversedBy="tags")
     */
    private $channel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHumor()
    {
        return $this->humor;
    }

    public function setHumor($humor): self
    {
        $this->humor = $humor;

        return $this;
    }

    public function getPolitic()
    {
        return $this->politic;
    }

    public function setPolitic($politic): self
    {
        $this->politic = $politic;

        return $this;
    }

    public function getTravel()
    {
        return $this->travel;
    }

    public function setTravel($travel): self
    {
        $this->travel = $travel;

        return $this;
    }

    public function getReligion()
    {
        return $this->religion;
    }

    public function setReligion($religion): self
    {
        $this->religion = $religion;

        return $this;
    }

    public function getFood()
    {
        return $this->food;
    }

    public function setFood($food): self
    {
        $this->food = $food;

        return $this;
    }

    public function getMusic()
    {
        return $this->music;
    }

    public function setMusic($music): self
    {
        $this->music = $music;

        return $this;
    }

    public function getArt()
    {
        return $this->art;
    }

    public function setArt($art): self
    {
        $this->art = $art;

        return $this;
    }

    public function getScience()
    {
        return $this->science;
    }

    public function setScience($science): self
    {
        $this->science = $science;

        return $this;
    }

    public function getSport()
    {
        return $this->sport;
    }

    public function setSport($sport): self
    {
        $this->sport = $sport;

        return $this;
    }

    public function getAnimes()
    {
        return $this->animes;
    }

    public function setAnimes($animes): self
    {
        $this->animes = $animes;

        return $this;
    }

    public function getGaming()
    {
        return $this->gaming;
    }

    public function setGaming($gaming): self
    {
        $this->gaming = $gaming;

        return $this;
    }

    public function getDrawing()
    {
        return $this->drawing;
    }

    public function setDrawing($drawing): self
    {
        $this->drawing = $drawing;

        return $this;
    }

    public function getHightech()
    {
        return $this->hightech;
    }

    public function setHightech($hightech): self
    {
        $this->hightech = $hightech;

        return $this;
    }

    public function getBooks()
    {
        return $this->books;
    }

    public function setBooks($books): self
    {
        $this->books = $books;

        return $this;
    }

    public function getPhilosophy()
    {
        return $this->philosophy;
    }

    public function setPhilosophy($philosophy): self
    {
        $this->philosophy = $philosophy;

        return $this;
    }

    public function getPoems()
    {
        return $this->poems;
    }

    public function setPoems($poems): self
    {
        $this->poems = $poems;

        return $this;
    }

    public function getMovie()
    {
        return $this->movie;
    }

    public function setMovie($movie): self
    {
        $this->movie = $movie;

        return $this;
    }

    public function getEducation()
    {
        return $this->education;
    }

    public function setEducation($education): self
    {
        $this->education = $education;

        return $this;
    }

    public function getCulture()
    {
        return $this->culture;
    }

    public function setCulture($culture): self
    {
        $this->culture = $culture;

        return $this;
    }

    public function getAesthetism()
    {
        return $this->aesthetism;
    }

    public function setAesthetism($aesthetism): self
    {
        $this->aesthetism = $aesthetism;

        return $this;
    }

    public function getPhotography()
    {
        return $this->photography;
    }

    public function setPhotography($photography): self
    {
        $this->photography = $photography;

        return $this;
    }

    public function getNature()
    {
        return $this->nature;
    }

    public function setNature($nature): self
    {
        $this->nature = $nature;

        return $this;
    }

    public function getMode()
    {
        return $this->mode;
    }

    public function setMode($mode): self
    {
        $this->mode = $mode;

        return $this;
    }

    public function getBeauty()
    {
        return $this->beauty;
    }

    public function setBeauty($beauty): self
    {
        $this->beauty = $beauty;

        return $this;
    }

    public function getPost(): ?Post
    {
        return $this->post;
    }

    public function setPost(?Post $post): self
    {
        $this->post = $post;

        return $this;
    }

    public function getChannel(): ?Channel
    {
        return $this->channel;
    }

    public function setChannel(?Channel $channel): self
    {
        $this->channel = $channel;

        return $this;
    }
}
