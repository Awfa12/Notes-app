<div class="text-[13px] leading-[20px] flex-1 p-6 pb-12 lg:p-20 bg-white dark:bg-[#161615] dark:text-[#EDEDEC] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-bl-lg rounded-br-lg lg:rounded-tl-lg lg:rounded-br-none">

    <form class="mb-6" wire:submit='sendNotification' wire:confirm="Are you sure you want to send a notification?">
        <p wire:loading="sendNotification">This is being sent to {{Auth::user()->name}} ...</p>
        <flux:button type="submit" >Send Notification</flux:button>
    </form>

    <form wire:submit='save'>
        <flux:field class="mb-6">
            <flux:label>Name</flux:label>
            <flux:input wire:model="name" />
            <flux:error name="name" />
        </flux:field>
        
        <flux:field class="mb-6">
            <flux:label>URL</flux:label>

            <flux:input.group>
                <flux:input.group.prefix>https://</flux:input.group.prefix>

                <flux:input wire:model="url" placeholder="example.com" />
            </flux:input.group>

            <flux:error name="url" />
        </flux:field>
        <flux:button type="submit">Save</flux:button>
    </form>

    

    <div class="border-t border-gray-200 pt-6">
        <h3 class="text-lg font-medium text-gray-800 mb-4">Recent Entries</h3>
        
        <div class="overflow-hidden border border-gray-200 rounded-lg">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Number</th>
                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Notes</th>
                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Action</th>
                    </tr>
                    </tr>
                </thead>
                </thead>
                <tbody class="bg-gray-50 divide-y divide-gray-200">
                    @forelse ($bookmarks as $bookmark)
                        <tr wire:transition.fade wire:key="{{ $bookmark->id }}" class="hover:bg-gray-50">
                            <td class="px-4 py-3 text-sm text-gray-900 font-medium">{{ $bookmark->name }}</td>
                            <td class="px-4 py-3 text-sm text-gray-600 max-w-[300px] truncate">{{ $bookmark->url }}</td>
                            <td class="px-4 py-3 text-sm text-gray-600 max-w-[300px] truncate"><button wire:click='delete({{$bookmark->id}})'>Delete</button></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="px-4 py-6 text-center text-gray-500 text-sm">
                                No entries yet
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
