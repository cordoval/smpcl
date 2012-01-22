<?php

namespace smpcl\ClassifieldBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use smpcl\ClassifieldBundle\Entity\Category;

use smpcl\UserBundle\Entity\User;
use Symfony\Component\Security\Core\Role\RoleInterface;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;

class LoadUserData implements FixtureInterface {

    public function load($manager) {
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

        foreach ($categorias as $cat) {
            $c = new Category();
            $c->setTitle($cat);
            $c->setDescription('Descripcion de la categoria ' . $cat);
            $c->setTags('TAGS TAGS ' . $cat);
            $manager->persist($c);
        }



        //Ahora los Usuarios



        // create a user para marian0 (ADMIN)
        $user = new User();
        $user->setEmail('marianosantafe@gmail.com');
        $user->setUsername('marian0');
        $user->setEnabled(1);

        // encode and set the password for the user,
        // these settings match our config
        //(Debe matchear con security.yml
        $encoder = new MessageDigestPasswordEncoder('sha512', true, 10);
        $password = $encoder->encodePassword('admin', $user->getSalt());
        $user->setPassword($password);
        $user->setRoles(array('ROLE_USER','ROLE_ADMIN'));
        $manager->persist($user);
        
        // create a user para marian0 (ADMIN)
        $user = new User();
        $user->setEmail('germanazo@gmail.com');
        $user->setUsername('germanaz0');
        $user->setEnabled(1);

        // encode and set the password for the user,
        // these settings match our config
        //(Debe matchear con security.yml
        $encoder = new MessageDigestPasswordEncoder('sha512', true, 10);
        $password = $encoder->encodePassword('admin', $user->getSalt());
        $user->setPassword($password);
        $user->setRoles(array('ROLE_USER','ROLE_ADMIN'));
        $manager->persist($user);

        
        //agregamos usuarios comunes
        $user = new User();
        $user->setEmail('userloco@gmail.com');
        $user->setUsername('user');
        $user->setEnabled(1);

        // encode and set the password for the user,
        // these settings match our config
        //(Debe matchear con security.yml
        $encoder = new MessageDigestPasswordEncoder('sha512', true, 10);
        $password = $encoder->encodePassword('user', $user->getSalt());
        $user->setPassword($password);
        $user->setRoles(array('ROLE_USER'));
        $manager->persist($user);


        $manager->flush();
    }

}