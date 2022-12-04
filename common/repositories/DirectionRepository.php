<?php

namespace common\repositories;

/**
 * Class DirectionRepository
 * @package common\repositories
 */
class DirectionRepository extends BaseRepository
{

    public function getList(): array
    {

        $directions = parent::getList();

        $list = [];
        foreach ($directions as $direction) {
            $list[$direction->city_id][$direction->country_id] = $direction;
        }

        return $list;
    }

}
