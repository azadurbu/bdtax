<?php

/**
 * CompactContactForm class.
 * CompactContactForm is the data structure for keeping
 * compact contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class CompactContactForm extends CFormModel
{
	public $name;
	public $email;
	public $body;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('name, email, body', 'required'),
			// email has to be a valid email address
			array('email', 'email'),
		);
	}


}