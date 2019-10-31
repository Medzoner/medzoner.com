<?php

namespace Medzoner\GlobalBundle\Provider\JobBoard;

/**
 * Class StackProvider
 */
class StackProvider
{
    /**
     * @return array
     */
    public static function getStack()
    {
        return [
//            'Versionning' => [
//                [
//                    'title' => 'Git (github, bitbucket, gitea)',
//                    'img' => 'git.png',
//                ],
//            ],

            'Infrastructure' => [
                [
                    'title' => 'Ansible',
                    'img' => 'ansible.png',
                ],
                [
                    'title' => 'Bash',
                    'img' => 'bash.png',
                ],
            ],

            'OS' => [
                [
                    'title' => 'Debian',
                    'img' => 'debian.png',
                ],
                [
                    'title' => 'Ubuntu',
                    'img' => 'ubuntu.svg',
                ],
                [
                    'title' => 'Proxmox',
                    'img' => 'proxmox.png',
                ],
            ],

            'Storage' => [
                [
                    'title' => 'Glusterfs/Heketi',
                    'img' => 'glusterfs.jpg',
                ],
                [
                    'title' => 'Minio',
                    'img' => 'minio.png',
                ],
            ],

            'Virtualization' => [
                [
                    'title' => 'KVM',
                    'img' => 'kvm.jpg',
                ],
                [
                    'title' => 'Qemu',
                    'img' => 'qemu.png',
                ],
            ],

            'Containers' => [
                [
                    'title' => 'Docker',
                    'img' => 'docker.png',
                ],
                [
                    'title' => 'LXC',
                    'img' => 'lxc.png',
                ],
            ],

            'Orchestration' => [
                [
                    'title' => 'Kubernetes',
                    'img' => 'kubernetes.png',
                ],
            ],

            'Data, Message Broker' => [
                [
                    'title' => 'MySQL',
                    'img' => 'mysql.png',
                ],
                [
                    'title' => 'Sqlite',
                    'img' => 'sqlite.png',
                ],
                [
                    'title' => 'MongoDB',
                    'img' => 'mongodb.png',
                ],
                [
                    'title' => 'Redis',
                    'img' => 'redis.png',
                ],
                [
                    'title' => 'Elasticsearch',
                    'img' => 'elasticsearch.png',
                ],
                [
                    'title' => 'RabbitMQ',
                    'img' => 'rabbitmq.svg',
                ],
            ],

            'Webserver' => [
                [
                    'title' => 'Nginx',
                    'img' => 'nginx.jpg',
                ],
                [
                    'title' => 'Traefik',
                    'img' => 'traefik.svg',
                ],
                [
                    'title' => 'Varnish',
                    'img' => 'varnish.png',
                ],
            ],

            'Intégration continue' => [
                [
                    'title' => 'Jenkins',
                    'img' => 'jenkins.png',
                ],
                [
                    'title' => 'Drone.io',
                    'img' => 'drone.svg',
                ],
                [
                    'title' => 'Travis',
                    'img' => 'travis.png',
                ],
                [
                    'title' => 'Bitbucket pipeline',
                    'img' => 'bitbucket.png',
                ],
            ],

            'Déploiement' => [
                [
                    'title' => 'Kubernetes',
                    'img' => 'kubernetes.png',
                ],
                [
                    'title' => 'Capisrano',
                    'img' => 'capistrano.png',
                ],
            ],

            'Application' => [
                [
                    'Langages' => [
                        [
                            'title' => 'PHP 5.x/7.x',
                            'img' => 'php.svg',
                        ],
                        [
                            'title' => 'Javascript/NodeJs',
                            'img' => 'nodejs.png',
                        ],
                    ],
                    'Frameworks' => [
                        [
                            'title' => 'Symfony 1.4, 2.x, 3.x',
                            'img' => 'symfony.png',
                        ],
                        [
                            'title' => 'AngularJS',
                            'img' => 'angular.png',
                        ],
                        [
                            'title' => 'VueJS',
                            'img' => 'vuejs.png',
                        ],
                    ],
                    'Test' => [
                        [
                            'title' => 'PhpUnit',
                            'img' => 'phpunit.gif',
                        ],
                        [
                            'title' => 'Behat',
                            'img' => 'behat.png',
                        ],
                        [
                            'title' => 'Mocha',
                            'img' => 'mocha.svg',
                        ],
                        [
                            'title' => 'Nightwatch',
                            'img' => 'nightwatch.png',
                        ],
                        [
                            'title' => 'Selenium',
                            'img' => 'selenium.png',
                        ],
                    ],
                ],
            ],

        ];
    }
}
