<?php

namespace Helix\Model;

class BaseTemplate extends HelixTemplate
{
	protected $attributes = array(
		'name' => null,
		'lang_id' => null,
		'site_id' => null,
	);	

	public function layoutTemplate()
	{
		return $this->hasOne('\Helix\Model\LayoutTemplate', 'base_template_id', 'id');
	}
}