<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class PostController extends Controller
{
    public function index(){
        return "Страница постов";
    }
      public function create(){
        return "Страница создания постов";
    }
      public function store(){
        return "Запрос создания постов";
    }
      public function show($post){
        return "Страница показа одного поста {$post}";
    }
      public function edit(){
        return "Страница редактирования одного поста";
    }
      public function update(){
        return "Запрос показа одного поста";
    }
      public function delete(){
        return "Удаление поста";
    }
      public function like(){
        return "лайки поста";
    }
    
}
