<?php

namespace console\repositories;

use common\models\City;
use common\models\Country;
use common\models\Direction;
use common\repositories\CityRepository;
use common\repositories\CountryRepository;
use common\repositories\DirectionRepository;
use console\models\PoedemImport;
use Yii;

class ImportRepository
{

    /**
     * @var \yii\db\Connection
     */
    protected $db;

    /**
     * @var CityRepository
     */
    protected $cityRepository;

    /**
     * @var CountryRepository
     */
    protected $countryRepository;

    /**
     * @var DirectionRepository
     */
    protected $directionRepository;

    public function __construct(
        CityRepository $cityRepository,
        CountryRepository $countryRepository,
        DirectionRepository $directionRepository
    )
    {
        $this->db = Yii::$app->getDb();
        $this->cityRepository = $cityRepository;
        $this->countryRepository = $countryRepository;
        $this->directionRepository = $directionRepository;
    }

    public function startImport(): bool
    {

        $data = (new PoedemImport())->getData();

        if (empty($data))
            return false;

        $transaction = $this->db->beginTransaction();

        if ($cities = $data['cities']) {

            $_cities = $this->cityRepository->getList();

            foreach ($cities as $city_id => $row) {

                $city = new City();
                $city->id = $city_id;

                if ($_cities[$city_id]) {
                    $city = $_cities[$city_id];
                }

                $city->setAttributes($row);
                if (!$this->cityRepository->save($city)) {
                    $transaction->rollBack();
                    return false;
                }
            }

        }

        if ($countries = $data['countries']) {

            $_countries = $this->countryRepository->getList();

            foreach ($countries as $country_id => $row) {

                $country = new Country();
                $country->id = $country_id;

                if ($_countries[$country_id]) {
                    $country = $_countries[$country_id];
                }

                $country->setAttributes($row);
                if (!$this->countryRepository->save($country)) {
                    $transaction->rollBack();
                    return false;
                }
            }

        }

        if ($directions = $data['directions']) {

            $_directions = $this->directionRepository->getList();

            foreach ($directions as $city_id => $row) {
                foreach ($row as $country_id => $item) {

                    $direction = new Direction();
                    $direction->city_id = $city_id;
                    $direction->country_id = $country_id;

                    if ($_directions[$city_id][$country_id]) {
                        $direction = $_directions[$city_id][$country_id];
                    }

                    $direction->setAttributes($item);
                    $direction->defaultDate = date('Y-m-d', strtotime($item['defaultDate']));
                    if (!$this->directionRepository->save($direction)) {
                        $transaction->rollBack();
                        return false;
                    }
                }
            }

        }

        $transaction->commit();
        return true;
    }

}
