<?php

namespace Evrinoma\LiveVideoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Evrinoma\UtilsBundle\Entity\ActiveTrait;
use Evrinoma\UtilsBundle\Entity\IdTrait;
use Evrinoma\UtilsBundle\Entity\RoleTrait;
use JMS\Serializer\Annotation\Groups;

/**
 * Class CamType
 *
 * @package Evrinoma\LiveVideoBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="live_group")
 */
class Group
{
    use IdTrait, ActiveTrait, RoleTrait;

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
     * @ORM\Column(name="alias", type="string", length=50, nullable=false)
     * @Groups({"restrict", "full"})
     */
    private $alias = '';
    /**
     * @var int
     * @ORM\Column(name="max_column", type="integer", nullable=false)
     * @Groups({"restrict", "full"})
     */
    private $maxColumn;

    /**
     * @var Cam []
     * @ORM\OneToMany(targetEntity="Evrinoma\LiveVideoBundle\Entity\Cam", mappedBy="group")
     * @Groups({"restrict", "full"})
     */
    private $liveStreams;
//endregion Fields

//region SECTION: Getters/Setters
    /**
     * @return int
     */
    public function getMaxColumn(): int
    {
        return $this->maxColumn;
    }

    /**
     * @return string
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return Cam[]
     */
    public function getLiveStreams()
    {
        return $this->liveStreams;
    }

    /**
     * @param int $maxColumn
     *
     * @return Group
     */
    public function setMaxColumn(int $maxColumn)
    {
        $this->maxColumn = $maxColumn;

        return $this;
    }

    /**
     * @param string $alias
     *
     * @return Group
     */
    public function setAlias(string $alias)
    {
        $this->alias = $alias;

        return $this;
    }

    /**
     * @param Cam[] $liveStreams
     *
     * @return Group
     */
    public function setLiveStreams($liveStreams)
    {
        $this->liveStreams = $liveStreams;

        return $this;
    }

    /**
     * @param string $name
     *
     * @return Group
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }
//endregion Getters/Setters
}