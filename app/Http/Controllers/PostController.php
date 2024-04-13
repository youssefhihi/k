<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Genre;
use App\trait\ImageUpload;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    use ImageUpload;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $genres =  Genre::withCount('books')->orderByDesc('books_count')->limit(4)->get();
        $authors =  Author::withCount('books')->orderByDesc('books_count')->limit(4)->get();
        $books =  Book::limit(4)->get();
        $type = $request->input('type');
        $search = '%'.$request->input('search') .'%';
        $query = Post::orderByDesc('created_at');
        if($type){
            if ($type !== 'all' && $type !== null) {
                $query->where('type', $type);
            }

        }else if($search){
            $query = Post::where('description', 'like', $search)
            ->orWhereHas('client', function($query) use ($search) {
                $query->whereAny([
                    'city',
                    'bio',
                ], 'like', $search);
            })
            ->orWhereHas('client.user', function($query) use ($search) {
                $query->whereAny(['username','name'], 'like', $search);
            });
            
            
        }
        $posts = $query->get();
        
        return view('client.home',compact('posts','genres','books','authors'));   
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        try{
            if(Auth::user()->client->can_post){
                return redirect()->back()->with("error", "Sorry, you're unable to post at the moment. Please reach out to the administrator for assistance.");
            }else{
                
                $data = $request->validated();
                $data['client_id'] = Auth::user()->client->id;
                $post = Post::create($data); 
                if($request->hasFile('image') || $request->file('image')){         
                    $this->storeImg($post, $request->file('image'));
                }         
                return redirect()->back()->with("success", "Great! Your post has been successfully added.");
            }
        } catch (\Exception $e) {

            return redirect()->back()->with("error", "Error: " . $e->getMessage());

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('client.editPost',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        try {
            $data = $request->validated();
            if (!$request->hasFile('image') || !$request->file('image')) {
                if($post->image){
                $data["image"] = $post->image->path;
                $post->update($data);
                }else{
                    $post->update($data);
                }
            } else {
                if($post->image){
                    $this->updateImg($post, $request->file('image'));
                }else{
                    $this->storeImg($post, $request->file('image'));
                }
                $post->update($data);
            }    
            return redirect('/profile')->with("success", "post updated successfully.");
        } catch (\Exception $e) {
            return redirect()->back()->with("error", "Error: " . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->back()->with("success", "post deleted successfully.");

    }
}
