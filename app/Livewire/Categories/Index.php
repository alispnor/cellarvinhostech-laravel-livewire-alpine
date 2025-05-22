<?php

namespace App\Livewire\Categories;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Illuminate\Support\Str;


class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $name = '';
    public $showCategoryFormModal = false; // Controla a visibilidade do modal do formulário
    public $editingCategoryId = null; // ID da categoria que está sendo editada

    protected $listeners = ['categorySaved' => 'refreshCategories', 'categoryDeleted' => 'refreshCategories','closeModal'=>'closeModal','editCategory'=>'refreshCategories'];

    // Método para redefinir a paginação ao aplicar filtros
    public function updatedSearch()
    {
        $this->resetPage();
    }

    // Abre o modal para criar uma nova categoria
    public function createCategory()
    {
        $this->editingCategoryId = null; // Garante que é uma nova criação
        $this->showCategoryFormModal = true;
        $this->name = '';
    }

    // Abre o modal para editar uma categoria existente
    public function editCategory( $categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $this->editingCategoryId = $category->id;
        $this->showCategoryFormModal = true;
        $this->name = $category->name;
    }

    // Deleta uma categoria
    public function deleteCategory( $categoryId)
    {
        // Regra de negócio: Não permitir deletar categoria se houver chamados associados
         $category = Category::findOrFail($categoryId);
        if ($category->tickets()->count() > 0) {
            session()->flash('error', 'Não é possível deletar esta categoria, pois existem chamados associados a ela.');
            return; // Impede a deleção
        }

        $category->delete();
        session()->flash('message', 'Categoria deletada com sucesso!');
        $this->dispatch('categoryDeleted'); // Dispara evento para atualizar a lista
    }

    // Método para fechar o modal
    public function closeModal()
    {
        $this->showCategoryFormModal = false;
        $this->editingCategoryId = null;
        $this->name = '';
    }

    // Método para atualizar a lista após salvar/deletar (chamado pelo evento)
    public function refreshCategories()
    {
        $this->resetPage(); // Reseta a paginação para garantir que a nova categoria apareça
    }

    public function render()
    {
        $query = Category::query();

        if (!empty($this->search)) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        $categories = $query->latest()->paginate(10);

        return view('livewire.categories.index', [
            'categories' => $categories,
        ])->layout('layouts.app');
    }
}