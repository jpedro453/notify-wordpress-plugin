<div id="ef-admin-page">
    <div class="ef-tabs">
        <button class="ef-tab">Ações</button>
        <button class="ef-tab">Configurações</button>
        <button class="ef-tab">Informações</button>
    </div>
</div>
<form id="ef-form" method="POST">
    <input type="checkbox" name="discord" id="ef-discord-checkbox" <?php echo $isDiscordActive ? 'checked' : ''; ?>>
    <label for="ef-discord-checkbox">Discord</label>
    <input type="text" name="webhook_discord" value="<?php echo $webhookDiscord; ?>" id="ef-discord" placeholder="Webhook do Discord">
    <input type="submit" value="Save">
</form>