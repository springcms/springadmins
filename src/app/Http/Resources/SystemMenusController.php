<?php

namespace SpringCms\SpringAdmins\App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use SpringCms\SpringAdmins\Models\SystemMenu;
use SpringCms\SpringAdmins\App\Http\SpringAdminsBaseController;

class SystemMenusController extends SpringAdminsBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu_systems = SystemMenu::orderBy('id', 'desc')->paginate(4);
        $data = [
            'menu_systems' => $menu_systems,
        ];
        return view($this->_packageTag.'::admin.systemmenus.show',$data);
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
            'title'                  => 'required|string|max:150',
            'name'                 => 'required|string|max:20|unique:system_menus',          
        ];
        $messages = [            
            'title.required'  => trans('The menu title is required'),
            'name.required'   => trans('The menu name is required'),            
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {            
            return back()->withErrors($validator,'create')->withInput();
        }
        $menu = SystemMenu::create([
            'title'    => $request->input('title'),
            'name'=> $request->input('name'),            
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
            'menu'=> $menu,
        ];
        return view($this->_packageTag.'::admin.systemmenus.edit')->with($data);
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
            'title'                  => 'required|string|max:150',
            'name'                 => 'required|string|min:6|max:20',          
        ];
        $messages = [            
            'title.required'  => trans('The menu title is required'),
            'name.required'   => trans('The menu name is required'),
             'name.min'   => trans('The menu name must be 6 characters'),            
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {            
            return back()->withErrors($validator,'edit')->withInput();
        }
        $menu = SystemMenu::findOrFail($id); 

        $menu->title=$request->input('title');
        $menu->name=$request->input('name');
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
