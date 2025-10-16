<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
    public function createJoin(Request $request)
    {
        return view('backend.member.join');
    }

    public function storeJoin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string|max:255',
            'id_number' => 'required|string|max:255|unique:members,id_number',
            'institution' => 'required|string|max:255',
            'work_station' => 'required|string|max:255',
            'state_department' => 'required|string|max:255',
            'payroll_number' => 'required|string|max:255|unique:members,payroll_number',
            'email_address' => 'required|email|max:255|unique:users,email',
            'phone_numbers' => 'required|string|max:255',
            'postal_address' => 'required|string|max:255',
            'declaration_agree' => 'accepted',
        ]);

        if ($validator->fails()) {
            return redirect()->route('join.join')
                ->withErrors($validator)
                ->withInput();
        }

        $request->session()->put('registration_data', $request->all());

        return redirect()->route('join.kin');
    }

    public function createKin(Request $request)
    {
        $registration_data = $request->session()->get('registration_data');
        if (!$registration_data) {
            return redirect()->route('join.join');
        }
        return view('backend.member.kin_create');
    }

    public function storeKin(Request $request)
    {
        $request->validate([
            'kin_full_name' => 'required|string|max:255',
            'kin_address' => 'required|string|max:255',
            'kin_id_number' => 'required|string|max:255',
            'kin_phone' => 'required|string|max:255',
            'kin_email' => 'nullable|email|max:255',
            'kin_relationship' => 'required|string|max:255',
        ]);

        $request->session()->put('kin_data', $request->all());

        return redirect()->route('join.spouse');
    }

    public function createSpouse(Request $request)
    {
        $registration_data = $request->session()->get('registration_data');
        if (!$registration_data) {
            return redirect()->route('join.join');
        }
        return view('backend.member.spouse_create');
    }

    public function storeSpouse(Request $request)
    {
        $request->session()->put('spouse_data', $request->all());
        return redirect()->route('join.children');
    }

    public function createChildren(Request $request)
    {
        $registration_data = $request->session()->get('registration_data');
        if (!$registration_data) {
            return redirect()->route('join.join');
        }
        $member = new \App\Models\Member($registration_data);
        return view('backend.member.children_create', compact('member'));
    }

    public function storeChildren(Request $request)
    {
        $request->session()->put('children_data', $request->all());
        return redirect()->route('join.parents');
    }

    public function createParents(Request $request)
    {
        $registration_data = $request->session()->get('registration_data');
        if (!$registration_data) {
            return redirect()->route('join.join');
        }
        $member = new \App\Models\Member($registration_data);
        return view('backend.member.parents_create', compact('member'));
    }

    public function storeParents(Request $request)
    {
        $request->session()->put('parents_data', $request->all());
        return redirect()->route('join.parentsinlaw');
    }

    public function createParentsInLaw(Request $request)
    {
        $registration_data = $request->session()->get('registration_data');
        if (!$registration_data) {
            return redirect()->route('join.join');
        }
        $member = new \App\Models\Member($registration_data);
        return view('backend.member.parentsinlaw_create', compact('member'));
    }

    public function storeParentsInLaw(Request $request)
    {
        $request->session()->put('parentsinlaw_data', $request->all());

        $registration_data = $request->session()->get('registration_data');
        $kin_data = $request->session()->get('kin_data');
        $spouse_data = $request->session()->get('spouse_data');
        $children_data = $request->session()->get('children_data');
        $parents_data = $request->session()->get('parents_data');
        $parentsinlaw_data = $request->session()->get('parentsinlaw_data');

        DB::beginTransaction();

        // Create User
        $user = new User();
        $user->name = $registration_data['full_name'];
        $user->email = $registration_data['email_address'];
        $user->password = Hash::make('123456');
        $user->user_type = 'customer';
        $user->status = 0; // Pending approval
        $user->save();

        // Create Member
        $member = new Member();
        $name_parts = explode(' ', $registration_data['full_name'], 2);
        $member->first_name = $name_parts[0];
        $member->last_name = $name_parts[1] ?? '';
        $member->id_number = $registration_data['id_number'];
        $member->institution = $registration_data['institution'];
        $member->work_station = $registration_data['work_station'];
        $member->state_department = $registration_data['state_department'];
        $member->payroll_number = $registration_data['payroll_number'];
        $member->email = $registration_data['email_address'];
        $member->phone_numbers = $registration_data['phone_numbers'];
        $member->postal_address = $registration_data['postal_address'];
        $member->declaration_agree = isset($registration_data['declaration_agree']);
        $member->user_id = $user->id;
        $member->status = 0; // Pending approval

        // Kin
        $member->nextofkin_name = $kin_data['kin_full_name'] ?? null;
        $member->nextofkin_address = $kin_data['kin_address'] ?? null;
        $member->nextofkin_id_number = $kin_data['kin_id_number'] ?? null;
        $member->nextofkin_phone_number = $kin_data['kin_phone'] ?? null;
        $member->nextofkin_email = $kin_data['kin_email'] ?? null;
        $member->nextofkin_Relationship = $kin_data['kin_relationship'] ?? null;

        // Spouse
        $member->spouse_name = $spouse_data['spouse_name'] ?? null;
        $member->spouse_address = $spouse_data['spouse_address'] ?? null;
        $member->spouse_id_number = $spouse_data['spouse_id_number'] ?? null;
        $member->spouse_phone_number = $spouse_data['spouse_phone_number'] ?? null;
        $member->spouse_email = $spouse_data['spouse_email'] ?? null;

        // Children
        $member->child_name = isset($children_data['child_name']) ? json_encode($children_data['child_name']) : null;
        $member->child_age = isset($children_data['child_age']) ? json_encode($children_data['child_age']) : null;
        $member->child_phone_number = isset($children_data['child_phone_number']) ? json_encode($children_data['child_phone_number']) : null;

        // Parents
        $member->parent_name = isset($parents_data['parent_name']) ? json_encode($parents_data['parent_name']) : null;
        $member->parent_relationship = isset($parents_data['parent_relationship']) ? json_encode($parents_data['parent_relationship']) : null;
        
        // Parents In Law
        $custom_fields = [];
        $custom_fields['parent_in_law_name'] = $parentsinlaw_data['parent_in_law_name'] ?? null;
        $custom_fields['parent_in_law_relationship'] = $parentsinlaw_data['parent_in_law_relationship'] ?? null;
        $member->custom_fields = json_encode($custom_fields);

        $member->save();

        DB::commit();

        // Clear session data
        $request->session()->forget(['registration_data', 'kin_data', 'spouse_data', 'children_data', 'parents_data', 'parentsinlaw_data']);

        return redirect()->route('login')->with('success', 'Registration complete. Your application is pending approval.');
    }
}