<?php

namespace DD\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 */
class Product
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $src;

    /**
     * @var string
     */
    private $description;

    /**
     * @var boolean
     */
    private $flag;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var \DateTime
     */
    private $lastdate;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set src
     *
     * @param string $src
     * @return Product
     */
    public function setSrc($src)
    {
        $this->src = $src;

        return $this;
    }

    /**
     * Get src
     *
     * @return string
     */
    public function getSrc()
    {
        return $this->src;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set flag
     *
     * @param boolean $flag
     * @return Product
     */
    public function setFlag($flag)
    {
        $this->flag = $flag;

        return $this;
    }

    /**
     * Get flag
     *
     * @return boolean
     */
    public function getFlag()
    {
        return $this->flag;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Product
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set lastdate
     *
     * @param \DateTime $lastdate
     * @return Product
     */
    public function setLastdate($lastdate)
    {
        $this->lastdate = $lastdate;

        return $this;
    }

    /**
     * Get lastdate
     *
     * @return \DateTime
     */
    public function getLastdate()
    {
        return $this->lastdate;
    }

    /**
     * @var \DD\ShopBundle\Entity\Category
     */
    private $categoty;


    /**
     * Set categoty
     *
     * @param \DD\ShopBundle\Entity\Category $categoty
     * @return Product
     */
    public function setCategoty(\DD\ShopBundle\Entity\Category $categoty = null)
    {
        $this->categoty = $categoty;

        return $this;
    }

    /**
     * Get categoty
     *
     * @return \DD\ShopBundle\Entity\Category
     */
    public function getCategoty()
    {
        return $this->categoty;
    }
}
