<?php

namespace smpcl\ClassifieldBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ClassifieldType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            
            
            ->add('title')
            ->add('category')
            ->add('description')
            ->add('picture')
            ->add('is_billable')
            ->add('currency')
            ->add('price')
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
