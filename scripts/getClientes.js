$('#form1').on('submit', function(e){
    e.preventDefault();
    var u_parametro = $('#parametro').val();
    
    if(limite > 0){
        for(var i = 0; i < limite; i++){ 
            document.getElementById(''+ i +'').remove();
        }
    }
    getClientes(u_parametro);
})

var limite = 0;

function getClientes(parametro){
    $.ajax({
        url: 'http://localhost/barbearia_novo/ajax/selectClientes.php',
        method: 'GET',
        data: {parametro: parametro},
        dataType: 'json'
    }).done(function(result){
        limite = result.length;
        for ( var i = 0; i < result.length; i++){
            $('#content').prepend('<tr id="'+ i +'"><th>'+  result[i].nome_cliente +'</th><th>'+ result[i].datacorte +'</th><th>'+ result[i].hora +'</th><th>'+ result[i].telefone +'</th><th>'+ result[i].nome +'</th><th><form action="finalizarCorte.php" method="POST"><button class="submit" name="id" type="submit">finalizar Corte</button><input type="hidden" name="idPegar" value="'+ result[i].id_agenda +'"></form></th></tr>');
        }
    })
}

getClientes("");