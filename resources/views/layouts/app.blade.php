<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="md.aamroni" />
    <meta name="company" content="QubeNext Limited" />
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@qubenextlimited">
    <meta name="twitter:title" content="Chat Messaging Application">
    <meta name="twitter:description" content="Chat Messaging Application">
    <meta name="twitter:image" content="{{ asset('assets/img/laravel-icon.svg') }}">
    <meta name="twitter:image:alt" content>
    <meta property="og:url" content="Chat Messaging Application">
    <meta property="og:title" content="Chat Messaging Application">
    <meta property="og:description" content="Chat Messaging Application">
    <meta property="og:image" content="{{ asset('assets/img/laravel-icon.svg') }}">
    <meta property="og:image:secure_url" content="{{ asset('assets/img/laravel-icon.svg') }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">
    <title>{{ sprintf('%s | %s', $title, config('app.name')) }}</title>
    <link data-navigate-once href="{{ asset('assets/img/laravel-icon.svg') }}" rel="icon" type="image/svg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link data-navigate-once href="https://fonts.googleapis.com/css2?family=Noto+Serif+Bengali:wght@100;200;300;400;500;600;700;800;900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link data-navigate-once href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet" />
    <link data-navigate-once href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@3.11.0/dist/tabler-icons.min.css" rel="stylesheet" />
    <link data-navigate-once href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet" />
    <link data-navigate-once href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.3.6/css/swiper.min.css" rel="stylesheet" />
    <link data-navigate-once href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" rel="stylesheet" />
    <link data-navigate-once href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/perfect-scrollbar/1.5.5/css/perfect-scrollbar.min.css" integrity="sha512-ygIxOy3hmN2fzGeNqys7ymuBgwSCet0LVfqQbWY10AszPMn2rB9JY0eoG0m1pySicu+nvORrBmhHVSt7+GI9VA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link data-navigate-once href="{{ asset('assets/dist/jquery.scrollbar.css') }}" rel="stylesheet" />
    <link data-navigate-once href="{{ asset('assets/css/core.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/main.min.css?v-' . rand(10, 99)) }}" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.7.5/socket.io.js"></script>
    @livewireStyles
</head>

<body>
    <div class="main-wrapper">
        <div class="content main_content">
            <livewire:layouts.menubar-component />
            <livewire:layouts.sidebar-component />
            {{ $slot }}
        </div>
    </div>
    <script data-navigate-once src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script data-navigate-once src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
    <script data-navigate-once src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/perfect-scrollbar/1.5.5/perfect-scrollbar.min.js" integrity="sha512-X41/A5OSxoi5uqtS6Krhqz8QyyD8E/ZbN7B4IaBSgqPLRbWVuXJXr9UwOujstj71SoVxh5vxgy7kmtd17xrJRw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script data-navigate-once src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.3.6/js/swiper.min.js"></script>
    <script data-navigate-once src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script data-navigate-once src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script data-navigate-once src="{{ asset('assets/dist/jquery.scrollbar.min.js') }}"></script>
    <script data-navigate-once src="{{ asset('assets/js/core.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.min.js') }}"></script>
    @stack('script')
    @livewireScripts
</body>

</html>