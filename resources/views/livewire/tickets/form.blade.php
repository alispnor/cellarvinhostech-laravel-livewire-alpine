{{-- resources/views/livewire/tickets/form.blade.php --}}

<form wire:submit.prevent="saveTicket">
    <div class="mb-3">
        <label for="title" class="form-label">Título:</label>
        <input type="text" id="title" wire:model="title" class="form-control @error('title') is-invalid @enderror">
        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Descrição:</label>
        <textarea id="description" wire:model="description" class="form-control @error('description') is-invalid @enderror" rows="4"></textarea>
        @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label for="category_id" class="form-label">Categoria:</label>
        <select id="category_id" wire:model="category_id" class="form-select @error('category_id') is-invalid @enderror">
            <option value="">Selecione uma Categoria</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    @if ($ticketId) {{-- Campo de status só aparece na edição --}}
        <div class="mb-3">
            <label for="status" class="form-label">Status:</label>
            <select id="status" wire:model="status" class="form-select @error('status') is-invalid @enderror">
                <option value="aberto">Aberto</option>
                <option value="em progresso">Em Progresso</option>
                <option value="resolvido">Resolvido</option>
            </select>
            @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    @endif

    <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-secondary me-2" wire:click="closeForm">Cancelar</button>
        <button type="submit" class="btn btn-primary">Salvar Chamado</button>
    </div>
</form>