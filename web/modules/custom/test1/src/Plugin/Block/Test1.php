<?php

namespace Drupal\test1\Plugin\Block;

use Drupal\Core\Block\BlockBase;
// use Drupal\test1\Controller\Test1Controller;
/**
 * Provides a 'test1' Block.
 *
 * @Block(
 *   id = "test1",
 *   admin_label = @Translation("test1"),
 *   category = @Translation("test1"),
 * )
 */
class Test1 extends BlockBase
{

  /**
   * {@inheritdoc}
   */

  public function RUB()
  {
    $file = simplexml_load_file("https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?valcode=RUB&" . date("d.m.Y"));

    foreach ($file as $val) {
    }
    return $val->cc . ' = ' . $val->rate;
  }
  public function USD()
  {
    $file = simplexml_load_file("https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?valcode=USD&" . date("d.m.Y"));

    foreach ($file as $val) {
    }
    return $val->cc .  ' = ' . $val->rate;
  }
  public function EUR()
  {
    $file = simplexml_load_file("https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?valcode=EUR&" . date("d.m.Y"));

    foreach ($file as $val) {
    }
    return $val->cc . ' = ' . $val->rate;
  }



  public function build()
  {
    return  [
      '#markup' => $this->RUB() . ',   ' . $this->EUR() . ',   ' . $this->USD(),
    ];
  }
}
