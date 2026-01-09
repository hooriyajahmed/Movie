<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;



class categoryController extends Controller
{
    
    
    function insert(){
        return view('Admin.category');
    }

    function insertcategory(Request $req){
        $data=$req->validate([
        "name"=>"required",
        "desc"=>"required",
        
        ]);
       $category=new category();
        $category->name=$data['name'];
        $category->desc=$data['desc'];
          $category->save();

       if($category){
        // return "Data Inserted";
        return redirect()->route('fetchcategory')->with("success","1 Category Inserted......");
       }
       else{
           return "Data Not Inserted";
       }

    }

    function fetch(){
        $data=category::all();
        return view('Admin.fetchcategory',compact('data'));
    }

    function deletecategory($id){
        $result=category::destroy($id);
      if($result){
        return redirect()->route('fetchcategory')->with("success","Category Is Deleted");
      }

      else{
         return redirect()->route('fetchcategory');
      }
    }

    

function edit($id){
         $data=category::find($id);
         return view('Admin.editcategory',compact('data'));
    }

     function update(Request $req, $id){
         $category=category::find($id);
         $category->name=$req['name'];
         $category->desc=$req['desc'];
       
       if($category->save()){
        return redirect()->route('fetchcategory')->with("success","Category Is Updated");
      }

      else{
         return redirect()->route('editcategory');
      }
    }
}