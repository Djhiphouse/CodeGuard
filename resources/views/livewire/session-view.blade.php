<div wire:poll.750ms>
    <x-tittle-bar title="License" value="Alle Sessions"></x-tittle-bar>
        <div class="flex flex-col">
            <div class="overflow-x-auto">
                <div class="min-w-full inline-block align-middle">
                    <div class="overflow-hidden my-8 mx-5 rounded-lg shadow-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-100 sticky top-0">
                            <tr>
                                <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize rounded-tl-lg">ID</th>
                                <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize">DISCORD</th>
                                <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize">JOINED</th>
                                <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize rounded-tr-lg">ACTIONS</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-300">
                            @php
                                $entries = \App\Models\UserSession::getAllSessionsPaginated();
                            @endphp
                            @foreach($entries as $session)
                                <tr class="hover:bg-gray-50">
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                        {{$session->id}}
                                    </td>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm text-gray-500">
                                        {{$session->discord_name}}
                                    </td>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm text-gray-500">
                                        <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">{{$session->joined}}</span>
                                    </td>

                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 flex space-x-2">
                                        <img wire:click="kill('{{$session->id}}')" src="knife.png" class="w-8 h-8 cursor-pointer">
                                        <img wire:click="screenshot('{{$session->id}}')" src="screen.png" class="w-8 h-8 cursor-pointer">
                                        @if($session->screenshot_accepted == 1)
                                            <img wire:click="showImage('{{$session->id}}')" src="pic.png" class="w-8 h-8 cursor-pointer">
                                        @endif
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
</div>
