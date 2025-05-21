<form wire:submit.prevent="saveCategory">
    <h3 class="text-lg font-semibold mb-4">{{ $categoryId ? 'Editar Categoria' : 'Criar Nova Categoria' }}</h3>
    <div class="mb-4">
        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nome da Categoria:</label>
        <input type="text" id="name" wire:model.live="name" class="form-input w-full">
        @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>
    <div class="flex justify-end space-x-2">
        <button type="button" wire:click="closeForm" class="btn-secondary">Cancelar</button>
        <button type="submit" class="btn-primary">Salvar Categoria</button>
    </div>
</form>