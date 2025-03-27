<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Interview App</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    {{-- @include('layouts.preloader') --}}
     
    <div class="flex h-screen overflow-hidden" id="app">
        @include('layouts.sidebar')
        <div class="relative flex flex-col flex-1 overflow-x-hidden overflow-y-auto bg-gray-100">
            @include('layouts.header')
            <main>
                <div class="p-4 mx-auto max-w-(--breakpoint-xxl) md:p-6">
                    <router-view></router-view>
                </div>
            </main>
        </div>
    </div>
</body>

</html>