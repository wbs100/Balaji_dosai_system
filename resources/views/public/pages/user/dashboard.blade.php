@extends('public.layouts.app')

@section('content')
    <section class="inner-section single-banner mb-0"
        style="background: url(/assets/images/newsletter.jpg) no-repeat center;">
        <div class="container">
            <h2>My Profile</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
        </div>
    </section>

    <section class="inner-section profile-part my-5">
        <div class="container">
            <div class="row">

                <!-- PROFILE SECTION -->
                <div class="col-lg-12">
                    <div class="account-card">
                        <div class="account-title d-flex justify-content-between align-items-center">
                            <h4>Your Profile</h4>
                            <button data-bs-toggle="modal" data-bs-target="#profile-edit">Edit Profile</button>
                        </div>

                        <div class="account-content mt-3">
                            <div class="row align-items-center">
                                <div class="col-lg-3 text-center">
                                    <div class="profile-image mb-3">
                                        <a href="#">
                                            <img src="/assets/images/user.png" alt="user" class="rounded-circle"
                                                width="120">
                                        </a>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label class="form-label">Name</label>
                                        <input class="form-control" type="text" name="name"
                                            value="{{ $user->name }}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label class="form-label">Email</label>
                                        <input class="form-control" type="email" name="email"
                                            value="{{ $user->email }}" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label class="form-label">Contact</label>
                                        <input class="form-control" type="text" name="contact"
                                            value="{{ $user->contact ?? '' }}" readonly>
                                    </div>
                                </div>

                                <div class="col-12 mt-3 text-end">
                                    <button type="submit" id="saveProfileBtn" class="btn btn-success d-none">Save
                                        Changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- PASSWORD RESET SECTION -->
                <div class="col-lg-12 mt-4">
                    <div class="account-card">
                        <div class="account-title">
                            <h4>Reset Password</h4>
                        </div>

                        <div class="account-content">
                            <form action="{{ route('user.update.password') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-lg-5">
                                        <div class="form-group mb-0">
                                            <label class="form-label">New Password</label>
                                            <input type="password" name="new-password" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-5">
                                        <div class="form-group mb-0">
                                            <label class="form-label">Confirm Password</label>
                                            <input type="password" name="confirm-password" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-2 d-flex align-items-end">
                                        <button type="submit" class="shop-widget-btn">
                                            <span>Change Password</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- ADDRESS SECTION -->
                <div class="col-lg-12 mt-4">
                    <div class="account-card">
                        <div class="account-title d-flex justify-content-between align-items-center">
                            <h4>Delivery Address</h4>
                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#address-add">Add
                                Address</button>
                        </div>

                        <div class="account-content mt-3">
                            <div class="row">
                                @forelse ($addresses as $address)
                                    <div class="col-md-6 col-lg-4 alert fade show">
                                        <div class="profile-card address active">
                                            <h6>{{ ucfirst($address->title) }}</h6>
                                            <p>{{ $address->address }}</p>
                                            <ul class="user-action">
                                                <li>
                                                    <button class="edit icofont-edit" title="Edit This"
                                                        data-id="{{ $address->id }}" data-title="{{ $address->title }}"
                                                        data-address="{{ $address->address }}" data-bs-toggle="modal"
                                                        data-bs-target="#address-edit">
                                                    </button>
                                                </li>
                                                <li>
                                                    <form action="{{ route('address.delete', $address->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="trash icofont-ui-delete"
                                                            title="Remove This"></button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-muted">No addresses found.</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Address Add Modal -->
    <div class="modal fade" id="address-add" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button class="modal-close" data-bs-dismiss="modal"><i class="icofont-close"></i></button>
                <form class="modal-form" action="{{ route('address.store') }}" method="POST">
                    @csrf
                    <div class="form-title">
                        <h3>Add New Address</h3>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Title</label>
                        <select class="form-select" name="title" required>
                            <option selected disabled>Choose title</option>
                            <option value="home">Home</option>
                            <option value="office">Office</option>
                            <option value="business">Business</option>
                            <option value="academy">Academy</option>
                            <option value="others">Others</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Address</label>
                        <textarea class="form-control" name="address" placeholder="Enter your address" required></textarea>
                    </div>
                    <button class="form-btn pt-0" type="submit">Save Address</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Address Edit Modal -->
    <div class="modal fade" id="address-edit" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button class="modal-close" data-bs-dismiss="modal"><i class="icofont-close"></i></button>
                <form class="modal-form" action="{{ route('address.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="editAddressId">
                    <div class="form-title">
                        <h3>Edit Address Info</h3>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Title</label>
                        <select class="form-select" name="title" id="editAddressTitle" required>
                            <option value="home">Home</option>
                            <option value="office">Office</option>
                            <option value="business">Business</option>
                            <option value="academy">Academy</option>
                            <option value="others">Others</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Address</label>
                        <textarea class="form-control" name="address" id="editAddressText" required></textarea>
                    </div>
                    <button class="form-btn btn btn-success pt-0" type="submit">Save Changes</button>
                </form>
            </div>
        </div>
    </div>

    <!-- profile edit form -->
    <div class="modal fade" id="profile-edit">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button class="modal-close" data-bs-dismiss="modal"><i class="icofont-close"></i></button>
                <form class="modal-form" action="{{ route('user.update.profile') }}" method="POST">
                    @csrf
                    <div class="form-title">
                        <h3>edit profile info</h3>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Name</label>
                        <input class="form-control" type="text" name="name" value="{{ $user->name }}">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input class="form-control" type="email" name="email" value="{{ $user->email }}">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Contact</label>
                        <input class="form-control" type="text" name="contact" value="{{ $user->contact ?? '' }}">
                    </div>
                    <button class="form-btn" type="submit">save profile info</button>
                </form>
            </div>
        </div>
    </div>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "{{ session('error') }}",
            });
        </script>
    @endif
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('/assets/css/profile.css') }}" />
@endpush

<script>
    document.querySelectorAll('.edit').forEach(button => {
        button.addEventListener('click', function() {
            document.getElementById('editAddressId').value = this.dataset.id;
            document.getElementById('editAddressTitle').value = this.dataset.title;
            document.getElementById('editAddressText').value = this.dataset.address;
        });
    });
</script>
