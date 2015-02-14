<?php
namespace PokeAPI;

class Move {
	public $name;
	public $id;
	public $resource_uri;
	public $created;
	public $modified;
	public $description;
	public $power;
	public $accuracy;
	public $category;
	public $pp;
	
	function __construct($id) {
		$request = new Request('api/v1/move/'.$id.'/');
		$data = ($request->getResponse());
		
		// DATA
		$this->id = $data->id;
		$this->name = $data->name;
		$this->category = $data->category;
		$this->description = $data->description;
		$this->power = $data->power;
		$this->accuracy = $data->accuracy;
		$this->pp = $data->pp;
		
		// TIMESTAMPS
		$this->created = $data->created;
		$this->modified = $data->modified;
		$this->resource_uri = $data->resource_uri;
	}
}
