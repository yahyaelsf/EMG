<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\TContact;
use App\Models\TEmail;
use App\Models\TNumber;
use App\Models\TService;
use App\Models\TSlider;
use App\Models\TSuccess;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $sliders = TSlider::where('b_enabled' , 1)->get();
        $services = TService::where('b_enabled' , 1)->get();
        $first_success = TSuccess::where('b_enabled' , 1)->first();
        $second_success = TSuccess::where('b_enabled' , 1)->skip(1)->first();
        $third_success = TSuccess::where('b_enabled' , 1)->skip(2)->first();
        $forth_success = TSuccess::where('b_enabled' , 1)->skip(3)->first();
        $fifth_success = TSuccess::where('b_enabled' , 1)->skip(4)->first();
        $numbers = TNumber::where('b_enabled' , 1)->get();
         return view('front.home',compact(['sliders','services','first_success','second_success','third_success','forth_success','fifth_success','numbers']));
    }
            public function storeContactUs(Request $request)
    {
        TContact::create($request->all());

         return redirect(route('home'));
    }
        public function storeEmail(Request $request)
    {
        $request->validate([
            's_email' => 'required|unique:t_emails,s_email|email',
        ]);

        TEmail::query()->create([
            's_email' => $request->s_email,
        ]);

        return redirect(route('home'));
    }
}
