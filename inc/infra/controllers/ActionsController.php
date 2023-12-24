<?php

namespace inc\Infra\Controllers;

use inc\Application\UseCases\sendNotificationUseCase;
use inc\Domain\Interfaces\Database\IPlatformRepository;
use inc\Domain\Interfaces\Services\INotificatorService;
use inc\Infra\Services\Platforms\Notificator;
use WP_User;

class ActionsController {
    public $user;
    public INotificatorService $notificator;
    public IPlatformRepository $repository;

    public function __construct(WP_User $user, IPlatformRepository $repository) {
        $this->user = $user;
        $this->notificator = new Notificator();
        $this->repository = $repository;
    }

    public function handleLogin(){
        $useCase = new sendNotificationUseCase($this->user, $this->repository, $this->notificator,);
        // $useCase->sendNotification();
    }



}