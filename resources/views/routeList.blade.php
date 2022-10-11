<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Routes | {{ config('app.name') }}</title>

    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <!-- <script src="https://cdn.tailwindcss.com?plugins=forms"></script> -->
    <script defer src="https://unpkg.com/alpinejs@3.10.4/dist/cdn.min.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'laravel': "#FF2C1F",
                        'dark-gray': '#252A37',
                    },
                },
            },
        }
    </script>
    <style type="text/tailwindcss">
        .badge {
            @apply rounded-full px-2 py-1 text-xs font-bold uppercase text-black;
        }

        .badge--get {
            @apply bg-[#42AAF8];
        }

        .badge--post {
            @apply bg-[#1AC05D];
        }

        .badge--put {
            @apply bg-[#FFA101];
        }

        .badge--delete {
            @apply bg-[#FC4B4F];
        }

        .badge--patch {
            @apply bg-[#FFA101];
        }

        .badge--head {
            @apply bg-[#D58047];
        }
    </style>
</head>

<body class="bg-[#171923] p-10 text-gray-200 antialiased">
@foreach($routes as $route)
    <li>
        uri: /{{ $route['uri'] }}
        <br/>

        action: /{{ $route['action'] }}
        <br/>

        MW: @if($route['middleware'] !== [])
            @foreach($route['middleware'] as $middleware)
                {{ $middleware }}
            @endforeach
        @else
            None
        @endisset
        <br/>

        Methods: @foreach($route['methods'] as $method)
            {{ $method }},
        @endforeach
        <br/>

        Name: {{ $route['name'] }}
    </li>
@endforeach

<div class="mx-auto max-w-4xl">
    <section class="mb-10">
        <div class="flex items-center space-x-4">
            <img src="https://laravel.com/img/logomark.min.svg"/>
            <img src="https://laravel.com/img/logotype.min.svg"/>
        </div>
    </section>

    <section>
        <div class="flex justify-between mb-4">
            <h1 class="font-display text-3xl font-bold">Routes</h1>

            <div class="relative max-w-xs w-full flex items-center ring-1 rounded-lg ring-slate-500">
                <input type="text" name="search" placeholder="Search..."
                       class="block w-full rounded-md bg-transparent border-0 pr-12 shadow-sm focus:ring-0 sm:text-sm">
                <!-- <div class="absolute inset-y-0 right-0 flex py-1.5 pr-1.5">
                    <kbd class="inline-flex items-center rounded border border-slate-500 px-2 font-sans text-sm font-medium text-slate-500">⌘K</kbd>
                </div> -->
            </div>
        </div>

        <div class="overflow-hidden rounded-lg shadow ring-1 ring-slate-700">
            <div class="overflow-x-auto">
                <table class="bg-dark-gray min-w-full divide-y divide-slate-700">
                    <thead class="text-left text-sm font-medium">
                    <tr>
                        <th scope="col" class="py-3.5 pl-4 pr-3 sm:pl-6">Methods</th>
                        <th scope="col" class="px-3 py-3.5">Path</th>
                        <th scope="col" class="px-3 py-3.5">Name</th>
                        <th scope="col" class="px-3 py-3.5">Action</th>
                        <th scope="col" class="py-3.5 pl-3 pr-4">Middleware</th>
                    </tr>
                    </thead>

                    <tbody class="font-gray-600 divide-y divide-slate-700 text-sm">
                    <tr>
                        <td class="whitespace-nowrap py-4 pl-4 pr-3 sm:pl-6">
                            <ul class="flex space-x-2">
                                <li class="badge badge--get">get</li>
                                <li class="badge badge--post">post</li>
                                <li class="badge badge--put">put</li>
                                <li class="badge badge--delete">delete</li>
                                <li class="badge badge--patch">patch</li>
                                <li class="badge badge--head">head</li>
                            </ul>
                        </td>
                        <td class="whitespace-nowrap px-3 py-4">admin/types</td>
                        <td class="whitespace-nowrap px-3 py-4">admin.types.index</td>
                        <td class="whitespace-nowrap px-3 py-4">App/Http/Controllers/Admin/TypeController@index</td>
                        <td class="whitespace-nowrap py-4 pl-3 pr-4">admin</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
</body>
</html>
