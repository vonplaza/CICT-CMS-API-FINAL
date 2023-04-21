
<title>Change Password</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<style>
    .changeBtn:hover{
        filter: contrast(1.1);
    }
    .changeBtn{
        border-width: 0px;
    width: 150px;
    height: 40px;
    border-radius: 0.5rem;
    background-color: #D05834;
    color: white;
    font-weight: thin;
    }
    .bg{
        height: 100%;
        width: 100%;
        display: flex;
  justify-content: center;
  align-items: center;
  background-image: url('bg.png');
    }
    header{
        font-size: 50px;
        font-weight: bold;
    }
    .container{
        animation-name: anim;
        animation-duration: 1s;
        transform: translateX(0px);
        opacity: 100%;
        transition: transform 1s ease-in-out;
    }
    @keyframes anim {
        0%   { transform: translateX(-50px); opacity: 50%;}
        100% { transform: translateX(0px); opacity: 100%;}
      }
      .form-control{
        border: none;
  border-bottom: 1px solid black;
  outline: none;
  border-radius: 0rem;
      }
</style>
<div class="bg">
<div class="container" style="width: 70%;">
  <div class="row justify-content-center">
      <div class="col-md-8">
        @if(!session()->has('success'))
        <!-- <img src="http://127.0.0.1:8000/bulsu.png"/> -->
        <header>CICT: CMS</header>
          <div class="card" style="border-width:0; box-shadow:1px 1px 2px black;">
              <div class="card-header" style="background-color:#D05834; font-weight:bold; color:white;">{{ __('Reset Password') }}</div>

              <div class="card-body">
                  <form method="POST" action="{{ route('password.update') }}">
                      @csrf

                      <input type="hidden" name="token" value="{{ $token }}">

                      <!-- <div class="form-group row">
                          <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email Address') }}</label>

                          <div class="col-md-6">
                              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                              @error('email')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div> -->

                      <div class="form-group row" style="margin-bottom: 15px;">
                          <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                          <div class="col-md-6">
                              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                              @error('password')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row" style="margin-bottom: 15px;">
                          <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                          <div class="col-md-6">
                              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                          </div>
                      </div>

                      <div class="form-group row mb-0">
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="changeBtn">
                                  {{ __('Reset Password') }}
                              </button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
          @endif

          @if(session()->has('success'))
              <div class="alert alert-success">
                <h2>Password Change Successfully</h2>
              </div>
          @endif
      </div>
  </div>
</div>
</div>
