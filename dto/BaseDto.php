<?php

namespace Dto;

abstract class BaseDto
{
    private $id = null;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
}