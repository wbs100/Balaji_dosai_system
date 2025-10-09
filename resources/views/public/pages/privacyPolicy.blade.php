@extends('public.layouts.app')
@section('content')
    <main class="main home m-5">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h1 class="mb-4 text-primary">🔐 Privacy Policy</h1>
                <p class="text-muted"><small>Effective Date: August 01, 2025</small></p>

                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-body">
                        <p>Your privacy is important to <strong>Yapa Industries</strong>. This policy explains how
                            we collect, use, and protect your personal data.</p>

                        <h4 class="mt-0 mb-0">1. Information We Collect</h4>

                        <h5 class="my-3">Personal Details</h5>
                        <ul class="m-0">
                            <li>Name</li>
                            <li>Email</li>
                            <li>Phone number</li>
                            <li>Shipping address</li>
                        </ul>
                        <h5 class="my-3">Other Data</h5>
                        <ul class="mb-0">
                            <li>Payment information (processed securely)</li>
                            <li>Usage data (IP address, browser type)</li>
                        </ul>

                        <h4 class="mt-3 mb-3">2. How We Use Your Data</h4>

                        <span class="d-flex align-items-center pb-3" style="gap: 10px;"><i
                                class="bi bi-cart-check fs-2 text-primary"></i>
                            <h5 class="card-title m-0 p-0">Order Processing</h5>
                        </span>
                        <p class="card-text">To fulfill and deliver your purchases</p>
                        <span class="d-flex align-items-center pb-3" style="gap: 10px;"><i
                                class="bi bi-envelope fs-2 text-primary"></i>
                            <h5 class="card-title m-0 p-0">Communication</h5>
                        </span>
                        <p class="card-text">Order updates and customer support</p>
                        <span class="d-flex align-items-center pb-3" style="gap: 10px;"><i
                                class="bi bi-graph-up fs-2 text-primary"></i>
                            <h5 class="card-title m-0 p-0">Improvements</h5>
                        </span>
                        <p class="card-text">Enhance our website and services</p>

                        <div class="alert alert-info mt-4">
                            <p class="p-0 m-0"><strong>We do not sell or share your data</strong> with third parties
                                for
                                marketing
                                purposes.</p>
                        </div>

                        <h4 class="mt-4 mb-3">3. Data Security</h4>
                        <p>We implement industry-standard security measures but cannot guarantee 100% security for
                            online transactions.</p>

                        <h4 class="mt-4 mb-3">4. Your Rights</h4>
                        <div class="d-flex flex-wrap gap-2">
                            <span class="badge bg-primary text-white p-2">Access your data</span>&nbsp;
                            <span class="badge bg-primary text-white p-2">Correct inaccuracies</span>&nbsp;
                            <span class="badge bg-primary text-white p-2">Request deletion</span>&nbsp;
                            <span class="badge bg-primary text-white p-2">Opt-out of marketing</span>
                        </div>

                        <h4 class="mt-4 mb-3">5. Policy Changes</h4>
                        <p>Updates will be posted here with a revised effective date.</p>
                    </div>
                </div>

                <div class="card border-0 bg-light">
                    <div class="card-body">
                        <h5 class="card-title">Contact Information</h5>
                        <ul class="list-unstyled p-0 m-0" style="display: flex; flex-direction: column; gap: 10px;">
                            <li style="display: flex; align-items: center; gap: 10px;"><i class="bi bi-geo-alt"></i>
                                <a>No.16/C, New Digana Road, Nattaranpotha</a></li>
                            <li style="display: flex; align-items: center; gap: 10px;"><i class="bi bi-telephone"></i> <a
                                    href="tel:+94776004741">077 600 4741</a></li>
                            <li style="display: flex; align-items: center; gap: 10px;"><i class="bi bi-envelope"></i> <a
                                    href="mailto:industriesyapa@gmail.com">industriesyapa@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
