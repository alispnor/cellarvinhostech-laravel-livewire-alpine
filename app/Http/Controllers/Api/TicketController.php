<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Ticket::with('category'); // Carregar a categoria junto

        // Filtros (exemplo)
        if ($request->has('status') && in_array($request->status, ['aberto', 'em progresso', 'resolvido'])) {
            $query->where('status', $request->status);
        }
        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }
        if ($request->has('search')) {
            $searchTerm = '%' . $request->search . '%';
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'like', $searchTerm)
                ->orWhere('description', 'like', $searchTerm);
            });
        }

        return $query->latest()->paginate(10); // Paginação
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketRequest $request)
    {
        $data = $request->validated();
        // Regra de negócio: Status padrão ao criar deve ser 'aberto'
        $data['status'] = $data['status'] ?? 'aberto';
        // Adicionar created_by se houver autenticação
        // $data['created_by'] = auth()->id();

        $ticket = Ticket::create($data);
        return response()->json($ticket->load('category'), 201); // Carregar categoria no retorno
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        return $ticket->load('category');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        $ticket->update($request->validated());
        return response()->json($ticket->load('category'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return response()->json(null, 204);
    }
}
