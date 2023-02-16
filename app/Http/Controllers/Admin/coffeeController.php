<?php

namespace App\Http\Controllers\Admin;

use App\Models\Coffee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\CoffeeFormRequest;

class coffeeController extends Controller
{
    public function index()
    {
        $coffies = Coffee::all();
        return view('admin.coffee.index', compact('coffies'));
    }
    public function create()
    {
        return view('admin.coffee.create');
    }
    public function store(CoffeeFormRequest $request)
    {
        //Store the validated data
        $data = $request->validated();

        //Fetch the selected Coffee
        $Coffee = new Coffee();

        $Coffee->name = $data['name'];
        $Coffee->price = $data['price'];
        $Coffee->description = $data['description'];

        $file = $request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move('uploads/coffee/', $filename);
        $Coffee->image = $filename;

        $Coffee->save();

        return redirect('admin/coffee')->with('message', 'Coffe has been Added');
    }
    public function edit($coffee_id)
    {
        $coffee = Coffee::find($coffee_id);
        return view('admin.coffee.edit', compact('coffee'));
    }

    public function update(CoffeeFormRequest $request, $coffee_id)
    {
        //Store the validated data
        $data = $request->validated();

        //Fetch the selected Coffee
        $coffee = Coffee::find($coffee_id);

        //Update
        $coffee->name = $data['name'];
        $coffee->price = $data['price'];
        $coffee->description = $data['description'];

        if ($request->hasfile('image')) {

            //Delete the image from upload folder
            $destination = 'uploads/coffee/' . $coffee->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            //Update the image
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/coffee/', $filename);
            $coffee->image = $filename;
        }

        $coffee->update();

        return redirect('admin/coffee')->with('message', 'Coffe has been Updated');
    }

    public function destroy($coffee_id)
    {
        $coffee = Coffee::find($coffee_id);

        if ($coffee) {
            $coffee->delete();
            return redirect('admin/coffee')->with('message', 'Coffe has been Deleted');
        } else {
            return redirect('admin/coffee')->with('message', 'No Coffe With this ID');
        }
    }

    //
}
