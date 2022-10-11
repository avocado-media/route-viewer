<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Routes | {{ config('app.name') }}</title>

    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
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
    <div class="mx-auto container">
        <section x-data="loadRoutes">
            <div class="flex justify-between mb-4">
                <h1 class="font-display text-3xl font-bold">Routes</h1>

                <div class="relative max-w-xs w-full flex items-center ring-1 rounded-lg ring-slate-700 focus-within:ring-slate-500 transition-colors">
                    <input type="text" name="search" placeholder="Search..." class="block w-full rounded-md bg-transparent border-0 pr-12 shadow-sm focus:ring-0 sm:text-sm peer" x-ref="inputSearch" x-model="search" @keydown.window.prevent.cmd.k="$refs.inputSearch.focus()" @keydown.window.prevent.esc="$refs.inputSearch.blur()">
                    <kbd class="h-6 top-1/2 mr-1.5 -translate-y-1/2 absolute inset-y-0 right-0 flex py-1.5 items-center rounded border border-slate-700 px-2 font-sans text-sm font-medium text-slate-700 peer-focus:text-slate-500 peer-focus:border-slate-500 transition-colors">⌘K</kbd>
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
                            <template x-for="route in filteredRoutes">
                                <tr class="font-mono">
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 sm:pl-6">
                                        <ul class="flex">
                                            <template x-for="method in route.methods">
                                                <li x-text="method" class="badge mr-2 last:mr-0" :class="'badge--' + method.toLowerCase()"></li>
                                            </template>
                                        </ul>
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4" x-text="route.uri" />
                                    <td class="whitespace-nowrap px-3 py-4" x-text="route.name" />
                                    <td class="whitespace-nowrap px-3 py-4" x-text="route.action" />
                                    <td class="whitespace-nowrap py-4 pl-3 pr-4">
                                        <ul class="flex">
                                            <template x-for="method in route.middleware">
                                                <li x-text="method" class="mr-1 last:mr-0 after:content-[','] last:after:content-['']"></li>
                                            </template>
                                        </ul>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

    <script>
        function loadRoutes() {
            return {
                data: Object.values(<?php echo $routes; ?>),
                search: "",
                get filteredRoutes() {
                    if (this.search.length === 0) return this.data;
                    return this.data.filter((item) => {
                        const query = this.search.toLowerCase();

                        const itemWithUri = item?.uri?.toLowerCase()?.includes(query);
                        const itemWithName = item?.name?.toLowerCase()?.includes(query);
                        const itemWithAction = item?.action?.toLowerCase()?.includes(query);
                        const itemWithMiddleware = item?.middleware?.includes(query);

                        if (itemWithUri || itemWithName || itemWithAction || itemWithMiddleware) return item;
                    });
                }
            };
        }
    </script>
</body>
</html>
