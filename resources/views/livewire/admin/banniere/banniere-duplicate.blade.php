<div>
    <x-dialog-modal wire:model="showDuplicateModel">
        <x-slot name="title">
            {{ __('Dupliquer une bannière') }}
        </x-slot>

        <form wire:submit.prevent="duplicate" autocomplete="off">

            <x-slot name="content">
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4" x-data="{ open: false }">

                    <div class="col-span-1 md:col-span-2 lg:col-span-3">
                        <x-label for="titre" value="{{ __('Nom de la bannière') }}"/>
                        <x-input wire:model.defer="titre" id="titre" type="text" class="mt-1 block w-full" />
                        <x-input-error for="titre" class="mt-2"/>
                    </div>
                    <div class="col-span-1 md:col-span-2 lg:col-span-3">
                        <x-label class="text-xs" for="position" value="{{ __('Zone') }}"/>
                        <x-select wire:model="position" wire:key="positionCreate" class="mt-1" @change.once="open = ! open" wire:change="updateDateRange">
                            <option value="" readonly="true" hidden="true"
                                    selected>{{ __('Selectionner une position') }}</option>
                                    {{-- <option value="Acceuil:top">Acceuil:top</option> --}}
                                    <option value="Popup">Popup</option>
                                    <option value="Habillage:top">Habillage:top</option>
                                    <option value="Habillage:right">Habillage:right</option>
                                    <option value="Habillage:left">Habillage:left</option>
                                    <option value="Alert">Alert</option>
                                    <option value="Acceuil:Football">Acceuil:Football</option>
                                    <option value="Acceuil:Tennis">Acceuil:Tennis</option>
                                    <option value="Acceuil:Tennis-right">Acceuil:Tennis-right</option>
                                    <option value="Acceuil:Athltétisme">Acceuil:Athltétisme</option>
                                    <option value="Acceuil:Boxe">Acceuil:Boxe</option>
                                    <option value="Acceuil:Boxe-right">Acceuil:Boxe-right</option>
                                    <option value="Acceuil:Basket">Acceuil:Basket</option>
                                    <option value="Acceuil:Videos">Acceuil:Videos</option>
                                    <option value="Acceuil:people-divers">Acceuil:people-divers</option>
                        </x-select>
                        <x-input-error for="position" class="mt-2"/>
                    </div>
                    <div class="col-span-1 md:col-span-2 lg:col-span-3">
                        <x-label class="text-xs" for="campagne" value="{{ __('Campagnes') }}"/>
                        <x-select wire:model="campagne_id" id="campagne" wire:key="campagneCreate" class="mt-1" >
                            <option value="" readonly="true" hidden="true" selected>{{ __('Selectionner une campagne') }}</option>
                            @forelse($campagne as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @empty
                            @endforelse
                        </x-select>
                        <x-input-error for="campagne" class="mt-2"/>
                    </div>
                    {{-- <div class="col-span-1 md:col-span-2 lg:col-span-3" x-show="open">
                        <div>
                            <x-label class="text-xs" for="plannification" value="{{ __('Plannification') }}"/>
                            <input type="text" id="plannification" name="plannification" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                            x-init="() => {
                                <!-- const plannification = {{ json_encode(explode(',', $plannification)) }}; -->
                                flatpickr($refs.plannification, {
                                    mode: 'multiple',
                                    minDate: '{{ $minDate }}',
                                    maxDate: '{{ $maxDate }}',
                                    <!-- disable : '{{  }}',  -->
                                    disable: {{ json_encode($existingDates) }}, // Use existing dates to disable them in the flatpicker
                                    defaultDate: plannification,
                                    dateFormat: 'Y-m-d',
                                    
                                    onClose: function(selectedDates, dateStr, instance) {
                                        const formattedDates = selectedDates.map(date => {
                                          const year = date.getFullYear();
                                          const month = String(date.getMonth() + 1).padStart(2, '0');
                                          const day = String(date.getDate()).padStart(2, '0');
                                          return `${year}-${month}-${day}`;
                                        });
                                        @this.set('plannification', formattedDates.join(','));
                                      }
                                });
                            }"
                            x-ref="plannification"
                            name="plannification"
                            autocomplete="off"
                            readonly
                        >
                        
                        </div>
                        <x-input-error for="plannification" class="mt-2"/>
                    </div> --}}
                    <div class="col-span-1 md:col-span-2 lg:col-span-3" x-show="open">
                        <div>
                            <x-label class="text-xs" for="plannification" value="{{ __('Plannification') }}"/>
                            <input type="text" id="plannification" name="plannification" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" x-data
                            x-init="() => {
                                const plannification = {{ json_encode(explode(',', $plannification)) }};
                                flatpickr($refs.plannification, {
                                    mode: 'multiple',
                                    minDate: '{{ $minDate }}',
                                    maxDate: '{{ $maxDate }}',
                                    disable: {{ json_encode($existingDates) }}, // Use existing dates to disable them in the flatpicker
                                    defaultDate: plannification,
                                    dateFormat: 'Y-m-d',
                                    onClose: function(selectedDates, dateStr, instance) {
                                        const formattedDates = selectedDates.map(date => {
                                          const year = date.getFullYear();
                                          const month = String(date.getMonth() + 1).padStart(2, '0');
                                          const day = String(date.getDate()).padStart(2, '0');
                                          return `${year}-${month}-${day}`;
                                        });
                                        @this.set('plannification', formattedDates.join(','));
                                      }
                                });
                            }"
                            x-ref="plannification"
                            name="plannification"
                            autocomplete="off"
                            readonly
                        >
                        
                        </div>
                        <x-input-error for="plannification" class="mt-2"/>
                    </div>
                    <div class="col-span-1 md:col-span-2 lg:col-span-6">
                        <div class="flex flex-row items-center justify-center">
                            <div class="relative mt-4">
                                <div class="w-full xl:w-97 h-56 bg-gray-200">

                                @if(!empty($image_path))
                                    <img src="{{ asset($image_path)  }}"
                                         class="object-cover w-full h-full">
                                @endif
                                </div>
                                    <x-input-error for="image" class="mt-2"/>
                                </div>
                            </div>
                    </div>
                    <div class="col-span-1 md:col-span-2 lg:col-span-3">
                        <x-label for="lien" value="{{ __('Lien') }}"/>
                        <x-input wire:model.defer="lien" id="lien" type="text" class="mt-1 block w-full" />
                        <x-input-error for="lien" class="mt-2"/>
                    </div>


                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="closeDuplicateModel" class="mr-3" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-button type="submit" wire:click="duplicate" wire:loading.attr="disabled" class="">
                    {{ __('Dupliquer') }}
                </x-button>
            </x-slot>
        </form>

    </x-dialog-modal>
</div>
