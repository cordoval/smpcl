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
            'Agropecuarios',
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
        $user->setRoles(array('ROLE_USER', 'ROLE_ADMIN'));
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
        $user->setRoles(array('ROLE_USER', 'ROLE_ADMIN'));
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



        //Agregamos algunos avisos en agropecuario...

        $aviso = new \smpcl\ClassifieldBundle\Entity\Classifield();
        $aviso->setTitle('Máquina cosechadora John Deere');
        $aviso->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Vivamus fermentum augue vel augue mattis at elementum nibh ullamcorper. Mauris lectus odio, sagittis ac pharetra sed, consequat in mauris. Mauris orci metus, sagittis ut viverra vel, fermentum sed ligula. Sed at ipsum nibh, sit amet fringilla velit. Donec ullamcorper imperdiet feugiat. Proin molestie malesuada velit et semper. Praesent iaculis, nulla in accumsan ullamcorper, mauris nunc cursus lacus, eget volutpat leo urna eget lectus.
            Ut varius consectetur consequat. Vivamus at purus quis felis dignissim bibendum. Etiam et risus erat, luctus lacinia arcu. Curabitur ac nisi massa. Vestibulum semper adipiscing mi a congue. Praesent est mauris, consequat id sollicitudin a, laoreet sit amet augue. 
            Nulla vestibulum diam est. Morbi ut eros odio, gravida ultrices felis. Ut in congue est.');
        $aviso->setCurrency('dolar');
        $aviso->setPrice(25000);
        $aviso->setStatus('enabled');
        $aviso->setPublishedAt($aviso->getCreatedAt());
        $aviso->setCategory($c);
        $aviso->setUser($user);
        $manager->persist($aviso);

        $aviso = new \smpcl\ClassifieldBundle\Entity\Classifield();
        $aviso->setTitle('Máquina cosechadora John Deere');
        $aviso->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Vivamus fermentum augue vel augue mattis at elementum nibh ullamcorper. Mauris lectus odio, sagittis ac pharetra sed, consequat in mauris. Mauris orci metus, sagittis ut viverra vel, fermentum sed ligula. Sed at ipsum nibh, sit amet fringilla velit. Donec ullamcorper imperdiet feugiat. Proin molestie malesuada velit et semper. Praesent iaculis, nulla in accumsan ullamcorper, mauris nunc cursus lacus, eget volutpat leo urna eget lectus.
            Ut varius consectetur consequat. Vivamus at purus quis felis dignissim bibendum. Etiam et risus erat, luctus lacinia arcu. Curabitur ac nisi massa. Vestibulum semper adipiscing mi a congue. Praesent est mauris, consequat id sollicitudin a, laoreet sit amet augue. 
            Nulla vestibulum diam est. Morbi ut eros odio, gravida ultrices felis. Ut in congue est.');
        $aviso->setCurrency('dolar');
        $aviso->setPrice(25000);
        $aviso->setStatus('enabled');
        $aviso->setPublishedAt($aviso->getCreatedAt());
        $aviso->setCategory($c);
        $aviso->setUser($user);
        $manager->persist($aviso);

        $aviso = new \smpcl\ClassifieldBundle\Entity\Classifield();
        $aviso->setTitle('Vacas y Toros Holando');
        $aviso->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Vivamus fermentum augue vel augue mattis at elementum nibh ullamcorper. Mauris lectus odio, sagittis ac pharetra sed, consequat in mauris. Mauris orci metus, sagittis ut viverra vel, fermentum sed ligula. Sed at ipsum nibh, sit amet fringilla velit. Donec ullamcorper imperdiet feugiat. Proin molestie malesuada velit et semper. Praesent iaculis, nulla in accumsan ullamcorper, mauris nunc cursus lacus, eget volutpat leo urna eget lectus.
            Ut varius consectetur consequat. Vivamus at purus quis felis dignissim bibendum. Etiam et risus erat, luctus lacinia arcu. Curabitur ac nisi massa. Vestibulum semper adipiscing mi a congue. Praesent est mauris, consequat id sollicitudin a, laoreet sit amet augue. 
            Nulla vestibulum diam est. Morbi ut eros odio, gravida ultrices felis. Ut in congue est.');
        $aviso->setCurrency('pesos_AR');
        $aviso->setPrice(5000);
        $aviso->setStatus('enabled');
        $aviso->setPublishedAt($aviso->getCreatedAt());
        $aviso->setCategory($c);
        $aviso->setUser($user);
        $manager->persist($aviso);


        $aviso = new \smpcl\ClassifieldBundle\Entity\Classifield();
        $aviso->setTitle('Desmalezadora Mazey modelo 2005');
        $aviso->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Vivamus fermentum augue vel augue mattis at elementum nibh ullamcorper. Mauris lectus odio, sagittis ac pharetra sed, consequat in mauris. Mauris orci metus, sagittis ut viverra vel, fermentum sed ligula. Sed at ipsum nibh, sit amet fringilla velit. Donec ullamcorper imperdiet feugiat. Proin molestie malesuada velit et semper. Praesent iaculis, nulla in accumsan ullamcorper, mauris nunc cursus lacus, eget volutpat leo urna eget lectus.
            Ut varius consectetur consequat. Vivamus at purus quis felis dignissim bibendum. Etiam et risus erat, luctus lacinia arcu. Curabitur ac nisi massa. Vestibulum semper adipiscing mi a congue. Praesent est mauris, consequat id sollicitudin a, laoreet sit amet augue. 
            Nulla vestibulum diam est. Morbi ut eros odio, gravida ultrices felis. Ut in congue est.');
        $aviso->setCurrency('dolar');
        $aviso->setPrice(4000);
        $aviso->setStatus('enabled');
        $aviso->setPublishedAt($aviso->getCreatedAt());
        $aviso->setCategory($c);
        $aviso->setUser($user);
        $manager->persist($aviso);


        $aviso = new \smpcl\ClassifieldBundle\Entity\Classifield();
        $aviso->setTitle('Fertilizantes para tener la mejor SOJA');
        $aviso->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            Vivamus fermentum augue vel augue mattis at elementum nibh ullamcorper. Mauris lectus odio, sagittis ac pharetra sed, consequat in mauris. Mauris orci metus, sagittis ut viverra vel, fermentum sed ligula. Sed at ipsum nibh, sit amet fringilla velit. Donec ullamcorper imperdiet feugiat. Proin molestie malesuada velit et semper. Praesent iaculis, nulla in accumsan ullamcorper, mauris nunc cursus lacus, eget volutpat leo urna eget lectus.
            Ut varius consectetur consequat. Vivamus at purus quis felis dignissim bibendum. Etiam et risus erat, luctus lacinia arcu. Curabitur ac nisi massa. Vestibulum semper adipiscing mi a congue. Praesent est mauris, consequat id sollicitudin a, laoreet sit amet augue. 
            Nulla vestibulum diam est. Morbi ut eros odio, gravida ultrices felis. Ut in congue est.');
        $aviso->setIsBillable(false);
        $aviso->setCurrency('dolar');
        $aviso->setPrice(0);
        $aviso->setStatus('enabled');
        $aviso->setPublishedAt($aviso->getCreatedAt());
        $aviso->setCategory($c);
        $aviso->setUser($user);
        $manager->persist($aviso);




        $manager->flush();
    }

}