<?php

namespace smpcl\UserBundle\Entity;
use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="smpcl_user")
 */
class User extends BaseUser {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    
    /**
     * Array de objetos Classifields
     *
     * ORM\OneToMany(targetEntity="\smpcl\ClassifieldBundle\Entity\Classifield", mappedBy="user") 
     */
    private $classifields;

    public function __construct()
    {
        parent::__construct();
        // your own logic
         $this->classifields = new \Doctrine\Common\Collections\ArrayCollection();
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
}