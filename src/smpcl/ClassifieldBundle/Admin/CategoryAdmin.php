<?php

namespace smpcl\ClassifieldBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;

class CategoryAdmin extends Admin
{
	protected $list = array(
		'title',
		'description'
	);

	protected $form = array(
		'title',
		'description'
	);

	protected $filter = array(
		'title'
	);
}