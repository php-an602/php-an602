<?php

/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2017 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\modules\file\handler;

use an602\modules\file\models\File;
use an602\modules\file\widgets\FileDownload;
use Yii;
use yii\helpers\Url;

/**
 * DownloadFileHandler provides the download link for a file
 *
 * @since 1.2
 * @author Luke
 */
class DownloadFileHandler extends BaseFileHandler
{

    /**
     * @inheritdoc
     */
    public $position = self::POSITION_TOP;

    /**
     * @inheritdoc
     */
    public function getLinkAttributes()
    {
        return array_merge(FileDownload::getFileDataAttributes($this->file), [
            'label' => Yii::t('FileModule.base', 'Download') . FileDownload::getFileSizeString($this->file),
            'href' => self::getUrl($this->file),
            'target' => '_blank',
        ]);
    }

    public static function getUrl(File $file, $download = 0, $scheme = false)
    {
        if ($file === null) {
            return '';
        }

        return $file->getUrl(['download' => $download], $scheme);
    }

}
