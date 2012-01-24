<?php

namespace smpcl\ClassifieldBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use smpcl\ClassifieldBundle\Entity\Classifield;

class ClassifieldAdmin extends Admin {

    private function getStatusOptions() {
        $status_options = array(
            Classifield::STATUS_DISABLED => 'Borrado',
            Classifield::STATUS_EDITED => 'Editado',
            Classifield::STATUS_ENABLED => 'Habilitado',
            Classifield::STATUS_PENDING => 'A Moderar',
        );

        return $status_options;
    }

    public function configureShowFields(ShowMapper $showMapper) {
        $showMapper
                ->add('title')
                ->add('description')
                ->add('status')
                ->add('category')
                ->add('user')

        ;
    }

    public function configureFormFields(FormMapper $formMapper) {


        $formMapper
                ->with('General')
                ->add('title')
                ->add('description')
                ->add('status', 'choice', array('label' => 'Estado', 'choices' => $this->getStatusOptions()))
                ->add('category')
                ->add('user')
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

    public function configureListFields(ListMapper $listMapper) {
        $listMapper
                ->addIdentifier('title')
                ->add('status')
//            ->add('description')

        ;
    }

    public function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
         ->add('status', 'doctrine_orm_choice', array('label' => 'Estado',
                    'field_options' => array(
                        'required' => false,
                        'choices' => $this->getStatusOptions(),
                    ),
                    'field_type' => 'choice'
                ))
                ->add('title')
                ->add('description')
                ->add('category')
                ->add('user')
               
        ;
    }

    public function getBatchActions() {


        $custom_actions['enable'] = array(
            'label' => $this->trans('Habilitar'),
            'ask_confirmation' => FALSE,
        );

        $custom_actions['disable'] = array(
            'label' => $this->trans('Deshabilitar'),
            'ask_confirmation' => TRUE,
        );

        $actions = array_merge($custom_actions, parent::getBatchActions());


        return $actions;
    }

}