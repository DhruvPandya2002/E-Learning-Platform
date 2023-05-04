(self.webpackChunk_N_E = self.webpackChunk_N_E || []).push([
    [405], {
        8273: function(e, t, r) {
            "use strict";
            r.r(t), r.d(t, {
                CountUp: function() {
                    return a
                }
            });
            var n = function() {
                    return (n = Object.assign || function(e) {
                        for (var t, r = 1, n = arguments.length; r < n; r++)
                            for (var a in t = arguments[r]) Object.prototype.hasOwnProperty.call(t, a) && (e[a] = t[a]);
                        return e
                    }).apply(this, arguments)
                },
                a = function() {
                    function e(e, t, r) {
                        var a = this;
                        this.endVal = t, this.options = r, this.version = "2.3.2", this.defaults = {
                            startVal: 0,
                            decimalPlaces: 0,
                            duration: 2,
                            useEasing: !0,
                            useGrouping: !0,
                            smartEasingThreshold: 999,
                            smartEasingAmount: 333,
                            separator: ",",
                            decimal: ".",
                            prefix: "",
                            suffix: "",
                            enableScrollSpy: !1,
                            scrollSpyDelay: 200,
                            scrollSpyOnce: !1
                        }, this.finalEndVal = null, this.useEasing = !0, this.countDown = !1, this.error = "", this.startVal = 0, this.paused = !0, this.once = !1, this.count = function(e) {
                            a.startTime || (a.startTime = e);
                            var t = e - a.startTime;
                            a.remaining = a.duration - t, a.useEasing ? a.countDown ? a.frameVal = a.startVal - a.easingFn(t, 0, a.startVal - a.endVal, a.duration) : a.frameVal = a.easingFn(t, a.startVal, a.endVal - a.startVal, a.duration) : a.frameVal = a.startVal + (a.endVal - a.startVal) * (t / a.duration);
                            var r = a.countDown ? a.frameVal < a.endVal : a.frameVal > a.endVal;
                            a.frameVal = r ? a.endVal : a.frameVal, a.frameVal = Number(a.frameVal.toFixed(a.options.decimalPlaces)), a.printValue(a.frameVal), t < a.duration ? a.rAF = requestAnimationFrame(a.count) : null !== a.finalEndVal ? a.update(a.finalEndVal) : a.callback && a.callback()
                        }, this.formatNumber = function(e) {
                            var t, r, n, o, s = e < 0 ? "-" : "";
                            t = Math.abs(e).toFixed(a.options.decimalPlaces);
                            var i = (t += "").split(".");
                            if (r = i[0], n = i.length > 1 ? a.options.decimal + i[1] : "", a.options.useGrouping) {
                                o = "";
                                for (var l = 0, c = r.length; l < c; ++l) 0 !== l && l % 3 == 0 && (o = a.options.separator + o), o = r[c - l - 1] + o;
                                r = o
                            }
                            return a.options.numerals && a.options.numerals.length && (r = r.replace(/[0-9]/g, (function(e) {
                                return a.options.numerals[+e]
                            })), n = n.replace(/[0-9]/g, (function(e) {
                                return a.options.numerals[+e]
                            }))), s + a.options.prefix + r + n + a.options.suffix
                        }, this.easeOutExpo = function(e, t, r, n) {
                            return r * (1 - Math.pow(2, -10 * e / n)) * 1024 / 1023 + t
                        }, this.options = n(n({}, this.defaults), r), this.formattingFn = this.options.formattingFn ? this.options.formattingFn : this.formatNumber, this.easingFn = this.options.easingFn ? this.options.easingFn : this.easeOutExpo, this.startVal = this.validateValue(this.options.startVal), this.frameVal = this.startVal, this.endVal = this.validateValue(t), this.options.decimalPlaces = Math.max(this.options.decimalPlaces), this.resetDuration(), this.options.separator = String(this.options.separator), this.useEasing = this.options.useEasing, "" === this.options.separator && (this.options.useGrouping = !1), this.el = "string" == typeof e ? document.getElementById(e) : e, this.el ? this.printValue(this.startVal) : this.error = "[CountUp] target is null or undefined", "undefined" != typeof window && this.options.enableScrollSpy && (this.error ? console.error(this.error, e) : (window.onScrollFns = window.onScrollFns || [], window.onScrollFns.push((function() {
                            return a.handleScroll(a)
                        })), window.onscroll = function() {
                            window.onScrollFns.forEach((function(e) {
                                return e()
                            }))
                        }, this.handleScroll(this)))
                    }
                    return e.prototype.handleScroll = function(e) {
                        if (e && window && !e.once) {
                            var t = window.innerHeight + window.scrollY,
                                r = e.el.getBoundingClientRect(),
                                n = r.top + r.height + window.pageYOffset;
                            n < t && n > window.scrollY && e.paused ? (e.paused = !1, setTimeout((function() {
                                return e.start()
                            }), e.options.scrollSpyDelay), e.options.scrollSpyOnce && (e.once = !0)) : window.scrollY > n && !e.paused && e.reset()
                        }
                    }, e.prototype.determineDirectionAndSmartEasing = function() {
                        var e = this.finalEndVal ? this.finalEndVal : this.endVal;
                        this.countDown = this.startVal > e;
                        var t = e - this.startVal;
                        if (Math.abs(t) > this.options.smartEasingThreshold && this.options.useEasing) {
                            this.finalEndVal = e;
                            var r = this.countDown ? 1 : -1;
                            this.endVal = e + r * this.options.smartEasingAmount, this.duration = this.duration / 2
                        } else this.endVal = e, this.finalEndVal = null;
                        null !== this.finalEndVal ? this.useEasing = !1 : this.useEasing = this.options.useEasing
                    }, e.prototype.start = function(e) {
                        this.error || (this.callback = e, this.duration > 0 ? (this.determineDirectionAndSmartEasing(), this.paused = !1, this.rAF = requestAnimationFrame(this.count)) : this.printValue(this.endVal))
                    }, e.prototype.pauseResume = function() {
                        this.paused ? (this.startTime = null, this.duration = this.remaining, this.startVal = this.frameVal, this.determineDirectionAndSmartEasing(), this.rAF = requestAnimationFrame(this.count)) : cancelAnimationFrame(this.rAF), this.paused = !this.paused
                    }, e.prototype.reset = function() {
                        cancelAnimationFrame(this.rAF), this.paused = !0, this.resetDuration(), this.startVal = this.validateValue(this.options.startVal), this.frameVal = this.startVal, this.printValue(this.startVal)
                    }, e.prototype.update = function(e) {
                        cancelAnimationFrame(this.rAF), this.startTime = null, this.endVal = this.validateValue(e), this.endVal !== this.frameVal && (this.startVal = this.frameVal, null == this.finalEndVal && this.resetDuration(), this.finalEndVal = null, this.determineDirectionAndSmartEasing(), this.rAF = requestAnimationFrame(this.count))
                    }, e.prototype.printValue = function(e) {
                        var t = this.formattingFn(e);
                        "INPUT" === this.el.tagName ? this.el.value = t : "text" === this.el.tagName || "tspan" === this.el.tagName ? this.el.textContent = t : this.el.innerHTML = t
                    }, e.prototype.ensureNumber = function(e) {
                        return "number" == typeof e && !isNaN(e)
                    }, e.prototype.validateValue = function(e) {
                        var t = Number(e);
                        return this.ensureNumber(t) ? t : (this.error = "[CountUp] invalid start or end value: ".concat(e), null)
                    }, e.prototype.resetDuration = function() {
                        this.startTime = null, this.duration = 1e3 * Number(this.options.duration), this.remaining = this.duration
                    }, e
                }()
        },
        3454: function(e, t, r) {
            "use strict";
            var n, a;
            e.exports = (null == (n = r.g.process) ? void 0 : n.env) && "object" === typeof(null == (a = r.g.process) ? void 0 : a.env) ? r.g.process : r(7663)
        },
        5557: function(e, t, r) {
            (window.__NEXT_P = window.__NEXT_P || []).push(["/", function() {
                return r(5133)
            }])
        },
        7982: function(e, t, r) {
            "use strict";
            r.d(t, {
                Z: function() {
                    return f
                }
            });
            var n = r(5893),
                a = r(7294),
                o = r(3750),
                s = r(5675),
                i = r.n(s),
                l = (r(5680), r(3369));
            var c = function(e) {
                    var t = e.theme,
                        r = e.name,
                        a = e.course_name,
                        o = e.description,
                        s = e.review_count,
                        c = e.user_Image;
                    return o = o.length > 300 ? o.slice(0, 300).concat("...") : o, (0, n.jsxs)("div", {
                        className: "w-[350px] space-y-4 rounded-xl px-5 py-7 shadow-xl md:w-[456px] md:py-10 ".concat("dark" === t ? "bg-[#181a1b]" : " bg-[#fff]"),
                        children: [(0, n.jsx)("p", {
                            className: "".concat("dark" === t ? "text-[#989082]" : "text-subText", " min-h-[200px] text-justify  md:min-h-[150px] md:text-start"),
                            children: o
                        }), (0, n.jsxs)("div", {
                            className: "flex md:flex-row flex-col items-center justify-between ",
                            children: [(0, n.jsxs)("div", {
                                className: "flex md:flex-row flex-col items-center gap-2",
                                children: [(0, n.jsx)("div", {
                                    className: "h-14 w-14 translate-y-1 rounded-full overflow-hidden border border-white100",
                                    children: (0, n.jsx)(i(), {
                                        src: c,
                                        width: 20,
                                        height: 20,
                                        alt: "author img",
                                        layout: "responsive",
                                        objectFit: "cover"
                                    })
                                }), (0, n.jsxs)("div", {
                                    className: "flex flex-col justify-center md:items-start items-center gap-2 mb-2",
                                    children: [(0, n.jsx)("span", {
                                        className: "text-sm font-bold ".concat("dark" === t && "text-[#e8e6e3]"),
                                        children: r
                                    }), (0, n.jsx)("span", {
                                        className: "text-xs text-subText text-center md:text-start",
                                        children: a
                                    })]
                                })]
                            }), (0, n.jsx)(l.Z, {
                                Review_Count: s
                            })]
                        })]
                    })
                },
                u = r(719),
                d = (r(933), r(8770), r(92), r(1911)),
                p = r(7958);
            var f = function(e) {
                var t = e.testimonial,
                    r = (0, a.useState)(),
                    s = r[0],
                    i = r[1],
                    l = (0, a.useRef)(),
                    f = (0, a.useRef)(),
                    h = (0, a.useContext)(p.Z).theme;
                return (0, a.useEffect)((function() {
                    s && !s.destroyed && (s.params.navigation.prevEl = l.current, s.params.navigation.nextEl = f.current, s.navigation.init(), s.navigation.update())
                }), [s]), (0, n.jsxs)("div", {
                    className: "relative mx-auto max-w-maxScreen ",
                    children: [(0, n.jsx)("div", {
                        className: "absolute -top-20 -left-20 -z-40 h-[490px] w-[490px] rounded-full bg-brand100/10 blur-[100px]"
                    }), (0, n.jsxs)("div", {
                        className: "flex flex-row items-center justify-between px-6 py-4 pb-0 md:px-16 md:py-14",
                        children: [(0, n.jsxs)("div", {
                            className: "py-6 font-rubik md:py-0",
                            children: [(0, n.jsx)("p", {
                                className: "pre_heading mb-2 ".concat("dark" === h ? "text-[#6e96cf]" : "text-brand"),
                                children: "What student says"
                            }), (0, n.jsx)("p", {
                                className: "md:section_heading text-3xl font-bold md:text-[42px] md:font-semibold ".concat("dark" === h ? "text-[#e8e6e3]" : "text-headText"),
                                children: "Recent Reviews"
                            })]
                        }), (0, n.jsxs)("div", {
                            className: "hidden flex-row gap-4 md:flex ",
                            children: [(0, n.jsx)("button", {
                                className: "grid h-10 w-20 place-content-center rounded-full ".concat("dark" === h ? "bg-[#222526] text-[#d3cfc9]" : "bg-grey50 text-[#222]", " text-xl"),
                                ref: l,
                                "aria-label": "Previous",
                                children: (0, n.jsx)(o.And, {})
                            }), (0, n.jsx)("button", {
                                className: "grid h-10 w-20 place-content-center rounded-full ".concat("dark" === h ? "bg-[#29347a]" : "bg-brand", "  text-xl text-[#fff]"),
                                ref: f,
                                "aria-label": "Next",
                                children: (0, n.jsx)(o.lzl, {})
                            })]
                        })]
                    }), (0, n.jsx)("div", {
                        className: "mx-auto select-none mb-16 h-[2px] w-[90%] bg-white100 md:mb-24 ".concat("dark" === h && "opacity-30")
                    }), (0, n.jsx)(u.tq, {
                        modules: [d.W_, d.tl, d.LW, d.s5, d.Qr, d.pt],
                        onSwiper: i,
                        slidesPerView: 1,
                        spaceBetween: 0,
                        slidesPerGroup: 1,
                        loop: !0,
                        loopFillGroupWithBlank: !0,
                        pagination: {
                            clickable: !0
                        },
                        navigation: {
                            prevEl: null === l || void 0 === l ? void 0 : l.current,
                            nextEl: null === f || void 0 === f ? void 0 : f.current
                        },
                        updateOnWindowResize: !0,
                        observer: !0,
                        observeParents: !0,
                        className: "mySwiper",
                        breakpoints: {
                            1340: {
                                slidesPerView: 2.5
                            },
                            850: {
                                slidesPerView: 1.5
                            }
                        },
                        autoplay: {
                            delay: 1500
                        },
                        speed: 1e3,
                        children: t.map((function(e, t) {
                            var r, a, o, s, i, l, d, p;
                            return (0, n.jsx)(u.o5, {
                                children: (0, n.jsx)(c, {
                                    theme: h,
                                    name: null === e || void 0 === e || null === (r = e.attributes) || void 0 === r ? void 0 : r.UserName,
                                    course_name: null === e || void 0 === e || null === (a = e.attributes) || void 0 === a ? void 0 : a.courseName,
                                    description: null === e || void 0 === e || null === (o = e.attributes) || void 0 === o ? void 0 : o.UserReview,
                                    review_count: null === e || void 0 === e || null === (s = e.attributes) || void 0 === s ? void 0 : s.UserRatings,
                                    user_Image: null === e || void 0 === e || null === (i = e.attributes) || void 0 === i || null === (l = i.UserImage) || void 0 === l || null === (d = l.data) || void 0 === d || null === (p = d.attributes) || void 0 === p ? void 0 : p.url
                                }, t)
                            }, t)
                        }))
                    })]
                })
            }
        },
        3369: function(e, t, r) {
            "use strict";
            var n = r(797),
                a = r(5893),
                o = r(7294),
                s = r(9327);
            t.Z = function(e) {
                var t = e.Review_Count,
                    r = (0, o.useState)({
                        full: 0,
                        half: 0,
                        empty: 0
                    }),
                    i = r[0],
                    l = r[1];
                return (0, o.useEffect)((function() {
                    var e = Math.floor(t);
                    l({
                        full: e,
                        half: Number.isInteger(t) ? 0 : 1,
                        empty: Number.isInteger(t) ? 5 - e : 4 - e
                    })
                }), []), (0, a.jsxs)("div", {
                    className: "flex gap-1 text-yellow500",
                    children: [(0, n.Z)(new Array(i.full)).map((function(e, t) {
                        return (0, a.jsx)(s.DQk, {}, t)
                    })), (0, n.Z)(new Array(i.half)).map((function(e, t) {
                        return (0, a.jsx)(s.E3I, {}, t)
                    })), (0, n.Z)(new Array(i.empty)).map((function(e, t) {
                        return (0, a.jsx)(s.ofN, {}, t)
                    }))]
                })
            }
        },
        5133: function(e, t, r) {
            "use strict";
            r.r(t), r.d(t, {
                __N_SSG: function() {
                    return O
                },
                default: function() {
                    return k
                }
            });
            var n = r(5893),
                a = r(7294),
                o = r(5675),
                s = r.n(o),
                i = r(1664),
                l = r.n(i),
                c = r(5680);
            var u = function(e) {
                    var t = e.theme,
                        r = e.title,
                        a = e.currentPrice,
                        o = e.actualPrice,
                        s = e.discount,
                        i = e.course_img,
                        c = e.CourseLink,
                        u = e.UpcomingOrNot;
                    return (0, n.jsx)(n.Fragment, {
                        children: u ? (0, n.jsxs)("div", {
                            className: "bg-white mx-auto max-w-[90%] rounded-lg cursor-default select-none border ".concat("dark" === t ? "bg-[#181a1b] border-[#353a3c]" : "border-grey50 bg-[#fff]", " shadow-md md:mx-0 md:max-w-[400px] ").concat(u ? "min-h-[330px]" : "min-h-[360px] ", " p-5 overflow-hidden"),
                            children: [(0, n.jsx)("div", {
                                className: "max-h-52 w-full overflow-hidden rounded-lg mb-4",
                                children: (0, n.jsx)("img", {
                                    src: i,
                                    alt: "course_img",
                                    className: "mx-auto object-bottom"
                                })
                            }), (0, n.jsxs)("div", {
                                children: [(0, n.jsx)("div", {
                                    className: "".concat("dark" === t ? "text-[#e8e6e3]" : "text-gray-900", " mb-2 font-rubik text-[22px] text-lg font-bold tracking-tight md:text-2xl"),
                                    children: r
                                }), a && (0, n.jsxs)(n.Fragment, {
                                    children: [(0, n.jsx)("div", {
                                        className: "h-[2px] w-3/4 bg-grey50"
                                    }), (0, n.jsxs)("div", {
                                        className: "mt-4 flex gap-3 font-bold",
                                        children: [(0, n.jsxs)("p", {
                                            className: "text-base text-brand",
                                            children: ["\u20b9", o]
                                        }), (0, n.jsxs)("p", {
                                            className: "text-base text-subText line-through",
                                            children: ["\u20b9", a]
                                        }), (0, n.jsxs)("p", {
                                            className: "rounded-md bg-grassGreen px-2 py-1 text-sm text-[#fff]",
                                            children: [s, "% off"]
                                        })]
                                    })]
                                })]
                            })]
                        }) : (0, n.jsx)(l(), {
                            href: c || "#",
                            children: (0, n.jsx)("a", {
                                target: "_blank",
                                children: (0, n.jsxs)("div", {
                                    className: "bg-white mx-auto max-w-[90%] rounded-lg border ".concat("dark" === t ? "bg-[#181a1b] border-[#353a3c]" : "border-grey50 bg-[#fff]", " shadow-md md:mx-0 md:max-w-[400px] ").concat(u ? "min-h-[330px]" : "min-h-[360px]", " p-5 overflow-hidden"),
                                    children: [(0, n.jsx)("div", {
                                        className: "max-h-52 w-full overflow-hidden rounded-lg mb-4",
                                        children: (0, n.jsx)("img", {
                                            src: i,
                                            alt: "course_img",
                                            className: "mx-auto object-bottom"
                                        })
                                    }), (0, n.jsxs)("div", {
                                        children: [(0, n.jsx)("div", {
                                            className: "".concat("dark" === t ? "text-[#e8e6e3]" : "text-gray-900", " mb-2 font-rubik text-[22px] text-lg font-bold tracking-tight md:text-2xl"),
                                            children: r
                                        }), a && (0, n.jsxs)(n.Fragment, {
                                            children: [(0, n.jsx)("div", {
                                                className: "h-[2px] w-3/4 bg-grey50 ".concat("dark" === t && "opacity-10")
                                            }), (0, n.jsxs)("div", {
                                                className: "mt-4 flex gap-3 font-bold",
                                                children: [(0, n.jsxs)("p", {
                                                    className: "text-base ".concat("dark" === t ? "text-[#6e96cf]" : "text-brand"),
                                                    children: ["\u20b9", o]
                                                }), (0, n.jsxs)("p", {
                                                    className: "text-base text-subText line-through",
                                                    children: ["\u20b9", a]
                                                }), (0, n.jsxs)("p", {
                                                    className: "rounded-md bg-grassGreen px-2 py-1 text-sm text-[#fff]",
                                                    children: [s, "% off"]
                                                })]
                                            })]
                                        })]
                                    })]
                                })
                            })
                        })
                    })
                },
                d = r(7958);
            var p = function(e) {
                var t = e.coursesData,
                    r = (0, a.useContext)(d.Z).theme;
                return (0, n.jsx)("div", {
                    className: "".concat("dark" === r ? "bg-[#1b1d1e]" : "bg-section_bg"),
                    children: (0, n.jsxs)("div", {
                        className: "mx-auto w-full max-w-maxScreen ",
                        children: [(0, n.jsx)("div", {
                            className: "w-full pt-12 text-center",
                            "data-aos": "fade-up",
                            children: (0, n.jsxs)("p", {
                                className: "section_heading ".concat("dark" === r ? "text-[#e8e6e3]" : "text-headText", " mx-auto max-w-[60%] font-rubik md:mx-0 md:max-w-none"),
                                children: ["What would you like to", " ", (0, n.jsx)("span", {
                                    className: "".concat("dark" === r ? "text-[#6e96cf]" : "text-brand"),
                                    children: "learn?"
                                })]
                            })
                        }), (0, n.jsx)("div", {
                            className: "flex flex-wrap justify-evenly gap-4 py-14",
                            children: null === t || void 0 === t ? void 0 : t.map((function(e, t) {
                                var o, s, i, l, c, d, p, f, h, m;
                                return (0, n.jsx)(a.Fragment, {
                                    children: (null === e || void 0 === e || null === (o = e.attributes) || void 0 === o ? void 0 : o.UpcomingOrNot) && (0, n.jsx)(u, {
                                        theme: r,
                                        course_img: null === e || void 0 === e || null === (s = e.attributes) || void 0 === s || null === (i = s.ThumbnailImage) || void 0 === i || null === (l = i.data) || void 0 === l || null === (c = l.attributes) || void 0 === c ? void 0 : c.url,
                                        title: null === e || void 0 === e || null === (d = e.attributes) || void 0 === d ? void 0 : d.CourseName,
                                        currentPrice: null === e || void 0 === e || null === (p = e.attributes) || void 0 === p ? void 0 : p.currentPrice,
                                        actualPrice: null === e || void 0 === e || null === (f = e.attributes) || void 0 === f ? void 0 : f.actualPrice,
                                        discount: null === e || void 0 === e || null === (h = e.attributes) || void 0 === h ? void 0 : h.DiscountPercent,
                                        CourseLink: "/course/".concat(null === e || void 0 === e || null === (m = e.attributes) || void 0 === m ? void 0 : m.courseSlug)
                                    })
                                }, t)
                            }))
                        }), (0, n.jsx)("div", {
                            className: "mx-auto mt-16 h-[1px] w-[90%] ".concat("dark" === r ? "bg-[#4a5054]" : "bg-grey100", " ")
                        })]
                    })
                })
            };
            var f = function() {
                    var e = (0, a.useContext)(d.Z).theme;
                    return (0, n.jsxs)("div", {
                        className: "relative mx-auto grid max-w-maxScreen grid-cols-1 items-center py-24 md:grid-cols-2 md:justify-start",
                        children: [(0, n.jsx)("div", {
                            className: "absolute top-0 -left-1/2 h-[2px] w-full bg-gradient-to-r  ".concat("dark" === e ? "from-[#fff] top-[#000]" : "from-subText to-[#fff]")
                        }), (0, n.jsxs)("div", {
                            className: "mx-auto w-[90%] md:w-fit md:pl-10 md:text-start xl:pl-0",
                            children: [(0, n.jsx)("p", {
                                className: "font-rubik text-base font-semibold uppercase md:text-xl",
                                "data-aos": "fade-right",
                                children: (0, n.jsx)("span", {
                                    className: "".concat("dark" === e ? "text-[#6e96cf]" : "text-brand"),
                                    children: "Placements"
                                })
                            }), (0, n.jsx)("p", {
                                className: "section_heading mt-5 mb-8 font-rubik leading-7 md:leading-[2.8rem]",
                                "data-aos": "fade-right",
                                "data-aos-delay": 100,
                                children: (0, n.jsxs)("span", {
                                    className: "".concat("dark" === e && "text-[#dbd8d3]"),
                                    children: ["Get Offers from", (0, n.jsx)("br", {}), "Top Companies"]
                                })
                            }), (0, n.jsx)("p", {
                                className: "font-rubik",
                                "data-aos": "fade-right",
                                "data-aos-delay": 150,
                                children: (0, n.jsx)("span", {
                                    className: "section_subheading ".concat("dark" === e ? "text-[#989082]" : "text-[#777c85]"),
                                    children: "Our finest get offers from top-notch companies."
                                })
                            })]
                        }), (0, n.jsx)("div", {
                            className: "relative grid place-content-center py-16 md:py-0 ",
                            children: (0, n.jsxs)("div", {
                                className: "outer_wheel circle_animation relative grid h-72 w-72 place-content-center rounded-full border border-purple100 transition-all sm:h-96 sm:w-96",
                                children: [(0, n.jsx)("div", {
                                    className: "crotate absolute h-16 w-16",
                                    children: (0, n.jsx)(s(), {
                                        src: c.s5,
                                        alt: "circle logo",
                                        width: 20,
                                        height: 20,
                                        layout: "responsive",
                                        className: "scale-[2.2]"
                                    })
                                }), (0, n.jsx)("div", {
                                    className: "crotate absolute h-16 w-16",
                                    children: (0, n.jsx)(s(), {
                                        src: c.Om,
                                        alt: "circle logo",
                                        width: 20,
                                        height: 20,
                                        layout: "responsive",
                                        className: "scale-[2.2]"
                                    })
                                }), (0, n.jsx)("div", {
                                    className: "crotate absolute h-16 w-16",
                                    children: (0, n.jsx)(s(), {
                                        src: c.fT,
                                        alt: "circle logo",
                                        width: 20,
                                        height: 20,
                                        layout: "responsive",
                                        className: "scale-[2.2]"
                                    })
                                }), (0, n.jsx)("div", {
                                    className: "crotate absolute h-16 w-16",
                                    children: (0, n.jsx)(s(), {
                                        src: c.Pf,
                                        alt: "circle logo",
                                        width: 20,
                                        height: 20,
                                        layout: "responsive",
                                        className: "scale-[2.2]"
                                    })
                                }), (0, n.jsx)("div", {
                                    className: "crotate absolute h-16 w-16",
                                    children: (0, n.jsx)(s(), {
                                        src: c.sG,
                                        alt: "circle logo",
                                        width: 20,
                                        height: 20,
                                        layout: "responsive",
                                        className: "scale-[2.2]"
                                    })
                                }), (0, n.jsx)("div", {
                                    className: "crotate absolute h-16 w-16",
                                    children: (0, n.jsx)(s(), {
                                        src: c.nI,
                                        alt: "circle logo",
                                        width: 20,
                                        height: 20,
                                        layout: "responsive",
                                        className: "scale-[2.2]"
                                    })
                                }), (0, n.jsx)("div", {
                                    className: "circle_animation2 relative grid h-52 w-52 place-content-center rounded-full ".concat("dark" === e ? "bg-[#202224]" : "bg-purple100", " sm:h-72 sm:w-72"),
                                    children: (0, n.jsxs)("div", {
                                        className: "inner_cicle h-32 w-32 rounded-full ".concat("dark" === e ? "bg-[#181a1b]" : "bg-[#fff]", " sm:h-40 sm:w-40 "),
                                        children: [(0, n.jsx)("div", {
                                            className: "crotate2 absolute h-16 w-16",
                                            children: (0, n.jsx)(s(), {
                                                src: c.Hr,
                                                alt: "circle logo",
                                                width: 20,
                                                height: 20,
                                                layout: "responsive",
                                                className: "scale-[2.2]"
                                            })
                                        }), (0, n.jsx)("div", {
                                            className: "crotate2 absolute h-16 w-16",
                                            children: (0, n.jsx)(s(), {
                                                src: c.Do,
                                                alt: "circle logo",
                                                width: 20,
                                                height: 20,
                                                layout: "responsive",
                                                className: "scale-[2.2]"
                                            })
                                        }), (0, n.jsx)("div", {
                                            className: "crotate2 absolute h-16 w-16",
                                            children: (0, n.jsx)(s(), {
                                                src: c.NX,
                                                alt: "circle logo",
                                                width: 20,
                                                height: 20,
                                                layout: "responsive",
                                                className: "scale-[2.2]"
                                            })
                                        }), (0, n.jsx)("div", {
                                            className: "crotate2 absolute h-16 w-16",
                                            children: (0, n.jsx)(s(), {
                                                src: c.EY,
                                                alt: "circle logo",
                                                width: 20,
                                                height: 20,
                                                layout: "responsive",
                                                className: "scale-[2.2]"
                                            })
                                        })]
                                    })
                                })]
                            })
                        })]
                    })
                },
                h = r(7516);
            var m = function(e) {
                    var t = e.socialLinks,
                        r = (0, a.useContext)(d.Z).theme;
                    return (0, n.jsxs)("div", {
                        className: "relative w-full font-rubik",
                        children: [(0, n.jsx)("div", {
                            className: "absolute top-0 left-0 h-[2px] w-[100vw] translate-x-[60%] bg-grey50 ".concat("dark" === r && "opacity-30")
                        }), (0, n.jsx)("img", {
                            src: c.py,
                            alt: "dotted illustration",
                            className: "absolute top-0 -left-44 md:-left-0"
                        }), (0, n.jsxs)("div", {
                            className: "relative mx-auto max-w-maxScreen overflow-hidden",
                            children: [(0, n.jsxs)("div", {
                                className: "pt-16",
                                "data-aos": "fade-up",
                                children: [(0, n.jsx)("p", {
                                    className: "section_heading ".concat("dark" === r ? "text-[#e8e6e3]" : "text-headText", " text-center"),
                                    children: "Join our Coding family"
                                }), (0, n.jsxs)("p", {
                                    className: "section_subheading text-center ".concat("dark" === r ? "text-[#989082]" : "text-subText", " "),
                                    children: ["If you would like to keep up on the latest posts and courses, ", (0, n.jsx)("br", {}), " come by and connect with us on the following links."]
                                })]
                            }), (0, n.jsx)("div", {
                                className: "mx-auto grid w-[90%] grid-cols-2 gap-8 py-28 text-2xl md:w-[60%] md:grid-cols-4",
                                children: t.map((function(e, t) {
                                    return (0, n.jsxs)("div", {
                                        className: "flex flex-col items-center justify-center gap-4",
                                        children: [(0, n.jsx)("div", {
                                            className: "h-24 w-24",
                                            children: (0, n.jsx)(l(), {
                                                href: (null === e || void 0 === e ? void 0 : e.SocilMediLink) || "/",
                                                children: (0, n.jsx)("a", {
                                                    target: "_blank",
                                                    children: (0, n.jsx)(s(), {
                                                        src: e.SocialMediaIcon.data.attributes.url,
                                                        alt: "social media logo",
                                                        width: 50,
                                                        height: 50,
                                                        layout: "responsive",
                                                        placeholder: "blur",
                                                        blurDataURL: e.SocialMediaIcon.data.attributes.url
                                                    })
                                                })
                                            })
                                        }), (0, n.jsx)("div", {
                                            children: (0, n.jsx)(l(), {
                                                href: (null === e || void 0 === e ? void 0 : e.SocilMediLink) || "/",
                                                children: (0, n.jsxs)("a", {
                                                    target: "_blank",
                                                    className: "text-[".concat(e.HexCodeForText, "] flex items-center justify-center gap-1"),
                                                    children: [(0, n.jsx)("div", {
                                                        children: (0, n.jsx)(h.rpH, {
                                                            size: 20,
                                                            style: {
                                                                color: e.HexCodeForText
                                                            }
                                                        })
                                                    }), (0, n.jsx)("div", {
                                                        style: {
                                                            color: e.HexCodeForText
                                                        },
                                                        className: "font-semibold",
                                                        children: e.SocialMediaName
                                                    })]
                                                })
                                            })
                                        })]
                                    }, t)
                                }))
                            })]
                        })]
                    })
                },
                x = r(7982);
            var v = function(e) {
                    var t = e.coursesData,
                        r = (0, a.useContext)(d.Z).theme;
                    return (0, n.jsx)("div", {
                        className: "".concat("dark" === r ? "bg-[#1b1d1e]" : "bg-section_bg"),
                        children: (0, n.jsxs)("div", {
                            className: "mx-auto w-full max-w-maxScreen ",
                            children: [(0, n.jsx)("div", {
                                className: "w-full pt-12 text-center font-rubik",
                                "data-aos": "fade-up",
                                children: (0, n.jsxs)("p", {
                                    className: "section_heading ".concat("dark" === r ? "text-[#e8e6e3]" : "text-headText"),
                                    children: ["Upcoming ", (0, n.jsx)("span", {
                                        className: "".concat("dark" === r ? "text-[#6e96cf]" : "text-brand"),
                                        children: "Courses"
                                    })]
                                })
                            }), (0, n.jsx)("div", {
                                className: "flex flex-wrap justify-evenly gap-4 py-14",
                                children: null === t || void 0 === t ? void 0 : t.map((function(e, t) {
                                    var o, s, i, l, c, d;
                                    return (0, n.jsx)(a.Fragment, {
                                        children: !(null === e || void 0 === e || null === (o = e.attributes) || void 0 === o ? void 0 : o.UpcomingOrNot) && (0, n.jsx)(u, {
                                            theme: r,
                                            course_img: null === e || void 0 === e || null === (s = e.attributes) || void 0 === s || null === (i = s.ThumbnailImage) || void 0 === i || null === (l = i.data) || void 0 === l || null === (c = l.attributes) || void 0 === c ? void 0 : c.url,
                                            title: null === e || void 0 === e || null === (d = e.attributes) || void 0 === d ? void 0 : d.CourseName,
                                            UpcomingOrNot: !0
                                        }, t)
                                    }, t)
                                }))
                            })]
                        })
                    })
                },
                b = r(5459),
                g = r.n(b),
                y = r(4561);
            var j = function() {
                var e = c.Yj,
                    t = c.Sg,
                    r = c.UR,
                    o = c.D9,
                    i = c.r3,
                    u = c.HC,
                    p = c.Q3,
                    f = c.z2,
                    h = c.M2,
                    m = c.L2,
                    x = c.lc,
                    v = (0, a.useContext)(d.Z).theme;
                return (0, n.jsx)(n.Fragment, {
                    children: (0, n.jsxs)("section", {
                        className: "flex items-center py-12 md:py-0",
                        children: [(0, n.jsx)("div", {
                            className: "absolute left-0 top-0 flex w-full justify-end -z-[1000] blur-3xl",
                            children: (0, n.jsx)(s(), {
                                src: e,
                                alt: "background-gradient",
                                width: 787,
                                height: 806,
                                className: "animate-wiggle"
                            })
                        }), (0, n.jsxs)("div", {
                            className: "mx-auto flex w-11/12 max-w-7xl flex-col-reverse items-center justify-between md:flex-row",
                            children: [(0, n.jsxs)("div", {
                                className: "flex flex-col gap-y-6 md:min-w-[400px] lg:min-w-[600px]",
                                children: [(0, n.jsxs)("h1", {
                                    className: "flex items-center gap-x-2 text-3xl font-bold md:text-4xl xl:text-6xl",
                                    "data-aos": "fade-right",
                                    children: [(0, n.jsx)("span", {
                                        className: "".concat("dark" === v ? "text-[#6e96cf]" : "text-brand"),
                                        children: "Learn"
                                    }), (0, n.jsx)("span", {
                                        className: "".concat("dark" === v ? "text-[#e8e6e3]" : "text-textHead"),
                                        children: "With"
                                    }), (0, n.jsx)("span", {
                                        className: "".concat("dark" === v ? "text-[#e8e6e3]" : "text-textHead"),
                                        children: (0, n.jsx)(g(), {
                                            options: {
                                                strings: ["Love", "Babbar"],
                                                autoStart: !0,
                                                loop: !0
                                            }
                                        })
                                    })]
                                }), (0, n.jsx)("p", {
                                    className: "font-rubik text-xl md:text-2xl xl:text-4xl",
                                    "data-aos": "fade-right",
                                    "data-aos-delay": 50,
                                    children: (0, n.jsxs)("span", {
                                        className: "".concat("dark" === v ? "text-[#e8e6e3]" : "text-textpara"),
                                        children: ["The Ultimate Guide To Ace ", (0, n.jsx)("br", {}), " SDE Interviews."]
                                    })
                                }), (0, n.jsxs)("div", {
                                    className: "flex items-center gap-x-4 font-rubik",
                                    "data-aos": "fade-right",
                                    "data-aos-delay": 100,
                                    children: [(0, n.jsx)(l(), {
                                        href: "#courses",
                                        children: (0, n.jsx)("a", {
                                            children: (0, n.jsx)(y.Z, {
                                                theme: v,
                                                option: "solid",
                                                classes: "xl:px-9 px-5 xl:py-4 py-2",
                                                children: "View Courses"
                                            })
                                        })
                                    }), (0, n.jsx)(l(), {
                                        href: "https://www.youtube.com/@CodeHelp/videos",
                                        children: (0, n.jsx)("a", {
                                            target: "_blank",
                                            children: (0, n.jsx)(y.Z, {
                                                theme: v,
                                                option: "outline",
                                                classes: "xl:px-9 px-5 xl:py-4 py-2",
                                                children: "Watch Video"
                                            })
                                        })
                                    })]
                                }), (0, n.jsxs)("div", {
                                    className: "mt-8 flex items-center justify-start gap-x-4",
                                    "data-aos": "fade-right",
                                    "data-aos-delay": 150,
                                    children: [(0, n.jsxs)("div", {
                                        className: "relative flex h-[48px] w-[190px] items-center",
                                        children: [(0, n.jsx)("div", {
                                            className: "absolute top-0 left-0 rounded-full overflow-hidden",
                                            children: (0, n.jsx)(s(), {
                                                src: u,
                                                alt: "student",
                                                width: 48,
                                                height: 48,
                                                quality: 100,
                                                objectFit: "cover",
                                                className: "rounded-full"
                                            })
                                        }), (0, n.jsx)("div", {
                                            className: "absolute top-0 left-8 z-10 rounded-full overflow-hidden",
                                            children: (0, n.jsx)(s(), {
                                                src: p,
                                                alt: "student",
                                                width: 48,
                                                height: 48,
                                                quality: 100,
                                                className: "rounded-full border border-white100"
                                            })
                                        }), (0, n.jsx)("div", {
                                            className: "absolute top-0 left-[4rem] z-10 rounded-full overflow-hidden",
                                            children: (0, n.jsx)(s(), {
                                                src: f,
                                                alt: "student",
                                                width: 48,
                                                height: 48,
                                                quality: 100,
                                                className: "rounded-full border border-white100"
                                            })
                                        }), (0, n.jsx)("div", {
                                            className: "absolute top-0 left-[6rem] z-10 rounded-full overflow-hidden",
                                            children: (0, n.jsx)(s(), {
                                                src: h,
                                                alt: "student",
                                                width: 48,
                                                height: 48,
                                                quality: 100,
                                                className: "rounded-full border border-white100"
                                            })
                                        }), (0, n.jsx)("div", {
                                            className: "absolute top-0 left-[8rem] z-10 rounded-full overflow-hidden",
                                            children: (0, n.jsx)(s(), {
                                                src: m,
                                                alt: "student",
                                                width: 48,
                                                height: 48,
                                                quality: 100,
                                                className: "rounded-full border border-white100"
                                            })
                                        })]
                                    }), (0, n.jsxs)("div", {
                                        children: [(0, n.jsx)("p", {
                                            className: "font-rubik font-semibold leading-3 ".concat("dark" === v ? "text-[#dbd8d3]" : "text-headText"),
                                            children: "20000 +"
                                        }), (0, n.jsx)("p", {
                                            className: "font-rubik ".concat("dark" === v ? "text-[#989082]" : "text-subText"),
                                            children: "Happy Students"
                                        })]
                                    })]
                                })]
                            }), (0, n.jsxs)("div", {
                                className: "flex items-center md:max-w-[60%]",
                                children: [(0, n.jsxs)("div", {
                                    className: "relative hidden xl:block",
                                    children: [(0, n.jsx)(s(), {
                                        src: t,
                                        placeholder: "blur",
                                        blurDataURL: t,
                                        width: 5112,
                                        height: 5963,
                                        objectFit: "contain",
                                        priority: !0,
                                        alt: "image illustration"
                                    }), (0, n.jsx)("div", {
                                        className: "absolute top-16 left-64 h-[172px] w-[172px] animate-topdown",
                                        children: (0, n.jsx)(s(), {
                                            src: r,
                                            alt: "",
                                            layout: "fill",
                                            objectFit: "cover",
                                            quality: 100
                                        })
                                    }), (0, n.jsx)("div", {
                                        className: "absolute bottom-64 right-28 h-[157px] w-[157px] animate-topdown",
                                        children: (0, n.jsx)(s(), {
                                            src: i,
                                            alt: "",
                                            layout: "fill",
                                            objectFit: "cover",
                                            quality: 100
                                        })
                                    }), (0, n.jsx)("div", {
                                        className: "absolute bottom-56 left-28 h-[182px] w-[182px] animate-topdown",
                                        children: (0, n.jsx)(s(), {
                                            src: o,
                                            alt: "",
                                            layout: "fill",
                                            objectFit: "cover",
                                            quality: 100
                                        })
                                    })]
                                }), (0, n.jsx)("div", {
                                    className: "relative block xl:hidden",
                                    children: (0, n.jsx)(s(), {
                                        src: x,
                                        placeholder: "blur",
                                        blurDataURL: x,
                                        width: 5112,
                                        height: 5963,
                                        objectFit: "contain",
                                        priority: !0,
                                        alt: "hero image illustration"
                                    })
                                })]
                            })]
                        })]
                    })
                })
            };
            var w = function(e) {
                var t = e.theme,
                    r = e.featureCardData,
                    a = e.aos_style;
                return (0, n.jsx)(n.Fragment, {
                    children: (0, n.jsx)("div", {
                        "data-aos": a,
                        className: "z-[200]",
                        children: (0, n.jsxs)("div", {
                            style: {
                                borderBottomColor: r.HEXValue + "63"
                            },
                            className: "".concat("dark" === t ? "bg-[#181a1b]" : "bg-[#fff]", " flex min-h-[330px] max-w-[380px] flex-col items-center gap-y-4 px-4 py-12 rounded-md border-b-[6px]  shadow-md z-20"),
                            children: [(0, n.jsx)("div", {
                                className: "grid place-content-center rounded-full p-4",
                                style: {
                                    backgroundColor: r.HEXValue + "63"
                                },
                                children: (0, n.jsx)("div", {
                                    className: "",
                                    dangerouslySetInnerHTML: {
                                        __html: null !== r.CardIconSVG ? r.CardIconSVG : '<svg width="32" height="30" viewBox="0 0 32 30" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14.1784 0.532847C13.5056 0.713151 13.2095 0.884868 12.7161 1.3485C11.9267 2.10406 11.7383 2.71366 11.7383 4.52527C11.7383 6.25962 11.9177 6.89497 12.6085 7.62477C13.3531 8.41467 14.1335 8.64648 16.0443 8.64648C17.9731 8.64648 18.7715 8.39749 19.4982 7.59901C20.1889 6.82628 20.3504 6.25103 20.3504 4.52527C20.3504 2.67931 20.162 2.08689 19.3098 1.29699C18.5473 0.584363 18.1256 0.464161 16.2238 0.429817C15.0486 0.412645 14.5372 0.438403 14.1784 0.532847ZM17.6591 2.59345C18.1256 2.82527 18.1974 3.08285 18.1974 4.52527C18.1974 6.52578 18.1346 6.58588 16.0443 6.58588C13.9541 6.58588 13.8913 6.52578 13.8913 4.52527C13.8913 2.52477 13.9451 2.47325 16.0264 2.46467C17.085 2.46467 17.4618 2.49042 17.6591 2.59345Z" fill="'.concat(r.HEXValue, '"/><path d="M15.5957 10.8535C15.0844 11.1025 14.9677 11.4373 14.9677 12.6995V13.7984H11.1102C6.43635 13.7984 6.23899 13.8242 5.27909 14.6399C4.49862 15.2924 4.15772 16.254 4.21155 17.5591C4.2564 18.3747 4.42685 18.6666 4.97408 18.8555C5.28806 18.9585 5.35983 18.9585 5.68279 18.8126C6.19413 18.5808 6.35561 18.2287 6.35561 17.3358C6.35561 16.8636 6.40046 16.5373 6.49017 16.3742C6.76827 15.8591 6.77725 15.8591 11.0654 15.8591H14.9677V16.9495C14.9677 18.2459 15.0754 18.555 15.6316 18.8126C15.9546 18.9585 16.0174 18.9671 16.3403 18.8555C16.9772 18.6409 17.0759 18.4262 17.1028 17.0525L17.1387 15.8591H21.0321C25.3113 15.8591 25.3203 15.8591 25.5984 16.3742C25.697 16.5631 25.7329 16.9237 25.7329 17.851C25.7329 19.2934 25.8316 19.5767 26.3968 19.8429C26.7197 19.9889 26.7825 19.9974 27.1055 19.8858C27.7514 19.6712 27.8411 19.4565 27.868 18.0656C27.9129 16.1939 27.7245 15.5242 26.8991 14.7429C25.9572 13.8328 25.7329 13.7984 20.9783 13.7984H17.1208V12.7252C17.1208 11.9868 17.0759 11.5575 16.9952 11.3515C16.7619 10.8192 16.134 10.5959 15.5957 10.8535Z" fill="').concat(r.HEXValue, '"/><path d="M3.43152 21.1307C2.24735 21.4054 1.33231 22.3155 1.07215 23.4832C0.93759 24.11 0.946561 26.265 1.09907 26.8575C1.38614 28.0337 2.31912 28.9095 3.55712 29.1585C4.212 29.2873 6.46371 29.2787 7.08271 29.1327C8.31173 28.858 9.22677 27.965 9.48693 26.7802C9.61252 26.1963 9.61252 24.0671 9.48693 23.4832C9.22677 22.2984 8.31173 21.4054 7.08271 21.1307C6.44577 20.9847 4.05949 20.9847 3.43152 21.1307ZM6.89432 23.1999C7.36081 23.4317 7.43258 23.6893 7.43258 25.1317C7.43258 27.1322 7.36978 27.1923 5.27954 27.1923C3.18931 27.1923 3.12651 27.1322 3.12651 25.1317C3.12651 23.1312 3.18033 23.0797 5.2616 23.0711C6.32018 23.0711 6.69696 23.0969 6.89432 23.1999Z" fill="').concat(r.HEXValue, '"/><path d="M14.1963 21.1307C13.5953 21.2681 13.0122 21.6029 12.6085 22.0322C11.9177 22.762 11.7383 23.3974 11.7383 25.1317C11.7383 26.9433 11.9267 27.5529 12.7251 28.3085C13.5235 29.0726 14.1515 29.2529 16.0713 29.2529C17.9731 29.2529 18.7715 29.0039 19.4982 28.2055C20.1889 27.4327 20.3504 26.8575 20.3504 25.1317C20.3504 23.406 20.1889 22.8307 19.4982 22.058C19.0855 21.6029 18.5024 21.2767 17.8475 21.1307C17.2106 20.9847 14.8243 20.9847 14.1963 21.1307ZM17.6591 23.1999C18.1256 23.4317 18.1974 23.6893 18.1974 25.1317C18.1974 27.1322 18.1346 27.1923 16.0443 27.1923C14.5372 27.1923 14.2681 27.1236 14.0259 26.6772C13.9272 26.4883 13.8913 26.1191 13.8913 25.1317C13.8913 23.1312 13.9451 23.0797 16.0264 23.0711C17.085 23.0711 17.4618 23.0969 17.6591 23.1999Z" fill="').concat(r.HEXValue, '"/><path d="M24.9708 21.1307C23.7866 21.414 22.9074 22.264 22.6293 23.406C22.4768 23.9984 22.4679 26.1534 22.6024 26.7802C22.746 27.4156 22.9882 27.8363 23.4906 28.3085C24.289 29.0726 24.9169 29.2529 26.8367 29.2529C28.7386 29.2529 29.537 29.0039 30.2636 28.2055C30.9544 27.4327 31.1159 26.8575 31.1159 25.1317C31.1159 23.406 30.9544 22.8307 30.2636 22.058C29.851 21.6029 29.2679 21.2767 28.613 21.1307C27.976 20.9847 25.5898 20.9847 24.9708 21.1307ZM28.4246 23.1999C28.8911 23.4317 28.9629 23.6893 28.9629 25.1317C28.9629 27.1322 28.9001 27.1923 26.8098 27.1923C24.7196 27.1923 24.6568 27.1322 24.6568 25.1317C24.6568 23.1312 24.7106 23.0797 26.7919 23.0711C27.8504 23.0711 28.2272 23.0969 28.4246 23.1999Z" fill="').concat(r.HEXValue, '"/></svg>')
                                    }
                                })
                            }), (0, n.jsx)("p", {
                                className: "text-lg font-bold ".concat("dark" === t && "text-[#e8e6e3]"),
                                children: r.CardHeading
                            }), (0, n.jsx)("p", {
                                className: "max-w-[80%] font-rubik text-base ".concat("dark" === t ? "text-[#989082]" : "text-subText"),
                                children: r.CardDescription
                            })]
                        })
                    })
                })
            };
            var N = function(e) {
                    var t = e.featureCardData,
                        r = (0, a.useContext)(d.Z).theme;
                    return (0, n.jsxs)("div", {
                        className: "".concat("dark" === r ? "bg-[#1b1d1e]" : "bg-section_bg", " relative"),
                        children: [(0, n.jsx)("img", {
                            src: c.SQ,
                            alt: "zig-zag",
                            className: "absolute top-16 left-0 z-[1]"
                        }), (0, n.jsxs)("div", {
                            className: "mx-auto max-w-maxScreen py-12 px-6 md:px-0 z-[100]",
                            children: [(0, n.jsxs)("div", {
                                className: "w-full text-center md:py-14 py-10",
                                children: [(0, n.jsx)("p", {
                                    className: "pre_heading ".concat("dark" === r ? "text-[#6e96cf]" : "text-brand"),
                                    children: "Why Code-help?"
                                }), (0, n.jsx)("p", {
                                    className: "section_heading ".concat("dark" === r ? "text-[#e8e6e3]" : "text-headText", " mx-auto max-w-xl font-rubik"),
                                    children: "Making learning easier and more convenient for you."
                                })]
                            }), (0, n.jsx)("div", {
                                className: "mx-auto grid w-fit justify-center gap-x-6 gap-y-16 py-6 text-center lg:grid-cols-2 xl:grid-cols-3",
                                children: t.map((function(e, t) {
                                    var a = 0 == t || 3 == t ? "fade-right" : 1 == t || 4 == t ? "fade-up" : "fade-left";
                                    return (0, n.jsx)(w, {
                                        theme: r,
                                        featureCardData: e,
                                        aos_style: a
                                    }, t)
                                }))
                            })]
                        })]
                    })
                },
                _ = r(7857);
            var C = function(e) {
                var t = e.socialMediaCount,
                    r = (0, a.useState)(!1),
                    o = r[0],
                    i = r[1],
                    u = (0, a.useRef)(null),
                    p = (0, a.useContext)(d.Z).theme;
                return (0, a.useEffect)((function() {
                    var e, t = window.pageYOffset;
                    t >= (null === (e = u.current) || void 0 === e ? void 0 : e.offsetHeight) && i(!0), window.addEventListener("scroll", (function() {
                        var e;
                        (t = window.pageYOffset) >= (null === (e = u.current) || void 0 === e ? void 0 : e.offsetHeight) && i(!0)
                    }))
                }), []), (0, n.jsxs)("div", {
                    className: "relative ".concat("dark" === p ? "bg-[#29347a]" : "bg-brand", " "),
                    children: [(0, n.jsx)("div", {
                        className: "absolute top-0 left-0 hidden h-10 w-40 rotate-180 sm:block",
                        children: (0, n.jsx)(s(), {
                            src: c.Bw,
                            alt: "dotted_illus",
                            layout: "fill"
                        })
                    }), (0, n.jsx)("div", {
                        className: "absolute bottom-0 right-0 hidden h-10 w-40 sm:block",
                        children: (0, n.jsx)(s(), {
                            src: c.Bw,
                            alt: "dotted_illus",
                            layout: "fill"
                        })
                    }), (0, n.jsx)("div", {
                        className: "absolute bottom-0 left-0 hidden h-28 w-28 sm:block",
                        children: (0, n.jsx)(s(), {
                            src: c.cl,
                            width: 20,
                            height: 20,
                            alt: "",
                            layout: "responsive"
                        })
                    }), (0, n.jsx)("div", {
                        className: "absolute top-0 right-0 hidden h-28 w-28 rotate-180 sm:block",
                        children: (0, n.jsx)(s(), {
                            src: c.cl,
                            width: 20,
                            height: 20,
                            alt: "",
                            layout: "responsive"
                        })
                    }), (0, n.jsx)("div", {
                        className: "relative mx-auto grid max-w-maxScreen grid-cols-2 gap-y-16 overflow-hidden py-16 px-10 font-bold ".concat("dark" === p ? "text-[#e8e6e3]" : "text-[#fff]", " sm:grid-cols-4 md:gap-0"),
                        ref: u,
                        children: o ? (0, n.jsx)(n.Fragment, {
                            children: t.map((function(e, r) {
                                return (0, n.jsxs)("div", {
                                    className: "flex flex-col items-center gap-y-4 ".concat(t.length - 1 === r ? "" : "border-r-grey50 sm:border-r", "  "),
                                    children: [(0, n.jsxs)("div", {
                                        className: "text-4xl md:text-5xl",
                                        children: [(0, n.jsx)(_.ZP, {
                                            start: 0,
                                            end: e.SocialMediaCount
                                        }), e.PrefixAfterCount]
                                    }), (0, n.jsxs)("div", {
                                        className: "text-center font-medium",
                                        children: [e.BottomText.split(" ")[0], " ", (0, n.jsx)("br", {}), " ", (0, n.jsx)(l(), {
                                            href: e.SocialMediaLink,
                                            children: (0, n.jsx)("a", {
                                                target: "_blank",
                                                rel: "noopener noreferrer",
                                                className: "underline",
                                                children: e.BottomText.split(" ").slice(1).join(" ")
                                            })
                                        })]
                                    })]
                                }, r)
                            }))
                        }) : (0, n.jsx)(n.Fragment, {})
                    })]
                })
            };
            var E = function(e) {
                    var t, r, o, i = e.instructorData,
                        u = (0, a.useContext)(d.Z).theme;
                    return (0, n.jsxs)("div", {
                        className: "relative overflow-y-hidden",
                        children: [(0, n.jsx)("img", {
                            src: c.wp,
                            alt: "bg-illus",
                            className: "absolute top-0 left-0 h-[850px] w-[100vw] object-cover md:-translate-y-72 -translate-y-52"
                        }), (0, n.jsx)("div", {
                            className: "absolute bottom-10 -left-40 -z-40 h-[490px] w-[490px] rounded-full bg-brand100/10 blur-[100px]"
                        }), (0, n.jsxs)("div", {
                            className: "relative mx-auto max-w-maxScreen px-6 py-12",
                            children: [(0, n.jsxs)("div", {
                                className: "flex items-center justify-between py-6",
                                children: [(0, n.jsxs)("p", {
                                    className: "section_heading font-rubik ".concat("dark" === u ? "text-[#e8e6e3]" : "text-headText"),
                                    children: ["Meet your ", (0, n.jsx)("span", {
                                        className: "".concat("dark" === u ? "text-[#6e96cf]" : "text-brand"),
                                        children: "Instructor"
                                    })]
                                }), (0, n.jsx)(l(), {
                                    href: "/about",
                                    children: (0, n.jsx)("a", {
                                        children: (0, n.jsx)(y.Z, {
                                            theme: u,
                                            option: "solid",
                                            classes: "md:px-7 md:py-3 px-4 py-2 text-sm md:text-base whitespace-nowrap",
                                            children: "Know more"
                                        })
                                    })
                                })]
                            }), (0, n.jsx)("div", {
                                className: "h-[1px] w-full bg-subText"
                            }), (0, n.jsxs)("div", {
                                className: "space-y-4 py-16",
                                "data-aos": "fade-up",
                                children: [(0, n.jsx)("div", {
                                    className: "mx-auto h-52 w-52 overflow-hidden rounded-full md:h-64 md:w-64",
                                    children: (0, n.jsx)(s(), {
                                        src: null === i || void 0 === i || null === (t = i.InstructorProfilePic) || void 0 === t || null === (r = t.data) || void 0 === r || null === (o = r.attributes) || void 0 === o ? void 0 : o.url,
                                        width: 20,
                                        height: 20,
                                        priority: !0,
                                        layout: "responsive",
                                        alt: "Love Babbar Headshot Image",
                                        className: "object-cover object-top"
                                    })
                                }), (0, n.jsxs)("div", {
                                    className: "text-center font-rubik",
                                    children: [(0, n.jsx)("p", {
                                        className: "text-3xl ".concat("dark" === u && "text-[#e8e6e3]", " font-bold"),
                                        children: null === i || void 0 === i ? void 0 : i.InstructorName
                                    }), (0, n.jsx)("p", {
                                        className: "text-2xl ".concat("dark" === u ? "text-[#989082]" : "text-subText"),
                                        children: null === i || void 0 === i ? void 0 : i.InstructorDesignition
                                    })]
                                })]
                            }), (0, n.jsx)("div", {
                                className: "grid grid-cols-1 gap-16 pb-24 pt-10 md:grid-cols-3 md:gap-0",
                                "data-aos": "fade-up",
                                children: null === i || void 0 === i ? void 0 : i.CompanysWorkedIn.map((function(e, t) {
                                    var r, a, o;
                                    return (0, n.jsxs)("div", {
                                        className: "text-center",
                                        children: ["dark" === u && 0 === t ? (0, n.jsx)("img", {
                                            src: c.UY,
                                            alt: "company logo",
                                            className: "mx-auto w-fit w-[185px] h-[45px] object-contain"
                                        }) : (0, n.jsx)("img", {
                                            src: null === e || void 0 === e || null === (r = e.CompanyLogo) || void 0 === r || null === (a = r.data) || void 0 === a || null === (o = a.attributes) || void 0 === o ? void 0 : o.url,
                                            alt: "company logo",
                                            className: "mx-auto w-fit"
                                        }), (0, n.jsx)("p", {
                                            className: "text-xl ".concat("dark" === u ? "text-[#b4ada3]" : "text-textpara"),
                                            children: null === e || void 0 === e ? void 0 : e.CompanyRole
                                        })]
                                    }, t)
                                }))
                            })]
                        })]
                    })
                },
                O = !0;

            function k(e) {
                var t = e.featureCardData,
                    r = e.socialLinks,
                    a = e.socialMediaCount,
                    o = e.testimonial,
                    s = e.instructorData,
                    i = e.coursesData;
                return (0, n.jsxs)("div", {
                    className: "animate__animated animate__fadeIn animate__fast",
                    children: [(0, n.jsx)(j, {}), (0, n.jsx)("section", {
                        className: "home__statsCounterSection",
                        children: (0, n.jsx)(C, {
                            socialMediaCount: a
                        })
                    }), (0, n.jsx)("section", {
                        className: "home__whyCodeHelpSection",
                        children: (0, n.jsx)(N, {
                            featureCardData: t
                        })
                    }), (0, n.jsx)("section", {
                        className: "home__instructorProfileSection",
                        children: (0, n.jsx)(E, {
                            instructorData: s
                        })
                    }), (0, n.jsx)("section", {
                        className: "home__placementSection",
                        children: (0, n.jsx)(f, {})
                    }), (0, n.jsx)("section", {
                        className: "home__currentCoursesSection",
                        id: "courses",
                        children: (0, n.jsx)(p, {
                            coursesData: i
                        })
                    }), (0, n.jsx)("section", {
                        className: "home__upcomingCoursesSection",
                        children: (0, n.jsx)(v, {
                            coursesData: i
                        })
                    }), (0, n.jsx)("section", {
                        className: "home__reviewsSection",
                        children: (0, n.jsx)(x.Z, {
                            testimonial: o
                        })
                    }), (0, n.jsx)("section", {
                        className: "home_joinCodingFamilySection",
                        children: (0, n.jsx)(m, {
                            socialLinks: r
                        })
                    })]
                })
            }
        },
        7663: function(e) {
            ! function() {
                var t = {
                        308: function(e) {
                            var t, r, n = e.exports = {};

                            function a() {
                                throw new Error("setTimeout has not been defined")
                            }

                            function o() {
                                throw new Error("clearTimeout has not been defined")
                            }

                            function s(e) {
                                if (t === setTimeout) return setTimeout(e, 0);
                                if ((t === a || !t) && setTimeout) return t = setTimeout, setTimeout(e, 0);
                                try {
                                    return t(e, 0)
                                } catch (n) {
                                    try {
                                        return t.call(null, e, 0)
                                    } catch (n) {
                                        return t.call(this, e, 0)
                                    }
                                }
                            }! function() {
                                try {
                                    t = "function" === typeof setTimeout ? setTimeout : a
                                } catch (e) {
                                    t = a
                                }
                                try {
                                    r = "function" === typeof clearTimeout ? clearTimeout : o
                                } catch (e) {
                                    r = o
                                }
                            }();
                            var i, l = [],
                                c = !1,
                                u = -1;

                            function d() {
                                c && i && (c = !1, i.length ? l = i.concat(l) : u = -1, l.length && p())
                            }

                            function p() {
                                if (!c) {
                                    var e = s(d);
                                    c = !0;
                                    for (var t = l.length; t;) {
                                        for (i = l, l = []; ++u < t;) i && i[u].run();
                                        u = -1, t = l.length
                                    }
                                    i = null, c = !1,
                                        function(e) {
                                            if (r === clearTimeout) return clearTimeout(e);
                                            if ((r === o || !r) && clearTimeout) return r = clearTimeout, clearTimeout(e);
                                            try {
                                                r(e)
                                            } catch (t) {
                                                try {
                                                    return r.call(null, e)
                                                } catch (t) {
                                                    return r.call(this, e)
                                                }
                                            }
                                        }(e)
                                }
                            }

                            function f(e, t) {
                                this.fun = e, this.array = t
                            }

                            function h() {}
                            n.nextTick = function(e) {
                                var t = new Array(arguments.length - 1);
                                if (arguments.length > 1)
                                    for (var r = 1; r < arguments.length; r++) t[r - 1] = arguments[r];
                                l.push(new f(e, t)), 1 !== l.length || c || s(p)
                            }, f.prototype.run = function() {
                                this.fun.apply(null, this.array)
                            }, n.title = "browser", n.browser = !0, n.env = {}, n.argv = [], n.version = "", n.versions = {}, n.on = h, n.addListener = h, n.once = h, n.off = h, n.removeListener = h, n.removeAllListeners = h, n.emit = h, n.prependListener = h, n.prependOnceListener = h, n.listeners = function(e) {
                                return []
                            }, n.binding = function(e) {
                                throw new Error("process.binding is not supported")
                            }, n.cwd = function() {
                                return "/"
                            }, n.chdir = function(e) {
                                throw new Error("process.chdir is not supported")
                            }, n.umask = function() {
                                return 0
                            }
                        }
                    },
                    r = {};

                function n(e) {
                    var a = r[e];
                    if (void 0 !== a) return a.exports;
                    var o = r[e] = {
                            exports: {}
                        },
                        s = !0;
                    try {
                        t[e](o, o.exports, n), s = !1
                    } finally {
                        s && delete r[e]
                    }
                    return o.exports
                }
                n.ab = "//";
                var a = n(308);
                e.exports = a
            }()
        },
        7857: function(e, t, r) {
            "use strict";
            var n = r(7294),
                a = r(8273);

            function o(e, t) {
                var r = Object.keys(e);
                if (Object.getOwnPropertySymbols) {
                    var n = Object.getOwnPropertySymbols(e);
                    t && (n = n.filter((function(t) {
                        return Object.getOwnPropertyDescriptor(e, t).enumerable
                    }))), r.push.apply(r, n)
                }
                return r
            }

            function s(e) {
                for (var t = 1; t < arguments.length; t++) {
                    var r = null != arguments[t] ? arguments[t] : {};
                    t % 2 ? o(Object(r), !0).forEach((function(t) {
                        i(e, t, r[t])
                    })) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(r)) : o(Object(r)).forEach((function(t) {
                        Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(r, t))
                    }))
                }
                return e
            }

            function i(e, t, r) {
                return t in e ? Object.defineProperty(e, t, {
                    value: r,
                    enumerable: !0,
                    configurable: !0,
                    writable: !0
                }) : e[t] = r, e
            }

            function l() {
                return l = Object.assign ? Object.assign.bind() : function(e) {
                    for (var t = 1; t < arguments.length; t++) {
                        var r = arguments[t];
                        for (var n in r) Object.prototype.hasOwnProperty.call(r, n) && (e[n] = r[n])
                    }
                    return e
                }, l.apply(this, arguments)
            }

            function c(e, t) {
                if (null == e) return {};
                var r, n, a = function(e, t) {
                    if (null == e) return {};
                    var r, n, a = {},
                        o = Object.keys(e);
                    for (n = 0; n < o.length; n++) r = o[n], t.indexOf(r) >= 0 || (a[r] = e[r]);
                    return a
                }(e, t);
                if (Object.getOwnPropertySymbols) {
                    var o = Object.getOwnPropertySymbols(e);
                    for (n = 0; n < o.length; n++) r = o[n], t.indexOf(r) >= 0 || Object.prototype.propertyIsEnumerable.call(e, r) && (a[r] = e[r])
                }
                return a
            }
            var u = "undefined" !== typeof window && "undefined" !== typeof window.document && "undefined" !== typeof window.document.createElement ? n.useLayoutEffect : n.useEffect;

            function d(e) {
                var t = n.useRef(e);
                return u((function() {
                    t.current = e
                })), n.useCallback((function() {
                    for (var e = arguments.length, r = new Array(e), n = 0; n < e; n++) r[n] = arguments[n];
                    return t.current.apply(void 0, r)
                }), [])
            }
            var p = ["ref", "startOnMount", "enableReinitialize", "delay", "onEnd", "onStart", "onPauseResume", "onReset", "onUpdate"],
                f = {
                    decimal: ".",
                    delay: null,
                    prefix: "",
                    suffix: "",
                    duration: 2,
                    start: 0,
                    startOnMount: !0,
                    enableReinitialize: !0
                },
                h = function(e) {
                    var t = n.useMemo((function() {
                            return s(s({}, f), e)
                        }), [e]),
                        r = t.ref,
                        o = t.startOnMount,
                        i = t.enableReinitialize,
                        l = t.delay,
                        u = t.onEnd,
                        h = t.onStart,
                        m = t.onPauseResume,
                        x = t.onReset,
                        v = t.onUpdate,
                        b = c(t, p),
                        g = n.useRef(),
                        y = n.useRef(),
                        j = n.useRef(!1),
                        w = d((function() {
                            return function(e, t) {
                                var r = t.decimal,
                                    n = t.decimals,
                                    o = t.duration,
                                    s = t.easingFn,
                                    i = t.end,
                                    l = t.formattingFn,
                                    c = t.numerals,
                                    u = t.prefix,
                                    d = t.separator,
                                    p = t.start,
                                    f = t.suffix,
                                    h = t.useEasing,
                                    m = t.enableScrollSpy,
                                    x = t.scrollSpyDelay,
                                    v = t.scrollSpyOnce;
                                return new a.CountUp(e, i, {
                                    startVal: p,
                                    duration: o,
                                    decimal: r,
                                    decimalPlaces: n,
                                    easingFn: s,
                                    formattingFn: l,
                                    numerals: c,
                                    separator: d,
                                    prefix: u,
                                    suffix: f,
                                    useEasing: h,
                                    useGrouping: !!d,
                                    enableScrollSpy: m,
                                    scrollSpyDelay: x,
                                    scrollSpyOnce: v
                                })
                            }("string" === typeof r ? r : r.current, b)
                        })),
                        N = d((function(e) {
                            var t = g.current;
                            if (t && !e) return t;
                            var r = w();
                            return g.current = r, r
                        })),
                        _ = d((function() {
                            var e = function() {
                                return N(!0).start((function() {
                                    null === u || void 0 === u || u({
                                        pauseResume: C,
                                        reset: E,
                                        start: k,
                                        update: O
                                    })
                                }))
                            };
                            l && l > 0 ? y.current = setTimeout(e, 1e3 * l) : e(), null === h || void 0 === h || h({
                                pauseResume: C,
                                reset: E,
                                update: O
                            })
                        })),
                        C = d((function() {
                            N().pauseResume(), null === m || void 0 === m || m({
                                reset: E,
                                start: k,
                                update: O
                            })
                        })),
                        E = d((function() {
                            N().el && (y.current && clearTimeout(y.current), N().reset(), null === x || void 0 === x || x({
                                pauseResume: C,
                                start: k,
                                update: O
                            }))
                        })),
                        O = d((function(e) {
                            N().update(e), null === v || void 0 === v || v({
                                pauseResume: C,
                                reset: E,
                                start: k
                            })
                        })),
                        k = d((function() {
                            E(), _()
                        })),
                        S = d((function(e) {
                            o && (e && E(), _())
                        }));
                    return n.useEffect((function() {
                        j.current ? i && S(!0) : (j.current = !0, S())
                    }), [i, j, S, l, e.start, e.suffix, e.prefix, e.duration, e.separator, e.decimals, e.decimal, e.formattingFn]), n.useEffect((function() {
                        return function() {
                            E()
                        }
                    }), [E]), {
                        start: k,
                        pauseResume: C,
                        reset: E,
                        update: O,
                        getCountUp: N
                    }
                },
                m = ["className", "redraw", "containerProps", "children", "style"];
            t.ZP = function(e) {
                var t = e.className,
                    r = e.redraw,
                    a = e.containerProps,
                    o = e.children,
                    i = e.style,
                    u = c(e, m),
                    p = n.useRef(null),
                    f = n.useRef(!1),
                    x = h(s(s({}, u), {}, {
                        ref: p,
                        startOnMount: "function" !== typeof o || 0 === e.delay,
                        enableReinitialize: !1
                    })),
                    v = x.start,
                    b = x.reset,
                    g = x.update,
                    y = x.pauseResume,
                    j = x.getCountUp,
                    w = d((function() {
                        v()
                    })),
                    N = d((function(t) {
                        e.preserveValue || b(), g(t)
                    })),
                    _ = d((function() {
                        "function" !== typeof e.children || p.current instanceof Element ? j() : console.error('Couldn\'t find attached element to hook the CountUp instance into! Try to attach "containerRef" from the render prop to a an Element, eg. <span ref={containerRef} />.')
                    }));
                n.useEffect((function() {
                    _()
                }), [_]), n.useEffect((function() {
                    f.current && N(e.end)
                }), [e.end, N]);
                var C = r && e;
                return n.useEffect((function() {
                    r && f.current && w()
                }), [w, r, C]), n.useEffect((function() {
                    !r && f.current && w()
                }), [w, r, e.start, e.suffix, e.prefix, e.duration, e.separator, e.decimals, e.decimal, e.className, e.formattingFn]), n.useEffect((function() {
                    f.current = !0
                }), []), "function" === typeof o ? o({
                    countUpRef: p,
                    start: v,
                    reset: b,
                    update: g,
                    pauseResume: y,
                    getCountUp: j
                }) : n.createElement("span", l({
                    className: t,
                    ref: p,
                    style: i
                }, a), "undefined" !== typeof e.start ? j().formattingFn(e.start) : "")
            }
        },
        5459: function(e, t, r) {
            var n, a = r(3454);
            "undefined" != typeof self && self, n = e => (() => {
                var t = {
                        7403: (e, t, r) => {
                            "use strict";
                            r.d(t, {
                                default: () => C
                            });
                            var n = r(4087),
                                a = r.n(n);
                            const o = function(e) {
                                    return new RegExp(/<[a-z][\s\S]*>/i).test(e)
                                },
                                s = function(e) {
                                    var t = document.createElement("div");
                                    return t.innerHTML = e, t.childNodes
                                },
                                i = function(e, t) {
                                    return Math.floor(Math.random() * (t - e + 1)) + e
                                };
                            var l = "TYPE_CHARACTER",
                                c = "REMOVE_CHARACTER",
                                u = "REMOVE_ALL",
                                d = "REMOVE_LAST_VISIBLE_NODE",
                                p = "PAUSE_FOR",
                                f = "CALL_FUNCTION",
                                h = "ADD_HTML_TAG_ELEMENT",
                                m = "CHANGE_DELETE_SPEED",
                                x = "CHANGE_DELAY",
                                v = "CHANGE_CURSOR",
                                b = "PASTE_STRING",
                                g = "HTML_TAG";

                            function y(e, t) {
                                var r = Object.keys(e);
                                if (Object.getOwnPropertySymbols) {
                                    var n = Object.getOwnPropertySymbols(e);
                                    t && (n = n.filter((function(t) {
                                        return Object.getOwnPropertyDescriptor(e, t).enumerable
                                    }))), r.push.apply(r, n)
                                }
                                return r
                            }

                            function j(e) {
                                for (var t = 1; t < arguments.length; t++) {
                                    var r = null != arguments[t] ? arguments[t] : {};
                                    t % 2 ? y(Object(r), !0).forEach((function(t) {
                                        _(e, t, r[t])
                                    })) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(r)) : y(Object(r)).forEach((function(t) {
                                        Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(r, t))
                                    }))
                                }
                                return e
                            }

                            function w(e) {
                                return function(e) {
                                    if (Array.isArray(e)) return N(e)
                                }(e) || function(e) {
                                    if ("undefined" != typeof Symbol && null != e[Symbol.iterator] || null != e["@@iterator"]) return Array.from(e)
                                }(e) || function(e, t) {
                                    if (e) {
                                        if ("string" == typeof e) return N(e, t);
                                        var r = Object.prototype.toString.call(e).slice(8, -1);
                                        return "Object" === r && e.constructor && (r = e.constructor.name), "Map" === r || "Set" === r ? Array.from(e) : "Arguments" === r || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r) ? N(e, t) : void 0
                                    }
                                }(e) || function() {
                                    throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")
                                }()
                            }

                            function N(e, t) {
                                (null == t || t > e.length) && (t = e.length);
                                for (var r = 0, n = new Array(t); r < t; r++) n[r] = e[r];
                                return n
                            }

                            function _(e, t, r) {
                                return t in e ? Object.defineProperty(e, t, {
                                    value: r,
                                    enumerable: !0,
                                    configurable: !0,
                                    writable: !0
                                }) : e[t] = r, e
                            }
                            const C = function() {
                                function e(t, r) {
                                    var y = this;
                                    if (function(e, t) {
                                            if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                                        }(this, e), _(this, "state", {
                                            cursorAnimation: null,
                                            lastFrameTime: null,
                                            pauseUntil: null,
                                            eventQueue: [],
                                            eventLoop: null,
                                            eventLoopPaused: !1,
                                            reverseCalledEvents: [],
                                            calledEvents: [],
                                            visibleNodes: [],
                                            initialOptions: null,
                                            elements: {
                                                container: null,
                                                wrapper: document.createElement("span"),
                                                cursor: document.createElement("span")
                                            }
                                        }), _(this, "options", {
                                            strings: null,
                                            cursor: "|",
                                            delay: "natural",
                                            pauseFor: 1500,
                                            deleteSpeed: "natural",
                                            loop: !1,
                                            autoStart: !1,
                                            devMode: !1,
                                            skipAddStyles: !1,
                                            wrapperClassName: "Typewriter__wrapper",
                                            cursorClassName: "Typewriter__cursor",
                                            stringSplitter: null,
                                            onCreateTextNode: null,
                                            onRemoveNode: null
                                        }), _(this, "setupWrapperElement", (function() {
                                            y.state.elements.container && (y.state.elements.wrapper.className = y.options.wrapperClassName, y.state.elements.cursor.className = y.options.cursorClassName, y.state.elements.cursor.innerHTML = y.options.cursor, y.state.elements.container.innerHTML = "", y.state.elements.container.appendChild(y.state.elements.wrapper), y.state.elements.container.appendChild(y.state.elements.cursor))
                                        })), _(this, "start", (function() {
                                            return y.state.eventLoopPaused = !1, y.runEventLoop(), y
                                        })), _(this, "pause", (function() {
                                            return y.state.eventLoopPaused = !0, y
                                        })), _(this, "stop", (function() {
                                            return y.state.eventLoop && ((0, n.cancel)(y.state.eventLoop), y.state.eventLoop = null), y
                                        })), _(this, "pauseFor", (function(e) {
                                            return y.addEventToQueue(p, {
                                                ms: e
                                            }), y
                                        })), _(this, "typeOutAllStrings", (function() {
                                            return "string" == typeof y.options.strings ? (y.typeString(y.options.strings).pauseFor(y.options.pauseFor), y) : (y.options.strings.forEach((function(e) {
                                                y.typeString(e).pauseFor(y.options.pauseFor).deleteAll(y.options.deleteSpeed)
                                            })), y)
                                        })), _(this, "typeString", (function(e) {
                                            var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : null;
                                            if (o(e)) return y.typeOutHTMLString(e, t);
                                            if (e) {
                                                var r = y.options || {},
                                                    n = r.stringSplitter,
                                                    a = "function" == typeof n ? n(e) : e.split("");
                                                y.typeCharacters(a, t)
                                            }
                                            return y
                                        })), _(this, "pasteString", (function(e) {
                                            var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : null;
                                            return o(e) ? y.typeOutHTMLString(e, t, !0) : (e && y.addEventToQueue(b, {
                                                character: e,
                                                node: t
                                            }), y)
                                        })), _(this, "typeOutHTMLString", (function(e) {
                                            var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : null,
                                                r = arguments.length > 2 ? arguments[2] : void 0,
                                                n = s(e);
                                            if (n.length > 0)
                                                for (var a = 0; a < n.length; a++) {
                                                    var o = n[a],
                                                        i = o.innerHTML;
                                                    o && 3 !== o.nodeType ? (o.innerHTML = "", y.addEventToQueue(h, {
                                                        node: o,
                                                        parentNode: t
                                                    }), r ? y.pasteString(i, o) : y.typeString(i, o)) : o.textContent && (r ? y.pasteString(o.textContent, t) : y.typeString(o.textContent, t))
                                                }
                                            return y
                                        })), _(this, "deleteAll", (function() {
                                            var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : "natural";
                                            return y.addEventToQueue(u, {
                                                speed: e
                                            }), y
                                        })), _(this, "changeDeleteSpeed", (function(e) {
                                            if (!e) throw new Error("Must provide new delete speed");
                                            return y.addEventToQueue(m, {
                                                speed: e
                                            }), y
                                        })), _(this, "changeDelay", (function(e) {
                                            if (!e) throw new Error("Must provide new delay");
                                            return y.addEventToQueue(x, {
                                                delay: e
                                            }), y
                                        })), _(this, "changeCursor", (function(e) {
                                            if (!e) throw new Error("Must provide new cursor");
                                            return y.addEventToQueue(v, {
                                                cursor: e
                                            }), y
                                        })), _(this, "deleteChars", (function(e) {
                                            if (!e) throw new Error("Must provide amount of characters to delete");
                                            for (var t = 0; t < e; t++) y.addEventToQueue(c);
                                            return y
                                        })), _(this, "callFunction", (function(e, t) {
                                            if (!e || "function" != typeof e) throw new Error("Callbak must be a function");
                                            return y.addEventToQueue(f, {
                                                cb: e,
                                                thisArg: t
                                            }), y
                                        })), _(this, "typeCharacters", (function(e) {
                                            var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : null;
                                            if (!e || !Array.isArray(e)) throw new Error("Characters must be an array");
                                            return e.forEach((function(e) {
                                                y.addEventToQueue(l, {
                                                    character: e,
                                                    node: t
                                                })
                                            })), y
                                        })), _(this, "removeCharacters", (function(e) {
                                            if (!e || !Array.isArray(e)) throw new Error("Characters must be an array");
                                            return e.forEach((function() {
                                                y.addEventToQueue(c)
                                            })), y
                                        })), _(this, "addEventToQueue", (function(e, t) {
                                            var r = arguments.length > 2 && void 0 !== arguments[2] && arguments[2];
                                            return y.addEventToStateProperty(e, t, r, "eventQueue")
                                        })), _(this, "addReverseCalledEvent", (function(e, t) {
                                            var r = arguments.length > 2 && void 0 !== arguments[2] && arguments[2],
                                                n = y.options.loop;
                                            return n ? y.addEventToStateProperty(e, t, r, "reverseCalledEvents") : y
                                        })), _(this, "addEventToStateProperty", (function(e, t) {
                                            var r = arguments.length > 2 && void 0 !== arguments[2] && arguments[2],
                                                n = arguments.length > 3 ? arguments[3] : void 0,
                                                a = {
                                                    eventName: e,
                                                    eventArgs: t || {}
                                                };
                                            return y.state[n] = r ? [a].concat(w(y.state[n])) : [].concat(w(y.state[n]), [a]), y
                                        })), _(this, "runEventLoop", (function() {
                                            y.state.lastFrameTime || (y.state.lastFrameTime = Date.now());
                                            var e = Date.now(),
                                                t = e - y.state.lastFrameTime;
                                            if (!y.state.eventQueue.length) {
                                                if (!y.options.loop) return;
                                                y.state.eventQueue = w(y.state.calledEvents), y.state.calledEvents = [], y.options = j({}, y.state.initialOptions)
                                            }
                                            if (y.state.eventLoop = a()(y.runEventLoop), !y.state.eventLoopPaused) {
                                                if (y.state.pauseUntil) {
                                                    if (e < y.state.pauseUntil) return;
                                                    y.state.pauseUntil = null
                                                }
                                                var r, n = w(y.state.eventQueue),
                                                    o = n.shift();
                                                if (!(t <= (r = o.eventName === d || o.eventName === c ? "natural" === y.options.deleteSpeed ? i(40, 80) : y.options.deleteSpeed : "natural" === y.options.delay ? i(120, 160) : y.options.delay))) {
                                                    var s = o.eventName,
                                                        N = o.eventArgs;
                                                    switch (y.logInDevMode({
                                                        currentEvent: o,
                                                        state: y.state,
                                                        delay: r
                                                    }), s) {
                                                        case b:
                                                        case l:
                                                            var _ = N.character,
                                                                C = N.node,
                                                                E = document.createTextNode(_),
                                                                O = E;
                                                            y.options.onCreateTextNode && "function" == typeof y.options.onCreateTextNode && (O = y.options.onCreateTextNode(_, E)), O && (C ? C.appendChild(O) : y.state.elements.wrapper.appendChild(O)), y.state.visibleNodes = [].concat(w(y.state.visibleNodes), [{
                                                                type: "TEXT_NODE",
                                                                character: _,
                                                                node: O
                                                            }]);
                                                            break;
                                                        case c:
                                                            n.unshift({
                                                                eventName: d,
                                                                eventArgs: {
                                                                    removingCharacterNode: !0
                                                                }
                                                            });
                                                            break;
                                                        case p:
                                                            var k = o.eventArgs.ms;
                                                            y.state.pauseUntil = Date.now() + parseInt(k);
                                                            break;
                                                        case f:
                                                            var S = o.eventArgs,
                                                                T = S.cb,
                                                                A = S.thisArg;
                                                            T.call(A, {
                                                                elements: y.state.elements
                                                            });
                                                            break;
                                                        case h:
                                                            var P = o.eventArgs,
                                                                V = P.node,
                                                                F = P.parentNode;
                                                            F ? F.appendChild(V) : y.state.elements.wrapper.appendChild(V), y.state.visibleNodes = [].concat(w(y.state.visibleNodes), [{
                                                                type: g,
                                                                node: V,
                                                                parentNode: F || y.state.elements.wrapper
                                                            }]);
                                                            break;
                                                        case u:
                                                            var D = y.state.visibleNodes,
                                                                R = N.speed,
                                                                M = [];
                                                            R && M.push({
                                                                eventName: m,
                                                                eventArgs: {
                                                                    speed: R,
                                                                    temp: !0
                                                                }
                                                            });
                                                            for (var L = 0, z = D.length; L < z; L++) M.push({
                                                                eventName: d,
                                                                eventArgs: {
                                                                    removingCharacterNode: !1
                                                                }
                                                            });
                                                            R && M.push({
                                                                eventName: m,
                                                                eventArgs: {
                                                                    speed: y.options.deleteSpeed,
                                                                    temp: !0
                                                                }
                                                            }), n.unshift.apply(n, M);
                                                            break;
                                                        case d:
                                                            var H = o.eventArgs.removingCharacterNode;
                                                            if (y.state.visibleNodes.length) {
                                                                var I = y.state.visibleNodes.pop(),
                                                                    U = I.type,
                                                                    Z = I.node,
                                                                    Q = I.character;
                                                                y.options.onRemoveNode && "function" == typeof y.options.onRemoveNode && y.options.onRemoveNode({
                                                                    node: Z,
                                                                    character: Q
                                                                }), Z && Z.parentNode.removeChild(Z), U === g && H && n.unshift({
                                                                    eventName: d,
                                                                    eventArgs: {}
                                                                })
                                                            }
                                                            break;
                                                        case m:
                                                            y.options.deleteSpeed = o.eventArgs.speed;
                                                            break;
                                                        case x:
                                                            y.options.delay = o.eventArgs.delay;
                                                            break;
                                                        case v:
                                                            y.options.cursor = o.eventArgs.cursor, y.state.elements.cursor.innerHTML = o.eventArgs.cursor
                                                    }
                                                    y.options.loop && (o.eventName === d || o.eventArgs && o.eventArgs.temp || (y.state.calledEvents = [].concat(w(y.state.calledEvents), [o]))), y.state.eventQueue = n, y.state.lastFrameTime = e
                                                }
                                            }
                                        })), t)
                                        if ("string" == typeof t) {
                                            var N = document.querySelector(t);
                                            if (!N) throw new Error("Could not find container element");
                                            this.state.elements.container = N
                                        } else this.state.elements.container = t;
                                    r && (this.options = j(j({}, this.options), r)), this.state.initialOptions = j({}, this.options), this.init()
                                }
                                var t, r;
                                return t = e, (r = [{
                                    key: "init",
                                    value: function() {
                                        var e;
                                        this.setupWrapperElement(), this.addEventToQueue(v, {
                                            cursor: this.options.cursor
                                        }, !0), this.addEventToQueue(u, null, !0), !window || window.___TYPEWRITER_JS_STYLES_ADDED___ || this.options.skipAddStyles || ((e = document.createElement("style")).appendChild(document.createTextNode(".Typewriter__cursor{-webkit-animation:Typewriter-cursor 1s infinite;animation:Typewriter-cursor 1s infinite;margin-left:1px}@-webkit-keyframes Typewriter-cursor{0%{opacity:0}50%{opacity:1}100%{opacity:0}}@keyframes Typewriter-cursor{0%{opacity:0}50%{opacity:1}100%{opacity:0}}")), document.head.appendChild(e), window.___TYPEWRITER_JS_STYLES_ADDED___ = !0), !0 === this.options.autoStart && this.options.strings && this.typeOutAllStrings().start()
                                    }
                                }, {
                                    key: "logInDevMode",
                                    value: function(e) {
                                        this.options.devMode && console.log(e)
                                    }
                                }]) && function(e, t) {
                                    for (var r = 0; r < t.length; r++) {
                                        var n = t[r];
                                        n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(e, n.key, n)
                                    }
                                }(t.prototype, r), Object.defineProperty(t, "prototype", {
                                    writable: !1
                                }), e
                            }()
                        },
                        8552: (e, t, r) => {
                            var n = r(852)(r(5639), "DataView");
                            e.exports = n
                        },
                        1989: (e, t, r) => {
                            var n = r(1789),
                                a = r(401),
                                o = r(7667),
                                s = r(1327),
                                i = r(1866);

                            function l(e) {
                                var t = -1,
                                    r = null == e ? 0 : e.length;
                                for (this.clear(); ++t < r;) {
                                    var n = e[t];
                                    this.set(n[0], n[1])
                                }
                            }
                            l.prototype.clear = n, l.prototype.delete = a, l.prototype.get = o, l.prototype.has = s, l.prototype.set = i, e.exports = l
                        },
                        8407: (e, t, r) => {
                            var n = r(7040),
                                a = r(4125),
                                o = r(2117),
                                s = r(7518),
                                i = r(4705);

                            function l(e) {
                                var t = -1,
                                    r = null == e ? 0 : e.length;
                                for (this.clear(); ++t < r;) {
                                    var n = e[t];
                                    this.set(n[0], n[1])
                                }
                            }
                            l.prototype.clear = n, l.prototype.delete = a, l.prototype.get = o, l.prototype.has = s, l.prototype.set = i, e.exports = l
                        },
                        7071: (e, t, r) => {
                            var n = r(852)(r(5639), "Map");
                            e.exports = n
                        },
                        3369: (e, t, r) => {
                            var n = r(4785),
                                a = r(1285),
                                o = r(6e3),
                                s = r(9916),
                                i = r(5265);

                            function l(e) {
                                var t = -1,
                                    r = null == e ? 0 : e.length;
                                for (this.clear(); ++t < r;) {
                                    var n = e[t];
                                    this.set(n[0], n[1])
                                }
                            }
                            l.prototype.clear = n, l.prototype.delete = a, l.prototype.get = o, l.prototype.has = s, l.prototype.set = i, e.exports = l
                        },
                        3818: (e, t, r) => {
                            var n = r(852)(r(5639), "Promise");
                            e.exports = n
                        },
                        8525: (e, t, r) => {
                            var n = r(852)(r(5639), "Set");
                            e.exports = n
                        },
                        8668: (e, t, r) => {
                            var n = r(3369),
                                a = r(619),
                                o = r(2385);

                            function s(e) {
                                var t = -1,
                                    r = null == e ? 0 : e.length;
                                for (this.__data__ = new n; ++t < r;) this.add(e[t])
                            }
                            s.prototype.add = s.prototype.push = a, s.prototype.has = o, e.exports = s
                        },
                        6384: (e, t, r) => {
                            var n = r(8407),
                                a = r(7465),
                                o = r(3779),
                                s = r(7599),
                                i = r(4758),
                                l = r(4309);

                            function c(e) {
                                var t = this.__data__ = new n(e);
                                this.size = t.size
                            }
                            c.prototype.clear = a, c.prototype.delete = o, c.prototype.get = s, c.prototype.has = i, c.prototype.set = l, e.exports = c
                        },
                        2705: (e, t, r) => {
                            var n = r(5639).Symbol;
                            e.exports = n
                        },
                        1149: (e, t, r) => {
                            var n = r(5639).Uint8Array;
                            e.exports = n
                        },
                        577: (e, t, r) => {
                            var n = r(852)(r(5639), "WeakMap");
                            e.exports = n
                        },
                        4963: e => {
                            e.exports = function(e, t) {
                                for (var r = -1, n = null == e ? 0 : e.length, a = 0, o = []; ++r < n;) {
                                    var s = e[r];
                                    t(s, r, e) && (o[a++] = s)
                                }
                                return o
                            }
                        },
                        4636: (e, t, r) => {
                            var n = r(2545),
                                a = r(5694),
                                o = r(1469),
                                s = r(4144),
                                i = r(5776),
                                l = r(6719),
                                c = Object.prototype.hasOwnProperty;
                            e.exports = function(e, t) {
                                var r = o(e),
                                    u = !r && a(e),
                                    d = !r && !u && s(e),
                                    p = !r && !u && !d && l(e),
                                    f = r || u || d || p,
                                    h = f ? n(e.length, String) : [],
                                    m = h.length;
                                for (var x in e) !t && !c.call(e, x) || f && ("length" == x || d && ("offset" == x || "parent" == x) || p && ("buffer" == x || "byteLength" == x || "byteOffset" == x) || i(x, m)) || h.push(x);
                                return h
                            }
                        },
                        2488: e => {
                            e.exports = function(e, t) {
                                for (var r = -1, n = t.length, a = e.length; ++r < n;) e[a + r] = t[r];
                                return e
                            }
                        },
                        2908: e => {
                            e.exports = function(e, t) {
                                for (var r = -1, n = null == e ? 0 : e.length; ++r < n;)
                                    if (t(e[r], r, e)) return !0;
                                return !1
                            }
                        },
                        8470: (e, t, r) => {
                            var n = r(7813);
                            e.exports = function(e, t) {
                                for (var r = e.length; r--;)
                                    if (n(e[r][0], t)) return r;
                                return -1
                            }
                        },
                        8866: (e, t, r) => {
                            var n = r(2488),
                                a = r(1469);
                            e.exports = function(e, t, r) {
                                var o = t(e);
                                return a(e) ? o : n(o, r(e))
                            }
                        },
                        4239: (e, t, r) => {
                            var n = r(2705),
                                a = r(9607),
                                o = r(2333),
                                s = n ? n.toStringTag : void 0;
                            e.exports = function(e) {
                                return null == e ? void 0 === e ? "[object Undefined]" : "[object Null]" : s && s in Object(e) ? a(e) : o(e)
                            }
                        },
                        9454: (e, t, r) => {
                            var n = r(4239),
                                a = r(7005);
                            e.exports = function(e) {
                                return a(e) && "[object Arguments]" == n(e)
                            }
                        },
                        939: (e, t, r) => {
                            var n = r(2492),
                                a = r(7005);
                            e.exports = function e(t, r, o, s, i) {
                                return t === r || (null == t || null == r || !a(t) && !a(r) ? t != t && r != r : n(t, r, o, s, e, i))
                            }
                        },
                        2492: (e, t, r) => {
                            var n = r(6384),
                                a = r(7114),
                                o = r(8351),
                                s = r(6096),
                                i = r(4160),
                                l = r(1469),
                                c = r(4144),
                                u = r(6719),
                                d = "[object Arguments]",
                                p = "[object Array]",
                                f = "[object Object]",
                                h = Object.prototype.hasOwnProperty;
                            e.exports = function(e, t, r, m, x, v) {
                                var b = l(e),
                                    g = l(t),
                                    y = b ? p : i(e),
                                    j = g ? p : i(t),
                                    w = (y = y == d ? f : y) == f,
                                    N = (j = j == d ? f : j) == f,
                                    _ = y == j;
                                if (_ && c(e)) {
                                    if (!c(t)) return !1;
                                    b = !0, w = !1
                                }
                                if (_ && !w) return v || (v = new n), b || u(e) ? a(e, t, r, m, x, v) : o(e, t, y, r, m, x, v);
                                if (!(1 & r)) {
                                    var C = w && h.call(e, "__wrapped__"),
                                        E = N && h.call(t, "__wrapped__");
                                    if (C || E) {
                                        var O = C ? e.value() : e,
                                            k = E ? t.value() : t;
                                        return v || (v = new n), x(O, k, r, m, v)
                                    }
                                }
                                return !!_ && (v || (v = new n), s(e, t, r, m, x, v))
                            }
                        },
                        8458: (e, t, r) => {
                            var n = r(3560),
                                a = r(5346),
                                o = r(3218),
                                s = r(346),
                                i = /^\[object .+?Constructor\]$/,
                                l = Function.prototype,
                                c = Object.prototype,
                                u = l.toString,
                                d = c.hasOwnProperty,
                                p = RegExp("^" + u.call(d).replace(/[\\^$.*+?()[\]{}|]/g, "\\$&").replace(/hasOwnProperty|(function).*?(?=\\\()| for .+?(?=\\\])/g, "$1.*?") + "$");
                            e.exports = function(e) {
                                return !(!o(e) || a(e)) && (n(e) ? p : i).test(s(e))
                            }
                        },
                        8749: (e, t, r) => {
                            var n = r(4239),
                                a = r(1780),
                                o = r(7005),
                                s = {};
                            s["[object Float32Array]"] = s["[object Float64Array]"] = s["[object Int8Array]"] = s["[object Int16Array]"] = s["[object Int32Array]"] = s["[object Uint8Array]"] = s["[object Uint8ClampedArray]"] = s["[object Uint16Array]"] = s["[object Uint32Array]"] = !0, s["[object Arguments]"] = s["[object Array]"] = s["[object ArrayBuffer]"] = s["[object Boolean]"] = s["[object DataView]"] = s["[object Date]"] = s["[object Error]"] = s["[object Function]"] = s["[object Map]"] = s["[object Number]"] = s["[object Object]"] = s["[object RegExp]"] = s["[object Set]"] = s["[object String]"] = s["[object WeakMap]"] = !1, e.exports = function(e) {
                                return o(e) && a(e.length) && !!s[n(e)]
                            }
                        },
                        280: (e, t, r) => {
                            var n = r(5726),
                                a = r(6916),
                                o = Object.prototype.hasOwnProperty;
                            e.exports = function(e) {
                                if (!n(e)) return a(e);
                                var t = [];
                                for (var r in Object(e)) o.call(e, r) && "constructor" != r && t.push(r);
                                return t
                            }
                        },
                        2545: e => {
                            e.exports = function(e, t) {
                                for (var r = -1, n = Array(e); ++r < e;) n[r] = t(r);
                                return n
                            }
                        },
                        1717: e => {
                            e.exports = function(e) {
                                return function(t) {
                                    return e(t)
                                }
                            }
                        },
                        4757: e => {
                            e.exports = function(e, t) {
                                return e.has(t)
                            }
                        },
                        4429: (e, t, r) => {
                            var n = r(5639)["__core-js_shared__"];
                            e.exports = n
                        },
                        7114: (e, t, r) => {
                            var n = r(8668),
                                a = r(2908),
                                o = r(4757);
                            e.exports = function(e, t, r, s, i, l) {
                                var c = 1 & r,
                                    u = e.length,
                                    d = t.length;
                                if (u != d && !(c && d > u)) return !1;
                                var p = l.get(e),
                                    f = l.get(t);
                                if (p && f) return p == t && f == e;
                                var h = -1,
                                    m = !0,
                                    x = 2 & r ? new n : void 0;
                                for (l.set(e, t), l.set(t, e); ++h < u;) {
                                    var v = e[h],
                                        b = t[h];
                                    if (s) var g = c ? s(b, v, h, t, e, l) : s(v, b, h, e, t, l);
                                    if (void 0 !== g) {
                                        if (g) continue;
                                        m = !1;
                                        break
                                    }
                                    if (x) {
                                        if (!a(t, (function(e, t) {
                                                if (!o(x, t) && (v === e || i(v, e, r, s, l))) return x.push(t)
                                            }))) {
                                            m = !1;
                                            break
                                        }
                                    } else if (v !== b && !i(v, b, r, s, l)) {
                                        m = !1;
                                        break
                                    }
                                }
                                return l.delete(e), l.delete(t), m
                            }
                        },
                        8351: (e, t, r) => {
                            var n = r(2705),
                                a = r(1149),
                                o = r(7813),
                                s = r(7114),
                                i = r(8776),
                                l = r(1814),
                                c = n ? n.prototype : void 0,
                                u = c ? c.valueOf : void 0;
                            e.exports = function(e, t, r, n, c, d, p) {
                                switch (r) {
                                    case "[object DataView]":
                                        if (e.byteLength != t.byteLength || e.byteOffset != t.byteOffset) return !1;
                                        e = e.buffer, t = t.buffer;
                                    case "[object ArrayBuffer]":
                                        return !(e.byteLength != t.byteLength || !d(new a(e), new a(t)));
                                    case "[object Boolean]":
                                    case "[object Date]":
                                    case "[object Number]":
                                        return o(+e, +t);
                                    case "[object Error]":
                                        return e.name == t.name && e.message == t.message;
                                    case "[object RegExp]":
                                    case "[object String]":
                                        return e == t + "";
                                    case "[object Map]":
                                        var f = i;
                                    case "[object Set]":
                                        var h = 1 & n;
                                        if (f || (f = l), e.size != t.size && !h) return !1;
                                        var m = p.get(e);
                                        if (m) return m == t;
                                        n |= 2, p.set(e, t);
                                        var x = s(f(e), f(t), n, c, d, p);
                                        return p.delete(e), x;
                                    case "[object Symbol]":
                                        if (u) return u.call(e) == u.call(t)
                                }
                                return !1
                            }
                        },
                        6096: (e, t, r) => {
                            var n = r(8234),
                                a = Object.prototype.hasOwnProperty;
                            e.exports = function(e, t, r, o, s, i) {
                                var l = 1 & r,
                                    c = n(e),
                                    u = c.length;
                                if (u != n(t).length && !l) return !1;
                                for (var d = u; d--;) {
                                    var p = c[d];
                                    if (!(l ? p in t : a.call(t, p))) return !1
                                }
                                var f = i.get(e),
                                    h = i.get(t);
                                if (f && h) return f == t && h == e;
                                var m = !0;
                                i.set(e, t), i.set(t, e);
                                for (var x = l; ++d < u;) {
                                    var v = e[p = c[d]],
                                        b = t[p];
                                    if (o) var g = l ? o(b, v, p, t, e, i) : o(v, b, p, e, t, i);
                                    if (!(void 0 === g ? v === b || s(v, b, r, o, i) : g)) {
                                        m = !1;
                                        break
                                    }
                                    x || (x = "constructor" == p)
                                }
                                if (m && !x) {
                                    var y = e.constructor,
                                        j = t.constructor;
                                    y == j || !("constructor" in e) || !("constructor" in t) || "function" == typeof y && y instanceof y && "function" == typeof j && j instanceof j || (m = !1)
                                }
                                return i.delete(e), i.delete(t), m
                            }
                        },
                        1957: (e, t, r) => {
                            var n = "object" == typeof r.g && r.g && r.g.Object === Object && r.g;
                            e.exports = n
                        },
                        8234: (e, t, r) => {
                            var n = r(8866),
                                a = r(9551),
                                o = r(3674);
                            e.exports = function(e) {
                                return n(e, o, a)
                            }
                        },
                        5050: (e, t, r) => {
                            var n = r(7019);
                            e.exports = function(e, t) {
                                var r = e.__data__;
                                return n(t) ? r["string" == typeof t ? "string" : "hash"] : r.map
                            }
                        },
                        852: (e, t, r) => {
                            var n = r(8458),
                                a = r(7801);
                            e.exports = function(e, t) {
                                var r = a(e, t);
                                return n(r) ? r : void 0
                            }
                        },
                        9607: (e, t, r) => {
                            var n = r(2705),
                                a = Object.prototype,
                                o = a.hasOwnProperty,
                                s = a.toString,
                                i = n ? n.toStringTag : void 0;
                            e.exports = function(e) {
                                var t = o.call(e, i),
                                    r = e[i];
                                try {
                                    e[i] = void 0;
                                    var n = !0
                                } catch (e) {}
                                var a = s.call(e);
                                return n && (t ? e[i] = r : delete e[i]), a
                            }
                        },
                        9551: (e, t, r) => {
                            var n = r(4963),
                                a = r(479),
                                o = Object.prototype.propertyIsEnumerable,
                                s = Object.getOwnPropertySymbols,
                                i = s ? function(e) {
                                    return null == e ? [] : (e = Object(e), n(s(e), (function(t) {
                                        return o.call(e, t)
                                    })))
                                } : a;
                            e.exports = i
                        },
                        4160: (e, t, r) => {
                            var n = r(8552),
                                a = r(7071),
                                o = r(3818),
                                s = r(8525),
                                i = r(577),
                                l = r(4239),
                                c = r(346),
                                u = "[object Map]",
                                d = "[object Promise]",
                                p = "[object Set]",
                                f = "[object WeakMap]",
                                h = "[object DataView]",
                                m = c(n),
                                x = c(a),
                                v = c(o),
                                b = c(s),
                                g = c(i),
                                y = l;
                            (n && y(new n(new ArrayBuffer(1))) != h || a && y(new a) != u || o && y(o.resolve()) != d || s && y(new s) != p || i && y(new i) != f) && (y = function(e) {
                                var t = l(e),
                                    r = "[object Object]" == t ? e.constructor : void 0,
                                    n = r ? c(r) : "";
                                if (n) switch (n) {
                                    case m:
                                        return h;
                                    case x:
                                        return u;
                                    case v:
                                        return d;
                                    case b:
                                        return p;
                                    case g:
                                        return f
                                }
                                return t
                            }), e.exports = y
                        },
                        7801: e => {
                            e.exports = function(e, t) {
                                return null == e ? void 0 : e[t]
                            }
                        },
                        1789: (e, t, r) => {
                            var n = r(4536);
                            e.exports = function() {
                                this.__data__ = n ? n(null) : {}, this.size = 0
                            }
                        },
                        401: e => {
                            e.exports = function(e) {
                                var t = this.has(e) && delete this.__data__[e];
                                return this.size -= t ? 1 : 0, t
                            }
                        },
                        7667: (e, t, r) => {
                            var n = r(4536),
                                a = Object.prototype.hasOwnProperty;
                            e.exports = function(e) {
                                var t = this.__data__;
                                if (n) {
                                    var r = t[e];
                                    return "__lodash_hash_undefined__" === r ? void 0 : r
                                }
                                return a.call(t, e) ? t[e] : void 0
                            }
                        },
                        1327: (e, t, r) => {
                            var n = r(4536),
                                a = Object.prototype.hasOwnProperty;
                            e.exports = function(e) {
                                var t = this.__data__;
                                return n ? void 0 !== t[e] : a.call(t, e)
                            }
                        },
                        1866: (e, t, r) => {
                            var n = r(4536);
                            e.exports = function(e, t) {
                                var r = this.__data__;
                                return this.size += this.has(e) ? 0 : 1, r[e] = n && void 0 === t ? "__lodash_hash_undefined__" : t, this
                            }
                        },
                        5776: e => {
                            var t = /^(?:0|[1-9]\d*)$/;
                            e.exports = function(e, r) {
                                var n = typeof e;
                                return !!(r = null == r ? 9007199254740991 : r) && ("number" == n || "symbol" != n && t.test(e)) && e > -1 && e % 1 == 0 && e < r
                            }
                        },
                        7019: e => {
                            e.exports = function(e) {
                                var t = typeof e;
                                return "string" == t || "number" == t || "symbol" == t || "boolean" == t ? "__proto__" !== e : null === e
                            }
                        },
                        5346: (e, t, r) => {
                            var n, a = r(4429),
                                o = (n = /[^.]+$/.exec(a && a.keys && a.keys.IE_PROTO || "")) ? "Symbol(src)_1." + n : "";
                            e.exports = function(e) {
                                return !!o && o in e
                            }
                        },
                        5726: e => {
                            var t = Object.prototype;
                            e.exports = function(e) {
                                var r = e && e.constructor;
                                return e === ("function" == typeof r && r.prototype || t)
                            }
                        },
                        7040: e => {
                            e.exports = function() {
                                this.__data__ = [], this.size = 0
                            }
                        },
                        4125: (e, t, r) => {
                            var n = r(8470),
                                a = Array.prototype.splice;
                            e.exports = function(e) {
                                var t = this.__data__,
                                    r = n(t, e);
                                return !(r < 0 || (r == t.length - 1 ? t.pop() : a.call(t, r, 1), --this.size, 0))
                            }
                        },
                        2117: (e, t, r) => {
                            var n = r(8470);
                            e.exports = function(e) {
                                var t = this.__data__,
                                    r = n(t, e);
                                return r < 0 ? void 0 : t[r][1]
                            }
                        },
                        7518: (e, t, r) => {
                            var n = r(8470);
                            e.exports = function(e) {
                                return n(this.__data__, e) > -1
                            }
                        },
                        4705: (e, t, r) => {
                            var n = r(8470);
                            e.exports = function(e, t) {
                                var r = this.__data__,
                                    a = n(r, e);
                                return a < 0 ? (++this.size, r.push([e, t])) : r[a][1] = t, this
                            }
                        },
                        4785: (e, t, r) => {
                            var n = r(1989),
                                a = r(8407),
                                o = r(7071);
                            e.exports = function() {
                                this.size = 0, this.__data__ = {
                                    hash: new n,
                                    map: new(o || a),
                                    string: new n
                                }
                            }
                        },
                        1285: (e, t, r) => {
                            var n = r(5050);
                            e.exports = function(e) {
                                var t = n(this, e).delete(e);
                                return this.size -= t ? 1 : 0, t
                            }
                        },
                        6e3: (e, t, r) => {
                            var n = r(5050);
                            e.exports = function(e) {
                                return n(this, e).get(e)
                            }
                        },
                        9916: (e, t, r) => {
                            var n = r(5050);
                            e.exports = function(e) {
                                return n(this, e).has(e)
                            }
                        },
                        5265: (e, t, r) => {
                            var n = r(5050);
                            e.exports = function(e, t) {
                                var r = n(this, e),
                                    a = r.size;
                                return r.set(e, t), this.size += r.size == a ? 0 : 1, this
                            }
                        },
                        8776: e => {
                            e.exports = function(e) {
                                var t = -1,
                                    r = Array(e.size);
                                return e.forEach((function(e, n) {
                                    r[++t] = [n, e]
                                })), r
                            }
                        },
                        4536: (e, t, r) => {
                            var n = r(852)(Object, "create");
                            e.exports = n
                        },
                        6916: (e, t, r) => {
                            var n = r(5569)(Object.keys, Object);
                            e.exports = n
                        },
                        1167: (e, t, r) => {
                            e = r.nmd(e);
                            var n = r(1957),
                                a = t && !t.nodeType && t,
                                o = a && e && !e.nodeType && e,
                                s = o && o.exports === a && n.process,
                                i = function() {
                                    try {
                                        return o && o.require && o.require("util").types || s && s.binding && s.binding("util")
                                    } catch (e) {}
                                }();
                            e.exports = i
                        },
                        2333: e => {
                            var t = Object.prototype.toString;
                            e.exports = function(e) {
                                return t.call(e)
                            }
                        },
                        5569: e => {
                            e.exports = function(e, t) {
                                return function(r) {
                                    return e(t(r))
                                }
                            }
                        },
                        5639: (e, t, r) => {
                            var n = r(1957),
                                a = "object" == typeof self && self && self.Object === Object && self,
                                o = n || a || Function("return this")();
                            e.exports = o
                        },
                        619: e => {
                            e.exports = function(e) {
                                return this.__data__.set(e, "__lodash_hash_undefined__"), this
                            }
                        },
                        2385: e => {
                            e.exports = function(e) {
                                return this.__data__.has(e)
                            }
                        },
                        1814: e => {
                            e.exports = function(e) {
                                var t = -1,
                                    r = Array(e.size);
                                return e.forEach((function(e) {
                                    r[++t] = e
                                })), r
                            }
                        },
                        7465: (e, t, r) => {
                            var n = r(8407);
                            e.exports = function() {
                                this.__data__ = new n, this.size = 0
                            }
                        },
                        3779: e => {
                            e.exports = function(e) {
                                var t = this.__data__,
                                    r = t.delete(e);
                                return this.size = t.size, r
                            }
                        },
                        7599: e => {
                            e.exports = function(e) {
                                return this.__data__.get(e)
                            }
                        },
                        4758: e => {
                            e.exports = function(e) {
                                return this.__data__.has(e)
                            }
                        },
                        4309: (e, t, r) => {
                            var n = r(8407),
                                a = r(7071),
                                o = r(3369);
                            e.exports = function(e, t) {
                                var r = this.__data__;
                                if (r instanceof n) {
                                    var s = r.__data__;
                                    if (!a || s.length < 199) return s.push([e, t]), this.size = ++r.size, this;
                                    r = this.__data__ = new o(s)
                                }
                                return r.set(e, t), this.size = r.size, this
                            }
                        },
                        346: e => {
                            var t = Function.prototype.toString;
                            e.exports = function(e) {
                                if (null != e) {
                                    try {
                                        return t.call(e)
                                    } catch (e) {}
                                    try {
                                        return e + ""
                                    } catch (e) {}
                                }
                                return ""
                            }
                        },
                        7813: e => {
                            e.exports = function(e, t) {
                                return e === t || e != e && t != t
                            }
                        },
                        5694: (e, t, r) => {
                            var n = r(9454),
                                a = r(7005),
                                o = Object.prototype,
                                s = o.hasOwnProperty,
                                i = o.propertyIsEnumerable,
                                l = n(function() {
                                    return arguments
                                }()) ? n : function(e) {
                                    return a(e) && s.call(e, "callee") && !i.call(e, "callee")
                                };
                            e.exports = l
                        },
                        1469: e => {
                            var t = Array.isArray;
                            e.exports = t
                        },
                        8612: (e, t, r) => {
                            var n = r(3560),
                                a = r(1780);
                            e.exports = function(e) {
                                return null != e && a(e.length) && !n(e)
                            }
                        },
                        4144: (e, t, r) => {
                            e = r.nmd(e);
                            var n = r(5639),
                                a = r(5062),
                                o = t && !t.nodeType && t,
                                s = o && e && !e.nodeType && e,
                                i = s && s.exports === o ? n.Buffer : void 0,
                                l = (i ? i.isBuffer : void 0) || a;
                            e.exports = l
                        },
                        8446: (e, t, r) => {
                            var n = r(939);
                            e.exports = function(e, t) {
                                return n(e, t)
                            }
                        },
                        3560: (e, t, r) => {
                            var n = r(4239),
                                a = r(3218);
                            e.exports = function(e) {
                                if (!a(e)) return !1;
                                var t = n(e);
                                return "[object Function]" == t || "[object GeneratorFunction]" == t || "[object AsyncFunction]" == t || "[object Proxy]" == t
                            }
                        },
                        1780: e => {
                            e.exports = function(e) {
                                return "number" == typeof e && e > -1 && e % 1 == 0 && e <= 9007199254740991
                            }
                        },
                        3218: e => {
                            e.exports = function(e) {
                                var t = typeof e;
                                return null != e && ("object" == t || "function" == t)
                            }
                        },
                        7005: e => {
                            e.exports = function(e) {
                                return null != e && "object" == typeof e
                            }
                        },
                        6719: (e, t, r) => {
                            var n = r(8749),
                                a = r(1717),
                                o = r(1167),
                                s = o && o.isTypedArray,
                                i = s ? a(s) : n;
                            e.exports = i
                        },
                        3674: (e, t, r) => {
                            var n = r(4636),
                                a = r(280),
                                o = r(8612);
                            e.exports = function(e) {
                                return o(e) ? n(e) : a(e)
                            }
                        },
                        479: e => {
                            e.exports = function() {
                                return []
                            }
                        },
                        5062: e => {
                            e.exports = function() {
                                return !1
                            }
                        },
                        75: function(e) {
                            (function() {
                                var t, r, n, o, s, i;
                                "undefined" != typeof performance && null !== performance && performance.now ? e.exports = function() {
                                    return performance.now()
                                } : "undefined" != typeof a && null !== a && a.hrtime ? (e.exports = function() {
                                    return (t() - s) / 1e6
                                }, r = a.hrtime, o = (t = function() {
                                    var e;
                                    return 1e9 * (e = r())[0] + e[1]
                                })(), i = 1e9 * a.uptime(), s = o - i) : Date.now ? (e.exports = function() {
                                    return Date.now() - n
                                }, n = Date.now()) : (e.exports = function() {
                                    return (new Date).getTime() - n
                                }, n = (new Date).getTime())
                            }).call(this)
                        },
                        4087: (e, t, r) => {
                            for (var n = r(75), a = "undefined" == typeof window ? r.g : window, o = ["moz", "webkit"], s = "AnimationFrame", i = a["request" + s], l = a["cancel" + s] || a["cancelRequest" + s], c = 0; !i && c < o.length; c++) i = a[o[c] + "Request" + s], l = a[o[c] + "Cancel" + s] || a[o[c] + "CancelRequest" + s];
                            if (!i || !l) {
                                var u = 0,
                                    d = 0,
                                    p = [];
                                i = function(e) {
                                    if (0 === p.length) {
                                        var t = n(),
                                            r = Math.max(0, 16.666666666666668 - (t - u));
                                        u = r + t, setTimeout((function() {
                                            var e = p.slice(0);
                                            p.length = 0;
                                            for (var t = 0; t < e.length; t++)
                                                if (!e[t].cancelled) try {
                                                    e[t].callback(u)
                                                } catch (e) {
                                                    setTimeout((function() {
                                                        throw e
                                                    }), 0)
                                                }
                                        }), Math.round(r))
                                    }
                                    return p.push({
                                        handle: ++d,
                                        callback: e,
                                        cancelled: !1
                                    }), d
                                }, l = function(e) {
                                    for (var t = 0; t < p.length; t++) p[t].handle === e && (p[t].cancelled = !0)
                                }
                            }
                            e.exports = function(e) {
                                return i.call(a, e)
                            }, e.exports.cancel = function() {
                                l.apply(a, arguments)
                            }, e.exports.polyfill = function(e) {
                                e || (e = a), e.requestAnimationFrame = i, e.cancelAnimationFrame = l
                            }
                        },
                        8156: t => {
                            "use strict";
                            t.exports = e
                        }
                    },
                    r = {};

                function n(e) {
                    var a = r[e];
                    if (void 0 !== a) return a.exports;
                    var o = r[e] = {
                        id: e,
                        loaded: !1,
                        exports: {}
                    };
                    return t[e].call(o.exports, o, o.exports, n), o.loaded = !0, o.exports
                }
                n.n = e => {
                    var t = e && e.__esModule ? () => e.default : () => e;
                    return n.d(t, {
                        a: t
                    }), t
                }, n.d = (e, t) => {
                    for (var r in t) n.o(t, r) && !n.o(e, r) && Object.defineProperty(e, r, {
                        enumerable: !0,
                        get: t[r]
                    })
                }, n.g = function() {
                    if ("object" == typeof globalThis) return globalThis;
                    try {
                        return this || new Function("return this")()
                    } catch (e) {
                        if ("object" == typeof window) return window
                    }
                }(), n.o = (e, t) => Object.prototype.hasOwnProperty.call(e, t), n.nmd = e => (e.paths = [], e.children || (e.children = []), e);
                var o = {};
                return (() => {
                    "use strict";
                    n.d(o, {
                        default: () => m
                    });
                    var e = n(8156),
                        t = n.n(e),
                        r = n(7403),
                        a = n(8446),
                        s = n.n(a);

                    function i(e) {
                        return i = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(e) {
                            return typeof e
                        } : function(e) {
                            return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
                        }, i(e)
                    }

                    function l(e, t) {
                        if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                    }

                    function c(e, t) {
                        return c = Object.setPrototypeOf ? Object.setPrototypeOf.bind() : function(e, t) {
                            return e.__proto__ = t, e
                        }, c(e, t)
                    }

                    function u(e, t) {
                        if (t && ("object" === i(t) || "function" == typeof t)) return t;
                        if (void 0 !== t) throw new TypeError("Derived constructors may only return object or undefined");
                        return d(e)
                    }

                    function d(e) {
                        if (void 0 === e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
                        return e
                    }

                    function p(e) {
                        return p = Object.setPrototypeOf ? Object.getPrototypeOf.bind() : function(e) {
                            return e.__proto__ || Object.getPrototypeOf(e)
                        }, p(e)
                    }

                    function f(e, t, r) {
                        return t in e ? Object.defineProperty(e, t, {
                            value: r,
                            enumerable: !0,
                            configurable: !0,
                            writable: !0
                        }) : e[t] = r, e
                    }
                    var h = function(e) {
                        ! function(e, t) {
                            if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function");
                            e.prototype = Object.create(t && t.prototype, {
                                constructor: {
                                    value: e,
                                    writable: !0,
                                    configurable: !0
                                }
                            }), Object.defineProperty(e, "prototype", {
                                writable: !1
                            }), t && c(e, t)
                        }(m, e);
                        var n, a, o, i, h = (o = m, i = function() {
                            if ("undefined" == typeof Reflect || !Reflect.construct) return !1;
                            if (Reflect.construct.sham) return !1;
                            if ("function" == typeof Proxy) return !0;
                            try {
                                return Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], (function() {}))), !0
                            } catch (e) {
                                return !1
                            }
                        }(), function() {
                            var e, t = p(o);
                            if (i) {
                                var r = p(this).constructor;
                                e = Reflect.construct(t, arguments, r)
                            } else e = t.apply(this, arguments);
                            return u(this, e)
                        });

                        function m() {
                            var e;
                            l(this, m);
                            for (var t = arguments.length, r = new Array(t), n = 0; n < t; n++) r[n] = arguments[n];
                            return f(d(e = h.call.apply(h, [this].concat(r))), "state", {
                                instance: null
                            }), e
                        }
                        return n = m, (a = [{
                            key: "componentDidMount",
                            value: function() {
                                var e = this,
                                    t = new r.default(this.typewriter, this.props.options);
                                this.setState({
                                    instance: t
                                }, (function() {
                                    var r = e.props.onInit;
                                    r && r(t)
                                }))
                            }
                        }, {
                            key: "componentDidUpdate",
                            value: function(e) {
                                s()(this.props.options, e.options) || this.setState({
                                    instance: new r.default(this.typewriter, this.props.options)
                                })
                            }
                        }, {
                            key: "componentWillUnmount",
                            value: function() {
                                this.state.instance && this.state.instance.stop()
                            }
                        }, {
                            key: "render",
                            value: function() {
                                var e = this,
                                    r = this.props.component;
                                return t().createElement(r, {
                                    ref: function(t) {
                                        return e.typewriter = t
                                    },
                                    className: "Typewriter",
                                    "data-testid": "typewriter-wrapper"
                                })
                            }
                        }]) && function(e, t) {
                            for (var r = 0; r < t.length; r++) {
                                var n = t[r];
                                n.enumerable = n.enumerable || !1, n.configurable = !0, "value" in n && (n.writable = !0), Object.defineProperty(e, n.key, n)
                            }
                        }(n.prototype, a), Object.defineProperty(n, "prototype", {
                            writable: !1
                        }), m
                    }(e.Component);
                    h.defaultProps = {
                        component: "div"
                    };
                    const m = h
                })(), o.default
            })(), e.exports = n(r(7294))
        }
    },
    function(e) {
        e.O(0, [90, 706, 774, 888, 179], (function() {
            return t = 5557, e(e.s = t);
            var t
        }));
        var t = e.O();
        _N_E = t
    }
]);