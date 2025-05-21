<?php

namespace App\Livewire\Categories;

use Livewire\Component;
use App\Models\Category;

class Form extends Component
{
    public $categoryId; // Propriedade para receber o ID da categoria a ser editada
    public $name = '';

    protected $rules = [
        'name' => 'required|string|max:255|unique:categories,name',
    ];

    protected $messages = [
        'name.required' => 'O nome da categoria é obrigatório.',
        'name.unique' => 'Já existe uma categoria com este nome.',
    ];

    // Executado quando o componente é montado
    public function mount($categoryId = null)
    {
        $this->categoryId = $categoryId;

        if ($this->categoryId) {
            $category = Category::find($this->categoryId);
            if ($category) {
                $this->name = $category->name;
            }
        }
    }

    // Método para salvar ou atualizar a categoria
    public function saveCategory()
    {
        // Ajusta a regra unique para edição
        $rules = $this->rules;
        if ($this->categoryId) {
            $rules['name'] = 'required|string|max:255|unique:categories,name,' . $this->categoryId;
        }
        $this->validate($rules);

        $data = ['name' => $this->name];
        // Adicionar created_by se houver autenticação
        // $data['created_by'] = auth()->id();

        if ($this->categoryId) {
            $category = Category::find($this->categoryId);
            $category->update($data);
            session()->flash('message', 'Categoria atualizada com sucesso!');
        } else {
            Category::create($data);
            session()->flash('message', 'Categoria criada com sucesso!');
        }

        // Emitir evento para o componente pai (Categories.Index) para atualizar a lista
        $this->dispatch('categorySaved');
        // Emitir evento para fechar o modal no componente pai
        $this->dispatch('closeModal');
    }

    // Método para fechar o modal sem salvar
    public function closeForm()
    {
        $this->dispatch('closeModal');
    }

    public function render()
    {
        return view('livewire.categories.form');
    }
}