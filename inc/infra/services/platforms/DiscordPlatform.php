<?php

namespace inc\infra\services\platforms;

use inc\Domain\Interfaces\Services\INotificationService;


class DiscordPlatform implements INotificationService{

    public array $details;
    public string $name = 'discord';

    public function __construct(array $details = array('name', 'webhook_url'),){
        $this->details = $details;
    }
    // FIXME: it should be information on the arguments of sendNotification() 
    public function sendNotification(){
        // Token do bot do Discord
        $dados = array(
        'username' => 'GG Notify',  // Nome que aparecerá como remetente
                // URL do avatar personalizado
        'embeds' => array(
            array(
                'title' => 'Título da Mensagem',
                'description' => 'Descrição da Mensagem',
                'color' => hexdec('3366ff'),  // Cor da borda da embed (formato hexadecimal)
                
            ),
        ),
    );
        $dados_string = json_encode($dados);
    
        $ch = curl_init($this->details['webhook_url']);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dados_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($dados_string)
        ));
    
        $resultado = curl_exec($ch);
    
        // Verificar se houve erros na requisição
        if (curl_errno($ch)) {
            echo 'Erro na requisição curl: ' . curl_error($ch);
        }
    
        curl_close($ch);
    
        return $resultado;
    }
    public function getName() {
        return $this->name; // Substitua por lógica real, se necessário
    }
    
}