<x-layout title="{{__('Download file')}}" description="{{__('Download the file from the route')}}" :index="false">
    <div class="flex flex-row mb-4">

        <div class="grow">

        </div>
    </div>

    <div class="flex flex-row justify-between items-center mb-3">
        <div class="text-sm text-base-content/50 lg:hidden">
            {{__('Seems shady?')}}
        </div>
        <div class="ms-auto">
            <a class="btn btn-xs" href="https://docs.google.com/forms/d/e/1FAIpQLScEhxB7C9VqCe6CSqHmBhdM_1YHN9awVkarF79dkcdQcGo0bg/viewform?usp=pp_url&entry.218546264={{$route->code}}" target="_blank">
                <i class="fa-regular fa-flag"></i>
                {{__('Report abuse')}}
            </a>
        </div>
    </div>
    <div class="card card-border bg-base-100 shadow-xl">
        <div class="card-body flex flex-col lg:flex-row lg:items-center">
            <div class="me-5 hidden lg:inline-block">
                <i class="fa-regular fa-file-arrow-down fa-5x"></i>
            </div>

            <div class="grow">
                <h3 class="card-title text-2xl">
                    {{basename($route->file_path)}}
                </h3>
                <p class="text-sm">
                    <span class="text-base-content/50"><i class="fa-regular fa-arrow-up-right-and-arrow-down-left-from-center"></i> Size: </span> {{Number::FileSize(Storage::disk('s3')->size($route->file_path))}}<br>
                    <span class="text-base-content/50"><i class="fa-regular fa-calendar"></i> Uploaded: </span> {{Date::parse($route->created_at)->format('Y-m-d H:i')}}<br>
                    <span class="text-base-content/50"><i class="fa-regular fa-clock"></i> Expires: </span>
                    @if($route->valid_until)
                        {{Date::parse($route->valid_until)->format('Y-m-d H:i')}}
                    @else
                        {{__('never')}}
                    @endif
                </p>
            </div>
            <div class="lg:ms-auto">
                <button class="btn btn-xl btn-accent mt-5 w-full lg:mt-0 lg:w-auto" id="btnDownload" data-file-url="{{$signedUrl}}">
                    <i class="fa-regular fa-download me-1"></i>
                    Download
                </button>
            </div>
        </div>
    </div>
    <div class="card card-border bg-base-100 shadow-xl mt-10">
        <div class="card-body flex flex-row items-center text-sm">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"><path fill="#cc2b1d" d="M1 11H31V21H1z"></path><path d="M5,4H27c2.208,0,4,1.792,4,4v4H1v-4c0-2.208,1.792-4,4-4Z"></path><path d="M5,20H27c2.208,0,4,1.792,4,4v4H1v-4c0-2.208,1.792-4,4-4Z" transform="rotate(180 16 24)" fill="#f8d147"></path><path d="M27,4H5c-2.209,0-4,1.791-4,4V24c0,2.209,1.791,4,4,4H27c2.209,0,4-1.791,4-4V8c0-2.209-1.791-4-4-4Zm3,20c0,1.654-1.346,3-3,3H5c-1.654,0-3-1.346-3-3V8c0-1.654,1.346-3,3-3H27c1.654,0,3,1.346,3,3V24Z" opacity=".15"></path><path d="M27,5H5c-1.657,0-3,1.343-3,3v1c0-1.657,1.343-3,3-3H27c1.657,0,3,1.343,3,3v-1c0-1.657-1.343-3-3-3Z" fill="#fff" opacity=".2"></path></svg>
            <i class="fa-solid fa-lock text-success -ms-4 mt-4"></i>
            <span class="text-base-content/50 ms-2">
                {{__('This file is stored on a secure server by Ionos SE in Berlin, Germany.')}}<br>
            </span>
        </div>
    </div>

    <x-modal id="downloaded">
        <div class="flex flex-col items-center my-10">
            <i class="fa-light fa-check-circle fa-5x text-neutral mb-4"></i>
            <h3 class="text-2xl font-bold">{{__('Download started')}}</h3>
            <p class="text-sm text-base-content/50 mt-2">{{__('You have successfully downloaded the file.')}}</p>
            <div class="divider"></div>
            <p class="text-sm text-base-content/50 mb-4">{{__('Download not started?')}}</p>
            <a href="{{$signedUrl}}" class="btn btn-sm" target="_blank" download>
                <i class="fa-regular fa-rotate-right me-1"></i>
                {{__('Try again')}}
            </a>
        </div>
    </x-modal>

    @vite('resources/js/file_download.js')
</x-layout>
