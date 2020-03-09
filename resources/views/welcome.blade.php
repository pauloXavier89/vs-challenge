<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link href="{{ asset('semantic.min.css')}}" rel="stylesheet">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body>
        <div class="ui modal">
            <div class="header">Header</div>
            <div class="content">
                <form class="ui form">
                    @csrf
                    <input type="hidden" id="id" value="0" />
                    <div class="field">
                        <label>Nome</label>
                        <input type="text" name="nome" id="nome" placeholder="Nome">
                    </div>
                    <div class="field">
                        <label>Marca</label>
                        <input type="text" name="marca" id="marca" placeholder="Marca">
                    </div>
                    <div class="field">
                        <label>Quantiade</label>
                        <input type="number" name="quantidade" id="quantidade" placeholder="Quantidade">
                    </div>
                    <div class="field">
                        <label>Preço</label>
                        <input type="number" name="preco" id="preco" placeholder="Preço">
                    </div>
                    <button class="ui green button" id="btnEnviar" type="button">Enviar</button>
                </form>
            </div>
        </div>

        <div class="ui grid container">
            <div class="row">
                <div class="column">
                    <div class="ui message">
                        <h1 class="ui header">Produtos</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="ui two columns grid">
                <div class="column">
                    <button class="ui primary button btnModalCadastra"> Cadastrar</button>
                    <table id="tblListaProdutos" class="ui table">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Marca</th>
                                <th>Quantiade</th>
                                <th>Preço</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

        <script src="{{asset('jquery-3.4.1.min.js')}}"></script>
        <script src="{{asset('semantic.min.js')}}"></script>
        <script src="{{asset('produtos.js')}}"></script>
    </body>
</html>
