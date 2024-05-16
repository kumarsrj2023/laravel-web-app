<div>
    <div class="mb-8">
        <h1 class="text-4xl font-semibold border-b-4 border- inline-block border-blue-700">Update Member Data-</h1>
    </div>
    <div class="text-end my-4">
        <button wire:click="deleteRecored" type="button"
            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
    </div>
    <form action="" wire:submit="updateData">
        <div class="grid grid-cols-2 gap-6">
            <div class="">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Full Name
                    <span class="text-red-800 text-base">*</span>
                </label>
                <input type="text" wire:model.lazy="form.name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('form.name')
                <div class="text-sm text-red-800 font-medium">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Status
                    <span class="text-red-800 text-base">*</span>
                </label>
                <select wire:model.lazy="form.status"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value='' selected>--Select--</option>
                    <option value="1">Active</option>
                    <option value="0">Blocked</option>
                </select>
                @error('form.status')
                <div class="text-sm text-red-800 font-medium">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    for="default_size">Image</label>
                <input wire:model.lazy="form.image"
                    class="block w-full mb-5 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="default_size" type="file">
                @error('form.image')
                <div class="text-sm text-red-800 font-medium">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="relative flex flex-col items-center">
                @if ($form->image)
                <img class="max-w-28 rounded-lg object-contain" src="{{ $form->image->temporaryUrl() }}">
                @else
                <img class="max-w-28 rounded-lg object-contain" src="{{ asset('storage/' . $form->oldImage) }}">
                @endif

                <div class="text-center absolute top-2/4 left-2/4 -translate-x-2/4 -translate-y-2/4" wire:loading
                    wire:target="form.image">
                    <div role="status">
                        <svg aria-hidden="true"
                            class="inline w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                            viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                fill="currentColor" />
                            <path
                                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                fill="currentFill" />
                        </svg>
                    </div>
                </div>

                {{-- <div wire:loading wire:target="form.icon_class">Uploading...</div> --}}

            </div>

            <div class="">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Designation
                    <span class="text-red-800 text-base">*</span>
                </label>
                <input type="text" wire:model.lazy="form.designation"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('form.designation')
                <div class="text-sm text-red-800 font-medium">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Facebook Url
                </label>
                <input type="text" wire:model.lazy="form.facebook_url"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('form.facebook_url')
                <div class="text-sm text-red-800 font-medium">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Whatsapp Url
                </label>
                <input type="text" wire:model.lazy="form.whatsapp_url"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('form.whatsapp_url')
                <div class="text-sm text-red-800 font-medium">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Linkdien Url
                </label>
                <input type="text" wire:model.lazy="form.linkdien_url"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('form.linkdien_url')
                <div class="text-sm text-red-800 font-medium">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="col-span-full">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-8 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Submit</button>
            </div>
        </div>
    </form>
</div>

@push('scripts')

@endpush