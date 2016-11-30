<?php

namespace Medzoner\GlobalBundle\Model;

/**
 * Class JobBoard
 */
class JobBoard
{
    /**
     * @var array
     */
    private $parts = [];

    /**
     * @var array
     */
    private $subparts = [];

    /**
     * @return array
     */
    public function getSubparts()
    {
        $this->subparts = [
            [
                [
                    'sub_title' => 'Langages',
                    'sub_content' => 'PHP, javascript/NodeJs, HTML, CSS',
                ],
                [
                    'sub_title' => 'Base de données/stockage',
                    'sub_content' => 'MySQL, Sqlite, MongoDB, Redis',
                ],
                [
                    'sub_title' => 'Frameworks',
                    'sub_content' => 'Symfony 1.4 > 3.1, AngularJS',
                ],
                [
                    'sub_title' => 'IDE',
                    'sub_content' => 'Phpstorm, Netbeans, Eclipse',
                ],
                [
                    'sub_title' => 'Versionning',
                    'sub_content' => 'Git, svn',
                ],
                [
                    'sub_title' => 'Test, intégration continue et déploiement continu',
                    'sub_content' => 'PhpUnit, Behat, Moka, Jenkins, Capistrano',
                ],
                [
                    'sub_title' => 'OS',
                    'sub_content' => 'GNU/LINUX (Debian/Ubuntu)',
                ],
            ],
            [
                [
                    'sub_title' => '2015 à maintenant',
                    'sub_content' => 'LEADERSLEAGUE - Développeur Backend',
                    'sub_description' => [
                        'Microservices: Api, Json, HateOAS',
                        'Méthode: SCRUM',
                    ],
                ],
                [
                    'sub_title' => '2012-2015',
                    'sub_content' => 'ADMP - Développeur Backend et Frontend',
                    'sub_description' => [
                        'Création et gestion de projets: Sites web, CRM, ERP',
                        'Maintenance',
                        'Administration de serveur web et mail (nginx/apache2, varnish, postfix....)',
                        'Gestion de bases de données',
                    ],
                ],
                [
                    'sub_title' => '2011-2012',
                    'sub_content' => 'ADMP Informatique - Contrat Professionnelle',
                    'sub_description' => [
                        'Création du CRM interne en PHP5 :',
                        'Gestion des sociétés, des contacts, des interventions, des techniciens.',
                        'Relevés mensuels par mailing,',
                        'Ticketing. Statistiques. Exports CSV et PDF.',
                    ],
                ],
                [
                    'sub_title' => '2008-2011',
                    'sub_content' => 'WEBPORTAGE - Développeur/Webmaster.',
                ],
                [
                    'sub_title' => '2005-2008',
                    'sub_content' => 'Renault Centre Technique - Traitement et Analyse de données qualité.',
                ],
            ],
            [
                [
                    'sub_title' => '2014',
                    'sub_content' => 'Formation JAVA - Global Knowledge',
                ],
                [
                    'sub_title' => '2011-2012',
                    'sub_content' => 'Formation Professionnelle – IP Formation – Paris',
                ],
            ],
            [
                [
                    'sub_title' => 'Anglais',
                    'sub_content' => 'Bonne maîtrise des documentations et notices techniques.',
                ],
            ],
            [
                [
                    'sub_title' => 'Internet',
                    'sub_content' => 'Local and online',
                ],
            ],
        ];

        return $this->subparts;
    }

    /**
     * @param array $subparts
     */
    public function setSubparts($subparts)
    {
        $this->subparts = $subparts;
    }

    /**
     * @return array
     */
    public function getParts()
    {
        $this->parts = [
            [
                'title' => '',
                'content' => $this->getSubparts()[0],
            ],
            [
                'title' => 'EXPÉRIENCES PROFESSIONNELLES',
                'content' => $this->getSubparts()[1],
            ],
            [
                'title' => 'FORMATIONS',
                'content' => $this->getSubparts()[2],
            ],
            [
                'title' => 'LANGUES',
                'content' => $this->getSubparts()[3],
            ],
            [
                'title' => 'ACTIVITES ET PROJETS DIVERS',
                'content' => $this->getSubparts()[3],
            ],
        ];

        return $this->parts;
    }

    /**
     * @param array $parts
     */
    public function setParts($parts)
    {
        $this->parts = $parts;
    }
}
