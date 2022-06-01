var transparent = !0,
    transparentDemo = !0,
    fixedTop = !1,
    navbar_initialized = !1,
    backgroundOrange = !1,
    sidebar_mini_active = !1,
    toggle_initialized = !1,
    $html = $("html"),
    $body = $("body"),
    $navbar_minimize_fixed = $(".navbar-minimize-fixed"),
    $collapse = $(".collapse"),
    $navbar = $(".navbar"),
    $tagsinput = $(".tagsinput"),
    $selectpicker = $(".selectpicker"),
    $navbar_color = $(".navbar[color-on-scroll]"),
    $full_screen_map = $(".full-screen-map"),
    $datetimepicker = $(".datetimepicker"),
    $datepicker = $(".datepicker"),
    $timepicker = $(".timepicker"),
    seq = 0,
    delays = 80,
    durations = 500,
    seq2 = 0,
    delays2 = 80,
    durations2 = 500;
function hexToRGB(a, e) {
    var i = parseInt(a.slice(1, 3), 16),
        n = parseInt(a.slice(3, 5), 16),
        s = parseInt(a.slice(5, 7), 16);
    return e ? "rgba(" + i + ", " + n + ", " + s + ", " + e + ")" : "rgb(" + i + ", " + n + ", " + s + ")"
}
!function() {
    if (-1 < navigator.platform.indexOf("Win")) {
        if (0 != $(".main-panel").length)
            new PerfectScrollbar(".main-panel", {
                wheelSpeed: 2,
                wheelPropagation: !0,
                minScrollbarLength: 20,
                suppressScrollX: !0
            });
        if (0 != $(".sidebar .sidebar-wrapper").length) {
            new PerfectScrollbar(".sidebar .sidebar-wrapper");
            $(".table-responsive").each(function() {
                new PerfectScrollbar($(this)[0])
            })
        }
        $html.addClass("perfect-scrollbar-on")
    } else
        $html.addClass("perfect-scrollbar-off")
}(), $(document).ready(function() {
    var a = $(".row").offset();
    (-1 < navigator.platform.indexOf("Win") ? $(".ps") : $(window)).scroll(function() {
        50 < $(this).scrollTop() ? $(".navbar-minimize-fixed").css("opacity", "1") : $(".navbar-minimize-fixed").css("opacity", "0")
    }), $(document).scroll(function() {
        $(this).scrollTop() > a.top ? $(".navbar-minimize-fixed").css("opacity", "1") : $(".navbar-minimize-fixed").css("opacity", "0")
    }), 0 == $(".full-screen-map").length && 0 == $(".bd-docs").length && $(".collapse").on("show.bs.collapse", function() {
        $(this).closest(".navbar").removeClass("navbar-transparent").addClass("bg-white")
    }).on("hide.bs.collapse", function() {
        $(this).closest(".navbar").addClass("navbar-transparent").removeClass("bg-white")
    }), blackDashboard.initMinimizeSidebar(), $navbar = $(".navbar[color-on-scroll]"), scroll_distance = $navbar.attr("color-on-scroll") || 500, 0 != $(".navbar[color-on-scroll]").length && (blackDashboard.checkScrollForTransparentNavbar(), $(window).on("scroll", blackDashboard.checkScrollForTransparentNavbar)), $(".form-control").on("focus", function() {
        $(this).parent(".input-group").addClass("input-group-focus")
    }).on("blur", function() {
        $(this).parent(".input-group").removeClass("input-group-focus")
    }), $(".bootstrap-switch").each(function() {
        $this = $(this), data_on_label = $this.data("on-label") || "", data_off_label = $this.data("off-label") || "", $this.bootstrapSwitch({
            onText: data_on_label,
            offText: data_off_label
        })
    })
}), $(document).on("click", ".navbar-toggle", function() {
    var a = $(this);
    if (1 == blackDashboard.misc.navbar_menu_visible)
        $html.removeClass("nav-open"), blackDashboard.misc.navbar_menu_visible = 0, setTimeout(function() {
            a.removeClass("toggled"), $(".bodyClick").remove()
        }, 550);
    else {
        setTimeout(function() {
            a.addClass("toggled")
        }, 580);
        $('<div class="bodyClick"></div>').appendTo("body").click(function() {
            $html.removeClass("nav-open"), blackDashboard.misc.navbar_menu_visible = 0, setTimeout(function() {
                a.removeClass("toggled"), $(".bodyClick").remove()
            }, 550)
        }), $html.addClass("nav-open"), blackDashboard.misc.navbar_menu_visible = 1
    }
}), $(window).resize(function() {
    if (seq = seq2 = 0, 0 == $full_screen_map.length && 0 == $(".bd-docs").length) {
        var a = $navbar.find('[data-toggle="collapse"]').attr("aria-expanded");
        $navbar.hasClass("bg-white") && 991 < $(window).width() ? $navbar.removeClass("bg-white").addClass("navbar-transparent") : $navbar.hasClass("navbar-transparent") && $(window).width() < 991 && "false" != a && $navbar.addClass("bg-white").removeClass("navbar-transparent")
    }
}), blackDashboard = {
    misc: {
        navbar_menu_visible: 0
    },
    initMinimizeSidebar: function() {
        0 != $(".sidebar-mini").length && (sidebar_mini_active = !0), $("#minimizeSidebar").click(function() {
            $(this);
            1 == sidebar_mini_active ? ($("body").removeClass("sidebar-mini"), sidebar_mini_active = !1, blackDashboard.showSidebarMessage("Sidebar mini deactivated...")) : ($("body").addClass("sidebar-mini"), sidebar_mini_active = !0, blackDashboard.showSidebarMessage("Sidebar mini activated..."));
            var a = setInterval(function() {
                window.dispatchEvent(new Event("resize"))
            }, 180);
            setTimeout(function() {
                clearInterval(a)
            }, 1e3)
        })
    },
    showSidebarMessage: function(a) {
        try {
            $.notify({
                icon: "tim-icons ui-1_bell-53",
                message: a
            }, {
                type: "info",
                timer: 4e3,
                placement: {
                    from: "top",
                    align: "right"
                }
            })
        } catch (a) {
            console.log("Notify library is missing, please make sure you have the notifications library added.")
        }
    }
};
//# sourceMappingURL=_site_dashboard_free/assets/js/dashboard-free.js.map

