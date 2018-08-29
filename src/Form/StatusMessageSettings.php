<?php

namespace Drupal\status_message\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
* 
*/
class StatusMessageSettings extends ConfigFormBase
{
	
	public function getFormId() {
		return 'status_message_settings';
	}

	protected function getEditableConfigNames() {
		return [
			'status_message.settings',
		];
	}

	public function buildForm(array $form, FormStateInterface $form_state) {
		$config = $this->config('status_message.settings');
		$form['width'] = [
			'#type' => 'number',
			'#title' => $this->t('The max-width of the pop-up window in pixels.'),
			'#min' => 100,
			'#default_value' => $config->get('width'),
		];
		$form['height'] = [
			'#type' => 'number',
			'#title' => $this->t('The height of the pop-up window in pixels.'),
			'#min' => 50,
			'#default_value' => $config->get('height'),
		];
		$form['background'] = [
			'#type' => 'color',
			'#title' => $this->t('The background of the pop-up window.'),
			'#default_value' => $config->get('background'),
		];

		return parent::buildForm($form, $form_state);
	}

	public function submitForm(array &$form, FormStateInterface $form_state) {
		$values = $form_state->getValues();
		$width = $values['width'];
		$height = $values['height'];
		if(($width >= 100 || $width == '') && ($height >=50 ||$height == '')) {
			$this->config('status_message.settings')
				->set('width', $values['width'])
				->set('height', $values['height'])
				->set('background', $values['background'])
				->save();
		} else $form_state->setErrorByName('width or height', $this->t('Height can not be less than 50. Width can not be less than 100. Enter the correct value.'));
	}
}