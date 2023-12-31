<?php

namespace inc\Domain\Interfaces\Services;

interface IPlatformService {
    public function sendNotification($title, $description);
}