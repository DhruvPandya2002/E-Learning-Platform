(self.webpackChunk_N_E = self.webpackChunk_N_E || []).push([
    [335], {
        8105: function(e, t, n) {
            (window.__NEXT_P = window.__NEXT_P || []).push(["/contact", function() {
                return n(9144)
            }])
        },
        5727: function(e, t, n) {
            "use strict";
            var s = n(7568),
                a = n(4924),
                r = n(6042),
                i = n(9396),
                c = n(4051),
                l = n.n(c),
                o = n(5893),
                d = n(913),
                x = n(9783),
                m = n(3841),
                h = n(7294),
                u = n(4853),
                f = n(3854),
                j = n(7106),
                p = n(7958),
                b = n(4561);
            t.Z = function() {
                var e = (0, h.useContext)(p.Z).theme,
                    t = (0, h.useState)(!1),
                    n = t[0],
                    c = t[1],
                    g = (0, h.useState)(""),
                    v = g[0],
                    w = g[1],
                    N = (0, h.useState)({
                        name: "",
                        email: "",
                        phoneNo: "",
                        subject: "",
                        message: ""
                    }),
                    y = N[0],
                    k = N[1],
                    Z = (0, h.useState)("Submit"),
                    _ = Z[0],
                    S = Z[1],
                    C = function() {
                        var e = (0, s.Z)(l().mark((function e(t) {
                            var a;
                            return l().wrap((function(e) {
                                for (;;) switch (e.prev = e.next) {
                                    case 0:
                                        if (t.preventDefault(), !n) {
                                            e.next = 9;
                                            break
                                        }
                                        return S("Sending..."), a = {}, Array.from(t.target.elements).forEach((function(e) {
                                            e.name && (a[e.name] = e.value)
                                        })), e.next = 7, fetch("/api/contactFormApi", {
                                            method: "POST",
                                            body: JSON.stringify(a)
                                        }).then(function() {
                                            var e = (0, s.Z)(l().mark((function e(n) {
                                                return l().wrap((function(e) {
                                                    for (;;) switch (e.prev = e.next) {
                                                        case 0:
                                                            return e.next = 2, fetch("https://script.google.com/macros/s/AKfycbx_lbwA4DzrUCO3H3FWzfmyMH2ZvRWc_HyP-T6MDG1c5J42oF6fqajOKDpNdjNp5XSk/exec", {
                                                                method: "POST",
                                                                body: new FormData(t.target)
                                                            }).then(n).catch((function(e) {
                                                                return console.log(e)
                                                            }));
                                                        case 2:
                                                            S("Submitted"), k({
                                                                name: "",
                                                                email: "",
                                                                phoneNo: "",
                                                                subject: "",
                                                                message: ""
                                                            }), c(!1), w(""), setTimeout((function() {
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
                    A = function(e) {
                        k((function(t) {
                            return (0, i.Z)((0, r.Z)({}, t), (0, a.Z)({}, e.target.name, e.target.value))
                        }))
                    },
                    F = {
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
                                children: (0, o.jsx)(f.Zuw, {})
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
                                        sx: (0, r.Z)({}, F),
                                        id: "name",
                                        value: y.name,
                                        name: "name",
                                        type: "text",
                                        required: !0,
                                        onChange: A
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
                                        sx: (0, r.Z)({}, F),
                                        id: "email",
                                        value: y.email,
                                        name: "email",
                                        required: !0,
                                        onChange: A
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
                                        sx: (0, r.Z)({}, F),
                                        id: "phoneNo",
                                        value: y.phoneNo,
                                        name: "phoneNo",
                                        type: "tel",
                                        required: !0,
                                        onChange: A
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
                                        sx: (0, r.Z)({}, F),
                                        id: "subject",
                                        value: y.subject,
                                        name: "subject",
                                        required: !0,
                                        type: "text",
                                        onChange: A
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
                                        sx: (0, r.Z)({}, F),
                                        id: "message",
                                        value: y.message,
                                        name: "message",
                                        required: !0,
                                        type: "text",
                                        onChange: A
                                    })]
                                })
                            }), (0, o.jsxs)("div", {
                                className: "flex mx-auto flex-col lg:flex-row items-center justify-between mt-8 md:mt-8",
                                children: [(0, o.jsxs)("div", {
                                    children: [(0, o.jsx)(u.Z, {
                                        sitekey: "6Ld51bQjAAAAAIlbrh4zi-mIxM93_fAD_UCawU54",
                                        onChange: function() {
                                            return c(!0)
                                        }
                                    }), (0, o.jsx)("span", {
                                        className: "text-[#f00] text-[0.85rem] font-extralight",
                                        children: v
                                    })]
                                }), (0, o.jsx)("div", {
                                    className: "flex mt-2 lg:mt-0 md:flex-row-reverse md:justify-start justify-center",
                                    children: (0, o.jsxs)(b.Z, {
                                        theme: e,
                                        option: "solid",
                                        disabled: "Sending..." === _,
                                        classes: "px-6 h-12 py-2 flex items-center gap-3 xl:text-xl text-lg lg:h-[4rem]",
                                        children: [_, (0, o.jsx)(j.Oe$, {})]
                                    })
                                })]
                            })]
                        })]
                    })
                })
            }
        },
        9144: function(e, t, n) {
            "use strict";
            n.r(t), n.d(t, {
                __N_SSG: function() {
                    return u
                }
            });
            var s = n(5893),
                a = n(7294),
                r = n(5727),
                i = n(5680),
                c = n(1649),
                l = n(3750),
                o = n(5155),
                d = n(9583),
                x = n(1664),
                m = n.n(x),
                h = n(7958);
            n(4853);
            var u = !0;
            t.default = function() {
                var e = (0, a.useContext)(h.Z).theme;
                return (0, s.jsx)(s.Fragment, {
                    children: (0, s.jsxs)("div", {
                        className: "animate__animated animate__fadeIn animate__fast",
                        children: [(0, s.jsxs)("div", {
                            className: "relative h-fit w-[100vw] overflow-hidden bg-[#000]",
                            children: [(0, s.jsx)("div", {
                                style: {
                                    backgroundImage: "url(" + i.yN + ")",
                                    backgroundSize: "cover",
                                    backgroundPosition: "center"
                                },
                                className: "sm:h-[60vh] h-[50vh] w-full opacity-40 flex items-center"
                            }), (0, s.jsx)("div", {
                                className: "absolute sm:top-1/3 top-1/4 left-0 w-full text-[#fff]",
                                children: (0, s.jsxs)("div", {
                                    className: "mx-auto max-w-maxScreen px-12 sm:text-start text-center ",
                                    children: [(0, s.jsx)("p", {
                                        className: "sm:text-[52px] text-5xl font-bold",
                                        children: "Get In Touch"
                                    }), (0, s.jsx)("p", {
                                        className: "sm:text-lg text-base",
                                        children: "The Ultimate Guide To Ace SDE Interviews."
                                    })]
                                })
                            })]
                        }), (0, s.jsxs)("div", {
                            className: "mx-auto flex h-full w-[80%] max-w-maxScreen -translate-y-20 flex-col shadow-md md:flex-row",
                            children: [(0, s.jsx)("div", {
                                className: "lg:w-[70%] md:w-[60%] ".concat("dark" === e ? "bg-[#181a1b]" : "bg-[#fff]"),
                                children: (0, s.jsx)(r.Z, {})
                            }), (0, s.jsxs)("div", {
                                className: "flex flex-col justify-center sm:items-start items-center gap-4 ".concat("dark" === e ? "bg-[#333f90]" : "bg-brand300", " px-5 py-8 text-[#fff] lg:w-[30%] md:w-[40%]"),
                                children: [(0, s.jsx)("p", {
                                    className: "text-2xl font-bold",
                                    children: "Contact Information"
                                }), (0, s.jsxs)("div", {
                                    className: "grid h-[440px] place-content-center place-self-center gap-2",
                                    children: [(0, s.jsx)("div", {
                                        className: "mx-auto grid h-[52px] w-[52px] place-content-center rounded-lg ".concat("dark" === e ? "bg-[#2e3982]" : "bg-[#6572C8]", " text-2xl"),
                                        children: (0, s.jsx)(c.JwT, {})
                                    }), (0, s.jsx)(m(), {
                                        href: "mailto:support@codehelp.in",
                                        children: (0, s.jsx)("a", {
                                            children: (0, s.jsx)("p", {
                                                children: "support@codehelp.in"
                                            })
                                        })
                                    })]
                                }), (0, s.jsxs)("div", {
                                    className: "flex items-center gap-5 text-xl md:text-3xl",
                                    children: [(0, s.jsx)(m(), {
                                        href: "https://www.youtube.com/channel/UCldyi11QYNXYXiLjVbyw5dA",
                                        children: (0, s.jsx)("a", {
                                            children: (0, s.jsx)(l.bUO, {})
                                        })
                                    }), (0, s.jsx)(m(), {
                                        href: "https://www.linkedin.com/in/love-babbar-38ab2887/",
                                        children: (0, s.jsx)("a", {
                                            children: (0, s.jsx)(o.xQQ, {})
                                        })
                                    }), (0, s.jsx)(m(), {
                                        href: "https://t.me/lovebabbercodehelp",
                                        children: (0, s.jsx)("a", {
                                            children: (0, s.jsx)(d.AGi, {})
                                        })
                                    }), (0, s.jsx)(m(), {
                                        href: "https://discord.gg/y2yrEcQv75",
                                        children: (0, s.jsx)("a", {
                                            children: (0, s.jsx)(d.j2d, {})
                                        })
                                    })]
                                })]
                            })]
                        })]
                    })
                })
            }
        }
    },
    function(e) {
        e.O(0, [907, 556, 866, 158, 445, 823, 774, 888, 179], (function() {
            return t = 8105, e(e.s = t);
            var t
        }));
        var t = e.O();
        _N_E = t
    }
]);