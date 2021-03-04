<?php

namespace Drupal\test1\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for test1 routes.
 */
class Test1Controller extends ControllerBase
{

  /**
   * Builds the response.
   */

     /**
   * {@inheritdoc}
   */

   
  public function build()
  {
    $build['content'] = [
      '#type' => 'item',
      
    ];

    return $build;
  }
}
