<?php

namespace Medzoner\GlobalBundle\Twig\Extensions;

use Exception;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

/**
 * Class AssetVersionExtension
 */
class AssetVersionExtension extends AbstractExtension
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
            new TwigFilter('asset_js_version', array($this, 'getAssetJsVersion')),
            new TwigFilter('asset_css_version', array($this, 'getAssetCssVersion')),
        );
    }

    /**
     * @param $filename
     * @return null|string
     */
    public function getAssetJsVersion($filename)
    {
        //no use of versioning in debug mode
        if ($this->env == 'dev') {
            return '/js/app.js';
        }

        $manifestPath = $this->url.'/rev-manifest-js.json';

        try {
            $paths = json_decode(file_get_contents($manifestPath), true);
            if (!isset($paths[basename($filename)])) {
                return $filename;
            }
            return 'js/'.$paths[basename($filename)];
        } catch (Exception $e) {
            return null;
        }
    }

    /**
     * @param $filename
     * @return null|string
     */
    public function getAssetCssVersion($filename)
    {
        //no use of versioning in debug mode
        if ($this->env == 'dev') {
            return '/css/app.css';
        }

        $manifestPath = $this->url.'/rev-manifest-css.json';

        try {
            $paths = json_decode(file_get_contents($manifestPath), true);
            if (!isset($paths[basename($filename)])) {
                return $filename;
            }
            return '/css/'.$paths[basename($filename)];
        } catch (Exception $e) {
            return null;
        }
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'asset_version';
    }
}
