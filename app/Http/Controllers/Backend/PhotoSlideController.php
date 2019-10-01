<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\PhotoSlide;

class PhotoSlideController extends Controller
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
        $photoslides = PhotoSlide::latest('id')->paginate(20);
        return view('backend.photoslides.index',compact('photoslides'))
            ->with('i', ($request->input('page', 1) - 1) * 20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.photoslides.create');
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
            'name' => 'required'
        ]);
        PhotoSlide::create($request->all());
        return redirect()->route('backend.photoslides.index')
                        ->with('success','Photo Slide created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $photoslide = PhotoSlide::find($id);
        return view('backend.photoslides.show',compact('photoslide'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $photoslide = PhotoSlide::find($id);
        return view('backend.photoslides.edit',compact('photoslide'));
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

        PhotoSlide::find($id)->update($request->all());

        return redirect()->route('backend.photoslides.index')
                        ->with('success','Photo Slide updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PhotoSlide::find($id)->delete();
        return redirect()->route('backend.photoslides.index')
                        ->with('success','Photo Slide deleted successfully');
    }
}
