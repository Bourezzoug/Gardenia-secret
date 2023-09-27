{{-- <div>
    <x-dialog-modal wire:model="showUpdateModel" maxWidth='7xl'>
        <x-slot name="title">
            {{ __('Créer une nouvelle catégorie') }} 
        </x-slot>

        <form wire:submit.prevent="edit" autocomplete="off">

            <x-slot name="content">
                <div class="grid grid-cols-2 grid-rows-6 md:grid-cols-4 lg:grid-cols-6 gap-4">


                    <div class="col-span-1 md:col-span-2 lg:col-span-3 lg:row-span-6">
                        <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                            <!-- Profile Photo File Input -->
                            <input type="file" class="hidden"
                                        wire:model="image"
                                        x-ref="image"
                                        x-on:change="
                                                photoName = $refs.image.files[0].name;
                                                const reader = new FileReader();
                                                reader.onload = (e) => {
                                                    photoPreview = e.target.result;
                                                };
                                                reader.readAsDataURL($refs.image.files[0]);
                                        " />
                            <div class="w-full xl:h-[450px] bg-gray-200 " x-show="! photoPreview">
                                @if(!empty($image))
                                <img src="storage/{{ $image }}" alt="{{ $image }}" class="h-full w-full object-cover">
                                @elseif(!empty($image_path))
                                <img src="{{ asset($image_path)  }}"
                                     class="object-cover w-full xl:h-[450px] ">
                                @endif
                            </div>
                            <div class="w-full xl:h-[450px] bg-gray-200 " x-show="photoPreview" style="display: none;">
                                <span class="block w-full h-full bg-cover bg-no-repeat bg-center "
                                      x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                                </span>
                            </div>
                            <button class="-mt-10 mr-2 p-3 rounded-full bg-indigo-500" type="button" x-on:click.prevent="$refs.image.click()">
                                <svg wire:target="image" wire:loading.class="animate-bounce" class="w-4 h-4 text-white " xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                    <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
                                </svg>
                            </button>
            
                            <x-input-error for="image" class="mt-2" />
                        </div>
                    </div> 
                    <div class="col-span-1 md:col-span-2 lg:col-span-3 lg:row-span-1">
                        <x-label for="libelle" value="{{ __('Libelle') }}"/>
                        <x-input wire:model.defer="libelle" type="text" class="mt-1 block w-full"/>
                        <x-input-error for="libelle" class="mt-2"/>
                    </div>
                    <div class="col-span-1 md:col-span-2 lg:col-span-3 lg:row-span-1">
                        <x-label for="price" value="{{ __('Prix') }}"/>
                        <x-input wire:model.defer="price" type="text" class="mt-1 block w-full"/>
                        <x-input-error for="price" class="mt-2"/>
                    </div>
                    <div class="col-span-1 md:col-span-2 lg:col-span-3 lg:row-span-1">
                        <x-label for="description" value="{{ __('Description') }}"/>
                        <textarea id="description"  wire:model.defer="description" class="input-field block p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300   w-full mt-1" ></textarea>
                        <x-input-error for="description" class="mt-2"/>
                    </div>
                    <div class="col-span-1 md:col-span-2 lg:col-span-3 lg:row-span-1">
                        <x-label for="options" value="{{ __('Options (retourne a la ligne pour une nouvelle option)') }}"/>
                        <textarea id="options"  wire:model.defer="options" class="input-field block p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300   w-full mt-1" ></textarea>
                        <x-input-error for="options" class="mt-2"/>
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
</div> --}}







<div class="flex bg-white">
    @include('admin.components.sidebar')
    <div class="w-full flex flex-col h-screen md:pl-64">
            @include('admin.components.header')
        <div>
            <div class="container mx-auto p-6">  


                <form wire:submit.prevent="edit" autocomplete="off">

                    <div id="accordion-collapse-6" data-accordion="collapse" class="my-10">
                            <h2 id="accordion-collapse-heading-6">
                            <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-white  rounded-t-xl focus:ring-4   bg-main-color" data-accordion-target="#accordion-collapse-body-6" aria-expanded="true" aria-controls="accordion-collapse-body-6">
                                <span>Le Nom de la boxe</span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                </svg>
                            </button>
                            </h2>
                            <div id="accordion-collapse-body-6" class="hidden p-4 border rounded-b-lg" aria-labelledby="accordion-collapse-heading-6">


                                        <div class="">
                                            <x-label for="nom_boxe" value="{{ __('Nom') }}"/>
                                            <x-input wire:model.defer="nom_boxe" type="text" value="test" class="mt-1 block w-full"/>
                                            <x-input-error for="nom_boxe" class="mt-2"/>
                                        </div>
                            </div>
                    </div>



                    <div id="accordion-collapse" data-accordion="collapse" class="my-10">
                            <h2 id="accordion-collapse-heading">
                            <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-white  rounded-t-xl focus:ring-4   bg-main-color" data-accordion-target="#accordion-collapse-body" aria-expanded="true" aria-controls="accordion-collapse-body">
                                <span>Box Cheap Option</span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                </svg>
                            </button>
                            </h2>
                            <div id="accordion-collapse-body" class="hidden p-4 border rounded-b-lg" aria-labelledby="accordion-collapse-heading">
                                <div class="grid grid-cols-2  md:grid-cols-4 lg:grid-cols-6 gap-4">



                                        <div class="col-span-1 md:col-span-2 lg:col-span-3 lg:row-span-1">
                                            <x-label for="cheap_lib" value="{{ __('Libelle') }}"/>
                                            <x-input wire:model.defer="cheap_lib"  type="text" class="mt-1 block w-full"/>
                                            <x-input-error for="cheap_lib" class="mt-2"/>
                                        </div>
                                        <div class="col-span-1 md:col-span-2 lg:col-span-3 lg:row-span-1">
                                            <x-label for="cheap_price" value="{{ __('Prix') }}"/>
                                            <x-input wire:model.defer="cheap_price" type="text" class="mt-1 block w-full"/>
                                            <x-input-error for="cheap_price" class="mt-2"/>
                                        </div>
                                        <div class="col-span-1 md:col-span-2 lg:col-span-3 lg:row-span-1">
                                            <x-label for="cheap_description" value="{{ __('Description') }}"/>
                                            <textarea id="cheap_description"  wire:model.defer="cheap_description" class="input-field block p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300   w-full mt-1" ></textarea>
                                            <x-input-error for="cheap_description" class="mt-2"/>
                                        </div>
                                        <div class="col-span-1 md:col-span-2 lg:col-span-3 lg:row-span-1">
                                            <x-label for="cheap_options" value="{{ __('Options (retourne a la ligne pour une nouvelle option)') }}"/>
                                            <textarea id="cheap_options"  wire:model.defer="cheap_options" class="input-field block p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300   w-full mt-1" ></textarea>
                                            <x-input-error for="cheap_options" class="mt-2"/>
                                        </div>
        
                                    
        
                                </div>
                            </div>
                    </div>



                    <div id="accordion-collapse-2" data-accordion="collapse" class="my-10">
                            <h2 id="accordion-collapse-heading-2">
                            <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-white  rounded-t-xl focus:ring-4   bg-main-color" data-accordion-target="#accordion-collapse-body-2" aria-expanded="true" aria-controls="accordion-collapse-body-2">
                                <span>Box Medium Option</span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                </svg>
                            </button>
                            </h2>
                            <div id="accordion-collapse-body-2" class="hidden p-4 border rounded-b-lg" aria-labelledby="accordion-collapse-heading-2">
                                <div class="grid grid-cols-2  md:grid-cols-4 lg:grid-cols-6 gap-4">



                                        <div class="col-span-1 md:col-span-2 lg:col-span-3 lg:row-span-1">
                                            <x-label for="med_lib" value="{{ __('Libelle') }}"/>
                                            <x-input wire:model.defer="med_lib" type="text" class="mt-1 block w-full"/>
                                            <x-input-error for="med_lib" class="mt-2"/>
                                        </div>
                                        <div class="col-span-1 md:col-span-2 lg:col-span-3 lg:row-span-1">
                                            <x-label for="med_price" value="{{ __('Prix') }}"/>
                                            <x-input wire:model.defer="med_price" type="text" class="mt-1 block w-full"/>
                                            <x-input-error for="med_price" class="mt-2"/>
                                        </div>
                                        <div class="col-span-1 md:col-span-2 lg:col-span-3 lg:row-span-1">
                                            <x-label for="med_description" value="{{ __('Description') }}"/>
                                            <textarea id="med_description"  wire:model.defer="med_description" class="input-field block p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300   w-full mt-1" ></textarea>
                                            <x-input-error for="med_description" class="mt-2"/>
                                        </div>
                                        <div class="col-span-1 md:col-span-2 lg:col-span-3 lg:row-span-1">
                                            <x-label for="med_options" value="{{ __('Options (retourne a la ligne pour une nouvelle option)') }}"/>
                                            <textarea id="med_options"  wire:model.defer="med_options" class="input-field block p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300   w-full mt-1" ></textarea>
                                            <x-input-error for="med_options" class="mt-2"/>
                                        </div>
        
                                    
        
                                </div>
                            </div>
                    </div>




                    <div id="accordion-collapse-3" data-accordion="collapse" class="my-10">
                            <h2 id="accordion-collapse-heading-3">
                            <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-white  rounded-t-xl focus:ring-4   bg-main-color" data-accordion-target="#accordion-collapse-body-3" aria-expanded="true" aria-controls="accordion-collapse-body-3">
                                <span>Box Expensive Option</span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                </svg>
                            </button>
                            </h2>
                            <div id="accordion-collapse-body-3" class="hidden p-4 border rounded-b-lg" aria-labelledby="accordion-collapse-heading-3">
                                <div class="grid grid-cols-2  md:grid-cols-4 lg:grid-cols-6 gap-4">



                                        <div class="col-span-1 md:col-span-2 lg:col-span-3 lg:row-span-1">
                                            <x-label for="exp_lib" value="{{ __('Libelle') }}"/>
                                            <x-input wire:model.defer="exp_lib" type="text" class="mt-1 block w-full"/>
                                            <x-input-error for="exp_lib" class="mt-2"/>
                                        </div>
                                        <div class="col-span-1 md:col-span-2 lg:col-span-3 lg:row-span-1">
                                            <x-label for="exp_price" value="{{ __('Prix') }}"/>
                                            <x-input wire:model.defer="exp_price" type="text" class="mt-1 block w-full"/>
                                            <x-input-error for="exp_price" class="mt-2"/>
                                        </div>
                                        <div class="col-span-1 md:col-span-2 lg:col-span-3 lg:row-span-1">
                                            <x-label for="exp_description" value="{{ __('Description') }}"/>
                                            <textarea id="exp_description"  wire:model.defer="exp_description" class="input-field block p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300   w-full mt-1" ></textarea>
                                            <x-input-error for="exp_description" class="mt-2"/>
                                        </div>
                                        <div class="col-span-1 md:col-span-2 lg:col-span-3 lg:row-span-1">
                                            <x-label for="exp_options" value="{{ __('Options (retourne a la ligne pour une nouvelle option)') }}"/>
                                            <textarea id="exp_options"  wire:model.defer="exp_options" class="input-field block p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300   w-full mt-1" ></textarea>
                                            <x-input-error for="exp_options" class="mt-2"/>
                                        </div>
        
                                    
        
                                </div>
                            </div>
                    </div>



                    <div id="accordion-collapse-4" data-accordion="collapse" class="my-10">
                            <h2 id="accordion-collapse-heading-4">
                            <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-white  rounded-t-xl focus:ring-4   bg-main-color" data-accordion-target="#id" aria-expanded="true" aria-controls="accordion-collapse-body-4">
                                <span>Box Main Image</span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                </svg>
                            </button>
                            </h2>
                            <div id="accordion-collapse-body-4" class=" p-4 border rounded-b-lg" aria-labelledby="accordion-collapse-heading-4">
                                <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                                    <!--Profile Photo File Input -->
                                <input type="file" class="hidden input-field"
                                            wire:model="image"
                                            
                                            x-ref="image"
                                            x-on:change="
                                                    photoName = $refs.image.files[0].name;
                                                    const reader = new FileReader();
                                                    reader.onload = (e) => {
                                                        photoPreview = e.target.result;
                                                    };
                                                    reader.readAsDataURL($refs.image.files[0]);
                                            " />
            
                                <x-label for="image" value="{{ __('Photo') }}" />
                

                                @if(!empty($image))

                                    <!--Current Profile Photo -->
                                <div class="mt-2 w-full h-[200px] xl:h-[450px] bg-gray-100" x-show="! photoPreview">
                                    <img src="{{ $image->temporaryUrl() }}"  class="h-full w-full object-cover">
                                </div>
                                @elseif(!empty($image_path))
                                <div class="mt-2 w-full h-[200px] xl:h-[450px] bg-gray-100" x-show="! photoPreview">
                                    <img src="http://127.0.0.1:8000{{ $image_path  }}" class="h-full w-full object-cover">
                                </div>
                                @endif
                                    <!--New Profile Photo Preview -->
                                <div class="mt-2 w-full xl:h-[450px]" x-show="photoPreview" style="display: none;">
                                    <span class="block w-full h-full bg-cover bg-no-repeat bg-center"
                                            x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                                    </span>
                                </div>
                
                                <x-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.image.click()">
                                    {{ __('Select A New Photo') }}
                                </x-secondary-button>
                
                
                                <x-input-error for="photo" class="mt-2 input-error" />
                            </div>
                            </div>
                    </div>



                    <div id="accordion-collapse-5" data-accordion="collapse" class="my-10">
                            <h2 id="accordion-collapse-heading-5">
                            <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-white  rounded-t-xl focus:ring-4   bg-main-color" data-accordion-target="" aria-expanded="true" aria-controls="accordion-collapse-body-5">
                                <span>Box Gallery Images</span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                </svg>
                            </button>
                            </h2>
                            <div id="accordion-collapse-body-5" class=" p-4 border rounded-b-lg" aria-labelledby="accordion-collapse-heading-5">
                                <div class="">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="default_size">Portfolio</label>
                                    <input class="block w-full mb-5 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none  p-2" id="default_size" type="file" wire:model.defer="box_gallery" multiple>
                                </div> 
                                <div class="col-span-12">
                                    <div class="col-span-12">
                                        <div class="grid grid-cols-12 gap-5">
                                            @if (!empty($box_gallery_path))
                                                @foreach (explode(',', $box_gallery_path) as $index => $image)
                                                    <div class="col-span-4 relative">
                                                        <img src="http://127.0.0.1:8000{{ $image }}" class="h-40 w-full object-cover" alt="">
                                                        <x-svg.svg-close
                                                            class="w-10 h-10 p-1 transform hover:text-emerald-500 transition-all cursor-pointer absolute top-0 right-0 bg-white"
                                                            wire:click="deleteImage({{ $index }})" />
                                                    </div>
                                                @endforeach
                                            @endif
                                    
                                            @if (!empty($box_gallery))
                                                @foreach ($box_gallery as $index => $image)
                                                    <div class="col-span-4 relative">
                                                        <img src="{{ $image->temporaryUrl() }}" class="h-40 w-full object-cover" alt="">
                                                        <x-svg.svg-close
                                                            class="w-10 h-10 p-1 transform hover:text-emerald-500 transition-all cursor-pointer absolute top-0 right-0 bg-white"
                                                            wire:click="deleteImage({{ $index }})" />
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                    </div>






                    <x-button type="submit" wire:click="edit" wire:loading.attr="disabled" class="ml-3 my-6 bg-gray-600 hover:bg-gray-800">
                        {{ __('Save') }}
                    </x-button>
                </form>

            </div>
        </div>
    </div>
</div>