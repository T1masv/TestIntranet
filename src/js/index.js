
$(document).ready(function(){

    $('#recherche').keyup(function(){ //ajout D'un litener sur l'input "Recherche"

        let recherche = $(this).val();

        if (recherche !== ''){ //On verifie que recherche n'est pas nul

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

