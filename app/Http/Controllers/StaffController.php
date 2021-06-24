<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
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
        $staffs = User::all()->where('is_admin', 0);
        return view('staff',compact('staffs'));
    }

    public function store(Request $data) 
    {
        User::updateOrCreate(
            [
                'id' => $data['id']
            ],
            [
            'name' => $data['name'],
            'email' => $data['email'],
            'birthday' => $data['birthday'],
            'phone' => $data['phone'],
            'password' => Hash::make("123456789"),
            'state' => $data['state'],
            'is_admin' => 0,
        ]);

        return response()->json(['success'=>'Ajax request submitted successfully']);
    }


    public function destroy($id)
    {
            $game = User::findOrFail($id);
            $game->delete();

            return redirect('/staff')->with('success', 'Staff Data is successfully deleted');
    }

    
}
