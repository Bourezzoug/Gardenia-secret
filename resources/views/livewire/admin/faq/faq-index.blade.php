
<div class="flex bg-white">
        @include('admin.components.sidebar')
        <div wire:init="loadItems" class="w-full flex flex-col " style="margin-left:260px">
    
        @include('admin.components.header')
    
        <!-- component -->
        <div class="m-5">
    
            <x-button wire:click="selectedItem('create',null)"
                class="text-white rounded-lg">
                <x-svg.svg-plus class="w-5 h-5"/>
                {{ __('Ajouter') }}
            </x-button>
    
    
            <x-button wire:click.prevent="deleteSelected" onclick="confirm('Vous êtes sure?') || event.stopImmediatePropagation()"
            class="text-white rounded-lg " id="deleteButton">
            <x-svg.svg-delete class="w-5 h-5"/>
            {{ __('Supprimer') }}
            </x-button>
    
        </div>
    
    <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">
        <div class="flex items-center px-2 py-4">
    
            <div class="col-span-3 md:col-span-2 lg:col-span-1 mr-5">
            <x-label class="text-xs" for="select" value="{{ __('Afficher par page') }}"/>
            <x-select wire:model="perPage" class="mt-1">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
            </x-select>
            </div>
        
            <div class="col-span-3 md:col-span-2 lg:col-span-1 mr-5">
            <x-label class="text-xs" for="select" value="{{ __('SortBy') }}"/>
            <x-select wire:model="sortBy" class="mt-1">
                <option value="asc">{{ __('ASC') }}</option>
                <option value="desc">{{ __('DESC') }}</option>
            </x-select>
            </div>
    
    
            <div class="col-span-3 md:col-span-2 lg:col-span-2">
                <x-label class="text-xs" for="search" value="{{ __('Chercher') }}"/>
                <x-input wire:model="term" id="search" type="text" class="block w-full mt-1"
                            autocomplete="off"/>
            </div>
    
    
    
        </div>
        <div class="overflow-x-auto w-full">
        <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                    <input type="checkbox" class="bg-neutral-50 border-neutral-200 mr-3" wire:model="selecteAll">
                </th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                    Question
                </th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Answer</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Created At</th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 border-t border-gray-100">
    
    
            @forelse ($faq as $faq)
    
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4">
                <input type="checkbox" wire:model="selectedFaqs" value="{{ $faq->id }}" class="bg-neutral-50 border-neutral-200">
                </td>

                <td class="px-6 py-4" >{{ $faq->question }}</td>
                <td class="px-6 py-4" >
    
                {{ $faq->answer }}
                
                </td>
    
                <td class="px-6 py-4">
                <div class="flex gap-2">
                    <span
                    class="inline-flex items-center gap-1 rounded-full bg-indigo-50 px-2 py-1 w-32  text-xs font-semibold text-indigo-600"
                    >
                    {{ date('D jS M Y',strtotime($faq->created_at)) }} 
                    </span>
                </div>
                </td>
                <td class="px-6 py-4">
    
                <div class="flex gap-4">
    
                    <div class="cursor-pointer" wire:click="selectedItem('update',{{ $faq->id }})"
                                    class="px-2">
                        <x-svg.svg-update class="w-5 h-5 mr-4 transform hover:text-purple-500 hover:scale-110"/>
                    </div>
    
    
    
    
    
                    <div class="cursor-pointer" wire:click="selectedItem('delete',{{ $faq->id }})"
                                    class="px-2">
                        <x-svg.svg-delete class="w-5 h-5 mr-4 transform hover:text-purple-500 hover:scale-110"/>
                    </div>
    
    
                </div>
                </td>
            </tr>
            @empty
                
            @endforelse
    
        </tbody>
    
        </table>
        </div>
        {{-- @if(!empty($faq))
        <div class="px-4 py-3 border-t bg-gray-50">
            {{ $faq->links() }}
        </div>
        @endif --}}
        </div>
    
        <livewire:admin.faq.faq-create />
        <livewire:admin.faq.faq-update />
        <livewire:admin.faq.faq-delete />

    </div>
</div>