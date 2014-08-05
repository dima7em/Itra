<?php

namespace DD\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Role
 */
class Role
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
    private $description;


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
     * @return Role
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
     * Set вуы�description
     *
     * @param string $вуы�description
     * @return Role
     */
    public function setвуы�description($вуы�description)
    {
        $this->вуы�description = $вуы�description;

        return $this;
    }

    /**
     * Get вуы�description
     *
     * @return string 
     */
    public function getвуы�description()
    {
        return $this->вуы�description;
    }
}
