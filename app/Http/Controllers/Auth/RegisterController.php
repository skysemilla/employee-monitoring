<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Role;
use App\Log;
use Auth;
use App\Employee;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
  /*  public function __construct()
    {
        $this->middleware('guest');
    }*/
/*    public function __construct()
    {
        $this->middleware('admin');
    }
*/
     public function __construct() {
        $this->middleware(['auth']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
  /*  public function __construct()
      {
        $this->middleware('auth');
      }*/
  /*  public function index(Request $request)
      {
        $request->user()->authorizeRoles(['admin']);
        return view(‘home’);
      }*/
      public function index(Request $request)
      {

        $request->user()->authorizeRoles(['admin']);
        $users = User::all()->toArray();
        
        return view('admin', compact('users'));
        
      }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
           /* 'email' => 'required|string|email|max:255|unique:users',*/
            'username' => 'required|string|max:255|unique:users',
            'functional_unit' => 'string|max:255',
            'status' => 'string|max:255',
            'supervisor_id' => 'integer|max:255',
            'type' => 'required|string|max:50',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
      /*  return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'type' => $data['type'],
            'password' => bcrypt($data['password']),
        ]);*/
        $user = User::create([
          'name'     => $data['name'],
    /*      'email'    => $data['email'],*/
          'username'    => $data['username'],
          'functional_unit'    => $data['functional_unit'],
          'status'    => $data['status'],
          'type'       => $data['type'],
          'supervisor_id'       => $data['supervisor_id'],
          'password' => bcrypt($data['password']),
        ]);
        $user->hasActiveReport=false;
        $user
           ->roles()
           ->attach(Role::where('name', $user->type)->first());
        if($user->supervisor_id ==-1){
          $headofoffice = User::where([
                ['type', '=', "headofoffice"],
                ['status', '=', "active"]
            ])->get()->first();
          $user->supervisor_id = $headofoffice->id;
        }
        $user->save();
        $description = Auth::user()->username.' created new account (id:'.$user->id.', username: '.$user->username.' )';
        $log = new Log([
          'description' => $description
        ]);
        $log->save();

       
        return redirect('admin/home');
    }

 /*   public function index()
    {   
   
        $users = User::all()->toArray();
        
        return view('admin', compact('users'));
    }
   */
}
