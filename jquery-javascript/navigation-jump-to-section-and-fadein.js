var targets = [];
var sections = [];
var currentPosition =-1;
var ie = false;

$(document).bind({
    
    ready:function(event) {
        
        var ie = false;
        if ($.browser.msie  && parseInt($.browser.version, 10) === 7) {
          ie = true;
        } else if($.browser.msie  && parseInt($.browser.version, 10) === 8){
          ie = true;
        } else {
            
        }
        
        places = $('#navigation').children();
        $.each(places, function() {
            targets.push($(this))
        });
        targets.reverse();

        places = $('.main').children();
        $.each(places, function() {
            sections.push($(this));
            if(ie) {
                $(this).removeClass('transparent');
            }
        });
        
        if(ie) {
            var n = 1;
            places = $('#buena-workflow ol').children();
            $.each(places, function() {
                $(this).addClass("step"+n);
                n++;
                
            });
        }
        
        window.setTimeout( function() {$(document).scroll();}, 300);

    },
    
    scroll:function(event) {
        
        var offset = $('header').height() <100 ? $('header').height() : 0;
        var cur = Math.abs($(document).scrollTop());
        
        var h = $(window).height();
        if(!ie) {
            if(!$(sections[sections.length-1]).hasClass('transitOpacity')) {
                for(var i=0;i<sections.length;i++) {
                    
                    if(cur + $(window).height() > ($(sections[i]).offset().top)) {
                        if( $(sections[i]).hasClass('transparent')) {
                            $(sections[i]).addClass('transitOpacity');
                            $(sections[i]).removeClass('transparent');  
                        }
                    }
                }
            }
        }
        //console.log(cur, h,$(sections[(sections.length-1)]).offset().top );
        if($(sections[(sections.length-1)]).offset() != null) {
            if(cur+h  > $(sections[(sections.length-1)]).offset().top) {
                if(!$('body').hasClass('bottom')) {
                    $('body').addClass('bottom');
                }
            } else {
                $('body').removeClass('bottom');
            }
        }
        
        for(var i=0;i<targets.length;i++) {
    
            if(cur>=$($(targets[i]).attr('href')).offset().top-offset-40-25) {
                var l = $(targets[i]).position().left;
                var r = $(targets[i]).outerWidth();
                var pos = l+r*.5+10;
                currentPosition = pos;
                $('nav').css('backgroundPosition', pos+'px 100%');
                break;
            }
        }
        
        
    }

});

$(window).bind({
    resize:function(event) {
        $(document).scroll();
    }
});

$('#navigation > a').bind({
    click:function(event) {
        
        var trg = $($(this).attr('href')).offset().top;
        var current = $(document).scrollTop();
        var dist = Math.abs(current + trg);
        var offset = $('header').height() <100 ? $('header').height() : 0;

        var target = $($(this).attr('href')).offset().top-40-offset;
        if(trg==95) {
            target=0;
        }

        $('html,body').stop().animate({scrollTop: target},dist*.5,'easeInOutQuart');
        return false;
    }
    
});



/*** HTML

<header role="banner">
        <div class="wrapper">
            <nav id="navigation" role="navigation">
                <a href="#buena-introduction">Introduction</a>
                <a href="#buena-updates">Updates</a>
                <a href="#buena-rap">Rap</a>
                <a href="#buena-contact-details">Contact Details</a>
            </nav>
        </div>
    </header>

    
    <div class="main" role="main">
    
        <section class="transparent"  id="buena-introduction">
            <h1>Introduction</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eget lorem tincidunt ante consectetur mattis. Integer varius nulla ut nisl bibendum at lobortis nibh gravida. Aenean vitae metus nec sapien tincidunt sodales. Pellentesque auctor lorem eu eros auctor condimentum. Aenean bibendum iaculis adipiscing. Suspendisse potenti. Fusce ac lacus id nulla iaculis porta. Vestibulum semper viverra neque, eu semper orci interdum ac. Praesent placerat augue non purus auctor ullamcorper. Curabitur mi sem, vehicula et sollicitudin eget, facilisis a lacus. Etiam lacinia quam sit amet arcu vestibulum interdum. Ut in congue mi. Vivamus porta suscipit tortor ut eleifend. Sed sapien tortor, facilisis ut pellentesque vel, mollis quis urna. Nulla sit amet odio et magna pulvinar pharetra at non ipsum. Proin non odio et libero pharetra elementum at egestas eros.</p>           
        </section>

        <section class="transparent clearfix"  id="buena-updates">
            <h1>Updates</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eget lorem tincidunt ante consectetur mattis. Integer varius nulla ut nisl bibendum at lobortis nibh gravida. Aenean vitae metus nec sapien tincidunt sodales. Pellentesque auctor lorem eu eros auctor condimentum. Aenean bibendum iaculis adipiscing. Suspendisse potenti. Fusce ac lacus id nulla iaculis porta. Vestibulum semper viverra neque, eu semper orci interdum ac. Praesent placerat augue non purus auctor ullamcorper. Curabitur mi sem, vehicula et sollicitudin eget, facilisis a lacus. Etiam lacinia quam sit amet arcu vestibulum interdum. Ut in congue mi. Vivamus porta suscipit tortor ut eleifend. Sed sapien tortor, facilisis ut pellentesque vel, mollis quis urna. Nulla sit amet odio et magna pulvinar pharetra at non ipsum. Proin non odio et libero pharetra elementum at egestas eros.</p>
        </section>
        
        <section class="transparent clearfix" id="buena-rap">
            <h1>Rap</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eget lorem tincidunt ante consectetur mattis. Integer varius nulla ut nisl bibendum at lobortis nibh gravida. Aenean vitae metus nec sapien tincidunt sodales. Pellentesque auctor lorem eu eros auctor condimentum. Aenean bibendum iaculis adipiscing. Suspendisse potenti. Fusce ac lacus id nulla iaculis porta. Vestibulum semper viverra neque, eu semper orci interdum ac. Praesent placerat augue non purus auctor ullamcorper. Curabitur mi sem, vehicula et sollicitudin eget, facilisis a lacus. Etiam lacinia quam sit amet arcu vestibulum interdum. Ut in congue mi. Vivamus porta suscipit tortor ut eleifend. Sed sapien tortor, facilisis ut pellentesque vel, mollis quis urna. Nulla sit amet odio et magna pulvinar pharetra at non ipsum. Proin non odio et libero pharetra elementum at egestas eros.</p>
        </section>
        
        <section class="transparent" id="buena-contact-details">
            <h1>Contact details</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eget lorem tincidunt ante consectetur mattis. Integer varius nulla ut nisl bibendum at lobortis nibh gravida. Aenean vitae metus nec sapien tincidunt sodales. Pellentesque auctor lorem eu eros auctor condimentum. Aenean bibendum iaculis adipiscing. Suspendisse potenti. Fusce ac lacus id nulla iaculis porta. Vestibulum semper viverra neque, eu semper orci interdum ac. Praesent placerat augue non purus auctor ullamcorper. Curabitur mi sem, vehicula et sollicitudin eget, facilisis a lacus. Etiam lacinia quam sit amet arcu vestibulum interdum. Ut in congue mi. Vivamus porta suscipit tortor ut eleifend. Sed sapien tortor, facilisis ut pellentesque vel, mollis quis urna. Nulla sit amet odio et magna pulvinar pharetra at non ipsum. Proin non odio et libero pharetra elementum at egestas eros.</p>
        </section>
    </div>

    <!-- Scripts -->
    
    <script src="jquery-1.7.1.min.js"></script>
    <script src="jquery.easing.1.3.js"></script>
    <script src="buena.js"></script>

***/
