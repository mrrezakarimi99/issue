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
                'Authorization' => $token,
            ],
            'body' => json_encode($payload)
        ]);
        if ($response->getStatusCode() !== 200 ){
            return false;
        }
        return true;
    }
}
