(self.webpackChunk_N_E = self.webpackChunk_N_E || []).push([
    [742], {
        3915: function(e, t, i) {
            (window.__NEXT_P = window.__NEXT_P || []).push(["/course/[courseSlug]", function() {
                return i(8274)
            }])
        },
        8145: function(e, t, i) {
            "use strict";
            var n = i(5893),
                l = i(5675),
                r = i.n(l),
                a = (i(7294), i(5680)),
                s = i(3985);
            t.Z = function(e) {
                var t = e.theme,
                    i = e.Name,
                    l = e.profile_img,
                    o = e.designation,
                    d = e.description,
                    c = e.Course_page;
                return (0, n.jsx)(n.Fragment, {
                    children: (0, n.jsxs)("div", {
                        className: "flex md:flex-row flex-col justify-between gap-4 max-w-maxScreen items-center ".concat(c && "px-8"),
                        children: [(0, n.jsx)(r(), {
                            src: l || a.bS,
                            alt: "instructor_img",
                            width: 320,
                            height: 374,
                            className: !c && "rounded-2xl",
                            objectFit: "cover",
                            quality: 100
                        }), (0, n.jsxs)("div", {
                            className: "".concat(c ? "md:max-w-[55%]" : "md:max-w-[70%]", " space-y-6 text-center md:text-start"),
                            children: [(0, n.jsxs)("div", {
                                children: [(0, n.jsx)("p", {
                                    className: "section_heading ".concat("dark" === t ? "text-[#dbd8d3]" : "text-textHead"),
                                    children: i
                                }), (0, n.jsx)("p", {
                                    className: "section_subheading ".concat("dark" === t ? "text-[#989082]" : "text-textHead"),
                                    children: o
                                })]
                            }), (0, n.jsx)("p", {
                                className: "content_text pr-5 text-justify ".concat("dark" === t ? "text-[#b0a99f]" : "text-[#a6a6a6]"),
                                children: (0, n.jsx)(s.D, {
                                    children: d
                                })
                            })]
                        })]
                    })
                })
            }
        },
        3369: function(e, t, i) {
            "use strict";
            var n = i(797),
                l = i(5893),
                r = i(7294),
                a = i(9327);
            t.Z = function(e) {
                var t = e.Review_Count,
                    i = (0, r.useState)({
                        full: 0,
                        half: 0,
                        empty: 0
                    }),
                    s = i[0],
                    o = i[1];
                return (0, r.useEffect)((function() {
                    var e = Math.floor(t);
                    o({
                        full: e,
                        half: Number.isInteger(t) ? 0 : 1,
                        empty: Number.isInteger(t) ? 5 - e : 4 - e
                    })
                }), []), (0, l.jsxs)("div", {
                    className: "flex gap-1 text-yellow500",
                    children: [(0, n.Z)(new Array(s.full)).map((function(e, t) {
                        return (0, l.jsx)(a.DQk, {}, t)
                    })), (0, n.Z)(new Array(s.half)).map((function(e, t) {
                        return (0, l.jsx)(a.E3I, {}, t)
                    })), (0, n.Z)(new Array(s.empty)).map((function(e, t) {
                        return (0, l.jsx)(a.ofN, {}, t)
                    }))]
                })
            }
        },
        8274: function(e, t, i) {
            "use strict";
            i.r(t), i.d(t, {
                __N_SSG: function() {
                    return _
                },
                default: function() {
                    return D
                }
            });
            var n = i(5893),
                l = i(7294),
                r = i(5680),
                a = i(3854),
                s = i(7106),
                o = i(7958),
                d = i(1664),
                c = i.n(d),
                u = i(3750),
                x = i(4561);
            var v = function(e) {
                    var t, i, r, a, s, d, v, m, h, f, p, j, b = e.CourseBannerData,
                        g = e.CourseCardData,
                        N = e.CourseEnrollmentClosed,
                        w = e.videoVal,
                        C = (0, l.useContext)(o.Z).theme;
                    return (0, n.jsx)(n.Fragment, {
                        children: (0, n.jsxs)("div", {
                            className: "rounded-2xl p-4 md:absolute -bottom-[100px] right-[1rem] min-h-[600px] max-w-[423px] mx-auto md:translate-y-0  translate-y-24 flex flex-col gap-4 ".concat("dark" == C ? "bg-[#000000c2]" : "bg-[#ffffffc2]", " border border-grey80 shadow-md shadow-grey100 backdrop-blur-md"),
                            children: [0 === w ? (0, n.jsx)("img", {
                                src: null === b || void 0 === b || null === (t = b.ThumbnailImage) || void 0 === t || null === (i = t.data) || void 0 === i || null === (r = i.attributes) || void 0 === r ? void 0 : r.url,
                                className: "md:max-w-full w-[400px] min-h-[180px] rounded-2xl overflow-hidden",
                                alt: "course image"
                            }) : (null === b || void 0 === b ? void 0 : b.videoLink) || (null === b || void 0 === b || null === (a = b.Video) || void 0 === a || null === (s = a.data) || void 0 === s || null === (d = s.attributes) || void 0 === d ? void 0 : d.url) ? (0, n.jsx)("video", {
                                className: "md:max-w-full w-[400px] min-h-[180px] rounded-2xl overflow-hidden",
                                preload: "auto",
                                loop: !0,
                                muted: 0 === w,
                                autoPlay: !0,
                                controls: !0,
                                children: (0, n.jsx)("source", {
                                    src: (null === b || void 0 === b ? void 0 : b.videoLink) || (null === b || void 0 === b || null === (v = b.Video) || void 0 === v || null === (m = v.data) || void 0 === m || null === (h = m.attributes) || void 0 === h ? void 0 : h.url),
                                    type: "video/mp4"
                                })
                            }) : (0, n.jsx)("img", {
                                src: null === b || void 0 === b || null === (f = b.ThumbnailImage) || void 0 === f || null === (p = f.data) || void 0 === p || null === (j = p.attributes) || void 0 === j ? void 0 : j.url,
                                className: "md:max-w-full w-[400px] min-h-[180px] rounded-2xl overflow-hidden",
                                alt: "course image"
                            }), (0, n.jsxs)("div", {
                                className: "px-4",
                                children: [(0, n.jsxs)("div", {
                                    className: "text-xl space-x-3 font-semibold mb-3",
                                    children: [(0, n.jsxs)("span", {
                                        className: "".concat("dark" == C ? "text-HeroSubText" : "text-[#000]"),
                                        children: ["\u20b9", null === b || void 0 === b ? void 0 : b.CurrentPrice]
                                    }), (0, n.jsxs)("span", {
                                        className: "".concat("dark" == C ? "text-grey80" : "text-textHead", " line-through"),
                                        children: ["\u20b9", null === b || void 0 === b ? void 0 : b.ActualPrice]
                                    })]
                                }), (0, n.jsx)(c(), {
                                    href: N ? "#" : null === b || void 0 === b ? void 0 : b.RazorPayLink,
                                    children: (0, n.jsx)("a", {
                                        className: "mt-4",
                                        target: N ? "" : "_blank",
                                        children: (0, n.jsx)(x.Z, {
                                            option: N ? "" : "solid",
                                            classes: "".concat(N ? "cursor-not-allowed ".concat("dark" == C ? "text-white100" : "text-headText") : "cursor-pointer text-white100", " w-full text-center p-2"),
                                            children: N ? "Enrollment Closed" : "Buy Now"
                                        })
                                    })
                                }), (0, n.jsxs)("div", {
                                    className: "mt-4 ".concat("dark" == C ? "text-white100" : "text-headText"),
                                    children: [(0, n.jsx)("p", {
                                        className: "font-semibold text-xl my-2",
                                        children: "This Course Includes :"
                                    }), (0, n.jsx)("div", {
                                        className: "flex flex-col gap-3",
                                        children: null === g || void 0 === g ? void 0 : g.map((function(e, t) {
                                            return (0, n.jsxs)("p", {
                                                className: "flex gap-2 items-center",
                                                children: [(0, n.jsx)(u.F3t, {}), (0, n.jsx)("span", {
                                                    children: e.feature
                                                })]
                                            }, t)
                                        }))
                                    })]
                                })]
                            })]
                        })
                    })
                },
                m = i(8193),
                h = function(e) {
                    var t, i = e.AccData,
                        r = e.handleToggle,
                        s = e.active,
                        d = (0, l.useRef)(),
                        c = (0, l.useContext)(o.Z).theme;
                    return (0, n.jsxs)("div", {
                        className: "rc-accordion-card",
                        children: [(0, n.jsx)("div", {
                            className: "rc-accordion-header",
                            children: (0, n.jsxs)("div", {
                                className: "rc-accordion-toggle p-3 ".concat(s === (null === i || void 0 === i ? void 0 : i.id) ? "active" : ""),
                                onClick: function() {
                                    return r(null === i || void 0 === i ? void 0 : i.id)
                                },
                                children: [(0, n.jsx)("h5", {
                                    className: "rc-accordion-title ".concat("dark" == c ? "text-brColor" : "text-brand"),
                                    children: null === i || void 0 === i ? void 0 : i.SectionName
                                }), (0, n.jsx)("i", {
                                    className: "fa fa-chevron-down rc-accordion-icon",
                                    children: (0, n.jsx)(m.cuw, {})
                                })]
                            })
                        }), (0, n.jsx)("div", {
                            ref: d,
                            className: "rc-collapse ".concat(s === (null === i || void 0 === i ? void 0 : i.id) ? "show" : ""),
                            style: s === (null === i || void 0 === i ? void 0 : i.id) ? {
                                height: d.current.scrollHeight
                            } : {
                                height: "0px"
                            },
                            children: (0, n.jsx)("div", {
                                className: "p-4 flex flex-col gap-5 text-textHead font-semibold",
                                children: null === i || void 0 === i || null === (t = i.CourseDetails) || void 0 === t ? void 0 : t.map((function(e, t) {
                                    return (0, n.jsxs)("div", {
                                        className: "flex justify-between",
                                        children: [(0, n.jsxs)("div", {
                                            className: "flex gap-2 items-center ".concat("dark" == c && "text-HeroSubText"),
                                            children: [(0, n.jsx)("span", {
                                                children: "Video" == (null === e || void 0 === e ? void 0 : e.lectureType) ? (0, n.jsx)(a.ttn, {}) : "Document" == (null === e || void 0 === e ? void 0 : e.lectureType) ? (0, n.jsx)(a.vrJ, {}) : "Codesandbox" == (null === e || void 0 === e ? void 0 : e.lectureType) ? (0, n.jsx)(a.oT$, {}) : ""
                                            }), (0, n.jsx)("p", {
                                                children: null === e || void 0 === e ? void 0 : e.LectureTitle
                                            })]
                                        }), (0, n.jsx)("p", {
                                            className: "".concat("dark" == c ? "text-HeroSubText" : "text-subText"),
                                            children: null === e || void 0 === e ? void 0 : e.LectureDuration
                                        })]
                                    }, t)
                                }))
                            })
                        })]
                    })
                },
                f = i(719),
                p = i(8145),
                j = (i(933), i(8770), i(92), i(1911));
            var b = function(e) {
                    var t, i, r, a, s = e.Course_Ins_data,
                        d = (0, l.useContext)(o.Z).theme;
                    return (0, n.jsx)(n.Fragment, {
                        children: (0, n.jsx)("div", {
                            className: "max-w-maxScreen mx-auto",
                            children: s.length <= 1 ? (0, n.jsx)(n.Fragment, {
                                children: (0, n.jsx)(p.Z, {
                                    theme: d,
                                    profile_img: null === (t = s[0]) || void 0 === t ? void 0 : t.InstructorProfilePic.data[0].attributes.url,
                                    Name: null === (i = s[0]) || void 0 === i ? void 0 : i.InstructorName,
                                    designation: null === (r = s[0]) || void 0 === r ? void 0 : r.InstructorDesignition,
                                    description: null === (a = s[0]) || void 0 === a ? void 0 : a.InstructorDescription,
                                    Course_page: !0
                                })
                            }) : (0, n.jsx)(f.tq, {
                                modules: [j.W_, j.tl, j.LW, j.s5, j.Qr, j.pt],
                                slidesPerView: 1,
                                spaceBetween: 30,
                                slidesPerGroup: 1,
                                loop: !0,
                                loopFillGroupWithBlank: !0,
                                pagination: {
                                    clickable: !0
                                },
                                updateOnWindowResize: !0,
                                observer: !0,
                                observeParents: !0,
                                className: "mySwiper",
                                breakpoints: {
                                    1340: {
                                        slidesPerView: 1
                                    }
                                },
                                autoplay: {
                                    delay: 1500
                                },
                                speed: 1e3,
                                children: null === s || void 0 === s ? void 0 : s.map((function(e, t) {
                                    return (0, n.jsx)(f.o5, {
                                        children: (0, n.jsx)(p.Z, {
                                            theme: d,
                                            profile_img: e.InstructorProfilePic.data[0].attributes.url,
                                            Name: e.InstructorName,
                                            designation: e.InstructorDesignition,
                                            description: e.InstructorDescription,
                                            Course_page: !0
                                        })
                                    }, t)
                                }))
                            })
                        })
                    })
                },
                g = i(3985);
            var N = function(e) {
                    var t = e.Faq_data,
                        i = e.active,
                        r = e.handleToggle,
                        a = (0, l.useContext)(o.Z).theme,
                        s = (0, l.useRef)();
                    return (0, n.jsx)(n.Fragment, {
                        children: (0, n.jsxs)("div", {
                            className: "rc-accordion-card_Faq",
                            id: "faq",
                            children: [(0, n.jsx)("div", {
                                className: "rc-accordion-header",
                                children: (0, n.jsxs)("div", {
                                    className: "rc-accordion-toggle_Faq bg-[#fff] p-3 ".concat(i === (null === t || void 0 === t ? void 0 : t.id) ? "active" : ""),
                                    onClick: function() {
                                        return r(null === t || void 0 === t ? void 0 : t.id)
                                    },
                                    children: [(0, n.jsx)("h5", {
                                        className: "rc-accordion-title ".concat("dark" == a ? "text-brColor" : "text-brand"),
                                        children: null === t || void 0 === t ? void 0 : t.question
                                    }), (0, n.jsx)("i", {
                                        className: "fa fa-chevron-down rc-accordion-icon",
                                        children: (0, n.jsx)(m.cuw, {})
                                    })]
                                })
                            }), (0, n.jsx)("div", {
                                ref: s,
                                className: "rc-collapse ".concat(i === (null === t || void 0 === t ? void 0 : t.id) ? "show" : ""),
                                style: i === (null === t || void 0 === t ? void 0 : t.id) ? {
                                    height: s.current.scrollHeight
                                } : {
                                    height: "0px"
                                },
                                children: (0, n.jsx)("div", {
                                    className: "p-4 flex flex-col gap-5  font-semibold ".concat("dark" == a ? "text-HeroSubText" : "text-textHead"),
                                    children: (0, n.jsx)("div", {
                                        className: "",
                                        children: (0, n.jsx)(g.D, {
                                            children: null === t || void 0 === t ? void 0 : t.answer
                                        })
                                    })
                                })
                            })]
                        })
                    })
                },
                w = function(e) {
                    var t, i, l = e.OverviewData;
                    return (0, n.jsxs)(n.Fragment, {
                        children: [(0, n.jsxs)("div", {
                            className: "mt-16",
                            children: [(0, n.jsx)("div", {
                                className: "text-[24px] leading-8 font-medium",
                                children: "What you will learn"
                            }), (0, n.jsx)("div", {
                                className: "grid md:grid-cols-2 grid-cols-1 px-5 py-14 gap-4",
                                children: null === l || void 0 === l || null === (t = l.WhatYouWillLearn) || void 0 === t ? void 0 : t.map((function(e, t) {
                                    return (0, n.jsxs)("div", {
                                        className: "flex items-center gap-4",
                                        children: [(0, n.jsx)("div", {
                                            className: "",
                                            children: (0, n.jsx)("svg", {
                                                width: "18",
                                                height: "14",
                                                viewBox: "0 0 18 14",
                                                fill: "none",
                                                xmlns: "http://www.w3.org/2000/svg",
                                                children: (0, n.jsx)("path", {
                                                    d: "M1 6.90742L6.02241 12L17 1",
                                                    stroke: "#6674CC",
                                                    strokeWidth: "2"
                                                })
                                            })
                                        }), (0, n.jsx)("div", {
                                            className: "text-[18px]",
                                            children: null === e || void 0 === e ? void 0 : e.KeyPoints
                                        })]
                                    }, t)
                                }))
                            })]
                        }), (0, n.jsxs)("div", {
                            className: "mt-12",
                            children: [(0, n.jsx)("div", {
                                className: "text-[24px] leading-8 font-medium",
                                children: "Basic Details"
                            }), (0, n.jsx)("div", {
                                className: "flex flex-col px-5 py-14 gap-4 w-full ",
                                children: null === l || void 0 === l || null === (i = l.BasicDetails) || void 0 === i ? void 0 : i.map((function(e, t) {
                                    return (0, n.jsxs)("div", {
                                        className: "md:flex grid grid-cols-2 items-center md:justify-start justify-between",
                                        children: [(0, n.jsx)("div", {
                                            className: "w-[40%]",
                                            children: e.Col1
                                        }), (0, n.jsx)("div", {
                                            className: "text-[18px]",
                                            children: e.Col2
                                        })]
                                    }, t)
                                }))
                            })]
                        })]
                    })
                },
                C = function(e) {
                    var t, i, r, a, s, d, u, x, v = e.courseData,
                        m = (0, l.useState)("overview"),
                        f = m[0],
                        p = m[1],
                        j = (0, l.useContext)(o.Z).theme,
                        g = "p-4 px-10 cursor-pointer transition- duration-300  whitespace-nowrap " + ("dark" == j && "text-[#fff]"),
                        C = (0, l.useState)(null),
                        k = C[0],
                        y = C[1],
                        _ = function(e) {
                            y(k === e ? null : e)
                        };
                    return (0, n.jsxs)("div", {
                        className: "py-10 mt-36 px-paddingXforMob",
                        children: [(0, n.jsxs)("div", {
                            className: "flex border border-[#D2D2D2] justify-between font-medium bg-[#6674CC1A] overflow-x-auto",
                            children: [(0, n.jsx)("div", {
                                className: " ".concat(g, " ").concat("overview" === f ? "border-b border-brand text-brand" : "", " "),
                                onClick: function() {
                                    return p("overview")
                                },
                                children: "Overview"
                            }), (0, n.jsx)(c(), {
                                href: "#course_content",
                                children: (0, n.jsx)("a", {
                                    children: (0, n.jsx)("div", {
                                        className: " ".concat(g, " ").concat("course-content" === f ? "border-b border-brand text-brand" : "", " "),
                                        onClick: function() {
                                            return p("course-content")
                                        },
                                        children: "Course Content"
                                    })
                                })
                            }), (0, n.jsx)(c(), {
                                href: "#instructor",
                                children: (0, n.jsx)("a", {
                                    children: (0, n.jsx)("div", {
                                        className: " ".concat(g, " ").concat("instructor" === f ? "border-b border-brand text-brand" : "", " "),
                                        onClick: function() {
                                            return p("instructor")
                                        },
                                        children: "Instructor"
                                    })
                                })
                            }), (0, n.jsx)(c(), {
                                href: "#faq",
                                children: (0, n.jsx)("a", {
                                    children: (0, n.jsx)("div", {
                                        className: " ".concat(g, " ").concat("faq" === f ? "border-b border-brand text-brand" : "", " "),
                                        onClick: function() {
                                            return p("faq")
                                        },
                                        children: "FAQs"
                                    })
                                })
                            })]
                        }), (0, n.jsx)("div", {
                            className: "border-b-[1.5px] ".concat("dark" == j ? "text-[#fff] border-grey50" : "border-[#00000033]"),
                            children: (0, n.jsx)(w, {
                                OverviewData: null === v || void 0 === v || null === (t = v.attributes) || void 0 === t ? void 0 : t.CourseOverview
                            })
                        }), (0, n.jsxs)("div", {
                            className: "border-b-[1.5px] ".concat("dark" == j ? "border-grey50" : "border-[#00000033]", " py-16"),
                            id: "course_content",
                            children: [(0, n.jsx)("div", {
                                className: "text-2xl font-semibold mb-14  ".concat("dark" == j && "text-[#fff]"),
                                children: "Course Content"
                            }), null === v || void 0 === v || null === (i = v.attributes) || void 0 === i || null === (r = i.CourseSection) || void 0 === r ? void 0 : r.map((function(e, t) {
                                return (0, n.jsx)(h, {
                                    active: k,
                                    handleToggle: _,
                                    AccData: e
                                }, t)
                            }))]
                        }), (0, n.jsxs)("div", {
                            className: "py-14 border-b-[1.5px] ".concat("dark" == j ? "border-grey50" : "border-[#00000033]"),
                            id: "instructor",
                            children: [(0, n.jsx)("div", {
                                className: "text-2xl font-semibold mb-14 ".concat("dark" == j && "text-[#fff]"),
                                children: 1 == (null === v || void 0 === v || null === (a = v.attributes) || void 0 === a || null === (s = a.Instructor) || void 0 === s ? void 0 : s.length) ? "Instructor" : "Instructors"
                            }), (0, n.jsx)("div", {
                                children: (0, n.jsx)(b, {
                                    Course_Ins_data: null === v || void 0 === v || null === (d = v.attributes) || void 0 === d ? void 0 : d.Instructor
                                })
                            })]
                        }), (0, n.jsxs)("div", {
                            className: "my-14",
                            id: "faq",
                            children: [(0, n.jsx)("div", {
                                className: "text-2xl font-semibold mb-14 ".concat("dark" == j && "text-[#fff]"),
                                children: "FAQs"
                            }), (0, n.jsx)("div", {
                                children: null === v || void 0 === v || null === (u = v.attributes) || void 0 === u || null === (x = u.faq) || void 0 === x ? void 0 : x.map((function(e, t) {
                                    return (0, n.jsx)(N, {
                                        Faq_data: e,
                                        active: k,
                                        handleToggle: _
                                    }, t)
                                }))
                            })]
                        })]
                    })
                },
                k = i(1163),
                y = i(3369);
            var _ = !0,
                D = function(e) {
                    var t, i, d, c, u, x, m, h, f, p, j, b, N, w, _, D, T = e.courseData,
                        I = (0, l.useContext)(o.Z).theme,
                        S = (0, k.useRouter)(),
                        F = (0, l.useState)(0),
                        B = F[0],
                        L = F[1];
                    return S.isFallback ? (0, n.jsx)(n.Fragment, {
                        children: "Loading..."
                    }) : (0, n.jsxs)("div", {
                        onClick: function() {
                            return L(5)
                        },
                        children: [(0, n.jsxs)("div", {
                            className: "w-full ".concat("dark" === I ? "bg-[#29347a]" : "bg-brand", "  relative"),
                            children: [(0, n.jsx)("img", {
                                src: r.Im,
                                alt: "bg-illus",
                                className: "hidden md:block absolute top-0 left-0 h-[850px] w-[100vw] object-cover md:-translate-y-72 -translate-y-52"
                            }), (0, n.jsxs)("div", {
                                className: "2xl:relative mx-auto min-h-[590px] max-w-maxScreen grid md:grid-cols-2 grid-cols-1 gap-4 md:gap-0",
                                children: [(0, n.jsxs)("div", {
                                    className: "flex flex-col gap-4 place-self-center py-14 px-paddingXforMob max-w-[650px] ".concat("dark" === I ? "text-[#e8e6e3]" : "text-[#fff]", " z-30"),
                                    children: [(0, n.jsxs)("div", {
                                        children: [(0, n.jsx)("p", {
                                            className: "text-[20px] ".concat("dark" === I ? "text-[#e8e6e3]" : "text-HeroSubText"),
                                            children: (0, n.jsx)(g.D, {
                                                children: null === T || void 0 === T || null === (t = T.attributes) || void 0 === t || null === (i = t.CourseBanner) || void 0 === i ? void 0 : i.TagLine
                                            })
                                        }), (0, n.jsx)("h1", {
                                            className: "text-[42px] font-bold",
                                            children: null === T || void 0 === T || null === (d = T.attributes) || void 0 === d ? void 0 : d.CourseName
                                        })]
                                    }), (0, n.jsx)("p", {
                                        className: "text-[20px] ".concat("dark" === I ? "text-[#e8e6e3]" : "text-HeroSubText"),
                                        children: (0, n.jsx)(g.D, {
                                            children: null === T || void 0 === T || null === (c = T.attributes) || void 0 === c || null === (u = c.CourseBanner) || void 0 === u ? void 0 : u.CourseDescription
                                        })
                                    }), (0, n.jsxs)("div", {
                                        className: "flex gap-2 items-center",
                                        children: [(0, n.jsx)("span", {
                                            children: null === T || void 0 === T || null === (x = T.attributes) || void 0 === x || null === (m = x.CourseBanner) || void 0 === m ? void 0 : m.Rating
                                        }), (0, n.jsx)(y.Z, {
                                            Review_Count: null === T || void 0 === T || null === (h = T.attributes) || void 0 === h || null === (f = h.CourseBanner) || void 0 === f ? void 0 : f.Rating
                                        })]
                                    }), (0, n.jsxs)("div", {
                                        className: "flex gap-5 text-lg",
                                        children: [(0, n.jsxs)("p", {
                                            className: "flex gap-2 items-center",
                                            children: [(0, n.jsx)(a.C1O, {}), " ", null === T || void 0 === T || null === (p = T.attributes) || void 0 === p || null === (j = p.CourseBanner) || void 0 === j ? void 0 : j.CourseLanguage]
                                        }), (0, n.jsxs)("p", {
                                            className: "flex gap-1 items-center",
                                            children: [(0, n.jsx)(s.mL_, {}), " ", null === T || void 0 === T || null === (b = T.attributes) || void 0 === b || null === (N = b.CourseBanner) || void 0 === N ? void 0 : N.NoOfLecture, " Lectures"]
                                        })]
                                    })]
                                }), (0, n.jsx)("div", {
                                    className: "relative w-full min-h-[200px] px-paddingXforMob",
                                    children: (0, n.jsx)(v, {
                                        CourseBannerData: null === T || void 0 === T || null === (w = T.attributes) || void 0 === w ? void 0 : w.CourseBanner,
                                        CourseCardData: null === T || void 0 === T || null === (_ = T.attributes) || void 0 === _ ? void 0 : _.CourseCard,
                                        CourseEnrollmentClosed: null === T || void 0 === T || null === (D = T.attributes) || void 0 === D ? void 0 : D.enrollmentClosed,
                                        videoVal: B
                                    })
                                })]
                            })]
                        }), (0, n.jsx)("div", {
                            className: "max-w-[1000px] mx-auto",
                            children: (0, n.jsx)(C, {
                                courseData: T
                            })
                        })]
                    })
                }
        },
        1163: function(e, t, i) {
            e.exports = i(387)
        }
    },
    function(e) {
        e.O(0, [907, 90, 556, 617, 706, 774, 888, 179], (function() {
            return t = 3915, e(e.s = t);
            var t
        }));
        var t = e.O();
        _N_E = t
    }
]);