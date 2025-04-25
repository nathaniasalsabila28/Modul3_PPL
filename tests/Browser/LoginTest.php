<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testLogin(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
            ->assertSee('Modul 3') //melihat tulisan modul 3
            ->clickLink('Log in') //menekan tautan register
            ->assertPathIs('/login') //memastikan pathnya /login
            ->type('email','admin@gmail.com') // mengisi input email
            ->type('password','123456') // mengisi input password;
            ->press('LOG IN') //menekan button login
            ->assertPathIs('‘/dashboard’'); //memastikan url mengarah ke dashboard
        });
    }
}
