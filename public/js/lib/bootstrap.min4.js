/*!
 * Bootstrap v3.3.5 (http://getbootstrap.com)
 * Copyright 2011-2015 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 */

/*!
 * Generated using the Bootstrap Customizer (http://getbootstrap.com/customize/?id=2717c5079cef9c29e717)
 * Config saved to config.json and https://gist.github.com/2717c5079cef9c29e717
 */
if("undefined"==typeof jQuery)throw new Error("Bootstrap's JavaScript requires jQuery");+function(t){"use strict";var e=t.fn.jquery.split(" ")[0].split(".");if(e[0]<2&&e[1]<9||1==e[0]&&9==e[1]&&e[2]<1||e[0]>2)throw new Error("Bootstrap's JavaScript requires jQuery version 1.9.1 or higher, but lower than version 3")}(jQuery),+function(t){"use strict";function e(e){return this.each(function(){var o=t(this),i=o.data("bs.alert");i||o.data("bs.alert",i=new n(this)),"string"==typeof e&&i[e].call(o)})}var o='[data-dismiss="alert"]',n=function(e){t(e).on("click",o,this.close)};n.VERSION="3.3.6",n.TRANSITION_DURATION=150,n.prototype.close=function(e){function o(){a.detach().trigger("closed.bs.alert").remove()}var i=t(this),s=i.attr("data-target");s||(s=i.attr("href"),s=s&&s.replace(/.*(?=#[^\s]*$)/,""));var a=t(s);e&&e.preventDefault(),a.length||(a=i.closest(".alert")),a.trigger(e=t.Event("close.bs.alert")),e.isDefaultPrevented()||(a.removeClass("in"),t.support.transition&&a.hasClass("fade")?a.one("bsTransitionEnd",o).emulateTransitionEnd(n.TRANSITION_DURATION):o())};var i=t.fn.alert;t.fn.alert=e,t.fn.alert.Constructor=n,t.fn.alert.noConflict=function(){return t.fn.alert=i,this},t(document).on("click.bs.alert.data-api",o,n.prototype.close)}(jQuery),+function(t){"use strict";function e(e){return this.each(function(){var n=t(this),i=n.data("bs.button"),s="object"==typeof e&&e;i||n.data("bs.button",i=new o(this,s)),"toggle"==e?i.toggle():e&&i.setState(e)})}var o=function(e,n){this.$element=t(e),this.options=t.extend({},o.DEFAULTS,n),this.isLoading=!1};o.VERSION="3.3.6",o.DEFAULTS={loadingText:"loading..."},o.prototype.setState=function(e){var o="disabled",n=this.$element,i=n.is("input")?"val":"html",s=n.data();e+="Text",null==s.resetText&&n.data("resetText",n[i]()),setTimeout(t.proxy(function(){n[i](null==s[e]?this.options[e]:s[e]),"loadingText"==e?(this.isLoading=!0,n.addClass(o).attr(o,o)):this.isLoading&&(this.isLoading=!1,n.removeClass(o).removeAttr(o))},this),0)},o.prototype.toggle=function(){var t=!0,e=this.$element.closest('[data-toggle="buttons"]');if(e.length){var o=this.$element.find("input");"radio"==o.prop("type")?(o.prop("checked")&&(t=!1),e.find(".active").removeClass("active"),this.$element.addClass("active")):"checkbox"==o.prop("type")&&(o.prop("checked")!==this.$element.hasClass("active")&&(t=!1),this.$element.toggleClass("active")),o.prop("checked",this.$element.hasClass("active")),t&&o.trigger("change")}else this.$element.attr("aria-pressed",!this.$element.hasClass("active")),this.$element.toggleClass("active")};var n=t.fn.button;t.fn.button=e,t.fn.button.Constructor=o,t.fn.button.noConflict=function(){return t.fn.button=n,this},t(document).on("click.bs.button.data-api",'[data-toggle^="button"]',function(o){var n=t(o.target);n.hasClass("btn")||(n=n.closest(".btn")),e.call(n,"toggle"),t(o.target).is('input[type="radio"]')||t(o.target).is('input[type="checkbox"]')||o.preventDefault()}).on("focus.bs.button.data-api blur.bs.button.data-api",'[data-toggle^="button"]',function(e){t(e.target).closest(".btn").toggleClass("focus",/^focus(in)?$/.test(e.type))})}(jQuery),+function(t){"use strict";function e(e){var o=e.attr("data-target");o||(o=e.attr("href"),o=o&&/#[A-Za-z]/.test(o)&&o.replace(/.*(?=#[^\s]*$)/,""));var n=o&&t(o);return n&&n.length?n:e.parent()}function o(o){o&&3===o.which||(t(i).remove(),t(s).each(function(){var n=t(this),i=e(n),s={relatedTarget:this};i.hasClass("open")&&(o&&"click"==o.type&&/input|textarea/i.test(o.target.tagName)&&t.contains(i[0],o.target)||(i.trigger(o=t.Event("hide.bs.dropdown",s)),o.isDefaultPrevented()||(n.attr("aria-expanded","false"),i.removeClass("open").trigger(t.Event("hidden.bs.dropdown",s)))))}))}function n(e){return this.each(function(){var o=t(this),n=o.data("bs.dropdown");n||o.data("bs.dropdown",n=new a(this)),"string"==typeof e&&n[e].call(o)})}var i=".dropdown-backdrop",s='[data-toggle="dropdown"]',a=function(e){t(e).on("click.bs.dropdown",this.toggle)};a.VERSION="3.3.6",a.prototype.toggle=function(n){var i=t(this);if(!i.is(".disabled, :disabled")){var s=e(i),a=s.hasClass("open");if(o(),!a){"ontouchstart"in document.documentElement&&!s.closest(".navbar-nav").length&&t(document.createElement("div")).addClass("dropdown-backdrop").insertAfter(t(this)).on("click",o);var r={relatedTarget:this};if(s.trigger(n=t.Event("show.bs.dropdown",r)),n.isDefaultPrevented())return;i.trigger("focus").attr("aria-expanded","true"),s.toggleClass("open").trigger(t.Event("shown.bs.dropdown",r))}return!1}},a.prototype.keydown=function(o){if(/(38|40|27|32)/.test(o.which)&&!/input|textarea/i.test(o.target.tagName)){var n=t(this);if(o.preventDefault(),o.stopPropagation(),!n.is(".disabled, :disabled")){var i=e(n),a=i.hasClass("open");if(!a&&27!=o.which||a&&27==o.which)return 27==o.which&&i.find(s).trigger("focus"),n.trigger("click");var r=" li:not(.disabled):visible a",d=i.find(".dropdown-menu"+r);if(d.length){var l=d.index(o.target);38==o.which&&l>0&&l--,40==o.which&&l<d.length-1&&l++,~l||(l=0),d.eq(l).trigger("focus")}}}};var r=t.fn.dropdown;t.fn.dropdown=n,t.fn.dropdown.Constructor=a,t.fn.dropdown.noConflict=function(){return t.fn.dropdown=r,this},t(document).on("click.bs.dropdown.data-api",o).on("click.bs.dropdown.data-api",".dropdown form",function(t){t.stopPropagation()}).on("click.bs.dropdown.data-api",s,a.prototype.toggle).on("keydown.bs.dropdown.data-api",s,a.prototype.keydown).on("keydown.bs.dropdown.data-api",".dropdown-menu",a.prototype.keydown)}(jQuery),+function(t){"use strict";function e(e,n){return this.each(function(){var i=t(this),s=i.data("bs.modal"),a=t.extend({},o.DEFAULTS,i.data(),"object"==typeof e&&e);s||i.data("bs.modal",s=new o(this,a)),"string"==typeof e?s[e](n):a.show&&s.show(n)})}var o=function(e,o){this.options=o,this.$body=t(document.body),this.$element=t(e),this.$dialog=this.$element.find(".modal-dialog"),this.$backdrop=null,this.isShown=null,this.originalBodyPad=null,this.scrollbarWidth=0,this.ignoreBackdropClick=!1,this.options.remote&&this.$element.find(".modal-content").load(this.options.remote,t.proxy(function(){this.$element.trigger("loaded.bs.modal")},this))};o.VERSION="3.3.6",o.TRANSITION_DURATION=300,o.BACKDROP_TRANSITION_DURATION=150,o.DEFAULTS={backdrop:!0,keyboard:!0,show:!0},o.prototype.toggle=function(t){return this.isShown?this.hide():this.show(t)},o.prototype.show=function(e){var n=this,i=t.Event("show.bs.modal",{relatedTarget:e});this.$element.trigger(i),this.isShown||i.isDefaultPrevented()||(this.isShown=!0,this.checkScrollbar(),this.setScrollbar(),this.$body.addClass("modal-open"),this.escape(),this.resize(),this.$element.on("click.dismiss.bs.modal",'[data-dismiss="modal"]',t.proxy(this.hide,this)),this.$dialog.on("mousedown.dismiss.bs.modal",function(){n.$element.one("mouseup.dismiss.bs.modal",function(e){t(e.target).is(n.$element)&&(n.ignoreBackdropClick=!0)})}),this.backdrop(function(){var i=t.support.transition&&n.$element.hasClass("fade");n.$element.parent().length||n.$element.appendTo(n.$body),n.$element.show().scrollTop(0),n.adjustDialog(),i&&n.$element[0].offsetWidth,n.$element.addClass("in"),n.enforceFocus();var s=t.Event("shown.bs.modal",{relatedTarget:e});i?n.$dialog.one("bsTransitionEnd",function(){n.$element.trigger("focus").trigger(s)}).emulateTransitionEnd(o.TRANSITION_DURATION):n.$element.trigger("focus").trigger(s)}))},o.prototype.hide=function(e){e&&e.preventDefault(),e=t.Event("hide.bs.modal"),this.$element.trigger(e),this.isShown&&!e.isDefaultPrevented()&&(this.isShown=!1,this.escape(),this.resize(),t(document).off("focusin.bs.modal"),this.$element.removeClass("in").off("click.dismiss.bs.modal").off("mouseup.dismiss.bs.modal"),this.$dialog.off("mousedown.dismiss.bs.modal"),t.support.transition&&this.$element.hasClass("fade")?this.$element.one("bsTransitionEnd",t.proxy(this.hideModal,this)).emulateTransitionEnd(o.TRANSITION_DURATION):this.hideModal())},o.prototype.enforceFocus=function(){t(document).off("focusin.bs.modal").on("focusin.bs.modal",t.proxy(function(t){this.$element[0]===t.target||this.$element.has(t.target).length||this.$element.trigger("focus")},this))},o.prototype.escape=function(){this.isShown&&this.options.keyboard?this.$element.on("keydown.dismiss.bs.modal",t.proxy(function(t){27==t.which&&this.hide()},this)):this.isShown||this.$element.off("keydown.dismiss.bs.modal")},o.prototype.resize=function(){this.isShown?t(window).on("resize.bs.modal",t.proxy(this.handleUpdate,this)):t(window).off("resize.bs.modal")},o.prototype.hideModal=function(){var t=this;this.$element.hide(),this.backdrop(function(){t.$body.removeClass("modal-open"),t.resetAdjustments(),t.resetScrollbar(),t.$element.trigger("hidden.bs.modal")})},o.prototype.removeBackdrop=function(){this.$backdrop&&this.$backdrop.remove(),this.$backdrop=null},o.prototype.backdrop=function(e){var n=this,i=this.$element.hasClass("fade")?"fade":"";if(this.isShown&&this.options.backdrop){var s=t.support.transition&&i;if(this.$backdrop=t(document.createElement("div")).addClass("modal-backdrop "+i).appendTo(this.$body),this.$element.on("click.dismiss.bs.modal",t.proxy(function(t){return this.ignoreBackdropClick?void(this.ignoreBackdropClick=!1):void(t.target===t.currentTarget&&("static"==this.options.backdrop?this.$element[0].focus():this.hide()))},this)),s&&this.$backdrop[0].offsetWidth,this.$backdrop.addClass("in"),!e)return;s?this.$backdrop.one("bsTransitionEnd",e).emulateTransitionEnd(o.BACKDROP_TRANSITION_DURATION):e()}else if(!this.isShown&&this.$backdrop){this.$backdrop.removeClass("in");var a=function(){n.removeBackdrop(),e&&e()};t.support.transition&&this.$element.hasClass("fade")?this.$backdrop.one("bsTransitionEnd",a).emulateTransitionEnd(o.BACKDROP_TRANSITION_DURATION):a()}else e&&e()},o.prototype.handleUpdate=function(){this.adjustDialog()},o.prototype.adjustDialog=function(){var t=this.$element[0].scrollHeight>document.documentElement.clientHeight;this.$element.css({paddingLeft:!this.bodyIsOverflowing&&t?this.scrollbarWidth:"",paddingRight:this.bodyIsOverflowing&&!t?this.scrollbarWidth:""})},o.prototype.resetAdjustments=function(){this.$element.css({paddingLeft:"",paddingRight:""})},o.prototype.checkScrollbar=function(){var t=window.innerWidth;if(!t){var e=document.documentElement.getBoundingClientRect();t=e.right-Math.abs(e.left)}this.bodyIsOverflowing=document.body.clientWidth<t,this.scrollbarWidth=this.measureScrollbar()},o.prototype.setScrollbar=function(){var t=parseInt(this.$body.css("padding-right")||0,10);this.originalBodyPad=document.body.style.paddingRight||"",this.bodyIsOverflowing&&this.$body.css("padding-right",t+this.scrollbarWidth)},o.prototype.resetScrollbar=function(){this.$body.css("padding-right",this.originalBodyPad)},o.prototype.measureScrollbar=function(){var t=document.createElement("div");t.className="modal-scrollbar-measure",this.$body.append(t);var e=t.offsetWidth-t.clientWidth;return this.$body[0].removeChild(t),e};var n=t.fn.modal;t.fn.modal=e,t.fn.modal.Constructor=o,t.fn.modal.noConflict=function(){return t.fn.modal=n,this},t(document).on("click.bs.modal.data-api",'[data-toggle="modal"]',function(o){var n=t(this),i=n.attr("href"),s=t(n.attr("data-target")||i&&i.replace(/.*(?=#[^\s]+$)/,"")),a=s.data("bs.modal")?"toggle":t.extend({remote:!/#/.test(i)&&i},s.data(),n.data());n.is("a")&&o.preventDefault(),s.one("show.bs.modal",function(t){t.isDefaultPrevented()||s.one("hidden.bs.modal",function(){n.is(":visible")&&n.trigger("focus")})}),e.call(s,a,this)})}(jQuery),+function(t){"use strict";function e(){var t=document.createElement("bootstrap"),e={WebkitTransition:"webkitTransitionEnd",MozTransition:"transitionend",OTransition:"oTransitionEnd otransitionend",transition:"transitionend"};for(var o in e)if(void 0!==t.style[o])return{end:e[o]};return!1}t.fn.emulateTransitionEnd=function(e){var o=!1,n=this;t(this).one("bsTransitionEnd",function(){o=!0});var i=function(){o||t(n).trigger(t.support.transition.end)};return setTimeout(i,e),this},t(function(){t.support.transition=e(),t.support.transition&&(t.event.special.bsTransitionEnd={bindType:t.support.transition.end,delegateType:t.support.transition.end,handle:function(e){return t(e.target).is(this)?e.handleObj.handler.apply(this,arguments):void 0}})})}(jQuery);