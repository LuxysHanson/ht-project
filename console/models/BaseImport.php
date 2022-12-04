<?php

namespace console\models;

use console\interfaces\IBaseImport;
use Yii;
use yii\base\Model;

abstract class BaseImport extends Model implements IBaseImport
{

    abstract public function getImportUrl(): string;

    protected $tempPath;

    public function init()
    {
        parent::init();
        $this->saveLocallyTemporarily();
    }

    /**
     * Временный путь для файла
     */
    protected function saveLocallyTemporarily()
    {
        $tempPath = Yii::getAlias('@console') .DIRECTORY_SEPARATOR. 'runtime';
        $filePath = $tempPath .DIRECTORY_SEPARATOR. 'get-data-for-wide.json';
        file_put_contents($filePath, file_get_contents($this->getImportUrl()));
        $this->tempPath = $filePath;
    }

}
