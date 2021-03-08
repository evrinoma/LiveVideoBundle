<?php

namespace Evrinoma\LiveVideoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Evrinoma\UtilsBundle\Entity\ActiveTrait;
use Evrinoma\UtilsBundle\Entity\IdTrait;
use JMS\Serializer\Annotation\Exclude;
use JMS\Serializer\Annotation\Groups;

/**
 * Class Cam
 *
 * @package Evrinoma\LiveVideoBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="live_cam")
 */
class Cam
{
    use IdTrait, ActiveTrait;

//region SECTION: Fields
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"restrict", "full"})
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     * @Groups({"restrict", "full"})
     */
    private $name = '';

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=50, nullable=false)
     * @Groups({"full"})
     */
    private $ip = '';

    /**
     * @var string
     *
     * @ORM\Column(name="user_name", type="string", length=50, nullable=false)
     * @Groups({"full"})
     */
    private $userName = '';

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=50, nullable=false)
     * @Groups({"full"})
     */
    private $password = '';

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=50, nullable=false)
     * @Groups({"full"})
     */
    private $link = '';

    /**
     * @var string
     *
     * @ORM\Column(name="stream", type="string", length=50, nullable=false)
     * @Groups({"restrict", "full"})
     */
    private $stream = '';

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=50, nullable=false)
     * @Groups({"restrict", "full"})
     */
    private $title = '';

    /**
     * @var Type
     * @ORM\ManyToOne(targetEntity="Evrinoma\LiveVideoBundle\Entity\Type", inversedBy="id")
     * @Groups({"full"})
     */
    private $type;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean", nullable=false)
     * @Groups({"restrict", "full"})
     */
    private $control = false;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean", nullable=false)
     * @Groups({"restrict", "full"})
     */
    private $startPlay = false;
    /**
     * @Exclude()
     * @var Group
     * @ORM\ManyToOne(targetEntity="Evrinoma\LiveVideoBundle\Entity\Group", inversedBy="liveStreams")
     */
    private $group;
//endregion Fields

//region SECTION: Public
    /**
     * @return bool
     */
    public function isStartPlay(): bool
    {
        return $this->startPlay;
    }

    /**
     * @return bool
     */
    public function isControl(): bool
    {
        return $this->control;
    }
//endregion Public

//region SECTION: Getters/Setters
    /**
     * @return Group
     */
    public function getGroup(): Group
    {
        return $this->group;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getIp(): string
    {
        return $this->ip;
    }

    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getLink(): string
    {
        return $this->link;
    }

    /**
     * @return string
     */
    public function getStream(): string
    {
        return $this->stream;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return Type
     */
    public function getType(): Type
    {
        return $this->type;
    }

    /**
     * @param bool $startPlay
     *
     * @return self
     */
    public function setStartPlay($startPlay): self
    {
        $this->startPlay = $startPlay;

        return $this;
    }

    /**
     * @param Group $group
     *
     * @return self
     */
    public function setGroup(Group $group): self
    {
        $this->group = $group;

        return $this;
    }

    /**
     * @param string $name
     *
     * @return self
     */
    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param string $ip
     *
     * @return self
     */
    public function setIp($ip): self
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * @param string $userName
     *
     * @return self
     */
    public function setUserName($userName): self
    {
        $this->userName = $userName;

        return $this;
    }

    /**
     * @param string $password
     *
     * @return self
     */
    public function setPassword($password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @param string $link
     *
     * @return self
     */
    public function setLink($link): self
    {
        $this->link = $link;

        return $this;
    }

    /**
     * @param string $stream
     *
     * @return self
     */
    public function setStream($stream): self
    {
        $this->stream = $stream;

        return $this;
    }

    /**
     * @param string $title
     *
     * @return self
     */
    public function setTitle($title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @param Type $type
     *
     * @return self
     */
    public function setType($type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @param bool $control
     *
     * @return self
     */
    public function setControl($control): self
    {
        $this->control = $control;

        return $this;
    }
//endregion Getters/Setters
}