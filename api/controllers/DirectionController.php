<?php

namespace api\controllers;

use api\components\ActiveController;
use api\models\Direction;

class DirectionController extends ActiveController
{

    public $modelClass = Direction::class;

}
