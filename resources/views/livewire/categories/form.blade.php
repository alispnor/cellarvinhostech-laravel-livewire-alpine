<div class="card">
<div class="card-body">
<div class="row justify-content-between">
<form wire:submit.prevent="saveCategory">
    <h3 class="text-lg font-semibold mb-4">{{ $categoryId ? 'Editar Categoria' : 'Criar Nova Categoria' }}</h3>
   <div class="col-md-12 mb-1">
        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nome da Categoria:</label>
        <input type="text" id="name" wire:model.live="name" class="form-input w-full">
        @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>
    <div class="col-md-12 mt-2 flex justify-end space-x-2">
        <button type="button" wire:click="closeForm" class="btn btn-secondary waves-effect">Cancelar</button>
        <button type="submit" class="btn btn-primary waves-effect waves-light">Salvar Categoria</button>
    </div>
</form>
</div>
</div>
</div>