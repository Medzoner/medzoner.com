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
            0 => [
                0 => [
                    'sub_title' => 'Langages',
                    'sub_content' => 'PHP, javascript/NodeJs, HTML, CSS',
                ],
                1 => [
                    'sub_title' => 'Base de données/stockage',
                    'sub_content' => 'MySQL, Sqlite, MongoDB, Redis',
                ],
                2 => [
                    'sub_title' => 'Frameworks',
                    'sub_content' => 'Symfony 1.4 > 3.1, AngularJS',
                ],
                3 => [
                    'sub_title' => 'IDE',
                    'sub_content' => 'Phpstorm, Netbeans, Eclipse',
                ],
                4 => [
                    'sub_title' => 'Versionning',
                    'sub_content' => 'Git, svn',
                ],
                5 => [
                    'sub_title' => 'Test, intégration continue et déploiement continu',
                    'sub_content' => 'PhpUnit, Behat, Moka, Jenkins, Capistrano',
                ],
                6 => [
                    'sub_title' => 'OS',
                    'sub_content' => 'GNU/LINUX (Debian/Ubuntu), UNIX BSD et Microsoft Windows',
                ],
            ],
            1 => [
                0 => [
                    'sub_title' => '2015 à maintenant',
                    'sub_content' => 'LEADERSLEAGUE - Développeur Backend',
                    'sub_description' => [
                        'Microservices: Api, Json, HateOAS',
                        'Méthode: SCRUM',
                    ],
                ],
                1 => [
                    'sub_title' => '2012-2015',
                    'sub_content' => 'ADMP - Développeur Backend et Frontend',
                    'sub_description' => [
                        'Création et gestion de projets: Sites web, CRM, ERP',
                        'Maintenance',
                        'Administration de serveur web et mail (nginx/apache2, varnish, postfix....)',
                        'Gestion de bases de données',
                    ],
                ],
                2 => [
                    'sub_title' => '2011-2012',
                    'sub_content' => 'ADMP Informatique - Contrat Professionnelle',
                    'sub_description' => [
                        'Création du CRM interne en PHP5 :',
                        'Gestion des sociétés, des contacts, des interventions, des techniciens.',
                        'Relevés mensuels par mailing,',
                        'Ticketing. Statistiques. Exports CSV et PDF.',
                    ],
                ],
                3 => [
                    'sub_title' => '2008-2011',
                    'sub_content' => 'WEBPORTAGE - Développeur/Webmaster.',
                ],
                4 => [
                    'sub_title' => '2005-2008',
                    'sub_content' => 'Renault Centre Technique - Traitement et Analyse de données qualité.',
                ],
            ],
            2 => [
                0 => [
                    'sub_title' => '2014',
                    'sub_content' => 'Formation JAVA',
                ],
                1 => [
                    'sub_title' => '2011-2012',
                    'sub_content' => 'Formation Professionnelle – IP Formation – Paris',
                ],
            ],
            3 => [
                0 => [
                    'sub_title' => 'Anglais',
                    'sub_content' => 'Bonne maîtrise des documentations et notices techniques.',
                ],
            ],
            4 => [
                0 => [
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
            0 => [
                'title' => '',
                'content' => $this->getSubparts()[0],
            ],
            1 => [
                'title' => 'EXPÉRIENCES PROFESSIONNELLES',
                'content' => $this->getSubparts()[1],
            ],
            2 => [
                'title' => 'FORMATIONS',
                'content' => $this->getSubparts()[2],
            ],
            3 => [
                'title' => 'LANGUES',
                'content' => $this->getSubparts()[3],
            ],
            4 => [
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
