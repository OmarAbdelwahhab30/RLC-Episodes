<?php

namespace App\controller;

use Doctrine\DBAL\Connection;
use RLC\Framework\Http\Request;
use RLC\Framework\Http\Response;

class HomeController
{

    public Connection $connection;
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function index(){

        $content = "<h1> Hello World</h1>";

        return new Response($content,200);
    }

    public function viewPage(){
        $content = include ROOT."/src/views/home.php";

        return new Response($content,200);

    }

    public function addUser(Request $request)
    {
        dd($request->post);
    }
}