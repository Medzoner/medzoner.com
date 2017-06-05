<?php

namespace Medzoner\GlobalBundle\Twig\Extensions;

/**
 * Class AssetVersionExtension
 */
class AssetVersionExtension extends \Twig_Extension
{
    /**
     * @var string
     */
    private $appDir;

    /**
     * @var string
     */
    private $env;

    /**
     * @var null
     */
    private $url;

    /**
     * AssetVersionExtension constructor.
     * @param $appDir
     * @param $env
     * @param null $url
     */
    public function __construct($appDir, $env, $url = null)
    {
        $this->appDir = $appDir;
        $this->env = $env;
        $this->url = rtrim($url, '/');
    }

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('asset_js_version', array($this, 'getAssetJsVersion')),
            new \Twig_SimpleFilter('asset_css_version', array($this, 'getAssetCssVersion')),
        );
    }

    /**
     * extract js versionned filename.
     *
     * @param $filename
     *
     * @return mixed
     *
     * @throws \Exception
     */
    public function getAssetJsVersion($filename)
    {
        //no use of versioning in debug mode
        if ($this->env == 'dev') {
            return $filename;
        }

        $manifestPath = $this->appDir.'/../assets/rev-manifest-js.json';
        if (!file_exists($manifestPath)) {
            throw new \Exception(sprintf('Cannot find manifest file: "%s"', $manifestPath));
        }

        $paths = json_decode(file_get_contents($manifestPath), true);
        if (!isset($paths[basename($filename)])) {
            throw new \Exception(sprintf('There is no file "%s" in the version manifest!', $filename));
        }

        return 'js/'.$paths[basename($filename)];
    }

    /**
     * extract css versionned filename.
     *
     * @param $filename
     *
     * @return mixed
     *
     * @throws \Exception
     */
    public function getAssetCssVersion($filename)
    {
        //no use of versioning in debug mode
        if ($this->env == 'dev') {
            //return $filename;
        }

        $manifestPath = $this->appDir.'/../assets/rev-manifest-css.json';
        if (!file_exists($manifestPath)) {
            throw new \Exception(sprintf('Cannot find manifest file: "%s"', $manifestPath));
        }

        $paths = json_decode(file_get_contents($manifestPath), true);
        if (!isset($paths[basename($filename)])) {
            throw new \Exception(sprintf('There is no file "%s" in the version manifest!', $filename));
        }

        return $this->url.'/css/'.$paths[basename($filename)];
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'asset_version';
    }
}
