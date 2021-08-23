<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="table w-full text-center font-bold">
                        {{ __('Welcome, :user', ['user' => auth()->user()->name]) }}
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="client">
                            {{ __('Name') }}
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="Client name">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="client">
                            {{ __('Client Callback URL') }}
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="callback" type="url" placeholder="Client Callback URL">
                    </div>
                    <div class="flex items-center justify-between">
                        <button id="create-client-btn" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                            {{ __('Create new Client') }}
                        </button>
                    </div>
                    <hr>
                    <div class="table w-full" id="client-table">
                        <div class="table-row-group bg-gray-800 text-white text-center font-bold">
                            <div class="table-cell border p-3">
                                {{ __('Client name') }}
                            </div>
                            <div class="table-cell border p-3">
                                {{ __('Callback URL') }}
                            </div>
                            <div class="table-cell border p-3">
                                {{ __('Delete') }}
                            </div>
                            <div class="table-cell border p-3">
                                {{ __('Redirect') }}
                            </div>
                        </div>
                        <div class="table-row-group text-center">
                            <!-- Table cells -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
