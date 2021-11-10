@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
                           <div class="row g-0 justify-content-center" style="width:720px;">
                              <!-- FORMS -->
                            <div class="col-lg-10 mx-0 px-0">
                               <div class="progress">
                                  <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: 0%"></div>
                               </div>
                               <div id="qbox-container">
                                  <form class="needs-validation" id="form-wrapper" method="post" name="form-wrapper" novalidate>
                                     <!-- STEPS HERE -->
                                             <div id="steps-container">
                                                <div class="step container">

                                                   <h4>Provide us with your personal information:</h4>
                                                   <div class="mt-1">
                                                      <label class="form-label">Your Name:</label> 
                                                      <input class="form-control" id="full_name" name="full_name" type="text">
                                                   </div>
                                                   <div class="mt-2">
                                                      <label class="form-label">Your Address:</label> 
                                                      <input class="form-control" id="address" name="address" type="text">
                                                   </div>
                                                   <div class="mt-2">
                                                      <label class="form-label">Your Email:</label> 
                                                      <input class="form-control" id="email" name="email" type="email">
                                                   </div>
                                                   <div class="mt-2">
                                                      <label class="form-label">Your Mobile Number:</label> 
                                                      <input class="form-control" id="phone" name="phone" type="text">
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
                                                            <input class="form-check-input" name="gender" type="radio" value="male"> 
                                                            <label class="form-check-label radio-lb">Male</label> 
                                                            <input class="form-check-input" name="gender" type="radio" value="female"> 
                                                            <label class="form-check-label radio-lb">Female</label> 
                                                            <input checked class="form-check-input" name="gender" type="radio" value="undefined"> 
                                                            <label class="form-check-label radio-lb">Rather not say</label>
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
                                                               <input class="form-check-input question__input q-checkbox" id="q_4_uk" name="q_location" type="radio" value="uk"> 
                                                               <label class="form-check-label question__label" for="q_4_uk">Bangkok</label>
                                                            </div>
                                                         </div>
                                                         <div class="form-check ps-0 q-box">
                                                            <div class="q-box__question">
                                                               <input class="form-check-input question__input" id="q_4_us" name="q_location" type="radio" value="us"> 
                                                               <label class="form-check-label question__label" for="q_4_us">Phuket</label>
                                                            </div>
                                                         </div>
                                                         <div class="form-check ps-0 q-box">
                                                            <div class="q-box__question">
                                                               <input class="form-check-input question__input" id="q_4_br" name="q_location" type="radio" value="br"> 
                                                               <label class="form-check-label question__label" for="q_4_br">Koh Samui</label>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class="col-lg-6">
                                                         <div class="form-check ps-0 q-box">
                                                            <div class="q-box__question">
                                                               <input class="form-check-input question__input" id="q_4_de" name="q_location" type="radio" value="de"> 
                                                               <label class="form-check-label question__label" for="q_4_de">Chiang Mai</label>
                                                            </div>
                                                         </div>
                                                         <div class="form-check ps-0 q-box">
                                                            <div class="q-box__question">
                                                               <input class="form-check-input question__input" id="q_4_in" name="q_location" type="radio" value="in"> 
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
                                                         <input class="form-check-input question__input" id="q_3_a" name="q_3" type="radio" value="a"> 
                                                         <label class="form-check-label question__label" for="q_3_a">RT-PCR (PCR)</label>
                                                      </div>
                                                      <div class="q-box__question">
                                                         <input checked class="form-check-input question__input" id="q_3_b" name="q_3" type="radio" value="b"> 
                                                         <label class="form-check-label question__label" for="q_3_b">Antigen</label>
                                                      </div>
                                                      <div class="q-box__question">
                                                         <input checked class="form-check-input question__input" id="q_3_c" name="q_3" type="radio" value="c"> 
                                                         <label class="form-check-label question__label" for="q_3_c">Antibody</label>
                                                      </div>
                                                      <div class="q-box__question">
                                                         <input class="form-check-input question__input" id="q_3_d" name="q_3" type="radio" value="a"> 
                                                         <label class="form-check-label question__label" for="q_3_d">RT-PCR (PCR) with Medical Certificate + Fit to Fly</label>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="step">
                                                   <h4>Which document do you need?</h4>
                                                   <div class="form-check ps-0 q-box container">
                                                      <div class="q-box__question">
                                                         <input class="form-check-input question__input" id="q_4_a" name="q_4" type="radio" value="a"> 
                                                         <label class="form-check-label question__label" for="q_4_a">Medical Certificate/Fit to Fly</label>
                                                      </div>
                                                      <div class="q-box__question">
                                                         <input checked class="form-check-input question__input" id="q_4_b" name="q_4" type="radio" value="b"> 
                                                         <label class="form-check-label question__label" for="q_4_b">Lab Report Only</label>
                                                      </div>
                                                   </div>
                                                   <br>
                                                   <h4>Do you want to test at Clinic or Drive-Through or Home?</h4>
                                                   <div class="form-check ps-0 q-box container">
                                                      <div class="q-box__question">
                                                         <input class="form-check-input question__input" id="q_4_a1" name="q_4_1" type="radio" value="a"> 
                                                         <label class="form-check-label question__label" for="q_4_a1">Test at Clinic</label>
                                                      </div>
                                                      <div class="q-box__question">
                                                         <input checked class="form-check-input question__input" id="q_4_b1" name="q_4_1" type="radio" value="b"> 
                                                         <label class="form-check-label question__label" for="q_4_b1">Test at Drive Through(Car)</label>
                                                      </div>
                                                      <div class="q-box__question">
                                                         <input checked class="form-check-input question__input" id="q_4_c1" name="q_4_1" type="radio" value="b"> 
                                                         <label class="form-check-label question__label" for="q_4_c1">Test at Home, Hotel or Office</label>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="step">
                                                   <!-- <h4>How many persons need the test?</h4> -->
                                                   <div class="container">
                                                       <div class="mt-1">
                                                          <label class="form-label">How many persons need the test?</label> 
                                                          <input class="form-control" id="full_name" name="full_name" type="text">
                                                       </div>

                                                    <!-- For test at clinic -->
                                                       <div class="mt-1">
                                                          <div class="form-group">
                                                            <label for="exampleFormControlSelect1">Select PCR Test Location </label>
                                                            <select class="form-control" id="exampleFormControlSelect1">
                                                              <option>Lorem ipsum dolor sit amet, consectetur adipisicing elit, </option>
                                                              <option>Lorem ipsum dolor sit amet, consectetur adipisicing elit, </option>
                                                              <option>Lorem ipsum dolor sit amet, consectetur adipisicing elit, </option>
                                                              <option>Lorem ipsum dolor sit amet, consectetur adipisicing elit, </option>
                                                              <option>Lorem ipsum dolor sit amet, consectetur adipisicing elit, </option>
                                                            </select>
                                                          </div>
                                                       </div>
                                                       <!--End For test at clinic -->
                                                       <hr>
                                                    <!-- For test at Drive Though(car) -->
                                                       <div class="mt-1">
                                                          <div class="form-group">
                                                            <label for="exampleFormControlSelect1">Select Drive-through PCR Test Location </label>
                                                            <select class="form-control" id="exampleFormControlSelect1">
                                                              <option>Lorem ipsum dolor sit amet, consectetur adipisicing elit, </option>
                                                              <option>Lorem ipsum dolor sit amet, consectetur adipisicing elit, </option>
                                                              <option>Lorem ipsum dolor sit amet, consectetur adipisicing elit, </option>
                                                              <option>Lorem ipsum dolor sit amet, consectetur adipisicing elit, </option>
                                                              <option>Lorem ipsum dolor sit amet, consectetur adipisicing elit, </option>
                                                            </select>
                                                          </div>
                                                       </div>
                                                       <div class="mt-1">
                                                          <input class="form-control" id="full_name" name="full_name" type="text" placeholder="Car Number, Brand, Model, Color and Other Details">
                                                       </div>

                                                    <!-- End For test at Drive Though(car) -->
                                                    <hr>
                                                    <!-- For test at Home -->
                                                       <div class="mt-1">
                                                          <div class="form-group">
                                                            <label for="exampleFormControlSelect1">Select On-Demand Location PCR Test with Certificate Details and Rate (Pre-payment Needed)</label>
                                                            <select class="form-control" id="exampleFormControlSelect1">
                                                              <option>Lorem ipsum dolor sit amet, consectetur adipisicing elit, </option>
                                                              <option>Lorem ipsum dolor sit amet, consectetur adipisicing elit, </option>
                                                              <option>Lorem ipsum dolor sit amet, consectetur adipisicing elit, </option>
                                                              <option>Lorem ipsum dolor sit amet, consectetur adipisicing elit, </option>
                                                              <option>Lorem ipsum dolor sit amet, consectetur adipisicing elit, </option>
                                                            </select>
                                                          </div>
                                                       </div>
                                                       <div class="mt-1">
                                                          <input class="form-control" id="full_name" name="full_name" type="text" placeholder="Your Home, Hotel or Office Address">
                                                       </div>

                                                    <!-- End For test at Home-->
                                                       <div class="mt-1">
                                                          <label class="form-label">Select Appointment Date</label> 
                                                          <input class="form-control" id="full_name" name="full_name" type="date">
                                                          <input class="form-control" id="full_name" name="full_name" type="time">
                                                       </div>
                                                       <div class="mt-1">
                                                          <textarea class="form-control" placeholder="Additional namelist, information or request"></textarea>
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
                                                         <p>WLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                         tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                         quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                         consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                                         cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                                         proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                                         <p>Click on the submit button to continue.</p>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div id="success">
                                                   <div class="mt-5">
                                                      <h4>Success! We'll get back to you ASAP!</h4>
                                                      <p>Meanwhile, clean your hands often, use soap and water, or an alcohol-based hand rub, maintain a safe distance from anyone who is coughing or sneezing and always wear a mask when physical distancing is not possible.</p>
                                                      <a class="back-link" href="">Go back from the beginning ➜</a>
                                                   </div>
                                                </div>
                                             </div>
                                             <div id="q-box__buttons">
                                                <button id="prev-btn" type="button">Previous</button> 
                                                <button id="next-btn" type="button">Next</button> 
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
@endsection
