<?php

namespace Infra\Services\Platforms;

use Application\Interfaces\IPlatform;

if(!class_exists("GG_DiscordPlatform")){
    class GG_DiscordPlatform implements IPlatform{

        public string $webhook_url;

        public function __construct(string $webhook_url){
            $this->webhook_url = $webhook_url;
        }
        // FIXME: it should be information on the arguments of sendNotification() 
        public function sendNotification(String $message){
           // Token do bot do Discord
            $token = 'SEU_TOKEN_DO_BOT';

            // ID do canal para o qual você deseja enviar a mensagem
            $channelId = 'ID_DO_CANAL';

            // URL da API de envio de mensagens do Discord
            $apiUrl = "https://discord.com/api/v10/channels/{$channelId}/messages";

            // Mensagem que você deseja enviar
            $message = 'Olá, mundo!';

            // Dados para a requisição POST
            $data = [
                'content' => $message,
            ];

            // Configuração da requisição cURL
            $options = [
                CURLOPT_URL            => $apiUrl,
                CURLOPT_POST           => true,
                CURLOPT_POSTFIELDS     => json_encode($data),
                CURLOPT_HTTPHEADER     => [
                    'Authorization: Bot ' . $token,
                    'Content-Type: application/json',
                ],
                CURLOPT_RETURNTRANSFER => true,
            ];

            // Inicializa cURL
            $curl = curl_init();
            curl_setopt_array($curl, $options);

            // Executa a requisição
            $response = curl_exec($curl);

            // Verifica por erros
            if ($response === false) {
                die('Erro ao enviar a mensagem: ' . curl_error($curl));
            }

            // Fecha a conexão cURL
            curl_close($curl);

            // Exibe a resposta da API do Discord (opcional)
            echo $response;
        }
    }
}