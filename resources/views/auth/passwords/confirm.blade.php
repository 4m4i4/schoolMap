@extends('layouts.app')

@section('tablas')
<div class="nomodal">
  @include('include.formBanner')
      <div class="px-6 caja-header text-center">
        <h3 class="form-title">{{ __('Confirm Password') }}
        </h3>
      </div>
      <div class="mt-4 px-6">
        {{ __('Please confirm your password before continuing.') }}
      </div>

      <form class="px-6" method="POST" action="{{ route('password.confirm') }}">
        @csrf
          <div class="mt-4">
            <label for="password">{{ __('Password') }}</label>
            <input id="password" type="password" class="d_block" name="password" required autocomplete="current-password">
            @error('password')
              <small class="t_red">* {{ $message }}</small><br>
            @enderror
          </div>
          <div>
            <button type="submit" title=" {{ __('Confirm Password') }}" class="bt_xxl mt-6 enviar"> {{ __('Confirm Password') }}</button>
          </div>
          @if (Route::has('password.request'))
            <a class="d_block" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
          @endif
        </form>
      </div>
      <div class="px-6 py-4 mt-6 light-grey">
        <a href="/" title="Volver a la página anterior" class="cancelar">Cancelar</a>
      </div>
    </div>
</div>
@endsection
