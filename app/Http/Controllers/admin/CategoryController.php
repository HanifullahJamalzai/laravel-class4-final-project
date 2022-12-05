<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Error;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = \App\Models\Category::all();
        // dd($categories);

        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create')->with('page', 'store');
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
            \App\Models\Category::create(
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

        session()->flash('success', 'You have successfully added New Category');
        return redirect('category');
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
    public function edit(Category $category)
    {
        // dd($category);
        return view('admin.category.create', compact('category'))->with('page', 'Edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->update([
            'name' => $request->name
        ]);
        session()->flash('success', 'You have successfully Updated Category');
        return redirect('category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {

        // $category = Category::find($id);
        // $category->delete();
        // dd($category);
        $category->delete();
        session()->flash('success', 'You have successfully Deleted Category');
        return redirect('category');
        
    }

    public function trash(){
        $categories = Category::onlyTrashed()->get();
        return view('admin.category.trash', compact('categories'));
    }

    public function restore($category)
    {
        Category::withTrashed()->where('id', $category)->restore();
        
        session()->flash('success', 'You have successfully Restored Category');
        return redirect('category');
    }
    
    public function forceDelete($category)
    {
        Category::withTrashed()->where('id', $category)->forceDelete();
        
        session()->flash('success', 'You have successfully forceDeleted Category');
        return redirect('category');
        // Force Delete
    }


    public function search(Request $request)
    {
        $categories = Category::where('name', 'LIKE', '%' . $request->search . '%')->get();
        return view('admin.category.index', compact('categories'));
    }
}
