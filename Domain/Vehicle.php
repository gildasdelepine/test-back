<?php

namespace Domain;

/**
 * Class Vehicle.
 *
 * @package Domain
 */
class Vehicle {

  /**
   * Vehicle Identifier.
   *
   * @var int
   */
  private $id;

  /**
   * Vehicle type.
   *
   * @var string
   */
  private $type;

  /**
   * Fleets constructor.
   *
   * @param int $id
   *   The vehicle Identifier.
   * @param string|null $type
   *   The vehicle type.
   */
  public function __construct($id, $type = NULL) {
    $this->id = $id;
    $this->type = $type;
  }

  /**
   * Getter for Vehicle Id.
   *
   * @return mixed
   */
  public function getId() {
    return $this->id;
  }

  /**
   * Getter for Vehicle type.
   *
   * @return mixed
   */
  public function getType() {
    return $this->type;
  }

  /**
   * Setter for Vehicle Id.
   *
   * @param $id
   */
  public function setId($id) {
    $this->id = $id;
  }

  /**
   * Setter for Vehicle type.
   *
   * @param $type
   */
  public function setType($type) {
    $this->type = $type;
  }
}