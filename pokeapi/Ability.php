<?php
class Ability {
	public $name;
	public $id;
	public $resource_uri;
	public $created;
	public $modified;
	public $description;
	
	function __construct($id) {
		$request = new Request('api/v1/ability/'.$id.'/');
		$data = ($request->getResponse());
		
		// DATA
		$this->id = $data->id;
		$this->name = $data->name;
		$this->description = $data->description;
		
		// TIMESTAMPS
		$this->created = $data->created;
		$this->modified = $data->modified;
		$this->resource_uri = $data->resource_uri;
	}
}
