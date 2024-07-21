<!-- ***** Reservation Us Area Starts ***** -->
<section class="section" id="reservation">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 align-self-center">
                <div class="left-text-content">
                    <div class="section-heading">
                        
                        <h6>Contact Us</h6>
                        @php
                        $contactPage = App\Models\Page::find(3);
                    @endphp

                    <h2>{{ $contactPage->title }}</h2>
                    </div>
                    
                    <p>{{ $contactPage->content}}</p>
                          <div class="row">
                        <div class="col-lg-6">
                            <div class="phone">
                                <i class="fa fa-phone"></i>
                                <h4>Phone Numbers</h4>
                                <span><a href="#">080-090-0990</a><br><a href="#">080-090-0880</a></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="message">
                                <i class="fa fa-envelope"></i>
                                <h4>Emails</h4>
                                <span><a href="#">hello@company.com</a><br><a href="#">info@company.com</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="contact-form">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('reservations.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <h4>Table Reservation</h4>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <fieldset>
                                    <input name="name" type="text" id="name" placeholder="Your Name*" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <fieldset>
                                    <input name="email" type="email" id="email" placeholder="Your Email Address*" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <fieldset>
                                    <input name="phone" type="text" id="phone" placeholder="Phone Number*" required="">
                                </fieldset>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <fieldset>
                                    <select name="number_guests" id="number_guests" required>
                                        <option value="" disabled selected>Number Of Guests</option>
                                        @for($i = 1; $i <= 12; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    <input name="date" id="date" type="date" class="form-control" placeholder="Date" required>
                                </fieldset>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <fieldset>
                                    <select name="time" id="time" required>
                                        <option value="" disabled selected>Time</option>
                                        <option value="Breakfast">Breakfast</option>
                                        <option value="Lunch">Lunch</option>
                                        <option value="Dinner">Dinner</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <textarea name="message" rows="6" id="message" placeholder="Message"></textarea>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="main-button-icon">Make A Reservation</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- ***** Reservation Area Ends ***** -->
