<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;

class RegistrationPage extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/app/register';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->assertPathIs($this->url())
                ->assertSee('Sign up and start earning for FREE');
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
            '@email' => '[name="email"]',
            '@password' => '[name="password"]',
            '@submit' => 'button.save',
        ];
    }

    /**
     * @param Browser $browser
     * @param string $email
     *
     * @return void
     */
    public function enterEmail(Browser $browser, string $email)
    {
        $browser->type("@email", $email);
    }

    /**
     * @param Browser $browser
     *
     * @return void
     */
    public function enterRandomEmail(Browser $browser)
    {
        $browser->type("@email", "test" . rand() . "@gmail.com");
    }

    /**
     * @param Browser $browser
     * @param string $password
     *
     * @return void
     */
    public function enterPassword(Browser $browser, string $password)
    {
        $browser->type("@password", $password);
    }

    /**
     * @param Browser $browser
     *
     * @return void
     *
     * @throws \Facebook\WebDriver\Exception\TimeOutException
     */
    public function clickSignUpButton(Browser $browser)
    {
        $browser->click('@submit')
                ->waitForLocation('/app/questions');
    }
}
