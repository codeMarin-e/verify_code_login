<x-main>
    <h1>@lang('verify_code.title')</h1>

    @foreach($errors->verify->all() as $error)
        <div style="color: red;"><strong>{{ $error }}</strong></div>
    @endforeach

    @if(session('resent'))
        <div style="color: green;"><strong>@lang("verify_code.resent")</strong></div>
    @endif

    <form method="POST" action="{{ route('verify_code.check') }}" autocomplete="off">
        @csrf
        <label for="verify_code">@lang('verify_code.code')</label>
        <input type="text"
               id="verify_code"
               class="@if($errors->verify->has('code')) error @endif"
               onkeyup="this.classList.remove('error')"
               placeholder="@lang('verify_code.code')"
               name="verify[code]"
               maxlength="{{config('marinar_verify_code_login.code_length')}}"
               minlength="{{config('marinar_verify_code_login.code_length')}}"
               required="required"
               value="{{ old('verify.code')}}"
               autofocus="autofocus" />
        <br />
        <a href="{{route('verify_code.resend')}}">@lang('verify_code.resend')</a>
        <br />
        <button type="submit">@lang('verify_code.submit')</button>
    </form>
</x-main>
