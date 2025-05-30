<div {{ $attributes->class(['navbar bg-base-300 shadow-sm']) }}>
    <div class="navbar-start">
        <img src="{{asset('images/logo.webp')}}" alt="Logo" class="h-5 ms-3">
    </div>
    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal px-1">
            <li><a href="{{ route('index') }}"><i class="fa-regular fa-house"></i>{{__('Home')}}</a></li>
            <li><a href="{{ route('developers') }}"><i class="fa-regular fa-code"></i>{{__('Developers')}}</a></li>
            <li><a href="{{ route('faq.index') }}"><i class="fa-regular fa-message-question"></i>{{__('Support')}}</a></li>
        </ul>
    </div>
    <div class="navbar-end">
        <a class="btn btn-neutral" href="{{ route('index') }}"><i class="fa-solid fa-plus"></i> {{__('Create route')}}</a>
    </div>
</div>
