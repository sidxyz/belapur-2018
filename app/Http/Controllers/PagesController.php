<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Account;
use Image;
use App\Mail\TestEmail;
use Mail;
// use Intervention\Image\Facades\Image;


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
         $user = new User();
          $data = ['message' => 'This is a test!'];
        if($request->hasFile('avatar'))
        {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
            $user->image_url = $filename;
            $user->name = $request->name;
            $user->password = $request->password;
            $user->email = $request->email;
            $user->remember_token = $request->remember;
            $user->save();
        }

          Mail::to($user->email)->send(new TestEmail($data));
         //  Mail::to($user->email)->cc('arundhati.amexs@gmail.com')->send((Mailable)"This is some mailable content");
         // return redirect('showData');

    }

    public function showData()
    {
        $usersList = new User;
        // dd($usersList);
        $userCollection = $usersList->all();
        // dd($userCollection);
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
       //dd($user);
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
       $user = $user->where('id',$userData['id'])->get();
       $user = $user[0];

      //dd($user);

       $user->name = $request->name;
       $user->email = $request->email;
       $user->password = $request->password;
       $user->remember_token = $request->remember_token;

       $user->save();

       return redirect('showData');
    }

    public function addAccount()
    {
      return view('addAccount');
    }

    public function storeAccountDetails(Request $request)
    {  
      $account = new Account($request->all());
      $account->save();
      //echo 'done';
      return redirect('showAccountData');
    }

    public function showAccountData()
    {
      $account = new Account();
      $account = $account->all();
      return view('showAccountData')->with('accountData',$account);
    }

    public function editAccount($accountId)
    {
        $account = new Account();
       $account = $account->where('id',$accountId)->get();
       //dd($account);
       $account = $account[0];
       //dd($account);
       return view('accountUpdateForm')->with('accountData',$account);
    }

    public function updateAccountDetails(Request $request)
    {
       $account = new Account();
       $accountData = $request->all();
       $account = $account->where('id',$accountData['id'])->get();
       $account = $account[0];

      //dd($account);

       $account->type = $request->type;
       $account->balance = $request->balance;
       $account->user_id = $request->user_id;
       // $account->remember_token = $request->remember_token;

       $account->save();

       return redirect('showAccountData');
    }

    public function deleteAccount($accountId)
    {
      $account = new Account();
      $account->destroy($accountId);
      return redirect('showAccountData');


    }
}
