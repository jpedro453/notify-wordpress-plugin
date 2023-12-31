<?php

use inc\Infra\Database\PlatformsDatabase;
use inc\Infra\Repositories\PlatformsRepository;

$platform_database = new PlatformsDatabase();
$platform_repository = new PlatformsRepository($platform_database);

$discord_webhook = $platform_repository->getDetail("discord", "webhook_url");

$platforms = array();

$discord = array(
    'name' => 'discord',
    'active' => isset($_POST['discord']) ? true : false,
    'details' => array(
        'webhook_url' => $_POST['webhook_discord'] ?? null
    )
);

?>

<div id="ef-admin-page">
    <div class="ef-tabs">
        <button class="ef-tab">Ações</button>
        <button class="ef-tab">Configurações</button>
        <button class="ef-tab">Informações</button>
    </div>
</div>
<form id="ef-form" method="POST">
    <input type="checkbox" name="discord" id="ef-discord-checkbox" >
    <label for="ef-discord-checkbox">Discord</label>
    <input type="text" name="webhook_discord" value="<?php echo $discord_webhook == null ? "" : $discord_webhook ?>" id="ef-discord" placeholder="Webhook do Discord">
    <input type="submit" value="Save">
</form>