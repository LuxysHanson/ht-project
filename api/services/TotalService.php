<?php

namespace api\services;

use api\repositories\TotalRepository;

/**
 * Class TotalService
 * @package api\services
 */
class TotalService
{

    /**
     * @var TotalRepository
     */
    private $repository;

    public function __construct(TotalRepository $totalRepository)
    {
        $this->repository = $totalRepository;
    }

    public function prepareDataProvider(): array
    {
        return $this->repository->prepareDataProvider();
    }

}
