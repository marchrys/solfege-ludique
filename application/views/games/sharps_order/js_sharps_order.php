<script>
    var tickUrl= '<?php echo base_url('public/img/tick.png') ?>';

    var successUrl = '<?php echo base_url('public/sounds/success.wav') ?>';
    var successSound = new Audio(successUrl);

    var errorUrl = '<?php echo base_url('public/sounds/error.mp3') ?>';
    var errorSound = new Audio(errorUrl);

    var lifesImg = [];
    for(var i=0; i<=3; i++){
        lifesImg.push('<?php echo base_url('public/img/heart') ?>' + i + ".png");
    }

    var remErrors = 0;
    var remAlters = 7;

    var order = ['fa', 'do', 'sol', 're', 'la', 'mi', 'si'];
    var alters = ['do', 're', 'mi', 'fa', 'sol', 'la', 'si'];

    window.onorientationchange = function(){ 
        initGame();
    };

    $(window).resize(function(){
        initGame();
    });

    $(function(){
        initGame();
    });

    function initGame(){
        remErrors = 3;
        remAlters = 7;

        $('#game-container').html('');
        $('#game-container').html(
            '<p class="mb-4">Glissez chaque dièse sur la bonne case, pour créer l\'ordre des dièses.</p>' +
            '<div class="row">' +
                '<div class="col-4 col-md-3 col-lg-2">' +
                    '<img src="' + lifesImg[remErrors] + '" class="img-fluid mb-5" id="lifes-img" />' +
                '</div>' +
            '</div>' +
            '<div class="row">' +
                '<div class="col">' +
                    '<p class="dp">1</p>' +
                '</div>' +
                '<div class="col">' +
                    '<p class="dp">2</p>' +
                '</div>' +
                '<div class="col">' +
                    '<p class="dp">3</p>' +
                '</div>' +
                '<div class="col">' +
                    '<p class="dp">4</p>' +
                '</div>' +
                '<div class="col">' +
                    '<p class="dp">5</p>' +
                '</div>' +
                '<div class="col">' +
                    '<p class="dp">6</p>' +
                '</div>' +
                '<div class="col">' +
                    '<p class="dp">7</p>' +
                '</div>' +
            '</div>' +
            '<div class="row">' +
                '<div class="col dg-musiqwik">&&#217;!</div>' +
                '<div class="col dg-musiqwik">&&#218;!</div>' +
                '<div class="col dg-musiqwik">&&#219;!</div>' +
                '<div class="col dg-musiqwik">&&#220;!</div>' +
                '<div class="col dg-musiqwik">&&#221;!</div>' +
                '<div class="col dg-musiqwik">&&#215;!</div>' +
                '<div class="col dg-musiqwik">&&#216;!</div>' +
            '</div>'
        );

        $('.dg-musiqwik').draggable({
            containment: '#game-container',
            revert: function(is_valid_drop){
                if(!is_valid_drop){
                    errorSound.pause();
                    errorSound.currentTime = 0;
                    errorSound.play();
                    
                    remErrors--;
                    showLives();

                    if(remErrors == 0){
                        $('#game-container').html('');
                        $('#game-container').html('<p class="text-center">Désolé, le jeu est terminé car vous avez fait trois erreurs!</p>');
                    }

                    return true;
                }
            }
        });

        $('.dp').droppable({
            accept: function(d){ 
                if(d.attr('id') == 'dg-' + $(this).attr('id')){
                    return true;
                }
            },
            drop: function(event, ui) {
                var $this = $(this);
                ui.draggable.position({
                    my: "center",
                    at: "center",
                    of: $this,
                    using: function(pos) {
                        $(this).animate(pos, 200, "linear");
                    }
                });
                $this.html('&nbsp');
                ui.draggable.draggable({
                    disabled: true
                });
                ui.draggable.css('cursor', 'default');
                successSound.pause();
                successSound.currentTime = 0;
                successSound.play();

                remAlters--;
                if(remAlters == 0){
                    $('#game-container').append(
                        '<p class="text-center">Super! vous maitrisez bien l\'ordre des dièses!</p>'
                    );
                }
            }
        });

        $('.dp').each(function(index){
            $(this).attr('id', order[index]);
        });

        $('.dg-musiqwik').each(function(index){
            $(this).attr('id', 'dg-' + alters[index]);
        });
    }

    function showLives(){
        $('#lifes-img').attr('src', lifesImg[remErrors]);
    }
</script>