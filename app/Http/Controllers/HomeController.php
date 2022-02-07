<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function main()
    {
        return view('main.main');
    }

    public function create(Request $request){
        $param = [
            'name' => $request->name,
            'name_kana' => $request->name_kana,
            'birthday' => $request->birthday,
            'tel' => $request->tel,
            'inquiry' => $request->inquiry
        ];
        var_dump($param);
        DB::insert('insert into reviews (name,name_kana,birthday,tel,inquiry) values (:name, :name_kana,:birthday,:tel,:inquiry,NOW())', $param);
        
        return redirect('/');
    }
}
