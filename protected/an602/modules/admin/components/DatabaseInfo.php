<?php

/**
 * @link https://metamz.network/
 * @copyright Copyright (c) 2018 PHP-AN602, The 86it Developers Network, Yii, and H u m H u b
 * @license https://www.metamz.network/licences
 */

namespace an602\modules\admin\components;

/**
 * @since 1.3
 */
class DatabaseInfo
{
    /** @var string */
    private $pdoDSN;

    public function __construct($pdoDSN)
    {
        $this->pdoDSN = $pdoDSN;
    }

    /**
     * @return string
     */
    public function getDatabaseName()
    {
        $databaseName = '';
        if (preg_match('/dbname=([^;]*)/', $this->pdoDSN, $match)) {
            $databaseName = $match[1];
        }

        return $databaseName;
    }
}
