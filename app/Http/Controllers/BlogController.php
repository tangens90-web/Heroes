<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Post;

class BlogController extends Controller
{
    //
     public function index(Request $request){
        // return Route::is('blog')? 'yes':'no';
        // $data = $request->all();
        $search = $request->input('search');
        $category_id = $request->input('category_id');
        // dd($search,$category_id);

      //   $post = (object)[
      //     'id'=>123,
      //     'title'=>'Lorem ipsum dolor sit amet.',
      //     'content'=> 'Lorem ipsum <strong>dolor sit</strong> amet consectetur adipisicing elit. Dignissimos, eius.',
      //     'category_id'=>1,
      //   ];
      // $posts = array_fill(0, 10, $post);
      $categories=[
        null => __('Все категории'), 
        1 => __('Первая категория'), 
        2 => __('Вторая категория'), 
        3 => __('Третья категория')
      ];
  //     $posts = array_filter($posts, function($post) use($search, $category_id)
  //     {
  //     if( $search && !str_contains(strtolower($post->title),strtolower($search)) )
  //     {
  //       return false;
  //     }
  //     if( $category_id && $post->category_id != $category_id )
  //     {
  //       return false;
  //     }
  //     return true;
  //   }
  // );
      $validated= $request->validate([
        'limit'=>['nullable','integer','min:1','max:100'],
        'page'=>['nullable','integer','min:1','max:100']
      ]);
      // $page = $validated['page']?? 1;
      // $limit = $validated['limit']?? 20;
      // $offset = $limit * ($page - 1);
      
      // $post = Post::query()->first();
      // $posts = Post::query()->limit($limit)->offset($offset)->get();
      // $posts = Post::query()->orderBy('published_at','desc')->paginate(20);
      $search = 'dolor';
        $posts = Post::query()->where('title','like',"%{$search}%")->latest('published_at')->paginate(20);

      // dd($post->getAttribute('published_at'));
        return view('blog.index', compact('posts','categories'));
    }
      public function show(){
        // return Route::is('blog*') ? 'yes':'no';

        //  $post = (object)[
        //   'id'=>123,
        //   'title'=>'Lorem ipsum dolor sit amet.',
        //   'content'=> 'Lorem ipsum <strong>dolor sit</strong> amet consectetur adipisicing elit. Dignissimos, eius.',
        // ];
        $post = Post::query()->where('user_id',1003)->firstOrFail();
       return view('blog.show', compact('post'));
    }
      public function like(){
        return "Лайк";
    }
}
