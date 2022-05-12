<?php

namespace Drupal\project\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Language\Language;
use Drupal\Component\Utility\Html;

/**
 * Form controller for the project entity edit forms.
 */
class ProjectForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);
    $entity = $this->getEntity();
    // 프로젝트 생성 후에는 기계명 수정 불가
    $form['machine_name']['#disabled'] = !$this->getEntity()->isNew();
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $result = parent::save($form, $form_state);

    $entity = $this->getEntity();
    $message_arguments = ['%label' => $entity->toLink()->toString()];
    $logger_arguments = [
      '%label' => $entity->label(),
      'link' => $entity->toLink($this->t('View'))->toString(),
    ];
    switch ($result) {
      case SAVED_NEW:
        // machine_name URL 별칭 생성.
        $machine_name = $entity->machine_name->value;
        $slug = Html::getClass($machine_name);
        $path_alias = \Drupal::entityTypeManager()->getStorage('path_alias')->create([
          'path' => '/project/' . $entity->id(),
          'alias' => '/project/' . $slug,
          'langcode' => Language::LANGCODE_NOT_SPECIFIED,
        ]);
        $path_alias->save();
        $this->messenger()->addStatus($this->t('New project %label has been created.', $message_arguments));
        $this->logger('project')->notice('Created new project %label', $logger_arguments);
        break;

      case SAVED_UPDATED:
        $this->messenger()->addStatus($this->t('The project %label has been updated.', $message_arguments));
        $this->logger('project')->notice('Updated project %label.', $logger_arguments);
        break;
    }

    $form_state->setRedirect('entity.project.canonical', ['project' => $entity->id()]);

    return $result;
  }

}
