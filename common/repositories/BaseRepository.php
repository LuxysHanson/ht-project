<?php

namespace common\repositories;

use common\helpers\ClassHelper;
use common\interfaces\IBaseRepository;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\StaleObjectException;
use yii\web\NotFoundHttpException;

abstract class BaseRepository implements IBaseRepository
{

    public function getModel(): ActiveRecord
    {
        $modelClass = ClassHelper::getRelatedClass(get_called_class(), 'models', '');
        return new $modelClass;
    }

    public function find(): ActiveQuery
    {
        $model = $this->getModel();
        return $model::find();
    }

    /**
     * @param ActiveRecord $model
     * @return bool
     */
    public function save(ActiveRecord $model)
    {
        return $model->save();
    }

    /**
     * @param ActiveRecord $model
     * @return bool|false|int
     * @throws StaleObjectException
     */
    public function delete(ActiveRecord $model)
    {
        return $model->delete();
    }


    /**
     * @param int $id
     * @return ActiveRecord|null
     * @throws NotFoundHttpException
     */
    public function oneById(int $id, array $with = [])
    {
        $exists = $this->find()->andWhere(['id' => $id])->with($with)->one();
        if ($exists instanceof ActiveRecord) {
            return $exists;
        }

        throw new NotFoundHttpException(Yii::t('app', 'Данные не найдены'));
    }

    /**
     * @return array
     */
    public function getList(): array
    {
        return $this->find()->indexBy('id')->all();
    }

    public function getDataProvider(): ActiveDataProvider
    {
        return new ActiveDataProvider([
            'query' => $this->find()
        ]);
    }

}
