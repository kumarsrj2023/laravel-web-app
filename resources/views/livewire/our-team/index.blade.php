<div class="relative">

    <div class="mb-8">
        <h1 class="text-4xl font-semibold border-b-4 border- inline-block border-blue-700">Our Team-</h1>
    </div>
    <div class="text-end my-4">
        <a wire:navigate.hover href="{{ route('admin.team.create') }}"
            class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Add
            new</a>
    </div>

    @if (session('message'))
    <div id="alert-1"
        class="flex absolute top-1 right-1 items-center p-4 mb-4 text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
        role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
            viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Info</span>
        <div class="ms-3 text-sm font-medium">
            {{ session('message') }}
        </div>
        <button type="button"
            class="ms-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700"
            data-dismiss-target="#alert-1" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
    @endif

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Full Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Image
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Last Update
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>

                @if ($teamdata->isNotEmpty())
                @foreach ($teamdata as $team)
                <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $team->id }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $team->name }}
                    </td>
                    <td class="px-6 py-4">
                        <img class="max-w-24 rounded-[50%] bg-gray-200 p-2 border-1 border-gray-400 shadow-sm"
                            src="{{ !empty($team->image) ? asset('storage/' . $team->image) : asset('/storage/admin/other/no-image.png') }}" alt="">
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-block rounded-sm py-2 px-5 {{$team->status == 1 ? 'bg-lime-50 text-green-900 rounded' : 'bg-red-50 text-red-900'}}">{{ $team->status == 1 ? 'Active' : 'Blocked' }} </span>
                    </td>
                    <td class="px-6 py-4">
                        {{ $team->updated_at }}
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a wire:navigate.hover href="{{ route('admin.team.edit', $team) }}"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    </td>
                </tr>

                @endforeach
                @endif
            </tbody>
        </table>
    </div>

</div>