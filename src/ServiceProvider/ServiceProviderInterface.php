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
declare( strict_types = 1 );

/**
 * @namespace
 */
namespace Omega\ServiceProvider;

/**
 * @use
 */
use Closure;

/**
 * Service provider interface.
 *
 * The `ServiceProviderInterface` defines the contract for service provider factories in
 * the Omega framework. Service providers are responsible for registering and bootstrapping
 * services within the framework's service container.
 *
 * @category    Omega
 * @package     Omega\ServiceProvider
 * @link        https://omegacms.github.io
 * @author      Adriano Giovannini <omegacms@outlook.com>
 * @copyright   Copyright (c) 2022 Adriano Giovannini. (https://omegacms.github.io)
 * @license     https://www.gnu.org/licenses/gpl-3.0-standalone.html     GPL V3.0+
 * @version     1.0.0
 */
interface ServiceProviderInterface
{
    /**
     * Register a service driver.
     *
     * @param  string  $alias  Holds the driver alias.
     * @param  Closure $driver Holds a closure that creates an instance of the service.
     * @return $this
     */
    public function register( string $alias, Closure $driver ) : static;

    /**
     * Bootstrap the service driver.
     *
     * @param  array $config Holds the configuration options for the service.
     * @return mixed Return the bootstrapped service instance.
     */
    public function bootstrap( array $config ) : mixed;
}
