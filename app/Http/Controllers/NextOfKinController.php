<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NextOfKin;
use App\Models\RelatedPerson;


class NextOfKinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kin = NextOfKin::with('relatedPersons')->get();
        return view('next_of_kin.index', compact('kin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customFields = CustomField::where('table', 'members')
        ->where('status', 1)
        ->orderBy("id", "asc")
        ->get();

    return view('backend.member.kin_create', compact('customFields', 'memberNo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kin_full_name' => 'required',
            'kin_phone' => 'required',
        ]);
        $nextOfKin = NextOfKin::create($request->only(['kin_full_name', 'kin_address', 'kin_id_number', 'kin_phone', 'kin_email', 'kin_relationship']));
        
        if ($request->has('related_persons')) {
            foreach ($request->related_persons as $person) {
                $nextOfKin->relatedPersons()->create($person);
            }
        }
        return redirect()->route('next_of_kin.index')->with('success', 'Next of Kin added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('next_of_kin.edit', compact('nextOfKin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'principal_name' => 'required',
            'kin_full_name' => 'required',
        ]);
        $nextOfKin->update($request->only(['principal_name', 'dob', 'id_number', 'payroll_number', 'welfare_membership_no', 'mobile_number', 'email', 'department', 'station', 'kin_full_name', 'kin_address', 'kin_id_number', 'kin_phone', 'kin_email', 'kin_relationship']));
        return redirect()->route('next_of_kin.index')->with('success', 'Next of Kin updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $nextOfKin->delete();
        return redirect()->route('next_of_kin.index')->with('success', 'Next of Kin deleted successfully');
    }
}
