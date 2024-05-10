<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Company;
use App\Models\Country;
use App\Models\Individual;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Http;

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
    // protected $redirectTo = RouteServiceProvider::HOME;

    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function showRegistrationForm()
    {
        // $countries = Country::orderBy('name','asc')->pluck('name', 'id');
        $my_countries = Country::whereIn('id', [32,100,129,188,209])->get();
        $all_countries = Country::all()->except([32,100,129,188,209]);
        $merged = $my_countries->merge($all_countries);
        $countries = $merged->all();

        $phone_prefixData = Country::orderBy('name','desc')->whereNotNull('calling_code')->get();
        $phone_prefix = [];

        foreach ($phone_prefixData as $value) {
            if(!empty($value->calling_code)){
                $phone_prefix[$value->id] = $value->name." +".$value->calling_code;
                // $phone_prefix[$value->calling_code] = $value->name." +".$value->calling_code;
            }
        }
        $phone_prefix = array_reverse($phone_prefix,true);

        $google2fa = app('pragmarx.google2fa');
        $google2fa_secret = $google2fa->generateSecretKey();

        $qr_image = $google2fa->getQRCodeInline(
            config('app.name'),
            rand(),
            $google2fa_secret
        );

        $agents = Http::get('http://178.128.52.63/calcrm/api/get/agents');
        $agentData = json_decode($agents->getBody(), true);

        return view('auth.register', [
            'countries' => $countries,
            'phone_prefix' => $phone_prefix,
            'google2fa_secret' => $google2fa_secret,
            'qr_image' => $qr_image,
            'agents' => $agentData
        ]);
    }

    public function register(Request $request)
    {

        // return $request->all();

        //$this->validator($request->all())->validate();

        /*$requestData = $request->all();
        $requestData['role_id'] = 1;
        $requestData['model_type'] = "App\User";*/

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);
        
        return $this->registered($request, $user)
            ?: redirect('/email/verify');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // return User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        // ]);
        
        $role_id = $data['role_id'];
        
        if ($role_id == 2) {

            $user =  User::create([
                'role_id' => $data['role_id'],
                'model_type' => "App\Models\User",
                'salutation' => $data['salutation'],
                'first_name' => trim($data['first_name']),
                'gender' => $data['gender'],
                'bday' => $data['dob'],
                'address_line1' => $data['address_line1'],
                'address_line2' => $data['address_line2'],
                'country' => $data['users-country'],
                'state' => $data['users-state'],
                'city' => $data['city'],
                'post_code' => $data['postcode'],
                'mobile_prefix' => $data['mobile_prefix'],
                'mobile_no' => $data['mobile_no'],
                'peremail' => $data['peremail'],
                'agent_email' => $data['agent_email'],
                'email' => strtolower(trim($data['email'])),
                'password' => Hash::make($data['password']),
                'ip_address' => \Request::getClientIp(true),
                'status' => 1,
                'active' => 1,
                '2fa_status' => 1, 
                '2fa_key' => $data['secretcode'],
            ]);

            $source_wealth = implode(", ",$data['source_wealth']);

            $individual_user =  Individual::create([

                'user_id' => $user->id,
                'salutation' => $data['salutation'],
                'name' => trim($data['first_name']),
                'gender' => $data['gender'],
                'dob' => $data['dob'],
                'country_residence' => $data['country_residence'],
                'nationality' => $data['nationality'],
                'passport' => $data['passport'],
                'occupation' => $data['occupation'],
                'employer_name' => $data['employer_name'],
                'annual_income' => $data['annual_income'],
                'source_wealth' => $source_wealth,
                'source_wealth_other' => $data['source_wealth_other'],
            ]);

        } else {

            $user =  User::create([
                'role_id' => $data['role_id'],
                'model_type' => "App\Models\User",
                'last_name' => trim($data['last_name']),
                'gender' => $data['gender'],
                'bday' => $data['dob'],
                'address_line1' => $data['address_line1'],
                'address_line2' => $data['address_line2'],
                'country' => $data['users-country'],
                'state' => $data['users-state'],
                'city' => $data['city'],
                'post_code' => $data['postcode'],
                'mobile_prefix' => $data['mobile_prefix'],
                'mobile_no' => $data['mobile_no'],
                'peremail' => $data['peremail'],
                'agent_email' => $data['agent_email'],
                'email' => strtolower(trim($data['email'])),
                'password' => Hash::make($data['password']),
                'ip_address' => \Request::getClientIp(true),
                'status' => 1,
                'active' => 1,
                '2fa_status' => 1, 
                '2fa_key' => $data['secretcode'],
            ]);

            $company_user =  Company::create([
                'user_id' => $user->id,
                'name' => trim($data['last_name']),
                'company_reg_no' => $data['company_reg_no'],
                'country_corporate' => $data['company_country_corporate'],
                'date_corporation' => $data['date_corporation'],
                'business_activity' => $data['business_activity'],
                'type_company' => $data['type_company'],
                'other_type_desc' => $data['company_others_sub'],
            ]);
        }

        $response = Http::post('http://178.128.52.63/calcrm/api/create/investor', [
            'user_group_id' => 3,
            'salutation' => $data['salutation'],
            'name' => $data['first_name'] == "" ? $data['last_name'] : $data['first_name'],
            'email' => strtolower(trim($data['email'])),
            'country_id' => $data['users-country'],
            'address_line_1' => $data['address_line1'],
            'address_line_2' => $data['address_line2'],
            'city' => $data['city'],
            'state_id' => $data['users-state'],
            'postcode' => $data['postcode'],
            'gender' => $data['gender'],
            'peremail' => $data['peremail'],
            'agent_email' => $data['agent_email']
        ]);

        // $user->sendEmailVerificationNotification();

        return $user;
    }

    protected function registered(Request $request, $user)
    {
        //
    }
}
