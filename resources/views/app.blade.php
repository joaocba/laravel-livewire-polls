<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Livewire Poll</title>

    <script src="https://cdn.tailwindcss.com"></script>

    {{-- blade-formatter-disable --}}
  <style type="text/tailwindcss">
    .btn {
      @apply rounded-md px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50
    }

    .btn-vote {
        @apply text-gray-900 bg-gray-100 border border-gray-300 focus:outline-none hover:bg-gray-200 focus:ring-4 focus:ring-gray-200 font-semibold rounded-full text-sm px-5 py-2.5
    }

    .btn-create {
        @apply text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-semibold rounded-full text-base px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800
    }

    .btn-add {
        @apply text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-semibold rounded-full text-sm px-5 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700
    }

    .btn-delete {
        @apply text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-semibold rounded text-sm px-2 py-2 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900
    }

    label {
      @apply block mb-2 text-base font-semibold text-gray-900
    }

    input,
    textarea {
      @apply shadow-sm appearance-none border w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none
    }

    .error {
      @apply text-red-500 text-sm
    }
  </style>
  {{-- blade-formatter-enable --}}

    @livewireStyles
</head>

<body class="container mx-auto mt-10 mb-10 max-w-4xl bg-gradient-to-r from-blue-800 to-indigo-900">
    @livewireScripts

    <div class="flex">
        <div class="h-fit flex-1 bg-white p-4 shadow rounded-lg mr-4">
            <h1 class="mt-4 mb-8 text-4xl font-extrabold text-gray-900"><span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-600">Create Poll</span></h1>
            @livewire('create-poll')
        </div>

        <div class="h-fit flex-1 bg-white p-4 shadow rounded-lg">
            <h1 class="mt-4 mb-8 text-4xl font-extrabold text-gray-900"><span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-blue-500">Available Polls</span></h1>
            @livewire('polls')
        </div>
    </div>
</body>

</html>
