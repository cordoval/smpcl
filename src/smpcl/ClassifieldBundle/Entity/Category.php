<?php

namespace smpcl\ClassifieldBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

//use smpcl\ClassifieldBundle\Utils\Utils;

/**
 * smpcl\ClassifieldBundle\Entity\Category
 *
 * @ORM\Table(name="smpcl_category")
 * @ORM\Entity(repositoryClass="smpcl\ClassifieldBundle\Entity\CategoryRepository")
 */
class Category {

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
     * @var string $tags
     *
     * @ORM\Column(name="tags", type="string", length=255)
     */
    private $tags;
    
    
    /**
     * @var string $subtype
     *
     * @ORM\Column(name="subtype", type="string", length=255, nullable=true)
     */
    private $subtype;

    /**
     * @var array $classifields
     *
     *  @ORM\OneToMany(targetEntity="Classifield", mappedBy="category") 
     */
    private $classifields;
    
    /**
     * @Gedmo\Slug(fields={"title", "code"})
     * @ORM\Column(length=128, unique=true)
     */
    private $slug;

    public function __construct() {
        $this->classifields = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString() {
        return $this->title;
    }

    
//    public function getSlug() {
//       $slug = Utils::getSlug($this->getTitle());
//        
//        return $slug;
//    }
    

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
     * Set tags
     *
     * @param string $tags
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    /**
     * Get tags
     *
     * @return string 
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set subtype
     *
     * @param string $subtype
     */
    public function setSubtype($subtype)
    {
        $this->subtype = $subtype;
    }

    /**
     * Get subtype
     *
     * @return string 
     */
    public function getSubtype()
    {
        return $this->subtype;
    }

    /**
     * Set slug
     *
     * @param string $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Add classifields
     *
     * @param smpcl\ClassifieldBundle\Entity\Classifield $classifields
     */
    public function addClassifield(\smpcl\ClassifieldBundle\Entity\Classifield $classifields)
    {
        $this->classifields[] = $classifields;
    }

    /**
     * Get classifields
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getClassifields()
    {
        return $this->classifields;
    }
}