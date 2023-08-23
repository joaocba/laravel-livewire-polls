<div>
    <form wire:submit.prevent="createPoll">
        <label>Title</label>

        <!-- wire:model="title" allows to populate variable $title -->
        <input type="text"
            class="block p-2.5 w-full z-20 text-md text-gray-900 focus:bg-slate-50 rounded-lg border-l-gray-100 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
            wire:model="title" placeholder="Insert a poll title" />

        <!-- show error message if any for title field -->
        @error('title')
            <div class="text-red-500 mt-2">{{ $message }}</div>
        @enderror

        <div class="mb-4 mt-4 max-w p-6 bg-white border border-gray-200 rounded-lg shadow">
            <div class="flex items-center justify-between">
                <h5 class="text-2xl font-semibold tracking-tight text-gray-900">Poll Options</h5>
                <button class="btn-add inline-flex items-center" wire:click.prevent="addOption"><svg
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    New Option</button>
            </div>

            <div class="mt-4">
                <!-- for each option in options array, print the option -->
                @foreach ($options as $index => $option)
                    <div class="mb-4">
                        <!-- show each option index value on label -->
                        <label>Option #{{ $index + 1 }}</label>
                        <div class="relative w-full">
                            <input type="text"
                                class="block p-2.5 w-full z-20 text-md text-gray-900 focus:bg-slate-50 rounded-lg border-l-gray-100 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                wire:model="options.{{ $index }}" placeholder="Insert an option title" />
                            <button wire:click.prevent="removeOption({{ $index }})"
                                class="absolute top-0 right-0 p-2.5 h-full text-sm font-medium text-white bg-red-700 rounded-r-lg border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300"><svg
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg></button>
                        </div>

                        <!-- show error message if any for options field -->
                        @error("options.{$index}")
                            <div class="text-red-500 mt-2">{{ $message }}</div>
                        @enderror

                    </div>
                @endforeach
            </div>
        </div>

        <button class="btn-create" type="submit">Create Poll</button>
    </form>
</div>
