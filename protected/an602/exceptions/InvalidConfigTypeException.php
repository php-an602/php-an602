<?php

/**
 * @link      https://www.an602.org/
 * @copyright Copyright (c) 2023 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b
 * @license   https://www.an602.com/licences
 */

namespace an602\exceptions;

use yii\base\InvalidConfigException;

/**
 * @since 1.15
 */
class InvalidConfigTypeException extends InvalidConfigException
{
    use InvalidTypeExceptionTrait;

    protected function formatPrologue(array $constructArguments): string
    {
        return "Parameter $this->parameter of configuration";
    }
}
