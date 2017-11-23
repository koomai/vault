<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>{{ trans('vault.copy.heading') }} – {{ trans('vault.copy.sub_heading') }}</title>
    <meta name="viewport" content="width=device-width">
    <meta name="robots" content="noindex, nofollow">
    <meta name="base_url" content="/">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('headers')

    <link type="text/css" rel="stylesheet" media="all" href="/css/semantic.min.css">
    <link type="text/css" rel="stylesheet" media="all" href="/css/style.css">
    <link rel="icon" type="image/png" href="favicon.png">
    @if(config('vault.google_analytics'))
        <script type="text/javascript">

            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', '{{ config('vault.google_analytics') }}']);
            _gaq.push(['_trackPageview']);

            (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();

        </script>
    @endif
</head>
<body>
<div class="ui page grid" style="margin-top: 25px">
    <div class="eleven wide column">
        <div class="ui blue segment" style="min-height:300px">
            <h1 style="margin-top:0">
                <a class="home" href="/" title="Home">{{ trans('vault.copy.heading') }} <i class="lock icon"></i></a>
            </h1>
            <h4 class="ui dividing header" style="margin-top: 0">{{ trans('vault.copy.sub_heading') }} </h4>
            @yield('page')
        </div>
    </div>
    <div class="five wide column">
        <div class="ui tertiary segment">
            <p>{{ trans('vault.sidebar.intro') }}</p>
            <p>{{ trans('vault.sidebar.intro2') }}</p>
            <p>{{ trans('vault.sidebar.intro3') }}</p>
        </div>
    </div>
    <div class="twelve wide column">
        {!! trans('vault.copy.footer') !!}
    </div>
</div>

<script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="/js/jquery.base64.js"></script>
<script type="text/javascript" src="/js/semantic.min.js"></script>
<script type="text/javascript" src="/js/clipboard.min.js"></script>
<script type="text/javascript" src="/js/sjcl.js"></script>
<script type="text/javascript" src="/js/script.js"></script>

</body>
</html>
