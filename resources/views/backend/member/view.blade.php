@extends('layouts.app')

@section('content')
@php
$prod_item = false;
@endphp
<div class="row">
	<div class="col-md-4 col-lg-3">
		<ul class="nav flex-column nav-tabs settings-tab" role="tablist">
			 <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#member_details"><i class="ti-user"></i>&nbsp;{{ _lang('Member Details') }}</a></li>
			 <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#account_overview"><i class="ti-credit-card"></i>&nbsp;{{ _lang('Account Overview') }}</a></li>
			 <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#transaction-history"><i class="ti-view-list-alt"></i>{{ _lang('Transactions') }}</a></li>
			 <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#next_kin"><i class="ti-id-badge"></i>&nbsp;{{ _lang('Next Of Kin') }}</a></li>
			 <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#kyc_documents"><i class="ti-files"></i>&nbsp;{{ _lang('KYC Documents') }}</a></li>
             @if($prod_item)
             <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#email"><i class="ti-email"></i>&nbsp;{{ _lang('Send Email') }}</a></li>
             <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#sms"><i class="ti-comment-alt"></i>&nbsp;{{ _lang('Send SMS') }}</a></li>
             <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#member_loans"><i class="ti-agenda"></i>&nbsp;{{ _lang('Loans') }}</a></li>
             @endif
             <li class="nav-item"><a class="nav-link" href="{{ route('members.edit', $member->id) }}"><i class="ti-pencil-alt"></i>&nbsp;{{ _lang('Edit Member Details') }}</a></li>
		</ul>
	</div>

	<div class="col-md-8 col-lg-9">
		<div class="tab-content">
        <div id="next_kin" class="tab-pane">
                    @php
                    $child_name = json_decode($member->child_name);
                    $child_age = json_decode($member->child_age);
                    $child_phone_number= json_decode($member->child_phone_number);
                    $parent_name= json_decode($member->parent_name);
                    $parent_relationship= json_decode($member->parent_relationship);
                    @endphp
                    <div class="card">
                    <div class="card-header">
						<span class="header-title">{{ _lang('Next Of Kin') }}</span>
					</div>
                    <div class="card-body">
                    <table class="table table-bordered">
                            <tr>
                                <th>Name</th>
                                <th>ID No.</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Relationship</th>
                            </tr>
                            <tr>
                                <td>{{ $member->nextofkin_name }}</td>
                                <td>{{ $member->nextofkin_id_number }}</td>
                                <td>{{ $member->nextofkin_phone_number }}</td>
                                <td>{{ $member->nextofkin_email }}</td>
                                <td>{{ $member->nextofkin_address }}</td>
                                <td>{{ $member->nextofkin_Relationship }}</td>
                            </tr>
							
						</table>
                        </div>
                        </div>
                        <div class="card">
                    <div class="card-header">
						<span class="header-title">{{ _lang('Alternate Next Of Kin') }}</span>
					</div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>Relationship</th>
                            </tr>
                            <tr>
                                <td>{{ $member->nextofkin_name_alt }}</td>
                                <td>{{ $member->nextofkin_phone_number_alt }}</td>
                                <td>{{ $member->nextofkin_Relationship_alt }}</td>
                            </tr>
							
						</table>
                        </div>
                        </div>
                        <div class="card">
                    <div class="card-header">
						<span class="header-title">{{ _lang('Spouse') }}</span>
					</div>
                    <div class="card-body">
                    <table class="table table-bordered">
                            <tr>
                                <th>Name</th>
                                <th>ID No.</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Address</th>
                            </tr>
                            <tr>
                                <td>{{ $member->spouse_name }}</td>
                                <td>{{ $member->spouse_id_number }}</td>
                                <td>{{ $member->spouse_phone_number }}</td>
                                <td>{{ $member->spouse_email }}</td>
                                <td>{{ $member->spouse_address }}</td>
                            </tr>
							
						</table>
                        </div>
                        </div>
                        <div class="card">
                    <div class="card-header">
						<span class="header-title">{{ _lang('Children') }}</span>
					</div>
                    <div class="card-body">
						<table class="table table-bordered">
                            <tr>
                                <th>Child Name</th>
                                <th>Age</th>
                                <th>Contact</th>
                            </tr>
                            @if($child_name)
                                @for ($i = 0; $i < count($child_name); $i++)
                                <tr>
                                    <td>{{ $child_name[$i] }}</td>
                                    <td>{{ $child_age[$i] }}</td>
                                    <td>{{ $child_phone_number[$i] }}</td>
                                </tr>
                                @endfor
                            @endif
							
						</table>
                        </div>
                        </div>
                        <div class="card">
                    <div class="card-header">
						<span class="header-title">{{ _lang('Parents/Guardians') }}</span>
					</div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Parent Name</th>
                                <th>Relationship</th>
                            </tr>
                            @if($parent_name)
                                @for ($i = 0; $i < count($parent_name); $i++)
                                <tr>
                                    <td>{{ $parent_name[$i] }}</td>
                                    <td>{{ $parent_relationship[$i] }}</td>
                                </tr>
                                @endfor
                            @endif
							
						</table>
                        </div>
                        </div>
			</div>
			<div id="member_details" class="tab-pane active">
				<div class="card">
					<div class="card-header">
						<span class="header-title">{{ _lang('Member Details') }}</span>
					</div>

					<div class="card-body">
						<table class="table table-bordered">
							<!-- <tr>
								<td colspan="2" class="profile_picture text-center">
									<img src="{{ profile_picture($member->photo) }}" class="thumb-image-md">
								</td>
							</tr> -->
							<tr><td>{{ _lang('First Name') }}</td><td>{{ $member->first_name }}</td></tr>
                            <tr><td>{{ _lang('Middle Name') }}</td><td>{{ $member->middle_name }}</td></tr>
							<tr><td>{{ _lang('Last Name') }}</td><td>{{ $member->last_name }}</td></tr>
							<tr><td>{{ _lang('Id Number') }}</td><td>{{ $member->id_number }}</td></tr>
							<tr><td>{{ _lang('Member No') }}</td><td>{{ $member->member_no }}</td></tr>
                            <tr><td>{{ _lang('Payroll Number') }}</td><td>{{ $member->payroll_number }}</td></tr>
							<!-- <tr><td>{{ _lang('Branch') }}</td><td>{{ $member->branch->name }}</td></tr> -->
							<tr><td>{{ _lang('Email') }}</td><td>{{ $member->email }}</td></tr>
							<tr><td>{{ _lang('Mobile') }}</td><td>{{ $member->country_code.$member->mobile }}</td></tr>
							<!-- <tr><td>{{ _lang('Gender') }}</td><td>{{ ucwords($member->gender) }}</td></tr> -->
                            <tr><td>{{ _lang('Institution') }}</td><td>{{ $member->institition }}</td></tr>
                            <tr><td>{{ _lang('Work Station') }}</td><td>{{ $member->workstation }}</td></tr>
                            <tr><td>{{ _lang('Department') }}</td><td>{{ $member->department }}</td></tr>
                            <!--Custom Fields-->
                            @if(! $customFields->isEmpty())
                                @php $customFieldsData = json_decode($member->custom_fields, true); @endphp
                                @foreach($customFields as $customField)
                                <tr>
                                    <td>{{ $customField->field_name }}</td>
                                    <td>
                                        @if($customField->field_type == 'file')
                                        @php $file = $customFieldsData[$customField->field_name]['field_value'] ?? null; @endphp
                                        {!! $file != null ? '<a href="'. public_asset('public/uploads/media/'.$file) .'" target="_blank" class="btn btn-xs btn-primary"><i class="fas fa-download mr-2"></i>'._lang('Download').'</a>' : '' !!}
                                        @else
                                        {{ $customFieldsData[$customField->field_name]['field_value'] ?? null }}
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            @endif
							<tr><td>{{ _lang('Address') }}</td><td>{{ $member->address }}</td></tr>
							
						</table>
					</div>
				</div>
			</div>

			<div id="account_overview" class="tab-pane">
                <div class="card">
                    <div class="card-header">
                        <span class="header-title">{{ _lang('Account Overview') }}</span>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-nowrap">{{ _lang('Account Number') }}</th>
                                        <th class="text-nowrap">{{ _lang('Account Type') }}</th>
                                        <th>{{ _lang('Currency') }}</th>
                                        <th class="text-right">{{ _lang('Balance') }}</th>
                                        <th class="text-nowrap text-right">{{ _lang('Loan Guarantee') }}</th>
                                        <th class="text-nowrap text-right">{{ _lang('Current Balance') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(get_account_details($member->id) as $account)
                                    <tr>
                                        <td>{{ $account->account_number }}</td>
                                        <td class="text-nowrap">{{ $account->savings_type->name }}</td>
                                        <td>{{ $account->savings_type->currency->name }}</td>
                                        <td class="text-nowrap text-right">{{ decimalPlace($account->balance, currency($account->savings_type->currency->name)) }}</td>
                                        <td class="text-nowrap text-right">{{ decimalPlace($account->blocked_amount, currency($account->savings_type->currency->name)) }}</td>
                                        <td class="text-nowrap text-right">{{ decimalPlace($account->balance - $account->blocked_amount, currency($account->savings_type->currency->name)) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
					    </div>
					</div>
				</div>
			</div>

			<div id="transaction-history" class="tab-pane">
                <div class="card">
                    <div class="card-header">
                        <span class="header-title">{{ _lang('Transactions') }}</span>
                    </div>

                    <div class="card-body">
						<table id="transactions_table" class="table table-bordered">
							<thead>
								<tr>
									<th>{{ _lang('Date') }}</th>
									<th>{{ _lang('Member') }}</th>
									<th>{{ _lang('Account Number') }}</th>
									<th>{{ _lang('Amount') }}</th>
									<th>{{ _lang('Debit/Credit') }}</th>
									<th>{{ _lang('Type') }}</th>
									<th>{{ _lang('Status') }}</th>
									<th class="text-center">{{ _lang('Action') }}</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
			</div><!--End Transaction Table-->

			<div id="member_loans" class="tab-pane">
                <div class="card">
                    <div class="card-header">
                        <span class="header-title">{{ _lang('Loans') }}</span>
                    </div>

                    <div class="card-body">
						<table id="loans_table" class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>{{ _lang('Loan ID') }}</th>
                                    <th>{{ _lang('Loan Product') }}</th>
                                    <th class="text-right">{{ _lang('Applied Amount') }}</th>
                                    <th class="text-right">{{ _lang('Total Payable') }}</th>
                                    <th class="text-right">{{ _lang('Amount Paid') }}</th>
                                    <th class="text-right">{{ _lang('Due Amount') }}</th>
                                    <th>{{ _lang('Release Date') }}</th>
                                    <th>{{ _lang('Status') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($member->loans as $loan)
                                <tr>
                                    <td><a href="{{ route('loans.show',$loan->id) }}">{{ $loan->loan_id }}</a></td>
                                    <td>{{ $loan->loan_product->name }}</td>
                                    <td class="text-right">{{ decimalPlace($loan->applied_amount, currency($loan->currency->name)) }}</td>
                                    <td class="text-right">{{ decimalPlace($loan->total_payable, currency($loan->currency->name)) }}</td>
                                    <td class="text-right">{{ decimalPlace($loan->total_paid, currency($loan->currency->name)) }}</td>
                                    <td class="text-right">{{ decimalPlace($loan->total_payable - $loan->total_paid, currency($loan->currency->name)) }}</td>
                                    <td>{{ $loan->release_date }}</td>
                                    <td>
                                        @if($loan->status == 0)
                                            {!! xss_clean(show_status(_lang('Pending'), 'warning')) !!}
                                        @elseif($loan->status == 1)
                                            {!! xss_clean(show_status(_lang('Approved'), 'success')) !!}
                                        @elseif($loan->status == 2)
                                            {!! xss_clean(show_status(_lang('Completed'), 'info')) !!}
                                        @elseif($loan->status == 3)
                                            {!! xss_clean(show_status(_lang('Cancelled'), 'danger')) !!}
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
					</div>
				</div>
			</div>

			<div id="kyc_documents" class="tab-pane">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4 class="header-title">{{ _lang('Documents of').' '.$member->first_name.' '.$member->last_name }}</h4>
                        <a class="btn btn-primary btn-xs ml-auto ajax-modal" data-title="{{ _lang('Add New Document') }}" href="{{ route('member_documents.create', $member->id) }}"><i class="ti-plus"></i>&nbsp;{{ _lang('Add New') }}</a>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>{{ _lang('Document Name') }}</th>
                                    <th>{{ _lang('Document File') }}</th>
                                    <th>{{ _lang('Submitted At') }}</th>
                                    <th>{{ _lang('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($member->documents as $document)
                                <tr>
                                    <td>{{ $document->name }}</td>
                                    <td><a target="_blank" href="{{ public_asset('public/uploads/documents/'.$document->document ) }}">{{ $document->document }}</a></td>
                                    <td>{{ date('d M, Y H:i:s',strtotime($document->created_at)) }}</td>
                                    <td class="text-center">
                                        <span class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle btn-xs" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ _lang('Action') }}
                                        </button>
                                        <form action="{{ route('member_documents.destroy', $document->id) }}" method="post">
                                            {{ csrf_field() }}
                                            <input name="_method" type="hidden" value="DELETE">

                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a href="{{ route('member_documents.edit', $document->id) }}" data-title="{{ _lang('Update Document') }}" class="dropdown-item dropdown-edit ajax-modal"><i class="ti-pencil-alt"></i>&nbsp;{{ _lang('Edit') }}</a>
                                                <button class="btn-remove dropdown-item" type="submit"><i class="ti-trash"></i>&nbsp;{{ _lang('Delete') }}</button>
                                            </div>
                                        </form>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!--End KYC Documents Tab-->


		</div>
	</div>
</div>
@endsection

@section('js-script')
<script>
(function ($) {

	"use strict";

	$('#transactions_table').DataTable({
		processing: true,
		serverSide: true,
		ajax: '{{ url('admin/members/get_member_transaction_data/'.$member->id) }}',
		"columns" : [
			{ data : 'trans_date', name : 'trans_date' },
			{ data : 'member.first_name', name : 'member.first_name' },
			{ data : 'account.account_number', name : 'account.account_number' },
			{ data : 'amount', name : 'amount' },
			{ data : 'dr_cr', name : 'dr_cr' },
			{ data : 'type', name : 'type' },
			{ data : 'status', name : 'status' },
			{ data : "action", name : "action" },
		],
		responsive: true,
		"bStateSave": true,
		"bAutoWidth":false,
		"ordering": false,
		"language": {
		   "decimal":        "",
		   "emptyTable":     "{{ _lang('No Data Found') }}",
		   "info":           "{{ _lang('Showing') }} _START_ {{ _lang('to') }} _END_ {{ _lang('of') }} _TOTAL_ {{ _lang('Entries') }}",
		   "infoEmpty":      "{{ _lang('Showing 0 To 0 Of 0 Entries') }}",
		   "infoFiltered":   "(filtered from _MAX_ total entries)",
		   "infoPostFix":    "",
		   "thousands":      ",",
		   "lengthMenu":     "{{ _lang('Show') }} _MENU_ {{ _lang('Entries') }}",
		   "loadingRecords": "{{ _lang('Loading...') }}",
		   "processing":     "{{ _lang('Processing...') }}",
		   "search":         "{{ _lang('Search') }}",
		   "zeroRecords":    "{{ _lang('No matching records found') }}",
		   "paginate": {
			  "first":      "{{ _lang('First') }}",
			  "last":       "{{ _lang('Last') }}",
              "previous": "<i class='ti-angle-left'></i>",
        	  "next" : "<i class='ti-angle-right'></i>",
		  }
		},
        drawCallback: function () {
			$(".dataTables_paginate > .pagination").addClass("pagination-bordered");
		}
	});

    $('.nav-tabs a').on('shown.bs.tab', function(event){
   		var tab = $(event.target).attr("href");
   		var url = "{{ route('members.show',$member->id) }}";
   	    history.pushState({}, null, url + "?tab=" + tab.substring(1));
   	});

   	@if(isset($_GET['tab']))
   	   $('.nav-tabs a[href="#{{ $_GET['tab'] }}"]').tab('show');
   	@endif

    $("a[data-toggle=\"tab\"]").on("shown.bs.tab", function (e) {
        $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
    });

})(jQuery);
</script>
@endsection


