<?php

namespace App\Http\Controllers;
use App\Models\Cemetery;
use App\Models\People;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class MappingController extends Controller
{
    public function map()
    {
        // if ($route == 'request') {
        //     $option = 'reserve';
        // } else {
        //     $option = 'occupied';
        // }
        $peoples = People::where('status', 'reserve')->get();
        return view('map', ['peoples' => $peoples]);
    }

    public function map2()
    {
        // if ($route == 'request') {
        //     $option = 'reserve';
        // } else {
        //     $option = 'occupied';
        // }
        $peoples = People::where('status', 'occupied')->get();
        return view('map2', ['peoples' => $peoples]);
    }

    public function mapUser()
    {
        return view('map-user');
    }

    public function cemetery()
    {
        return People::get();
    }

    public function reserve(Request $request)
    {
        // $request->validate([
        //     'file_name' => 'max:2000 | mimes:jpeg,png,jpg,docx,pdf,xlsx',
        // ]);

        // $file_name = $request->file_name;
        // if($file_name) {
        //     $filename = time() .'.'.$file_name->getClientOriginalName();
        //      Storage::disk('local')->putFileAs('public/people', $file_name, $filename);
        // }

        $filename = "img";

        $time = date('H:i:s');
        $people = People::insert([
            'cemetery_no' => $request->cemetery_no,
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'user_image' => $filename,
            'born_date' => date('Y-m-d H:i:s'),
            'die_date' => date('Y-m-d H:i:s'),
            'block_no' => $request->block_no,
            'grave_no' => 0,
            'status' => 'reserve',
            'created_by' => Auth::user()->role,
            'type_of_lot' => $request->lot,
            'middle_name' => $request->middlename
        ]);

        // if ($people) {
        //     Cemetery::insert([
        //         'cemetery_no' => $request->cemetery_no,
        //         'status' => 'reserve',
        //         'created_by' => Auth::user()->role
        //     ]);
        // }

        return back()->with('success', 'Succesfully reserve !!');
    }

    public function getOnePeople(Request $request, $cemetery_no)
    {
        $people = People::where('cemetery_no', $cemetery_no)->get();
        return $people;
    }

    public function editOnePeople(Request $request, $cemetery_no)
    {
        $people = People::where('id', $cemetery_no)->get();
        return $people[0];
    }

    public function accept(Request $request, $cemetery_no)
    {
        People::where('id', $cemetery_no)
        ->update([
            'status' => 'occupied'
        ]);
        return back()->with('success2', 'Done succesfully !!');
    }

    public function denied(Request $request, $cemetery_no)
    {
        People::where('id', $cemetery_no)->delete();
        Cemetery::where('cemetery_no', $cemetery_no)->delete();
        return back()->with('delete', 'Delete succesfully !!');
    }

    public function edit(Request $request, $cemetery_no)
    {
        $people = People::where('id', $cemetery_no)->get();
        return $people[0];
    }

    public function update(Request $request)
    {
        $people = People::where('id', $request->cemetery_no)
        ->update([
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'type_of_lot' => $request->lot,
            'middle_name' => $request->middlename
        ]);
        return back()->with('update', 'Update succesfully !!');
    }
}
