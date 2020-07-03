<?php

namespace Domain;

/**
 * Class Location.
 *
 * @package Domain
 */
class Location {

  /**
   * Location Identifier.
   *
   * @var int
   */
  private $id;

  /**
   * Location name.
   *
   * @var string
   */
  private $localization;

  /**
   * Vehicle park in the location.
   *
   * @var int
   */
  private $vehicleId;

  /**
   * Location constructor.
   *
   * @param $id
   *   The location Id.
   * @param null $localization
   *   The Location placement.
   * @param null $vehicleId
   *   The vehicle parked on the square.
   */
  public function __construct($id, $localization = NULL, $vehicleId = NULL) {
    $this->id = $id;
    $this->localization = $localization;
    $this->vehicleId = $vehicleId;
  }

  /**
   * Getter for Location Id.
   *
   * @return int
   */
  public function getId() {
    return $this->id;
  }

  /**
   * Getter for Localization.
   *
   * @return string
   */
  public function getLocalization() {
    return $this->localization;
  }

  /**
   * Getter for VehicleId.
   *
   * @return int
   */
  public function getVehicleId() {
    return $this->vehicleId;
  }

  /**
   * Setter for Location Id.
   *
   * @param $id
   */
  public function setId($id) {
    $this->id = $id;
  }

  /**
   * Setter for Localization.
   *
   * @param string $localization
   */
  public function setLocalization($localization) {
    $this->localization = $localization;
  }

  /**
   * Setter for VehicleId.
   *
   * @param $vehicleId
   */
  public function setVehicleId($vehicleId) {
    $this->vehicleId = $vehicleId;
  }

  /**
   * Method to check if location is free.
   *
   * @return bool
   *   TRUE is the location is free.
   */
  public function hasVehicleParked() {
    return !empty($this->vehicleId);
  }

  /**
   * @param $vehicleId
   *   The vehicle Id to park.
   *
   * @return bool
   *   TRUE if the vehicle has been parked, FALSE otherwise.
   */
  public function parkVehicle($vehicleId) {
    if ($this->hasVehicleParked()) {
      return FALSE;
    }
    $this->vehicleId = $vehicleId;
    return TRUE;
  }
}