<?php

namespace Drupal\project;

use Drupal\Core\Entity\EntityViewBuilder;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Component\Utility\Html;

/**
 * Defines the view builder for project entity.
 */
class ProjectViewBuilder extends EntityViewBuilder {

  /**
   * {@inheritdoc}
   */
  public function view(EntityInterface $entity, $view_mode = 'full', $langcode = NULL) {
    $build_list = $this->viewMultiple([$entity], $view_mode, $langcode);
    $build = $build_list[0];
    $build['#pre_render'][] = [
      $this,
      'build',
    ];
    return $build;
  }
}
