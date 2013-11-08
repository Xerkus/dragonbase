<?php
namespace DragonbaseTest\Book;

use Zend\Loader\AutoloaderFactory;
use Zend\Mvc\Service\ServiceManagerConfig;
use Zend\ServiceManager\ServiceManager;
use Zend\Stdlib\ArrayUtils;
use RuntimeException;

error_reporting(E_ALL | E_STRICT);
chdir(__DIR__);

class Bootstrap
{
    public static function init()
    {
        require_once( __DIR__ . '/../Module.php');

        // Load the user-defined test configuration file, if it exists; otherwise, load
        if (is_readable(__DIR__ . '/testConfig.php')) {
            $config = include __DIR__ . '/testConfig.php';
        } else {
            $config = include __DIR__ . '/testConfig.php.dist';
        }

        static::initAutoloader();

        $serviceManager = new ServiceManager(new ServiceManagerConfig());
        $serviceManager->setService('ApplicationConfig', $config);
        $serviceManager->get('ModuleManager')->loadModules();
    }

    protected static function initAutoloader()
    {
        $vendorPath = static::findParentPath('vendor');

        if (is_readable($vendorPath . '/autoload.php')) {
            $loader = include $vendorPath . '/autoload.php';
        } else {
            $zf2Path = getenv('ZF2_PATH') ?: (
                defined('ZF2_PATH') ? ZF2_PATH : (
                    is_dir($vendorPath . '/ZF2/library') ? $vendorPath . '/ZF2/library' : false
                )
            );

            if (!$zf2Path) {
                throw new RuntimeException('Unable to load ZF2. Run `php composer.phar install` or define a ZF2_PATH environment variable.');
            }

            include $zf2Path . '/Zend/Loader/AutoloaderFactory.php';

        }

        AutoloaderFactory::factory(array(
            'Zend\Loader\StandardAutoloader' => array(
                'autoregister_zf' => true,
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/' . str_replace('\\', '/', __NAMESPACE__),
                ),
            ),
        ));
    }

    protected static function findParentPath($path)
    {
        $dir = __DIR__;
        $previousDir = '.';
        while (!is_dir($dir . '/' . $path)) {
            $dir = dirname($dir);
            if ($previousDir === $dir) return false;
            $previousDir = $dir;
        }
        return $dir . '/' . $path;
    }
}

Bootstrap::init();
