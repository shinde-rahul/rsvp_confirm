<?php

namespace Drupal\rsvp_confirm\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for the rsvp confirm entity edit forms.
 */
class RsvpConfirmForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {

    $entity = $this->getEntity();
    $result = $entity->save();
    $link = $entity->toLink($this->t('View'))->toRenderable();

    $message_arguments = ['%label' => $this->entity->label()];
    $logger_arguments = $message_arguments + ['link' => render($link)];

    if ($result == SAVED_NEW) {
      $this->messenger()->addStatus($this->t('New rsvp confirm %label has been created.', $message_arguments));
      $this->logger('rsvp_confirm')->notice('Created new rsvp confirm %label', $logger_arguments);
    }
    else {
      $this->messenger()->addStatus($this->t('The rsvp confirm %label has been updated.', $message_arguments));
      $this->logger('rsvp_confirm')->notice('Updated new rsvp confirm %label.', $logger_arguments);
    }

    $form_state->setRedirect('entity.rsvp_confirm.canonical', ['rsvp_confirm' => $entity->id()]);
  }

}
