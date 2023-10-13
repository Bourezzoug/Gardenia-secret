<div>
    <x-dialog-modal wire:model="showUpdateModel">
        <x-slot name="title">
            {{ __('Créer une nouvelle catégorie') }} 
        </x-slot>

        <form wire:submit.prevent="create" autocomplete="off">

            <x-slot name="content">
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">


                    <div class="col-span-1 md:col-span-2 lg:col-span-3">
                        <x-label class="text-xs" for="parentId" value="{{ __('Parent') }}"/>
                        <x-select wire:model="parentId" wire:key="parentCreate" class="mt-1">
                            <option value="" readonly="true" hidden="true"
                                    selected>{{ __('Parent') }}</option>
                                    <optgroup label="Personnaliser">
                                        <option value="null" selected>--None--</option>
                                    </optgroup>
                            <optgroup label="Relation">
                            @forelse($categories as $key => $value)
                            
                                <option value="{{ $key }}">{{ $value }}</option>
                            @empty
                            @endforelse
                            </optgroup>

                        </x-select>
                        <x-input-error for="parent" class="mt-2"/>
                    </div>

                    <div class="col-span-1 md:col-span-2 lg:col-span-3">
                        <x-label for="name" value="{{ __('Name') }}"/>
                        <x-input wire:model.defer="name" id="name" type="text" class="mt-1 block w-full" />
                        <x-input-error for="name" class="mt-2"/>
                    </div>


                    {{-- <div class="col-span-1 md:col-span-2 lg:col-span-3">
                        <x-label for="slug" value="{{ __('Slug') }}"/>
                        <x-input wire:model.defer="slug" type="text" class="mt-1 block w-full"/>
                        <x-input-error for="slug" class="mt-2"/>
                    </div>

                    <div class="col-span-1 md:col-span-2 lg:col-span-3">
                        <x-label for="order" value="{{ __('Order') }}"/>
                        <x-input wire:model.defer="order" type="text" class="mt-1 block w-full"/>
                        <x-input-error for="order" class="mt-2"/>
                    </div> --}}

                    <div class="col-span-1 md:col-span-2 lg:col-span-3">
                        <x-label class="text-xs" for="type" value="{{ __('Type') }}"/>
                        <x-select wire:model="type" class="mt-1">
                                <option value="Blog">Blog</option>
                                <option value="Products">Products</option>
                        </x-select>
                        <x-input-error for="type" class="mt-2"/>
                    </div>


                    <div class="col-span-1 md:col-span-2 lg:col-span-3">
                        <x-label for="color" value="{{ __('Color') }}"/>
                        <x-input wire:model.defer="color" type="text" class="mt-1 block w-full"/>
                        <x-input-error for="color" class="mt-2"/>
                    </div>

                </div>
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button wire:click="closeUpdateModel" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>
                <x-button type="submit" wire:click="edit" wire:loading.attr="disabled" class="ml-3 bg-gray-600 hover:bg-gray-800">
                    {{ __('Save') }}
                </x-button>
            </x-slot>
        </form>

    </x-dialog-modal>
</div>