<?php

namespace inc\Domain\Interfaces\Database;

interface IPlatformRepository{
    public function getAll();
    public function getByName($name);
    public function create($platform_name, $details);
    public function update($platform_name, $active, $details);
    public function delete($name);
}
