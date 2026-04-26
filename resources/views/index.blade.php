<x-layout title="{{__('Create or open')}}" description="{{__('Create a route to any URL or file and share it with others.')}}">
    <div role="alert" class="alert alert-horizontal mt-4">
        <i class="fa-regular fa-party-horn text-xl shrink-0"></i>
        <div>
            <h3 class="font-bold">
                {{__('New design, new features, same goal!')}}
            </h3>
            <div class="text-xs">
                {{__('We are excited to announce the launch of our new design and features!')}}
            </div>
        </div>
    </div>

    <div class="card card-border bg-base-100 shadow-xl mt-5">
        <div class="card-body">
            <form action="{{route('route.store')}}" method="post">
                @csrf
                <div class="join w-full">
                    <div class="w-full">
                        <label class="input input-xl join-item w-full">
                            <i class="fa-regular fa-link opacity-50"></i>
                            <input type="text" placeholder="{{__("Enter URL or Route Code...")}}" name="input" required />
                        </label>
                    </div>
                    <button class="btn btn-accent btn-xl join-item" type="submit">
                        <span class="hidden lg:inline text-lg me-2">{{__('Go')}}</span>
                        <i class="fa-regular fa-arrow-right"></i>
                    </button>
                </div>
                <input type="hidden" name="type" value="url" />
                <input type="text" class="hidden" id="routeExpiration" name="routeExpiration" value="" />
            </form>
            <div class="flex flex-row gap-5 items-center mt-3">
                <button class="btn btn-sm" id="btnAttachFile"><i class="fa-regular fa-paperclip"></i>{{__('Attach file')}}</button>
{{--                <button class="btn btn-sm"><i class="fa-regular fa-file-lines"></i>{{__('Paste text')}}</button>--}}
                <button class="btn btn-sm ms-auto" onclick="modal_configure.showModal()">
                    <i class="fa-regular fa-cog"></i>
                    <span class="hidden lg:inline">{{__('Configure')}}</span>
                </button>
            </div>
        </div>
    </div>

    <div class="divider my-10"></div>

    <div class="flex flex-col lg:flex-row gap-5 items-center justify-between">
        <div class="grow">
            <h3 class="font-bold mb-4">
                {{__('Create a Route')}}
            </h3>
            <ul class="steps steps-vertical">
                <li class="step">
                    <span class="step-icon"><i class="fa-regular fa-pen-field"></i></span>
                    {{__('Paste your link or select a file')}}
                </li>
                <li class="step">
                    <span class="step-icon"><i class="fa-regular fa-input-numeric"></i></span>
                    <div class="text-start">
                        {{__('Get your unique 5-digit route code')}}
                    </div>
                </li>
                <li class="step">
                    <span class="step-icon"><i class="fa-regular fa-share-nodes"></i></span>
                    <div class="text-start">
                        {{__('Share your route code with others')}}
                        <div class="text-xs opacity-60">{{__('via 5-digit code, short link or QR code')}}</div>
                    </div>
                </li>
                <li class="step opacity-50">
                    <span class="step-icon"><i class="fa-regular fa-clock"></i></span>
                    <div class="text-start">
                        {{__('Route expires after predetermined time')}}
                        <div class="text-xs opacity-60">{{__('will be deleted after custom expiration time (or never)')}}</div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="divider lg:divider-horizontal">
            {{__('or')}}
        </div>
        <div class="grow">
            <h3 class="font-bold mb-4">
                {{__('Open a Route')}}
            </h3>
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

    <x-modal id="configure">
        <div class="flex flex-col items-center justify-center">
            <div role="alert" class="alert w-100 my-4">
                <i class="fa-regular fa-file-exclamation text-xl shrink-0"></i>
                <div>
                    <h3 class="font-bold">
                        {{__('Time to live of files')}}
                    </h3>
                    <div class="text-xs">
                        {{ __('Files attached to routes will be deleted after max. 7 days.')}}<br>
                    </div>
                </div>
            </div>

            <fieldset class="fieldset bg-base-200 border-base-300 rounded-box border w-100 p-4">
                <legend class="fieldset-legend">
                    <i class="fa-regular fa-clock"></i>
                    {{__('Time to live')}}
                </legend>

                <label class="label">
                    <input type="checkbox" class="toggle" id="toggleTTL" checked />
                    {{__('Enable time to live for this route')}}
                </label>

                <input type="datetime-local" class="input mt-4" id="ttlInput" />

                <p class="label">
                    {{__('Select how long your route should be available before it expires.')}}
                </p>
            </fieldset>

            <button class="btn btn-sm btn-neutral w-100 mt-4" id="btnSaveConfig">
                <i class="fa-regular fa-save"></i>
                {{__('Save')}}
            </button>
        </div>
    </x-modal>

    <form id="fileUploadForm" class="hidden" method="post" action="{{route('route.store')}}" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" id="inputFile" accept=".txt,.pdf,.docx,.xlsx,.jpg,.png,.gif" />
        <input type="hidden" name="type" value="file" />
    </form>

    @vite('resources/js/file_upload.js')

</x-layout>
