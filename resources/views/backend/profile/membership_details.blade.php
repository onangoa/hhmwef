@extends('layouts.nextofkin')

@section('content')

@php $date_format = get_option('date_format','Y-m-d'); @endphp
@dd($member)
<div class="content">
  <!--content inner-->
  <div class="content__inner">
    <div class="container overflow-hidden">
      <!--multisteps-form-->
      <div class="multisteps-form">
        <!--progress bar-->
        <div class="row">
          <div class="col-12 col-lg-8 ml-auto mr-auto mb-4">
            <div class="multisteps-form__progress">
              <button class="multisteps-form__progress-btn js-active" type="button" title="User Info">Member Details</button>
              <button class="multisteps-form__progress-btn" type="button" title="NoK">Next Of Kin Details</button>
              <button class="multisteps-form__progress-btn" type="button" title="Spouse Details">Spouse Details</button>
              <button class="multisteps-form__progress-btn" type="button" title="Children Details">Children Details</button>
              <button class="multisteps-form__progress-btn" type="button" title="Parents/Guardians Details">Parents/Guardians Details </button>
            </div>
          </div>
        </div>
        <!--form panels-->
        <div class="row">
          <div class="col-12 col-lg-8 m-auto">
            <form class="multisteps-form__form" id="register-form">
              <!--single form panel-->
              <div class="multisteps-form__panel shadow p-4 rounded bg-white js-active" data-animation="slideHorz">
                <h3 class="multisteps-form__title">Member Details</h3>
                <div class="multisteps-form__content">
                  <div class="form-row mt-4">
                    <div class="col-12 col-sm-4">
                      <input class="multisteps-form__input form-control form-control-lg" type="text" placeholder="First Name" name="first_name"/>
                    </div>
                    <div class="col-12 col-sm-4 mt-4 mt-sm-0">
                        <input class="multisteps-form__input form-control form-control-lg" type="text" placeholder="Middle Name"  name="middle_name"/>
                      </div>
                    <div class="col-12 col-sm-4 mt-4 mt-sm-0">
                      <input class="multisteps-form__input form-control form-control-lg" type="text" placeholder="Last Name"  name="last_name"/>
                    </div>
                  </div>
                  <div class="form-row mt-4">
                    <div class="col-12 col-sm-6">
                      <input class="multisteps-form__input form-control form-control-lg" type="text" placeholder="Phone Number" name="phone_number"/>
                    </div>
                    <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                      <input class="multisteps-form__input form-control form-control-lg" type="email" placeholder="Email" name="email"/>
                    </div>
                  </div>
                  <div class="form-row mt-4">
                    <div class="col-12 col-sm-6">
                      <input class="multisteps-form__input form-control form-control-lg" type="text" placeholder="ID Number" name="id_number"/>
                    </div>
                    <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                      <input class="multisteps-form__input form-control form-control-lg" type="text" placeholder="Payroll Number" name="payroll_number"/>
                    </div>
                  </div>
                  <div class="form-row mt-4">
                    <div class="col-12 col-sm-4">
                        <input class="multisteps-form__input form-control form-control-lg" type="text" placeholder="Institution" name="institution"/>
                      </div>
                      <div class="col-12 col-sm-4 mt-4 mt-sm-0">
                          <input class="multisteps-form__input form-control form-control-lg" type="text" placeholder="Workstation"  name="workstation"/>
                        </div>
                      <div class="col-12 col-sm-4 mt-4 mt-sm-0">
                        <input class="multisteps-form__input form-control form-control-lg" type="text" placeholder="Department"  name="department"/>
                      </div>
                  </div>
                  <div class="button-row d-flex mt-4">
                    <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
                  </div>
                </div>
              </div>
              <!--single form panel-->
              <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="slideHorz">
                <h3 class="multisteps-form__title">Next Of Kin Details</h3>
                <div class="multisteps-form__content">
                    <div class="form-row mt-4">
                        <div class="col-12 col-sm-6">
                            <input class="multisteps-form__input form-control form-control-lg" type="text" placeholder="Full Name" name="nextofkin_name"/>
                          </div>
                          <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                            <input class="multisteps-form__input form-control form-control-lg" type="text" placeholder="Phone Number" name="nextofkin_phone_number"/>
                          </div>
                      </div>
                  <div class="form-row mt-4">
                    <div class="col-12 col-sm-6">
                        <input class="multisteps-form__input form-control form-control-lg" type="text" placeholder="ID Number" name="nextofkin_id_number"/>
                      </div>
                      <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                        <input class="multisteps-form__input form-control form-control-lg" type="email" placeholder="Email" name="nextofkin_email"/>
                      </div>
                  </div>
                  <div class="form-row mt-4">
                      <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                        <input class="multisteps-form__input form-control form-control-lg" type="text" placeholder="Address" name="nextofkin_address"/>
                      </div>
                      <div class="col-6 col-sm-6 mt-4 mt-sm-0">
                        <select class="multisteps-form__select form-control form-control-lg" name="nextofkin_Relationship">
                        <option>Select relationship...</option>
                                <option value="father">Father</option>
                                <option value="mother">Mother</option>
                                <option value="son">Son</option>
                                <option value="daughter">Daughter</option>
                                <option value="father-in-law">Father In law</option>
                                <option value="mother-in-law">Mother In law</option>
                        </select>
                      </div>
                  </div>
                  <h3 class="multisteps-form__title mt-3">Alternate Next Of Kin Details</h3><small>In the unfortunate event that the Principal member,
                    multiple dependants and next of kin pass on at the same time</small>
                  <div class="form-row mt-4">
                    <div class="col-14 col-sm-4">
                        <input class="multisteps-form__input form-control form-control-lg" type="text" placeholder="Full Name" name="nextofkin_name_alt"/>
                      </div>
                      <div class="col-14 col-sm-4 mt-4 mt-sm-0">
                        <input class="multisteps-form__input form-control form-control-lg" type="text" placeholder="Phone Number" name="nextofkin_phone_number_alt"/>
                      </div>
                      <div class="col-14 col-sm-4 mt-4 mt-sm-0">
                        <select class="multisteps-form__select form-control form-control-lg" name="nextofkin_Relationship_alt">
                        <option>Select relationship...</option>
                                <option value="father">Father</option>
                                <option value="mother">Mother</option>
                                <option value="son">Son</option>
                                <option value="daughter">Daughter</option>
                                <option value="father-in-law">Father In law</option>
                                <option value="mother-in-law">Mother In law</option>
                              </select>
                      </div>
                  </div>
                  <div class="button-row d-flex mt-4">
                    <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
                    <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
                  </div>
                </div>
              </div>
              <!--single form panel-->
              <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="slideHorz">
                <h3 class="multisteps-form__title">Spouse Details</h3>
                <div class="multisteps-form__content">
                    <div class="form-row mt-4">
                        <div class="col-12 col-sm-6">
                            <input class="multisteps-form__input form-control form-control-lg" type="text" placeholder="Full Name" name="spouse_name"/>
                          </div>
                          <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                            <input class="multisteps-form__input form-control form-control-lg" type="text" placeholder="Phone Number" name="spouse_phone_number"/>
                          </div>
                      </div>
                  <div class="form-row mt-4">
                    <div class="col-12 col-sm-4">
                        <input class="multisteps-form__input form-control form-control-lg" type="text" placeholder="ID Number" name="spouse_id_number"/>
                      </div>
                      <div class="col-12 col-sm-4 mt-4 mt-sm-0">
                        <input class="multisteps-form__input form-control form-control-lg" type="email" placeholder="Email" name="spouse_email"/>
                      </div>
                      <div class="col-12 col-sm-4 mt-4 mt-sm-0">
                        <input class="multisteps-form__input form-control form-control-lg" type="text" placeholder="Address" name="spouse_address"/>
                      </div>
                    </div>
                  <div class="row">
                    <div class="button-row d-flex mt-4 col-12">
                      <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
                      <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
                    </div>
                  </div>
                </div>
              </div>
               <!--single form panel-->
               <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="slideHorz">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="multisteps-form__title">Children Details</h3>
                    <button type="button" class="btn btn-success" id="add-child">Add Child</button>
                  </div>
                  
                <div class="multisteps-form__content">
                    <div id="children-container">
                        <div class="form-row mt-4 child-entry">
                            <div class="col-12 col-sm-4">
                                <input class="multisteps-form__input form-control form-control-lg" type="text" placeholder="Full Name" name="child_name[]" required/>
                            </div>
                            <div class="col-12 col-sm-4 mt-4 mt-sm-0">
                                <input class="multisteps-form__input form-control form-control-lg" type="text" placeholder="Age" name="child_age[]" required/>
                            </div>
                            <div class="col-12 col-sm-4 mt-4 mt-sm-0">
                                <input class="multisteps-form__input form-control form-control-lg" type="text" placeholder="Contact" name="child_phone_number[]"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="button-row d-flex mt-4 col-12">
                            <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
                            <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
                        </div>
                    </div>
                </div>
            </div>
              <!--single form panel-->
              <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="slideHorz">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="multisteps-form__title">Parents/Guardians Details</h3>
                    <button type="button" class="btn btn-success" id="add-parent">Add Parents/Guardian</button>
                  </div>
                <div class="multisteps-form__content">
                    <div id="parents-container">
                        <div class="form-row mt-4 parent-entry">
                        <div class="col-12 col-sm-6">
                            <input class="multisteps-form__input form-control form-control-lg" type="text" placeholder="Full Name" name="parent_name"/>
                          </div>
                          <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                            <select class="multisteps-form__select form-control form-control-lg" name="parent_relationship">
								<option>Select relationship...</option>
                                <option value="father">Father</option>
                                <option value="mother">Mother</option>
                                <option value="son">Son</option>
                                <option value="daughter">Daughter</option>
                                <option value="father-in-law">Father In law</option>
                                <option value="mother-in-law">Mother In law</option>
                              </select>
                          </div>
                      </div>
                    </div>
                  <div class="button-row d-flex mt-4">
                    <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
					<button id="update-kin" class="btn btn-success ml-auto" type="button" title="Update Details">Update Details</button>
                    <!-- <button id="register" class="btn btn-success ml-auto" type="button" title="Register">Register</button> -->
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection