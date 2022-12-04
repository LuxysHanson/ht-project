<?php

namespace common\models;

use yii\db\ActiveRecord;

/**
 * Class Country
 * @package common\models
 *
 * @property string $name
 * @property string $nameTo
 * @property string $to
 * @property integer $sort
 * @property integer[] $departs
 * @property string $ts
 */
class Country extends ActiveRecord
{

    public static function tableName()
    {
        return '{{countries}}';
    }

    public function rules()
    {
        return [
            [['name', 'nameTo', 'to'], 'required'],
            [['name', 'nameTo'], 'string', 'max' => 2000],
            [['to'], 'string', 'max' => 1000],
            [['sort'], 'integer'],
            ['departs', 'each', 'rule' => ['integer']]
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => \Yii::t('app', 'ID'),
            'name' => \Yii::t('app', 'Name'),
            'nameTo' => \Yii::t('app', 'Name To'),
            'to' => \Yii::t('app', 'To'),
            'sort' => \Yii::t('app', 'Sort'),
            'departs' => \Yii::t('app', 'Departs'),
        ];
    }

}
