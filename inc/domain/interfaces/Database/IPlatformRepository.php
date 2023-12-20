<?php

namespace inc\domain\interfaces\Database;

interface IPlatformRepository{
    public function getAll();
    public function getByName($name);
    public function create($platform_name, $details);
    public function update();
    public function delete();
}
