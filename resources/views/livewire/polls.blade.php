{{-- <div>
    @forelse ($polls as $poll)
        <div class="mb-4">
            <!-- show each poll title -->
            <h3 class="mb-4 text-xl">
                {{ $poll->title }}
            </h3>

            <!-- for each option in options array, print the option -->
            @foreach ($poll->options as $option)
                <div class="mb-2">
                    <button class="btn" wire:click="vote({{ $option->id }})">Vote</button>
                    <!-- show vote count for each option -->
                    {{ $option->name }} ({{ $option->votes->count() }})
                </div>
            @endforeach
        </div>
    @empty
        <div class="text-gray-500 mt-2">No Polls Available</div>
    @endforelse
</div> --}}


<div>
    @forelse ($polls as $poll)
        <div class="mb-4 mt-4 max-w p-6 bg-white border border-gray-200 rounded-lg shadow">
            <div class="flex items-center justify-between mb-6">
                <h5 class="text-2xl font-semibold tracking-tight text-gray-900">{{ $poll->title }}</h5>
                <button class="btn inline-flex items-center" wire:click.prevent="removePoll({{ $poll }})"><svg
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                </svg>
                </button>
            </div>

            <!-- for each option in options array, print the option -->
            @foreach ($poll->options as $option)
            <div class="mb-2">
                {{-- <button class="btn" wire:click="vote({{ $option->id }})">Vote</button>
                {{ $option->name }} ({{ $option->votes->count() }}) --}}

                <div class="relative pt-1">
                    <div class="flex mb-2 items-center justify-between">
                        {{ $option->name }}
                        <span class="text-xs font-semibold inline-block text-gray-600">
                            {{ $option->votes->count() }} Votes
                        </span>
                    </div>
                    <div class="overflow-hidden h-5 mb-4 text-xs flex rounded bg-gray-200">
                        <div style="width:{{ $option->votes->count() }}%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-gradient-to-r from-cyan-400 to-blue-600"></div>
                    </div>
                    <button class="btn-vote" wire:click="vote({{ $option->id }})">Vote</button>
                </div>
            </div>

            @endforeach
        </div>
    @empty
        <div class="text-gray-500 mt-2">No Polls Available</div>
    @endforelse
</div>
