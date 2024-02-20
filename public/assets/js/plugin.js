/* 

    1. nice-select.min
    2. tilt
    3. wow
    4. gijgo
    5. nicescroll
    6. odometer
    7. appear
    8. telInput
    9. slick

*/
// 1. nice-select.min

!(function ($) {
    $.fn.niceSelect = function (a) {
        if ("string" == typeof a)
            return (
                "update" == a
                    ? this.each(function () {
                          var b = $(this),
                              a = $(this).next(".nice-select"),
                              d = a.hasClass("open");
                          a.length && (a.remove(), c(b), d && b.next().trigger("click"));
                      })
                    : "destroy" == a
                    ? (this.each(function () {
                          var b = $(this),
                              a = $(this).next(".nice-select");
                          a.length && (a.remove(), b.css("display", ""));
                      }),
                      0 == $(".nice-select").length && $(document).off(".nice_select"))
                    : console.log('Method "' + a + '" does not exist.'),
                this
            );
        function c(a) {
            a.after(
                $("<div></div>")
                    .addClass("nice-select")
                    .addClass(a.attr("class") || "")
                    .addClass(a.attr("disabled") ? "disabled" : "")
                    .addClass(a.attr("multiple") ? "has-multiple" : "")
                    .attr("tabindex", a.attr("disabled") ? null : "0")
                    .html(
                        a.attr("multiple")
                            ? '<span class="multiple-options"></span><div class="nice-select-search-box"><input type="text" class="nice-select-search" placeholder="Search..."/></div><ul class="list"></ul>'
                            : '<span class="current"></span><div class="nice-select-search-box"><input type="text" class="nice-select-search" placeholder="Search..."/></div><ul class="list"></ul>'
                    )
            );
            var d = a.next(),
                e = a.find("option");
            if (a.attr("multiple")) {
                var b = a.find("option:selected"),
                    c = "";
                b.each(function () {
                    ($selected_text = ($selected_option = $(this)).data("display") || $selected_option.text()), $selected_option.val() && (c += '<span class="current">' + $selected_text + "</span>");
                }),
                    ($select_placeholder = ($select_placeholder = a.data("js-placeholder") || a.attr("js-placeholder")) || "Select"),
                    console.log($select_placeholder),
                    (c = "" === c ? $select_placeholder : c),
                    d.find(".multiple-options").html(c);
            } else {
                var b = a.find("option:selected");
                d.find(".current").html(b.data("display") || b.text());
            }
            e.each(function (c) {
                var a = $(this),
                    b = a.data("display");
                d.find("ul").append(
                    $("<li></li>")
                        .attr("data-value", a.val())
                        .attr("data-display", b || null)
                        .addClass("option" + (a.is(":selected") ? " selected" : "") + (a.is(":disabled") ? " disabled" : ""))
                        .html(a.text())
                );
            });
        }
        this.hide(),
            this.each(function () {
                var a = $(this);
                a.next().hasClass("nice-select") || c(a);
            }),
            $(document).off(".nice_select"),
            $(document).on("click.nice_select", ".nice-select", function (b) {
                var a = $(this);
                $(".nice-select").not(a).removeClass("open"),
                    a.toggleClass("open"),
                    a.hasClass("open")
                        ? (a.find(".option"), a.find(".nice-select-search").val(""), a.find(".nice-select-search").focus(), a.find(".focus").removeClass("focus"), a.find(".selected").addClass("focus"), a.find("ul li").show())
                        : a.focus();
            }),
            $(document).on("click", ".nice-select-search-box", function (a) {
                return a.stopPropagation(), !1;
            }),
            $(document).on("keyup.nice-select-search", ".nice-select", function () {
                var a = $(this),
                    b = a.find(".nice-select-search").val(),
                    c = a.find("ul li");
                if ("" == b) c.show();
                else if (a.hasClass("open")) {
                    b = b.toLowerCase();
                    var d = new RegExp(b);
                    0 < c.length
                        ? c.each(function () {
                              var a = $(this),
                                  b = a.text().toLowerCase();
                              d.test(b) ? a.show() : a.hide();
                          })
                        : c.show();
                }
                a.find(".option"), a.find(".focus").removeClass("focus"), a.find(".selected").addClass("focus");
            }),
            $(document).on("click.nice_select", function (a) {
                0 === $(a.target).closest(".nice-select").length && $(".nice-select").removeClass("open").find(".option");
            }),
            $(document).on("click.nice_select", ".nice-select .option:not(.disabled)", function (d) {
                var b = $(this),
                    a = b.closest(".nice-select");
                if (a.hasClass("has-multiple"))
                    console.log("clicked", b),
                        b.hasClass("selected") ? b.removeClass("selected") : b.addClass("selected"),
                        ($selected_html = ""),
                        ($selected_values = []),
                        a.find(".selected").each(function () {
                            ($selected_html += '<span class="current">' + (($selected_option = $(this)).data("display") || $selected_option.text()) + "</span>"), $selected_values.push($selected_option.data("value"));
                        }),
                        ($select_placeholder = a.prev("select").data("js-placeholder") || a.prev("select").attr("js-placeholder")),
                        console.log(a.prev("select")),
                        ($select_placeholder = $select_placeholder || "Select"),
                        ($selected_html = "" === $selected_html ? $select_placeholder : $selected_html),
                        a.find(".multiple-options").html($selected_html),
                        a.prev("select").val($selected_values).trigger("change");
                else {
                    a.find(".selected").removeClass("selected"), b.addClass("selected");
                    var c = b.data("display") || b.text();
                    a.find(".current").text(c), a.prev("select").val(b.data("value")).trigger("change");
                }
            }),
            $(document).on("keydown.nice_select", ".nice-select", function (b) {
                var a = $(this),
                    c = $(a.find(".focus") || a.find(".list .option.selected"));
                if (32 == b.keyCode || 13 == b.keyCode) return a.hasClass("open") ? c.trigger("click") : a.trigger("click"), !1;
                if (40 == b.keyCode) {
                    if (a.hasClass("open")) {
                        var d = c.nextAll(".option:not(.disabled)").first();
                        d.length > 0 && (a.find(".focus").removeClass("focus"), d.addClass("focus"));
                    } else a.trigger("click");
                    return !1;
                }
                if (38 == b.keyCode) {
                    if (a.hasClass("open")) {
                        var e = c.prevAll(".option:not(.disabled)").first();
                        e.length > 0 && (a.find(".focus").removeClass("focus"), e.addClass("focus"));
                    } else a.trigger("click");
                    return !1;
                }
                if (27 == b.keyCode) a.hasClass("open") && a.trigger("click");
                else if (9 == b.keyCode && a.hasClass("open")) return !1;
            });
        var b = document.createElement("a").style;
        return (b.cssText = "pointer-events:auto"), "auto" !== b.pointerEvents && $("html").addClass("no-csspointerevents"), this;
    };
})(jQuery);

// 2. tilt
("use strict");
var _typeof =
    "function" == typeof Symbol && "symbol" == typeof Symbol.iterator
        ? function (t) {
              return typeof t;
          }
        : function (t) {
              return t && "function" == typeof Symbol && t.constructor === Symbol && t !== Symbol.prototype ? "symbol" : typeof t;
          };
!(function (t) {
    "function" == typeof define && define.amd
        ? define(["jquery"], t)
        : "object" === ("undefined" == typeof module ? "undefined" : _typeof(module)) && module.exports
        ? (module.exports = function (i, s) {
              return void 0 === s && (s = "undefined" != typeof window ? require("jquery") : require("jquery")(i)), t(s), s;
          })
        : t(jQuery);
})(function (t) {
    return (
        (t.fn.tilt = function (i) {
            var s = function () {
                    this.ticking || (requestAnimationFrame(g.bind(this)), (this.ticking = !0));
                },
                e = function () {
                    var i = this;
                    t(this).on("mousemove", o), t(this).on("mouseenter", a), this.settings.reset && t(this).on("mouseleave", l), this.settings.glare && t(window).on("resize", d.bind(i));
                },
                n = function () {
                    var i = this;
                    void 0 !== this.timeout && clearTimeout(this.timeout),
                        t(this).css({ transition: this.settings.speed + "ms " + this.settings.easing }),
                        this.settings.glare && this.glareElement.css({ transition: "opacity " + this.settings.speed + "ms " + this.settings.easing }),
                        (this.timeout = setTimeout(function () {
                            t(i).css({ transition: "" }), i.settings.glare && i.glareElement.css({ transition: "" });
                        }, this.settings.speed));
                },
                a = function (i) {
                    (this.ticking = !1), t(this).css({ "will-change": "transform" }), n.call(this), t(this).trigger("tilt.mouseEnter");
                },
                r = function (i) {
                    return "undefined" == typeof i && (i = { pageX: t(this).offset().left + t(this).outerWidth() / 2, pageY: t(this).offset().top + t(this).outerHeight() / 2 }), { x: i.pageX, y: i.pageY };
                },
                o = function (t) {
                    (this.mousePositions = r(t)), s.call(this);
                },
                l = function () {
                    n.call(this), (this.reset = !0), s.call(this), t(this).trigger("tilt.mouseLeave");
                },
                h = function () {
                    var i = t(this).outerWidth(),
                        s = t(this).outerHeight(),
                        e = t(this).offset().left,
                        n = t(this).offset().top,
                        a = (this.mousePositions.x - e) / i,
                        r = (this.mousePositions.y - n) / s,
                        o = (this.settings.maxTilt / 2 - a * this.settings.maxTilt).toFixed(2),
                        l = (r * this.settings.maxTilt - this.settings.maxTilt / 2).toFixed(2),
                        h = Math.atan2(this.mousePositions.x - (e + i / 2), -(this.mousePositions.y - (n + s / 2))) * (180 / Math.PI);
                    return { tiltX: o, tiltY: l, percentageX: 100 * a, percentageY: 100 * r, angle: h };
                },
                g = function () {
                    return (
                        (this.transforms = h.call(this)),
                        this.reset
                            ? ((this.reset = !1),
                              t(this).css("transform", "perspective(" + this.settings.perspective + "px) rotateX(0deg) rotateY(0deg)"),
                              void (this.settings.glare && (this.glareElement.css("transform", "rotate(180deg) translate(-50%, -50%)"), this.glareElement.css("opacity", "0"))))
                            : (t(this).css(
                                  "transform",
                                  "perspective(" +
                                      this.settings.perspective +
                                      "px) rotateX(" +
                                      ("x" === this.settings.disableAxis ? 0 : this.transforms.tiltY) +
                                      "deg) rotateY(" +
                                      ("y" === this.settings.disableAxis ? 0 : this.transforms.tiltX) +
                                      "deg) scale3d(" +
                                      this.settings.scale +
                                      "," +
                                      this.settings.scale +
                                      "," +
                                      this.settings.scale +
                                      ")"
                              ),
                              this.settings.glare &&
                                  (this.glareElement.css("transform", "rotate(" + this.transforms.angle + "deg) translate(-50%, -50%)"), this.glareElement.css("opacity", "" + (this.transforms.percentageY * this.settings.maxGlare) / 100)),
                              t(this).trigger("change", [this.transforms]),
                              void (this.ticking = !1))
                    );
                },
                c = function () {
                    var i = this.settings.glarePrerender;
                    if (
                        (i || t(this).append('<div class="js-tilt-glare"><div class="js-tilt-glare-inner"></div></div>'),
                        (this.glareElementWrapper = t(this).find(".js-tilt-glare")),
                        (this.glareElement = t(this).find(".js-tilt-glare-inner")),
                        !i)
                    ) {
                        var s = { position: "absolute", top: "0", left: "0", width: "100%", height: "100%" };
                        this.glareElementWrapper.css(s).css({ overflow: "hidden", "pointer-events": "none" }),
                            this.glareElement.css({
                                position: "absolute",
                                top: "50%",
                                left: "50%",
                                "background-image": "linear-gradient(0deg, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%)",
                                width: "" + 2 * t(this).outerWidth(),
                                height: "" + 2 * t(this).outerWidth(),
                                transform: "rotate(180deg) translate(-50%, -50%)",
                                "transform-origin": "0% 0%",
                                opacity: "0",
                            });
                    }
                },
                d = function () {
                    this.glareElement.css({ width: "" + 2 * t(this).outerWidth(), height: "" + 2 * t(this).outerWidth() });
                };
            return (
                (t.fn.tilt.destroy = function () {
                    t(this).each(function () {
                        t(this).find(".js-tilt-glare").remove(), t(this).css({ "will-change": "", transform: "" }), t(this).off("mousemove mouseenter mouseleave");
                    });
                }),
                (t.fn.tilt.getValues = function () {
                    var i = [];
                    return (
                        t(this).each(function () {
                            (this.mousePositions = r.call(this)), i.push(h.call(this));
                        }),
                        i
                    );
                }),
                (t.fn.tilt.reset = function () {
                    t(this).each(function () {
                        var i = this;
                        (this.mousePositions = r.call(this)),
                            (this.settings = t(this).data("settings")),
                            l.call(this),
                            setTimeout(function () {
                                i.reset = !1;
                            }, this.settings.transition);
                    });
                }),
                this.each(function () {
                    var s = this;
                    (this.settings = t.extend(
                        {
                            maxTilt: t(this).is("[data-tilt-max]") ? t(this).data("tilt-max") : 20,
                            perspective: t(this).is("[data-tilt-perspective]") ? t(this).data("tilt-perspective") : 300,
                            easing: t(this).is("[data-tilt-easing]") ? t(this).data("tilt-easing") : "cubic-bezier(.03,.98,.52,.99)",
                            scale: t(this).is("[data-tilt-scale]") ? t(this).data("tilt-scale") : "1",
                            speed: t(this).is("[data-tilt-speed]") ? t(this).data("tilt-speed") : "400",
                            transition: !t(this).is("[data-tilt-transition]") || t(this).data("tilt-transition"),
                            disableAxis: t(this).is("[data-tilt-disable-axis]") ? t(this).data("tilt-disable-axis") : null,
                            axis: t(this).is("[data-tilt-axis]") ? t(this).data("tilt-axis") : null,
                            reset: !t(this).is("[data-tilt-reset]") || t(this).data("tilt-reset"),
                            glare: !!t(this).is("[data-tilt-glare]") && t(this).data("tilt-glare"),
                            maxGlare: t(this).is("[data-tilt-maxglare]") ? t(this).data("tilt-maxglare") : 1,
                        },
                        i
                    )),
                        null !== this.settings.axis &&
                            (console.warn("Tilt.js: the axis setting has been renamed to disableAxis. See https://github.com/gijsroge/tilt.js/pull/26 for more information"), (this.settings.disableAxis = this.settings.axis)),
                        (this.init = function () {
                            t(s).data("settings", s.settings), s.settings.glare && c.call(s), e.call(s);
                        }),
                        this.init();
                })
            );
        }),
        t("[data-tilt]").tilt(),
        !0
    );
});

// 3. wow
/*! WOW - v1.1.3 - 2016-05-06
 * Copyright (c) 2016 Matthieu Aussaguel;*/ (function () {
    var a,
        b,
        c,
        d,
        e,
        f = function (a, b) {
            return function () {
                return a.apply(b, arguments);
            };
        },
        g =
            [].indexOf ||
            function (a) {
                for (var b = 0, c = this.length; c > b; b++) if (b in this && this[b] === a) return b;
                return -1;
            };
    (b = (function () {
        function a() {}
        return (
            (a.prototype.extend = function (a, b) {
                var c, d;
                for (c in b) (d = b[c]), null == a[c] && (a[c] = d);
                return a;
            }),
            (a.prototype.isMobile = function (a) {
                return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(a);
            }),
            (a.prototype.createEvent = function (a, b, c, d) {
                var e;
                return (
                    null == b && (b = !1),
                    null == c && (c = !1),
                    null == d && (d = null),
                    null != document.createEvent
                        ? ((e = document.createEvent("CustomEvent")), e.initCustomEvent(a, b, c, d))
                        : null != document.createEventObject
                        ? ((e = document.createEventObject()), (e.eventType = a))
                        : (e.eventName = a),
                    e
                );
            }),
            (a.prototype.emitEvent = function (a, b) {
                return null != a.dispatchEvent ? a.dispatchEvent(b) : b in (null != a) ? a[b]() : "on" + b in (null != a) ? a["on" + b]() : void 0;
            }),
            (a.prototype.addEvent = function (a, b, c) {
                return null != a.addEventListener ? a.addEventListener(b, c, !1) : null != a.attachEvent ? a.attachEvent("on" + b, c) : (a[b] = c);
            }),
            (a.prototype.removeEvent = function (a, b, c) {
                return null != a.removeEventListener ? a.removeEventListener(b, c, !1) : null != a.detachEvent ? a.detachEvent("on" + b, c) : delete a[b];
            }),
            (a.prototype.innerHeight = function () {
                return "innerHeight" in window ? window.innerHeight : document.documentElement.clientHeight;
            }),
            a
        );
    })()),
        (c =
            this.WeakMap ||
            this.MozWeakMap ||
            (c = (function () {
                function a() {
                    (this.keys = []), (this.values = []);
                }
                return (
                    (a.prototype.get = function (a) {
                        var b, c, d, e, f;
                        for (f = this.keys, b = d = 0, e = f.length; e > d; b = ++d) if (((c = f[b]), c === a)) return this.values[b];
                    }),
                    (a.prototype.set = function (a, b) {
                        var c, d, e, f, g;
                        for (g = this.keys, c = e = 0, f = g.length; f > e; c = ++e) if (((d = g[c]), d === a)) return void (this.values[c] = b);
                        return this.keys.push(a), this.values.push(b);
                    }),
                    a
                );
            })())),
        (a =
            this.MutationObserver ||
            this.WebkitMutationObserver ||
            this.MozMutationObserver ||
            (a = (function () {
                function a() {
                    "undefined" != typeof console && null !== console && console.warn("MutationObserver is not supported by your browser."),
                        "undefined" != typeof console && null !== console && console.warn("WOW.js cannot detect dom mutations, please call .sync() after loading new content.");
                }
                return (a.notSupported = !0), (a.prototype.observe = function () {}), a;
            })())),
        (d =
            this.getComputedStyle ||
            function (a, b) {
                return (
                    (this.getPropertyValue = function (b) {
                        var c;
                        return (
                            "float" === b && (b = "styleFloat"),
                            e.test(b) &&
                                b.replace(e, function (a, b) {
                                    return b.toUpperCase();
                                }),
                            (null != (c = a.currentStyle) ? c[b] : void 0) || null
                        );
                    }),
                    this
                );
            }),
        (e = /(\-([a-z]){1})/g),
        (this.WOW = (function () {
            function e(a) {
                null == a && (a = {}),
                    (this.scrollCallback = f(this.scrollCallback, this)),
                    (this.scrollHandler = f(this.scrollHandler, this)),
                    (this.resetAnimation = f(this.resetAnimation, this)),
                    (this.start = f(this.start, this)),
                    (this.scrolled = !0),
                    (this.config = this.util().extend(a, this.defaults)),
                    null != a.scrollContainer && (this.config.scrollContainer = document.querySelector(a.scrollContainer)),
                    (this.animationNameCache = new c()),
                    (this.wowEvent = this.util().createEvent(this.config.boxClass));
            }
            return (
                (e.prototype.defaults = { boxClass: "wow", animateClass: "animated", offset: 0, mobile: !0, live: !0, callback: null, scrollContainer: null }),
                (e.prototype.init = function () {
                    var a;
                    return (
                        (this.element = window.document.documentElement), "interactive" === (a = document.readyState) || "complete" === a ? this.start() : this.util().addEvent(document, "DOMContentLoaded", this.start), (this.finished = [])
                    );
                }),
                (e.prototype.start = function () {
                    var b, c, d, e;
                    if (
                        ((this.stopped = !1),
                        (this.boxes = function () {
                            var a, c, d, e;
                            for (d = this.element.querySelectorAll("." + this.config.boxClass), e = [], a = 0, c = d.length; c > a; a++) (b = d[a]), e.push(b);
                            return e;
                        }.call(this)),
                        (this.all = function () {
                            var a, c, d, e;
                            for (d = this.boxes, e = [], a = 0, c = d.length; c > a; a++) (b = d[a]), e.push(b);
                            return e;
                        }.call(this)),
                        this.boxes.length)
                    )
                        if (this.disabled()) this.resetStyle();
                        else for (e = this.boxes, c = 0, d = e.length; d > c; c++) (b = e[c]), this.applyStyle(b, !0);
                    return (
                        this.disabled() ||
                            (this.util().addEvent(this.config.scrollContainer || window, "scroll", this.scrollHandler), this.util().addEvent(window, "resize", this.scrollHandler), (this.interval = setInterval(this.scrollCallback, 50))),
                        this.config.live
                            ? new a(
                                  (function (a) {
                                      return function (b) {
                                          var c, d, e, f, g;
                                          for (g = [], c = 0, d = b.length; d > c; c++)
                                              (f = b[c]),
                                                  g.push(
                                                      function () {
                                                          var a, b, c, d;
                                                          for (c = f.addedNodes || [], d = [], a = 0, b = c.length; b > a; a++) (e = c[a]), d.push(this.doSync(e));
                                                          return d;
                                                      }.call(a)
                                                  );
                                          return g;
                                      };
                                  })(this)
                              ).observe(document.body, { childList: !0, subtree: !0 })
                            : void 0
                    );
                }),
                (e.prototype.stop = function () {
                    return (
                        (this.stopped = !0),
                        this.util().removeEvent(this.config.scrollContainer || window, "scroll", this.scrollHandler),
                        this.util().removeEvent(window, "resize", this.scrollHandler),
                        null != this.interval ? clearInterval(this.interval) : void 0
                    );
                }),
                (e.prototype.sync = function (b) {
                    return a.notSupported ? this.doSync(this.element) : void 0;
                }),
                (e.prototype.doSync = function (a) {
                    var b, c, d, e, f;
                    if ((null == a && (a = this.element), 1 === a.nodeType)) {
                        for (a = a.parentNode || a, e = a.querySelectorAll("." + this.config.boxClass), f = [], c = 0, d = e.length; d > c; c++)
                            (b = e[c]), g.call(this.all, b) < 0 ? (this.boxes.push(b), this.all.push(b), this.stopped || this.disabled() ? this.resetStyle() : this.applyStyle(b, !0), f.push((this.scrolled = !0))) : f.push(void 0);
                        return f;
                    }
                }),
                (e.prototype.show = function (a) {
                    return (
                        this.applyStyle(a),
                        (a.className = a.className + " " + this.config.animateClass),
                        null != this.config.callback && this.config.callback(a),
                        this.util().emitEvent(a, this.wowEvent),
                        this.util().addEvent(a, "animationend", this.resetAnimation),
                        this.util().addEvent(a, "oanimationend", this.resetAnimation),
                        this.util().addEvent(a, "webkitAnimationEnd", this.resetAnimation),
                        this.util().addEvent(a, "MSAnimationEnd", this.resetAnimation),
                        a
                    );
                }),
                (e.prototype.applyStyle = function (a, b) {
                    var c, d, e;
                    return (
                        (d = a.getAttribute("data-wow-duration")),
                        (c = a.getAttribute("data-wow-delay")),
                        (e = a.getAttribute("data-wow-iteration")),
                        this.animate(
                            (function (f) {
                                return function () {
                                    return f.customStyle(a, b, d, c, e);
                                };
                            })(this)
                        )
                    );
                }),
                (e.prototype.animate = (function () {
                    return "requestAnimationFrame" in window
                        ? function (a) {
                              return window.requestAnimationFrame(a);
                          }
                        : function (a) {
                              return a();
                          };
                })()),
                (e.prototype.resetStyle = function () {
                    var a, b, c, d, e;
                    for (d = this.boxes, e = [], b = 0, c = d.length; c > b; b++) (a = d[b]), e.push((a.style.visibility = "visible"));
                    return e;
                }),
                (e.prototype.resetAnimation = function (a) {
                    var b;
                    return a.type.toLowerCase().indexOf("animationend") >= 0 ? ((b = a.target || a.srcElement), (b.className = b.className.replace(this.config.animateClass, "").trim())) : void 0;
                }),
                (e.prototype.customStyle = function (a, b, c, d, e) {
                    return (
                        b && this.cacheAnimationName(a),
                        (a.style.visibility = b ? "hidden" : "visible"),
                        c && this.vendorSet(a.style, { animationDuration: c }),
                        d && this.vendorSet(a.style, { animationDelay: d }),
                        e && this.vendorSet(a.style, { animationIterationCount: e }),
                        this.vendorSet(a.style, { animationName: b ? "none" : this.cachedAnimationName(a) }),
                        a
                    );
                }),
                (e.prototype.vendors = ["moz", "webkit"]),
                (e.prototype.vendorSet = function (a, b) {
                    var c, d, e, f;
                    d = [];
                    for (c in b)
                        (e = b[c]),
                            (a["" + c] = e),
                            d.push(
                                function () {
                                    var b, d, g, h;
                                    for (g = this.vendors, h = [], b = 0, d = g.length; d > b; b++) (f = g[b]), h.push((a["" + f + c.charAt(0).toUpperCase() + c.substr(1)] = e));
                                    return h;
                                }.call(this)
                            );
                    return d;
                }),
                (e.prototype.vendorCSS = function (a, b) {
                    var c, e, f, g, h, i;
                    for (h = d(a), g = h.getPropertyCSSValue(b), f = this.vendors, c = 0, e = f.length; e > c; c++) (i = f[c]), (g = g || h.getPropertyCSSValue("-" + i + "-" + b));
                    return g;
                }),
                (e.prototype.animationName = function (a) {
                    var b;
                    try {
                        b = this.vendorCSS(a, "animation-name").cssText;
                    } catch (c) {
                        b = d(a).getPropertyValue("animation-name");
                    }
                    return "none" === b ? "" : b;
                }),
                (e.prototype.cacheAnimationName = function (a) {
                    return this.animationNameCache.set(a, this.animationName(a));
                }),
                (e.prototype.cachedAnimationName = function (a) {
                    return this.animationNameCache.get(a);
                }),
                (e.prototype.scrollHandler = function () {
                    return (this.scrolled = !0);
                }),
                (e.prototype.scrollCallback = function () {
                    var a;
                    return !this.scrolled ||
                        ((this.scrolled = !1),
                        (this.boxes = function () {
                            var b, c, d, e;
                            for (d = this.boxes, e = [], b = 0, c = d.length; c > b; b++) (a = d[b]), a && (this.isVisible(a) ? this.show(a) : e.push(a));
                            return e;
                        }.call(this)),
                        this.boxes.length || this.config.live)
                        ? void 0
                        : this.stop();
                }),
                (e.prototype.offsetTop = function (a) {
                    for (var b; void 0 === a.offsetTop; ) a = a.parentNode;
                    for (b = a.offsetTop; (a = a.offsetParent); ) b += a.offsetTop;
                    return b;
                }),
                (e.prototype.isVisible = function (a) {
                    var b, c, d, e, f;
                    return (
                        (c = a.getAttribute("data-wow-offset") || this.config.offset),
                        (f = (this.config.scrollContainer && this.config.scrollContainer.scrollTop) || window.pageYOffset),
                        (e = f + Math.min(this.element.clientHeight, this.util().innerHeight()) - c),
                        (d = this.offsetTop(a)),
                        (b = d + a.clientHeight),
                        e >= d && b >= f
                    );
                }),
                (e.prototype.util = function () {
                    return null != this._util ? this._util : (this._util = new b());
                }),
                (e.prototype.disabled = function () {
                    return !this.config.mobile && this.util().isMobile(navigator.userAgent);
                }),
                e
            );
        })());
}.call(this));

// 4. gijgo
var gj = {};
(gj.widget = function () {
    var a = this;
    (a.xhr = null),
        (a.generateGUID = function () {
            function a() {
                return Math.floor(65536 * (1 + Math.random()))
                    .toString(16)
                    .substring(1);
            }
            return a() + a() + "-" + a() + "-" + a() + "-" + a() + "-" + a() + a() + a();
        }),
        (a.mouseX = function (a) {
            if (a) {
                if (a.pageX) return a.pageX;
                if (a.clientX) return a.clientX + (document.documentElement.scrollLeft ? document.documentElement.scrollLeft : document.body.scrollLeft);
                if (a.touches && a.touches.length) return a.touches[0].pageX;
                if (a.changedTouches && a.changedTouches.length) return a.changedTouches[0].pageX;
                if (a.originalEvent && a.originalEvent.touches && a.originalEvent.touches.length) return a.originalEvent.touches[0].pageX;
                if (a.originalEvent && a.originalEvent.changedTouches && a.originalEvent.changedTouches.length) return a.originalEvent.touches[0].pageX;
            }
            return null;
        }),
        (a.mouseY = function (a) {
            if (a) {
                if (a.pageY) return a.pageY;
                if (a.clientY) return a.clientY + (document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop);
                if (a.touches && a.touches.length) return a.touches[0].pageY;
                if (a.changedTouches && a.changedTouches.length) return a.changedTouches[0].pageY;
                if (a.originalEvent && a.originalEvent.touches && a.originalEvent.touches.length) return a.originalEvent.touches[0].pageY;
                if (a.originalEvent && a.originalEvent.changedTouches && a.originalEvent.changedTouches.length) return a.originalEvent.touches[0].pageY;
            }
            return null;
        });
}),
    (gj.widget.prototype.init = function (a, b) {
        var c, d, e;
        this.attr("data-type", b), (d = $.extend(!0, {}, this.getHTMLConfig() || {})), $.extend(!0, d, a || {}), (e = this.getConfig(d, b)), this.attr("data-guid", e.guid), this.data(e);
        for (c in e) gj[b].events.hasOwnProperty(c) && (this.on(c, e[c]), delete e[c]);
        for (plugin in gj[b].plugins) gj[b].plugins.hasOwnProperty(plugin) && gj[b].plugins[plugin].configure(this, e, d);
        return this;
    }),
    (gj.widget.prototype.getConfig = function (a, b) {
        var c, d, e, f;
        (c = $.extend(!0, {}, gj[b].config.base)),
            (d = a.hasOwnProperty("uiLibrary") ? a.uiLibrary : c.uiLibrary),
            gj[b].config[d] && $.extend(!0, c, gj[b].config[d]),
            (e = a.hasOwnProperty("iconsLibrary") ? a.iconsLibrary : c.iconsLibrary),
            gj[b].config[e] && $.extend(!0, c, gj[b].config[e]);
        for (f in gj[b].plugins)
            gj[b].plugins.hasOwnProperty(f) &&
                ($.extend(!0, c, gj[b].plugins[f].config.base), gj[b].plugins[f].config[d] && $.extend(!0, c, gj[b].plugins[f].config[d]), gj[b].plugins[f].config[e] && $.extend(!0, c, gj[b].plugins[f].config[e]));
        return $.extend(!0, c, a), c.guid || (c.guid = this.generateGUID()), c;
    }),
    (gj.widget.prototype.getHTMLConfig = function () {
        var a = this.data(),
            b = this[0].attributes;
        return b.width && (a.width = b.width.value), b.height && (a.height = b.height.value), b.value && (a.value = b.value.value), b.align && (a.align = b.align.value), a && a.source && ((a.dataSource = a.source), delete a.source), a;
    }),
    (gj.widget.prototype.createDoneHandler = function () {
        var a = this;
        return function (b) {
            "string" == typeof b && JSON && (b = JSON.parse(b)), gj[a.data("type")].methods.render(a, b);
        };
    }),
    (gj.widget.prototype.createErrorHandler = function () {
        return function (a) {
            a && a.statusText && "abort" !== a.statusText && alert(a.statusText);
        };
    }),
    (gj.widget.prototype.reload = function (a) {
        var b,
            c,
            d = this.data(),
            e = this.data("type");
        return (
            void 0 === d.dataSource && gj[e].methods.useHtmlDataSource(this, d),
            $.extend(d.params, a),
            $.isArray(d.dataSource)
                ? ((c = gj[e].methods.filter(this)), gj[e].methods.render(this, c))
                : "string" == typeof d.dataSource
                ? ((b = { url: d.dataSource, data: d.params }), this.xhr && this.xhr.abort(), (this.xhr = $.ajax(b).done(this.createDoneHandler()).fail(this.createErrorHandler())))
                : "object" == typeof d.dataSource &&
                  (d.dataSource.data || (d.dataSource.data = {}),
                  $.extend(d.dataSource.data, d.params),
                  (b = $.extend(!0, {}, d.dataSource)),
                  "json" === b.dataType && "object" == typeof b.data && (b.data = JSON.stringify(b.data)),
                  b.success || (b.success = this.createDoneHandler()),
                  b.error || (b.error = this.createErrorHandler()),
                  this.xhr && this.xhr.abort(),
                  (this.xhr = $.ajax(b))),
            this
        );
    }),
    (gj.documentManager = {
        events: {},
        subscribeForEvent: function (a, b, c) {
            if (gj.documentManager.events[a] && 0 !== gj.documentManager.events[a].length) {
                if (gj.documentManager.events[a][b]) throw "Event " + a + ' for widget with guid="' + b + '" is already attached.';
                gj.documentManager.events[a].push({ widgetId: b, callback: c });
            } else (gj.documentManager.events[a] = [{ widgetId: b, callback: c }]), $(document).on(a, gj.documentManager.executeCallbacks);
        },
        executeCallbacks: function (a) {
            var b = gj.documentManager.events[a.type];
            if (b) for (var c = 0; c < b.length; c++) b[c].callback(a);
        },
        unsubscribeForEvent: function (a, b) {
            var c = !1,
                d = gj.documentManager.events[a];
            if (d) for (var e = 0; e < d.length; e++) d[e].widgetId === b && (d.splice(e, 1), (c = !0), 0 === d.length && ($(document).off(a), delete gj.documentManager.events[a]));
            if (!c) throw 'The "' + a + '" for widget with guid="' + b + "\" can't be removed.";
        },
    }),
    (gj.core = {
        messages: {
            "en-us": {
                monthNames: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                monthShortNames: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                weekDaysMin: ["S", "M", "T", "W", "T", "F", "S"],
                weekDaysShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
                weekDays: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                am: "AM",
                pm: "PM",
                ok: "Ok",
                cancel: "Cancel",
                titleFormat: "mmmm yyyy",
            },
        },
        parseDate: function (a, b, c) {
            var d,
                e,
                f,
                g,
                h = 0,
                i = 0,
                j = 1,
                k = 0,
                l = 0;
            if (a && "string" == typeof a) {
                if (/^\d+$/.test(a)) g = new Date(a);
                else if (a.indexOf("/Date(") > -1) g = new Date(parseInt(a.substr(6), 10));
                else if (a) {
                    for (f = b.split(/[\s,-\.\/\/\:]+/), e = a.split(/[\s]+/), e.length != f.length && (e = a.split(/[\s,-\.\/\/\:]+/)), d = 0; d < f.length; d++)
                        ["d", "dd"].indexOf(f[d]) > -1
                            ? (j = parseInt(e[d], 10))
                            : ["m", "mm"].indexOf(f[d]) > -1
                            ? (i = parseInt(e[d], 10) - 1)
                            : "mmm" === f[d]
                            ? (i = gj.core.messages[c || "en-us"].monthShortNames.indexOf(e[d]))
                            : "mmmm" === f[d]
                            ? (i = gj.core.messages[c || "en-us"].monthNames.indexOf(e[d]))
                            : ["yy", "yyyy"].indexOf(f[d]) > -1
                            ? ((h = parseInt(e[d], 10)), "yy" === f[d] && (h += 2e3))
                            : ["h", "hh", "H", "HH"].indexOf(f[d]) > -1
                            ? (k = parseInt(e[d], 10))
                            : ["M", "MM"].indexOf(f[d]) > -1 && (l = parseInt(e[d], 10));
                    g = new Date(h, i, j, k, l);
                }
            } else "number" == typeof a ? (g = new Date(a)) : a instanceof Date && (g = a);
            return g;
        },
        formatDate: function (a, b, c) {
            var d,
                e,
                f = "",
                g = b.split(/[\s,-\.\/\/\:]+/),
                h = b.split(/s+|M+|H+|h+|t+|T+|d+|m+|y+/);
            for (h = h.splice(1, h.length - 2), i = 0; i < g.length; i++)
                switch (((d = h[i] || ""), g[i])) {
                    case "s":
                        f += a.getSeconds() + d;
                        break;
                    case "ss":
                        f += gj.core.pad(a.getSeconds()) + d;
                        break;
                    case "M":
                        f += a.getMinutes() + d;
                        break;
                    case "MM":
                        f += gj.core.pad(a.getMinutes()) + d;
                        break;
                    case "H":
                        f += a.getHours() + d;
                        break;
                    case "HH":
                        f += gj.core.pad(a.getHours()) + d;
                        break;
                    case "h":
                        (e = a.getHours() > 12 ? a.getHours() % 12 : a.getHours()), (f += e + d);
                        break;
                    case "hh":
                        (e = a.getHours() > 12 ? a.getHours() % 12 : a.getHours()), (f += gj.core.pad(e) + d);
                        break;
                    case "tt":
                        f += (a.getHours() >= 12 ? "pm" : "am") + d;
                        break;
                    case "TT":
                        f += (a.getHours() >= 12 ? "PM" : "AM") + d;
                        break;
                    case "d":
                        f += a.getDate() + d;
                        break;
                    case "dd":
                        f += gj.core.pad(a.getDate()) + d;
                        break;
                    case "ddd":
                        f += gj.core.messages[c || "en-us"].weekDaysShort[a.getDay()] + d;
                        break;
                    case "dddd":
                        f += gj.core.messages[c || "en-us"].weekDays[a.getDay()] + d;
                        break;
                    case "m":
                        f += a.getMonth() + 1 + d;
                        break;
                    case "mm":
                        f += gj.core.pad(a.getMonth() + 1) + d;
                        break;
                    case "mmm":
                        f += gj.core.messages[c || "en-us"].monthShortNames[a.getMonth()] + d;
                        break;
                    case "mmmm":
                        f += gj.core.messages[c || "en-us"].monthNames[a.getMonth()] + d;
                        break;
                    case "yy":
                        f += a.getFullYear().toString().substr(2) + d;
                        break;
                    case "yyyy":
                        f += a.getFullYear() + d;
                }
            return f;
        },
        pad: function (a, b) {
            for (a = String(a), b = b || 2; a.length < b; ) a = "0" + a;
            return a;
        },
        center: function (a) {
            var b = $(window).width() / 2 - a.width() / 2,
                c = $(window).height() / 2 - a.height() / 2;
            a.css("position", "absolute"), a.css("left", b > 0 ? b : 0), a.css("top", c > 0 ? c : 0);
        },
        isIE: function () {
            return !!navigator.userAgent.match(/Trident/g) || !!navigator.userAgent.match(/MSIE/g);
        },
        setChildPosition: function (a, b) {
            var c = a.getBoundingClientRect(),
                d = gj.core.height(a, !0),
                e = gj.core.height(b, !0),
                f = gj.core.width(a, !0),
                g = gj.core.width(b, !0),
                h = window.scrollY || window.pageYOffset || 0,
                i = window.scrollX || window.pageXOffset || 0;
            c.top + d + e > window.innerHeight && c.top > e ? (b.style.top = Math.round(c.top + h - e - 3) + "px") : (b.style.top = Math.round(c.top + h + d + 3) + "px"),
                c.left + g > document.body.clientWidth ? (b.style.left = Math.round(c.left + i + f - g) + "px") : (b.style.left = Math.round(c.left + i) + "px");
        },
        height: function (a, b) {
            var c,
                d = window.getComputedStyle(a);
            return (
                "border-box" === d.boxSizing
                    ? ((c = parseInt(d.height, 10)), gj.core.isIE() && ((c += parseInt(d.paddingTop || 0, 10) + parseInt(d.paddingBottom || 0, 10)), (c += parseInt(d.borderTopWidth || 0, 10) + parseInt(d.borderBottomWidth || 0, 10))))
                    : ((c = parseInt(d.height, 10)), (c += parseInt(d.paddingTop || 0, 10) + parseInt(d.paddingBottom || 0, 10)), (c += parseInt(d.borderTopWidth || 0, 10) + parseInt(d.borderBottomWidth || 0, 10))),
                b && (c += parseInt(d.marginTop || 0, 10) + parseInt(d.marginBottom || 0, 10)),
                c
            );
        },
        width: function (a, b) {
            var c,
                d = window.getComputedStyle(a);
            return (
                "border-box" === d.boxSizing
                    ? (c = parseInt(d.width, 10))
                    : ((c = parseInt(d.width, 10)), (c += parseInt(d.paddingLeft || 0, 10) + parseInt(d.paddingRight || 0, 10)), (c += parseInt(d.borderLeftWidth || 0, 10) + parseInt(d.borderRightWidth || 0, 10))),
                b && (c += parseInt(d.marginLeft || 0, 10) + parseInt(d.marginRight || 0, 10)),
                c
            );
        },
        addClasses: function (a, b) {
            var c, d;
            if (b) for (d = b.split(" "), c = 0; c < d.length; c++) a.classList.add(d[c]);
        },
        position: function (a) {
            for (var b, c, d = 0, e = 0, f = gj.core.height(a), g = gj.core.width(a); a; )
                "BODY" == a.tagName
                    ? ((b = a.scrollLeft || document.documentElement.scrollLeft), (c = a.scrollTop || document.documentElement.scrollTop), (d += a.offsetLeft - b), (e += a.offsetTop - c))
                    : ((d += a.offsetLeft - a.scrollLeft), (e += a.offsetTop - a.scrollTop)),
                    (a = a.offsetParent);
            return { top: e, left: d, bottom: e + f, right: d + g };
        },
        setCaretAtEnd: function (a) {
            var b;
            if (a)
                if (((b = a.value.length), document.selection)) {
                    a.focus();
                    var c = document.selection.createRange();
                    c.moveStart("character", -b), c.moveStart("character", b), c.moveEnd("character", 0), c.select();
                } else (a.selectionStart || "0" == a.selectionStart) && ((a.selectionStart = b), (a.selectionEnd = b), a.focus());
        },
        getScrollParent: function (a) {
            return null == a ? null : a.scrollHeight > a.clientHeight ? a : gj.core.getScrollParent(a.parentNode);
        },
    }),
    (gj.picker = { messages: { "en-us": {} } }),
    (gj.picker.methods = {
        initialize: function (a, b, c) {
            var d,
                e = c.createPicker(a, b),
                f = a.parent('div[role="wrapper"]');
            (d =
                "bootstrap" === b.uiLibrary
                    ? $('<span class="input-group-addon">' + b.icons.rightIcon + "</span>")
                    : "bootstrap4" === b.uiLibrary
                    ? $('<span class="input-group-append"><button class="btn btn-outline-secondary border-left-0" type="button">' + b.icons.rightIcon + "</button></span>")
                    : $(b.icons.rightIcon)),
                d.attr("role", "right-icon"),
                0 === f.length ? ((f = $('<div role="wrapper" />').addClass(b.style.wrapper)), a.wrap(f)) : f.addClass(b.style.wrapper),
                (f = a.parent('div[role="wrapper"]')),
                b.width && f.css("width", b.width),
                a.val(b.value).addClass(b.style.input).attr("role", "input"),
                b.fontSize && a.css("font-size", b.fontSize),
                "bootstrap" === b.uiLibrary || "bootstrap4" === b.uiLibrary
                    ? "small" === b.size
                        ? (f.addClass("input-group-sm"), a.addClass("form-control-sm"))
                        : "large" === b.size && (f.addClass("input-group-lg"), a.addClass("form-control-lg"))
                    : "small" === b.size
                    ? f.addClass("small")
                    : "large" === b.size && f.addClass("large"),
                d.on("click", function (b) {
                    e.is(":visible") ? a.close() : a.open();
                }),
                f.append(d),
                !0 !== b.footer &&
                    (a.on("blur", function () {
                        a.timeout = setTimeout(function () {
                            a.close();
                        }, 500);
                    }),
                    e.mousedown(function () {
                        return clearTimeout(a.timeout), a.focus(), !1;
                    }),
                    e.on("click", function () {
                        clearTimeout(a.timeout), a.focus();
                    }));
        },
    }),
    (gj.picker.widget = function (a, b) {
        var c = this,
            d = gj.picker.methods;
        return (
            (c.destroy = function () {
                return d.destroy(this);
            }),
            a
        );
    }),
    (gj.picker.widget.prototype = new gj.widget()),
    (gj.picker.widget.constructor = gj.picker.widget),
    (gj.picker.widget.prototype.init = function (a, b, c) {
        return gj.widget.prototype.init.call(this, a, b), this.attr("data-" + b, "true"), gj.picker.methods.initialize(this, this.data(), gj[b].methods), this;
    }),
    (gj.picker.widget.prototype.open = function (a) {
        var b = this.data(),
            c = $("body").find('[role="picker"][guid="' + this.attr("data-guid") + '"]');
        return c.show(), c.closest('div[role="modal"]').show(), b.modal ? gj.core.center(c) : (gj.core.setChildPosition(this[0], c[0]), this.focus()), clearTimeout(this.timeout), gj[a].events.open(this), this;
    }),
    (gj.picker.widget.prototype.close = function (a) {
        var b = $("body").find('[role="picker"][guid="' + this.attr("data-guid") + '"]');
        return b.hide(), b.closest('div[role="modal"]').hide(), gj[a].events.close(this), this;
    }),
    (gj.picker.widget.prototype.destroy = function (a) {
        var b = this.data(),
            c = this.parent(),
            d = $("body").find('[role="picker"][guid="' + this.attr("data-guid") + '"]');
        return (
            b &&
                (this.off(),
                d.parent('[role="modal"]').length > 0 && d.unwrap(),
                d.remove(),
                this.removeData(),
                this.removeAttr("data-type")
                    .removeAttr("data-guid")
                    .removeAttr("data-" + a),
                this.removeClass(),
                c.children('[role="right-icon"]').remove(),
                this.unwrap()),
            this
        );
    }),
    (gj.dialog = { plugins: {}, messages: {} }),
    (gj.dialog.config = {
        base: {
            autoOpen: !0,
            closeButtonInHeader: !0,
            closeOnEscape: !0,
            draggable: !0,
            height: "auto",
            locale: "en-us",
            maxHeight: void 0,
            maxWidth: void 0,
            minHeight: void 0,
            minWidth: void 0,
            modal: !1,
            resizable: !1,
            scrollable: !1,
            title: void 0,
            uiLibrary: void 0,
            width: 300,
            style: {
                modal: "gj-modal",
                content: "gj-dialog-md",
                header: "gj-dialog-md-header gj-unselectable",
                headerTitle: "gj-dialog-md-title",
                headerCloseButton: "gj-dialog-md-close",
                body: "gj-dialog-md-body",
                footer: "gj-dialog-footer gj-dialog-md-footer",
            },
        },
        bootstrap: { style: { modal: "modal", content: "modal-content gj-dialog-bootstrap", header: "modal-header", headerTitle: "modal-title", headerCloseButton: "close", body: "modal-body", footer: "gj-dialog-footer modal-footer" } },
        bootstrap4: { style: { modal: "modal", content: "modal-content gj-dialog-bootstrap4", header: "modal-header", headerTitle: "modal-title", headerCloseButton: "close", body: "modal-body", footer: "gj-dialog-footer modal-footer" } },
    }),
    (gj.dialog.events = {
        initialized: function (a) {
            a.trigger("initialized");
        },
        opening: function (a) {
            a.trigger("opening");
        },
        opened: function (a) {
            a.trigger("opened");
        },
        closing: function (a) {
            a.trigger("closing");
        },
        closed: function (a) {
            a.trigger("closed");
        },
        drag: function (a) {
            a.trigger("drag");
        },
        dragStart: function (a) {
            a.trigger("dragStart");
        },
        dragStop: function (a) {
            a.trigger("dragStop");
        },
        resize: function (a) {
            a.trigger("resize");
        },
        resizeStart: function (a) {
            a.trigger("resizeStart");
        },
        resizeStop: function (a) {
            a.trigger("resizeStop");
        },
    }),
    (gj.dialog.methods = {
        init: function (a) {
            return gj.widget.prototype.init.call(this, a, "dialog"), gj.dialog.methods.localization(this), gj.dialog.methods.initialize(this), gj.dialog.events.initialized(this), this;
        },
        localization: function (a) {
            var b = a.data();
            void 0 === b.title && (b.title = gj.dialog.messages[b.locale].DefaultTitle);
        },
        getHTMLConfig: function () {
            var a = gj.widget.prototype.getHTMLConfig.call(this),
                b = this[0].attributes;
            return b.title && (a.title = b.title.value), a;
        },
        initialize: function (a) {
            var b,
                c,
                d,
                e = a.data();
            a.addClass(e.style.content),
                gj.dialog.methods.setSize(a),
                e.closeOnEscape &&
                    $(document).keyup(function (b) {
                        27 === b.keyCode && a.close();
                    }),
                (c = a.children('div[data-role="body"]')),
                0 === c.length ? ((c = $('<div data-role="body"/>').addClass(e.style.body)), a.wrapInner(c)) : c.addClass(e.style.body),
                (b = gj.dialog.methods.renderHeader(a)),
                (d = a.children('div[data-role="footer"]').addClass(e.style.footer)),
                a.find('[data-role="close"]').on("click", function () {
                    a.close();
                }),
                gj.draggable && (e.draggable && gj.dialog.methods.draggable(a, b), e.resizable && gj.dialog.methods.resizable(a)),
                e.scrollable &&
                    e.height &&
                    (a.addClass("gj-dialog-scrollable"),
                    a.on("opened", function () {
                        a.children('div[data-role="body"]').css("height", e.height - b.outerHeight() - (d.length ? d.outerHeight() : 0));
                    })),
                gj.core.center(a),
                e.modal && a.wrapAll('<div data-role="modal" class="' + e.style.modal + '"/>'),
                e.autoOpen && a.open();
        },
        setSize: function (a) {
            var b = a.data();
            b.width && a.css("width", b.width), b.height && a.css("height", b.height);
        },
        renderHeader: function (a) {
            var b,
                c,
                d,
                e = a.data();
            return (
                (b = a.children('div[data-role="header"]')),
                0 === b.length && ((b = $('<div data-role="header" />')), a.prepend(b)),
                b.addClass(e.style.header),
                (c = b.find('[data-role="title"]')),
                0 === c.length && ((c = $('<h4 data-role="title">' + e.title + "</h4>")), b.append(c)),
                c.addClass(e.style.headerTitle),
                (d = b.find('[data-role="close"]')),
                0 === d.length && e.closeButtonInHeader
                    ? ((d = $('<button type="button" data-role="close" title="' + gj.dialog.messages[e.locale].Close + '"><span>×</span></button>')), d.addClass(e.style.headerCloseButton), b.append(d))
                    : d.length > 0 && !1 === e.closeButtonInHeader
                    ? d.hide()
                    : d.addClass(e.style.headerCloseButton),
                b
            );
        },
        draggable: function (a, b) {
            a.appendTo("body"),
                b.addClass("gj-draggable"),
                a.draggable({
                    handle: b,
                    start: function () {
                        a.addClass("gj-unselectable"), gj.dialog.events.dragStart(a);
                    },
                    stop: function () {
                        a.removeClass("gj-unselectable"), gj.dialog.events.dragStop(a);
                    },
                });
        },
        resizable: function (a) {
            var b = {
                drag: gj.dialog.methods.resize,
                start: function () {
                    a.addClass("gj-unselectable"), gj.dialog.events.resizeStart(a);
                },
                stop: function () {
                    this.removeAttribute("style"), a.removeClass("gj-unselectable"), gj.dialog.events.resizeStop(a);
                },
            };
            a.append($('<div class="gj-resizable-handle gj-resizable-n"></div>').draggable($.extend(!0, { horizontal: !1 }, b))),
                a.append($('<div class="gj-resizable-handle gj-resizable-e"></div>').draggable($.extend(!0, { vertical: !1 }, b))),
                a.append($('<div class="gj-resizable-handle gj-resizable-s"></div>').draggable($.extend(!0, { horizontal: !1 }, b))),
                a.append($('<div class="gj-resizable-handle gj-resizable-w"></div>').draggable($.extend(!0, { vertical: !1 }, b))),
                a.append($('<div class="gj-resizable-handle gj-resizable-ne"></div>').draggable($.extend(!0, {}, b))),
                a.append($('<div class="gj-resizable-handle gj-resizable-nw"></div>').draggable($.extend(!0, {}, b))),
                a.append($('<div class="gj-resizable-handle gj-resizable-sw"></div>').draggable($.extend(!0, {}, b))),
                a.append($('<div class="gj-resizable-handle gj-resizable-se"></div>').draggable($.extend(!0, {}, b)));
        },
        resize: function (a, b) {
            var c,
                d,
                e,
                f,
                g,
                h,
                i,
                j,
                k = !1;
            return (
                (c = $(this)),
                (d = c.parent()),
                (e = gj.core.position(this)),
                (offset = { top: b.top - e.top, left: b.left - e.left }),
                (f = d.data()),
                c.hasClass("gj-resizable-n")
                    ? ((g = d.height() - offset.top), (i = d.offset().top + offset.top))
                    : c.hasClass("gj-resizable-e")
                    ? (h = d.width() + offset.left)
                    : c.hasClass("gj-resizable-s")
                    ? (g = d.height() + offset.top)
                    : c.hasClass("gj-resizable-w")
                    ? ((h = d.width() - offset.left), (j = d.offset().left + offset.left))
                    : c.hasClass("gj-resizable-ne")
                    ? ((g = d.height() - offset.top), (i = d.offset().top + offset.top), (h = d.width() + offset.left))
                    : c.hasClass("gj-resizable-nw")
                    ? ((g = d.height() - offset.top), (i = d.offset().top + offset.top), (h = d.width() - offset.left), (j = d.offset().left + offset.left))
                    : c.hasClass("gj-resizable-se")
                    ? ((g = d.height() + offset.top), (h = d.width() + offset.left))
                    : c.hasClass("gj-resizable-sw") && ((g = d.height() + offset.top), (h = d.width() - offset.left), (j = d.offset().left + offset.left)),
                g && (!f.minHeight || g >= f.minHeight) && (!f.maxHeight || g <= f.maxHeight) && (d.height(g), i && d.css("top", i), (k = !0)),
                h && (!f.minWidth || h >= f.minWidth) && (!f.maxWidth || h <= f.maxWidth) && (d.width(h), j && d.css("left", j), (k = !0)),
                k && gj.dialog.events.resize(d),
                k
            );
        },
        open: function (a, b) {
            var c;
            return (
                gj.dialog.events.opening(a),
                a.css("display", "block"),
                a.closest('div[data-role="modal"]').css("display", "block"),
                (c = a.children('div[data-role="footer"]')),
                c.length && c.outerHeight() && a.children('div[data-role="body"]').css("margin-bottom", c.outerHeight()),
                void 0 !== b && a.find('[data-role="title"]').html(b),
                gj.dialog.events.opened(a),
                a
            );
        },
        close: function (a) {
            return a.is(":visible") && (gj.dialog.events.closing(a), a.css("display", "none"), a.closest('div[data-role="modal"]').css("display", "none"), gj.dialog.events.closed(a)), a;
        },
        isOpen: function (a) {
            return a.is(":visible");
        },
        content: function (a, b) {
            var c = a.children('div[data-role="body"]');
            return void 0 === b ? c.html() : c.html(b);
        },
        destroy: function (a, b) {
            var c = a.data();
            return (
                c &&
                    (!1 === b
                        ? a.remove()
                        : (a.close(),
                          a.off(),
                          a.removeData(),
                          a.removeAttr("data-type"),
                          a.removeClass(c.style.content),
                          a.find('[data-role="header"]').removeClass(c.style.header),
                          a.find('[data-role="title"]').removeClass(c.style.headerTitle),
                          a.find('[data-role="close"]').remove(),
                          a.find('[data-role="body"]').removeClass(c.style.body),
                          a.find('[data-role="footer"]').removeClass(c.style.footer))),
                a
            );
        },
    }),
    (gj.dialog.widget = function (a, b) {
        var c = this,
            d = gj.dialog.methods;
        return (
            (c.open = function (a) {
                return d.open(this, a);
            }),
            (c.close = function () {
                return d.close(this);
            }),
            (c.isOpen = function () {
                return d.isOpen(this);
            }),
            (c.content = function (a) {
                return d.content(this, a);
            }),
            (c.destroy = function (a) {
                return d.destroy(this, a);
            }),
            $.extend(a, c),
            "dialog" !== a.attr("data-type") && d.init.call(a, b),
            a
        );
    }),
    (gj.dialog.widget.prototype = new gj.widget()),
    (gj.dialog.widget.constructor = gj.dialog.widget),
    (gj.dialog.widget.prototype.getHTMLConfig = gj.dialog.methods.getHTMLConfig),
    (function (a) {
        a.fn.dialog = function (a) {
            var b;
            if (this && this.length) {
                if ("object" != typeof a && a) {
                    if (((b = new gj.dialog.widget(this, null)), b[a])) return b[a].apply(this, Array.prototype.slice.call(arguments, 1));
                    throw "Method " + a + " does not exist.";
                }
                return new gj.dialog.widget(this, a);
            }
        };
    })(jQuery),
    (gj.dialog.messages["en-us"] = { Close: "Close", DefaultTitle: "Dialog" }),
    (gj.draggable = { plugins: {} }),
    (gj.draggable.config = { base: { handle: void 0, vertical: !0, horizontal: !0, containment: void 0 } }),
    (gj.draggable.methods = {
        init: function (a) {
            var b,
                c,
                d = this;
            return (
                gj.widget.prototype.init.call(this, a, "draggable"),
                (c = this.data()),
                d.attr("data-draggable", "true"),
                (b = gj.draggable.methods.getHandleElement(d)),
                b.on("touchstart mousedown", function (a) {
                    var e = gj.core.position(d[0]);
                    (d[0].style.top = e.top + "px"),
                        (d[0].style.left = e.left + "px"),
                        (d[0].style.position = "fixed"),
                        d.attr("draggable-dragging", !0),
                        d.removeAttr("draggable-x").removeAttr("draggable-y"),
                        gj.documentManager.subscribeForEvent("touchmove", d.data("guid"), gj.draggable.methods.createMoveHandler(d, b, c)),
                        gj.documentManager.subscribeForEvent("mousemove", d.data("guid"), gj.draggable.methods.createMoveHandler(d, b, c));
                }),
                gj.documentManager.subscribeForEvent("mouseup", d.data("guid"), gj.draggable.methods.createUpHandler(d)),
                gj.documentManager.subscribeForEvent("touchend", d.data("guid"), gj.draggable.methods.createUpHandler(d)),
                gj.documentManager.subscribeForEvent("touchcancel", d.data("guid"), gj.draggable.methods.createUpHandler(d)),
                d
            );
        },
        getHandleElement: function (a) {
            var b = a.data("handle");
            return b && b.length ? b : a;
        },
        createUpHandler: function (a) {
            return function (b) {
                "true" === a.attr("draggable-dragging") &&
                    (a.attr("draggable-dragging", !1),
                    gj.documentManager.unsubscribeForEvent("mousemove", a.data("guid")),
                    gj.documentManager.unsubscribeForEvent("touchmove", a.data("guid")),
                    gj.draggable.events.stop(a, { x: a.mouseX(b), y: a.mouseY(b) }));
            };
        },
        createMoveHandler: function (a, b, c) {
            return function (b) {
                var d, e, f, g, h, i;
                "true" === a.attr("draggable-dragging") &&
                    ((d = Math.round(a.mouseX(b))),
                    (e = Math.round(a.mouseY(b))),
                    (h = a.attr("draggable-x")),
                    (i = a.attr("draggable-y")),
                    h && i ? ((f = c.horizontal ? d - parseInt(h, 10) : 0), (g = c.vertical ? e - parseInt(i, 10) : 0), gj.draggable.methods.move(a[0], c, f, g, d, e)) : gj.draggable.events.start(a, d, e),
                    a.attr("draggable-x", d),
                    a.attr("draggable-y", e));
            };
        },
        move: function (a, b, c, d, e, f) {
            var g,
                h,
                i,
                j = gj.core.position(a),
                k = j.top + d,
                l = j.left + c;
            b.containment &&
                ((g = gj.core.position(b.containment)),
                (h = g.top + gj.core.height(b.containment) - gj.core.height(a)),
                (i = g.left + gj.core.width(b.containment) - gj.core.width(a)),
                k > g.top && k < h ? (g.top >= f || g.bottom <= f) && (k = j.top) : (k = k <= g.top ? g.top + 1 : h - 1),
                l > g.left && l < i ? (g.left >= e || g.right <= e) && (l = j.left) : (l = l <= g.left ? g.left + 1 : i - 1)),
                !1 !== gj.draggable.events.drag($(a), l, k, e, f) && ((a.style.top = k + "px"), (a.style.left = l + "px"));
        },
        destroy: function (a) {
            return (
                "true" === a.attr("data-draggable") &&
                    (gj.documentManager.unsubscribeForEvent("mouseup", a.data("guid")),
                    a.removeData(),
                    a.removeAttr("data-guid").removeAttr("data-type").removeAttr("data-draggable"),
                    a.removeAttr("draggable-x").removeAttr("draggable-y").removeAttr("draggable-dragging"),
                    (a[0].style.top = ""),
                    (a[0].style.left = ""),
                    (a[0].style.position = ""),
                    a.off("drag").off("start").off("stop"),
                    gj.draggable.methods.getHandleElement(a).off("mousedown")),
                a
            );
        },
    }),
    (gj.draggable.events = {
        drag: function (a, b, c, d, e) {
            return a.triggerHandler("drag", [
                { left: b, top: c },
                { x: d, y: e },
            ]);
        },
        start: function (a, b, c) {
            a.triggerHandler("start", [{ x: b, y: c }]);
        },
        stop: function (a, b) {
            a.triggerHandler("stop", [b]);
        },
    }),
    (gj.draggable.widget = function (a, b) {
        var c = this,
            d = gj.draggable.methods;
        return (
            a.destroy ||
                (c.destroy = function () {
                    return d.destroy(this);
                }),
            $.extend(a, c),
            "true" !== a.attr("data-draggable") && d.init.call(a, b),
            a
        );
    }),
    (gj.draggable.widget.prototype = new gj.widget()),
    (gj.draggable.widget.constructor = gj.draggable.widget),
    (function (a) {
        a.fn.draggable = function (a) {
            var b;
            if (this && this.length) {
                if ("object" != typeof a && a) {
                    if (((b = new gj.draggable.widget(this, null)), b[a])) return b[a].apply(this, Array.prototype.slice.call(arguments, 1));
                    throw "Method " + a + " does not exist.";
                }
                return new gj.draggable.widget(this, a);
            }
        };
    })(jQuery),
    (gj.droppable = { plugins: {} }),
    (gj.droppable.config = { hoverClass: void 0 }),
    (gj.droppable.methods = {
        init: function (a) {
            var b = this;
            return (
                gj.widget.prototype.init.call(this, a, "droppable"),
                b.attr("data-droppable", "true"),
                gj.documentManager.subscribeForEvent("mousedown", b.data("guid"), gj.droppable.methods.createMouseDownHandler(b)),
                gj.documentManager.subscribeForEvent("mousemove", b.data("guid"), gj.droppable.methods.createMouseMoveHandler(b)),
                gj.documentManager.subscribeForEvent("mouseup", b.data("guid"), gj.droppable.methods.createMouseUpHandler(b)),
                b
            );
        },
        createMouseDownHandler: function (a) {
            return function (b) {
                a.isDragging = !0;
            };
        },
        createMouseMoveHandler: function (a) {
            return function (b) {
                if (a.isDragging) {
                    var c = a.data("hoverClass"),
                        d = { x: a.mouseX(b), y: a.mouseY(b) },
                        e = gj.droppable.methods.isOver(a, d);
                    e != a.isOver && (e ? (c && a.addClass(c), gj.droppable.events.over(a, d)) : (c && a.removeClass(c), gj.droppable.events.out(a))), (a.isOver = e);
                }
            };
        },
        createMouseUpHandler: function (a) {
            return function (b) {
                var c = { left: a.mouseX(b), top: a.mouseY(b) };
                (a.isDragging = !1), gj.droppable.methods.isOver(a, c) && gj.droppable.events.drop(a);
            };
        },
        isOver: function (a, b) {
            var c = a.offset().top,
                d = a.offset().left;
            return b.x > d && b.x < d + a.outerWidth(!0) && b.y > c && b.y < c + a.outerHeight(!0);
        },
        destroy: function (a) {
            return (
                "true" === a.attr("data-droppable") &&
                    (gj.documentManager.unsubscribeForEvent("mousedown", a.data("guid")),
                    gj.documentManager.unsubscribeForEvent("mousemove", a.data("guid")),
                    gj.documentManager.unsubscribeForEvent("mouseup", a.data("guid")),
                    a.removeData(),
                    a.removeAttr("data-guid"),
                    a.removeAttr("data-droppable"),
                    a.off("drop").off("over").off("out")),
                a
            );
        },
    }),
    (gj.droppable.events = {
        drop: function (a, b, c) {
            a.trigger("drop", [{ top: c, left: b }]);
        },
        over: function (a, b) {
            a.trigger("over", [b]);
        },
        out: function (a) {
            a.trigger("out");
        },
    }),
    (gj.droppable.widget = function (a, b) {
        var c = this,
            d = gj.droppable.methods;
        return (
            (c.isOver = !1),
            (c.isDragging = !1),
            (c.destroy = function () {
                return d.destroy(this);
            }),
            (c.isOver = function (a) {
                return d.isOver(this, a);
            }),
            $.extend(a, c),
            "true" !== a.attr("data-droppable") && d.init.call(a, b),
            a
        );
    }),
    (gj.droppable.widget.prototype = new gj.widget()),
    (gj.droppable.widget.constructor = gj.droppable.widget),
    (function (a) {
        a.fn.droppable = function (a) {
            var b;
            if (this && this.length) {
                if ("object" != typeof a && a) {
                    if (((b = new gj.droppable.widget(this, null)), b[a])) return b[a].apply(this, Array.prototype.slice.call(arguments, 1));
                    throw "Method " + a + " does not exist.";
                }
                return new gj.droppable.widget(this, a);
            }
        };
    })(jQuery),
    (gj.grid = { plugins: {}, messages: {} }),
    (gj.grid.config = {
        base: {
            dataSource: void 0,
            columns: [],
            autoGenerateColumns: !1,
            defaultColumnSettings: {
                hidden: !1,
                width: void 0,
                sortable: !1,
                type: "text",
                title: void 0,
                field: void 0,
                align: void 0,
                cssClass: void 0,
                headerCssClass: void 0,
                tooltip: void 0,
                icon: void 0,
                events: void 0,
                format: "mm/dd/yyyy",
                decimalDigits: void 0,
                tmpl: void 0,
                stopPropagation: !1,
                renderer: void 0,
                filter: void 0,
            },
            mapping: { dataField: "records", totalRecordsField: "total" },
            params: {},
            paramNames: { sortBy: "sortBy", direction: "direction" },
            uiLibrary: "materialdesign",
            iconsLibrary: "materialicons",
            selectionType: "single",
            selectionMethod: "basic",
            autoLoad: !0,
            notFoundText: void 0,
            width: void 0,
            minWidth: void 0,
            headerRowHeight: "fixed",
            bodyRowHeight: "autogrow",
            fontSize: void 0,
            primaryKey: void 0,
            locale: "en-us",
            defaultIconColumnWidth: 70,
            defaultCheckBoxColumnWidth: 70,
            style: {
                wrapper: "gj-grid-wrapper",
                table: "gj-grid gj-grid-md",
                loadingCover: "gj-grid-loading-cover",
                loadingText: "gj-grid-loading-text",
                header: { cell: void 0, sortable: "gj-cursor-pointer gj-unselectable" },
                content: { rowSelected: "gj-grid-md-select" },
            },
            icons: { asc: "▲", desc: "▼" },
        },
        bootstrap: {
            style: { wrapper: "gj-grid-wrapper", table: "gj-grid gj-grid-bootstrap gj-grid-bootstrap-3 table table-bordered table-hover", content: { rowSelected: "active" } },
            iconsLibrary: "glyphicons",
            defaultIconColumnWidth: 34,
            defaultCheckBoxColumnWidth: 36,
        },
        bootstrap4: {
            style: { wrapper: "gj-grid-wrapper", table: "gj-grid gj-grid-bootstrap gj-grid-bootstrap-4 table table-bordered table-hover", content: { rowSelected: "active" } },
            defaultIconColumnWidth: 42,
            defaultCheckBoxColumnWidth: 44,
        },
        materialicons: { icons: { asc: '<i class="gj-icon arrow-upward" />', desc: '<i class="gj-icon arrow-downward" />' } },
        fontawesome: { icons: { asc: '<i class="fa fa-sort-amount-asc" aria-hidden="true"></i>', desc: '<i class="fa fa-sort-amount-desc" aria-hidden="true"></i>' } },
        glyphicons: { icons: { asc: '<span class="glyphicon glyphicon-sort-by-alphabet" />', desc: '<span class="glyphicon glyphicon-sort-by-alphabet-alt" />' } },
    }),
    (gj.grid.events = {
        beforeEmptyRowInsert: function (a, b) {
            return a.triggerHandler("beforeEmptyRowInsert", [b]);
        },
        dataBinding: function (a, b) {
            return a.triggerHandler("dataBinding", [b]);
        },
        dataBound: function (a, b, c) {
            return a.triggerHandler("dataBound", [b, c]);
        },
        rowDataBound: function (a, b, c, d) {
            return a.triggerHandler("rowDataBound", [b, c, d]);
        },
        cellDataBound: function (a, b, c, d, e) {
            return a.triggerHandler("cellDataBound", [b, c, d, e]);
        },
        rowSelect: function (a, b, c, d) {
            return a.triggerHandler("rowSelect", [b, c, d]);
        },
        rowUnselect: function (a, b, c, d) {
            return a.triggerHandler("rowUnselect", [b, c, d]);
        },
        rowRemoving: function (a, b, c, d) {
            return a.triggerHandler("rowRemoving", [b, c, d]);
        },
        destroying: function (a) {
            return a.triggerHandler("destroying");
        },
        columnHide: function (a, b) {
            return a.triggerHandler("columnHide", [b]);
        },
        columnShow: function (a, b) {
            return a.triggerHandler("columnShow", [b]);
        },
        initialized: function (a) {
            return a.triggerHandler("initialized");
        },
        dataFiltered: function (a, b) {
            return a.triggerHandler("dataFiltered", [b]);
        },
    }),
    (gj.grid.methods = {
        init: function (a) {
            return gj.widget.prototype.init.call(this, a, "grid"), gj.grid.methods.initialize(this), this.data("autoLoad") && this.reload(), this;
        },
        getConfig: function (a, b) {
            var c = gj.widget.prototype.getConfig.call(this, a, b);
            return gj.grid.methods.setDefaultColumnConfig(c.columns, c.defaultColumnSettings), c;
        },
        setDefaultColumnConfig: function (a, b) {
            var c, d;
            if (a && a.length) for (d = 0; d < a.length; d++) (c = $.extend(!0, {}, b)), $.extend(!0, c, a[d]), (a[d] = c);
        },
        getHTMLConfig: function () {
            var a = gj.widget.prototype.getHTMLConfig.call(this);
            return (
                (a.columns = []),
                this.find("thead > tr > th").each(function () {
                    var b = $(this),
                        c = b.text(),
                        d = gj.widget.prototype.getHTMLConfig.call(b);
                    (d.title = c), d.field || (d.field = c), d.events && (d.events = gj.grid.methods.eventsParser(d.events)), a.columns.push(d);
                }),
                a
            );
        },
        eventsParser: function (events) {
            var result = {},
                list,
                i,
                key,
                func,
                position;
            for (list = events.split(","), i = 0; i < list.length; i++)
                (position = list[i].indexOf(":")) > 0 && ((key = $.trim(list[i].substr(0, position))), (func = $.trim(list[i].substr(position + 1, list[i].length))), (result[key] = eval("window." + func)));
            return result;
        },
        initialize: function (a) {
            var b = a.data(),
                c = a.parent('div[data-role="wrapper"]');
            gj.grid.methods.localization(b),
                0 === c.length ? ((c = $('<div data-role="wrapper" />').addClass(b.style.wrapper)), a.wrap(c)) : c.addClass(b.style.wrapper),
                b.width && a.parent().css("width", b.width),
                b.minWidth && a.css("min-width", b.minWidth),
                b.fontSize && a.css("font-size", b.fontSize),
                "autogrow" === b.headerRowHeight && a.addClass("autogrow-header-row"),
                "fixed" === b.bodyRowHeight && a.addClass("fixed-body-rows"),
                a.addClass(b.style.table),
                "checkbox" === b.selectionMethod &&
                    b.columns.splice(gj.grid.methods.getColumnPositionNotInRole(a), 0, {
                        title: "",
                        width: b.defaultCheckBoxColumnWidth,
                        align: "center",
                        type: "checkbox",
                        role: "selectRow",
                        events: {
                            click: function (b) {
                                gj.grid.methods.setSelected(a, b.data.id, $(this).closest("tr"));
                            },
                        },
                        headerCssClass: "gj-grid-select-all",
                        stopPropagation: !0,
                    }),
                0 === a.children("tbody").length && a.append($("<tbody/>")),
                gj.grid.methods.renderHeader(a),
                gj.grid.methods.appendEmptyRow(a, "&nbsp;"),
                gj.grid.events.initialized(a);
        },
        localization: function (a) {
            a.notFoundText || (a.notFoundText = gj.grid.messages[a.locale].NoRecordsFound);
        },
        renderHeader: function (a) {
            var b, c, d, e, f, g, h, i, j;
            for (b = a.data(), c = b.columns, d = b.style.header, e = a.children("thead"), 0 === e.length && ((e = $("<thead />")), a.prepend(e)), f = $('<tr data-role="caption" />'), i = 0; i < c.length; i += 1)
                (g = $('<th data-field="' + (c[i].field || "") + '" />')),
                    c[i].width ? g.attr("width", c[i].width) : "checkbox" === c[i].type && g.attr("width", b.defaultIconColumnWidth),
                    g.addClass(d.cell),
                    c[i].headerCssClass && g.addClass(c[i].headerCssClass),
                    g.css("text-align", c[i].align || "left"),
                    "checkbox" === b.selectionMethod && "multiple" === b.selectionType && "checkbox" === c[i].type && "selectRow" === c[i].role
                        ? ((j = g.find('input[data-role="selectAll"]')),
                          0 === j.length && ((j = $('<input type="checkbox" data-role="selectAll" />')), g.append(j), j.checkbox({ uiLibrary: b.uiLibrary })),
                          j.off("click").on("click", function () {
                              this.checked ? a.selectAll() : a.unSelectAll();
                          }))
                        : ((h = $('<div data-role="title"/>').html(void 0 === c[i].title ? c[i].field : c[i].title)), g.append(h), c[i].sortable && (h.addClass(d.sortable), h.on("click", gj.grid.methods.createSortHandler(a, c[i])))),
                    c[i].hidden && g.hide(),
                    f.append(g);
            e.empty().append(f);
        },
        createSortHandler: function (a, b) {
            return function () {
                var c,
                    d = {};
                a.count() > 0 && ((c = a.data()), (d[c.paramNames.sortBy] = b.field), (b.direction = "asc" === b.direction ? "desc" : "asc"), (d[c.paramNames.direction] = b.direction), a.reload(d));
            };
        },
        updateHeader: function (a) {
            var b,
                c,
                d = a.data(),
                e = d.params[d.paramNames.sortBy],
                f = d.params[d.paramNames.direction];
            a.find('thead tr th [data-role="sorticon"]').remove(),
                e &&
                    ((position = gj.grid.methods.getColumnPosition(a.data("columns"), e)),
                    position > -1 && ((c = a.find("thead tr th:eq(" + position + ') div[data-role="title"]')), (b = $('<div data-role="sorticon" class="gj-unselectable" />').append("desc" === f ? d.icons.desc : d.icons.asc)), c.after(b)));
        },
        useHtmlDataSource: function (a, b) {
            var c,
                d,
                e,
                f,
                g = [],
                h = a.find('tbody tr[data-role != "empty"]');
            for (c = 0; c < h.length; c++) {
                for (e = $(h[c]).find("td"), f = {}, d = 0; d < e.length; d++) f[b.columns[d].field] = $(e[d]).html();
                g.push(f);
            }
            b.dataSource = g;
        },
        startLoading: function (a) {
            var b, c, d, e, f, g, h;
            gj.grid.methods.stopLoading(a),
                (h = a.data()),
                0 !== a.outerHeight() &&
                    ((b = a.children("tbody")),
                    (e = b.outerWidth(!1)),
                    (f = b.outerHeight(!1)),
                    (g = Math.abs(a.parent().offset().top - b.offset().top)),
                    (c = $('<div data-role="loading-cover" />').addClass(h.style.loadingCover).css({ width: e, height: f, top: g })),
                    (d = $('<div data-role="loading-text">' + gj.grid.messages[h.locale].Loading + "</div>").addClass(h.style.loadingText)),
                    d.insertAfter(a),
                    c.insertAfter(a),
                    d.css({ top: g + f / 2 - d.outerHeight(!1) / 2, left: e / 2 - d.outerWidth(!1) / 2 }));
        },
        stopLoading: function (a) {
            a.parent().find('div[data-role="loading-cover"]').remove(), a.parent().find('div[data-role="loading-text"]').remove();
        },
        appendEmptyRow: function (a, b) {
            var c, d, e, f;
            (c = a.data()),
                (d = $('<tr data-role="empty"/>')),
                (e = $("<td/>").css({ width: "100%", "text-align": "center" })),
                e.attr("colspan", gj.grid.methods.countVisibleColumns(a)),
                (f = $("<div />").html(b || c.notFoundText)),
                e.append(f),
                d.append(e),
                gj.grid.events.beforeEmptyRowInsert(a, d),
                a.append(d);
        },
        autoGenerateColumns: function (a, b) {
            var c,
                d,
                e,
                f,
                g = a.data();
            if (((g.columns = []), b.length > 0)) {
                for (c = Object.getOwnPropertyNames(b[0]), f = 0; f < c.length; f++)
                    (d = b[0][c[f]]), (e = "text"), d && ("number" == typeof d ? (e = "number") : d.indexOf("/Date(") > -1 && (e = "date")), g.columns.push({ field: c[f], type: e });
                gj.grid.methods.setDefaultColumnConfig(g.columns, g.defaultColumnSettings);
            }
            gj.grid.methods.renderHeader(a);
        },
        loadData: function (a) {
            var b, c, d, e, f, g, h, i;
            for (
                b = a.data(),
                    c = a.getAll(),
                    gj.grid.events.dataBinding(a, c),
                    e = c.length,
                    gj.grid.methods.stopLoading(a),
                    b.autoGenerateColumns && gj.grid.methods.autoGenerateColumns(a, c),
                    g = a.children("tbody"),
                    "checkbox" === b.selectionMethod && "multiple" === b.selectionType && a.find('thead input[data-role="selectAll"]').prop("checked", !1),
                    g.children("tr").not('[data-role="row"]').remove(),
                    0 === e && (g.empty(), gj.grid.methods.appendEmptyRow(a)),
                    h = g.children("tr"),
                    f = h.length,
                    d = 0;
                d < f;
                d++
            ) {
                if (!(d < e)) {
                    g.find('tr[data-role="row"]:gt(' + (d - 1) + ")").remove();
                    break;
                }
                (i = h.eq(d)), gj.grid.methods.renderRow(a, i, c[d], d);
            }
            for (d = f; d < e; d++) gj.grid.methods.renderRow(a, null, c[d], d);
            gj.grid.events.dataBound(a, c, b.totalRecords);
        },
        getId: function (a, b, c) {
            return b && a[b] ? a[b] : c;
        },
        renderRow: function (a, b, c, d) {
            var e, f, g, h, i;
            for (
                h = a.data(),
                    b && 0 !== b.length ? ((i = "update"), b.removeClass(h.style.content.rowSelected).removeAttr("data-selected").off("click")) : ((i = "create"), (b = $('<tr data-role="row"/>')), a.children("tbody").append(b)),
                    e = gj.grid.methods.getId(c, h.primaryKey, d + 1),
                    b.attr("data-position", d + 1),
                    "checkbox" !== h.selectionMethod && b.on("click", gj.grid.methods.createRowClickHandler(a, e)),
                    g = 0;
                g < h.columns.length;
                g++
            )
                "update" === i ? ((f = b.find("td:eq(" + g + ")")), gj.grid.methods.renderCell(a, f, h.columns[g], c, e)) : ((f = gj.grid.methods.renderCell(a, null, h.columns[g], c, e)), b.append(f));
            gj.grid.events.rowDataBound(a, b, e, c);
        },
        renderCell: function (a, b, c, d, e, f) {
            var g, h;
            if (
                (b && 0 !== b.length
                    ? ((g = b.find('div[data-role="display"]')), (f = "update"))
                    : ((b = $("<td/>")), (g = $('<div data-role="display" />')), c.align && b.css("text-align", c.align), c.cssClass && b.addClass(c.cssClass), b.append(g), (f = "create")),
                gj.grid.methods.renderDisplayElement(a, g, c, d, e, f),
                "update" === f && (b.off(), g.off()),
                c.events)
            )
                for (h in c.events) c.events.hasOwnProperty(h) && b.on(h, { id: e, field: c.field, record: d }, gj.grid.methods.createCellEventHandler(c, c.events[h]));
            return c.hidden && b.hide(), gj.grid.events.cellDataBound(a, g, e, c, d), b;
        },
        createCellEventHandler: function (a, b) {
            return function (c) {
                a.stopPropagation && c.stopPropagation(), b.call(this, c);
            };
        },
        renderDisplayElement: function (a, b, c, d, e, f) {
            var g, h;
            "checkbox" === c.type && gj.checkbox
                ? "create" === f
                    ? ((h = $('<input type="checkbox" />').val(e).prop("checked", !!d[c.field])),
                      c.role && h.attr("data-role", c.role),
                      b.append(h),
                      h.checkbox({ uiLibrary: a.data("uiLibrary") }),
                      "selectRow" === c.role
                          ? h.on("click", function () {
                                return !1;
                            })
                          : h.prop("disabled", !0))
                    : b.find('input[type="checkbox"]').val(e).prop("checked", !!d[c.field])
                : "icon" === c.type
                ? "create" === f && (b.append($("<span/>").addClass(c.icon).css({ cursor: "pointer" })), "bootstrap" === a.data().uiLibrary && b.children("span").addClass("glyphicon"), (c.stopPropagation = !0))
                : c.tmpl
                ? ((g = c.tmpl),
                  c.tmpl.replace(/\{(.+?)\}/g, function (a, b) {
                      g = g.replace(a, gj.grid.methods.formatText(d[b], c));
                  }),
                  b.html(g))
                : c.renderer && "function" == typeof c.renderer
                ? (g = c.renderer(d[c.field], d, b.parent(), b, e, a)) && b.html(g)
                : ((d[c.field] = gj.grid.methods.formatText(d[c.field], c)), !c.tooltip && d[c.field] && b.attr("title", d[c.field]), b.html(d[c.field])),
                c.tooltip && "create" === f && b.attr("title", c.tooltip);
        },
        formatText: function (a, b) {
            return (
                (a = a && ["date", "time", "datetime"].indexOf(b.type) > -1 ? gj.core.formatDate(gj.core.parseDate(a, b.format), b.format) : void 0 === a || null === a ? "" : a.toString()),
                b.decimalDigits && a && (a = parseFloat(a).toFixed(b.decimalDigits)),
                a
            );
        },
        setRecordsData: function (a, b) {
            var c = [],
                d = 0,
                e = a.data();
            return (
                $.isArray(b) ? ((c = b), (d = b.length)) : e && e.mapping && $.isArray(b[e.mapping.dataField]) && ((c = b[e.mapping.dataField]), ((d = b[e.mapping.totalRecordsField]) && !isNaN(d)) || (d = 0)),
                a.data("records", c),
                a.data("totalRecords", d),
                c
            );
        },
        createRowClickHandler: function (a, b) {
            return function () {
                gj.grid.methods.setSelected(a, b, $(this));
            };
        },
        selectRow: function (a, b, c, d) {
            var e;
            return (
                c.addClass(b.style.content.rowSelected),
                c.attr("data-selected", "true"),
                "checkbox" === b.selectionMethod &&
                    ((e = c.find('input[type="checkbox"][data-role="selectRow"]')),
                    e.length && !e.prop("checked") && e.prop("checked", !0),
                    "multiple" === b.selectionType && a.getSelections().length === a.count(!1) && a.find('thead input[data-role="selectAll"]').prop("checked", !0)),
                gj.grid.events.rowSelect(a, c, d, a.getById(d))
            );
        },
        unselectRow: function (a, b, c, d) {
            var e;
            if ("true" === c.attr("data-selected"))
                return (
                    c.removeClass(b.style.content.rowSelected),
                    "checkbox" === b.selectionMethod &&
                        ((e = c.find('td input[type="checkbox"][data-role="selectRow"]')),
                        e.length && e.prop("checked") && e.prop("checked", !1),
                        "multiple" === b.selectionType && a.find('thead input[data-role="selectAll"]').prop("checked", !1)),
                    c.removeAttr("data-selected"),
                    gj.grid.events.rowUnselect(a, c, d, a.getById(d))
                );
        },
        setSelected: function (a, b, c) {
            var d = a.data();
            return (
                (c && c.length) || (c = gj.grid.methods.getRowById(a, b)),
                c &&
                    ("true" === c.attr("data-selected")
                        ? gj.grid.methods.unselectRow(a, d, c, b)
                        : ("single" === d.selectionType &&
                              c.siblings('[data-selected="true"]').each(function () {
                                  var b = $(this),
                                      c = gj.grid.methods.getId(b, d.primaryKey, b.data("position"));
                                  gj.grid.methods.unselectRow(a, d, b, c);
                              }),
                          gj.grid.methods.selectRow(a, d, c, b))),
                a
            );
        },
        selectAll: function (a) {
            var b = a.data();
            return (
                a.find('tbody tr[data-role="row"]').each(function () {
                    var c = $(this),
                        d = c.data("position"),
                        e = a.get(d),
                        f = gj.grid.methods.getId(e, b.primaryKey, d);
                    gj.grid.methods.selectRow(a, b, c, f);
                }),
                a.find('thead input[data-role="selectAll"]').prop("checked", !0),
                a
            );
        },
        unSelectAll: function (a) {
            var b = a.data();
            return (
                a.find("tbody tr").each(function () {
                    var c = $(this),
                        d = c.data("position"),
                        e = a.get(d),
                        f = gj.grid.methods.getId(e, b.primaryKey, d);
                    gj.grid.methods.unselectRow(a, b, c, f), c.find('input[type="checkbox"][data-role="selectRow"]').prop("checked", !1);
                }),
                a.find('thead input[data-role="selectAll"]').prop("checked", !1),
                a
            );
        },
        getSelected: function (a) {
            var b,
                c,
                d,
                e = null;
            return (b = a.find('tbody>tr[data-selected="true"]')), b.length > 0 && ((d = $(b[0]).data("position")), (c = a.get(d)), (e = gj.grid.methods.getId(c, a.data().primaryKey, d))), e;
        },
        getSelectedRows: function (a) {
            a.data();
            return a.find('tbody>tr[data-selected="true"]');
        },
        getSelections: function (a) {
            var b,
                c,
                d = [],
                e = a.data(),
                f = gj.grid.methods.getSelectedRows(a);
            return (
                0 < f.length &&
                    f.each(function () {
                        (b = $(this).data("position")), (c = a.get(b)), d.push(gj.grid.methods.getId(c, e.primaryKey, b));
                    }),
                d
            );
        },
        getById: function (a, b) {
            var c,
                d = null,
                e = a.data("primaryKey"),
                f = a.data("records");
            if (e) {
                for (c = 0; c < f.length; c++)
                    if (f[c][e] == b) {
                        d = f[c];
                        break;
                    }
            } else d = a.get(b);
            return d;
        },
        getRecVPosById: function (a, b) {
            var c,
                d = b,
                e = a.data();
            if (e.primaryKey)
                for (c = 0; c < e.dataSource.length; c++)
                    if (e.dataSource[c][e.primaryKey] == b) {
                        d = c;
                        break;
                    }
            return d;
        },
        getRowById: function (a, b) {
            var c,
                d,
                e = a.getAll(!1),
                f = a.data("primaryKey"),
                g = void 0;
            if (f) {
                for (d = 0; d < e.length; d++)
                    if (e[d][f] == b) {
                        c = d + 1;
                        break;
                    }
            } else c = b;
            return c && (g = a.children("tbody").children('tr[data-position="' + c + '"]')), g;
        },
        getByPosition: function (a, b) {
            return a.getAll(!1)[b - 1];
        },
        getColumnPosition: function (a, b) {
            var c,
                d = -1;
            for (c = 0; c < a.length; c++)
                if (a[c].field === b) {
                    d = c;
                    break;
                }
            return d;
        },
        getColumnInfo: function (a, b) {
            var c,
                d = {},
                e = a.data();
            for (c = 0; c < e.columns.length; c += 1)
                if (e.columns[c].field === b) {
                    d = e.columns[c];
                    break;
                }
            return d;
        },
        getCell: function (a, b, c) {
            var d,
                e,
                f = null;
            return (d = gj.grid.methods.getColumnPosition(a.data("columns"), c)), d > -1 && ((e = gj.grid.methods.getRowById(a, b)), (f = e.find("td:eq(" + d + ') div[data-role="display"]'))), f;
        },
        setCellContent: function (a, b, c, d) {
            var e,
                f = gj.grid.methods.getCell(a, b, c);
            f && (f.empty(), "object" == typeof d ? f.append(d) : ((e = gj.grid.methods.getColumnInfo(a, c)), gj.grid.methods.renderDisplayElement(a, f, e, a.getById(b), b, "update")));
        },
        clone: function (a) {
            var b = [];
            return (
                $.each(a, function () {
                    b.push(this.clone());
                }),
                b
            );
        },
        getAll: function (a) {
            return a.data("records");
        },
        countVisibleColumns: function (a) {
            var b, c, d;
            for (b = a.data().columns, c = 0, d = 0; d < b.length; d++) !0 !== b[d].hidden && c++;
            return c;
        },
        clear: function (a, b) {
            var c = a.data();
            return a.xhr && a.xhr.abort(), a.children("tbody").empty(), (c.records = []), gj.grid.methods.stopLoading(a), gj.grid.methods.appendEmptyRow(a, b ? c.notFoundText : "&nbsp;"), gj.grid.events.dataBound(a, [], 0), a;
        },
        render: function (a, b) {
            return b && (gj.grid.methods.setRecordsData(a, b), gj.grid.methods.updateHeader(a), gj.grid.methods.loadData(a)), a;
        },
        filter: function (a) {
            var b,
                c,
                d = a.data(),
                e = d.dataSource.slice();
            d.params[d.paramNames.sortBy] && ((c = gj.grid.methods.getColumnInfo(a, d.params[d.paramNames.sortBy])), e.sort(c.sortable.sorter ? c.sortable.sorter(c.direction, c) : gj.grid.methods.createDefaultSorter(c.direction, c.field)));
            for (b in d.params)
                d.params[b] &&
                    !d.paramNames[b] &&
                    ((c = gj.grid.methods.getColumnInfo(a, b)),
                    (e = $.grep(e, function (a) {
                        var e = a[b] || "",
                            f = d.params[b] || "";
                        return c && "function" == typeof c.filter ? c.filter(e, f) : e.toUpperCase().indexOf(f.toUpperCase()) > -1;
                    })));
            return gj.grid.events.dataFiltered(a, e), e;
        },
        createDefaultSorter: function (a, b) {
            return function (c, d) {
                var e = (c[b] || "").toString(),
                    f = (d[b] || "").toString();
                return "asc" === a ? e.localeCompare(f) : f.localeCompare(e);
            };
        },
        destroy: function (a, b, c) {
            return (
                a.data() &&
                    (gj.grid.events.destroying(a),
                    gj.grid.methods.stopLoading(a),
                    a.xhr && a.xhr.abort(),
                    a.off(),
                    !1 === c && a.parent('div[data-role="wrapper"]').length > 0 && a.unwrap(),
                    a.removeData(),
                    !1 === b ? a.remove() : a.removeClass().empty(),
                    a.removeAttr("data-type")),
                a
            );
        },
        showColumn: function (a, b) {
            var c,
                d = a.data(),
                e = gj.grid.methods.getColumnPosition(d.columns, b);
            return (
                e > -1 &&
                    (a.find("thead>tr").each(function () {
                        $(this).children("th").eq(e).show();
                    }),
                    $.each(a.find("tbody>tr"), function () {
                        $(this).children("td").eq(e).show();
                    }),
                    (d.columns[e].hidden = !1),
                    (c = a.find('tbody > tr[data-role="empty"] > td')),
                    c && c.length && c.attr("colspan", gj.grid.methods.countVisibleColumns(a)),
                    gj.grid.events.columnShow(a, d.columns[e])),
                a
            );
        },
        hideColumn: function (a, b) {
            var c,
                d = a.data(),
                e = gj.grid.methods.getColumnPosition(d.columns, b);
            return (
                e > -1 &&
                    (a.find("thead>tr").each(function () {
                        $(this).children("th").eq(e).hide();
                    }),
                    $.each(a.find("tbody>tr"), function () {
                        $(this).children("td").eq(e).hide();
                    }),
                    (d.columns[e].hidden = !0),
                    (c = a.find('tbody > tr[data-role="empty"] > td')),
                    c && c.length && c.attr("colspan", gj.grid.methods.countVisibleColumns(a)),
                    gj.grid.events.columnHide(a, d.columns[e])),
                a
            );
        },
        isLastRecordVisible: function () {
            return !0;
        },
        addRow: function (a, b) {
            var c = a.data();
            return (
                (c.totalRecords = a.data("totalRecords") + 1),
                gj.grid.events.dataBinding(a, [b]),
                c.records.push(b),
                $.isArray(c.dataSource) && c.dataSource.push(b),
                1 === c.totalRecords && a.children("tbody").empty(),
                gj.grid.methods.isLastRecordVisible(a) && gj.grid.methods.renderRow(a, null, b, a.count() - 1),
                gj.grid.events.dataBound(a, [b], c.totalRecords),
                a
            );
        },
        updateRow: function (a, b, c) {
            var d,
                e = gj.grid.methods.getRowById(a, b),
                f = a.data();
            return (f.records[e.data("position") - 1] = c), $.isArray(f.dataSource) && ((d = gj.grid.methods.getRecVPosById(a, b)), (f.dataSource[d] = c)), gj.grid.methods.renderRow(a, e, c, e.index()), a;
        },
        removeRow: function (a, b) {
            var c,
                d = a.data(),
                e = gj.grid.methods.getRowById(a, b);
            return gj.grid.events.rowRemoving(a, e, b, a.getById(b)), $.isArray(d.dataSource) && ((c = gj.grid.methods.getRecVPosById(a, b)), d.dataSource.splice(c, 1)), a.reload(), a;
        },
        count: function (a, b) {
            return b ? a.data().totalRecords : a.getAll().length;
        },
        getColumnPositionByRole: function (a, b) {
            var c,
                d,
                e = a.data("columns");
            for (c = 0; c < e.length; c++)
                if (e[c].role === b) {
                    d = c;
                    break;
                }
            return d;
        },
        getColumnPositionNotInRole: function (a) {
            var b,
                c = 0,
                d = a.data("columns");
            for (b = 0; b < d.length; b++)
                if (!d[b].role) {
                    c = b;
                    break;
                }
            return c;
        },
    }),
    (gj.grid.widget = function (a, b) {
        var c = this,
            d = gj.grid.methods;
        return (
            (c.reload = function (a) {
                return d.startLoading(this), gj.widget.prototype.reload.call(this, a);
            }),
            (c.clear = function (a) {
                return d.clear(this, a);
            }),
            (c.count = function (a) {
                return d.count(this, a);
            }),
            (c.render = function (b) {
                return d.render(a, b);
            }),
            (c.destroy = function (a, b) {
                return d.destroy(this, a, b);
            }),
            (c.setSelected = function (a) {
                return d.setSelected(this, a);
            }),
            (c.getSelected = function () {
                return d.getSelected(this);
            }),
            (c.getSelections = function () {
                return d.getSelections(this);
            }),
            (c.selectAll = function () {
                return d.selectAll(this);
            }),
            (c.unSelectAll = function () {
                return d.unSelectAll(this);
            }),
            (c.getById = function (a) {
                return d.getById(this, a);
            }),
            (c.get = function (a) {
                return d.getByPosition(this, a);
            }),
            (c.getAll = function (a) {
                return d.getAll(this, a);
            }),
            (c.showColumn = function (a) {
                return d.showColumn(this, a);
            }),
            (c.hideColumn = function (a) {
                return d.hideColumn(this, a);
            }),
            (c.addRow = function (a) {
                return d.addRow(this, a);
            }),
            (c.updateRow = function (a, b) {
                return d.updateRow(this, a, b);
            }),
            (c.setCellContent = function (a, b, c) {
                d.setCellContent(this, a, b, c);
            }),
            (c.removeRow = function (a) {
                return d.removeRow(this, a);
            }),
            $.extend(a, c),
            "grid" !== a.attr("data-type") && d.init.call(a, b),
            a
        );
    }),
    (gj.grid.widget.prototype = new gj.widget()),
    (gj.grid.widget.constructor = gj.grid.widget),
    (gj.grid.widget.prototype.getConfig = gj.grid.methods.getConfig),
    (gj.grid.widget.prototype.getHTMLConfig = gj.grid.methods.getHTMLConfig),
    (function (a) {
        a.fn.grid = function (a) {
            var b;
            if (this && this.length) {
                if ("object" != typeof a && a) {
                    if (((b = new gj.grid.widget(this, null)), b[a])) return b[a].apply(this, Array.prototype.slice.call(arguments, 1));
                    throw "Method " + a + " does not exist.";
                }
                return new gj.grid.widget(this, a);
            }
        };
    })(jQuery),
    (gj.grid.plugins.fixedHeader = {
        config: { base: { fixedHeader: !1, height: 300 } },
        private: {
            init: function (a) {
                var b = a.data(),
                    c = a.children("tbody"),
                    d = a.children("thead"),
                    e = b.height - d.outerHeight() - (a.children("tfoot").outerHeight() || 0);
                a.addClass("gj-grid-scrollable"), c.css("width", d.outerWidth()), c.height(e);
            },
            refresh: function (a) {
                var b,
                    c,
                    d = (a.data(), a.children("tbody")),
                    e = a.children("thead"),
                    f = a.find('tbody tr[data-role="row"] td'),
                    g = a.find('thead tr[data-role="caption"] th');
                for (
                    a.children("tbody").height() < gj.grid.plugins.fixedHeader.private.getRowsHeight(a)
                        ? d.css("width", e.outerWidth() + gj.grid.plugins.fixedHeader.private.getScrollBarWidth() + (navigator.userAgent.toLowerCase().indexOf("firefox") > -1 ? 1 : 0))
                        : d.css("width", e.outerWidth()),
                        b = 0;
                    b < g.length;
                    b++
                )
                    (c = $(g[b]).outerWidth()), 0 === b && gj.core.isIE() && (c -= 1), $(f[b]).attr("width", c);
            },
            getRowsHeight: function (a) {
                var b = 0;
                return (
                    a.find("tbody tr").each(function () {
                        b += $(this).height();
                    }),
                    b
                );
            },
            getScrollBarWidth: function () {
                var a = document.createElement("p");
                (a.style.width = "100%"), (a.style.height = "200px");
                var b = document.createElement("div");
                (b.style.position = "absolute"),
                    (b.style.top = "0px"),
                    (b.style.left = "0px"),
                    (b.style.visibility = "hidden"),
                    (b.style.width = "200px"),
                    (b.style.height = "150px"),
                    (b.style.overflow = "hidden"),
                    b.appendChild(a),
                    document.body.appendChild(b);
                var c = a.offsetWidth;
                b.style.overflow = "scroll";
                var d = a.offsetWidth;
                return c == d && (d = b.clientWidth), document.body.removeChild(b), c - d;
            },
        },
        public: {},
        events: {},
        configure: function (a, b, c) {
            $.extend(!0, a, gj.grid.plugins.fixedHeader.public);
            a.data();
            c.fixedHeader &&
                (a.on("initialized", function () {
                    gj.grid.plugins.fixedHeader.private.init(a);
                }),
                a.on("dataBound", function () {
                    gj.grid.plugins.fixedHeader.private.refresh(a);
                }),
                a.on("resize", function () {
                    gj.grid.plugins.fixedHeader.private.refresh(a);
                }));
        },
    }),
    (gj.grid.plugins.expandCollapseRows = {
        config: {
            base: { detailTemplate: void 0, keepExpandedRows: !0, expandedRows: [], icons: { expandRow: '<i class="gj-icon chevron-right" />', collapseRow: '<i class="gj-icon chevron-down" />' } },
            fontawesome: { icons: { expandRow: '<i class="fa fa-angle-right" aria-hidden="true"></i>', collapseRow: '<i class="fa fa-angle-down" aria-hidden="true"></i>' } },
            glyphicons: { icons: { expandRow: '<span class="glyphicon glyphicon-chevron-right" />', collapseRow: '<span class="glyphicon glyphicon-chevron-down" />' } },
        },
        private: {
            expandDetail: function (a, b, c) {
                var d = b.closest("tr"),
                    e = $('<tr data-role="details" />'),
                    f = $('<td colspan="' + gj.grid.methods.countVisibleColumns(a) + '" />'),
                    g = $('<div data-role="display" />'),
                    h = a.data(),
                    i = d.data("position"),
                    j = a.get(i),
                    k = gj.grid.plugins.expandCollapseRows;
                void 0 === typeof c && (c = gj.grid.methods.getId(j, h.primaryKey, j)),
                    e.append(f.append(g.append(d.data("details")))),
                    e.insertAfter(d),
                    b.children('div[data-role="display"]').empty().append(h.icons.collapseRow),
                    a.updateDetails(d),
                    k.private.keepSelection(a, c),
                    k.events.detailExpand(a, e.find("td>div"), c);
            },
            collapseDetail: function (a, b, c) {
                var d = b.closest("tr"),
                    e = d.next('tr[data-role="details"]'),
                    f = a.data(),
                    g = gj.grid.plugins.expandCollapseRows;
                void 0 === typeof c && (c = gj.grid.methods.getId(record, f.primaryKey, record)),
                    e.remove(),
                    b.children('div[data-role="display"]').empty().append(f.icons.expandRow),
                    g.private.removeSelection(a, c),
                    g.events.detailCollapse(a, e.find("td>div"), c);
            },
            keepSelection: function (a, b) {
                var c = a.data();
                c.keepExpandedRows && ($.isArray(c.expandedRows) ? -1 == c.expandedRows.indexOf(b) && c.expandedRows.push(b) : (c.expandedRows = [b]));
            },
            removeSelection: function (a, b) {
                var c = a.data();
                c.keepExpandedRows && $.isArray(c.expandedRows) && c.expandedRows.indexOf(b) > -1 && c.expandedRows.splice(c.expandedRows.indexOf(b), 1);
            },
            updateDetailsColSpan: function (a) {
                var b = a.find('tbody > tr[data-role="details"] > td');
                b && b.length && b.attr("colspan", gj.grid.methods.countVisibleColumns(a));
            },
        },
        public: {
            collapseAll: function () {
                var a,
                    b = this,
                    c = b.data();
                return (
                    void 0 !== c.detailTemplate &&
                        ((a = gj.grid.methods.getColumnPositionByRole(b, "expander")),
                        b.find('tbody tr[data-role="row"]').each(function () {
                            gj.grid.plugins.expandCollapseRows.private.collapseDetail(b, $(this).find("td:eq(" + a + ")"));
                        })),
                    void 0 !== c.grouping &&
                        b.find('tbody tr[role="group"]').each(function () {
                            gj.grid.plugins.grouping.private.collapseGroup(c, $(this).find("td:eq(0)"));
                        }),
                    b
                );
            },
            expandAll: function () {
                var a,
                    b = this,
                    c = b.data();
                return (
                    void 0 !== c.detailTemplate &&
                        ((a = gj.grid.methods.getColumnPositionByRole(b, "expander")),
                        b.find('tbody tr[data-role="row"]').each(function () {
                            gj.grid.plugins.expandCollapseRows.private.expandDetail(b, $(this).find("td:eq(" + a + ")"));
                        })),
                    void 0 !== c.grouping &&
                        b.find('tbody tr[role="group"]').each(function () {
                            gj.grid.plugins.grouping.private.expandGroup(c, $(this).find("td:eq(0)"));
                        }),
                    b
                );
            },
            updateDetails: function (a) {
                var b = this,
                    c = a.data("details"),
                    d = c.html(),
                    e = b.get(a.data("position"));
                return (
                    e &&
                        d &&
                        (c.html().replace(/\{(.+?)\}/g, function (a, c) {
                            var f = gj.grid.methods.getColumnInfo(b, c);
                            d = d.replace(a, gj.grid.methods.formatText(e[c], f));
                        }),
                        c.html(d)),
                    b
                );
            },
        },
        events: {
            detailExpand: function (a, b, c) {
                a.triggerHandler("detailExpand", [b, c]);
            },
            detailCollapse: function (a, b, c) {
                a.triggerHandler("detailCollapse", [b, c]);
            },
        },
        configure: function (a) {
            var b,
                c = a.data();
            $.extend(!0, a, gj.grid.plugins.expandCollapseRows.public),
                void 0 !== c.detailTemplate &&
                    ((b = {
                        title: "",
                        width: c.defaultIconColumnWidth,
                        align: "center",
                        stopPropagation: !0,
                        cssClass: "gj-cursor-pointer gj-unselectable",
                        tmpl: c.icons.expandRow,
                        role: "expander",
                        events: {
                            click: function (b) {
                                var c = $(this),
                                    d = gj.grid.plugins.expandCollapseRows.private;
                                "details" === c.closest("tr").next().attr("data-role") ? d.collapseDetail(a, c, b.data.id) : d.expandDetail(a, $(this), b.data.id);
                            },
                        },
                    }),
                    (c.columns = [b].concat(c.columns)),
                    a.on("rowDataBound", function (a, b, d, e) {
                        b.data("details", $(c.detailTemplate));
                    }),
                    a.on("columnShow", function (b, c) {
                        gj.grid.plugins.expandCollapseRows.private.updateDetailsColSpan(a);
                    }),
                    a.on("columnHide", function (b, c) {
                        gj.grid.plugins.expandCollapseRows.private.updateDetailsColSpan(a);
                    }),
                    a.on("rowRemoving", function (b, c, d, e) {
                        gj.grid.plugins.expandCollapseRows.private.collapseDetail(a, c.children("td").first(), d);
                    }),
                    a.on("dataBinding", function () {
                        a.collapseAll();
                    }),
                    a.on("pageChanging", function () {
                        a.collapseAll();
                    }),
                    a.on("dataBound", function () {
                        var b,
                            c,
                            d,
                            e,
                            f = a.data();
                        if (f.keepExpandedRows && $.isArray(f.expandedRows))
                            for (b = 0; b < f.expandedRows.length; b++)
                                (d = gj.grid.methods.getRowById(a, f.expandedRows[b])) &&
                                    d.length &&
                                    ((e = gj.grid.methods.getColumnPositionByRole(a, "expander")), (c = d.children("td:eq(" + e + ")")) && c.length && gj.grid.plugins.expandCollapseRows.private.expandDetail(a, c));
                    }));
        },
    }),
    (gj.grid.plugins.inlineEditing = {
        renderers: {
            editManager: function (a, b, c, d, e, f) {
                var g = f.data(),
                    h = $(g.inlineEditing.editButton).attr("key", e),
                    i = $(g.inlineEditing.deleteButton).attr("key", e),
                    j = $(g.inlineEditing.updateButton).attr("key", e).hide(),
                    k = $(g.inlineEditing.cancelButton).attr("key", e).hide();
                h.on("click", function (a) {
                    f.edit($(this).attr("key"));
                }),
                    i.on("click", function (a) {
                        f.removeRow($(this).attr("key"));
                    }),
                    j.on("click", function (a) {
                        f.update($(this).attr("key"));
                    }),
                    k.on("click", function (a) {
                        f.cancel($(this).attr("key"));
                    }),
                    d.empty().append(h).append(i).append(j).append(k);
            },
        },
    }),
    (gj.grid.plugins.inlineEditing.config = {
        base: {
            defaultColumnSettings: { editor: void 0, editField: void 0, mode: "readEdit" },
            inlineEditing: {
                mode: "click",
                managementColumn: !0,
                managementColumnConfig: { width: 300, role: "managementColumn", align: "center", renderer: gj.grid.plugins.inlineEditing.renderers.editManager, cssClass: "gj-grid-management-column" },
            },
        },
        bootstrap: { inlineEditing: { managementColumnConfig: { width: 200, role: "managementColumn", align: "center", renderer: gj.grid.plugins.inlineEditing.renderers.editManager, cssClass: "gj-grid-management-column" } } },
        bootstrap4: { inlineEditing: { managementColumnConfig: { width: 280, role: "managementColumn", align: "center", renderer: gj.grid.plugins.inlineEditing.renderers.editManager, cssClass: "gj-grid-management-column" } } },
    }),
    (gj.grid.plugins.inlineEditing.private = {
        localization: function (a) {
            "bootstrap" === a.uiLibrary
                ? ((a.inlineEditing.editButton = '<button role="edit" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> ' + gj.grid.messages[a.locale].Edit + "</button>"),
                  (a.inlineEditing.deleteButton =
                      '<button role="delete" class="btn btn-default btn-sm gj-margin-left-10"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> ' + gj.grid.messages[a.locale].Delete + "</button>"),
                  (a.inlineEditing.updateButton = '<button role="update" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> ' + gj.grid.messages[a.locale].Update + "</button>"),
                  (a.inlineEditing.cancelButton =
                      '<button role="cancel" class="btn btn-default btn-sm gj-margin-left-10"><span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span> ' + gj.grid.messages[a.locale].Cancel + "</button>"))
                : ((a.inlineEditing.editButton = '<button role="edit" class="gj-button-md"><i class="gj-icon pencil" /> ' + gj.grid.messages[a.locale].Edit.toUpperCase() + "</button>"),
                  (a.inlineEditing.deleteButton = '<button role="delete" class="gj-button-md"><i class="gj-icon delete" /> ' + gj.grid.messages[a.locale].Delete.toUpperCase() + "</button>"),
                  (a.inlineEditing.updateButton = '<button role="update" class="gj-button-md"><i class="gj-icon check-circle" /> ' + gj.grid.messages[a.locale].Update.toUpperCase() + "</button>"),
                  (a.inlineEditing.cancelButton = '<button role="cancel" class="gj-button-md"><i class="gj-icon cancel" /> ' + gj.grid.messages[a.locale].Cancel.toUpperCase() + "</button>"));
        },
        editMode: function (a, b, c, d) {
            var e,
                f,
                g,
                h,
                i,
                j = a.data();
            if ("edit" !== b.attr("data-mode"))
                if (c.editor) {
                    if (
                        (gj.grid.plugins.inlineEditing.private.updateOtherCells(a, c.mode),
                        (e = b.find('div[data-role="display"]').hide()),
                        (f = b.find('div[data-role="edit"]').show()),
                        0 === f.length && ((f = $('<div data-role="edit" />')), b.append(f)),
                        (h = d[c.editField || c.field]),
                        (g = f.find("input, select, textarea").first()),
                        g.length)
                    )
                        switch (c.type) {
                            case "checkbox":
                                g.prop("checked", h);
                                break;
                            case "dropdown":
                                g = g.dropdown("value", h);
                                break;
                            default:
                                g.val(h);
                        }
                    else {
                        if ("function" == typeof c.editor) c.editor(f, h, d), (g = f.find("input, select, textarea").first());
                        else if (
                            ((i = "object" == typeof c.editor ? c.editor : {}), (i.uiLibrary = j.uiLibrary), (i.iconsLibrary = j.iconsLibrary), (i.fontSize = a.css("font-size")), (i.showOnFocus = !1), "checkbox" === c.type && gj.checkbox)
                        )
                            (g = $('<input type="checkbox" />').prop("checked", h)), f.append(g), g.checkbox(i);
                        else if (("date" === c.type && gj.datepicker) || ("time" === c.type && gj.timepicker) || ("datetime" === c.type && gj.datetimepicker)) {
                            switch (((g = $('<input type="text" width="100%"/>')), f.append(g), c.format && (i.format = c.format), c.type)) {
                                case "date":
                                    g = g.datepicker(i);
                                    break;
                                case "time":
                                    g = g.timepicker(i);
                                    break;
                                case "datetime":
                                    g = g.datetimepicker(i);
                            }
                            g.value && g.value(e.html());
                        } else
                            "dropdown" === c.type && gj.dropdown
                                ? ((g = $('<select type="text" width="100%"/>')),
                                  f.append(g),
                                  (i.dataBound = function (a) {
                                      var b = $(this).dropdown();
                                      c.editField ? b.value(d[c.editField]) : b.value(d[c.field]);
                                  }),
                                  (g = g.dropdown(i)))
                                : ((g = $('<input type="text" value="' + h + '" class="gj-width-full"/>')), "materialdesign" === j.uiLibrary && g.addClass("gj-textbox-md").css("font-size", a.css("font-size")), f.append(g));
                        "command" !== j.inlineEditing.mode &&
                            "editOnly" !== c.mode &&
                            ((g = f.find("input, select, textarea").first()),
                            g.on("keyup", function (d) {
                                (13 !== d.keyCode && 27 !== d.keyCode) || gj.grid.plugins.inlineEditing.private.displayMode(a, b, c);
                            }));
                    }
                    "INPUT" === g.prop("tagName").toUpperCase() && "TEXT" === g.prop("type").toUpperCase() ? gj.core.setCaretAtEnd(g[0]) : g.focus(), b.attr("data-mode", "edit");
                } else "managementColumn" === c.role && (b.find('[role="edit"]').hide(), b.find('[role="delete"]').hide(), b.find('[role="update"]').show(), b.find('[role="cancel"]').show());
        },
        displayMode: function (a, b, c, d) {
            var e, f, g, h, i, j, k;
            "editOnly" !== c.mode &&
                ("edit" === b.attr("data-mode") &&
                    ((e = b.find('div[data-role="edit"]')),
                    (f = b.find('div[data-role="display"]')),
                    (g = e.find("input, select, textarea").first()),
                    "SELECT" === g[0].tagName.toUpperCase() && g[0].selectedIndex > -1
                        ? ((h = g[0].options[g[0].selectedIndex].innerHTML), (i = g[0].value))
                        : (h = "INPUT" === g[0].tagName.toUpperCase() && "CHECKBOX" === g[0].type.toUpperCase() ? g[0].checked : g.val()),
                    (k = b.parent().data("position")),
                    (j = a.get(k)),
                    !0 !== d &&
                        h !== j[c.field] &&
                        ((j[c.field] = "date" === c.type ? gj.core.parseDate(h, c.format) : h),
                        c.editField && (j[c.editField] = i || h),
                        "editOnly" !== c.mode &&
                            (gj.grid.methods.renderDisplayElement(a, f, c, j, gj.grid.methods.getId(j, a.data("primaryKey"), k), "update"), 0 === b.find("span.gj-dirty").length && b.prepend($('<span class="gj-dirty" />'))),
                        gj.grid.plugins.inlineEditing.events.cellDataChanged(a, b, c, j, h),
                        gj.grid.plugins.inlineEditing.private.updateChanges(a, c, j, h)),
                    e.hide(),
                    f.show(),
                    b.attr("data-mode", "display")),
                "managementColumn" === c.role && (b.find('[role="update"]').hide(), b.find('[role="cancel"]').hide(), b.find('[role="edit"]').show(), b.find('[role="delete"]').show()));
        },
        updateOtherCells: function (a, b) {
            var c = a.data();
            "command" !== c.inlineEditing.mode &&
                "editOnly" !== b &&
                a
                    .find('div[data-role="edit"]:visible')
                    .parent("td")
                    .each(function () {
                        var b = $(this),
                            d = c.columns[b.index()];
                        gj.grid.plugins.inlineEditing.private.displayMode(a, b, d);
                    });
        },
        updateChanges: function (a, b, c, d) {
            var e,
                f,
                g,
                h = a.data();
            h.guid || (h.guid = gj.grid.plugins.inlineEditing.private.generateGUID()),
                h.primaryKey &&
                    ((e = JSON.parse(sessionStorage.getItem("gj.grid." + h.guid))),
                    e
                        ? (f = e.filter(function (a) {
                              return a[h.primaryKey] === c[h.primaryKey];
                          }))
                        : (e = []),
                    f && 1 === f.length ? (f[0][b.field] = d) : ((g = {}), (g[h.primaryKey] = c[h.primaryKey]), h.primaryKey !== b.field && (g[b.field] = d), e.push(g)),
                    sessionStorage.setItem("gj.grid." + h.guid, JSON.stringify(e)));
        },
        generateGUID: function () {
            function a() {
                return Math.floor(65536 * (1 + Math.random()))
                    .toString(16)
                    .substring(1);
            }
            return a() + a() + "-" + a() + "-" + a() + "-" + a() + "-" + a() + a() + a();
        },
    }),
    (gj.grid.plugins.inlineEditing.public = {
        getChanges: function () {
            return JSON.parse(sessionStorage.getItem("gj.grid." + this.data().guid));
        },
        edit: function (a) {
            var b,
                c = this.getById(a),
                d = gj.grid.methods.getRowById(this, a).children("td"),
                e = this.data("columns");
            for (b = 0; b < d.length; b++) gj.grid.plugins.inlineEditing.private.editMode(this, $(d[b]), e[b], c);
            return this;
        },
        update: function (a) {
            var b,
                c = this.getById(a),
                d = gj.grid.methods.getRowById(this, a).children("td"),
                e = this.data("columns");
            for (b = 0; b < d.length; b++) gj.grid.plugins.inlineEditing.private.displayMode(this, $(d[b]), e[b], !1);
            return gj.grid.plugins.inlineEditing.events.rowDataChanged(this, a, c), this;
        },
        cancel: function (a) {
            var b,
                c = (this.getById(a), gj.grid.methods.getRowById(this, a).children("td")),
                d = this.data("columns");
            for (b = 0; b < c.length; b++) gj.grid.plugins.inlineEditing.private.displayMode(this, $(c[b]), d[b], !0);
            return this;
        },
    }),
    (gj.grid.plugins.inlineEditing.events = {
        cellDataChanged: function (a, b, c, d, e, f) {
            a.triggerHandler("cellDataChanged", [b, c, d, e, f]);
        },
        rowDataChanged: function (a, b, c) {
            a.triggerHandler("rowDataChanged", [b, c]);
        },
    }),
    (gj.grid.plugins.inlineEditing.configure = function (a, b, c) {
        var d = a.data();
        $.extend(!0, a, gj.grid.plugins.inlineEditing.public),
            c.inlineEditing &&
                (a.on("dataBound", function () {
                    a.find("span.gj-dirty").remove();
                }),
                a.on("rowDataBound", function (b, c, d, e) {
                    a.cancel(d);
                })),
            "command" === d.inlineEditing.mode
                ? (gj.grid.plugins.inlineEditing.private.localization(d), b.inlineEditing.managementColumn && d.columns.push(b.inlineEditing.managementColumnConfig))
                : a.on("cellDataBound", function (b, c, e, f, g) {
                      f.editor &&
                          ("editOnly" === f.mode
                              ? gj.grid.plugins.inlineEditing.private.editMode(a, c.parent(), f, g)
                              : c.parent("td").on("dblclick" === d.inlineEditing.mode ? "dblclick" : "click", function () {
                                    gj.grid.plugins.inlineEditing.private.editMode(a, c.parent(), f, g);
                                }));
                  });
    }),
    (gj.grid.plugins.optimisticPersistence = {
        config: { base: { optimisticPersistence: { localStorage: void 0, sessionStorage: void 0 } } },
        private: {
            applyParams: function (a) {
                var b,
                    c = a.data(),
                    d = {};
                (b = JSON.parse(sessionStorage.getItem("gj.grid." + c.guid))),
                    b && b.optimisticPersistence && $.extend(d, b.optimisticPersistence),
                    (b = JSON.parse(localStorage.getItem("gj.grid." + c.guid))),
                    b && b.optimisticPersistence && $.extend(d, b.optimisticPersistence),
                    $.extend(c.params, d);
            },
            saveParams: function (a) {
                var b,
                    c,
                    d = a.data(),
                    e = { optimisticPersistence: {} };
                if (d.optimisticPersistence.sessionStorage) {
                    for (b = 0; b < d.optimisticPersistence.sessionStorage.length; b++) (c = d.optimisticPersistence.sessionStorage[b]), (e.optimisticPersistence[c] = d.params[c]);
                    (e = $.extend(!0, JSON.parse(sessionStorage.getItem("gj.grid." + d.guid)), e)), sessionStorage.setItem("gj.grid." + d.guid, JSON.stringify(e));
                }
                if (d.optimisticPersistence.localStorage) {
                    for (e = { optimisticPersistence: {} }, b = 0; b < d.optimisticPersistence.localStorage.length; b++) (c = d.optimisticPersistence.localStorage[b]), (e.optimisticPersistence[c] = d.params[c]);
                    (e = $.extend(!0, JSON.parse(localStorage.getItem("gj.grid." + d.guid)), e)), localStorage.setItem("gj.grid." + d.guid, JSON.stringify(e));
                }
            },
        },
        configure: function (a, b, c) {
            b.guid &&
                (b.optimisticPersistence.localStorage || b.optimisticPersistence.sessionStorage) &&
                (gj.grid.plugins.optimisticPersistence.private.applyParams(a),
                a.on("dataBound", function (b) {
                    gj.grid.plugins.optimisticPersistence.private.saveParams(a);
                }));
        },
    }),
    (gj.grid.plugins.pagination = {
        config: {
            base: { style: { pager: { panel: "", stateDisabled: "", activeButton: "" } }, paramNames: { page: "page", limit: "limit" }, pager: { limit: 10, sizes: [5, 10, 20, 100], leftControls: void 0, rightControls: void 0 } },
            bootstrap: { style: { pager: { panel: "", stateDisabled: "" } } },
            bootstrap4: { style: { pager: { panel: "btn-toolbar", stateDisabled: "" } } },
            glyphicons: {
                icons: {
                    first: '<span class="glyphicon glyphicon-step-backward"></span>',
                    previous: '<span class="glyphicon glyphicon-backward"></span>',
                    next: '<span class="glyphicon glyphicon-forward"></span>',
                    last: '<span class="glyphicon glyphicon-step-forward"></span>',
                    refresh: '<span class="glyphicon glyphicon-refresh"></span>',
                },
            },
            materialicons: {
                icons: {
                    first: '<i class="gj-icon first-page" />',
                    previous: '<i class="gj-icon chevron-left" />',
                    next: '<i class="gj-icon chevron-right" />',
                    last: '<i class="gj-icon last-page" />',
                    refresh: '<i class="gj-icon refresh" />',
                },
            },
            fontawesome: {
                icons: {
                    first: '<i class="fa fa-fast-backward" aria-hidden="true"></i>',
                    previous: '<i class="fa fa-backward" aria-hidden="true"></i>',
                    next: '<i class="fa fa-forward" aria-hidden="true"></i>',
                    last: '<i class="fa fa-fast-forward" aria-hidden="true"></i>',
                    refresh: '<i class="fa fa-refresh" aria-hidden="true"></i>',
                },
            },
        },
        private: {
            init: function (a) {
                var b, c, d, e, f, g, h, i, j, k;
                if (((d = a.data()), d.pager))
                    for (
                        d.params[d.paramNames.page] || (d.params[d.paramNames.page] = 1),
                            d.params[d.paramNames.limit] || (d.params[d.paramNames.limit] = d.pager.limit),
                            gj.grid.plugins.pagination.private.localization(d),
                            b = $('<tr data-role="pager"/>'),
                            c = $("<th/>"),
                            b.append(c),
                            f = $('<div data-role="display" />').addClass(d.style.pager.panel).css({ float: "left" }),
                            g = $('<div data-role="display" />').addClass(d.style.pager.panel).css({ float: "right" }),
                            c.append(f).append(g),
                            h = $("<tfoot />").append(b),
                            a.append(h),
                            gj.grid.plugins.pagination.private.updatePagerColSpan(a),
                            i = gj.grid.methods.clone(d.pager.leftControls),
                            $.each(i, function () {
                                f.append(this);
                            }),
                            j = gj.grid.methods.clone(d.pager.rightControls),
                            $.each(j, function () {
                                g.append(this);
                            }),
                            e = a.find("tfoot [data-role]"),
                            k = 0;
                        k < e.length;
                        k++
                    )
                        gj.grid.plugins.pagination.private.initPagerControl($(e[k]), a);
            },
            localization: function (a) {
                "bootstrap" === a.uiLibrary
                    ? gj.grid.plugins.pagination.private.localizationBootstrap(a)
                    : "bootstrap4" === a.uiLibrary
                    ? gj.grid.plugins.pagination.private.localizationBootstrap4(a)
                    : gj.grid.plugins.pagination.private.localizationMaterialDesign(a);
            },
            localizationBootstrap: function (a) {
                var b = gj.grid.messages[a.locale];
                void 0 === a.pager.leftControls &&
                    (a.pager.leftControls = [
                        $('<button type="button" class="btn btn-default btn-sm">' + (a.icons.first || b.First) + "</button>")
                            .attr("title", b.FirstPageTooltip)
                            .attr("data-role", "page-first"),
                        $('<button type="button" class="btn btn-default btn-sm">' + (a.icons.previous || b.Previous) + "</button>")
                            .attr("title", b.PreviousPageTooltip)
                            .attr("data-role", "page-previous"),
                        $("<div>" + b.Page + "</div>"),
                        $('<input data-role="page-number" class="form-control input-sm" type="text" value="0">'),
                        $("<div>" + b.Of + "</div>"),
                        $('<div data-role="page-label-last">0</div>'),
                        $('<button type="button" class="btn btn-default btn-sm">' + (a.icons.next || b.Next) + "</button>")
                            .attr("title", b.NextPageTooltip)
                            .attr("data-role", "page-next"),
                        $('<button type="button" class="btn btn-default btn-sm">' + (a.icons.last || b.Last) + "</button>")
                            .attr("title", b.LastPageTooltip)
                            .attr("data-role", "page-last"),
                        $('<button type="button" class="btn btn-default btn-sm">' + (a.icons.refresh || b.Refresh) + "</button>")
                            .attr("title", b.Refresh)
                            .attr("data-role", "page-refresh"),
                        $('<select data-role="page-size" class="form-control input-sm" width="60"></select>'),
                    ]),
                    void 0 === a.pager.rightControls &&
                        (a.pager.rightControls = [
                            $("<div>" + b.DisplayingRecords + "</div>"),
                            $('<div data-role="record-first">0</div>'),
                            $("<div>-</div>"),
                            $('<div data-role="record-last">0</div>'),
                            $("<div>" + b.Of + "</div>"),
                            $('<div data-role="record-total">0</div>'),
                        ]);
            },
            localizationBootstrap4: function (a) {
                var b = gj.grid.messages[a.locale];
                void 0 === a.pager.leftControls &&
                    (a.pager.leftControls = [
                        $('<button class="btn btn-default btn-sm gj-cursor-pointer">' + (a.icons.first || b.First) + "</button>")
                            .attr("title", b.FirstPageTooltip)
                            .attr("data-role", "page-first"),
                        $('<button class="btn btn-default btn-sm gj-cursor-pointer">' + (a.icons.previous || b.Previous) + "</button>")
                            .attr("title", b.PreviousPageTooltip)
                            .attr("data-role", "page-previous"),
                        $("<div>" + b.Page + "</div>"),
                        $('<div class="input-group"><input data-role="page-number" class="form-control form-control-sm" type="text" value="0"></div>'),
                        $("<div>" + b.Of + "</div>"),
                        $('<div data-role="page-label-last">0</div>'),
                        $('<button class="btn btn-default btn-sm gj-cursor-pointer">' + (a.icons.next || b.Next) + "</button>")
                            .attr("title", b.NextPageTooltip)
                            .attr("data-role", "page-next"),
                        $('<button class="btn btn-default btn-sm gj-cursor-pointer">' + (a.icons.last || b.Last) + "</button>")
                            .attr("title", b.LastPageTooltip)
                            .attr("data-role", "page-last"),
                        $('<button class="btn btn-default btn-sm gj-cursor-pointer">' + (a.icons.refresh || b.Refresh) + "</button>")
                            .attr("title", b.Refresh)
                            .attr("data-role", "page-refresh"),
                        $('<select data-role="page-size" class="form-control input-sm" width="60"></select>'),
                    ]),
                    void 0 === a.pager.rightControls &&
                        (a.pager.rightControls = [
                            $("<div>" + b.DisplayingRecords + "&nbsp;</div>"),
                            $('<div data-role="record-first">0</div>'),
                            $("<div>-</div>"),
                            $('<div data-role="record-last">0</div>'),
                            $("<div>" + b.Of + "</div>"),
                            $('<div data-role="record-total">0</div>'),
                        ]);
            },
            localizationMaterialDesign: function (a) {
                var b = gj.grid.messages[a.locale];
                void 0 === a.pager.leftControls && (a.pager.leftControls = []),
                    void 0 === a.pager.rightControls &&
                        (a.pager.rightControls = [
                            $('<span class="">' + b.RowsPerPage + "</span>"),
                            $('<select data-role="page-size" class="gj-grid-md-limit-select" width="52"></select></div>'),
                            $('<span class="gj-md-spacer-32">&nbsp;</span>'),
                            $('<span data-role="record-first" class="">0</span>'),
                            $('<span class="">-</span>'),
                            $('<span data-role="record-last" class="">0</span>'),
                            $('<span class="gj-grid-mdl-pager-label">' + b.Of + "</span>"),
                            $('<span data-role="record-total" class="">0</span>'),
                            $('<span class="gj-md-spacer-32">&nbsp;</span>'),
                            $('<button class="gj-button-md">' + (a.icons.previous || b.Previous) + "</button>")
                                .attr("title", b.PreviousPageTooltip)
                                .attr("data-role", "page-previous")
                                .addClass(a.icons.first ? "gj-button-md-icon" : ""),
                            $('<span class="gj-md-spacer-24">&nbsp;</span>'),
                            $('<button class="gj-button-md">' + (a.icons.next || b.Next) + "</button>")
                                .attr("title", b.NextPageTooltip)
                                .attr("data-role", "page-next")
                                .addClass(a.icons.first ? "gj-button-md-icon" : ""),
                        ]);
            },
            initPagerControl: function (a, b) {
                var c = b.data();
                switch (a.data("role")) {
                    case "page-size":
                        c.pager.sizes && 0 < c.pager.sizes.length
                            ? (a.show(),
                              $.each(c.pager.sizes, function () {
                                  a.append($("<option/>").attr("value", this.toString()).text(this.toString()));
                              }),
                              a.change(function () {
                                  var a = parseInt(this.value, 10);
                                  (c.params[c.paramNames.limit] = a), gj.grid.plugins.pagination.private.changePage(b, 1), gj.grid.plugins.pagination.events.pageSizeChange(b, a);
                              }),
                              a.val(c.params[c.paramNames.limit]),
                              gj.dropdown && a.dropdown({ uiLibrary: c.uiLibrary, iconsLibrary: c.iconsLibrary, fontSize: a.css("font-size"), style: { presenter: "btn btn-default btn-sm" } }))
                            : a.hide();
                        break;
                    case "page-refresh":
                        a.on("click", function () {
                            b.reload();
                        });
                }
            },
            reloadPager: function (a, b) {
                var c, d, e, f, g, h, i, j;
                if (((h = a.data()), h.pager)) {
                    for (
                        c = 0 === b ? 0 : parseInt(h.params[h.paramNames.page], 10),
                            d = parseInt(h.params[h.paramNames.limit], 10),
                            e = Math.ceil(b / d),
                            f = 0 === c ? 0 : d * (c - 1) + 1,
                            g = f + d > b ? b : f + d - 1,
                            i = a.find("TFOOT [data-role]"),
                            j = 0;
                        j < i.length;
                        j++
                    )
                        gj.grid.plugins.pagination.private.reloadPagerControl($(i[j]), a, c, e, f, g, b);
                    gj.grid.plugins.pagination.private.updatePagerColSpan(a);
                }
            },
            reloadPagerControl: function (a, b, c, d, e, f, g) {
                var h;
                switch (a.data("role")) {
                    case "page-first":
                        gj.grid.plugins.pagination.private.assignPageHandler(b, a, 1, c < 2);
                        break;
                    case "page-previous":
                        gj.grid.plugins.pagination.private.assignPageHandler(b, a, c - 1, c < 2);
                        break;
                    case "page-number":
                        a.val(c).off("change").on("change", gj.grid.plugins.pagination.private.createChangePageHandler(b, c));
                        break;
                    case "page-label-last":
                        a.text(d);
                        break;
                    case "page-next":
                        gj.grid.plugins.pagination.private.assignPageHandler(b, a, c + 1, d === c);
                        break;
                    case "page-last":
                        gj.grid.plugins.pagination.private.assignPageHandler(b, a, d, d === c);
                        break;
                    case "page-button-one":
                        (h = 1 === c ? 1 : c == d ? c - 2 : c - 1), gj.grid.plugins.pagination.private.assignButtonHandler(b, a, c, h, d);
                        break;
                    case "page-button-two":
                        (h = 1 === c ? 2 : c == d ? d - 1 : c), gj.grid.plugins.pagination.private.assignButtonHandler(b, a, c, h, d);
                        break;
                    case "page-button-three":
                        (h = 1 === c ? c + 2 : c == d ? c : c + 1), gj.grid.plugins.pagination.private.assignButtonHandler(b, a, c, h, d);
                        break;
                    case "record-first":
                        a.text(e);
                        break;
                    case "record-last":
                        a.text(f);
                        break;
                    case "record-total":
                        a.text(g);
                }
            },
            assignPageHandler: function (a, b, c, d) {
                var e = a.data().style.pager;
                d
                    ? b.addClass(e.stateDisabled).prop("disabled", !0).off("click")
                    : b
                          .removeClass(e.stateDisabled)
                          .prop("disabled", !1)
                          .off("click")
                          .on("click", function () {
                              gj.grid.plugins.pagination.private.changePage(a, c);
                          });
            },
            assignButtonHandler: function (a, b, c, d, e) {
                var f = a.data().style.pager;
                d < 1 || d > e
                    ? b.hide()
                    : (b.show().off("click").text(d),
                      d === c
                          ? b.addClass(f.activeButton)
                          : b.removeClass(f.activeButton).on("click", function () {
                                gj.grid.plugins.pagination.private.changePage(a, d);
                            }));
            },
            createChangePageHandler: function (a, b) {
                return function () {
                    var b = (a.data(), parseInt(this.value, 10));
                    gj.grid.plugins.pagination.private.changePage(a, b);
                };
            },
            changePage: function (a, b) {
                var c = a.data();
                !1 === gj.grid.plugins.pagination.events.pageChanging(a, b) || isNaN(b) || (a.find('TFOOT [data-role="page-number"]').val(b), (c.params[c.paramNames.page] = b)), a.reload();
            },
            updatePagerColSpan: function (a) {
                var b = a.find('tfoot > tr[data-role="pager"] > th');
                b && b.length && b.attr("colspan", gj.grid.methods.countVisibleColumns(a));
            },
            isLastRecordVisible: function (a) {
                var b = !0,
                    c = a.data(),
                    d = parseInt(c.params[c.paramNames.limit], 10),
                    e = parseInt(c.params[c.paramNames.page], 10),
                    f = a.count();
                return d && e && (b = (e - 1) * d + f === c.totalRecords), b;
            },
        },
        public: {
            getAll: function (a) {
                var b,
                    c,
                    d,
                    e = this.data();
                return $.isArray(e.dataSource)
                    ? a
                        ? e.dataSource
                        : e.params[e.paramNames.limit] && e.params[e.paramNames.page]
                        ? ((b = parseInt(e.params[e.paramNames.limit], 10)), (c = parseInt(e.params[e.paramNames.page], 10)), (d = (c - 1) * b), e.records.slice(d, d + b))
                        : e.records
                    : e.records;
            },
        },
        events: {
            pageSizeChange: function (a, b) {
                a.triggerHandler("pageSizeChange", [b]);
            },
            pageChanging: function (a, b) {
                a.triggerHandler("pageChanging", [b]);
            },
        },
        configure: function (a, b, c) {
            $.extend(!0, a, gj.grid.plugins.pagination.public);
            a.data();
            c.pager &&
                ((gj.grid.methods.isLastRecordVisible = gj.grid.plugins.pagination.private.isLastRecordVisible),
                a.on("initialized", function () {
                    gj.grid.plugins.pagination.private.init(a);
                }),
                a.on("dataBound", function (b, c, d) {
                    gj.grid.plugins.pagination.private.reloadPager(a, d);
                }),
                a.on("columnShow", function () {
                    gj.grid.plugins.pagination.private.updatePagerColSpan(a);
                }),
                a.on("columnHide", function () {
                    gj.grid.plugins.pagination.private.updatePagerColSpan(a);
                }));
        },
    }),
    (gj.grid.plugins.responsiveDesign = {
        config: { base: { resizeCheckInterval: 500, responsive: !1, showHiddenColumnsAsDetails: !1, defaultColumn: { priority: void 0, minWidth: 250 }, style: { rowDetailItem: "" } }, bootstrap: { style: { rowDetailItem: "col-lg-4" } } },
        private: {
            orderColumns: function (a) {
                var b = [];
                if (a.columns && a.columns.length) {
                    for (i = 0; i < a.columns.length; i++) b.push({ position: i, field: a.columns[i].field, minWidth: a.columns[i].width || a.columns[i].minWidth || a.defaultColumn.minWidth, priority: a.columns[i].priority || 0 });
                    b.sort(function (a, b) {
                        var c = 0;
                        return a.priority < b.priority ? (c = -1) : a.priority > b.priority && (c = 1), c;
                    });
                }
                return b;
            },
            updateDetails: function (a) {
                var b, c, d, e, f, g, h, i, j;
                for (b = a.find('tbody > tr[data-role="row"]'), c = a.data(), d = 0; d < b.length; d++) {
                    for (f = $(b[d]), g = f.data("details"), e = 0; e < c.columns.length; e++)
                        (i = c.columns[e]),
                            (h = g && g.find('div[data-id="' + i.field + '"]')),
                            c.columns[e].hidden
                                ? ((j = "<b>" + (i.title || i.field) + "</b>: {" + i.field + "}"),
                                  h && h.length ? h.empty().html(j) : ((h = $('<div data-id="' + i.field + '"/>').html(j)), h.addClass(c.style.rowDetailItem), (g && g.length) || (g = $('<div class="row"/>')), g.append(h)))
                                : h && h.length && h.remove();
                    a.updateDetails(f);
                }
            },
        },
        public: {
            oldWidth: void 0,
            resizeCheckIntervalId: void 0,
            makeResponsive: function () {
                var a,
                    b,
                    c = 0,
                    d = this.data(),
                    e = gj.grid.plugins.responsiveDesign.private.orderColumns(d);
                for (a = 0; a < e.length; a++) (b = this.find("thead>tr>th:eq(" + e[a].position + ")")), b.is(":visible") && e[a].minWidth < b.width() && (c += b.width() - e[a].minWidth);
                if (c) for (a = 0; a < e.length; a++) (b = this.find("thead>tr>th:eq(" + e[a].position + ")")), !b.is(":visible") && e[a].minWidth <= c && (this.showColumn(e[a].field), (c -= b.width()));
                for (a = e.length - 1; a >= 0; a--) (b = this.find("thead>tr>th:eq(" + e[a].position + ")")), b.is(":visible") && e[a].priority && e[a].minWidth > b.outerWidth() && this.hideColumn(e[a].field);
                return this;
            },
        },
        events: {
            resize: function (a, b, c) {
                a.triggerHandler("resize", [b, c]);
            },
        },
        configure: function (a, b, c) {
            $.extend(!0, a, gj.grid.plugins.responsiveDesign.public),
                b.responsive &&
                    (a.on("initialized", function () {
                        a.makeResponsive(),
                            (a.oldWidth = a.width()),
                            (a.resizeCheckIntervalId = setInterval(function () {
                                var b = a.width();
                                b !== a.oldWidth && gj.grid.plugins.responsiveDesign.events.resize(a, b, a.oldWidth), (a.oldWidth = b);
                            }, b.resizeCheckInterval));
                    }),
                    a.on("destroy", function () {
                        a.resizeCheckIntervalId && clearInterval(a.resizeCheckIntervalId);
                    }),
                    a.on("resize", function () {
                        a.makeResponsive();
                    })),
                b.showHiddenColumnsAsDetails &&
                    gj.grid.plugins.expandCollapseRows &&
                    (a.on("dataBound", function () {
                        gj.grid.plugins.responsiveDesign.private.updateDetails(a);
                    }),
                    a.on("columnHide", function () {
                        gj.grid.plugins.responsiveDesign.private.updateDetails(a);
                    }),
                    a.on("columnShow", function () {
                        gj.grid.plugins.responsiveDesign.private.updateDetails(a);
                    }),
                    a.on("rowDataBound", function () {
                        gj.grid.plugins.responsiveDesign.private.updateDetails(a);
                    }));
        },
    }),
    (gj.grid.plugins.toolbar = {
        config: {
            base: { toolbarTemplate: void 0, title: void 0, style: { toolbar: "gj-grid-md-toolbar" } },
            bootstrap: { style: { toolbar: "gj-grid-bootstrap-toolbar" } },
            bootstrap4: { style: { toolbar: "gj-grid-bootstrap-4-toolbar" } },
        },
        private: {
            init: function (a) {
                var b, c, d;
                (b = a.data()),
                    (c = a.prev('div[data-role="toolbar"]')),
                    (void 0 !== b.toolbarTemplate || void 0 !== b.title || c.length > 0) &&
                        (0 === c.length && ((c = $('<div data-role="toolbar"></div>')), a.before(c)),
                        c.addClass(b.style.toolbar),
                        0 === c.children().length && b.toolbarTemplate && c.append(b.toolbarTemplate),
                        (d = c.find('[data-role="title"]')),
                        0 === d.length && ((d = $('<div data-role="title"/>')), c.prepend(d)),
                        b.title && d.text(b.title),
                        b.minWidth && c.css("min-width", b.minWidth));
            },
        },
        public: {
            title: function (a) {
                var b = this.parent().find('div[data-role="toolbar"] [data-role="title"]');
                return void 0 !== a ? (b.text(a), this) : b.text();
            },
        },
        configure: function (a) {
            $.extend(!0, a, gj.grid.plugins.toolbar.public),
                a.on("initialized", function () {
                    gj.grid.plugins.toolbar.private.init(a);
                }),
                a.on("destroying", function () {
                    a.prev('[data-role="toolbar"]').remove();
                });
        },
    }),
    (gj.grid.plugins.resizableColumns = {
        config: { base: { resizableColumns: !1 } },
        private: {
            init: function (a, b) {
                var c, d, e, f, g, h;
                if (((c = a.find('thead tr[data-role="caption"] th')), c.length)) {
                    for (e = 0; e < c.length - 1; e++)
                        (d = $(c[e])),
                            (f = $('<div class="gj-grid-column-resizer-wrapper" />')),
                            (h = parseInt(d.css("padding-right"), 10) + 3),
                            (g = $('<span class="gj-grid-column-resizer" />').css("margin-right", "-" + h + "px")),
                            g.draggable({
                                start: function () {
                                    a.addClass("gj-unselectable"), a.addClass("gj-grid-resize-cursor");
                                },
                                stop: function () {
                                    a.removeClass("gj-unselectable"), a.removeClass("gj-grid-resize-cursor"), this.style.removeProperty("top"), this.style.removeProperty("left"), this.style.removeProperty("position");
                                },
                                drag: gj.grid.plugins.resizableColumns.private.createResizeHandle(a, d, b.columns[e]),
                            }),
                            d.append(f.append(g));
                    for (e = 0; e < c.length; e++) (d = $(c[e])), d.attr("width") || d.attr("width", d.outerWidth());
                }
            },
            createResizeHandle: function (a, b, c) {
                var d = a.data();
                return function (e, f) {
                    var g,
                        h,
                        i,
                        j,
                        k,
                        l,
                        m = parseInt(b.attr("width"), 10),
                        n = gj.core.position(this),
                        o = { top: f.top - n.top, left: f.left - n.left };
                    if (
                        (m || (m = b.outerWidth()),
                        o.left &&
                            ((k = m + o.left),
                            (c.width = k),
                            b.attr("width", k),
                            (h = b[0].cellIndex),
                            (j = b[0].parentElement.children[h + 1]),
                            (l = parseInt($(j).attr("width"), 10) - o.left),
                            j.setAttribute("width", l),
                            d.resizableColumns))
                    )
                        for (i = a[0].tBodies[0].children, g = 0; g < i.length; g++) i[g].cells[h].setAttribute("width", k), (j = i[g].cells[h + 1]), j.setAttribute("width", l);
                };
            },
        },
        public: {},
        configure: function (a, b, c) {
            $.extend(!0, a, gj.grid.plugins.resizableColumns.public),
                b.resizableColumns &&
                    gj.draggable &&
                    a.on("initialized", function () {
                        gj.grid.plugins.resizableColumns.private.init(a, b);
                    });
        },
    }),
    (gj.grid.plugins.rowReorder = {
        config: { base: { rowReorder: !1, rowReorderColumn: void 0, orderNumberField: void 0, style: { targetRowIndicatorTop: "gj-grid-row-reorder-indicator-top", targetRowIndicatorBottom: "gj-grid-row-reorder-indicator-bottom" } } },
        private: {
            init: function (a) {
                var b,
                    c,
                    d,
                    e = a.find('tbody tr[data-role="row"]');
                for (a.data("rowReorderColumn") && (c = gj.grid.methods.getColumnPosition(a.data("columns"), a.data("rowReorderColumn"))), b = 0; b < e.length; b++)
                    (d = $(e[b])),
                        void 0 !== c ? d.find("td:eq(" + c + ")").on("mousedown", gj.grid.plugins.rowReorder.private.createRowMouseDownHandler(a, d)) : d.on("mousedown", gj.grid.plugins.rowReorder.private.createRowMouseDownHandler(a, d));
            },
            createRowMouseDownHandler: function (a, b) {
                return function (c) {
                    var d,
                        e,
                        f = a.clone(),
                        g = a.data("columns");
                    for (
                        a.addClass("gj-unselectable"),
                            $("body").append(f),
                            f.attr("data-role", "draggable-clone").css("cursor", "move"),
                            f.children("thead").remove().children("tfoot").remove(),
                            f.find('tbody tr:not([data-position="' + b.data("position") + '"])').remove(),
                            e = f.find("tbody tr td"),
                            d = 0;
                        d < e.length;
                        d++
                    )
                        g[d].width && e[d].setAttribute("width", g[d].width);
                    f.draggable({ stop: gj.grid.plugins.rowReorder.private.createDragStopHandler(a, b) }),
                        f.css({ position: "absolute", top: b.offset().top, left: b.offset().left, width: b.width(), zIndex: 1 }),
                        "true" === b.attr("data-droppable") && b.droppable("destroy"),
                        b.siblings('tr[data-role="row"]').each(function () {
                            var a = $(this);
                            "true" === a.attr("data-droppable") && a.droppable("destroy"), a.droppable({ over: gj.grid.plugins.rowReorder.private.createDroppableOverHandler(b), out: gj.grid.plugins.rowReorder.private.droppableOut });
                        }),
                        f.trigger("mousedown");
                };
            },
            createDragStopHandler: function (a, b) {
                return function (c, d) {
                    $('table[data-role="draggable-clone"]').draggable("destroy").remove(),
                        a.removeClass("gj-unselectable"),
                        b.siblings('tr[data-role="row"]').each(function () {
                            var c,
                                e,
                                f,
                                g,
                                h,
                                i = $(this),
                                j = i.data("position"),
                                k = b.data("position"),
                                l = a.data();
                            if (i.droppable("isOver", d)) {
                                for (j < k ? i.before(b) : i.after(b), l.records.splice(j - 1, 0, l.records.splice(k - 1, 1)[0]), c = i.parent().find('tr[data-role="row"]'), f = 0; f < c.length; f++) $(c[f]).attr("data-position", f + 1);
                                if (l.orderNumberField) {
                                    for (f = 0; f < l.records.length; f++) l.records[f][l.orderNumberField] = f + 1;
                                    for (f = 0; f < c.length; f++)
                                        (e = $(c[f])),
                                            (h = gj.grid.methods.getId(e, l.primaryKey, e.attr("data-position"))),
                                            (g = gj.grid.methods.getByPosition(a, e.attr("data-position"))),
                                            a.setCellContent(h, l.orderNumberField, g[l.orderNumberField]);
                                }
                            }
                            i.removeClass("gj-grid-top-border"), i.removeClass("gj-grid-bottom-border"), i.droppable("destroy");
                        });
                };
            },
            createDroppableOverHandler: function (a) {
                return function (b) {
                    var c = $(this);
                    c.data("position") < a.data("position") ? c.addClass("gj-grid-top-border") : c.addClass("gj-grid-bottom-border");
                };
            },
            droppableOut: function () {
                $(this).removeClass("gj-grid-top-border"), $(this).removeClass("gj-grid-bottom-border");
            },
        },
        public: {},
        configure: function (a, b, c) {
            $.extend(!0, a, gj.grid.plugins.rowReorder.public),
                b.rowReorder &&
                    gj.draggable &&
                    gj.droppable &&
                    a.on("dataBound", function () {
                        gj.grid.plugins.rowReorder.private.init(a);
                    });
        },
    }),
    (gj.grid.plugins.export = {
        config: { base: {} },
        public: {
            getCSV: function (a) {
                var b,
                    c,
                    d = "",
                    e = "",
                    f = this.data().columns,
                    g = this.getAll(a);
                if (g.length) {
                    for (b = 0; b < f.length; b++) gj.grid.plugins.export.public.isColumnApplicable(f[b]) && (d += '"' + (f[b].title || f[b].field).replace(/<[^>]+>/g, " ") + '",');
                    for (e += d.slice(0, d.length - 1) + "\r\n", b = 0; b < g.length; b++) {
                        for (d = "", c = 0; c < f.length; c++) gj.grid.plugins.export.public.isColumnApplicable(f[c]) && (d += '"' + g[b][f[c].field] + '",');
                        e += d.slice(0, d.length - 1) + "\r\n";
                    }
                }
                return e;
            },
            downloadCSV: function (a, b) {
                var c = document.createElement("a");
                return (
                    document.body.appendChild(c),
                    (c.download = a || "griddata.csv"),
                    window.navigator.userAgent.indexOf("Edge") > -1 ? (c.href = URL.createObjectURL(new Blob([this.getCSV(b)], { type: "text/csv;charset=utf-8;" }))) : (c.href = "data:text/csv;charset=utf-8," + escape(this.getCSV(b))),
                    c.click(),
                    document.body.removeChild(c),
                    this
                );
            },
            isColumnApplicable: function (a) {
                return !0 !== a.hidden && !a.role;
            },
        },
        configure: function (a) {
            $.extend(!0, a, gj.grid.plugins.export.public);
        },
    }),
    (gj.grid.plugins.columnReorder = {
        config: { base: { columnReorder: !1, dragReady: !1, style: { targetRowIndicatorTop: "gj-grid-row-reorder-indicator-top", targetRowIndicatorBottom: "gj-grid-row-reorder-indicator-bottom" } } },
        private: {
            init: function (a) {
                var b,
                    c,
                    d = a.find("thead tr th");
                for (b = 0; b < d.length; b++)
                    (c = $(d[b])),
                        c.on("mousedown", gj.grid.plugins.columnReorder.private.createMouseDownHandler(a, c)),
                        c.on("mousemove", gj.grid.plugins.columnReorder.private.createMouseMoveHandler(a, c)),
                        c.on("mouseup", gj.grid.plugins.columnReorder.private.createMouseUpHandler(a, c));
            },
            createMouseDownHandler: function (a) {
                return function (b) {
                    a.timeout = setTimeout(function () {
                        a.data("dragReady", !0);
                    }, 100);
                };
            },
            createMouseUpHandler: function (a) {
                return function (b) {
                    clearTimeout(a.timeout), a.data("dragReady", !1);
                };
            },
            createMouseMoveHandler: function (a, b) {
                return function (c) {
                    var d, e;
                    a.data("dragReady") &&
                        (a.data("dragReady", !1),
                        (d = a.clone()),
                        (e = b.index()),
                        a.addClass("gj-unselectable"),
                        $("body").append(d),
                        d.attr("data-role", "draggable-clone").css("cursor", "move"),
                        d
                            .find("thead tr th:eq(" + e + ")")
                            .siblings()
                            .remove(),
                        d.find('tbody tr[data-role != "row"]').remove(),
                        d
                            .find("tbody tr td:nth-child(" + (e + 1) + ")")
                            .siblings()
                            .remove(),
                        d.find("tfoot").remove(),
                        d.draggable({ stop: gj.grid.plugins.columnReorder.private.createDragStopHandler(a, b) }),
                        d.css({ position: "absolute", top: b.offset().top, left: b.offset().left, width: b.width(), zIndex: 1 }),
                        "true" === b.attr("data-droppable") && b.droppable("destroy"),
                        b.siblings("th").each(function () {
                            var c = $(this);
                            "true" === c.attr("data-droppable") && c.droppable("destroy"),
                                c.droppable({ over: gj.grid.plugins.columnReorder.private.createDroppableOverHandler(a, b), out: gj.grid.plugins.columnReorder.private.droppableOut });
                        }),
                        d.trigger("mousedown"));
                };
            },
            createDragStopHandler: function (a, b) {
                return function (c, d) {
                    $('table[data-role="draggable-clone"]').draggable("destroy").remove(),
                        a.removeClass("gj-unselectable"),
                        b.siblings("th").each(function () {
                            var c = $(this),
                                e = a.data(),
                                f = gj.grid.methods.getColumnPosition(e.columns, c.data("field")),
                                g = gj.grid.methods.getColumnPosition(e.columns, b.data("field"));
                            c.removeClass("gj-grid-left-border").removeClass("gj-grid-right-border"),
                                c
                                    .closest("table")
                                    .find('tbody tr[data-role="row"] td:nth-child(' + (c.index() + 1) + ")")
                                    .removeClass("gj-grid-left-border")
                                    .removeClass("gj-grid-right-border"),
                                c.droppable("isOver", d) && (f < g ? c.before(b) : c.after(b), gj.grid.plugins.columnReorder.private.moveRowCells(a, g, f), e.columns.splice(f, 0, e.columns.splice(g, 1)[0])),
                                c.droppable("destroy");
                        });
                };
            },
            moveRowCells: function (a, b, c) {
                var d,
                    e,
                    f = a.find('tbody tr[data-role="row"]');
                for (d = 0; d < f.length; d++) (e = $(f[d])), c < b ? e.find("td:eq(" + c + ")").before(e.find("td:eq(" + b + ")")) : e.find("td:eq(" + c + ")").after(e.find("td:eq(" + b + ")"));
            },
            createDroppableOverHandler: function (a, b) {
                return function (c) {
                    var d = $(this),
                        e = a.data();
                    gj.grid.methods.getColumnPosition(e.columns, d.data("field")) < gj.grid.methods.getColumnPosition(e.columns, b.data("field"))
                        ? (d.addClass("gj-grid-left-border"), a.find('tbody tr[data-role="row"] td:nth-child(' + (d.index() + 1) + ")").addClass("gj-grid-left-border"))
                        : (d.addClass("gj-grid-right-border"), a.find('tbody tr[data-role="row"] td:nth-child(' + (d.index() + 1) + ")").addClass("gj-grid-right-border"));
                };
            },
            droppableOut: function () {
                var a = $(this);
                a.removeClass("gj-grid-left-border").removeClass("gj-grid-right-border"),
                    a
                        .closest("table")
                        .find('tbody tr[data-role="row"] td:nth-child(' + (a.index() + 1) + ")")
                        .removeClass("gj-grid-left-border")
                        .removeClass("gj-grid-right-border");
            },
        },
        public: {},
        configure: function (a, b, c) {
            $.extend(!0, a, gj.grid.plugins.columnReorder.public),
                b.columnReorder &&
                    a.on("initialized", function () {
                        gj.grid.plugins.columnReorder.private.init(a);
                    });
        },
    }),
    (gj.grid.plugins.headerFilter = {
        config: { base: { defaultColumnSettings: { filterable: !0 }, headerFilter: { type: "onenterkeypress" } } },
        private: {
            init: function (a) {
                var b,
                    c,
                    d,
                    e = a.data(),
                    f = $('<tr data-role="filter"/>');
                for (b = 0; b < e.columns.length; b++)
                    (c = $("<th/>")),
                        e.columns[b].filterable &&
                            ((d = $('<input data-field="' + e.columns[b].field + '" class="gj-width-full" />')),
                            "onchange" === e.headerFilter.type
                                ? d.on("input propertychange", function (b) {
                                      gj.grid.plugins.headerFilter.private.reload(a, $(this));
                                  })
                                : (d.on("keypress", function (b) {
                                      13 == b.which && gj.grid.plugins.headerFilter.private.reload(a, $(this));
                                  }),
                                  d.on("blur", function (b) {
                                      gj.grid.plugins.headerFilter.private.reload(a, $(this));
                                  })),
                            c.append(d)),
                        e.columns[b].hidden && c.hide(),
                        f.append(c);
                a.children("thead").append(f);
            },
            reload: function (a, b) {
                var c = {};
                (c[b.data("field")] = b.val()), a.reload(c);
            },
        },
        public: {},
        events: {},
        configure: function (a, b, c) {
            $.extend(!0, a, gj.grid.plugins.headerFilter.public);
            a.data();
            c.headerFilter &&
                a.on("initialized", function () {
                    gj.grid.plugins.headerFilter.private.init(a);
                });
        },
    }),
    (gj.grid.plugins.grouping = {
        config: {
            base: {
                paramNames: { groupBy: "groupBy", groupByDirection: "groupByDirection" },
                grouping: { groupBy: void 0, direction: "asc" },
                icons: { expandGroup: '<i class="gj-icon plus" />', collapseGroup: '<i class="gj-icon minus" />' },
            },
            fontawesome: { icons: { expandGroup: '<i class="fa fa-plus" aria-hidden="true"></i>', collapseGroup: '<i class="fa fa-minus" aria-hidden="true"></i>' } },
            glyphicons: { icons: { expandGroup: '<span class="glyphicon glyphicon-plus" />', collapseGroup: '<span class="glyphicon glyphicon-minus" />' } },
        },
        private: {
            init: function (a) {
                var b,
                    c = a.data();
                (b = void 0),
                    a.on("rowDataBound", function (d, e, f, g) {
                        if (b !== g[c.grouping.groupBy] || 1 === e[0].rowIndex) {
                            var h = gj.grid.methods.countVisibleColumns(a) - 1,
                                i = $('<tr role="group" />'),
                                j = $('<td class="gj-text-align-center gj-unselectable gj-cursor-pointer" />');
                            j.append('<div data-role="display">' + c.icons.collapseGroup + "</div>"),
                                j.on("click", gj.grid.plugins.grouping.private.createExpandCollapseHandler(c)),
                                i.append(j),
                                i.append('<td colspan="' + h + '"><div data-role="display">' + c.grouping.groupBy + ": " + g[c.grouping.groupBy] + "</div></td>"),
                                i.insertBefore(e),
                                (b = g[c.grouping.groupBy]);
                        }
                        e.show();
                    }),
                    (c.params[c.paramNames.groupBy] = c.grouping.groupBy),
                    (c.params[c.paramNames.groupByDirection] = c.grouping.direction);
            },
            grouping: function (a, b) {
                var c = a.data();
                b.sort(gj.grid.methods.createDefaultSorter(c.grouping.direction, c.grouping.groupBy));
            },
            createExpandCollapseHandler: function (a) {
                return function (b) {
                    var c = $(this),
                        d = gj.grid.plugins.grouping.private;
                    "row" === c.closest("tr").next(":visible").data("role") ? d.collapseGroup(a, c) : d.expandGroup(a, c);
                };
            },
            collapseGroup: function (a, b) {
                var c = b.children('div[data-role="display"]');
                b.closest("tr").nextUntil('[role="group"]').hide(), c.empty().append(a.icons.expandGroup);
            },
            expandGroup: function (a, b) {
                var c = b.children('div[data-role="display"]');
                b.closest("tr").nextUntil('[role="group"]').show(), c.empty().append(a.icons.collapseGroup);
            },
        },
        public: {},
        configure: function (a) {
            var b,
                c = a.data();
            $.extend(!0, a, gj.grid.plugins.grouping.public),
                c.grouping &&
                    c.grouping.groupBy &&
                    ((b = { title: "", width: c.defaultIconColumnWidth, align: "center", stopPropagation: !0, cssClass: "gj-cursor-pointer gj-unselectable" }),
                    (c.columns = [b].concat(c.columns)),
                    a.on("initialized", function () {
                        gj.grid.plugins.grouping.private.init(a);
                    }),
                    a.on("dataFiltered", function (b, c) {
                        gj.grid.plugins.grouping.private.grouping(a, c);
                    }));
        },
    }),
    (gj.grid.messages["en-us"] = {
        First: "First",
        Previous: "Previous",
        Next: "Next",
        Last: "Last",
        Page: "Page",
        FirstPageTooltip: "First Page",
        PreviousPageTooltip: "Previous Page",
        NextPageTooltip: "Next Page",
        LastPageTooltip: "Last Page",
        Refresh: "Refresh",
        Of: "of",
        DisplayingRecords: "Displaying records",
        RowsPerPage: "Rows per page:",
        Edit: "Edit",
        Delete: "Delete",
        Update: "Update",
        Cancel: "Cancel",
        NoRecordsFound: "No records found.",
        Loading: "Loading...",
    }),
    (gj.tree = { plugins: {} }),
    (gj.tree.config = {
        base: {
            params: {},
            autoLoad: !0,
            selectionType: "single",
            cascadeSelection: !1,
            dataSource: void 0,
            primaryKey: void 0,
            textField: "text",
            childrenField: "children",
            hasChildrenField: "hasChildren",
            imageCssClassField: "imageCssClass",
            imageUrlField: "imageUrl",
            imageHtmlField: "imageHtml",
            disabledField: "disabled",
            width: void 0,
            border: !1,
            uiLibrary: "materialdesign",
            iconsLibrary: "materialicons",
            autoGenId: 1,
            autoGenFieldName: "autoId_b5497cc5-7ef3-49f5-a7dc-4a932e1aee4a",
            indentation: 24,
            style: { wrapper: "gj-unselectable", list: "gj-list gj-list-md", item: void 0, active: "gj-list-md-active", leafIcon: void 0, border: "gj-tree-md-border" },
            icons: { expand: '<i class="gj-icon chevron-right" />', collapse: '<i class="gj-icon chevron-down" />' },
        },
        bootstrap: { style: { wrapper: "gj-unselectable gj-tree-bootstrap-3", list: "gj-list gj-list-bootstrap list-group", item: "list-group-item", active: "active", border: "gj-tree-bootstrap-border" }, iconsLibrary: "glyphicons" },
        bootstrap4: {
            style: { wrapper: "gj-unselectable gj-tree-bootstrap-4", list: "gj-list gj-list-bootstrap", item: "list-group-item", active: "active", border: "gj-tree-bootstrap-border" },
            icons: { expand: '<i class="gj-icon plus" />', collapse: '<i class="gj-icon minus" />' },
        },
        materialicons: { style: { expander: "gj-tree-material-icons-expander" } },
        fontawesome: { style: { expander: "gj-tree-font-awesome-expander" }, icons: { expand: '<i class="fa fa-plus" aria-hidden="true"></i>', collapse: '<i class="fa fa-minus" aria-hidden="true"></i>' } },
        glyphicons: { style: { expander: "gj-tree-glyphicons-expander" }, icons: { expand: '<span class="glyphicon glyphicon-plus" />', collapse: '<span class="glyphicon glyphicon-minus" />' } },
    }),
    (gj.tree.events = {
        initialized: function (a) {
            a.triggerHandler("initialized");
        },
        dataBinding: function (a) {
            a.triggerHandler("dataBinding");
        },
        dataBound: function (a) {
            a.triggerHandler("dataBound");
        },
        select: function (a, b, c) {
            return a.triggerHandler("select", [b, c]);
        },
        unselect: function (a, b, c) {
            return a.triggerHandler("unselect", [b, c]);
        },
        expand: function (a, b, c) {
            return a.triggerHandler("expand", [b, c]);
        },
        collapse: function (a, b, c) {
            return a.triggerHandler("collapse", [b, c]);
        },
        enable: function (a, b) {
            return a.triggerHandler("enable", [b]);
        },
        disable: function (a, b) {
            return a.triggerHandler("disable", [b]);
        },
        destroying: function (a) {
            return a.triggerHandler("destroying");
        },
        nodeDataBound: function (a, b, c, d) {
            return a.triggerHandler("nodeDataBound", [b, c, d]);
        },
    }),
    (gj.tree.methods = {
        init: function (a) {
            return gj.widget.prototype.init.call(this, a, "tree"), gj.tree.methods.initialize.call(this), this.data("autoLoad") && this.reload(), this;
        },
        initialize: function () {
            var a = this.data(),
                b = $('<ul class="' + a.style.list + '"/>');
            this.empty().addClass(a.style.wrapper).append(b), a.width && this.width(a.width), a.border && this.addClass(a.style.border), gj.tree.events.initialized(this);
        },
        useHtmlDataSource: function (a, b) {
            b.dataSource = [];
        },
        render: function (a, b) {
            var c;
            return b && ("string" == typeof b && JSON && (b = JSON.parse(b)), (c = a.data()), (c.records = b), c.primaryKey || gj.tree.methods.genAutoId(c, c.records), gj.tree.methods.loadData(a)), a;
        },
        filter: function (a) {
            return a.data().dataSource;
        },
        genAutoId: function (a, b) {
            var c;
            for (c = 0; c < b.length; c++) (b[c][a.autoGenFieldName] = a.autoGenId++), b[c][a.childrenField] && b[c][a.childrenField].length && gj.tree.methods.genAutoId(a, b[c][a.childrenField]);
        },
        loadData: function (a) {
            var b,
                c = a.data("records"),
                d = a.children("ul");
            for (gj.tree.events.dataBinding(a), d.off().empty(), b = 0; b < c.length; b++) gj.tree.methods.appendNode(a, d, c[b], 1);
            gj.tree.events.dataBound(a);
        },
        appendNode: function (a, b, c, d, e) {
            var f,
                g,
                h,
                i,
                j,
                k = a.data(),
                l = k.primaryKey ? c[k.primaryKey] : c[k.autoGenFieldName];
            if (
                ((g = $('<li data-id="' + l + '" data-role="node" />').addClass(k.style.item)),
                ($wrapper = $('<div data-role="wrapper" />')),
                ($expander = $('<span data-role="expander" data-mode="close"></span>').addClass(k.style.expander)),
                ($display = $('<span data-role="display">' + c[k.textField] + "</span>")),
                (hasChildren = void 0 !== c[k.hasChildrenField] && "true" === c[k.hasChildrenField].toString().toLowerCase()),
                (disabled = void 0 !== c[k.disabledField] && "true" === c[k.disabledField].toString().toLowerCase()),
                k.indentation && $wrapper.append('<span data-role="spacer" style="width: ' + k.indentation * (d - 1) + 'px;"></span>'),
                disabled ? gj.tree.methods.disableNode(a, g) : ($expander.on("click", gj.tree.methods.expanderClickHandler(a)), $display.on("click", gj.tree.methods.displayClickHandler(a))),
                $wrapper.append($expander),
                $wrapper.append($display),
                g.append($wrapper),
                e ? b.find("li:eq(" + (e - 1) + ")").before(g) : b.append(g),
                k.imageCssClassField && c[k.imageCssClassField]
                    ? ((i = $('<span data-role="image"><span class="' + c[k.imageCssClassField] + '"></span></span>')), i.insertBefore($display))
                    : k.imageUrlField && c[k.imageUrlField]
                    ? ((i = $('<span data-role="image"></span>')), i.insertBefore($display), (j = $('<img src="' + c[k.imageUrlField] + '"></img>')), j.attr("width", i.width()).attr("height", i.height()), i.append(j))
                    : k.imageHtmlField && c[k.imageHtmlField] && ((i = $('<span data-role="image">' + c[k.imageHtmlField] + "</span>")), i.insertBefore($display)),
                (c[k.childrenField] && c[k.childrenField].length) || hasChildren)
            ) {
                if (($expander.empty().append(k.icons.expand), (h = $("<ul />").addClass(k.style.list).addClass("gj-hidden")), g.append(h), c[k.childrenField] && c[k.childrenField].length))
                    for (f = 0; f < c[k.childrenField].length; f++) gj.tree.methods.appendNode(a, h, c[k.childrenField][f], d + 1);
            } else k.style.leafIcon ? $expander.addClass(k.style.leafIcon) : $expander.html("&nbsp;");
            gj.tree.events.nodeDataBound(a, g, c.id, c);
        },
        expanderClickHandler: function (a) {
            return function (b) {
                var c = $(this),
                    d = c.closest("li");
                "close" === c.attr("data-mode") ? a.expand(d) : a.collapse(d);
            };
        },
        expand: function (a, b, c) {
            var d,
                e,
                f = b.find('>[data-role="wrapper"]>[data-role="expander"]'),
                g = a.data(),
                h = b.attr("data-id"),
                i = b.children("ul");
            if (!1 !== gj.tree.events.expand(a, b, h) && i && i.length && (i.show(), f.attr("data-mode", "open"), f.empty().append(g.icons.collapse), c))
                for (d = b.find("ul>li"), e = 0; e < d.length; e++) gj.tree.methods.expand(a, $(d[e]), c);
            return a;
        },
        collapse: function (a, b, c) {
            var d,
                e,
                f = b.find('>[data-role="wrapper"]>[data-role="expander"]'),
                g = a.data(),
                h = b.attr("data-id"),
                i = b.children("ul");
            if (!1 !== gj.tree.events.collapse(a, b, h) && i && i.length && (i.hide(), f.attr("data-mode", "close"), f.empty().append(g.icons.expand), c))
                for (d = b.find("ul>li"), e = 0; e < d.length; e++) gj.tree.methods.collapse(a, $(d[e]), c);
            return a;
        },
        expandAll: function (a) {
            var b,
                c = a.find("ul>li");
            for (b = 0; b < c.length; b++) gj.tree.methods.expand(a, $(c[b]), !0);
            return a;
        },
        collapseAll: function (a) {
            var b,
                c = a.find("ul>li");
            for (b = 0; b < c.length; b++) gj.tree.methods.collapse(a, $(c[b]), !0);
            return a;
        },
        displayClickHandler: function (a) {
            return function (b) {
                var c = $(this),
                    d = c.closest("li"),
                    e = a.data().cascadeSelection;
                "true" === d.attr("data-selected") ? gj.tree.methods.unselect(a, d, e) : ("single" === a.data("selectionType") && gj.tree.methods.unselectAll(a), gj.tree.methods.select(a, d, e));
            };
        },
        selectAll: function (a) {
            var b,
                c = a.find("ul>li");
            for (b = 0; b < c.length; b++) gj.tree.methods.select(a, $(c[b]), !0);
            return a;
        },
        select: function (a, b, c) {
            var d,
                e,
                f = a.data();
            if ("true" !== b.attr("data-selected") && !1 !== gj.tree.events.select(a, b, b.attr("data-id")) && (b.addClass(f.style.active).attr("data-selected", "true"), c))
                for (e = b.find("ul>li"), d = 0; d < e.length; d++) gj.tree.methods.select(a, $(e[d]), c);
        },
        unselectAll: function (a) {
            var b,
                c = a.find("ul>li");
            for (b = 0; b < c.length; b++) gj.tree.methods.unselect(a, $(c[b]), !0);
            return a;
        },
        unselect: function (a, b, c) {
            var d, e;
            a.data();
            if ("true" === b.attr("data-selected") && !1 !== gj.tree.events.unselect(a, b, b.attr("data-id")) && (b.removeClass(a.data().style.active).removeAttr("data-selected"), c))
                for (e = b.find("ul>li"), d = 0; d < e.length; d++) gj.tree.methods.unselect(a, $(e[d]), c);
        },
        getSelections: function (a) {
            var b,
                c,
                d,
                e = [],
                f = a.children("li");
            if (f && f.length)
                for (b = 0; b < f.length; b++) (c = $(f[b])), "true" === c.attr("data-selected") ? e.push(c.attr("data-id")) : c.has("ul") && ((d = gj.tree.methods.getSelections(c.children("ul"))), d.length && (e = e.concat(d)));
            return e;
        },
        getDataById: function (a, b, c) {
            var d,
                e = a.data(),
                f = void 0;
            for (d = 0; d < c.length; d++) {
                if (e.primaryKey && c[d][e.primaryKey] == b) {
                    f = c[d];
                    break;
                }
                if (c[d][e.autoGenFieldName] == b) {
                    f = c[d];
                    break;
                }
                if (c[d][e.childrenField] && c[d][e.childrenField].length && (f = gj.tree.methods.getDataById(a, b, c[d][e.childrenField]))) break;
            }
            return f;
        },
        getDataByText: function (a, b, c) {
            var d,
                e = void 0,
                f = a.data();
            for (d = 0; d < c.length; d++) {
                if (b === c[d][f.textField]) {
                    e = c[d];
                    break;
                }
                if (c[d][f.childrenField] && c[d][f.childrenField].length && (e = gj.tree.methods.getDataByText(a, b, c[d][f.childrenField]))) break;
            }
            return e;
        },
        getNodeById: function (a, b) {
            var c,
                d,
                e = void 0,
                f = a.children("li");
            if (f && f.length)
                for (c = 0; c < f.length; c++) {
                    if (((d = $(f[c])), b == d.attr("data-id"))) {
                        e = d;
                        break;
                    }
                    if (d.has("ul") && (e = gj.tree.methods.getNodeById(d.children("ul"), b))) break;
                }
            return e;
        },
        getNodeByText: function (a, b) {
            var c,
                d,
                e = void 0,
                f = a.children("li");
            if (f && f.length)
                for (c = 0; c < f.length; c++) {
                    if (((d = $(f[c])), b === d.find('>[data-role="wrapper"]>[data-role="display"]').text())) {
                        e = d;
                        break;
                    }
                    if (d.has("ul") && (e = gj.tree.methods.getNodeByText(d.children("ul"), b))) break;
                }
            return e;
        },
        addNode: function (a, b, c, d) {
            var e,
                f,
                g = a.data();
            return (
                c && c.length
                    ? ("li" === c[0].tagName.toLowerCase() && (0 === c.children("ul").length && (c.find('[data-role="expander"]').empty().append(g.icons.collapse), c.append($("<ul />").addClass(g.style.list))), (c = c.children("ul"))),
                      (f = a.getDataById(c.parent().data("id"))),
                      f[g.childrenField] || (f[g.childrenField] = []),
                      f[g.childrenField].push(b))
                    : ((c = a.children("ul")), a.data("records").push(b)),
                (e = c.parentsUntil('[data-type="tree"]', "ul").length + 1),
                g.primaryKey || gj.tree.methods.genAutoId(g, [b]),
                gj.tree.methods.appendNode(a, c, b, e, d),
                a
            );
        },
        remove: function (a, b) {
            return gj.tree.methods.removeDataById(a, b.attr("data-id"), a.data("records")), b.remove(), a;
        },
        removeDataById: function (a, b, c) {
            var d,
                e = a.data();
            for (d = 0; d < c.length; d++) {
                if (e.primaryKey && c[d][e.primaryKey] == b) {
                    c.splice(d, 1);
                    break;
                }
                if (c[d][e.autoGenFieldName] == b) {
                    c.splice(d, 1);
                    break;
                }
                c[d][e.childrenField] && c[d][e.childrenField].length && gj.tree.methods.removeDataById(a, b, c[d][e.childrenField]);
            }
        },
        update: function (a, b, c) {
            var d = a.data(),
                e = a.getNodeById(b);
            a.getDataById(b);
            return c, e.find('>[data-role="wrapper"]>[data-role="display"]').html(c[d.textField]), gj.tree.events.nodeDataBound(a, e, b, c), a;
        },
        getChildren: function (a, b, c) {
            var d,
                e,
                f = [],
                c = void 0 === c || c;
            for (e = c ? b.find("ul li") : b.find(">ul>li"), d = 0; d < e.length; d++) f.push($(e[d]).data("id"));
            return f;
        },
        enableAll: function (a) {
            var b,
                c = a.find("ul>li");
            for (b = 0; b < c.length; b++) gj.tree.methods.enableNode(a, $(c[b]), !0);
            return a;
        },
        enableNode: function (a, b, c) {
            var d,
                e,
                f = b.find('>[data-role="wrapper"]>[data-role="expander"]'),
                g = b.find('>[data-role="wrapper"]>[data-role="display"]'),
                c = void 0 === c || c;
            if ((b.removeClass("disabled"), f.on("click", gj.tree.methods.expanderClickHandler(a)), g.on("click", gj.tree.methods.displayClickHandler(a)), gj.tree.events.enable(a, b), c))
                for (e = b.find("ul>li"), d = 0; d < e.length; d++) gj.tree.methods.enableNode(a, $(e[d]), c);
        },
        disableAll: function (a) {
            var b,
                c = a.find("ul>li");
            for (b = 0; b < c.length; b++) gj.tree.methods.disableNode(a, $(c[b]), !0);
            return a;
        },
        disableNode: function (a, b, c) {
            var d,
                e,
                f = b.find('>[data-role="wrapper"]>[data-role="expander"]'),
                g = b.find('>[data-role="wrapper"]>[data-role="display"]'),
                c = void 0 === c || c;
            if ((b.addClass("disabled"), f.off("click"), g.off("click"), gj.tree.events.disable(a, b), c)) for (e = b.find("ul>li"), d = 0; d < e.length; d++) gj.tree.methods.disableNode(a, $(e[d]), c);
        },
        destroy: function (a) {
            return a.data() && (gj.tree.events.destroying(a), a.xhr && a.xhr.abort(), a.off(), a.removeData(), a.removeAttr("data-type"), a.removeClass().empty()), a;
        },
        pathFinder: function (a, b, c, d) {
            var e,
                f = !1;
            for (e = 0; e < b.length; e++) {
                if (b[e].id == c) {
                    f = !0;
                    break;
                }
                if (gj.tree.methods.pathFinder(a, b[e][a.childrenField], c, d)) {
                    d.push(b[e].data[a.textField]), (f = !0);
                    break;
                }
            }
            return f;
        },
    }),
    (gj.tree.widget = function (a, b) {
        var c = this,
            d = gj.tree.methods;
        return (
            (c.reload = function (a) {
                return gj.widget.prototype.reload.call(this, a);
            }),
            (c.render = function (a) {
                return d.render(this, a);
            }),
            (c.addNode = function (a, b, c) {
                return d.addNode(this, a, b, c);
            }),
            (c.removeNode = function (a) {
                return d.remove(this, a);
            }),
            (c.updateNode = function (a, b) {
                return d.update(this, a, b);
            }),
            (c.destroy = function () {
                return d.destroy(this);
            }),
            (c.expand = function (a, b) {
                return d.expand(this, a, b);
            }),
            (c.collapse = function (a, b) {
                return d.collapse(this, a, b);
            }),
            (c.expandAll = function () {
                return d.expandAll(this);
            }),
            (c.collapseAll = function () {
                return d.collapseAll(this);
            }),
            (c.getDataById = function (a) {
                return d.getDataById(this, a, this.data("records"));
            }),
            (c.getDataByText = function (a) {
                return d.getDataByText(this, a, this.data("records"));
            }),
            (c.getNodeById = function (a) {
                return d.getNodeById(this.children("ul"), a);
            }),
            (c.getNodeByText = function (a) {
                return d.getNodeByText(this.children("ul"), a);
            }),
            (c.getAll = function () {
                return this.data("records");
            }),
            (c.select = function (a) {
                return d.select(this, a);
            }),
            (c.unselect = function (a) {
                return d.unselect(this, a);
            }),
            (c.selectAll = function () {
                return d.selectAll(this);
            }),
            (c.unselectAll = function () {
                return d.unselectAll(this);
            }),
            (c.getSelections = function () {
                return d.getSelections(this.children("ul"));
            }),
            (c.getChildren = function (a, b) {
                return d.getChildren(this, a, b);
            }),
            (c.parents = function (a) {
                var b = [],
                    c = this.data();
                return d.pathFinder(c, c.records, a, b), b.reverse();
            }),
            (c.enable = function (a, b) {
                return d.enableNode(this, a, b);
            }),
            (c.enableAll = function () {
                return d.enableAll(this);
            }),
            (c.disable = function (a, b) {
                return d.disableNode(this, a, b);
            }),
            (c.disableAll = function () {
                return d.disableAll(this);
            }),
            $.extend(a, c),
            "tree" !== a.attr("data-type") && d.init.call(a, b),
            a
        );
    }),
    (gj.tree.widget.prototype = new gj.widget()),
    (gj.tree.widget.constructor = gj.tree.widget),
    (function (a) {
        a.fn.tree = function (a) {
            var b;
            if (this && this.length) {
                if ("object" != typeof a && a) {
                    if (((b = new gj.tree.widget(this, null)), b[a])) return b[a].apply(this, Array.prototype.slice.call(arguments, 1));
                    throw "Method " + a + " does not exist.";
                }
                return new gj.tree.widget(this, a);
            }
        };
    })(jQuery),
    (gj.tree.plugins.checkboxes = {
        config: { base: { checkboxes: void 0, checkedField: "checked", cascadeCheck: !0 } },
        private: {
            dataBound: function (a) {
                var b;
                a.data("cascadeCheck") &&
                    ((b = a.find('li[data-role="node"]')),
                    $.each(b, function () {
                        var a = $(this),
                            b = a.find('[data-role="checkbox"] input[type="checkbox"]').checkbox("state");
                        "checked" === b && (gj.tree.plugins.checkboxes.private.updateChildrenState(a, b), gj.tree.plugins.checkboxes.private.updateParentState(a, b));
                    }));
            },
            nodeDataBound: function (a, b, c, d) {
                var e, f, g, h, i;
                0 === b.find('> [data-role="wrapper"] > [data-role="checkbox"]').length &&
                    ((e = a.data()),
                    (f = b.find('> [data-role="wrapper"] > [data-role="expander"]')),
                    (g = $('<input type="checkbox"/>')),
                    (h = $('<span data-role="checkbox"></span>').append(g)),
                    (i = void 0 !== d[e.disabledField] && "true" === d[e.disabledField].toString().toLowerCase()),
                    (g = g.checkbox({
                        uiLibrary: e.uiLibrary,
                        iconsLibrary: e.iconsLibrary,
                        change: function (c, e) {
                            gj.tree.plugins.checkboxes.events.checkboxChange(a, b, d, g.state());
                        },
                    })),
                    i && g.prop("disabled", !0),
                    d[e.checkedField] && g.state("checked"),
                    g.on("click", function (a) {
                        var b = g.closest("li"),
                            c = g.state();
                        e.cascadeCheck && (gj.tree.plugins.checkboxes.private.updateChildrenState(b, c), gj.tree.plugins.checkboxes.private.updateParentState(b, c));
                    }),
                    f.after(h));
            },
            updateParentState: function (a, b) {
                var c, d, e, f, g, h;
                (c = a.parent("ul").parent("li")),
                    1 === c.length &&
                        ((d = a.parent("ul").parent("li").find('> [data-role="wrapper"] > [data-role="checkbox"] input[type="checkbox"]')),
                        (e = a.siblings().find('> [data-role="wrapper"] > span[data-role="checkbox"] input[type="checkbox"]')),
                        (f = "checked" === b),
                        (g = "unchecked" === b),
                        (h = "indeterminate"),
                        $.each(e, function () {
                            var a = $(this).checkbox("state");
                            f && "checked" !== a && (f = !1), g && "unchecked" !== a && (g = !1);
                        }),
                        f && !g && (h = "checked"),
                        !f && g && (h = "unchecked"),
                        d.checkbox("state", h),
                        gj.tree.plugins.checkboxes.private.updateParentState(c, d.checkbox("state")));
            },
            updateChildrenState: function (a, b) {
                var c = a.find('ul li [data-role="wrapper"] [data-role="checkbox"] input[type="checkbox"]');
                c.length > 0 &&
                    $.each(c, function () {
                        $(this).checkbox("state", b);
                    });
            },
            update: function (a, b, c) {
                var d = b.find('[data-role="checkbox"] input[type="checkbox"]').first();
                $(d).checkbox("state", c), a.data().cascadeCheck && (gj.tree.plugins.checkboxes.private.updateChildrenState(b, c), gj.tree.plugins.checkboxes.private.updateParentState(b, c));
            },
        },
        public: {
            getCheckedNodes: function () {
                var a = [],
                    b = this.find('li [data-role="checkbox"] input[type="checkbox"]');
                return (
                    $.each(b, function () {
                        var b = $(this);
                        "checked" === b.checkbox("state") && a.push(b.closest("li").data("id"));
                    }),
                    a
                );
            },
            checkAll: function () {
                var a = this.find('li [data-role="checkbox"] input[type="checkbox"]');
                return (
                    $.each(a, function () {
                        $(this).checkbox("state", "checked");
                    }),
                    this
                );
            },
            uncheckAll: function () {
                var a = this.find('li [data-role="checkbox"] input[type="checkbox"]');
                return (
                    $.each(a, function () {
                        $(this).checkbox("state", "unchecked");
                    }),
                    this
                );
            },
            check: function (a) {
                return gj.tree.plugins.checkboxes.private.update(this, a, "checked"), this;
            },
            uncheck: function (a) {
                return gj.tree.plugins.checkboxes.private.update(this, a, "unchecked"), this;
            },
        },
        events: {
            checkboxChange: function (a, b, c, d) {
                return a.triggerHandler("checkboxChange", [b, c, d]);
            },
        },
        configure: function (a) {
            a.data("checkboxes") &&
                gj.checkbox &&
                ($.extend(!0, a, gj.tree.plugins.checkboxes.public),
                a.on("nodeDataBound", function (b, c, d, e) {
                    gj.tree.plugins.checkboxes.private.nodeDataBound(a, c, d, e);
                }),
                a.on("dataBound", function () {
                    gj.tree.plugins.checkboxes.private.dataBound(a);
                }),
                a.on("enable", function (a, b) {
                    b.find('>[data-role="wrapper"]>[data-role="checkbox"] input[type="checkbox"]').prop("disabled", !1);
                }),
                a.on("disable", function (a, b) {
                    b.find('>[data-role="wrapper"]>[data-role="checkbox"] input[type="checkbox"]').prop("disabled", !0);
                }));
        },
    }),
    (gj.tree.plugins.dragAndDrop = {
        config: {
            base: { dragAndDrop: void 0, style: { dragEl: "gj-tree-drag-el gj-tree-md-drag-el", dropAsChildIcon: "gj-cursor-pointer gj-icon plus", dropAbove: "gj-tree-drop-above", dropBelow: "gj-tree-drop-below" } },
            bootstrap: { style: { dragEl: "gj-tree-drag-el gj-tree-bootstrap-drag-el", dropAsChildIcon: "glyphicon glyphicon-plus", dropAbove: "drop-above", dropBelow: "drop-below" } },
            bootstrap4: { style: { dragEl: "gj-tree-drag-el gj-tree-bootstrap-drag-el", dropAsChildIcon: "gj-cursor-pointer gj-icon plus", dropAbove: "drop-above", dropBelow: "drop-below" } },
        },
        private: {
            nodeDataBound: function (a, b) {
                var c = b.children('[data-role="wrapper"]'),
                    d = b.find('>[data-role="wrapper"]>[data-role="display"]');
                c.length &&
                    d.length &&
                    (d.on("mousedown", gj.tree.plugins.dragAndDrop.private.createNodeMouseDownHandler(a)),
                    d.on("mousemove", gj.tree.plugins.dragAndDrop.private.createNodeMouseMoveHandler(a, b, d)),
                    d.on("mouseup", gj.tree.plugins.dragAndDrop.private.createNodeMouseUpHandler(a)));
            },
            createNodeMouseDownHandler: function (a) {
                return function (b) {
                    a.data("dragReady", !0);
                };
            },
            createNodeMouseUpHandler: function (a) {
                return function (b) {
                    a.data("dragReady", !1);
                };
            },
            createNodeMouseMoveHandler: function (a, b, c) {
                return function (d) {
                    if (a.data("dragReady")) {
                        var e,
                            f,
                            g,
                            h,
                            i = a.data();
                        a.data("dragReady", !1),
                            (e = c
                                .clone()
                                .wrap('<div data-role="wrapper"/>')
                                .closest("div")
                                .wrap('<li class="' + i.style.item + '" />')
                                .closest("li")
                                .wrap('<ul class="' + i.style.list + '" />')
                                .closest("ul")),
                            $("body").append(e),
                            e.attr("data-role", "draggable-clone").addClass("gj-unselectable").addClass(i.style.dragEl),
                            e.find('[data-role="wrapper"]').prepend('<span data-role="indicator" />'),
                            e.draggable({ drag: gj.tree.plugins.dragAndDrop.private.createDragHandler(a, b, c), stop: gj.tree.plugins.dragAndDrop.private.createDragStopHandler(a, b, c) }),
                            (f = c.parent()),
                            (g = c.offset().top),
                            (g -= parseInt(f.css("border-top-width")) + parseInt(f.css("margin-top")) + parseInt(f.css("padding-top"))),
                            (h = c.offset().left),
                            (h -= parseInt(f.css("border-left-width")) + parseInt(f.css("margin-left")) + parseInt(f.css("padding-left"))),
                            (h -= e.find('[data-role="indicator"]').outerWidth(!0)),
                            e.css({ position: "absolute", top: g, left: h, width: c.outerWidth(!0) }),
                            "true" === c.attr("data-droppable") && c.droppable("destroy"),
                            gj.tree.plugins.dragAndDrop.private.getTargetDisplays(a, b, c).each(function () {
                                var a = $(this);
                                "true" === a.attr("data-droppable") && a.droppable("destroy"), a.droppable();
                            }),
                            gj.tree.plugins.dragAndDrop.private.getTargetDisplays(a, b).each(function () {
                                var a = $(this);
                                "true" === a.attr("data-droppable") && a.droppable("destroy"), a.droppable();
                            }),
                            e.trigger("mousedown");
                    }
                };
            },
            getTargetDisplays: function (a, b, c) {
                return a.find('[data-role="display"]').not(c).not(b.find('[data-role="display"]'));
            },
            getTargetWrappers: function (a, b) {
                return a.find('[data-role="wrapper"]').not(b.find('[data-role="wrapper"]'));
            },
            createDragHandler: function (a, b, c) {
                var d = gj.tree.plugins.dragAndDrop.private.getTargetDisplays(a, b, c),
                    e = gj.tree.plugins.dragAndDrop.private.getTargetWrappers(a, b),
                    f = a.data();
                return function (a, b, c) {
                    var g = $(this),
                        h = !1;
                    d.each(function () {
                        var a,
                            b = $(this);
                        if (b.droppable("isOver", c)) return (a = g.find('[data-role="indicator"]')), f.style.dropAsChildIcon ? a.addClass(f.style.dropAsChildIcon) : a.text("+"), (h = !0), !1;
                        g.find('[data-role="indicator"]').removeClass(f.style.dropAsChildIcon).empty();
                    }),
                        e.each(function () {
                            var a,
                                b = $(this);
                            !h && b.droppable("isOver", c)
                                ? ((a = b.position().top + b.outerHeight() / 2), c.y < a ? b.addClass(f.style.dropAbove).removeClass(f.style.dropBelow) : b.addClass(f.style.dropBelow).removeClass(f.style.dropAbove))
                                : b.removeClass(f.style.dropAbove).removeClass(f.style.dropBelow);
                        });
                };
            },
            createDragStopHandler: function (a, b, c) {
                var d = gj.tree.plugins.dragAndDrop.private.getTargetDisplays(a, b, c),
                    e = gj.tree.plugins.dragAndDrop.private.getTargetWrappers(a, b),
                    f = a.data();
                return function (c, g) {
                    var h,
                        i,
                        j,
                        k,
                        l = !1;
                    $(this).draggable("destroy").remove(),
                        d.each(function () {
                            var c,
                                d = $(this);
                            if (d.droppable("isOver", g))
                                return (
                                    (i = d.closest("li")),
                                    (j = b.parent("ul").parent("li")),
                                    (c = i.children("ul")),
                                    0 === c.length && ((c = $("<ul />").addClass(f.style.list)), i.append(c)),
                                    !1 !== gj.tree.plugins.dragAndDrop.events.nodeDrop(a, b.data("id"), i.data("id"), c.children("li").length + 1) &&
                                        (c.append(b),
                                        (h = a.getDataById(b.data("id"))),
                                        gj.tree.methods.removeDataById(a, b.data("id"), f.records),
                                        (k = a.getDataById(c.parent().data("id"))),
                                        void 0 === k[f.childrenField] && (k[f.childrenField] = []),
                                        k[f.childrenField].push(h),
                                        gj.tree.plugins.dragAndDrop.private.refresh(a, b, i, j)),
                                    (l = !0),
                                    !1
                                );
                            d.droppable("destroy");
                        }),
                        l ||
                            e.each(function () {
                                var c,
                                    d,
                                    e,
                                    k = $(this);
                                if (k.droppable("isOver", g))
                                    return (
                                        (i = k.closest("li")),
                                        (j = b.parent("ul").parent("li")),
                                        (c = g.y < k.position().top + k.outerHeight() / 2),
                                        (e = b.data("id")),
                                        (d = i.prevAll('li:not([data-id="' + e + '"])').length + (c ? 1 : 2)),
                                        !1 !== gj.tree.plugins.dragAndDrop.events.nodeDrop(a, e, i.parent("ul").parent("li").data("id"), d) &&
                                            ((h = a.getDataById(b.data("id"))),
                                            gj.tree.methods.removeDataById(a, b.data("id"), f.records),
                                            a.getDataById(i.parent().data("id"))[f.childrenField].splice(i.index() + (c ? 0 : 1), 0, h),
                                            c ? b.insertBefore(i) : b.insertAfter(i),
                                            gj.tree.plugins.dragAndDrop.private.refresh(a, b, i, j)),
                                        !1
                                    );
                                k.droppable("destroy");
                            });
                };
            },
            refresh: function (a, b, c, d) {
                var e = a.data();
                gj.tree.plugins.dragAndDrop.private.refreshNode(a, c),
                    gj.tree.plugins.dragAndDrop.private.refreshNode(a, d),
                    gj.tree.plugins.dragAndDrop.private.refreshNode(a, b),
                    b.find('li[data-role="node"]').each(function () {
                        gj.tree.plugins.dragAndDrop.private.refreshNode(a, $(this));
                    }),
                    c.children('[data-role="wrapper"]').removeClass(e.style.dropAbove).removeClass(e.style.dropBelow);
            },
            refreshNode: function (a, b) {
                var c = b.children('[data-role="wrapper"]'),
                    d = c.children('[data-role="expander"]'),
                    e = c.children('[data-role="spacer"]'),
                    f = b.children("ul"),
                    g = a.data(),
                    h = b.parentsUntil('[data-type="tree"]', "ul").length;
                f.length && f.children().length ? (f.is(":visible") ? d.empty().append(g.icons.collapse) : d.empty().append(g.icons.expand)) : d.empty(),
                    c.removeClass(g.style.dropAbove).removeClass(g.style.dropBelow),
                    e.css("width", g.indentation * (h - 1));
            },
        },
        public: {},
        events: {
            nodeDrop: function (a, b, c, d) {
                return a.triggerHandler("nodeDrop", [b, c, d]);
            },
        },
        configure: function (a) {
            $.extend(!0, a, gj.tree.plugins.dragAndDrop.public),
                a.data("dragAndDrop") &&
                    gj.draggable &&
                    gj.droppable &&
                    a.on("nodeDataBound", function (b, c) {
                        gj.tree.plugins.dragAndDrop.private.nodeDataBound(a, c);
                    });
        },
    }),
    (gj.tree.plugins.lazyLoading = {
        config: { base: { paramNames: { parentId: "parentId" }, lazyLoading: !1 } },
        private: {
            nodeDataBound: function (a, b, c, d) {
                var e = a.data(),
                    f = b.find('> [data-role="wrapper"] > [data-role="expander"]');
                d.hasChildren && f.empty().append(e.icons.expand);
            },
            createDoneHandler: function (a, b) {
                return function (c) {
                    var d,
                        e,
                        f,
                        g = a.data();
                    if (("string" == typeof c && JSON && (c = JSON.parse(c)), c && c.length)) {
                        for (f = b.children("ul"), 0 === f.length && ((f = $("<ul />").addClass(g.style.list)), b.append(f)), d = 0; d < c.length; d++) a.addNode(c[d], f);
                        (e = b.find('>[data-role="wrapper"]>[data-role="expander"]')), e.attr("data-mode", "open"), e.empty().append(g.icons.collapse), gj.tree.events.dataBound(a);
                    }
                };
            },
            expand: function (a, b, c) {
                var d,
                    e = a.data(),
                    f = {},
                    g = b.find(">ul>li");
                (g && g.length) ||
                    ("string" == typeof e.dataSource &&
                        ((f[e.paramNames.parentId] = c), (d = { url: e.dataSource, data: f }), a.xhr && a.xhr.abort(), (a.xhr = $.ajax(d).done(gj.tree.plugins.lazyLoading.private.createDoneHandler(a, b)).fail(a.createErrorHandler()))));
            },
        },
        public: {},
        events: {},
        configure: function (a, b, c) {
            c.lazyLoading &&
                (a.on("nodeDataBound", function (b, c, d, e) {
                    gj.tree.plugins.lazyLoading.private.nodeDataBound(a, c, d, e);
                }),
                a.on("expand", function (b, c, d) {
                    gj.tree.plugins.lazyLoading.private.expand(a, c, d);
                }));
        },
    }),
    (gj.checkbox = { plugins: {} }),
    (gj.checkbox.config = {
        base: { uiLibrary: "materialdesign", iconsLibrary: "materialicons", style: { wrapperCssClass: "gj-checkbox-md", spanCssClass: void 0 } },
        bootstrap: { style: { wrapperCssClass: "gj-checkbox-bootstrap" }, iconsLibrary: "glyphicons" },
        bootstrap4: { style: { wrapperCssClass: "gj-checkbox-bootstrap gj-checkbox-bootstrap-4" }, iconsLibrary: "materialicons" },
        materialicons: { style: { iconsCssClass: "gj-checkbox-material-icons", spanCssClass: "gj-icon" } },
        glyphicons: { style: { iconsCssClass: "gj-checkbox-glyphicons", spanCssClass: "" } },
        fontawesome: { style: { iconsCssClass: "gj-checkbox-fontawesome", spanCssClass: "fa" } },
    }),
    (gj.checkbox.methods = {
        init: function (a) {
            var b = this;
            return gj.widget.prototype.init.call(this, a, "checkbox"), b.attr("data-checkbox", "true"), gj.checkbox.methods.initialize(b), b;
        },
        initialize: function (a) {
            var b,
                c,
                d = a.data();
            d.style.wrapperCssClass &&
                ((b = $('<label class="' + d.style.wrapperCssClass + " " + d.style.iconsCssClass + '"></label>')),
                a.attr("id") && b.attr("for", a.attr("id")),
                a.wrap(b),
                (c = $("<span />")),
                d.style.spanCssClass && c.addClass(d.style.spanCssClass),
                a.parent().append(c));
        },
        state: function (a, b) {
            return b
                ? ("checked" === b
                      ? (a.prop("indeterminate", !1), a.prop("checked", !0))
                      : "unchecked" === b
                      ? (a.prop("indeterminate", !1), a.prop("checked", !1))
                      : "indeterminate" === b && (a.prop("checked", !0), a.prop("indeterminate", !0)),
                  gj.checkbox.events.change(a, b),
                  a)
                : (b = a.prop("indeterminate") ? "indeterminate" : a.prop("checked") ? "checked" : "unchecked");
        },
        toggle: function (a) {
            return "checked" == a.state() ? a.state("unchecked") : a.state("checked"), a;
        },
        destroy: function (a) {
            return "true" === a.attr("data-checkbox") && (a.removeData(), a.removeAttr("data-guid"), a.removeAttr("data-checkbox"), a.off(), a.next("span").remove(), a.unwrap()), a;
        },
    }),
    (gj.checkbox.events = {
        change: function (a, b) {
            return a.triggerHandler("change", [b]);
        },
    }),
    (gj.checkbox.widget = function (a, b) {
        var c = this,
            d = gj.checkbox.methods;
        return (
            (c.toggle = function () {
                return d.toggle(this);
            }),
            (c.state = function (a) {
                return d.state(this, a);
            }),
            (c.destroy = function () {
                return d.destroy(this);
            }),
            $.extend(a, c),
            "true" !== a.attr("data-checkbox") && d.init.call(a, b),
            a
        );
    }),
    (gj.checkbox.widget.prototype = new gj.widget()),
    (gj.checkbox.widget.constructor = gj.checkbox.widget),
    (function (a) {
        a.fn.checkbox = function (a) {
            var b;
            if (this && this.length) {
                if ("object" != typeof a && a) {
                    if (((b = new gj.checkbox.widget(this, null)), b[a])) return b[a].apply(this, Array.prototype.slice.call(arguments, 1));
                    throw "Method " + a + " does not exist.";
                }
                return new gj.checkbox.widget(this, a);
            }
        };
    })(jQuery),
    (gj.editor = { plugins: {}, messages: {} }),
    (gj.editor.config = {
        base: {
            height: 300,
            width: void 0,
            uiLibrary: "materialdesign",
            iconsLibrary: "materialicons",
            locale: "en-us",
            buttons: void 0,
            style: { wrapper: "gj-editor gj-editor-md", buttonsGroup: "gj-button-md-group", button: "gj-button-md", buttonActive: "active" },
        },
        bootstrap: { style: { wrapper: "gj-editor gj-editor-bootstrap", buttonsGroup: "btn-group", button: "btn btn-default gj-cursor-pointer", buttonActive: "active" } },
        bootstrap4: { style: { wrapper: "gj-editor gj-editor-bootstrap", buttonsGroup: "btn-group", button: "btn btn-outline-secondary gj-cursor-pointer", buttonActive: "active" } },
        materialicons: {
            icons: {
                bold: '<i class="gj-icon bold" />',
                italic: '<i class="gj-icon italic" />',
                strikethrough: '<i class="gj-icon strikethrough" />',
                underline: '<i class="gj-icon underlined" />',
                listBulleted: '<i class="gj-icon list-bulleted" />',
                listNumbered: '<i class="gj-icon list-numbered" />',
                indentDecrease: '<i class="gj-icon indent-decrease" />',
                indentIncrease: '<i class="gj-icon indent-increase" />',
                alignLeft: '<i class="gj-icon align-left" />',
                alignCenter: '<i class="gj-icon align-center" />',
                alignRight: '<i class="gj-icon align-right" />',
                alignJustify: '<i class="gj-icon align-justify" />',
                undo: '<i class="gj-icon undo" />',
                redo: '<i class="gj-icon redo" />',
            },
        },
        fontawesome: {
            icons: {
                bold: '<i class="fa fa-bold" aria-hidden="true"></i>',
                italic: '<i class="fa fa-italic" aria-hidden="true"></i>',
                strikethrough: '<i class="fa fa-strikethrough" aria-hidden="true"></i>',
                underline: '<i class="fa fa-underline" aria-hidden="true"></i>',
                listBulleted: '<i class="fa fa-list-ul" aria-hidden="true"></i>',
                listNumbered: '<i class="fa fa-list-ol" aria-hidden="true"></i>',
                indentDecrease: '<i class="fa fa-indent" aria-hidden="true"></i>',
                indentIncrease: '<i class="fa fa-outdent" aria-hidden="true"></i>',
                alignLeft: '<i class="fa fa-align-left" aria-hidden="true"></i>',
                alignCenter: '<i class="fa fa-align-center" aria-hidden="true"></i>',
                alignRight: '<i class="fa fa-align-right" aria-hidden="true"></i>',
                alignJustify: '<i class="fa fa-align-justify" aria-hidden="true"></i>',
                undo: '<i class="fa fa-undo" aria-hidden="true"></i>',
                redo: '<i class="fa fa-repeat" aria-hidden="true"></i>',
            },
        },
    }),
    (gj.editor.methods = {
        init: function (a) {
            return gj.widget.prototype.init.call(this, a, "editor"), this.attr("data-editor", "true"), gj.editor.methods.initialize(this), this;
        },
        initialize: function (a) {
            var b,
                c,
                d,
                e,
                f,
                g = this,
                h = a.data();
            if (
                (a.hide(),
                "wrapper" !== a[0].parentElement.attributes.role && ((d = document.createElement("div")), d.setAttribute("role", "wrapper"), a[0].parentNode.insertBefore(d, a[0]), d.appendChild(a[0])),
                gj.editor.methods.localization(h),
                $(d).addClass(h.style.wrapper),
                h.width && $(d).width(h.width),
                (e = $(d).children('div[role="body"]')),
                0 === e.length && ((e = $('<div role="body"></div>')), $(d).append(e), a[0].innerText && (e[0].innerHTML = a[0].innerText)),
                e.attr("contenteditable", !0),
                e.on("keydown", function (b) {
                    var c = event.keyCode || event.charCode;
                    !1 === gj.editor.events.changing(a) && 8 !== c && 46 !== c && b.preventDefault();
                }),
                e.on("mouseup keyup mouseout cut paste", function (b) {
                    g.updateToolbar(a, f), gj.editor.events.changed(a), a.html(e.html());
                }),
                (f = $(d).children('div[role="toolbar"]')),
                0 === f.length)
            ) {
                (f = $('<div role="toolbar"></div>')), e.before(f);
                for (var i in h.buttons) {
                    b = $("<div />").addClass(h.style.buttonsGroup);
                    for (var j in h.buttons[i])
                        (c = $(h.buttons[i][j])),
                            c.on("click", function () {
                                gj.editor.methods.executeCmd(a, e, f, $(this));
                            }),
                            b.append(c);
                    f.append(b);
                }
            }
            e.height(h.height - gj.core.height(f[0], !0));
        },
        localization: function (a) {
            var b = gj.editor.messages[a.locale];
            void 0 === a.buttons &&
                (a.buttons = [
                    [
                        '<button type="button" class="' + a.style.button + '" title="' + b.bold + '" role="bold">' + a.icons.bold + "</button>",
                        '<button type="button" class="' + a.style.button + '" title="' + b.italic + '" role="italic">' + a.icons.italic + "</button>",
                        '<button type="button" class="' + a.style.button + '" title="' + b.strikethrough + '" role="strikethrough">' + a.icons.strikethrough + "</button>",
                        '<button type="button" class="' + a.style.button + '" title="' + b.underline + '" role="underline">' + a.icons.underline + "</button>",
                    ],
                    [
                        '<button type="button" class="' + a.style.button + '" title="' + b.listBulleted + '" role="insertunorderedlist">' + a.icons.listBulleted + "</button>",
                        '<button type="button" class="' + a.style.button + '" title="' + b.listNumbered + '" role="insertorderedlist">' + a.icons.listNumbered + "</button>",
                        '<button type="button" class="' + a.style.button + '" title="' + b.indentDecrease + '" role="outdent">' + a.icons.indentDecrease + "</button>",
                        '<button type="button" class="' + a.style.button + '" title="' + b.indentIncrease + '" role="indent">' + a.icons.indentIncrease + "</button>",
                    ],
                    [
                        '<button type="button" class="' + a.style.button + '" title="' + b.alignLeft + '" role="justifyleft">' + a.icons.alignLeft + "</button>",
                        '<button type="button" class="' + a.style.button + '" title="' + b.alignCenter + '" role="justifycenter">' + a.icons.alignCenter + "</button>",
                        '<button type="button" class="' + a.style.button + '" title="' + b.alignRight + '" role="justifyright">' + a.icons.alignRight + "</button>",
                        '<button type="button" class="' + a.style.button + '" title="' + b.alignJustify + '" role="justifyfull">' + a.icons.alignJustify + "</button>",
                    ],
                    [
                        '<button type="button" class="' + a.style.button + '" title="' + b.undo + '" role="undo">' + a.icons.undo + "</button>",
                        '<button type="button" class="' + a.style.button + '" title="' + b.redo + '" role="redo">' + a.icons.redo + "</button>",
                    ],
                ]);
        },
        updateToolbar: function (a, b) {
            var c = a.data();
            $buttons = b.find("[role]").each(function () {
                var a = $(this),
                    b = a.attr("role");
                b && document.queryCommandEnabled(b) && "true" === document.queryCommandValue(b) ? a.addClass(c.style.buttonActive) : a.removeClass(c.style.buttonActive);
            });
        },
        executeCmd: function (a, b, c, d) {
            b.focus(), document.execCommand(d.attr("role"), !1), gj.editor.methods.updateToolbar(a, c);
        },
        content: function (a, b) {
            var c = a.parent().children('div[role="body"]');
            return void 0 === b ? c.html() : c.html(b);
        },
        destroy: function (a) {
            var b;
            return (
                "true" === a.attr("data-editor") &&
                    ((b = a.parent()), b.children('div[role="body"]').remove(), b.children('div[role="toolbar"]').remove(), a.unwrap(), a.removeData(), a.removeAttr("data-guid"), a.removeAttr("data-editor"), a.off(), a.show()),
                a
            );
        },
    }),
    (gj.editor.events = {
        changing: function (a) {
            return a.triggerHandler("changing");
        },
        changed: function (a) {
            return a.triggerHandler("changed");
        },
    }),
    (gj.editor.widget = function (a, b) {
        var c = this,
            d = gj.editor.methods;
        return (
            (c.content = function (a) {
                return d.content(this, a);
            }),
            (c.destroy = function () {
                return d.destroy(this);
            }),
            $.extend(a, c),
            "true" !== a.attr("data-editor") && d.init.call(a, b),
            a
        );
    }),
    (gj.editor.widget.prototype = new gj.widget()),
    (gj.editor.widget.constructor = gj.editor.widget),
    (function (a) {
        a.fn.editor = function (a) {
            var b;
            if (this && this.length) {
                if ("object" != typeof a && a) {
                    if (((b = new gj.editor.widget(this, null)), b[a])) return b[a].apply(this, Array.prototype.slice.call(arguments, 1));
                    throw "Method " + a + " does not exist.";
                }
                return new gj.editor.widget(this, a);
            }
        };
    })(jQuery),
    (gj.editor.messages["en-us"] = {
        bold: "Bold",
        italic: "Italic",
        strikethrough: "Strikethrough",
        underline: "Underline",
        listBulleted: "List Bulleted",
        listNumbered: "List Numbered",
        indentDecrease: "Indent Decrease",
        indentIncrease: "Indent Increase",
        alignLeft: "Align Left",
        alignCenter: "Align Center",
        alignRight: "Align Right",
        alignJustify: "Align Justify",
        undo: "Undo",
        redo: "Redo",
    }),
    (gj.dropdown = { plugins: {} }),
    (gj.dropdown.config = {
        base: {
            dataSource: void 0,
            textField: "text",
            valueField: "value",
            selectedField: "selected",
            width: void 0,
            maxHeight: "auto",
            placeholder: void 0,
            fontSize: void 0,
            uiLibrary: "materialdesign",
            iconsLibrary: "materialicons",
            icons: { dropdown: '<i class="gj-icon arrow-dropdown" />', dropup: '<i class="gj-icon arrow-dropup" />' },
            style: { wrapper: "gj-dropdown gj-dropdown-md gj-unselectable", list: "gj-list gj-list-md gj-dropdown-list-md", active: "gj-list-md-active" },
        },
        bootstrap: {
            style: {
                wrapper: "gj-dropdown gj-dropdown-bootstrap gj-dropdown-bootstrap-3 gj-unselectable",
                presenter: "btn btn-default",
                list: "gj-list gj-list-bootstrap gj-dropdown-list-bootstrap list-group",
                item: "list-group-item",
                active: "active",
            },
            iconsLibrary: "glyphicons",
        },
        bootstrap4: {
            style: {
                wrapper: "gj-dropdown gj-dropdown-bootstrap gj-dropdown-bootstrap-4 gj-unselectable",
                presenter: "btn btn-outline-secondary",
                list: "gj-list gj-list-bootstrap gj-dropdown-list-bootstrap list-group",
                item: "list-group-item",
                active: "active",
            },
        },
        materialicons: { style: { expander: "gj-dropdown-expander-mi" } },
        fontawesome: { icons: { dropdown: '<i class="fa fa-caret-down" aria-hidden="true"></i>', dropup: '<i class="fa fa-caret-up" aria-hidden="true"></i>' }, style: { expander: "gj-dropdown-expander-fa" } },
        glyphicons: { icons: { dropdown: '<span class="caret"></span>', dropup: '<span class="dropup"><span class="caret" ></span></span>' }, style: { expander: "gj-dropdown-expander-glyphicons" } },
    }),
    (gj.dropdown.methods = {
        init: function (a) {
            return gj.widget.prototype.init.call(this, a, "dropdown"), this.attr("data-dropdown", "true"), gj.dropdown.methods.initialize(this), this;
        },
        getHTMLConfig: function () {
            var a = gj.widget.prototype.getHTMLConfig.call(this),
                b = this[0].attributes;
            return b.placeholder && (a.placeholder = b.placeholder.value), a;
        },
        initialize: function (a) {
            var b = a.data(),
                c = a.parent('div[role="wrapper"]'),
                d = $('<span role="display"></span>'),
                e = $('<span role="expander">' + b.icons.dropdown + "</span>").addClass(b.style.expander),
                f = $('<button role="presenter" type="button"></button>').addClass(b.style.presenter),
                g = $('<ul role="list" class="' + b.style.list + '"></ul>').attr("guid", a.attr("data-guid"));
            0 === c.length ? ((c = $('<div role="wrapper" />').addClass(b.style.wrapper)), a.wrap(c)) : c.addClass(b.style.wrapper),
                b.fontSize && f.css("font-size", b.fontSize),
                f.on("click", function (b) {
                    g.is(":visible") ? gj.dropdown.methods.close(a, g) : gj.dropdown.methods.open(a, g);
                }),
                f.on("blur", function (b) {
                    setTimeout(function () {
                        gj.dropdown.methods.close(a, g);
                    }, 500);
                }),
                f.append(d).append(e),
                a.hide(),
                a.after(f),
                $("body").append(g),
                g.hide(),
                a.reload();
        },
        setListPosition: function (a, b, c) {
            var d,
                e,
                f,
                g,
                h = a.getBoundingClientRect(),
                i = window.scrollY || window.pageYOffset || 0;
            window.scrollX || window.pageXOffset;
            (b.style.overflow = ""),
                (b.style.overflowX = ""),
                (b.style.height = ""),
                gj.core.setChildPosition(a, b),
                (d = gj.core.height(b, !0)),
                (g = b.getBoundingClientRect()),
                (e = gj.core.height(a, !0)),
                "auto" === c.maxHeight
                    ? h.top < g.top
                        ? h.top + d + e > window.innerHeight && (f = window.innerHeight - h.top - e - 3)
                        : h.top - d - 3 > 0
                        ? (b.style.top = Math.round(h.top + i - d - 3) + "px")
                        : ((b.style.top = i + "px"), (f = h.top - 3))
                    : !isNaN(c.maxHeight) && c.maxHeight < d && (f = c.maxHeight),
                f && ((b.style.overflow = "scroll"), (b.style.overflowX = "hidden"), (b.style.height = f + "px"));
        },
        useHtmlDataSource: function (a, b) {
            var c,
                d,
                e = [],
                f = a.find("option");
            for (c = 0; c < f.length; c++) (d = {}), (d[b.valueField] = f[c].value), (d[b.textField] = f[c].innerHTML), (d[b.selectedField] = a[0].value === f[c].value), e.push(d);
            b.dataSource = e;
        },
        filter: function (a) {
            var b,
                c,
                d = a.data();
            if (d.dataSource) {
                if ("string" == typeof d.dataSource[0]) for (b = 0; b < d.dataSource.length; b++) (c = {}), (c[d.valueField] = d.dataSource[b]), (c[d.textField] = d.dataSource[b]), (d.dataSource[b] = c);
            } else d.dataSource = [];
            return d.dataSource;
        },
        render: function (a, b) {
            var c = [],
                d = a.data(),
                e = a.parent(),
                f = $("body").children('[role="list"][guid="' + a.attr("data-guid") + '"]'),
                g = e.children('[role="presenter"]'),
                h = (g.children('[role="expander"]'), g.children('[role="display"]'));
            if ((a.data("records", b), a.empty(), f.empty(), b && b.length))
                if (
                    ($.each(b, function () {
                        var b,
                            e = this[d.valueField],
                            g = this[d.textField],
                            h = this[d.selectedField] && "true" === this[d.selectedField].toString().toLowerCase();
                        (b = $('<li value="' + e + '"><div data-role="wrapper"><span data-role="display">' + g + "</span></div></li>")),
                            b.addClass(d.style.item),
                            b.on("click", function (b) {
                                gj.dropdown.methods.select(a, e);
                            }),
                            f.append(b),
                            a.append('<option value="' + e + '">' + g + "</option>"),
                            h && c.push(e);
                    }),
                    0 === c.length)
                )
                    a.prepend('<option value=""></option>'), (a[0].selectedIndex = 0), d.placeholder && (h[0].innerHTML = '<span class="placeholder">' + d.placeholder + "</span>");
                else for (i = 0; i < c.length; i++) gj.dropdown.methods.select(a, c[i]);
            return d.width && (e.css("width", d.width), g.css("width", d.width)), d.fontSize && f.children("li").css("font-size", d.fontSize), gj.dropdown.events.dataBound(a), a;
        },
        open: function (a, b) {
            var c = a.data(),
                d = a.parent().find('[role="expander"]'),
                e = a.parent().find('[role="presenter"]'),
                f = gj.core.getScrollParent(a[0]);
            b.css("width", gj.core.width(e[0])),
                b.show(),
                gj.dropdown.methods.setListPosition(e[0], b[0], c),
                d.html(c.icons.dropup),
                f &&
                    ((c.parentScrollHandler = function () {
                        gj.dropdown.methods.setListPosition(e[0], b[0], c);
                    }),
                    gj.dropdown.methods.addParentsScrollListener(f, c.parentScrollHandler));
        },
        close: function (a, b) {
            var c = a.data(),
                d = a.parent().find('[role="expander"]'),
                e = gj.core.getScrollParent(a[0]);
            d.html(c.icons.dropdown), e && c.parentScrollHandler && gj.dropdown.methods.removeParentsScrollListener(e, c.parentScrollHandler), b.hide();
        },
        addParentsScrollListener: function (a, b) {
            var c = gj.core.getScrollParent(a.parentNode);
            a.addEventListener("scroll", b), c && gj.dropdown.methods.addParentsScrollListener(c, b);
        },
        removeParentsScrollListener: function (a, b) {
            var c = gj.core.getScrollParent(a.parentNode);
            a.removeEventListener("scroll", b), c && gj.dropdown.methods.removeParentsScrollListener(c, b);
        },
        select: function (a, b) {
            var c = a.data(),
                d = $("body").children('[role="list"][guid="' + a.attr("data-guid") + '"]'),
                e = d.children('li[value="' + b + '"]'),
                f = a.next('[role="presenter"]').find('[role="display"]'),
                g = gj.dropdown.methods.getRecordByValue(a, b);
            return (
                d.children("li").removeClass(c.style.active),
                g ? (e.addClass(c.style.active), (a[0].value = b), (f[0].innerHTML = g[c.textField])) : (c.placeholder && (f[0].innerHTML = '<span class="placeholder">' + c.placeholder + "</span>"), (a[0].value = "")),
                gj.dropdown.events.change(a),
                gj.dropdown.methods.close(a, d),
                a
            );
        },
        getRecordByValue: function (a, b) {
            var c,
                d = a.data(),
                e = void 0;
            for (c = 0; c < d.records.length; c++)
                if (d.records[c][d.valueField] === b) {
                    e = d.records[c];
                    break;
                }
            return e;
        },
        value: function (a, b) {
            return void 0 === b ? a.val() : (gj.dropdown.methods.select(a, b), a);
        },
        destroy: function (a) {
            var b = a.data(),
                c = a.parent('div[role="wrapper"]');
            return (
                b &&
                    (a.xhr && a.xhr.abort(),
                    a.off(),
                    a.removeData(),
                    a.removeAttr("data-type").removeAttr("data-guid").removeAttr("data-dropdown"),
                    a.removeClass(),
                    c.length > 0 && (c.children('[role="presenter"]').remove(), c.children('[role="list"]').remove(), a.unwrap()),
                    a.show()),
                a
            );
        },
    }),
    (gj.dropdown.events = {
        change: function (a) {
            return a.triggerHandler("change");
        },
        dataBound: function (a) {
            return a.triggerHandler("dataBound");
        },
    }),
    (gj.dropdown.widget = function (a, b) {
        var c = this,
            d = gj.dropdown.methods;
        return (
            (c.value = function (a) {
                return d.value(this, a);
            }),
            (c.enable = function () {
                return d.enable(this);
            }),
            (c.disable = function () {
                return d.disable(this);
            }),
            (c.destroy = function () {
                return d.destroy(this);
            }),
            $.extend(a, c),
            "true" !== a.attr("data-dropdown") && d.init.call(a, b),
            a
        );
    }),
    (gj.dropdown.widget.prototype = new gj.widget()),
    (gj.dropdown.widget.constructor = gj.dropdown.widget),
    (gj.dropdown.widget.prototype.getHTMLConfig = gj.dropdown.methods.getHTMLConfig),
    (function (a) {
        a.fn.dropdown = function (a) {
            var b;
            if (this && this.length) {
                if ("object" != typeof a && a) {
                    if (((b = new gj.dropdown.widget(this, null)), b[a])) return b[a].apply(this, Array.prototype.slice.call(arguments, 1));
                    throw "Method " + a + " does not exist.";
                }
                return new gj.dropdown.widget(this, a);
            }
        };
    })(jQuery),
    (gj.datepicker = { plugins: {} }),
    (gj.datepicker.config = {
        base: {
            showOtherMonths: !1,
            selectOtherMonths: !0,
            width: void 0,
            minDate: void 0,
            maxDate: void 0,
            format: "mm/dd/yyyy",
            uiLibrary: "materialdesign",
            iconsLibrary: "materialicons",
            value: void 0,
            weekStartDay: 0,
            disableDates: void 0,
            disableDaysOfWeek: void 0,
            calendarWeeks: !1,
            keyboardNavigation: !0,
            locale: "en-us",
            icons: { rightIcon: '<i class="gj-icon">event</i>', previousMonth: '<i class="gj-icon chevron-left"></i>', nextMonth: '<i class="gj-icon chevron-right"></i>' },
            fontSize: void 0,
            size: "default",
            modal: !1,
            header: !1,
            footer: !1,
            showOnFocus: !0,
            showRightIcon: !0,
            style: { modal: "gj-modal", wrapper: "gj-datepicker gj-datepicker-md gj-unselectable", input: "gj-textbox-md", calendar: "gj-picker gj-picker-md datepicker gj-unselectable", footer: "", button: "gj-button-md" },
        },
        bootstrap: {
            style: {
                wrapper: "gj-datepicker gj-datepicker-bootstrap gj-unselectable input-group",
                input: "form-control",
                calendar: "gj-picker gj-picker-bootstrap datepicker gj-unselectable",
                footer: "modal-footer",
                button: "btn btn-default",
            },
            iconsLibrary: "glyphicons",
            showOtherMonths: !0,
        },
        bootstrap4: {
            style: {
                wrapper: "gj-datepicker gj-datepicker-bootstrap gj-unselectable input-group",
                input: "form-control",
                calendar: "gj-picker gj-picker-bootstrap datepicker gj-unselectable",
                footer: "modal-footer",
                button: "btn btn-default",
            },
            showOtherMonths: !0,
        },
        fontawesome: { icons: { rightIcon: '<i class="fa fa-calendar" aria-hidden="true"></i>', previousMonth: '<i class="fa fa-chevron-left" aria-hidden="true"></i>', nextMonth: '<i class="fa fa-chevron-right" aria-hidden="true"></i>' } },
        glyphicons: {
            icons: { rightIcon: '<span class="glyphicon glyphicon-calendar"></span>', previousMonth: '<span class="glyphicon glyphicon-chevron-left"></span>', nextMonth: '<span class="glyphicon glyphicon-chevron-right"></span>' },
        },
    }),
    (gj.datepicker.methods = {
        init: function (a) {
            return gj.widget.prototype.init.call(this, a, "datepicker"), this.attr("data-datepicker", "true"), gj.datepicker.methods.initialize(this, this.data()), this;
        },
        initialize: function (a, b) {
            var c,
                d,
                e = a.parent('div[role="wrapper"]');
            0 === e.length ? ((e = $('<div role="wrapper" />').addClass(b.style.wrapper)), a.wrap(e)) : e.addClass(b.style.wrapper),
                (e = a.parent('div[role="wrapper"]')),
                b.width && e.css("width", b.width),
                a.val(b.value).addClass(b.style.input).attr("role", "input"),
                b.fontSize && a.css("font-size", b.fontSize),
                "bootstrap" === b.uiLibrary || "bootstrap4" === b.uiLibrary
                    ? "small" === b.size
                        ? (e.addClass("input-group-sm"), a.addClass("form-control-sm"))
                        : "large" === b.size && (e.addClass("input-group-lg"), a.addClass("form-control-lg"))
                    : "small" === b.size
                    ? e.addClass("small")
                    : "large" === b.size && e.addClass("large"),
                b.showRightIcon &&
                    ((d =
                        "bootstrap" === b.uiLibrary
                            ? $('<span class="input-group-addon">' + b.icons.rightIcon + "</span>")
                            : "bootstrap4" === b.uiLibrary
                            ? $('<span class="input-group-append"><button class="btn btn-outline-secondary border-left-0" type="button">' + b.icons.rightIcon + "</button></span>")
                            : $(b.icons.rightIcon)),
                    d.attr("role", "right-icon"),
                    d.on("click", function (c) {
                        $("body")
                            .find('[role="calendar"][guid="' + a.attr("data-guid") + '"]')
                            .is(":visible")
                            ? gj.datepicker.methods.close(a)
                            : gj.datepicker.methods.open(a, b);
                    }),
                    e.append(d)),
                b.showOnFocus &&
                    a.on("focus", function () {
                        gj.datepicker.methods.open(a, b);
                    }),
                (c = gj.datepicker.methods.createCalendar(a, b)),
                !0 !== b.footer &&
                    (a.on("blur", function () {
                        a.timeout = setTimeout(function () {
                            gj.datepicker.methods.close(a);
                        }, 500);
                    }),
                    c.mousedown(function () {
                        return clearTimeout(a.timeout), document.activeElement !== a[0] && a.focus(), !1;
                    }),
                    c.on("click", function () {
                        clearTimeout(a.timeout), document.activeElement !== a[0] && a.focus();
                    })),
                b.keyboardNavigation && $(document).on("keydown", gj.datepicker.methods.createKeyDownHandler(a, c, b));
        },
        createCalendar: function (a, b) {
            var c,
                d,
                e,
                f,
                g,
                h = $('<div role="calendar" type="month"/>').addClass(b.style.calendar).attr("guid", a.attr("data-guid"));
            return (
                b.fontSize && h.css("font-size", b.fontSize),
                (c = gj.core.parseDate(b.value, b.format, b.locale)),
                !c || isNaN(c.getTime()) ? (c = new Date()) : a.attr("day", c.getFullYear() + "-" + c.getMonth() + "-" + c.getDate()),
                h.attr("month", c.getMonth()),
                h.attr("year", c.getFullYear()),
                gj.datepicker.methods.renderHeader(a, h, b, c),
                (d = $('<div role="body" />')),
                h.append(d),
                b.footer &&
                    ((e = $('<div role="footer" class="' + b.style.footer + '" />')),
                    (f = $('<button class="' + b.style.button + '">' + gj.core.messages[b.locale].cancel + "</button>")),
                    f.on("click", function () {
                        a.close();
                    }),
                    e.append(f),
                    (g = $('<button class="' + b.style.button + '">' + gj.core.messages[b.locale].ok + "</button>")),
                    g.on("click", function () {
                        var c,
                            d,
                            e = h.attr("selectedDay");
                        e ? ((d = e.split("-")), (c = new Date(d[0], d[1], d[2], h.attr("hour") || 0, h.attr("minute") || 0)), gj.datepicker.methods.change(a, h, b, c)) : a.close();
                    }),
                    e.append(g),
                    h.append(e)),
                h.hide(),
                $("body").append(h),
                b.modal && (h.wrapAll('<div role="modal" class="' + b.style.modal + '"/>'), gj.core.center(h)),
                h
            );
        },
        renderHeader: function (a, b, c, d) {
            var e, f, g;
            c.header &&
                ((e = $('<div role="header" />')),
                (g = $('<div role="year" />').on("click", function () {
                    gj.datepicker.methods.renderDecade(a, b, c), g.addClass("selected"), f.removeClass("selected");
                })),
                g.html(gj.core.formatDate(d, "yyyy", c.locale)),
                e.append(g),
                (f = $('<div role="date" class="selected" />').on("click", function () {
                    gj.datepicker.methods.renderMonth(a, b, c), f.addClass("selected"), g.removeClass("selected");
                })),
                f.html(gj.core.formatDate(d, "ddd, mmm dd", c.locale)),
                e.append(f),
                b.append(e));
        },
        updateHeader: function (a, b, c) {
            a.find('[role="header"] [role="year"]').removeClass("selected").html(gj.core.formatDate(c, "yyyy", b.locale)),
                a.find('[role="header"] [role="date"]').addClass("selected").html(gj.core.formatDate(c, "ddd, mmm dd", b.locale)),
                a.find('[role="header"] [role="hour"]').removeClass("selected").html(gj.core.formatDate(c, "HH", b.locale)),
                a.find('[role="header"] [role="minute"]').removeClass("selected").html(gj.core.formatDate(c, "MM", b.locale));
        },
        createNavigation: function (a, b, c, d) {
            var e,
                f,
                g = $("<thead/>");
            for (
                f = $('<div role="navigator" />'),
                    f.append($("<div>" + d.icons.previousMonth + "</div>").on("click", gj.datepicker.methods.prev(a, d))),
                    f.append($('<div role="period"></div>').on("click", gj.datepicker.methods.changePeriod(a, d))),
                    f.append($("<div>" + d.icons.nextMonth + "</div>").on("click", gj.datepicker.methods.next(a, d))),
                    b.append(f),
                    e = $('<tr role="week-days" />'),
                    d.calendarWeeks && e.append("<th><div>&nbsp;</div></th>"),
                    i = d.weekStartDay;
                i < gj.core.messages[d.locale].weekDaysMin.length;
                i++
            )
                e.append("<th><div>" + gj.core.messages[d.locale].weekDaysMin[i] + "</div></th>");
            for (i = 0; i < d.weekStartDay; i++) e.append("<th><div>" + gj.core.messages[d.locale].weekDaysMin[i] + "</div></th>");
            g.append(e), c.append(g);
        },
        renderMonth: function (a, b, c) {
            var d,
                e,
                f,
                g,
                h,
                i,
                j,
                k,
                l,
                m,
                n,
                o,
                p,
                q,
                r,
                s = b.children('[role="body"]'),
                t = $("<table/>"),
                u = $("<tbody/>"),
                v = gj.core.messages[c.locale].titleFormat;
            for (
                s.off().empty(),
                    gj.datepicker.methods.createNavigation(a, s, t, c),
                    g = parseInt(b.attr("month"), 10),
                    h = parseInt(b.attr("year"), 10),
                    b.attr("type", "month"),
                    v = v.replace("mmmm", gj.core.messages[c.locale].monthNames[g]).replace("yyyy", h),
                    b.find('div[role="period"]').text(v),
                    i = new Array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31),
                    h % 4 == 0 && 1900 != h && (i[1] = 29),
                    j = i[g],
                    k = (new Date(h, g, 1).getDay() + 7 - c.weekStartDay) % 7,
                    d = 0,
                    $row = $("<tr />"),
                    n = gj.datepicker.methods.getPrevMonth(g, h),
                    l = 1;
                l <= k;
                l++
            )
                (f = i[n.month] - k + l),
                    (r = new Date(n.year, n.month, f)),
                    c.calendarWeeks && 1 === l && $row.append('<td class="calendar-week"><div>' + gj.datepicker.methods.getWeekNumber(r) + "</div></td>"),
                    (p = $('<td class="other-month" />')),
                    c.showOtherMonths &&
                        ((q = $("<div>" + f + "</div>")),
                        p.append(q),
                        c.selectOtherMonths && gj.datepicker.methods.isSelectable(c, r)
                            ? (p.addClass("gj-cursor-pointer").attr("day", f).attr("month", n.month).attr("year", n.year),
                              q.on("click", gj.datepicker.methods.dayClickHandler(a, b, c, r)),
                              q.on("mousedown", function (a) {
                                  a.stopPropagation();
                              }))
                            : p.addClass("disabled")),
                    $row.append(p),
                    d++;
            for (l > 1 && u.append($row), m = new Date(), l = 1; l <= j; l++)
                (r = new Date(h, g, l)),
                    0 == d && (($row = $("<tr>")), c.calendarWeeks && $row.append('<td class="calendar-week"><div>' + gj.datepicker.methods.getWeekNumber(r) + "</div></td>")),
                    (p = $('<td day="' + l + '" month="' + g + '" year="' + h + '" />')),
                    h === m.getFullYear() && g === m.getMonth() && l === m.getDate() ? p.addClass("today") : p.addClass("current-month"),
                    (q = $("<div>" + l + "</div>")),
                    gj.datepicker.methods.isSelectable(c, r)
                        ? (p.addClass("gj-cursor-pointer"),
                          q.on("click", gj.datepicker.methods.dayClickHandler(a, b, c, r)),
                          q.on("mousedown", function (a) {
                              a.stopPropagation();
                          }))
                        : p.addClass("disabled"),
                    p.append(q),
                    $row.append(p),
                    7 == ++d && (u.append($row), (d = 0));
            for (o = gj.datepicker.methods.getNextMonth(g, h), l = 1; 0 != d; l++)
                (r = new Date(o.year, o.month, l)),
                    (p = $('<td class="other-month" />')),
                    c.showOtherMonths &&
                        ((q = $("<div>" + l + "</div>")),
                        c.selectOtherMonths && gj.datepicker.methods.isSelectable(c, r)
                            ? (p.addClass("gj-cursor-pointer").attr("day", l).attr("month", o.month).attr("year", o.year),
                              q.on("click", gj.datepicker.methods.dayClickHandler(a, b, c, r)),
                              q.on("mousedown", function (a) {
                                  a.stopPropagation();
                              }))
                            : p.addClass("disabled"),
                        p.append(q)),
                    $row.append(p),
                    7 == ++d && (u.append($row), (d = 0));
            t.append(u),
                s.append(t),
                b.attr("selectedDay") &&
                    ((e = b.attr("selectedDay").split("-")),
                    (r = new Date(e[0], e[1], e[2], b.attr("hour") || 0, b.attr("minute") || 0)),
                    b.find('tbody td[day="' + e[2] + '"][month="' + e[1] + '"]').addClass("selected"),
                    gj.datepicker.methods.updateHeader(b, c, r));
        },
        renderYear: function (a, b, c) {
            var d,
                e,
                f,
                g,
                h = b.find('>[role="body"]>table'),
                i = h.children("tbody");
            for (h.children("thead").hide(), d = parseInt(b.attr("year"), 10), b.attr("type", "year"), b.find('div[role="period"]').text(d), i.empty(), e = 0; e < 3; e++) {
                for ($row = $("<tr />"), f = 4 * e; f <= 4 * e + 3; f++)
                    (g = $("<div>" + gj.core.messages[c.locale].monthShortNames[f] + "</div>")), g.on("click", gj.datepicker.methods.selectMonth(a, b, c, f)), ($cell = $("<td></td>").append(g)), $row.append($cell);
                i.append($row);
            }
        },
        renderDecade: function (a, b, c) {
            var d,
                e,
                f,
                g,
                h,
                i = b.find('>[role="body"]>table'),
                j = i.children("tbody");
            for (i.children("thead").hide(), d = parseInt(b.attr("year"), 10), e = d - (d % 10), b.attr("type", "decade"), b.find('div[role="period"]').text(e + " - " + (e + 9)), j.empty(), f = e - 1; f <= e + 10; f += 4) {
                for ($row = $("<tr />"), g = f; g <= f + 3; g++) (h = $("<div>" + g + "</div>")), h.on("click", gj.datepicker.methods.selectYear(a, b, c, g)), ($cell = $("<td></td>").append(h)), $row.append($cell);
                j.append($row);
            }
        },
        renderCentury: function (a, b, c) {
            var d,
                e,
                f,
                g,
                h,
                i = b.find('>[role="body"]>table'),
                j = i.children("tbody");
            for (i.children("thead").hide(), d = parseInt(b.attr("year"), 10), e = d - (d % 100), b.attr("type", "century"), b.find('div[role="period"]').text(e + " - " + (e + 99)), j.empty(), f = e - 10; f < e + 100; f += 40) {
                for ($row = $("<tr />"), g = f; g <= f + 30; g += 10) (h = $("<div>" + g + "</div>")), h.on("click", gj.datepicker.methods.selectDecade(a, b, c, g)), ($cell = $("<td></td>").append(h)), $row.append($cell);
                j.append($row);
            }
        },
        getWeekNumber: function (a) {
            var b = new Date(a.valueOf());
            b.setDate(b.getDate() + 6), (b = new Date(Date.UTC(b.getFullYear(), b.getMonth(), b.getDate()))), b.setUTCDate(b.getUTCDate() + 4 - (b.getUTCDay() || 7));
            var c = new Date(Date.UTC(b.getUTCFullYear(), 0, 1));
            return Math.ceil(((b - c) / 864e5 + 1) / 7);
        },
        getMinDate: function (a) {
            var b;
            return (
                a.minDate &&
                    ("string" == typeof a.minDate
                        ? (b = gj.core.parseDate(a.minDate, a.format, a.locale))
                        : "function" == typeof a.minDate
                        ? "string" == typeof (b = a.minDate()) && (b = gj.core.parseDate(b, a.format, a.locale))
                        : "function" == typeof a.minDate.getMonth && (b = a.minDate)),
                b
            );
        },
        getMaxDate: function (a) {
            var b;
            return (
                a.maxDate &&
                    ("string" == typeof a.maxDate
                        ? (b = gj.core.parseDate(a.maxDate, a.format, a.locale))
                        : "function" == typeof a.maxDate
                        ? "string" == typeof (b = a.maxDate()) && (b = gj.core.parseDate(b, a.format, a.locale))
                        : "function" == typeof a.maxDate.getMonth && (b = a.maxDate)),
                b
            );
        },
        isSelectable: function (a, b) {
            var c,
                d = !0,
                e = gj.datepicker.methods.getMinDate(a),
                f = gj.datepicker.methods.getMaxDate(a);
            if ((e && b < e ? (d = !1) : f && b > f && (d = !1), d)) {
                if (a.disableDates)
                    if ($.isArray(a.disableDates))
                        for (c = 0; c < a.disableDates.length; c++)
                            a.disableDates[c] instanceof Date && a.disableDates[c].getTime() === b.getTime()
                                ? (d = !1)
                                : "string" == typeof a.disableDates[c] && gj.core.parseDate(a.disableDates[c], a.format, a.locale).getTime() === b.getTime() && (d = !1);
                    else a.disableDates instanceof Function && (d = a.disableDates(b));
                $.isArray(a.disableDaysOfWeek) && a.disableDaysOfWeek.indexOf(b.getDay()) > -1 && (d = !1);
            }
            return d;
        },
        getPrevMonth: function (a, b) {
            return (date = new Date(b, a, 1)), date.setMonth(date.getMonth() - 1), { month: date.getMonth(), year: date.getFullYear() };
        },
        getNextMonth: function (a, b) {
            return (date = new Date(b, a, 1)), date.setMonth(date.getMonth() + 1), { month: date.getMonth(), year: date.getFullYear() };
        },
        prev: function (a, b) {
            return function () {
                var c,
                    d,
                    e,
                    f,
                    g,
                    h = $("body").find('[role="calendar"][guid="' + a.attr("data-guid") + '"]');
                switch (((e = parseInt(h.attr("year"), 10)), h.attr("type"))) {
                    case "month":
                        (d = parseInt(h.attr("month"), 10)), (c = gj.datepicker.methods.getPrevMonth(d, e)), h.attr("month", c.month), h.attr("year", c.year), gj.datepicker.methods.renderMonth(a, h, b);
                        break;
                    case "year":
                        h.attr("year", e - 1), gj.datepicker.methods.renderYear(a, h, b);
                        break;
                    case "decade":
                        (f = e - (e % 10)), h.attr("year", f - 10), gj.datepicker.methods.renderDecade(a, h, b);
                        break;
                    case "century":
                        (g = e - (e % 100)), h.attr("year", g - 100), gj.datepicker.methods.renderCentury(a, h, b);
                }
            };
        },
        next: function (a, b) {
            return function () {
                var c,
                    d,
                    e,
                    f,
                    g,
                    h = $("body").find('[role="calendar"][guid="' + a.attr("data-guid") + '"]');
                switch (((e = parseInt(h.attr("year"), 10)), h.attr("type"))) {
                    case "month":
                        (d = parseInt(h.attr("month"), 10)), (c = gj.datepicker.methods.getNextMonth(d, e)), h.attr("month", c.month), h.attr("year", c.year), gj.datepicker.methods.renderMonth(a, h, b);
                        break;
                    case "year":
                        h.attr("year", e + 1), gj.datepicker.methods.renderYear(a, h, b);
                        break;
                    case "decade":
                        (f = e - (e % 10)), h.attr("year", f + 10), gj.datepicker.methods.renderDecade(a, h, b);
                        break;
                    case "century":
                        (g = e - (e % 100)), h.attr("year", g + 100), gj.datepicker.methods.renderCentury(a, h, b);
                }
            };
        },
        changePeriod: function (a, b) {
            return function (c) {
                var d = $("body").find('[role="calendar"][guid="' + a.attr("data-guid") + '"]');
                switch (d.attr("type")) {
                    case "month":
                        gj.datepicker.methods.renderYear(a, d, b);
                        break;
                    case "year":
                        gj.datepicker.methods.renderDecade(a, d, b);
                        break;
                    case "decade":
                        gj.datepicker.methods.renderCentury(a, d, b);
                }
            };
        },
        dayClickHandler: function (a, b, c, d) {
            return function (e) {
                return e && e.stopPropagation(), gj.datepicker.methods.selectDay(a, b, c, d), !0 !== c.footer && !1 !== c.autoClose && gj.datepicker.methods.change(a, b, c, d), a;
            };
        },
        change: function (a, b, c, d) {
            var e = (d.getDate(), d.getMonth()),
                f = d.getFullYear(),
                g = gj.core.formatDate(d, c.format, c.locale);
            b.attr("month", e), b.attr("year", f), a.val(g), gj.datepicker.events.change(a), "none" !== window.getComputedStyle(b[0]).display && gj.datepicker.methods.close(a);
        },
        selectDay: function (a, b, c, d) {
            var e = d.getDate(),
                f = d.getMonth(),
                g = d.getFullYear();
            b.attr("selectedDay", g + "-" + f + "-" + e),
                b.find("tbody td").removeClass("selected"),
                b.find('tbody td[day="' + e + '"][month="' + f + '"]').addClass("selected"),
                gj.datepicker.methods.updateHeader(b, c, d),
                gj.datepicker.events.select(a, "day");
        },
        selectMonth: function (a, b, c, d) {
            return function (e) {
                b.attr("month", d), gj.datepicker.methods.renderMonth(a, b, c), gj.datepicker.events.select(a, "month");
            };
        },
        selectYear: function (a, b, c, d) {
            return function (e) {
                b.attr("year", d), gj.datepicker.methods.renderYear(a, b, c), gj.datepicker.events.select(a, "year");
            };
        },
        selectDecade: function (a, b, c, d) {
            return function (e) {
                b.attr("year", d), gj.datepicker.methods.renderDecade(a, b, c), gj.datepicker.events.select(a, "decade");
            };
        },
        open: function (a, b) {
            var c,
                d = $("body").find('[role="calendar"][guid="' + a.attr("data-guid") + '"]');
            switch ((a.val() ? a.value(a.val()) : ((c = new Date()), d.attr("month", c.getMonth()), d.attr("year", c.getFullYear())), d.attr("type"))) {
                case "month":
                    gj.datepicker.methods.renderMonth(a, d, b);
                    break;
                case "year":
                    gj.datepicker.methods.renderYear(a, d, b);
                    break;
                case "decade":
                    gj.datepicker.methods.renderDecade(a, d, b);
                    break;
                case "century":
                    gj.datepicker.methods.renderCentury(a, d, b);
            }
            d.show(), d.closest('div[role="modal"]').show(), b.modal ? gj.core.center(d) : (gj.core.setChildPosition(a[0], d[0]), document.activeElement !== a[0] && a.focus()), clearTimeout(a.timeout), gj.datepicker.events.open(a);
        },
        close: function (a) {
            var b = $("body").find('[role="calendar"][guid="' + a.attr("data-guid") + '"]');
            b.hide(), b.closest('div[role="modal"]').hide(), gj.datepicker.events.close(a);
        },
        createKeyDownHandler: function (a, b, c) {
            return function (d) {
                var e,
                    f,
                    g,
                    h,
                    i,
                    j,
                    d = d || window.event;
                "none" !== window.getComputedStyle(b[0]).display &&
                    ((j = gj.datepicker.methods.getActiveCell(b)),
                    "38" == d.keyCode
                        ? ((h = j.index()),
                          (i = j
                              .closest("tr")
                              .prev("tr")
                              .find("td:eq(" + h + ")")),
                          i.is("[day]") ||
                              (gj.datepicker.methods.prev(a, c)(),
                              (i = b
                                  .find("tbody tr")
                                  .last()
                                  .find("td:eq(" + h + ")")),
                              i.is(":empty") &&
                                  (i = b
                                      .find("tbody tr")
                                      .last()
                                      .prev()
                                      .find("td:eq(" + h + ")"))),
                          i.is("[day]") && (i.addClass("focused"), j.removeClass("focused")))
                        : "40" == d.keyCode
                        ? ((h = j.index()),
                          (i = j
                              .closest("tr")
                              .next("tr")
                              .find("td:eq(" + h + ")")),
                          i.is("[day]") ||
                              (gj.datepicker.methods.next(a, c)(),
                              (i = b
                                  .find("tbody tr")
                                  .first()
                                  .find("td:eq(" + h + ")")),
                              i.is("[day]") || (i = b.find("tbody tr:eq(1)").find("td:eq(" + h + ")"))),
                          i.is("[day]") && (i.addClass("focused"), j.removeClass("focused")))
                        : "37" == d.keyCode
                        ? ((i = j.prev("td[day]:not(.disabled)")),
                          0 === i.length && (i = j.closest("tr").prev("tr").find("td[day]").last()),
                          0 === i.length && (gj.datepicker.methods.prev(a, c)(), (i = b.find("tbody tr").last().find("td[day]").last())),
                          i.length > 0 && (i.addClass("focused"), j.removeClass("focused")))
                        : "39" == d.keyCode
                        ? ((i = j.next("[day]:not(.disabled)")),
                          0 === i.length && (i = j.closest("tr").next("tr").find("td[day]").first()),
                          0 === i.length && (gj.datepicker.methods.next(a, c)(), (i = b.find("tbody tr").first().find("td[day]").first())),
                          i.length > 0 && (i.addClass("focused"), j.removeClass("focused")))
                        : "13" == d.keyCode
                        ? ((g = parseInt(j.attr("day"), 10)), (e = parseInt(j.attr("month"), 10)), (f = parseInt(j.attr("year"), 10)), gj.datepicker.methods.dayClickHandler(a, b, c, new Date(f, e, g))())
                        : "27" == d.keyCode && a.close());
            };
        },
        getActiveCell: function (a) {
            var b = a.find("td[day].focused");
            return 0 === b.length && ((b = a.find("td[day].selected")), 0 === b.length && ((b = a.find("td[day].today")), 0 === b.length && (b = a.find("td[day]:not(.disabled)").first()))), b;
        },
        value: function (a, b) {
            var c,
                d,
                e = a.data();
            return void 0 === b
                ? a.val()
                : ((d = gj.core.parseDate(b, e.format, e.locale)), d && d.getTime() ? ((c = $("body").find('[role="calendar"][guid="' + a.attr("data-guid") + '"]')), gj.datepicker.methods.dayClickHandler(a, c, e, d)()) : a.val(""), a);
        },
        destroy: function (a) {
            var b = a.data(),
                c = a.parent(),
                d = $("body").find('[role="calendar"][guid="' + a.attr("data-guid") + '"]');
            return (
                b &&
                    (a.off(),
                    d.parent('[role="modal"]').length > 0 && d.unwrap(),
                    d.remove(),
                    a.removeData(),
                    a.removeAttr("data-type").removeAttr("data-guid").removeAttr("data-datepicker"),
                    a.removeClass(),
                    c.children('[role="right-icon"]').remove(),
                    a.unwrap()),
                a
            );
        },
    }),
    (gj.datepicker.events = {
        change: function (a) {
            return a.triggerHandler("change");
        },
        select: function (a, b) {
            return a.triggerHandler("select", [b]);
        },
        open: function (a) {
            return a.triggerHandler("open");
        },
        close: function (a) {
            return a.triggerHandler("close");
        },
    }),
    (gj.datepicker.widget = function (a, b) {
        var c = this,
            d = gj.datepicker.methods;
        return (
            (c.value = function (a) {
                return d.value(this, a);
            }),
            (c.destroy = function () {
                return d.destroy(this);
            }),
            (c.open = function () {
                return d.open(this, this.data());
            }),
            (c.close = function () {
                return d.close(this);
            }),
            $.extend(a, c),
            "true" !== a.attr("data-datepicker") && d.init.call(a, b),
            a
        );
    }),
    (gj.datepicker.widget.prototype = new gj.widget()),
    (gj.datepicker.widget.constructor = gj.datepicker.widget),
    (function (a) {
        a.fn.datepicker = function (a) {
            var b;
            if (this && this.length) {
                if ("object" != typeof a && a) {
                    if (((b = new gj.datepicker.widget(this, null)), b[a])) return b[a].apply(this, Array.prototype.slice.call(arguments, 1));
                    throw "Method " + a + " does not exist.";
                }
                return new gj.datepicker.widget(this, a);
            }
        };
    })(jQuery),
    (gj.timepicker = { plugins: {} }),
    (gj.timepicker.config = {
        base: {
            width: void 0,
            modal: !0,
            header: !0,
            footer: !0,
            format: "HH:MM",
            uiLibrary: "materialdesign",
            value: void 0,
            mode: "ampm",
            locale: "en-us",
            size: "default",
            icons: { rightIcon: '<i class="gj-icon clock" />' },
            style: { modal: "gj-modal", wrapper: "gj-timepicker gj-timepicker-md gj-unselectable", input: "gj-textbox-md", clock: "gj-picker gj-picker-md timepicker", footer: "", button: "gj-button-md" },
        },
        bootstrap: {
            style: { wrapper: "gj-timepicker gj-timepicker-bootstrap gj-unselectable input-group", input: "form-control", clock: "gj-picker gj-picker-bootstrap timepicker", footer: "modal-footer", button: "btn btn-default" },
            iconsLibrary: "glyphicons",
        },
        bootstrap4: {
            style: { wrapper: "gj-timepicker gj-timepicker-bootstrap gj-unselectable input-group", input: "form-control border", clock: "gj-picker gj-picker-bootstrap timepicker", footer: "modal-footer", button: "btn btn-default" },
        },
    }),
    (gj.timepicker.methods = {
        init: function (a) {
            return gj.picker.widget.prototype.init.call(this, a, "timepicker"), this;
        },
        initialize: function () {},
        initMouse: function (a, b, c, d) {
            a.off(), a.on("mousedown", gj.timepicker.methods.mouseDownHandler(b, c)), a.on("mousemove", gj.timepicker.methods.mouseMoveHandler(b, c, d)), a.on("mouseup", gj.timepicker.methods.mouseUpHandler(b, c, d));
        },
        createPicker: function (a) {
            var b,
                c = a.data(),
                d = $('<div role="picker" />').addClass(c.style.clock).attr("guid", a.attr("data-guid")),
                e = $('<div role="hour" />'),
                f = $('<div role="minute" />'),
                g = $('<div role="header" />'),
                h = $('<div role="mode" />'),
                i = $('<div role="body" />'),
                j = $('<button class="' + c.style.button + '">' + gj.core.messages[c.locale].ok + "</button>"),
                k = $('<button class="' + c.style.button + '">' + gj.core.messages[c.locale].cancel + "</button>"),
                l = $('<div role="footer" class="' + c.style.footer + '" />');
            return (
                (b = gj.core.parseDate(c.value, c.format, c.locale)),
                !b || isNaN(b.getTime()) ? (b = new Date()) : a.attr("hours", b.getHours()),
                gj.timepicker.methods.initMouse(i, a, d, c),
                c.header &&
                    (e.on("click", function () {
                        gj.timepicker.methods.renderHours(a, d, c);
                    }),
                    f.on("click", function () {
                        gj.timepicker.methods.renderMinutes(a, d, c);
                    }),
                    g.append(e).append(":").append(f),
                    "ampm" === c.mode &&
                        (h.append(
                            $('<span role="am">' + gj.core.messages[c.locale].am + "</span>").on("click", function () {
                                var b = gj.timepicker.methods.getHour(d);
                                d.attr("mode", "am"), $(this).addClass("selected"), $(this).parent().children('[role="pm"]').removeClass("selected"), b >= 12 && d.attr("hour", b - 12), c.modal || (clearTimeout(a.timeout), a.focus());
                            })
                        ),
                        h.append("<br />"),
                        h.append(
                            $('<span role="pm">' + gj.core.messages[c.locale].pm + "</span>").on("click", function () {
                                var b = gj.timepicker.methods.getHour(d);
                                d.attr("mode", "pm"), $(this).addClass("selected"), $(this).parent().children('[role="am"]').removeClass("selected"), b < 12 && d.attr("hour", b + 12), c.modal || (clearTimeout(a.timeout), a.focus());
                            })
                        ),
                        g.append(h)),
                    d.append(g)),
                d.append(i),
                c.footer &&
                    (k.on("click", function () {
                        a.close();
                    }),
                    l.append(k),
                    j.on("click", gj.timepicker.methods.setTime(a, d)),
                    l.append(j),
                    d.append(l)),
                d.hide(),
                $("body").append(d),
                c.modal && (d.wrapAll('<div role="modal" class="' + c.style.modal + '"/>'), gj.core.center(d)),
                d
            );
        },
        getHour: function (a) {
            return parseInt(a.attr("hour"), 10) || 0;
        },
        getMinute: function (a) {
            return parseInt(a.attr("minute"), 10) || 0;
        },
        setTime: function (a, b) {
            return function () {
                var c = gj.timepicker.methods.getHour(b),
                    d = gj.timepicker.methods.getMinute(b),
                    e = b.attr("mode"),
                    f = new Date(0, 0, 0, 12 === c && "am" === e ? 0 : c, d),
                    g = a.data(),
                    h = gj.core.formatDate(f, g.format, g.locale);
                a.value(h), a.close();
            };
        },
        getPointerValue: function (a, b, c) {
            var d,
                e,
                f = 256,
                g = (Math.atan2(f / 2 - a, f / 2 - b) / Math.PI) * 180;
            switch ((g < 0 && (g = 360 + g), c)) {
                case "ampm":
                    return (d = 12 - Math.round((12 * g) / 360)), 0 === d ? 12 : d;
                case "24hr":
                    return (e = Math.sqrt(Math.pow(f / 2 - a, 2) + Math.pow(f / 2 - b, 2))), (d = 12 - Math.round((12 * g) / 360)), 0 === d && (d = 12), e < f / 2 - 32 && (d = 12 === d ? 0 : d + 12), d;
                case "minutes":
                    return (d = Math.round(60 - (60 * g) / 360)), 60 === d ? 0 : d;
            }
        },
        updateArrow: function (a, b, c, d) {
            var e,
                f,
                g = b.mouseX(a),
                h = b.mouseY(a),
                i = window.scrollY || window.pageYOffset || 0,
                j = window.scrollX || window.pageXOffset || 0;
            (e = a.target.getBoundingClientRect()),
                "hours" == d.dialMode
                    ? ((f = gj.timepicker.methods.getPointerValue(g - j - e.left, h - i - e.top, d.mode)), c.attr("hour", "ampm" === d.mode && "pm" === c.attr("mode") && f < 12 ? f + 12 : f))
                    : "minutes" == d.dialMode && ((f = gj.timepicker.methods.getPointerValue(g - j - e.left, h - i - e.top, "minutes")), c.attr("minute", f)),
                gj.timepicker.methods.update(b, c, d);
        },
        update: function (a, b, c) {
            var d, e, f, g, h, i;
            (d = gj.timepicker.methods.getHour(b)),
                (e = gj.timepicker.methods.getMinute(b)),
                (f = b.find('[role="arrow"]')),
                "hours" == c.dialMode && (0 == d || d > 12) && "24hr" === c.mode ? f.css("width", "calc(50% - 52px)") : f.css("width", "calc(50% - 20px)"),
                "hours" == c.dialMode ? f.css("transform", "rotate(" + (30 * d - 90).toString() + "deg)") : f.css("transform", "rotate(" + (6 * e - 90).toString() + "deg)"),
                f.show(),
                (g = "ampm" === c.mode && d > 12 ? d - 12 : 0 == d ? 12 : d),
                (i = b.find('[role="body"] span')),
                i.removeClass("selected"),
                i
                    .filter(function (a) {
                        return "hours" == c.dialMode ? parseInt($(this).text(), 10) == g : parseInt($(this).text(), 10) == e;
                    })
                    .addClass("selected"),
                c.header &&
                    ((h = b.find('[role="header"]')),
                    h.find('[role="hour"]').text(g),
                    h.find('[role="minute"]').text(gj.core.pad(e)),
                    "ampm" === c.mode && (d >= 12 ? (h.find('[role="pm"]').addClass("selected"), h.find('[role="am"]').removeClass("selected")) : (h.find('[role="am"]').addClass("selected"), h.find('[role="pm"]').removeClass("selected"))));
        },
        mouseDownHandler: function (a, b) {
            return function (b) {
                a.mouseMove = !0;
            };
        },
        mouseMoveHandler: function (a, b, c) {
            return function (d) {
                a.mouseMove && gj.timepicker.methods.updateArrow(d, a, b, c);
            };
        },
        mouseUpHandler: function (a, b, c) {
            return function (d) {
                gj.timepicker.methods.updateArrow(d, a, b, c),
                    (a.mouseMove = !1),
                    c.modal || (clearTimeout(a.timeout), a.focus()),
                    "hours" == c.dialMode
                        ? setTimeout(function () {
                              gj.timepicker.events.select(a, "hour"), gj.timepicker.methods.renderMinutes(a, b, c);
                          }, 1e3)
                        : "minutes" == c.dialMode && (!0 !== c.footer && !1 !== c.autoClose && gj.timepicker.methods.setTime(a, b)(), gj.timepicker.events.select(a, "minute"));
            };
        },
        renderHours: function (a, b, c) {
            var d,
                e = b.find('[role="body"]');
            clearTimeout(a.timeout),
                e.empty(),
                (d = $('<div role="dial"></div>')),
                d.append('<div role="arrow" style="transform: rotate(-90deg); display: none;"><div class="arrow-begin"></div><div class="arrow-end"></div></div>'),
                d.append('<span role="hour" style="transform: translate(54px, -93.5307px);">1</span>'),
                d.append('<span role="hour" style="transform: translate(93.5307px, -54px);">2</span>'),
                d.append('<span role="hour" style="transform: translate(108px, 0px);">3</span>'),
                d.append('<span role="hour" style="transform: translate(93.5307px, 54px);">4</span>'),
                d.append('<span role="hour" style="transform: translate(54px, 93.5307px);">5</span>'),
                d.append('<span role="hour" style="transform: translate(6.61309e-15px, 108px);">6</span>'),
                d.append('<span role="hour" style="transform: translate(-54px, 93.5307px);">7</span>'),
                d.append('<span role="hour" style="transform: translate(-93.5307px, 54px);">8</span>'),
                d.append('<span role="hour" style="transform: translate(-108px, 1.32262e-14px);">9</span>'),
                d.append('<span role="hour" style="transform: translate(-93.5307px, -54px);">10</span>'),
                d.append('<span role="hour" style="transform: translate(-54px, -93.5307px);">11</span>'),
                d.append('<span role="hour" style="transform: translate(-1.98393e-14px, -108px);">12</span>'),
                "24hr" === c.mode &&
                    (d.append('<span role="hour" style="transform: translate(38px, -65.8179px);">13</span>'),
                    d.append('<span role="hour" style="transform: translate(65.8179px, -38px);">14</span>'),
                    d.append('<span role="hour" style="transform: translate(76px, 0px);">15</span>'),
                    d.append('<span role="hour" style="transform: translate(65.8179px, 38px);">16</span>'),
                    d.append('<span role="hour" style="transform: translate(38px, 65.8179px);">17</span>'),
                    d.append('<span role="hour" style="transform: translate(4.65366e-15px, 76px);">18</span>'),
                    d.append('<span role="hour" style="transform: translate(-38px, 65.8179px);">19</span>'),
                    d.append('<span role="hour" style="transform: translate(-65.8179px, 38px);">20</span>'),
                    d.append('<span role="hour" style="transform: translate(-76px, 9.30732e-15px);">21</span>'),
                    d.append('<span role="hour" style="transform: translate(-65.8179px, -38px);">22</span>'),
                    d.append('<span role="hour" style="transform: translate(-38px, -65.8179px);">23</span>'),
                    d.append('<span role="hour" style="transform: translate(-1.3961e-14px, -76px);">00</span>')),
                e.append(d),
                b.find('[role="header"] [role="hour"]').addClass("selected"),
                b.find('[role="header"] [role="minute"]').removeClass("selected"),
                (c.dialMode = "hours"),
                gj.timepicker.methods.update(a, b, c);
        },
        renderMinutes: function (a, b, c) {
            var d = b.find('[role="body"]');
            clearTimeout(a.timeout),
                d.empty(),
                ($dial = $('<div role="dial"></div>')),
                $dial.append('<div role="arrow" style="transform: rotate(-90deg); display: none;"><div class="arrow-begin"></div><div class="arrow-end"></div></div>'),
                $dial.append('<span role="hour" style="transform: translate(54px, -93.5307px);">5</span>'),
                $dial.append('<span role="hour" style="transform: translate(93.5307px, -54px);">10</span>'),
                $dial.append('<span role="hour" style="transform: translate(108px, 0px);">15</span>'),
                $dial.append('<span role="hour" style="transform: translate(93.5307px, 54px);">20</span>'),
                $dial.append('<span role="hour" style="transform: translate(54px, 93.5307px);">25</span>'),
                $dial.append('<span role="hour" style="transform: translate(6.61309e-15px, 108px);">30</span>'),
                $dial.append('<span role="hour" style="transform: translate(-54px, 93.5307px);">35</span>'),
                $dial.append('<span role="hour" style="transform: translate(-93.5307px, 54px);">40</span>'),
                $dial.append('<span role="hour" style="transform: translate(-108px, 1.32262e-14px);">45</span>'),
                $dial.append('<span role="hour" style="transform: translate(-93.5307px, -54px);">50</span>'),
                $dial.append('<span role="hour" style="transform: translate(-54px, -93.5307px);">55</span>'),
                $dial.append('<span role="hour" style="transform: translate(-1.98393e-14px, -108px);">00</span>'),
                d.append($dial),
                b.find('[role="header"] [role="hour"]').removeClass("selected"),
                b.find('[role="header"] [role="minute"]').addClass("selected"),
                (c.dialMode = "minutes"),
                gj.timepicker.methods.update(a, b, c);
        },
        open: function (a) {
            var b,
                c,
                d = a.data(),
                e = $("body").find('[role="picker"][guid="' + a.attr("data-guid") + '"]');
            return (
                (b = a.value() ? gj.core.parseDate(a.value(), d.format, d.locale) : new Date()),
                (c = b.getHours()),
                "ampm" === d.mode && e.attr("mode", c > 12 ? "pm" : "am"),
                e.attr("hour", c),
                e.attr("minute", b.getMinutes()),
                gj.timepicker.methods.renderHours(a, e, d),
                gj.picker.widget.prototype.open.call(a, "timepicker"),
                a
            );
        },
        value: function (a, b) {
            a.data();
            return void 0 === b ? a.val() : (a.val(b), gj.timepicker.events.change(a), a);
        },
    }),
    (gj.timepicker.events = {
        change: function (a) {
            return a.triggerHandler("change");
        },
        select: function (a, b) {
            return a.triggerHandler("select", [b]);
        },
        open: function (a) {
            return a.triggerHandler("open");
        },
        close: function (a) {
            return a.triggerHandler("close");
        },
    }),
    (gj.timepicker.widget = function (a, b) {
        var c = this,
            d = gj.timepicker.methods;
        return (
            (c.mouseMove = !1),
            (c.value = function (a) {
                return d.value(this, a);
            }),
            (c.destroy = function () {
                return gj.picker.widget.prototype.destroy.call(this, "timepicker");
            }),
            (c.open = function () {
                return gj.timepicker.methods.open(this);
            }),
            (c.close = function () {
                return gj.picker.widget.prototype.close.call(this, "timepicker");
            }),
            $.extend(a, c),
            "true" !== a.attr("data-timepicker") && d.init.call(a, b),
            a
        );
    }),
    (gj.timepicker.widget.prototype = new gj.picker.widget()),
    (gj.timepicker.widget.constructor = gj.timepicker.widget),
    (function (a) {
        a.fn.timepicker = function (a) {
            var b;
            if (this && this.length) {
                if ("object" != typeof a && a) {
                    if (((b = new gj.timepicker.widget(this, null)), b[a])) return b[a].apply(this, Array.prototype.slice.call(arguments, 1));
                    throw "Method " + a + " does not exist.";
                }
                return new gj.timepicker.widget(this, a);
            }
        };
    })(jQuery),
    (gj.datetimepicker = { plugins: {}, messages: { "en-us": {} } }),
    (gj.datetimepicker.config = {
        base: {
            datepicker: gj.datepicker.config.base,
            timepicker: gj.timepicker.config.base,
            uiLibrary: "materialdesign",
            value: void 0,
            format: "HH:MM mm/dd/yyyy",
            width: void 0,
            modal: !1,
            footer: !1,
            size: "default",
            locale: "en-us",
            icons: {},
            style: { calendar: "gj-picker gj-picker-md datetimepicker gj-unselectable" },
        },
        bootstrap: { style: { calendar: "gj-picker gj-picker-bootstrap datetimepicker gj-unselectable" }, iconsLibrary: "glyphicons" },
        bootstrap4: { style: { calendar: "gj-picker gj-picker-bootstrap datetimepicker gj-unselectable" } },
    }),
    (gj.datetimepicker.methods = {
        init: function (a) {
            return gj.widget.prototype.init.call(this, a, "datetimepicker"), this.attr("data-datetimepicker", "true"), gj.datetimepicker.methods.initialize(this), this;
        },
        getConfig: function (a, b) {
            var c = gj.widget.prototype.getConfig.call(this, a, b);
            return (
                (uiLibrary = a.hasOwnProperty("uiLibrary") ? a.uiLibrary : c.uiLibrary),
                gj.datepicker.config[uiLibrary] && $.extend(!0, c.datepicker, gj.datepicker.config[uiLibrary]),
                gj.timepicker.config[uiLibrary] && $.extend(!0, c.timepicker, gj.timepicker.config[uiLibrary]),
                (iconsLibrary = a.hasOwnProperty("iconsLibrary") ? a.iconsLibrary : c.iconsLibrary),
                gj.datepicker.config[iconsLibrary] && $.extend(!0, c.datepicker, gj.datepicker.config[iconsLibrary]),
                gj.timepicker.config[iconsLibrary] && $.extend(!0, c.timepicker, gj.timepicker.config[iconsLibrary]),
                c
            );
        },
        initialize: function (a) {
            var b,
                c,
                d,
                e,
                f,
                g,
                h,
                i,
                j = a.data();
            (j.datepicker.uiLibrary = j.uiLibrary),
                (j.datepicker.iconsLibrary = j.iconsLibrary),
                (j.datepicker.width = j.width),
                (j.datepicker.format = j.format),
                (j.datepicker.locale = j.locale),
                (j.datepicker.modal = j.modal),
                (j.datepicker.footer = j.footer),
                (j.datepicker.style.calendar = j.style.calendar),
                (j.datepicker.value = j.value),
                (j.datepicker.size = j.size),
                (j.datepicker.autoClose = !1),
                gj.datepicker.methods.initialize(a, j.datepicker),
                a.on("select", function (c, d) {
                    var e, f;
                    "day" === d
                        ? gj.datetimepicker.methods.createShowHourHandler(a, b, j)()
                        : "minute" === d &&
                          b.attr("selectedDay") &&
                          !0 !== j.footer &&
                          ((selectedDay = b.attr("selectedDay").split("-")),
                          (e = new Date(selectedDay[0], selectedDay[1], selectedDay[2], b.attr("hour") || 0, b.attr("minute") || 0)),
                          (f = gj.core.formatDate(e, j.format, j.locale)),
                          a.val(f),
                          gj.datetimepicker.events.change(a),
                          gj.datetimepicker.methods.close(a));
                }),
                a.on("open", function () {
                    var a = b.children('[role="header"]');
                    a.find('[role="calendarMode"]').addClass("selected"), a.find('[role="clockMode"]').removeClass("selected");
                }),
                (b = $("body").find('[role="calendar"][guid="' + a.attr("data-guid") + '"]')),
                (f = j.value ? gj.core.parseDate(j.value, j.format, j.locale) : new Date()),
                b.attr("hour", f.getHours()),
                b.attr("minute", f.getMinutes()),
                (j.timepicker.uiLibrary = j.uiLibrary),
                (j.timepicker.iconsLibrary = j.iconsLibrary),
                (j.timepicker.format = j.format),
                (j.timepicker.locale = j.locale),
                (j.timepicker.header = !0),
                (j.timepicker.footer = j.footer),
                (j.timepicker.size = j.size),
                (j.timepicker.mode = "24hr"),
                (j.timepicker.autoClose = !1),
                (c = $('<div role="header" />')),
                (d = $('<div role="date" class="selected" />')),
                d.on("click", gj.datetimepicker.methods.createShowDateHandler(a, b, j)),
                d.html(gj.core.formatDate(new Date(), "ddd, mmm dd", j.locale)),
                c.append(d),
                (g = $('<div role="switch"></div>')),
                (h = $('<i class="gj-icon selected" role="calendarMode">event</i>')),
                h.on("click", gj.datetimepicker.methods.createShowDateHandler(a, b, j)),
                g.append(h),
                (e = $('<div role="time" />')),
                e.append($('<div role="hour" />').on("click", gj.datetimepicker.methods.createShowHourHandler(a, b, j)).html(gj.core.formatDate(new Date(), "HH", j.locale))),
                e.append(":"),
                e.append($('<div role="minute" />').on("click", gj.datetimepicker.methods.createShowMinuteHandler(a, b, j)).html(gj.core.formatDate(new Date(), "MM", j.locale))),
                g.append(e),
                (i = $('<i class="gj-icon" role="clockMode">clock</i>')),
                i.on("click", gj.datetimepicker.methods.createShowHourHandler(a, b, j)),
                g.append(i),
                c.append(g),
                b.prepend(c);
        },
        createShowDateHandler: function (a, b, c) {
            return function (d) {
                var e = b.children('[role="header"]');
                e.find('[role="calendarMode"]').addClass("selected"),
                    e.find('[role="date"]').addClass("selected"),
                    e.find('[role="clockMode"]').removeClass("selected"),
                    e.find('[role="hour"]').removeClass("selected"),
                    e.find('[role="minute"]').removeClass("selected"),
                    gj.datepicker.methods.renderMonth(a, b, c.datepicker);
            };
        },
        createShowHourHandler: function (a, b, c) {
            return function () {
                var d = b.children('[role="header"]');
                d.find('[role="calendarMode"]').removeClass("selected"),
                    d.find('[role="date"]').removeClass("selected"),
                    d.find('[role="clockMode"]').addClass("selected"),
                    d.find('[role="hour"]').addClass("selected"),
                    d.find('[role="minute"]').removeClass("selected"),
                    gj.timepicker.methods.initMouse(b.children('[role="body"]'), a, b, c.timepicker),
                    gj.timepicker.methods.renderHours(a, b, c.timepicker);
            };
        },
        createShowMinuteHandler: function (a, b, c) {
            return function () {
                var d = b.children('[role="header"]');
                d.find('[role="calendarMode"]').removeClass("selected"),
                    d.find('[role="date"]').removeClass("selected"),
                    d.find('[role="clockMode"]').addClass("selected"),
                    d.find('[role="hour"]').removeClass("selected"),
                    d.find('[role="minute"]').addClass("selected"),
                    gj.timepicker.methods.initMouse(b.children('[role="body"]'), a, b, c.timepicker),
                    gj.timepicker.methods.renderMinutes(a, b, c.timepicker);
            };
        },
        close: function (a) {
            var b = $("body").find('[role="calendar"][guid="' + a.attr("data-guid") + '"]');
            b.hide(), b.closest('div[role="modal"]').hide();
        },
        value: function (a, b) {
            var c,
                d,
                e,
                f = a.data();
            return void 0 === b
                ? a.val()
                : ((d = gj.core.parseDate(b, f.format, f.locale)),
                  d
                      ? ((c = $("body").find('[role="calendar"][guid="' + a.attr("data-guid") + '"]')),
                        gj.datepicker.methods.dayClickHandler(a, c, f, d)(),
                        (e = d.getHours()),
                        "ampm" === f.mode && c.attr("mode", e > 12 ? "pm" : "am"),
                        c.attr("hour", e),
                        c.attr("minute", d.getMinutes()),
                        a.val(b))
                      : a.val(""),
                  a);
        },
        destroy: function (a) {
            var b = a.data(),
                c = a.parent(),
                d = $("body").find('[role="calendar"][guid="' + a.attr("data-guid") + '"]');
            return (
                b &&
                    (a.off(),
                    d.parent('[role="modal"]').length > 0 && d.unwrap(),
                    d.remove(),
                    a.removeData(),
                    a.removeAttr("data-type").removeAttr("data-guid").removeAttr("data-datetimepicker"),
                    a.removeClass(),
                    c.children('[role="right-icon"]').remove(),
                    a.unwrap()),
                a
            );
        },
    }),
    (gj.datetimepicker.events = {
        change: function (a) {
            return a.triggerHandler("change");
        },
    }),
    (gj.datetimepicker.widget = function (a, b) {
        var c = this,
            d = gj.datetimepicker.methods;
        return (
            (c.mouseMove = !1),
            (c.value = function (a) {
                return d.value(this, a);
            }),
            (c.open = function () {
                gj.datepicker.methods.open(this, this.data().datepicker);
            }),
            (c.close = function () {
                gj.datepicker.methods.close(this);
            }),
            (c.destroy = function () {
                return d.destroy(this);
            }),
            $.extend(a, c),
            "true" !== a.attr("data-datetimepicker") && d.init.call(a, b),
            a
        );
    }),
    (gj.datetimepicker.widget.prototype = new gj.widget()),
    (gj.datetimepicker.widget.constructor = gj.datetimepicker.widget),
    (gj.datetimepicker.widget.prototype.getConfig = gj.datetimepicker.methods.getConfig),
    (function (a) {
        a.fn.datetimepicker = function (a) {
            var b;
            if (this && this.length) {
                if ("object" != typeof a && a) {
                    if (((b = new gj.datetimepicker.widget(this, null)), b[a])) return b[a].apply(this, Array.prototype.slice.call(arguments, 1));
                    throw "Method " + a + " does not exist.";
                }
                return new gj.datetimepicker.widget(this, a);
            }
        };
    })(jQuery),
    (gj.slider = { plugins: {}, messages: { "en-us": {} } }),
    (gj.slider.config = {
        base: { min: 0, max: 100, width: void 0, uiLibrary: "materialdesign", value: void 0, icons: {}, style: { wrapper: "gj-slider gj-slider-md", progress: void 0, track: void 0 } },
        bootstrap: { style: { wrapper: "gj-slider gj-slider-bootstrap gj-slider-bootstrap-3", progress: "progress-bar", track: "progress" } },
        bootstrap4: { style: { wrapper: "gj-slider gj-slider-bootstrap gj-slider-bootstrap-4", progress: "progress-bar", track: "progress" } },
    }),
    (gj.slider.methods = {
        init: function (a) {
            return gj.widget.prototype.init.call(this, a, "slider"), this.attr("data-slider", "true"), gj.slider.methods.initialize(this, this.data()), this;
        },
        initialize: function (a, b) {
            var c, d, e, f;
            (a[0].style.display = "none"),
                "wrapper" !== a[0].parentElement.attributes.role ? ((c = document.createElement("div")), c.setAttribute("role", "wrapper"), a[0].parentNode.insertBefore(c, a[0]), c.appendChild(a[0])) : (c = a[0].parentElement),
                b.width && (c.style.width = b.width + "px"),
                gj.core.addClasses(c, b.style.wrapper),
                (d = a[0].querySelector('[role="track"]')),
                null == d && ((d = document.createElement("div")), d.setAttribute("role", "track"), c.appendChild(d)),
                gj.core.addClasses(d, b.style.track),
                (e = a[0].querySelector('[role="handle"]')),
                null == e && ((e = document.createElement("div")), e.setAttribute("role", "handle"), c.appendChild(e)),
                (f = a[0].querySelector('[role="progress"]')),
                null == f && ((f = document.createElement("div")), f.setAttribute("role", "progress"), c.appendChild(f)),
                gj.core.addClasses(f, b.style.progress),
                b.value || (b.value = b.min),
                gj.slider.methods.value(a, b, b.value),
                gj.documentManager.subscribeForEvent("mouseup", a.data("guid"), gj.slider.methods.createMouseUpHandler(a, e, b)),
                e.addEventListener("mousedown", gj.slider.methods.createMouseDownHandler(e, b)),
                gj.documentManager.subscribeForEvent("mousemove", a.data("guid"), gj.slider.methods.createMouseMoveHandler(a, d, e, f, b)),
                e.addEventListener("click", function (a) {
                    a.stopPropagation();
                }),
                c.addEventListener("click", gj.slider.methods.createClickHandler(a, d, e, b));
        },
        createClickHandler: function (a, b, c, d) {
            return function (e) {
                var f, g, h, i, j;
                "true" !== c.getAttribute("drag") &&
                    ((f = gj.core.position(a[0].parentElement)),
                    (g = new gj.widget().mouseX(e) - f.left),
                    (h = gj.core.width(c) / 2),
                    (i = gj.core.width(b) / (d.max - d.min)),
                    (j = Math.round((g - h) / i) + d.min),
                    gj.slider.methods.value(a, d, j));
            };
        },
        createMouseUpHandler: function (a, b, c) {
            return function (c) {
                "true" === b.getAttribute("drag") && (b.setAttribute("drag", "false"), gj.slider.events.change(a));
            };
        },
        createMouseDownHandler: function (a, b) {
            return function (b) {
                a.setAttribute("drag", "true");
            };
        },
        createMouseMoveHandler: function (a, b, c, d, e) {
            return function (d) {
                var f, g, h, i, j, k, l;
                "true" === c.getAttribute("drag") &&
                    ((f = gj.core.position(a[0].parentElement)),
                    (g = new gj.widget().mouseX(d) - f.left),
                    (h = gj.core.width(b)),
                    (i = gj.core.width(c) / 2),
                    (j = h / (e.max - e.min)),
                    (k = (e.value - e.min) * j),
                    g >= i && g <= h + i && (g > k + j / 2 || g < k - j / 2) && ((l = Math.round((g - i) / j) + e.min), gj.slider.methods.value(a, e, l)));
            };
        },
        value: function (a, b, c) {
            var d, e, f, g;
            return void 0 === c
                ? a[0].value
                : (a[0].setAttribute("value", c),
                  (b.value = c),
                  (e = a.parent().children('[role="track"]')[0]),
                  (d = gj.core.width(e) / (b.max - b.min)),
                  (f = a.parent().children('[role="handle"]')[0]),
                  (f.style.left = (c - b.min) * d + "px"),
                  (g = a.parent().children('[role="progress"]')[0]),
                  (g.style.width = (c - b.min) * d + "px"),
                  gj.slider.events.slide(a, c),
                  a);
        },
        destroy: function (a) {
            var b = a.data(),
                c = a.parent();
            return (
                b &&
                    (c.children('[role="track"]').remove(),
                    c.children('[role="handle"]').remove(),
                    c.children('[role="progress"]').remove(),
                    a.unwrap(),
                    a.off(),
                    a.removeData(),
                    a.removeAttr("data-type").removeAttr("data-guid").removeAttr("data-slider"),
                    a.removeClass(),
                    a.show()),
                a
            );
        },
    }),
    (gj.slider.events = {
        change: function (a) {
            return a.triggerHandler("change");
        },
        slide: function (a, b) {
            return a.triggerHandler("slide", [b]);
        },
    }),
    (gj.slider.widget = function (a, b) {
        var c = this,
            d = gj.slider.methods;
        return (
            (c.value = function (a) {
                return d.value(this, this.data(), a);
            }),
            (c.destroy = function () {
                return d.destroy(this);
            }),
            $.extend(a, c),
            "true" !== a.attr("data-slider") && d.init.call(a, b),
            a
        );
    }),
    (gj.slider.widget.prototype = new gj.widget()),
    (gj.slider.widget.constructor = gj.slider.widget),
    (function (a) {
        a.fn.slider = function (a) {
            var b;
            if (this && this.length) {
                if ("object" != typeof a && a) {
                    if (((b = new gj.slider.widget(this, null)), b[a])) return b[a].apply(this, Array.prototype.slice.call(arguments, 1));
                    throw "Method " + a + " does not exist.";
                }
                return new gj.slider.widget(this, a);
            }
        };
    })(jQuery),
    (gj.colorpicker = { plugins: {}, messages: { "en-us": {} } }),
    (gj.colorpicker.config = {
        base: {
            uiLibrary: "materialdesign",
            value: void 0,
            icons: { rightIcon: '<i class="gj-icon">event</i>' },
            style: { modal: "gj-modal", wrapper: "gj-colorpicker gj-colorpicker-md gj-unselectable", input: "gj-textbox-md", picker: "gj-picker gj-picker-md colorpicker gj-unselectable", footer: "", button: "gj-button-md" },
        },
        bootstrap: { style: {} },
        bootstrap4: { style: {} },
    }),
    (gj.colorpicker.methods = {
        init: function (a) {
            return gj.picker.widget.prototype.init.call(this, a, "colorpicker"), gj.colorpicker.methods.initialize(this), this;
        },
        initialize: function (a) {},
        createPicker: function (a, b) {
            var c = $('<div role="picker" />').addClass(b.style.picker).attr("guid", a.attr("data-guid"));
            return c.html("test"), c.hide(), $("body").append(c), c;
        },
        open: function (a) {
            return a.val() && a.value(a.val()), gj.picker.widget.prototype.open.call(a, "colorpicker");
        },
    }),
    (gj.colorpicker.events = {
        change: function (a) {
            return a.triggerHandler("change");
        },
        select: function (a) {
            return a.triggerHandler("select");
        },
        open: function (a) {
            return a.triggerHandler("open");
        },
        close: function (a) {
            return a.triggerHandler("close");
        },
    }),
    (gj.colorpicker.widget = function (a, b) {
        var c = this,
            d = gj.colorpicker.methods;
        return (
            (c.value = function (a) {
                return d.value(this, a);
            }),
            (c.destroy = function () {
                return gj.picker.widget.prototype.destroy.call(this, "colorpicker");
            }),
            (c.open = function () {
                return d.open(this);
            }),
            (c.close = function () {
                return gj.picker.widget.prototype.close.call(this, "colorpicker");
            }),
            $.extend(a, c),
            "true" !== a.attr("data-colorpicker") && d.init.call(a, b),
            a
        );
    }),
    (gj.colorpicker.widget.prototype = new gj.picker.widget()),
    (gj.colorpicker.widget.constructor = gj.colorpicker.widget),
    (function (a) {
        a.fn.colorpicker = function (a) {
            var b;
            if (this && this.length) {
                if ("object" != typeof a && a) {
                    if (((b = new gj.colorpicker.widget(this, null)), b[a])) return b[a].apply(this, Array.prototype.slice.call(arguments, 1));
                    throw "Method " + a + " does not exist.";
                }
                return new gj.colorpicker.widget(this, a);
            }
        };
    })(jQuery);

// 5. nicescroll
!(function (a) {
    "function" == typeof define && define.amd ? define(["jquery"], a) : "object" == typeof exports ? (module.exports = a(require("jquery"))) : a(jQuery);
})(function (b) {
    "use strict";
    var l = !1,
        m = !1,
        n = 0,
        o = 2e3,
        p = 0,
        c = b,
        e = document,
        a = window,
        q = c(a),
        r = [],
        f = a.requestAnimationFrame || a.webkitRequestAnimationFrame || a.mozRequestAnimationFrame || !1,
        g = a.cancelAnimationFrame || a.webkitCancelAnimationFrame || a.mozCancelAnimationFrame || !1;
    if (f) a.cancelAnimationFrame || (g = function (a) {});
    else {
        var s = 0;
        (f = function (e, f) {
            var b = new Date().getTime(),
                c = Math.max(0, 16 - (b - s)),
                d = a.setTimeout(function () {
                    e(b + c);
                }, c);
            return (s = b + c), d;
        }),
            (g = function (b) {
                a.clearTimeout(b);
            });
    }
    var d,
        h,
        i,
        t = a.MutationObserver || a.WebKitMutationObserver || !1,
        u =
            Date.now ||
            function () {
                return new Date().getTime();
            },
        k = {
            zindex: "auto",
            cursoropacitymin: 0,
            cursoropacitymax: 1,
            cursorcolor: "#F3794D",
            cursorwidth: "6px",
            cursorborder: "1px solid #fff",
            cursorborderradius: "5px",
            scrollspeed: 40,
            mousescrollstep: 27,
            touchbehavior: !1,
            emulatetouch: !1,
            hwacceleration: !0,
            usetransition: !0,
            boxzoom: !1,
            dblclickzoom: !0,
            gesturezoom: !0,
            grabcursorenabled: !0,
            autohidemode: !0,
            background: "",
            iframeautoresize: !0,
            cursorminheight: 32,
            preservenativescrolling: !0,
            railoffset: !1,
            railhoffset: !1,
            bouncescroll: !0,
            spacebarenabled: !0,
            railpadding: { top: 0, right: 0, left: 0, bottom: 0 },
            disableoutline: !0,
            horizrailenabled: !0,
            railalign: "right",
            railvalign: "bottom",
            enabletranslate3d: !0,
            enablemousewheel: !0,
            enablekeyboard: !0,
            smoothscroll: !0,
            sensitiverail: !0,
            enablemouselockapi: !0,
            cursorfixedheight: !1,
            directionlockdeadzone: 6,
            hidecursordelay: 400,
            nativeparentscrolling: !0,
            enablescrollonselection: !0,
            overflowx: !0,
            overflowy: !0,
            cursordragspeed: 0.3,
            rtlmode: "auto",
            cursordragontouch: !1,
            oneaxismousemode: "auto",
            scriptpath: (i = (h = e.currentScript || (!!(d = e.getElementsByTagName("script")).length && d[d.length - 1])) ? h.src.split("?")[0] : "").split("/").length > 0 ? i.split("/").slice(0, -1).join("/") + "/" : "",
            preventmultitouchscrolling: !0,
            disablemutationobserver: !1,
            enableobserver: !0,
            scrollbarid: !1,
        },
        v = !1,
        w = function () {
            if (v) return v;
            var d = e.createElement("DIV"),
                c = d.style,
                g = navigator.userAgent,
                f = navigator.platform,
                b = {};
            return (
                (b.haspointerlock = "pointerLockElement" in e || "webkitPointerLockElement" in e || "mozPointerLockElement" in e),
                (b.isopera = "opera" in a),
                (b.isopera12 = b.isopera && "getUserMedia" in navigator),
                (b.isoperamini = "[object OperaMini]" === Object.prototype.toString.call(a.operamini)),
                (b.isie = "all" in e && "attachEvent" in d && !b.isopera),
                (b.isieold = b.isie && !("msInterpolationMode" in c)),
                (b.isie7 = b.isie && !b.isieold && (!("documentMode" in e) || 7 === e.documentMode)),
                (b.isie8 = b.isie && "documentMode" in e && 8 === e.documentMode),
                (b.isie9 = b.isie && "performance" in a && 9 === e.documentMode),
                (b.isie10 = b.isie && "performance" in a && 10 === e.documentMode),
                (b.isie11 = "msRequestFullscreen" in d && e.documentMode >= 11),
                (b.ismsedge = "msCredentials" in a),
                (b.ismozilla = "MozAppearance" in c),
                (b.iswebkit = !b.ismsedge && "WebkitAppearance" in c),
                (b.ischrome = b.iswebkit && "chrome" in a),
                (b.ischrome38 = b.ischrome && "touchAction" in c),
                (b.ischrome22 = !b.ischrome38 && b.ischrome && b.haspointerlock),
                (b.ischrome26 = !b.ischrome38 && b.ischrome && "transition" in c),
                (b.cantouch = "ontouchstart" in e.documentElement || "ontouchstart" in a),
                (b.hasw3ctouch = !!a.PointerEvent && (navigator.maxTouchPoints > 0 || navigator.msMaxTouchPoints > 0)),
                (b.hasmstouch = !b.hasw3ctouch && !!a.MSPointerEvent),
                (b.ismac = /^mac$/i.test(f)),
                (b.isios = b.cantouch && /iphone|ipad|ipod/i.test(f)),
                (b.isios4 = b.isios && !("seal" in Object)),
                (b.isios7 = b.isios && "webkitHidden" in e),
                (b.isios8 = b.isios && "hidden" in e),
                (b.isios10 = b.isios && a.Proxy),
                (b.isandroid = /android/i.test(g)),
                (b.haseventlistener = "addEventListener" in d),
                (b.trstyle = !1),
                (b.hastransform = !1),
                (b.hastranslate3d = !1),
                (b.transitionstyle = !1),
                (b.hastransition = !1),
                (b.transitionend = !1),
                (b.trstyle = "transform"),
                (b.hastransform =
                    "transform" in c ||
                    (function () {
                        for (var d = ["msTransform", "webkitTransform", "MozTransform", "OTransform"], a = 0, e = d.length; a < e; a++)
                            if (void 0 !== c[d[a]]) {
                                b.trstyle = d[a];
                                break;
                            }
                        b.hastransform = !!b.trstyle;
                    })()),
                b.hastransform && ((c[b.trstyle] = "translate3d(1px,2px,3px)"), (b.hastranslate3d = /translate3d/.test(c[b.trstyle]))),
                (b.transitionstyle = "transition"),
                (b.prefixstyle = ""),
                (b.transitionend = "transitionend"),
                (b.hastransition =
                    "transition" in c ||
                    (function () {
                        b.transitionend = !1;
                        for (
                            var d = ["webkitTransition", "msTransition", "MozTransition", "OTransition", "OTransition", "KhtmlTransition"],
                                e = ["-webkit-", "-ms-", "-moz-", "-o-", "-o", "-khtml-"],
                                f = ["webkitTransitionEnd", "msTransitionEnd", "transitionend", "otransitionend", "oTransitionEnd", "KhtmlTransitionEnd"],
                                a = 0,
                                g = d.length;
                            a < g;
                            a++
                        )
                            if (d[a] in c) {
                                (b.transitionstyle = d[a]), (b.prefixstyle = e[a]), (b.transitionend = f[a]);
                                break;
                            }
                        b.ischrome26 && (b.prefixstyle = e[1]), (b.hastransition = b.transitionstyle);
                    })()),
                (b.cursorgrabvalue = (function () {
                    var a = ["grab", "-webkit-grab", "-moz-grab"];
                    ((b.ischrome && !b.ischrome38) || b.isie) && (a = []);
                    for (var d = 0, f = a.length; d < f; d++) {
                        var e = a[d];
                        if (((c.cursor = e), c.cursor == e)) return e;
                    }
                    return "url(https://cdnjs.cloudflare.com/ajax/libs/slider-pro/1.3.0/css/images/openhand.cur),n-resize";
                })()),
                (b.hasmousecapture = "setCapture" in d),
                (b.hasMutationObserver = !1 !== t),
                (d = null),
                (v = b),
                b
            );
        },
        x = function (s, z) {
            function C() {
                var a = h.doc.css(d.trstyle);
                return (
                    !(!a || "matrix" != a.substr(0, 6)) &&
                    a
                        .replace(/^.*\((.*)\)$/g, "$1")
                        .replace(/px/g, "")
                        .split(/, +/)
                );
            }
            function D(c, d, e) {
                var b = c.css(d),
                    a = parseFloat(b);
                if (isNaN(a)) {
                    var f = 3 == (a = H[b] || 0) ? (e ? h.win.outerHeight() - h.win.innerHeight() : h.win.outerWidth() - h.win.innerWidth()) : 1;
                    return h.isie8 && a && (a += 1), f ? a : 0;
                }
                return a;
            }
            function E(b, c, e, d) {
                h._bind(
                    b,
                    c,
                    function (d) {
                        var f = {
                            original: (d = d || a.event),
                            target: d.target || d.srcElement,
                            type: "wheel",
                            deltaMode: "MozMousePixelScroll" == d.type ? 0 : 1,
                            deltaX: 0,
                            deltaZ: 0,
                            preventDefault: function () {
                                return d.preventDefault ? d.preventDefault() : (d.returnValue = !1), !1;
                            },
                            stopImmediatePropagation: function () {
                                d.stopImmediatePropagation ? d.stopImmediatePropagation() : (d.cancelBubble = !0);
                            },
                        };
                        return (
                            "mousewheel" == c
                                ? (d.wheelDeltaX && (f.deltaX = -0.025 * d.wheelDeltaX), d.wheelDeltaY && (f.deltaY = -0.025 * d.wheelDeltaY), f.deltaY || f.deltaX || (f.deltaY = -0.025 * d.wheelDelta))
                                : (f.deltaY = d.detail),
                            e.call(b, f)
                        );
                    },
                    d
                );
            }
            function F(c, a, g, i) {
                h.scrollrunning || ((h.newscrolly = h.getScrollTop()), (h.newscrollx = h.getScrollLeft()), (N = u()));
                var j = u() - N;
                if (((N = u()), j > 350 ? (O = 1) : (O += (2 - O) / 10), (c = (c * O) | 0), (a = (a * O) | 0), c)) {
                    if (i) {
                        if (c < 0) {
                            if (h.getScrollLeft() >= h.page.maxw) return !0;
                        } else if (0 >= h.getScrollLeft()) return !0;
                    }
                    var e = c > 0 ? 1 : -1;
                    M !== e && (h.scrollmom && h.scrollmom.stop(), (h.newscrollx = h.getScrollLeft()), (M = e)), (h.lastdeltax -= c);
                }
                if (a) {
                    if (
                        (function () {
                            var b = h.getScrollTop();
                            if (a < 0) {
                                if (b >= h.page.maxh) return !0;
                            } else if (b <= 0) return !0;
                        })()
                    ) {
                        if (b.nativeparentscrolling && g && !h.ispage && !h.zoomactive) return !0;
                        var d = h.view.h >> 1;
                        h.newscrolly < -d ? ((h.newscrolly = -d), (a = -1)) : h.newscrolly > h.page.maxh + d ? ((h.newscrolly = h.page.maxh + d), (a = 1)) : (a = 0);
                    }
                    var f = a > 0 ? 1 : -1;
                    L !== f && (h.scrollmom && h.scrollmom.stop(), (h.newscrolly = h.getScrollTop()), (L = f)), (h.lastdeltay -= a);
                }
                (a || c) &&
                    h.synched("relativexy", function () {
                        var a = h.lastdeltay + h.newscrolly;
                        h.lastdeltay = 0;
                        var b = h.lastdeltax + h.newscrollx;
                        (h.lastdeltax = 0), h.rail.drag || h.doScrollPos(b, a);
                    });
            }
            function G(c, f, e) {
                var a, d;
                return (
                    !(e || !P) ||
                    (0 === c.deltaMode
                        ? ((a = (-c.deltaX * (b.mousescrollstep / 54)) | 0), (d = (-c.deltaY * (b.mousescrollstep / 54)) | 0))
                        : 1 === c.deltaMode && ((a = ((-c.deltaX * b.mousescrollstep * 50) / 80) | 0), (d = ((-c.deltaY * b.mousescrollstep * 50) / 80) | 0)),
                    f && b.oneaxismousemode && 0 === a && d && ((a = d), (d = 0), e && (a < 0 ? h.getScrollLeft() >= h.page.maxw : 0 >= h.getScrollLeft()) && ((d = a), (a = 0))),
                    h.isrtlmode && (a = -a),
                    F(a, d, e, !0) ? void (e && (P = !0)) : ((P = !1), c.stopImmediatePropagation(), c.preventDefault()))
                );
            }
            var h = this;
            (this.version = "3.7.6"), (this.name = "nicescroll"), (this.me = z);
            var x = c("body"),
                b = (this.opt = { doc: x, win: !1 });
            if ((c.extend(b, k), (b.snapbackspeed = 80), s)) for (var v in b) void 0 !== s[v] && (b[v] = s[v]);
            if (
                (b.disablemutationobserver && (t = !1),
                (this.doc = b.doc),
                (this.iddoc = (this.doc && this.doc[0] && this.doc[0].id) || ""),
                (this.ispage = /^BODY|HTML/.test(b.win ? b.win[0].nodeName : this.doc[0].nodeName)),
                (this.haswrapper = !1 !== b.win),
                (this.win = b.win || (this.ispage ? q : this.doc)),
                (this.docscroll = this.ispage && !this.haswrapper ? q : this.win),
                (this.body = x),
                (this.viewport = !1),
                (this.isfixed = !1),
                (this.iframe = !1),
                (this.isiframe = "IFRAME" == this.doc[0].nodeName && "IFRAME" == this.win[0].nodeName),
                (this.istextarea = "TEXTAREA" == this.win[0].nodeName),
                (this.forcescreen = !1),
                (this.canshowonmouseevent = "scroll" != b.autohidemode),
                (this.onmousedown = !1),
                (this.onmouseup = !1),
                (this.onmousemove = !1),
                (this.onmousewheel = !1),
                (this.onkeypress = !1),
                (this.ongesturezoom = !1),
                (this.onclick = !1),
                (this.onscrollstart = !1),
                (this.onscrollend = !1),
                (this.onscrollcancel = !1),
                (this.onzoomin = !1),
                (this.onzoomout = !1),
                (this.view = !1),
                (this.page = !1),
                (this.scroll = { x: 0, y: 0 }),
                (this.scrollratio = { x: 0, y: 0 }),
                (this.cursorheight = 20),
                (this.scrollvaluemax = 0),
                "auto" == b.rtlmode)
            ) {
                var j = this.win[0] == a ? this.body : this.win,
                    i = j.css("writing-mode") || j.css("-webkit-writing-mode") || j.css("-ms-writing-mode") || j.css("-moz-writing-mode");
                "horizontal-tb" == i || "lr-tb" == i || "" === i
                    ? ((this.isrtlmode = "rtl" == j.css("direction")), (this.isvertical = !1))
                    : ((this.isrtlmode = "vertical-rl" == i || "tb" == i || "tb-rl" == i || "rl-tb" == i), (this.isvertical = "vertical-rl" == i || "tb" == i || "tb-rl" == i));
            } else (this.isrtlmode = !0 === b.rtlmode), (this.isvertical = !1);
            if (((this.scrollrunning = !1), (this.scrollmom = !1), (this.observer = !1), (this.observerremover = !1), (this.observerbody = !1), !1 !== b.scrollbarid)) this.id = b.scrollbarid;
            else
                do this.id = "ascrail" + o++;
                while (e.getElementById(this.id));
            (this.rail = !1),
                (this.cursor = !1),
                (this.cursorfreezed = !1),
                (this.selectiondrag = !1),
                (this.zoom = !1),
                (this.zoomactive = !1),
                (this.hasfocus = !1),
                (this.hasmousefocus = !1),
                (this.railslocked = !1),
                (this.locked = !1),
                (this.hidden = !1),
                (this.cursoractive = !0),
                (this.wheelprevented = !1),
                (this.overflowx = b.overflowx),
                (this.overflowy = b.overflowy),
                (this.nativescrollingarea = !1),
                (this.checkarea = 0),
                (this.events = []),
                (this.saved = {}),
                (this.delaylist = {}),
                (this.synclist = {}),
                (this.lastdeltax = 0),
                (this.lastdeltay = 0),
                (this.detected = w());
            var d = c.extend({}, this.detected);
            (this.canhwscroll = d.hastransform && b.hwacceleration),
                (this.ishwscroll = this.canhwscroll && h.haswrapper),
                this.isrtlmode ? (this.isvertical ? (this.hasreversehr = !(d.iswebkit || d.isie || d.isie11)) : (this.hasreversehr = !(d.iswebkit || (d.isie && !d.isie10 && !d.isie11)))) : (this.hasreversehr = !1),
                (this.istouchcapable = !1),
                !d.cantouch && (d.hasw3ctouch || d.hasmstouch) ? (this.istouchcapable = !0) : d.cantouch && !d.isios && !d.isandroid && (d.iswebkit || d.ismozilla) && (this.istouchcapable = !0),
                b.enablemouselockapi || ((d.hasmousecapture = !1), (d.haspointerlock = !1)),
                (this.debounced = function (a, b, c) {
                    h &&
                        (h.delaylist[a] ||
                            ((h.delaylist[a] = {
                                h: f(function () {
                                    h.delaylist[a].fn.call(h), (h.delaylist[a] = !1);
                                }, c),
                            }),
                            b.call(h)),
                        (h.delaylist[a].fn = b));
                }),
                (this.synched = function (a, b) {
                    h.synclist[a]
                        ? (h.synclist[a] = b)
                        : ((h.synclist[a] = b),
                          f(function () {
                              h && (h.synclist[a] && h.synclist[a].call(h), (h.synclist[a] = null));
                          }));
                }),
                (this.unsynched = function (a) {
                    h.synclist[a] && (h.synclist[a] = !1);
                }),
                (this.css = function (b, c) {
                    for (var a in c) h.saved.css.push([b, a, b.css(a)]), b.css(a, c[a]);
                }),
                (this.scrollTop = function (a) {
                    return void 0 === a ? h.getScrollTop() : h.setScrollTop(a);
                }),
                (this.scrollLeft = function (a) {
                    return void 0 === a ? h.getScrollLeft() : h.setScrollLeft(a);
                });
            var A = function (a, b, c, d, e, f, g) {
                (this.st = a), (this.ed = b), (this.spd = c), (this.p1 = d || 0), (this.p2 = e || 1), (this.p3 = f || 0), (this.p4 = g || 1), (this.ts = u()), (this.df = b - a);
            };
            if (
                ((A.prototype = {
                    B2: function (a) {
                        return 3 * (1 - a) * (1 - a) * a;
                    },
                    B3: function (a) {
                        return 3 * (1 - a) * a * a;
                    },
                    B4: function (a) {
                        return a * a * a;
                    },
                    getPos: function () {
                        return (u() - this.ts) / this.spd;
                    },
                    getNow: function () {
                        var a = (u() - this.ts) / this.spd,
                            b = this.B2(a) + this.B3(a) + this.B4(a);
                        return a >= 1 ? this.ed : (this.st + this.df * b) | 0;
                    },
                    update: function (a, b) {
                        return (this.st = this.getNow()), (this.ed = a), (this.spd = b), (this.ts = u()), (this.df = this.ed - this.st), this;
                    },
                }),
                this.ishwscroll)
            ) {
                (this.doc.translate = { x: 0, y: 0, tx: "0px", ty: "0px" }),
                    d.hastranslate3d && d.isios && this.doc.css("-webkit-backface-visibility", "hidden"),
                    (this.getScrollTop = function (b) {
                        if (!b) {
                            var a = C();
                            if (a) return 16 == a.length ? -a[13] : -a[5];
                            if (h.timerscroll && h.timerscroll.bz) return h.timerscroll.bz.getNow();
                        }
                        return h.doc.translate.y;
                    }),
                    (this.getScrollLeft = function (b) {
                        if (!b) {
                            var a = C();
                            if (a) return 16 == a.length ? -a[12] : -a[4];
                            if (h.timerscroll && h.timerscroll.bh) return h.timerscroll.bh.getNow();
                        }
                        return h.doc.translate.x;
                    }),
                    (this.notifyScrollEvent = function (c) {
                        var b = e.createEvent("UIEvents");
                        b.initUIEvent("scroll", !1, !1, a, 1), (b.niceevent = !0), c.dispatchEvent(b);
                    });
                var _ = this.isrtlmode ? 1 : -1;
                d.hastranslate3d && b.enabletranslate3d
                    ? ((this.setScrollTop = function (a, b) {
                          (h.doc.translate.y = a), (h.doc.translate.ty = -1 * a + "px"), h.doc.css(d.trstyle, "translate3d(" + h.doc.translate.tx + "," + h.doc.translate.ty + ",0)"), b || h.notifyScrollEvent(h.win[0]);
                      }),
                      (this.setScrollLeft = function (a, b) {
                          (h.doc.translate.x = a), (h.doc.translate.tx = a * _ + "px"), h.doc.css(d.trstyle, "translate3d(" + h.doc.translate.tx + "," + h.doc.translate.ty + ",0)"), b || h.notifyScrollEvent(h.win[0]);
                      }))
                    : ((this.setScrollTop = function (a, b) {
                          (h.doc.translate.y = a), (h.doc.translate.ty = -1 * a + "px"), h.doc.css(d.trstyle, "translate(" + h.doc.translate.tx + "," + h.doc.translate.ty + ")"), b || h.notifyScrollEvent(h.win[0]);
                      }),
                      (this.setScrollLeft = function (a, b) {
                          (h.doc.translate.x = a), (h.doc.translate.tx = a * _ + "px"), h.doc.css(d.trstyle, "translate(" + h.doc.translate.tx + "," + h.doc.translate.ty + ")"), b || h.notifyScrollEvent(h.win[0]);
                      }));
            } else
                (this.getScrollTop = function () {
                    return h.docscroll.scrollTop();
                }),
                    (this.setScrollTop = function (a) {
                        h.docscroll.scrollTop(a);
                    }),
                    (this.getScrollLeft = function () {
                        return h.hasreversehr ? (h.detected.ismozilla ? h.page.maxw - Math.abs(h.docscroll.scrollLeft()) : h.page.maxw - h.docscroll.scrollLeft()) : h.docscroll.scrollLeft();
                    }),
                    (this.setScrollLeft = function (a) {
                        return setTimeout(function () {
                            if (h) return h.hasreversehr && (a = h.detected.ismozilla ? -(h.page.maxw - a) : h.page.maxw - a), h.docscroll.scrollLeft(a);
                        }, 1);
                    });
            (this.getTarget = function (a) {
                return !!a && (a.target ? a.target : !!a.srcElement && a.srcElement);
            }),
                (this.hasParent = function (b, c) {
                    if (!b) return !1;
                    for (var a = b.target || b.srcElement || b || !1; a && a.id != c; ) a = a.parentNode || !1;
                    return !1 !== a;
                });
            var H = { thin: 1, medium: 3, thick: 5 };
            (this.getDocumentScrollOffset = function () {
                return { top: a.pageYOffset || e.documentElement.scrollTop, left: a.pageXOffset || e.documentElement.scrollLeft };
            }),
                (this.getOffset = function () {
                    if (h.isfixed) {
                        var a = h.win.offset(),
                            c = h.getDocumentScrollOffset();
                        return (a.top -= c.top), (a.left -= c.left), a;
                    }
                    var b = h.win.offset();
                    if (!h.viewport) return b;
                    var d = h.viewport.offset();
                    return { top: b.top - d.top, left: b.left - d.left };
                }),
                (this.updateScrollBar = function (e) {
                    var a, c;
                    if (h.ishwscroll) h.rail.css({ height: h.win.innerHeight() - (b.railpadding.top + b.railpadding.bottom) }), h.railh && h.railh.css({ width: h.win.innerWidth() - (b.railpadding.left + b.railpadding.right) });
                    else {
                        var d = h.getOffset();
                        if (
                            ((a = { top: d.top, left: d.left - (b.railpadding.left + b.railpadding.right) }),
                            (a.top += D(h.win, "border-top-width", !0)),
                            (a.left += h.rail.align ? h.win.outerWidth() - D(h.win, "border-right-width") - h.rail.width : D(h.win, "border-left-width")),
                            (c = b.railoffset) && (c.top && (a.top += c.top), c.left && (a.left += c.left)),
                            h.railslocked || h.rail.css({ top: a.top, left: a.left, height: (e ? e.h : h.win.innerHeight()) - (b.railpadding.top + b.railpadding.bottom) }),
                            h.zoom && h.zoom.css({ top: a.top + 1, left: 1 == h.rail.align ? a.left - 20 : a.left + h.rail.width + 4 }),
                            h.railh && !h.railslocked)
                        ) {
                            (a = { top: d.top, left: d.left }), (c = b.railhoffset) && (c.top && (a.top += c.top), c.left && (a.left += c.left));
                            var f = h.railh.align ? a.top + D(h.win, "border-top-width", !0) + h.win.innerHeight() - h.railh.height : a.top + D(h.win, "border-top-width", !0),
                                g = a.left + D(h.win, "border-left-width");
                            h.railh.css({ top: f - (b.railpadding.top + b.railpadding.bottom), left: g, width: h.railh.width });
                        }
                    }
                }),
                (this.doRailClick = function (a, i, b) {
                    var c, f, d, g;
                    h.railslocked ||
                        (h.cancelEvent(a),
                        "pageY" in a || ((a.pageX = a.clientX + e.documentElement.scrollLeft), (a.pageY = a.clientY + e.documentElement.scrollTop)),
                        i
                            ? ((c = b ? h.doScrollLeft : h.doScrollTop),
                              (d = b ? (a.pageX - h.railh.offset().left - h.cursorwidth / 2) * h.scrollratio.x : (a.pageY - h.rail.offset().top - h.cursorheight / 2) * h.scrollratio.y),
                              h.unsynched("relativexy"),
                              c(0 | d))
                            : ((c = b ? h.doScrollLeftBy : h.doScrollBy), (d = b ? h.scroll.x : h.scroll.y), (g = b ? a.pageX - h.railh.offset().left : a.pageY - h.rail.offset().top), (f = b ? h.view.w : h.view.h), c(d >= g ? f : -f)));
                }),
                (h.newscrolly = h.newscrollx = 0),
                (h.hasanimationframe = "requestAnimationFrame" in a),
                (h.hascancelanimationframe = "cancelAnimationFrame" in a),
                (h.hasborderbox = !1),
                (this.init = function () {
                    if (((h.saved.css = []), d.isoperamini || (d.isandroid && !("hidden" in e)))) return !0;
                    (b.emulatetouch = b.emulatetouch || b.touchbehavior), (h.hasborderbox = a.getComputedStyle && "border-box" === a.getComputedStyle(e.body)["box-sizing"]);
                    var r = { "overflow-y": "hidden" };
                    if (
                        ((d.isie11 || d.isie10) && (r["-ms-overflow-style"] = "none"),
                        h.ishwscroll && (this.doc.css(d.transitionstyle, d.prefixstyle + "transform 0ms ease-out"), d.transitionend && h.bind(h.doc, d.transitionend, h.onScrollTransitionEnd, !1)),
                        (h.zindex = "auto"),
                        h.ispage || "auto" != b.zindex
                            ? (h.zindex = b.zindex)
                            : (h.zindex =
                                  (function () {
                                      var a = h.win;
                                      if ("zIndex" in a) return a.zIndex();
                                      for (; a.length > 0 && 9 != a[0].nodeType; ) {
                                          var b = a.css("zIndex");
                                          if (!isNaN(b) && 0 !== b) return parseInt(b);
                                          a = a.parent();
                                      }
                                      return !1;
                                  })() || "auto"),
                        !h.ispage && "auto" != h.zindex && h.zindex > p && (p = h.zindex),
                        h.isie && 0 === h.zindex && "auto" == b.zindex && (h.zindex = "auto"),
                        !h.ispage || !d.isieold)
                    ) {
                        var g,
                            s = h.docscroll;
                        h.ispage && (s = h.haswrapper ? h.win : h.doc), h.css(s, r), h.ispage && (d.isie11 || d.isie) && h.css(c("html"), r), !d.isios || h.ispage || h.haswrapper || h.css(x, { "-webkit-overflow-scrolling": "touch" });
                        var i = c(e.createElement("div"));
                        i.css({
                            position: "relative",
                            top: 0,
                            float: "right",
                            width: b.cursorwidth,
                            height: 0,
                            "background-color": b.cursorcolor,
                            border: b.cursorborder,
                            "background-clip": "padding-box",
                            "-webkit-border-radius": b.cursorborderradius,
                            "-moz-border-radius": b.cursorborderradius,
                            "border-radius": b.cursorborderradius,
                        }),
                            i.addClass("nicescroll-cursors"),
                            (h.cursor = i);
                        var f = c(e.createElement("div"));
                        f.attr("id", h.id), f.addClass("nicescroll-rails nicescroll-rails-vr");
                        var w,
                            u,
                            z = ["left", "right", "top", "bottom"];
                        for (var A in z) (u = z[A]), (w = b.railpadding[u] || 0) && f.css("padding-" + u, w + "px");
                        f.append(i),
                            (f.width = Math.max(parseFloat(b.cursorwidth), i.outerWidth())),
                            f.css({ width: f.width + "px", zIndex: h.zindex, background: b.background, cursor: "default" }),
                            (f.visibility = !0),
                            (f.scrollable = !0),
                            (f.align = "left" == b.railalign ? 0 : 1),
                            (h.rail = f),
                            (h.rail.drag = !1);
                        var j = !1;
                        if (
                            (!b.boxzoom ||
                                h.ispage ||
                                d.isieold ||
                                ((j = e.createElement("div")),
                                h.bind(j, "click", h.doZoom),
                                h.bind(j, "mouseenter", function () {
                                    h.zoom.css("opacity", b.cursoropacitymax);
                                }),
                                h.bind(j, "mouseleave", function () {
                                    h.zoom.css("opacity", b.cursoropacitymin);
                                }),
                                (h.zoom = c(j)),
                                h.zoom.css({ cursor: "pointer", zIndex: h.zindex, height: 18, width: 18, backgroundPosition: "0 0" }),
                                b.dblclickzoom && h.bind(h.win, "dblclick", h.doZoom),
                                d.cantouch &&
                                    b.gesturezoom &&
                                    ((h.ongesturezoom = function (a) {
                                        return a.scale > 1.5 && h.doZoomIn(a), a.scale < 0.8 && h.doZoomOut(a), h.cancelEvent(a);
                                    }),
                                    h.bind(h.win, "gestureend", h.ongesturezoom))),
                            (h.railh = !1),
                            b.horizrailenabled &&
                                (h.css(s, { overflowX: "hidden" }),
                                (i = c(e.createElement("div"))).css({
                                    position: "absolute",
                                    top: 0,
                                    height: b.cursorwidth,
                                    width: 0,
                                    backgroundColor: b.cursorcolor,
                                    border: b.cursorborder,
                                    backgroundClip: "padding-box",
                                    "-webkit-border-radius": b.cursorborderradius,
                                    "-moz-border-radius": b.cursorborderradius,
                                    "border-radius": b.cursorborderradius,
                                }),
                                d.isieold && i.css("overflow", "hidden"),
                                i.addClass("nicescroll-cursors"),
                                (h.cursorh = i),
                                (g = c(e.createElement("div"))).attr("id", h.id + "-hr"),
                                g.addClass("nicescroll-rails nicescroll-rails-hr"),
                                (g.height = Math.max(parseFloat(b.cursorwidth), i.outerHeight())),
                                g.css({ height: g.height + "px", zIndex: h.zindex, background: b.background }),
                                g.append(i),
                                (g.visibility = !0),
                                (g.scrollable = !0),
                                (g.align = "top" == b.railvalign ? 0 : 1),
                                (h.railh = g),
                                (h.railh.drag = !1)),
                            h.ispage)
                        )
                            f.css({ position: "fixed", top: 0, height: "100%" }),
                                f.css(f.align ? { right: 0 } : { left: 0 }),
                                h.body.append(f),
                                h.railh && (g.css({ position: "fixed", left: 0, width: "100%" }), g.css(g.align ? { bottom: 0 } : { top: 0 }), h.body.append(g));
                        else {
                            if (h.ishwscroll) {
                                "static" == h.win.css("position") && h.css(h.win, { position: "relative" });
                                var o = "HTML" == h.win[0].nodeName ? h.body : h.win;
                                c(o).scrollTop(0).scrollLeft(0),
                                    h.zoom && (h.zoom.css({ position: "absolute", top: 1, right: 0, "margin-right": f.width + 4 }), o.append(h.zoom)),
                                    f.css({ position: "absolute", top: 0 }),
                                    f.css(f.align ? { right: 0 } : { left: 0 }),
                                    o.append(f),
                                    g && (g.css({ position: "absolute", left: 0, bottom: 0 }), g.css(g.align ? { bottom: 0 } : { top: 0 }), o.append(g));
                            } else {
                                h.isfixed = "fixed" == h.win.css("position");
                                var v = h.isfixed ? "fixed" : "absolute";
                                h.isfixed || (h.viewport = h.getViewport(h.win[0])),
                                    h.viewport && ((h.body = h.viewport), /fixed|absolute/.test(h.viewport.css("position")) || h.css(h.viewport, { position: "relative" })),
                                    f.css({ position: v }),
                                    h.zoom && h.zoom.css({ position: v }),
                                    h.updateScrollBar(),
                                    h.body.append(f),
                                    h.zoom && h.body.append(h.zoom),
                                    h.railh && (g.css({ position: v }), h.body.append(g));
                            }
                            d.isios && h.css(h.win, { "-webkit-tap-highlight-color": "rgba(0,0,0,0)", "-webkit-touch-callout": "none" }),
                                b.disableoutline && (d.isie && h.win.attr("hideFocus", "true"), d.iswebkit && h.win.css("outline", "none"));
                        }
                        if (
                            (!1 === b.autohidemode
                                ? ((h.autohidedom = !1), h.rail.css({ opacity: b.cursoropacitymax }), h.railh && h.railh.css({ opacity: b.cursoropacitymax }))
                                : !0 === b.autohidemode || "leave" === b.autohidemode
                                ? ((h.autohidedom = c().add(h.rail)),
                                  d.isie8 && (h.autohidedom = h.autohidedom.add(h.cursor)),
                                  h.railh && (h.autohidedom = h.autohidedom.add(h.railh)),
                                  h.railh && d.isie8 && (h.autohidedom = h.autohidedom.add(h.cursorh)))
                                : "scroll" == b.autohidemode
                                ? ((h.autohidedom = c().add(h.rail)), h.railh && (h.autohidedom = h.autohidedom.add(h.railh)))
                                : "cursor" == b.autohidemode
                                ? ((h.autohidedom = c().add(h.cursor)), h.railh && (h.autohidedom = h.autohidedom.add(h.cursorh)))
                                : "hidden" == b.autohidemode && ((h.autohidedom = !1), h.hide(), (h.railslocked = !1)),
                            d.cantouch || h.istouchcapable || b.emulatetouch || d.hasmstouch)
                        ) {
                            (h.scrollmom = new y(h)),
                                (h.ontouchstart = function (a) {
                                    if (h.locked || (a.pointerType && ("mouse" === a.pointerType || a.pointerType === a.MSPOINTER_TYPE_MOUSE))) return !1;
                                    if (((h.hasmoving = !1), h.scrollmom.timer && (h.triggerScrollEnd(), h.scrollmom.stop()), !h.railslocked)) {
                                        var e = h.getTarget(a);
                                        if (e && /INPUT/i.test(e.nodeName) && /range/i.test(e.type)) return h.stopPropagation(a);
                                        var k = "mousedown" === a.type;
                                        if ((!("clientX" in a) && "changedTouches" in a && ((a.clientX = a.changedTouches[0].clientX), (a.clientY = a.changedTouches[0].clientY)), h.forcescreen)) {
                                            var f = a;
                                            ((a = { original: a.original ? a.original : a }).clientX = f.screenX), (a.clientY = f.screenY);
                                        }
                                        if (((h.rail.drag = { x: a.clientX, y: a.clientY, sx: h.scroll.x, sy: h.scroll.y, st: h.getScrollTop(), sl: h.getScrollLeft(), pt: 2, dl: !1, tg: e }), h.ispage || !b.directionlockdeadzone))
                                            h.rail.drag.dl = "f";
                                        else {
                                            var g = { w: q.width(), h: q.height() },
                                                i = h.getContentSize(),
                                                l = i.h - g.h,
                                                m = i.w - g.w;
                                            h.rail.scrollable && !h.railh.scrollable ? (h.rail.drag.ck = l > 0 && "v") : !h.rail.scrollable && h.railh.scrollable ? (h.rail.drag.ck = m > 0 && "h") : (h.rail.drag.ck = !1);
                                        }
                                        if (b.emulatetouch && h.isiframe && d.isie) {
                                            var j = h.win.position();
                                            (h.rail.drag.x += j.left), (h.rail.drag.y += j.top);
                                        }
                                        if (((h.hasmoving = !1), (h.lastmouseup = !1), h.scrollmom.reset(a.clientX, a.clientY), e && k)) {
                                            if (!/INPUT|SELECT|BUTTON|TEXTAREA/i.test(e.nodeName))
                                                return (
                                                    d.hasmousecapture && e.setCapture(),
                                                    b.emulatetouch
                                                        ? (e.onclick &&
                                                              !e._onclick &&
                                                              ((e._onclick = e.onclick),
                                                              (e.onclick = function (a) {
                                                                  if (h.hasmoving) return !1;
                                                                  e._onclick.call(this, a);
                                                              })),
                                                          h.cancelEvent(a))
                                                        : h.stopPropagation(a)
                                                );
                                            /SUBMIT|CANCEL|BUTTON/i.test(c(e).attr("type")) && (h.preventclick = { tg: e, click: !1 });
                                        }
                                    }
                                }),
                                (h.ontouchend = function (a) {
                                    if (!h.rail.drag) return !0;
                                    if (2 == h.rail.drag.pt) {
                                        if (a.pointerType && ("mouse" === a.pointerType || a.pointerType === a.MSPOINTER_TYPE_MOUSE)) return !1;
                                        h.rail.drag = !1;
                                        var b = "mouseup" === a.type;
                                        if (h.hasmoving && (h.scrollmom.doMomentum(), (h.lastmouseup = !0), h.hideCursor(), d.hasmousecapture && e.releaseCapture(), b)) return h.cancelEvent(a);
                                    } else if (1 == h.rail.drag.pt) return h.onmouseup(a);
                                });
                            var C = b.emulatetouch && h.isiframe && !d.hasmousecapture,
                                D = (0.3 * b.directionlockdeadzone) | 0;
                            (h.ontouchmove = function (a, r) {
                                if (!h.rail.drag || (a.targetTouches && b.preventmultitouchscrolling && a.targetTouches.length > 1) || (a.pointerType && ("mouse" === a.pointerType || a.pointerType === a.MSPOINTER_TYPE_MOUSE))) return !0;
                                if (2 == h.rail.drag.pt) {
                                    if (("changedTouches" in a && ((a.clientX = a.changedTouches[0].clientX), (a.clientY = a.changedTouches[0].clientY)), (o = n = 0), C && !r)) {
                                        var n,
                                            o,
                                            p = h.win.position();
                                        (o = -p.left), (n = -p.top);
                                    }
                                    var k = a.clientY + n,
                                        q = k - h.rail.drag.y,
                                        l = a.clientX + o,
                                        m = l - h.rail.drag.x,
                                        f = h.rail.drag.st - q;
                                    if (h.ishwscroll && b.bouncescroll) f < 0 ? (f = Math.round(f / 2)) : f > h.page.maxh && (f = h.page.maxh + Math.round((f - h.page.maxh) / 2));
                                    else if ((f < 0 ? ((f = 0), (k = 0)) : f > h.page.maxh && ((f = h.page.maxh), (k = 0)), 0 === k && !h.hasmoving)) return h.ispage || (h.rail.drag = !1), !0;
                                    var c = h.getScrollLeft();
                                    if (
                                        (h.railh &&
                                            h.railh.scrollable &&
                                            ((c = h.isrtlmode ? m - h.rail.drag.sl : h.rail.drag.sl - m),
                                            h.ishwscroll && b.bouncescroll
                                                ? c < 0
                                                    ? (c = Math.round(c / 2))
                                                    : c > h.page.maxw && (c = h.page.maxw + Math.round((c - h.page.maxw) / 2))
                                                : (c < 0 && ((c = 0), (l = 0)), c > h.page.maxw && ((c = h.page.maxw), (l = 0)))),
                                        !h.hasmoving)
                                    ) {
                                        if (h.rail.drag.y === a.clientY && h.rail.drag.x === a.clientX) return h.cancelEvent(a);
                                        var i = Math.abs(q),
                                            j = Math.abs(m),
                                            g = b.directionlockdeadzone;
                                        if (
                                            (h.rail.drag.ck
                                                ? "v" == h.rail.drag.ck
                                                    ? j > g && i <= D
                                                        ? (h.rail.drag = !1)
                                                        : i > g && (h.rail.drag.dl = "v")
                                                    : "h" == h.rail.drag.ck && (i > g && j <= D ? (h.rail.drag = !1) : j > g && (h.rail.drag.dl = "h"))
                                                : i > g && j > g
                                                ? (h.rail.drag.dl = "f")
                                                : i > g
                                                ? (h.rail.drag.dl = j > D ? "f" : "v")
                                                : j > g && (h.rail.drag.dl = i > D ? "f" : "h"),
                                            !h.rail.drag.dl)
                                        )
                                            return h.cancelEvent(a);
                                        h.triggerScrollStart(a.clientX, a.clientY, 0, 0, 0), (h.hasmoving = !0);
                                    }
                                    return (
                                        h.preventclick && !h.preventclick.click && ((h.preventclick.click = h.preventclick.tg.onclick || !1), (h.preventclick.tg.onclick = h.onpreventclick)),
                                        h.rail.drag.dl && ("v" == h.rail.drag.dl ? (c = h.rail.drag.sl) : "h" == h.rail.drag.dl && (f = h.rail.drag.st)),
                                        h.synched("touchmove", function () {
                                            h.rail.drag &&
                                                2 == h.rail.drag.pt &&
                                                (h.prepareTransition && h.resetTransition(),
                                                h.rail.scrollable && h.setScrollTop(f),
                                                h.scrollmom.update(l, k),
                                                h.railh && h.railh.scrollable ? (h.setScrollLeft(c), h.showCursor(f, c)) : h.showCursor(f),
                                                d.isie10 && e.selection.clear());
                                        }),
                                        h.cancelEvent(a)
                                    );
                                }
                                return 1 == h.rail.drag.pt ? h.onmousemove(a) : void 0;
                            }),
                                (h.ontouchstartCursor = function (a, b) {
                                    if (!h.rail.drag || 3 == h.rail.drag.pt) {
                                        if (h.locked) return h.cancelEvent(a);
                                        h.cancelScroll(), (h.rail.drag = { x: a.touches[0].clientX, y: a.touches[0].clientY, sx: h.scroll.x, sy: h.scroll.y, pt: 3, hr: !!b });
                                        var c = h.getTarget(a);
                                        return (
                                            !h.ispage && d.hasmousecapture && c.setCapture(),
                                            h.isiframe && !d.hasmousecapture && ((h.saved.csspointerevents = h.doc.css("pointer-events")), h.css(h.doc, { "pointer-events": "none" })),
                                            h.cancelEvent(a)
                                        );
                                    }
                                }),
                                (h.ontouchendCursor = function (a) {
                                    if (h.rail.drag && (d.hasmousecapture && e.releaseCapture(), h.isiframe && !d.hasmousecapture && h.doc.css("pointer-events", h.saved.csspointerevents), 3 == h.rail.drag.pt))
                                        return (h.rail.drag = !1), h.cancelEvent(a);
                                }),
                                (h.ontouchmoveCursor = function (a) {
                                    if (h.rail.drag && 3 == h.rail.drag.pt) {
                                        if (((h.cursorfreezed = !0), h.rail.drag.hr)) {
                                            (h.scroll.x = h.rail.drag.sx + (a.touches[0].clientX - h.rail.drag.x)), h.scroll.x < 0 && (h.scroll.x = 0);
                                            var c = h.scrollvaluemaxw;
                                            h.scroll.x > c && (h.scroll.x = c);
                                        } else {
                                            (h.scroll.y = h.rail.drag.sy + (a.touches[0].clientY - h.rail.drag.y)), h.scroll.y < 0 && (h.scroll.y = 0);
                                            var d = h.scrollvaluemax;
                                            h.scroll.y > d && (h.scroll.y = d);
                                        }
                                        return (
                                            h.synched("touchmove", function () {
                                                h.rail.drag &&
                                                    3 == h.rail.drag.pt &&
                                                    (h.showCursor(), h.rail.drag.hr ? h.doScrollLeft(Math.round(h.scroll.x * h.scrollratio.x), b.cursordragspeed) : h.doScrollTop(Math.round(h.scroll.y * h.scrollratio.y), b.cursordragspeed));
                                            }),
                                            h.cancelEvent(a)
                                        );
                                    }
                                });
                        }
                        if (
                            ((h.onmousedown = function (a, b) {
                                if (!h.rail.drag || 1 == h.rail.drag.pt) {
                                    if (h.railslocked) return h.cancelEvent(a);
                                    h.cancelScroll(), (h.rail.drag = { x: a.clientX, y: a.clientY, sx: h.scroll.x, sy: h.scroll.y, pt: 1, hr: b || !1 });
                                    var c = h.getTarget(a);
                                    return (
                                        d.hasmousecapture && c.setCapture(),
                                        h.isiframe && !d.hasmousecapture && ((h.saved.csspointerevents = h.doc.css("pointer-events")), h.css(h.doc, { "pointer-events": "none" })),
                                        (h.hasmoving = !1),
                                        h.cancelEvent(a)
                                    );
                                }
                            }),
                            (h.onmouseup = function (a) {
                                if (h.rail.drag)
                                    return (
                                        1 != h.rail.drag.pt ||
                                        (d.hasmousecapture && e.releaseCapture(),
                                        h.isiframe && !d.hasmousecapture && h.doc.css("pointer-events", h.saved.csspointerevents),
                                        (h.rail.drag = !1),
                                        (h.cursorfreezed = !1),
                                        h.hasmoving && h.triggerScrollEnd(),
                                        h.cancelEvent(a))
                                    );
                            }),
                            (h.onmousemove = function (a) {
                                if (h.rail.drag) {
                                    if (1 !== h.rail.drag.pt) return;
                                    if (d.ischrome && 0 === a.which) return h.onmouseup(a);
                                    if (((h.cursorfreezed = !0), h.hasmoving || h.triggerScrollStart(a.clientX, a.clientY, 0, 0, 0), (h.hasmoving = !0), h.rail.drag.hr)) {
                                        (h.scroll.x = h.rail.drag.sx + (a.clientX - h.rail.drag.x)), h.scroll.x < 0 && (h.scroll.x = 0);
                                        var b = h.scrollvaluemaxw;
                                        h.scroll.x > b && (h.scroll.x = b);
                                    } else {
                                        (h.scroll.y = h.rail.drag.sy + (a.clientY - h.rail.drag.y)), h.scroll.y < 0 && (h.scroll.y = 0);
                                        var c = h.scrollvaluemax;
                                        h.scroll.y > c && (h.scroll.y = c);
                                    }
                                    return (
                                        h.synched("mousemove", function () {
                                            h.cursorfreezed && (h.showCursor(), h.rail.drag.hr ? h.scrollLeft(Math.round(h.scroll.x * h.scrollratio.x)) : h.scrollTop(Math.round(h.scroll.y * h.scrollratio.y)));
                                        }),
                                        h.cancelEvent(a)
                                    );
                                }
                                h.checkarea = 0;
                            }),
                            d.cantouch || b.emulatetouch)
                        )
                            (h.onpreventclick = function (a) {
                                if (h.preventclick) return (h.preventclick.tg.onclick = h.preventclick.click), (h.preventclick = !1), h.cancelEvent(a);
                            }),
                                (h.onclick =
                                    !d.isios &&
                                    function (a) {
                                        return !h.lastmouseup || ((h.lastmouseup = !1), h.cancelEvent(a));
                                    }),
                                b.grabcursorenabled && d.cursorgrabvalue && (h.css(h.ispage ? h.doc : h.win, { cursor: d.cursorgrabvalue }), h.css(h.rail, { cursor: d.cursorgrabvalue }));
                        else {
                            var E = function (c) {
                                if (h.selectiondrag) {
                                    if (c) {
                                        var b = h.win.outerHeight(),
                                            a = c.pageY - h.selectiondrag.top;
                                        a > 0 && a < b && (a = 0), a >= b && (a -= b), (h.selectiondrag.df = a);
                                    }
                                    if (0 !== h.selectiondrag.df) {
                                        var d = ((-2 * h.selectiondrag.df) / 6) | 0;
                                        h.doScrollBy(d),
                                            h.debounced(
                                                "doselectionscroll",
                                                function () {
                                                    E();
                                                },
                                                50
                                            );
                                    }
                                }
                            };
                            (h.hasTextSelected =
                                "getSelection" in e
                                    ? function () {
                                          return e.getSelection().rangeCount > 0;
                                      }
                                    : "selection" in e
                                    ? function () {
                                          return "None" != e.selection.type;
                                      }
                                    : function () {
                                          return !1;
                                      }),
                                (h.onselectionstart = function (a) {
                                    h.ispage || (h.selectiondrag = h.win.offset());
                                }),
                                (h.onselectionend = function (a) {
                                    h.selectiondrag = !1;
                                }),
                                (h.onselectiondrag = function (a) {
                                    h.selectiondrag &&
                                        h.hasTextSelected() &&
                                        h.debounced(
                                            "selectionscroll",
                                            function () {
                                                E(a);
                                            },
                                            250
                                        );
                                });
                        }
                        if (
                            (d.hasw3ctouch
                                ? (h.css(h.ispage ? c("html") : h.win, { "touch-action": "none" }),
                                  h.css(h.rail, { "touch-action": "none" }),
                                  h.css(h.cursor, { "touch-action": "none" }),
                                  h.bind(h.win, "pointerdown", h.ontouchstart),
                                  h.bind(e, "pointerup", h.ontouchend),
                                  h.delegate(e, "pointermove", h.ontouchmove))
                                : d.hasmstouch
                                ? (h.css(h.ispage ? c("html") : h.win, { "-ms-touch-action": "none" }),
                                  h.css(h.rail, { "-ms-touch-action": "none" }),
                                  h.css(h.cursor, { "-ms-touch-action": "none" }),
                                  h.bind(h.win, "MSPointerDown", h.ontouchstart),
                                  h.bind(e, "MSPointerUp", h.ontouchend),
                                  h.delegate(e, "MSPointerMove", h.ontouchmove),
                                  h.bind(h.cursor, "MSGestureHold", function (a) {
                                      a.preventDefault();
                                  }),
                                  h.bind(h.cursor, "contextmenu", function (a) {
                                      a.preventDefault();
                                  }))
                                : d.cantouch &&
                                  (h.bind(h.win, "touchstart", h.ontouchstart, !1, !0), h.bind(e, "touchend", h.ontouchend, !1, !0), h.bind(e, "touchcancel", h.ontouchend, !1, !0), h.delegate(e, "touchmove", h.ontouchmove, !1, !0)),
                            b.emulatetouch && (h.bind(h.win, "mousedown", h.ontouchstart, !1, !0), h.bind(e, "mouseup", h.ontouchend, !1, !0), h.bind(e, "mousemove", h.ontouchmove, !1, !0)),
                            (b.cursordragontouch || (!d.cantouch && !b.emulatetouch)) &&
                                (h.rail.css({ cursor: "default" }),
                                h.railh && h.railh.css({ cursor: "default" }),
                                h.jqbind(h.rail, "mouseenter", function () {
                                    if (!h.ispage && !h.win.is(":visible")) return !1;
                                    h.canshowonmouseevent && h.showCursor(), (h.rail.active = !0);
                                }),
                                h.jqbind(h.rail, "mouseleave", function () {
                                    (h.rail.active = !1), h.rail.drag || h.hideCursor();
                                }),
                                b.sensitiverail &&
                                    (h.bind(h.rail, "click", function (a) {
                                        h.doRailClick(a, !1, !1);
                                    }),
                                    h.bind(h.rail, "dblclick", function (a) {
                                        h.doRailClick(a, !0, !1);
                                    }),
                                    h.bind(h.cursor, "click", function (a) {
                                        h.cancelEvent(a);
                                    }),
                                    h.bind(h.cursor, "dblclick", function (a) {
                                        h.cancelEvent(a);
                                    })),
                                h.railh &&
                                    (h.jqbind(h.railh, "mouseenter", function () {
                                        if (!h.ispage && !h.win.is(":visible")) return !1;
                                        h.canshowonmouseevent && h.showCursor(), (h.rail.active = !0);
                                    }),
                                    h.jqbind(h.railh, "mouseleave", function () {
                                        (h.rail.active = !1), h.rail.drag || h.hideCursor();
                                    }),
                                    b.sensitiverail &&
                                        (h.bind(h.railh, "click", function (a) {
                                            h.doRailClick(a, !1, !0);
                                        }),
                                        h.bind(h.railh, "dblclick", function (a) {
                                            h.doRailClick(a, !0, !0);
                                        }),
                                        h.bind(h.cursorh, "click", function (a) {
                                            h.cancelEvent(a);
                                        }),
                                        h.bind(h.cursorh, "dblclick", function (a) {
                                            h.cancelEvent(a);
                                        })))),
                            b.cursordragontouch &&
                                (this.istouchcapable || d.cantouch) &&
                                (h.bind(h.cursor, "touchstart", h.ontouchstartCursor),
                                h.bind(h.cursor, "touchmove", h.ontouchmoveCursor),
                                h.bind(h.cursor, "touchend", h.ontouchendCursor),
                                h.cursorh &&
                                    h.bind(h.cursorh, "touchstart", function (a) {
                                        h.ontouchstartCursor(a, !0);
                                    }),
                                h.cursorh && h.bind(h.cursorh, "touchmove", h.ontouchmoveCursor),
                                h.cursorh && h.bind(h.cursorh, "touchend", h.ontouchendCursor)),
                            b.emulatetouch || d.isandroid || d.isios
                                ? (h.bind(d.hasmousecapture ? h.win : e, "mouseup", h.ontouchend),
                                  h.onclick && h.bind(e, "click", h.onclick),
                                  b.cursordragontouch
                                      ? (h.bind(h.cursor, "mousedown", h.onmousedown),
                                        h.bind(h.cursor, "mouseup", h.onmouseup),
                                        h.cursorh &&
                                            h.bind(h.cursorh, "mousedown", function (a) {
                                                h.onmousedown(a, !0);
                                            }),
                                        h.cursorh && h.bind(h.cursorh, "mouseup", h.onmouseup))
                                      : (h.bind(h.rail, "mousedown", function (a) {
                                            a.preventDefault();
                                        }),
                                        h.railh &&
                                            h.bind(h.railh, "mousedown", function (a) {
                                                a.preventDefault();
                                            })))
                                : (h.bind(d.hasmousecapture ? h.win : e, "mouseup", h.onmouseup),
                                  h.bind(e, "mousemove", h.onmousemove),
                                  h.onclick && h.bind(e, "click", h.onclick),
                                  h.bind(h.cursor, "mousedown", h.onmousedown),
                                  h.bind(h.cursor, "mouseup", h.onmouseup),
                                  h.railh &&
                                      (h.bind(h.cursorh, "mousedown", function (a) {
                                          h.onmousedown(a, !0);
                                      }),
                                      h.bind(h.cursorh, "mouseup", h.onmouseup)),
                                  !h.ispage &&
                                      b.enablescrollonselection &&
                                      (h.bind(h.win[0], "mousedown", h.onselectionstart),
                                      h.bind(e, "mouseup", h.onselectionend),
                                      h.bind(h.cursor, "mouseup", h.onselectionend),
                                      h.cursorh && h.bind(h.cursorh, "mouseup", h.onselectionend),
                                      h.bind(e, "mousemove", h.onselectiondrag)),
                                  h.zoom &&
                                      (h.jqbind(h.zoom, "mouseenter", function () {
                                          h.canshowonmouseevent && h.showCursor(), (h.rail.active = !0);
                                      }),
                                      h.jqbind(h.zoom, "mouseleave", function () {
                                          (h.rail.active = !1), h.rail.drag || h.hideCursor();
                                      }))),
                            b.enablemousewheel && (h.isiframe || h.mousewheel(d.isie && h.ispage ? e : h.win, h.onmousewheel), h.mousewheel(h.rail, h.onmousewheel), h.railh && h.mousewheel(h.railh, h.onmousewheelhr)),
                            h.ispage ||
                                d.cantouch ||
                                /HTML|^BODY/.test(h.win[0].nodeName) ||
                                (h.win.attr("tabindex") || h.win.attr({ tabindex: ++n }),
                                h.bind(h.win, "focus", function (a) {
                                    (l = h.getTarget(a).id || h.getTarget(a) || !1), (h.hasfocus = !0), h.canshowonmouseevent && h.noticeCursor();
                                }),
                                h.bind(h.win, "blur", function (a) {
                                    (l = !1), (h.hasfocus = !1);
                                }),
                                h.bind(h.win, "mouseenter", function (a) {
                                    (m = h.getTarget(a).id || h.getTarget(a) || !1), (h.hasmousefocus = !0), h.canshowonmouseevent && h.noticeCursor();
                                }),
                                h.bind(h.win, "mouseleave", function (a) {
                                    (m = !1), (h.hasmousefocus = !1), h.rail.drag || h.hideCursor();
                                })),
                            (h.onkeypress = function (e) {
                                if (h.railslocked && 0 === h.page.maxh) return !0;
                                e = e || a.event;
                                var f = h.getTarget(e);
                                if ((f && /INPUT|TEXTAREA|SELECT|OPTION/.test(f.nodeName) && (!(f.getAttribute("type") || f.type) || !/submit|button|cancel/i.tp)) || c(f).attr("contenteditable")) return !0;
                                if (h.hasfocus || (h.hasmousefocus && !l) || (h.ispage && !l && !m)) {
                                    var i = e.keyCode;
                                    if (h.railslocked && 27 != i) return h.cancelEvent(e);
                                    var g = e.ctrlKey || !1,
                                        j = e.shiftKey || !1,
                                        d = !1;
                                    switch (i) {
                                        case 38:
                                        case 63233:
                                            h.doScrollBy(72), (d = !0);
                                            break;
                                        case 40:
                                        case 63235:
                                            h.doScrollBy(-72), (d = !0);
                                            break;
                                        case 37:
                                        case 63232:
                                            h.railh && (g ? h.doScrollLeft(0) : h.doScrollLeftBy(72), (d = !0));
                                            break;
                                        case 39:
                                        case 63234:
                                            h.railh && (g ? h.doScrollLeft(h.page.maxw) : h.doScrollLeftBy(-72), (d = !0));
                                            break;
                                        case 33:
                                        case 63276:
                                            h.doScrollBy(h.view.h), (d = !0);
                                            break;
                                        case 34:
                                        case 63277:
                                            h.doScrollBy(-h.view.h), (d = !0);
                                            break;
                                        case 36:
                                        case 63273:
                                            h.railh && g ? h.doScrollPos(0, 0) : h.doScrollTo(0), (d = !0);
                                            break;
                                        case 35:
                                        case 63275:
                                            h.railh && g ? h.doScrollPos(h.page.maxw, h.page.maxh) : h.doScrollTo(h.page.maxh), (d = !0);
                                            break;
                                        case 32:
                                            b.spacebarenabled && (j ? h.doScrollBy(h.view.h) : h.doScrollBy(-h.view.h), (d = !0));
                                            break;
                                        case 27:
                                            h.zoomactive && (h.doZoom(), (d = !0));
                                    }
                                    if (d) return h.cancelEvent(e);
                                }
                            }),
                            b.enablekeyboard && h.bind(e, d.isopera && !d.isopera12 ? "keypress" : "keydown", h.onkeypress),
                            h.bind(e, "keydown", function (a) {
                                a.ctrlKey && (h.wheelprevented = !0);
                            }),
                            h.bind(e, "keyup", function (a) {
                                a.ctrlKey || (h.wheelprevented = !1);
                            }),
                            h.bind(a, "blur", function (a) {
                                h.wheelprevented = !1;
                            }),
                            h.bind(a, "resize", h.onscreenresize),
                            h.bind(a, "orientationchange", h.onscreenresize),
                            h.bind(a, "load", h.lazyResize),
                            d.ischrome && !h.ispage && !h.haswrapper)
                        ) {
                            var F = h.win.attr("style"),
                                B = parseFloat(h.win.css("width")) + 1;
                            h.win.css("width", B),
                                h.synched("chromefix", function () {
                                    h.win.attr("style", F);
                                });
                        }
                        if (
                            ((h.onAttributeChange = function (a) {
                                h.lazyResize(h.isieold ? 250 : 30);
                            }),
                            b.enableobserver &&
                                (h.isie11 ||
                                    !1 === t ||
                                    ((h.observerbody = new t(function (a) {
                                        if (
                                            (a.forEach(function (a) {
                                                if ("attributes" == a.type) return x.hasClass("modal-open") && x.hasClass("modal-dialog") && !c.contains(c(".modal-dialog")[0], h.doc[0]) ? h.hide() : h.show();
                                            }),
                                            h.me.clientWidth != h.page.width || h.me.clientHeight != h.page.height)
                                        )
                                            return h.lazyResize(30);
                                    })),
                                    h.observerbody.observe(e.body, { childList: !0, subtree: !0, characterData: !1, attributes: !0, attributeFilter: ["class"] })),
                                !h.ispage && !h.haswrapper))
                        ) {
                            var k = h.win[0];
                            !1 !== t
                                ? ((h.observer = new t(function (a) {
                                      a.forEach(h.onAttributeChange);
                                  })),
                                  h.observer.observe(k, { childList: !0, characterData: !1, attributes: !0, subtree: !1 }),
                                  (h.observerremover = new t(function (a) {
                                      a.forEach(function (a) {
                                          if (a.removedNodes.length > 0) {
                                              for (var b in a.removedNodes) if (h && a.removedNodes[b] === k) return h.remove();
                                          }
                                      });
                                  })),
                                  h.observerremover.observe(k.parentNode, { childList: !0, characterData: !1, attributes: !1, subtree: !1 }))
                                : (h.bind(k, d.isie && !d.isie9 ? "propertychange" : "DOMAttrModified", h.onAttributeChange),
                                  d.isie9 && k.attachEvent("onpropertychange", h.onAttributeChange),
                                  h.bind(k, "DOMNodeRemoved", function (a) {
                                      a.target === k && h.remove();
                                  }));
                        }
                        !h.ispage && b.boxzoom && h.bind(a, "resize", h.resizeZoom), h.istextarea && (h.bind(h.win, "keydown", h.lazyResize), h.bind(h.win, "mouseup", h.lazyResize)), h.lazyResize(30);
                    }
                    if ("IFRAME" == this.doc[0].nodeName) {
                        var _ = function () {
                            h.iframexd = !1;
                            try {
                                (e = "contentDocument" in this ? this.contentDocument : this.contentWindow._doc).domain;
                            } catch (g) {
                                (h.iframexd = !0), (e = !1);
                            }
                            if (h.iframexd) return "console" in a && console.log("NiceScroll error: policy restriced iframe"), !0;
                            if (
                                ((h.forcescreen = !0),
                                h.isiframe &&
                                    ((h.iframe = { doc: c(e), html: h.doc.contents().find("html")[0], body: h.doc.contents().find("body")[0] }),
                                    (h.getContentSize = function () {
                                        return { w: Math.max(h.iframe.html.scrollWidth, h.iframe.body.scrollWidth), h: Math.max(h.iframe.html.scrollHeight, h.iframe.body.scrollHeight) };
                                    }),
                                    (h.docscroll = c(h.iframe.body))),
                                !d.isios && b.iframeautoresize && !h.isiframe)
                            ) {
                                h.win.scrollTop(0), h.doc.height("");
                                var e,
                                    f = Math.max(e.getElementsByTagName("html")[0].scrollHeight, e.body.scrollHeight);
                                h.doc.height(f);
                            }
                            h.lazyResize(30),
                                h.css(c(h.iframe.body), r),
                                d.isios && h.haswrapper && h.css(c(e.body), { "-webkit-transform": "translate3d(0,0,0)" }),
                                "contentWindow" in this ? h.bind(this.contentWindow, "scroll", h.onscroll) : h.bind(e, "scroll", h.onscroll),
                                b.enablemousewheel && h.mousewheel(e, h.onmousewheel),
                                b.enablekeyboard && h.bind(e, d.isopera ? "keypress" : "keydown", h.onkeypress),
                                d.cantouch
                                    ? (h.bind(e, "touchstart", h.ontouchstart), h.bind(e, "touchmove", h.ontouchmove))
                                    : b.emulatetouch &&
                                      (h.bind(e, "mousedown", h.ontouchstart),
                                      h.bind(e, "mousemove", function (a) {
                                          return h.ontouchmove(a, !0);
                                      }),
                                      b.grabcursorenabled && d.cursorgrabvalue && h.css(c(e.body), { cursor: d.cursorgrabvalue })),
                                h.bind(e, "mouseup", h.ontouchend),
                                h.zoom && (b.dblclickzoom && h.bind(e, "dblclick", h.doZoom), h.ongesturezoom && h.bind(e, "gestureend", h.ongesturezoom));
                        };
                        this.doc[0].readyState &&
                            "complete" === this.doc[0].readyState &&
                            setTimeout(function () {
                                _.call(h.doc[0], !1);
                            }, 500),
                            h.bind(this.doc, "load", _);
                    }
                }),
                (this.showCursor = function (a, c) {
                    if ((h.cursortimeout && (clearTimeout(h.cursortimeout), (h.cursortimeout = 0)), h.rail)) {
                        if (
                            (h.autohidedom && (h.autohidedom.stop().css({ opacity: b.cursoropacitymax }), (h.cursoractive = !0)),
                            (h.rail.drag && 1 == h.rail.drag.pt) || (void 0 !== a && !1 !== a && (h.scroll.y = (a / h.scrollratio.y) | 0), void 0 !== c && (h.scroll.x = (c / h.scrollratio.x) | 0)),
                            h.cursor.css({ height: h.cursorheight, top: h.scroll.y }),
                            h.cursorh)
                        ) {
                            var d = h.hasreversehr ? h.scrollvaluemaxw - h.scroll.x : h.scroll.x;
                            h.cursorh.css({ width: h.cursorwidth, left: !h.rail.align && h.rail.visibility ? d + h.rail.width : d }), (h.cursoractive = !0);
                        }
                        h.zoom && h.zoom.stop().css({ opacity: b.cursoropacitymax });
                    }
                }),
                (this.hideCursor = function (a) {
                    h.cursortimeout ||
                        (h.rail &&
                            h.autohidedom &&
                            ((h.hasmousefocus && "leave" === b.autohidemode) ||
                                (h.cursortimeout = setTimeout(function () {
                                    (h.rail.active && h.showonmouseevent) || (h.autohidedom.stop().animate({ opacity: b.cursoropacitymin }), h.zoom && h.zoom.stop().animate({ opacity: b.cursoropacitymin }), (h.cursoractive = !1)),
                                        (h.cursortimeout = 0);
                                }, a || b.hidecursordelay))));
                }),
                (this.noticeCursor = function (a, b, c) {
                    h.showCursor(b, c), h.rail.active || h.hideCursor(a);
                }),
                (this.getContentSize = h.ispage
                    ? function () {
                          return { w: Math.max(e.body.scrollWidth, e.documentElement.scrollWidth), h: Math.max(e.body.scrollHeight, e.documentElement.scrollHeight) };
                      }
                    : h.haswrapper
                    ? function () {
                          return { w: h.doc[0].offsetWidth, h: h.doc[0].offsetHeight };
                      }
                    : function () {
                          return { w: h.docscroll[0].scrollWidth, h: h.docscroll[0].scrollHeight };
                      }),
                (this.onResize = function (j, d) {
                    if (!h || !h.win) return !1;
                    var e = h.page.maxh,
                        f = h.page.maxw,
                        g = h.view.h,
                        i = h.view.w;
                    if (
                        ((h.view = { w: h.ispage ? h.win.width() : h.win[0].clientWidth, h: h.ispage ? h.win.height() : h.win[0].clientHeight }),
                        (h.page = d || h.getContentSize()),
                        (h.page.maxh = Math.max(0, h.page.h - h.view.h)),
                        (h.page.maxw = Math.max(0, h.page.w - h.view.w)),
                        h.page.maxh == e && h.page.maxw == f && h.view.w == i && h.view.h == g)
                    ) {
                        if (h.ispage) return h;
                        var a = h.win.offset();
                        if (h.lastposition) {
                            var c = h.lastposition;
                            if (c.top == a.top && c.left == a.left) return h;
                        }
                        h.lastposition = a;
                    }
                    return (
                        0 === h.page.maxh
                            ? (h.hideRail(), (h.scrollvaluemax = 0), (h.scroll.y = 0), (h.scrollratio.y = 0), (h.cursorheight = 0), h.setScrollTop(0), h.rail && (h.rail.scrollable = !1))
                            : ((h.page.maxh -= b.railpadding.top + b.railpadding.bottom), (h.rail.scrollable = !0)),
                        0 === h.page.maxw
                            ? (h.hideRailHr(), (h.scrollvaluemaxw = 0), (h.scroll.x = 0), (h.scrollratio.x = 0), (h.cursorwidth = 0), h.setScrollLeft(0), h.railh && (h.railh.scrollable = !1))
                            : ((h.page.maxw -= b.railpadding.left + b.railpadding.right), h.railh && (h.railh.scrollable = b.horizrailenabled)),
                        (h.railslocked = h.locked || (0 === h.page.maxh && 0 === h.page.maxw)),
                        h.railslocked
                            ? (h.ispage || h.updateScrollBar(h.view), !1)
                            : (h.hidden || (h.rail.visibility || h.showRail(), h.railh && !h.railh.visibility && h.showRailHr()),
                              h.istextarea && h.win.css("resize") && "none" != h.win.css("resize") && (h.view.h -= 20),
                              (h.cursorheight = Math.min(h.view.h, Math.round(h.view.h * (h.view.h / h.page.h)))),
                              (h.cursorheight = b.cursorfixedheight ? b.cursorfixedheight : Math.max(b.cursorminheight, h.cursorheight)),
                              (h.cursorwidth = Math.min(h.view.w, Math.round(h.view.w * (h.view.w / h.page.w)))),
                              (h.cursorwidth = b.cursorfixedheight ? b.cursorfixedheight : Math.max(b.cursorminheight, h.cursorwidth)),
                              (h.scrollvaluemax = h.view.h - h.cursorheight - (b.railpadding.top + b.railpadding.bottom)),
                              h.hasborderbox || (h.scrollvaluemax -= h.cursor[0].offsetHeight - h.cursor[0].clientHeight),
                              h.railh && ((h.railh.width = h.page.maxh > 0 ? h.view.w - h.rail.width : h.view.w), (h.scrollvaluemaxw = h.railh.width - h.cursorwidth - (b.railpadding.left + b.railpadding.right))),
                              h.ispage || h.updateScrollBar(h.view),
                              (h.scrollratio = { x: h.page.maxw / h.scrollvaluemaxw, y: h.page.maxh / h.scrollvaluemax }),
                              h.getScrollTop() > h.page.maxh
                                  ? h.doScrollTop(h.page.maxh)
                                  : ((h.scroll.y = (h.getScrollTop() / h.scrollratio.y) | 0), (h.scroll.x = (h.getScrollLeft() / h.scrollratio.x) | 0), h.cursoractive && h.noticeCursor()),
                              h.scroll.y && 0 === h.getScrollTop() && h.doScrollTo((h.scroll.y * h.scrollratio.y) | 0),
                              h)
                    );
                }),
                (this.resize = h.onResize);
            var I = 0;
            (this.onscreenresize = function (b) {
                clearTimeout(I);
                var a = !h.ispage && !h.haswrapper;
                a && h.hideRails(),
                    (I = setTimeout(function () {
                        h && (a && h.showRails(), h.resize()), (I = 0);
                    }, 120));
            }),
                (this.lazyResize = function (a) {
                    return (
                        clearTimeout(I),
                        (a = isNaN(a) ? 240 : a),
                        (I = setTimeout(function () {
                            h && h.resize(), (I = 0);
                        }, a)),
                        h
                    );
                }),
                (this.jqbind = function (a, b, d) {
                    h.events.push({ e: a, n: b, f: d, q: !0 }), c(a).on(b, d);
                }),
                (this.mousewheel = function (a, b, c) {
                    var d = "jquery" in a ? a[0] : a;
                    if ("onwheel" in e.createElement("div")) h._bind(d, "wheel", b, c || !1);
                    else {
                        var f = void 0 !== e.onmousewheel ? "mousewheel" : "DOMMouseScroll";
                        E(d, f, b, c || !1), "DOMMouseScroll" == f && E(d, "MozMousePixelScroll", b, c || !1);
                    }
                });
            var J = !1;
            if (d.haseventlistener) {
                try {
                    var B = Object.defineProperty({}, "passive", {
                        get: function () {
                            J = !0;
                        },
                    });
                    a.addEventListener("test", null, B);
                } catch (K) {}
                (this.stopPropagation = function (a) {
                    return !!a && ((a = a.original ? a.original : a).stopPropagation(), !1);
                }),
                    (this.cancelEvent = function (a) {
                        return a.cancelable && a.preventDefault(), a.stopImmediatePropagation(), a.preventManipulation && a.preventManipulation(), !1;
                    });
            } else
                (Event.prototype.preventDefault = function () {
                    this.returnValue = !1;
                }),
                    (Event.prototype.stopPropagation = function () {
                        this.cancelBubble = !0;
                    }),
                    (a.constructor.prototype.addEventListener = e.constructor.prototype.addEventListener = Element.prototype.addEventListener = function (a, b, c) {
                        this.attachEvent("on" + a, b);
                    }),
                    (a.constructor.prototype.removeEventListener = e.constructor.prototype.removeEventListener = Element.prototype.removeEventListener = function (a, b, c) {
                        this.detachEvent("on" + a, b);
                    }),
                    (this.cancelEvent = function (b) {
                        return (b = b || a.event) && ((b.cancelBubble = !0), (b.cancel = !0), (b.returnValue = !1)), !1;
                    }),
                    (this.stopPropagation = function (b) {
                        return (b = b || a.event) && (b.cancelBubble = !0), !1;
                    });
            (this.delegate = function (d, b, c, e, f) {
                var a = r[b] || !1;
                a ||
                    ((a = {
                        a: [],
                        l: [],
                        f: function (c) {
                            for (var d = a.l, e = !1, b = d.length - 1; b >= 0; b--) if (!1 === (e = d[b].call(c.target, c))) return !1;
                            return e;
                        },
                    }),
                    h.bind(d, b, a.f, e, f),
                    (r[b] = a)),
                    h.ispage ? ((a.a = [h.id].concat(a.a)), (a.l = [c].concat(a.l))) : (a.a.push(h.id), a.l.push(c));
            }),
                (this.undelegate = function (d, c, f, g, i) {
                    var a = r[c] || !1;
                    if (a && a.l) for (var b = 0, e = a.l.length; b < e; b++) a.a[b] === h.id && (a.a.splice(b), a.l.splice(b), 0 === a.a.length && (h._unbind(d, c, a.l.f), (r[c] = null)));
                }),
                (this.bind = function (a, b, c, d, e) {
                    var f = "jquery" in a ? a[0] : a;
                    h._bind(f, b, c, d || !1, e || !1);
                }),
                (this._bind = function (a, b, c, d, e) {
                    h.events.push({ e: a, n: b, f: c, b: d, q: !1 }), J && e ? a.addEventListener(b, c, { passive: !1, capture: d }) : a.addEventListener(b, c, d || !1);
                }),
                (this._unbind = function (b, a, c, d) {
                    r[a] ? h.undelegate(b, a, c, d) : b.removeEventListener(a, c, d);
                }),
                (this.unbindAll = function () {
                    for (var b = 0; b < h.events.length; b++) {
                        var a = h.events[b];
                        a.q ? a.e.unbind(a.n, a.f) : h._unbind(a.e, a.n, a.f, a.b);
                    }
                }),
                (this.showRails = function () {
                    return h.showRail().showRailHr();
                }),
                (this.showRail = function () {
                    return 0 !== h.page.maxh && (h.ispage || "none" != h.win.css("display")) && ((h.rail.visibility = !0), h.rail.css("display", "block")), h;
                }),
                (this.showRailHr = function () {
                    return h.railh && 0 !== h.page.maxw && (h.ispage || "none" != h.win.css("display")) && ((h.railh.visibility = !0), h.railh.css("display", "block")), h;
                }),
                (this.hideRails = function () {
                    return h.hideRail().hideRailHr();
                }),
                (this.hideRail = function () {
                    return (h.rail.visibility = !1), h.rail.css("display", "none"), h;
                }),
                (this.hideRailHr = function () {
                    return h.railh && ((h.railh.visibility = !1), h.railh.css("display", "none")), h;
                }),
                (this.show = function () {
                    return (h.hidden = !1), (h.railslocked = !1), h.showRails();
                }),
                (this.hide = function () {
                    return (h.hidden = !0), (h.railslocked = !0), h.hideRails();
                }),
                (this.toggle = function () {
                    return h.hidden ? h.show() : h.hide();
                }),
                (this.remove = function () {
                    for (var e in (h.stop(), h.cursortimeout && clearTimeout(h.cursortimeout), h.delaylist)) h.delaylist[e] && g(h.delaylist[e].h);
                    h.doZoomOut(),
                        h.unbindAll(),
                        d.isie9 && h.win[0].detachEvent("onpropertychange", h.onAttributeChange),
                        !1 !== h.observer && h.observer.disconnect(),
                        !1 !== h.observerremover && h.observerremover.disconnect(),
                        !1 !== h.observerbody && h.observerbody.disconnect(),
                        (h.events = null),
                        h.cursor && h.cursor.remove(),
                        h.cursorh && h.cursorh.remove(),
                        h.rail && h.rail.remove(),
                        h.railh && h.railh.remove(),
                        h.zoom && h.zoom.remove();
                    for (var b = 0; b < h.saved.css.length; b++) {
                        var a = h.saved.css[b];
                        a[0].css(a[1], void 0 === a[2] ? "" : a[2]);
                    }
                    (h.saved = !1), h.me.data("__nicescroll", "");
                    var i = c.nicescroll;
                    for (var f in (i.each(function (a) {
                        if (this && this.id === h.id) {
                            delete i[a];
                            for (var b = ++a; b < i.length; b++, a++) i[a] = i[b];
                            --i.length && delete i[i.length];
                        }
                    }),
                    h))
                        (h[f] = null), delete h[f];
                    h = null;
                }),
                (this.scrollstart = function (a) {
                    return (this.onscrollstart = a), h;
                }),
                (this.scrollend = function (a) {
                    return (this.onscrollend = a), h;
                }),
                (this.scrollcancel = function (a) {
                    return (this.onscrollcancel = a), h;
                }),
                (this.zoomin = function (a) {
                    return (this.onzoomin = a), h;
                }),
                (this.zoomout = function (a) {
                    return (this.onzoomout = a), h;
                }),
                (this.isScrollable = function (b) {
                    var a = b.target ? b.target : b;
                    if ("OPTION" == a.nodeName) return !0;
                    for (; a && 1 == a.nodeType && a !== this.me[0] && !/^BODY|HTML/.test(a.nodeName); ) {
                        var d = c(a),
                            e = d.css("overflowY") || d.css("overflowX") || d.css("overflow") || "";
                        if (/scroll|auto/.test(e)) return a.clientHeight != a.scrollHeight;
                        a = !!a.parentNode && a.parentNode;
                    }
                    return !1;
                }),
                (this.getViewport = function (d) {
                    for (var a = !(!d || !d.parentNode) && d.parentNode; a && 1 == a.nodeType && !/^BODY|HTML/.test(a.nodeName); ) {
                        var b = c(a);
                        if (/fixed|absolute/.test(b.css("position"))) return b;
                        var e = b.css("overflowY") || b.css("overflowX") || b.css("overflow") || "";
                        if ((/scroll|auto/.test(e) && a.clientHeight != a.scrollHeight) || b.getNiceScroll().length > 0) return b;
                        a = !!a.parentNode && a.parentNode;
                    }
                    return !1;
                }),
                (this.triggerScrollStart = function (a, b, c, d, e) {
                    if (h.onscrollstart) {
                        var f = { type: "scrollstart", current: { x: a, y: b }, request: { x: c, y: d }, end: { x: h.newscrollx, y: h.newscrolly }, speed: e };
                        h.onscrollstart.call(h, f);
                    }
                }),
                (this.triggerScrollEnd = function () {
                    if (h.onscrollend) {
                        var a = h.getScrollLeft(),
                            b = h.getScrollTop(),
                            c = { type: "scrollend", current: { x: a, y: b }, end: { x: a, y: b } };
                        h.onscrollend.call(h, c);
                    }
                });
            var L = 0,
                M = 0,
                N = 0,
                O = 1,
                P = !1;
            if (
                ((this.onmousewheel = function (a) {
                    if (h.wheelprevented || h.locked) return !1;
                    if (h.railslocked) return h.debounced("checkunlock", h.resize, 250), !1;
                    if (h.rail.drag) return h.cancelEvent(a);
                    if (("auto" === b.oneaxismousemode && 0 !== a.deltaX && (b.oneaxismousemode = !1), b.oneaxismousemode && 0 === a.deltaX && !h.rail.scrollable)) return !h.railh || !h.railh.scrollable || h.onmousewheelhr(a);
                    var c = u(),
                        d = !1;
                    if ((b.preservenativescrolling && h.checkarea + 600 < c && ((h.nativescrollingarea = h.isScrollable(a)), (d = !0)), (h.checkarea = c), h.nativescrollingarea)) return !0;
                    var e = G(a, !1, d);
                    return e && (h.checkarea = 0), e;
                }),
                (this.onmousewheelhr = function (a) {
                    if (!h.wheelprevented) {
                        if (h.railslocked || !h.railh.scrollable) return !0;
                        if (h.rail.drag) return h.cancelEvent(a);
                        var c = u(),
                            d = !1;
                        return b.preservenativescrolling && h.checkarea + 600 < c && ((h.nativescrollingarea = h.isScrollable(a)), (d = !0)), (h.checkarea = c), !!h.nativescrollingarea || (h.railslocked ? h.cancelEvent(a) : G(a, !0, d));
                    }
                }),
                (this.stop = function () {
                    return h.cancelScroll(), h.scrollmon && h.scrollmon.stop(), (h.cursorfreezed = !1), (h.scroll.y = Math.round(h.getScrollTop() * (1 / h.scrollratio.y))), h.noticeCursor(), h;
                }),
                (this.getTransitionSpeed = function (a) {
                    return (80 + (a / 72) * b.scrollspeed) | 0;
                }),
                b.smoothscroll)
            ) {
                if (h.ishwscroll && d.hastransition && b.usetransition && b.smoothscroll) {
                    var Q = "";
                    (this.resetTransition = function () {
                        (Q = ""), h.doc.css(d.prefixstyle + "transition-duration", "0ms");
                    }),
                        (this.prepareTransition = function (b, e) {
                            var c = e ? b : h.getTransitionSpeed(b),
                                a = c + "ms";
                            return Q !== a && ((Q = a), h.doc.css(d.prefixstyle + "transition-duration", a)), c;
                        }),
                        (this.doScrollLeft = function (a, b) {
                            var c = h.scrollrunning ? h.newscrolly : h.getScrollTop();
                            h.doScrollPos(a, c, b);
                        }),
                        (this.doScrollTop = function (a, b) {
                            var c = h.scrollrunning ? h.newscrollx : h.getScrollLeft();
                            h.doScrollPos(c, a, b);
                        }),
                        (this.cursorupdate = {
                            running: !1,
                            start: function () {
                                var a = this;
                                if (!a.running) {
                                    a.running = !0;
                                    var b = function () {
                                        a.running && f(b), h.showCursor(h.getScrollTop(), h.getScrollLeft()), h.notifyScrollEvent(h.win[0]);
                                    };
                                    f(b);
                                }
                            },
                            stop: function () {
                                this.running = !1;
                            },
                        }),
                        (this.doScrollPos = function (a, c, m) {
                            var f = h.getScrollTop(),
                                g = h.getScrollLeft();
                            if (
                                (((h.newscrolly - f) * (c - f) < 0 || (h.newscrollx - g) * (a - g) < 0) && h.cancelScroll(),
                                b.bouncescroll
                                    ? (c < 0 ? (c = (c / 2) | 0) : c > h.page.maxh && (c = (h.page.maxh + (c - h.page.maxh) / 2) | 0), a < 0 ? (a = (a / 2) | 0) : a > h.page.maxw && (a = (h.page.maxw + (a - h.page.maxw) / 2) | 0))
                                    : (c < 0 ? (c = 0) : c > h.page.maxh && (c = h.page.maxh), a < 0 ? (a = 0) : a > h.page.maxw && (a = h.page.maxw)),
                                h.scrollrunning && a == h.newscrollx && c == h.newscrolly)
                            )
                                return !1;
                            (h.newscrolly = c), (h.newscrollx = a);
                            var i = h.getScrollTop(),
                                j = h.getScrollLeft(),
                                e = {};
                            (e.x = a - j), (e.y = c - i);
                            var l = 0 | Math.sqrt(e.x * e.x + e.y * e.y),
                                k = h.prepareTransition(l);
                            h.scrollrunning || ((h.scrollrunning = !0), h.triggerScrollStart(j, i, a, c, k), h.cursorupdate.start()),
                                (h.scrollendtrapped = !0),
                                d.transitionend || (h.scrollendtrapped && clearTimeout(h.scrollendtrapped), (h.scrollendtrapped = setTimeout(h.onScrollTransitionEnd, k))),
                                h.setScrollTop(h.newscrolly),
                                h.setScrollLeft(h.newscrollx);
                        }),
                        (this.cancelScroll = function () {
                            if (!h.scrollendtrapped) return !0;
                            var a = h.getScrollTop(),
                                b = h.getScrollLeft();
                            return (
                                (h.scrollrunning = !1),
                                d.transitionend || clearTimeout(d.transitionend),
                                (h.scrollendtrapped = !1),
                                h.resetTransition(),
                                h.setScrollTop(a),
                                h.railh && h.setScrollLeft(b),
                                h.timerscroll && h.timerscroll.tm && clearInterval(h.timerscroll.tm),
                                (h.timerscroll = !1),
                                (h.cursorfreezed = !1),
                                h.cursorupdate.stop(),
                                h.showCursor(a, b),
                                h
                            );
                        }),
                        (this.onScrollTransitionEnd = function () {
                            if (h.scrollendtrapped) {
                                var a = h.getScrollTop(),
                                    c = h.getScrollLeft();
                                if ((a < 0 ? (a = 0) : a > h.page.maxh && (a = h.page.maxh), c < 0 ? (c = 0) : c > h.page.maxw && (c = h.page.maxw), a != h.newscrolly || c != h.newscrollx)) return h.doScrollPos(c, a, b.snapbackspeed);
                                h.scrollrunning && h.triggerScrollEnd(),
                                    (h.scrollrunning = !1),
                                    (h.scrollendtrapped = !1),
                                    h.resetTransition(),
                                    (h.timerscroll = !1),
                                    h.setScrollTop(a),
                                    h.railh && h.setScrollLeft(c),
                                    h.cursorupdate.stop(),
                                    h.noticeCursor(!1, a, c),
                                    (h.cursorfreezed = !1);
                            }
                        });
                } else
                    (this.doScrollLeft = function (a, b) {
                        var c = h.scrollrunning ? h.newscrolly : h.getScrollTop();
                        h.doScrollPos(a, c, b);
                    }),
                        (this.doScrollTop = function (a, b) {
                            var c = h.scrollrunning ? h.newscrollx : h.getScrollLeft();
                            h.doScrollPos(c, a, b);
                        }),
                        (this.doScrollPos = function (a, b, l) {
                            var c = h.getScrollTop(),
                                d = h.getScrollLeft();
                            ((h.newscrolly - c) * (b - c) < 0 || (h.newscrollx - d) * (a - d) < 0) && h.cancelScroll();
                            var e = !1;
                            if (
                                ((h.bouncescroll && h.rail.visibility) || (b < 0 ? ((b = 0), (e = !0)) : b > h.page.maxh && ((b = h.page.maxh), (e = !0))),
                                (h.bouncescroll && h.railh.visibility) || (a < 0 ? ((a = 0), (e = !0)) : a > h.page.maxw && ((a = h.page.maxw), (e = !0))),
                                h.scrollrunning && h.newscrolly === b && h.newscrollx === a)
                            )
                                return !0;
                            (h.newscrolly = b), (h.newscrollx = a), (h.dst = {}), (h.dst.x = a - d), (h.dst.y = b - c), (h.dst.px = d), (h.dst.py = c);
                            var j = 0 | Math.sqrt(h.dst.x * h.dst.x + h.dst.y * h.dst.y),
                                g = h.getTransitionSpeed(j);
                            h.bzscroll = {};
                            var i = e ? 1 : 0.58;
                            (h.bzscroll.x = new A(d, h.newscrollx, g, 0, 0, i, 1)), (h.bzscroll.y = new A(c, h.newscrolly, g, 0, 0, i, 1)), u();
                            var k = function () {
                                if (h.scrollrunning) {
                                    var a = h.bzscroll.y.getPos();
                                    h.setScrollLeft(h.bzscroll.x.getNow()), h.setScrollTop(h.bzscroll.y.getNow()), a <= 1 ? (h.timer = f(k)) : ((h.scrollrunning = !1), (h.timer = 0), h.triggerScrollEnd());
                                }
                            };
                            h.scrollrunning || (h.triggerScrollStart(d, c, a, b, g), (h.scrollrunning = !0), (h.timer = f(k)));
                        }),
                        (this.cancelScroll = function () {
                            return h.timer && g(h.timer), (h.timer = 0), (h.bzscroll = !1), (h.scrollrunning = !1), h;
                        });
            } else
                (this.doScrollLeft = function (a, b) {
                    var c = h.getScrollTop();
                    h.doScrollPos(a, c, b);
                }),
                    (this.doScrollTop = function (a, b) {
                        var c = h.getScrollLeft();
                        h.doScrollPos(c, a, b);
                    }),
                    (this.doScrollPos = function (a, b, e) {
                        var c = a > h.page.maxw ? h.page.maxw : a;
                        c < 0 && (c = 0);
                        var d = b > h.page.maxh ? h.page.maxh : b;
                        d < 0 && (d = 0),
                            h.synched("scroll", function () {
                                h.setScrollTop(d), h.setScrollLeft(c);
                            });
                    }),
                    (this.cancelScroll = function () {});
            (this.doScrollBy = function (a, b) {
                F(0, a);
            }),
                (this.doScrollLeftBy = function (a, b) {
                    F(a, 0);
                }),
                (this.doScrollTo = function (b, c) {
                    var a = c ? Math.round(b * h.scrollratio.y) : b;
                    a < 0 ? (a = 0) : a > h.page.maxh && (a = h.page.maxh), (h.cursorfreezed = !1), h.doScrollTop(b);
                }),
                (this.checkContentSize = function () {
                    var a = h.getContentSize();
                    (a.h == h.page.h && a.w == h.page.w) || h.resize(!1, a);
                }),
                (h.onscroll = function (a) {
                    h.rail.drag ||
                        h.cursorfreezed ||
                        h.synched("scroll", function () {
                            (h.scroll.y = Math.round(h.getScrollTop() / h.scrollratio.y)), h.railh && (h.scroll.x = Math.round(h.getScrollLeft() / h.scrollratio.x)), h.noticeCursor();
                        });
                }),
                h.bind(h.docscroll, "scroll", h.onscroll),
                (this.doZoomIn = function (f) {
                    if (!h.zoomactive) {
                        (h.zoomactive = !0), (h.zoomrestore = { style: {} });
                        var b = ["position", "top", "left", "zIndex", "backgroundColor", "marginTop", "marginBottom", "marginLeft", "marginRight"],
                            c = h.win[0].style;
                        for (var g in b) {
                            var a = b[g];
                            h.zoomrestore.style[a] = void 0 !== c[a] ? c[a] : "";
                        }
                        (h.zoomrestore.style.width = h.win.css("width")),
                            (h.zoomrestore.style.height = h.win.css("height")),
                            (h.zoomrestore.padding = { w: h.win.outerWidth() - h.win.width(), h: h.win.outerHeight() - h.win.height() }),
                            d.isios4 && ((h.zoomrestore.scrollTop = q.scrollTop()), q.scrollTop(0)),
                            h.win.css({ position: d.isios4 ? "absolute" : "fixed", top: 0, left: 0, zIndex: p + 100, margin: 0 });
                        var e = h.win.css("backgroundColor");
                        return (
                            ("" === e || /transparent|rgba\(0, 0, 0, 0\)|rgba\(0,0,0,0\)/.test(e)) && h.win.css("backgroundColor", "#fff"),
                            h.rail.css({ zIndex: p + 101 }),
                            h.zoom.css({ zIndex: p + 102 }),
                            h.zoom.css("backgroundPosition", "0 -18px"),
                            h.resizeZoom(),
                            h.onzoomin && h.onzoomin.call(h),
                            h.cancelEvent(f)
                        );
                    }
                }),
                (this.doZoomOut = function (a) {
                    if (h.zoomactive)
                        return (
                            (h.zoomactive = !1),
                            h.win.css("margin", ""),
                            h.win.css(h.zoomrestore.style),
                            d.isios4 && q.scrollTop(h.zoomrestore.scrollTop),
                            h.rail.css({ "z-index": h.zindex }),
                            h.zoom.css({ "z-index": h.zindex }),
                            (h.zoomrestore = !1),
                            h.zoom.css("backgroundPosition", "0 0"),
                            h.onResize(),
                            h.onzoomout && h.onzoomout.call(h),
                            h.cancelEvent(a)
                        );
                }),
                (this.doZoom = function (a) {
                    return h.zoomactive ? h.doZoomOut(a) : h.doZoomIn(a);
                }),
                (this.resizeZoom = function () {
                    if (h.zoomactive) {
                        var a = h.getScrollTop();
                        h.win.css({ width: q.width() - h.zoomrestore.padding.w + "px", height: q.height() - h.zoomrestore.padding.h + "px" }), h.onResize(), h.setScrollTop(Math.min(h.page.maxh, a));
                    }
                }),
                this.init(),
                c.nicescroll.push(this);
        },
        y = function (a) {
            var b = this;
            (this.nc = a),
                (this.lastx = 0),
                (this.lasty = 0),
                (this.speedx = 0),
                (this.speedy = 0),
                (this.lasttime = 0),
                (this.steptime = 0),
                (this.snapx = !1),
                (this.snapy = !1),
                (this.demulx = 0),
                (this.demuly = 0),
                (this.lastscrollx = -1),
                (this.lastscrolly = -1),
                (this.chkx = 0),
                (this.chky = 0),
                (this.timer = 0),
                (this.reset = function (a, c) {
                    b.stop(), (b.steptime = 0), (b.lasttime = u()), (b.speedx = 0), (b.speedy = 0), (b.lastx = a), (b.lasty = c), (b.lastscrollx = -1), (b.lastscrolly = -1);
                }),
                (this.update = function (a, c) {
                    var d = u();
                    (b.steptime = d - b.lasttime), (b.lasttime = d);
                    var e = c - b.lasty,
                        f = a - b.lastx,
                        g = b.nc.getScrollTop() + e,
                        h = b.nc.getScrollLeft() + f;
                    (b.snapx = h < 0 || h > b.nc.page.maxw), (b.snapy = g < 0 || g > b.nc.page.maxh), (b.speedx = f), (b.speedy = e), (b.lastx = a), (b.lasty = c);
                }),
                (this.stop = function () {
                    b.nc.unsynched("domomentum2d"), b.timer && clearTimeout(b.timer), (b.timer = 0), (b.lastscrollx = -1), (b.lastscrolly = -1);
                }),
                (this.doSnapy = function (a, c) {
                    var d = !1;
                    c < 0 ? ((c = 0), (d = !0)) : c > b.nc.page.maxh && ((c = b.nc.page.maxh), (d = !0)),
                        a < 0 ? ((a = 0), (d = !0)) : a > b.nc.page.maxw && ((a = b.nc.page.maxw), (d = !0)),
                        d ? b.nc.doScrollPos(a, c, b.nc.opt.snapbackspeed) : b.nc.triggerScrollEnd();
                }),
                (this.doMomentum = function (d) {
                    var e = u(),
                        f = d ? e + d : b.lasttime,
                        g = b.nc.getScrollLeft(),
                        h = b.nc.getScrollTop(),
                        i = b.nc.page.maxh,
                        j = b.nc.page.maxw;
                    (b.speedx = j > 0 ? Math.min(60, b.speedx) : 0), (b.speedy = i > 0 ? Math.min(60, b.speedy) : 0);
                    var a = f && e - f <= 60;
                    (h < 0 || h > i || g < 0 || g > j) && (a = !1);
                    var l = !(!b.speedy || !a) && b.speedy,
                        m = !(!b.speedx || !a) && b.speedx;
                    if (l || m) {
                        var c = Math.max(16, b.steptime);
                        if (c > 50) {
                            var k = c / 50;
                            (b.speedx *= k), (b.speedy *= k), (c = 50);
                        }
                        (b.demulxy = 0), (b.lastscrollx = b.nc.getScrollLeft()), (b.chkx = b.lastscrollx), (b.lastscrolly = b.nc.getScrollTop()), (b.chky = b.lastscrolly);
                        var o = b.lastscrollx,
                            p = b.lastscrolly,
                            n = function () {
                                var a = u() - e > 600 ? 0.04 : 0.02;
                                b.speedx && ((o = Math.floor(b.lastscrollx - b.speedx * (1 - b.demulxy))), (b.lastscrollx = o), (o < 0 || o > j) && (a = 0.1)),
                                    b.speedy && ((p = Math.floor(b.lastscrolly - b.speedy * (1 - b.demulxy))), (b.lastscrolly = p), (p < 0 || p > i) && (a = 0.1)),
                                    (b.demulxy = Math.min(1, b.demulxy + a)),
                                    b.nc.synched("domomentum2d", function () {
                                        b.speedx && (b.nc.getScrollLeft(), (b.chkx = o), b.nc.setScrollLeft(o)), b.speedy && (b.nc.getScrollTop(), (b.chky = p), b.nc.setScrollTop(p)), b.timer || (b.nc.hideCursor(), b.doSnapy(o, p));
                                    }),
                                    b.demulxy < 1 ? (b.timer = setTimeout(n, c)) : (b.stop(), b.nc.hideCursor(), b.doSnapy(o, p));
                            };
                        n();
                    } else b.doSnapy(b.nc.getScrollLeft(), b.nc.getScrollTop());
                });
        },
        z = b.fn.scrollTop;
    (b.cssHooks.pageYOffset = {
        get: function (b, d, e) {
            var a = c.data(b, "__nicescroll") || !1;
            return a && a.ishwscroll ? a.getScrollTop() : z.call(b);
        },
        set: function (b, d) {
            var a = c.data(b, "__nicescroll") || !1;
            return a && a.ishwscroll ? a.setScrollTop(parseInt(d)) : z.call(b, d), this;
        },
    }),
        (b.fn.scrollTop = function (b) {
            if (void 0 === b) {
                var a = !!this[0] && !!c.data(this[0], "__nicescroll");
                return a && a.ishwscroll ? a.getScrollTop() : z.call(this);
            }
            return this.each(function () {
                var a = c.data(this, "__nicescroll") || !1;
                a && a.ishwscroll ? a.setScrollTop(parseInt(b)) : z.call(c(this), b);
            });
        });
    var A = b.fn.scrollLeft;
    (c.cssHooks.pageXOffset = {
        get: function (b, d, e) {
            var a = c.data(b, "__nicescroll") || !1;
            return a && a.ishwscroll ? a.getScrollLeft() : A.call(b);
        },
        set: function (b, d) {
            var a = c.data(b, "__nicescroll") || !1;
            return a && a.ishwscroll ? a.setScrollLeft(parseInt(d)) : A.call(b, d), this;
        },
    }),
        (b.fn.scrollLeft = function (b) {
            if (void 0 === b) {
                var a = !!this[0] && !!c.data(this[0], "__nicescroll");
                return a && a.ishwscroll ? a.getScrollLeft() : A.call(this);
            }
            return this.each(function () {
                var a = c.data(this, "__nicescroll") || !1;
                a && a.ishwscroll ? a.setScrollLeft(parseInt(b)) : A.call(c(this), b);
            });
        });
    var j = function (a) {
        var e = this;
        if (
            ((this.length = 0),
            (this.name = "nicescrollarray"),
            (this.each = function (a) {
                return c.each(e, a), e;
            }),
            (this.push = function (a) {
                (e[e.length] = a), e.length++;
            }),
            (this.eq = function (a) {
                return e[a];
            }),
            a)
        )
            for (var b = 0; b < a.length; b++) {
                var d = c.data(a[b], "__nicescroll") || !1;
                d && ((this[this.length] = d), this.length++);
            }
        return this;
    };
    !(function (c, b, d) {
        for (var a = 0, e = b.length; a < e; a++) d(c, b[a]);
    })(j.prototype, ["show", "hide", "toggle", "onResize", "resize", "remove", "stop", "doScrollPos"], function (a, b) {
        a[b] = function () {
            var a = arguments;
            return this.each(function () {
                this[b].apply(this, a);
            });
        };
    }),
        (b.fn.getNiceScroll = function (a) {
            return void 0 === a ? new j(this) : (this[a] && c.data(this[a], "__nicescroll")) || !1;
        }),
        ((b.expr.pseudos || b.expr[":"]).nicescroll = function (a) {
            return void 0 !== c.data(a, "__nicescroll");
        }),
        (c.fn.niceScroll = function (a, d) {
            void 0 !== d || "object" != typeof a || "jquery" in a || ((d = a), (a = !1));
            var b = new j();
            return (
                this.each(function () {
                    var f = c(this),
                        e = c.extend({}, d);
                    if (a) {
                        var h = c(a);
                        (e.doc = h.length > 1 ? c(a, f) : h), (e.win = f);
                    }
                    !("doc" in e) || "win" in e || (e.win = f);
                    var g = f.data("__nicescroll") || !1;
                    g || ((e.doc = e.doc || f), (g = new x(e, f)), f.data("__nicescroll", g)), b.push(g);
                }),
                1 === b.length ? b[0] : b
            );
        }),
        (a.NiceScroll = {
            getjQuery: function () {
                return b;
            },
        }),
        c.nicescroll || ((c.nicescroll = new j()), (c.nicescroll.options = k));
});

// 6. odometer

!function () {
    var a,
        b,
        c,
        d,
        e,
        f,
        g,
        h,
        i,
        j,
        k,
        l,
        m,
        n,
        o,
        p,
        q,
        r,
        s,
        t,
        u,
        v,
        w,
        x,
        y,
        z,
        A,
        B,
        C,
        D,
        E,
        F,
        G = [].slice;
    (q = '<span class="odometer-value"></span>'),
        (n = '<span class="odometer-ribbon"><span class="odometer-ribbon-inner">' + q + "</span></span>"),
        (d = '<span class="odometer-digit"><span class="odometer-digit-spacer">8</span><span class="odometer-digit-inner">' + n + "</span></span>"),
        (g = '<span class="odometer-formatting-mark"></span>'),
        (c = "(,ddd).dd"),
        (h = /^\(?([^)]*)\)?(?:(.)(d+))?$/),
        (i = 30),
        (f = 2e3),
        (a = 20),
        (j = 2),
        (e = 0.5),
        (k = 1e3 / i),
        (b = 1e3 / a),
        (o = "transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd"),
        (y = document.createElement("div").style),
        (p = null != y.transition || null != y.webkitTransition || null != y.mozTransition || null != y.oTransition),
        (w = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame),
        (l = window.MutationObserver || window.WebKitMutationObserver || window.MozMutationObserver),
        (s = function (a) {
            var b;
            return (b = document.createElement("div")), (b.innerHTML = a), b.children[0];
        }),
        (v = function (a, b) {
            return (a.className = a.className.replace(new RegExp("(^| )" + b.split(" ").join("|") + "( |$)", "gi"), " "));
        }),
        (r = function (a, b) {
            return v(a, b), (a.className += " " + b);
        }),
        (z = function (a, b) {
            var c;
            return null != document.createEvent ? ((c = document.createEvent("HTMLEvents")), c.initEvent(b, !0, !0), a.dispatchEvent(c)) : void 0;
        }),
        (u = function () {
            var a, b;
            return null != (a = null != (b = window.performance) && "function" == typeof b.now ? b.now() : void 0) ? a : +new Date();
        }),
        (x = function (a, b) {
            return null == b && (b = 0), b ? ((a *= Math.pow(10, b)), (a += 0.5), (a = Math.floor(a)), (a /= Math.pow(10, b))) : Math.round(a);
        }),
        (A = function (a) {
            return 0 > a ? Math.ceil(a) : Math.floor(a);
        }),
        (t = function (a) {
            return a - x(a);
        }),
        (C = !1),
        (B = function () {
            var a, b, c, d, e;
            if (!C && null != window.jQuery) {
                for (C = !0, d = ["html", "text"], e = [], b = 0, c = d.length; c > b; b++)
                    (a = d[b]),
                        e.push(
                            (function (a) {
                                var b;
                                return (
                                    (b = window.jQuery.fn[a]),
                                    (window.jQuery.fn[a] = function (a) {
                                        var c;
                                        return null == a || null == (null != (c = this[0]) ? c.odometer : void 0) ? b.apply(this, arguments) : this[0].odometer.update(a);
                                    })
                                );
                            })(a)
                        );
                return e;
            }
        })(),
        setTimeout(B, 0),
        (m = (function () {
            function a(b) {
                var c,
                    d,
                    e,
                    g,
                    h,
                    i,
                    l,
                    m,
                    n,
                    o,
                    p = this;
                if (((this.options = b), (this.el = this.options.el), null != this.el.odometer)) return this.el.odometer;
                (this.el.odometer = this), (m = a.options);
                for (d in m) (g = m[d]), null == this.options[d] && (this.options[d] = g);
                null == (h = this.options).duration && (h.duration = f),
                    (this.MAX_VALUES = (this.options.duration / k / j) | 0),
                    this.resetFormat(),
                    (this.value = this.cleanValue(null != (n = this.options.value) ? n : "")),
                    this.renderInside(),
                    this.render();
                try {
                    for (o = ["innerHTML", "innerText", "textContent"], i = 0, l = o.length; l > i; i++)
                        (e = o[i]),
                            null != this.el[e] &&
                                !(function (a) {
                                    return Object.defineProperty(p.el, a, {
                                        get: function () {
                                            var b;
                                            return "innerHTML" === a ? p.inside.outerHTML : null != (b = p.inside.innerText) ? b : p.inside.textContent;
                                        },
                                        set: function (a) {
                                            return p.update(a);
                                        },
                                    });
                                })(e);
                } catch (q) {
                    (c = q), this.watchForMutations();
                }
            }
            return (
                (a.prototype.renderInside = function () {
                    return (this.inside = document.createElement("div")), (this.inside.className = "odometer-inside"), (this.el.innerHTML = ""), this.el.appendChild(this.inside);
                }),
                (a.prototype.watchForMutations = function () {
                    var a,
                        b = this;
                    if (null != l)
                        try {
                            return (
                                null == this.observer &&
                                    (this.observer = new l(function (a) {
                                        var c;
                                        return (c = b.el.innerText), b.renderInside(), b.render(b.value), b.update(c);
                                    })),
                                (this.watchMutations = !0),
                                this.startWatchingMutations()
                            );
                        } catch (c) {
                            a = c;
                        }
                }),
                (a.prototype.startWatchingMutations = function () {
                    return this.watchMutations ? this.observer.observe(this.el, { childList: !0 }) : void 0;
                }),
                (a.prototype.stopWatchingMutations = function () {
                    var a;
                    return null != (a = this.observer) ? a.disconnect() : void 0;
                }),
                (a.prototype.cleanValue = function (a) {
                    var b;
                    return (
                        "string" == typeof a && ((a = a.replace(null != (b = this.format.radix) ? b : ".", "<radix>")), (a = a.replace(/[.,]/g, "")), (a = a.replace("<radix>", ".")), (a = parseFloat(a, 10) || 0)),
                        x(a, this.format.precision)
                    );
                }),
                (a.prototype.bindTransitionEnd = function () {
                    var a,
                        b,
                        c,
                        d,
                        e,
                        f,
                        g = this;
                    if (!this.transitionEndBound) {
                        for (this.transitionEndBound = !0, b = !1, e = o.split(" "), f = [], c = 0, d = e.length; d > c; c++)
                            (a = e[c]),
                                f.push(
                                    this.el.addEventListener(
                                        a,
                                        function () {
                                            return b
                                                ? !0
                                                : ((b = !0),
                                                  setTimeout(function () {
                                                      return g.render(), (b = !1), z(g.el, "odometerdone");
                                                  }, 0),
                                                  !0);
                                        },
                                        !1
                                    )
                                );
                        return f;
                    }
                }),
                (a.prototype.resetFormat = function () {
                    var a, b, d, e, f, g, i, j;
                    if (((a = null != (i = this.options.format) ? i : c), a || (a = "d"), (d = h.exec(a)), !d)) throw new Error("Odometer: Unparsable digit format");
                    return (j = d.slice(1, 4)), (g = j[0]), (f = j[1]), (b = j[2]), (e = (null != b ? b.length : void 0) || 0), (this.format = { repeating: g, radix: f, precision: e });
                }),
                (a.prototype.render = function (a) {
                    var b, c, d, e, f, g, h;
                    for (null == a && (a = this.value), this.stopWatchingMutations(), this.resetFormat(), this.inside.innerHTML = "", f = this.options.theme, b = this.el.className.split(" "), e = [], g = 0, h = b.length; h > g; g++)
                        (c = b[g]), c.length && ((d = /^odometer-theme-(.+)$/.exec(c)) ? (f = d[1]) : /^odometer(-|$)/.test(c) || e.push(c));
                    return (
                        e.push("odometer"),
                        p || e.push("odometer-no-transitions"),
                        f ? e.push("odometer-theme-" + f) : e.push("odometer-auto-theme"),
                        (this.el.className = e.join(" ")),
                        (this.ribbons = {}),
                        this.formatDigits(a),
                        this.startWatchingMutations()
                    );
                }),
                (a.prototype.formatDigits = function (a) {
                    var b, c, d, e, f, g, h, i, j, k;
                    if (((this.digits = []), this.options.formatFunction))
                        for (d = this.options.formatFunction(a), j = d.split("").reverse(), f = 0, h = j.length; h > f; f++)
                            (c = j[f]), c.match(/0-9/) ? ((b = this.renderDigit()), (b.querySelector(".odometer-value").innerHTML = c), this.digits.push(b), this.insertDigit(b)) : this.addSpacer(c);
                    else for (e = !this.format.precision || !t(a) || !1, k = a.toString().split("").reverse(), g = 0, i = k.length; i > g; g++) (b = k[g]), "." === b && (e = !0), this.addDigit(b, e);
                }),
                (a.prototype.update = function (a) {
                    var b,
                        c = this;
                    return (
                        (a = this.cleanValue(a)),
                        (b = a - this.value)
                            ? (v(this.el, "odometer-animating-up odometer-animating-down odometer-animating"),
                              b > 0 ? r(this.el, "odometer-animating-up") : r(this.el, "odometer-animating-down"),
                              this.stopWatchingMutations(),
                              this.animate(a),
                              this.startWatchingMutations(),
                              setTimeout(function () {
                                  return c.el.offsetHeight, r(c.el, "odometer-animating");
                              }, 0),
                              (this.value = a))
                            : void 0
                    );
                }),
                (a.prototype.renderDigit = function () {
                    return s(d);
                }),
                (a.prototype.insertDigit = function (a, b) {
                    return null != b ? this.inside.insertBefore(a, b) : this.inside.children.length ? this.inside.insertBefore(a, this.inside.children[0]) : this.inside.appendChild(a);
                }),
                (a.prototype.addSpacer = function (a, b, c) {
                    var d;
                    return (d = s(g)), (d.innerHTML = a), c && r(d, c), this.insertDigit(d, b);
                }),
                (a.prototype.addDigit = function (a, b) {
                    var c, d, e, f;
                    if ((null == b && (b = !0), "-" === a)) return this.addSpacer(a, null, "odometer-negation-mark");
                    if ("." === a) return this.addSpacer(null != (f = this.format.radix) ? f : ".", null, "odometer-radix-mark");
                    if (b)
                        for (e = !1; ; ) {
                            if (!this.format.repeating.length) {
                                if (e) throw new Error("Bad odometer format without digits");
                                this.resetFormat(), (e = !0);
                            }
                            if (((c = this.format.repeating[this.format.repeating.length - 1]), (this.format.repeating = this.format.repeating.substring(0, this.format.repeating.length - 1)), "d" === c)) break;
                            this.addSpacer(c);
                        }
                    return (d = this.renderDigit()), (d.querySelector(".odometer-value").innerHTML = a), this.digits.push(d), this.insertDigit(d);
                }),
                (a.prototype.animate = function (a) {
                    return p && "count" !== this.options.animation ? this.animateSlide(a) : this.animateCount(a);
                }),
                (a.prototype.animateCount = function (a) {
                    var c,
                        d,
                        e,
                        f,
                        g,
                        h = this;
                    if ((d = +a - this.value))
                        return (
                            (f = e = u()),
                            (c = this.value),
                            (g = function () {
                                var i, j, k;
                                return u() - f > h.options.duration
                                    ? ((h.value = a), h.render(), void z(h.el, "odometerdone"))
                                    : ((i = u() - e), i > b && ((e = u()), (k = i / h.options.duration), (j = d * k), (c += j), h.render(Math.round(c))), null != w ? w(g) : setTimeout(g, b));
                            })()
                        );
                }),
                (a.prototype.getDigitCount = function () {
                    var a, b, c, d, e, f;
                    for (d = 1 <= arguments.length ? G.call(arguments, 0) : [], a = e = 0, f = d.length; f > e; a = ++e) (c = d[a]), (d[a] = Math.abs(c));
                    return (b = Math.max.apply(Math, d)), Math.ceil(Math.log(b + 1) / Math.log(10));
                }),
                (a.prototype.getFractionalDigitCount = function () {
                    var a, b, c, d, e, f, g;
                    for (e = 1 <= arguments.length ? G.call(arguments, 0) : [], b = /^\-?\d*\.(\d*?)0*$/, a = f = 0, g = e.length; g > f; a = ++f)
                        (d = e[a]), (e[a] = d.toString()), (c = b.exec(e[a])), null == c ? (e[a] = 0) : (e[a] = c[1].length);
                    return Math.max.apply(Math, e);
                }),
                (a.prototype.resetDigits = function () {
                    return (this.digits = []), (this.ribbons = []), (this.inside.innerHTML = ""), this.resetFormat();
                }),
                (a.prototype.animateSlide = function (a) {
                    var b, c, d, f, g, h, i, j, k, l, m, n, o, p, q, s, t, u, v, w, x, y, z, B, C, D, E;
                    if (((s = this.value), (j = this.getFractionalDigitCount(s, a)), j && ((a *= Math.pow(10, j)), (s *= Math.pow(10, j))), (d = a - s))) {
                        for (this.bindTransitionEnd(), f = this.getDigitCount(s, a), g = [], b = 0, m = v = 0; f >= 0 ? f > v : v > f; m = f >= 0 ? ++v : --v) {
                            if (((t = A(s / Math.pow(10, f - m - 1))), (i = A(a / Math.pow(10, f - m - 1))), (h = i - t), Math.abs(h) > this.MAX_VALUES)) {
                                for (l = [], n = h / (this.MAX_VALUES + this.MAX_VALUES * b * e), c = t; (h > 0 && i > c) || (0 > h && c > i); ) l.push(Math.round(c)), (c += n);
                                l[l.length - 1] !== i && l.push(i), b++;
                            } else
                                l = function () {
                                    E = [];
                                    for (var a = t; i >= t ? i >= a : a >= i; i >= t ? a++ : a--) E.push(a);
                                    return E;
                                }.apply(this);
                            for (m = w = 0, y = l.length; y > w; m = ++w) (k = l[m]), (l[m] = Math.abs(k % 10));
                            g.push(l);
                        }
                        for (this.resetDigits(), D = g.reverse(), m = x = 0, z = D.length; z > x; m = ++x)
                            for (
                                l = D[m],
                                    this.digits[m] || this.addDigit(" ", m >= j),
                                    null == (u = this.ribbons)[m] && (u[m] = this.digits[m].querySelector(".odometer-ribbon-inner")),
                                    this.ribbons[m].innerHTML = "",
                                    0 > d && (l = l.reverse()),
                                    o = C = 0,
                                    B = l.length;
                                B > C;
                                o = ++C
                            )
                                (k = l[o]),
                                    (q = document.createElement("div")),
                                    (q.className = "odometer-value"),
                                    (q.innerHTML = k),
                                    this.ribbons[m].appendChild(q),
                                    o === l.length - 1 && r(q, "odometer-last-value"),
                                    0 === o && r(q, "odometer-first-value");
                        return (
                            0 > t && this.addDigit("-"),
                            (p = this.inside.querySelector(".odometer-radix-mark")),
                            null != p && p.parent.removeChild(p),
                            j ? this.addSpacer(this.format.radix, this.digits[j - 1], "odometer-radix-mark") : void 0
                        );
                    }
                }),
                a
            );
        })()),
        (m.options = null != (E = window.odometerOptions) ? E : {}),
        setTimeout(function () {
            var a, b, c, d, e;
            if (window.odometerOptions) {
                (d = window.odometerOptions), (e = []);
                for (a in d) (b = d[a]), e.push(null != (c = m.options)[a] ? (c = m.options)[a] : (c[a] = b));
                return e;
            }
        }, 0),
        (m.init = function () {
            var a, b, c, d, e, f;
            if (null != document.querySelectorAll) {
                for (b = document.querySelectorAll(m.options.selector || ".odometer"), f = [], c = 0, d = b.length; d > c; c++) (a = b[c]), f.push((a.odometer = new m({ el: a, value: null != (e = a.innerText) ? e : a.textContent })));
                return f;
            }
        }),
        null != (null != (F = document.documentElement) ? F.doScroll : void 0) && null != document.createEventObject
            ? ((D = document.onreadystatechange),
              (document.onreadystatechange = function () {
                  return "complete" === document.readyState && m.options.auto !== !1 && m.init(), null != D ? D.apply(this, arguments) : void 0;
              }))
            : document.addEventListener(
                  "DOMContentLoaded",
                  function () {
                      return m.options.auto !== !1 ? m.init() : void 0;
                  },
                  !1
              ),
        "function" == typeof define && define.amd
            ? define([], function () {
                  return m;
              })
            : "undefined" != typeof exports && null !== exports
            ? (module.exports = m)
            : (window.Odometer = m);
}.call(this);

// 7. appear

/*
 * jQuery.appear
 * https://github.com/bas2k/jquery.appear/
 * http://code.google.com/p/jquery-appear/
 * http://bas2k.ru/
 *
 * Copyright (c) 2009 Michael Hixson
 * Copyright (c) 2012-2014 Alexander Brovikov
 * Licensed under the MIT license (http://www.opensource.org/licenses/mit-license.php)
 */
(function ($) {
    $.fn.appear = function (fn, options) {
        var settings = $.extend(
            {
                //arbitrary data to pass to fn
                data: undefined,

                //call fn only on the first appear?
                one: true,

                // X & Y accuracy
                accX: 0,
                accY: 0,
            },
            options
        );

        return this.each(function () {
            var t = $(this);

            //whether the element is currently visible
            t.appeared = false;

            if (!fn) {
                //trigger the custom event
                t.trigger("appear", settings.data);
                return;
            }

            var w = $(window);

            //fires the appear event when appropriate
            var check = function () {
                //is the element hidden?
                if (!t.is(":visible")) {
                    //it became hidden
                    t.appeared = false;
                    return;
                }

                //is the element inside the visible window?
                var a = w.scrollLeft();
                var b = w.scrollTop();
                var o = t.offset();
                var x = o.left;
                var y = o.top;

                var ax = settings.accX;
                var ay = settings.accY;
                var th = t.height();
                var wh = w.height();
                var tw = t.width();
                var ww = w.width();

                if (y + th + ay >= b && y <= b + wh + ay && x + tw + ax >= a && x <= a + ww + ax) {
                    //trigger the custom event
                    if (!t.appeared) t.trigger("appear", settings.data);
                } else {
                    //it scrolled out of view
                    t.appeared = false;
                }
            };

            //create a modified fn with some additional logic
            var modifiedFn = function () {
                //mark the element as visible
                t.appeared = true;

                //is this supposed to happen only once?
                if (settings.one) {
                    //remove the check
                    w.unbind("scroll", check);
                    var i = $.inArray(check, $.fn.appear.checks);
                    if (i >= 0) $.fn.appear.checks.splice(i, 1);
                }

                //trigger the original fn
                fn.apply(this, arguments);
            };

            //bind the modified fn to the element
            if (settings.one) t.one("appear", settings.data, modifiedFn);
            else t.bind("appear", settings.data, modifiedFn);

            //check whenever the window scrolls
            w.scroll(check);

            //check whenever the dom changes
            $.fn.appear.checks.push(check);

            //check now
            check();
        });
    };

    //keep a queue of appearance checks
    $.extend($.fn.appear, {
        checks: [],
        timeout: null,

        //process the queue
        checkAll: function () {
            var length = $.fn.appear.checks.length;
            if (length > 0) while (length--) $.fn.appear.checks[length]();
        },

        //check the queue asynchronously
        run: function () {
            if ($.fn.appear.timeout) clearTimeout($.fn.appear.timeout);
            $.fn.appear.timeout = setTimeout($.fn.appear.checkAll, 20);
        },
    });

    //run checks when these methods are called
    $.each(["append", "prepend", "after", "before", "attr", "removeAttr", "addClass", "removeClass", "toggleClass", "remove", "css", "show", "hide"], function (i, n) {
        var old = $.fn[n];
        if (old) {
            $.fn[n] = function () {
                var r = old.apply(this, arguments);
                $.fn.appear.run();
                return r;
            };
        }
    });
})(jQuery);

// 8. telInput
!(function (a) {
    "object" == typeof module && module.exports ? (module.exports = a()) : (window.intlTelInput = a());
})(function (a) {
    return (function () {
        for (
            var e = [
                    ["Afghanistan (\u202B\u0627\u0641\u063A\u0627\u0646\u0633\u062A\u0627\u0646\u202C\u200E)", "af", "93"],
                    ["Albania (Shqip\xebri)", "al", "355"],
                    ["Algeria (\u202B\u0627\u0644\u062C\u0632\u0627\u0626\u0631\u202C\u200E)", "dz", "213"],
                    ["American Samoa", "as", "1", 5, ["684"]],
                    ["Andorra", "ad", "376"],
                    ["Angola", "ao", "244"],
                    ["Anguilla", "ai", "1", 6, ["264"]],
                    ["Antigua and Barbuda", "ag", "1", 7, ["268"]],
                    ["Argentina", "ar", "54"],
                    ["Armenia (\u0540\u0561\u0575\u0561\u057D\u057F\u0561\u0576)", "am", "374"],
                    ["Aruba", "aw", "297"],
                    ["Ascension Island", "ac", "247"],
                    ["Australia", "au", "61", 0],
                    ["Austria (\xd6sterreich)", "at", "43"],
                    ["Azerbaijan (Az\u0259rbaycan)", "az", "994"],
                    ["Bahamas", "bs", "1", 8, ["242"]],
                    ["Bahrain (\u202B\u0627\u0644\u0628\u062D\u0631\u064A\u0646\u202C\u200E)", "bh", "973"],
                    ["Bangladesh (\u09AC\u09BE\u0982\u09B2\u09BE\u09A6\u09C7\u09B6)", "bd", "880"],
                    ["Barbados", "bb", "1", 9, ["246"]],
                    ["Belarus (\u0411\u0435\u043B\u0430\u0440\u0443\u0441\u044C)", "by", "375"],
                    ["Belgium (Belgi\xeb)", "be", "32"],
                    ["Belize", "bz", "501"],
                    ["Benin (B\xe9nin)", "bj", "229"],
                    ["Bermuda", "bm", "1", 10, ["441"]],
                    ["Bhutan (\u0F60\u0F56\u0FB2\u0F74\u0F42)", "bt", "975"],
                    ["Bolivia", "bo", "591"],
                    ["Bosnia and Herzegovina (\u0411\u043E\u0441\u043D\u0430 \u0438 \u0425\u0435\u0440\u0446\u0435\u0433\u043E\u0432\u0438\u043D\u0430)", "ba", "387"],
                    ["Botswana", "bw", "267"],
                    ["Brazil (Brasil)", "br", "55"],
                    ["British Indian Ocean Territory", "io", "246"],
                    ["British Virgin Islands", "vg", "1", 11, ["284"]],
                    ["Brunei", "bn", "673"],
                    ["Bulgaria (\u0411\u044A\u043B\u0433\u0430\u0440\u0438\u044F)", "bg", "359"],
                    ["Burkina Faso", "bf", "226"],
                    ["Burundi (Uburundi)", "bi", "257"],
                    ["Cambodia (\u1780\u1798\u17D2\u1796\u17BB\u1787\u17B6)", "kh", "855"],
                    ["Cameroon (Cameroun)", "cm", "237"],
                    [
                        "Canada",
                        "ca",
                        "1",
                        1,
                        [
                            "204",
                            "226",
                            "236",
                            "249",
                            "250",
                            "289",
                            "306",
                            "343",
                            "365",
                            "387",
                            "403",
                            "416",
                            "418",
                            "431",
                            "437",
                            "438",
                            "450",
                            "506",
                            "514",
                            "519",
                            "548",
                            "579",
                            "581",
                            "587",
                            "604",
                            "613",
                            "639",
                            "647",
                            "672",
                            "705",
                            "709",
                            "742",
                            "778",
                            "780",
                            "782",
                            "807",
                            "819",
                            "825",
                            "867",
                            "873",
                            "902",
                            "905",
                        ],
                    ],
                    ["Cape Verde (Kabu Verdi)", "cv", "238"],
                    ["Caribbean Netherlands", "bq", "599", 1, ["3", "4", "7"]],
                    ["Cayman Islands", "ky", "1", 12, ["345"]],
                    ["Central African Republic (R\xe9publique centrafricaine)", "cf", "236"],
                    ["Chad (Tchad)", "td", "235"],
                    ["Chile", "cl", "56"],
                    ["China (\u4E2D\u56FD)", "cn", "86"],
                    ["Christmas Island", "cx", "61", 2, ["89164"]],
                    ["Cocos (Keeling) Islands", "cc", "61", 1, ["89162"]],
                    ["Colombia", "co", "57"],
                    ["Comoros (\u202B\u062C\u0632\u0631 \u0627\u0644\u0642\u0645\u0631\u202C\u200E)", "km", "269"],
                    ["Congo (DRC) (Jamhuri ya Kidemokrasia ya Kongo)", "cd", "243"],
                    ["Congo (Republic) (Congo-Brazzaville)", "cg", "242"],
                    ["Cook Islands", "ck", "682"],
                    ["Costa Rica", "cr", "506"],
                    ["C\xf4te d\u2019Ivoire", "ci", "225"],
                    ["Croatia (Hrvatska)", "hr", "385"],
                    ["Cuba", "cu", "53"],
                    ["Cura\xe7ao", "cw", "599", 0],
                    ["Cyprus (\u039A\u03CD\u03C0\u03C1\u03BF\u03C2)", "cy", "357"],
                    ["Czech Republic (\u010Cesk\xe1 republika)", "cz", "420"],
                    ["Denmark (Danmark)", "dk", "45"],
                    ["Djibouti", "dj", "253"],
                    ["Dominica", "dm", "1", 13, ["767"]],
                    ["Dominican Republic (Rep\xfablica Dominicana)", "do", "1", 2, ["809", "829", "849"]],
                    ["Ecuador", "ec", "593"],
                    ["Egypt (\u202B\u0645\u0635\u0631\u202C\u200E)", "eg", "20"],
                    ["El Salvador", "sv", "503"],
                    ["Equatorial Guinea (Guinea Ecuatorial)", "gq", "240"],
                    ["Eritrea", "er", "291"],
                    ["Estonia (Eesti)", "ee", "372"],
                    ["Eswatini", "sz", "268"],
                    ["Ethiopia", "et", "251"],
                    ["Falkland Islands (Islas Malvinas)", "fk", "500"],
                    ["Faroe Islands (F\xf8royar)", "fo", "298"],
                    ["Fiji", "fj", "679"],
                    ["Finland (Suomi)", "fi", "358", 0],
                    ["France", "fr", "33"],
                    ["French Guiana (Guyane fran\xe7aise)", "gf", "594"],
                    ["French Polynesia (Polyn\xe9sie fran\xe7aise)", "pf", "689"],
                    ["Gabon", "ga", "241"],
                    ["Gambia", "gm", "220"],
                    ["Georgia (\u10E1\u10D0\u10E5\u10D0\u10E0\u10D7\u10D5\u10D4\u10DA\u10DD)", "ge", "995"],
                    ["Germany (Deutschland)", "de", "49"],
                    ["Ghana (Gaana)", "gh", "233"],
                    ["Gibraltar", "gi", "350"],
                    ["Greece (\u0395\u03BB\u03BB\u03AC\u03B4\u03B1)", "gr", "30"],
                    ["Greenland (Kalaallit Nunaat)", "gl", "299"],
                    ["Grenada", "gd", "1", 14, ["473"]],
                    ["Guadeloupe", "gp", "590", 0],
                    ["Guam", "gu", "1", 15, ["671"]],
                    ["Guatemala", "gt", "502"],
                    ["Guernsey", "gg", "44", 1, ["1481", "7781", "7839", "7911"]],
                    ["Guinea (Guin\xe9e)", "gn", "224"],
                    ["Guinea-Bissau (Guin\xe9 Bissau)", "gw", "245"],
                    ["Guyana", "gy", "592"],
                    ["Haiti", "ht", "509"],
                    ["Honduras", "hn", "504"],
                    ["Hong Kong (\u9999\u6E2F)", "hk", "852"],
                    ["Hungary (Magyarorsz\xe1g)", "hu", "36"],
                    ["Iceland (\xcdsland)", "is", "354"],
                    ["India (\u092D\u093E\u0930\u0924)", "in", "91"],
                    ["Indonesia", "id", "62"],
                    ["Iran (\u202B\u0627\u06CC\u0631\u0627\u0646\u202C\u200E)", "ir", "98"],
                    ["Iraq (\u202B\u0627\u0644\u0639\u0631\u0627\u0642\u202C\u200E)", "iq", "964"],
                    ["Ireland", "ie", "353"],
                    ["Isle of Man", "im", "44", 2, ["1624", "74576", "7524", "7924", "7624"]],
                    ["Israel (\u202B\u05D9\u05E9\u05E8\u05D0\u05DC\u202C\u200E)", "il", "972"],
                    ["Italy (Italia)", "it", "39", 0],
                    ["Jamaica", "jm", "1", 4, ["876", "658"]],
                    ["Japan (\u65E5\u672C)", "jp", "81"],
                    ["Jersey", "je", "44", 3, ["1534", "7509", "7700", "7797", "7829", "7937"]],
                    ["Jordan (\u202B\u0627\u0644\u0623\u0631\u062F\u0646\u202C\u200E)", "jo", "962"],
                    ["Kazakhstan (\u041A\u0430\u0437\u0430\u0445\u0441\u0442\u0430\u043D)", "kz", "7", 1, ["33", "7"]],
                    ["Kenya", "ke", "254"],
                    ["Kiribati", "ki", "686"],
                    ["Kosovo", "xk", "383"],
                    ["Kuwait (\u202B\u0627\u0644\u0643\u0648\u064A\u062A\u202C\u200E)", "kw", "965"],
                    ["Kyrgyzstan (\u041A\u044B\u0440\u0433\u044B\u0437\u0441\u0442\u0430\u043D)", "kg", "996"],
                    ["Laos (\u0EA5\u0EB2\u0EA7)", "la", "856"],
                    ["Latvia (Latvija)", "lv", "371"],
                    ["Lebanon (\u202B\u0644\u0628\u0646\u0627\u0646\u202C\u200E)", "lb", "961"],
                    ["Lesotho", "ls", "266"],
                    ["Liberia", "lr", "231"],
                    ["Libya (\u202B\u0644\u064A\u0628\u064A\u0627\u202C\u200E)", "ly", "218"],
                    ["Liechtenstein", "li", "423"],
                    ["Lithuania (Lietuva)", "lt", "370"],
                    ["Luxembourg", "lu", "352"],
                    ["Macau (\u6FB3\u9580)", "mo", "853"],
                    ["North Macedonia (\u041C\u0430\u043A\u0435\u0434\u043E\u043D\u0438\u0458\u0430)", "mk", "389"],
                    ["Madagascar (Madagasikara)", "mg", "261"],
                    ["Malawi", "mw", "265"],
                    ["Malaysia", "my", "60"],
                    ["Maldives", "mv", "960"],
                    ["Mali", "ml", "223"],
                    ["Malta", "mt", "356"],
                    ["Marshall Islands", "mh", "692"],
                    ["Martinique", "mq", "596"],
                    ["Mauritania (\u202B\u0645\u0648\u0631\u064A\u062A\u0627\u0646\u064A\u0627\u202C\u200E)", "mr", "222"],
                    ["Mauritius (Moris)", "mu", "230"],
                    ["Mayotte", "yt", "262", 1, ["269", "639"]],
                    ["Mexico (M\xe9xico)", "mx", "52"],
                    ["Micronesia", "fm", "691"],
                    ["Moldova (Republica Moldova)", "md", "373"],
                    ["Monaco", "mc", "377"],
                    ["Mongolia (\u041C\u043E\u043D\u0433\u043E\u043B)", "mn", "976"],
                    ["Montenegro (Crna Gora)", "me", "382"],
                    ["Montserrat", "ms", "1", 16, ["664"]],
                    ["Morocco (\u202B\u0627\u0644\u0645\u063A\u0631\u0628\u202C\u200E)", "ma", "212", 0],
                    ["Mozambique (Mo\xe7ambique)", "mz", "258"],
                    ["Myanmar (Burma) (\u1019\u103C\u1014\u103A\u1019\u102C)", "mm", "95"],
                    ["Namibia (Namibi\xeb)", "na", "264"],
                    ["Nauru", "nr", "674"],
                    ["Nepal (\u0928\u0947\u092A\u093E\u0932)", "np", "977"],
                    ["Netherlands (Nederland)", "nl", "31"],
                    ["New Caledonia (Nouvelle-Cal\xe9donie)", "nc", "687"],
                    ["New Zealand", "nz", "64"],
                    ["Nicaragua", "ni", "505"],
                    ["Niger (Nijar)", "ne", "227"],
                    ["Nigeria", "ng", "234"],
                    ["Niue", "nu", "683"],
                    ["Norfolk Island", "nf", "672"],
                    ["North Korea (\uC870\uC120 \uBBFC\uC8FC\uC8FC\uC758 \uC778\uBBFC \uACF5\uD654\uAD6D)", "kp", "850"],
                    ["Northern Mariana Islands", "mp", "1", 17, ["670"]],
                    ["Norway (Norge)", "no", "47", 0],
                    ["Oman (\u202B\u0639\u064F\u0645\u0627\u0646\u202C\u200E)", "om", "968"],
                    ["Pakistan (\u202B\u067E\u0627\u06A9\u0633\u062A\u0627\u0646\u202C\u200E)", "pk", "92"],
                    ["Palau", "pw", "680"],
                    ["Palestine (\u202B\u0641\u0644\u0633\u0637\u064A\u0646\u202C\u200E)", "ps", "970"],
                    ["Panama (Panam\xe1)", "pa", "507"],
                    ["Papua New Guinea", "pg", "675"],
                    ["Paraguay", "py", "595"],
                    ["Peru (Per\xfa)", "pe", "51"],
                    ["Philippines", "ph", "63"],
                    ["Poland (Polska)", "pl", "48"],
                    ["Portugal", "pt", "351"],
                    ["Puerto Rico", "pr", "1", 3, ["787", "939"]],
                    ["Qatar (\u202B\u0642\u0637\u0631\u202C\u200E)", "qa", "974"],
                    ["R\xe9union (La R\xe9union)", "re", "262", 0],
                    ["Romania (Rom\xe2nia)", "ro", "40"],
                    ["Russia (\u0420\u043E\u0441\u0441\u0438\u044F)", "ru", "7", 0],
                    ["Rwanda", "rw", "250"],
                    ["Saint Barth\xe9lemy", "bl", "590", 1],
                    ["Saint Helena", "sh", "290"],
                    ["Saint Kitts and Nevis", "kn", "1", 18, ["869"]],
                    ["Saint Lucia", "lc", "1", 19, ["758"]],
                    ["Saint Martin (Saint-Martin (partie fran\xe7aise))", "mf", "590", 2],
                    ["Saint Pierre and Miquelon (Saint-Pierre-et-Miquelon)", "pm", "508"],
                    ["Saint Vincent and the Grenadines", "vc", "1", 20, ["784"]],
                    ["Samoa", "ws", "685"],
                    ["San Marino", "sm", "378"],
                    ["S\xe3o Tom\xe9 and Pr\xedncipe (S\xe3o Tom\xe9 e Pr\xedncipe)", "st", "239"],
                    ["Saudi Arabia (\u202B\u0627\u0644\u0645\u0645\u0644\u0643\u0629 \u0627\u0644\u0639\u0631\u0628\u064A\u0629 \u0627\u0644\u0633\u0639\u0648\u062F\u064A\u0629\u202C\u200E)", "sa", "966"],
                    ["Senegal (S\xe9n\xe9gal)", "sn", "221"],
                    ["Serbia (\u0421\u0440\u0431\u0438\u0458\u0430)", "rs", "381"],
                    ["Seychelles", "sc", "248"],
                    ["Sierra Leone", "sl", "232"],
                    ["Singapore", "sg", "65"],
                    ["Sint Maarten", "sx", "1", 21, ["721"]],
                    ["Slovakia (Slovensko)", "sk", "421"],
                    ["Slovenia (Slovenija)", "si", "386"],
                    ["Solomon Islands", "sb", "677"],
                    ["Somalia (Soomaaliya)", "so", "252"],
                    ["South Africa", "za", "27"],
                    ["South Korea (\uB300\uD55C\uBBFC\uAD6D)", "kr", "82"],
                    ["South Sudan (\u202B\u062C\u0646\u0648\u0628 \u0627\u0644\u0633\u0648\u062F\u0627\u0646\u202C\u200E)", "ss", "211"],
                    ["Spain (Espa\xf1a)", "es", "34"],
                    ["Sri Lanka (\u0DC1\u0DCA\u200D\u0DBB\u0DD3 \u0DBD\u0D82\u0D9A\u0DCF\u0DC0)", "lk", "94"],
                    ["Sudan (\u202B\u0627\u0644\u0633\u0648\u062F\u0627\u0646\u202C\u200E)", "sd", "249"],
                    ["Suriname", "sr", "597"],
                    ["Svalbard and Jan Mayen", "sj", "47", 1, ["79"]],
                    ["Sweden (Sverige)", "se", "46"],
                    ["Switzerland (Schweiz)", "ch", "41"],
                    ["Syria (\u202B\u0633\u0648\u0631\u064A\u0627\u202C\u200E)", "sy", "963"],
                    ["Taiwan (\u53F0\u7063)", "tw", "886"],
                    ["Tajikistan", "tj", "992"],
                    ["Tanzania", "tz", "255"],
                    ["Thailand (\u0E44\u0E17\u0E22)", "th", "66"],
                    ["Timor-Leste", "tl", "670"],
                    ["Togo", "tg", "228"],
                    ["Tokelau", "tk", "690"],
                    ["Tonga", "to", "676"],
                    ["Trinidad and Tobago", "tt", "1", 22, ["868"]],
                    ["Tunisia (\u202B\u062A\u0648\u0646\u0633\u202C\u200E)", "tn", "216"],
                    ["Turkey (T\xfcrkiye)", "tr", "90"],
                    ["Turkmenistan", "tm", "993"],
                    ["Turks and Caicos Islands", "tc", "1", 23, ["649"]],
                    ["Tuvalu", "tv", "688"],
                    ["U.S. Virgin Islands", "vi", "1", 24, ["340"]],
                    ["Uganda", "ug", "256"],
                    ["Ukraine (\u0423\u043A\u0440\u0430\u0457\u043D\u0430)", "ua", "380"],
                    ["United Arab Emirates (\u202B\u0627\u0644\u0625\u0645\u0627\u0631\u0627\u062A \u0627\u0644\u0639\u0631\u0628\u064A\u0629 \u0627\u0644\u0645\u062A\u062D\u062F\u0629\u202C\u200E)", "ae", "971"],
                    ["United Kingdom", "gb", "44", 0],
                    ["United States", "us", "1", 0],
                    ["Uruguay", "uy", "598"],
                    ["Uzbekistan (O\u02BBzbekiston)", "uz", "998"],
                    ["Vanuatu", "vu", "678"],
                    ["Vatican City (Citt\xe0 del Vaticano)", "va", "39", 1, ["06698"]],
                    ["Venezuela", "ve", "58"],
                    ["Vietnam (Vi\u1EC7t Nam)", "vn", "84"],
                    ["Wallis and Futuna (Wallis-et-Futuna)", "wf", "681"],
                    ["Western Sahara (\u202B\u0627\u0644\u0635\u062D\u0631\u0627\u0621 \u0627\u0644\u063A\u0631\u0628\u064A\u0629\u202C\u200E)", "eh", "212", 1, ["5288", "5289"]],
                    ["Yemen (\u202B\u0627\u0644\u064A\u0645\u0646\u202C\u200E)", "ye", "967"],
                    ["Zambia", "zm", "260"],
                    ["Zimbabwe", "zw", "263"],
                    ["\xc5land Islands", "ax", "358", 1, ["18"]],
                ],
                d = 0;
            d < e.length;
            d++
        ) {
            var b = e[d];
            e[d] = { name: b[0], iso2: b[1], dialCode: b[2], priority: b[3] || 0, areaCodes: b[4] || null };
        }
        function g(d, c) {
            for (var b = 0; b < c.length; b++) {
                var a = c[b];
                (a.enumerable = a.enumerable || !1), (a.configurable = !0), "value" in a && (a.writable = !0), Object.defineProperty(d, a.key, a);
            }
        }
        var c = {
            getInstance: function (a) {
                var b = a.getAttribute("data-intl-tel-input-id");
                return window.intlTelInputGlobals.instances[b];
            },
            instances: {},
            documentReady: function () {
                return "complete" === document.readyState;
            },
        };
        "object" == typeof window && (window.intlTelInputGlobals = c);
        var h = 0,
            f = {
                allowDropdown: !0,
                autoHideDialCode: !0,
                autoPlaceholder: "polite",
                customContainer: "",
                customPlaceholder: null,
                dropdownContainer: null,
                excludeCountries: [],
                formatOnDisplay: !0,
                geoIpLookup: null,
                hiddenInput: "",
                initialCountry: "",
                localizedCountries: null,
                nationalMode: !0,
                onlyCountries: [],
                placeholderNumberType: "MOBILE",
                preferredCountries: ["us", "gb"],
                separateDialCode: !1,
                utilsScript: "",
            },
            i = ["800", "822", "833", "844", "855", "866", "877", "880", "881", "882", "883", "884", "885", "886", "887", "888", "889"],
            j = function (c, d) {
                for (var b = Object.keys(c), a = 0; a < b.length; a++) d(b[a], c[b[a]]);
            },
            k = function (a) {
                j(window.intlTelInputGlobals.instances, function (b) {
                    window.intlTelInputGlobals.instances[b][a]();
                });
            },
            l = (function () {
                var b, c, d;
                function l(a, b) {
                    var c = this;
                    !(function (a, b) {
                        if (!(a instanceof b)) throw new TypeError("Cannot call a class as a function");
                    })(this, l),
                        (this.id = h++),
                        (this.telInput = a),
                        (this.activeItem = null),
                        (this.highlightedItem = null);
                    var d = b || {};
                    (this.options = {}),
                        j(f, function (a, b) {
                            c.options[a] = d.hasOwnProperty(a) ? d[a] : b;
                        }),
                        (this.hadInitialPlaceholder = Boolean(a.getAttribute("placeholder")));
                }
                return (
                    (b = l),
                    (c = [
                        {
                            key: "_init",
                            value: function () {
                                var c = this;
                                if (
                                    (this.options.nationalMode && (this.options.autoHideDialCode = !1),
                                    this.options.separateDialCode && (this.options.autoHideDialCode = this.options.nationalMode = !1),
                                    (this.isMobile = /Android.+Mobile|webOS|iPhone|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)),
                                    this.isMobile && (document.body.classList.add("iti-mobile"), this.options.dropdownContainer || (this.options.dropdownContainer = document.body)),
                                    "undefined" != typeof Promise)
                                ) {
                                    var a = new Promise(function (a, b) {
                                            (c.resolveAutoCountryPromise = a), (c.rejectAutoCountryPromise = b);
                                        }),
                                        b = new Promise(function (a, b) {
                                            (c.resolveUtilsScriptPromise = a), (c.rejectUtilsScriptPromise = b);
                                        });
                                    this.promise = Promise.all([a, b]);
                                } else (this.resolveAutoCountryPromise = this.rejectAutoCountryPromise = function () {}), (this.resolveUtilsScriptPromise = this.rejectUtilsScriptPromise = function () {});
                                (this.selectedCountryData = {}), this._processCountryData(), this._generateMarkup(), this._setInitialState(), this._initListeners(), this._initRequests();
                            },
                        },
                        {
                            key: "_processCountryData",
                            value: function () {
                                this._processAllCountries(),
                                    this._processCountryCodes(),
                                    this._processPreferredCountries(),
                                    this.options.localizedCountries && this._translateCountriesByLocale(),
                                    (this.options.onlyCountries.length || this.options.localizedCountries) && this.countries.sort(this._countryNameSort);
                            },
                        },
                        {
                            key: "_addCountryCode",
                            value: function (d, b, e) {
                                b.length > this.countryCodeMaxLen && (this.countryCodeMaxLen = b.length), this.countryCodes.hasOwnProperty(b) || (this.countryCodes[b] = []);
                                for (var c = 0; c < this.countryCodes[b].length; c++) if (this.countryCodes[b][c] === d) return;
                                var f = e !== a ? e : this.countryCodes[b].length;
                                this.countryCodes[b][f] = d;
                            },
                        },
                        {
                            key: "_processAllCountries",
                            value: function () {
                                if (this.options.onlyCountries.length) {
                                    var a = this.options.onlyCountries.map(function (a) {
                                        return a.toLowerCase();
                                    });
                                    this.countries = e.filter(function (b) {
                                        return a.indexOf(b.iso2) > -1;
                                    });
                                } else if (this.options.excludeCountries.length) {
                                    var b = this.options.excludeCountries.map(function (a) {
                                        return a.toLowerCase();
                                    });
                                    this.countries = e.filter(function (a) {
                                        return -1 === b.indexOf(a.iso2);
                                    });
                                } else this.countries = e;
                            },
                        },
                        {
                            key: "_translateCountriesByLocale",
                            value: function () {
                                for (var a = 0; a < this.countries.length; a++) {
                                    var b = this.countries[a].iso2.toLowerCase();
                                    this.options.localizedCountries.hasOwnProperty(b) && (this.countries[a].name = this.options.localizedCountries[b]);
                                }
                            },
                        },
                        {
                            key: "_countryNameSort",
                            value: function (a, b) {
                                return a.name.localeCompare(b.name);
                            },
                        },
                        {
                            key: "_processCountryCodes",
                            value: function () {
                                (this.countryCodeMaxLen = 0), (this.dialCodes = {}), (this.countryCodes = {});
                                for (var c = 0; c < this.countries.length; c++) {
                                    var b = this.countries[c];
                                    this.dialCodes[b.dialCode] || (this.dialCodes[b.dialCode] = !0), this._addCountryCode(b.iso2, b.dialCode, b.priority);
                                }
                                for (var d = 0; d < this.countries.length; d++) {
                                    var a = this.countries[d];
                                    if (a.areaCodes)
                                        for (var i = this.countryCodes[a.dialCode][0], e = 0; e < a.areaCodes.length; e++) {
                                            for (var f = a.areaCodes[e], g = 1; g < f.length; g++) {
                                                var h = a.dialCode + f.substr(0, g);
                                                this._addCountryCode(i, h), this._addCountryCode(a.iso2, h);
                                            }
                                            this._addCountryCode(a.iso2, a.dialCode + f);
                                        }
                                }
                            },
                        },
                        {
                            key: "_processPreferredCountries",
                            value: function () {
                                this.preferredCountries = [];
                                for (var a = 0; a < this.options.preferredCountries.length; a++) {
                                    var c = this.options.preferredCountries[a].toLowerCase(),
                                        b = this._getCountryData(c, !1, !0);
                                    b && this.preferredCountries.push(b);
                                }
                            },
                        },
                        {
                            key: "_createEl",
                            value: function (d, a, b) {
                                var c = document.createElement(d);
                                return (
                                    a &&
                                        j(a, function (a, b) {
                                            return c.setAttribute(a, b);
                                        }),
                                    b && b.appendChild(c),
                                    c
                                );
                            },
                        },
                        {
                            key: "_generateMarkup",
                            value: function () {
                                this.telInput.hasAttribute("autocomplete") || (this.telInput.form && this.telInput.form.hasAttribute("autocomplete")) || this.telInput.setAttribute("autocomplete", "off");
                                var a = "iti";
                                this.options.allowDropdown && (a += " iti--allow-dropdown"),
                                    this.options.separateDialCode && (a += " iti--separate-dial-code"),
                                    this.options.customContainer && ((a += " "), (a += this.options.customContainer));
                                var b = this._createEl("div", { class: a });
                                if (
                                    (this.telInput.parentNode.insertBefore(b, this.telInput),
                                    (this.flagsContainer = this._createEl("div", { class: "iti__flag-container" }, b)),
                                    b.appendChild(this.telInput),
                                    (this.selectedFlag = this._createEl(
                                        "div",
                                        { class: "iti__selected-flag", role: "combobox", "aria-controls": "iti-".concat(this.id, "__country-listbox"), "aria-owns": "iti-".concat(this.id, "__country-listbox"), "aria-expanded": "false" },
                                        this.flagsContainer
                                    )),
                                    (this.selectedFlagInner = this._createEl("div", { class: "iti__flag" }, this.selectedFlag)),
                                    this.options.separateDialCode && (this.selectedDialCode = this._createEl("div", { class: "iti__selected-dial-code" }, this.selectedFlag)),
                                    this.options.allowDropdown &&
                                        (this.selectedFlag.setAttribute("tabindex", "0"),
                                        (this.dropdownArrow = this._createEl("div", { class: "iti__arrow" }, this.selectedFlag)),
                                        (this.countryList = this._createEl("ul", { class: "iti__country-list iti__hide", id: "iti-".concat(this.id, "__country-listbox"), role: "listbox", "aria-label": "List of countries" })),
                                        this.preferredCountries.length &&
                                            (this._appendListItems(this.preferredCountries, "iti__preferred", !0), this._createEl("li", { class: "iti__divider", role: "separator", "aria-disabled": "true" }, this.countryList)),
                                        this._appendListItems(this.countries, "iti__standard"),
                                        this.options.dropdownContainer
                                            ? ((this.dropdown = this._createEl("div", { class: "iti iti--container" })), this.dropdown.appendChild(this.countryList))
                                            : this.flagsContainer.appendChild(this.countryList)),
                                    this.options.hiddenInput)
                                ) {
                                    var c = this.options.hiddenInput,
                                        d = this.telInput.getAttribute("name");
                                    if (d) {
                                        var e = d.lastIndexOf("[");
                                        -1 !== e && (c = "".concat(d.substr(0, e), "[").concat(c, "]"));
                                    }
                                    (this.hiddenInput = this._createEl("input", { type: "hidden", name: c })), b.appendChild(this.hiddenInput);
                                }
                            },
                        },
                        {
                            key: "_appendListItems",
                            value: function (d, e, f) {
                                for (var a = "", c = 0; c < d.length; c++) {
                                    var b = d[c],
                                        g = f ? "-preferred" : "";
                                    (a += "<li class='iti__country "
                                        .concat(e, "' tabIndex='-1' id='iti-")
                                        .concat(this.id, "__item-")
                                        .concat(b.iso2)
                                        .concat(g, "' role='option' data-dial-code='")
                                        .concat(b.dialCode, "' data-country-code='")
                                        .concat(b.iso2, "' aria-selected='false'>")),
                                        (a += "<div class='iti__flag-box'><div class='iti__flag iti__".concat(b.iso2, "'></div></div>")),
                                        (a += "<span class='iti__country-name'>".concat(b.name, "</span>")),
                                        (a += "<span class='iti__dial-code'>+".concat(b.dialCode, "</span>")),
                                        (a += "</li>");
                                }
                                this.countryList.insertAdjacentHTML("beforeend", a);
                            },
                        },
                        {
                            key: "_setInitialState",
                            value: function () {
                                var c = this.telInput.getAttribute("value"),
                                    d = this.telInput.value,
                                    a = c && "+" === c.charAt(0) && (!d || "+" !== d.charAt(0)) ? c : d,
                                    f = this._getDialCode(a),
                                    g = this._isRegionlessNanp(a),
                                    b = this.options,
                                    e = b.initialCountry,
                                    h = b.nationalMode,
                                    i = b.autoHideDialCode,
                                    j = b.separateDialCode;
                                f && !g
                                    ? this._updateFlagFromNumber(a)
                                    : "auto" === e ||
                                      (e
                                          ? this._setFlag(e.toLowerCase())
                                          : f && g
                                          ? this._setFlag("us")
                                          : ((this.defaultCountry = this.preferredCountries.length ? this.preferredCountries[0].iso2 : this.countries[0].iso2), a || this._setFlag(this.defaultCountry)),
                                      a || h || i || j || (this.telInput.value = "+".concat(this.selectedCountryData.dialCode))),
                                    a && this._updateValFromNumber(a);
                            },
                        },
                        {
                            key: "_initListeners",
                            value: function () {
                                this._initKeyListeners(), this.options.autoHideDialCode && this._initBlurListeners(), this.options.allowDropdown && this._initDropdownListeners(), this.hiddenInput && this._initHiddenInputListener();
                            },
                        },
                        {
                            key: "_initHiddenInputListener",
                            value: function () {
                                var a = this;
                                (this._handleHiddenInputSubmit = function () {
                                    a.hiddenInput.value = a.getNumber();
                                }),
                                    this.telInput.form && this.telInput.form.addEventListener("submit", this._handleHiddenInputSubmit);
                            },
                        },
                        {
                            key: "_getClosestLabel",
                            value: function () {
                                for (var a = this.telInput; a && "LABEL" !== a.tagName; ) a = a.parentNode;
                                return a;
                            },
                        },
                        {
                            key: "_initDropdownListeners",
                            value: function () {
                                var b = this;
                                this._handleLabelClick = function (a) {
                                    b.countryList.classList.contains("iti__hide") ? b.telInput.focus() : a.preventDefault();
                                };
                                var a = this._getClosestLabel();
                                a && a.addEventListener("click", this._handleLabelClick),
                                    (this._handleClickSelectedFlag = function () {
                                        !b.countryList.classList.contains("iti__hide") || b.telInput.disabled || b.telInput.readOnly || b._showDropdown();
                                    }),
                                    this.selectedFlag.addEventListener("click", this._handleClickSelectedFlag),
                                    (this._handleFlagsContainerKeydown = function (a) {
                                        b.countryList.classList.contains("iti__hide") && -1 !== ["ArrowUp", "Up", "ArrowDown", "Down", " ", "Enter"].indexOf(a.key) && (a.preventDefault(), a.stopPropagation(), b._showDropdown()),
                                            "Tab" === a.key && b._closeDropdown();
                                    }),
                                    this.flagsContainer.addEventListener("keydown", this._handleFlagsContainerKeydown);
                            },
                        },
                        {
                            key: "_initRequests",
                            value: function () {
                                var a = this;
                                this.options.utilsScript && !window.intlTelInputUtils
                                    ? window.intlTelInputGlobals.documentReady()
                                        ? window.intlTelInputGlobals.loadUtils(this.options.utilsScript)
                                        : window.addEventListener("load", function () {
                                              window.intlTelInputGlobals.loadUtils(a.options.utilsScript);
                                          })
                                    : this.resolveUtilsScriptPromise(),
                                    "auto" === this.options.initialCountry ? this._loadAutoCountry() : this.resolveAutoCountryPromise();
                            },
                        },
                        {
                            key: "_loadAutoCountry",
                            value: function () {
                                window.intlTelInputGlobals.autoCountry
                                    ? this.handleAutoCountry()
                                    : window.intlTelInputGlobals.startedLoadingAutoCountry ||
                                      ((window.intlTelInputGlobals.startedLoadingAutoCountry = !0),
                                      "function" == typeof this.options.geoIpLookup &&
                                          this.options.geoIpLookup(
                                              function (a) {
                                                  (window.intlTelInputGlobals.autoCountry = a.toLowerCase()),
                                                      setTimeout(function () {
                                                          return k("handleAutoCountry");
                                                      });
                                              },
                                              function () {
                                                  return k("rejectAutoCountryPromise");
                                              }
                                          ));
                            },
                        },
                        {
                            key: "_initKeyListeners",
                            value: function () {
                                var a = this;
                                (this._handleKeyupEvent = function () {
                                    a._updateFlagFromNumber(a.telInput.value) && a._triggerCountryChange();
                                }),
                                    this.telInput.addEventListener("keyup", this._handleKeyupEvent),
                                    (this._handleClipboardEvent = function () {
                                        setTimeout(a._handleKeyupEvent);
                                    }),
                                    this.telInput.addEventListener("cut", this._handleClipboardEvent),
                                    this.telInput.addEventListener("paste", this._handleClipboardEvent);
                            },
                        },
                        {
                            key: "_cap",
                            value: function (a) {
                                var b = this.telInput.getAttribute("maxlength");
                                return b && a.length > b ? a.substr(0, b) : a;
                            },
                        },
                        {
                            key: "_initBlurListeners",
                            value: function () {
                                var a = this;
                                (this._handleSubmitOrBlurEvent = function () {
                                    a._removeEmptyDialCode();
                                }),
                                    this.telInput.form && this.telInput.form.addEventListener("submit", this._handleSubmitOrBlurEvent),
                                    this.telInput.addEventListener("blur", this._handleSubmitOrBlurEvent);
                            },
                        },
                        {
                            key: "_removeEmptyDialCode",
                            value: function () {
                                if ("+" === this.telInput.value.charAt(0)) {
                                    var a = this._getNumeric(this.telInput.value);
                                    (a && this.selectedCountryData.dialCode !== a) || (this.telInput.value = "");
                                }
                            },
                        },
                        {
                            key: "_getNumeric",
                            value: function (a) {
                                return a.replace(/\D/g, "");
                            },
                        },
                        {
                            key: "_trigger",
                            value: function (b) {
                                var a = document.createEvent("Event");
                                a.initEvent(b, !0, !0), this.telInput.dispatchEvent(a);
                            },
                        },
                        {
                            key: "_showDropdown",
                            value: function () {
                                this.countryList.classList.remove("iti__hide"),
                                    this.selectedFlag.setAttribute("aria-expanded", "true"),
                                    this._setDropdownPosition(),
                                    this.activeItem && (this._highlightListItem(this.activeItem, !1), this._scrollTo(this.activeItem, !0)),
                                    this._bindDropdownListeners(),
                                    this.dropdownArrow.classList.add("iti__arrow--up"),
                                    this._trigger("open:countrydropdown");
                            },
                        },
                        {
                            key: "_toggleClass",
                            value: function (a, b, c) {
                                c && !a.classList.contains(b) ? a.classList.add(b) : !c && a.classList.contains(b) && a.classList.remove(b);
                            },
                        },
                        {
                            key: "_setDropdownPosition",
                            value: function () {
                                var h = this;
                                if ((this.options.dropdownContainer && this.options.dropdownContainer.appendChild(this.dropdown), !this.isMobile)) {
                                    var c = this.telInput.getBoundingClientRect(),
                                        a = window.pageYOffset || document.documentElement.scrollTop,
                                        b = c.top + a,
                                        d = this.countryList.offsetHeight,
                                        e = b + this.telInput.offsetHeight + d < a + window.innerHeight,
                                        f = b - d > a;
                                    if ((this._toggleClass(this.countryList, "iti__country-list--dropup", !e && f), this.options.dropdownContainer)) {
                                        var g = !e && f ? 0 : this.telInput.offsetHeight;
                                        (this.dropdown.style.top = "".concat(b + g, "px")),
                                            (this.dropdown.style.left = "".concat(c.left + document.body.scrollLeft, "px")),
                                            (this._handleWindowScroll = function () {
                                                return h._closeDropdown();
                                            }),
                                            window.addEventListener("scroll", this._handleWindowScroll);
                                    }
                                }
                            },
                        },
                        {
                            key: "_getClosestListItem",
                            value: function (b) {
                                for (var a = b; a && a !== this.countryList && !a.classList.contains("iti__country"); ) a = a.parentNode;
                                return a === this.countryList ? null : a;
                            },
                        },
                        {
                            key: "_bindDropdownListeners",
                            value: function () {
                                var a = this;
                                (this._handleMouseoverCountryList = function (c) {
                                    var b = a._getClosestListItem(c.target);
                                    b && a._highlightListItem(b, !1);
                                }),
                                    this.countryList.addEventListener("mouseover", this._handleMouseoverCountryList),
                                    (this._handleClickCountryList = function (c) {
                                        var b = a._getClosestListItem(c.target);
                                        b && a._selectListItem(b);
                                    }),
                                    this.countryList.addEventListener("click", this._handleClickCountryList);
                                var b = !0;
                                (this._handleClickOffToClose = function () {
                                    b || a._closeDropdown(), (b = !1);
                                }),
                                    document.documentElement.addEventListener("click", this._handleClickOffToClose);
                                var c = "",
                                    d = null;
                                (this._handleKeydownOnDropdown = function (b) {
                                    b.preventDefault(),
                                        "ArrowUp" === b.key || "Up" === b.key || "ArrowDown" === b.key || "Down" === b.key
                                            ? a._handleUpDownKey(b.key)
                                            : "Enter" === b.key
                                            ? a._handleEnterKey()
                                            : "Escape" === b.key
                                            ? a._closeDropdown()
                                            : /^[a-zA-ZÀ-ÿа-яА-Я ]$/.test(b.key) &&
                                              (d && clearTimeout(d),
                                              (c += b.key.toLowerCase()),
                                              a._searchForCountry(c),
                                              (d = setTimeout(function () {
                                                  c = "";
                                              }, 1e3)));
                                }),
                                    document.addEventListener("keydown", this._handleKeydownOnDropdown);
                            },
                        },
                        {
                            key: "_handleUpDownKey",
                            value: function (b) {
                                var a = "ArrowUp" === b || "Up" === b ? this.highlightedItem.previousElementSibling : this.highlightedItem.nextElementSibling;
                                a && (a.classList.contains("iti__divider") && (a = "ArrowUp" === b || "Up" === b ? a.previousElementSibling : a.nextElementSibling), this._highlightListItem(a, !0));
                            },
                        },
                        {
                            key: "_handleEnterKey",
                            value: function () {
                                this.highlightedItem && this._selectListItem(this.highlightedItem);
                            },
                        },
                        {
                            key: "_searchForCountry",
                            value: function (c) {
                                for (var a = 0; a < this.countries.length; a++)
                                    if (this._startsWith(this.countries[a].name, c)) {
                                        var b = this.countryList.querySelector("#iti-".concat(this.id, "__item-").concat(this.countries[a].iso2));
                                        this._highlightListItem(b, !1), this._scrollTo(b, !0);
                                        break;
                                    }
                            },
                        },
                        {
                            key: "_startsWith",
                            value: function (b, a) {
                                return b.substr(0, a.length).toLowerCase() === a;
                            },
                        },
                        {
                            key: "_updateValFromNumber",
                            value: function (c) {
                                var a = c;
                                if (this.options.formatOnDisplay && window.intlTelInputUtils && this.selectedCountryData) {
                                    var d = !this.options.separateDialCode && (this.options.nationalMode || "+" !== a.charAt(0)),
                                        b = intlTelInputUtils.numberFormat,
                                        e = b.NATIONAL,
                                        f = b.INTERNATIONAL,
                                        g = d ? e : f;
                                    a = intlTelInputUtils.formatNumber(a, this.selectedCountryData.iso2, g);
                                }
                                (a = this._beforeSetNumber(a)), (this.telInput.value = a);
                            },
                        },
                        {
                            key: "_updateFlagFromNumber",
                            value: function (h) {
                                var a = h,
                                    c = this.selectedCountryData.dialCode;
                                a && this.options.nationalMode && "1" === c && "+" !== a.charAt(0) && ("1" !== a.charAt(0) && (a = "1".concat(a)), (a = "+".concat(a))),
                                    this.options.separateDialCode && c && "+" !== a.charAt(0) && (a = "+".concat(c).concat(a));
                                var f = this._getDialCode(a, !0),
                                    g = this._getNumeric(a),
                                    b = null;
                                if (f) {
                                    var d = this.countryCodes[this._getNumeric(f)],
                                        i = -1 !== d.indexOf(this.selectedCountryData.iso2) && g.length <= f.length - 1;
                                    if (!("1" === c && this._isRegionlessNanp(g)) && !i) {
                                        for (var e = 0; e < d.length; e++)
                                            if (d[e]) {
                                                b = d[e];
                                                break;
                                            }
                                    }
                                } else "+" === a.charAt(0) && g.length ? (b = "") : (a && "+" !== a) || (b = this.defaultCountry);
                                return null !== b && this._setFlag(b);
                            },
                        },
                        {
                            key: "_isRegionlessNanp",
                            value: function (b) {
                                var a = this._getNumeric(b);
                                if ("1" === a.charAt(0)) {
                                    var c = a.substr(1, 3);
                                    return -1 !== i.indexOf(c);
                                }
                                return !1;
                            },
                        },
                        {
                            key: "_highlightListItem",
                            value: function (b, c) {
                                var a = this.highlightedItem;
                                a && a.classList.remove("iti__highlight"), (this.highlightedItem = b), this.highlightedItem.classList.add("iti__highlight"), c && this.highlightedItem.focus();
                            },
                        },
                        {
                            key: "_getCountryData",
                            value: function (c, d, f) {
                                for (var b = d ? e : this.countries, a = 0; a < b.length; a++) if (b[a].iso2 === c) return b[a];
                                if (f) return null;
                                throw new Error("No country data for '".concat(c, "'"));
                            },
                        },
                        {
                            key: "_setFlag",
                            value: function (a) {
                                var d = this.selectedCountryData.iso2 ? this.selectedCountryData : {};
                                (this.selectedCountryData = a ? this._getCountryData(a, !1, !1) : {}),
                                    this.selectedCountryData.iso2 && (this.defaultCountry = this.selectedCountryData.iso2),
                                    this.selectedFlagInner.setAttribute("class", "iti__flag iti__".concat(a));
                                var e = a ? "".concat(this.selectedCountryData.name, ": +").concat(this.selectedCountryData.dialCode) : "Unknown";
                                if ((this.selectedFlag.setAttribute("title", e), this.options.separateDialCode)) {
                                    var f = this.selectedCountryData.dialCode ? "+".concat(this.selectedCountryData.dialCode) : "";
                                    this.selectedDialCode.innerHTML = f;
                                    var g = this.selectedFlag.offsetWidth || this._getHiddenSelectedFlagWidth();
                                    this.telInput.style.paddingLeft = "".concat(g + 6, "px");
                                }
                                if ((this._updatePlaceholder(), this.options.allowDropdown)) {
                                    var c = this.activeItem;
                                    if ((c && (c.classList.remove("iti__active"), c.setAttribute("aria-selected", "false")), a)) {
                                        var b = this.countryList.querySelector("#iti-".concat(this.id, "__item-").concat(a, "-preferred")) || this.countryList.querySelector("#iti-".concat(this.id, "__item-").concat(a));
                                        b.setAttribute("aria-selected", "true"), b.classList.add("iti__active"), (this.activeItem = b), this.selectedFlag.setAttribute("aria-activedescendant", b.getAttribute("id"));
                                    }
                                }
                                return d.iso2 !== a;
                            },
                        },
                        {
                            key: "_getHiddenSelectedFlagWidth",
                            value: function () {
                                var a = this.telInput.parentNode.cloneNode();
                                (a.style.visibility = "hidden"), document.body.appendChild(a);
                                var b = this.flagsContainer.cloneNode();
                                a.appendChild(b);
                                var c = this.selectedFlag.cloneNode(!0);
                                b.appendChild(c);
                                var d = c.offsetWidth;
                                return a.parentNode.removeChild(a), d;
                            },
                        },
                        {
                            key: "_updatePlaceholder",
                            value: function () {
                                var b = "aggressive" === this.options.autoPlaceholder || (!this.hadInitialPlaceholder && "polite" === this.options.autoPlaceholder);
                                if (window.intlTelInputUtils && b) {
                                    var c = intlTelInputUtils.numberType[this.options.placeholderNumberType],
                                        a = this.selectedCountryData.iso2 ? intlTelInputUtils.getExampleNumber(this.selectedCountryData.iso2, this.options.nationalMode, c) : "";
                                    (a = this._beforeSetNumber(a)), "function" == typeof this.options.customPlaceholder && (a = this.options.customPlaceholder(a, this.selectedCountryData)), this.telInput.setAttribute("placeholder", a);
                                }
                            },
                        },
                        {
                            key: "_selectListItem",
                            value: function (a) {
                                var c = this._setFlag(a.getAttribute("data-country-code"));
                                this._closeDropdown(), this._updateDialCode(a.getAttribute("data-dial-code"), !0), this.telInput.focus();
                                var b = this.telInput.value.length;
                                this.telInput.setSelectionRange(b, b), c && this._triggerCountryChange();
                            },
                        },
                        {
                            key: "_closeDropdown",
                            value: function () {
                                this.countryList.classList.add("iti__hide"),
                                    this.selectedFlag.setAttribute("aria-expanded", "false"),
                                    this.dropdownArrow.classList.remove("iti__arrow--up"),
                                    document.removeEventListener("keydown", this._handleKeydownOnDropdown),
                                    document.documentElement.removeEventListener("click", this._handleClickOffToClose),
                                    this.countryList.removeEventListener("mouseover", this._handleMouseoverCountryList),
                                    this.countryList.removeEventListener("click", this._handleClickCountryList),
                                    this.options.dropdownContainer && (this.isMobile || window.removeEventListener("scroll", this._handleWindowScroll), this.dropdown.parentNode && this.dropdown.parentNode.removeChild(this.dropdown)),
                                    this._trigger("close:countrydropdown");
                            },
                        },
                        {
                            key: "_scrollTo",
                            value: function (g, h) {
                                var a = this.countryList,
                                    i = window.pageYOffset || document.documentElement.scrollTop,
                                    c = a.offsetHeight,
                                    d = a.getBoundingClientRect().top + i,
                                    e = g.offsetHeight,
                                    f = g.getBoundingClientRect().top + i,
                                    b = f - d + a.scrollTop,
                                    j = c / 2 - e / 2;
                                if (f < d) h && (b -= j), (a.scrollTop = b);
                                else if (f + e > d + c) {
                                    h && (b += j);
                                    var k = c - e;
                                    a.scrollTop = b - k;
                                }
                            },
                        },
                        {
                            key: "_updateDialCode",
                            value: function (e, f) {
                                var b,
                                    a = this.telInput.value,
                                    c = "+".concat(e);
                                if ("+" === a.charAt(0)) {
                                    var d = this._getDialCode(a);
                                    b = d ? a.replace(d, c) : c;
                                } else if (this.options.nationalMode || this.options.separateDialCode) return;
                                else if (a) b = c + a;
                                else {
                                    if (!f && this.options.autoHideDialCode) return;
                                    b = c;
                                }
                                this.telInput.value = b;
                            },
                        },
                        {
                            key: "_getDialCode",
                            value: function (a, f) {
                                var d = "";
                                if ("+" === a.charAt(0))
                                    for (var c = "", b = 0; b < a.length; b++) {
                                        var e = a.charAt(b);
                                        if (!isNaN(parseInt(e, 10))) {
                                            if (((c += e), f)) this.countryCodes[c] && (d = a.substr(0, b + 1));
                                            else if (this.dialCodes[c]) {
                                                d = a.substr(0, b + 1);
                                                break;
                                            }
                                            if (c.length === this.countryCodeMaxLen) break;
                                        }
                                    }
                                return d;
                            },
                        },
                        {
                            key: "_getFullNumber",
                            value: function () {
                                var a = this.telInput.value.trim(),
                                    b = this.selectedCountryData.dialCode,
                                    c = this._getNumeric(a);
                                return (this.options.separateDialCode && "+" !== a.charAt(0) && b && c ? "+".concat(b) : "") + a;
                            },
                        },
                        {
                            key: "_beforeSetNumber",
                            value: function (c) {
                                var a = c;
                                if (this.options.separateDialCode) {
                                    var b = this._getDialCode(a);
                                    if (b) {
                                        var d = " " === a[(b = "+".concat(this.selectedCountryData.dialCode)).length] || "-" === a[b.length] ? b.length + 1 : b.length;
                                        a = a.substr(d);
                                    }
                                }
                                return this._cap(a);
                            },
                        },
                        {
                            key: "_triggerCountryChange",
                            value: function () {
                                this._trigger("countrychange");
                            },
                        },
                        {
                            key: "handleAutoCountry",
                            value: function () {
                                "auto" === this.options.initialCountry && ((this.defaultCountry = window.intlTelInputGlobals.autoCountry), this.telInput.value || this.setCountry(this.defaultCountry), this.resolveAutoCountryPromise());
                            },
                        },
                        {
                            key: "handleUtils",
                            value: function () {
                                window.intlTelInputUtils && (this.telInput.value && this._updateValFromNumber(this.telInput.value), this._updatePlaceholder()), this.resolveUtilsScriptPromise();
                            },
                        },
                        {
                            key: "destroy",
                            value: function () {
                                var a = this.telInput.form;
                                if (this.options.allowDropdown) {
                                    this._closeDropdown(), this.selectedFlag.removeEventListener("click", this._handleClickSelectedFlag), this.flagsContainer.removeEventListener("keydown", this._handleFlagsContainerKeydown);
                                    var c = this._getClosestLabel();
                                    c && c.removeEventListener("click", this._handleLabelClick);
                                }
                                this.hiddenInput && a && a.removeEventListener("submit", this._handleHiddenInputSubmit),
                                    this.options.autoHideDialCode && (a && a.removeEventListener("submit", this._handleSubmitOrBlurEvent), this.telInput.removeEventListener("blur", this._handleSubmitOrBlurEvent)),
                                    this.telInput.removeEventListener("keyup", this._handleKeyupEvent),
                                    this.telInput.removeEventListener("cut", this._handleClipboardEvent),
                                    this.telInput.removeEventListener("paste", this._handleClipboardEvent),
                                    this.telInput.removeAttribute("data-intl-tel-input-id");
                                var b = this.telInput.parentNode;
                                b.parentNode.insertBefore(this.telInput, b), b.parentNode.removeChild(b), delete window.intlTelInputGlobals.instances[this.id];
                            },
                        },
                        {
                            key: "getExtension",
                            value: function () {
                                return window.intlTelInputUtils ? intlTelInputUtils.getExtension(this._getFullNumber(), this.selectedCountryData.iso2) : "";
                            },
                        },
                        {
                            key: "getNumber",
                            value: function (a) {
                                if (window.intlTelInputUtils) {
                                    var b = this.selectedCountryData.iso2;
                                    return intlTelInputUtils.formatNumber(this._getFullNumber(), b, a);
                                }
                                return "";
                            },
                        },
                        {
                            key: "getNumberType",
                            value: function () {
                                return window.intlTelInputUtils ? intlTelInputUtils.getNumberType(this._getFullNumber(), this.selectedCountryData.iso2) : -99;
                            },
                        },
                        {
                            key: "getSelectedCountryData",
                            value: function () {
                                return this.selectedCountryData;
                            },
                        },
                        {
                            key: "getValidationError",
                            value: function () {
                                if (window.intlTelInputUtils) {
                                    var a = this.selectedCountryData.iso2;
                                    return intlTelInputUtils.getValidationError(this._getFullNumber(), a);
                                }
                                return -99;
                            },
                        },
                        {
                            key: "isValidNumber",
                            value: function () {
                                var a = this._getFullNumber().trim(),
                                    b = this.options.nationalMode ? this.selectedCountryData.iso2 : "";
                                return window.intlTelInputUtils ? intlTelInputUtils.isValidNumber(a, b) : null;
                            },
                        },
                        {
                            key: "setCountry",
                            value: function (b) {
                                var a = b.toLowerCase();
                                this.selectedFlagInner.classList.contains("iti__".concat(a)) || (this._setFlag(a), this._updateDialCode(this.selectedCountryData.dialCode, !1), this._triggerCountryChange());
                            },
                        },
                        {
                            key: "setNumber",
                            value: function (a) {
                                var b = this._updateFlagFromNumber(a);
                                this._updateValFromNumber(a), b && this._triggerCountryChange();
                            },
                        },
                        {
                            key: "setPlaceholderNumberType",
                            value: function (a) {
                                (this.options.placeholderNumberType = a), this._updatePlaceholder();
                            },
                        },
                    ]),
                    g(b.prototype, c),
                    d && g(b, d),
                    l
                );
            })();
        c.getCountryData = function () {
            return e;
        };
        var m = function (b, c, d) {
            var a = document.createElement("script");
            (a.onload = function () {
                k("handleUtils"), c && c();
            }),
                (a.onerror = function () {
                    k("rejectUtilsScriptPromise"), d && d();
                }),
                (a.className = "iti-load-utils"),
                (a.async = !0),
                (a.src = b),
                document.body.appendChild(a);
        };
        return (
            (c.loadUtils = function (a) {
                if (!window.intlTelInputUtils && !window.intlTelInputGlobals.startedLoadingUtilsScript) {
                    if (((window.intlTelInputGlobals.startedLoadingUtilsScript = !0), "undefined" != typeof Promise))
                        return new Promise(function (b, c) {
                            return m(a, b, c);
                        });
                    m(a);
                }
                return null;
            }),
            (c.defaults = f),
            (c.version = "17.0.16"),
            function (b, c) {
                var a = new l(b, c);
                return a._init(), b.setAttribute("data-intl-tel-input-id", a.id), (window.intlTelInputGlobals.instances[a.id] = a), a;
            }
        );
    })();
});

// 9. slick
!(function (i) {
    "use strict";
    "function" == typeof define && define.amd ? define(["jquery"], i) : "undefined" != typeof exports ? (module.exports = i(require("jquery"))) : i(jQuery);
})(function (i) {
    "use strict";
    var e = window.Slick || {};
    ((e = (function () {
        var e = 0;
        return function (t, o) {
            var s,
                n = this;
            (n.defaults = {
                accessibility: !0,
                adaptiveHeight: !1,
                appendArrows: i(t),
                appendDots: i(t),
                arrows: !0,
                asNavFor: null,
                prevArrow: '<button class="slick-prev" aria-label="Previous" type="button">Previous</button>',
                nextArrow: '<button class="slick-next" aria-label="Next" type="button">Next</button>',
                autoplay: !1,
                autoplaySpeed: 3e3,
                centerMode: !1,
                centerPadding: "50px",
                cssEase: "ease",
                customPaging: function (e, t) {
                    return i('<button type="button" />').text(t + 1);
                },
                dots: !1,
                dotsClass: "slick-dots",
                draggable: !0,
                easing: "linear",
                edgeFriction: 0.35,
                fade: !1,
                focusOnSelect: !1,
                focusOnChange: !1,
                infinite: !0,
                initialSlide: 0,
                lazyLoad: "ondemand",
                mobileFirst: !1,
                pauseOnHover: !0,
                pauseOnFocus: !0,
                pauseOnDotsHover: !1,
                respondTo: "window",
                responsive: null,
                rows: 1,
                rtl: !1,
                slide: "",
                slidesPerRow: 1,
                slidesToShow: 1,
                slidesToScroll: 1,
                speed: 500,
                swipe: !0,
                swipeToSlide: !1,
                touchMove: !0,
                touchThreshold: 5,
                useCSS: !0,
                useTransform: !0,
                variableWidth: !1,
                vertical: !1,
                verticalSwiping: !1,
                waitForAnimate: !0,
                zIndex: 1e3,
            }),
                (n.initials = {
                    animating: !1,
                    dragging: !1,
                    autoPlayTimer: null,
                    currentDirection: 0,
                    currentLeft: null,
                    currentSlide: 0,
                    direction: 1,
                    $dots: null,
                    listWidth: null,
                    listHeight: null,
                    loadIndex: 0,
                    $nextArrow: null,
                    $prevArrow: null,
                    scrolling: !1,
                    slideCount: null,
                    slideWidth: null,
                    $slideTrack: null,
                    $slides: null,
                    sliding: !1,
                    slideOffset: 0,
                    swipeLeft: null,
                    swiping: !1,
                    $list: null,
                    touchObject: {},
                    transformsEnabled: !1,
                    unslicked: !1,
                }),
                i.extend(n, n.initials),
                (n.activeBreakpoint = null),
                (n.animType = null),
                (n.animProp = null),
                (n.breakpoints = []),
                (n.breakpointSettings = []),
                (n.cssTransitions = !1),
                (n.focussed = !1),
                (n.interrupted = !1),
                (n.hidden = "hidden"),
                (n.paused = !0),
                (n.positionProp = null),
                (n.respondTo = null),
                (n.rowCount = 1),
                (n.shouldClick = !0),
                (n.$slider = i(t)),
                (n.$slidesCache = null),
                (n.transformType = null),
                (n.transitionType = null),
                (n.visibilityChange = "visibilitychange"),
                (n.windowWidth = 0),
                (n.windowTimer = null),
                (s = i(t).data("slick") || {}),
                (n.options = i.extend({}, n.defaults, o, s)),
                (n.currentSlide = n.options.initialSlide),
                (n.originalSettings = n.options),
                void 0 !== document.mozHidden ? ((n.hidden = "mozHidden"), (n.visibilityChange = "mozvisibilitychange")) : void 0 !== document.webkitHidden && ((n.hidden = "webkitHidden"), (n.visibilityChange = "webkitvisibilitychange")),
                (n.autoPlay = i.proxy(n.autoPlay, n)),
                (n.autoPlayClear = i.proxy(n.autoPlayClear, n)),
                (n.autoPlayIterator = i.proxy(n.autoPlayIterator, n)),
                (n.changeSlide = i.proxy(n.changeSlide, n)),
                (n.clickHandler = i.proxy(n.clickHandler, n)),
                (n.selectHandler = i.proxy(n.selectHandler, n)),
                (n.setPosition = i.proxy(n.setPosition, n)),
                (n.swipeHandler = i.proxy(n.swipeHandler, n)),
                (n.dragHandler = i.proxy(n.dragHandler, n)),
                (n.keyHandler = i.proxy(n.keyHandler, n)),
                (n.instanceUid = e++),
                (n.htmlExpr = /^(?:\s*(<[\w\W]+>)[^>]*)$/),
                n.registerBreakpoints(),
                n.init(!0);
        };
    })()).prototype.activateADA = function () {
        this.$slideTrack.find(".slick-active").attr({ "aria-hidden": "false" }).find("a, input, button, select").attr({ tabindex: "0" });
    }),
        (e.prototype.addSlide = e.prototype.slickAdd = function (e, t, o) {
            var s = this;
            if ("boolean" == typeof t) (o = t), (t = null);
            else if (t < 0 || t >= s.slideCount) return !1;
            s.unload(),
                "number" == typeof t
                    ? 0 === t && 0 === s.$slides.length
                        ? i(e).appendTo(s.$slideTrack)
                        : o
                        ? i(e).insertBefore(s.$slides.eq(t))
                        : i(e).insertAfter(s.$slides.eq(t))
                    : !0 === o
                    ? i(e).prependTo(s.$slideTrack)
                    : i(e).appendTo(s.$slideTrack),
                (s.$slides = s.$slideTrack.children(this.options.slide)),
                s.$slideTrack.children(this.options.slide).detach(),
                s.$slideTrack.append(s.$slides),
                s.$slides.each(function (e, t) {
                    i(t).attr("data-slick-index", e);
                }),
                (s.$slidesCache = s.$slides),
                s.reinit();
        }),
        (e.prototype.animateHeight = function () {
            var i = this;
            if (1 === i.options.slidesToShow && !0 === i.options.adaptiveHeight && !1 === i.options.vertical) {
                var e = i.$slides.eq(i.currentSlide).outerHeight(!0);
                i.$list.animate({ height: e }, i.options.speed);
            }
        }),
        (e.prototype.animateSlide = function (e, t) {
            var o = {},
                s = this;
            s.animateHeight(),
                !0 === s.options.rtl && !1 === s.options.vertical && (e = -e),
                !1 === s.transformsEnabled
                    ? !1 === s.options.vertical
                        ? s.$slideTrack.animate({ left: e }, s.options.speed, s.options.easing, t)
                        : s.$slideTrack.animate({ top: e }, s.options.speed, s.options.easing, t)
                    : !1 === s.cssTransitions
                    ? (!0 === s.options.rtl && (s.currentLeft = -s.currentLeft),
                      i({ animStart: s.currentLeft }).animate(
                          { animStart: e },
                          {
                              duration: s.options.speed,
                              easing: s.options.easing,
                              step: function (i) {
                                  (i = Math.ceil(i)), !1 === s.options.vertical ? ((o[s.animType] = "translate(" + i + "px, 0px)"), s.$slideTrack.css(o)) : ((o[s.animType] = "translate(0px," + i + "px)"), s.$slideTrack.css(o));
                              },
                              complete: function () {
                                  t && t.call();
                              },
                          }
                      ))
                    : (s.applyTransition(),
                      (e = Math.ceil(e)),
                      !1 === s.options.vertical ? (o[s.animType] = "translate3d(" + e + "px, 0px, 0px)") : (o[s.animType] = "translate3d(0px," + e + "px, 0px)"),
                      s.$slideTrack.css(o),
                      t &&
                          setTimeout(function () {
                              s.disableTransition(), t.call();
                          }, s.options.speed));
        }),
        (e.prototype.getNavTarget = function () {
            var e = this,
                t = e.options.asNavFor;
            return t && null !== t && (t = i(t).not(e.$slider)), t;
        }),
        (e.prototype.asNavFor = function (e) {
            var t = this.getNavTarget();
            null !== t &&
                "object" == typeof t &&
                t.each(function () {
                    var t = i(this).slick("getSlick");
                    t.unslicked || t.slideHandler(e, !0);
                });
        }),
        (e.prototype.applyTransition = function (i) {
            var e = this,
                t = {};
            !1 === e.options.fade ? (t[e.transitionType] = e.transformType + " " + e.options.speed + "ms " + e.options.cssEase) : (t[e.transitionType] = "opacity " + e.options.speed + "ms " + e.options.cssEase),
                !1 === e.options.fade ? e.$slideTrack.css(t) : e.$slides.eq(i).css(t);
        }),
        (e.prototype.autoPlay = function () {
            var i = this;
            i.autoPlayClear(), i.slideCount > i.options.slidesToShow && (i.autoPlayTimer = setInterval(i.autoPlayIterator, i.options.autoplaySpeed));
        }),
        (e.prototype.autoPlayClear = function () {
            var i = this;
            i.autoPlayTimer && clearInterval(i.autoPlayTimer);
        }),
        (e.prototype.autoPlayIterator = function () {
            var i = this,
                e = i.currentSlide + i.options.slidesToScroll;
            i.paused ||
                i.interrupted ||
                i.focussed ||
                (!1 === i.options.infinite &&
                    (1 === i.direction && i.currentSlide + 1 === i.slideCount - 1 ? (i.direction = 0) : 0 === i.direction && ((e = i.currentSlide - i.options.slidesToScroll), i.currentSlide - 1 == 0 && (i.direction = 1))),
                i.slideHandler(e));
        }),
        (e.prototype.buildArrows = function () {
            var e = this;
            !0 === e.options.arrows &&
                ((e.$prevArrow = i(e.options.prevArrow).addClass("slick-arrow")),
                (e.$nextArrow = i(e.options.nextArrow).addClass("slick-arrow")),
                e.slideCount > e.options.slidesToShow
                    ? (e.$prevArrow.removeClass("slick-hidden").removeAttr("aria-hidden tabindex"),
                      e.$nextArrow.removeClass("slick-hidden").removeAttr("aria-hidden tabindex"),
                      e.htmlExpr.test(e.options.prevArrow) && e.$prevArrow.prependTo(e.options.appendArrows),
                      e.htmlExpr.test(e.options.nextArrow) && e.$nextArrow.appendTo(e.options.appendArrows),
                      !0 !== e.options.infinite && e.$prevArrow.addClass("slick-disabled").attr("aria-disabled", "true"))
                    : e.$prevArrow.add(e.$nextArrow).addClass("slick-hidden").attr({ "aria-disabled": "true", tabindex: "-1" }));
        }),
        (e.prototype.buildDots = function () {
            var e,
                t,
                o = this;
            if (!0 === o.options.dots) {
                for (o.$slider.addClass("slick-dotted"), t = i("<ul />").addClass(o.options.dotsClass), e = 0; e <= o.getDotCount(); e += 1) t.append(i("<li />").append(o.options.customPaging.call(this, o, e)));
                (o.$dots = t.appendTo(o.options.appendDots)), o.$dots.find("li").first().addClass("slick-active");
            }
        }),
        (e.prototype.buildOut = function () {
            var e = this;
            (e.$slides = e.$slider.children(e.options.slide + ":not(.slick-cloned)").addClass("slick-slide")),
                (e.slideCount = e.$slides.length),
                e.$slides.each(function (e, t) {
                    i(t)
                        .attr("data-slick-index", e)
                        .data("originalStyling", i(t).attr("style") || "");
                }),
                e.$slider.addClass("slick-slider"),
                (e.$slideTrack = 0 === e.slideCount ? i('<div class="slick-track"/>').appendTo(e.$slider) : e.$slides.wrapAll('<div class="slick-track"/>').parent()),
                (e.$list = e.$slideTrack.wrap('<div class="slick-list"/>').parent()),
                e.$slideTrack.css("opacity", 0),
                (!0 !== e.options.centerMode && !0 !== e.options.swipeToSlide) || (e.options.slidesToScroll = 1),
                i("img[data-lazy]", e.$slider).not("[src]").addClass("slick-loading"),
                e.setupInfinite(),
                e.buildArrows(),
                e.buildDots(),
                e.updateDots(),
                e.setSlideClasses("number" == typeof e.currentSlide ? e.currentSlide : 0),
                !0 === e.options.draggable && e.$list.addClass("draggable");
        }),
        (e.prototype.buildRows = function () {
            var i,
                e,
                t,
                o,
                s,
                n,
                r,
                l = this;
            if (((o = document.createDocumentFragment()), (n = l.$slider.children()), l.options.rows > 1)) {
                for (r = l.options.slidesPerRow * l.options.rows, s = Math.ceil(n.length / r), i = 0; i < s; i++) {
                    var d = document.createElement("div");
                    for (e = 0; e < l.options.rows; e++) {
                        var a = document.createElement("div");
                        for (t = 0; t < l.options.slidesPerRow; t++) {
                            var c = i * r + (e * l.options.slidesPerRow + t);
                            n.get(c) && a.appendChild(n.get(c));
                        }
                        d.appendChild(a);
                    }
                    o.appendChild(d);
                }
                l.$slider.empty().append(o),
                    l.$slider
                        .children()
                        .children()
                        .children()
                        .css({ width: 100 / l.options.slidesPerRow + "%", display: "inline-block" });
            }
        }),
        (e.prototype.checkResponsive = function (e, t) {
            var o,
                s,
                n,
                r = this,
                l = !1,
                d = r.$slider.width(),
                a = window.innerWidth || i(window).width();
            if (("window" === r.respondTo ? (n = a) : "slider" === r.respondTo ? (n = d) : "min" === r.respondTo && (n = Math.min(a, d)), r.options.responsive && r.options.responsive.length && null !== r.options.responsive)) {
                s = null;
                for (o in r.breakpoints) r.breakpoints.hasOwnProperty(o) && (!1 === r.originalSettings.mobileFirst ? n < r.breakpoints[o] && (s = r.breakpoints[o]) : n > r.breakpoints[o] && (s = r.breakpoints[o]));
                null !== s
                    ? null !== r.activeBreakpoint
                        ? (s !== r.activeBreakpoint || t) &&
                          ((r.activeBreakpoint = s),
                          "unslick" === r.breakpointSettings[s] ? r.unslick(s) : ((r.options = i.extend({}, r.originalSettings, r.breakpointSettings[s])), !0 === e && (r.currentSlide = r.options.initialSlide), r.refresh(e)),
                          (l = s))
                        : ((r.activeBreakpoint = s),
                          "unslick" === r.breakpointSettings[s] ? r.unslick(s) : ((r.options = i.extend({}, r.originalSettings, r.breakpointSettings[s])), !0 === e && (r.currentSlide = r.options.initialSlide), r.refresh(e)),
                          (l = s))
                    : null !== r.activeBreakpoint && ((r.activeBreakpoint = null), (r.options = r.originalSettings), !0 === e && (r.currentSlide = r.options.initialSlide), r.refresh(e), (l = s)),
                    e || !1 === l || r.$slider.trigger("breakpoint", [r, l]);
            }
        }),
        (e.prototype.changeSlide = function (e, t) {
            var o,
                s,
                n,
                r = this,
                l = i(e.currentTarget);
            switch ((l.is("a") && e.preventDefault(), l.is("li") || (l = l.closest("li")), (n = r.slideCount % r.options.slidesToScroll != 0), (o = n ? 0 : (r.slideCount - r.currentSlide) % r.options.slidesToScroll), e.data.message)) {
                case "previous":
                    (s = 0 === o ? r.options.slidesToScroll : r.options.slidesToShow - o), r.slideCount > r.options.slidesToShow && r.slideHandler(r.currentSlide - s, !1, t);
                    break;
                case "next":
                    (s = 0 === o ? r.options.slidesToScroll : o), r.slideCount > r.options.slidesToShow && r.slideHandler(r.currentSlide + s, !1, t);
                    break;
                case "index":
                    var d = 0 === e.data.index ? 0 : e.data.index || l.index() * r.options.slidesToScroll;
                    r.slideHandler(r.checkNavigable(d), !1, t), l.children().trigger("focus");
                    break;
                default:
                    return;
            }
        }),
        (e.prototype.checkNavigable = function (i) {
            var e, t;
            if (((e = this.getNavigableIndexes()), (t = 0), i > e[e.length - 1])) i = e[e.length - 1];
            else
                for (var o in e) {
                    if (i < e[o]) {
                        i = t;
                        break;
                    }
                    t = e[o];
                }
            return i;
        }),
        (e.prototype.cleanUpEvents = function () {
            var e = this;
            e.options.dots &&
                null !== e.$dots &&
                (i("li", e.$dots).off("click.slick", e.changeSlide).off("mouseenter.slick", i.proxy(e.interrupt, e, !0)).off("mouseleave.slick", i.proxy(e.interrupt, e, !1)),
                !0 === e.options.accessibility && e.$dots.off("keydown.slick", e.keyHandler)),
                e.$slider.off("focus.slick blur.slick"),
                !0 === e.options.arrows &&
                    e.slideCount > e.options.slidesToShow &&
                    (e.$prevArrow && e.$prevArrow.off("click.slick", e.changeSlide),
                    e.$nextArrow && e.$nextArrow.off("click.slick", e.changeSlide),
                    !0 === e.options.accessibility && (e.$prevArrow && e.$prevArrow.off("keydown.slick", e.keyHandler), e.$nextArrow && e.$nextArrow.off("keydown.slick", e.keyHandler))),
                e.$list.off("touchstart.slick mousedown.slick", e.swipeHandler),
                e.$list.off("touchmove.slick mousemove.slick", e.swipeHandler),
                e.$list.off("touchend.slick mouseup.slick", e.swipeHandler),
                e.$list.off("touchcancel.slick mouseleave.slick", e.swipeHandler),
                e.$list.off("click.slick", e.clickHandler),
                i(document).off(e.visibilityChange, e.visibility),
                e.cleanUpSlideEvents(),
                !0 === e.options.accessibility && e.$list.off("keydown.slick", e.keyHandler),
                !0 === e.options.focusOnSelect && i(e.$slideTrack).children().off("click.slick", e.selectHandler),
                i(window).off("orientationchange.slick.slick-" + e.instanceUid, e.orientationChange),
                i(window).off("resize.slick.slick-" + e.instanceUid, e.resize),
                i("[draggable!=true]", e.$slideTrack).off("dragstart", e.preventDefault),
                i(window).off("load.slick.slick-" + e.instanceUid, e.setPosition);
        }),
        (e.prototype.cleanUpSlideEvents = function () {
            var e = this;
            e.$list.off("mouseenter.slick", i.proxy(e.interrupt, e, !0)), e.$list.off("mouseleave.slick", i.proxy(e.interrupt, e, !1));
        }),
        (e.prototype.cleanUpRows = function () {
            var i,
                e = this;
            e.options.rows > 1 && ((i = e.$slides.children().children()).removeAttr("style"), e.$slider.empty().append(i));
        }),
        (e.prototype.clickHandler = function (i) {
            !1 === this.shouldClick && (i.stopImmediatePropagation(), i.stopPropagation(), i.preventDefault());
        }),
        (e.prototype.destroy = function (e) {
            var t = this;
            t.autoPlayClear(),
                (t.touchObject = {}),
                t.cleanUpEvents(),
                i(".slick-cloned", t.$slider).detach(),
                t.$dots && t.$dots.remove(),
                t.$prevArrow &&
                    t.$prevArrow.length &&
                    (t.$prevArrow.removeClass("slick-disabled slick-arrow slick-hidden").removeAttr("aria-hidden aria-disabled tabindex").css("display", ""), t.htmlExpr.test(t.options.prevArrow) && t.$prevArrow.remove()),
                t.$nextArrow &&
                    t.$nextArrow.length &&
                    (t.$nextArrow.removeClass("slick-disabled slick-arrow slick-hidden").removeAttr("aria-hidden aria-disabled tabindex").css("display", ""), t.htmlExpr.test(t.options.nextArrow) && t.$nextArrow.remove()),
                t.$slides &&
                    (t.$slides
                        .removeClass("slick-slide slick-active slick-center slick-visible slick-current")
                        .removeAttr("aria-hidden")
                        .removeAttr("data-slick-index")
                        .each(function () {
                            i(this).attr("style", i(this).data("originalStyling"));
                        }),
                    t.$slideTrack.children(this.options.slide).detach(),
                    t.$slideTrack.detach(),
                    t.$list.detach(),
                    t.$slider.append(t.$slides)),
                t.cleanUpRows(),
                t.$slider.removeClass("slick-slider"),
                t.$slider.removeClass("slick-initialized"),
                t.$slider.removeClass("slick-dotted"),
                (t.unslicked = !0),
                e || t.$slider.trigger("destroy", [t]);
        }),
        (e.prototype.disableTransition = function (i) {
            var e = this,
                t = {};
            (t[e.transitionType] = ""), !1 === e.options.fade ? e.$slideTrack.css(t) : e.$slides.eq(i).css(t);
        }),
        (e.prototype.fadeSlide = function (i, e) {
            var t = this;
            !1 === t.cssTransitions
                ? (t.$slides.eq(i).css({ zIndex: t.options.zIndex }), t.$slides.eq(i).animate({ opacity: 1 }, t.options.speed, t.options.easing, e))
                : (t.applyTransition(i),
                  t.$slides.eq(i).css({ opacity: 1, zIndex: t.options.zIndex }),
                  e &&
                      setTimeout(function () {
                          t.disableTransition(i), e.call();
                      }, t.options.speed));
        }),
        (e.prototype.fadeSlideOut = function (i) {
            var e = this;
            !1 === e.cssTransitions ? e.$slides.eq(i).animate({ opacity: 0, zIndex: e.options.zIndex - 2 }, e.options.speed, e.options.easing) : (e.applyTransition(i), e.$slides.eq(i).css({ opacity: 0, zIndex: e.options.zIndex - 2 }));
        }),
        (e.prototype.filterSlides = e.prototype.slickFilter = function (i) {
            var e = this;
            null !== i && ((e.$slidesCache = e.$slides), e.unload(), e.$slideTrack.children(this.options.slide).detach(), e.$slidesCache.filter(i).appendTo(e.$slideTrack), e.reinit());
        }),
        (e.prototype.focusHandler = function () {
            var e = this;
            e.$slider.off("focus.slick blur.slick").on("focus.slick blur.slick", "*", function (t) {
                t.stopImmediatePropagation();
                var o = i(this);
                setTimeout(function () {
                    e.options.pauseOnFocus && ((e.focussed = o.is(":focus")), e.autoPlay());
                }, 0);
            });
        }),
        (e.prototype.getCurrent = e.prototype.slickCurrentSlide = function () {
            return this.currentSlide;
        }),
        (e.prototype.getDotCount = function () {
            var i = this,
                e = 0,
                t = 0,
                o = 0;
            if (!0 === i.options.infinite)
                if (i.slideCount <= i.options.slidesToShow) ++o;
                else for (; e < i.slideCount; ) ++o, (e = t + i.options.slidesToScroll), (t += i.options.slidesToScroll <= i.options.slidesToShow ? i.options.slidesToScroll : i.options.slidesToShow);
            else if (!0 === i.options.centerMode) o = i.slideCount;
            else if (i.options.asNavFor) for (; e < i.slideCount; ) ++o, (e = t + i.options.slidesToScroll), (t += i.options.slidesToScroll <= i.options.slidesToShow ? i.options.slidesToScroll : i.options.slidesToShow);
            else o = 1 + Math.ceil((i.slideCount - i.options.slidesToShow) / i.options.slidesToScroll);
            return o - 1;
        }),
        (e.prototype.getLeft = function (i) {
            var e,
                t,
                o,
                s,
                n = this,
                r = 0;
            return (
                (n.slideOffset = 0),
                (t = n.$slides.first().outerHeight(!0)),
                !0 === n.options.infinite
                    ? (n.slideCount > n.options.slidesToShow &&
                          ((n.slideOffset = n.slideWidth * n.options.slidesToShow * -1),
                          (s = -1),
                          !0 === n.options.vertical && !0 === n.options.centerMode && (2 === n.options.slidesToShow ? (s = -1.5) : 1 === n.options.slidesToShow && (s = -2)),
                          (r = t * n.options.slidesToShow * s)),
                      n.slideCount % n.options.slidesToScroll != 0 &&
                          i + n.options.slidesToScroll > n.slideCount &&
                          n.slideCount > n.options.slidesToShow &&
                          (i > n.slideCount
                              ? ((n.slideOffset = (n.options.slidesToShow - (i - n.slideCount)) * n.slideWidth * -1), (r = (n.options.slidesToShow - (i - n.slideCount)) * t * -1))
                              : ((n.slideOffset = (n.slideCount % n.options.slidesToScroll) * n.slideWidth * -1), (r = (n.slideCount % n.options.slidesToScroll) * t * -1))))
                    : i + n.options.slidesToShow > n.slideCount && ((n.slideOffset = (i + n.options.slidesToShow - n.slideCount) * n.slideWidth), (r = (i + n.options.slidesToShow - n.slideCount) * t)),
                n.slideCount <= n.options.slidesToShow && ((n.slideOffset = 0), (r = 0)),
                !0 === n.options.centerMode && n.slideCount <= n.options.slidesToShow
                    ? (n.slideOffset = (n.slideWidth * Math.floor(n.options.slidesToShow)) / 2 - (n.slideWidth * n.slideCount) / 2)
                    : !0 === n.options.centerMode && !0 === n.options.infinite
                    ? (n.slideOffset += n.slideWidth * Math.floor(n.options.slidesToShow / 2) - n.slideWidth)
                    : !0 === n.options.centerMode && ((n.slideOffset = 0), (n.slideOffset += n.slideWidth * Math.floor(n.options.slidesToShow / 2))),
                (e = !1 === n.options.vertical ? i * n.slideWidth * -1 + n.slideOffset : i * t * -1 + r),
                !0 === n.options.variableWidth &&
                    ((o = n.slideCount <= n.options.slidesToShow || !1 === n.options.infinite ? n.$slideTrack.children(".slick-slide").eq(i) : n.$slideTrack.children(".slick-slide").eq(i + n.options.slidesToShow)),
                    (e = !0 === n.options.rtl ? (o[0] ? -1 * (n.$slideTrack.width() - o[0].offsetLeft - o.width()) : 0) : o[0] ? -1 * o[0].offsetLeft : 0),
                    !0 === n.options.centerMode &&
                        ((o = n.slideCount <= n.options.slidesToShow || !1 === n.options.infinite ? n.$slideTrack.children(".slick-slide").eq(i) : n.$slideTrack.children(".slick-slide").eq(i + n.options.slidesToShow + 1)),
                        (e = !0 === n.options.rtl ? (o[0] ? -1 * (n.$slideTrack.width() - o[0].offsetLeft - o.width()) : 0) : o[0] ? -1 * o[0].offsetLeft : 0),
                        (e += (n.$list.width() - o.outerWidth()) / 2))),
                e
            );
        }),
        (e.prototype.getOption = e.prototype.slickGetOption = function (i) {
            return this.options[i];
        }),
        (e.prototype.getNavigableIndexes = function () {
            var i,
                e = this,
                t = 0,
                o = 0,
                s = [];
            for (!1 === e.options.infinite ? (i = e.slideCount) : ((t = -1 * e.options.slidesToScroll), (o = -1 * e.options.slidesToScroll), (i = 2 * e.slideCount)); t < i; )
                s.push(t), (t = o + e.options.slidesToScroll), (o += e.options.slidesToScroll <= e.options.slidesToShow ? e.options.slidesToScroll : e.options.slidesToShow);
            return s;
        }),
        (e.prototype.getSlick = function () {
            return this;
        }),
        (e.prototype.getSlideCount = function () {
            var e,
                t,
                o = this;
            return (
                (t = !0 === o.options.centerMode ? o.slideWidth * Math.floor(o.options.slidesToShow / 2) : 0),
                !0 === o.options.swipeToSlide
                    ? (o.$slideTrack.find(".slick-slide").each(function (s, n) {
                          if (n.offsetLeft - t + i(n).outerWidth() / 2 > -1 * o.swipeLeft) return (e = n), !1;
                      }),
                      Math.abs(i(e).attr("data-slick-index") - o.currentSlide) || 1)
                    : o.options.slidesToScroll
            );
        }),
        (e.prototype.goTo = e.prototype.slickGoTo = function (i, e) {
            this.changeSlide({ data: { message: "index", index: parseInt(i) } }, e);
        }),
        (e.prototype.init = function (e) {
            var t = this;
            i(t.$slider).hasClass("slick-initialized") ||
                (i(t.$slider).addClass("slick-initialized"), t.buildRows(), t.buildOut(), t.setProps(), t.startLoad(), t.loadSlider(), t.initializeEvents(), t.updateArrows(), t.updateDots(), t.checkResponsive(!0), t.focusHandler()),
                e && t.$slider.trigger("init", [t]),
                !0 === t.options.accessibility && t.initADA(),
                t.options.autoplay && ((t.paused = !1), t.autoPlay());
        }),
        (e.prototype.initADA = function () {
            var e = this,
                t = Math.ceil(e.slideCount / e.options.slidesToShow),
                o = e.getNavigableIndexes().filter(function (i) {
                    return i >= 0 && i < e.slideCount;
                });
            e.$slides.add(e.$slideTrack.find(".slick-cloned")).attr({ "aria-hidden": "true", tabindex: "-1" }).find("a, input, button, select").attr({ tabindex: "-1" }),
                null !== e.$dots &&
                    (e.$slides.not(e.$slideTrack.find(".slick-cloned")).each(function (t) {
                        var s = o.indexOf(t);
                        i(this).attr({ role: "tabpanel", id: "slick-slide" + e.instanceUid + t, tabindex: -1 }), -1 !== s && i(this).attr({ "aria-describedby": "slick-slide-control" + e.instanceUid + s });
                    }),
                    e.$dots
                        .attr("role", "tablist")
                        .find("li")
                        .each(function (s) {
                            var n = o[s];
                            i(this).attr({ role: "presentation" }),
                                i(this)
                                    .find("button")
                                    .first()
                                    .attr({ role: "tab", id: "slick-slide-control" + e.instanceUid + s, "aria-controls": "slick-slide" + e.instanceUid + n, "aria-label": s + 1 + " of " + t, "aria-selected": null, tabindex: "-1" });
                        })
                        .eq(e.currentSlide)
                        .find("button")
                        .attr({ "aria-selected": "true", tabindex: "0" })
                        .end());
            for (var s = e.currentSlide, n = s + e.options.slidesToShow; s < n; s++) e.$slides.eq(s).attr("tabindex", 0);
            e.activateADA();
        }),
        (e.prototype.initArrowEvents = function () {
            var i = this;
            !0 === i.options.arrows &&
                i.slideCount > i.options.slidesToShow &&
                (i.$prevArrow.off("click.slick").on("click.slick", { message: "previous" }, i.changeSlide),
                i.$nextArrow.off("click.slick").on("click.slick", { message: "next" }, i.changeSlide),
                !0 === i.options.accessibility && (i.$prevArrow.on("keydown.slick", i.keyHandler), i.$nextArrow.on("keydown.slick", i.keyHandler)));
        }),
        (e.prototype.initDotEvents = function () {
            var e = this;
            !0 === e.options.dots && (i("li", e.$dots).on("click.slick", { message: "index" }, e.changeSlide), !0 === e.options.accessibility && e.$dots.on("keydown.slick", e.keyHandler)),
                !0 === e.options.dots && !0 === e.options.pauseOnDotsHover && i("li", e.$dots).on("mouseenter.slick", i.proxy(e.interrupt, e, !0)).on("mouseleave.slick", i.proxy(e.interrupt, e, !1));
        }),
        (e.prototype.initSlideEvents = function () {
            var e = this;
            e.options.pauseOnHover && (e.$list.on("mouseenter.slick", i.proxy(e.interrupt, e, !0)), e.$list.on("mouseleave.slick", i.proxy(e.interrupt, e, !1)));
        }),
        (e.prototype.initializeEvents = function () {
            var e = this;
            e.initArrowEvents(),
                e.initDotEvents(),
                e.initSlideEvents(),
                e.$list.on("touchstart.slick mousedown.slick", { action: "start" }, e.swipeHandler),
                e.$list.on("touchmove.slick mousemove.slick", { action: "move" }, e.swipeHandler),
                e.$list.on("touchend.slick mouseup.slick", { action: "end" }, e.swipeHandler),
                e.$list.on("touchcancel.slick mouseleave.slick", { action: "end" }, e.swipeHandler),
                e.$list.on("click.slick", e.clickHandler),
                i(document).on(e.visibilityChange, i.proxy(e.visibility, e)),
                !0 === e.options.accessibility && e.$list.on("keydown.slick", e.keyHandler),
                !0 === e.options.focusOnSelect && i(e.$slideTrack).children().on("click.slick", e.selectHandler),
                i(window).on("orientationchange.slick.slick-" + e.instanceUid, i.proxy(e.orientationChange, e)),
                i(window).on("resize.slick.slick-" + e.instanceUid, i.proxy(e.resize, e)),
                i("[draggable!=true]", e.$slideTrack).on("dragstart", e.preventDefault),
                i(window).on("load.slick.slick-" + e.instanceUid, e.setPosition),
                i(e.setPosition);
        }),
        (e.prototype.initUI = function () {
            var i = this;
            !0 === i.options.arrows && i.slideCount > i.options.slidesToShow && (i.$prevArrow.show(), i.$nextArrow.show()), !0 === i.options.dots && i.slideCount > i.options.slidesToShow && i.$dots.show();
        }),
        (e.prototype.keyHandler = function (i) {
            var e = this;
            i.target.tagName.match("TEXTAREA|INPUT|SELECT") ||
                (37 === i.keyCode && !0 === e.options.accessibility
                    ? e.changeSlide({ data: { message: !0 === e.options.rtl ? "next" : "previous" } })
                    : 39 === i.keyCode && !0 === e.options.accessibility && e.changeSlide({ data: { message: !0 === e.options.rtl ? "previous" : "next" } }));
        }),
        (e.prototype.lazyLoad = function () {
            function e(e) {
                i("img[data-lazy]", e).each(function () {
                    var e = i(this),
                        t = i(this).attr("data-lazy"),
                        o = i(this).attr("data-srcset"),
                        s = i(this).attr("data-sizes") || n.$slider.attr("data-sizes"),
                        r = document.createElement("img");
                    (r.onload = function () {
                        e.animate({ opacity: 0 }, 100, function () {
                            o && (e.attr("srcset", o), s && e.attr("sizes", s)),
                                e.attr("src", t).animate({ opacity: 1 }, 200, function () {
                                    e.removeAttr("data-lazy data-srcset data-sizes").removeClass("slick-loading");
                                }),
                                n.$slider.trigger("lazyLoaded", [n, e, t]);
                        });
                    }),
                        (r.onerror = function () {
                            e.removeAttr("data-lazy").removeClass("slick-loading").addClass("slick-lazyload-error"), n.$slider.trigger("lazyLoadError", [n, e, t]);
                        }),
                        (r.src = t);
                });
            }
            var t,
                o,
                s,
                n = this;
            if (
                (!0 === n.options.centerMode
                    ? !0 === n.options.infinite
                        ? (s = (o = n.currentSlide + (n.options.slidesToShow / 2 + 1)) + n.options.slidesToShow + 2)
                        : ((o = Math.max(0, n.currentSlide - (n.options.slidesToShow / 2 + 1))), (s = n.options.slidesToShow / 2 + 1 + 2 + n.currentSlide))
                    : ((o = n.options.infinite ? n.options.slidesToShow + n.currentSlide : n.currentSlide), (s = Math.ceil(o + n.options.slidesToShow)), !0 === n.options.fade && (o > 0 && o--, s <= n.slideCount && s++)),
                (t = n.$slider.find(".slick-slide").slice(o, s)),
                "anticipated" === n.options.lazyLoad)
            )
                for (var r = o - 1, l = s, d = n.$slider.find(".slick-slide"), a = 0; a < n.options.slidesToScroll; a++) r < 0 && (r = n.slideCount - 1), (t = (t = t.add(d.eq(r))).add(d.eq(l))), r--, l++;
            e(t),
                n.slideCount <= n.options.slidesToShow
                    ? e(n.$slider.find(".slick-slide"))
                    : n.currentSlide >= n.slideCount - n.options.slidesToShow
                    ? e(n.$slider.find(".slick-cloned").slice(0, n.options.slidesToShow))
                    : 0 === n.currentSlide && e(n.$slider.find(".slick-cloned").slice(-1 * n.options.slidesToShow));
        }),
        (e.prototype.loadSlider = function () {
            var i = this;
            i.setPosition(), i.$slideTrack.css({ opacity: 1 }), i.$slider.removeClass("slick-loading"), i.initUI(), "progressive" === i.options.lazyLoad && i.progressiveLazyLoad();
        }),
        (e.prototype.next = e.prototype.slickNext = function () {
            this.changeSlide({ data: { message: "next" } });
        }),
        (e.prototype.orientationChange = function () {
            var i = this;
            i.checkResponsive(), i.setPosition();
        }),
        (e.prototype.pause = e.prototype.slickPause = function () {
            var i = this;
            i.autoPlayClear(), (i.paused = !0);
        }),
        (e.prototype.play = e.prototype.slickPlay = function () {
            var i = this;
            i.autoPlay(), (i.options.autoplay = !0), (i.paused = !1), (i.focussed = !1), (i.interrupted = !1);
        }),
        (e.prototype.postSlide = function (e) {
            var t = this;
            t.unslicked ||
                (t.$slider.trigger("afterChange", [t, e]),
                (t.animating = !1),
                t.slideCount > t.options.slidesToShow && t.setPosition(),
                (t.swipeLeft = null),
                t.options.autoplay && t.autoPlay(),
                !0 === t.options.accessibility && (t.initADA(), t.options.focusOnChange && i(t.$slides.get(t.currentSlide)).attr("tabindex", 0).focus()));
        }),
        (e.prototype.prev = e.prototype.slickPrev = function () {
            this.changeSlide({ data: { message: "previous" } });
        }),
        (e.prototype.preventDefault = function (i) {
            i.preventDefault();
        }),
        (e.prototype.progressiveLazyLoad = function (e) {
            e = e || 1;
            var t,
                o,
                s,
                n,
                r,
                l = this,
                d = i("img[data-lazy]", l.$slider);
            d.length
                ? ((t = d.first()),
                  (o = t.attr("data-lazy")),
                  (s = t.attr("data-srcset")),
                  (n = t.attr("data-sizes") || l.$slider.attr("data-sizes")),
                  ((r = document.createElement("img")).onload = function () {
                      s && (t.attr("srcset", s), n && t.attr("sizes", n)),
                          t.attr("src", o).removeAttr("data-lazy data-srcset data-sizes").removeClass("slick-loading"),
                          !0 === l.options.adaptiveHeight && l.setPosition(),
                          l.$slider.trigger("lazyLoaded", [l, t, o]),
                          l.progressiveLazyLoad();
                  }),
                  (r.onerror = function () {
                      e < 3
                          ? setTimeout(function () {
                                l.progressiveLazyLoad(e + 1);
                            }, 500)
                          : (t.removeAttr("data-lazy").removeClass("slick-loading").addClass("slick-lazyload-error"), l.$slider.trigger("lazyLoadError", [l, t, o]), l.progressiveLazyLoad());
                  }),
                  (r.src = o))
                : l.$slider.trigger("allImagesLoaded", [l]);
        }),
        (e.prototype.refresh = function (e) {
            var t,
                o,
                s = this;
            (o = s.slideCount - s.options.slidesToShow),
                !s.options.infinite && s.currentSlide > o && (s.currentSlide = o),
                s.slideCount <= s.options.slidesToShow && (s.currentSlide = 0),
                (t = s.currentSlide),
                s.destroy(!0),
                i.extend(s, s.initials, { currentSlide: t }),
                s.init(),
                e || s.changeSlide({ data: { message: "index", index: t } }, !1);
        }),
        (e.prototype.registerBreakpoints = function () {
            var e,
                t,
                o,
                s = this,
                n = s.options.responsive || null;
            if ("array" === i.type(n) && n.length) {
                s.respondTo = s.options.respondTo || "window";
                for (e in n)
                    if (((o = s.breakpoints.length - 1), n.hasOwnProperty(e))) {
                        for (t = n[e].breakpoint; o >= 0; ) s.breakpoints[o] && s.breakpoints[o] === t && s.breakpoints.splice(o, 1), o--;
                        s.breakpoints.push(t), (s.breakpointSettings[t] = n[e].settings);
                    }
                s.breakpoints.sort(function (i, e) {
                    return s.options.mobileFirst ? i - e : e - i;
                });
            }
        }),
        (e.prototype.reinit = function () {
            var e = this;
            (e.$slides = e.$slideTrack.children(e.options.slide).addClass("slick-slide")),
                (e.slideCount = e.$slides.length),
                e.currentSlide >= e.slideCount && 0 !== e.currentSlide && (e.currentSlide = e.currentSlide - e.options.slidesToScroll),
                e.slideCount <= e.options.slidesToShow && (e.currentSlide = 0),
                e.registerBreakpoints(),
                e.setProps(),
                e.setupInfinite(),
                e.buildArrows(),
                e.updateArrows(),
                e.initArrowEvents(),
                e.buildDots(),
                e.updateDots(),
                e.initDotEvents(),
                e.cleanUpSlideEvents(),
                e.initSlideEvents(),
                e.checkResponsive(!1, !0),
                !0 === e.options.focusOnSelect && i(e.$slideTrack).children().on("click.slick", e.selectHandler),
                e.setSlideClasses("number" == typeof e.currentSlide ? e.currentSlide : 0),
                e.setPosition(),
                e.focusHandler(),
                (e.paused = !e.options.autoplay),
                e.autoPlay(),
                e.$slider.trigger("reInit", [e]);
        }),
        (e.prototype.resize = function () {
            var e = this;
            i(window).width() !== e.windowWidth &&
                (clearTimeout(e.windowDelay),
                (e.windowDelay = window.setTimeout(function () {
                    (e.windowWidth = i(window).width()), e.checkResponsive(), e.unslicked || e.setPosition();
                }, 50)));
        }),
        (e.prototype.removeSlide = e.prototype.slickRemove = function (i, e, t) {
            var o = this;
            if (((i = "boolean" == typeof i ? (!0 === (e = i) ? 0 : o.slideCount - 1) : !0 === e ? --i : i), o.slideCount < 1 || i < 0 || i > o.slideCount - 1)) return !1;
            o.unload(),
                !0 === t ? o.$slideTrack.children().remove() : o.$slideTrack.children(this.options.slide).eq(i).remove(),
                (o.$slides = o.$slideTrack.children(this.options.slide)),
                o.$slideTrack.children(this.options.slide).detach(),
                o.$slideTrack.append(o.$slides),
                (o.$slidesCache = o.$slides),
                o.reinit();
        }),
        (e.prototype.setCSS = function (i) {
            var e,
                t,
                o = this,
                s = {};
            !0 === o.options.rtl && (i = -i),
                (e = "left" == o.positionProp ? Math.ceil(i) + "px" : "0px"),
                (t = "top" == o.positionProp ? Math.ceil(i) + "px" : "0px"),
                (s[o.positionProp] = i),
                !1 === o.transformsEnabled
                    ? o.$slideTrack.css(s)
                    : ((s = {}), !1 === o.cssTransitions ? ((s[o.animType] = "translate(" + e + ", " + t + ")"), o.$slideTrack.css(s)) : ((s[o.animType] = "translate3d(" + e + ", " + t + ", 0px)"), o.$slideTrack.css(s)));
        }),
        (e.prototype.setDimensions = function () {
            var i = this;
            !1 === i.options.vertical
                ? !0 === i.options.centerMode && i.$list.css({ padding: "0px " + i.options.centerPadding })
                : (i.$list.height(i.$slides.first().outerHeight(!0) * i.options.slidesToShow), !0 === i.options.centerMode && i.$list.css({ padding: i.options.centerPadding + " 0px" })),
                (i.listWidth = i.$list.width()),
                (i.listHeight = i.$list.height()),
                !1 === i.options.vertical && !1 === i.options.variableWidth
                    ? ((i.slideWidth = Math.ceil(i.listWidth / i.options.slidesToShow)), i.$slideTrack.width(Math.ceil(i.slideWidth * i.$slideTrack.children(".slick-slide").length)))
                    : !0 === i.options.variableWidth
                    ? i.$slideTrack.width(5e3 * i.slideCount)
                    : ((i.slideWidth = Math.ceil(i.listWidth)), i.$slideTrack.height(Math.ceil(i.$slides.first().outerHeight(!0) * i.$slideTrack.children(".slick-slide").length)));
            var e = i.$slides.first().outerWidth(!0) - i.$slides.first().width();
            !1 === i.options.variableWidth && i.$slideTrack.children(".slick-slide").width(i.slideWidth - e);
        }),
        (e.prototype.setFade = function () {
            var e,
                t = this;
            t.$slides.each(function (o, s) {
                (e = t.slideWidth * o * -1),
                    !0 === t.options.rtl ? i(s).css({ position: "relative", right: e, top: 0, zIndex: t.options.zIndex - 2, opacity: 0 }) : i(s).css({ position: "relative", left: e, top: 0, zIndex: t.options.zIndex - 2, opacity: 0 });
            }),
                t.$slides.eq(t.currentSlide).css({ zIndex: t.options.zIndex - 1, opacity: 1 });
        }),
        (e.prototype.setHeight = function () {
            var i = this;
            if (1 === i.options.slidesToShow && !0 === i.options.adaptiveHeight && !1 === i.options.vertical) {
                var e = i.$slides.eq(i.currentSlide).outerHeight(!0);
                i.$list.css("height", e);
            }
        }),
        (e.prototype.setOption = e.prototype.slickSetOption = function () {
            var e,
                t,
                o,
                s,
                n,
                r = this,
                l = !1;
            if (
                ("object" === i.type(arguments[0])
                    ? ((o = arguments[0]), (l = arguments[1]), (n = "multiple"))
                    : "string" === i.type(arguments[0]) &&
                      ((o = arguments[0]), (s = arguments[1]), (l = arguments[2]), "responsive" === arguments[0] && "array" === i.type(arguments[1]) ? (n = "responsive") : void 0 !== arguments[1] && (n = "single")),
                "single" === n)
            )
                r.options[o] = s;
            else if ("multiple" === n)
                i.each(o, function (i, e) {
                    r.options[i] = e;
                });
            else if ("responsive" === n)
                for (t in s)
                    if ("array" !== i.type(r.options.responsive)) r.options.responsive = [s[t]];
                    else {
                        for (e = r.options.responsive.length - 1; e >= 0; ) r.options.responsive[e].breakpoint === s[t].breakpoint && r.options.responsive.splice(e, 1), e--;
                        r.options.responsive.push(s[t]);
                    }
            l && (r.unload(), r.reinit());
        }),
        (e.prototype.setPosition = function () {
            var i = this;
            i.setDimensions(), i.setHeight(), !1 === i.options.fade ? i.setCSS(i.getLeft(i.currentSlide)) : i.setFade(), i.$slider.trigger("setPosition", [i]);
        }),
        (e.prototype.setProps = function () {
            var i = this,
                e = document.body.style;
            (i.positionProp = !0 === i.options.vertical ? "top" : "left"),
                "top" === i.positionProp ? i.$slider.addClass("slick-vertical") : i.$slider.removeClass("slick-vertical"),
                (void 0 === e.WebkitTransition && void 0 === e.MozTransition && void 0 === e.msTransition) || (!0 === i.options.useCSS && (i.cssTransitions = !0)),
                i.options.fade && ("number" == typeof i.options.zIndex ? i.options.zIndex < 3 && (i.options.zIndex = 3) : (i.options.zIndex = i.defaults.zIndex)),
                void 0 !== e.OTransform && ((i.animType = "OTransform"), (i.transformType = "-o-transform"), (i.transitionType = "OTransition"), void 0 === e.perspectiveProperty && void 0 === e.webkitPerspective && (i.animType = !1)),
                void 0 !== e.MozTransform && ((i.animType = "MozTransform"), (i.transformType = "-moz-transform"), (i.transitionType = "MozTransition"), void 0 === e.perspectiveProperty && void 0 === e.MozPerspective && (i.animType = !1)),
                void 0 !== e.webkitTransform &&
                    ((i.animType = "webkitTransform"), (i.transformType = "-webkit-transform"), (i.transitionType = "webkitTransition"), void 0 === e.perspectiveProperty && void 0 === e.webkitPerspective && (i.animType = !1)),
                void 0 !== e.msTransform && ((i.animType = "msTransform"), (i.transformType = "-ms-transform"), (i.transitionType = "msTransition"), void 0 === e.msTransform && (i.animType = !1)),
                void 0 !== e.transform && !1 !== i.animType && ((i.animType = "transform"), (i.transformType = "transform"), (i.transitionType = "transition")),
                (i.transformsEnabled = i.options.useTransform && null !== i.animType && !1 !== i.animType);
        }),
        (e.prototype.setSlideClasses = function (i) {
            var e,
                t,
                o,
                s,
                n = this;
            if (((t = n.$slider.find(".slick-slide").removeClass("slick-active slick-center slick-current").attr("aria-hidden", "true")), n.$slides.eq(i).addClass("slick-current"), !0 === n.options.centerMode)) {
                var r = n.options.slidesToShow % 2 == 0 ? 1 : 0;
                (e = Math.floor(n.options.slidesToShow / 2)),
                    !0 === n.options.infinite &&
                        (i >= e && i <= n.slideCount - 1 - e
                            ? n.$slides
                                  .slice(i - e + r, i + e + 1)
                                  .addClass("slick-active")
                                  .attr("aria-hidden", "false")
                            : ((o = n.options.slidesToShow + i),
                              t
                                  .slice(o - e + 1 + r, o + e + 2)
                                  .addClass("slick-active")
                                  .attr("aria-hidden", "false")),
                        0 === i ? t.eq(t.length - 1 - n.options.slidesToShow).addClass("slick-center") : i === n.slideCount - 1 && t.eq(n.options.slidesToShow).addClass("slick-center")),
                    n.$slides.eq(i).addClass("slick-center");
            } else
                i >= 0 && i <= n.slideCount - n.options.slidesToShow
                    ? n.$slides
                          .slice(i, i + n.options.slidesToShow)
                          .addClass("slick-active")
                          .attr("aria-hidden", "false")
                    : t.length <= n.options.slidesToShow
                    ? t.addClass("slick-active").attr("aria-hidden", "false")
                    : ((s = n.slideCount % n.options.slidesToShow),
                      (o = !0 === n.options.infinite ? n.options.slidesToShow + i : i),
                      n.options.slidesToShow == n.options.slidesToScroll && n.slideCount - i < n.options.slidesToShow
                          ? t
                                .slice(o - (n.options.slidesToShow - s), o + s)
                                .addClass("slick-active")
                                .attr("aria-hidden", "false")
                          : t
                                .slice(o, o + n.options.slidesToShow)
                                .addClass("slick-active")
                                .attr("aria-hidden", "false"));
            ("ondemand" !== n.options.lazyLoad && "anticipated" !== n.options.lazyLoad) || n.lazyLoad();
        }),
        (e.prototype.setupInfinite = function () {
            var e,
                t,
                o,
                s = this;
            if ((!0 === s.options.fade && (s.options.centerMode = !1), !0 === s.options.infinite && !1 === s.options.fade && ((t = null), s.slideCount > s.options.slidesToShow))) {
                for (o = !0 === s.options.centerMode ? s.options.slidesToShow + 1 : s.options.slidesToShow, e = s.slideCount; e > s.slideCount - o; e -= 1)
                    (t = e - 1),
                        i(s.$slides[t])
                            .clone(!0)
                            .attr("id", "")
                            .attr("data-slick-index", t - s.slideCount)
                            .prependTo(s.$slideTrack)
                            .addClass("slick-cloned");
                for (e = 0; e < o + s.slideCount; e += 1)
                    (t = e),
                        i(s.$slides[t])
                            .clone(!0)
                            .attr("id", "")
                            .attr("data-slick-index", t + s.slideCount)
                            .appendTo(s.$slideTrack)
                            .addClass("slick-cloned");
                s.$slideTrack
                    .find(".slick-cloned")
                    .find("[id]")
                    .each(function () {
                        i(this).attr("id", "");
                    });
            }
        }),
        (e.prototype.interrupt = function (i) {
            var e = this;
            i || e.autoPlay(), (e.interrupted = i);
        }),
        (e.prototype.selectHandler = function (e) {
            var t = this,
                o = i(e.target).is(".slick-slide") ? i(e.target) : i(e.target).parents(".slick-slide"),
                s = parseInt(o.attr("data-slick-index"));
            s || (s = 0), t.slideCount <= t.options.slidesToShow ? t.slideHandler(s, !1, !0) : t.slideHandler(s);
        }),
        (e.prototype.slideHandler = function (i, e, t) {
            var o,
                s,
                n,
                r,
                l,
                d = null,
                a = this;
            if (((e = e || !1), !((!0 === a.animating && !0 === a.options.waitForAnimate) || (!0 === a.options.fade && a.currentSlide === i))))
                if (
                    (!1 === e && a.asNavFor(i),
                    (o = i),
                    (d = a.getLeft(o)),
                    (r = a.getLeft(a.currentSlide)),
                    (a.currentLeft = null === a.swipeLeft ? r : a.swipeLeft),
                    !1 === a.options.infinite && !1 === a.options.centerMode && (i < 0 || i > a.getDotCount() * a.options.slidesToScroll))
                )
                    !1 === a.options.fade &&
                        ((o = a.currentSlide),
                        !0 !== t
                            ? a.animateSlide(r, function () {
                                  a.postSlide(o);
                              })
                            : a.postSlide(o));
                else if (!1 === a.options.infinite && !0 === a.options.centerMode && (i < 0 || i > a.slideCount - a.options.slidesToScroll))
                    !1 === a.options.fade &&
                        ((o = a.currentSlide),
                        !0 !== t
                            ? a.animateSlide(r, function () {
                                  a.postSlide(o);
                              })
                            : a.postSlide(o));
                else {
                    if (
                        (a.options.autoplay && clearInterval(a.autoPlayTimer),
                        (s =
                            o < 0
                                ? a.slideCount % a.options.slidesToScroll != 0
                                    ? a.slideCount - (a.slideCount % a.options.slidesToScroll)
                                    : a.slideCount + o
                                : o >= a.slideCount
                                ? a.slideCount % a.options.slidesToScroll != 0
                                    ? 0
                                    : o - a.slideCount
                                : o),
                        (a.animating = !0),
                        a.$slider.trigger("beforeChange", [a, a.currentSlide, s]),
                        (n = a.currentSlide),
                        (a.currentSlide = s),
                        a.setSlideClasses(a.currentSlide),
                        a.options.asNavFor && (l = (l = a.getNavTarget()).slick("getSlick")).slideCount <= l.options.slidesToShow && l.setSlideClasses(a.currentSlide),
                        a.updateDots(),
                        a.updateArrows(),
                        !0 === a.options.fade)
                    )
                        return (
                            !0 !== t
                                ? (a.fadeSlideOut(n),
                                  a.fadeSlide(s, function () {
                                      a.postSlide(s);
                                  }))
                                : a.postSlide(s),
                            void a.animateHeight()
                        );
                    !0 !== t
                        ? a.animateSlide(d, function () {
                              a.postSlide(s);
                          })
                        : a.postSlide(s);
                }
        }),
        (e.prototype.startLoad = function () {
            var i = this;
            !0 === i.options.arrows && i.slideCount > i.options.slidesToShow && (i.$prevArrow.hide(), i.$nextArrow.hide()),
                !0 === i.options.dots && i.slideCount > i.options.slidesToShow && i.$dots.hide(),
                i.$slider.addClass("slick-loading");
        }),
        (e.prototype.swipeDirection = function () {
            var i,
                e,
                t,
                o,
                s = this;
            return (
                (i = s.touchObject.startX - s.touchObject.curX),
                (e = s.touchObject.startY - s.touchObject.curY),
                (t = Math.atan2(e, i)),
                (o = Math.round((180 * t) / Math.PI)) < 0 && (o = 360 - Math.abs(o)),
                o <= 45 && o >= 0
                    ? !1 === s.options.rtl
                        ? "left"
                        : "right"
                    : o <= 360 && o >= 315
                    ? !1 === s.options.rtl
                        ? "left"
                        : "right"
                    : o >= 135 && o <= 225
                    ? !1 === s.options.rtl
                        ? "right"
                        : "left"
                    : !0 === s.options.verticalSwiping
                    ? o >= 35 && o <= 135
                        ? "down"
                        : "up"
                    : "vertical"
            );
        }),
        (e.prototype.swipeEnd = function (i) {
            var e,
                t,
                o = this;
            if (((o.dragging = !1), (o.swiping = !1), o.scrolling)) return (o.scrolling = !1), !1;
            if (((o.interrupted = !1), (o.shouldClick = !(o.touchObject.swipeLength > 10)), void 0 === o.touchObject.curX)) return !1;
            if ((!0 === o.touchObject.edgeHit && o.$slider.trigger("edge", [o, o.swipeDirection()]), o.touchObject.swipeLength >= o.touchObject.minSwipe)) {
                switch ((t = o.swipeDirection())) {
                    case "left":
                    case "down":
                        (e = o.options.swipeToSlide ? o.checkNavigable(o.currentSlide + o.getSlideCount()) : o.currentSlide + o.getSlideCount()), (o.currentDirection = 0);
                        break;
                    case "right":
                    case "up":
                        (e = o.options.swipeToSlide ? o.checkNavigable(o.currentSlide - o.getSlideCount()) : o.currentSlide - o.getSlideCount()), (o.currentDirection = 1);
                }
                "vertical" != t && (o.slideHandler(e), (o.touchObject = {}), o.$slider.trigger("swipe", [o, t]));
            } else o.touchObject.startX !== o.touchObject.curX && (o.slideHandler(o.currentSlide), (o.touchObject = {}));
        }),
        (e.prototype.swipeHandler = function (i) {
            var e = this;
            if (!(!1 === e.options.swipe || ("ontouchend" in document && !1 === e.options.swipe) || (!1 === e.options.draggable && -1 !== i.type.indexOf("mouse"))))
                switch (
                    ((e.touchObject.fingerCount = i.originalEvent && void 0 !== i.originalEvent.touches ? i.originalEvent.touches.length : 1),
                    (e.touchObject.minSwipe = e.listWidth / e.options.touchThreshold),
                    !0 === e.options.verticalSwiping && (e.touchObject.minSwipe = e.listHeight / e.options.touchThreshold),
                    i.data.action)
                ) {
                    case "start":
                        e.swipeStart(i);
                        break;
                    case "move":
                        e.swipeMove(i);
                        break;
                    case "end":
                        e.swipeEnd(i);
                }
        }),
        (e.prototype.swipeMove = function (i) {
            var e,
                t,
                o,
                s,
                n,
                r,
                l = this;
            return (
                (n = void 0 !== i.originalEvent ? i.originalEvent.touches : null),
                !(!l.dragging || l.scrolling || (n && 1 !== n.length)) &&
                    ((e = l.getLeft(l.currentSlide)),
                    (l.touchObject.curX = void 0 !== n ? n[0].pageX : i.clientX),
                    (l.touchObject.curY = void 0 !== n ? n[0].pageY : i.clientY),
                    (l.touchObject.swipeLength = Math.round(Math.sqrt(Math.pow(l.touchObject.curX - l.touchObject.startX, 2)))),
                    (r = Math.round(Math.sqrt(Math.pow(l.touchObject.curY - l.touchObject.startY, 2)))),
                    !l.options.verticalSwiping && !l.swiping && r > 4
                        ? ((l.scrolling = !0), !1)
                        : (!0 === l.options.verticalSwiping && (l.touchObject.swipeLength = r),
                          (t = l.swipeDirection()),
                          void 0 !== i.originalEvent && l.touchObject.swipeLength > 4 && ((l.swiping = !0), i.preventDefault()),
                          (s = (!1 === l.options.rtl ? 1 : -1) * (l.touchObject.curX > l.touchObject.startX ? 1 : -1)),
                          !0 === l.options.verticalSwiping && (s = l.touchObject.curY > l.touchObject.startY ? 1 : -1),
                          (o = l.touchObject.swipeLength),
                          (l.touchObject.edgeHit = !1),
                          !1 === l.options.infinite &&
                              ((0 === l.currentSlide && "right" === t) || (l.currentSlide >= l.getDotCount() && "left" === t)) &&
                              ((o = l.touchObject.swipeLength * l.options.edgeFriction), (l.touchObject.edgeHit = !0)),
                          !1 === l.options.vertical ? (l.swipeLeft = e + o * s) : (l.swipeLeft = e + o * (l.$list.height() / l.listWidth) * s),
                          !0 === l.options.verticalSwiping && (l.swipeLeft = e + o * s),
                          !0 !== l.options.fade && !1 !== l.options.touchMove && (!0 === l.animating ? ((l.swipeLeft = null), !1) : void l.setCSS(l.swipeLeft))))
            );
        }),
        (e.prototype.swipeStart = function (i) {
            var e,
                t = this;
            if (((t.interrupted = !0), 1 !== t.touchObject.fingerCount || t.slideCount <= t.options.slidesToShow)) return (t.touchObject = {}), !1;
            void 0 !== i.originalEvent && void 0 !== i.originalEvent.touches && (e = i.originalEvent.touches[0]),
                (t.touchObject.startX = t.touchObject.curX = void 0 !== e ? e.pageX : i.clientX),
                (t.touchObject.startY = t.touchObject.curY = void 0 !== e ? e.pageY : i.clientY),
                (t.dragging = !0);
        }),
        (e.prototype.unfilterSlides = e.prototype.slickUnfilter = function () {
            var i = this;
            null !== i.$slidesCache && (i.unload(), i.$slideTrack.children(this.options.slide).detach(), i.$slidesCache.appendTo(i.$slideTrack), i.reinit());
        }),
        (e.prototype.unload = function () {
            var e = this;
            i(".slick-cloned", e.$slider).remove(),
                e.$dots && e.$dots.remove(),
                e.$prevArrow && e.htmlExpr.test(e.options.prevArrow) && e.$prevArrow.remove(),
                e.$nextArrow && e.htmlExpr.test(e.options.nextArrow) && e.$nextArrow.remove(),
                e.$slides.removeClass("slick-slide slick-active slick-visible slick-current").attr("aria-hidden", "true").css("width", "");
        }),
        (e.prototype.unslick = function (i) {
            var e = this;
            e.$slider.trigger("unslick", [e, i]), e.destroy();
        }),
        (e.prototype.updateArrows = function () {
            var i = this;
            Math.floor(i.options.slidesToShow / 2),
                !0 === i.options.arrows &&
                    i.slideCount > i.options.slidesToShow &&
                    !i.options.infinite &&
                    (i.$prevArrow.removeClass("slick-disabled").attr("aria-disabled", "false"),
                    i.$nextArrow.removeClass("slick-disabled").attr("aria-disabled", "false"),
                    0 === i.currentSlide
                        ? (i.$prevArrow.addClass("slick-disabled").attr("aria-disabled", "true"), i.$nextArrow.removeClass("slick-disabled").attr("aria-disabled", "false"))
                        : i.currentSlide >= i.slideCount - i.options.slidesToShow && !1 === i.options.centerMode
                        ? (i.$nextArrow.addClass("slick-disabled").attr("aria-disabled", "true"), i.$prevArrow.removeClass("slick-disabled").attr("aria-disabled", "false"))
                        : i.currentSlide >= i.slideCount - 1 &&
                          !0 === i.options.centerMode &&
                          (i.$nextArrow.addClass("slick-disabled").attr("aria-disabled", "true"), i.$prevArrow.removeClass("slick-disabled").attr("aria-disabled", "false")));
        }),
        (e.prototype.updateDots = function () {
            var i = this;
            null !== i.$dots &&
                (i.$dots.find("li").removeClass("slick-active").end(),
                i.$dots
                    .find("li")
                    .eq(Math.floor(i.currentSlide / i.options.slidesToScroll))
                    .addClass("slick-active"));
        }),
        (e.prototype.visibility = function () {
            var i = this;
            i.options.autoplay && (document[i.hidden] ? (i.interrupted = !0) : (i.interrupted = !1));
        }),
        (i.fn.slick = function () {
            var i,
                t,
                o = this,
                s = arguments[0],
                n = Array.prototype.slice.call(arguments, 1),
                r = o.length;
            for (i = 0; i < r; i++) if (("object" == typeof s || void 0 === s ? (o[i].slick = new e(o[i], s)) : (t = o[i].slick[s].apply(o[i].slick, n)), void 0 !== t)) return t;
            return o;
        });
});
