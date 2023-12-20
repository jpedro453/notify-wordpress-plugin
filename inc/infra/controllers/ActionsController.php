<?php

namespace Infra\Controllers;

use inc\Application\UseCases\sendNotificationUseCase;
use inc\domain\interfaces\Database\IPlatformRepository;
use inc\Domain\Interfaces\Services\INotificationService;
use inc\infra\repositories\PlatformsRepository;
use WP_User;

class ActionsController {
    public $user;
    public INotificationService $notificator;
    public IPlatformRepository $repository;

    public function __construct(WP_User $user, INotificationService $notificator, IPlatformRepository $repository) {
        $this->user = $user;
        $this->notificator = $notificator;
        $this->repository = $repository;
    }

    public function handleLogin(){
        $useCase = new sendNotificationUseCase($this->user, $this->repository, $this->notificator,);
        // $useCase->sendNotification();
    }



}