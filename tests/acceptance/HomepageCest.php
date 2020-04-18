<?php 

class HomepageCest
{
    public function homepageHasHomepageText(AcceptanceTester $I)
    {
        // visit website root
        $I->amOnPage('/');

        // we should see 'Home Page' text in a level-1 heading
        $I->see('Home Page', 'h1');
    }

    public function homepageHasWorkingLoginLink(AcceptanceTester $I)
    {
        // visit website root
        $I->amOnPage('/');

        // click link for login
        $I->click('login');

        // should now be on login page URL
        $I->seeCurrentUrlEquals('/index.php?action=login');

        // we should see 'Login' text in a level-1 heading
        $I->see('Login', 'h1');
    }


    public function loginWorksForAdminAdmin(AcceptanceTester $I)
    {
        // visit website root
        $I->amOnPage('/index.php?action=login');

        // we should NOT see confirmation of login user name, and a logout link - before login
        $I->dontSee('You are logged in as: admin');
        $I->dontSeeLink('logout');

        // fill in username and password
        $I->fillField('username', 'admin');
        $I->fillField('password', 'admin');

        // click SUBMIT button
        $I->click('#loginButton');

        // we should see confirmation of login user name, and a logout link
        $I->see('You are logged in as: admin');
        $I->seeLink('logout');
    }


    public function loginWorksForAdminAdminUsingSubmitForm(AcceptanceTester $I)
    {
        // visit website root
        $I->amOnPage('/index.php?action=login');

        // we should NOT see confirmation of login user name, and a logout link - before login
        $I->dontSee('You are logged in as: admin');
        $I->dontSeeLink('logout');

        // fill in username and password and submit
        $I->submitForm('#loginForm', [
            'username' => 'admin',
            'password' => 'admin'
        ]);

        // we should see confirmation of login user name, and a logout link
        $I->see('You are logged in as: admin');
        $I->seeLink('logout');
    }
}
