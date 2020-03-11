@extends('templates.template')

@section('content')


<div class=" container shadow p-3 mb-5 bg-white rounded">
    <a href="{{ url('/Users') }}" class="link"><i class="fas fa-home"></i> Inicio</a>

    <div class="row">
        <div class="col-sm text-center">
            <label class="display-4"> Usuários</label>
            <h3 class="display-5"> @if(isset($user))Editar @else Cadastrar @endif</h3>
        </div>
    </div>

    {{-- Mostra o erro caso o usuário ja esteja cadastradi --}}
    @if(isset($erros))
    <div class="row text-danger justify-content-center pb-3">
        <h3>{{$erros}}</h3>
    </div>
    @endif
    {{-- Mostra erro de validações --}}
    @if(isset($errors) && count($errors)>0)
    <div class="row text-danger justify-content-center pb-3">
        @foreach ($errors->all() as $erro)
        {{$erro}}<br>
        @endforeach
    </div>
    @endif

    {{-- Alternar os Forms caso seja cadastro ou alteração --}}
    @if(isset($user))
    <form method="post" name="formEdit" id="formEdit" action="{{ url("Users/$user->id")}}">
        @method('PUT')
        @else
        <form method="post" name="formCad" id="formCad" action="{{ url('Users')}}">
            @endif

            {{-- Chave de segurança do laravel para formulário --}}
            @csrf
            <div class="row">
                <div class="col-sm">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Nome:</span>
                        </div>
                        <input type="text" name="nome" id="nome" class="form-control" value="{{$user->nome ?? ''}}" required>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-sm-3 mb-3 text-center">
                    <div class="input-group mb-0">
                        <div class="input-group-prepend">
                            <span class="input-group-text">CPF:</span>
                        </div>
                        <input type="text" name="cpf" id="cpf" class="form-control" value="{{$user->cpf ?? ''}}" required>
                    </div>
                    <span id="avisoCPF"></span>
                </div>
                <div class="col-sm">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Telefone:</span>
                        </div>
                        <input type="text" name="telefone" id="telefone" class="form-control" value="{{$user->telefone  ?? ''}}" required>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Data de Nascimento:</span>
                        </div>
                        <input type="date" name="dataNascimento" id="dataNascimento" class="form-control" value="{{$user->dataNascimento ?? ''}}" required>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-sm">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Email:</span>
                        </div>
                        <input type="email" name="email" id="email" class="form-control" value="{{$user->email ?? ''}}" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Estado:</span>
                        </div>
                        {{-- <input type="text" name="estado" id="estado" class="form-control"
							value="{{$user->estado ?? ''}}" required onclick="listarEstado()"> --}}

                        <select id="estado" name="estado" class="form-control" required>
                            <option>Estado</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Cidade:</span>
                        </div>
                        {{-- <input type="text" name="cidade" id="cidade" class="form-control"
							value="{{$user->cidade  ?? ''}}" required> --}}
                        <select id="cidades" name="cidade" class="form-control" required>
                            <option>Cidades</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Endereço:</span>
                        </div>
                        <input type="text" name="endereco" id="endereco" class="form-control" value="{{$user->endereco  ?? ''}}" required>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <a href="{{ url('/Users') }}" class="btn btn-primary"><i class="fas fa-home"></i> &nbsp;&nbsp; Voltar </a>
                &nbsp;&nbsp;
                <button type="submit" id="salvar" class="btn btn-success mr-3" title="Salvar">Salvar&nbsp;&nbsp;<i class="far fa-save"></i></button>
            </div>
        </form>
</div>
<script src="{{url("assets/js/validarCNPJ.js")}}"></script>
<script src="{{url("assets/js/consultaIBGE.js")}}"></script>
<script>
    //Para quando for editar, inserir o estado e a cidade do usuário.

    $.getJSON("https://servicodados.ibge.gov.br/api/v1/localidades/estados", function(dados) {

        //For para retornar os dados encontrado no JSON, na resposta da consulta.
        for (let index = 0; index < dados.length; index++) {
            //Adicionar as opções com o nome dos estados
            $('#estado').append("<option value='" + dados[index].id + "'>" + dados[index].nome + "</option>");
        }
        $("#estado").val("{{$user->estado  ?? ''}}");

        if ("{{$user->estado  ?? ''}}" != "") {
			
			//Listar as cidades, caso seja alteração. Aonde o estado ja vem preenchido
            listaCidade("{{$user->estado  ?? ''}}","{{$user->cidade  ?? ''}}");
        }
		
    });
	
	//Listar os Estados, caso seja uma opção de alterar;
    $("#estado").change(function() {
        listaCidade();
    });

    $('#cpf').mask('000.000.000-00');
    $('#telefone').mask('(00)00000-0000');
</script>
{{-- Consultar as APIs --}}
@endsection