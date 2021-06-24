<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Wooapi;
use Illuminate\Http\Request;

class WooapiController extends Controller
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
        $staffs = User::all();
        $wooapis = DB::table('wooapis')
            ->select('wooapis.id', 'wooapis.user_id', 'wooapis.store', 'wooapis.consumer_key', 'wooapis.consumer_secret', 'users.name', 'users.email')
            ->join('users','wooapis.user_id','=','users.id')
            ->get();
        return view('wooapi', compact('staffs', 'wooapis'));
    }


    public function store(Request $data) 
    {
        Wooapi::updateOrCreate(
            [
                'id' => $data['id']
            ],
            [
            'user_id' => $data['user_id'],
            'store' => $data['store'],
            'consumer_key' => $data['consumer_key'],
            'consumer_secret' => $data['consumer_secret']
        ]);
        return response()->json(['success'=>'Ajax request submitted successfully']);
    }


    public function destroy($id)
    {
        $woo = Wooapi::findOrFail($id);
        $woo->delete();

        return redirect('/wooapi')->with('success', 'Staff Data is successfully deleted');
    }

    
}
