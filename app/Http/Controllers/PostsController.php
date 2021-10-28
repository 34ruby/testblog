<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(5);
        // dd($posts);
        return view('bbs.index', ['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bbs.create');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Post::create($request);
        $this->validate($request, ['company'=>'required', 'name'=>'required', 'year'=>'required', 'price'=>'required',
        'type'=>'required', 'shape'=>'required']);
        $path=null;
        if ($request->hasFile('image')) {
            // dd($request->file('image'));
            $fileName = time().'_'.$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('public/images', $fileName);
            // dd($path);
        }


        // return view(route('posts.index'), ['posts'=>Post::all()]);
        $input = array_merge($request->all(), ["user_id"=>Auth::user()->id]);

        if($path) {
            $path = substr($path, strrpos($path, '/')+1);
            $path = time().'_'.$path;
            $input = array_merge($input, ['image' => $fileName]);
            // dd($input);
        }
        Post::create($input);
        // return view('bbs.index', ['posts'=>Post::all()]);
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $id에 해당하는 Post를 데이터베이스에서 인출
        $post = Post::find($id);
        // 그것을 상세보기 뷰로 전달하는 것이지...
        return view('bbs.show', ['post'=>$post]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $id에 해당하는 포스트를 수정할 수 있는 페이지를 반환해주면 된다.


        return view('bbs.edit', ['post'=>Post::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, ['company'=>'required', 'name'=>'required', 'year'=>'required', 'price'=>'required',
        'type'=>'required', 'shape'=>'required']);

        $post = Post::find($id);
        $post->name = $request->name;
        $post->company = $request->company;
        $post->year = $request->year;
        $post->price = $request->price;
        $post->type = $request->type;
        $post->shape = $request->shape;


        if($request->image) {
            // 이 이미지를 이 게시글의 이밎로 파일 시스템에 저장하고 ㄷ비에 반영하기 전에
            // 기존 이밎가 있다면 그 이미ㅣ르 파일 시스템에서 제거아혀야 한다.
            if($post->image) {
                Storage::delete('public/images/'.$post->image);
            }
            // $fileName = time().'_'.$request->file('image')->getClientOriginalName();

            // $request->image->storeAs('public/images/'.$fileName);

            $fileName = time().'_'.$request->file('image')->getClientOriginalName();
            $post->image = $fileName;
            $request->file('image')->storeAs('public/images', $fileName);
        }


        $post->save();
        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // dd($request);
        $post = Post::find($id);

        if ($post->image) {
            Storage::delete('public/images/'.$post->image);
        }
        $post->delete();

        return redirect()->route('posts.index');
    }
}
