<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class PagesController extends Controller
{
    public function index()
    {
        $first = "hello";
        $second = "world";
        $data = $first.$second;

    	return view('product1')->with('data',$data);
    }

    public function two()
    {
    	return view('product2');
    }

    public function three()
    {
    	return view('product3');
    }

    public function add()
    {
        return view('add');
    }

    public function addData(Request $request)
    {
        // echo "entered name is ".$request->name;
        // echo " and password name is ".$request->password;
        // echo " and email name is ".$request->email;
        // echo " and remember name is ".$request->remember;

        //dd($request->all());

         $user = new User($request->all());
         $user->save();

         //echo "saved";
         return redirect('showData');

        // $user->name = $request->name;
        // $user->password = $request->password;
        // $user->email = $request->email;
        // $user->remember_token = $request->remember;

        // $user->save();
    }

    public function showData()
    {
        $usersList = new User;
        $userCollection = $usersList->all();
        return view('show')->with('userRows',$userCollection);
    }

    public function deleteData($userId)
    {
       $user = new User();
       $user->destroy($userId);
       return redirect('showData');

    }


    public function updateData($userId)
    {
       $user = new User();
       $user = $user->where('id',$userId)->get();
       $user = $user[0];
       //dd($user);
       return view('userUpdateForm')->with('userData',$user);

    }

    public function showUpdateForm()
    {
        return view('userUpdateForm');
    }

    public function updateUser(Request $request)
    {
       $user = new User();
       $userData = $request->all();
       dd($userData);
       $user = $user->where('id',$userData->id)->get();
       
       $user = $user[0];

       $user->name = $request->name;
       $user->email = $request->email;
       $user->password = $request->password;
       $user->remember_token = $request->remember_token;

       $user->save();

       return redirect('showData');
    }
}
