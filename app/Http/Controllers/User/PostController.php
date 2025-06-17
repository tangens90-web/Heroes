<?php

namespace App\Http\Controllers\User;
use Carbon\Carbon;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    public function index(Request $request){
      //  $post = (object)[
      //     'id'=>123,
      //     'title'=>'Lorem ipsum dolor sit amet.',
      //     'content'=> 'Lorem ipsum <strong>dolor sit</strong> amet consectetur adipisicing elit. Dignissimos, eius.',
      //   ];
      // $posts = array_fill(0, 10, $post);
      if (Auth::check()) {
            $name = Auth::user()->name; 
            $nameUrl = $request->route('name');
            // dd($nameUrl);
            if($name!== $nameUrl){
              abort(404,"Неправильно введён адрес");
            }
            
            
             $posts = Post::query()->where('user_id', Auth::user()->id )->paginate(12);// или другое поле
             return view('user.posts.index',compact('posts'), ['name' => $name]);
            // return redirect()->route('user.posts', ['name' => $name]);
        } else {
            return redirect('/login');
        }
       
     
        
    }
      public function create(){
        $name = Auth::user()->name; 
       return view('user.posts.create', ['name' => $name]);
    }
      public function store(StorePostRequest $request){
        // $title = $request->input('title');
        // $content = $request->input('content');
        // dd($title,$content);
        
        $validated = $request->validate([  'title'=>['required','string','max:100'],
          'content'=>['required','string',''],
          'published_at'=>['nullable','date','string'],
          'published'=>['nullable','boolean'], ]);
      
        // dd($validated);
//  $publishedAt = null;
//     if (!empty($validated['published_at'])) {
//         try {
//             // Предполагается, что дата приходит в формате 'd.m.Y'
//             $dateObj = Carbon::createFromFormat('d.m.Y', $validated['published_at']);
//             $publishedAt = $dateObj->format('Y-m-d');
//         } catch (\Exception $e) {
//             // Можно обработать ошибку или оставить null
//             $publishedAt = null;
//         }
//     }
//         for ($i=0; $i < 99; $i++) { 
//            $post = Post::query()->create([
//           'user_id'=> User::query()->value('id'),
//           'title'=> Fake()->sentence(),
//           'content'=> Fake()->paragraph(),
//           'published_at'=> Fake()->dateTimeBetween(now()->subYear(),now()),
//           'published'=>true,
//         ]);
//         };
      
       

        // $post = Post::query()->create([
        //   'user_id'=> User::query()->value('id'),
        //   'title'=> $validated['title'],
        //   'content'=> $validated['content'],
        //   'published_at'=> new Carbon($validated['published_at']?? null),
        //   'published'=>$validated['published']?? false,
        // ]);
        // $account;
        // $order;
        // if(true){
        //   throw ValidationException::withMessages([
        //     'account'=>__('Недостаточно средств')
        //   ]);
        // }
       

        return redirect()->route('user.posts.show',123);
    }


      public function show( Request $request){
            $name = Auth::user()->name; 
            $nameUrl = $request->route('name');
            $post =$request->route('post'); 
            // dd($nameUrl);
            if($name!== $nameUrl){
              abort(404,"Неправильно введён адрес");
            }
            // dd($post);
            
              $post = Post::findOrFail($post);
        //  $search = $request->input('search');
          //  $post = Post::query()->findOrFail($id);
        return view('user.posts.show',compact('post'));
    }
      public function edit($post,Request $request){
        $post =$request->route('post'); 
        $post = Post::query()->where('id',$post)->firstOrFail();
        return view('user.posts.edit',compact('post'));
    }
      public function update($post,Request $request){
        
         $validated = validator($request->all(),[
          'title'=>['required','string','max:100'],
          'content'=>['required','string'],
        ])->validate();
        // return redirect()->route('user.posts.show',123);
        // dd($validated);
        $post =$request->route('post');
        $post = Post::findOrFail($post);
        $post->update($validated);
        // $post =$request->route('post'); 
        // $post = Post::query()->where('id',$post)->firstOrFail();

        return back();
    }
      public function delete(Request $request){
        $name = Auth::user()->name; 
        $post =$request->route('post');
        $post = Post::find($post);
        $post->delete();
        return redirect()->route('user.posts', ['name' => $name]);
        // return redirect()->route('user.posts',123);
    }
      public function like(){
        return "лайки поста";
    }
    
}
