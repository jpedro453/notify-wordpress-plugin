<?php

namespace inc\application\interfaces\Platform;

interface IPlatformRepository{
    public function getAll();
    public function create($platform_name, $details);
    public function update();
    public function delete();
}
