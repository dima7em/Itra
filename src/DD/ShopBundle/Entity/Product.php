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
    private $description;
    /**
     * @var string
     */
    private $src;
    /**
     * @var \DateTime
     */
    private $date;
    /**
     * @var \DateTime
     */
    private $lastdate;
    /**
     * @var boolean
     */
    private $flag;
    public function __toString()
    {
        return strval($this->name);
    }
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
     * @var \DD\ShopBundle\Entity\Category
     */
    private $category;
    /**
     * Set category
     *
     * @param \DD\ShopBundle\Entity\Category $category
     * @return Product
     */
    public function setCategory(\DD\ShopBundle\Entity\Category $category = null)
    {
        $this->category = $category;
        return $this;
    }
    /**
     * Get category
     *
     * @return \DD\ShopBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $products;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->products = new \Doctrine\Common\Collections\ArrayCollection();
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $product;


    /**
     * Add product
     *
     * @param \DD\ShopBundle\Entity\Product $product
     * @return Product
     */
    public function addProduct(\DD\ShopBundle\Entity\Product $product)
    {
        $this->product[] = $product;

        return $this;
    }

    /**
     * Remove product
     *
     * @param \DD\ShopBundle\Entity\Product $product
     */
    public function removeProduct(\DD\ShopBundle\Entity\Product $product)
    {
        $this->product->removeElement($product);
    }

    /**
     * Get product
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProduct()
    {
        return $this->product;
    }
}
