<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

{{-- facebook meta --}}

<meta property="og:url"   content="{{ url()->current() }}" />
<meta property="og:title" content="@yield('og:title')" />
<meta property="og:image" content="{{ config("app.url")}}/@yield("og:image") " />
<!-- Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

<!-- Styles -->
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
@livewireStyles

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
<title>@yield('title', 'Blog')</title>
