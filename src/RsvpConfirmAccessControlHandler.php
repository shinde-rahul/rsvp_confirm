<?php

namespace Drupal\rsvp_confirm;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * Defines the access control handler for the rsvp confirm entity type.
 */
class RsvpConfirmAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {

    switch ($operation) {
      case 'view':
        return AccessResult::allowedIfHasPermission($account, 'view rsvp confirm');

      case 'update':
        return AccessResult::allowedIfHasPermissions($account, ['edit rsvp confirm', 'administer rsvp confirm'], 'OR');

      case 'delete':
        return AccessResult::allowedIfHasPermissions($account, ['delete rsvp confirm', 'administer rsvp confirm'], 'OR');

      default:
        // No opinion.
        return AccessResult::neutral();
    }

  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermissions($account, ['create rsvp confirm', 'administer rsvp confirm'], 'OR');
  }

}
