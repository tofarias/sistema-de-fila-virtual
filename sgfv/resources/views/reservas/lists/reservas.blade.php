@if( count($reservas) > 0 )

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">Exibindo {{ $reservas->count() }} registro(s) de um total de {{ $reservas->total() }} encontrado(s)</div>
                <div class="panel-body">
                    <table class="table table-condensed table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Código</th>
                                <th>Cód. Sala</th>
                                <th>Dt Inicio</th>
                                <th>Dt Fim</th>
                                <th>Criado em</th>
                                <th>Criado por</th>
                                <th>Ultima alteração em</th>
                                <th>Alterado por</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $reservas as $key => $reserva )
                            <tr>
                                <th scope="row">{{ $key+1 }}</th>
                                <td>{{ $reserva->codigo }}</td>
                                <td>{{ $reserva->sala->codigo }}</td>
                                <td>{{ isset($reserva->dt_inicio) ? $reserva->dt_inicio->format('d/m/Y H:i') : '-' }}</td>
                                <td>{{ isset($reserva->dt_fim) ? $reserva->dt_fim->format('d/m/Y H:i') : '-' }}</td>
                                <td>{{ $reserva->created_at->format('d/m/Y H:i') }}</td>
                                <td>{{ $reserva->createdBy->name }}</td>
                                <td>{{ isset($reserva->updated_at) ? $reserva->updated_at->format('d/m/Y H:i') : '-' }}</td>
                                <td>{{ isset($reserva->updatedBy) ? $reserva->updatedBy->name : '-' }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            Exibir
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                            <li><a href="{{ route('reservas.viewEditar', [$reserva->sala_id]) }}">Editar</a></li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="{{ route('reservas.excluir', [$reserva->sala_id]) }}">Excluir</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    {{ $reservas->links() }}
                </div>
            </div>
    </div>
</div>
@else
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger" role="alert">
                A consulta não retornou resultados
            </div>
        </div>
    </div>
@endif