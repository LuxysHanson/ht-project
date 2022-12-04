<?php

namespace console\controllers;

use console\services\ImportService;
use yii\console\Controller;

/**
 * Импорт данных
 *
 * Class ImportController
 * @package console\controllers
 */
class ImportController extends Controller
{

    /**
     * @var ImportService
     */
    private $service;

    public function __construct($id, $module, ImportService $importService, $config = [])
    {
        $this->service = $importService;
        parent::__construct($id, $module, $config);
    }

    public function actionRun()
    {

        if (!$this->service->startImport()) {
            echo "An error occurred while importing";
            return false;
        }

        echo "Import completed successfully";
        return true;
    }

}
