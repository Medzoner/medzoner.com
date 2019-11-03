<?php

namespace Tests\Unit\GlobalBundle\Twig\Extensions;

use Medzoner\GlobalBundle\Twig\Extensions\AssetVersionExtension;
use PHPUnit\Framework\TestCase;

/**
 * Class AssetVersionExtensionTest
 */
class AssetVersionExtensionTest extends TestCase
{
    public function test_success_css_dev()
    {
        $assetVersionExtension = new AssetVersionExtension(__DIR__, 'dev');
        $this->assertIsString($assetVersionExtension->getAssetCssVersion('app.css'));
    }
    public function test_success_css_prod()
    {
        $assetVersionExtension = new AssetVersionExtension(__DIR__, 'prod', __DIR__);
        $this->assertIsString($assetVersionExtension->getAssetCssVersion('app.css'));
    }
    public function test_failed_css_prod()
    {
        $assetVersionExtension = new AssetVersionExtension(__DIR__, 'prod', __DIR__);
        $this->assertIsString($assetVersionExtension->getAssetCssVersion('no'));
    }
    public function test_success_js_dev()
    {
        $assetVersionExtension = new AssetVersionExtension(__DIR__, 'dev');
        $this->assertIsString($assetVersionExtension->getAssetJsVersion('app.js'));
    }
    public function test_success_js_prod()
    {
        $assetVersionExtension = new AssetVersionExtension(__DIR__, 'prod', __DIR__);
        $this->assertIsString($assetVersionExtension->getAssetJsVersion('app.js'));
    }
    public function test_failed_js_prod()
    {
        $assetVersionExtension = new AssetVersionExtension(__DIR__, 'prod', __DIR__);
        $this->assertIsString($assetVersionExtension->getAssetJsVersion('no'));
    }
}
