<?php

namespace Evrinoma\LiveVideoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Evrinoma\UtilsBundle\Entity\ActiveInterface;
use Evrinoma\UtilsBundle\Entity\ActiveTrait;
use Evrinoma\UtilsBundle\Entity\IdTrait;
use JMS\Serializer\Annotation\Groups;

/**
 * Class CamType
 *
 * @package Evrinoma\LiveVideoBundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="live_type")
 */
class Type implements ActiveInterface
{
    use IdTrait, ActiveTrait;

//region SECTION: Fields
    const HIKVISION = 'hikvision';
    const AXIS      = 'axis';

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"full"})
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=50, nullable=false)
     * @Groups({"full"})
     */
    private $type = '';
//endregion Fields

//region SECTION: Getters/Setters
    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return Type
     */
    public function setType(string $type)
    {
        $this->type = $type;

        return $this;
    }
//endregion Getters/Setters
}