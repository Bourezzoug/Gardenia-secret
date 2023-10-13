<div>
    <x-dialog-modal wire:model="showUpdateModel">
        <x-slot name="title">
            {{ __('Modifier les informations d\'utilisateur') }}
        </x-slot>

        <form wire:submit.prevent="edit" autocomplete="off">

            <x-slot name="content">
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">

                    <div class="col-span-1 md:col-span-2 lg:col-span-4">
                        <x-label for="nom" value="{{ __('Nom entreprise') }}"/>
                        <x-input wire:model.defer="nom" type="text" class="mt-1 block w-full" />
                        <x-input-error for="nom" class="mt-2"/>
                    </div>

                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="closeUpdateModel" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-button type="submit" wire:click="edit" wire:loading.attr="disabled" class="">
                    {{ __('update') }}
                </x-button>
            </x-slot>
        </form>

    </x-dialog-modal>
</div>
