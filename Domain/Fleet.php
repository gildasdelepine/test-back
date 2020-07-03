<?php

namespace Domain;

/**
 * Class Fleet.
 *
 * @package Domain
 */
class Fleet {

  /**
   * The fleet identifier.
   *
   * @var int
   */
  private $id;

  /**
   * The fleet vehicles.
   *
   * @var array
   */
  private $vehiclesList;

  /**
   * Fleets constructor.
   *
   * @param null $id
   *   The Fleet identifier.
   */
  public function __construct($id = NULL) {
    $this->id = $id;
    $this->vehiclesList = [];
  }

  /**
   * Getter of Fleet Id.
   *
   * @return int
   */
  public function getId() {
    return $this->id;
  }

  /**
   * Setter of Fleet Id.
   *
   * @param $id
   */
  public function setId($id) {
    $this->id = $id;
  }

  /**
   * Method to add vehicle in the fleet.
   *
   * @param $vehicleId
   *   The vehicle Id to insert into the fleet.
   *
   * @return bool
   *   TRUE if vehicle has been add the the fleet, FALSE otherwise.
   */
  public function addVehicle($vehicleId) {
    if ($this->vehicleIsInTheFleet($vehicleId)) {
      print_r( "This vehicle has already been registered in this fleet.");
      return FALSE;
    }
    array_push($this->vehiclesList, $vehicleId);
    return TRUE;
  }

  /**
   * Method to check if a vehicle is belongs to the current Fleet.
   *
   * @param $vehicleId
   *   The vehicle Id.
   *
   * @return bool
   *   TRUE is vehicle is belongs to the fleet, FALSE otherwise.
   */
  public function vehicleIsInTheFleet($vehicleId) {
    return in_array($vehicleId, $this->vehiclesList);
  }

}