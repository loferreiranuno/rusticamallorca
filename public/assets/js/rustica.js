$(document).ready(function(){


$("[menu-language]").on("change", function(){
    var language = $(this).val();
    var url = $(this).data("url");

    $.ajax(
        {
            url: url,
            method: 'POST',
            dataType: 'json',
            data: {
                language: language,
                _token: $('input[name="_token"]').val()
            },
            success:
            function(data){
                if(data.success){
                    console.log(data);
                    window.location.reload();        
                }
            }
        }
    )
});


});