<?php

namespace api\controllers;

use api\components\ActiveController;
use api\controllers\actions\TotalIndexAction;

class TotalController extends ActiveController
{

    public $modelClass = "";

    public function actions()
    {
        $actions = parent::actions();
        $actions['index']['class'] = TotalIndexAction::class;
        return $actions;
    }

}
