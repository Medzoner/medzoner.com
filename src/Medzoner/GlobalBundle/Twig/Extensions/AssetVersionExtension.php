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

        $manifestPath = $this->url.'/revision/rev-manifest-js.json';

        $paths = json_decode(file_get_contents($manifestPath), true);
        if (!isset($paths[basename($filename)])) {
            return $filename;
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
            return $filename;
        }

        $manifestPath = $this->url.'/revision/rev-manifest-css.json';

        $paths = json_decode(file_get_contents($manifestPath), true);
        if (!isset($paths[basename($filename)])) {
            return $filename;
        }

        return '/css/'.$paths[basename($filename)];
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'asset_version';
    }
}
