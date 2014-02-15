<?php

namespace Helix\Template;

use Helix\Model\HelixTemplate as Model;

class HelixTemplate
{
	protected $model;

	public function __construct(Model $helixTemplateModel)
	{
		$this->model = $helixTemplateModel;
	}

	public function render()
	{

	}

	public function loadLayoutTemplate($id)
	{
		return $this->model->find(1);
		echo '<pre>';
		print_r($this->model->id = 1);
	}
}