<x-layout title="{{__('Content Guidelines')}}" description="{{__('What\'s allowed and what\'s not on Route To Page')}}">
    <div class="flex flex-row items-center justify-between mb-5">
        <h1 class="text-3xl font-bold mb-4">
            {{__('Content Guidelines')}}
        </h1>
        <a href="https://forms.gle/gUX27zLKAXQyNTT89" class="btn">
            <i class="fa-regular fa-arrow-up-right-from-square me-1"></i>
            {{__('Report abuse')}}
        </a>
    </div>

    <p>
        {{__('To ensure a safe and enjoyable experience for all users, I have established the following content guidelines for this website.')}}
    </p>

    <div class="divider my-5"></div>

    <h2 class="text-base-content/50 text-xl mb-2">
        {{__('Prohibited content')}}
    </h2>
    <p>
        {{__('You may not create a route to or upload content that includes (but is not limited to):')}}
    </p>

    <h3 class="text-base-content/50 text-sm mt-3">
        {{__('Illegal content')}}
    </h3>
    <ul class="list-disc list-inside mt-1">
        <li>{{__('Child sexual abuse material (CSAM)')}}</li>
        <li>{{__('Content infringing on copyrights, trademarks, or other intellectual property without authorization')}}</li>
        <li>{{__('Malware, spyware, ransomware, or any other malicious code')}}</li>
        <li>{{__('Unlicensed distribution of copyrighted software, games, movies, music, etc.')}}</li>
        <li>{{__('Content that violates applicable local, national, or international law')}}</li>
    </ul>

    <h3 class="text-base-content/50 text-sm mt-3">
        {{__('Harmful or abusive material')}}
    </h3>
    <ul class="list-disc list-inside mt-1">
        <li>{{__('Threats, harassment, bullying, or personal attacks')}}</li>
        <li>{{__('Hate speech or content that promotes violence or discrimination based on race, religion, gender, orientation, etc.')}}</li>
        <li>{{__('Self-harm or suicide promotion')}}</li>
        <li>{{__('Content that promotes or enables terrorism or violent extremism')}}</li>
    </ul>

    <h3 class="text-base-content/50 text-sm mt-3">
        {{__('Fraudulent or deceptive content')}}
    </h3>
    <ul class="list-disc list-inside mt-1">
        <li>{{__('Phishing, scams, fake login pages, or impersonation of others')}}</li>
        <li>{{__('Fake giveaways or pyramid schemes')}}</li>
        <li>{{__('Fake news and false information')}}</li>
        <li>{{__('Misleading redirections (e.g., disguising a malicious link as legitimate)')}}</li>
    </ul>

    <h3 class="text-base-content/50 text-sm mt-3">
        {{__('Sexually explicit or adult material')}}
    </h3>
    <ul class="list-disc list-inside mt-1">
        <li>{{__('Pornography or sexually explicit images/videos')}}</li>
        <li>{{__('Sexually suggestive content involving minors (even if fictional)')}}</li>
    </ul>

    <div class="divider my-5"></div>

    <h2 class="text-base-content/50 text-xl mb-2">
        {{__('Fair use and rate limiting')}}
    </h2>
    <p>
        {{__('To ensure fair use and prevent abuse, you can only create a specific number of routes per day.
        If you reach this limit, you will have to wait until the next day to create more routes.
        This is to prevent spamming and ensure that the service remains available for all users.')}}
    </p>
    <p>
        {{__('Do not use this service to spam or flood the platform with routes. Do not create routes automatically.') }}
    </p>

    <div class="divider my-5"></div>

    <h2 class="text-base-content/50 text-xl mb-2">
        {{__('User agreement')}}
    </h2>
    <ul class="list-disc list-inside mt-1">
        <li>{{__('By using this service, you agree to comply with these content guidelines.')}}</li>
        <li>{{__('You are responsible for the content you upload or link to.')}}</li>
        <li>{{__('If you shorten a URL, ensure that the destination content also complies with these guidelines.')}}</li>
        <li>{{__('You must comply with all applicable laws and respect the rights of others.')}}</li>
        <li>{{__('You must not attempt to bypass filters, detection systems, or enforcement mechanisms.')}}</li>
    </ul>

    <div class="divider my-5"></div>

    <h2 class="text-base-content/50 text-xl mb-2">
        {{__('Enforcement')}}
    </h2>
    <p>{{__('We reserve the right to:')}}</p>
    <ul class="list-disc list-inside mt-1">
        <li>{{__('Remove or disable access to any route that violates this guidelines.')}}</li>
        <li>{{__('Suspend or ban repeat offenders.')}}</li>
        <li>{{__('Report illegal content to appropriate law enforcement authorities.')}}</li>
    </ul>

    <div class="divider my-5"></div>

    <h2 class="text-base-content/50 text-xl mb-2">
        {{__('Disclaimer')}}
    </h2>
    <p>{{__('We are not responsible for the content shared by users but will act promptly on reports of abuse or policy violations.')}}</p>

</x-layout>
