<x-layout title="{{__('Frequently Asked Questions')}}" description="{{__('Frequently Asked Questions about Route To Page')}}">

    <div class="flex flex-row items-center justify-between mb-5">
        <h1 class="text-3xl font-bold mb-4">
            {{__('Frequently Asked Questions')}}
        </h1>
        <a href="mailto:routetopage@kurtiii.de" class="btn">
            <i class="fa-regular fa-envelope me-1"></i>
            {{__('Contact')}}
        </a>
    </div>

    <div class="flex flex-col lg:flex-row gap-5 justify-between">
        <div class="w-full lg:w-1/2">
            <h3 class="text-base-content/50 mb-3">
                <i class="fa-regular fa-plus me-1"></i>
                {{__('Create and manage routes')}}
            </h3>

            <div class="collapse collapse-arrow bg-base-100 border border-base-300 mt-3">
                <input type="radio" name="accordion-1" checked="checked" />
                <div class="collapse-title font-semibold">{{__('What is a route?')}}</div>
                <div class="collapse-content text-sm">
                    {{__('A route is a unique code that redirects to a specific URL or file. It can be shared and accessed easily.
                    The big advantage of using a route is that it allows you to share long URLs or files with a simple code, making it easier to share files and links e.a. through phone.')}}
                </div>
            </div>
            <div class="collapse collapse-arrow bg-base-100 border border-base-300 mt-3">
                <input type="radio" name="accordion-1" />
                <div class="collapse-title font-semibold">{{__('How to create a route for an URL?')}}</div>
                <div class="collapse-content text-sm">
                    {{__('You can create an route for an URL by pasting the URL into the input field on the homepage and clicking the "Go" button. You will then receive a unique route code that you can share with others.
                    But for your convenience, you can also do it right here:')}}<br>
                    <form action="{{route('route.store')}}" method="post">
                        @csrf
                        <div class="join mt-4">
                            <div>
                                <label class="input validator join-item">
                                    <i class="fa-regular fa-link-simple"></i>
                                    <input type="url" placeholder="https://example.com/looong.html" name="input" required />
                                    <input type="hidden" name="type" value="url" />
                                </label>
                                <div class="validator-hint hidden">{{__('Enter valid url')}}</div>
                            </div>
                            <button class="btn btn-neutral join-item" type="submit">{{__('Go')}}</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="collapse collapse-arrow bg-base-100 border border-base-300 mt-3">
                <input type="radio" name="accordion-1" />
                <div class="collapse-title font-semibold">{{__('How to create a route for a file?')}}</div>
                <div class="collapse-content text-sm">
                    <div role="alert" class="alert mb-3">
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
                    {!! __('You can attach a file to your route by clicking <button class="btn btn-xs"><i class="fa-regular fa-paperclip"></i> Attach file</button> on the homepage.
                    After selecting a file, you will receive a unique route code that you can share with others.
                    The maximum file size is 1 GiB.') !!}<br>

                    <a href="{{route('index')}}" class="btn btn-neutral mt-3">
                        <i class="fa-regular fa-file-lines me-1"></i>
                        {{__('Go to file upload')}}
                    </a>
                </div>
            </div>
            <div class="collapse collapse-arrow bg-base-100 border border-base-300 mt-3">
                <input type="radio" name="accordion-1" />
                <div class="collapse-title font-semibold">{{__('How to configure auto-delete?')}}</div>
                <div class="collapse-content text-sm">
                    {!! __('You can configure the time to live of your route only <u>before creating</u>.
                    Click on <button class="btn btn-xs"><i class="fa-regular fa-cog"></i> Configure</button> on the homepage and select the desired expiration time.
                    Files attached to routes will be deleted after max. 7 days or after the expiration time you set (whichever is shorter).
                    <b>The default TTL for all routes is 24h.</b>') !!}
                    <br />
                    {{ __('If you want to create a route that never expires, select "Never" in the expiration time dropdown.') }}
                    <div class="divider"></div>
                    {{ __('To delete routes before their set expiration date you have to contact us. Please use the report form for this.') }}
                </div>
            </div>
        </div>
        <div class="w-full lg:w-1/2">
            <h3 class="text-base-content/50 mb-3">
                <i class="fa-regular fa-signs-post me-1"></i>
                {{__('Share and access routes')}}
            </h3>

            <div class="collapse collapse-arrow bg-base-100 border border-base-300 mt-3">
                <input type="radio" name="accordion-2" checked="checked" />
                <div class="collapse-title font-semibold">{{__('How to open a route?')}}</div>
                <div class="collapse-content text-sm">
                    {{__('You can open a route by entering the unique route code into the input field on the homepage and clicking the "Go" button.
                    You can also access the route by using the short link or QR code that was generated when the route was created.')}}
                </div>
            </div>

            <div class="collapse collapse-arrow bg-base-100 border border-base-300 mt-3">
                <input type="radio" name="accordion-2" />
                <div class="collapse-title font-semibold">{{__('How to report a route?')}}</div>
                <div class="collapse-content text-sm">
                    {{__('If you find a route that contains inappropriate content, please report it to us.
                    You will be asked to provide a reason for the report and your email address. We will review the report and take appropriate action.')}}

                    <a href="https://forms.gle/tRrxAWWChXkuVQik6" class="btn btn-neutral mt-3">
                        <i class="fa-regular fa-flag me-1"></i>
                        {{__('Report a route')}}
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="divider my-5"></div>

    <h3 class="text-base-content/50 mb-3">
        <i class="fa-regular fa-envelope me-1"></i>
        {{__('Still have questions?')}}
    </h3>
    <p class="text-sm">
        {{__('If you have any questions or suggestions, please feel free to contact me via email at')}}
        <a href="mailto:routetopage@kurtiii.de" class="underline decoration-dotted">
            routetopage@kurtiii.de
        </a>
    </p>

</x-layout>
