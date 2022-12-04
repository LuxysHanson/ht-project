<?php

namespace api\models;

use Yii;

class Direction extends \common\models\Direction
{

    public function rules()
    {
        return array_merge(parent::rules(), [
            [['city_id'], function() {
                if ($this->isNewRecord) {
                    if (static::find()
                        ->andWhere([
                            "city_id" => $this->city_id,
                            "country_id" => $this->country_id
                        ])->exists()
                    ) {
                        $this->addError("city_id", Yii::t("app", "Связь уже существует"));
                        return false;
                    }
                }
                return true;
            }]
        ]);
    }

}
