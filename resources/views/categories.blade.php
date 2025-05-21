

@extends('layouts.app')

@section('page-title', 'Gerenciar Categorias')

@section('content')
    <div class="row">
        <div class="col-12">
            <livewire:categories.index />
        </div>
    </div>
@endsection