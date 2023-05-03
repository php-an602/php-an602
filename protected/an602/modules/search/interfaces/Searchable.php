<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2015 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\search\interfaces;

/**
 * Interface for Searchable Models
 *
 * @package an602.interfaces
 * @since 0.5
 * @author Luke
 */
interface Searchable
{

    const EVENT_SEARCH_ADD = 'searchadd';

    public function getWallOut();

    public function getSearchAttributes();
}
