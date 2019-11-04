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
        $assetVersionExtension = new AssetVersionExtension(__DIR__ . '/files', 'dev');
        $this->assertIsString($assetVersionExtension->getAssetCssVersion('app.css'));
    }
    public function test_success_css_prod()
    {
        $assetVersionExtension = new AssetVersionExtension(__DIR__ . '/files', 'prod', __DIR__ . '/files');
        $this->assertIsString($assetVersionExtension->getAssetCssVersion('app.css'));
        $this->assertIsString($assetVersionExtension->getAssetCssVersion('app.min.css'));
    }
    public function test_failed_css_prod()
    {
        $assetVersionExtension = new AssetVersionExtension(__DIR__ . '/files', 'prod', __DIR__ . '/files');
        $this->assertIsString($assetVersionExtension->getAssetCssVersion('no'));
    }
    public function test_success_js_dev()
    {
        $assetVersionExtension = new AssetVersionExtension(__DIR__ . '/files', 'dev');
        $this->assertIsString($assetVersionExtension->getAssetJsVersion('app.js'));
    }
    public function test_success_js_prod()
    {
        $assetVersionExtension = new AssetVersionExtension(__DIR__ . '/files', 'prod', __DIR__ . '/files');
        $this->assertIsString($assetVersionExtension->getAssetJsVersion('app.js'));
        $this->assertIsString($assetVersionExtension->getAssetJsVersion('app.min.js'));
    }
    public function test_failed_js_prod()
    {
        $assetVersionExtension = new AssetVersionExtension(__DIR__ . '/files', 'prod', __DIR__ . '/files');
        $this->assertIsString($assetVersionExtension->getAssetJsVersion('no'));
    }
}
