<div wire:poll.750ms>
    <x-tittle-bar title="License" value="Alle Applications"></x-tittle-bar>
    @if($mode == 'show')
        <div class="flex flex-col">
            <button wire:click="changeMode" class="rounded-md bg-indigo-600 px-3 mx-5 my-2 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600">Add Application</button>
            <div class="overflow-x-auto">
                <div class="min-w-full inline-block align-middle">
                    <div class="overflow-hidden my-8 mx-5 rounded-lg shadow-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-100 sticky top-0">
                            <tr>
                                <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize rounded-tl-lg">ID</th>
                                <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize">NAME</th>
                                <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize">APP KEY</th>
                                <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize">STATE</th>
                                <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize rounded-tr-lg">ACTIONS</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-300">
                            @php
                                $entries = \App\Models\Application::getAllApplicationsPaginated();
                            @endphp
                            @foreach($entries as $app)
                                <tr class="hover:bg-gray-50">
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                        {{$app->id}}
                                    </td>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm text-gray-500">
                                        {{$app->name}}
                                    </td>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm text-gray-500">
                                        <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">{{$app->app_key}}</span>
                                    </td>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm">
                                        @if($app->state == 0)
                                            <span class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/20">Disabled</span>
                                        @else
                                            <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Active</span>
                                        @endif
                                    </td>

                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 flex space-x-2">
                                        <img wire:click="activate('{{$app->id}}')" src="enable.png" class="w-8 h-8 cursor-pointer">
                                        <img wire:click="deactivate('{{$app->id}}')" src="block.png" class="w-8 h-8 cursor-pointer">
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="bg-white w-full">
                            <div class="mx-5">
                            {{$entries->links()}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="flex items-center justify-center z-50 bg-gray-800 bg-opacity-100 my-2">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md mx-auto p-6 space-y-6">
                <div class="text-center">
                    <h2 class="text-lg font-medium text-gray-900">Add New License</h2>
                </div>
                <div>
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <div class="mt-1">
                            @error('name') <span class="error text-red-500">Message</span> @enderror
                            <input wire:model="name" id="name" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm text-gray-900" placeholder="Name...">
                        </div>
                    </div>
                </div>
                <div class="flex space-x-2 justify-center">
                    <button wire:click="changeMode" class="rounded-md bg-red-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-600">Cancel</button>
                    <button wire:click="createApplication" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600">Save</button>
                </div>
            </div>
        </div>
    @endif
</div>
