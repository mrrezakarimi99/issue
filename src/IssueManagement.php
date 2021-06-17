<?php


namespace RezaKarimi\ServiceDesk;


use GuzzleHttp\Client;
use RezaKarimi\ServiceDesk\ValueObjects\IssueRequestPayload;

trait IssueManagement
{
    public function createIssue(IssueRequestPayload $payload, $url, $token)
    {
        $client = new Client;
        $response = $client->post($url,[
            'http_errors' => false,
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer '.$token,
            ],
            'body' => json_encode($payload->payloadToArray())
        ]);
        if ($response->getStatusCode() !== 200 ){
            return [
                'status' => $response->getStatusCode(),
                'body' => $response->getBody()->getContents()
            ];
        }
        return [
            'status' => $response->getStatusCode(),
        ];
    }
}
