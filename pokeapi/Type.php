<?php
namespace PokeAPI;
	
class Type {
	public $name;
	public $id;
	public $resource_uri;
	public $created;
	public $modified;
	public $ineffective;
	public $no_effect;
	public $resistance;
	public $super_effective;
	public $weakness;
	
	
	function __construct($id) {
		$request = new Request('api/v1/type/'.$id.'/');
		$data = ($request->getResponse());
		
		// INEFFECTIVE
		$this->ineffective = [];
		
		foreach ($data->ineffective as $ineffective) {
			$this->ineffective[] = [
				'name' => $ineffective->name,
				'resource' => $ineffective->resource_uri
			];
		}
		
		// NO EFFECT
		$this->no_effect = [];
		
		foreach ($data->no_effect as $no_effect) {
			$this->no_effect[] = [
				'name' => $no_effect->name,
				'resource' => $no_effect->resource_uri
			];
		}
		
		// RESISTANCE
		$this->resistance = [];
		
		foreach ($data->resistance as $resistance) {
			$this->resistance[] = [
				'name' => $resistance->name,
				'resource' => $resistance->resource_uri
			];
		}
		
		// SUPER EFFECTIVE
		$this->super_effective = [];
		
		foreach ($data->super_effective as $super_effective) {
			$this->super_effective[] = [
				'name' => $super_effective->name,
				'resource' => $super_effective->resource_uri
			];
		}
		
		// WEAKNESS
		$this->weakness = [];
		
		foreach ($data->weakness as $weakness) {
			$this->weakness[] = [
				'name' => $weakness->name,
				'resource' => $weakness->resource_uri
			];
		}
		
		// DATA
		$this->id = $data->id;
		$this->name = $data->name;
		$this->resource_uri = $data->resource_uri;
		
		// TIMESTAMPS
		$this->created = $data->created;
		$this->modified = $data->modified;
	}
}
