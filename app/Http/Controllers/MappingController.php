<?php

namespace App\Http\Controllers;
use App\Models\Cemetery;
use App\Models\People;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MappingController extends Controller
{
    public function map()
    {
        return view('map');
    }

    public function cemetery()
    {
        return Cemetery::get();
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
            'born_date' => $request->born_date." ".date('H:i:s'),
            'die_date' => $request->die_date." ".date('H:i:s'),
            'block_no' => $request->block_no,
            'grave_no' => 0
        ]);

        if ($people) {
            Cemetery::insert([
                'cemetery_no' => $request->cemetery_no,
                'status' => 'reserve'
            ]);
        }

        return back()->with('success', 'Succesfully reserve !!');
    }

    public function getOnePeople(Request $request, $cemetery_no)
    {
        $people = People::where('cemetery_no', $cemetery_no)->get();
        return $people[0];
    }

    public function accept(Request $request, $cemetery_no)
    {
        Cemetery::where('cemetery_no', $cemetery_no)
        ->update([
            'status' => 'occupied'
        ]);
        return back()->with('success', 'Done succesfully !!');
    }

    public function denied(Request $request, $cemetery_no)
    {
        People::where('cemetery_no', $cemetery_no)->delete();
        Cemetery::where('cemetery_no', $cemetery_no)->delete();
        return back()->with('delete', 'Delete succesfully !!');
    }
}
