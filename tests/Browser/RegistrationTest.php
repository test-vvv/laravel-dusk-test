<?php

namespace Tests\Browser;

use Ramsey\Uuid\Uuid;
use Tests\Browser\Pages\EditorPage;
use Tests\Browser\Pages\HomePage;
use Tests\Browser\Pages\ProductsPage;
use Tests\Browser\Pages\questionsPage;
use Tests\Browser\Pages\RegistrationPage;
use Tests\Browser\Pages\WelcomeBoardPage;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class RegistrationTest extends DuskTestCase
{
    /**
     * A test that checks new user activities from registration
     * to making connection with a store provider
     *
     * @return void
     *
     * @throws \Throwable
     */
    public function testNewUserWholeCycle()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new HomePage())
                    ->clickSignUpButton();

            $browser->on(new RegistrationPage())
                    ->enterRandomEmail()
                    ->enterPassword("Aa123123")
                    // re-captcha needs to be turned off
                    ->clickSignUpButton();

            $browser->on(new questionsPage())
                    ->selectAnswerForFirstQuestion('Content creator')
                    ->selectAnswerForSecondQuestion('I am just playing around')
                    ->clickNextButton();

            $browser->on(new WelcomeBoardPage())
                    ->click('@storeNameLink')
                    ->type('@brand', Uuid::uuid4())
                    ->click('@submit')
                    ->click('@personalDetailsLink')
                    ->type('@legalName','John')
                    ->type('@fullname','Dow')
                    ->type('@phone',25562556)
                    ->select('country', 'LV')
                    ->type('@address1','Good street 333')
                    ->type('@city','Riga')
                    ->type('@zip','LV1013')
                    ->click('@submit')
                    ->click('@designProductLink');

            $browser->on(new ProductsPage())
                    ->chooseProductByName("Men's Cotton Crew Tee")
                    ->scrollTo("button start-designing")
                    ->click('[href="/app/editor/5/3"]');

            $browser->on(new EditorPage())
                    ->click('@getDesigns')
                    ->waitFor('@firstDesign')
                    ->click('@firstDesign')
                    ->click('@submit')
                    // Mockups
                    ->scrollTo('save')
                    ->click('.save')
                    // Description
                    ->click('.save')
                    // Variant Details
                    ->scrollTo('save')
                    ->click('.save')
                    // Store details
                    ->click('$create-product-save');

            $browser->on(new WelcomeBoardPage())
                    ->click('@connectStoreLink')
                    ->click('@connectButton')
                    ->type('@url', "test.myshopify.com")
                    ->click('@submit');
            // re-captcha stops us here
        });
    }
}
