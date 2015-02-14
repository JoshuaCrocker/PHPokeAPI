<?php
class Pokemon {
	public $name;
	public $national_id;
	public $pkdx_id;
	public $resource_uri;
	public $created;
	public $modified;
	public $abilities;
	public $egg_groups;
	public $evolutions;
	public $descriptions;
	public $moves;
	public $types;
	public $catch_rate;
	public $species;
	public $hp;
	public $attack;
	public $defense;
	public $sp_attack;
	public $sp_defense;
	public $speed;
	public $total;
	public $egg_cycles;
	public $ev_yield;
	public $exp;
	public $growth_rate;
	public $height;
	public $weight;
	public $happiness;
	public $male_female_ratio;
	
	function __construct($id) {
		$request = new Request('api/v1/pokemon/'.$id.'/');
		$data = ($request->getResponse());
		
		// Abilities
		$this->abilities = [];
		
		foreach ($data->abilities as $ability) {
			$this->abilities[] = [
				'name' => $ability->name,
				'resource' => $ability->resource_uri
			];
		}
		
		// DESCRIPTIONS
		$this->descriptions = [];
		
		foreach ($data->descriptions as $description) {
			$this->descriptions[] = [
				'name' => $description->name,
				'resource' => $description->resource_uri
			];
		}
		
		// EGG GROUPS
		$this->egg_groups = [];
		
		foreach ($data->egg_groups as $egg_group) {
			$this->egg_groups[] = [
				'name' => $egg_group->name,
				'resource' => $egg_group->resource_uri
			];
		}
		
		// EVOLUTIONS
		$this->evolutions = [];
		
		foreach ($data->evolutions as $evolution) {
			$this->evolutions[] = [
				'level' => $evolution->level,
				'method' => $evolution->method,
				'resource' => $evolution->resource_uri,
				'to' => $evolution->to
			];
		}
		
		// MOVES
		$this->moves = [];
		
		foreach ($data->moves as $move) {
			$this->moves[] = [
				'name' => $move->name,
				'learn_type' => $move->learn_type,
				'resource' => $move->resource_uri
			];
		}
		
		// SPRITES
		$this->sprites = [];
		
		foreach ($data->sprites as $sprite) {
			$this->sprites[] = [
				'name' => $sprite->name,
				'resource' => $sprite->resource_uri
			];
		}
		
		// TYPES
		$this->types = [];
		
		foreach ($data->types as $type) {
			$this->types[] = [
				'name' => $type->name,
				'resource' => $type->resource_uri
			];
		}
		
		// STATS
		$this->name = $data->name;
		$this->national_id = $data->national_id;
		$this->pkdx_id = $data->pkdx_id;
		
		$this->attack = $data->attack;
		$this->defense = $data->defense;
		$this->hp = $data->hp;
		$this->sp_attack = $data->sp_atk;
		$this->sp_defense = $data->sp_def;
		$this->speed = $data->speed;
		$this->total = $data->total;
		
		$this->catch_rate = $data->catch_rate;
		$this->egg_cycles = $data->egg_cycles;
		$this->ev_yield = $data->ev_yield;
		$this->exp = $data->exp;
		$this->growth_rate = $data->growth_rate;
		$this->happiness = $data->happiness;
		$this->height = $data->height;
		$this->weight = $data->weight;
		$this->male_female_ratio = $data->male_female_ratio;
		$this->species = $data->species;
		
		// TIMESTAMPS
		$this->created = $data->created;
		$this->modified = $data->modified;
		$this->resource_uri = $data->resource_uri;
		
	}
}
