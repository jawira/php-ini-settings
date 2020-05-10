<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

class FeatureContext implements Context
{
    protected $myInstance;
    protected $result;

    /**
     * @Given /^I have an instance of "([^"]*)"$/
     */
    public function iHaveAnInstanceOfJawiraPhpIniSettingsSettings($myClass)
    {
        $this->myInstance = new $myClass();
    }

    /**
     * @When /^I call "([^"]*)" method with "([^"]*)" param$/
     */
    public function iCallMethodWithParam($methodName, $argumentValue)
    {
        $this->result = $this->myInstance->$methodName($argumentValue);
    }

    /**
     * @Then /^The method must not return false$/
     */
    public function theMethodMustReturnNotEmptyValue()
    {
        if ($this->result === false) {
            throw new LogicException('Invalid return value');
        }
        printf('Returned value is: %s', $this->result);
    }
}