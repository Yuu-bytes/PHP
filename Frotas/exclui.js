caminhoExclusao = "";
            function confirma(o_caminho,o_nome){
                caminhoExclusao = o_caminho;
                $("#quemExcluir").text(o_nome); // joga o nome na tela
                $("#janelaExcluir").modal('show'); // abre a tela modal
            }

$(document).ready(function(){
    
    // verifica se foi clicado no botao de exclusao da janela Modal
    $("#botaoExcluir").click(function(){
        location.href = caminhoExclusao; //abre o link da exclusao
    });

});