<?php

namespace Site\PagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PortfolioController extends Controller {

    public function indexAction() {

        $dm = $this->get('doctrine_mongodb')->getManager();
/*
        $product = $this->site4();
        $dm->persist($product);
        $dm->flush();
*/
        $products = $dm->getRepository('SitePagesBundle:Project')
                ->findAll();

        return $this->render('SitePagesBundle:Portfolio:index.html.twig', array(
                    'projects' => $products
        ));
    }

    /**
     * 
     * @return \Site\PagesBundle\Document\Project
     */
    protected function site4() {

        $product = new \Site\PagesBundle\Document\Project();
        $product->setName('La Fonda');
        $product->setDate('08-04-2014');
        $product->setUrl('www.fonda.asso.fr');
        $product->setImage('fnepe.jpg');
        $product->setDescription("
                                                <p><strong>Description : </strong><br>La Fonda fabrique associative</p>
                                                <p>&nbsp;</p>
                                                <p>
                                                    <strong>Technologies : </strong><br>
                                                    <b>✖</b> PHP 5.3 / Mysql 5.1<br>
                                                    <b>✖</b> xHTML / CSS2<br>
                                                </p>
                                                <p>&nbsp;</p>
                                                <p>
                                                    <strong>Réalisations : </strong><br>
                                                    Migration d'hébergeur<br>
                                                    Installation serveur web sous debian 7.1<br>
                                                </p>");

        return $product;
    }

    /**
     * 
     * @return \Site\PagesBundle\Document\Project
     */
    protected function site3() {

        $product = new \Site\PagesBundle\Document\Project();
        $product->setName('La FNEPE');
        $product->setDate('03-03-2014');
        $product->setUrl('www.ecoledesparents.org');
        $product->setImage('fnepe.jpg');
        $product->setScreen1('4_cap1.jpg');
        $product->setScreen2('4_cap2.jpg');
        $product->setScreen3('4_cap3.jpg');
        $product->setDescription("<p><strong>Description : </strong><br>Présentation de la tête de réseau des Ecoles des parents et des éducateurs détaillant ses missions mais aussi les valeurs dont elle est porteuse et garante au nom des Epe, ainsi que l'histoire de sa création.</p>
                                                <p>&nbsp;</p>
                                                <p>
                                                    <strong>Technologies : </strong><br>
                                                    <b>✖</b> PHP 5.3 / Mysql 5.1<br>
                                                    <b>✖</b> Symfony Framework 1.4<br>
                                                </p>
                                                <p>&nbsp;</p>
                                                <p>
                                                    <strong>Réalisations : </strong><br>
                                                    Reprise du projet pour maintenance<br>
                                                    Refonte de modules<br>
                                                </p>");

        return $product;
    }

    /**
     * 
     * @return \Site\PagesBundle\Document\Project
     */
    protected function site2() {

        $product = new \Site\PagesBundle\Document\Project();
        $product->setName('BibApps');
        $product->setDate('21-01-2014');
        $product->setUrl('www.bibapps.com');
        $product->setImage('bibapps.jpg');
        $product->setScreen1('2_cap1.jpg');
        $product->setScreen2('2_cap2.jpg');
        $product->setScreen3('2_cap3.jpg');
        $product->setDescription("
                                                <p><strong>Description : </strong><br>Catalogue d'applications jeunesse.</p>
                                                <p>&nbsp;</p>
                                                <p>
                                                    <strong>Technologies : </strong><br>
                                                    <b>✖</b> PHP 5.4 / MariaDB 10.0.6<br>
                                                    <b>✖</b> HTML5 / CSS3<br>
                                                    <b>✖</b> Jquery 2<br>
                                                </p>
                                                <p>&nbsp;</p>
                                                <p>
                                                    <strong>Réalisations : </strong><br>
                                                    Développement MVC from Scratch<br>
                                                    Intégration du template de bdesign-web.com<br>
                                                </p>");

        return $product;
    }

    /**
     * 
     * @return \Site\PagesBundle\Document\Project
     */
    protected function site1() {

        $product = new \Site\PagesBundle\Document\Project();
        $product->setName('Trusteo');
        $product->setDate('17-12-2013');
        $product->setUrl('www.trusteopro.com');
        $product->setImage('trusteo.jpg');
        $product->setScreen1('1_cap1.jpg');
        $product->setScreen2('1_cap2.jpg');
        $product->setScreen3('1_cap3.jpg');
        $product->setDescription("
                                                <p><strong>Description : </strong><br>Premier Label certifiant le parcours professionnel.&lt;br/&gt; Trusteo permet de : valider les données professionnelles, objectiver les références professionnelles et optimiser l’intégration des collaborateurs récemment recrutés</p>
                                                <p>&nbsp;</p>
                                                <p>
                                                    <strong>Technologies : </strong><br>
                                                    <b>✖</b> PHP 5.4 / MariaDB 10.0.6<br>
                                                    <b>✖</b> HTML5 / CSS3<br>
                                                    <b>✖</b> Jquery 2<br>
                                                </p>
                                                <p>&nbsp;</p>
                                                <p>
                                                    <strong>Réalisations : </strong><br>
                                                    Intégration du template réalisé par Neovira<br>
                                                    Développement MVC from Scratch<br>
                                                    Création de questionnaires intéractives<br>
                                                    Paiement en ligne<br>
                                                    Gestion de remise de certification : générateur PDF<br>
                                                </p>");

        return $product;
    }

}
