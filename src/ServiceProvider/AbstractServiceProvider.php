<?php
/**
 * Part of Omega CMS - ServiceProvider Package
 *
 * @link       https://omegacms.github.io
 * @author     Adriano Giovannini <omegacms@outlook.com>
 * @copyright  Copyright (c) 2022 Adriano Giovannini. (https://omegacms.github.io)
 * @license    https://www.gnu.org/licenses/gpl-3.0-standalone.html     GPL V3.0+
 */

/**
 * @declare
 */
declare(strict_types=1);

/**
 * @namespace
 */
namespace Omega\Container\ServiceProvider;

/**
 * @use
 */
use Omega\Application\Application;
use Closure;
use RuntimeException;

/**
 * Abstract service provider class.
 *
 * The `AbstractServiceProvider` class provides a foundation for creating service
 * providers in Omega. Service providers are responsible for binding services to
 * the application container.
 *
 * @category    Omega
 * @package     Omega\ServiceProvider
 * @link        https://omegacms.github.io
 * @author      Adriano Giovannini <omegacms@outlook.com>
 * @copyright   Copyright (c) 2022 Adriano Giovannini. (https://omegacms.github.io)
 * @license     https://www.gnu.org/licenses/gpl-3.0-standalone.html     GPL V3.0+
 * @version     1.0.0
 */
abstract class AbstractServiceProvider
{
    /**
     * Bind the service with the application.
     *
     * This method binds the service name, factory, and drivers to the application
     * container.
     *
     * @param  Application $application Holds an instance of Application.
     * @return void
     */
    final public function bind(Application $application): void
    {
        $name = $this->name();
        $factory = $this->factory();
        $drivers = $this->drivers();

        $application->alias($name, function (Application $application) use ($name, $factory, $drivers) {
            foreach ($drivers as $key => $value) {
                $factory->register($key, $value);
            }

            $config = config($name);

            // Assumiamo che $config sia un array con chiave 'default'
            if (!is_array($config) || !isset($config['default']) || !isset($config[$config['default']])) {
                throw new RuntimeException(
                    'Invalid configuration for ' . $name
                );
            }

            return $factory->bootstrap($config[$config['default']]);
        });
    }

    /**
     * Get the service name.
     *
     * This method should return a unique name that identifies the service provided
     * by this provider.
     *
     * @return string Return the service name as a string.
     */
    abstract protected function name() : string;

    /**
     * Get the service factory.
     *
     * This method should return an instance of the service factory or a callback
     * function that creates the service.
     *
     * @return ServiceProviderInterface Return the service factory.
     */
    abstract protected function factory() : ServiceProviderInterface;

    /**
     * Get drivers.
     *
     * This method should return an array of drivers that can be registered with
     * the service factory.
     *
     * @return array<string, Closure> Return an associative array where keys are driver names and values are factory callbacks.
     */
    abstract protected function drivers() : array;
}
