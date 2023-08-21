<?php

class Menu
{
    private $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
    }
    public function is_active($segment)
    {
        return ($this->ci->uri->segment(2) == $segment);
    }
}
