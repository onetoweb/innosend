<?php

namespace Onetoweb\Innosend;

use Onetoweb\Innosend\Endpoint\Endpoints;
use GuzzleHttp\RequestOptions;
use GuzzleHttp\Client as GuzzleCLient;

/**
 * Innosend Api Client.
 */
#[\AllowDynamicProperties]
class Client
{
    /**
     * Base href
     */
    public const BASE_HREF = 'https://api.innosend.eu';
    
    /**
     * Methods.
     */
    public const METHOD_GET = 'GET';
    public const METHOD_POST = 'POST';
    
    /**
     * @var string
     */
    private $apiKey;
    
    /**
     * @var string
     */
    private $apiSecret;
    
    /**
     * @var int
     */
    private $version;
    
    /**
     * @param string $apiKey
     * @param string $apiSecret
     */
    public function __construct(string $apiKey, string $apiSecret, int $version = 2)
    {
        $this->apiKey = $apiKey;
        $this->apiSecret = $apiSecret;
        $this->version = $version;
        
        // load endpoints
        $this->loadEndpoints();
    }
    
    /**
     * @return void
     */
    private function loadEndpoints(): void
    {
        foreach (Endpoints::list() as $name => $class) {
            $this->{$name} = new $class($this);
        }
    }
    
    /**
     * @return string
     */
    public function getBaseHref(): string
    {
        return self::BASE_HREF . "/api/v{$this->version}";
    }
    
    /**
     * @param string $endpoint
     * 
     * @return string
     */
    public function getUrl(string $endpoint): string
    {
        return $this->getBaseHref() . '/' . ltrim($endpoint, '/');
    }
    
    /**
     * @param string $endpoint
     * @param array $query = []
     * 
     * @return array
     */
    public function get(string $endpoint, array $query = []): array
    {
        return $this->request(self::METHOD_GET, $endpoint, [], $query);
    }
    
    /**
     * @param string $endpoint
     * @param array $data = []
     * 
     * @return array
     */
    public function post(string $endpoint, array $data = []): array
    {
        return $this->request(self::METHOD_POST, $endpoint, $data);
    }
    
    /**
     * @param string $method
     * @param string $endpoint
     * @param array $data = []
     * @param array $query = []
     * 
     * @return array
     */
    public function request(string $method, string $endpoint, array $data = [], array $query = []): array
    {
        // build options
        $options = [
            RequestOptions::HTTP_ERRORS => false,
            RequestOptions::HEADERS => [
                'accept' => 'application/json',
                'content-type' => 'application/json',
            ],
            RequestOptions::AUTH => [
                $this->apiKey,
                $this->apiSecret
            ],
            RequestOptions::JSON => $data,
            RequestOptions::QUERY => $query,
        ];
        
        // make request
        $response = (new GuzzleCLient())->request($method, $this->getUrl($endpoint), $options);
        
        // get contents
        $contents = $response->getBody()->getContents();
        
        // decode json
        $json = json_decode($contents, true);
        
        return $json;
    }
}
