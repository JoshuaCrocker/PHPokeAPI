<?php
class Game {
	public $name;
	public $id;
	public $resource_uri;
	public $created;
	public $modified;
	public $release_year;
	public $generation;
	
	function __construct($id) {
		$request = new Request('api/v1/game/'.$id.'/');
		$data = ($request->getResponse());
		
		// DATA
		$this->id = $data->id;
		$this->name = $data->name;
		$this->release_year = $data->release_year;
		$this->generation = $data->generation;
		
		// TIMESTAMPS
		$this->created = $data->created;
		$this->modified = $data->modified;
		$this->resource_uri = $data->resource_uri;
	}
}
