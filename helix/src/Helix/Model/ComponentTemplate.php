<?php

namespace Helix\Model;

class ComponentTemplate extends HelixTemplate
{
	protected $attributes = array(
		'name' => null,
		'layout_template_id' => null,
		'lang_id' => null,
		'site_id' => null,
	);

	public function layoutTemplate()
	{
		return $this->hasOne('\Helix\Model\LayoutTemplate', 'layout_template_id', 'id');
	}	
}