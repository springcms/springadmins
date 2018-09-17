<?php
namespace SpringCms\SpringAdmins\App\Http\Resources;


use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use SpringCms\SpringAdmins\Models\SystemUser;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use SpringCms\SpringAdmins\App\Http\SpringAdminsBaseController;

class SystemUsersController extends SpringAdminsBaseController
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$orders = SpringAdmin::search($request['sfullname'])->raw();
          //dd($request);
        $users = SystemUser::orderBy('id', 'desc')->paginate(4);
        $data = [
            'users' => $users,
        ];
        return view($this->_packageTag . '::admin.systemusers.show-users', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->_packageTag . '::admin.systemusers.create-users');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'fullname' => 'required|string|max:150',
            'loginname' => 'required|string|max:20|unique:system_users',
            'password' => 'required|string|confirmed|min:6',
            'password_confirmation' => 'required|string|same:password',
        ];
        $messages = [
            'loginname.unique' => trans('springadmins::springadmins.messages.userNameTaken'),
            'fullname.required' => trans('springadmins::springadmins.messages.userNameRequired'),
            'password.required' => trans('springadmins::springadmins.messages.passwordRequired'),
            'password.min' => trans('springadmins::springadmins.messages.PasswordMin'),
            'password.max' => trans('springadmins::springadmins.messages.PasswordMax'),
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $user = SystemUser::create([
            'fullname' => $request->input('fullname'),
            'loginname' => $request->input('loginname'),
            'password' => bcrypt($request->input('password')),
        ]);
        $user->save();
        $user->assignRole('moderator');

        return redirect('/springadmins/system-users')->with('success', trans('springadmins::springadmins.messages.user-creation-success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = SystemUser::findOrFail($id);
        $data = [
            'user' => $user,
        ];
        return view($this->_packageTag . '::admin.usersadmin.edit-users1')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $rules = [
            'fullname' => 'required|string|max:255',
            'loginname' => 'required|string|max:255|unique:system_users',

        ];
        $messages = [
            'loginname.unique' => trans('springadmins::springadmins.messages.userNameTaken'),
            'loginname.required' => trans('springadmins::springadmins.messages.userNameRequired'),
            'fullname.required' => trans('springadmins::springadmins.messages.userNameRequired'),

        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = SystemUser::findOrFail($id);

        $user->fullname = $request->input('fullname');
        $user->loginname = $request->input('loginname');
        $user->save();
        return redirect('/springadmins/system-users')->with('success', trans('springadmins::springadmins.messages.user-creation-success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $user = SystemUser::findOrFail($id);
        $user->delete();
        return redirect('/springadmins/system-users')->with('success', trans('springadmins::springadmins.messages.user-creation-success'));
    }
}
