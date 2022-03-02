<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showusers()
    {
        return view('dashboard.userlist', [
            'users'=>User::all()
        ]);
    }

    public function deleteUser(User $user)
    {
        $user->delete();
        return back();
    }

    public function showEdittUserForm(User $user)
    {
        return view('dashboard.edit-user-form', [
            'user'=>$user
        ]);
    }

    public function storeUserEditData(User $user)
    {
        $formData = request()->validate([
            'name'=>['required'],
            'username'=>['required'],
            'email'=>['required'],
        ]);
        $formData['isVarify']= request('verify');
        $user->update($formData);
        return redirect('/user/list');
    }

    //for subscribers

    public function showSubscribers()
    {
        return view('dashboard.subscriberlist', [
            'subscribers'=>Subscriber::all()
        ]);
    }

    public function deleteSubscriber(Subscriber $subscriber)
    {
        $subscriber->delete();
        return back();
    }
}
