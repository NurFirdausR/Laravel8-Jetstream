<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeAbout;
use App\Models\Multipic;
class AboutController extends Controller
{
    public function HomeAbout()
    {
        $homeabout = HomeAbout::latest()->get();
        return view('admin.home.index',compact('homeabout'));
    }   

    public function AddAbout()
    {
        return view('admin.home.create');
    }

    public function StoreAbout(Request $request)
    {
        // $request->validate([
        //     'title' => 'required|unique:brands|min:4',
        //     'short_dis' => 'required|max:100',
        //     'long_dis' => 'required|max:100',
        // ]);

           
        
            HomeAbout::insert([
                'title' => $request->title,
                'short_dis' => $request->short_dis,
                'long_dis' => $request->long_dis,
            ]);
            return Redirect()->route('home.about')->with('success','Brand Berhasil di Tambah');
    }


    public function Edit($id)
    {
        $homeEdit =    HomeAbout::find($id);
        return view('admin.home.edit',compact('homeEdit'));
    }

    public function Update(Request $request, $id)
    {
       $update =  HomeAbout::find($id)->update([
            'title' => $request->title,
            'short_dis' => $request->short_dis,
            'long_dis' => $request->long_dis,
        ]);
        return Redirect()->route('home.about')->with('success','Brand Berhasil di Update');

    }

    public function Delete($id)
    {
        $del = HomeAbout::find($id)->Delete();
        return Redirect()->back()->with('success','Brand Berhasil di Hapus');

    }

    public function Portofolio()
    {
        $images = Multipic::all();
        return view('pages.portofolio',compact('images'));
    }
}
