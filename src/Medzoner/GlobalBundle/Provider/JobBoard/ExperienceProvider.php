<?php

namespace Medzoner\GlobalBundle\Provider\JobBoard;

/**
 * Class ExperienceProvider
 */
class ExperienceProvider
{
    /**
     * @return array
     */
    public static function getExperience()
    {
        return [

            '2015 à maintenant - LEADERSLEAGUE (75016) - Lead Développeur Back/Front' => [
                [
                    'Développement en interne from scratch (MVC, DDD, CQRS Event Sourcing): 3 front3, ~15 api + gateway' => [
                        [
                            'title' => 'RESTfull HATEOAS, GraphQL, JWT',
                        ],
                        [
                            'title' => 'Suivi et montée en compétence de l\'équipe',
                        ],
                        [
                            'title' => 'Choix des technologies avec le référent technique',
                        ],
                        [
                            'title' => 'Dockerisation de la stack en local',
                        ],
                        [
                            'title' => 'Préparation technique des sprints',
                        ],
                        [
                            'title' => 'Développement en TDD + Xdebug',
                        ],
                        [
                            'title' => 'Mise en place et respect de la qualité: revue de code, tests automatisés)',
                        ],
//                    ],
//                    'Infrastructure as code' => [
                        [
                            'title' => 'Provisionnement de l\'infrastructure',
                        ],
                        [
                            'title' => 'Déploiement de l\'infrastructure et  de l\'applicatif',
                        ],
                        [
                            'title' => 'Intégration et Livraison continue',
                        ],
                    ],
                ],
            ],
            '2012-2015 - ADMP (75004) - Développeur Backend et Frontend' => [
                    'Développements en interne' => [
                        'Création du CRM interne en PHP5' => [
                            [
                                'title' => 'Gestion des sociétés, des contacts, des interventions, des techniciens.',
                            ],
                            [
                                'title' => 'Relevés mensuels par mailing',
                            ],
                            [
                                'title' => 'Ticketing. Statistiques. Exports CSV et PDF',
                            ],
                        ],
                    ],
                    'Développements en prestation' => [
                        'https://www.mdemegeve.com/fr/legroupe' => [
                            [
                                'title' => 'Création de sites multihosts (https://www.laplayaorientbay.com/fr/): symfony 2.4',
                            ],
                        ],
                        'https://www.thisga.com' => [
                            [
                                'title' => 'Update de la version de Prestashop',
                            ],
                            [
                                'title' => 'Evolution du tunnel de commandes',
                            ],
                        ],
                        'https://fonda.asso.fr' => [
                            [
                                'title' => 'Mise en place du module (Spip) Paybox pour les abonnements selon une durée déterminée',
                            ],
                        ],
                        'http://www.ecoledesparents.org' => [
                            [
                                'title' => 'Reprise du projet symfony 1.4',
                            ],
                            [
                                'title' => 'Refacto du tunnel de commandes',
                            ],
                            [
                                'title' => 'Evolution des rubriques',
                            ],
                        ],
                    ],
            ],
            '2008-2011 - WEBPORTAGE - Développeur Web' => [],
            '2005-2009 - Prestation chez Renault Centre Technique (92) - Traitement et Analyse de données qualité.' => [
                [
                    'title' => 'Extraction des données issues des retours garanties surles pièces moteurs',
                ],
                [
                    'title' => 'Génération des reportings en VBA',
                ],
            ],
        ];
    }
}
