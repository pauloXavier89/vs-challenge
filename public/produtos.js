function editarProduto(id) {
    $.ajax({
        url: 'produtos/'+id,
        type: 'get',
        // data: id,
        success: function (produto) {
            $('#nome').val(produto.nome);
            $('#marca').val(produto.marca);
            $('#preco').val(produto.preco);
            $('#quantidade').val(produto.quantidade);
            $('#id').val(produto.id);

            $(".modal").modal('show');
        }
    })
}

function confirmDelete(id) {
    if (confirm('Você tem certeza que deseja excluir esse produto?') == true) {
        deleteProduto(id);
    }
};

function deleteProduto(id) {
    $.ajax({
        url: 'produtos/' + id,
        type: 'delete',
        headers: {
            'X-CSRF-TOKEN': $('input[name="_token"]').val()
        },
        success: function (result) {
            var resposta = result['Produto'];

            if (resposta == id) {
                listaDados();
            }
        }
    })
}

function listaDados() {
    $.ajax({
        url: 'produtos',
        type: 'get',
        success: function (produtos) {
            var trHTML = '<tbody>';

            $.each(produtos, function (i, produto) {
                var btnExcluir = '<button class="small ui button negative" onclick="confirmDelete(' + produto.id + ')"> Excluir </button>';
                var btnEditar = '<button class="small ui button yellow" onclick="editarProduto(' + produto.id + ')"> Alterar </button>';;

                trHTML += '<tr><td>' + produto.nome + '</td>' +
                    '<td>' + produto.marca + '</td>' +
                    '<td>' + produto.quantidade + '</td>' +
                    '<td>' + produto.preco + '</td>' +
                    '<td>' + btnEditar + ' ' + btnExcluir + '</td></tr>';
            });

            trHTML += '</tbody>';

            $('#tblListaProdutos tbody').remove();
            $('#tblListaProdutos').append(trHTML);
        }
    });
}

$(document).ready(function () {

    listaDados();

    $("#btnEnviar").click(function () {
        var nome = $("#nome").val();
        var marca = $("#marca").val();
        var quantidade = $("#quantidade").val();
        var preco = $("#preco").val();
        var id = $("#id").val()

        var url = "";
        var type = "";
        if(id == 0){
            url = 'produtos';
            type = 'post';
        }else{
            url = 'produtos/'+id;
            type = 'put';
        }

        $.ajax({
            url: url,
            type: type,
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            },
            data: { nome: nome, marca: marca, quantidade: quantidade, preco: preco },
            success: function (result) {
                listaDados();
                $(".modal").modal('hide');
            }
        })
    });

    $(".btnModalCadastra").click(function () {
        $("#id").val(0);
        $(".modal").modal('show');
    });
});