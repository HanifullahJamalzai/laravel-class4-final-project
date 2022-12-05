<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = \App\Models\Tag::all();
        // dd($categories);

        return view('admin.tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.create')->with('page', 'store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            \App\Models\Tag::create(
                $request->validate(
                    [
                        'name' => 'required|min:3|max:50',
                    ],[
                        'name.required' => 'This section is so much important',
                        'name.min' => 'your text is not sufficient',
                        'name.max' => 'name field should not be that much large', 
                    ]
                )
            );
        }catch(\Exception $e){
            dd('General exception: '. $e->getMessage());
        }catch(ModelNotFoundException $e){
            dd('Model exception: '. $e->getMessage());
        }catch(Error $e){
            dd('Error Happened:'. $e->getMessage());
        }

        session()->flash('success', 'You have successfully added New Tag');
        return redirect('tag');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        // dd($Tag);
        return view('admin.tag.create', compact('tag'))->with('page', 'Edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $tag->update([
            'name' => $request->name
        ]);
        session()->flash('success', 'You have successfully Updated Tag');
        return redirect('tag');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {

        // $Tag = Tag::find($id);
        // $Tag->delete();
        // dd($Tag);
        $tag->delete();
        session()->flash('success', 'You have successfully Deleted Tag');
        return redirect('tag');
        
    }

    public function trash(){
        $categories = Tag::onlyTrashed()->get();
        return view('admin.tag.trash', compact('tags'));
    }

    public function restore($tag)
    {
        Tag::withTrashed()->where('id', $tag)->restore();
        
        session()->flash('success', 'You have successfully Restored Tag');
        return redirect('tag');
    }
    
    public function forceDelete($tag)
    {
        Tag::withTrashed()->where('id', $tag)->forceDelete();
        
        session()->flash('success', 'You have successfully forceDeleted Tag');
        return redirect('tag');
        // Force Delete
    }


    public function search(Request $request)
    {
        $tags = Tag::where('name', 'LIKE', '%' . $request->search . '%')->get();
        return view('admin.tag.index', compact('tags'));
    }
}
