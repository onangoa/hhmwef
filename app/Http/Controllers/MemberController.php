<?php

namespace App\Http\Controllers;

use App\Imports\MembersImport;
use App\Mail\GeneralMail;
use App\Models\CustomField;
use App\Models\Member;
use App\Models\Transaction;
use App\Models\User;
use App\Notifications\MemberRequestAccepted;
use App\Utilities\Overrider;
use App\Utilities\SmsHelper;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class MemberController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        date_default_timezone_set(get_option('timezone', 'Asia/Dhaka'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('backend.member.list');
    }

    public function get_table_data() {
        $members = Member::select('members.*')
            ->with('branch')
            ->orderBy("members.id", "desc");

        return Datatables::eloquent($members)
            ->editColumn('branch.name', function ($member) {
                return $member->branch->name;
            })
            ->editColumn('photo', function ($member) {
                $photo = $member->photo != null ? profile_picture($member->photo) : public_asset('backend/images/avatar.png');
                return '<div class="profile_picture text-center">'
                    . '<img src="' . $photo . '" class="thumb-sm img-thumbnail">'
                    . '</div>';
            })
            ->addColumn('action', function ($member) {
                return '<div class="dropdown text-center">'
                . '<button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown">' . _lang('Action')
                . '&nbsp;</button>'
                . '<div class="dropdown-menu">'
                . '<a class="dropdown-item" href="' . route('members.edit', $member->id) . '"><i class="ti-pencil-alt"></i> ' . _lang('Edit') . '</a>'
                . '<a class="dropdown-item" href="' . route('members.show', $member->id) . '"><i class="ti-eye"></i>  ' . _lang('View') . '</a>'
                . '<a class="dropdown-item" href="' . route('member_documents.index', $member->id) . '"><i class="ti-files"></i>  ' . _lang('Documents') . '</a>'
                . '<form action="' . route('members.destroy', $member->id) . '" method="post">'
                . csrf_field()
                . '<input name="_method" type="hidden" value="DELETE">'
                . '<button class="dropdown-item btn-remove" type="submit"><i class="ti-trash"></i> ' . _lang('Delete') . '</button>'
                    . '</form>'
                    . '</div>'
                    . '</div>';
            })
            ->setRowId(function ($member) {
                return "row_" . $member->id;
            })
            ->rawColumns(['photo', 'action'])
            ->make(true);
    }

    public function pending_requests() {
        $data            = array();
        $data['members'] = Member::where('status', 0)
            ->withoutGlobalScopes(['status'])
            ->paginate(10);
        return view('backend.member.pending_requests', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createJoin(Request $request)
    {
        return view('backend.member.join');
    }

   
    public function  register_api(Request $request) {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'id_number' => 'required|string|max:255',
            'payroll_number' => 'nullable|string|max:255',
            'institution' => 'nullable|string|max:255',
            'workstation' => 'nullable|string|max:255',
            'department' => 'nullable|string|max:255',
            'nextofkin_name' => 'nullable|string|max:255',
            'nextofkin_phone_number' => 'nullable|string|max:15',
            'nextofkin_id_number' => 'nullable|string|max:255',
            'nextofkin_email' => 'nullable|email|max:255',
            'nextofkin_address' => 'nullable|string|max:255',
            'nextofkin_Relationship' => 'nullable|string|max:255',
            'nextofkin_name_alt' => 'nullable|string|max:255',
            'nextofkin_phone_number_alt' => 'nullable|string|max:15',
            'nextofkin_Relationship_alt' => 'nullable|string|max:255',
            'spouse_name' => 'nullable|string|max:255',
            'spouse_phone_number' => 'nullable|string|max:15',
            'spouse_id_number' => 'nullable|string|max:255',
            'spouse_email' => 'nullable|email|max:255',
            'spouse_address' => 'nullable|string|max:255',
            'child_name' => 'nullable|array',
            'child_age' => 'nullable|array',
            'child_phone_number' => 'nullable|array',
            'parent_name' => 'nullable|array',
            'parent_relationship' => 'nullable|array',
        ]);
       //return $request->all();

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

         //Create Login details
        
        $user                  = new User();
        $user->name            = $request->input('first_name');
        $user->email           = $request->input('email');
        $user->password        = Hash::make('123456');
        $user->user_type       = 'customer';
        $user->status          = 0;
        //$user->profile_picture = $photo;
        $user->save();
       

        // Create a new member
        $member = Member::create([
            'first_name' => $request->input('first_name'),
            'middle_name' => $request->input('middle_name'),
            'last_name' => $request->input('last_name'),
            'phone_number' => $request->input('phone_number'),
            'email' => $request->input('email'),
            'id_number' => $request->input('id_number'),
            'payroll_number' => $request->input('payroll_number'),
            'institution' => $request->input('institution'),
            'workstation' => $request->input('workstation'),
            'department' => $request->input('department'),
            'nextofkin_name' => $request->input('nextofkin_name'),
            'nextofkin_phone_number' => $request->input('nextofkin_phone_number'),
            'nextofkin_id_number' => $request->input('nextofkin_id_number'),
            'nextofkin_email' => $request->input('nextofkin_email'),
            'nextofkin_address' => $request->input('nextofkin_address'),
            'nextofkin_Relationship' => $request->input('nextofkin_Relationship'),
            'nextofkin_name_alt' => $request->input('nextofkin_name_alt'),
            'nextofkin_phone_number_alt' => $request->input('nextofkin_phone_number_alt'),
            'nextofkin_Relationship_alt' => $request->input('nextofkin_Relationship_alt'),
            'spouse_name' => $request->input('spouse_name'),
            'spouse_phone_number' => $request->input('spouse_phone_number'),
            'spouse_id_number' => $request->input('spouse_id_number'),
            'spouse_email' => $request->input('spouse_email'),
            'spouse_address' => $request->input('spouse_address'),
            'child_name' => json_encode($request->input('child_name')),
            'child_age' => json_encode($request->input('child_age')),
            'child_phone_number' => json_encode($request->input('child_phone_number')),
            'parent_name' => json_encode($request->input('parent_name')),
            'parent_relationship' => json_encode($request->input('parent_relationship')),
            'user_id' => $user->id,
            'status' => 0,
        ]);

        // Return a success response
        return response()->json(['message' => 'Member created successfully', 'member' => $member->email], 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

        return redirect()->route('join.kin.create');
    }

    public function createKin(Request $request)
    {
        $registration_data = $request->session()->get('registration_data');
        $member = new \App\Models\Member($registration_data);
        return view('backend.member.kin_create', compact('member'));
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

        return redirect()->route('join.spouse.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id) {
        $member       = Member::withoutGlobalScopes(['status'])->find($id);
        $customFields = CustomField::where('table', 'members')
            ->where('status', 1)
            ->orderBy("id", "asc")
            ->get();
        if (!$request->ajax()) {
            return view('backend.member.view', compact('member', 'id', 'customFields'));
        } else {
            return view('backend.member.modal.view', compact('member', 'id', 'customFields'));
        }
    }

    public function get_member_transaction_data($member_id) {
        $transactions = Transaction::select('transactions.*')
            ->with(['member', 'account', 'account.savings_type'])
            ->where('member_id', $member_id)
            ->orderBy("transactions.trans_date", "desc");

        return Datatables::eloquent($transactions)
            ->editColumn('member.first_name', function ($transactions) {
                return $transactions->member->first_name . ' ' . $transactions->member->last_name;
            })
            ->editColumn('dr_cr', function ($transactions) {
                return strtoupper($transactions->dr_cr);
            })
            ->editColumn('status', function ($transactions) {
                return transaction_status($transactions->status);
            })
            ->editColumn('amount', function ($transaction) {
                $symbol = $transaction->dr_cr == 'dr' ? '-' : '+';
                $class  = $transaction->dr_cr == 'dr' ? 'text-danger' : 'text-success';
                return '<span class="' . $class . '">' . $symbol . ' ' . decimalPlace($transaction->amount, currency($transaction->account->savings_type->currency->name)) . '</span>';
            })
            ->editColumn('type', function ($transaction) {
                return str_replace('_', ' ', $transaction->type);
            })
            ->filterColumn('member.first_name', function ($query, $keyword) {
                $query->whereHas('member', function ($query) use ($keyword) {
                    return $query->where("first_name", "like", "{$keyword}%")
                        ->orWhere("last_name", "like", "{$keyword}%");
                });
            }, true)
            ->addColumn('action', function ($transaction) {
                return '<div class="dropdown text-center">'
                . '<button class="btn btn-primary btn-xs dropdown-toggle" type="button" data-toggle="dropdown">' . _lang('Action')
                . '&nbsp;</button>'
                . '<div class="dropdown-menu">'
                . '<a class="dropdown-item" href="' . route('transactions.edit', $transaction['id']) . '"><i class="ti-pencil-alt"></i> ' . _lang('Edit') . '</a>'
                . '<a class="dropdown-item" href="' . route('transactions.show', $transaction['id']) . '"><i class="ti-eye"></i>  ' . _lang('View') . '</a>'
                . '<form action="' . route('transactions.destroy', $transaction['id']) . '" method="post">'
                . csrf_field()
                . '<input name="_method" type="hidden" value="DELETE">'
                . '<button class="dropdown-item btn-remove" type="submit"><i class="ti-trash"></i> ' . _lang('Delete') . '</button>'
                    . '</form>'
                    . '</div>'
                    . '</div>';
            })
            ->setRowId(function ($transaction) {
                return "row_" . $transaction->id;
            })
            ->rawColumns(['action', 'status', 'amount'])
            ->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id) {
        $customFields = CustomField::where('table', 'members')
            ->where('status', 1)
            ->orderBy("id", "asc")
            ->get();
        $member = Member::withoutGlobalScopes(['status'])->find($id);
        if (!$request->ajax()) {
            return view('backend.member.edit', compact('member', 'id', 'customFields'));
        } else {
            return view('backend.member.modal.edit', compact('member', 'id', 'customFields'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $member = Member::withoutGlobalScopes(['status'])->find($id);

        $validationRules = [
            'first_name'   => 'required',
            'last_name'    => 'required',
            //'branch_id'    => 'required',
            'email'        => [
                'nullable',
                'email',
                Rule::unique('members')->ignore($id),
            ],
            'member_no'    => [
                'required',
                Rule::unique('members')->ignore($id),
            ],
            'country_code' => 'required_with:mobile',
            'photo'        => 'nullable|image',
            'name'         => 'required_if:client_login,1|max:191', // User Login Attribute
            'login_email' => [
                'required_if:client_login,1',
                Rule::unique('users', 'email')->ignore($member->user_id),
            ], // User Login Attribute
            'password' => 'nullable|max:20|min:6', // User Login Attribute
            'status' => 'required_if:client_login,1', // User Login Attribute
        ];

        $validationMessages = [
            'name.required_if'           => 'Name is required',
            'login_email.required_if'    => 'Email is required',
            'password.required_if'       => 'Password is required',
            'country_code.required_with' => 'Country code is required',
        ];

        // Custom field validation
        $customFields = CustomField::where('table', 'members')
            ->orderBy("id", "desc")
            ->get();
        $customValidation = generate_custom_field_validation($customFields, true);

        $validationRules = array_merge($validationRules, $customValidation['rules']);
        $validationMessages = array_merge($validationMessages, $customValidation['messages']);

        $validator = Validator::make($request->all(), $validationRules, $validationMessages);

        if ($validator->fails()) {
            if ($request->ajax()) {
                return response()->json(['result' => 'error', 'message' => $validator->errors()->all()]);
            } else {
                return redirect()->route('members.edit', $id)
                    ->withErrors($validator)
                    ->withInput();
            }
        }

        if ($request->hasfile('photo')) {
            $file  = $request->file('photo');
            $photo = time() . $file->getClientOriginalName();
            $file->move(public_path() . "/uploads/profile/", $photo);
        }

        DB::beginTransaction();

        // Store custom field data
        $customFieldsData = store_custom_field_data($customFields, json_decode($member->custom_fields, true));

        if ($request->client_login == 1) {
            if ($member->user_id != NULL) {
                $user = User::find($member->user_id);
            } else {
                $user = new User();
            }
            $user->name   = $request->input('name');
            $user->email  = $request->input('login_email');
            $user->status = $request->input('status');
            if ($request->password) {
                $user->password = Hash::make($request->password);
            }
            $user->user_type = 'customer';
            $user->save();
        }

        $member->first_name = $request->input('first_name');
        $member->last_name  = $request->input('last_name');
        if (auth()->user()->user_type == 'admin') {
            $member->branch_id = $request->branch_id;
        } else {
            $member->branch_id = auth()->user()->branch_id;
        }
        if ($request->client_login == 1) {
            $member->user_id = $user->id;
        }
        $member->email         = $request->input('email');
        $member->country_code  = $request->input('country_code');
        $member->mobile        = $request->input('mobile');
        $member->business_name = $request->input('business_name');
        $member->member_no     = $request->input('member_no');
        $member->gender        = $request->input('gender');
        $member->city          = $request->input('city');
        $member->state         = $request->input('state');
        $member->zip           = $request->input('zip');
        $member->address       = $request->input('address');
        $member->credit_source = $request->input('credit_source');
        if ($request->hasfile('photo')) {
            $member->photo = $photo;
        }
        $member->custom_fields = json_encode($customFieldsData);

        $member->save();

        DB::commit();

        if (!$request->ajax()) {
            return redirect()->route('members.index')->with('success', _lang('Updated Successfully'));
        } else {
            return response()->json(['result' => 'success', 'action' => 'update', 'message' => _lang('Updated Successfully'), 'data' => $member, 'table' => '#members_table']);
        }
    }

    public function send_email(Request $request) {
        @ini_set('max_execution_time', 0);
        @set_time_limit(0);

        Overrider::load("Settings");

        $validator = Validator::make($request->all(), [
            'user_email' => 'required',
            'subject'    => 'required',
            'message'    => 'required',
        ]);

        if ($validator->fails()) {
            if ($request->ajax()) {
                return response()->json(['result' => 'error', 'message' => $validator->errors()->all()]);
            } else {
                return back()->withErrors($validator)
                    ->withInput();
            }
        }

        //Send email
        $subject = $request->input("subject");
        $message = $request->input("message");

        $mail          = new \stdClass();
        $mail->subject = $subject;
        $mail->body    = $message;

        try {
            Mail::to($request->user_email)->send(new GeneralMail($mail));
        } catch (\Exception $e) {
            if (!$request->ajax()) {
                return back()->with('error', _lang('Sorry, Error Occured !'));
            } else {
                return response()->json(['result' => 'error', 'message' => _lang('Sorry, Error Occured !')]);
            }
        }

        if (!$request->ajax()) {
            return back()->with('success', _lang('Email Send Sucessfully'));
        } else {
            return response()->json(['result' => 'success', 'action' => 'update', 'message' => _lang('Email Send Sucessfully'), 'data' => $contact]);
        }
    }

    public function send_sms(Request $request) {
        @ini_set('max_execution_time', 0);
        @set_time_limit(0);

        $validator = Validator::make($request->all(), [
            'phone'   => 'required',
            'message' => 'required:max:160',
        ]);

        if ($validator->fails()) {
            if ($request->ajax()) {
                return response()->json(['result' => 'error', 'message' => $validator->errors()->all()]);
            } else {
                return back()->withErrors($validator)
                    ->withInput();
            }
        }

        //Send message
        $message = $request->input("message");

        if (get_option('sms_gateway') == 'none') {
            return back()->with('error', _lang('Sorry, SMS Gateway is disabled !'));
        }

        try {
            $sms = new SmsHelper();
            $sms->send($request->phone, $message);
        } catch (\Exception $e) {
            if (!$request->ajax()) {
                return back()->with('error', _lang('Sorry, Error Occured !'));
            } else {
                return response()->json(['result' => 'error', 'message' => _lang('Sorry, Error Occured !')]);
            }
        }

        if (!$request->ajax()) {
            return back()->with('success', _lang('SMS Send Sucessfully'));
        } else {
            return response()->json(['result' => 'success', 'action' => 'update', 'message' => _lang('SMS Send Sucessfully'), 'data' => $contact]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $member = Member::find($id);
        if ($member->user) {
            $member->user->delete();
        }
        $member->delete();
        return redirect()->route('members.index')->with('success', _lang('Deleted Successfully'));
    }

    public function accept_request(Request $request, $id) {
        if ($request->isMethod('get')) {
            $member = Member::withoutGlobalScopes(['status'])->find($id);
            return view('backend.member.modal.accept_request', compact('member'));
        } else {
            $validator = Validator::make($request->all(), [
                'member_no' => [
                    'required',
                    Rule::unique('members')->ignore($id),
                ],
            ]);

            if ($validator->fails()) {
                if ($request->ajax()) {
                    return response()->json(['result' => 'error', 'message' => $validator->errors()->all()]);
                } else {
                    return back()->withErrors($validator)->withInput();
                }
            }

            DB::beginTransaction();

            $member            = Member::withoutGlobalScopes(['status'])->find($id);
            $member->member_no = $request->member_no;
            $member->status    = 1;
            $member->save();

            $member->user->status = 1;
            $member->user->save();

            DB::commit();

            if ($member->status == 1) {
                try {
                    $member->notify(new MemberRequestAccepted($member));
                } catch (\Exception $e) {}
            }

            if (!$request->ajax()) {
                return redirect()->route('members.index')->with('success', _lang('Member Request Accepted'));
            } else {
                return response()->json(['result' => 'success', 'action' => 'update', 'message' => _lang('Member Request Accepted'), 'data' => $member, 'table' => '#members_table']);
            }

        }
    }

    public function reject_request($id) {
        $member = Member::withoutGlobalScopes(['status'])->find($id);
        $member->user->delete();
        $member->delete();
        return redirect()->back()->with('error', _lang('Member Request Rejected'));
    }

    public function import(Request $request) {
        if ($request->isMethod('get')) {
            return view('backend.member.import');
        } else if ($request->isMethod('post')) {
            @ini_set('max_execution_time', 0);
            @set_time_limit(0);

            $validator = Validator::make($request->all(), [
                'file' => 'required|mimes:xlsx',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            $new_rows = 0;

            DB::beginTransaction();

            $previous_rows = Member::count();

            $data   = array();
            $import = Excel::import(new MembersImport($data), $request->file('file'));

            $current_rows = Member::count();

            $new_rows = $current_rows - $previous_rows;

            DB::commit();

            if ($new_rows == 0) {
                return back()->with('error', _lang('Nothing Imported, Data may already exists !'));
            }
            return back()->with('success', $new_rows . ' ' . _lang('Rows Imported Sucessfully'));
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function nextofkin(Request $request, $id) {
        $customFields = CustomField::where('table', 'members')
            ->where('status', 1)
            ->orderBy("id", "asc")
            ->get();
        $member = Member::withoutGlobalScopes(['status'])->find($id);
        if (!$request->ajax()) {
            return view('backend.member.nextofkin', compact('member', 'id', 'customFields'));
        } else {
            return view('backend.member.modal.edit', compact('member', 'id', 'customFields'));
        }
    }
    // public function nextofkin(Request $request) {
    //     $customFields = CustomField::where('table', 'members')
    //         ->where('status', 1)
    //         ->orderBy("id", "asc")
    //         ->get();

    //     $memberNo = get_option('starting_member_no');
    //     return view('backend.member.create', compact('customFields', 'memberNo'));
    // }

    public function createSpouse(Request $request)
    {
        $registration_data = $request->session()->get('registration_data');
        $member = new \App\Models\Member($registration_data);
        return view('backend.member.spouse_create', compact('member'));
    }

    public function storeSpouse(Request $request)
    {
        $request->session()->put('spouse_data', $request->all());
        return redirect()->route('join.children.create');
    }

    public function createChildren(Request $request)
    {
        $registration_data = $request->session()->get('registration_data');
        $member = new \App\Models\Member($registration_data);
        return view('backend.member.children_create', compact('member'));
    }

    public function storeChildren(Request $request)
    {
        $request->session()->put('children_data', $request->all());
        return redirect()->route('join.parents.create');
    }

    public function createParents(Request $request)
    {
        $registration_data = $request->session()->get('registration_data');
        $member = new \App\Models\Member($registration_data);
        return view('backend.member.parents_create', compact('member'));
    }

    public function storeParents(Request $request)
    {
        $request->session()->put('parents_data', $request->all());
        return redirect()->route('join.parentsinlaw.create');
    }

    public function createParentsInLaw(Request $request)
    {
        $registration_data = $request->session()->get('registration_data');
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