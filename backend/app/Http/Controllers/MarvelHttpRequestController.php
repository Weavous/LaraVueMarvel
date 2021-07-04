<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response as GuzzleHttpResponse;

use Symfony\Component\HttpFoundation\Response as HttpResponse;

use StdClass;

class MarvelHttpRequestController extends Controller
{
    /** @var string */
    private const DEVELOPER_MARVEL_PRIVATE_KEY = "7f7a65438a78a7146d44e2108df92f6554aff013";

    /** @var string */
    private const DEVELOPER_MARVEL_PUBLIC_KEY = "dfdd1a261e48b2ec32a3172a5193b36f";

    /** @var string */
    private const DEVELOPER_MARVEL_URL = "https://gateway.marvel.com";

    /** @var string */
    private const DEVELOPER_MARVEL_CHARACTERS_URL = "v1/public/characters";

    /**
     * Returns an array of characters.
     * 
     * @param Request $request
     * @param Response $response
     * 
     * @return JsonResponse
     */
    public function characters(Request $request, Response $response): JsonResponse
    {
        $characters = explode(",", $request->characters);

        $response = array_map(function ($character) {
            return $this->getCharacterByName($character);
        }, $characters);

        $filters = array_filter($response, function ($character) {
            return count(get_object_vars($character)) > 0 ? true : false;
        });

        return response()->json($filters);
    }

    /**
     * Returns a story.
     * 
     * @param Request $request
     * @param Response $response
     * 
     * @return JsonResponse
     */
    public function stories(Request $request, Response $response): JsonResponse
    {
        $story = $request->story;

        $response = $this->request($story, []);

        $body = json_decode($response->getBody());

        if ($response->getStatusCode() !== HttpResponse::HTTP_OK || $body->data->count === 0) {
            return new StdClass;
        }

        foreach ($body->data->results as $result) {
            return response()->json($result);
        }
    }

    /**
     * Request for an Marvel character.
     * 
     * @param string $name
     * 
     * @return stdClass
     */
    private function getCharacterByName(string $name): StdClass
    {
        $response = $this->request(
            $this->mountUrl(static::DEVELOPER_MARVEL_CHARACTERS_URL, ["name" => $name])
        );

        $body = json_decode($response->getBody());

        if ($response->getStatusCode() !== HttpResponse::HTTP_OK || $body->data->count === 0) {
            return new StdClass;
        }

        foreach ($body->data->results as $result) {
            return $result;
        }
    }

    private function mountUrl(string $url, array $options)
    {
        $url = static::DEVELOPER_MARVEL_URL . "/" . $url;

        if (!empty($options)) {
            $data = array_map(function ($key, $value) {
                return sprintf("%s=%s", $key, $value);
            }, array_keys($options), array_values($options));

            $params = implode("&", $data);

            $url = $url . "?" . $params;
        }

        return $url;
    }

    /**
     * Request for an external resource.
     * 
     * @param string $url
     */
    private function request(string $url): GuzzleHttpResponse
    {
        $client = new Client();

        return $client->request('GET', $this->withauth($url));
    }

    /**
     * Marvel API url is returned as http, so we fix to https.
     * 
     * @param string $url
     * 
     * @return string 
     */
    private function withauth(string $url): string
    {
        $url = str_replace("http://gateway.marvel.com", "https://gateway.marvel.com", $url);

        if (!preg_match("/.*\?[a-zA-Z]*=[A-Za-z0-9]*/", $url)) {
            $url = $url . "?" . $this->auth();
        } else {
            $url = $url . "&" . $this->auth();
        }

        return $url;
    }

    /**
     * Returns an auth query string.
     * 
     * @param void
     * 
     * @return string
     */
    private function auth(): string
    {
        return sprintf("ts=%s&apikey=%s&hash=%s", time(), static::DEVELOPER_MARVEL_PUBLIC_KEY, $this->hash());
    }

    /**
     * Returns an auth hash.
     * 
     * @param void
     * 
     * @return string
     */
    private function hash(): string
    {
        return md5(time() . static::DEVELOPER_MARVEL_PRIVATE_KEY . static::DEVELOPER_MARVEL_PUBLIC_KEY);
    }
}
