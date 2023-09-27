<div class="flex bg-white">
    @include('admin.components.sidebar')
    <div class="w-full flex flex-col h-screen md:pl-64">
            @include('admin.components.header')
        <div>
            <div class="container mx-auto p-6">  


                <form wire:submit.prevent="create" autocomplete="off">

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
                                            <x-input wire:model.defer="nom_boxe" type="text" class="mt-1 block w-full"/>
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
                                            <x-input wire:model.defer="cheap_lib" type="text" class="mt-1 block w-full"/>
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
                                            wire:model="photo"
                                            
                                            x-ref="photo"
                                            x-on:change="
                                                    photoName = $refs.photo.files[0].name;
                                                    const reader = new FileReader();
                                                    reader.onload = (e) => {
                                                        photoPreview = e.target.result;
                                                    };
                                                    reader.readAsDataURL($refs.photo.files[0]);
                                            " />
            
                                <x-label for="photo" value="{{ __('Photo') }}" />
                
                                    <!--Current Profile Photo -->
                                <div class="mt-2 w-full h-[200px] xl:h-[450px] bg-gray-100" x-show="! photoPreview">
                                    {{-- <img src="{{ $photo->temporaryUrl() }}" alt="{{ $photo }}" class="h-full w-full object-cover"> --}}
                                </div>
                
                                    <!--New Profile Photo Preview -->
                                <div class="mt-2 w-full xl:h-[450px]" x-show="photoPreview" style="display: none;">
                                    <span class="block w-full h-full bg-cover bg-no-repeat bg-center"
                                            x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                                    </span>
                                </div>
                
                                <x-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
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
                                    @if (!empty($box_gallery) )
                                        <div class="grid grid-cols-12 gap-5">
                                            @forelse ($box_gallery as $index => $image)
                                            <div class="col-span-4 relative">
                                                <img src="{{ $image->temporaryUrl() }}" class="h-40 w-full object-cover" alt="">
                                                <x-svg.svg-close
                                                    class="w-10 h-10 p-1 transform hover:text-emerald-500 transition-all cursor-pointer absolute top-0 right-0 bg-white"
                                                    wire:click="deleteImage({{ $index }})" />
                                            </div>
                                        @empty
                                            <!-- Handle the case when no images are available -->
                                        @endforelse
                                        
                                        </div>
                                    @endif
                                </div>
                            </div>
                    </div>






                    <x-button type="submit" wire:click="create" wire:loading.attr="disabled" class="ml-3 my-6 bg-gray-600 hover:bg-gray-800">
                        {{ __('Save') }}
                    </x-button>
                </form>

            </div>
        </div>
    </div>
</div>