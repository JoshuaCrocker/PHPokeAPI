<?php
namespace PokeAPI;

class Sprite {
	public $name;
	public $id;
	public $resource_uri;
	public $created;
	public $modified;
	public $pokemon;
	public $image;
	
	function __construct($id) {
		$request = new Request('api/v1/sprite/'.$id.'/');
		$data = ($request->getResponse());
		
		// POKEMON
		$this->pokemon = [];
		
		foreach ($data->pokemon as $pokemon) {
			$this->pokemon[] = [
				'name' => $pokemon->name,
				'resource' => $pokemon->resource_uri
			];
		}
		
		// DATA
		$this->id = $data->id;
		$this->name = $data->name;
		$this->image = $data->image;
		
		// TIMESTAMPS
		$this->created = $data->created;
		$this->modified = $data->modified;
		$this->resource_uri = $data->resource_uri;
	}
}
