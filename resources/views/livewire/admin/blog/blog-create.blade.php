<div class="flex bg-white">
  @include('admin.components.sidebar')
  <div class="w-full flex flex-col h-screen md:ml-56">
          @include('admin.components.header')
          <div>
              <div class="container mx-auto p-6">     
                  <form wire:submit.prevent="create" autocomplete="off" enctype="multipart/form-data">
                      <div class="grid grid-cols-12 gap-5">
                          <div class="col-span-8 ">
                              <main class="p-5 pt-0 ">
                                  <x-label for="title" />
                                    <div class="flex  items-start w-full">
                                        <ul class="flex flex-col w-full">
                                          <li class="bg-white my-2 shadow-lg" x-data="titre">
                                            <h2
                                              {{-- @click="handleClick()" --}}
                                              class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer bg-indigo-500 text-white"
                                            >
                                              <span>Titre de l'article</span>
                                              <svg
                                                {{-- :class="handleRotate()" --}}
                                                class="fill-current text-white h-6 w-6 transform transition-transform duration-500"
                                                viewBox="0 0 20 20"
                                              >
                                                <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                                              </svg>
                                            </h2>
                                            <div
                                              x-ref="tab"
                                              {{-- :style="handleToggle()" --}}
                                              class="border-l-2 border-indigo-600 overflow-hidden  duration-500 transition-all"
                                            >
                                            <div class="py-5 xl:mr-6 pl-3">
                                              <x-label for="title" value="{{ __('Titre') }}"/>
                                              <x-input wire:model.defer="title" id="titre" type="text" class="mt-1 block w-full  input-field"/>
                                              <x-input-error for="title" class="mt-2 input-error"/>
                                            </div>
              
              
                                            </div>
                                          </li>
                                        </ul>
                              
                                    </div>
                              </main>
                              <main class="p-5 pt-0 ">
                                  <x-label for="extrait" />
                                    <div class="flex  items-start w-full">
                                        <ul class="flex flex-col w-full">
                                          <li class="bg-white my-2 shadow-lg" x-data="extrait">
                                            <h2
                                              {{-- @click="handleClick()" --}}
                                              class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer bg-indigo-500 text-white"
                                            >
                                              <span>Extrait de l'article</span>
                                              <svg
                                                {{-- :class="handleRotate()" --}}
                                                class="fill-current text-white h-6 w-6 transform transition-transform duration-500"
                                                viewBox="0 0 20 20"
                                              >
                                                <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                                              </svg>
                                            </h2>
                                            <div
                                              x-ref="tab"
                                              {{-- :style="handleToggle()" --}}
                                              class="border-l-2 border-indigo-600 overflow-hidden  duration-500 transition-all"
                                            >
                                            <div class="py-5 xl:mr-6 pl-3">
                                              <x-label for="excerpt" value="{{ __('Extrait') }}"/>
                                              <textarea id="message"  wire:model.defer="excerpt" rows="4" class="input-field block p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 w-full " placeholder="Extrait..."></textarea>
                                              <x-input-error for="excerpt" class="mt-2 input-error"/>                
                                            </div>
                                            </div>
                                          </li>
                                        </ul>
                              
                                    </div>
                              </main>
                              <main class="p-5 pt-0 ">
                                  <x-label for="contenu" value="{{ __('Contenu') }}"/>
                                    <div class="flex  items-start w-full">
                                        <ul class="flex flex-col w-full">
                                          <li class="bg-white my-2 shadow-lg" x-data="contenu">
                                            <h2
                                              {{-- @click="handleClick()" --}}
                                              class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer bg-indigo-500 text-white"
                                            >
                                              <span>Contenu de l'article</span>
                                              <svg
                                                {{-- :class="handleRotate()" --}}
                                                class="fill-current text-white h-6 w-6 transform transition-transform duration-500"
                                                viewBox="0 0 20 20"
                                              >
                                                <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                                              </svg>
                                            </h2>
                                            <div
                                              x-ref="tab"
                                              {{-- :style="handleToggle()" --}}
                                              class="border-l-2 border-indigo-600 overflow-hidden  duration-500 transition-all"
                                            >
                                            <div class="py-5 xl:mr-6 pl-3">
                                              <div wire:ignore>
                                                <div class="form-control" wire:model.defer="body" id="summary-ckeditor"></div>
                                            </div>
                                            
                                                <script>
                                                    document.addEventListener('livewire:load', function () {
                                                        initEditor();
                                            
                                                        window.livewire.on('render', function () {
                                                            initEditor();
                                                        });
                                                    });
                                            
                                                    function initEditor() {
                                                      tinymce.init({
                                                          selector: '#summary-ckeditor',
                                                          plugins: 'lists link image charmap print preview hr anchor pagebreak',
                                                          toolbar: 'undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                                                          height: 300,
                                                          setup: function (editor) {
                                                              editor.on('change', function () {
                                                                  window.livewire.emit('bodyUpdated', editor.getContent());
                                                              });
                                                              editor.on('paste', function(e) {
                                                                  // Remove hyperlinks from pasted content
                                                                  var content = e.clipboardData.getData('text/plain');
                                                                  editor.setContent(content);
                                                                  e.preventDefault();
                                                              });
                                                          },
                                                          paste_data_images: true,
                                                          // auto_focus: true
                                                      });
                                                  }

                                                </script>
                                            
                                            
                                            
                                              
                                              
                                            </div>
                                            </div>
                                          </li>
                                        </ul>
                              
                                    </div>
                                  </main>
                          </div>
                          <div class="col-span-4 ">
                              <main class="p-5 pt-0 ">
                                  
                                    <div class="flex justify-center items-start ">
                                        <ul class="flex flex-col w-full">
                                          <li class="bg-white my-2 shadow-lg" x-data="accordion(1)">
                                            <h2
                                              {{-- @click="handleClick()" --}}
                                              class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer bg-yellow-500 text-white"
                                            >
                                              <span>Détails de l'article</span>
                                              <svg
                                                {{-- :class="handleRotate()" --}}
                                                class="fill-current text-white h-6 w-6 transform transition-transform duration-500"
                                                viewBox="0 0 20 20"
                                              >
                                                <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                                              </svg>
                                            </h2>
                                            <div
                                              x-ref="tab"
                                              {{-- :style="handleToggle()" --}}
                                              class="border-l-2 border-yellow-600 overflow-hidden  duration-500 transition-all"
                                            >
                                            <div class="pt-5 mr-5 pl-3">
                                              <x-label for="slug" value="{{ __('URL Slug') }}"/>
                                              <x-input wire:model.defer="slug" id="slug" type="text" class="input-field mt-1 block w-full"/>
                                              <x-input-error for="slug" class="mt-2 input-error"/>
                                            </div>
                                          <script>
                                            document.getElementById('titre').addEventListener('input', function() {
                                              var title = this.value;
                                              var slug = title.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, '');
                                              document.getElementById('slug').value = slug;
                                              Livewire.emit('slugUpdated', slug); // Emit an event to update the slug property in Livewire component
                                            });
                                          </script>



                                          <div class="py-5 mr-5 pl-3">
                                            <x-select wire:model="categorie"  class="input-field mt-1">
                                              <option value="" readonly="true" hidden="true" selected>{{ __('Categorie de l\'article') }}</option>
                                              <option value="Femme Inspirante">Femme Inspirante</option>
                                              <option value="Féminovation">Féminovation</option>
                                              <option value="Style & Élégance">Style & Élégance</option>
                                              <option value="Guide Shopping">Guide Shopping</option>
                                              <option value="Décoration & Astuces">Décoration & Astuces</option>
                                              <option value="Saveurs du Royaume">Saveurs du Royaume</option>
                                              <option value="Bien-être">Bien-être</option>
                                              <option value="Voyages & Découvertes au Royaume">Voyages & Découvertes au Royaume</option>
                                            </x-select>
                                            <x-input-error for="Categorie" class="mt-2 input-error"/>
                                          </div>

                                            <div class="pb-5 mr-5 pl-3">
                                              <x-select wire:model="status"  class="input-field mt-1">
                                                <option value="" readonly="true" hidden="true" selected>{{ __('Status de l\'article') }}</option>
                                                <option value="Publié">Publié</option>
                                                <option value="Brouillon">Brouillon</option>
                                                {{-- <option value="En_attente">En attente</option> --}}
                                            </x-select>
                                            <x-input-error for="status" class="mt-2 input-error"/>
                                            </div>


                                            </div>
                                          </li>
                                        </ul>
                              
                                    </div>
                                  </main>
                                  <main class="p-5 pt-0 ">
                                      <x-label for="image" value="{{ __('Image') }}"/>
                                        <div class="flex justify-center items-start ">
                                            <ul class="flex flex-col w-full">
                                              <li class="bg-white my-2 shadow-lg" x-data="image">
                                                <h2
                                                  @click="handleClick()"
                                                  class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer bg-cyan-500 text-white"
                                                >
                                                  <span>Image de l'article</span>
                                                  <svg
                                                    {{-- :class="handleRotate()" --}}
                                                    class="fill-current text-white h-6 w-6 transform transition-transform duration-500"
                                                    viewBox="0 0 20 20"
                                                  >
                                                    <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                                                  </svg>
                                                </h2>
                                                <div
                                                  x-ref="tab"
                                                  {{-- :style="handleToggle()" --}}
                                                  class="border-l-2 border-cyan-600 overflow-hidden  duration-500 transition-all"
                                                >
                                                <div class="py-5 mr-5 pl-3">
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
                                                        <div class="mt-2 w-full xl:w-80 h-56 bg-gray-100" x-show="! photoPreview">
                                                            {{-- <img src="{{ $photo }}" alt="{{ $photo }}" class="h-full w-full object-cover"> --}}
                                                        </div>
                                        
                                                        <!--New Profile Photo Preview -->
                                                        <div class="mt-2 xl:w-80 h-56" x-show="photoPreview" style="display: none;">
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
                                              </li>
                                            </ul>
                                  
                                        </div>
                                  </main>
                                  <main class="p-5 pt-0 bg-light-blue">
                                    <x-label for="Contenu_SEO" value="{{ __('Contenu SEO') }}"/>
                                      <div class="flex justify-center items-start ">
                                          <ul class="flex flex-col">
                                            <li class="bg-white my-2 shadow-lg" x-data="seo">
                                              <h2
                                                
                                                class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer bg-red-500 text-white"
                                              >
                                                <span>Contenu SEO</span>
                                                <svg
                                                  :class="handleRotate()"
                                                  class="fill-current text-white h-6 w-6 transform transition-transform duration-500"
                                                  viewBox="0 0 20 20"
                                                >
                                                  <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                                                </svg>
                                              </h2>
                                              <div
                                                x-ref="tab"
                                                :style="handleToggle()"
                                                class="border-l-2 border-red-600 overflow-hidden  duration-500 transition-all"
                                              >
                                              <div class="py-5 mr-5 pl-3">
                                                <x-label for="seo_title" value="{{ __('SEO Title') }}"/>
                                                <x-input wire:model.defer="seo_title" type="text" class="mt-1 block w-full xl:w-80"/>
                                                <x-input-error for="seo_title" class="mt-2"/>
                                              </div>
                                              <div class="py-5 mr-5 pl-3">
                                                <x-label for="meta_description" value="{{ __('Meta description') }}"/>
                                                <textarea id="meta_description"  wire:model.defer="meta_description" rows="4" class="block p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500       w-full lg:w-96 xl:w-80" placeholder="Meta description..."></textarea>
                                                <x-input-error for="meta_description" class="mt-2"/>   
                                              </div>

                                              
                                              </div>
                                            </li>
                                          </ul>
                                
                                      </div>
                                    </main>
                          </div>
                      </div>                <div class="px-6">
                          <x-secondary-button wire:click="closeCreateModel" wire:loading.attr="disabled">
                              {{ __('Cancel') }}
                          </x-secondary-button>
                          <x-button type="submit"  wire:loading.attr="disabled" class="ml-3 bg-gray-600 hover:bg-gray-800">
                              {{ __('Save') }}
                          </x-button>
                      </div>

                  </form>
              </div>
          </div>
  </div>
</div>
