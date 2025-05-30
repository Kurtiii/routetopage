@props(['title' => '', 'description' => '', 'index' => true])

<!doctype html>
<html lang="{{Lang::locale()}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title}} • Route to Page</title>
    <meta name="description" content="{{$description}}">
    <meta name="theme-color" content="#c74516">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    @if ($index)
        <link rel="canonical" href="{{ url()->current() }}">
        <meta name="robots" content="index, follow">
    @else
        <meta name="robots" content="noindex, nofollow">
    @endif

    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/privacy_notice.js'])
    <script src="https://kit.fontawesome.com/e53a33f556.js" crossorigin="anonymous"></script>
</head>
<body class="flex flex-col min-h-screen">

<x-navbar />

<div id="privacy-notice" class="hidden">
    <div class="fixed bottom-0 p-6 w-full flex justify-center z-[2000]">
        <div role="alert" class="alert alert-vertical sm:alert-horizontal shadow-xl bg-base-100">
            <i class="fa-regular fa-circle-info hidden sm:inline-block"></i>
            <span>
                By using this website, you agree to our <a href="{{ route('faq.guidelines') }}" class="link">content guidelines</a> and the <a href="{{ route('faq.privacy') }}" class="link">privacy policy</a>.
            </span>
            <div>
                <button class="btn btn-sm sm:w-auto w-full" id="privacy-notice-close">
                    <i class="fa-regular fa-xmark"></i>
                    {{__('Got it!')}}
                </button>
            </div>
        </div>
    </div>
</div>

<div class="container lg:mx-auto px-4 mt-7">

    @if (session('error'))
        <div role="alert" class="alert alert-error">
            <i class="fa-regular fa-circle-exclamation me-1"></i>
            <span>
                {{ session('error') }}
            </span>
        </div>
    @endif

    {{$slot}}

</div>

<x-footer />

</body>
</html>
