<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
  public function edit(){

    $user =Auth::user();
    return View('dashboard.profile.edit',[
        'user' =>$user
    ]);
  }

  public function update(Request $request){
    $request->validate([
        'first_name' => ['required','string','min:20','max:255'],
        'last_name' => ['required','string','min:20','max:255'],
        'gender' => ['in:male,female'],
        'country' => ['nullable','string','size:2']
    ]);
    $user =$request->user();
    $user->profile->fill($request->all())->save();
    return Redirect()->route('dashboar.profile.edit');
  }
}
