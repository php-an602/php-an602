<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\user\jobs;

use an602\modules\queue\ActiveJob;
use an602\modules\user\models\Session;

/**
 * DeleteExpiredSessions cleanups the session table.
 *
 * @since 1.3
 * @author Luke
 */
class DeleteExpiredSessions extends ActiveJob
{

    /**
     * @inheritdoc
     */
    public function run()
    {
        foreach (Session::find()->where(['<', 'expire', time()])->all() as $session) {
            $session->delete();
        }
    }

}
