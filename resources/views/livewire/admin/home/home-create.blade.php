<div>
    <x-dialog-modal wire:model="showCreateModel">
        <x-slot name="title">
            {{ __('Créer une slider') }} 
        </x-slot>

        <form wire:submit.prevent="create" autocomplete="off">

            <x-slot name="content">
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">



                    <div class="col-span-1 md:col-span-2 lg:col-span-3">
                        <x-label for="title" value="{{ __('Title') }}"/>
                        <x-input wire:model.defer="title" id="title" type="text" class="mt-1 block w-full" />
                        <x-input-error for="title" class="mt-2"/>
                    </div>

                    <div class="col-span-1 md:col-span-2 lg:col-span-3">
                        <x-label for="button" value="{{ __('Button') }}"/>
                        <x-input wire:model.defer="button" id="button" type="text" class="mt-1 block w-full" />
                        <x-input-error for="button" class="mt-2"/>
                    </div>

                    <div class="py-5 mr-5 pl-3 col-span-6">
                        <div x-data="{imageName: null, imagePreview: null}" class="w-full">
                              <!--Profile image File Input -->
                              <input type="file" class="hidden input-field"
                                          wire:model="image"
                                          
                                          x-ref="image"
                                          x-on:change="
                                                  imageName = $refs.image.files[0].name;
                                                  const reader = new FileReader();
                                                  reader.onload = (e) => {
                                                      imagePreview = e.target.result;
                                                  };
                                                  reader.readAsDataURL($refs.image.files[0]);
                                          " />
          
                          <x-label for="image" value="{{ __('image') }}" />
          
                          <!--Current Profile image -->
                          <div class="mt-2 w-full  h-56 bg-gray-100" x-show="! imagePreview">
                              {{-- <img src="{{ $image }}" alt="{{ $image }}" class="h-full w-full object-cover"> --}}
                          </div>
          
                          <!--New Profile image Preview -->
                          <div class="mt-2  h-56" x-show="imagePreview" style="display: none;">
                              <span class="block w-full h-full bg-cover bg-no-repeat bg-center"
                                    x-bind:style="'background-image: url(\'' + imagePreview + '\');'">
                              </span>
                          </div>

                          <x-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.image.click()">
                              {{ __('Select A New image') }}
                          </x-secondary-button>
          
          
                          <x-input-error for="image" class="mt-2 input-error" />
                      </div>
                  </div>





                    <div class="col-span-1 md:col-span-2 lg:col-span-6">
                        <x-label for="Description" value="{{ __('Description') }}"/>
                            <textarea wire:model="description" id="" class="input-field block p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500       w-full"></textarea>
                        <x-input-error for="Description" class="mt-2"/>
                    </div>

                </div>
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button wire:click="closeCreateModel" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>
                <x-button type="submit" wire:click="create" wire:loading.attr="disabled" class="ml-3 bg-gray-600 hover:bg-gray-800">
                    {{ __('Save') }}
                </x-button>
            </x-slot>
        </form>

    </x-dialog-modal>
</div>