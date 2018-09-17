<?php

namespace SpringCms\SpringAdmins\App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use SpringCms\SpringAdmins\Models\Customer;
use SpringCms\SpringAdmins\Models\CusAccount;
use SpringCms\SpringAdmins\Models\CusInformation;
use  Illuminate\Support\Facades\DB;
use SpringCms\SpringAdmins\App\Http\SpringAdminsBaseController;
use SpringCms\SpringAdmins\Traits\Authorizable;

class CustomersController extends SpringAdminsBaseController
{
    use Authorizable;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$customers = DB::table('customers')->paginate(15);

        $customers = DB::table('customers')
            ->join('cus_informations', 'customers.id', '=', 'cus_informations.cus_id')           
            ->select('customers.*', 'cus_informations.fullname','cus_informations.phonenumber','cus_informations.email')
            ->paginate(4); 
        $data = [
            'customers' => $customers,
        ];
        return view($this->_packageTag . '::admin.customers.show', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'title' => 'required|string|max:150',
            'name' => 'required|string|max:20|unique:system_menus',
        ];
        $messages = [
            'title.required' => trans('The menu title is required'),
            'name.required' => trans('The menu name is required'),
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator, 'create')->withInput();
        }
        $menu = SystemMenu::create([
            'title' => $request->input('title'),
            'name' => $request->input('name'),
        ]);
        $menu->save();
        return redirect('/springadmins/system-menus')->with('success', trans('Create new menu success'));
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
        $menu = SystemMenu::findOrFail($id);
        $data = [
            'menu' => $menu,
        ];
        return view($this->_packageTag . '::admin.systemmenus.edit')->with($data);
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
            'title' => 'required|string|max:150',
            'name' => 'required|string|min:6|max:20',
        ];
        $messages = [
            'title.required' => trans('The menu title is required'),
            'name.required' => trans('The menu name is required'),
            'name.min' => trans('The menu name must be 6 characters'),
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator, 'edit')->withInput();
        }
        $menu = SystemMenu::findOrFail($id);

        $menu->title = $request->input('title');
        $menu->name = $request->input('name');
        $menu->save();
        return redirect('/springadmins/system-menus')->with('success', trans('Edit menu success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = SystemMenu::findOrFail($id);
        $menu->delete();
        return redirect('/springadmins/system-menus')->with('success', trans('Delete menu success'));
    }
}
