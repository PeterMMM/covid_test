@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Booking for Covid Test') }}
                    @auth
                        <b style="float: right;">Welcome {{ Auth::user()->name }}!</b>

                        <a class="btn btn-sm btn-warning" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Reset') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endauth
                </div>
                <div class="card-body">
                    @auth
                        <div id="preloader-wrapper">
                           <div id="preloader"></div>
                           <div class="preloader-section section-left"></div>
                           <div class="preloader-section section-right"></div>
                        </div>
                        <!-- CONTAINER -->
                        <div class="container d-flex align-items-center">
                           <div class="row g-0 justify-content-center" style="width:720px;margin: auto;">
                              <!-- FORMS -->
                            <div class="col-lg-10 mx-0 px-0">
                               <div class="progress">
                                  <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: 0%"></div>
                               </div>
                               <div id="qbox-container">
                                  <form class="needs-validation booking-form" id="form-wrapper" name="form-wrapper" novalidate>
                                     <!-- STEPS HERE -->
                                             <div id="steps-container">
                                                <div class="step container">

                                                   <h4>Provide us with your personal information:</h4>
                                                   <div class="mt-1">
                                                      <label class="form-label">Your Name:</label> 
                                                      <input class="form-control" id="name" name="name" type="text" required value="{{ Auth::user()->name }}">
                                                      <input style="display:none;" id="user_id" name="user_id" type="number" required value="{{ Auth::user()->id }}">
                                                   </div>
                                                   <div class="mt-2">
                                                      <label class="form-label">Your Address:</label> 
                                                      <input class="form-control" id="address" name="address" type="text" required>
                                                   </div>
                                                   <div class="mt-2">
                                                      <label class="form-label">Your Email:</label> 
                                                      <input class="form-control" id="email" name="email" type="email" required value="{{ Auth::user()->email }}"  readOnly="readOnly">
                                                   </div>
                                                   <div class="mt-2">
                                                      <label class="form-label">Your Mobile Number:</label> 
                                                      <input class="form-control" id="phone" name="phone" type="text" required>
                                                   </div>
                                                   <div class="row mt-2">
                                                      <div class="col-lg-2 col-md-2 col-3">
                                                         <label class="form-label">Age:</label>
                                                         <div class="input-container">
                                                            <input class="form-control" id="age" name="age" type="text">
                                                         </div>
                                                      </div>
                                                      <div class="col-lg-8">
                                                         <div id="input-container">
                                                            <input class="form-check-input" name="gender" type="radio" value="0"> 
                                                            <label class="form-check-label radio-lb">Male</label> 
                                                            <input class="form-check-input" name="gender" type="radio" value="1"> 
                                                            <label class="form-check-label radio-lb">Female</label> 
                                                            <input checked class="form-check-input" name="gender" type="radio" value="2"> 
                                                            <label class="form-check-label radio-lb">Other</label>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="step">
                                                   <h4>Select City/Province to Test At</h4>
                                                   <h5> (Additional questions will appear after you make this selection)</h5>
                                                    <div class="row">
                                                      <div class="col-lg-6">
                                                         <div class="form-check ps-0 q-box">
                                                            <div class="q-box__question">
                                                               <input class="form-check-input question__input q-checkbox" id="q_4_uk" name="q_location" type="radio" value="bk"> 
                                                               <label class="form-check-label question__label" for="q_4_uk">Bangkok</label>
                                                            </div>
                                                         </div>
                                                         <div class="form-check ps-0 q-box">
                                                            <div class="q-box__question">
                                                               <input class="form-check-input question__input" id="q_4_us" name="q_location" type="radio" value="pk"> 
                                                               <label class="form-check-label question__label" for="q_4_us">Phuket</label>
                                                            </div>
                                                         </div>
                                                         <div class="form-check ps-0 q-box">
                                                            <div class="q-box__question">
                                                               <input class="form-check-input question__input" id="q_4_br" name="q_location" type="radio" value="ks"> 
                                                               <label class="form-check-label question__label" for="q_4_br">Koh Samui</label>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="col-lg-6">
                                                         <div class="form-check ps-0 q-box">
                                                            <div class="q-box__question">
                                                               <input class="form-check-input question__input" id="q_4_de" name="q_location" type="radio" value="cm"> 
                                                               <label class="form-check-label question__label" for="q_4_de">Chiang Mai</label>
                                                            </div>
                                                         </div>
                                                         <div class="form-check ps-0 q-box">
                                                            <div class="q-box__question">
                                                               <input class="form-check-input question__input" id="q_4_in" name="q_location" type="radio" value="cb"> 
                                                               <label class="form-check-label question__label" for="q_4_in">ChonBuri</label>
                                                            </div>
                                                         </div>
                                                        
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="step">
                                                   <h4>Select Test</h4>
                                                   <div class="form-check ps-0 q-box container">
                                                      <div class="q-box__question">
                                                         <input class="form-check-input question__input" id="q_3_a" name="select_test" type="radio" value="st1"> 
                                                         <label class="form-check-label question__label" for="q_3_a">RT-PCR (PCR)</label>
                                                      </div>
                                                      <div class="q-box__question">
                                                         <input class="form-check-input question__input" id="q_3_b" name="select_test" type="radio" value="st2"> 
                                                         <label class="form-check-label question__label" for="q_3_b">Antigen</label>
                                                      </div>
                                                      <div class="q-box__question">
                                                         <input class="form-check-input question__input" id="q_3_c" name="select_test" type="radio" value="st3"> 
                                                         <label class="form-check-label question__label" for="q_3_c">Antibody</label>
                                                      </div>
                                                      <div class="q-box__question">
                                                         <input class="form-check-input question__input" id="q_3_d" name="select_test" type="radio" value="st4"> 
                                                         <label class="form-check-label question__label" for="q_3_d">RT-PCR (PCR) with Medical Certificate + Fit to Fly</label>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="step">
                                                   <div class="mt-1">
                                                    <label for="q_4_a">Which document do you need?</label>
                                                      <div class="q-box__question">
                                                         <input class="form-check-input question__input" id="q_4_a" name="q_doc" type="radio" value="a"> 
                                                         <label class="form-check-label question__label" for="q_4_a">Medical Certificate/Fit to Fly</label>
                                                      </div>
                                                      <div class="q-box__question">
                                                         <input class="form-check-input question__input" id="q_4_b" name="q_doc" type="radio" value="b"> 
                                                         <label class="form-check-label question__label" for="q_4_b">Lab Report Only</label>
                                                      </div>
                                                   </div>
                                                   <br>
                                                   <div class="mt-1">
                                                    <label for="q_5_a">Do you want to test at Clinic or Drive-Through or Home?</label>
                                                      <div class="q-box__question">
                                                         <input class="form-check-input question__input" id="q_5_a" name="q_drive" type="radio" value="a"> 
                                                         <label class="form-check-label question__label" for="q_5_a">Test at Clinic</label>
                                                      </div>
                                                      <div class="q-box__question">
                                                         <input class="form-check-input question__input" id="q_5_b" name="q_drive" type="radio" value="b"> 
                                                         <label class="form-check-label question__label" for="q_5_b">Test at Drive Through(Car)</label>
                                                      </div>
                                                      <div class="q-box__question">
                                                         <input class="form-check-input question__input" id="q_5_c" name="q_drive" type="radio" value="c"> 
                                                         <label class="form-check-label question__label" for="q_5_c">Test at Home, Hotel or Office</label>
                                                      </div>
                                                   </div>

                                                    <!-- For antigen test location-->
                                                    <div class="mt-1">
                                                      <div class="form-group">
                                                        <label for="test_location">Select Test Location </label>
                                                        <select class="form-control" id="test_location" name="test_location">
                                                          <option disabled selected value> -- select an option -- </option>
                                                          <option value="1">Latphrao 130, Bangkapi Center.......</option>
                                                        </select>
                                                      </div>
                                                   </div>
                                                    <!--End antigen test location -->

                                                    <!-- For antigen test location-->
                                                    <div class="mt-1">
                                                      <div class="form-group">
                                                        <label for="antigen_test_location">Select Antigen Test Location </label>
                                                        <select class="form-control" id="antigen_test_location" name="antigen_test_location">
                                                          <option disabled selected value> -- select an option -- </option>
                                                          <option value="1">Latphrao 130, bakgkapai ..................................  </option>
                                                          <option value="2">Sukhumvit 48,.............................................  </option>
                                                          <option value="3">Soi Chat San, ............................................  </option>
                                                          <option value="4">(PRE-PAY) Sukhumvit 49.................................... </option>
                                                          <option value="5">(PRE-PAY) Sukhumvit 49(Without Certificate................ </option>
                                                          <option value="6">(PRE-PAY) Sukhumvit 1 Road,............................... </option>
                                                        </select>
                                                      </div>
                                                   </div>
                                                    <!--End antigen test location -->
                                                    <!-- For antigen test location-->
                                                    <div class="mt-1">
                                                      <div class="form-group">
                                                        <label for="pk_antigen_test_location">Select Phuket Antigen Test Location </label>
                                                        <select class="form-control" id="pk_antigen_test_location" name="pk_antigen_test_location">
                                                          <option disabled selected value> -- select an option -- </option>
                                                          <option value="1">Latphrao 130, bakgkapai ..................................  </option>
                                                          <option value="2">Sukhumvit 48,.............................................  </option>
                                                          <option value="3">Soi Chat San, ............................................  </option>
                                                          <option value="4">(PRE-PAY) Sukhumvit 49.................................... </option>
                                                          <option value="5">(PRE-PAY) Sukhumvit 49(Without Certificate................ </option>
                                                          <option value="6">(PRE-PAY) Sukhumvit 1 Road,............................... </option>
                                                        </select>
                                                      </div>
                                                   </div>
                                                    <!--End antigen test location -->

                                                    <!-- For anti body test location -->
                                                    <div class="mt-1">
                                                      <div class="form-group">
                                                        <label for="anti_test_location">Select Antibody Test Location </label>
                                                        <select class="form-control" id="anti_test_location" name="anti_test_location">
                                                          <option disabled selected value> -- select an option -- </option>
                                                          <option value="1">Lahrao 130,....................................</option>
                                                          <option value="2">Soi Chat Sn, Huai..............................</option>
                                                          <option value="3">Sukhumvi 48,............1200THB.................</option>
                                                          <option value="3">Sukhumvi 48,............24000THB.................</option>
                                                          <option value="4">The Racquet Club,.......1300 THB.................</option>
                                                          <option value="5">The Racquet Club,.......2300 THB.................</option>
                                                        </select>
                                                      </div>
                                                   </div>
                                                    <!--End Foranti_test_location -->

                                                   <!-- For input info -->
                                                    <div class="mt-1">
                                                      <label class="form-label">How many persons need the test?</label> 
                                                      <input class="form-control" id="person_no" name="person_no" type="number" value="1">
                                                    </div>
                                                    <!-- For test at clinic -->
                                                    <div class="mt-1">
                                                      <div class="form-group">
                                                        <label for="pcr_location">Select PCR Test Location </label>
                                                        <select class="form-control" id="pcr_location" name="pcr_location">
                                                          <option disabled selected value> -- select an option -- </option>
                                                          <option value="1">Latphrao 130, Bangkapi Center,.............................</option>
                                                          <option value="2">Sukhumvit 48,..............................................</option>
                                                          <option value="3">(PRE-PAY) 3HOURS EXPRESS PCR RESULT WITH .CERT.. At Phahony ..</option>
                                                          <option value="4">(PRE-PAY)Sukhumvit 49 Center............................. ..</option>
                                                          <option value="5">(PRE-PAY)Phuthamonthon Saii  1Road........................ ..</option>
                                                          <option value="6">(PRE-PAY)6HOURS RESULT at Phutthamonth Sai................ ..</option>
                                                          <option value="7">(PRE-PAY)Certi with QR, Sukhumvit 49      ................ ..</option>
                                                        </select>
                                                      </div>
                                                   </div>
                                                    <div class="mt-1">
                                                      <div class="form-group">
                                                        <label for="pcr_location_b">Select PCR Test Location </label>
                                                        <select class="form-control" id="pcr_location_b" name="pcr_location">
                                                          <option disabled selected value> -- select an option -- </option>
                                                          <option value="8">Soi Chat San,.......................................       </option>
                                                          <option value="2">Sukhumvit 48,..............................................</option>
                                                          <option value="3">(PRE-PAY) 3HOURS EXPRESS PCR RESULT WITH .CERT.. At Phahony</option>
                                                        </select>
                                                      </div>
                                                   </div>
                                                       <!--End For test at clinic -->
                                                    
                                                    <!-- For test at CM pcr-->
                                                    <div class="mt-1">
                                                      <div class="form-group">
                                                        <label for="cb_pcr_location">Select Chonburi PCR Test Location </label>
                                                        <select class="form-control" id="cb_pcr_location" name="cb_pcr_location">
                                                          <option disabled selected value> -- select an option -- </option>
                                                          <option value="1">Soi Huayakapi 3, Sukhu.......................</option>
                                                        </select>
                                                      </div>
                                                   </div>
                                                    <!--End For test at clinic -->

                                                    <!-- For test at CM antigen-->
                                                    <div class="mt-1">
                                                      <div class="form-group">
                                                        <label for="cb_antigen_location">Select Chonburi Antigen Test Location </label>
                                                        <select class="form-control" id="cb_antigen_location" name="cb_antigen_location">
                                                          <option disabled selected value> -- select an option -- </option>
                                                          <option value="1">Soi Huaykapi 3, Sukhumvit Road................</option>
                                                        </select>
                                                      </div>
                                                   </div>
                                                    <!--End For test at clinic -->
                                                    
                                                    <!-- For test at CM pcr-->
                                                    <div class="mt-1">
                                                      <div class="form-group">
                                                        <label for="cm_pcr_location">Select Chiang Mai PCR Test Location </label>
                                                        <select class="form-control" id="cm_pcr_location" name="cm_pcr_location">
                                                          <option disabled selected value> -- select an option -- </option>
                                                          <option value="1">Kotchasam Road, Tambon Chang..............</option>
                                                        </select>
                                                      </div>
                                                   </div>
                                                    <!--End For test at clinic -->

                                                    <!-- For test at CM antigen-->
                                                    <div class="mt-1">
                                                      <div class="form-group">
                                                        <label for="cm_antigen_location">Select Chiang Mai Antigen Test Location </label>
                                                        <select class="form-control" id="cm_antigen_location" name="cm_antigen_location">
                                                          <option disabled selected value> -- select an option -- </option>
                                                          <option value="1">Kotchasam Road, Tambon........................</option>
                                                        </select>
                                                      </div>
                                                   </div>
                                                    <!--End For test at clinic -->

                                                    <!-- For pk crp test at clinic -->
                                                    <div class="mt-1">
                                                      <div class="form-group">
                                                        <label for="pk_pcr_location">Select Phuket PCR Test with Certificate Location </label>
                                                        <select class="form-control" id="pk_pcr_location" name="pk_pcr_location">
                                                          <option disabled selected value> -- select an option -- </option>
                                                          <option value="1">Chaofah East Rd, Vic.........................</option>
                                                          <option value="2">Test at Phuket Airport.........................</option>
                                                        </select>
                                                      </div>
                                                   </div>
                                                       <!--End For test at clinic -->

                                                    <!-- For pk crp test at clinic without certificate -->
                                                    <div class="mt-1">
                                                      <div class="form-group">
                                                        <label for="ks_pcr_location">Select Koh Samui PCR Test Location(Pre-payment Needed) </label>
                                                        <select class="form-control" id="ks_pcr_location" name="ks_pcr_location">
                                                          <option disabled selected value> -- select an option -- </option>
                                                          <option value="1">Within Bangkok and Surrouonding Area...............</option>
                                                          <option value="2">within Nonthaburi, Pathumthani.....................</option>
                                                          <option value="3">EXPRESS 3 HOURS RESULT -  7500  THB</option>
                                                        </select>
                                                      </div>
                                                   </div>
                                                       <!--End For test at clinic -->

                                                    <!-- For pk crp test at clinic without certificate -->
                                                    <div class="mt-1">
                                                      <div class="form-group">
                                                        <label for="pk_pcr_no_cer_location">Select Phuket PCR Test without Certificate Location </label>
                                                        <select class="form-control" id="pk_pcr_no_cer_location" name="pk_pcr_no_cer_location">
                                                          <option disabled selected value> -- select an option -- </option>
                                                          <option value="1">Chaofah East Rd............................................</option>
                                                          <option value="2">Test at Phuket ............................................</option>
                                                        </select>
                                                      </div>
                                                   </div>
                                                       <!--End For test at clinic -->

                                                    <!-- For test at Drive Though(car) -->
                                                       <div class="mt-1">
                                                          <div class="form-group">
                                                            <label for="drive_through_pcr_test">Select Drive-through PCR Test Location </label>
                                                            <select class="form-control" id="drive_through_pcr_test" name="drive_through_pcr_test">
                                                              <option value="1">Latphrao 130, Bangkapi Center............................ </option>
                                                              <option value="2">(WITH JAPANESE FORM) Latphrao 130........................ </option>
                                                            </select>
                                                          </div>
                                                       </div>
                                                       <div class="mt-1">
                                                          <input class="form-control" id="car_detail" name="car_detail" type="text" placeholder="Car Number, Brand, Model, Color and Other Details">
                                                       </div>

                                                    <!-- End For test at Drive Though(car) -->
                                                    <!-- <hr> -->
                                                    <!-- For test at Home -->
                                                       <div class="mt-1">
                                                          <div class="form-group">
                                                            <label for="demand_location">Select On-Demand Location PCR Test with Certificate Details and Rate (Pre-payment Needed)</label>
                                                            <select class="form-control" id="demand_location" name="demand_location">
                                                              <option value="1">Within Bangkok and Surrounding Aras - 5..... </option>
                                                              <option value="2">Within Nonthaburi, Pathumthani............... </option>
                                                              <option value="3">EXPRESS # HOURS RESULT ...................... </option>
                                                            </select>
                                                          </div>
                                                       </div>
                                                       <div class="mt-1">
                                                          <input class="form-control" id="home_address" name="home_address" type="text" placeholder="Your Home, Hotel or Office Address">
                                                       </div>

                                                    <!-- End For test at Home-->
                                                       <div class="mt-1">
                                                          <label class="form-label" for="app_date">Select Appointment Date</label> 
                                                          <input class="form-control" id="app_date" name="app_date" type="date">
                                                          <input class="form-control" id="app_time" name="app_time" type="time"  value="13:00">
                                                       </div>
                                                       <div class="mt-1">
                                                          <textarea class="form-control" id="add_info" name="add_info" placeholder="Additional namelist, information or request"></textarea>
                                                       </div>

                                                      <div class="mt-1">
                                                          <div class="form-group">
                                                            <label for="dob">Date of Birth</label>
                                                            <input class="form-control" id="dob" name="dob" type="date" placeholder="Date of Birth">
                                                          </div>
                                                       </div>
                                                      <div class="mt-1">
                                                          <div class="form-group">
                                                            <label for="nationality">Nationality</label>
                                                            <input class="form-control" id="nationality" name="nationality" type="text" placeholder="Nationality">
                                                          </div>
                                                       </div>
                                                      <div class="mt-1">
                                                          <div class="form-group">
                                                            <label for="passport">Passport Number</label>
                                                            <input class="form-control" id="passport" name="passport" type="text" placeholder="Passport Number">
                                                          </div>
                                                       </div>
                                                      <div class="mt-1">
                                                          <div class="form-group">
                                                            <label for="hotel">Hotel Name</label>
                                                            <input class="form-control" id="hotel" name="hotel" type="text" placeholder="Hotel Name">
                                                          </div>
                                                       </div>
                                                      <div class="mt-1">
                                                          <div class="form-group">
                                                            <label for="arrivalnumber">Flight Arrival Number</label>
                                                            <input class="form-control" id="arrivalnumber" name="arrivalnumber" type="text" placeholder="Flight Arrival Number">
                                                          </div>
                                                       </div>
                                                      <div class="mt-1">
                                                          <div class="form-group">
                                                            <label for="arrivaldate">Arrival Date</label>
                                                            <input class="form-control" id="arrivaldate" name="arrivaldate" type="date" placeholder="Arrival Date">
                                                          </div>
                                                       </div>
                                                      <div class="mt-1">
                                                          <div class="form-group">
                                                            <label for="arrivaltime">Arrival Time</label>
                                                            <input class="form-control" id="arrivaltime" name="arrivaltime" type="time" placeholder="Arrival Time">
                                                          </div>
                                                       </div>

                                                </div>
                                                <div class="step">
                                                    <h4>Payment information</h4>
                                                    <p>
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                                    </p>
                                                </div>
                                                <div class="step">
                                                   <div class="mt-1">
                                                      <div class="closing-text">
                                                        <h4>Your boooking information</h4>
                                                        <p class="container"><span id="results"></span></p>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div id="success">
                                                   <div class="mt-5">
                                                      <h4>Your covid test booking success! We'll confirm your booking and get back to you ASAP!</h4>
                                                      <p>Thanks your booking at our services. We will send mail about your booking is confirm or reject. Meanwhile, clean your hands often, use soap and water, or an alcohol-based hand rub, maintain a safe distance from anyone who is coughing or sneezing and always wear a mask when physical distancing is not possible.</p>
                                                      <a class="back-link" href="/">Go back from the beginning ➜</a>
                                                   </div>
                                                </div>
                                             </div>
                                             <div id="q-box__buttons">
                                                <button id="prev-btn" type="button">Previous</button> 
                                                <button id="next-btn" type="button"  data-toggle="tooltip" data-placement="top" title="Please fill all data to continue">Next</button>
                                                <button id="submit-btn" type="submit">Submit</button>
                                             </div>
                                          </form>
                                       </div>
                                    </div>
                                  </form>
                               </div>
                            </div>
                           </div>
                        </div>
                    @else
                        <h4>Please login </h4>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
<div id="toast-msg" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
  <div class="toast-header">
    <!-- <img src="..." class="rounded mr-2" alt="..."> -->
    <strong class="mr-auto">Data filled</strong>
    <small class="text-muted">Close</small>
    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="toast-body">
    Now, you can go to next step
  </div>
</div>
@endsection

@push('scripts')
<script>
    console.log('hello');
    console.log(jQuery().jquery);
    $(document).ready(function() {
        console.log("loaded page");
        $('#next-btn').addClass('d-none');
        $('#next-btn').removeClass('d-inline-block');
        
    });
    $('#next-btn').on('click', function(e) {
        e.preventDefault();
        console.log('click next-btn');
    });
/*        if($('td[name="select_test"]').is(":visible")){
            console.log('Test - checked is visible');
        }*/
    $("input[name='select_test']" ).change(function() {
        if ($("input[name='select_test']:checked").val()) {
            $('.toast').toast('show');
            $('#next-btn').removeClass('d-none');
            $('#next-btn').addClass('d-inline-block');
            console.log('One of the radio buttons is checked!');
        }
    });
    $("input[name='q_location']" ).change(function() {
        if ($("input[name='q_location']:checked").val()) {
            $('.toast').toast('show');
            $('#next-btn').removeClass('d-none');
            $('#next-btn').addClass('d-inline-block');
            console.log('One of the radio buttons is checked!');
        }
    });
    $("input[type='text']" ).change(function() {
        console.log("change happen");
        if ($('#name').val() != '' && $('#address').val() != '' && $('#email').val() != '' && $('#phone').val() != '' && $('#age').val() != '') {
            $('.toast').toast('show');
            $('#next-btn').removeClass('d-none');
            $('#next-btn').addClass('d-inline-block');
        } else {
            $('#next-btn').addClass('d-none');
            $('#next-btn').removeClass('d-inline-block');
        }
    });




</script>
@endpush
