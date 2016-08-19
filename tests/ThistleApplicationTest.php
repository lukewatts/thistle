<?php
namespace Thistle\Test;

use PHPUnit\Framework\TestCase;
use Thistle\Application;

class ThistleApplicationTest extends TestCase
{
    /**
     * @var \Thistle\Application
     */
    public $app;

    /**
     * ------------------------------------------------------------
     * ThistleApplicationTest constructor
     * ------------------------------------------------------------
     *
     * Setup test
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.9
     *
     */
    public function __construct()
    {
        $this->app = new Application;
    }

    /**
     * ------------------------------------------------------------
     * Test Set Config Returns Array
     * ------------------------------------------------------------
     * 
     * Set Thistle\Application::getConfig() returns array
     * 
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.9
     *
     */
    public function testGetConfigReturnsArray()
    {
        $this->app->setConfig(dirname(__DIR__) . '/app/config.json');
        $this->assertInternalType('array', $this->app->getConfig());
    }

    /**
     * ------------------------------------------------------------
     * Test Version
     * ------------------------------------------------------------
     * 
     * Tests version is set and returned as expected
     * 
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.9
     *
     */
    public function testSetGetVersion()
    {
        $input = '0.0.9-beta';
        $this->app->setVersion($input);
        $this->assertEquals($input, $this->app->getVersion());
    }

    public function testGetIndexContentss()
    {
        $content = <<<INDEX
<?php

/**
 * ------------------------------------------------------------
 * Thistle Framework
 * ------------------------------------------------------------
 *
 * The Thistle Framework is built on the Silex framework v1.3
 * http://silex.sensiolabs.org/doc/1.3. However, it comes
 * with Controllers, Models, Views, a config file and
 * routes already set up to use immediately.
 *
 * @author  Luke Watts <luke@affinity4.ie>
 * @since   0.0.1
 *
 * @version 0.0.9-beta
 */
require_once __DIR__ . '/app/core/init.php';

INDEX;

        $this->app->setIndexContents();
        $this->assertInternalType('string', $this->app->getIndexContents());
        $this->assertEquals($content, $this->app->getIndexContents());
    }

    public function testCleanNewlines()
    {
        $win_content = "some\r\nwindows\r\ncontent\r\n";
        $expected_post_win_contents = "some\nwindows\ncontent\n";

        $this->app->setIndexContents($win_content);

        // Clean Windows newlines
        $this->app->setIndexContents(str_replace("\r\n", "\n", $this->app->getIndexContents()));

        $this->assertEquals($expected_post_win_contents, $this->app->getIndexContents());

        $mac_content                = "some\rwindows\rcontent\r";
        $expected_post_mac_contents = "some\nwindows\ncontent\n";

        $this->app->setIndexContents($mac_content);

        // Clean Classic Mac newlines
        $this->app->setIndexContents(str_replace("\r", "\n", $this->app->getIndexContents()));

        $this->assertEquals($expected_post_mac_contents, $this->app->getIndexContents());
    }

    public function testSerializeIndexContents()
    {
        $this->assertInternalType('array', $this->app->serializeIndexContents());
    }

    public function testVersion()
    {
        $this->assertInternalType('string', $this->app->version());
    }

    public function testApplication()
    {
        require_once dirname(__DIR__) . '/app/core/init.php';

        $this->assertInternalType('array', $this->app->getConfig());
        $this->assertInternalType('boolean', $this->app->getDebug());
        $this->assertEquals($this->app->getConfig()['debug'], $this->app->getDebug());
        $this->assertEquals($this->app->getConfig()['url'], $this->app->getUrl());
        $this->assertInternalType('array', $this->app->getThistleProviders());
    }
}