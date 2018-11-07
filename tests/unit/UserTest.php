<?php

class UserTest extends \PHPUnit\Framework\TestCase
{
    protected $user;

    public function setUp()
    {
        $this->user = new \App\Models\User;
    }

    public function testThatWeCanGetTheFirstName()
    {
        $this->user->setFirstName('Billy');

        $this->assertEquals($this->user->getFirstName(), 'Billy');

    }

    public function testThatWeCanGetTheLastName()
    {
        $this->user->setLastName('Billy');

        $this->assertEquals($this->user->getLastName(), 'Billy');

    }

    public function testFullNameIsReturned()
    {
        $this->user->setFirstName("Billy");
        $this->user->setLastName("Gareth");

        $this->assertEquals($this->user->getFullName(), "Billy Gareth");

    }

    public function testFirstAndLastNameAreTrimmed()
    {
        $this->user->setFirstName("      Billy");
        $this->user->setLastName("        Gareth        ");

        $this->assertEquals($this->user->getFirstName(), 'Billy');
        $this->assertEquals($this->user->getlastName(), 'Gareth');
    }

    public function testEmailAddressCanBeSet()
    {
        $this->user->setEmail("billy@codecourse.com");

        $this->assertEquals($this->user->getEmail(), "billy@codecourse.com");
    }

    public function testEmailVariableContainsCorrectValues()
    {
        $this->user->setFirstName("Billy");
        $this->user->setLastName("Gareth");
        $this->user->setEmail("billy@codecourse.com");

        $emailVariables = $this->user->getEmailVariables();

        $this->assertArrayHasKey('full_name', $emailVariables);
        $this->assertArrayHasKey('email', $emailVariables);

        $this->assertEquals($emailVariables['full_name'], "Billy Gareth");
        $this->assertEquals($emailVariables['email'], "billy@codecourse.com");


    }












}