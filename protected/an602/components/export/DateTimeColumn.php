<?php
/**
 * @link https://www.php-an602.coders.exchange/
 * @copyright Copyright (c) 2018 Brandon Maintenance Management, LLC
 * @license https://www.php-an602.coders.exchange/licences
 */

namespace an602\components\export;

use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

/**
 * DateTimeColumn exports DateTime values to [[SpreadsheetExport]] widget.
 */
class DateTimeColumn extends DataColumn
{
    /**
     * @var array containing style information
     * @see https://phpspreadsheet.readthedocs.io/en/develop/topics/recipes/#styles
     */
    public $styles = [
        'numberFormat' => [
            'formatCode' => NumberFormat::FORMAT_DATE_DATETIME
        ]
    ];

    /**
     * @inheritdoc
     */
    public function renderDataCellContent($model, $key, $index)
    {
        $value = Date::PHPToExcel(parent::renderDataCellContent($model, $key, $index));
        return $value === false ? null : $value;
    }
}
