<?php
namespace Drupal\test1\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Render\Element\Tel;
use Drupal\test1\Plugin\Block\Test1;

/**
 * Configure example settings for this site.
 */
class TestSettingsForm extends ConfigFormBase
{
  /**
   * {@inheritdoc}
   */
  public function getFormId()
  {
    return 'test1_admin_settings';
  }



  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames()
  {
    return [
      'test1.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state)
  {
    $config = $this->config('test1.settings');


    $form['expiration'] = [
      '#type' => 'date',
      '#title' => $this
        ->t('Дата наступного оновлення'),
      '#default_value' =>  date("Y.m.d"),
    ];

    return parent::buildForm($form, $form_state);
  }

  

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    $this->configFactory->getEditable('test1.settings')
      ->set('expiration', $form_state->getValue('expiration'))  
      ->save();

    parent::submitForm($form, $form_state);
  }
  
}
