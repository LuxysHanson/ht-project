<?php

namespace console\models;

use common\helpers\StringHelper;

class PoedemImport extends BaseImport
{

    public function getImportUrl(): string
    {
        return 'https://poedem.kz/find-form/get-data-for-wide';
    }

    public function getData(): array
    {
        $json_string = file_get_contents($this->tempPath);
        return StringHelper::isJson($json_string) ? json_decode($json_string, true) : [];
    }

}
