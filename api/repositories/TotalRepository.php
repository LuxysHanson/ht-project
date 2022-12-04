<?php

namespace api\repositories;

class TotalRepository
{

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
        $this->cityRepository = $cityRepository;
        $this->countryRepository = $countryRepository;
        $this->directionRepository = $directionRepository;
    }

    public function prepareDataProvider(): array
    {
        return [
            'cities' => $this->cityRepository->getDataProvider(),
            'countries' => $this->countryRepository->getDataProvider(),
            'directions' => $this->directionRepository->getDataProvider(),
        ];
    }

}
