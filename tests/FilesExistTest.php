<?php
namespace Thistle\Test;

use PHPUnit\Framework\TestCase;

/**
 * ------------------------------------------------------------
 * Class FilesExistTest
 * ------------------------------------------------------------
 *
 * Check all core files exist
 *
 * @author Luke Watts <luke@affinity4.ie>
 * @since 0.0.5
 *
 * @package Test
 */
class FilesExistTest extends TestCase
{
    /**
     * ------------------------------------------------------------
     * Test Root Files Exists
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.5
     */
    public function testRootFilesExists()
    {
        $this->assertFileExists('.htaccess');
        $this->assertFileExists('index.php');
        $this->assertFileExists('composer.json');
        $this->assertFileExists('LICENCE');
        $this->assertFileExists('README.md');
    }

    /**
     * ------------------------------------------------------------
     * Test App Files Exists
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.5
     */
    public function testAppFilesExists()
    {
        $this->assertFileExists('app/config.json');
        $this->assertFileExists('app/routes.php');
    }

    /**
     * ------------------------------------------------------------
     * Test Controller Files Exists
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.5
     */
    public function testControllerFilesExists()
    {
        $this->assertFileExists('app/controllers/BaseController.php');
    }

    /**
     * ------------------------------------------------------------
     * Test Core Files Exists
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.5
     */
    public function testCoreFilesExists()
    {
        $this->assertFileExists('app/core/init.php');
    }

    /**
     * ------------------------------------------------------------
     * Test Core Helpers Files Exists
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.5
     */
    public function testCoreHelperFilesExists()
    {
        $this->assertFileExists('app/core/helpers/functions.php');
    }

    /**
     * ------------------------------------------------------------
     * Test Core Providers Files Exists
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.5
     */
    public function testCoreProviderFilesExists()
    {
        $this->assertFileExists('app/core/providers/Model/Model.php');
        $this->assertFileExists('app/core/providers/Model/ModelServiceProvider.php');
        $this->assertFileExists('app/core/providers/Whoops/WhoopsServiceProvider.php');
    }

    /**
     * ------------------------------------------------------------
     * Test Twig Extend File Exists
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.5
     */
    public function testCoreTwigFilesExists()
    {
        $this->assertFileExists('app/twig/extend.php');
    }

    /**
     * ------------------------------------------------------------
     * Test View File Exists
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.5
     */
    public function testViewFilesExist()
    {
        $this->assertFileExists('app/views/base.html.twig');
        $this->assertFileExists('app/views/home.html.twig');
    }

    /**
     * ------------------------------------------------------------
     * Test Vendor Files Exists
     * ------------------------------------------------------------
     *
     * @author Luke Watts <luke@affinity4.ie>
     * @since 0.0.5
     */
    public function testVendorFilesExist()
    {
        // Autoload
        $this->assertFileExists('vendor/autoload.php');

        // Bin
        $this->assertFileExists('vendor/bin/doctrine');
        $this->assertFileExists('vendor/bin/doctrine.bat');
        $this->assertFileExists('vendor/bin/doctrine.php.bat');
        $this->assertFileExists('vendor/bin/doctrine-dbal');
        $this->assertFileExists('vendor/bin/doctrine-dbal.bat');
        $this->assertFileExists('vendor/bin/phpunit');
        $this->assertFileExists('vendor/bin/phpunit.bat');

        // Composer
        $this->assertFileExists('vendor/Composer/autoload_classmap.php');
        $this->assertFileExists('vendor/Composer/autoload_files.php');
        $this->assertFileExists('vendor/Composer/autoload_namespaces.php');
        $this->assertFileExists('vendor/Composer/autoload_psr4.php');
        $this->assertFileExists('vendor/Composer/autoload_real.php');
        $this->assertFileExists('vendor/Composer/autoload_static.php');
        $this->assertFileExists('vendor/Composer/ClassLoader.php');

        // The rest may chance so we'll leave them out :)
    }
}