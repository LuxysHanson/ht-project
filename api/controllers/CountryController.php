<?php

namespace api\controllers;

use api\components\ActiveController;
use api\models\Country;

class CountryController extends ActiveController
{

    public $modelClass = Country::class;

}
