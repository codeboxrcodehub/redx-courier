<?php

namespace Codeboxr\RedxCourier\Apis;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\ClientException;
use Codeboxr\RedxCourier\Exceptions\RedxException;

class BaseApi
{
    /**
     * @var string
     */
    private $baseUrl;

    /**
     * @var Client
     */
    private $request;

    /**
     * @var array
     */
    private $headers;

    public function __construct()
    {
        $this->setBaseUrl();
        $this->setHeaders();
        $this->request = new Client([
            'base_uri' => $this->baseUrl,
            'headers'  => $this->headers
        ]);
    }

    /**
     * Set Base Url on sandbox mode
     */
    private function setBaseUrl()
    {
        if (config("pathao.sandbox") == true) {
            $this->baseUrl = "https://sandbox.redx.com.bd";
        } else {
            $this->baseUrl = "https://openapi.redx.com.bd";
        }
    }

    /**
     * Set Default Headers
     */
    private function setHeaders()
    {
        $this->headers = [
            "Accept"       => "application/json",
            "Content-Type" => "application/json",
        ];
    }

    /**
     * Merge Headers
     *
     * @param array $header
     */
    private function mergeHeader($header)
    {
        $this->headers = array_merge($this->headers, $header);
    }

    /**
     * Authorization set to header
     *
     * @return $this
     */
    public function authorization()
    {
        $this->mergeHeader([
            'API-ACCESS-TOKEN' => "Bearer " . config("redx.access_token")
        ]);

        return $this;
    }

    /**
     * Sending Request
     *
     * @param string $method
     * @param string $uri
     * @param array $body
     *
     * @return mixed
     * @throws GuzzleException
     * @throws RedxException
     */
    public function send($method, $uri, $body = [])
    {
        try {
            $response = $this->request->request($method, $uri, [
                "headers" => $this->headers,
                "body"    => json_encode($body)
            ]);
            return json_decode($response->getBody());
        } catch (ClientException $e) {
            $response = json_decode($e->getResponse()->getBody()->getContents());
            $message  = $response->message;
            $errors   = isset($response->errors) ? $response->errors : [];
            throw new RedxException($message, $e->getCode(), $errors);
        }
    }

}
