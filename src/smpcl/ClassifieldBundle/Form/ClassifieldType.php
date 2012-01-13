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
            ->add('description')
            ->add('currency')
            ->add('price')
            ->add('status')
            ->add('created_at')
            ->add('updated_at')
            ->add('published_at')
            ->add('picture')
            ->add('category')
            ->add('user')
        ;
    }

    public function getName()
    {
        return 'smpcl_classifieldbundle_classifieldtype';
    }
}
