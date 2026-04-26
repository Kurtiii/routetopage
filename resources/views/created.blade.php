<x-layout title="{{__('Route created')}}" description="{{__('Your route has been successfully created!')}}" :index="false">
    <div role="alert" class="alert alert-success">
        <i class="fa-regular fa-circle-check"></i>
        <span>
            {{__('Route created successfully!')}}
        </span>
    </div>

    <div class="flex justify-between items-baseline flex-col xl:flex-row gap-6 mt-4">
        <div>
            <div class="card card-border bg-base-100 shadow-lg w-100 lg:w-96">
                <div class="card-body flex items-center">
                    <span class="text-neutral/20 font-bold">
                        {{__('Your unique route code is')}}
                    </span>
                    <span class="font-mono text-neutral font-bold text-7xl tracking-widest">
                    {{$route->code}}
                    </span>

                    <div class="flex gap-3">
                        <button class="btn btn-sm btn-neutral mt-5" onclick="navigator.clipboard.writeText('{{route('route.show', ['code' => $route->code])}}');"><i class="fa-regular fa-link-simple"></i> {{__('Copy short link')}}</button>
                        <button class="btn btn-sm mt-5" onclick="navigator.clipboard.writeText('{{$route->code}}');"><i class="fa-regular fa-input-numeric"></i> {{__('Copy route code')}}</button>
                    </div>
                </div>
            </div>
            <div class="card card-border bg-base-100 shadow-lg mt-6 w-100 lg:w-96">
                <div tabindex="0" class="collapse collapse-arrow bg-base-100">
                    <div class="collapse-title font-semibold">
                        <i class="fa-regular fa-qrcode me-2"></i>
                        {{__('Show QR code')}}
                    </div>
                    <div class="collapse-content">
                        <div class="flex flex-col items-center">
                            <div class="block">
                                <img loading="lazy" src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{urlencode(route('route.show', ['code' => $route->code]))}}" alt="QR Code" class="w-50 h-50 bg-white p-7 rounded-xl border-3 border-neutral/30 shadow-lg">
                            </div>
                            <div class="block">
                                <button class="btn btn-sm mt-5"><i class="fa-regular fa-download"></i> {{__('Download QR code')}}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grow">
            <div class="card card-border bg-base-100 grow shadow-lg w-100 lg:w-auto">
                <div class="card-body flex flex-row items-center">
                    <div>
                        <span class="text-neutral/20 font-bold">
                            {{__('Short link')}}
                        </span>
                        <div class="text-base-content/90">
                            <a href="#" onclick="navigator.clipboard.writeText('{{route('route.show', ['code' => $route->code])}}');" class="underline decoration-dotted before:whitespace-pre-wrap">{{route('route.show', ['code' => $route->code])}}</a>
                        </div>
                    </div>
                    <button class="btn btn-sm ms-auto" onclick="navigator.clipboard.writeText('{{route('route.show', ['code' => $route->code])}}');">
                        <i class="fa-regular fa-clipboard"></i> {{__('Copy')}}
                    </button>
                </div>
            </div>

            <div class="card card-border bg-base-100 grow shadow-lg mt-6 w-100 lg:w-auto">
                <div class="card-body">
                    <div>
                        <div class="mb-3">
                            @if($route->type == 'url')
                                <span class="badge"><i class="fa-regular fa-link-simple"></i> URL</span>
                                <span class="text-base-content/90">
                                    <a href="{{$route->url}}" class="underline">{{$route->url}}</a> <i class="fa-regular fa-arrow-up-right-from-square"></i>
                                </span>
                            @elseif($route->type == 'file')
                                <span class="badge"><i class="fa-regular fa-file"></i> {{__('File')}}</span>
                                <span class="text-base-content/90">
                                    <a href="{{route('route.show', ['code' => $route->code])}}" class="underline">{{basename($route->file_path)}}</a> <i class="fa-regular fa-arrow-up-right-from-square"></i>
                                </span>
                            @endif
                        </div>
                        <div>
                            <span class="badge"><i class="fa-regular fa-clock"></i> Expires</span>
                            <span class="text-base-content/90">
                                @if($route->valid_until)
                                    {{\Carbon\Carbon::parse($route->valid_until)->format('d. M Y H:i')}}
                                @else
                                    {{__('never')}}
                                @endif
                            </span>
                            <div class="badge badge-soft badge-success ms-2">
                                <div class="inline-grid *:[grid-area:1/1]">
                                    <div class="status status-success animate-ping"></div>
                                    <div class="status status-success"></div>
                                </div> {{__('active')}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-border bg-base-100 shadow-lg w-100 lg:w-auto">
            <div class="card-body">
                <span class="text-neutral/20 font-bold">
                    {{__('How to open your route')}}
                </span>
                <ul class="steps steps-vertical">
                    <li class="step">
                        <span class="step-icon"><i class="fa-regular fa-globe"></i></span>
                        <div class="text-start">
                            {{__('Visit')}} <span class="tooltip tooltip-bottom underline decoration-dotted before:whitespace-pre-wrap" data-tip='or use one of our aliases
• seite-besuchen.de'>
            routeto.page
        </span>
                        </div>
                    </li>
                    <li class="step">
                        <span class="step-icon"><i class="fa-regular fa-pen-field"></i></span>
                        <div class="text-start">
                            {{__('Enter your received route code')}}
                            <div class="text-xs opacity-60">{{__('or click the short link or QR code')}}</div>
                        </div>
                    </li>
                    <li class="step">
                        <span class="step-icon"><i class="fa-regular fa-arrows-turn-to-dots"></i></span>
                        <div class="text-start">
                            <div class="text-start">
                                {{__('We\'ll redirect you')}}
                                <div class="text-xs opacity-60">{{__('to the original URL or the file download')}}</div>
                            </div>
                        </div>
                    </li>
                    <li class="step">
                        <span class="step-icon"><i class="fa-regular fa-party-horn"></i></span>
                        <div class="text-start">
                            {{__('Be happy!')}}
                            <div class="text-xs opacity-60">{{__('That\'s it! Try it yourself!')}}</div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</x-layout>
