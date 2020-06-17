<script>

    var successUrl = '<?php echo base_url('public/sounds/success.wav') ?>';
    var successSound = new Audio(successUrl);

    var errorUrl = '<?php echo base_url('public/sounds/error.mp3') ?>';
    var errorSound = new Audio(errorUrl);

    var lifesImg = [];
    for(var i=0; i<=3; i++){
        lifesImg.push('<?php echo base_url('public/img/heart') ?>' + i + ".png");
    }

    var remErrors = 0;
    var remKeys = 7;

    window.onorientationchange = function(){ 
        initGame();
    };

    $(window).resize(function(){
        initGame();
    });

    $(function(){
        initGame();

        $('#help-button').click(function(){
            remErrors--;
            showLives();
        });
    })

    function initGame(){

        var tonalitiesByArmure = [
        {
            name: 'do#',
            armure: '&#167'
        },
        {
            name: 'ré',
            armure: '&#162'
        },
        {
            name: 'mi',
            armure: '&#164'
        },
        {
            name: 'fa#',
            armure: '&#166'
        },
        {
            name: 'sol',
            armure: '&#161'
        },
        
        {
            name: 'la',
            armure: '&#163'
        },
        {
            name: 'si',
            armure: '&#165'
        },
    ];

        remErrors = 3;
        remKeys = 7;

        $('#game-container').html('');
        $('#game-container').html(
            '<p class="mb-4 text-center">Glissez chaque tonalité majeure en dessous de son armure.</p>' +
            '<div class="row mb-4">' +
                '<div class="col-4 col-md-3 col-lg-2">' +
                    '<img src="' + lifesImg[remErrors] + '" class="img-fluid" id="lifes-img" />' +
                '</div>' +
            '</div>' +
            '<div class="row" id="armures-row"></div>' +
            '<div class="row" id="dp-row"></div>' +
            '<div class="row" id="dg-row"></div>' 
        );
 
        tonalitiesByArmure.forEach(function(item, index){
            $('#dg-row').append(
                '<div class="col">' +
                    '<p class="dg" id="dg-' + item.name + '">' + item.name + '</p>' +
                '</div>'
            );
        });

        shuffle(tonalitiesByArmure);

        tonalitiesByArmure.forEach(function(item, index){
            $('#armures-row').append(
                '<div class="col">' +
                    '<p class="musiqwik">&' + item.armure + '!</p>' +
                '</div>' 
            );

            $('#dp-row').append(
                '<div class="col">' +
                    '<p class="dp" id="' + item.name + '">?</p>' +
                '</div>'
            );
        });

        $('.dg').draggable({
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

                remKeys--;
                if(remKeys== 0){
                    $('#game-container').append(
                        '<p class="text-center">Super! vous avez trouvé toutes les tonalités!</p>'
                    );
                }
            }
        });
    }

    function showLives(){
        $('#lifes-img').attr('src', lifesImg[remErrors]);
    }

    

</script>