<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

use App\Model\Content;
use App\Model\Category;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $request->user()->authorizeRoles(['administrator']);
        $news = Content::with('categories')->orderBy('id','DESC')->paginate(20);
        return view('backend.news.index',compact('news'))
            ->with('i', ($request->input('page', 1) - 1) * 20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.news.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:contents|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'attachment' => 'required|mimes:xlsx,doc,docx,ppt,pptx,pdf|max:204800',
            'link' => 'required'
        ]);
        
        $pathImage = $this->uploadfile($request->file('image'),'contents/cover/');
        $pathFile = $this->uploadfile($request->file('attachment'),'contents/attachment/');
        
        // create Post
        $news = new Content;
        $news->name = $request->input('name');
        $news->categories_id = $request->input('categories_id');
        $news->created_user_id = auth()->user()->id;
        $news->image = $pathImage;
        $news->attachment = $pathFile;
        $news->link = $request->input('link');
        $news->active = ($request->input('active')=== '1' ? 1:0);
        $news->save();
        return redirect()->route('admin.news.index')
                        ->with('success','Content created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $content = Content::find($id);
        return view('backend.news.show',compact('content'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = Content::find($id);
        $categories = Category::all();
        return view('backend.news.edit',compact('news','categories'));
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
        $this->validate($request, [
            'name' => 'required',
        ]);

        Content::find($id)->update($request->all());

        return redirect()->route('admin.news.index')
                        ->with('success','Content updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Content::find($id)->delete();
        return redirect()->route('admin.news.index')
                        ->with('success','Content deleted successfully');
    }

    public function uploadfile($file, $path)
    {
        $filenameWithExt = $file->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);            
        $extension = $file->getClientOriginalExtension();
        $fileNameToStore = time().'.'.$extension;                       
        Storage::disk('local')->put($path.$fileNameToStore, 'Contents');
        $url = Storage::url($path.$fileNameToStore);
        return $url;
    }
}
