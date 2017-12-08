$.root_ = $('body');
/*
 * APP CONFIGURATION (HTML/AJAX/PHP Versions ONLY)
 * Description: Enable / disable certain theme features here
 * GLOBAL: Your left nav in your app will no longer fire ajax calls, set
 * it to false for HTML version
 */
$.navAsAjax = true;
/*
 * GLOBAL: Sound Config (define sound path, enable or disable all sounds)
 */
$.sound_path = "sound/";
$.sound_on = true;
/*
 * SAVE INSTANCE REFERENCE (DO NOT CHANGE)
 * Save a reference to the global object (window in the browser)
 */
var tableCheckboxes = [];
var root = this,
    /*
     * DEBUGGING MODE
     * debugState = true; will spit all debuging message inside browser console.
     * The colors are best displayed in chrome browser.
     */
    debugState = false,
    debugStyle = 'font-weight: bold; color: #00f;',
    debugStyle_green = 'font-weight: bold; font-style:italic; color: #46C246;',
    debugStyle_red = 'font-weight: bold; color: #ed1c24;',
    debugStyle_warning = 'background-color:yellow',
    debugStyle_success = 'background-color:green; font-weight:bold; color:#fff;',
    debugStyle_error = 'background-color:#ed1c24; font-weight:bold; color:#fff;',

    menu_speed = 235,
    menu_accordion = true,

    enableMobileWidgets = false,
    fastClick = false,
    ignore_key_elms = ["#header, #left-panel, #right-panel, #main, div.page-footer, #shortcut, #divSmallBoxes, #divMiniIcons, #divbigBoxes, #voiceModal, script, .ui-chatbox"];

/*
 * END APP.CONFIG
 */
function runAllForms() {
    $.fn.slider && $(".slider").slider(), $.fn.select2 && $("select.select2").each(function() {
        var a = $(this),
            b = a.attr("data-select-width") || "100%";
        a.select2({
            "allowClear": !0,
            "width": b
        }), a = null
    }), $.fn.mask && $("[data-mask]").each(function() {
        var a = $(this),
            b = a.attr("data-mask") || "error...",
            c = a.attr("data-mask-placeholder") || "X";
        a.mask(b, {
            "placeholder": c
        }), a = null
    }), $.fn.autocomplete && $("[data-autocomplete]").each(function() {
        var a = $(this),
            b = a.data("autocomplete") || ["The", "Quick", "Brown", "Fox", "Jumps", "Over", "Three", "Lazy", "Dogs"];
        a.autocomplete({
            "source": b
        }), a = null
    }), $.fn.datepicker && $(".datepicker").each(function() {
        var a = $(this),
            b = a.attr("data-dateformat") || "dd.mm.yy";
        a.datepicker({
            "dateFormat": b,
            "prevText": '<i class="fa fa-chevron-left"></i>',
            "nextText": '<i class="fa fa-chevron-right"></i>'
        }), a = null
    }), $("button[data-loading-text]").on("click", function() {
        var a = $(this);
        a.button("loading"), setTimeout(function() {
            a.button("reset"), a = null
        }, 3e3)
    })
}

function runAllCharts() {

}

function setup_widgets_desktop() {

}

function setup_widgets_mobile() {
    enableMobileWidgets && enableJarvisWidgets && setup_widgets_desktop()
}

function loadScript(a, b) {
    if (jsArray[a]) b && (debugState && root.root.console.log("This script was already loaded %c: " + a, debugStyle_warning), b());
    else {
        jsArray[a] = !0;
        var c = document.getElementsByTagName("body")[0],
            d = document.createElement("script");
        d.type = "text/javascript", d.src = a, d.onload = b, c.appendChild(d)
    }
}

function loadPlugins(a, b) {
    a = 'assets' + a;
    if (jsArray[a]) b && (debugState && root.root.console.log("This script was already loaded %c: " + a, debugStyle_warning), b());
    else {
        jsArray[a] = !0;
        var c = document.getElementsByTagName("body")[0],
            d = document.createElement("script");
        d.type = "text/javascript", d.src = a, d.onload = b, c.appendChild(d)
    }
}

function checkURL() {
    var container;
    var a = location.href.split("#").splice(1).join("#");
    if (!a) try {
        var b = window.document.URL;
        b && b.indexOf("#", 0) > 0 && b.indexOf("#", 0) < b.length + 1 && (a = b.substring(b.indexOf("#", 0) + 1))
    } catch (c) {}
    if (container = $("#content"), a) {
        console.log(a);
        $('.sidebar-wrapper li').removeClass("active");
        $(".sidebar-wrapper>ul>li.active").removeClass("active"), $('.sidebar-wrapper ul>li:has(a[href="#' + getUrlModule(a) + '"])').addClass("active");
        $('.sidebar-wrapper li:has(a[href="#' + a + '"])').addClass("active");

        var d = $('.sidebar-wrapper a[href="' + a + '"]').attr("title");
        document.title = d || document.title, debugState && root.console.log("Page title: %c " + document.title, debugStyle_green), loadURL(a + location.search, container)
    } else {
        var e = $('.sidebar-wrapper > ul > li:first-child > a[href!="#"]');
        window.location.hash = e.attr("href"), e = null
    }
}

function loadURL(a, b, fl = true) {
    b.html(loader());
    debugState && root.root.console.log("Loading URL: %c" + a, debugStyle), $.ajax({
        "type": "GET",
        "url": baseUrl + a,
        "dataType": "html",
        "cache": !0,
        "beforeSend": function() {

        },
        "success": function(c) {
            b.html(c).delay(20).animate({
                "opacity": "1"
            }, 300), c = null, b = null, fl? run_scripts(a): null;
        },
        "error": function(c, d, e, f) {
            switch (c.status) {
                case 401:
                    window.location.href = '/login';
                    break;
                case 404:
                    window.location.href = '#404';
                    break;
                default:
                    b.html(error(a, c, e));
            }
        },
        "async": !0
    });
}
function error(a, c, e) {
    return '<h4 class="ajax-loading-error"><i class="fa fa-warning txt-color-orangeDark"></i> Error requesting <span class="txt-color-red">' + a + "</span>: " + c.status + ' <span style="text-transform: capitalize;">' + e + "</span></h4>";
}
function loader() {
    return '<div class="loader"><div class="cssload-thecube">'+
	        '<div class="cssload-cube cssload-c1"></div>'+
	        '<div class="cssload-cube cssload-c2"></div>'+
	        '<div class="cssload-cube cssload-c4"></div>'+
	        '<div class="cssload-cube cssload-c3"></div>'+
            '</div></div>';
}
function infoUpdate() {
    return '<span class="info-update">'+
            '<i class="material-icons">cached</i>'+
            '</span>';
}
function run_scripts(a) {
    urlParams = getUrlParameters(a);
    BotModule.init();

    if(urlParams.section){
        loadURL(urlParams.section, $('.ajax-section-'+urlParams.section), false);
        $('[data-tabs="tabs"] > li, .tab-pane').removeClass('active');
        $('.tab-pane#'+urlParams.section).addClass('active');
        $('a[href="#'+a+'"]').parent().addClass('active');
    }
}

function pageSetUp() {
    /*"desktop" === thisDevice ? ($("[rel=tooltip], [data-rel=tooltip]").tooltip(), $("[rel=popover], [data-rel=popover]").popover(), $("[rel=popover-hover], [data-rel=popover-hover]").popover({
        "trigger": "hover"
    }), setup_widgets_desktop(), runAllCharts(), runAllForms()) : ($("[rel=popover], [data-rel=popover]").popover(), $("[rel=popover-hover], [data-rel=popover-hover]").popover({
        "trigger": "hover"
    }), runAllCharts(), setup_widgets_mobile(), runAllForms())*/
}

function getUrlModule(a) {
    var urlHash = a.split('/')
    var newURL = urlHash[0];
    var index = urlHash[0].indexOf('?');
    if (index == -1) {
        index = urlHash[0].indexOf('#');
    }
    if (index != -1) {
        newURL = urlHash[0].substring(0, index);
    }
    return newURL;
}

function getParam(a) {
    a = a.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var b = "[\\?&]" + a + "=([^&#]*)",
        c = new RegExp(b),
        d = c.exec(window.location.href);
    return null == d ? "" : d[1]
}

var getUrlParameters = function getUrlParameters(url) {
    var params={};
    location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi,function(s,k,v){params[k]=v});
    return params;
};

$.intervalArr = [];
/*var calc_navbar_height = function() {
        var a = null;
        return $("#header").length && (a = $("#header").height()), null === a && (a = $('<div id="header"></div>').height()), null === a ? 49 : a
    },
    navbar_height = calc_navbar_height,
    shortcut_dropdown = $("#shortcut"),
    bread_crumb = $("#ribbon ol.breadcrumb"),
    topmenu = !1,
    thisDevice = null,
    ismobile = /iphone|ipad|ipod|android|blackberry|mini|windows\sce|palm/i.test(navigator.userAgent.toLowerCase()),
    jsArray = {},
    initApp = function(a) {

        return a.addDeviceType = function() {
                return ismobile ? ($.root_.addClass("mobile-detected"), thisDevice = "mobile", fastClick ? ($.root_.addClass("needsclick"), FastClick.attach(document.body), !1) : void 0) : ($.root_.addClass("desktop-detected"), thisDevice = "desktop", !1)
            }, a.menuPos = function() {
                ($.root_.hasClass("menu-on-top") || "top" == localStorage.getItem("sm-setmenu")) && (topmenu = !0, $.root_.addClass("menu-on-top"))
            }, a.SmartActions = function() {
                var a = {
                    "userLogout": function(a) {
                        function b() {
                            window.location = a.attr("href")
                        }
                        $.SmartMessageBox({
                            "title": "<i class='fa fa-sign-out txt-color-orangeDark'></i> Logout <span class='txt-color-orangeDark'><strong>" + $("#show-shortcut").text() + "</strong></span> ?",
                            "content": a.data("logout-msg") || "You can improve your security further after logging out by closing this opened browser",
                            "buttons": "[No][Yes]"
                        }, function(a) {
                            "Yes" == a && ($.root_.addClass("animated fadeOutUp"), setTimeout(b, 1e3))
                        })
                    },
                    "resetWidgets": function(a) {
                        $.SmartMessageBox({
                            "title": "<i class='fa fa-refresh' style='color:green'></i> Clear Local Storage",
                            "content": a.data("reset-msg") || "Would you like to RESET all your saved widgets and clear LocalStorage?1",
                            "buttons": "[No][Yes]"
                        }, function(a) {
                            "Yes" == a && localStorage && (localStorage.clear(), location.reload())
                        })
                    },
                    "launchFullscreen": function(a) {
                        $.root_.hasClass("full-screen") ? ($.root_.removeClass("full-screen"), document.exitFullscreen ? document.exitFullscreen() : document.mozCancelFullScreen ? document.mozCancelFullScreen() : document.webkitExitFullscreen && document.webkitExitFullscreen()) : ($.root_.addClass("full-screen"), a.requestFullscreen ? a.requestFullscreen() : a.mozRequestFullScreen ? a.mozRequestFullScreen() : a.webkitRequestFullscreen ? a.webkitRequestFullscreen() : a.msRequestFullscreen && a.msRequestFullscreen())
                    },
                    "minifyMenu": function(a) {
                        $.root_.hasClass("menu-on-top") || ($.root_.toggleClass("minified"), $.root_.removeClass("hidden-menu"), $("html").removeClass("hidden-menu-mobile-lock"), a.effect("highlight", {}, 500))
                    },
                    "toggleMenu": function() {
                        $.root_.hasClass("menu-on-top") ? $.root_.hasClass("menu-on-top") && $(window).width() < 979 && ($("html").toggleClass("hidden-menu-mobile-lock"), $.root_.toggleClass("hidden-menu"), $.root_.removeClass("minified")) : ($("html").toggleClass("hidden-menu-mobile-lock"), $.root_.toggleClass("hidden-menu"), $.root_.removeClass("minified"))
                    },
                    "toggleShortcut": function() {
                        function a() {
                            shortcut_dropdown.animate({
                                "height": "hide"
                            }, 300, "easeOutCirc"), $.root_.removeClass("shortcut-on")
                        }

                        function b() {
                            shortcut_dropdown.animate({
                                "height": "show"
                            }, 200, "easeOutCirc"), $.root_.addClass("shortcut-on")
                        }
                        shortcut_dropdown.is(":visible") ? a() : b(), shortcut_dropdown.find("a").click(function(b) {
                            b.preventDefault(), window.location = $(this).attr("href"), setTimeout(a, 300)
                        }), $(document).mouseup(function(b) {
                            shortcut_dropdown.is(b.target) || 0 !== shortcut_dropdown.has(b.target).length || a()
                        })
                    }
                };

            }, a.leftNav = function() {

            }, a.domReadyMisc = function() {
            }, a.mobileCheckActivation = function() {
            },a}({});
initApp.addDeviceType(), initApp.menuPos(), jQuery(document).ready(function() {
        initApp.SmartActions(), initApp.leftNav(), initApp.domReadyMisc();
    }),
    function(a, b, c) {
        function d() {
            e = b[h](function() {
                f.each(function() {
                    var b, c, d = a(this),
                        e = a.data(this, j);
                    try {
                        b = d.width()
                    } catch (f) {
                        b = d.width
                    }
                    try {
                        c = d.height()
                    } catch (f) {
                        c = d.height
                    }(b !== e.w || c !== e.h) && d.trigger(i, [e.w = b, e.h = c])
                }), d()
            }, g[k])
        }
        var e, f = a([]),
            g = a.resize = a.extend(a.resize, {}),
            h = "setTimeout",
            i = "resize",
            j = i + "-special-event",
            k = "delay",
            l = "throttleWindow";
    }(jQuery, this), $("#main").resize(function() {
        initApp.mobileCheckActivation()
    });*/
var ie = function() {
    for (var a, b = 3, c = document.createElement("div"), d = c.getElementsByTagName("i"); c.innerHTML = "<!--[if gt IE " + ++b + "]><i></i><![endif]-->", d[0];);
    return b > 4 ? b : a
}();
if ($.fn.extend({}), jQuery.fn.doesExist = function() {
        return jQuery(this).length > 0
    }, $.navAsAjax || $(".google_maps")) {
    var gMapsLoaded = !1;
    window.gMapsCallback = function() {
        gMapsLoaded = !0, $(window).trigger("gMapsLoaded")
    }, window.loadGoogleMaps = function() {
        if (gMapsLoaded) return window.gMapsCallback();
        var a = document.createElement("script");
        a.setAttribute("type", "text/javascript"), a.setAttribute("src", "http://maps.google.com/maps/api/js?sensor=false&callback=gMapsCallback"), (document.getElementsByTagName("head")[0] || document.documentElement).appendChild(a)
    }
}

$.navAsAjax && ($("nav").length && checkURL(), $(document).on("click", 'nav a[href!="#"]', function(a) {
    a.preventDefault();
    var b = $(a.currentTarget);
    b.parent().hasClass("active") || b.attr("target") || ($.root_.hasClass("mobile-view-activated") ? ($.root_.removeClass("hidden-menu"), $("html").removeClass("hidden-menu-mobile-lock"), window.setTimeout(function() {
        window.location.search ? window.location.href = window.location.href.replace(window.location.search, "").replace(window.location.hash, "") + "#" + b.attr("href") : window.location.hash = b.attr("href")
    }, 150)) : window.location.search ? window.location.href = window.location.href.replace(window.location.search, "").replace(window.location.hash, "") + "#" + b.attr("href") : window.location.hash = b.attr("href"))
}), $(document).on("click", 'nav a[target="_blank"]', function(a) {
    a.preventDefault();
    var b = $(a.currentTarget);
    window.open(b.attr("href"))
}), $(document).on("click", 'nav a[target="_top"]', function(a) {
    a.preventDefault();
    var b = $(a.currentTarget);
    window.location = b.attr("href")
}), $(document).on("click", 'nav a[href="#"]', function(a) {
    a.preventDefault()
}), $(window).on("hashchange", function() {
    checkURL();
})), $("body").on("click", function(a) {
    $('[rel="popover"], [data-rel="popover"]').each(function() {
        $(this).is(a.target) || 0 !== $(this).has(a.target).length || 0 !== $(".popover").has(a.target).length || $(this).popover("hide")
    })
}), $("body").on("hidden.bs.modal", ".modal", function() {
    $(this).removeData("bs.modal")
});