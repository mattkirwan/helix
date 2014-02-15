<?php

namespace Helix;

use Helix\Model\Endpoint;

class HelixEndpoint
{
	private $slug;
	private $model;

	public function __construct(Endpoint $endpointModel)
	{
		$this->model = $endpointModel;
	}

	public function setSlug($slug)
	{
		$this->slug = $slug;
	}

	public function getSlug()
	{
		return $this->slug;
	}

	public function loadEndpointModel()
	{
		// $this->model->slug = 'another/test/slug.html';
		// $this->model->file_id = 1;
		// $this->model->base_template_id = 1;
		// $this->model->lang_id = 1;
		// $this->model->site_id = 1;
		// $this->model->save();

		$q = $this->model->newQuery();
		$this->model = $q->where('slug', '=', $this->slug)->first();

		return $this->model;
	}

	public function getBaseTemplate()
	{
		return $this->model->baseTemplate;
	}

	public function getBaseTemplateName()
	{
		return $this->model->baseTemplate->name;
	}

	public function loadTemplates()
	{
		return $this->model->with(
			'baseTemplate',
			'baseTemplate.layoutTemplate',
			'baseTemplate.layoutTemplate.componentTemplates'
		)->first();
	}

	public function loadTemplateNames()
	{
		return $this->model->select('name')->with(
			'baseTemplate',
			'baseTemplate.layoutTemplate',
			'baseTemplate.layoutTemplate.componentTemplates'
		)->first();
	}
}