<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\components;

/**
 * Response
 *
 * @author Luke
 */
class Response extends \yii\web\Response
{

    /**
     * @inheritdoc
     */
    public function xSendFile($filePath, $attachmentName = null, $options = [])
    {
        if (isset($_SERVER['SERVER_SOFTWARE']) && stripos($_SERVER['SERVER_SOFTWARE'], 'nginx') === 0) {
            // set nginx specific X-Sendfile header name
            $options['xHeader'] = 'X-Accel-Redirect';
            // make path relative to docroot
            $docroot = rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR);
            if (substr($filePath, 0, strlen($docroot)) == $docroot) {
                $filePath = substr($filePath, strlen($docroot));
            }
        }

        return parent::xSendFile($filePath, $attachmentName, $options);
    }
}
