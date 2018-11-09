<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AlbumRepository")
 */
class Album
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string|null
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $title;

    /**
     * @var \DateTime|null
     * @ORM\Column(type="string")
     */
    private $releaseDate;

    /**
     * @var int|null
     * @Assert\GreaterThan(0)
     * ORM\Column(type="integer")
     */
    private $trackCount;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return null|string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param null|string $title
     *
     * @return Album
     */
    public function setTitle(?string $title): Album
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getReleaseDate(): ?\DateTime
    {
        return $this->releaseDate;
    }

    /**
     * @param \DateTime|null $releaseDate
     *
     * @return Album
     */
    public function setReleaseDate(?\DateTime $releaseDate): Album
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getTrackCount(): ?int
    {
        return $this->trackCount;
    }

    /**
     * @param int|null $trackCount
     *
     * @return Album
     */
    public function setTrackCount(?int $trackCount): Album
    {
        $this->trackCount = $trackCount;

        return $this;
    }
}
