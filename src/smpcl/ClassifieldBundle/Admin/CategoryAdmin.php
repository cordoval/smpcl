<?php

namespace smpcl\ClassifieldBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class CategoryAdmin extends Admin
{
	
        
         public function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('title')
            ->add('description')
            ->add('tags')
            ->add('subtype')
                
        ;
    }

    public function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('General')
//                ->add('author', 'sonata_type_model', array(), array('edit' => 'list'))
                ->add('title')
                ->add('description')
                 ->add('tags', null, array('required' => TRUE))
                 ->add('subtype', null, array('required' => FALSE))

                
            ->end()
//            ->with('Tags')
//                ->add('tags', 'sonata_type_model', array('expanded' => true))
//            ->end()
//            ->with('Options', array('collapsed' => true))
//                ->add('commentsCloseAt')
//                ->add('commentsEnabled', null, array('required' => false))
//            ->end()
        ;
    }

    public function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title')
//            ->add('description')
            
        ;
    }

    public function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
            ->add('description')
            ->add('tags', null, array('filter_field_options' => array('expanded' => true, 'multiple' => true)))
        ;
    }
}