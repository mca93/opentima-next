<?php

namespace App\Http\Controllers\Testes;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SMSController extends Controller
{
    public function enviar_sms_teste($destinatario[], $mensagem)
    {
      $apiKey = 'ez4kXuPjt2OCwRMQx41vDrLIH75Fr90U';
      $projectId = 'PJ5688bca48b7fee27';
      $client = new \GuzzleHttp\Client();
      $url = sprintf("https://api.telerivet.com/v1/projects/%s/messages/send", $projectId);


      $response = $client->request('POST', $url, [
        'json' => [
          'to_number' => '845210084',
          'content' => 'OLÁ MUNDO'
        ],
        'header' => ['Content-Type' => 'application/json'],
        'auth' => ['ez4kXuPjt2OCwRMQx41vDrLIH75Fr90U', null]
      ]);
    }
}
