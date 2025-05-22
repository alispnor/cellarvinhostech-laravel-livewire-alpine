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
    public $categoryFilter = '';
    public $statusFilter = '';
    public $showTicketFormModal = false;
    public $editingTicketId = null;

    protected $listeners = ['ticketSaved' => 'refreshTickets', 'ticketDeleted' => 'refreshTickets', 'closeModal' => 'closeModal'];

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function createTicket()
    {
        $this->editingTicketId = null;
        $this->showTicketFormModal = true;
    }

    public function editTicket($ticketId)
    {
        $this->editingTicketId = $ticketId;
        $this->showTicketFormModal = true;
    }

    public function deleteTicket($ticketId)
    {
        $ticket = Ticket::findOrFail($ticketId);
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
            $query->where('title', 'like', '%' . $this->search . '%');
        }

        if (!empty($this->categoryFilter)) {
            $query->where('category_id', $this->categoryFilter);
        }

        if (!empty($this->statusFilter)) {
            $query->where('status', $this->statusFilter);
        }

        return view('livewire.tickets.index', [
            'tickets' => $query->latest()->paginate(10),
            'categories' => Category::all(),
        ])->layout('layouts.app');
    }
}
