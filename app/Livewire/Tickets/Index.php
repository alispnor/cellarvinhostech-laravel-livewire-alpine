<?php

namespace App\Livewire\Tickets;

use Livewire\Component;
use App\Models\Ticket;
use App\Models\Category;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $statusFilter = '';
    public $categoryFilter = '';

    public $showTicketFormModal = false;
    public $editingTicketId = null;

    public $categories = []; // Para popular o filtro e o formulário

    protected $listeners = ['ticketSaved' => 'refreshTickets', 'ticketDeleted' => 'refreshTickets'];

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedStatusFilter()
    {
        $this->resetPage();
    }

    public function updatedCategoryFilter()
    {
        $this->resetPage();
    }

    public function createTicket()
    {
        $this->editingTicketId = null;
        $this->showTicketFormModal = true;
    }

    public function editTicket(Ticket $ticket)
    {
        $this->editingTicketId = $ticket->id;
        $this->showTicketFormModal = true;
    }

    public function deleteTicket(Ticket $ticket)
    {
        $ticket->delete();
        session()->flash('message', 'Chamado deletado com sucesso!');
        $this->dispatch('ticketDeleted');
    }

    public function closeModal()
    {
        $this->showTicketFormModal = false;
        $this->editingTicketId = null;
    }

    public function refreshTickets()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Ticket::with('category');

        if (!empty($this->search)) {
            $searchTerm = '%' . $this->search . '%';
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', $searchTerm)
                  ->orWhere('description', 'like', $searchTerm);
            });
        }

        if (!empty($this->statusFilter)) {
            $query->where('status', $this->statusFilter);
        }

        if (!empty($this->categoryFilter)) {
            $query->where('category_id', $this->categoryFilter);
        }

        $tickets = $query->latest()->paginate(10);

        return view('livewire.tickets.index', [
            'tickets' => $tickets,
        ]);
    }
}