jQuery(document).ready(function () {
    // Responsive switchers
    jQuery('.customize-control .responsive-switchers button').on('click', function (event) {
        // Set up variables
        var $this = jQuery(this),
        $devices = jQuery('.responsive-switchers'),
        $device = jQuery(event.currentTarget).data('device'),
        $control = jQuery('.customize-control.has-switchers'),
        $body = jQuery('.wp-full-overlay'),
        $footer_devices = jQuery('.wp-full-overlay-footer .devices'); // Button class

        $devices.find('button').removeClass('active');
        $devices.find('button.preview-' + $device).addClass('active'); // Control class

        $control.find('.control-wrap').removeClass('active');
        $control.find('.control-wrap.' + $device).addClass('active');
        $control.removeClass('control-device-desktop control-device-tablet control-device-mobile').addClass('control-device-' + $device); // Wrapper class

        $body.removeClass('preview-desktop preview-tablet preview-mobile').addClass('preview-' + $device); // Panel footer buttons

        $footer_devices.find('button').removeClass('active').attr('aria-pressed', false);
        $footer_devices.find('button.preview-' + $device).addClass('active').attr('aria-pressed', true); // Open switchers

        if ($this.hasClass('preview-desktop')) {
            $control.toggleClass('responsive-switchers-open');
        }
    }); // If panel footer buttons clicked

    jQuery('.wp-full-overlay-footer .devices button').on('click', function (event) {
        // Set up variables
        var $this = jQuery(this),
        $devices = jQuery('.customize-control.has-switchers .responsive-switchers'),
        $device = jQuery(event.currentTarget).data('device'),
        $control = jQuery('.customize-control.has-switchers'); // Button class

        $devices.find('button').removeClass('active');
        $devices.find('button.preview-' + $device).addClass('active'); // Control class

        $control.find('.control-wrap').removeClass('active');
        $control.find('.control-wrap.' + $device).addClass('active');
        $control.removeClass('control-device-desktop control-device-tablet control-device-mobile').addClass('control-device-' + $device); // Open switchers

        if (!$this.hasClass('preview-desktop')) {
            $control.addClass('responsive-switchers-open');
        } else {
            $control.removeClass('responsive-switchers-open');
        }
    });
});

(function($, api) {
    api.controlConstructor['fansee-business-toggle'] = api.Control.extend({
        ready: function ready() {
            var control = this;
            this.container.on('change', 'input:checkbox', function() {
                value = this.checked ? true : false;
                control.setting.set(value);
            });
        }
    });

    api.sectionConstructor["fansee-business-link"] = api.Section.extend({
        attachEvents: function() {},
        isContextuallyActive: function() {
            return !0
        }
    });

    api.controlConstructor['fansee-business-page-repeater'] = api.Control.extend({
        ready: function ready() {
            'use strict';

            var control = this;

            var getValue = function getValue() {
                var value = control.setting.get();

                if ('' == value) {
                    return [];
                }

                try {
                    value = JSON.parse(value);
                } catch (err) {
                    value = [];
                }

                return value;
            };

            var getIndex = function getIndex() {
                return control.container.find('select').length;
            };

            this.container.on('change', 'select', function() {
                var value = getValue();
                var index = jQuery(this).next().data('index');
                value.splice(index, 1, jQuery(this).val());
                control.setting.set(JSON.stringify(value));
            });
            this.container.on('click', '.page-repeater-add', function(e) {
                e.preventDefault();
                var index = getIndex(),
                    limit = jQuery(this).data('limit');

                if (index <= limit) {
                    var h = control.container.find('.page-repeater-template').html();
                    h = h.replace('{#index}', index);
                    control.container.find('.page-repeater-selectors').append(h);
                } else {
                    var pro_text = jQuery(this).data('pro-text');
                    var pro_link = jQuery(this).data('pro-link'); //Replace add button with pro text and pro link later
                }

                if (index >= limit) {
                    jQuery(this).hide();
                }
            });
            this.container.on('click', '.page-repeater-remove', function(e) {
                e.preventDefault();
                var index = jQuery(this).data('index'),
                    limit = jQuery(this).data('limit');
                jQuery(this).parent().remove();
                control.container.find('.page-repeater-selectors .page-repeater-remove').each(function(i) {
                    jQuery(this).data('index', i);
                });
                var value = getValue();
                value.splice(index, 1);
                control.setting.set(JSON.stringify(value));

                if (index < limit) {
                    jQuery('.page-repeater-add').show();
                }
            });
        }
    });

    api.controlConstructor['fansee-business-slider'] = api.Control.extend({
        ready: function ready() {
            'use strict';

            var control = this,
                desktop_slider = control.container.find('.slider.desktop-slider'),
                desktop_slider_input = desktop_slider.next('.slider-input').find('input.desktop-input'),
                tablet_slider = control.container.find('.slider.tablet-slider'),
                tablet_slider_input = tablet_slider.next('.slider-input').find('input.tablet-input'),
                mobile_slider = control.container.find('.slider.mobile-slider'),
                mobile_slider_input = mobile_slider.next('.slider-input').find('input.mobile-input'),
                slider_input,
                $this,
                val; // Desktop slider

            desktop_slider.slider({
                range: 'min',
                value: desktop_slider_input.val(),
                min: +desktop_slider_input.attr('min'),
                max: +desktop_slider_input.attr('max'),
                step: +desktop_slider_input.attr('step'),
                slide: function slide(event, ui) {
                    desktop_slider_input.val(ui.value).keyup();
                },
                change: function change(event, ui) {
                    control.settings['desktop'].set(ui.value);
                }
            }); // Tablet slider

            tablet_slider.slider({
                range: 'min',
                value: tablet_slider_input.val(),
                min: +tablet_slider_input.attr('min'),
                max: +tablet_slider_input.attr('max'),
                step: +desktop_slider_input.attr('step'),
                slide: function slide(event, ui) {
                    tablet_slider_input.val(ui.value).keyup();
                },
                change: function change(event, ui) {
                    control.settings['tablet'].set(ui.value);
                }
            }); // Mobile slider

            mobile_slider.slider({
                range: 'min',
                value: mobile_slider_input.val(),
                min: +mobile_slider_input.attr('min'),
                max: +mobile_slider_input.attr('max'),
                step: +desktop_slider_input.attr('step'),
                slide: function slide(event, ui) {
                    mobile_slider_input.val(ui.value).keyup();
                },
                change: function change(event, ui) {
                    control.settings['mobile'].set(ui.value);
                }
            }); // Update the slider when the number value change

            jQuery('input.desktop-input').on('change keyup paste', function() {
                $this = jQuery(this);
                val = $this.val();
                slider_input = $this.parent().prev('.slider.desktop-slider');
                slider_input.slider('value', val);
            });
            jQuery('input.tablet-input').on('change keyup paste', function() {
                $this = jQuery(this);
                val = $this.val();
                slider_input = $this.parent().prev('.slider.tablet-slider');
                slider_input.slider('value', val);
            });
            jQuery('input.mobile-input').on('change keyup paste', function() {
                $this = jQuery(this);
                val = $this.val();
                slider_input = $this.parent().prev('.slider.mobile-slider');
                slider_input.slider('value', val);
            }); // Save the values

            control.container.on('change keyup paste', '.desktop input', function() {
                control.settings['desktop'].set(jQuery(this).val());
            });
            control.container.on('change keyup paste', '.tablet input', function() {
                control.settings['tablet'].set(jQuery(this).val());
            });
            control.container.on('change keyup paste', '.mobile input', function() {
                control.settings['mobile'].set(jQuery(this).val());
            });
        }
    });

})(jQuery, wp.customize);