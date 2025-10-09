@extends('public.layouts.app')
@section('content')
    <main class="main home m-5">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h1 class="mb-4 text-primary">📘 Terms and Conditions</h1>
                <p class="text-muted"><small>Effective Date: August 01, 2025</small></p>

                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-body">
                        <p>By using <strong>Yapa Industries'</strong> website or services, you agree to these Terms.
                        </p>

                        <div class="">
                            <div class="space-y-3">
                                <!-- Section 1 -->
                                <div class="rounded-lg shadow-sm overflow-hidden border border-gray-200">
                                    <button
                                        class="flex justify-between items-center w-full p-4 text-left bg-white hover:bg-gray-50 transition-colors"
                                        @click="toggleSection(1)" :aria-expanded="openSection === 1"
                                        aria-controls="section-1">
                                        <span class="font-medium text-gray-900">1. Purchases & Payments</span>

                                    </button>
                                    <div id="section-1" class="px-4 py-4 bg-gray-50" x-show="openSection === 1" x-collapse>
                                        <ul class="space-y-2 text-gray-700">
                                            <li class="flex items-start">
                                                <span class="mr-2">•</span>
                                                <span>All prices are in <strong>LKR (Sri Lankan
                                                        Rupees)</strong></span>
                                            </li>
                                            <li class="flex items-start">
                                                <span class="mr-2">•</span>
                                                <span>Payment must be completed before order processing</span>
                                            </li>
                                            <li class="flex items-start">
                                                <span class="mr-2">•</span>
                                                <span>We accept major credit cards and bank transfers</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Section 2 -->
                                <div class="rounded-lg shadow-sm overflow-hidden border border-gray-200">
                                    <button
                                        class="flex justify-between items-center w-full p-4 text-left bg-white hover:bg-gray-50 transition-colors"
                                        @click="toggleSection(2)" :aria-expanded="openSection === 2"
                                        aria-controls="section-2">
                                        <span class="font-medium text-gray-900">2. Shipping & Delivery</span>

                                    </button>
                                    <div id="section-2" class="px-4 py-4 bg-gray-50" x-show="openSection === 2" x-collapse>
                                        <ul class="space-y-2 text-gray-700">
                                            <li class="flex items-start">
                                                <span class="mr-2">•</span>
                                                <span>Delivery times are estimates and not guaranteed</span>
                                            </li>
                                            <li class="flex items-start">
                                                <span class="mr-2">•</span>
                                                <span>Risk of loss transfers to you upon delivery</span>
                                            </li>
                                            <li class="flex items-start">
                                                <span class="mr-2">•</span>
                                                <span>Additional customs fees may apply for international
                                                    orders</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- Section 3 -->
                                <div class="rounded-lg shadow-sm overflow-hidden border border-gray-200">
                                    <button
                                        class="flex justify-between items-center w-full p-4 text-left bg-white hover:bg-gray-50 transition-colors"
                                        @click="toggleSection(3)" :aria-expanded="openSection === 3"
                                        aria-controls="section-3">
                                        <span class="font-medium text-gray-900">3. Intellectual Property</span>

                                    </button>
                                    <div id="section-3" class="px-4 py-4 bg-gray-50" x-show="openSection === 3" x-collapse>
                                        <p class="text-gray-700">
                                            All website content (logos, text, images) is owned by Yapa Industries
                                            and protected by copyright. Unauthorized use is prohibited.
                                        </p>
                                    </div>
                                </div>

                                <!-- Section 4 -->
                                <div class="rounded-lg shadow-sm overflow-hidden border border-gray-200">
                                    <button
                                        class="flex justify-between items-center w-full p-4 text-left bg-white hover:bg-gray-50 transition-colors"
                                        @click="toggleSection(4)" :aria-expanded="openSection === 4"
                                        aria-controls="section-4">
                                        <span class="font-medium text-gray-900">4. Limitation of Liability</span>

                                    </button>
                                    <div id="section-4" class="px-4 py-4 bg-gray-50" x-show="openSection === 4" x-collapse>
                                        <p class="text-gray-700">
                                            We are not liable for indirect damages (e.g., lost profits) arising from
                                            product use. Our total liability is limited to the purchase price paid.
                                        </p>
                                    </div>
                                </div>

                                <!-- Section 5 -->
                                <div class="rounded-lg shadow-sm overflow-hidden border border-gray-200">
                                    <button
                                        class="flex justify-between items-center w-full p-4 text-left bg-white hover:bg-gray-50 transition-colors"
                                        @click="toggleSection(5)" :aria-expanded="openSection === 5"
                                        aria-controls="section-5">
                                        <span class="font-medium text-gray-900">5. Dispute Resolution</span>

                                    </button>
                                    <div id="section-5" class="px-4 py-4 bg-gray-50" x-show="openSection === 5" x-collapse>
                                        <p class="text-gray-700">
                                            Disputes will be resolved under Sri Lankan law through negotiation
                                            first, then mediation if needed.
                                        </p>
                                    </div>
                                </div>

                                <!-- Section 6 -->
                                <div class="rounded-lg shadow-sm overflow-hidden border border-gray-200">
                                    <button
                                        class="flex justify-between items-center w-full p-4 text-left bg-white hover:bg-gray-50 transition-colors"
                                        @click="toggleSection(6)" :aria-expanded="openSection === 6"
                                        aria-controls="section-6">
                                        <span class="font-medium text-gray-900">6. Amendments</span>

                                    </button>
                                    <div id="section-6" class="px-4 py-4 bg-gray-50" x-show="openSection === 6" x-collapse>
                                        <p class="text-gray-700">
                                            Terms may be updated; continued use constitutes acceptance. We'll notify
                                            users of significant changes.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

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
