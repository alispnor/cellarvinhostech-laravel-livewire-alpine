    @extends('layouts.app')

    @section('page-title', 'Gerenciar Chamados')

    @section('content')
        <div class="row">
            <div class="col-12">
                <livewire:tickets.index />
            </div>
        </div>
    @endsection