@extends('tenant.layouts.auth')

@section('content')
<section class="auth auth__form-{{ $login->position_form }}">
    @include('tenant.auth.partials.side_left')
    <article class="auth__form">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="text-center">
                <h1 class="auth__title">
                    <span class="text-xs" style="font-weight: bold; font-size: 75%;">Bienvenido a</span><br>
                    <div class="mype-logo-container my-3">
                        <img src="{{ asset('images/logo-mype.png') }}" alt="MYPE" class="mype-logo" style="max-width: 300px; height: auto;">
                    </div>
                </h1>
                <div class="d-flex justify-content-center mb-3">
                    @if($company->logo)
                        <img src="{{ asset('storage/uploads/logos/' . $company->logo) }}" alt="Logo de la empresa" style="max-width: 150px; height: auto;" />
                    @else
                        <img src="{{asset('logo/tulogo.png')}}" alt="Logo de la empresa" style="max-width: 150px; height: auto;" />
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="email" style="font-size: 120%;">Correo corporativo <span style="color: red;">*</span></label>
                <input type="email" name="email" id="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ old('email') }}" autofocus>
                @if ($errors->has('email'))
                <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="password" style="font-size: 120%;">Contraseña <span style="color: red;">*</span></label>
                <div class="position-relative">
                    <input type="password" name="password" id="password" class="form-control hide-password {{ $errors->has('password') ? 'is-invalid' : '' }}">
                    <button type="button" class="btn btn-eye" id="btnEye" tabindex="4" style="color: #39AA36;">
                        <i class="fa fa-eye"></i>
                    </button>
                </div>
                @if ($errors->has('password'))
                <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                @endif
            </div>
            <button type="submit" class="btn btn-signin btn-block" style="background-color: #013A33; border-color: #013A33;">INICIAR SESIÓN</button>
            <div class="text-center p-4">
                <a href="{{ url('password/reset') }}" tabindex="5">¿Has olvidado tu contraseña?</a>
            </div>
            <div class="form-group">
                <div class="form-check" style="display: flex; align-items: center;">
                    <input type="checkbox" name="terms_accepted" id="terms_accepted" class="form-check-input" required style="margin-right: 8px; margin-top: 0;">
                    <label class="form-check-label" for="terms_accepted" style="margin-bottom: 0;">
                        Al continuar, aceptas nuestros <a href="#" target="_blank" style="color: #39AA36;">Términos de Servicio</a> y nuestra <a href="#" target="_blank" style="color: #39AA36;">Política de Privacidad</a>.
                    </label>
                </div>
            </div>
            @include('tenant.auth.partials.socials')
        </form>
    </article>
</section>
    {{-- <section class="body-sign">
                                <div class="checkbox-custom checkbox-default">
                                    <input name="remember" id="RememberMe" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                                    <label for="RememberMe">Recordarme</label>
                                </div>
    </section> --}}
@endsection
@push('scripts')
    <script>
        var inputPassword = document.getElementById('password');
        var btnEye = document.getElementById('btnEye');
        btnEye.addEventListener('click', function () {
            if (inputPassword.classList.contains('hide-password')) {
                inputPassword.type = 'text';
                inputPassword.classList.remove('hide-password');
                btnEye.innerHTML = '<i class="fa fa-eye-slash" style="color: #39AA36;"></i>'
            } else {
                inputPassword.type = 'password';
                inputPassword.classList.add('hide-password');
                btnEye.innerHTML = '<i class="fa fa-eye" style="color: #39AA36;"></i>'
            }
        });
    </script>
@endpush
