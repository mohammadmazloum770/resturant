<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Food;
use \App\Models\Book;

use App\Models\Chef;
use App\Models\Waiter;
use App\Models\WorkLog;
use Illuminate\Support\Facades\Hash;


use \App\Models\Order;

use Illuminate\Support\Facades\DB;



class AdminController extends Controller
{
    public function add_food()
    {
        return view('admin.add_food');
    }

    public function show_food()
    {
        return view('admin.show_food');
    }

    public function update_food($id)
    {
        $food = Food::findOrFail($id); // Retrieve the food item by ID
        return view('admin.update-food', compact('food')); // Pass the $food variable to the view
    }

  
    public function upload_food(Request $request) {
        $data = new Food;

        $data->title = $request->title;
        $data->detail = $request->details;
        $data->price = $request->price;
        $image = $request->img;
        $filename = time().'.'.$image->getClientOriginalExtension();
        $request->img->move('food_img',$filename);
        $data->image = $filename;
        $data->save();
        return redirect()->back();


    }
    public function view_food() {
        $data = Food::all();
        return view('admin.show_food',compact('data'));
    }
    public function delete_food($id) {
        $data = Food::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function edit_food(Request $request, $id) {
        $data = Food::find($id);
        $data->title = $request->title;
        $data->detail = $request->details;
        $data->price = $request->price;
        $image = $request->image;
        if($image) {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('food_img',$imagename);
            $data->image = $imagename;
        }
        $data->save();
        return redirect('view_food');
    }

    public function orders() {
        $data = Order::all();

        return view('admin.order',compact('data'));
    }

    public function on_the_way($id) {

        $data = Order::find($id);

        $data->delivery_status = "On the way";

        $data->save();
        return redirect()->back();




    }

    public function delivered($id){
        $data = Order::find($id);

        $data->delivery_status = "Delivered";

        $data->save();
        return redirect()->back();

    }

    public function canceled($id){
        $data = Order::find($id);

        $data->delivery_status = "Canceled";

        $data->save();
        return redirect()->back();

    }

    public function reservations(){

        $book = Book::all();
       
       
     return view('admin.reservation',compact('book'));
    }

    // Removed duplicate addChefForm method to resolve the conflict

    // Removed duplicate storeChef method to resolve the conflict

    public function addWaiterForm()
    {
        return view('admin.add_waiter');
    }

    public function storeWaiter(Request $request)
    {
        Waiter::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', 'Waiter added successfully!');
    }

    public function workLogs()
    {
        $workLogs = WorkLog::all();
        return view('admin.work_logs', compact('workLogs'));
    }

    public function addChefForm()
    {
        return view('admin.add_chef'); // Ensure this view exists
    }

    // Store Chef Details
    public function storeChef(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:chefs,email',
            'password' => 'required|string|min:6',
        ]);

        Chef::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', 'Chef added successfully!');
    }
}





