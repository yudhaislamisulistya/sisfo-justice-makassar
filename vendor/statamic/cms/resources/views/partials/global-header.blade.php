<div class="global-header">
    <div class="lg:min-w-xl pl-1 md:pl-3 h-full flex items-center">
        <button class="nav-toggle hidden md:block ml-sm flex-shrink-0" @click="toggleNav" aria-label="{{ __('Toggle Nav') }}">@cp_svg('burger')</button>
        <button class="nav-toggle md:hidden ml-sm flex-shrink-0" @click="toggleMobileNav" v-if="! mobileNavOpen" aria-label="{{ __('Toggle Mobile Nav') }}">@cp_svg('burger')</button>
        <button class="nav-toggle md:hidden ml-sm flex-shrink-0" @click="toggleMobileNav" v-else v-cloak aria-label="{{ __('Toggle Mobile Nav') }}">@cp_svg('close')</button>
        <a href="{{ route('statamic.cp.index') }}" class="flex items-end">
            <div v-tooltip="version" class="hidden md:block flex-shrink-0">
                @if ($customLogo)
                    <img src="{{ $customLogo }}" alt="{{ config('statamic.cp.custom_cms_name') }}" class="white-label-logo">
                @else
                    PM III-16 Makassar
                    @if (Statamic::pro())<span class="font-bold text-4xs align-top">PRO</span>@endif
                @endif
            </div>
        </a>
    </div>

    <div class="sm:px-4 w-full flex-1 lg:flex items-center lg:justify-center mx-auto max-w-full">
        <global-search endpoint="{{ cp_route('search') }}" placeholder="{{ __('Search...') }}">
        </global-search>
    </div>

    <div class="head-link h-full md:pr-3 flex items-center justify-end">

        @if (Statamic\Facades\Site::hasMultiple())
            <global-site-selector>
                <template slot="icon">@cp_svg('sites')</template>
            </global-site-selector>
        @endif

        <favorite-creator class="hidden md:block"></favorite-creator>

        @if (Route::has('horizon.index') && \Laravel\Horizon\Horizon::check(request()))
            <a class="hidden md:block h-6 w-6 p-sm text-grey ml-2 hover:text-grey-80" href="{{ route('horizon.index') }}" target="_blank" v-tooltip="'Laravel Horizon'">
                @cp_svg('horizon')
            </a>
        @endif

        @if (config('nova.path') && (app()->environment('local') || $user->can('viewNova')))
            <a class="hidden md:block h-6 w-6 p-sm text-grey ml-2 hover:text-grey-80" href="/{{ trim(config('nova.path'), '/') }}/dashboards/main" target="_blank" v-tooltip="'Laravel Nova'">
                @cp_svg('nova')
            </a>
        @endif

        @if (Route::has('telescope') && \Laravel\Telescope\Telescope::check(request()))
            <a class="hidden md:block h-6 w-6 p-sm text-grey ml-2 hover:text-grey-80" href="{{ route('telescope') }}" target="_blank" v-tooltip="'Laravel Telescope'">
                @cp_svg('telescope')
            </a>
        @endif



        <a class="hidden md:block h-6 w-6 p-sm text-grey ml-2 hover:text-grey-80" href="{{ Statamic\Facades\Site::selected()->url() }}" target="_blank" v-tooltip="'{{ __('View Site') }}'" aria-label="{{ __('View Site') }}">
            @cp_svg('browser-com')
        </a>
        <dropdown-list v-cloak>
            <template v-slot:trigger>
                <a class="dropdown-toggle items-center ml-2 h-full hide flex">
                    @if ($user->avatar())
                        <div class="icon-header-avatar"><img src="{{ $user->avatar() }}" /></div>
                    @else
                        <div class="icon-header-avatar icon-user-initials">{{ $user->initials() }}</div>
                    @endif
                </a>
            </template>

            <div class="px-1">
                <div class="text-base mb-px">{{ $user->email() }}</div>
                @if ($user->isSuper())
                    <div class="text-2xs mt-px text-grey-60">{{ __('Super Admin') }}</div>
                @endif
            </div>
            <div class="divider"></div>

            <dropdown-item :text="__('Profile')" redirect="{{ route('statamic.cp.account') }}"></dropdown-item>
            <dropdown-item :text="__('Log out')" redirect="{{ route('statamic.cp.logout') }}"></dropdown-item>
        </dropdown-list>
    </div>
</div>
