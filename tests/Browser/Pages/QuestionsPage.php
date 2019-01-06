<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;

class questionsPage extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/app/questions';
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
            '@element' => '#selector',
        ];
    }

    /**
     * @param Browser $browser
     * @param String $answer
     *
     * @return void
     */
    public function selectAnswerForFirstQuestion(Browser $browser, String $answer)
    {
        $this->selectAnswer($browser, 0, $answer);

    }

    /**
     * @param Browser $browser
     * @param String $answer
     *
     * @return void
     */
    public function selectAnswerForSecondQuestion(Browser $browser, String $answer)
    {
        $this->selectAnswer($browser, 1, $answer);
    }

    /**
     * @param Browser $browser
     * @param int $question
     * @param String $answer
     *
     * @return void
     */
    private function selectAnswer(Browser $browser, int $question, String $answer)
    {
        $browser->click("#q{$question} .name")
            ->click("data-value='{$answer}'");
    }

    /**
     * @param Browser $browser
     *
     * @return void
     *
     * @throws \Facebook\WebDriver\Exception\TimeOutException
     */
    public function clickNextButton(Browser $browser)
    {
        $browser->click('@submit')
            ->waitForLocation('/app/welcome');
    }
}
