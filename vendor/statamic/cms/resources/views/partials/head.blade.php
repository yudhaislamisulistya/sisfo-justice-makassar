<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width">
<meta name="robots" content="noindex,nofollow">

<title>@yield('title', $title ?? __('Here')) ‹ PM III-16 Makassar</title>

@if (Statamic::pro() && config('statamic.cp.custom_favicon_url'))
    @include('statamic::partials.favicon', ['favicon_url' => config('statamic.cp.custom_favicon_url')])
@else
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}" sizes="16x16" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/logo.png') }}" sizes="16x16 32x32"/>
@endif

<link href="{{ Statamic::cpAssetUrl('css/cp.css') }}?v={{ Statamic::version() }}" rel="stylesheet" />

@if (Statamic::pro() && config('statamic.cp.custom_css_url'))
<link href="{{ config('statamic.cp.custom_css_url') }}?v={{ Statamic::version() }}" rel="stylesheet" />
@endif

@foreach (Statamic::availableExternalStyles(request()) as $url)
    <link href="{{ $url }}" rel="stylesheet" />
@endforeach

@foreach (Statamic::availableStyles(request()) as $package => $paths)
    @foreach ($paths as $path)
        <link href="{{ Statamic::vendorPackageAssetUrl($package, $path, 'css') }}" rel="stylesheet" />
    @endforeach
@endforeach

@stack('head')
