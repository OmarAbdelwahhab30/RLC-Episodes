<?php

namespace RLC\Framework\Http;

class Request
{

    public $get;

    public $post;

    public $files;

    public $server;

    public function __construct(array $get, array $post, array $files, array $server)
    {
        $this->get = $get;
        $this->post = $post;
        $this->files = $files;
        $this->server = $server;
    }

    public static function getGlobals()
    {
        return new self($_GET, $_POST, $_FILES, $_SERVER);
    }


}