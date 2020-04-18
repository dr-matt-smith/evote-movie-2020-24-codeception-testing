<?php 

class CreateMovieCest
{
    public function _before(AcceptanceTester $I)
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

    public function createMovieAndSeeInList(AcceptanceTester $I)
    {
        // visit movie list page
        $movieListURL = 'index.php?action=list';
        $I->amOnPage($movieListURL);

        // before insert we should NOT see Endgame movie in list
        $I->dontSee('Avengers Endgame');

        $I->click('CREATE a new movie');

        // fill in username and password and submit
        $I->submitForm('#newMovieForm', [
            'title' => 'Avengers Endgame',
            'category' => 'scifi',
            'price' => 9.99
        ]);

        // we should now see Endgame movie in list
        $I->see('Avengers Endgame');
    }
}
