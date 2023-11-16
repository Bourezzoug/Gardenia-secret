<div>
    <x-dialog-modal wire:model="showCreateModel">
        <x-slot name="title">
            {{ __('Créer une nouvelle catégorie') }} 
        </x-slot>

        <form wire:submit.prevent="create" autocomplete="off">

            <x-slot name="content">
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">


                    <div class="col-span-6">
                        <x-label for="Question" value="{{ __('Question') }}"/>
                        <x-input wire:model.defer="question" id="Question" type="text" class="mt-1 block w-full" />
                        <x-input-error for="Question" class="mt-2"/>
                    </div>


                    <div class="col-span-6">
                        <x-label for="Answer" value="{{ __('Answer') }}"/>
                        <textarea wire:model.defer="answer" id="" class="input-field block p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500       w-full"></textarea>
                        <x-input-error for="Answer" class="mt-2"/>
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