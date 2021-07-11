
$(document).ready(function(){

    $("#recherche").keyup(function(){

        let recherche = $(this).val();

        if (recherche !== ''){

            $.ajax({
                url: 'recherche.php',
                method: 'POST',
                data:{recherche:recherche},
                success: function(data){
                   $('#resultatQuery').fadeIn();
                   $('#resultatQuery').html(data);
                }
            })
        }

        $(document).on('click','li',function () {
           $('#recherche').val($(this).text());
            $('#resultatQuery').fadeOut();

        });
    });
});

