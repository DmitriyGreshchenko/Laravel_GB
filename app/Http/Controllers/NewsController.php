<?php


namespace App\Http\Controllers;


class NewsController extends Controller
{
    public function index(){
        $url = route('news::catalog');
        dd($url);
        echo "this is main page";
        exit;
    }

    public function card($id){
        echo "this is news card {$id}";
        exit;
    }

}
