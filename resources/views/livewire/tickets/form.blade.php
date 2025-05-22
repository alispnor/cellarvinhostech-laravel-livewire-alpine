<div class="card">
<div class="card-body">
<div class="row justify-content-between">
<form wire:submit.prevent="saveTicket" class="d-flex flex-wrap align-items-center">
    <h3 class="text-lg font-semibold mb-4">{{ $ticketId ? 'Editar Chamado' : 'Criar Novo Chamado' }}</h3>

    <div class="col-md-12 mb-1">
        <label for="title" class="block text-sm font-medium text-gray-700">Título:</label>
        <input type="text" id="title" wire:model.live="title" class="form-input w-full">
        @error('title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>

    <div class="col-md-12">
        <label for="description" class="block text-sm font-medium text-gray-700">Descrição:</label>
        <textarea id="description" wire:model.live="description" class="form-textarea w-full"></textarea>
        @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>

     <div class="col-md-12 mb-1">

        <label for="status-select" class="block text-sm font-medium text-gray-700 me-2">Status:</label>
       
            <select id="status-select" wire:model.live="status" class="form-select w-full  my-1 my-md-0">

                <option value="aberto">Aberto</option>
                <option value="em progresso">Em Progresso</option>
                <option value="resolvido">Resolvido</option>
            </select>
        
        @error('status') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>
     <div class="col-md-12 mb-1">
        <label for="category_id" class="block text-sm font-medium text-gray-700">Categoria:</label>
        <select id="category_id" wire:model.live="category_id" class="form-select w-full">
            <option value="">Selecione uma categoria</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>


    <div class="col-md-12 mt-2 flex justify-end space-x-2">
        <button type="button" wire:click="closeForm" class="btn btn-secondary waves-effect">Cancelar</button>
        <button type="submit" class="btn btn-primary waves-effect waves-lightt">Salvar Chamado</button>
    </div>
</form>
</div>
</div>
</div>