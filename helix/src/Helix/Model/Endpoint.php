<?php

namespace Helix\Model;

use Illuminate\Database\Eloquent\Model;

class Endpoint extends Model
{
	protected $softDelete = true;
	
	protected $attributes = array(
		'slug' => '',
		'file_id' => null,
		'base_template_id' => null,
		'lang_id' => null,
		'site_id' => null,
	);

	public function baseTemplate()
	{
		return $this->hasOne('\Helix\Model\BaseTemplate', 'id', 'base_template_id');
	}
}