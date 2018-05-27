<?php

namespace App\Authorize;

use Revolution\Authorize\Drivers\AbstractDriver;

use HeadlessChromium\BrowserFactory;

use Goutte\Client;

class AmazonWebJpDriver extends AbstractDriver
{
    /**
     * @var Client
     */
    private $client;

    /**
     * DefaultDriver constructor.
     */
    public function __construct()
    {
        $this->client = new Client(['cookies' => true]);
    }

    /**
     * Login.
     *
     * @param mixed $credentials
     *
     * @return bool
     */
    public function login($credentials = null): bool
    {
        $url = 'https://www.amazon.co.jp/ap/signin?_encoding=UTF8&ignoreAuthState=1&openid.assoc_handle=jpflex&openid.claimed_id=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0%2Fidentifier_select&openid.identity=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0%2Fidentifier_select&openid.mode=checkid_setup&openid.ns=http%3A%2F%2Fspecs.openid.net%2Fauth%2F2.0&openid.ns.pape=http%3A%2F%2Fspecs.openid.net%2Fextensions%2Fpape%2F1.0&openid.pape.max_auth_age=0&openid.return_to=https%3A%2F%2Fwww.amazon.co.jp%2F%3Fref_%3Dnav_signin&switch_account=';

        $browserFactory = new BrowserFactory(data_get($credentials, 'chrome_path'));

        dump($browserFactory->getChromeVersion());
        $browser = $browserFactory->createBrowser();

        $page = $browser->createPage();

        $page->navigate($url)->waitForNavigation();

        $pageTitle = $page->evaluate('document.title')->getReturnValue();
        dump($pageTitle);

        //headless chromeでログインできそうだったけど二要素認証は無理なので自分のアカウントでは不可能。保留。

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
