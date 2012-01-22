<?php

namespace smpcl\ClassifieldBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\FixtureInterface;
use smpcl\ClassifieldBundle\Entity\Category;

class LoadUserData implements FixtureInterface
{
    public function load($manager)
    {
        //Primero cargamos Categorias
        
        
        $categorias = array(
            'Telefonía',
            'Informática',
            'Automóviles',
            'Camiones',
            'Camionetas',
            'Motos',
            'Casas',
            'Departamentos',
            'Turismo',
            'Agropecuarios',
            'Nautica',
            'Tiempo Libre',
            'Deportes',
            'Servicios',
            'Hogar/Amoblamientos',
            'Cursos/Educación',
            'Profesionales',
            'Varios',
            'Mascotas y Plantas',
            'Construccion',
            'Empleos',            
        );
        
        foreach($categorias as $cat) {
            $c = new Category();
            $c->setTitle($cat);
            $c->setDescription('Descripcion de la categoria ' . $cat);
            $c->setTags('TAGS TAGS ' . $cat);
            $manager->persist($c);
        }
        $manager->flush();
    }
}