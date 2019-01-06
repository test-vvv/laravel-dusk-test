<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;

class ProductsPage extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/app/products';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  Browser  $browser
     *
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
            '@element' => '#selector',
        ];
    }

    /**
     * @param Browser $browser
     * @param String $name
     *
     * @return void
     */
    public function chooseProductByName(Browser $browser, String $name)
    {
        $browser->click("[alt='{$name}]");
    }

}
