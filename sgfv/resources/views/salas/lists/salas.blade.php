@if( $salas )

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Exibindo {{ $salas->count() }} registro(s) de um total de {{ $salas->total() }} encontrado(s)</div>
                <div class="panel-body">
                    <table class="table table-condensed table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Código</th>
                                <th>Nome</th>
                                <th>Localizacao</th>
                                <th>Criado em</th>
                                <th>Criado por</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $salas as $key => $sala )
                            <tr>
                                <th scope="row">{{ $key+1 }}</th>
                                <td>{{ $sala->codigo }}</td>
                                <td>{{ $sala->nome }}</td>
                                <td>{{ $sala->localizacao }}</td>
                                <td>{{ $sala->created_at->format('d/m/Y H:i') }}</td>
                                <td>{{ $sala->createdBy->name }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    {{ $salas->links() }}
                </div>
            </div>
    </div>
</div>

@endif