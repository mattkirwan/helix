<?php

namespace Helix\Model;

class LayoutTemplate extends HelixTemplate
{
	protected $attributes = array(
		'name' => null,
		'base_template_id' => null,
		'lang_id' => null,
		'site_id' => null,
	);

	public function baseTemplate()
	{
		return $this->hasOne('\Helix\Model\BaseTemplate', 'id', 'base_template_id');
	}

	public function componentTemplates()
	{
		return $this->hasMany('\Helix\Model\ComponentTemplate');
	}
}