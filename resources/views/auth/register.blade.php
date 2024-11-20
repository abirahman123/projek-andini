@extends('layouts.auth')
@section('title', 'Register')


@section('content')

  <div class="py-9">
    <div class="d-flex align-items-center justify-content-center w-100">
      <div class="row justify-content-center w-100">
        <div class="col-md-8 col-lg-6">
          <div class="card mb-0 login-card">
            <div class="card-body">
                <h3 class="fw-bolder m-0 mb-4">Register</h3>
              <form method="POST" action="{{ URL::to('register') }}" id="form-register">
                @csrf
                <div class="row">
                    <div class="col-12 mb-3">
                        <x-atoms.form-label for="name_field">Name</x-atoms.form-label>
                        <x-atoms.input type="text" name="name" id="name_field" placeholder="Enter Full Name" value="{{ old('name') }}" />
                    </div>
                    <div class="col-md-6 mb-3">
                        <x-atoms.form-label for="email_field">Email</x-atoms.form-label>
                        <x-atoms.input type="email" name="email" id="email_field" placeholder="Enter Email Address" />
                    </div>
                    <div class="col-md-6 mb-3">
                        <x-atoms.form-label for="phone_field">Phone Number </x-atoms.form-label>
                        <x-atoms.input type="text" name="phone" id="phone_field" placeholder="Enter Phone Number" />
                    </div>
                    <div class="col-md-6 mb-3">
                        <x-atoms.form-label for="password_field">Password</x-atoms.form-label>
                        <x-atoms.input type="password" name="password" id="password_field" placeholder="Enter Password" />
                    </div>
                    <div class="col-md-6 mb-3">
                        <x-atoms.form-label for="password_confirmation_field">Confirm Password</x-atoms.form-label>
                        <x-atoms.input type="password" name="password_confirmation" id="password_confirmation_field" placeholder="Re-Enter Password" />
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100 login-btn mb-4 rounded-2">Sign Up</button>
                <div class="d-flex align-items-center justify-content-center">
                  <p class="fs-4 mb-0 fw-bold">Already have an Account?</p>
                  <a class="text-primary fw-medium ms-2" href="{{ route('login') }}">Sign In</a>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="d-none d-lg-flex col-4 col justify-content-center position-relative">
          <div class="login-bg w-100 h-100 position"></div>
          <div class="d-flex flex-column align-items-center position-absolute justify-content-center py-5 h-100 w-50">
            <h1 class=" d-block fs-2qx fw-bolder text-start mx-auto">Selamat Datang di {{ env('APP_NAME') }}</h1>
            <div class=" d-block fs-base text-start text-black">Pendaftaran untuk pengajuan dispensasi pernikahan dini</div>
          </div>
        </div>

      </div>
    </div>
  </div>


  @push('scripts')
      <script>
          $(document).on('form-submitted:form-register', function() {
              window.location.href = "{{ route('login') }}";
          });
      </script>
  @endpush

@endsection
