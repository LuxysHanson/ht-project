<?php

namespace api\controllers\actions;

use api\services\TotalService;
use yii\rest\IndexAction;

class TotalIndexAction extends IndexAction
{

    /**
     * @var TotalService
     */
    private $service;

    public function __construct($id, $controller, TotalService $service, $config = [])
    {
        $this->service = $service;
        parent::__construct($id, $controller, $config);
    }

    protected function prepareDataProvider()
    {
       return $this->service->prepareDataProvider();
    }

}
