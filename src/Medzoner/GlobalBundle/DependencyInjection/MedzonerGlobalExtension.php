<?php

namespace Medzoner\GlobalBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * Class MedzonerGlobalExtension
 */
class MedzonerGlobalExtension extends Extension
{
    /**
     * @param array $configs
     * @param ContainerBuilder $container
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        if ($container->getParameter('kernel.environment') == 'dev') {
            $loader->load('./services/contact-dev.yml');
        }

        if ($container->getParameter('kernel.environment') == 'test') {
            $loader->load('./services/contact-test.yml');
        }

        $this->registerWidget($container);
    }
    /**
     * Registers the form widget.
     */
    protected function registerWidget(ContainerBuilder $container)
    {
        $templatingEngines = $container->getParameter('templating.engines');
        if (in_array('php', $templatingEngines)) {
            $formRessource = 'EWZRecaptchaBundle:Form';
            $container->setParameter('templating.helper.form.resources', array_merge(
                $container->getParameter('templating.helper.form.resources'),
                array($formRessource)
            ));
        }
        if (in_array('twig', $templatingEngines)) {
            $formRessource = 'MedzonerGlobalBundle:Form:coinhive_captcha_widget.html.twig';
            $container->setParameter('twig.form.resources', array_merge(
                $container->getParameter('twig.form.resources'),
                array($formRessource)
            ));
        }
    }
}
