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
            @apply rounded-md px-2 py-1 text-xs font-bold uppercase text-black;
        }

        .badge.button.active {
            opacity: 1;
        }

        .badge.button:not(.active) {
            opacity: .3;
        }

        .badge--get { @apply bg-[#61B0FE]; }
        .badge--post { @apply bg-[#4ACB91]; }
        .badge--put { @apply bg-[#FCA133]; }
        .badge--delete { @apply bg-[#F93E3F]; }
        .badge--patch { @apply bg-[#4FE4C1]; }
        .badge--head { @apply bg-[#4338ca] text-white; }
        .badge--options { @apply bg-[#0284c7] text-white; }

        .uri span { color: #4FFA7C; }
        .action span { color: #ECFB6F; }
    </style>
</head>

<body class="bg-[#171923] p-4 sm:py-12 text-gray-200 antialiased">
    <div class="mx-auto container">
        <section x-data="loadRoutes">
            <div class="flex flex-col lg:flex-row justify-between mb-8">
                <h1 class="font-display text-3xl shrink-0 font-bold">Route list</h1>

                <div class="flex flex-wrap w-full lg:justify-end lg:flex-nowrap items-center">
                    <form class="w-full mt-6 lg:mt-0 w-fit lg:mr-4 flex-wrap lg:flex-nowrap -my-1 flex">
                        <label class="badge cursor-pointer my-1 mr-2 button badge--get transition-opacity" :class="methods.find(method => method === 'get') && 'active'">
                            <input type="checkbox" value="get" x-model="methods" class="hidden" />get
                        </label>
                        <label class="badge cursor-pointer my-1 mr-2 button badge--post transition-opacity" :class="methods.find(method => method === 'post') && 'active'">
                            <input type="checkbox" value="post" x-model="methods" class="hidden" />post
                        </label>
                        <label class="badge cursor-pointer my-1 mr-2 button badge--put transition-opacity" :class="methods.find(method => method === 'put') && 'active'">
                            <input type="checkbox" value="put" x-model="methods" class="hidden" />put
                        </label>
                        <label class="badge cursor-pointer my-1 mr-2 button badge--delete transition-opacity" :class="methods.find(method => method === 'delete') && 'active'">
                            <input type="checkbox" value="delete" x-model="methods" class="hidden" />delete
                        </label>
                        <label class="badge cursor-pointer my-1 mr-2 button badge--patch transition-opacity" :class="methods.find(method => method === 'patch') && 'active'">
                            <input type="checkbox" value="patch" x-model="methods" class="hidden" />patch
                        </label>
                        <label class="badge cursor-pointer my-1 mr-2 button badge--head transition-opacity" :class="methods.find(method => method === 'head') && 'active'">
                            <input type="checkbox" value="head" x-model="methods" class="hidden" />head
                        </label>
                        <label class="badge cursor-pointer my-1 button badge--options transition-opacity" :class="methods.find(method => method === 'options') && 'active'">
                            <input type="checkbox" value="options" x-model="methods" class="hidden" />options
                        </label>
                    </form>

                    <div class="relative mt-4 lg:mt-0 lg:max-w-xs w-full flex items-center ring-1 rounded-lg ring-slate-700 focus-within:ring-slate-500 transition-colors">
                        <input type="text" name="search" placeholder="Search..." class="block w-full rounded-md bg-transparent border-0 pr-12 shadow-sm focus:ring-0 sm:text-sm peer" x-ref="inputSearch" x-model="search" @keydown.window.prevent.cmd.k="$refs.inputSearch.focus()" @keydown.window.prevent.esc="$refs.inputSearch.blur()">
                        <kbd class="h-6 top-1/2 mr-1.5 -translate-y-1/2 absolute inset-y-0 right-0 flex py-1.5 items-center rounded border border-slate-700 px-2 font-sans text-sm font-medium text-slate-700 peer-focus:text-slate-500 peer-focus:border-slate-500 transition-colors">⌘K</kbd>
                    </div>
                </div>
            </div>

            <div class="overflow-hidden rounded-lg shadow ring-1 ring-slate-700">
                <div class="overflow-scroll max-h-[80vh]">
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
                                        <ul class="flex flex-wrap -mx-1 -my-0.5 w-full min-w-[100px] max-w-[200px]">
                                            <template x-for="method in route.methods">
                                                <li x-text="method" class="mx-1 my-0.5 badge mr-2 last:mr-0" :class="'badge--' + method.toLowerCase()"></li>
                                            </template>
                                        </ul>
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 uri" x-html="route?.uri?.replaceAll('{', '<span>{')?.replaceAll('}', '}</span>')" />
                                    <td class="whitespace-nowrap px-3 py-4" x-text="route.name" />
                                    <td class="whitespace-nowrap px-3 py-4 action" x-html="route?.action?.replaceAll('@', '<span>@')" />
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
            const allMethodsSelected = ['get', 'post', 'put', 'delete', 'patch', 'head', 'options'];

            return {
                data: Object.values(<?php echo $routes; ?>),
                methods: allMethodsSelected,
                search: "",
                get filteredRoutes() {
                    if (this.search.length === 0 && this.methods === allMethodsSelected) return this.data;
                    return this.data.filter((item) => {
                        const query = this.search.toLowerCase();

                        const itemWithMethods = item?.methods.filter((value) => this.methods.includes(value.toLowerCase())).length > 0;
                        const itemWithUri = item?.uri?.toLowerCase()?.includes(query);
                        const itemWithName = item?.name?.toLowerCase()?.includes(query);
                        const itemWithAction = item?.action?.toLowerCase()?.includes(query);
                        const itemWithMiddleware = item?.middleware?.includes(query);

                        item?.uri?.replaceAll('{', '<span>{')?.replaceAll('}', '}</span>');

                        if (itemWithMethods && (itemWithUri || itemWithName || itemWithAction || itemWithMiddleware)) return item;
                    });
                }
            };
        }
    </script>
</body>
</html>
