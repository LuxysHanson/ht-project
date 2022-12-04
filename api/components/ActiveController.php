<?php

namespace api\components;

use yii\filters\auth\HttpBearerAuth;

class ActiveController extends \yii\rest\ActiveController
{

    public function behaviors()
    {
        $parent = parent::behaviors();
        /*$parent['authenticator'] = [
            'class' => HttpBearerAuth::class,
            'except' => ['options'],
        ];*/
        return $parent;
    }

}
