<?php

class Note
{
    public function index()
    {
        json_encode(["res" => "test"]);
    }
}

$note = new Note;
var_dump(json_encode(["res" => "test"]));
