<div class="mt-auto">
    <div class="container lg:mx-auto px-4">
        <x-support-me />
    </div>

    <footer class="footer footer-horizontal footer-center bg-base-200 text-base-content rounded p-10">
        <nav class="grid lg:grid-flow-col grid-flow-row gap-4">
            <a class="btn btn-xs w-full lg:hidden" href="{{route('faq.index')}}">
                <i class="fa-regular fa-envelope"></i>
                {{__('Contact & FAQs')}}
            </a>
            <a class="btn btn-xs w-full lg:w-auto" href="{{route('faq.privacy')}}">
                <i class="fa-regular fa-arrow-up-right-from-square"></i>
                {{__('Privacy Policy')}}
            </a>
            <a class="btn btn-xs w-full lg:w-auto" href="https://kurtiii.de/privacy/">
                <i class="fa-regular fa-arrow-up-right-from-square"></i>
                {{__('Legal Notice')}}
            </a>
            <a class="btn btn-xs w-full lg:w-auto" href="{{route('faq.guidelines')}}">
                <i class="fa-regular fa-arrow-up-right-from-square"></i>
                {{__('Content Guidelines')}}
            </a>
        </nav>
        <nav>
            <div class="grid grid-flow-col gap-4">
                <a href="https://discord.gg/vjV9QkFnpq">
                    <i class="fa-brands fa-discord text-xl"></i>
                </a>
                <a href="https://github.com/Kurtiii/routetopage">
                    <i class="fa-brands fa-github text-xl"></i>
                </a>
                <a href="https://ko-fi.com/kurtiii">
                    <i class="fa-regular fa-message-heart text-xl"></i>
                </a>
            </div>
        </nav>
        <aside>
            <p class="opacity-50">
                Made with <a href="https://random-d.uk/"><i class="fa-regular fa-duck"></i></a> by
                <a href="#" class="link link-hover">Kurt</a> | © {{ date('Y') }}
            </p>
        </aside>
    </footer>
</div>
