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
     * Version.
     */
    public const VERSION = 2;
    
    /**
     * Base href
     */
    public const BASE_HREF = 'https://api.innosend.eu';
    
    /**
     * Methods.
     */
    public const METHOD_GET = 'GET';
    public const METHOD_POST = 'POST';
    public const METHOD_PATCH = 'PATCH';
    public const METHOD_DELETE = 'DELETE';
    
    /**
     * @var string
     */
    private $token;
    
    /**
     * @var int
     */
    private $version;
    
    /**
     * @param string $token
     * @param int $version = self::VERSION
     */
    public function __construct(string $token, int $version = self::VERSION)
    {
        $this->token = $token;
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
     * @param string $endpoint
     * @param array $data = []
     * 
     * @return array
     */
    public function patch(string $endpoint, array $data = []): array
    {
        return $this->request(self::METHOD_PATCH, $endpoint, $data);
    }
    
    /**
     * @param string $endpoint
     * 
     * @return array
     */
    public function delete(string $endpoint): array
    {
        return $this->request(self::METHOD_DELETE, $endpoint);
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
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Authorization' => "Bearer {$this->token}",
            ],
            RequestOptions::JSON => $data,
            RequestOptions::QUERY => $query,
        ];
        
        // get url
        $url = $this->getUrl($endpoint);
        
        // make request
        $response = (new GuzzleCLient())->request($method, $url, $options);
        
        // get contents
        $contents = $response->getBody()->getContents();
        
        // encode / decode content
        $result = [];
        if (str_starts_with($response->getHeaderLine('Content-Type'), 'application/json')) {
            
            // decode json
            $result = json_decode($contents, true);
            
        } elseif (str_starts_with($response->getHeaderLine('Content-Type'), 'application/octet-stream')) {
            
            $result = [
                'data' => base64_encode($contents)
            ];
        }
        
        return $result;
    }
}
