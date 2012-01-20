<?php

namespace smpcl\ClassifieldBundle\Entity;
use Gedmo\Mapping\Annotation as Gedmo;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * smpcl\ClassifieldBundle\Entity\Classifield
 *
 * @ORM\Table(name="smpcl_classifield")
 * @ORM\Entity(repositoryClass="smpcl\ClassifieldBundle\Entity\ClassifieldRepository")
 */
class Classifield {
    const CURRENCY_DOLAR = 'dolar';
    const CURRENCY_PESOS_AR = 'pesos_AR';
    const CURRENCY_EURO = 'euro';

    const STATUS_DISABLED = 'disabled'; // deleted entities
    const STATUS_PENDING = 'pending'; // pending classifields
    const STATUS_EDITED = 'edited'; // pending classifields
    const STATUS_ENABLED = 'enabled'; // public classifields



    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $title
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var text $description
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    
     /**
     * @var boolean $is_billable
     *
     * @ORM\Column(name="is_billable", type="boolean", nullable=true)
     */
    private $is_billable;
    
    
    /**
     * @var integer $currency
     *
     *  @ORM\Column(type="string", length=255)
     */
    private $currency;

    /**
     * @var float $price
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    /**
     * @var string $status
     *  @ORM\Column(type="string")
     */
    private $status;

    /**
     * @var datetime $created_at
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     * 
     * @Gedmo\Timestampable(on="create")
     */
    private $created_at;

    /**
     * @var datetime $updated_at
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     * 
     *  @Gedmo\Timestampable(on="update")
     */
    private $updated_at;

    /**
     * @var datetime $published_at
     *
     * @ORM\Column(name="published_at", type="datetime", nullable=true)
     */
    private $published_at;

    /**
     * @var integer $category
     *
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="classifields")
     */
    private $category;

    /**
     *
     * @var string picture
     * 
     * @TODO: Create upload action
     * 
     * @ORM\Column(name="picture_src", type="string", length=255, nullable=true)
     * @Assert\File(maxSize="6000000")
     */
    private $picture;
    
    /**
     * @var integer $user
     *
     * @ORM\ManyToOne(targetEntity="\smpcl\UserBundle\Entity\User", inversedBy="classifields")
     */
    private $user;
    

    /**
     * CUSTOM METHODS
     */
    public function __construct() {
        
        $this->status = self::STATUS_PENDING;
        
        $this->is_billable = TRUE;
       
        $this->currency = self::CURRENCY_PESOS_AR;
        $this->price = 0;
        
        $this->published_at = NULL;
        
        
        
    }

   
    public static function getCurrencyOptions() {
        $currency_options = array(
              self::CURRENCY_PESOS_AR => 'Pesos Argentinos',
              self::CURRENCY_DOLAR => 'Dolar',
              self::CURRENCY_EURO => 'Euro',
          );
        
        return $currency_options;
    }
    
    public static function getCurrencySymbols($value = NULL) {
         $currency_symbols = array(
              self::CURRENCY_PESOS_AR => '$',
              self::CURRENCY_DOLAR => 'U$D',
              self::CURRENCY_EURO => '€',
          );
         
         if ($value) {
             if (isset($currency_symbols[$value])) {
                 return $currency_symbols[$value];
             } else {
                 return self::CURRENCY_PESOS_AR;
             }
         }
         
         return $currency_symbols;
    }
    
    
    public function getFormattedPrice() {
        $output_text = 'No Aplica';

        if ($this->getIsBillable()) {
            $currency_symbol = $this->getCurrencySymbols($this->getCurrency());
            $price = $this->getPrice();

            if (!empty($price)) {
                $price = number_format($price, 2);
                $output_text = "{$currency_symbol} {$price}";
            }
        }

        return $output_text;
    }

    public function __toString() {
        return $this->title;
    }
   
    /**
     * return if some user can edit this entity
     * @param smpcl\UserBundle\Entity\User $user 
     */
    public function canEdit($user) {
        $owner = $this->getUser();
     
        if ($owner->equals($user)) {
            return TRUE;
        }
        
        return FALSE;
    }
    /**
     * END CUSTOM METHODS
     */

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
     * Set title
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param text $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return text 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set is_billable
     *
     * @param boolean $isBillable
     */
    public function setIsBillable($isBillable)
    {
        $this->is_billable = $isBillable;
    }

    /**
     * Get is_billable
     *
     * @return boolean 
     */
    public function getIsBillable()
    {
        return $this->is_billable;
    }

    /**
     * Set currency
     *
     * @param string $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * Get currency
     *
     * @return string 
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set price
     *
     * @param integer $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * Get price
     *
     * @return integer 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set status
     *
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set created_at
     *
     * @param datetime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
    }

    /**
     * Get created_at
     *
     * @return datetime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updated_at
     *
     * @param datetime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
    }

    /**
     * Get updated_at
     *
     * @return datetime 
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set published_at
     *
     * @param datetime $publishedAt
     */
    public function setPublishedAt($publishedAt)
    {
        $this->published_at = $publishedAt;
    }

    /**
     * Get published_at
     *
     * @return datetime 
     */
    public function getPublishedAt()
    {
        return $this->published_at;
    }

    /**
     * Set picture
     *
     * @param string $picture
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

    /**
     * Get picture
     *
     * @return string 
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set category
     *
     * @param smpcl\ClassifieldBundle\Entity\Category $category
     */
    public function setCategory(\smpcl\ClassifieldBundle\Entity\Category $category)
    {
        $this->category = $category;
    }

    /**
     * Get category
     *
     * @return smpcl\ClassifieldBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set user
     *
     * @param smpcl\UserBundle\Entity\User $user
     */
    public function setUser(\smpcl\UserBundle\Entity\User $user)
    {
        $this->user = $user;
    }

    /**
     * Get user
     *
     * @return smpcl\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}