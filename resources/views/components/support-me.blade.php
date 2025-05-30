<div class="card card-border bg-base-100 shadow-xl my-9">
    <div class="card-body">
        <div class="flex flex-row gap-5 items-center justify-between">
            <div class="flex flex-row gap-5 items-center">
                <div class="avatar">
                    <div class="mask mask-squircle w-10">
                        <img src="{{asset('images/kurt.webp')}}"  alt="Picture of Kurt Krüger"/>
                    </div>
                </div>
                <div>
                    <h3 class="font-bold">
                        Made with <i class="fa-solid fa-heart text-red-500"></i> by Kurt
                    </h3>
                    <div class="text-xs">
                        {!! __('All of this is free to use and without any ads. If you like this project, consider supporting me!') !!} <i class="fa-regular fa-face-smile"></i>
                    </div>
                </div>
            </div>
            <div class="hidden lg:flex flex-row gap-2 items-center">
                <a class="btn btn-sm" href="https://kurtiii.de" target="_blank">
                    <i class="fa-regular fa-globe"></i>
                </a>
                <a class="btn btn-sm" href="https://instagram.com/kurtiii06" target="_blank">
                    <i class="fa-brands fa-instagram"></i>
                </a>
                <a class="btn btn-sm" href="https://ko-fi.com/kurtiii" target="_blank">
                    <i class="fa-regular fa-heart"></i>
                    {{__('Tip me on Ko-fi')}}
                </a>
            </div>
        </div>
        <div class="lg:hidden mt-5 flex flex-row gap-2">
            <a class="btn btn-sm" href="https://kurtiii.de" target="_blank">
                <i class="fa-regular fa-globe"></i>
                {{__('Website')}}
            </a>
            <a class="btn btn-sm" href="https://instagram.com/kurtiii06" target="_blank">
                <i class="fa-brands fa-instagram"></i>
                Instagram
            </a>
            <a class="btn btn-sm grow" href="https://ko-fi.com/kurtiii" target="_blank">
                <i class="fa-regular fa-heart"></i>
                {{__('Tip me on Ko-fi')}}
            </a>
        </div>
    </div>
</div>
