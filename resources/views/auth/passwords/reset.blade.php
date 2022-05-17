@extends('backend.layouts.auth')
@section('title',transWord('Reset Password'))
@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
          <div class="login-brand">
              @if(mainSettingsData() != null)
                  <img src="{{URL::asset('/')}}{{setPublic()}}uploads/backend/settings/{{ mainSettingsData()['logo'] }}" alt="logo" width="150">
              @else
                  <img src="{{ asset('dashboard/assets/img/stisla-fill.svg') }}" alt="logo" width="100" class="shadow-light rounded-circle">
              @endif
          </div>
          <div class="card card-primary">
            <div class="card-header"><h4>@yield('title')</h4></div>
            <div class="card-body">
                <form method="POST" action="{{ route('submit_forget_form') }}" class="needs-validation">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" tabindex="1" required autofocus>
                        <div class="invalid-feedback">
                            @error('email')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="control-label">Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" tabindex="2" required>
                        <div class="invalid-feedback">
                            @error('password')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="control-label">Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        <div class="invalid-feedback">
                            @error('password')
                                <strong>{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>



                      <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                          @yield('title')
                        </button>
                      </div>
                </form>
            </div>
          </div>
          <div class="simple-footer">
            {{ transWord('Copyright') }} &copy;
            @if(mainSettingsData() != null)
            {{ mainSettingsData()['title'] }}
            @else
            {{ transWord('Dashboard') }}
            @endif {{ date('Y') }}
          </div>
        </div>
    </div>
</div>

@endsection
