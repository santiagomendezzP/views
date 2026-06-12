$('#vaciar').click(function(){
    var vaciar = 'vaciar';
    $.ajax({
        type:'POST',
        url:'index.php',
        data: { vaciar: vaciar },
        success:function(){
            console.log(vaciar);
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Limpiado correctamente',
                showConfirmButton: true,
            });
            window.location='index.php';
        }
    })
});
$('#enviarm').click(function(){
    Swal.fire({
        target: document.getElementById('enviar'),
        position: 'center',
        icon: 'success',
        title: 'Enviado correctamente',
        showConfirmButton: false,
        timer: 1800
    });
});
