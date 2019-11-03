<?php

use Symfony\Component\HttpKernel\KernelInterface;

use Behat\Behat\Context\Context;
use Behat\Symfony2Extension\Context\KernelAwareContext;

use Doctrine\ORM\EntityManager;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context, KernelAwareContext
{
    /**
     * Project kernel
     *
     * @var KernelInterface
     */
    protected $kernel;

    /**
     * Base url
     *
     * @var string
     */
    protected $baseUrl;

    /**
     * Construct.
     *
     * @param string $baseUrl
     */
    public function __construct($baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }

    /**
     * Set the project kernel (specific for the tests)
     *
     * @param KernelInterface $kernelInterface
     */
    public function setKernel(KernelInterface $kernelInterface)
    {
        $this->kernel = $kernelInterface;
    }

    /**
     * Get the project kernel (specific for the tests)
     *
     * @return KernelInterface
     */
    public function getKernel()
    {
        return $this->kernel;
    }

    /**
     * Get the entity manager
     *
     * @return EntityManager
     */
    protected function getEntityManager()
    {
        return $this->kernel->getContainer()->get("doctrine")->getManager();
    }
}
