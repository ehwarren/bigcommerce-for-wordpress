<?php
/**
 * ScriptApi
 * PHP version 5
 *
 * @category Class
 * @package  BigCommerce\Api\v3
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * BigCommerce API
 *
 * A Swagger Document for the BigCommmerce v3 API.
 *
 * OpenAPI spec version: 3.0.0b
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 *
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace BigCommerce\Api\v3\Api;

use \BigCommerce\Api\v3\ApiClient;
use \BigCommerce\Api\v3\ApiException;
use \BigCommerce\Api\v3\Configuration;
use \BigCommerce\Api\v3\ObjectSerializer;

/**
 * ScriptApi Class Doc Comment
 *
 * @category Class
 * @package  BigCommerce\Api\v3
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class ScriptApi
{
    /**
     * API Client
     *
     * @var \BigCommerce\Api\v3\ApiClient instance of the ApiClient
     */
    protected $apiClient;

    /**
     * Constructor
     *
     * @param \BigCommerce\Api\v3\ApiClient|null $apiClient The api client to use
     */
    public function __construct(\BigCommerce\Api\v3\ApiClient $apiClient = null)
    {
        if ($apiClient === null) {
            $apiClient = new ApiClient();
            $apiClient->getConfig()->setHost('https://api.bigcommerce.com/stores/{{store_id}}/v3');
        }

        $this->apiClient = $apiClient;
    }

    /**
     * Get API client
     *
     * @return \BigCommerce\Api\v3\ApiClient get the API client
     */
    public function getApiClient()
    {
        return $this->apiClient;
    }

    /**
     * Set the API client
     *
     * @param \BigCommerce\Api\v3\ApiClient $apiClient set the API client
     *
     * @return ScriptApi
     */
    public function setApiClient(\BigCommerce\Api\v3\ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
        return $this;
    }

    /**
     * Operation createScript
     *
     * Creates a script.
     *
     * @param \BigCommerce\Api\v3\Model\ScriptPost $script_body  (required)
     * @throws \BigCommerce\Api\v3\ApiException on non-2xx response
     * @return \BigCommerce\Api\v3\Model\ScriptResponse
     */
    public function createScript($script_body)
    {
        list($response) = $this->createScriptWithHttpInfo($script_body);
        return $response;
    }

    /**
     * Operation createScriptWithHttpInfo
     *
     * Creates a script.
     *
     * @param \BigCommerce\Api\v3\Model\ScriptPost $script_body  (required)
     * @throws \BigCommerce\Api\v3\ApiException on non-2xx response
     * @return array of \BigCommerce\Api\v3\Model\ScriptResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function createScriptWithHttpInfo($script_body)
    {
        // verify the required parameter 'script_body' is set
        if ($script_body === null) {
            throw new \InvalidArgumentException('Missing the required parameter $script_body when calling createScript');
        }
        // parse inputs
        $resourcePath = "/content/scripts";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json']);

        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        // body params
        $_tempBody = null;
        if (isset($script_body)) {
            $_tempBody = $script_body;
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'POST',
                $queryParams,
                $httpBody,
                $headerParams,
                '\BigCommerce\Api\v3\Model\ScriptResponse',
                '/content/scripts'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\BigCommerce\Api\v3\Model\ScriptResponse', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\BigCommerce\Api\v3\Model\ScriptResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 422:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\BigCommerce\Api\v3\Model\ErrorResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation deleteScript
     *
     * Deletes a script.
     *
     * @param string $uuid The identifier for a specific script. (required)
     * @throws \BigCommerce\Api\v3\ApiException on non-2xx response
     * @return void
     */
    public function deleteScript($uuid)
    {
        list($response) = $this->deleteScriptWithHttpInfo($uuid);
        return $response;
    }

    /**
     * Operation deleteScriptWithHttpInfo
     *
     * Deletes a script.
     *
     * @param string $uuid The identifier for a specific script. (required)
     * @throws \BigCommerce\Api\v3\ApiException on non-2xx response
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteScriptWithHttpInfo($uuid)
    {
        // verify the required parameter 'uuid' is set
        if ($uuid === null) {
            throw new \InvalidArgumentException('Missing the required parameter $uuid when calling deleteScript');
        }
        // parse inputs
        $resourcePath = "/content/scripts/{uuid}";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json']);

        // path params
        if ($uuid !== null) {
            $resourcePath = str_replace(
                "{" . "uuid" . "}",
                $this->apiClient->getSerializer()->toPathValue($uuid),
                $resourcePath
            );
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'DELETE',
                $queryParams,
                $httpBody,
                $headerParams,
                null,
                '/content/scripts/{uuid}'
            );

            return [null, $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 404:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\BigCommerce\Api\v3\Model\ErrorResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 422:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\BigCommerce\Api\v3\Model\ErrorResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation getScript
     *
     * Gets a script.
     *
     * @param string $uuid The identifier for a specific script. (required)
     * @throws \BigCommerce\Api\v3\ApiException on non-2xx response
     * @return \BigCommerce\Api\v3\Model\ScriptResponse
     */
    public function getScript($uuid)
    {
        list($response) = $this->getScriptWithHttpInfo($uuid);
        return $response;
    }

    /**
     * Operation getScriptWithHttpInfo
     *
     * Gets a script.
     *
     * @param string $uuid The identifier for a specific script. (required)
     * @throws \BigCommerce\Api\v3\ApiException on non-2xx response
     * @return array of \BigCommerce\Api\v3\Model\ScriptResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getScriptWithHttpInfo($uuid)
    {
        // verify the required parameter 'uuid' is set
        if ($uuid === null) {
            throw new \InvalidArgumentException('Missing the required parameter $uuid when calling getScript');
        }
        // parse inputs
        $resourcePath = "/content/scripts/{uuid}";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json']);

        // path params
        if ($uuid !== null) {
            $resourcePath = str_replace(
                "{" . "uuid" . "}",
                $this->apiClient->getSerializer()->toPathValue($uuid),
                $resourcePath
            );
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'GET',
                $queryParams,
                $httpBody,
                $headerParams,
                '\BigCommerce\Api\v3\Model\ScriptResponse',
                '/content/scripts/{uuid}'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\BigCommerce\Api\v3\Model\ScriptResponse', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\BigCommerce\Api\v3\Model\ScriptResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\BigCommerce\Api\v3\Model\ErrorResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 422:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\BigCommerce\Api\v3\Model\ErrorResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation getScripts
     *
     * Gets all scripts.
     *
     * @param int $page Specifies the page number in a limited (paginated) list of products. (optional)
     * @param int $limit Controls the number of items per page in a limited (paginated) list of products. (optional)
     * @param string $sort Scripts field name to sort by. (optional)
     * @param string $direction Sort direction. Acceptable values are: &#x60;asc&#x60;, &#x60;desc&#x60;. (optional)
     * @throws \BigCommerce\Api\v3\ApiException on non-2xx response
     * @return \BigCommerce\Api\v3\Model\ScriptsResponse
     */
    public function getScripts($page = null, $limit = null, $sort = null, $direction = null)
    {
        list($response) = $this->getScriptsWithHttpInfo($page, $limit, $sort, $direction);
        return $response;
    }

    /**
     * Operation getScriptsWithHttpInfo
     *
     * Gets all scripts.
     *
     * @param int $page Specifies the page number in a limited (paginated) list of products. (optional)
     * @param int $limit Controls the number of items per page in a limited (paginated) list of products. (optional)
     * @param string $sort Scripts field name to sort by. (optional)
     * @param string $direction Sort direction. Acceptable values are: &#x60;asc&#x60;, &#x60;desc&#x60;. (optional)
     * @throws \BigCommerce\Api\v3\ApiException on non-2xx response
     * @return array of \BigCommerce\Api\v3\Model\ScriptsResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getScriptsWithHttpInfo($page = null, $limit = null, $sort = null, $direction = null)
    {
        // parse inputs
        $resourcePath = "/content/scripts";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json']);

        // query params
        if ($page !== null) {
            $queryParams['page'] = $this->apiClient->getSerializer()->toQueryValue($page);
        }
        // query params
        if ($limit !== null) {
            $queryParams['limit'] = $this->apiClient->getSerializer()->toQueryValue($limit);
        }
        // query params
        if ($sort !== null) {
            $queryParams['sort'] = $this->apiClient->getSerializer()->toQueryValue($sort);
        }
        // query params
        if ($direction !== null) {
            $queryParams['direction'] = $this->apiClient->getSerializer()->toQueryValue($direction);
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        
        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'GET',
                $queryParams,
                $httpBody,
                $headerParams,
                '\BigCommerce\Api\v3\Model\ScriptsResponse',
                '/content/scripts'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\BigCommerce\Api\v3\Model\ScriptsResponse', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\BigCommerce\Api\v3\Model\ScriptsResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 422:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\BigCommerce\Api\v3\Model\ErrorResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }

    /**
     * Operation updateScript
     *
     * Updates a script.
     *
     * @param string $uuid The identifier for a specific script. (required)
     * @param \BigCommerce\Api\v3\Model\ScriptPut $script_body  (required)
     * @throws \BigCommerce\Api\v3\ApiException on non-2xx response
     * @return \BigCommerce\Api\v3\Model\ScriptResponse
     */
    public function updateScript($uuid, $script_body)
    {
        list($response) = $this->updateScriptWithHttpInfo($uuid, $script_body);
        return $response;
    }

    /**
     * Operation updateScriptWithHttpInfo
     *
     * Updates a script.
     *
     * @param string $uuid The identifier for a specific script. (required)
     * @param \BigCommerce\Api\v3\Model\ScriptPut $script_body  (required)
     * @throws \BigCommerce\Api\v3\ApiException on non-2xx response
     * @return array of \BigCommerce\Api\v3\Model\ScriptResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function updateScriptWithHttpInfo($uuid, $script_body)
    {
        // verify the required parameter 'uuid' is set
        if ($uuid === null) {
            throw new \InvalidArgumentException('Missing the required parameter $uuid when calling updateScript');
        }
        // verify the required parameter 'script_body' is set
        if ($script_body === null) {
            throw new \InvalidArgumentException('Missing the required parameter $script_body when calling updateScript');
        }
        // parse inputs
        $resourcePath = "/content/scripts/{uuid}";
        $httpBody = '';
        $queryParams = [];
        $headerParams = [];
        $formParams = [];
        $_header_accept = $this->apiClient->selectHeaderAccept(['application/json']);
        if (!is_null($_header_accept)) {
            $headerParams['Accept'] = $_header_accept;
        }
        $headerParams['Content-Type'] = $this->apiClient->selectHeaderContentType(['application/json']);

        // path params
        if ($uuid !== null) {
            $resourcePath = str_replace(
                "{" . "uuid" . "}",
                $this->apiClient->getSerializer()->toPathValue($uuid),
                $resourcePath
            );
        }
        // default format to json
        $resourcePath = str_replace("{format}", "json", $resourcePath);

        // body params
        $_tempBody = null;
        if (isset($script_body)) {
            $_tempBody = $script_body;
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            $httpBody = $_tempBody; // $_tempBody is the method argument, if present
        } elseif (count($formParams) > 0) {
            $httpBody = $formParams; // for HTTP post (form)
        }
        // make the API Call
        try {
            list($response, $statusCode, $httpHeader) = $this->apiClient->callApi(
                $resourcePath,
                'PUT',
                $queryParams,
                $httpBody,
                $headerParams,
                '\BigCommerce\Api\v3\Model\ScriptResponse',
                '/content/scripts/{uuid}'
            );

            return [$this->apiClient->getSerializer()->deserialize($response, '\BigCommerce\Api\v3\Model\ScriptResponse', $httpHeader), $statusCode, $httpHeader];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\BigCommerce\Api\v3\Model\ScriptResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\BigCommerce\Api\v3\Model\ErrorResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
                case 422:
                    $data = $this->apiClient->getSerializer()->deserialize($e->getResponseBody(), '\BigCommerce\Api\v3\Model\ErrorResponse', $e->getResponseHeaders());
                    $e->setResponseObject($data);
                    break;
            }

            throw $e;
        }
    }
}