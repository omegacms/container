<?php
/**
 * Part of Omega CMS - Container Package
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
namespace Omega\Container\Exceptions;

/**
 * No entry was found in the container.
 *
 * The `NotFoundExceptionInterface` is an interface that extends `ContainerExceptionInterface`
 * and represents exceptions thrown when no entry is found in the container.
 *
 * @category    Omega
 * @package     Omega\Container
 * @subpackege  Omega\Container\Exceptions
 * @link        https://omegacms.github.io
 * @author      Adriano Giovannini <omegacms@outlook.com>
 * @copyright   Copyright (c) 2022 Adriano Giovannini. (https://omegacms.github.io)
 * @license     https://www.gnu.org/licenses/gpl-3.0-standalone.html     GPL V3.0+
 * @version     1.0.0
 */
interface NotFoundExceptionInterface extends ContainerExceptionInterface
{
}
