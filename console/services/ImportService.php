<?php

namespace console\services;

use console\repositories\ImportRepository;

/**
 * Сервис для импорта данных
 *
 * Class ImportService
 * @package console\services
 */
class ImportService
{

    /**
     * @var ImportRepository
     */
    private $repository;

    public function __construct(ImportRepository $importRepository)
    {
        $this->repository = $importRepository;
    }

    public function startImport(): bool
    {
        return $this->repository->startImport();
    }

}
