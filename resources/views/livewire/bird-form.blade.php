<div class="text-[13px] leading-[20px] flex-1 p-6 pb-12 lg:p-20 bg-white dark:bg-[#161615] dark:text-[#EDEDEC] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-bl-lg rounded-br-lg lg:rounded-tl-lg lg:rounded-br-none">
    <form wire:submit='submit'>
        <div>
            <label for="Bird_Count" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bird Count</label>
            <input  wire:model="birdCount" type="number" id="Bird_Count" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
        </div>
        
        <label for="notes" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bird notes</label>
        <textarea wire:model='notes' id="notes" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
        <button class="text-gray-900 bg-black border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Add a New Bird Count Entry</button>
    </form>

    
@if($errors->any())
    <div class="mt-4">
        <ul>
            @foreach($errors->all() as $error)
                <li class="text-red-500 text-sm">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


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
                    @forelse ($entries as $entry)
                        <tr wire:transition.fade wire:key="{{ $entry->id }}" class="hover:bg-gray-50">
                            <td class="px-4 py-3 text-sm text-gray-900 font-medium">{{ $entry->bird_count }}</td>
                            <td class="px-4 py-3 text-sm text-gray-600 max-w-[300px] truncate">{{ $entry->notes }}</td>
                            <td class="px-4 py-3 text-sm text-gray-600 max-w-[300px] truncate"><button wire:click='delete({{$entry->id}})'>Delete</button></td>
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
