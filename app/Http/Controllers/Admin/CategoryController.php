<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Category;


class CategoryController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function manageCategory()
    {
        $categories = Category::where('parent_id', '=', 0)->get();
        $allCategories = Category::get();
        
        return view('admin.categoryTreeview',compact('categories','allCategories'));
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function addCategory(Request $request)
    {
        $this->validate($request, [
                'title' => 'required',
            ]);
        $input = $request->all();
        $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];
        
        Category::create($input);
        return back()->with('success', 'New Category added successfully.');
    }


    public function index()
    {
        $categories = Category::latest()->paginate(5);
        $allCategories = Category::get();

        return view('admin.category.index', compact('categories','allCategories'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        $allCategories = Category::where('parent_id', '=', 0)->where('id', '!=', $id)->get();
        return view('admin.category.edit', compact('category','allCategories'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $updateArray['title'] = $request->title;
        $updateArray['parent_id'] = $request->parent_id ? $request->parent_id : "0";


        $updateCategory = Category::where("id",$id)
                ->update($updateArray);
// dd($request->all(),$updateArray,$updateCategory);

        return redirect()->route('category.list')
            ->with('success', 'Category updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        if($category) {
            Category::where('parent_id',$id)->delete();
            Category::where('id',$id)->delete();
        }        

        return redirect()->route('category.list')
            ->with('success', 'Category deleted successfully');
    }


}