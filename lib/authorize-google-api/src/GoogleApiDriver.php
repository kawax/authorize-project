<?php

namespace Revolution\Authorize\GoogleApi;

use Revolution\Authorize\Drivers\AbstractDriver;
use Google_Client;

class GoogleApiDriver extends AbstractDriver
{
    /**
     * @var Google_Client
     */
    private $client;

    /**
     * https://github.com/google/google-api-php-client/blob/master/src/Google/Client.php
     *
     * @param mixed $credentials
     *
     * @return bool
     */
    public function login($credentials = null): bool
    {
        $this->client = new Google_Client($credentials);

        return true;
    }

    /**
     * Client.
     *
     * @return mixed
     */
    public function client()
    {
        return $this->client;
    }
}
