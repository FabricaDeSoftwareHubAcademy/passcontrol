<?php
header('Content-Type: application/json');
$dadosMensagem = file_get_contents("php://input");
$dados = json_decode($dadosMensagem, true);

$env = parse_ini_file('../../.env');
$token_zenvia = $env['ZENVIA_TOKEN'];
$user_zenvia = $env['ZENVIA_USER'];
$url_zenvia = $env['ZENVIA_URL'] . '/channels/sms/messages';
$body = [
    'from' => $user_zenvia,
    'to'=> '55'.$dados['tel'],
    'contents' => [
        [
            'type'=> 'text',
            'text' => $dados['mensagem']
        ]
    ]
];
 
$request = curl_init();
 
curl_setopt_array($request, [
    CURLOPT_URL => $url_zenvia,
    CURLOPT_POST => TRUE,
    CURLOPT_RETURNTRANSFER => TRUE,
    CURLOPT_HTTPHEADER => [
        'Content-Type: application/json',
        'Accept: application/json',
        'X-API-TOKEN:'. $token_zenvia
    ],
    CURLOPT_POSTFIELDS => json_encode($body, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
    CURLOPT_TIMEOUT => 20
]);
 
$response = curl_exec($request);
 
echo $response;