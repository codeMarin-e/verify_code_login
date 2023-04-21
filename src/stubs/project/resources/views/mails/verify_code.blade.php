<x-mail_wrapper>
    <h1 style="margin:2px 2px 10px 2px; padding:2px 5px; font-size:16px;">@lang('mails/verify_code.hi')</h1>
    @php
        $chUserAddr = $chUser->addresses->get(0);
    @endphp
    <div style="padding:5px 10px;">{{$chUserAddr->fullName}}</div>
    <div style="padding:5px 10px;">@lang('mails/verify_code.verify_code'): <strong>{{$chUser->verifyCode->code}}</strong></div>
</x-mail_wrapper>
