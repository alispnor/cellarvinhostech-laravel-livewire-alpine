
<div class="card"> 
    <div class="card-body">
        <h4 class="card-title mb-3">Gestão de Chamados</h4>

        {{-- Mensagens de sucesso/erro (Flash Messages) --}}
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Barra de Filtros e Botão de Criação --}}
        <div class="row mb-3">
            <div class="col-md-4">
                <input type="text" wire:model.live.debounce.300ms="search" class="form-control" placeholder="Buscar por título ou descrição...">
            </div>
            <div class="col-md-3">
                <select wire:model.live="statusFilter" class="form-select">
                    <option value="">Todos os Status</option>
                    <option value="aberto">Aberto</option>
                    <option value="em progresso">Em Progresso</option>
                    <option value="resolvido">Resolvido</option>
                </select>
            </div>
            <div class="col-md-3">
                <select wire:model.live="categoryFilter" class="form-select">
                    <option value="">Todas as Categorias</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2 text-end">
                <button wire:click="createTicket" class="btn btn-primary">Novo Chamado</button>
            </div>
        </div>

        {{-- Tabela de Chamados --}}
        <div class="table-responsive">
            <table class="table table-striped table-bordered dt-responsive nowrap w-100">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Descrição</th>
                        <th>Categoria</th>
                        <th>Status</th>
                        <th>Criado Em</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tickets as $ticket)
                        <tr>
                            <td>{{ $ticket->id }}</td>
                            <td>{{ $ticket->title }}</td>
                            <td>{{ Str::limit($ticket->description, 50) }}</td> {{-- Limita a descrição --}}
                            <td>{{ $ticket->category->name ?? 'N/A' }}</td> {{-- Trata categoria nula --}}
                            <td><span class="badge bg-{{ $ticket->status == 'aberto' ? 'info' : ($ticket->status == 'em progresso' ? 'warning' : 'success') }}">{{ ucfirst($ticket->status) }}</span></td>
                            <td>{{ $ticket->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <button wire:click="editTicket({{ $ticket->id }})" class="btn btn-sm btn-outline-primary">Editar</button>
                                <button wire:click="deleteTicket({{ $ticket->id }})" wire:confirm="Tem certeza que deseja deletar este chamado?" class="btn btn-sm btn-outline-danger">Deletar</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Nenhum chamado encontrado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Paginação --}}
        <div class="mt-3">
            {{ $tickets->links() }}
        </div>

        {{-- Modal para o Formulário de Chamados (Usando Alpine.js para controle) --}}
        <div class="modal fade" id="ticketFormModal" tabindex="-1" aria-labelledby="ticketFormModalLabel" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ticketFormModalLabel">{{ $editingTicketId ? 'Editar Chamado' : 'Criar Novo Chamado' }}</h5>
                        <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click="closeModal"></button>
                    </div>
                    <div class="modal-body">
                        {{-- Renderiza o componente do formulário de chamado aqui --}}
                        <livewire:tickets.form :ticket-id="$editingTicketId" @ticket-saved="closeModal" @close-modal="closeModal" />
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@push('scripts')
<script>
    // Listener para abrir/fechar o modal com Bootstrap JS
    Livewire.on('show-ticket-modal', () => {
        var myModal = new bootstrap.Modal(document.getElementById('ticketFormModal'));
        myModal.show();
    });

    Livewire.on('hide-ticket-modal', () => {
        var myModal = bootstrap.Modal.getInstance(document.getElementById('ticketFormModal'));
        myModal.hide();
    });
</script>
@endpush