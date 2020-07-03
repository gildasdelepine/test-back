<?php

use App\Controller\FeatureController;
use Behat\Behat\Context\Context;
use Domain\Fleet;
use Domain\Location;
use Domain\Vehicle;
use \PHPUnit\Framework\Assert;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
  private $featureController;
  private $fleet;
  private $vehicle;
  private $fleetOfAnotherUser;
  private $location;

  /**
   * Initializes context.
   *
   * Every scenario gets its own context instance.
   * You can also pass arbitrary arguments to the
   * context constructor through behat.yml.
   */
  public function __construct()
  {
    $this->featureController = new FeatureController();
  }

  /**
   * @Given my fleet
   */
  public function myFleet()
  {
    $this->fleet = new Fleet();
    $this->fleet->setId(1);
  }

  /**
   * @Given a vehicle
   */
  public function aVehicle()
  {
    $this->vehicle = new Vehicle(1);
  }

  /**
   * @When I register this vehicle into my fleet
   */
  public function iRegisterThisVehiculeIntoMyFleet()
  {
    $registered = $this->fleet->addVehicle($this->vehicle->getId());
    if (!$registered) {
      throw new Exception("This vehicle has not been registered into my fleet.");
    }
  }

  /**
   * @Then this vehicle should be part of my vehicle fleet
   */
  public function thisVehiculeShouldBePartOfMyVehiculeFleet()
  {
    if (!$this->fleet->vehicleIsInTheFleet($this->vehicle->getId())) {
      throw new Exception("This vehicle is not registered in my fleet.");
    }
    print_r("This vehicle is registered in my fleet.");
  }

  /**
   * @Given I have registered this vehicle into my fleet
   */
  public function iHaveRegisteredThisVehiculeIntoMyFleet()
  {
    $this->fleet->addVehicle($this->vehicle->getId());
  }

  /**
   * @When I try to register this vehicle into my fleet
   * @throws \Exception
   */
  public function iTryToRegisterThisVehiculeIntoMyFleet() {
    $registered = $this->fleet->addVehicle($this->vehicle->getId());
    if ($registered) {
      throw new Exception("The vehicle has been register twice.");
    }
  }

  /**
   * @Then I should be informed this vehicle has already been registered into my fleet
   */
  public function iShouldBeInformedThisVehicleHasAlreadyBeenRegisteredIntoMyFleet() {
    $this->featureController->inform('This vehicle has already been registered into my fleet');
  }

  /**
   * @Given the fleet of another user
   */
  public function theFleetOfAnotherUser() {
    $this->fleetOfAnotherUser = new Fleet(2);
  }

  /**
   * @Given this vehicle has been registered into the other user's fleet
   */
  public function thisVehicleHasBeenRegisteredIntoTheOtherUserFleet() {
    $this->fleetOfAnotherUser->addVehicle($this->vehicle->getId());
  }

  /**
   * @Given a location
   */
  public function aLocation() {
    $this->location = new Location(1, 'agence');
  }

  /**
   * @When I park my vehicle at this location
   */
  public function iParkMyVehicleAtThisLocation() {
    $parked = $this->location->parkVehicle($this->vehicle->getId());
    if (!$parked) {
      throw new Exception("The vehicle cannot be parked here.");
    }
  }

  /**
   * @Then the known location of my vehicle should verify this location
   */
  public function theKnonwLocationOfMyVehiculeShouldVerifyThisLocation() {
    if($this->location->getVehicleId() != $this->vehicle->getId()) {
      throw new Exception('Your vehicle is lost.');
    }
  }

  /**
   * @Given my vehicle has been parked into this location
   */
  public function myVehicleHasBeenParkedIntoThisLocation() {
    $this->location->parkVehicle($this->vehicle->getId());
  }

  /**
   * @When I try to park my vehicle at this location
   */
  public function iTryToParkMyVehicleAtThisLocation() {
    $parked = $this->location->parkVehicle($this->vehicle->getId());
    if ($parked) {
      throw new Exception("The vehicle is already parked.");
    }
  }

  /**
   * @Then I should be informed that my vehicle is already parked at this location
   */
  public function iShouldBeInformedThatMyVehicleIsAlreadyParkedAtThisLocation() {
    $this->featureController->inform('This vehicle is already parked at this place.');
  }

}
