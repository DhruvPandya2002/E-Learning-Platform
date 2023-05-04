(self.webpackChunk_N_E = self.webpackChunk_N_E || []).push([
    [521], {
        512: function(e, t, s) {
            (window.__NEXT_P = window.__NEXT_P || []).push(["/about", function() {
                return s(1103)
            }])
        },
        8145: function(e, t, s) {
            "use strict";
            var a = s(5893),
                n = s(5675),
                r = s.n(n),
                i = (s(7294), s(5680)),
                l = s(3985);
            t.Z = function(e) {
                var t = e.theme,
                    s = e.Name,
                    n = e.profile_img,
                    c = e.designation,
                    o = e.description,
                    d = e.Course_page;
                return (0, a.jsx)(a.Fragment, {
                    children: (0, a.jsxs)("div", {
                        className: "flex md:flex-row flex-col justify-between gap-4 max-w-maxScreen items-center ".concat(d && "px-8"),
                        children: [(0, a.jsx)(r(), {
                            src: n || i.bS,
                            alt: "instructor_img",
                            width: 320,
                            height: 374,
                            className: !d && "rounded-2xl",
                            objectFit: "cover",
                            quality: 100
                        }), (0, a.jsxs)("div", {
                            className: "".concat(d ? "md:max-w-[55%]" : "md:max-w-[70%]", " space-y-6 text-center md:text-start"),
                            children: [(0, a.jsxs)("div", {
                                children: [(0, a.jsx)("p", {
                                    className: "section_heading ".concat("dark" === t ? "text-[#dbd8d3]" : "text-textHead"),
                                    children: s
                                }), (0, a.jsx)("p", {
                                    className: "section_subheading ".concat("dark" === t ? "text-[#989082]" : "text-textHead"),
                                    children: c
                                })]
                            }), (0, a.jsx)("p", {
                                className: "content_text pr-5 text-justify ".concat("dark" === t ? "text-[#b0a99f]" : "text-[#a6a6a6]"),
                                children: (0, a.jsx)(l.D, {
                                    children: o
                                })
                            })]
                        })]
                    })
                })
            }
        },
        7982: function(e, t, s) {
            "use strict";
            s.d(t, {
                Z: function() {
                    return u
                }
            });
            var a = s(5893),
                n = s(7294),
                r = s(3750),
                i = s(5675),
                l = s.n(i),
                c = (s(5680), s(3369));
            var o = function(e) {
                    var t = e.theme,
                        s = e.name,
                        n = e.course_name,
                        r = e.description,
                        i = e.review_count,
                        o = e.user_Image;
                    return r = r.length > 300 ? r.slice(0, 300).concat("...") : r, (0, a.jsxs)("div", {
                        className: "w-[350px] space-y-4 rounded-xl px-5 py-7 shadow-xl md:w-[456px] md:py-10 ".concat("dark" === t ? "bg-[#181a1b]" : " bg-[#fff]"),
                        children: [(0, a.jsx)("p", {
                            className: "".concat("dark" === t ? "text-[#989082]" : "text-subText", " min-h-[200px] text-justify  md:min-h-[150px] md:text-start"),
                            children: r
                        }), (0, a.jsxs)("div", {
                            className: "flex md:flex-row flex-col items-center justify-between ",
                            children: [(0, a.jsxs)("div", {
                                className: "flex md:flex-row flex-col items-center gap-2",
                                children: [(0, a.jsx)("div", {
                                    className: "h-14 w-14 translate-y-1 rounded-full overflow-hidden border border-white100",
                                    children: (0, a.jsx)(l(), {
                                        src: o,
                                        width: 20,
                                        height: 20,
                                        alt: "author img",
                                        layout: "responsive",
                                        objectFit: "cover"
                                    })
                                }), (0, a.jsxs)("div", {
                                    className: "flex flex-col justify-center md:items-start items-center gap-2 mb-2",
                                    children: [(0, a.jsx)("span", {
                                        className: "text-sm font-bold ".concat("dark" === t && "text-[#e8e6e3]"),
                                        children: s
                                    }), (0, a.jsx)("span", {
                                        className: "text-xs text-subText text-center md:text-start",
                                        children: n
                                    })]
                                })]
                            }), (0, a.jsx)(c.Z, {
                                Review_Count: i
                            })]
                        })]
                    })
                },
                d = s(719),
                x = (s(933), s(8770), s(92), s(1911)),
                m = s(7958);
            var u = function(e) {
                var t = e.testimonial,
                    s = (0, n.useState)(),
                    i = s[0],
                    l = s[1],
                    c = (0, n.useRef)(),
                    u = (0, n.useRef)(),
                    h = (0, n.useContext)(m.Z).theme;
                return (0, n.useEffect)((function() {
                    i && !i.destroyed && (i.params.navigation.prevEl = c.current, i.params.navigation.nextEl = u.current, i.navigation.init(), i.navigation.update())
                }), [i]), (0, a.jsxs)("div", {
                    className: "relative mx-auto max-w-maxScreen ",
                    children: [(0, a.jsx)("div", {
                        className: "absolute -top-20 -left-20 -z-40 h-[490px] w-[490px] rounded-full bg-brand100/10 blur-[100px]"
                    }), (0, a.jsxs)("div", {
                        className: "flex flex-row items-center justify-between px-6 py-4 pb-0 md:px-16 md:py-14",
                        children: [(0, a.jsxs)("div", {
                            className: "py-6 font-rubik md:py-0",
                            children: [(0, a.jsx)("p", {
                                className: "pre_heading mb-2 ".concat("dark" === h ? "text-[#6e96cf]" : "text-brand"),
                                children: "What student says"
                            }), (0, a.jsx)("p", {
                                className: "md:section_heading text-3xl font-bold md:text-[42px] md:font-semibold ".concat("dark" === h ? "text-[#e8e6e3]" : "text-headText"),
                                children: "Recent Reviews"
                            })]
                        }), (0, a.jsxs)("div", {
                            className: "hidden flex-row gap-4 md:flex ",
                            children: [(0, a.jsx)("button", {
                                className: "grid h-10 w-20 place-content-center rounded-full ".concat("dark" === h ? "bg-[#222526] text-[#d3cfc9]" : "bg-grey50 text-[#222]", " text-xl"),
                                ref: c,
                                "aria-label": "Previous",
                                children: (0, a.jsx)(r.And, {})
                            }), (0, a.jsx)("button", {
                                className: "grid h-10 w-20 place-content-center rounded-full ".concat("dark" === h ? "bg-[#29347a]" : "bg-brand", "  text-xl text-[#fff]"),
                                ref: u,
                                "aria-label": "Next",
                                children: (0, a.jsx)(r.lzl, {})
                            })]
                        })]
                    }), (0, a.jsx)("div", {
                        className: "mx-auto select-none mb-16 h-[2px] w-[90%] bg-white100 md:mb-24 ".concat("dark" === h && "opacity-30")
                    }), (0, a.jsx)(d.tq, {
                        modules: [x.W_, x.tl, x.LW, x.s5, x.Qr, x.pt],
                        onSwiper: l,
                        slidesPerView: 1,
                        spaceBetween: 0,
                        slidesPerGroup: 1,
                        loop: !0,
                        loopFillGroupWithBlank: !0,
                        pagination: {
                            clickable: !0
                        },
                        navigation: {
                            prevEl: null === c || void 0 === c ? void 0 : c.current,
                            nextEl: null === u || void 0 === u ? void 0 : u.current
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
                            var s, n, r, i, l, c, x, m;
                            return (0, a.jsx)(d.o5, {
                                children: (0, a.jsx)(o, {
                                    theme: h,
                                    name: null === e || void 0 === e || null === (s = e.attributes) || void 0 === s ? void 0 : s.UserName,
                                    course_name: null === e || void 0 === e || null === (n = e.attributes) || void 0 === n ? void 0 : n.courseName,
                                    description: null === e || void 0 === e || null === (r = e.attributes) || void 0 === r ? void 0 : r.UserReview,
                                    review_count: null === e || void 0 === e || null === (i = e.attributes) || void 0 === i ? void 0 : i.UserRatings,
                                    user_Image: null === e || void 0 === e || null === (l = e.attributes) || void 0 === l || null === (c = l.UserImage) || void 0 === c || null === (x = c.data) || void 0 === x || null === (m = x.attributes) || void 0 === m ? void 0 : m.url
                                }, t)
                            }, t)
                        }))
                    })]
                })
            }
        },
        5727: function(e, t, s) {
            "use strict";
            var a = s(7568),
                n = s(4924),
                r = s(6042),
                i = s(9396),
                l = s(4051),
                c = s.n(l),
                o = s(5893),
                d = s(913),
                x = s(9783),
                m = s(3841),
                u = s(7294),
                h = s(4853),
                p = s(3854),
                f = s(7106),
                g = s(7958),
                j = s(4561);
            t.Z = function() {
                var e = (0, u.useContext)(g.Z).theme,
                    t = (0, u.useState)(!1),
                    s = t[0],
                    l = t[1],
                    v = (0, u.useState)(""),
                    b = v[0],
                    w = v[1],
                    N = (0, u.useState)({
                        name: "",
                        email: "",
                        phoneNo: "",
                        subject: "",
                        message: ""
                    }),
                    y = N[0],
                    k = N[1],
                    _ = (0, u.useState)("Submit"),
                    Z = _[0],
                    S = _[1],
                    C = function() {
                        var e = (0, a.Z)(c().mark((function e(t) {
                            var n;
                            return c().wrap((function(e) {
                                for (;;) switch (e.prev = e.next) {
                                    case 0:
                                        if (t.preventDefault(), !s) {
                                            e.next = 9;
                                            break
                                        }
                                        return S("Sending..."), n = {}, Array.from(t.target.elements).forEach((function(e) {
                                            e.name && (n[e.name] = e.value)
                                        })), e.next = 7, fetch("/api/contactFormApi", {
                                            method: "POST",
                                            body: JSON.stringify(n)
                                        }).then(function() {
                                            var e = (0, a.Z)(c().mark((function e(s) {
                                                return c().wrap((function(e) {
                                                    for (;;) switch (e.prev = e.next) {
                                                        case 0:
                                                            return e.next = 2, fetch("https://script.google.com/macros/s/AKfycbx_lbwA4DzrUCO3H3FWzfmyMH2ZvRWc_HyP-T6MDG1c5J42oF6fqajOKDpNdjNp5XSk/exec", {
                                                                method: "POST",
                                                                body: new FormData(t.target)
                                                            }).then(s).catch((function(e) {
                                                                return console.log(e)
                                                            }));
                                                        case 2:
                                                            S("Submitted"), k({
                                                                name: "",
                                                                email: "",
                                                                phoneNo: "",
                                                                subject: "",
                                                                message: ""
                                                            }), l(!1), w(""), setTimeout((function() {
                                                                location.replace("/")
                                                            }), 3e3);
                                                        case 7:
                                                        case "end":
                                                            return e.stop()
                                                    }
                                                }), e)
                                            })));
                                            return function(t) {
                                                return e.apply(this, arguments)
                                            }
                                        }()).catch((function(e) {
                                            console.log(e), S("Submit"), setTimeout((function() {
                                                location.replace("/")
                                            }), 2e3)
                                        }));
                                    case 7:
                                        e.next = 10;
                                        break;
                                    case 9:
                                        w("Please verify that you are not a robot.");
                                    case 10:
                                    case "end":
                                        return e.stop()
                                }
                            }), e)
                        })));
                        return function(t) {
                            return e.apply(this, arguments)
                        }
                    }(),
                    F = function(e) {
                        k((function(t) {
                            return (0, i.Z)((0, r.Z)({}, t), (0, n.Z)({}, e.target.name, e.target.value))
                        }))
                    },
                    A = {
                        fontFamily: "Rubik",
                        color: "dark" === e ? "white" : "black",
                        "& .MuiInput-input": {
                            borderBottom: "dark" === e ? "2px solid white" : "2px solid #A6A6A6"
                        }
                    };
                return (0, o.jsx)(o.Fragment, {
                    children: (0, o.jsxs)("div", {
                        className: "".concat("dark" === e ? "bg-[#181a1b]" : "bg-[#fff]", " px-10 py-12"),
                        children: [(0, o.jsxs)("div", {
                            className: "flex sm:flex-row flex-col justify-between items-center sm:text-4xl text-2xl mb-14",
                            children: [(0, o.jsx)("p", {
                                className: "font-bold text-center ".concat("dark" === e && "text-[#e8e6e3]"),
                                children: "Send us a message"
                            }), (0, o.jsx)("div", {
                                className: "text-brand",
                                children: (0, o.jsx)(p.Zuw, {})
                            })]
                        }), (0, o.jsxs)("form", {
                            name: "contact-form",
                            onSubmit: C,
                            method: "post",
                            children: [(0, o.jsxs)("div", {
                                className: "grid gap-8 md:grid-cols-2 grid-cols-1 mb-8",
                                children: [(0, o.jsxs)(d.Z, {
                                    variant: "standard",
                                    children: [(0, o.jsx)(m.Z, {
                                        sx: {
                                            fontFamily: "Rubik",
                                            color: "dark" === e ? "white" : "#777C85"
                                        },
                                        htmlFor: "name",
                                        children: "Name"
                                    }), (0, o.jsx)(x.Z, {
                                        sx: (0, r.Z)({}, A),
                                        id: "name",
                                        value: y.name,
                                        name: "name",
                                        type: "text",
                                        required: !0,
                                        onChange: F
                                    })]
                                }), (0, o.jsxs)(d.Z, {
                                    variant: "standard",
                                    children: [(0, o.jsx)(m.Z, {
                                        sx: {
                                            fontFamily: "Rubik",
                                            color: "dark" === e ? "white" : "#777C85"
                                        },
                                        htmlFor: "email",
                                        children: "Email Address"
                                    }), (0, o.jsx)(x.Z, {
                                        sx: (0, r.Z)({}, A),
                                        id: "email",
                                        value: y.email,
                                        name: "email",
                                        required: !0,
                                        onChange: F
                                    })]
                                }), (0, o.jsxs)(d.Z, {
                                    variant: "standard",
                                    children: [(0, o.jsx)(m.Z, {
                                        sx: {
                                            fontFamily: "Rubik",
                                            color: "dark" === e ? "white" : "#777C85"
                                        },
                                        htmlFor: "phoneNo",
                                        children: "Phone Number"
                                    }), (0, o.jsx)(x.Z, {
                                        sx: (0, r.Z)({}, A),
                                        id: "phoneNo",
                                        value: y.phoneNo,
                                        name: "phoneNo",
                                        type: "tel",
                                        required: !0,
                                        onChange: F
                                    })]
                                }), (0, o.jsxs)(d.Z, {
                                    variant: "standard",
                                    children: [(0, o.jsx)(m.Z, {
                                        sx: {
                                            fontFamily: "Rubik",
                                            color: "dark" === e ? "white" : "#777C85"
                                        },
                                        htmlFor: "subject",
                                        children: "Subject"
                                    }), (0, o.jsx)(x.Z, {
                                        sx: (0, r.Z)({}, A),
                                        id: "subject",
                                        value: y.subject,
                                        name: "subject",
                                        required: !0,
                                        type: "text",
                                        onChange: F
                                    })]
                                })]
                            }), (0, o.jsx)("div", {
                                className: "grid",
                                children: (0, o.jsxs)(d.Z, {
                                    variant: "standard",
                                    children: [(0, o.jsx)(m.Z, {
                                        sx: {
                                            fontFamily: "Rubik",
                                            color: "dark" === e ? "white" : "#777C85"
                                        },
                                        htmlFor: "message",
                                        children: "Message"
                                    }), (0, o.jsx)(x.Z, {
                                        sx: (0, r.Z)({}, A),
                                        id: "message",
                                        value: y.message,
                                        name: "message",
                                        required: !0,
                                        type: "text",
                                        onChange: F
                                    })]
                                })
                            }), (0, o.jsxs)("div", {
                                className: "flex mx-auto flex-col lg:flex-row items-center justify-between mt-8 md:mt-8",
                                children: [(0, o.jsxs)("div", {
                                    children: [(0, o.jsx)(h.Z, {
                                        sitekey: "6Ld51bQjAAAAAIlbrh4zi-mIxM93_fAD_UCawU54",
                                        onChange: function() {
                                            return l(!0)
                                        }
                                    }), (0, o.jsx)("span", {
                                        className: "text-[#f00] text-[0.85rem] font-extralight",
                                        children: b
                                    })]
                                }), (0, o.jsx)("div", {
                                    className: "flex mt-2 lg:mt-0 md:flex-row-reverse md:justify-start justify-center",
                                    children: (0, o.jsxs)(j.Z, {
                                        theme: e,
                                        option: "solid",
                                        disabled: "Sending..." === Z,
                                        classes: "px-6 h-12 py-2 flex items-center gap-3 xl:text-xl text-lg lg:h-[4rem]",
                                        children: [Z, (0, o.jsx)(f.Oe$, {})]
                                    })
                                })]
                            })]
                        })]
                    })
                })
            }
        },
        3369: function(e, t, s) {
            "use strict";
            var a = s(797),
                n = s(5893),
                r = s(7294),
                i = s(9327);
            t.Z = function(e) {
                var t = e.Review_Count,
                    s = (0, r.useState)({
                        full: 0,
                        half: 0,
                        empty: 0
                    }),
                    l = s[0],
                    c = s[1];
                return (0, r.useEffect)((function() {
                    var e = Math.floor(t);
                    c({
                        full: e,
                        half: Number.isInteger(t) ? 0 : 1,
                        empty: Number.isInteger(t) ? 5 - e : 4 - e
                    })
                }), []), (0, n.jsxs)("div", {
                    className: "flex gap-1 text-yellow500",
                    children: [(0, a.Z)(new Array(l.full)).map((function(e, t) {
                        return (0, n.jsx)(i.DQk, {}, t)
                    })), (0, a.Z)(new Array(l.half)).map((function(e, t) {
                        return (0, n.jsx)(i.E3I, {}, t)
                    })), (0, a.Z)(new Array(l.empty)).map((function(e, t) {
                        return (0, n.jsx)(i.ofN, {}, t)
                    }))]
                })
            }
        },
        1103: function(e, t, s) {
            "use strict";
            s.r(t), s.d(t, {
                __N_SSG: function() {
                    return S
                },
                default: function() {
                    return C
                }
            });
            var a = s(5893),
                n = s(7294),
                r = s(7958),
                i = s(5680);
            var l = function() {
                    var e = (0, n.useContext)(r.Z).theme;
                    return (0, a.jsx)(a.Fragment, {
                        children: (0, a.jsx)("div", {
                            className: "relative",
                            children: (0, a.jsxs)("div", {
                                className: "mx-auto my-10 grid min-h-[564px] max-w-maxScreen px-paddingXforMob md:grid-cols-2 md:px-4",
                                children: [(0, a.jsx)("img", {
                                    src: i.q8,
                                    alt: "img",
                                    className: "-pt-1 mx-auto h-[80vw] w-[80vw] place-self-center rounded-full object-cover object-top sm:h-[500px] sm:w-full sm:rounded-3xl md:w-[660px] lg:h-[564px]"
                                }), (0, a.jsxs)("div", {
                                    className: "flex flex-col items-center justify-center gap-4 px-4 py-10 md:items-start md:px-12 lg:px-20",
                                    children: [(0, a.jsx)("p", {
                                        className: "section_heading ".concat("dark" === e ? "text-[#e8e6e3]" : "text-headText"),
                                        children: "About us"
                                    }), (0, a.jsxs)("p", {
                                        className: "section_subheading text-center md:text-start ".concat("dark" === e ? "text-[#989082]" : "text-subText", " "),
                                        children: ["Hello! Welcome to ", (0, a.jsx)("span", {
                                            className: "font-medium",
                                            children: "Code Help"
                                        }), "! Really happy to see you here."]
                                    }), (0, a.jsxs)("p", {
                                        className: "content_text text-justify md:text-start ".concat("dark" === e ? "text-[#b0a99f]" : "text-grey100"),
                                        children: ["Thinking of taking a step towards a mentorship programme? It definitely seems a bit daunting at first. It is never easy to ask for someone's counsel or guidance be it for studies or just in general. So, at", " ", (0, a.jsx)("span", {
                                            className: "font-medium",
                                            children: "CodeHelp"
                                        }), " we are here to provide all the necessary counsel you might need for ", (0, a.jsx)("span", {
                                            className: "font-medium",
                                            children: "placement preparations, interview experiences, programming"
                                        }), ", et cetera! For any additional questions, feel free to email us at lovebabbar@codehelp.in"]
                                    })]
                                })]
                            })
                        })
                    })
                },
                c = s(5727);
            var o = function() {
                    var e = (0, n.useContext)(r.Z).theme;
                    return (0, a.jsx)(a.Fragment, {
                        children: (0, a.jsx)("div", {
                            className: "".concat("dark" === e ? "bg-[#1b1d1e]" : "bg-section_bg"),
                            children: (0, a.jsxs)("div", {
                                className: "mx-auto max-w-maxScreen px-paddingXforMob py-16",
                                children: [(0, a.jsxs)("div", {
                                    className: "pb-16 text-center",
                                    children: [(0, a.jsx)("p", {
                                        className: "section_heading ".concat("dark" === e ? "text-[#e8e6e3]" : "text-headText"),
                                        children: "Get in Touch"
                                    }), (0, a.jsx)("p", {
                                        className: "section_subheading ".concat("dark" === e ? "text-[#989082]" : "text-subText", " "),
                                        children: "The Ultimate Guide To Ace SDE Interviews."
                                    })]
                                }), (0, a.jsx)("div", {
                                    children: (0, a.jsx)(c.Z, {})
                                })]
                            })
                        })
                    })
                },
                d = s(797),
                x = s(5675),
                m = s.n(x),
                u = s(4561),
                h = s(9327),
                p = s(3854),
                f = s(7106),
                g = s(1664),
                j = s.n(g);
            var v = function() {
                    var e = (0, n.useContext)(r.Z).theme;
                    return (0, a.jsxs)("div", {
                        className: "w-full ".concat("dark" === e ? "bg-[#29347a]" : "bg-brand", "  relative"),
                        children: [(0, a.jsx)("div", {
                            className: "absolute bottom-0 right-0",
                            children: (0, a.jsx)("img", {
                                src: i.Rz,
                                alt: "dotted_illus"
                            })
                        }), (0, a.jsx)("img", {
                            src: i.Im,
                            alt: "bg-illus",
                            className: "hidden md:block absolute top-0 left-0 h-[850px] w-[100vw] object-cover md:-translate-y-72 -translate-y-52"
                        }), (0, a.jsxs)("div", {
                            className: "2xl:relative mx-auto grid min-h-[590px] max-w-maxScreen md:grid-cols-2 grid-cols-1",
                            children: [(0, a.jsx)("div", {
                                className: "hidden md:block absolute top-0 right-0 z-30 w-full h-full overflow-hidden",
                                children: (0, a.jsx)("div", {
                                    className: "absolute bottom-0 right-0 xl:w-[600px] w-[500px] xl:h-[600px] h-[500px] overflow-hidden",
                                    children: (0, a.jsx)(m(), {
                                        src: i.sB,
                                        alt: "hero_img",
                                        placeholder: "blur",
                                        blurDataURL: i.sB,
                                        layout: "fill",
                                        objectFit: "contain"
                                    })
                                })
                            }), (0, a.jsxs)("div", {
                                className: "flex flex-col gap-4 place-self-center md:p-5 px-paddingXforMob ".concat("dark" === e ? "text-[#e8e6e3]" : "text-[#fff]", " z-30"),
                                children: [(0, a.jsx)("p", {
                                    className: "text-[42px] font-bold",
                                    children: "A platform for the next generation of learners!"
                                }), (0, a.jsx)("p", {
                                    className: "text-[20px] ".concat("dark" === e ? "text-[#e8e6e3]" : "text-HeroSubText"),
                                    children: "Place for imparting education to next-generation students."
                                }), (0, a.jsxs)("div", {
                                    className: "flex gap-2 items-center",
                                    children: [(0, a.jsx)("span", {
                                        children: "4.7"
                                    }), (0, a.jsx)("span", {
                                        className: "flex gap-1",
                                        children: (0, d.Z)(new Array(5)).map((function(e, t) {
                                            return (0, a.jsx)(h.DQk, {
                                                className: "text-yellow500 text-lg"
                                            }, t)
                                        }))
                                    })]
                                }), (0, a.jsxs)("div", {
                                    className: "flex gap-5 text-lg",
                                    children: [(0, a.jsxs)("p", {
                                        className: "flex gap-2 items-center",
                                        children: [" ", (0, a.jsx)(p.C1O, {}), " Engilsh / Hindi"]
                                    }), (0, a.jsxs)("p", {
                                        className: "flex gap-1 items-center",
                                        children: [" ", (0, a.jsx)(f.mL_, {}), " 10+ courses"]
                                    })]
                                }), (0, a.jsx)("div", {
                                    children: (0, a.jsx)(u.Z, {
                                        classes: "bg-white100 text-brand100 px-6 py-[0.5rem] text-[#000]",
                                        children: (0, a.jsx)(j(), {
                                            href: "/#courses",
                                            children: (0, a.jsx)("a", {
                                                children: "Start Learning"
                                            })
                                        })
                                    })
                                })]
                            })]
                        })]
                    })
                },
                b = s(3750),
                w = s(719),
                N = (s(933), s(8770), s(92), s(1911)),
                y = s(8145);
            var k = function(e) {
                var t = e.instructorData,
                    s = (0, n.useContext)(r.Z).theme,
                    i = (0, n.useState)(),
                    l = i[0],
                    c = i[1],
                    o = (0, n.useRef)(),
                    d = (0, n.useRef)();
                return (0, n.useEffect)((function() {
                    l && !l.destroyed && (l.params.navigation.prevEl = o.current, l.params.navigation.nextEl = d.current, l.navigation.init(), l.navigation.update())
                }), [l]), (0, a.jsx)(a.Fragment, {
                    children: (0, a.jsxs)("div", {
                        className: "relative mx-auto max-w-maxScreen ",
                        children: [(0, a.jsx)("div", {
                            className: "absolute -top-20 -left-20 -z-40 h-[490px] w-[490px] rounded-full bg-brand100/10 blur-[100px]"
                        }), (0, a.jsxs)("div", {
                            className: "flex flex-row items-center justify-between px-paddingXforMob py-4 pb-0 md:px-16 md:py-14",
                            children: [(0, a.jsxs)("div", {
                                className: "max-w-[52rem] space-y-3 py-6 font-rubik md:py-0",
                                children: [(0, a.jsx)("p", {
                                    className: "md:section_heading text-3xl ".concat("dark" === s && "text-[#e8e6e3]", " font-bold md:text-[42px] md:font-semibold"),
                                    children: "Our Instructor"
                                }), (0, a.jsx)("p", {
                                    className: "section_subheading ".concat("dark" === s ? "text-[#989082]" : "text-subText"),
                                    children: "A mentor is someone confident enough with their experiences and knowledge in a particular topic or set of topics, to comfortably assist others with less experience or knowledge."
                                })]
                            }), (0, a.jsxs)("div", {
                                className: "hidden flex-row gap-4 md:flex ",
                                children: [(0, a.jsx)("button", {
                                    className: "grid h-10 w-20 place-content-center rounded-full ".concat("dark" === s ? "bg-[#222526] text-[#d3cfc9]" : "bg-grey50 text-[#222]", " text-xl"),
                                    ref: o,
                                    children: (0, a.jsx)(b.And, {})
                                }), (0, a.jsx)("button", {
                                    className: "grid h-10 w-20 place-content-center rounded-full ".concat("dark" === s ? "bg-[#29347a]" : "bg-brand", "  text-xl text-[#fff]"),
                                    ref: d,
                                    children: (0, a.jsx)(b.lzl, {})
                                })]
                            })]
                        }), (0, a.jsx)("div", {
                            className: "mx-auto mb-16 h-[2px] w-[90%] bg-white100 md:mb-24 ".concat("dark" === s && "opacity-30", " ")
                        }), (0, a.jsx)(w.tq, {
                            modules: [N.W_, N.tl, N.LW, N.s5, N.Qr, N.pt],
                            onSwiper: c,
                            slidesPerView: 1,
                            spaceBetween: 30,
                            slidesPerGroup: 1,
                            loop: !0,
                            loopFillGroupWithBlank: !0,
                            pagination: {
                                clickable: !0
                            },
                            navigation: {
                                prevEl: null === o || void 0 === o ? void 0 : o.current,
                                nextEl: null === d || void 0 === d ? void 0 : d.current
                            },
                            updateOnWindowResize: !0,
                            observer: !0,
                            observeParents: !0,
                            className: "mySwiper",
                            breakpoints: {
                                1340: {
                                    slidesPerView: 1.1
                                }
                            },
                            autoplay: {
                                delay: 1500
                            },
                            speed: 1e3,
                            children: null === t || void 0 === t ? void 0 : t.map((function(e, t) {
                                return (0, a.jsx)(w.o5, {
                                    children: (0, a.jsx)(y.Z, {
                                        theme: s,
                                        profile_img: e.InstructorProfilePic.data[0].attributes.url,
                                        Name: e.InstructorName,
                                        designation: e.InstructorDesignition,
                                        description: e.InstructorDescription
                                    })
                                }, t)
                            }))
                        })]
                    })
                })
            };
            var _ = function() {
                    var e = (0, n.useContext)(r.Z).theme;
                    return (0, a.jsx)(a.Fragment, {
                        children: (0, a.jsx)("div", {
                            className: "relative",
                            children: (0, a.jsxs)("div", {
                                className: "mx-auto my-10 grid h-fit max-w-maxScreen px-paddingXforMob md:grid-cols-2",
                                children: [(0, a.jsx)("img", {
                                    src: i.wG,
                                    alt: "img",
                                    className: "mx-auto block h-[80vw] w-[80vw] rounded-full object-cover sm:h-[500px] sm:w-full sm:rounded-3xl md:hidden"
                                }), (0, a.jsxs)("div", {
                                    className: "flex flex-col items-center justify-center gap-4 px-4 py-10 pr-0 md:items-start md:px-0 md:pr-12 lg:pr-20",
                                    children: [(0, a.jsx)("p", {
                                        className: "section_heading ".concat("dark" === e ? "text-[#e8e6e3]" : "text-headText", " text-center md:text-start"),
                                        children: "Our Story"
                                    }), (0, a.jsxs)("p", {
                                        className: "section_subheading ".concat("dark" === e ? "text-[#989082]" : "text-subText", " text-center md:text-start"),
                                        children: ["At ", (0, a.jsx)("span", {
                                            className: "font-medium",
                                            children: "Code Help"
                                        }), ", we aim to provide new students with", " ", (0, a.jsx)("span", {
                                            className: "font-medium",
                                            children: "proper mentorship and education"
                                        }), " for their learning and growth."]
                                    }), (0, a.jsxs)("p", {
                                        className: "content_text ".concat("dark" === e ? "text-[#b0a99f]" : "text-grey100", " text-justify md:text-start"),
                                        children: [(0, a.jsx)("span", {
                                            className: "font-medium",
                                            children: "Code Help"
                                        }), " was founded in 2020 by", " ", (0, a.jsx)("span", {
                                            className: "font-medium",
                                            children: "Love Babbar (Ex-Amazon, Ex-Microsoft)"
                                        }), " to deliver \u201cto the point, short and practical\u201d educational content for learning programming, coding, and preparing for", " ", (0, a.jsx)("span", {
                                            className: "font-medium",
                                            children: "job placements, and interviews"
                                        }), ". He has been mentoring students through his Youtube channel which has now gained more than", " ", (0, a.jsx)("span", {
                                            className: "font-medium",
                                            children: "17 million views"
                                        }), " and is now looking forward to providing his guidance in different courses through ", (0, a.jsx)("span", {
                                            className: "font-medium",
                                            children: "Code Help"
                                        }), "."]
                                    })]
                                }), (0, a.jsx)("img", {
                                    src: i.wG,
                                    alt: "img",
                                    className: "hidden md:block mx-auto h-[80vw] w-[80vw] place-self-center rounded-full object-cover object-top sm:h-[500px] sm:w-full sm:rounded-3xl md:w-[660px] lg:h-[564px]"
                                })]
                            })
                        })
                    })
                },
                Z = s(7982);
            var S = !0,
                C = function(e) {
                    var t = e.instructorData,
                        s = e.testimonial;
                    return (0, a.jsx)(a.Fragment, {
                        children: (0, a.jsxs)("div", {
                            className: "animate__animated animate__fadeIn animate__fast font-rubik ",
                            children: [(0, a.jsx)(v, {}), (0, a.jsx)(l, {}), (0, a.jsx)(_, {}), (0, a.jsx)(k, {
                                instructorData: t
                            }), (0, a.jsx)(Z.Z, {
                                testimonial: s
                            }), (0, a.jsx)(o, {})]
                        })
                    })
                }
        }
    },
    function(e) {
        e.O(0, [907, 90, 556, 706, 823, 774, 888, 179], (function() {
            return t = 512, e(e.s = t);
            var t
        }));
        var t = e.O();
        _N_E = t
    }
]);