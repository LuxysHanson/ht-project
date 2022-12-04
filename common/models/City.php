<?php

namespace common\models;

use yii\db\ActiveRecord;

/**
 * Class City
 * @package common\models
 *
 * @property string $name
 * @property string $nameFrom
 * @property integer $sort
 * @property string $ts
 */
class City extends ActiveRecord
{

    public static function tableName()
    {
        return '{{cities}}';
    }

    public function rules()
    {
        return [
            [['name', 'nameFrom'], 'required'],
            [['name', 'nameFrom'], 'string', 'max' => 2000],
            [['sort'], 'integer']
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => \Yii::t('app', 'ID'),
            'name' => \Yii::t('app', 'Name'),
            'nameFrom' => \Yii::t('app', 'Name From'),
            'sort' => \Yii::t('app', 'Sort'),
        ];
    }

}
