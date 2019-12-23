<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Mail;
use App\Docente;
use Sentinel;
use App\User;

/**
 * Class Helpers
 * @package App\Helpers
 */
class Helpers {

	// Return the image logo path
	static public function logoUrl(){
		return asset('assets/img/logo.png');
	}

	// Checks if the given user is the owner of the project
	// static function isOwner($project_id, $user_id = null) {
  //
	// 	if($user_id == null){
	// 		$user_id = Auth::id();
	// 	}
  //
	// 	$s = Project::whereId($project_id)->whereUserId($user_id)->get();
  //
	// 	if(count($s) == 0){
	// 		return false;
	// 	}
  //
	// 	return true;
	// }
  //

	/*******************************
			MAIL FUNCTIONS
	********************************/

	// Send the welcome email to the user
	static function sendWelcomeMail(User $docente) {
		$data = [
				'to' 	=> $docente->email,
				'name' 	=> $docente->primeiro_nome.' '.$docente->ultimo_nome,
		];

		Mail::send('emails.welcome', [ 'name' => $data['name'] ] , function($message) use ($data){
			$message->from(getenv('MAIL_FROM'), getenv('MAIL_FROM_NAME'));
	        $message->to($data['to'], $data['name'] )->subject('Bem vindo ao Sistema de gestao de TCC');
		});
	}

	static function notificar_utilizadores(User $docente, $mensagem) {

		$data = ['to' => $user->email ];

		Mail::send('emails.welcome', ['project_url' => ' ', 'mensagem' => $mensagem] , function($message) use ($data) {
			$message->from(getenv('MAIL_FROM'), getenv('MAIL_FROM_NAME'));
			$message->to($data['to'], '')->subject('Marcação da Defesa');
		});
	}

	/** Sends password changed email **/

	/** Sends account deletion email **/

	// Send project invite email
	static function sendProjectInviteMail($email, $referencia_do_tema, $supervisor) {
		$data = [ 'to' => $email ];

		Mail::send('emails.projectInvite', [ 'project_url' => $supervisor->primeiro_nome.' '.$supervisor->ultimo_nome , 'project_name' => $referencia_do_tema] , function($message) use ($data) {
			$message->from(getenv('MAIL_FROM'), getenv('MAIL_FROM_NAME'));
			$message->to($data['to'], '')->subject('TEMA VALIDADO');
		});
	}

static function enviar_sms_teste($destinatario, $mensagem)
	{
		$apiKey = 'ez4kXuPjt2OCwRMQx41vDrLIH75Fr90U';
		$projectId = 'PJ5688bca48b7fee27';
		$client = new \GuzzleHttp\Client();
		$url = sprintf("https://api.telerivet.com/v1/projects/%s/messages/send", $projectId);


		$response = $client->request('POST', $url, [
			'json' => [
				'to_number' => $destinatario,
				'content' => $mensagem
			],
			'header' => ['Content-Type' => 'application/json'],
			'auth' => ['ez4kXuPjt2OCwRMQx41vDrLIH75Fr90U', null]
		]);
	}
}
