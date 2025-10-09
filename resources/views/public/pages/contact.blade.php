@extends('public.layouts.app')
@section('title', 'Contact')
@section('content')
    <!-- Start Main -->
    <main>
        <div class="main-part">
            <section class="contact-map">
                <iframe
                    src="https://maps.google.com/maps?width=1000&height=500&hl=en&q=balaji%20dosai%20kany&t=&z=16&ie=UTF8&iwloc=B&output=embed"
                    style="border:0;width: 100%; height: 500px;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </section>
            <!-- Start Contact Part -->
            <section class="default-section contact-part home-icon">
                <div class="icon-default">
                    <a href="#"><img src="/assets/images/scroll-arrow.png" alt=""></a>
                </div>
                <div class="container">
                    <div class="title text-center">
                        <h2 class="text-coffee">Contact Us</h2>
                        <h6 class="heade-xs">We’re delighted that you’re reaching out to Balaji Dosai. Your inquiries and
                            feedback are important to us.</h6>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-12 wow fadeInDown" data-wow-duration="1000ms"
                            data-wow-delay="300ms">
                            <div class="contact-blog-row">
                                <div class="contact-icon">
                                    <img src="/assets/images/location-icon.png" alt="">
                                </div>
                                <p>03, D.S. Senanayaka street, Kandy, Sri Lanka</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 wow fadeInDown" data-wow-duration="1000ms"
                            data-wow-delay="300ms">
                            <div class="contact-blog-row">
                                <div class="contact-icon">
                                    <img src="/assets/images/cell-icon.png" alt="">
                                </div>
                                <p><a href="tel:94772320410">0812 224 593</a></p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 wow fadeInDown" data-wow-duration="1000ms"
                            data-wow-delay="300ms">
                            <div class="contact-blog-row">
                                <div class="contact-icon">
                                    <img src="/assets/images/mail-icon.png" alt="">
                                </div>
                                <p><a href="mailto:support@balajidosai.lk">support@balajidosai.lk</a></p>
                            </div>
                        </div>
                    </div>
                    <form class="form" method="post" name="contact-form">
                        <div class="row">
                            <div class="col-md-8 col-sm-8 col-xs-12 wow fadeInDown" data-wow-duration="1000ms"
                                data-wow-delay="300ms">
                                <h5 class="text-coffee" style="margin-bottom: 10px;">Leave us a Message</h5>
                                <div class="row">
                                    <div class="alert-container"></div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <label>First Name *</label>
                                        <input name="first_name" type="text" required>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <label>Last Name *</label>
                                        <input name="last_name" type="text" required>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <label>Email *</label>
                                        <input name="email" type="email" required>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <label>Subject *</label>
                                        <input name="subject" type="text" required>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <label>Your Message *</label>
                                        <textarea name="message" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12 wow fadeInDown" data-wow-duration="1000ms"
                                data-wow-delay="300ms">
                                <h5 class="text-coffee" style="margin-bottom: 10px;">Opening Hours</h5>
                                <ul class="time-list">
                                    <li><span class="week-name">Monday</span> <span>12-6 PM</span></li>
                                    <li><span class="week-name">Tuesday</span> <span>12-6 PM</span></li>
                                    <li><span class="week-name">Wednesday</span> <span>12-6 PM</span></li>
                                    <li><span class="week-name">Thursday</span> <span>12-6 PM</span></li>
                                    <li><span class="week-name">Friday</span> <span>12-6 PM</span></li>
                                    <li><span class="week-name">Saturday</span> <span>12-6 PM</span></li>
                                    <li><span class="week-name">Sunday</span> <span>Closed</span></li>
                                </ul>
                                <div style="margin-top: 30px; text-align: center;">
                                    <input name="submit" value="SEND MESSAGE" class="btn-black send_message"
                                        type="submit">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
            <!-- End Contact Part -->
        </div>
    </main>
    <!-- End Main -->
@endsection
