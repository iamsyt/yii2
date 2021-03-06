<?php
$I = new WebGuy($scenario);
$I->wantTo('ensure that login works');
$I->amOnPage('?r=site/login');
$I->see('Login', 'h1');

$I->submitForm('#login-form', array());
$I->dontSee('Logout (admin)');
$I->see('Username cannot be blank');
$I->see('Password cannot be blank');

$I->submitForm('#login-form', array(
	'LoginForm[username]' => 'admin',
	'LoginForm[password]' => 'wrong',
));
$I->dontSee('Logout (admin)');
$I->see('Incorrect username or password');

$I->submitForm('#login-form', array(
	'LoginForm[username]' => 'admin',
	'LoginForm[password]' => 'admin',
));
$I->see('Logout (admin)');
