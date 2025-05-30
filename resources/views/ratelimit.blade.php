<x-layout title="{{__('Rate limit exceeded')}}" description="{{__('You have exceeded the rate limit for this page. Please try again later.')}}" :index="false">
    <div class="flex flex-row gap-7 items-center justify-center">
        <div class="hidden lg:block">
            <img src="{{asset('images/sleepy-duck.webp')}}" alt="Sleepy Duck" class="w-60 h-60 rounded-lg shadow-lg">
        </div>
        <div>
            <div class="badge badge-soft badge-neutral mb-3">
                <i class="fa-regular fa-circle-exclamation me-1"></i>
                {{__('Woops!')}}
            </div>
            <h1 class="text-2xl font-bold mb-2">{{__('Rate limit exceeded')}}</h1>
            <p>
                {{__('We detected unusual activity from your IP address, which has triggered our rate limiting system.')}}<br>
                {{__('Please wait a few minutes before trying again. If you believe this is an error, please contact support.')}}
            </p>

            <a href="{{route('index')}}" class="btn btn-sm mt-4">
                <i class="fa-regular fa-arrow-left me-2"></i>
                {{__('Go back to home')}}
            </a>
        </div>
    </div>
</x-layout>
