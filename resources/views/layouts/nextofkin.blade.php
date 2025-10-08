<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>{{ get_option('site_title', config('app.name')) }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
		<!-- App favicon -->
        <link rel="shortcut icon" href="{{ get_favicon() }}">
		<!-- DataTables -->
        <link href="{{ public_asset('backend/plugins/datatable/datatables.min.css') }}" rel="stylesheet" type="text/css" /> 

		<link href="{{ public_asset('backend/plugins/dropify/css/dropify.min.css') }}" rel="stylesheet">
		<link href="{{ public_asset('backend/plugins/sweet-alert2/css/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ public_asset('backend/plugins/animate/animate.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ public_asset('backend/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ public_asset('backend/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" />
	    <link href="{{ public_asset('backend/plugins/jquery-toast-plugin/jquery.toast.min.css') }}" rel="stylesheet" />
        
		<!-- App Css -->
		<link rel="stylesheet" href="{{ public_asset('backend/assets/css/fontawesome.css') }}">
		<link rel="stylesheet" href="{{ public_asset('backend/assets/css/themify-icons.css') }}">
		<link rel="stylesheet" href="{{ public_asset('backend/plugins/metisMenu/metisMenu.css') }}">
		
		<!-- Others css -->
		<link rel="stylesheet" href="{{ public_asset('backend/assets/css/typography.css') }}">
		<link rel="stylesheet" href="{{ public_asset('backend/assets/css/default-css.css') }}">
		<link rel="stylesheet" href="{{ public_asset('backend/assets/css/styles.css?v=1.3') }}">
		<link rel="stylesheet" href="{{ public_asset('backend/assets/css/responsive.css?v=1.0') }}">
		
		<!-- Modernizr -->
		<script src="{{ public_asset('backend/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>     

		@if(get_option('backend_direction') == "rtl")
			<link rel="stylesheet" href="{{ public_asset('backend/plugins/bootstrap/css/bootstrap-rtl.min.css') }}">
			<link rel="stylesheet" href="{{ public_asset('backend/assets/css/rtl/style.css?v=1.0') }}">
		@endif
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
		<style>
    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: 'Poppins', sans-serif;
  font-size: 16px;
  color: #2c2c2c;
}
body a {
  color: inherit;
  text-decoration: none;
}

.header__btn {
  transition-property: all;
  transition-duration: 0.2s;
  transition-timing-function: linear;
  transition-delay: 0s;
  padding: 10px 20px;
  display: inline-block;
  margin-right: 10px;
  background-color: #fff;
  border: 1px solid #2c2c2c;
  border-radius: 3px;
  cursor: pointer;
  outline: none;
}
.header__btn:last-child {
  margin-right: 0;
}
.header__btn:hover, .header__btn.js-active {
  color: #fff;
  background-color: #2c2c2c;
}

.header {
  max-width: 600px;
  margin: 50px auto;
  text-align: center;
}

.header__title {
  margin-bottom: 30px;
  font-size: 2.1rem;
}

.content {
  width: 95%;
  margin: 0 auto 50px;
}

.content__title {
  margin-bottom: 40px;
  font-size: 20px;
  text-align: center;
}

.content__title--m-sm {
  margin-bottom: 10px;
}

.multisteps-form__progress {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(0, 1fr));
}

.multisteps-form__progress-btn {
  transition-property: all;
  transition-duration: 0.15s;
  transition-timing-function: linear;
  transition-delay: 0s;
  position: relative;
  padding-top: 20px;
  color: rgba(108, 117, 125, 0.7);
  text-indent: -9999px;
  border: none;
  background-color: transparent;
  outline: none !important;
  cursor: pointer;
}
@media (min-width: 500px) {
  .multisteps-form__progress-btn {
    text-indent: 0;
  }
}
.multisteps-form__progress-btn:before {
  position: absolute;
  top: 0;
  left: 50%;
  display: block;
  width: 13px;
  height: 13px;
  content: '';
  -webkit-transform: translateX(-50%);
          transform: translateX(-50%);
  transition: all 0.15s linear 0s, -webkit-transform 0.15s cubic-bezier(0.05, 1.09, 0.16, 1.4) 0s;
  transition: all 0.15s linear 0s, transform 0.15s cubic-bezier(0.05, 1.09, 0.16, 1.4) 0s;
  transition: all 0.15s linear 0s, transform 0.15s cubic-bezier(0.05, 1.09, 0.16, 1.4) 0s, -webkit-transform 0.15s cubic-bezier(0.05, 1.09, 0.16, 1.4) 0s;
  border: 2px solid currentColor;
  border-radius: 50%;
  background-color: #fff;
  box-sizing: border-box;
  z-index: 3;
}
.multisteps-form__progress-btn:after {
  position: absolute;
  top: 5px;
  left: calc(-50% - 13px / 2);
  transition-property: all;
  transition-duration: 0.15s;
  transition-timing-function: linear;
  transition-delay: 0s;
  display: block;
  width: 100%;
  height: 2px;
  content: '';
  background-color: currentColor;
  z-index: 1;
}
.multisteps-form__progress-btn:first-child:after {
  display: none;
}
.multisteps-form__progress-btn.js-active {
  color: #007bff;
}
.multisteps-form__progress-btn.js-active:before {
  -webkit-transform: translateX(-50%) scale(1.2);
          transform: translateX(-50%) scale(1.2);
  background-color: currentColor;
}

.multisteps-form__form {
  position: relative;
}

.multisteps-form__panel {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 0;
  opacity: 0;
  visibility: hidden;
}
.multisteps-form__panel.js-active {
  height: auto;
  opacity: 1;
  visibility: visible;
}
.multisteps-form__panel[data-animation="scaleOut"] {
  -webkit-transform: scale(1.1);
          transform: scale(1.1);
}
.multisteps-form__panel[data-animation="scaleOut"].js-active {
  transition-property: all;
  transition-duration: 0.2s;
  transition-timing-function: linear;
  transition-delay: 0s;
  -webkit-transform: scale(1);
          transform: scale(1);
}
.multisteps-form__panel[data-animation="slideHorz"] {
  left: 50px;
}
.multisteps-form__panel[data-animation="slideHorz"].js-active {
  transition-property: all;
  transition-duration: 0.25s;
  transition-timing-function: cubic-bezier(0.2, 1.13, 0.38, 1.43);
  transition-delay: 0s;
  left: 0;
}
.multisteps-form__panel[data-animation="slideVert"] {
  top: 30px;
}
.multisteps-form__panel[data-animation="slideVert"].js-active {
  transition-property: all;
  transition-duration: 0.2s;
  transition-timing-function: linear;
  transition-delay: 0s;
  top: 0;
}
.multisteps-form__panel[data-animation="fadeIn"].js-active {
  transition-property: all;
  transition-duration: 0.3s;
  transition-timing-function: linear;
  transition-delay: 0s;
}
.multisteps-form__panel[data-animation="scaleIn"] {
  -webkit-transform: scale(0.9);
          transform: scale(0.9);
}
.multisteps-form__panel[data-animation="scaleIn"].js-active {
  transition-property: all;
  transition-duration: 0.2s;
  transition-timing-function: linear;
  transition-delay: 0s;
  -webkit-transform: scale(1);
          transform: scale(1);
}

</style>
		@include('layouts.others.languages')
			
    </head>

    <body>  
		<!-- Main Modal -->
		<div id="main_modal" class="modal" tabindex="-1" role="dialog">
		    <div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
				    <div class="modal-header bg-primary">
						<h5 class="modal-title mt-0 text-white"></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
				    </div>
				  
				    <div class="alert alert-danger d-none m-3"></div>
				    <div class="alert alert-secondary d-none m-3"></div>			  
				    <div class="modal-body overflow-hidden"></div>
				  
				</div>
		    </div>
		</div>
		
		<!-- Secondary Modal -->
		<div id="secondary_modal" class="modal" tabindex="-1" role="dialog">
		    <div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
				    <div class="modal-header bg-dark">
						<h5 class="modal-title mt-0 text-white"></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
				    </div>
				  
				    <div class="alert alert-danger d-none m-3"></div>
				    <div class="alert alert-secondary d-none m-3"></div>			  
				    <div class="modal-body overflow-hidden"></div>
				</div>
		    </div>
		</div>
	     
		<!-- Preloader area start -->
		<div id="preloader"></div>
		<!-- Preloader area end -->
		
		<div class="page-container">
		    <!-- sidebar menu area start -->
			<div class="sidebar-menu">
				
				<div class="sidebar-header text-center">
					<a href="{{ route('dashboard.index') }}">
						<h4 class="text-white ml-1 d-inline-block">{{ get_option('site_title','SACCO') }}</h4>
					</a>	
				</div>
				<hr/>
				
				<div class="main-menu">
					<div class="menu-inner">
						<nav>
							<ul class="metismenu" id="menu">
								@include('layouts.menus.'.Auth::user()->user_type)
							</ul>
						</nav>
					</div>
				</div>
			</div>
			<!-- sidebar menu area end -->
		
        
			<!-- main content area start -->
			<div class="main-content">

				<!-- header area start -->
				<div class="header-area">
					<div class="row align-items-center">
						<!-- nav and search button -->
						<div class="col-lg-6 col-4 clearfix rtl-2">
							<div class="nav-btn float-left">
								<span></span>
								<span></span>
								<span></span>
							</div>
						</div>

						<!-- profile info & task notification -->
						<div class="col-lg-6 col-8 clearfix rtl-1">

							<ul class="notification-area float-right">

								@if(Auth::user()->user_type == 'customer')
									@php $notificatioCount = Auth::user()->member->unreadNotifications->count(); @endphp
									<li class="dropdown d-none d-sm-inline-block">
										<i class="ti-bell dropdown-toggle" data-toggle="dropdown">
											<span>{{ $notificatioCount }}</span>
										</i>
										<div class="dropdown-menu bell-notify-box notify-box">
											<span class="notify-title">{{ _lang('You have').' '.$notificatioCount.' '._lang('new notifications') }}</span>
											<div class="nofity-list">
												@foreach (Auth::user()->member->notifications->take(15) as $notification)
													<a href="{{ route('profile.show_notification', $notification->id) }}" class="ajax-modal-2 notify-item {{ $notification->read_at == null ? 'unread-notification' : '' }}" data-title="{{ _lang('Notification Details') }}">	
														<div class="notify-thumb">
															<img src="{{ profile_picture() }}">
														</div>
														<div class="notify-text">
															<span>{{ $notification->data['message'] }}</span><br>
															<span>{{ $notification->created_at->diffForHumans() }}</span>
														</div>
													</a>
												@endforeach
											</div>
										</div>
									</li>
								@endif
								
								<li>
									<div class="user-profile">
										<h4 class="user-name dropdown-toggle" data-toggle="dropdown">
											<img class="avatar user-thumb" id="my-profile-img" src="{{ profile_picture() }}" alt="avatar"> {{ Auth::user()->name }} <i class="fa fa-angle-down"></i>
										</h4>
										<div class="dropdown-menu">
											@if(auth()->user()->user_type == 'customer')
											<a class="dropdown-item" href="{{ route('profile.membership_details') }}"><i class="ti-user text-muted mr-2"></i>&nbsp;{{ _lang('Membership Details') }}</a>
											@endif
											<a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="ti-pencil text-muted mr-2"></i>&nbsp;{{ _lang('Profile Settings') }}</a>
											<a class="dropdown-item" href="{{ route('profile.change_password') }}"><i class="ti-exchange-vertical text-muted mr-2"></i></i>&nbsp;{{ _lang('Change Password') }}</a>
											@if(auth()->user()->user_type == 'admin')
											<a class="dropdown-item" href="{{ route('settings.update_settings') }}"><i class="ti-settings text-muted mr-2"></i>&nbsp;{{ _lang('System Settings') }}</a>
											@endif
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="{{ route('logout') }}"><i class="ti-power-off text-muted mr-2"></i>&nbsp;{{ _lang('Logout') }}</a>
										</div>
									</div>
	                            </li>
	                            
	                        </ul>

						</div>
					</div>
				</div><!-- header area end -->
				
				<!-- page title area start -->
				@if(Request::is('dashboard'))
				<div class="page-title-area mb-3">
					<div class="row align-items-center py-3">
						<div class="col-sm-12">
							<div class="breadcrumbs-area clearfix">
								<h6 class="page-title float-left">{{ _lang('Dashboard') }}</h6>
								
								<!--Branch Switcher-->
								@if(auth()->user()->user_type == 'admin')
								<div class="dropdown float-right">
									
									<div class="dropdown-menu" aria-labelledby="selectLanguage">
									<a class="dropdown-item" href="{{ route('switch_branch') }}">{{ _lang('All Branch') }}</a>
									<a class="dropdown-item" href="{{ route('switch_branch') }}?branch_id=default&branch={{ get_option('default_branch_name', 'Main Branch') }}">{{ get_option('default_branch_name', 'Main Branch') }}</a>
									@foreach( \App\Models\Branch::all() as $branch )
										<a class="dropdown-item" href="{{ route('switch_branch') }}?branch_id={{ $branch->id }}&branch={{ $branch->name }}">{{ $branch->name }}</a>
									@endforeach
									</div>
								</div>
								@endif
								<!--@include('layouts.others.breadcrumbs')-->
							</div>
						</div>
					</div>
				</div><!-- page title area end -->
				@endif
				
				<div class="main-content-inner {{ ! Request::is('dashboard') ? 'mt-4' : '' }}">		
					<div class="row">
						<div class="{{ isset($alert_col) ? $alert_col : 'col-lg-12' }}">
							<div class="alert alert-success alert-dismissible" id="main_alert" role="alert">
								<button type="button" id="close_alert" class="close">
									<span aria-hidden="true"><i class="far fa-times-circle"></i></span>
								</button>
								<span class="msg"></span>
							</div>
						</div>
					</div>
                    
					@yield('content')
				</div><!--End main content Inner-->
				
			</div><!--End main content-->

		</div><!--End Page Container-->

        <!-- jQuery  -->
		<script src="{{ public_asset('backend/assets/js/vendor/jquery-3.6.1.min.js') }}"></script>
		<script src="{{ public_asset('backend/assets/js/popper.min.js') }}"></script>
		<script src="{{ public_asset('backend/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
		<script src="{{ public_asset('backend/plugins/metisMenu/metisMenu.min.js') }}"></script>
		<script src="{{ public_asset('backend/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
        
		<script src="{{ public_asset('backend/assets/js/print.js') }}"></script>
		<script src="{{ public_asset('backend/plugins/pace/pace.min.js') }}"></script>
        <script src="{{ public_asset('backend/plugins/moment/moment.js') }}"></script>
		
		<!-- Datatable js -->
        <script src="{{ public_asset('backend/plugins/datatable/datatables.min.js') }}"></script>
        
		<script src="{{ public_asset('backend/plugins/dropify/js/dropify.min.js') }}"></script>
		<script src="{{ public_asset('backend/plugins/sweet-alert2/js/sweetalert2.min.js') }}"></script>
		<script src="{{ public_asset('backend/plugins/select2/js/select2.min.js') }}"></script>
		<script src="{{ public_asset('backend/plugins/daterangepicker/daterangepicker.js') }}"></script>
		<script src="{{ public_asset('backend/plugins/tinymce/tinymce.min.js') }}"></script>
		<script src="{{ public_asset('backend/plugins/parsleyjs/parsley.min.js') }}"></script>
		<script src="{{ public_asset('backend/plugins/jquery-toast-plugin/jquery.toast.min.js') }}"></script>

        <!-- App js -->
        <script src="{{ public_asset('backend/assets/js/scripts.js?v=1.4') }}"></script>

		<script type="text/javascript">		
		(function($) {

    		"use strict";		
			
			//Show Success Message
			@if(Session::has('success'))
		       $("#main_alert > span.msg").html(" {{ session('success') }} ");
			   $("#main_alert").addClass("alert-success").removeClass("alert-danger");
			   $("#main_alert").css('display','block');
			@endif
			
			//Show Single Error Message
			@if(Session::has('error'))
			   $("#main_alert > span.msg").html(" {{ session('error') }} ");
			   $("#main_alert").addClass("alert-danger").removeClass("alert-success");
			   $("#main_alert").css('display','block');
			@endif
			
			
			@php $i = 0; @endphp

			@foreach ($errors->all() as $error)
			    @if ($loop->first)
					$("#main_alert > span.msg").html("<i class='ti-alert'></i>&nbsp;{{ $error }} ");
					$("#main_alert").addClass("alert-danger").removeClass("alert-success");
				@else
                    $("#main_alert > span.msg").append("<br><i class='ti-alert'></i>&nbsp;{{ $error }} ");					
				@endif
				
				@if ($loop->last)
					$("#main_alert").css('display','block');
				@endif
				
				@if(isset($errors->keys()[$i]))
					var name = "{{ $errors->keys()[$i] }}";
				
					$("input[name='" + name + "']").addClass('error is-invalid');
					$("select[name='" + name + "'] + span").addClass('error is-invalid');
				
					$("input[name='"+name+"'], select[name='"+name+"']").parent().append("<span class='v-error'>{{$error}}</span>");
				@endif
				@php $i++; @endphp
			
			@endforeach
			
        })(jQuery);
		
	 </script>
	 
	 <!-- Custom JS -->
	 @yield('js-script')

	 @stack('scripts')
	 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'></script> -->
<script>
     $('#register').on('click', function(e) {
        e.preventDefault(); // Prevent the default form submission

        // Serialize the form data
        var formData = $('#register-form').serialize();

        // Send the form data via AJAX
        $.ajax({
            url: 'your-server-endpoint', // Replace with your server endpoint
            type: 'POST',
            data: formData,
            success: function(response) {
                // Handle success response
                console.log('Form submitted successfully');
                console.log(response);
                alert('Form submitted successfully!');
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error('Form submission failed');
                console.error(xhr.responseText);
                alert('Form submission failed. Please try again.');
            }
        });
    });
    
    document.getElementById('add-child').addEventListener('click', function() {
        let container = document.getElementById('children-container');
        let childEntry = document.createElement('div');
        childEntry.classList.add('form-row', 'mt-4', 'child-entry');
        childEntry.innerHTML = `
            <div class="col-12 col-sm-4">
                <input class="multisteps-form__input form-control form-control-lg" type="text" placeholder="Full Name" name="child_name[]"/>
            </div>
            <div class="col-12 col-sm-3 mt-4 mt-sm-0">
                <input class="multisteps-form__input form-control form-control-lg" type="text" placeholder="Age" name="child_age[]"/>
            </div>
            <div class="col-12 col-sm-4 mt-4 mt-sm-0">
                <input class="multisteps-form__input form-control form-control-lg" type="text" placeholder="Contact" name="child_phone_number[]"/>
            </div>
            <div class="col-12 col-sm-1 mt-4 mt-sm-0">
                <button type="button" class="btn btn-danger remove-child">&times;</button>
            </div>
        `;
        container.appendChild(childEntry);
    });

    document.getElementById('children-container').addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-child')) {
            let childEntries = document.querySelectorAll('.child-entry');
            if (childEntries.length > 1) {
                e.target.closest('.child-entry').remove();
            }
        }
    });

    document.getElementById('add-parent').addEventListener('click', function() {
        let container = document.getElementById('parents-container');
        let parentEntry = document.createElement('div');
        parentEntry.classList.add('form-row', 'mt-4', 'parent-entry');
        parentEntry.innerHTML = `
            <div class="col-12 col-sm-6">
                            <input class="multisteps-form__input form-control form-control-lg" type="text" placeholder="Full Name" name="parent_name[]"/>
                          </div>
                          <div class="col-12 col-sm-5 mt-4 mt-sm-0">
                            <input class="multisteps-form__input form-control form-control-lg" type="text" placeholder="Contact" name="parent_relationship[]"/>
                          </div>
            <div class="col-12 col-sm-1 mt-4 mt-sm-0">
                <button type="button" class="btn btn-danger remove-parent">&times;</button>
            </div>
        `;
        container.appendChild(parentEntry);
    });

    document.getElementById('parents-container').addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-parent')) {
            let childEntries = document.querySelectorAll('.parent-entry');
            if (childEntries.length > 1) {
                e.target.closest('.parent-entry').remove();
            }
        }
    });

   

const DOMstrings = {
  stepsBtnClass: 'multisteps-form__progress-btn',
  stepsBtns: document.querySelectorAll(`.multisteps-form__progress-btn`),
  stepsBar: document.querySelector('.multisteps-form__progress'),
  stepsForm: document.querySelector('.multisteps-form__form'),
  stepsFormTextareas: document.querySelectorAll('.multisteps-form__textarea'),
  stepFormPanelClass: 'multisteps-form__panel',
  stepFormPanels: document.querySelectorAll('.multisteps-form__panel'),
  stepPrevBtnClass: 'js-btn-prev',
  stepNextBtnClass: 'js-btn-next' };


//remove class from a set of items
const removeClasses = (elemSet, className) => {

  elemSet.forEach(elem => {

    elem.classList.remove(className);

  });

};

//return exect parent node of the element
const findParent = (elem, parentClass) => {

  let currentNode = elem;

  while (!currentNode.classList.contains(parentClass)) {
    currentNode = currentNode.parentNode;
  }

  return currentNode;

};

//get active button step number
const getActiveStep = elem => {
  return Array.from(DOMstrings.stepsBtns).indexOf(elem);
};

//set all steps before clicked (and clicked too) to active
const setActiveStep = activeStepNum => {

  //remove active state from all the state
  removeClasses(DOMstrings.stepsBtns, 'js-active');

  //set picked items to active
  DOMstrings.stepsBtns.forEach((elem, index) => {

    if (index <= activeStepNum) {
      elem.classList.add('js-active');
    }

  });
};

//get active panel
const getActivePanel = () => {

  let activePanel;

  DOMstrings.stepFormPanels.forEach(elem => {

    if (elem.classList.contains('js-active')) {

      activePanel = elem;

    }

  });

  return activePanel;

};

//open active panel (and close unactive panels)
const setActivePanel = activePanelNum => {

  //remove active class from all the panels
  removeClasses(DOMstrings.stepFormPanels, 'js-active');

  //show active panel
  DOMstrings.stepFormPanels.forEach((elem, index) => {
    if (index === activePanelNum) {

      elem.classList.add('js-active');

      setFormHeight(elem);

    }
  });

};

//set form height equal to current panel height
const formHeight = activePanel => {

  const activePanelHeight = activePanel.offsetHeight;

  DOMstrings.stepsForm.style.height = `${activePanelHeight}px`;

};

const setFormHeight = () => {
  const activePanel = getActivePanel();

  formHeight(activePanel);
};

//STEPS BAR CLICK FUNCTION
DOMstrings.stepsBar.addEventListener('click', e => {

  //check if click target is a step button
  const eventTarget = e.target;

  if (!eventTarget.classList.contains(`${DOMstrings.stepsBtnClass}`)) {
    return;
  }

  //get active button step number
  const activeStep = getActiveStep(eventTarget);

  //set all steps before clicked (and clicked too) to active
  setActiveStep(activeStep);

  //open active panel
  setActivePanel(activeStep);
});

//PREV/NEXT BTNS CLICK
DOMstrings.stepsForm.addEventListener('click', e => {
        const eventTarget = e.target;
        if (!(eventTarget.classList.contains(`${DOMstrings.stepPrevBtnClass}`) || eventTarget.classList.contains(`${DOMstrings.stepNextBtnClass}`))) {
            return;
        }

        const activePanel = findParent(eventTarget, `${DOMstrings.stepFormPanelClass}`);
        let activePanelNum = Array.from(DOMstrings.stepFormPanels).indexOf(activePanel);

        if (eventTarget.classList.contains(`${DOMstrings.stepNextBtnClass}`)) {
            let valid = true;
            // document.querySelectorAll('.child-entry').forEach(child => {
            //     let inputs = child.querySelectorAll('input');
            //     inputs.forEach(input => {
            //         let errorText = input.nextElementSibling;
            //         if (input.checkValidity()) {
            //             errorText.classList.add('d-none');
            //         } else {
            //             errorText.classList.remove('d-none');
            //             valid = false;
            //         }
            //     });
            // });

            // if (!valid) {
            //     e.preventDefault();
            //     return;
            // }
            activePanelNum++;
        } else {
            activePanelNum--;
        }

        setActiveStep(activePanelNum);
        setActivePanel(activePanelNum);
    });


const setAnimationType = newType => {
  DOMstrings.stepFormPanels.forEach(elem => {
    elem.dataset.animation = newType;
  });
};

//selector onchange - changing animation
const animationSelect = document.querySelector('.pick-animation__select');

animationSelect.addEventListener('change', () => {
  const newAnimationType = animationSelect.value;

  setAnimationType(newAnimationType);
});
</script>
		
    </body>
</html>