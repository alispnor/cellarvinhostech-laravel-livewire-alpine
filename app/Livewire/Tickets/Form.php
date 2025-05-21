<?php

namespace App\Livewire\Tickets;

use Livewire\Component;
use App\Models\Ticket;
use App\Models\Category; // Para listar categorias no select

class Form extends Component
{
    public $ticketId;
    public $title = '';
    public $description = '';
    public $status = 'aberto'; // Regra de negócio: status padrão
    public $category_id = '';

    public $categories = []; // Para popular o select de categorias

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'category_id' => 'required|exists:categories,id',
        'status' => 'required|in:aberto,em progresso,resolvido',
    ];

    protected $messages = [
        'category_id.required' => 'A categoria é obrigatória.',
        'category_id.exists' => 'A categoria selecionada não é válida.',
        // Adicione outras mensagens de validação personalizadas aqui
    ];

    public function mount($ticketId = null)
    {
        $this->ticketId = $ticketId;
        $this->categories = Category::all(); // Carrega todas as categorias

        if ($this->ticketId) {
            $ticket = Ticket::find($this->ticketId);
            if ($ticket) {
                $this->title = $ticket->title;
                $this->description = $ticket->description;
                $this->status = $ticket->status;
                $this->category_id = $ticket->category_id;
            }
        }
    }

    public function saveTicket()
    {
        $this->validate();

        $data = [
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'category_id' => $this->category_id,
            // 'created_by' => auth()->id(), // Se houver autenticação
        ];

        if ($this->ticketId) {
            $ticket = Ticket::find($this->ticketId);
            $ticket->update($data);
            session()->flash('message', 'Chamado atualizado com sucesso!');
        } else {
            Ticket::create($data);
            session()->flash('message', 'Chamado criado com sucesso!');
        }

        $this->dispatch('ticketSaved');
        $this->dispatch('closeModal');
    }

    public function closeForm()
    {
        $this->dispatch('closeModal');
    }

    public function render()
    {
        return view('livewire.tickets.form');
    }
}