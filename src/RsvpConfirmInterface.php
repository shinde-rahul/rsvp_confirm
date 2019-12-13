<?php

namespace Drupal\rsvp_confirm;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\user\EntityOwnerInterface;
use Drupal\Core\Entity\EntityChangedInterface;

/**
 * Provides an interface defining a rsvp confirm entity type.
 */
interface RsvpConfirmInterface extends ContentEntityInterface, EntityOwnerInterface, EntityChangedInterface {

  /**
   * Gets the rsvp confirm creation timestamp.
   *
   * @return int
   *   Creation timestamp of the rsvp confirm.
   */
  public function getCreatedTime();

  /**
   * Sets the rsvp confirm creation timestamp.
   *
   * @param int $timestamp
   *   The rsvp confirm creation timestamp.
   *
   * @return \Drupal\rsvp_confirm\RsvpConfirmInterface
   *   The called rsvp confirm entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the rsvp confirm status.
   *
   * @return bool
   *   TRUE if the rsvp confirm is enabled, FALSE otherwise.
   */
  public function isEnabled();

  /**
   * Sets the rsvp confirm status.
   *
   * @param bool $status
   *   TRUE to enable this rsvp confirm, FALSE to disable.
   *
   * @return \Drupal\rsvp_confirm\RsvpConfirmInterface
   *   The called rsvp confirm entity.
   */
  public function setStatus($status);

}
