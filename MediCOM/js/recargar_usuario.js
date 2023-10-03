$(document).ready(function(){
    
    $("form#formUploadFile").validetta({
        onValid:function(){
        event.preventDefault();
        var formData = new FormData($("form#formUploadFile")[0]);
        $.ajax({
            url:"recargar_usuario_AX.php",
            method:"post",
            data: formData,
            cache: false,
            contentType:false,
            processData:false,
            success:function(respAX){
                $.alert({
                    title:"<h3>Recarga</h3>",
                    content:respAX,
                    type:"green",
                    icon:"fas fa-info-circle fa-2x",
                    boxWidth: "50%",
                    useBootstrap: false,
                    onDestroy:function(){
                        window.location.href = "./index_usuario.php";
                    }
                });
            }
        });
        }
    });
});