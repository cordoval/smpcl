<?php

namespace smpcl\ClassifieldBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use smpcl\ClassifieldBundle\Entity\Classifield as Classifield;

class ClassifieldType extends AbstractType
{
    
    private $currency_choices;
    
      public function __construct() { 
          $this->currency_choices = Classifield::getCurrencyOptions();
      }
    
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            
            
            ->add('title', null, array('label' => 'Título'))
            ->add('category', null, array('label' => 'Categoría'))
            ->add('description', null, array('label' => 'Descripción'))
            ->add('picture', null, array('label' => 'Foto'))
            ->add('is_billable', null, array('label' => '¿Tiene un Precio?'))
            ->add('currency', 'choice', array('label' => 'Tipo de Moneda', 'choices' => $this->currency_choices))
            ->add('price', null, array('label' => 'Precio'))
//            ->add('status')
//            ->add('created_at')
//            ->add('updated_at')
//            ->add('published_at')
//            ->add('user')
        ;
    }

    public function getName()
    {
        return 'classifield';
    }
}
