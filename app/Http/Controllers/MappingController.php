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
        $peoples = People::where('status', 'reserve')->where('is_owner', '0')->get();
        return view('map', ['peoples' => $peoples]);
    }

    public function map2()
    {
        // if ($route == 'request') {
        //     $option = 'reserve';
        // } else {
        //     $option = 'occupied';
        // }
        $peoples = People::where('status', 'occupied')->where('is_owner', '0')->get();
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


        $filename = "img";

        $time = date('H:i:s');
        $people = People::insert([
            'cemetery_no' => $request->cemetery_no,
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'user_image' => $filename,
            'date_acquired' => date('Y-m-d H:i:s'),
            'block_no' => $request->block_no,
            'grave_no' => 0,
            'status' => 'owner',
            'created_by' => Auth::user()->role,
            'type_of_lot' => $request->lot,
            'middle_name' => $request->middlename,
            'is_owner' => '1'
        ]);


        return back()->with('success', 'Succesfully reserve !!');
    }

    public function reserve2(Request $request)
    {
        $owners = People::where('cemetery_no', $request->cemetery_no)->get();
        $owner = People::where('id', $owners[0]->id)
        ->update([
            'status' => 'reserve'
        ]);

        $filename = "img";

        $time = date('H:i:s');

        $people = People::insert([
            'cemetery_no' => $request->cemetery_no,
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'user_image' => $filename,
            'born_date' => $request->born_date." ".date('H:i:s'),
            'die_date' => $request->die_date." ".date('H:i:s'),
            'block_no' => $request->block_no,
            'grave_no' => 0,
            'status' => 'reserve',
            'created_by' => Auth::user()->role,
            'type_of_lot' => $owners[0]->type_of_lot,
            'middle_name' => $request->middlename,
            'is_owner' => '0'
        ]);

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
        $people = People::where('id', $cemetery_no)->get();
        $owner = People::where('cemetery_no', $people[0]->cemetery_no)->get();

        $owner = People::where('id', $owner[0]->id)
        ->update([
            'status' => 'occupied'
        ]);

        $deceased = People::where('id', $cemetery_no)
        ->update([
            'status' => 'occupied'
        ]);
        return back()->with('success2', 'Done succesfully !!');
    }

    public function denied(Request $request, $cemetery_no)
    {
        $people = People::where('id', $cemetery_no)->get();
        $owner = People::where('cemetery_no', $people[0]->cemetery_no)->get();

        $owner = People::where('id', $owner[0]->id)
        ->update([
            'status' => 'reserve'
        ]);

        People::where('id', $cemetery_no)->delete();
        Cemetery::where('cemetery_no', $cemetery_no)->delete();
        return back()->with('delete', 'Delete succesfully !!');
    }

    public function edit(Request $request, $cemetery_no)
    {
        $people = People::where('id', $cemetery_no)->get();
        $owner = People::where('cemetery_no', $people[0]->cemetery_no)->get();
        return [
            "people" => $people[0],
            "owner" => $owner[0]
        ];
    }

    public function update(Request $request)
    {
        $people = People::where('id', $request->cemetery_no)
        ->update([
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'middle_name' => $request->middlename
        ]);

        return back()->with('update', 'Update succesfully !!');
    }
}
