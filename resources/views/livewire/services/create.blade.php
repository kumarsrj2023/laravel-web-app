<div>
    <div class="mb-8">
        <h1 class="text-4xl font-semibold border-b-4 border- inline-block border-blue-700">Add new Service-</h1>
    </div>
    <form action="" wire:submit="submitService">
        <div class="grid grid-cols-2 gap-6">
            <div class="">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Service Name
                    <span class="text-red-800 text-base">*</span>
                </label>
                <input type="text" wire:model.lazy="form.title"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('form.title')
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
                    for="default_size">Icon</label>
                <input wire:model.lazy="form.icon_class"
                    class="block w-full mb-5 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="default_size" type="file">
                @error('form.icon_class')
                <div class="text-sm text-red-800 font-medium">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div>
                @if ($form->icon_class)
                <img class="max-w-24 rounded-[50%]" src="{{ $form->icon_class->temporaryUrl() }}">
                @endif
                <div wire:loading wire:target="form.icon_class">Uploading...</div>

            </div>

            <div class="">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Short Description
                    <span class="text-red-800 text-base">*</span>
                </label>
                <input type="text" wire:model.lazy="form.short_desc"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('form.short_desc')
                <div class="text-sm text-red-800 font-medium">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div wire:ignore class="col-span-full">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Description
                </label>
                <div class="col-md-9">
                    <textarea wire:model.defer="form.description" class="" name="message" id="message"></textarea>
                </div>
            </div>

            <div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-8 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Submit</button>
            </div>
        </div>
    </form>
</div>

@push('scripts')

<script>
    const editor = CKEDITOR.replace('message');
    editor.on('change', function(event){
        console.log(event.editor.getData())
        @this.set('form.description', event.editor.getData());
    })

</script>

@endpush