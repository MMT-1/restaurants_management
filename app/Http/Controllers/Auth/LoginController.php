<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use Spatie\Activitylog\LogOptions;
use App\Http\Controllers\Controller;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class LoginController extends Controller
{
    
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers,LogsActivity;



   

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
    public function __construct()
    {
            $this->middleware('guest')->except('logout');
            $this->middleware('guest:admin')->except('logout');
            $this->middleware('guest:owner')->except('logout');
    }


    public function logout(Request $request)
    {
        $user = Auth::user(); // Get the currently authenticated user

        if ($user) {
            $logOptions = $this->getActivitylogOptions(); // Get the activity log options

            activity()
                ->useLog($logOptions->logName)
                ->performedOn($user)
                ->log('logged out: ' . $user->email);
        }

        Auth::logout(); // Perform the actual logout

        $request->session()->invalidate(); // Invalidate the session

        $request->session()->regenerateToken(); // Regenerate the CSRF token
        return redirect('/'); // Redirect to the desired page after logout
    }

    
    public function showAdminLoginForm()
    {
        return view('admin.auth.login', ['url' => 'admin']);
    }

    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            $userType = 'admin';
            $logOptions = $this->getActivitylogOptions($userType);

            activity()
                ->useLog($logOptions->logName)
                ->log('Admin logged in: ' . $request->email);
    
            // Set the subject type and ID
       
            return redirect()->intended('/admin/dashboard');
        }
        return redirect()->route('admin.login')
        ->with('message','These credentials do not match our records');
    }

    public function showOwnerLoginForm()
    {
        return view('owner.auth.login', ['url' => 'owner']);
    }

    public function ownerLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('owner')->attempt(['email' => $request->email, 'password' => $request->password,'status'=>1], $request->get('remember'))) {
            $userType = 'owner';
            $logOptions = $this->getActivitylogOptions($userType);

            activity()
                ->useLog($logOptions->logName)
                ->log('Owner logged in: ' . $request->email);
    
        
            return redirect()->intended('/owner/dashboard');
        }
        return redirect()->route('owner.login')
        ->with('message','These credentials do not match our records');
    }

    public function showCustomerLoginForm()
    {
        return view('auth.login', ['url' => 'customer']);
    }

    public function customerLogin(Request $request)
    
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password,'status'=>1], $request->get('remember'))) {
            $userType = 'customer';
            $logOptions = $this->getActivitylogOptions($userType);

            activity()
                ->useLog($logOptions->logName)
                ->log('Customer logged in: ' . $request->email);
    
            // Set the subject type and ID
    
            // Set the batch ID
    

            return redirect()->intended('customer/login');
        }
        return redirect()->route('customer.login')
        ->with('message','These credentials do not match our records');
    }




    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['email'])
            ->useLogName('Authentication')
            ->logFillable();
    }
}