<?php

namespace inc\Domain\Interfaces\Services;

interface INotificationService {
    public function sendNotification($name, $details);
}