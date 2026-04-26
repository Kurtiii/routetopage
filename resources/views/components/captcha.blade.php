@php
$id = Str::random(10);
@endphp

<fieldset {{ $attributes->class(['fieldset bg-base-200 border-base-300 rounded-box border p-4']) }}>
    <legend class="fieldset-legend">{{__('Captcha')}}</legend>
    <div class="join">
        <img id="{{$id}}_captcha_img" src="{{url('/captcha/default')}}" alt="Captcha"
             class="join-item border-primary/10 border-2">
        <input type="text" class="input join-item {{ $errors->has('captcha') ? 'input-error' : '' }}"
               name="captcha" placeholder="{{__('Captcha code...')}}" required>
        <button class="btn join-item"
                onclick="document.getElementById('{{$id}}_captcha_img').src='{{url('/captcha/default')}}?'+Math.random()"><i
                    class="fa-regular fa-rotate-right px-1"></i></button>
    </div>

    @if ($errors->has('captcha'))
        <p class="label label-error">
            {{ $errors->first('captcha') }}
        </p>
    @endif

    <p class="label">
        {{__('Yeah, we know how annoying they are. Sorry \'bout that 🥲')}}
    </p>
</fieldset>
