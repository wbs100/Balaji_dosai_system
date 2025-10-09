@extends('public.layouts.app')
@section('content')
    <main class="main home m-5">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h1 class="mb-4 text-primary">🔁 Return and Refund Policy</h1>
                <p class="text-muted"><small>Effective Date: August 01, 2025</small></p>

                <div class="card mb-4 border-0 shadow-sm">
                    <div class="card-body">
                        <p>At <strong>Yapa Industries</strong>, we strive to provide high-quality products and
                            excellent customer service. If you are not satisfied with your purchase, our Return and
                            Refund Policy outlines the conditions under which you may request a return or refund.
                        </p>

                        <h4 class="mt-4 mb-3">1. Eligibility for Returns & Refunds</h4>
                        <ul class="list-group list-group-flush mb-3">
                            <li class="list-group-item border-0 ps-0"><strong>Defective Items:</strong> If the
                                product is found to be defective or damaged, it will be replaced with another item after
                                inspection.
                            </li>
                            <li class="list-group-item border-0 ps-0"><strong>Wrong Item Shipped:</strong> If you
                                receive an incorrect product, notify us within <strong>48 hours</strong> of
                                delivery.</li>
                            <li class="list-group-item border-0 ps-0"><strong>Change of Mind:</strong> Returns for
                                non-defective items are accepted within <strong>14 days</strong> of delivery,
                                provided the item is unused, in its original packaging, and with proof of purchase.
                            </li>
                        </ul>

                        <div class="alert alert-warning">
                            <p class="m-0 p-0"><strong>Non-Returnable Items:</strong> Perishable goods,
                                personalized/custom-made products.</p>
                        </div>

                        <h4 class="mt-4 mb-3">2. How to Request a Return/Refund</h4>
                        <p>Contact us via:</p>
                        <div class="d-flex flex-wrap gap-2 mb-3">
                            <a href="https://wa.me/94776004741" class="btn btn-success"><i class="bi bi-whatsapp"></i>
                                WhatsApp: +94 77 600 4741</a>
                            <a href="mailto:industriesyapa@gmail.com" class="btn btn-outline-primary"><i
                                    class="bi bi-envelope"></i> Email Us</a>
                        </div>
                        <p>Include:</p>
                        <ul>
                            <li>Your <strong>order number</strong></li>
                            <li><strong>Photos/videos</strong> of the issue (if applicable)</li>
                            <li>Reason for the return</li>
                        </ul>

                        <h4 class="mt-4 mb-3">3. Refund Processing</h4>
                        <ul>
                            <li>Approved returns must be shipped back within <strong>7 days</strong></li>
                            <li>Return shipping costs are the customer's responsibility unless the return is due to
                                our error</li>
                            <li>No cash refunds will be issued under any circumstances.</li>
                        </ul>

                        <h4 class="mt-4 mb-3">4. Policy Updates</h4>
                        <p>We may update this policy periodically. Check this page for the latest version.</p>
                    </div>
                </div>

                <div class="card border-0 bg-light">
                    <div class="card-body">
                        <h5 class="card-title">Contact Information</h5>
                        <ul class="list-unstyled p-0 m-0" style="display: flex; flex-direction: column; gap: 10px;">
                            <li style="display: flex; align-items: center; gap: 10px;"><i class="bi bi-geo-alt"></i>
                                <a>No.16/C, New Digana Road, Nattaranpotha</a>
                            </li>
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
