<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Exports\CategoryExport;
use Maatwebsite\Excel\Facades\Excel;
use Auth;
use DB;
use Illuminate\Support\Carbon;
class CategoryController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }





  public function AllCat()
  {
      $categories = Category::latest()->paginate(5);
      $trachCat = Category::onlyTrashed()->latest()->paginate(3);
    //   $categories = DB::table('categories')->latest()->paginate(5);
    return view('admin.category.index',compact('categories','trachCat'));
    }

    public function AddCat(Request $request)
    {
        $validateData =  $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ],
        [
            'category_name.required' => 'Category Harus di input',
            'category_name.max' => 'Category max 10 kata!',
            'category_name.unique' => 'Category Sudah ada!',
        ]);

        Category::insert([
            'category_name' =>$request->category_name,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);

            return Redirect()->back()->with('success','Category Berhasil di tambah');
        // $category = new Category;
        // $category->category_name = $request->category_name; 
        // $category->user_id = Auth::user()->id;
        // $category->save(); 
    }
    public function categoryExport ()
    {
        return Excel::download(new CategoryExport,'category.xlsx');
    }




    public function Update(Request $request ,$id)
    {
        $update = Category::find($id)->update([
            'category_name' => $request->category_name,
            'user_id'=> Auth::user()->id
        ]);
        return Redirect()->route('all.category')->with('success','Category Berhasil di UPDATE');

    }



    public function Edit($id)
    {
        $categories = Category::find($id);
        return view("admin.category.edit",compact('categories'));
    }

    public function softDelete($id)
    {
            $delete = Category::find($id)->delete();
        return Redirect()->back()->with('success','Category SoftDelete Successfully');
    }

    public function Restore($id)
    {   
                            // Mengembalikan delete
        $restore = Category::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('success','Category Restore Successfully');


    }
    public function pDelete($id)
    {
        
                            //menghapus permanen dari softdelete
        $pdelete = Category::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('success','Category Permanen Delete Successfully');

    }
}

