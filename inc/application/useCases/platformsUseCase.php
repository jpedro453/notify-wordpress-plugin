<?php

namespace inc\Application\UseCases;

use inc\Domain\Interfaces\Database\IPlatformRepository;

class platformsUseCase {

    private IPlatformRepository $repository;

    public function __construct(IPlatformRepository $repository = null) {
        $this->repository = $repository;
    }

    public function getPlatform($name) {

    }
}