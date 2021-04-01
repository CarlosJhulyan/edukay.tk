/*!
 * fst-mmenu.js
 * http://fanseethemes.com/
 *
 * Copyright (c) fanseethemes
 *
 * License: GPL
 * https://www.gnu.org/licenses/gpl-3.0.html
 */

+(function($){

    $.fn.fstMmenu = function(options){

        var _this = this;

        if( 0 === $(this).length ){
            console.error('Provide element not found on DOM put the code on Ready function or check the element on fst-mmenu plugin')
            return this;
        };
        
        var wrapperClassName = 'fst-mmenu',
            activeClassName = 'fst-mmenu-open',
            submenuToggler = 'fst-submenu-toggler',
            overlayClassName = 'fst-mmenu-overlay',
            submenuTogglerClassName = 'fst-submenu-open',
            firstTabindexClassName = 'fst-mmenu-first-tabindex',
            lastTabindexClassName = 'fst-mmenu-last-tabindex',
            closeMmenuClassName = 'fst-mmenu-btn-close';

        var settings = getSettings();

        /** 
         *  Initialize the plugin functions 
         */
        initialize();
        function initialize(){
            cloneMenuAppendToDOM();
            handleClickOnMenuToggler();
            handleSubmenuToggler();
            handleCloseMmenu();
            handleAccessbilityTab();
            settings.overlay && appendOverlayOnDOM();
        }

        /**
         * This function return the setting of menu
         * @returns {object}
         */
        function getSettings(){
            var closeIcon ='<svg version="1.1" width="12" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512.001 512.001" style="enable-background:new 0 0 512.001 512.001;" xml:space="preserve"><path d="M284.286,256.002L506.143,34.144c7.811-7.811,7.811-20.475,0-28.285c-7.811-7.81-20.475-7.811-28.285,0L256,227.717L34.143,5.859c-7.811-7.811-20.475-7.811-28.285,0c-7.81,7.811-7.811,20.475,0,28.285l221.857,221.857L5.858,477.859c-7.811,7.811-7.811,20.475,0,28.285c3.905,3.905,9.024,5.857,14.143,5.857c5.119,0,10.237-1.952,14.143-5.857L256,284.287l221.857,221.857c3.905,3.905,9.024,5.857,14.143,5.857s10.237-1.952,14.143-5.857c7.811-7.811,7.811-20.475,0-28.285L284.286,256.002z"/></svg>',
                arrowDownIcon ='<svg version="1.1" width="10" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 490.688 490.688" style="enable-background:new 0 0 490.688 490.688;" xml:space="preserve"><path style="fill:#FFC107;" d="M472.328,120.529L245.213,347.665L18.098,120.529c-4.237-4.093-10.99-3.975-15.083,0.262c-3.992,4.134-3.992,10.687,0,14.82l234.667,234.667c4.165,4.164,10.917,4.164,15.083,0l234.667-234.667c4.237-4.093,4.354-10.845,0.262-15.083c-4.093-4.237-10.845-4.354-15.083-0.262c-0.089,0.086-0.176,0.173-0.262,0.262L472.328,120.529z"/><path d="M245.213,373.415c-2.831,0.005-5.548-1.115-7.552-3.115L2.994,135.633c-4.093-4.237-3.975-10.99,0.262-15.083c4.134-3.992,10.687-3.992,14.82,0l227.136,227.115l227.115-227.136c4.093-4.237,10.845-4.354,15.083-0.262c4.237,4.093,4.354,10.845,0.262,15.083c-0.086,0.089-0.173,0.176-0.262,0.262L252.744,370.279C250.748,372.281,248.039,373.408,245.213,373.415z"/></svg>';
            
            /* This default setting */
            var defaults = {
                position: 'right',
                width: 350,
                menuToggler: 'fst-mmenu-toggler',
                closeIcon: closeIcon,
                arrowDownIcon: arrowDownIcon,
                overlay: true
            };
            return  $.extend( {}, defaults, options );
        };

        /** 
         * This function hide the overlay
         * @returns {void}
         */
        function hideOverlay(){
            $('.'+overlayClassName).fadeOut();
        };

        /** 
         * This function show the overlay
         * @returns {void}
         */
        function showOverlay(){
            $('.'+overlayClassName).fadeIn();
        };

        /** 
         * This function provide the template of Overlay
         * @returns {string}
         */
        function getOverlayTemplate(){
            return '<div class="'+overlayClassName+'" style="display: none;"></div>';
        };

        /**
         * This function focus the menu toggler
         * @returns {void}
         */
        function focusMmenuToggler(){
            $('.'+settings.menuToggler).focus();
        };

        /**
         * This function append the overlay on the DOM
         * @returns {void} 
         */
        function appendOverlayOnDOM(){
            $('body').append(getOverlayTemplate());
        }

        /** 
         * This function check menu is open or not
         * @returns{boolean}
         */
        function isMenuOpen(){
            return $('body').hasClass(activeClassName);
        };

        /** 
         * This function check is menu open and close that if open
         * @returns {void}
         */
        function closeMmenu(){

            if(isMenuOpen()){
                toggleMmenu()
                focusMmenuToggler();
            } 
        }

        /**
         * This function listen the close event and close the mmenu
         */
        function handleCloseMmenu(){
            $(document).on('click', '.'+closeMmenuClassName, closeMmenu);
            $(document).on('click', '.'+overlayClassName, closeMmenu);
        };

        /**
         * This function provide the close button template
         * @returns {string} 
         */
        function getCloseButtonTemplate(){
            return '<div class="fst-close-wrapper"><button class="'+closeMmenuClassName+'">'+settings.closeIcon+'</button></div>';
        }

        /** 
         * This function toggle the class on body
         * @returns {boolean}
         */
        function isMenuOpen(){
            return $('body').hasClass(activeClassName);
        };

        /**
         * This function update the position [left || right || top || bottom] value
         * @returns {void} 
         */
        function toggleMenu( state){
            var positionProperty = getOppositePosition();

            /* Focus the close menu icon */
            state && focusOnCloseButton(); 

            $('.'+wrapperClassName).css({
                [positionProperty]: state ? 'calc( 100% - '+settings.width+'px)': '100%'
            });
        };

        /**
         * This function toggle the side menu and overlay
         * @returns {void} 
         */
        function toggleMmenu(e){
            var $body = $('body');
            var isOpen = isMenuOpen();
            toggleMenu( !isOpen );
            
            $body.toggleClass(activeClassName);

            /* Toggle overlay */
            isOpen ? hideOverlay() : showOverlay(); 
            return false;
        };

        /**
         * This function handle the click event on open and close button
         * @returns {void}
         */
        function handleClickOnMenuToggler(){
            $(document).on('click','.'+settings.menuToggler, toggleMmenu);
        };

        /**
         * This function generate the dynamic style according to the setting options
         * @returns {strings}
         */
        function getMenuStyle(){
            var position = getOppositePosition()
            var commonStyle = 'style="'+position+': 100%;';

            var leftRightStyle= commonStyle+'top: 0; bottom:0; width:'+settings.width+'px; "';
            var topBottomStyle = commonStyle+'left: 0; right:0; height:'+settings.width+'px; "';
            return settings.position == 'left' || settings.position == 'right' ? leftRightStyle: topBottomStyle;
        };

        /** 
         * This function provides the opposite position of setting position
         * @returns {strings}
         */
        function getOppositePosition(){
            switch(settings.position){
                case 'right':
                    return 'left';
                case 'left':
                    return 'right';
                case 'top':
                    return 'bottom';
                case 'bottom':
                    return 'top';
            }
        };

        /** 
         * This function update the submenu toggler aria-expanded attribute
         * @returns {void}
         */
        function updateAriaExpandedAttr(ele){
            if($(ele).hasClass(submenuTogglerClassName))
                $(ele).attr('aria-expanded', 'false')
            else
                $(ele).attr('aria-expanded', 'true')
        };

        /**
         * This function handle the click event on submenu toggler
         * @returns {void} 
         */
        function handleSubmenuToggler(){
            $(document).on('click', '.'+submenuToggler, function(e){
                var $ele = $(this).siblings('ul');
                updateAriaExpandedAttr(this);
                $(this).toggleClass(submenuTogglerClassName);
                $ele.slideToggle();
            })
        };

        /**
         * This function provide the submenu toggle template
         * @returns {strings}
         */
        function getArrowTemplate(){
            return '<button aria-expanded="false" class="'+submenuToggler+'">'+settings.arrowDownIcon+'</button>'
        };

        /**
         * This function remove the all attribute
         * @param {number} i index of element
         * @param {DOM element} ele each dome element
         * @returns {void} 
         */
        function removeAllAttributes(i, ele){
            var attrs = ele.attributes.length ? ele.attributes : [];
            if(attrs.length){
                $.each( attrs, function(){
                  $(ele).removeAttr(this.name);
                });
            }
        };

        /** 
         * Modified the clone elements
         * @param {DOM element} $cloneMenu clone menu DOM element
         * @returns {void}
         */
        function updateCloneElement($cloneMenu){
            $cloneMenu.find('ul, li').each(function(i, ele){
                removeAllAttributes(i, ele);
                var hasUl = $(this).has('ul').length;

                if('LI' == ele.tagName && hasUl)
                    $('>a', this).after(getArrowTemplate())
            }) 
        };

        /** 
         * This function loop the tabindex in fst-mmenu
         * @return {void}
         */
        function handleAccessbilityTab(){
            $(document).on('focus', '.'+firstTabindexClassName, function(){
                $('a:visible', $(this).parents('.'+wrapperClassName) ).last().focus();
            });
            
            $(document).on('focus', '.'+lastTabindexClassName, function(){
                $('.'+closeMmenuClassName, $(this).parents('.'+wrapperClassName) ).focus();
            });
        };

        /**
         * This function focus the menu close icon 
         * @returns {void}
         */
        function focusOnCloseButton(){
            jQuery('.'+wrapperClassName+ ' .'+closeMmenuClassName).focus();
        };

        /**
         * This function clone the provided menu
         * @returns {void}
         */
        function cloneMenuAppendToDOM(){
            var $cloneMenu = $(_this).clone();
            updateCloneElement($cloneMenu);
            var template = '<div class="'+wrapperClassName+'" '+getMenuStyle()+'> \
                                <span class="'+firstTabindexClassName+'" tabindex="0"></span>\
                                '+getCloseButtonTemplate()+'\
                                '+$cloneMenu.html()+'\
                                <span class="'+lastTabindexClassName+'" tabindex="0"></span>\
                            </div>';

            $('body').append(template);
        };

        

        return this;
    };
   
}(jQuery))