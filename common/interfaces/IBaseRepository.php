<?php

namespace common\interfaces;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

interface IBaseRepository
{
    public function getModel(): ActiveRecord;

    public function find(): ActiveQuery;

    public function save(ActiveRecord $model);

    public function delete(ActiveRecord $model);
}
