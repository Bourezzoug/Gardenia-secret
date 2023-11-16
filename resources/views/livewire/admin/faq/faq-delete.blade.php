<div>
    <x-confirmation-modal wire:model="showDeleteModel">
        <x-slot name="title">
            {{ __('Supprimer un FAQ') }} 
        </x-slot>

        <x-slot name="content">
            {{ __('Voulez-vous supprimer cette catégorie') }}
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="closeDeleteModel" wire:loading.attr="disabled">
                {{ __('Annuler') }}
            </x-secondary-button>

            <x-danger-button class="ml-3" wire:click="delete" wire:loading.attr="disabled">
                {{ __('Supprimer') }}
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>




</div>
