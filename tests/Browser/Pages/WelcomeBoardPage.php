<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;

class WelcomeBoardPage extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/app/welcome';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->assertPathIs($this->url());
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@element'             => '#selector',
            '@storeNameLink'       => '[href="/app/store/settings/name"]',
            '@personalDetailsLink' => '[href="/app/account/details"]',
            '@designProductLink'   => '[href="/app/products"]',
            '@connectStoreLink'    => '[href="/app/account/my-stores"]',
            '@brand'               => '[name="brand"]',
            '@legalName'           => '[name="legal_name"]',
            '@fullname'            => '[name="fullname"]',
            '@phone'               => '[name="phone"]',
            '@address1'            => '[name="address1"]',
            '@city'                => '[name="city"]',
            '@zip'                 => '[name="zip"]',
            '@connectButton'       => '.secondary.connect',
            '@connectShopify'      => '[data-index="0"]',
            '@url'                 => '[name="url"]',
        ];
    }
}
