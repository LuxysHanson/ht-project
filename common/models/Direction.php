<?php

namespace common\models;

use yii\db\ActiveRecord;

/**
 * Class Direction
 * @package common\models
 *
 * @property int $city_id
 * @property int $country_id
 * @property string $cur
 * @property integer $price
 * @property integer[] $days
 * @property string $defaultDate
 * @property string $ts
 */
class Direction extends ActiveRecord
{

    public static function tableName()
    {
        return '{{directions}}';
    }

    public function rules()
    {
        return [
            [['city_id', 'country_id'], 'required'],
            [['cur'], 'string', 'max' => 25],
            [['price'], 'integer'],
            [['defaultDate'], 'safe'],
            ['days', 'each', 'rule' => ['integer']]
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => \Yii::t('app', 'ID'),
            'city_id' => \Yii::t('app', 'City ID'),
            'country_id' => \Yii::t('app', 'Country ID'),
            'price' => \Yii::t('app', 'Price'),
            'cur' => \Yii::t('app', 'Cur'),
            'days' => \Yii::t('app', 'Days'),
        ];
    }

}
