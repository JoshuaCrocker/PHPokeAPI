<?php

namespace PokeAPI;

class Description
{
    public $name;
    public $id;
    public $resource_uri;
    public $created;
    public $modified;
    public $games;
    public $pokemon;

    public function __construct($id)
    {
        $request = new Request('api/v1/description/'.$id.'/');
        $data = ($request->getResponse());

        // GAMES
        $this->games = [];

        foreach ($data->games as $game) {
            $this->games[] = [
                'name'     => $game->name,
                'resource' => $game->resource_uri,
            ];
        }

        // POKEMON
        $this->pokemon = [];

        foreach ($data->pokemon as $pokemon) {
            $this->pokemon[] = [
                'name'     => $pokemon->name,
                'resource' => $pokemon->resource_uri,
            ];
        }

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
