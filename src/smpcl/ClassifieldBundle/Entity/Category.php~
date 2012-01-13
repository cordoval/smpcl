<?php

namespace smpcl\ClassifieldBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @var array $classifields
     *
     *  * ORM\OneToMany(targetEntity="Classifield", mappedBy="category") 
     */
    private $classifields;

    public function __construct() {
        $this->classifields = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString() {
        return $this->title;
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
}