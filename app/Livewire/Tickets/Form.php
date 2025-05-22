<?php
namespace App\Livewire\Tickets;

use Livewire\Component;
use App\Models\Ticket;
use App\Models\Category;

class Form extends Component
{
    public $ticketId;
    public $title = '';
    public $description = '';
    public $status = 'aberto';
    public $category_id = '';

    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:aberto,em progresso,resolvido',
            'category_id' => 'required|exists:categories,id',
        ];
    }

    protected $messages = [
        'title.required' => 'O título é obrigatório.',
        'status.required' => 'O status é obrigatório.',
        'category_id.required' => 'A categoria é obrigatória.',
    ];

    public function mount($ticketId = null)
    {
        $this->ticketId = $ticketId;
        $this->status = 'aberto';

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
        return view('livewire.tickets.form', [
            'categories' => Category::all(),
        ]);
    }
}
