<div class="row">
<div class="col-12 p-6">
<div class="card">
<div class="card-body">
<div class="p-6">
    <h2 class="header-title">Gestão de Chamados</h2>

    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('message') }}</span>
        </div>
    @endif

    <div class="mb-4 flex items-center justify-between">
        <input type="text" wire:model.live="search" placeholder="Buscar chamados..." class="form-input rounded-md shadow-sm w-1/3 my-1 my-md-0">
        <button wire:click="createTicket" class="btn btn-outline-primary waves-effect waves-light">Criar Novo Chamado</button>
    </div>
  <div class="table-responsive">
    <table class="tablesaw table mb-0" data-tablesaw-mode="swipe" data-tablesaw-sortable data-tablesaw-sortable-switch data-tablesaw-minimap data-tablesaw-mode-switch>
        <thead>
            <tr>
                <th class=" title" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">Título</th>
                <th class="" scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="2">Status</th>
                <th class="" scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="2">Categoria</th>
                <th class="" scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="2">Criado Em</th>
                <th class="text-center" scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="4"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($tickets as $ticket)
                <tr class="hover:bg-gray-100">
                    <td>{{ $ticket->title }}</td>
                    <td>{{ ucfirst($ticket->status) }}</td>
                    <td>{{ $ticket->category->name ?? '-' }}</td>
                    <td>{{ $ticket->created_at->format('d/m/Y H:i') }}</td>
                    <td class="text-center">
                        <button wire:click="editTicket('{{ $ticket->id }}')" class="btn btn-outline-secondary waves-effect mr-2">Editar</button>
                        <button wire:click="deleteTicket('{{ $ticket->id }}')" wire:confirm="Tem certeza que deseja deletar este chamado?" class="btn btn-outline-danger waves-effect waves-light">Deletar</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="py-4 text-center">Nenhum chamado encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

    <div class="mt-4">
        {{ $tickets->links() }}
    </div>

    @if ($showTicketFormModal)
        <div x-data="{ show: @entangle('showTicketFormModal') }" x-show="show" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full flex items-center justify-center z-50">
            <div x-show="show" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 class="bg-white rounded-lg shadow-xl p-6 w-full max-w-md mx-auto">
                <livewire:tickets.form :ticket-id="$editingTicketId" @ticket-saved="closeModal" @close-modal="closeModal" />
            </div>
        </div>
    @endif
</div>
</div>
</div>
</div>
</div>