<x-layout title="{{__('Privacy Policy')}}" description="{{__('Learn how we handle your data on Route to Page')}}" index="false">
    <div class="flex flex-row items-center justify-between mb-5">
        <h1 class="text-3xl font-bold mb-4">
            {{__('Privacy Policy')}}
        </h1>
        <a href="https://kurtiii.de/privacy/" class="btn">
            <i class="fa-regular fa-arrow-up-right-from-square me-1"></i>
            {{__('Legal Notice')}}
        </a>
    </div>

    <p>
        {{__('I take the protection of your personal data very seriously. I treat your personal data confidentially and in accordance with the statutory data protection regulations and this privacy policy.')}}
    </p>

    <p>
        {{__('I am not responsible for the content of external websites or of user-generated content. The privacy policy of the respective provider applies.')}}
    </p>

    <div class="divider my-5"></div>

    <h3 class="text-base-content/50 mb-2">
        Cloudflare
    </h3>
    <p>
        {{__('This website uses Cloudflare, a service provided by Cloudflare Inc., 101 Townsend St, San Francisco, CA 94107, USA.
        Cloudflare provides a content delivery network (CDN) and security services to improve the performance and security of this website.
        Cloudflare uses cookies to optimize and secure the website. Cloudflare may store personal data in the USA.
        Cloudflare is certified under the Privacy Shield Agreement and thus offers a guarantee to comply with European data protection law.
        To learn more visit Cloudflare\'s privacy policy.')}}
    </p>

    <a href="https://www.cloudflare.com/privacypolicy/" class="btn btn-xs mt-3">
        <i class="fa-regular fa-arrow-up-right-from-square me-1"></i>
        {{__('Cloudflare\'s Privacy Policy')}}
    </a>

    <div class="divider my-5"></div>

    <h3 class="text-base-content/50 mb-2">
        Server log files
    </h3>
    <p>
        {{__('When you visit this website, the web server automatically collects and stores information in so-called server log files that your browser automatically transmits to me. These are:')}}
    </p>
    <ul class="list-disc list-inside my-3">
        <li>{{__('Browser type and version')}}</li>
        <li>{{__('Operating system used')}}</li>
        <li>{{__('Referrer URL')}}</li>
        <li>{{__('Time of the server request')}}</li>
        <li>{{__('IP address')}}</li>
    </ul>
    <p>
        {{__('This data is not merged with other data sources.
        We collect this data based on Art. 6 (1) (f) GDPR.
        The website operator has a legitimate interest in the technical error-free presentation and optimization of his website - for this purpose, the server log files must be collected.
        This data is stored for a maximum of 7 days and then deleted.
        The data is stored for security reasons, e.g. to clarify cases of abuse.
        If data must be kept for reasons of evidence, it is excluded from deletion until the incident has been finally clarified.')}}
    </p>

    <div class="divider my-5"></div>

    <h3 class="text-base-content/50 mb-2">
        {{__('Visiting a route')}}
    </h3>
    <p>
        {{__('When you visit a route, no additional personal data is collected. The only data that is stored the server log files (see above). None of those information is shared with the route creator or any other third party.')}}
    </p>

    <div class="divider my-5"></div>

    <h3 class="text-base-content/50 mb-2">
        {{__('Creating a route')}}
    </h3>
    <p>
        {{__('When you create a route, the following data is collected:')}}
    </p>
    <ul class="list-disc list-inside my-3">
        <li>{{__('The route code')}}</li>
        <li>{{__('The type of the route (URL or file)')}}</li>
        <li>{{__('The URL or uploaded file')}}</li>
        <li>{{__('The date and time of creation')}}</li>
        <li>{{__('The date and time of expiration (if applicable)')}}</li>
    </ul>
    <p>
        {{__('This data is stored for the pre-set duration of the route and then deleted automatically.
        To delete a route before its expiration date, you have to contact me.')}}
    </p>
    <p class="font-bold">
        {{__('Anyone who knows the route code can access the file or link! Please do not share the route code with anyone you do not trust.')}}
    </p>

    <a href="https://kurtiii.de/privacy/" class="btn btn-xs mt-3">
        <i class="fa-regular fa-arrow-up-right-from-square me-1"></i>
        {{__('Contact')}}
    </a>

    <div class="divider my-5"></div>

    <h3 class="text-base-content/50 mb-2">
        {{__('Right to information and deletion')}}
    </h3>
    <p>
        {{__('You have the right to request information about the personal data stored about you at any time. You also have the right to have incorrect data corrected and to have your personal data deleted, provided that there is no legal obligation to retain it.')}}
    </p>
    <a href="https://kurtiii.de/privacy/" class="btn btn-xs mt-3">
        <i class="fa-regular fa-arrow-up-right-from-square me-1"></i>
        {{__('Contact')}}
    </a>
</x-layout>
