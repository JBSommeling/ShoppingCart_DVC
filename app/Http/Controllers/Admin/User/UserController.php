<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Method to display all users in Admin User Panel.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index(){
        $users = User::all();
        $authUser = Auth::user()->name;
        return view('admin.users.index', compact('users', 'authUser'));
    }

    /**
     * Method to store new Role in database
     * @param Request $request - contains all POST-values.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeRole(Request $request){
        $validatedData = Validator::make($request->all(),[
            'user_id' => 'required',
                'roles' => 'required|in:admin,user'
            ],
            [
                'required' => 'You need to fill in a :attribute',
                'in' => 'Either admin or user is allowed'
            ]

    );
        if ($validatedData->fails()){
            $errormessages = $validatedData->messages()->get('*');
            return redirect()->back()->withErrors($errormessages);
        }
        else{
            $user = new User();
            $user->editRole($request->user_id, $request->roles);
            return redirect()->route('admin.user.index');
        }
    }


    /**
     * Method to delete user and all its records in order, order_detail and order_product tables.
     * Used Eloquent for database queries.
     * @param $user_id - the id of the user to be deleted.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($user_id){
        $user = User::find($user_id);

        // To delete every record in related tables.
        foreach ($user->orders as $order){
            $order->order_detail()->delete();
            $order->order_product()->delete();
            $order->delete();
        }

        Session::forget('cart');
        $user->delete();
        return redirect()->route('admin.user.index');
    }
}
