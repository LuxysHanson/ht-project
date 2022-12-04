<?php

namespace api\controllers;

use api\components\ActiveController;
use api\models\City;

class CityController extends ActiveController
{

    public $modelClass = City::class;

}
