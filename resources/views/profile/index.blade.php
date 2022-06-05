@extends('layouts.home')

@section('title', 'Profile')

@section('content')
    <section class="section">
        <h1 class="section-header">
            <div>@yield('title')</div>
        </h1>

        <div class="row">
            <div class="col-lg-7 col-md-12 col-12 col-sm-12">

                <div class="card">
                    <div class="card-header">
                        <h4> Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            <form action="{{ route('profile.update', $user) }}" method="post">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label> Nama*</label>
                                    <input type="text" name="name" id="name" class="form-control" required
                                        value="{{ old('name', $user->name) }}">
                                    @error('nama')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label> Email*</label>
                                    <input type="text" name="email" id="email" class="form-control" required
                                        value="{{ old('email', $user->email) }}">
                                    @error('email')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <hr>
                                <div class="form-group">
                                    <label> Password</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                    @error('password')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label> Konfirmasi Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="form-control">
                                </div>

                                <button class="btn btn-primary" type="submit">Update</button>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection



@push('js_script')
    <script>
        $(function() {
            // toastr.error('This awesome plugin is made by toastr', 'Hello, world!', {
            //     positionClass: 'toast-top-right'
            // })

            // toastr.success('This awesome plugin is made by toastr', 'Hello, world!')
        })
    </script>
@endpush
@include('vendor.toastr.toastr')
