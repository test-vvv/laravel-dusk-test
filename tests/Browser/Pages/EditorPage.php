<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;

class EditorPage extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/app/editor/';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->assertPathBeginsWith($this->url());
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
            '@getDesigns' => '.design-assets a',
            '@firstDesign' => '.grid.uploaded-files>div:nth-child(1)',
        ];
    }
}
