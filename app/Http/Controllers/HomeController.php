<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Table;
use Illuminate\Support\Facades\Auth;
use \stdClass;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = new stdClass();
        $username = Auth::user()->email;
        $user_id = Auth::user()->id;
        $user_id = $this->get_user_id_from_email($username);
        $user    = $this->get_user($user_id);
        $last_table    = $this->get_lasttable($user_id); 
            
        if($user->email_verified_at=="" || $user->email_verified_at==null){
            $data->error = 'Not acivated yet.Please Activate your email.';
            return redirect('/login');
        }else{
            // user login ok
            if($last_table == NULL || $last_table == 0 || $last_table == 'undefined'){
                return redirect('User/marks');	
            }else{
                return redirect('Tablemanagement/loadtable?t_id='.$last_table);
            }
        }
        // return view('home');
    }

    public function get_lasttable($user_id) {
        $result = DB::select(DB::raw("SELECT ID FROM Tables WHERE Time=(SELECT MAX(Time) FROM Tables WHERE Table_Owner = $user_id)"));
        // var_dump($result);
        $result = (count($result)>0)?($result[0]->ID):0;
		return $result;
    }
    public function get_user_id_from_email($username) {
		$id = User::where('email', $username)->value('id');
		return $id;
    }
    public function get_user($user_id) {
		$result = User::where('id', $user_id)->first();
		return $result;
    }
    public function marks(){ 
		return view('user/marks/testmarks');
    }
    public function mytables(Request $request){
        $data = array();
        $owner_id = Auth::id();
        $result = Table::where('Table_Owner', $owner_id)->orderBy('Time', 'DESC')->get();
        
        return view('user/table/tables', ['user_tables' =>$result]);
    }
   
}
