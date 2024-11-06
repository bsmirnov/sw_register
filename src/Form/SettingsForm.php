<?php

namespace Drupal\sw_register\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure Service Worker settings for this site.
 */
class SettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['sw_register.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'sw_register_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('sw_register.settings');

    $form['service_worker_js_script_path'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Path to your Service Worker script'),
      '#description' => $this->t('Enter a relative path to your service-worker.js (from the site root), e.g. sites/default/files/service-worker.js'),
      '#maxlength' => 255,
      '#size' => 64,
      '#required' => TRUE,
      '#default_value' => $config->get('service_worker_js_script_path'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    $path = $form_state->getValue('service_worker_js_script_path');

    if (!file_exists(DRUPAL_ROOT . '/' . $path)) {
      $form_state->setErrorByName('service_worker_js_script_path',
        $this->t('The specified Service Worker script file does not exist. Please check the path and ensure the file is present.')
      );
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('sw_register.settings')
      ->set('service_worker_js_script_path', $form_state->getValue('service_worker_js_script_path'))
      ->save();

    parent::submitForm($form, $form_state);
  }
}
