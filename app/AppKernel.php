<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel {

    public function registerBundles() {
        $bundles = array(
            // Framework Symfony
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),

            // Doctrine
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),

            new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle(),
            new Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle(),
            new Doctrine\Bundle\MongoDBBundle\DoctrineMongoDBBundle(),

            //Fos
            new FOS\JsRoutingBundle\FOSJsRoutingBundle(),
            //new FOS\ElasticaBundle\FOSElasticaBundle(),
            new FOS\HttpCacheBundle\FOSHttpCacheBundle(),
            new FOS\RestBundle\FOSRestBundle(),

            //Liip
            //new Liip\ImagineBundle\LiipImagineBundle(),

            new Snc\RedisBundle\SncRedisBundle(),

            new SimpleBus\SymfonyBridge\SimpleBusCommandBusBundle(),
            new SimpleBus\SymfonyBridge\SimpleBusEventBusBundle(),
            new SimpleBus\AsynchronousBundle\SimpleBusAsynchronousBundle(),
            new SimpleBus\RabbitMQBundleBridge\SimpleBusRabbitMQBundleBridgeBundle(),
            new SimpleBus\JMSSerializerBundleBridge\SimpleBusJMSSerializerBundleBridgeBundle(),
            new OldSound\RabbitMqBundle\OldSoundRabbitMqBundle(),
            new JMS\SerializerBundle\JMSSerializerBundle(),

            new CoinhiveBundle\CoinhiveBundle(),

            //Medzoner
            new Medzoner\ApiBundle\MedzonerApiBundle(),
            new Medzoner\GlobalBundle\MedzonerGlobalBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
        }

        return $bundles;
    }
    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load($this->getRootDir().'/config/config_'.$this->getEnvironment().'.yml');
    }
}
