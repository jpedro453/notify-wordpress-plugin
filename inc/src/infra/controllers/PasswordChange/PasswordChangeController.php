<?php
require_once __DIR__ . '/inc/src/domain/entities/PasswordChange.php';
require_once __DIR__ . '/inc/src/application/services/platforms/Platform.php';

class GG_PasswordChangeController {

    public $password_change;
    public $user_id;

    public array $platforms = [];

    public function __construct(GG_PasswordChange $password_change, array $platforms) {
        $this->password_change = $password_change;
        $this->user_id = $password_change->user_id;

        foreach ($platforms as $platform) {
            if (!($platform instanceof IPlatform)) {
                throw new InvalidArgumentException("Todos os elementos do array de plataformas devem ser do tipo IPlatform");
            }
        }

        $this->platforms = $platforms;
    }

    function handle(){
        if(!user_can($this->user_id, 'administrator')){
            return;
        }
        $this->sendNotificationToAllPlatforms('mensagem');
    }
    public function sendNotificationToAllPlatforms(string $message) {
        foreach ($this->platforms as $platform) {
            $platform->sendNotification($message);
        }
    }
}