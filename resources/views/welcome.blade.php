<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="referrer" content="origin-when-crossorigin" id="meta_referrer">
    <script>window._cstart = +new Date();</script>
    <script>function envFlush(a) {
            function b(c) {
                for (var d in a) c[d] = a[d]
            }

            if (window.requireLazy) window.requireLazy(["Env"], b); else {
                window.Env = window.Env || {};
                b(window.Env)
            }
        }

        envFlush({
            "ajaxpipe_token": "AXhCsXXqCKoBAxvK",
            "timeslice_heartbeat_config": {
                "pollIntervalMs": 33,
                "idleGapThresholdMs": 60,
                "ignoredTimesliceNames": {
                    "requestAnimationFrame": true,
                    "Event listenHandler mousemove": true,
                    "Event listenHandler mouseover": true,
                    "Event listenHandler mouseout": true,
                    "Event listenHandler scroll": true
                },
                "enableOnRequire": false
            },
            "shouldLogCounters": true,
            "timeslice_categories": {"react_render": true, "reflow": true},
            "khsh": "0`sj`e`rm`s-0fdu^gshdoer-0gc^eurf-3gc^eurf;1;enbtldou;fduDmdldourCxO`ld-2YLMIuuqSdptdru;qsnunuxqd;rdoe-0unjdojnx-0unjdojnx0-0gdubi^rdbsduOdv-0`sj`e`r-0q`xm`r-0StoRbs`qhof-0mhoj^q`xm`r",
            "dom_mutation_flag": true,
            "timesliceBufferSize": 5000,
            "sample_continuation_stacktraces": true
        });</script>
    <style></style>
    <script>__DEV__ = 0;
        CavalryLogger = window.CavalryLogger || function (a) {
            this.lid = a;
            this.transition = false;
            this.metric_collected = false;
            this.is_detailed_profiler = false;
            this.instrumentation_started = false;
            this.pagelet_metrics = {};
            this.events = {};
            this.ongoing_watch = {};
            this.values = {t_cstart: window._cstart};
            this.piggy_values = {};
            this.bootloader_metrics = {};
            this.resource_to_pagelet_mapping = {};
            this.e2eLogged = false;
            if (this.initializeInstrumentation) this.initializeInstrumentation()
        };
        CavalryLogger.prototype.setIsDetailedProfiler = function (a) {
            this.is_detailed_profiler = a;
            return this
        };
        CavalryLogger.prototype.setTTIEvent = function (a) {
            this.tti_event = a;
            return this
        };
        CavalryLogger.prototype.setValue = function (a, b, c, d) {
            var e = d ? this.piggy_values : this.values;
            if (typeof e[a] == "undefined" || c) e[a] = b;
            return this
        };
        CavalryLogger.prototype.getLastTtiValue = function () {
            return this.lastTtiValue
        };
        CavalryLogger.prototype.setTimeStamp = CavalryLogger.prototype.setTimeStamp || function (a, b, c, d) {
            this.mark(a);
            var e = this.values.t_cstart || this.values.t_start, f = d ? e + d : CavalryLogger.now();
            this.setValue(a, f, b, c);
            if (this.tti_event && a == this.tti_event) {
                this.lastTtiValue = f;
                this.setTimeStamp("t_tti", b)
            }
            return this
        };
        CavalryLogger.prototype.mark = typeof console === "object" && console.timeStamp ? function (a) {
            console.timeStamp(a)
        } : function () {
        };
        CavalryLogger.prototype.addPiggyback = function (a, b) {
            this.piggy_values[a] = b;
            return this
        };
        CavalryLogger.instances = {};
        CavalryLogger.id = 0;
        CavalryLogger.perfNubMarkup = "";
        CavalryLogger.getInstance = function (a) {
            if (typeof a == "undefined") a = CavalryLogger.id;
            if (!CavalryLogger.instances[a]) CavalryLogger.instances[a] = new CavalryLogger(a);
            return CavalryLogger.instances[a]
        };
        CavalryLogger.setPageID = function (a) {
            if (CavalryLogger.id === 0) {
                var b = CavalryLogger.getInstance();
                CavalryLogger.instances[a] = b;
                CavalryLogger.instances[a].lid = a;
                delete CavalryLogger.instances[0]
            }
            CavalryLogger.id = a
        };
        CavalryLogger.setPerfNubMarkup = function (a) {
            CavalryLogger.perfNubMarkup = a
        };
        CavalryLogger.now = function () {
            if (window.performance && performance.timing && performance.timing.navigationStart && performance.now) return performance.now() + performance.timing.navigationStart;
            return new Date().getTime()
        };
        CavalryLogger.prototype.measureResources = function () {
        };
        CavalryLogger.prototype.profileEarlyResources = function () {
        };
        CavalryLogger.getBootloaderMetricsFromAllLoggers = function () {
        };
        CavalryLogger.start_js = function () {
        };
        CavalryLogger.done_js = function () {
        };
        CavalryLogger.getInstance().setTTIEvent("t_domcontent");
        CavalryLogger.prototype.measureResources = function (a, b) {
            if (!this.log_resources) return;
            var c = "bootload/" + a.name;
            if (this.bootloader_metrics[c] !== undefined || this.ongoing_watch[c] !== undefined) return;
            var d = CavalryLogger.now();
            this.ongoing_watch[c] = d;
            if (!("start_" + c in this.bootloader_metrics)) this.bootloader_metrics["start_" + c] = d;
            if (b && !("tag_" + c in this.bootloader_metrics)) this.bootloader_metrics["tag_" + c] = b;
            if (a.type === "js") {
                var e = "js_exec/" + a.name;
                this.ongoing_watch[e] = d
            }
        };
        CavalryLogger.prototype.stopWatch = function (a) {
            if (this.ongoing_watch[a]) {
                var b = CavalryLogger.now(), c = b - this.ongoing_watch[a];
                this.bootloader_metrics[a] = c;
                var d = this.piggy_values;
                if (a.indexOf("bootload") === 0) {
                    if (!d.t_resource_download) d.t_resource_download = 0;
                    if (!d.resources_downloaded) d.resources_downloaded = 0;
                    d.t_resource_download += c;
                    d.resources_downloaded += 1;
                    if (d["tag_" + a] == "_EF_") d.t_pagelet_cssload_early_resources = b
                }
                delete this.ongoing_watch[a]
            }
            return this
        };
        CavalryLogger.getBootloaderMetricsFromAllLoggers = function () {
            var a = {};
            Object.values(window.CavalryLogger.instances).forEach(function (b) {
                if (b.bootloader_metrics) Object.assign(a, b.bootloader_metrics)
            });
            return a
        };
        CavalryLogger.start_js = function (a) {
            for (var b = 0; b < a.length; ++b) CavalryLogger.getInstance().stopWatch("js_exec/" + a[b])
        };
        CavalryLogger.done_js = function (a) {
            for (var b = 0; b < a.length; ++b) CavalryLogger.getInstance().stopWatch("bootload/" + a[b])
        };
        CavalryLogger.prototype.profileEarlyResources = function (a) {
            for (var b = 0; b < a.length; b++) this.measureResources({name: a[b][0], type: a[b][1] ? "js" : ""}, "_EF_")
        };
        CavalryLogger.getInstance().log_resources = true;
        CavalryLogger.getInstance().setIsDetailedProfiler(true);
        window.CavalryLogger && CavalryLogger.getInstance().setTimeStamp("t_start");</script>
    <noscript>
        <meta http-equiv="refresh" content="0; URL=/?_fb_noscript=1"/>
    </noscript>
    <title id="pageTitle">Facebook - Log In or Sign Up</title>
    <meta property="og:site_name" content="Facebook">
    <meta property="og:url" content="https://www.facebook.com/">
    <meta property="og:image" content="https://www.facebook.com/images/fb_icon_325x325.png">
    <meta property="og:locale" content="en_US">
    <script type="application/ld+json">
        {"\u0040context":"http:\/\/schema.org","\u0040type":"WebSite","name":"Facebook","url":"https:\/\/www.facebook.com\/"}
    </script>
    <link rel="search" type="application/opensearchdescription+xml" href="/osd.xml" title="Facebook">
    <link rel="canonical" href="https://www.facebook.com/">
    <link rel="alternate" media="only screen and (max-width: 640px)" href="https://m.facebook.com/">
    <link rel="alternate" media="handheld" href="https://m.facebook.com/">
    <link rel="alternate" hreflang="x-default" href="https://www.facebook.com/">
    <link rel="alternate" hreflang="en" href="https://www.facebook.com/">
    <link rel="alternate" hreflang="ar" href="https://ar-ar.facebook.com/">
    <link rel="alternate" hreflang="bg" href="https://bg-bg.facebook.com/">
    <link rel="alternate" hreflang="bs" href="https://bs-ba.facebook.com/">
    <link rel="alternate" hreflang="ca" href="https://ca-es.facebook.com/">
    <link rel="alternate" hreflang="da" href="https://da-dk.facebook.com/">
    <link rel="alternate" hreflang="el" href="https://el-gr.facebook.com/">
    <link rel="alternate" hreflang="es" href="https://es-la.facebook.com/">
    <link rel="alternate" hreflang="es-es" href="https://es-es.facebook.com/">
    <link rel="alternate" hreflang="fa" href="https://fa-ir.facebook.com/">
    <link rel="alternate" hreflang="fi" href="https://fi-fi.facebook.com/">
    <link rel="alternate" hreflang="fr" href="https://fr-fr.facebook.com/">
    <link rel="alternate" hreflang="fr-ca" href="https://fr-ca.facebook.com/">
    <link rel="alternate" hreflang="hi" href="https://hi-in.facebook.com/">
    <link rel="alternate" hreflang="hr" href="https://hr-hr.facebook.com/">
    <link rel="alternate" hreflang="id" href="https://id-id.facebook.com/">
    <link rel="alternate" hreflang="it" href="https://it-it.facebook.com/">
    <link rel="alternate" hreflang="ko" href="https://ko-kr.facebook.com/">
    <link rel="alternate" hreflang="mk" href="https://mk-mk.facebook.com/">
    <link rel="alternate" hreflang="ms" href="https://ms-my.facebook.com/">
    <link rel="alternate" hreflang="pl" href="https://pl-pl.facebook.com/">
    <link rel="alternate" hreflang="pt" href="https://pt-br.facebook.com/">
    <link rel="alternate" hreflang="pt-pt" href="https://pt-pt.facebook.com/">
    <link rel="alternate" hreflang="ro" href="https://ro-ro.facebook.com/">
    <link rel="alternate" hreflang="sl" href="https://sl-si.facebook.com/">
    <link rel="alternate" hreflang="sr" href="https://sr-rs.facebook.com/">
    <link rel="alternate" hreflang="th" href="https://th-th.facebook.com/">
    <link rel="alternate" hreflang="vi" href="https://vi-vn.facebook.com/">
    <meta name="description"
          content="Create an account or log into Facebook. Connect with friends, family and other people you know. Share photos and videos, send messages and get updates.">
    <meta name="robots" content="noodp,noydir">
    <link rel="shortcut icon" href="https://www.facebook.com/rsrc.php/yl/r/H3nktOa7ZMg.ico">
    <link type="text/css" rel="stylesheet" href="https://www.facebook.com/rsrc.php/v3/y0/l/0,cross/cNx5KonUJ8I.css"
          data-bootloader-hash="qKIht" data-permanent="1" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="https://www.facebook.com/rsrc.php/v3/yR/l/0,cross/af6Oxo1W56Y.css"
          data-bootloader-hash="AsK+q" data-permanent="1" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="https://www.facebook.com/rsrc.php/v3/yn/l/0,cross/HbRvWLo2Xj2.css"
          data-bootloader-hash="44wiD" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="https://www.facebook.com/rsrc.php/v3/y2/l/0,cross/lZ86cv9aR90.css"
          data-bootloader-hash="f+J2L" crossorigin="anonymous">
    <script src="https://www.facebook.com/rsrc.php/v3/yM/r/jA-lRWVfqyo.js" data-bootloader-hash="kNiwq"
            crossorigin="anonymous"></script>
    <script>require("TimeSlice").guard(function () {
            (require("ServerJSDefine")).handleDefines([["LinkReactUnsafeHrefConfig", [], {"LinkHrefChecker": null}, 1182], ["LinkshimHandlerConfig", [], {
                "supports_meta_referrer": true,
                "default_meta_referrer_policy": "origin-when-crossorigin",
                "switched_meta_referrer_policy": "origin",
                "link_react_default_hash": "ATNMwi0DrTps25J9xCqmBz_77mz3iVLarQYD5kdqAYkZZKWPDJLx80Q3v4_uqoR10xsozIKJlfC01h0YPcV9cvWvHGv3hok2yIIjD0fVbZpoxH0GkLU1vidktps",
                "untrusted_link_default_hash": "ATP3s4mEhhZzeBDe2P0P1dOXe1VDjC4ZLu8aqXsxBVTzitdTlV6NIcxBnjGhxLSkzVKnAP1uNGy05y5NopoGGj6VKIl49tfaS3RVIBYqUms3z4NJdTAdrx9AvXQ",
                "linkshim_host": "l.facebook.com",
                "use_rel_no_opener": false,
                "always_use_https": true,
                "onion_always_shim": true,
                "middle_click_requires_event": true,
                "post_request_click_log": false
            }, 27], ["BootloaderConfig", [], {
                "maxJsRetries": 0,
                "jsRetries": null,
                "jsRetryAbortNum": 2,
                "jsRetryAbortTime": 5,
                "payloadEndpointURI": "https:\/\/www.facebook.com\/ajax\/haste-response\/",
                "assumeNotNonblocking": false,
                "assumePermanent": false
            }, 329], ["CSSLoaderConfig", [], {
                "timeout": 5000,
                "modulePrefix": "BLCSS:",
                "loadEventSupported": true
            }, 619], ["CurrentCommunityInitialData", [], {}, 490], ["CurrentUserInitialData", [], {
                "USER_ID": "0",
                "ACCOUNT_ID": "0",
                "NAME": "",
                "SHORT_NAME": null
            }, 270], ["DTSGInitialData", [], {}, 258], ["ISB", [], {}, 330], ["LSD", [], {"token": "AVpsgU3V"}, 323], ["SiteData", [], {
                "server_revision": 3380385,
                "client_revision": 3380385,
                "tier": "",
                "push_phase": "C2",
                "pkg_cohort": "PHASED:DEFAULT",
                "pkg_cohort_key": "__pc",
                "haste_site": "www",
                "be_mode": -1,
                "be_key": "__be",
                "is_rtl": false,
                "features": "h0",
                "vip": "157.240.9.35"
            }, 317], ["SprinkleConfig", [], {"param_name": "jazoest"}, 2111], ["AsyncFeatureDeployment", [], {}, 1765], ["CoreWarningGK", [], {"forceWarning": false}, 725], ["BanzaiConfig", [], {
                "EXPIRY": 86400000,
                "MAX_SIZE": 10000,
                "MAX_WAIT": 150000,
                "RESTORE_WAIT": 150000,
                "blacklist": ["time_spent"],
                "gks": {
                    "boosted_component": true,
                    "boosted_pagelikes": true,
                    "jslogger": true,
                    "mercury_send_error_logging": true,
                    "platform_oauth_client_events": true,
                    "profile_timeline_ui": true,
                    "visibility_tracking": true,
                    "graphexplorer": true,
                    "gqls_web_logging": true,
                    "sticker_search_ranking": true
                }
            }, 7], ["UserAgentData", [], {
                "browserArchitecture": "64",
                "browserFullVersion": "56.0",
                "browserMinorVersion": 0,
                "browserName": "Firefox",
                "browserVersion": 56,
                "deviceName": "Unknown",
                "engineName": "Gecko",
                "engineVersion": "56.0",
                "platformArchitecture": "64",
                "platformName": "Linux",
                "platformVersion": null,
                "platformFullVersion": null
            }, 527], ["ZeroRewriteRules", [], {
                "rewrite_rules": {},
                "whitelist": {
                    "\/hr\/r": 1,
                    "\/hr\/p": 1,
                    "\/zero\/unsupported_browser\/": 1,
                    "\/zero\/policy\/optin": 1,
                    "\/zero\/optin\/write\/": 1,
                    "\/zero\/optin\/legal\/": 1,
                    "\/zero\/optin\/free\/": 1,
                    "\/about\/privacy\/": 1,
                    "\/zero\/toggle\/welcome\/": 1,
                    "\/work\/landing": 1,
                    "\/work\/login\/": 1,
                    "\/work\/email\/": 1,
                    "\/ai.php": 1,
                    "\/js_dialog_resources\/dialog_descriptions_android.json": 1,
                    "\/connect\/jsdialog\/MPlatformAppInvitesJSDialog\/": 1,
                    "\/connect\/jsdialog\/MPlatformOAuthShimJSDialog\/": 1,
                    "\/connect\/jsdialog\/MPlatformLikeJSDialog\/": 1,
                    "\/qp\/interstitial\/": 1,
                    "\/qp\/action\/redirect\/": 1,
                    "\/qp\/action\/close\/": 1,
                    "\/zero\/support\/ineligible\/": 1,
                    "\/zero_balance_redirect\/": 1,
                    "\/zero_balance_redirect": 1,
                    "\/l.php": 1,
                    "\/lsr.php": 1,
                    "\/ajax\/dtsg\/": 1,
                    "\/checkpoint\/block\/": 1,
                    "\/exitdsite": 1,
                    "\/zero\/balance\/pixel\/": 1,
                    "\/zero\/balance\/": 1,
                    "\/zero\/balance\/carrier_landing\/": 1,
                    "\/tr": 1,
                    "\/tr\/": 1,
                    "\/sem_campaigns\/sem_pixel_test\/": 1,
                    "\/bookmarks\/flyout\/body\/": 1,
                    "\/zero\/subno\/": 1,
                    "\/confirmemail.php": 1,
                    "\/policies\/": 1
                }
            }, 1478], ["InteractionTrackerRates", [], {
                "default": 0.125,
                "scroll_log": 0.001
            }, 2343], ["WebSpeedJSExperiments", [], {
                "non_blocking_tracker": false,
                "non_blocking_logger": false,
                "i10s_io_on_visible": false,
                "webspeed_animations_opacity": false,
                "fastload": false,
                "minimum_snowlift": true,
                "no_sync_scrolling": false,
                "idle_logging": false
            }, 2458], ["AsyncRequestConfig", [], {
                "retryOnNetworkError": "1",
                "logAsyncRequest": false,
                "immediateDispatch": false,
                "useFetchStreamAjaxPipeTransport": false
            }, 328], ["PromiseUsePolyfillSetImmediateGK", [], {"www_always_use_polyfill_setimmediate": false}, 2190], ["SessionNameConfig", [], {"seed": "0prS"}, 757], ["ZeroCategoryHeader", [], {}, 1127], ["TrackingConfig", [], {"domain": "https:\/\/pixel.facebook.com"}, 325], ["BigPipeExperiments", [], {
                "preparse_content": "",
                "link_images_to_pagelets": false,
                "enable_bigpipe_plugins": false
            }, 907], ["PageletGK", [], {
                "destroyDomAfterEventHandler": false,
                "skipClearingChildrenOnUnmount": true
            }, 2327], ["ErrorSignalConfig", [], {"uri": "https:\/\/error.facebook.com\/common\/scribe_endpoint.php"}, 319], ["ServerNonce", [], {"ServerNonce": "2efVA5Xh9kaeQQhaW2JJku"}, 141], ["KSConfig", [], {"killed": {"__set": ["POCKET_MONSTERS_CREATE", "POCKET_MONSTERS_UPDATE_NAME", "POCKET_MONSTERS_DELETE", "VIDEO_DIMENSIONS_FROM_PLAYER_IN_UPLOAD_DIALOG"]}}, 2580], ["AdsInterfacesSessionConfig", [], {}, 2393], ["EventConfig", [], {
                "sampling": {
                    "bandwidth": 0,
                    "play": 0,
                    "playing": 0,
                    "progress": 0,
                    "pause": 0,
                    "ended": 0,
                    "seeked": 0,
                    "seeking": 0,
                    "waiting": 0,
                    "loadedmetadata": 0,
                    "canplay": 0,
                    "selectionchange": 0,
                    "change": 0,
                    "timeupdate": 2000000,
                    "adaptation": 0,
                    "focus": 0,
                    "blur": 0,
                    "load": 0,
                    "error": 0,
                    "message": 0,
                    "abort": 0,
                    "storage": 0,
                    "scroll": 200000,
                    "mousemove": 20000,
                    "mouseover": 10000,
                    "mouseout": 10000,
                    "mousewheel": 1,
                    "MSPointerMove": 10000,
                    "keydown": 0.1,
                    "click": 0.02,
                    "mouseup": 0.02,
                    "__100ms": 0.001,
                    "__default": 5000,
                    "__min": 100,
                    "__interactionDefault": 200,
                    "__eventDefault": 100000
                },
                "page_sampling_boost": 1,
                "interaction_regexes": {
                    "BlueBarAccountChevronMenu": " _5lxs(?: .*)?$",
                    "BlueBarHomeButton": " _bluebarLinkHome__interaction-root(?: .*)?$",
                    "BlueBarProfileLink": " _1k67(?: .*)?$",
                    "ReactComposerSproutMedia": " _1pnt(?: .*)?$",
                    "ReactComposerSproutAlbum": " _1pnu(?: .*)?$",
                    "ReactComposerSproutNote": " _3-9x(?: .*)?$",
                    "ReactComposerSproutLocation": " _1pnv(?: .*)?$",
                    "ReactComposerSproutActivity": " _1pnz(?: .*)?$",
                    "ReactComposerSproutPeople": " _1pn-(?: .*)?$",
                    "ReactComposerSproutLiveVideo": " _5tv7(?: .*)?$",
                    "ReactComposerSproutMarkdown": " _311p(?: .*)?$",
                    "ReactComposerSproutFormattedText": " _mwg(?: .*)?$",
                    "ReactComposerSproutSticker": " _2vri(?: .*)?$",
                    "ReactComposerSproutSponsor": " _5t5q(?: .*)?$",
                    "ReactComposerSproutEllipsis": " _1gr3(?: .*)?$",
                    "ReactComposerSproutContactYourRepresentative": " _3cnv(?: .*)?$",
                    "ReactComposerSproutFunFact": " _2_xs(?: .*)?$",
                    "TextExposeSeeMoreLink": " see_more_link(?: .*)?$",
                    "SnowliftBigCloseButton": "(?: _xlt(?: .*)? _418x(?: .*)?$| _418x(?: .*)? _xlt(?: .*)?$)",
                    "SnowliftPrevPager": "(?: snowliftPager(?: .*)? prev(?: .*)?$| prev(?: .*)? snowliftPager(?: .*)?$)",
                    "SnowliftNextPager": "(?: snowliftPager(?: .*)? next(?: .*)?$| next(?: .*)? snowliftPager(?: .*)?$)",
                    "SnowliftFullScreenButton": "#fbPhotoSnowliftFullScreenSwitch .*",
                    "PrivacySelectorMenu": "(?: _57di(?: .*)? _2wli(?: .*)?$| _2wli(?: .*)? _57di(?: .*)?$)",
                    "ReactComposerFeedXSprouts": " _nh6(?: .*)?$",
                    "SproutsComposerStatusTab": " _sg1(?: .*)?$",
                    "SproutsComposerLiveVideoTab": " _sg1(?: .*)?$",
                    "SproutsComposerAlbumTab": " _sg1(?: .*)?$",
                    "composerAudienceSelector": " _ej0(?: .*)?$",
                    "FeedHScrollAttachmentsPrevPager": " _1qqy(?: .*)?$",
                    "FeedHScrollAttachmentsNextPager": " _1qqz(?: .*)?$",
                    "fbFeedPageletStory": "(?: _5jmm(?: .*)? _5pat(?: .*)? _3lb4(?: .*)?$| _5pat(?: .*)? _5jmm(?: .*)? _3lb4(?: .*)?$| _3lb4(?: .*)? _5jmm(?: .*)? _5pat(?: .*)?$| _5jmm(?: .*)? _3lb4(?: .*)? _5pat(?: .*)?$| _5pat(?: .*)? _3lb4(?: .*)? _5jmm(?: .*)?$| _3lb4(?: .*)? _5pat(?: .*)? _5jmm(?: .*)?$)",
                    "DockChatTabFlyout": " fbDockChatTabFlyout(?: .*)?$",
                    "PrivacyLiteJewel": " _59fc(?: .*)?$",
                    "ActorSelector": " _6vh(?: .*)?$",
                    "LegacyMentionsInput": "(?: ReactLegacyMentionsInput(?: .*)? uiMentionsInput(?: .*)? _2xwx(?: .*)?$| uiMentionsInput(?: .*)? ReactLegacyMentionsInput(?: .*)? _2xwx(?: .*)?$| _2xwx(?: .*)? ReactLegacyMentionsInput(?: .*)? uiMentionsInput(?: .*)?$| ReactLegacyMentionsInput(?: .*)? _2xwx(?: .*)? uiMentionsInput(?: .*)?$| uiMentionsInput(?: .*)? _2xwx(?: .*)? ReactLegacyMentionsInput(?: .*)?$| _2xwx(?: .*)? uiMentionsInput(?: .*)? ReactLegacyMentionsInput(?: .*)?$)",
                    "UFIActionLinksEmbedLink": " _2g1w(?: .*)?$",
                    "UFIPhotoAttachLink": " UFIPhotoAttachLinkWrapper(?: .*)?$",
                    "UFILikeLink": "(?: UFILikeLink(?: .*)? _48-k(?: .*)?$| _48-k(?: .*)? UFILikeLink(?: .*)?$)",
                    "UFIMentionsInputProxy": " _1osa(?: .*)?$",
                    "UFIMentionsInputDummy": " _1osc(?: .*)?$",
                    "UFIOrderingModeSelector": " _3scp(?: .*)?$",
                    "UFIPager": "(?: UFIPagerRow(?: .*)? UFIRow(?: .*)?$| UFIRow(?: .*)? UFIPagerRow(?: .*)?$)",
                    "UFIReplyRow": "(?: UFIReplyRow(?: .*)? UFICommentReply(?: .*)?$| UFICommentReply(?: .*)? UFIReplyRow(?: .*)?$)",
                    "UFIReplySocialSentence": " UFIReplySocialSentenceRow(?: .*)?$",
                    "UFIShareLink": " _5f9b(?: .*)?$",
                    "UFIStickerButton": " UFICommentStickerButton(?: .*)?$",
                    "MentionsInput": " _5yk1(?: .*)?$",
                    "FantaChatTabRoot": " _3_9e(?: .*)?$",
                    "SnowliftViewableRoot": " _2-sx(?: .*)?$",
                    "ReactBlueBarJewelButton": " _5fwr(?: .*)?$",
                    "UFIReactionsDialogLayerImpl": " _1oxk(?: .*)?$",
                    "UFIReactionsLikeLinkImpl": " _4x9_(?: .*)?$",
                    "UFIReactionsLinkImplRoot": " _khz(?: .*)?$",
                    "Reaction": " _iuw(?: .*)?$",
                    "UFIReactionsMenuImpl": " _iu-(?: .*)?$",
                    "UFIReactionsSpatialReactionIconContainer": " UFICommentStickerButton(?: .*)?$",
                    "VideoComponentPlayButton": " _bsl(?: .*)?$",
                    "FeedOptionsPopover": " _b1e(?: .*)?$",
                    "UFICommentLikeCount": " UFICommentLikeButton(?: .*)?$",
                    "UFICommentLink": " _5yxe(?: .*)?$",
                    "ChatTabComposerInputContainer": " _552h(?: .*)?$",
                    "ChatTabHeader": " _15p4(?: .*)?$",
                    "DraftEditor": " _5rp7(?: .*)?$",
                    "ChatSideBarDropDown": " _5vm9(?: .*)?$",
                    "SearchBox": " _539-(?: .*)?$",
                    "ChatSideBarLink": " _55ln(?: .*)?$",
                    "MessengerSearchTypeahead": " _3rh8(?: .*)?$",
                    "NotificationListItem": " _33c(?: .*)?$",
                    "MessageJewelListItem": " messagesContent(?: .*)?$",
                    "Messages_Jewel_Button": " _3eo8(?: .*)?$",
                    "Notifications_Jewel_Button": " _3eo9(?: .*)?$",
                    "snowliftopen": " _342u(?: .*)?$",
                    "NoteTextSeeMoreLink": " _3qd_(?: .*)?$",
                    "fbFeedOptionsPopover": " _1he6(?: .*)?$",
                    "Requests_Jewel_Button": " _3eoa(?: .*)?$",
                    "UFICommentActionLinkAjaxify": " _15-3(?: .*)?$",
                    "UFICommentActionLinkRedirect": " _15-6(?: .*)?$",
                    "UFICommentActionLinkDispatched": " _15-7(?: .*)?$",
                    "UFICommentCloseButton": " _36rj(?: .*)?$",
                    "UFICommentActionsRemovePreview": " _460h(?: .*)?$",
                    "UFICommentActionsReply": " _460i(?: .*)?$",
                    "UFICommentActionsSaleItemMessage": " _460j(?: .*)?$",
                    "UFICommentActionsAcceptAnswer": " _460k(?: .*)?$",
                    "UFICommentActionsUnacceptAnswer": " _460l(?: .*)?$",
                    "UFICommentReactionsLikeLink": " _3-me(?: .*)?$",
                    "UFICommentMenu": " _1-be(?: .*)?$",
                    "UFIMentionsInputFallback": " _289b(?: .*)?$",
                    "UFIMentionsInputComponent": " _289c(?: .*)?$",
                    "UFIMentionsInputProxyInput": " _432z(?: .*)?$",
                    "UFIMentionsInputProxyDummy": " _432-(?: .*)?$",
                    "UFIPrivateReplyLinkMessage": " _14hj(?: .*)?$",
                    "UFIPrivateReplyLinkSeeReply": " _14hk(?: .*)?$",
                    "ChatCloseButton": " _4vu4(?: .*)?$",
                    "ChatTabComposerPhotoUploader": " _13f-(?: .*)?$",
                    "ChatTabComposerGroupPollingButton": " _13f_(?: .*)?$",
                    "ChatTabComposerGames": " _13ga(?: .*)?$",
                    "ChatTabComposerPlan": " _13gb(?: .*)?$",
                    "ChatTabComposerFileUploader": " _13gd(?: .*)?$",
                    "ChatTabStickersButton": " _13ge(?: .*)?$",
                    "ChatTabComposerGifButton": " _13gf(?: .*)?$",
                    "ChatTabComposerEmojiPicker": " _13gg(?: .*)?$",
                    "ChatTabComposerLikeButton": " _13gi(?: .*)?$",
                    "ChatTabComposerP2PButton": " _13gj(?: .*)?$",
                    "ChatTabComposerQuickCam": " _13gk(?: .*)?$",
                    "ChatTabHeaderAudioRTCButton": " _461a(?: .*)?$",
                    "ChatTabHeaderVideoRTCButton": " _461b(?: .*)?$",
                    "ChatTabHeaderOptionsButton": " _461_(?: .*)?$",
                    "ChatTabHeaderAddToThreadButton": " _4620(?: .*)?$",
                    "ReactComposerMediaSprout": " _fk5(?: .*)?$",
                    "UFIReactionsBlingSocialSentenceComments": " _-56(?: .*)?$",
                    "UFIReactionsBlingSocialSentenceSeens": " _2x0l(?: .*)?$",
                    "UFIReactionsBlingSocialSentenceShares": " _2x0m(?: .*)?$",
                    "UFIReactionsBlingSocialSentenceViews": " _-5c(?: .*)?$",
                    "UFIReactionsBlingSocialSentence": " _-5d(?: .*)?$",
                    "UFIReactionsSocialSentence": " _1vaq(?: .*)?$",
                    "VideoFullscreenButton": " _39ip(?: .*)?$",
                    "Tahoe": " _400z(?: .*)?$",
                    "TahoeFromVideoPlayer": " _1vek(?: .*)?$",
                    "TahoeFromVideoLink": " _2-40(?: .*)?$",
                    "TahoeFromPhoto": " _2ju5(?: .*)?$"
                },
                "interaction_boost": {
                    "SnowliftNextPager": 0.2,
                    "ChatSideBarLink": 2,
                    "MessengerSearchTypeahead": 2,
                    "MessageJewelListItem": 2,
                    "Messages_Jewel_Button": 2.5,
                    "Notifications_Jewel_Button": 1.5,
                    "Tahoe": 30
                }
            }, 1726], ["HotReloadConfig", [], {"isEnabled": false}, 2649], ["ReactFiberErrorLoggerConfig", [], {
                "bugNubClickTargetClassName": null,
                "enableDialog": false
            }, 2115], ["TimeSliceInteractionSV", [], {
                "on_demand_reference_counting": false,
                "default_rate": 1000,
                "lite_default_rate": 100,
                "interaction_to_coinflip": {
                    "ADS_INTERFACES_INTERACTION": 1,
                    "ads_perf_scenario": 1,
                    "ads_wait_time": 1,
                    "async_request": 0,
                    "video_psr": 1000000,
                    "video_stall": 2500000,
                    "snowlift_open_autoclosed": 0,
                    "Event": 100,
                    "cms_editor": 1,
                    "page_messaging_shortlist": 1,
                    "ffd_chart_loading": 1,
                    "pixelcloud_view_performance": 25
                },
                "interaction_to_lite_coinflip": {
                    "ADS_INTERFACES_INTERACTION": 0,
                    "ads_perf_scenario": 0,
                    "ads_wait_time": 0,
                    "Event": 1,
                    "video_psr": 0,
                    "video_stall": 0
                },
                "enable_heartbeat": true,
                "maxBlockMergeDuration": 0,
                "maxBlockMergeDistance": 0,
                "banzai_stream_coinflip": 100,
                "compression_enabled": true
            }, 2609], ["AsyncProfilerWorkerResource", [], {
                "url": "https:\/\/www.facebook.com\/rsrc.php\/v3\/y1\/r\/6ACETGBxI2A.js",
                "name": "AsyncProfilerWorkerBundle"
            }, 2779], ["ServiceWorkerBackgroundSyncBanzaiGK", [], {"sw_background_sync_banzai": false}, 1621], ["CookieCoreConfig", [], {
                "a11y": {},
                "act": {},
                "c_user": {},
                "ddid": {"p": "\/deferreddeeplink\/", "t": 2419200},
                "dpr": {"t": 604800},
                "js_ver": {"t": 604800},
                "locale": {"t": 604800},
                "lh": {"t": 604800},
                "m_pixel_ratio": {"t": 604800},
                "noscript": {},
                "pnl_data2": {"t": 2},
                "presence": {},
                "rdir": {},
                "sW": {},
                "sfau": {},
                "wd": {"t": 604800},
                "x-referer": {},
                "x-src": {"t": 1}
            }, 2104], ["FbtLogger", [], {"logger": null}, 288], ["FbtQTOverrides", [], {"overrides": {"1_580c473306a7ebe3d52d81e4eee379ce": "Share as Post"}}, 551], ["FbtResultGK", [], {
                "shouldReturnFbtResult": true,
                "inlineMode": "NO_INLINE"
            }, 876], ["IntlHoldoutGK", [], {"inIntlHoldout": false}, 2827], ["IntlViewerContext", [], {"GENDER": 3}, 772], ["NumberFormatConfig", [], {
                "decimalSeparator": ".",
                "numberDelimiter": ",",
                "minDigitsForThousandsSeparator": 4,
                "switchImplementationGK": true,
                "standardDecimalPatternInfo": {"primaryGroupSize": 3, "secondaryGroupSize": 3},
                "numberingSystemData": null
            }, 54], ["IntlPhonologicalRules", [], {
                "meta": {"\/_B\/": "([.,!?\\s]|^)", "\/_E\/": "([.,!?\\s]|$)"},
                "patterns": {
                    "\/\u0001(.*)('|&#039;)s\u0001(?:'|&#039;)s(.*)\/": "\u0001$1$2s\u0001$3",
                    "\/_\u0001([^\u0001]*)\u0001\/": "javascript"
                }
            }, 1496], ["ReactGK", [], {
                "fiberAsyncScheduling": false,
                "unmountOnBeforeClearCanvas": true
            }, 998], ["ServiceWorkerBackgroundSyncGK", [], {"background_sync_sw": false}, 1628], ["WebWorkerConfig", [], {
                "logging": {
                    "enabled": true,
                    "config": "WebWorkerLoggerConfig"
                }, "evalWorkerURL": "\/rsrc.php\/v3\/yz\/r\/t4zvM1nFGL5.js"
            }, 297], ["URLFragmentPreludeConfig", [], {
                "incorporateQuicklingFragment": true,
                "hashtagRedirect": true
            }, 137], ["UFIConfig", [], {
                "commentVPVD": {
                    "debug_console": false,
                    "debug_html": false,
                    "idle_timeout": 5000,
                    "locations": ["permalink", "newsstand"],
                    "everywhere": true,
                    "min_duration_to_log": 100,
                    "min_visible_size": 200
                },
                "enableCommentListVisibilityTracking": false,
                "defaultPageSize": 50,
                "renderEmoji": true,
                "renderEmoticons": true,
                "shouldShowGIFsInCommentsNux": false,
                "shouldShowMarkdownCommentNUX": false,
                "vpvLoggingTimeout": 1000,
                "facecastWWWCommentQueueThreshold": 3,
                "canPublishLive": false,
                "logChangeOrderingModeUsageSampleRate": 1,
                "logCommentsTimespent": true,
                "logWhetherUFISeen": false,
                "showHashtagTypeahead": false,
                "logCommentPost": false,
                "logCommentLoad": false,
                "reactionsHasDirectReactTokens": false,
                "reactionsHasDirectReactTokensCounts": false,
                "reactionsDirectReactTokensModule": null,
                "reactionsFunnelLogger": null,
                "reactionsHasFunnelLogger": false,
                "reactionsHasCommentFunnelLogger": false,
                "reactionsBlingBarFunnelLogger": null,
                "reactionsHasCommentsNux": false,
                "reactionsHasTooltipBreakdown": false,
                "reactionsHasAnimatedIcons": false,
                "reactionsOnlyAnimateIconsOnHover": false,
                "reactionsAnimatedIconsShouldPreload": false,
                "reactionsAnimatedIconSizing": "original",
                "reactionsAnimatedIconsHavePNGFallback": false,
                "reactionsAnimatedIconsPreloadIntent": "actions_hover",
                "reactionsAnimatedIconsPreloadKeyframesModule": false,
                "reactionsHasStaticFileVectorDock": false,
                "reactionsHasSuggestedReaction": false,
                "reactionsHasReactionsRollback": true,
                "reactionsHasCommentReactionsRollback": true,
                "reactionsHasReactionsRetry": true,
                "reactionsHasCommentReactionsRetry": true,
                "reactFiberAsyncUFI": false,
                "showCommentEmbedOption": true,
                "showCommonalityContext": false,
                "publicConversationsUnicornWhitelist": false,
                "typingIndicator": {"subscribe": false, "showInline": false, "showPill": false, "fromEveryone": false},
                "maxSubscriptionLiveCommentsQueueLength": 10,
                "showChooseLoveAnimation": false,
                "feedfocusWrapperModule": null,
                "shouldTranslationsReplaceContent": true,
                "shouldShowCommentingAsConstituentNUX": false,
                "showUFICrowdsource": false,
                "flushEventQueueBeforeRenderTimeout": 0,
                "flushEventQueueBeforeRenderUseIdleCallback": false,
                "UFICommentFilterFallbackWarning": null,
                "useMiddotDividersInAttachmentFooter": false,
                "showCustom": true
            }, 71], ["InitialServerTime", [], {"serverTime": 1508321489000}, 204], ["UFIReactionTypes", [], {
                "LIKE": 1,
                "ordering": [1, 2, 13, 11, 12, 4, 5, 3, 10, 7, 8, 14, 15],
                "NONE": 0,
                "reactions": {
                    "1": {
                        "class_name": "_3j7l",
                        "color": "#5890ff",
                        "display_name": "Like",
                        "is_deprecated": false,
                        "is_visible": true,
                        "name": "like",
                        "type": 1
                    },
                    "2": {
                        "class_name": "_3j7m",
                        "color": "#f25268",
                        "display_name": "Love",
                        "is_deprecated": false,
                        "is_visible": true,
                        "name": "love",
                        "type": 2
                    },
                    "13": {
                        "class_name": null,
                        "color": "#1d2129",
                        "display_name": "Selfie",
                        "is_deprecated": false,
                        "is_visible": false,
                        "name": "selfie",
                        "type": 13
                    },
                    "11": {
                        "class_name": "_3rya",
                        "color": "#7e64c4",
                        "display_name": "Thankful",
                        "is_deprecated": false,
                        "is_visible": true,
                        "name": "dorothy",
                        "type": 11
                    },
                    "12": {
                        "class_name": "_4aou",
                        "color": "#EC7EBD",
                        "display_name": "Pride",
                        "is_deprecated": false,
                        "is_visible": true,
                        "name": "toto",
                        "type": 12
                    },
                    "4": {
                        "class_name": "_3j7o",
                        "color": "#f0ba15",
                        "display_name": "Haha",
                        "is_deprecated": false,
                        "is_visible": true,
                        "name": "haha",
                        "type": 4
                    },
                    "5": {
                        "class_name": "_3j7p",
                        "color": "#f0ba15",
                        "display_name": "Yay",
                        "is_deprecated": true,
                        "is_visible": true,
                        "name": "yay",
                        "type": 5
                    },
                    "3": {
                        "class_name": "_3j7n",
                        "color": "#f0ba15",
                        "display_name": "Wow",
                        "is_deprecated": false,
                        "is_visible": true,
                        "name": "wow",
                        "type": 3
                    },
                    "10": {
                        "class_name": "_3j7s",
                        "color": "#f0ba15",
                        "display_name": "Confused",
                        "is_deprecated": true,
                        "is_visible": true,
                        "name": "confused",
                        "type": 10
                    },
                    "7": {
                        "class_name": "_3j7r",
                        "color": "#f0ba15",
                        "display_name": "Sad",
                        "is_deprecated": false,
                        "is_visible": true,
                        "name": "sorry",
                        "type": 7
                    },
                    "8": {
                        "class_name": "_3j7q",
                        "color": "#f7714b",
                        "display_name": "Angry",
                        "is_deprecated": false,
                        "is_visible": true,
                        "name": "anger",
                        "type": 8
                    },
                    "14": {
                        "class_name": "_3qr6",
                        "color": "#5890ff",
                        "display_name": "React",
                        "is_deprecated": false,
                        "is_visible": false,
                        "name": "flame",
                        "type": 14
                    },
                    "15": {
                        "class_name": "_4vps",
                        "color": "#5890ff",
                        "display_name": "React",
                        "is_deprecated": false,
                        "is_visible": false,
                        "name": "plane",
                        "type": 15
                    }
                }
            }, 911], ["MercuryConfig", [], {}, 35], ["MercuryMessengerJewelPerfConfig", [], {
                "bundleBootloader": false,
                "reduceXHR": false,
                "eagerLoading": false,
                "eagerLoadingOnBadge": false,
                "eagerLoadingOnInteraction": false,
                "eagerLoadingOnIdle": false,
                "eagerFetchOnAfterLoad": false,
                "msgrRegion": null,
                "initialThreadCount": 10,
                "logJewelData": false,
                "eagerFlyoutOnAfterLoad": false
            }, 2632], ["WebGraphQLConfig", [], {
                "timeout": 30000,
                "use_timeout_handler": true
            }, 2809], ["MessagingTagConstants", [], {
                "app_id_root": "app_id:",
                "other": "other",
                "orca_app_ids": ["200424423651082", "181425161904154", "105910932827969", "256002347743983", "117239014994419", "348100608599858", "172336202840178", "202805033077166", "184182168294603", "237759909591655", "233071373467473", "561591070563776", "436702683108779", "192652190921494", "684826784869902", "1660836617531775", "334514693415286", "1517584045172414", "483661108438983", "331935610344200", "312713275593566", "770691749674544", "1637541026485594", "1692696327636730", "1526787190969554", "482765361914587", "737650889702127", "1699968706904684", "772799089399364", "519747981478076", "522404077880990", "1588552291425610", "609637022450479", "521501484690599", "1038350889591384", "1174099472704185", "628551730674460", "1104941186305379", "1210280799026164", "252153545225472", "359572041079329"],
                "chat_sources": ["source:chat:web", "source:chat:jabber", "source:chat:iphone", "source:chat:meebo", "source:chat:orca", "source:chat:test", "source:chat:forward", "source:chat"],
                "mobile_sources": ["source:sms", "source:gigaboxx:mobile", "source:gigaboxx:wap", "source:titan:wap", "source:titan:m_basic", "source:titan:m_free_basic", "source:titan:m_japan", "source:titan:m_mini", "source:titan:m_touch", "source:titan:m_app", "source:titan:m_zero", "source:titan:api_mobile", "source:buffy:sms", "source:chat:orca", "source:titan:orca", "source:mobile"],
                "email_source": "source:email"
            }, 2141], ["WorkModeConfig", [], {"is_worksite": false}, 396], ["FluxInternalConfig", [], {
                "logOnPreInitAccess": false,
                "warnOnPreInitAccess": false
            }, 1075], ["PageTransitionsConfig", [], {"reloadOnBootloadError": true}, 1067], ["AccessibilityConfig", [], {
                "a11yLogicalGridComponent": false,
                "a11yNewsfeedStoryEnumeration": true,
                "a11yInitialDialogFocusElement": true,
                "a11yNUXDialog": true,
                "a11yNavHotkey": true,
                "a11yNavHotkeyFromInputs": false,
                "focusRingModule": false
            }, 1227], ["EmojiConfig", [], {
                "pixelRatio": "1",
                "schemaAuth": "https:\/\/www.facebook.com\/images\/emoji.php\/v9"
            }, 1421], ["FluxConfig", [], {
                "ads_improve_perf_flux_container_subscriptions": true,
                "ads_improve_perf_flux_derived_store": true,
                "ads_interfaces_push_model": true,
                "ads_improve_perf_flux_cache_getall": true
            }, 2434], ["SutroStoryHeaderUFIGatingConfig", [], {
                "enabled_for_comment_composer_rounded_borders": false,
                "enabled_for_comment_composer_larger": false,
                "enabled_for_comment_glyphs": false,
                "enabled_for_story_header": false,
                "enabled_for_ufi": false,
                "enabled_for_ufi_animation": false,
                "enabled_for_ui40": false,
                "enabled_hide_ufi_border": false,
                "enabled_less_story_header_padding": false,
                "enabled_privacyicon": false,
                "enabled_triple_dot": false,
                "is_uppercased": false
            }, 2483], ["FunnelLoggerConfig", [], {
                "freq": {
                    "WWW_SPATIAL_REACTION_PRODUCTION_FUNNEL": 1,
                    "CREATIVE_STUDIO_CREATION_FUNNEL": 1,
                    "WWW_CANVAS_AD_CREATION_FUNNEL": 1,
                    "WWW_CANVAS_EDITOR_FUNNEL": 1,
                    "WWW_LINK_PICKER_DIALOG_FUNNEL": 1,
                    "WWW_MEME_PICKER_DIALOG_FUNNEL": 1,
                    "WWW_LEAD_GEN_FORM_CREATION_FUNNEL": 1,
                    "WWW_LEAD_GEN_FORM_EDITOR_FUNNEL": 1,
                    "WWW_LEAD_GEN_DESKTOP_AD_UNIT_FUNNEL": 1,
                    "WWW_LEAD_GEN_MSITE_AD_UNIT_FUNNEL": 1,
                    "WWW_CAMPFIRE_COMPOSER_UPSELL_FUNNEL": 1,
                    "WWW_RECRUITING_PRODUCTS_ATTRIBUTION_FUNNEL": 1,
                    "WWW_RECRUITING_PRODUCTS_FUNNEL": 1,
                    "WWW_RECRUITING_SEARCH_FUNNEL": 1,
                    "WWW_EXAMPLE_FUNNEL": 1,
                    "WWW_REACTIONS_BLINGBAR_NUX_FUNNEL": 1,
                    "WWW_REACTIONS_NUX_FUNNEL": 1,
                    "WWW_COMMENT_REACTIONS_NUX_FUNNEL": 1,
                    "WWW_MESSENGER_SHARE_TO_FB_FUNNEL": 10,
                    "POLYGLOT_MAIN_FUNNEL": 1,
                    "MSITE_EXAMPLE_FUNNEL": 10,
                    "WWW_FEED_SHARE_DIALOG_FUNNEL": 100,
                    "MSITE_AD_BREAKS_ONBOARDING_FLOW_FUNNEL": 1,
                    "MSITE_FEED_ALBUM_CTA_FUNNEL": 10,
                    "MSITE_FEED_SHARE_DIALOG_FUNNEL": 100,
                    "MSITE_COMMENT_TYPING_FUNNEL": 500,
                    "MSITE_HASHTAG_PROMPT_FUNNEL": 1,
                    "WWW_SEARCH_AWARENESS_LEARNING_NUX_FUNNEL": 1,
                    "WWW_CONSTITUENT_TITLE_UPSELL_FUNNEL": 1,
                    "MTOUCH_FEED_MISSED_STORIES_FUNNEL": 10,
                    "WWW_UFI_SHARE_LINK_FUNNEL": 1,
                    "WWW_CMS_SEARCH_FUNNEL": 1,
                    "GAMES_QUICKSILVER_FUNNEL": 1,
                    "SOCIAL_SEARCH_CONVERSION_WWW_FUNNEL": 1,
                    "SOCIAL_SEARCH_DASHBOARD_WWW_FUNNEL": 1,
                    "SRT_USER_FLOW_FUNNEL": 1,
                    "MSITE_PPD_FUNNEL": 1,
                    "WWW_PAGE_CREATION_FUNNEL": 1,
                    "NT_EXAMPLE_FUNNEL": 1,
                    "WWW_LIVE_VIEWER_TIPJAR_FUNNEL": 1,
                    "FACECAST_BROADCASTER_FUNNEL": 1,
                    "WWW_FUNDRAISER_CREATION_FUNNEL": 1,
                    "WWW_FUNDRAISER_EDIT_FUNNEL": 1,
                    "WWW_OFFERS_SIMPLE_COMPOSE_FUNNEL": 1,
                    "QP_TOOL_FUNNEL": 1,
                    "WWW_OFFERS_SIMPLE_COMPOSE_POST_LIKE_FUNNEL": 1,
                    "COLLEGE_COMMUNITY_NUX_ONBOARDING_FUNNEL": 1,
                    "CASUAL_GROUP_PICKER_FUNNEL": 1,
                    "TOPICS_TO_FOLLOW_FUNNEL": 1,
                    "WWW_MESSENGER_SEARCH_SESSION_FUNNEL": 1,
                    "WWW_LIVE_PRODUCER_FUNNEL": 1,
                    "FX_PLATFORM_INVITE_JOIN_FUNNEL": 1,
                    "CREATIVE_STUDIO_HUB_FUNNEL": 1,
                    "WWW_SEE_OFFERS_CTA_NUX_FUNNEL": 1,
                    "WWW_ADS_TARGETING_AUDIENCE_MANAGER_FUNNEL": 1,
                    "WWW_AD_BREAKS_ONBOARDING_FUNNEL": 1,
                    "WWW_AD_BREAK_HOME_ONBOARDING_FUNNEL": 1,
                    "WWW_NOTIFS_UP_NEXT_FUNNEL": 10,
                    "ADS_VIDEO_CAPTION_FUNNEL": 1,
                    "default": 1000
                }
            }, 1271], ["MarauderConfig", [], {
                "app_version": "3380385",
                "gk_enabled": false
            }, 31], ["KeyframesWebConfig", [], {
                "enableLogging": false,
                "connectionClass": "UNKNOWN"
            }, 2712], ["TextDelightConfig", [], {
                "campaigns": {},
                "animations": {},
                "options": {"enabledPreloadSurfaces": {"post": false, "comment": false}}
            }, 2582], ["UFICommentFileInputAcceptValues", [], {
                "both": "video\/*,  video\/x-m4v, video\/webm, video\/x-ms-wmv, video\/x-msvideo, video\/3gpp, video\/flv, video\/x-flv, video\/mp4, video\/quicktime, video\/mpeg, video\/ogv, .ts, .mkv, image\/*",
                "photos": "image\/*",
                "videos": "video\/*, video\/x-m4v, video\/webm, video\/x-ms-wmv, video\/x-msvideo, video\/3gpp, video\/flv, video\/x-flv, video\/mp4, video\/quicktime, video\/mpeg, video\/ogv, .ts, .mkv"
            }, 1317], ["VideoUploadConfig", [], {
                "videoExtensions": {
                    "gif": 1,
                    "mov": 1,
                    "qt": 1,
                    "wmv": 1,
                    "avi": 1,
                    "mpe": 1,
                    "mpg": 1,
                    "mpeg": 1,
                    "asf": 1,
                    "mp4": 1,
                    "m4v": 1,
                    "mpeg4": 1,
                    "3gpp": 1,
                    "3gp": 1,
                    "3g2": 1,
                    "mkv": 1,
                    "flv": 1,
                    "vob": 1,
                    "ogm": 1,
                    "ogv": 1,
                    "nsv": 1,
                    "mod": 1,
                    "tod": 1,
                    "dat": 1,
                    "mts": 1,
                    "m2ts": 1,
                    "dv": 1,
                    "divx": 1,
                    "f4v": 1,
                    "ts": 1,
                    "tmp": 1,
                    "rmvb": 1,
                    "webm": 1
                }, "allowMultimedia": false, "showMultimediaNUX": false
            }, 267], ["FileHashWorkerResource", [], {
                "url": "https:\/\/www.facebook.com\/rsrc.php\/v3\/y_\/r\/1LqoRHAFa3q.js",
                "name": "FileHashWorkerBundle"
            }, 758], ["UFICommentMessengerPromptConfig", [], {
                "show_messenger_prompt": false,
                "show_groups_prompt": false
            }, 2683], ["StickersConfig", [], {
                "emoticons": {
                    "id": "1471127876485636",
                    "name": "Emoticons",
                    "isCommentsCapable": true
                },
                "max_mru_stickers": 40,
                "mru_pack": {
                    "id": "599061016853145",
                    "name": "Recent",
                    "isMRU": true,
                    "isCommentsCapable": true,
                    "isComposerCapable": true,
                    "isMessengerCapable": true,
                    "isPostsCapable": true
                },
                "oz_pack": null
            }, 1666], ["RelayAPIConfigDefaults", ["__inst_84473062_0_0", "__inst_84473062_0_1", "__inst_84473062_0_2"], {
                "accessToken": "",
                "actorID": "0",
                "fetchTimeout": 30000,
                "graphBatchURI": {"__m": "__inst_84473062_0_0"},
                "graphURI": {"__m": "__inst_84473062_0_1"},
                "retryDelays": [1000, 3000],
                "useXController": true,
                "xhrEncoding": null,
                "subscriptionTopicURI": {"__m": "__inst_84473062_0_2"},
                "withCredentials": false
            }, 926], ["CurrentEnvironment", [], {
                "facebookdotcom": true,
                "messengerdotcom": false
            }, 827], ["PaddedStickerConfig", [], {}, 1667], ["MercuryServerRequestsConfig", [], {"sendMessageTimeout": 45000}, 107], ["MercuryThreadlistConstants", [], {
                "RECENT_THREAD_OFFSET": 0,
                "JEWEL_THREAD_COUNT": 7,
                "JEWEL_MORE_COUNT": 10,
                "WEBMESSENGER_THREAD_COUNT": 20,
                "WEBMESSENGER_MORE_COUNT": 20,
                "WEBMESSENGER_SEARCH_SNIPPET_COUNT": 5,
                "WEBMESSENGER_SEARCH_SNIPPET_LIMIT": 5,
                "WEBMESSENGER_SEARCH_SNIPPET_MORE": 5,
                "WEBMESSENGER_MORE_MESSAGES_COUNT": 20,
                "RECENT_MESSAGES_LIMIT": 10,
                "MAX_UNREAD_COUNT": 99,
                "MAX_UNSEEN_COUNT": 99,
                "MESSAGE_NOTICE_INACTIVITY_THRESHOLD": 20000,
                "GROUPING_THRESHOLD": 300000,
                "MESSAGE_TIMESTAMP_THRESHOLD": 1209600000,
                "SEARCH_TAB": "searchtab",
                "MAX_CHARS_BEFORE_BREAK": 280
            }, 96], ["MessagingConfig", [], {
                "SEND_CONNECTION_RETRIES": 2,
                "syncFetchRetries": 2,
                "syncFetchInitialTimeoutMs": 1500,
                "syncFetchTimeoutMultiplier": 1.2,
                "syncFetchRequestTimeoutMs": 10000
            }, 97], ["MercuryParticipantsConstants", [], {
                "UNKNOWN_GENDER": 0,
                "EMAIL_IMAGE": "\/images\/messaging\/threadlist\/envelope.png",
                "IMAGE_SIZE": 32,
                "BIG_IMAGE_SIZE": 50,
                "WWW_INCALL_THUMBNAIL_SIZE": 100
            }, 109], ["MercuryMessengerBlockingUtils", [], {"block_messages": "BLOCK_MESSAGES"}, 872], ["MessengerURIConstants", [], {
                "ARCHIVED_PATH": "\/archived",
                "COMPOSE_SUBPATH": "\/new",
                "GROUPS_PATH": "\/groups",
                "PAYMENT_PATH": "\/p",
                "PAYMENT_PAY_PATH": "\/pay",
                "PEOPLE_PATH": "\/people",
                "SUPPORT_PATH": "\/support",
                "FILTERED_REQUESTS_PATH": "\/filtered",
                "MESSAGE_REQUESTS_PATH": "\/requests",
                "THREAD_PREFIX": "\/t\/",
                "GROUP_PREFIX": "group-",
                "FACEBOOK_PREFIX": "\/messages"
            }, 1912], ["WWWBase", [], {"uri": "https:\/\/www.facebook.com\/"}, 318], ["CloseButtonIcon", [], {"icon": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yP\/r\/AzxmlQ2Tcny.png"}, 2381], ["CanvasToBlobResource", [], {
                "url": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yf\/r\/qF7ajIRS_8X.js",
                "name": "CanvasToBlobBundle"
            }, 864], ["VideoThumbnailConfig", [], {"defaultThumbnailURL": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yN\/r\/AAqMW82PqGg.gif"}, 967], ["PhotoSnowliftActionsGating", [], {"ALLOW_MAKE_PROFILE_PICTURE_BUTTON": false}, 887], ["PhotoSnowliftLoggingConfig", [], {
                "logOnlyOnInit": true,
                "checkForImage": true
            }, 2078], ["SnowliftDestroyVideoPlayerExperiment", [], {"destroyVideoOnExit": true}, 2767], ["SnowliftUFIContextualParentExperiment", [], {"useUfiContextualParent": true}, 2782], ["VideoPlayerAbortLoadingExperiment", [], {
                "canAbort": false,
                "delayedAbortLoading": 0
            }, 824], ["MarketplaceVanityCategories", [], {
                "data": {
                    "antiques": "393860164117441",
                    "appliances": "678754142233400",
                    "arts": "1534799543476160",
                    "autoparts": "757715671026531",
                    "kids": "624859874282116",
                    "bags": "1567543000236608",
                    "bicycles": "1658310421102081",
                    "media": "613858625416355",
                    "autos": "807311116002614",
                    "mens": "931157863635831",
                    "womens": "1266429133383966",
                    "electronics": "1792291877663080",
                    "furniture": "1583634935226685",
                    "garden": "800089866739547",
                    "garagesale": "1834536343472201",
                    "health": "1555452698044988",
                    "household": "1569171756675761",
                    "housing": "993212830714253",
                    "jewelry": "214968118845643",
                    "misc": "895487550471874",
                    "phones": "1557869527812749",
                    "instruments": "676772489112490",
                    "pets": "1550246318620997",
                    "sports": "1383948661922113",
                    "tools": "1670493229902393",
                    "toys": "606456512821491",
                    "videogames": "686977074745292"
                }
            }, 2205], ["PECurrencyConfig", [], {
                "currency_map_for_render": {
                    "AED": {
                        "format": "{amount} {symbol}",
                        "symbol": "\u062f.\u0625.",
                        "offset": 100,
                        "screen_name": "UAE Dirham"
                    },
                    "AFN": {
                        "format": "{symbol}{amount}",
                        "symbol": "\u060b",
                        "offset": 100,
                        "screen_name": "Afghan Afghani"
                    },
                    "ALL": {
                        "format": "{amount}{symbol}",
                        "symbol": "Lek",
                        "offset": 100,
                        "screen_name": "Albanian Lek"
                    },
                    "AMD": {
                        "format": "{amount} {symbol}",
                        "symbol": "\u0564\u0580.",
                        "offset": 100,
                        "screen_name": "Armenian Dram"
                    },
                    "ANG": {
                        "format": "{symbol}{amount}",
                        "symbol": "ANG",
                        "offset": 100,
                        "screen_name": "Netherlands Antillean Guilder"
                    },
                    "AOA": {
                        "format": "{symbol}{amount}",
                        "symbol": "AOA",
                        "offset": 100,
                        "screen_name": "Angolan Kwanza"
                    },
                    "ARS": {
                        "format": "{symbol} {amount}",
                        "symbol": "$",
                        "offset": 100,
                        "screen_name": "Argentine Peso"
                    },
                    "AUD": {
                        "format": "{symbol}{amount}",
                        "symbol": "$",
                        "offset": 100,
                        "screen_name": "Australian Dollar"
                    },
                    "AWG": {
                        "format": "{symbol}{amount}",
                        "symbol": "AWG",
                        "offset": 100,
                        "screen_name": "Aruban Florin"
                    },
                    "AZN": {
                        "format": "{amount} {symbol}",
                        "symbol": "\u043c\u0430\u043d.",
                        "offset": 100,
                        "screen_name": "Azerbaijani Manat"
                    },
                    "BAM": {
                        "format": "{symbol}{amount}",
                        "symbol": "BAM",
                        "offset": 100,
                        "screen_name": "Bosnian Herzegovinian Convertible Mark"
                    },
                    "BBD": {
                        "format": "{symbol}{amount}",
                        "symbol": "Bds$",
                        "offset": 100,
                        "screen_name": "Barbados Dollar"
                    },
                    "BDT": {
                        "format": "{symbol}{amount}",
                        "symbol": "\u09f3",
                        "offset": 100,
                        "screen_name": "Bangladeshi Taka"
                    },
                    "BGN": {
                        "format": "{amount} {symbol}",
                        "symbol": "\u043b\u0432.",
                        "offset": 100,
                        "screen_name": "Bulgarian Lev"
                    },
                    "BHD": {
                        "format": "{amount} {symbol}",
                        "symbol": "\u062f.\u0628.",
                        "offset": 100,
                        "screen_name": "Bahraini Dinar"
                    },
                    "BIF": {
                        "format": "{symbol}{amount}",
                        "symbol": "FBu",
                        "offset": 1,
                        "screen_name": "Burundian Franc"
                    },
                    "BMD": {
                        "format": "{symbol}{amount}",
                        "symbol": "$",
                        "offset": 100,
                        "screen_name": "Bermudian Dollar"
                    },
                    "BND": {"format": "", "symbol": "B$", "offset": 100, "screen_name": "Brunei Dollar"},
                    "BOB": {
                        "format": "{symbol} {amount}",
                        "symbol": "Bs.",
                        "offset": 100,
                        "screen_name": "Bolivian Boliviano"
                    },
                    "BRL": {
                        "format": "{symbol} {amount}",
                        "symbol": "R$",
                        "offset": 100,
                        "screen_name": "Brazilian Real"
                    },
                    "BSD": {
                        "format": "{symbol}{amount}",
                        "symbol": "B$",
                        "offset": 100,
                        "screen_name": "Bahamian Dollar"
                    },
                    "BTN": {
                        "format": "{symbol}{amount}",
                        "symbol": "Nu.",
                        "offset": 100,
                        "screen_name": "Bhutanese Ngultrum"
                    },
                    "BWP": {
                        "format": "{symbol}{amount}",
                        "symbol": "P",
                        "offset": 100,
                        "screen_name": "Botswanan Pula"
                    },
                    "BYN": {
                        "format": "{amount} {symbol}",
                        "symbol": "Br",
                        "offset": 100,
                        "screen_name": "Belarusian Ruble"
                    },
                    "BZD": {"format": "", "symbol": "BZ$", "offset": 100, "screen_name": "Belize Dollar"},
                    "CAD": {
                        "format": "{symbol}{amount}",
                        "symbol": "$",
                        "offset": 100,
                        "screen_name": "Canadian Dollar"
                    },
                    "CDF": {
                        "format": "{symbol}{amount}",
                        "symbol": "FC",
                        "offset": 100,
                        "screen_name": "Congolese Franc"
                    },
                    "CHF": {
                        "format": "{symbol} {amount}",
                        "symbol": "Fr.",
                        "offset": 100,
                        "screen_name": "Swiss Franc"
                    },
                    "CLP": {"format": "{symbol} {amount}", "symbol": "$", "offset": 1, "screen_name": "Chilean Peso"},
                    "CNY": {
                        "format": "{symbol}{amount}",
                        "symbol": "\uffe5",
                        "offset": 100,
                        "screen_name": "Chinese Yuan"
                    },
                    "COP": {"format": "{symbol} {amount}", "symbol": "$", "offset": 1, "screen_name": "Colombian Peso"},
                    "CRC": {
                        "format": "{symbol}{amount}",
                        "symbol": "\u20a1",
                        "offset": 1,
                        "screen_name": "Costa Rican Col\u00f3n"
                    },
                    "CVE": {
                        "format": "{symbol}{amount}",
                        "symbol": "$",
                        "offset": 1,
                        "screen_name": "Cape Verde Escudo"
                    },
                    "CZK": {
                        "format": "{amount} {symbol}",
                        "symbol": "K\u010d",
                        "offset": 100,
                        "screen_name": "Czech Koruna"
                    },
                    "DJF": {
                        "format": "{symbol}{amount}",
                        "symbol": "Fdj",
                        "offset": 1,
                        "screen_name": "Djiboutian Franc"
                    },
                    "DKK": {
                        "format": "{amount} {symbol}",
                        "symbol": "kr.",
                        "offset": 100,
                        "screen_name": "Danish Krone"
                    },
                    "DOP": {
                        "format": "{symbol} {amount}",
                        "symbol": "RD$",
                        "offset": 100,
                        "screen_name": "Dominican Peso"
                    },
                    "DZD": {
                        "format": "{amount} {symbol}",
                        "symbol": "DA",
                        "offset": 100,
                        "screen_name": "Algerian Dinar"
                    },
                    "EGP": {
                        "format": "{amount} {symbol}",
                        "symbol": "\u062c.\u0645.",
                        "offset": 100,
                        "screen_name": "Egyptian Pound"
                    },
                    "ERN": {
                        "format": "{symbol}{amount}",
                        "symbol": "Nfk",
                        "offset": 100,
                        "screen_name": "Eritrean Nakfa"
                    },
                    "ETB": {
                        "format": "{symbol}{amount}",
                        "symbol": "Br",
                        "offset": 100,
                        "screen_name": "Ethiopian Birr"
                    },
                    "EUR": {"format": "{symbol} {amount}", "symbol": "\u20ac", "offset": 100, "screen_name": "Euro"},
                    "FBZ": {"format": "{symbol}{amount}", "symbol": "C", "offset": 100, "screen_name": "credits"},
                    "FJD": {"format": "{symbol}{amount}", "symbol": "FJ$", "offset": 100, "screen_name": "Fiji Dollar"},
                    "FKP": {
                        "format": "{symbol}{amount}",
                        "symbol": "\u00a3",
                        "offset": 100,
                        "screen_name": "Falkland Islands Pound"
                    },
                    "GBP": {
                        "format": "{symbol}{amount}",
                        "symbol": "\u00a3",
                        "offset": 100,
                        "screen_name": "British Pound"
                    },
                    "GEL": {
                        "format": "{amount} {symbol}",
                        "symbol": "\u20be",
                        "offset": 100,
                        "screen_name": "Georgian Lari"
                    },
                    "GHS": {
                        "format": "{symbol}{amount}",
                        "symbol": "GHS",
                        "offset": 100,
                        "screen_name": "Ghanaian Cedi"
                    },
                    "GIP": {
                        "format": "{symbol}{amount}",
                        "symbol": "\u00a3",
                        "offset": 100,
                        "screen_name": "Gibraltar Pound"
                    },
                    "GMD": {
                        "format": "{symbol}{amount}",
                        "symbol": "D",
                        "offset": 100,
                        "screen_name": "Gambian Dalasi"
                    },
                    "GNF": {"format": "{symbol}{amount}", "symbol": "FG", "offset": 1, "screen_name": "Guinean Franc"},
                    "GTQ": {
                        "format": "{symbol}{amount}",
                        "symbol": "Q",
                        "offset": 100,
                        "screen_name": "Guatemalan Quetzal"
                    },
                    "GYD": {
                        "format": "{symbol}{amount}",
                        "symbol": "G$",
                        "offset": 100,
                        "screen_name": "Guyanese Dollar"
                    },
                    "HKD": {
                        "format": "{symbol}{amount}",
                        "symbol": "$",
                        "offset": 100,
                        "screen_name": "Hong Kong Dollar"
                    },
                    "HNL": {
                        "format": "{symbol} {amount}",
                        "symbol": "L.",
                        "offset": 100,
                        "screen_name": "Honduran Lempira"
                    },
                    "HRK": {
                        "format": "{amount} {symbol}",
                        "symbol": "kn",
                        "offset": 100,
                        "screen_name": "Croatian Kuna"
                    },
                    "HTG": {
                        "format": "{symbol}{amount}",
                        "symbol": "G",
                        "offset": 100,
                        "screen_name": "Haitian Gourde"
                    },
                    "HUF": {
                        "format": "{amount} {symbol}",
                        "symbol": "Ft",
                        "offset": 1,
                        "screen_name": "Hungarian Forint"
                    },
                    "IDR": {
                        "format": "{symbol} {amount}",
                        "symbol": "Rp",
                        "offset": 1,
                        "screen_name": "Indonesian Rupiah"
                    },
                    "ILS": {
                        "format": "{symbol} {amount}",
                        "symbol": "\u20aa",
                        "offset": 100,
                        "screen_name": "Israeli New Shekel"
                    },
                    "INR": {
                        "format": "{symbol} {amount}",
                        "symbol": "\u20b9",
                        "offset": 100,
                        "screen_name": "Indian Rupee"
                    },
                    "IQD": {
                        "format": "{amount} {symbol}",
                        "symbol": "\u062f.\u0639.",
                        "offset": 100,
                        "screen_name": "Iraqi Dinar"
                    },
                    "ISK": {
                        "format": "{amount} {symbol}",
                        "symbol": "kr.",
                        "offset": 1,
                        "screen_name": "Iceland Krona"
                    },
                    "JMD": {
                        "format": "{symbol}{amount}",
                        "symbol": "J$",
                        "offset": 100,
                        "screen_name": "Jamaican Dollar"
                    },
                    "JOD": {
                        "format": "{amount} {symbol}",
                        "symbol": "\u062f.\u0627.",
                        "offset": 100,
                        "screen_name": "Jordanian Dinar"
                    },
                    "JPY": {
                        "format": "{symbol}{amount}",
                        "symbol": "\u00a5",
                        "offset": 1,
                        "screen_name": "Japanese Yen"
                    },
                    "KES": {
                        "format": "{symbol}{amount}",
                        "symbol": "KSh",
                        "offset": 100,
                        "screen_name": "Kenyan Shilling"
                    },
                    "KGS": {
                        "format": "{amount} {symbol}",
                        "symbol": "\u0441\u043e\u043c",
                        "offset": 100,
                        "screen_name": "Kyrgyzstani Som"
                    },
                    "KHR": {
                        "format": "{symbol}{amount}",
                        "symbol": "\u17db",
                        "offset": 100,
                        "screen_name": "Cambodian Riel"
                    },
                    "KMF": {"format": "{symbol}{amount}", "symbol": "CF", "offset": 1, "screen_name": "Comoro Franc"},
                    "KRW": {"format": "{symbol}{amount}", "symbol": "\u20a9", "offset": 1, "screen_name": "Korean Won"},
                    "KWD": {
                        "format": "{amount} {symbol}",
                        "symbol": "\u062f.\u0643.",
                        "offset": 100,
                        "screen_name": "Kuwaiti Dinar"
                    },
                    "KYD": {
                        "format": "{symbol}{amount}",
                        "symbol": "CI$",
                        "offset": 100,
                        "screen_name": "Cayman Islands Dollar"
                    },
                    "KZT": {
                        "format": "{symbol}{amount}",
                        "symbol": "\u0422",
                        "offset": 100,
                        "screen_name": "Kazakhstani Tenge"
                    },
                    "LAK": {"format": "{symbol}{amount}", "symbol": "\u20ad", "offset": 100, "screen_name": "Lao Kip"},
                    "LBP": {
                        "format": "{amount} {symbol}",
                        "symbol": "\u0644.\u0644.",
                        "offset": 100,
                        "screen_name": "Lebanese Pound"
                    },
                    "LKR": {
                        "format": "{symbol}{amount}",
                        "symbol": "LKR",
                        "offset": 100,
                        "screen_name": "Sri Lankan Rupee"
                    },
                    "LRD": {
                        "format": "{symbol}{amount}",
                        "symbol": "L$",
                        "offset": 100,
                        "screen_name": "Liberian Dollar"
                    },
                    "LSL": {"format": "{symbol}{amount}", "symbol": "L", "offset": 100, "screen_name": "Lesotho Loti"},
                    "LTL": {
                        "format": "{amount} {symbol}",
                        "symbol": "Lt",
                        "offset": 100,
                        "screen_name": "Lithuanian Litas"
                    },
                    "LVL": {
                        "format": "{symbol} {amount}",
                        "symbol": "Ls",
                        "offset": 100,
                        "screen_name": "Latvian Lats"
                    },
                    "LYD": {
                        "format": "{amount} {symbol}",
                        "symbol": "\u062f.\u0644.",
                        "offset": 100,
                        "screen_name": "Libyan Dinar"
                    },
                    "MAD": {
                        "format": "{amount} {symbol}",
                        "symbol": "\u062f.\u0645.",
                        "offset": 100,
                        "screen_name": "Moroccan Dirham"
                    },
                    "MDL": {
                        "format": "{symbol}{amount}",
                        "symbol": "lei",
                        "offset": 100,
                        "screen_name": "Moldovan Leu"
                    },
                    "MGA": {
                        "format": "{symbol}{amount}",
                        "symbol": "Ar",
                        "offset": 5,
                        "screen_name": "Malagasy Ariary"
                    },
                    "MKD": {
                        "format": "",
                        "symbol": "\u0434\u0435\u043d.",
                        "offset": 100,
                        "screen_name": "Macedonian Denar"
                    },
                    "MMK": {"format": "{symbol}{amount}", "symbol": "Ks", "offset": 100, "screen_name": "Burmese Kyat"},
                    "MNT": {
                        "format": "{amount}{symbol}",
                        "symbol": "\u20ae",
                        "offset": 100,
                        "screen_name": "Mongolian Tugrik"
                    },
                    "MOP": {
                        "format": "{symbol}{amount}",
                        "symbol": "MOP",
                        "offset": 100,
                        "screen_name": "Macau Patacas"
                    },
                    "MRO": {
                        "format": "{symbol}{amount}",
                        "symbol": "UM",
                        "offset": 5,
                        "screen_name": "Mauritanian Ouguiya"
                    },
                    "MUR": {
                        "format": "{symbol}{amount}",
                        "symbol": "MUR",
                        "offset": 100,
                        "screen_name": "Mauritian Rupee"
                    },
                    "MVR": {"format": "", "symbol": "\u0783.", "offset": 100, "screen_name": "Maldivian Rufiyaa"},
                    "MWK": {
                        "format": "{symbol}{amount}",
                        "symbol": "MK",
                        "offset": 100,
                        "screen_name": "Malawian Kwacha"
                    },
                    "MXN": {"format": "{symbol}{amount}", "symbol": "$", "offset": 100, "screen_name": "Mexican Peso"},
                    "MYR": {
                        "format": "{symbol}{amount}",
                        "symbol": "RM",
                        "offset": 100,
                        "screen_name": "Malaysian Ringgit"
                    },
                    "MZN": {
                        "format": "{symbol}{amount}",
                        "symbol": "MT",
                        "offset": 100,
                        "screen_name": "Mozambican Metical"
                    },
                    "NAD": {
                        "format": "{symbol}{amount}",
                        "symbol": "N$",
                        "offset": 100,
                        "screen_name": "Namibian Dollar"
                    },
                    "NGN": {
                        "format": "{symbol}{amount}",
                        "symbol": "\u20a6",
                        "offset": 100,
                        "screen_name": "Nigerian Naira"
                    },
                    "NIO": {
                        "format": "{symbol} {amount}",
                        "symbol": "C$",
                        "offset": 100,
                        "screen_name": "Nicaraguan Cordoba"
                    },
                    "NOK": {
                        "format": "{symbol} {amount}",
                        "symbol": "kr",
                        "offset": 100,
                        "screen_name": "Norwegian Krone"
                    },
                    "NPR": {
                        "format": "{symbol}{amount}",
                        "symbol": "\u0930\u0942",
                        "offset": 100,
                        "screen_name": "Nepalese Rupee"
                    },
                    "NZD": {
                        "format": "{symbol}{amount}",
                        "symbol": "$",
                        "offset": 100,
                        "screen_name": "New Zealand Dollar"
                    },
                    "OMR": {
                        "format": "{amount} {symbol}",
                        "symbol": "\u0631.\u0639.",
                        "offset": 100,
                        "screen_name": "Omani Rial"
                    },
                    "PAB": {
                        "format": "{symbol} {amount}",
                        "symbol": "B\/.",
                        "offset": 100,
                        "screen_name": "Panamanian Balboas"
                    },
                    "PEN": {
                        "format": "{symbol} {amount}",
                        "symbol": "S\/.",
                        "offset": 100,
                        "screen_name": "Peruvian Nuevo Sol"
                    },
                    "PGK": {
                        "format": "{symbol}{amount}",
                        "symbol": "K",
                        "offset": 100,
                        "screen_name": "Papua New Guinean Kina"
                    },
                    "PHP": {
                        "format": "{symbol}{amount}",
                        "symbol": "\u20b1",
                        "offset": 100,
                        "screen_name": "Philippine Peso"
                    },
                    "PKR": {
                        "format": "{symbol}{amount}",
                        "symbol": "Rs",
                        "offset": 100,
                        "screen_name": "Pakistani Rupee"
                    },
                    "PLN": {
                        "format": "{amount} {symbol}",
                        "symbol": "z\u0142",
                        "offset": 100,
                        "screen_name": "Polish Zloty"
                    },
                    "PYG": {
                        "format": "{symbol} {amount}",
                        "symbol": "\u20b2",
                        "offset": 1,
                        "screen_name": "Paraguayan Guarani"
                    },
                    "QAR": {
                        "format": "{amount} {symbol}",
                        "symbol": "\u0631.\u0642.",
                        "offset": 100,
                        "screen_name": "Qatari Rials"
                    },
                    "RON": {
                        "format": "{amount} {symbol}",
                        "symbol": "lei",
                        "offset": 100,
                        "screen_name": "Romanian Leu"
                    },
                    "RSD": {
                        "format": "{symbol}{amount}",
                        "symbol": "RSD",
                        "offset": 100,
                        "screen_name": "Serbian Dinar"
                    },
                    "RUB": {
                        "format": "{amount} {symbol}",
                        "symbol": "p.",
                        "offset": 100,
                        "screen_name": "Russian Ruble"
                    },
                    "RWF": {"format": "{symbol}{amount}", "symbol": "FRw", "offset": 1, "screen_name": "Rwandan Franc"},
                    "SAR": {
                        "format": "{amount} {symbol}",
                        "symbol": "\u0631.\u0633.",
                        "offset": 100,
                        "screen_name": "Saudi Arabian Riyal"
                    },
                    "SBD": {
                        "format": "{symbol}{amount}",
                        "symbol": "SI$",
                        "offset": 100,
                        "screen_name": "Solomon Islands Dollar"
                    },
                    "SCR": {
                        "format": "{symbol}{amount}",
                        "symbol": "SR",
                        "offset": 100,
                        "screen_name": "Seychelles Rupee"
                    },
                    "SEK": {
                        "format": "{amount} {symbol}",
                        "symbol": "kr",
                        "offset": 100,
                        "screen_name": "Swedish Krona"
                    },
                    "SGD": {
                        "format": "{symbol}{amount}",
                        "symbol": "$",
                        "offset": 100,
                        "screen_name": "Singapore Dollar"
                    },
                    "SHP": {
                        "format": "{symbol}{amount}",
                        "symbol": "\u00a3",
                        "offset": 100,
                        "screen_name": "Saint Helena Pound"
                    },
                    "SKK": {
                        "format": "{amount} {symbol}",
                        "symbol": "Sk",
                        "offset": 100,
                        "screen_name": "Slovak Koruna"
                    },
                    "SLL": {
                        "format": "{symbol}{amount}",
                        "symbol": "Le",
                        "offset": 100,
                        "screen_name": "Sierra Leonean Leone"
                    },
                    "SOS": {
                        "format": "{symbol}{amount}",
                        "symbol": "S",
                        "offset": 100,
                        "screen_name": "Somali Shilling"
                    },
                    "SRD": {
                        "format": "{symbol}{amount}",
                        "symbol": "SRD",
                        "offset": 100,
                        "screen_name": "Surinamese Dollar"
                    },
                    "SSP": {
                        "format": "{symbol}{amount}",
                        "symbol": "\u00a3",
                        "offset": 100,
                        "screen_name": "South Sudanese Pound"
                    },
                    "STD": {
                        "format": "{symbol}{amount}",
                        "symbol": "Db",
                        "offset": 100,
                        "screen_name": "Sao Tome and Principe Dobra"
                    },
                    "SVC": {
                        "format": "{symbol}{amount}",
                        "symbol": "\u20a1",
                        "offset": 100,
                        "screen_name": "Salvadoran Col\u00f3n"
                    },
                    "SZL": {
                        "format": "{symbol}{amount}",
                        "symbol": "L",
                        "offset": 100,
                        "screen_name": "Swazi Lilangeni"
                    },
                    "THB": {
                        "format": "{symbol}{amount}",
                        "symbol": "\u0e3f",
                        "offset": 100,
                        "screen_name": "Thai Baht"
                    },
                    "TJS": {
                        "format": "{symbol}{amount}",
                        "symbol": "\u0441.",
                        "offset": 100,
                        "screen_name": "Tajikistani Somoni"
                    },
                    "TMT": {
                        "format": "{symbol}{amount}",
                        "symbol": "T",
                        "offset": 100,
                        "screen_name": "Turkmenistani Manat"
                    },
                    "TND": {
                        "format": "{amount} {symbol}",
                        "symbol": "\u062f.\u062a.",
                        "offset": 100,
                        "screen_name": "Tunisian Dinar"
                    },
                    "TOP": {
                        "format": "{symbol}{amount}",
                        "symbol": "T$",
                        "offset": 100,
                        "screen_name": "Tongan Pa\u02bbanga"
                    },
                    "TRY": {
                        "format": "{amount} {symbol}",
                        "symbol": "TL",
                        "offset": 100,
                        "screen_name": "Turkish Lira"
                    },
                    "TTD": {"format": "", "symbol": "TT$", "offset": 100, "screen_name": "Trinidad and Tobago Dollar"},
                    "TWD": {"format": "{symbol}{amount}", "symbol": "NT$", "offset": 1, "screen_name": "Taiwan Dollar"},
                    "TZS": {
                        "format": "{symbol}{amount}",
                        "symbol": "TSh",
                        "offset": 100,
                        "screen_name": "Tanzanian Shilling"
                    },
                    "UAH": {
                        "format": "{amount} {symbol}",
                        "symbol": "\u0433\u0440\u043d.",
                        "offset": 100,
                        "screen_name": "Ukrainian Hryvnia"
                    },
                    "UGX": {
                        "format": "{symbol}{amount}",
                        "symbol": "USh",
                        "offset": 1,
                        "screen_name": "Ugandan Shilling"
                    },
                    "USD": {"format": "{symbol}{amount}", "symbol": "$", "offset": 100, "screen_name": "US Dollars"},
                    "UYU": {
                        "format": "{symbol} {amount}",
                        "symbol": "$U",
                        "offset": 100,
                        "screen_name": "Uruguay Peso"
                    },
                    "UZS": {
                        "format": "{amount} {symbol}",
                        "symbol": "\u0441\u045e\u043c",
                        "offset": 100,
                        "screen_name": "Uzbekistan Som"
                    },
                    "VEF": {
                        "format": "{symbol} {amount}",
                        "symbol": "Bs",
                        "offset": 100,
                        "screen_name": "Venezuelan Bolivar"
                    },
                    "VND": {
                        "format": "{amount} {symbol}",
                        "symbol": "\u20ab",
                        "offset": 1,
                        "screen_name": "Vietnamese Dong"
                    },
                    "VUV": {"format": "{symbol}{amount}", "symbol": "VT", "offset": 1, "screen_name": "Vanuatu Vatu"},
                    "WST": {"format": "{symbol}{amount}", "symbol": "WS$", "offset": 100, "screen_name": "Samoan Tala"},
                    "XAF": {
                        "format": "{symbol}{amount}",
                        "symbol": "FCFA",
                        "offset": 1,
                        "screen_name": "Central African Frank"
                    },
                    "XCD": {
                        "format": "{symbol}{amount}",
                        "symbol": "$",
                        "offset": 100,
                        "screen_name": "East Caribbean Dollar"
                    },
                    "XOF": {
                        "format": "{symbol}{amount}",
                        "symbol": "FCFA",
                        "offset": 1,
                        "screen_name": "West African Frank"
                    },
                    "XPF": {"format": "{symbol}{amount}", "symbol": "XPF", "offset": 1, "screen_name": "CFP Franc"},
                    "YER": {
                        "format": "{amount} {symbol}",
                        "symbol": "\u0631.\u064a.",
                        "offset": 100,
                        "screen_name": "Yemeni Rial"
                    },
                    "ZAR": {
                        "format": "{symbol} {amount}",
                        "symbol": "R",
                        "offset": 100,
                        "screen_name": "South African Rand"
                    },
                    "ZMW": {
                        "format": "{symbol}{amount}",
                        "symbol": "ZK",
                        "offset": 100,
                        "screen_name": "Zambian Kwacha"
                    },
                    "ZWL": {"format": "", "symbol": "ZWL", "offset": 100, "screen_name": "Zimbabwean Dollar"}
                },
                "currency_map_for_cc": {
                    "AED": {
                        "format": "{amount} {symbol}",
                        "symbol": "\u062f.\u0625.",
                        "offset": 100,
                        "screen_name": "UAE Dirham"
                    },
                    "ARS": {
                        "format": "{symbol} {amount}",
                        "symbol": "$",
                        "offset": 100,
                        "screen_name": "Argentine Peso"
                    },
                    "AUD": {
                        "format": "{symbol}{amount}",
                        "symbol": "$",
                        "offset": 100,
                        "screen_name": "Australian Dollar"
                    },
                    "BDT": {
                        "format": "{symbol}{amount}",
                        "symbol": "\u09f3",
                        "offset": 100,
                        "screen_name": "Bangladeshi Taka"
                    },
                    "BOB": {
                        "format": "{symbol} {amount}",
                        "symbol": "Bs.",
                        "offset": 100,
                        "screen_name": "Bolivian Boliviano"
                    },
                    "BRL": {
                        "format": "{symbol} {amount}",
                        "symbol": "R$",
                        "offset": 100,
                        "screen_name": "Brazilian Real"
                    },
                    "CAD": {
                        "format": "{symbol}{amount}",
                        "symbol": "$",
                        "offset": 100,
                        "screen_name": "Canadian Dollar"
                    },
                    "CHF": {
                        "format": "{symbol} {amount}",
                        "symbol": "Fr.",
                        "offset": 100,
                        "screen_name": "Swiss Franc"
                    },
                    "CLP": {"format": "{symbol} {amount}", "symbol": "$", "offset": 1, "screen_name": "Chilean Peso"},
                    "CNY": {
                        "format": "{symbol}{amount}",
                        "symbol": "\uffe5",
                        "offset": 100,
                        "screen_name": "Chinese Yuan"
                    },
                    "COP": {"format": "{symbol} {amount}", "symbol": "$", "offset": 1, "screen_name": "Colombian Peso"},
                    "CRC": {
                        "format": "{symbol}{amount}",
                        "symbol": "\u20a1",
                        "offset": 1,
                        "screen_name": "Costa Rican Col\u00f3n"
                    },
                    "CZK": {
                        "format": "{amount} {symbol}",
                        "symbol": "K\u010d",
                        "offset": 100,
                        "screen_name": "Czech Koruna"
                    },
                    "DKK": {
                        "format": "{amount} {symbol}",
                        "symbol": "kr.",
                        "offset": 100,
                        "screen_name": "Danish Krone"
                    },
                    "DZD": {
                        "format": "{amount} {symbol}",
                        "symbol": "DA",
                        "offset": 100,
                        "screen_name": "Algerian Dinar"
                    },
                    "EGP": {
                        "format": "{amount} {symbol}",
                        "symbol": "\u062c.\u0645.",
                        "offset": 100,
                        "screen_name": "Egyptian Pound"
                    },
                    "EUR": {"format": "{symbol} {amount}", "symbol": "\u20ac", "offset": 100, "screen_name": "Euro"},
                    "GBP": {
                        "format": "{symbol}{amount}",
                        "symbol": "\u00a3",
                        "offset": 100,
                        "screen_name": "British Pound"
                    },
                    "GTQ": {
                        "format": "{symbol}{amount}",
                        "symbol": "Q",
                        "offset": 100,
                        "screen_name": "Guatemalan Quetzal"
                    },
                    "HKD": {
                        "format": "{symbol}{amount}",
                        "symbol": "$",
                        "offset": 100,
                        "screen_name": "Hong Kong Dollar"
                    },
                    "HNL": {
                        "format": "{symbol} {amount}",
                        "symbol": "L.",
                        "offset": 100,
                        "screen_name": "Honduran Lempira"
                    },
                    "HUF": {
                        "format": "{amount} {symbol}",
                        "symbol": "Ft",
                        "offset": 1,
                        "screen_name": "Hungarian Forint"
                    },
                    "IDR": {
                        "format": "{symbol} {amount}",
                        "symbol": "Rp",
                        "offset": 1,
                        "screen_name": "Indonesian Rupiah"
                    },
                    "ILS": {
                        "format": "{symbol} {amount}",
                        "symbol": "\u20aa",
                        "offset": 100,
                        "screen_name": "Israeli New Shekel"
                    },
                    "INR": {
                        "format": "{symbol} {amount}",
                        "symbol": "\u20b9",
                        "offset": 100,
                        "screen_name": "Indian Rupee"
                    },
                    "ISK": {
                        "format": "{amount} {symbol}",
                        "symbol": "kr.",
                        "offset": 1,
                        "screen_name": "Iceland Krona"
                    },
                    "JPY": {
                        "format": "{symbol}{amount}",
                        "symbol": "\u00a5",
                        "offset": 1,
                        "screen_name": "Japanese Yen"
                    },
                    "KES": {
                        "format": "{symbol}{amount}",
                        "symbol": "KSh",
                        "offset": 100,
                        "screen_name": "Kenyan Shilling"
                    },
                    "KRW": {"format": "{symbol}{amount}", "symbol": "\u20a9", "offset": 1, "screen_name": "Korean Won"},
                    "MOP": {
                        "format": "{symbol}{amount}",
                        "symbol": "MOP",
                        "offset": 100,
                        "screen_name": "Macau Patacas"
                    },
                    "MXN": {"format": "{symbol}{amount}", "symbol": "$", "offset": 100, "screen_name": "Mexican Peso"},
                    "MYR": {
                        "format": "{symbol}{amount}",
                        "symbol": "RM",
                        "offset": 100,
                        "screen_name": "Malaysian Ringgit"
                    },
                    "NGN": {
                        "format": "{symbol}{amount}",
                        "symbol": "\u20a6",
                        "offset": 100,
                        "screen_name": "Nigerian Naira"
                    },
                    "NIO": {
                        "format": "{symbol} {amount}",
                        "symbol": "C$",
                        "offset": 100,
                        "screen_name": "Nicaraguan Cordoba"
                    },
                    "NOK": {
                        "format": "{symbol} {amount}",
                        "symbol": "kr",
                        "offset": 100,
                        "screen_name": "Norwegian Krone"
                    },
                    "NZD": {
                        "format": "{symbol}{amount}",
                        "symbol": "$",
                        "offset": 100,
                        "screen_name": "New Zealand Dollar"
                    },
                    "PEN": {
                        "format": "{symbol} {amount}",
                        "symbol": "S\/.",
                        "offset": 100,
                        "screen_name": "Peruvian Nuevo Sol"
                    },
                    "PHP": {
                        "format": "{symbol}{amount}",
                        "symbol": "\u20b1",
                        "offset": 100,
                        "screen_name": "Philippine Peso"
                    },
                    "PKR": {
                        "format": "{symbol}{amount}",
                        "symbol": "Rs",
                        "offset": 100,
                        "screen_name": "Pakistani Rupee"
                    },
                    "PLN": {
                        "format": "{amount} {symbol}",
                        "symbol": "z\u0142",
                        "offset": 100,
                        "screen_name": "Polish Zloty"
                    },
                    "PYG": {
                        "format": "{symbol} {amount}",
                        "symbol": "\u20b2",
                        "offset": 1,
                        "screen_name": "Paraguayan Guarani"
                    },
                    "QAR": {
                        "format": "{amount} {symbol}",
                        "symbol": "\u0631.\u0642.",
                        "offset": 100,
                        "screen_name": "Qatari Rials"
                    },
                    "RON": {
                        "format": "{amount} {symbol}",
                        "symbol": "lei",
                        "offset": 100,
                        "screen_name": "Romanian Leu"
                    },
                    "RUB": {
                        "format": "{amount} {symbol}",
                        "symbol": "p.",
                        "offset": 100,
                        "screen_name": "Russian Ruble"
                    },
                    "SAR": {
                        "format": "{amount} {symbol}",
                        "symbol": "\u0631.\u0633.",
                        "offset": 100,
                        "screen_name": "Saudi Arabian Riyal"
                    },
                    "SEK": {
                        "format": "{amount} {symbol}",
                        "symbol": "kr",
                        "offset": 100,
                        "screen_name": "Swedish Krona"
                    },
                    "SGD": {
                        "format": "{symbol}{amount}",
                        "symbol": "$",
                        "offset": 100,
                        "screen_name": "Singapore Dollar"
                    },
                    "THB": {
                        "format": "{symbol}{amount}",
                        "symbol": "\u0e3f",
                        "offset": 100,
                        "screen_name": "Thai Baht"
                    },
                    "TRY": {
                        "format": "{amount} {symbol}",
                        "symbol": "TL",
                        "offset": 100,
                        "screen_name": "Turkish Lira"
                    },
                    "TWD": {"format": "{symbol}{amount}", "symbol": "NT$", "offset": 1, "screen_name": "Taiwan Dollar"},
                    "USD": {"format": "{symbol}{amount}", "symbol": "$", "offset": 100, "screen_name": "US Dollars"},
                    "UYU": {
                        "format": "{symbol} {amount}",
                        "symbol": "$U",
                        "offset": 100,
                        "screen_name": "Uruguay Peso"
                    },
                    "VEF": {
                        "format": "{symbol} {amount}",
                        "symbol": "Bs",
                        "offset": 100,
                        "screen_name": "Venezuelan Bolivar"
                    },
                    "VND": {
                        "format": "{amount} {symbol}",
                        "symbol": "\u20ab",
                        "offset": 1,
                        "screen_name": "Vietnamese Dong"
                    },
                    "ZAR": {
                        "format": "{symbol} {amount}",
                        "symbol": "R",
                        "offset": 100,
                        "screen_name": "South African Rand"
                    }
                }
            }, 745], ["MarketplaceVanityLocations", [], {
                "data": {
                    "albuquerque": 108161062545219,
                    "arlington": 104146999622524,
                    "atlanta": 107991659233606,
                    "austin": 106224666074625,
                    "baltimore": 112438218775062,
                    "boston": 106003956105810,
                    "charlotte": 105715936129053,
                    "chicago": 108659242498155,
                    "cleveland": 106338002735968,
                    "coloradosprings": 106270412737566,
                    "columbus": 108450559178997,
                    "dallas": 111762725508574,
                    "denver": 115590505119035,
                    "detroit": 114586701886732,
                    "elpaso": 104081259629164,
                    "fortworth": 114148045261892,
                    "fresno": 107983435897193,
                    "houston": 115963528414384,
                    "indianapolis": 110419212320033,
                    "jacksonville": 108127182549256,
                    "kansascity": 108591349161413,
                    "louisville": 104006346303593,
                    "vegas": 108081209214649,
                    "la": 110970792260960,
                    "memphis": 103123839728353,
                    "mesa": 104069826296214,
                    "miami": 110148382341970,
                    "milwaukee": 1416205875339580,
                    "minneapolis": 106300959405546,
                    "nashville": 106220079409935,
                    "neworleans": 106566059380422,
                    "nyc": 108424279189115,
                    "oakland": 108363292521622,
                    "oklahoma": 115650661782482,
                    "omaha": 113132652033783,
                    "philly": 101881036520836,
                    "phoenix": 105540216147364,
                    "portland": 112548152092705,
                    "raleigh": 103879976317396,
                    "sac": 105988062765295,
                    "sanantonio": 110297742331680,
                    "sandiego": 110714572282163,
                    "sanfrancisco": 114952118516947,
                    "sanjose": 111948542155151,
                    "seattle": 110843418940484,
                    "dc": 110184922344060,
                    "tucson": 109570449061083,
                    "tulsa": 109436565740998,
                    "virginiabeach": 107399855950255,
                    "wichita": 105674782800210
                }
            }, 2196], ["ChannelInitialData", [], {
                "channelConfig": {
                    "IFRAME_LOAD_TIMEOUT": 30000,
                    "P_TIMEOUT": 30000,
                    "STREAMING_TIMEOUT": 70000,
                    "PROBE_HEARTBEATS_INTERVAL_LOW": 1000,
                    "PROBE_HEARTBEATS_INTERVAL_HIGH": 3000,
                    "MTOUCH_SEND_CLIENT_ID": 1,
                    "user_channel": "p_0",
                    "seq": -1,
                    "retry_interval": 0,
                    "max_conn": 6,
                    "viewerUid": "0",
                    "domain": "facebook.com",
                    "tryStreaming": true,
                    "trySSEStreaming": false,
                    "skipTimeTravel": false,
                    "uid": "0",
                    "sequenceId": null
                }, "state": "reconnect!", "reason": 6
            }, 143], ["PresencePrivacyInitialData", [], {}, 58], ["RTCConfig", [], {}, 760], ["FantailConfig", ["FantailLogQueue"], {"FantailLogQueue": {"__m": "FantailLogQueue"}}, 1258], ["PresenceInitialData", [], {
                "cookiePollInterval": 500,
                "cookieVersion": 3,
                "serverTime": "1508321489000",
                "shouldSuppress": false,
                "useWebStorage": false
            }, 57], ["SystemEventsInitialData", [], {"ORIGINAL_USER_ID": "0"}, 483], ["LocaleInitialData", [], {
                "locale": "en_US",
                "language": "English (US)"
            }, 273], ["RTIFriendFanoutConfig", [], {
                "passFriendFanoutSubscribeGK": true,
                "topicPrefixes": ["gqls\/live_video_currently_watching_subscribe"]
            }, 2781], ["RTISubscriptionManagerConfig", [], {
                "config": {
                    "max_subscriptions": 150,
                    "www_idle_unsubscribe_min_time_ms": 600000,
                    "www_idle_unsubscribe_times_ms": {
                        "feedback_like_subscribe": 600000,
                        "comment_like_subscribe": 600000,
                        "feedback_typing_subscribe": 600000,
                        "comment_create_subscribe": 1800000
                    },
                    "autobot_tiers": {
                        "latest": "realtime.skywalker.autobot.latest",
                        "intern": "realtime.skywalker.autobot.intern",
                        "sb": "realtime.skywalker.autobot.sb"
                    }
                }, "autobot": {}, "assimilator": {}, "unsubscribe_release": true
            }, 1081], ["ChatConfigInitialData", [], {}, 12], ["ViewerContextDateData", [], {"gks": {"date_time_force_legacy_api": false}}, 1411], ["DateTimeConfig", [], {"cache_datetime": true}, 2567], ["DateFormatConfig", [], {
                "numericDateOrder": ["m", "d", "y"],
                "numericDateSeparator": "\/",
                "shortDayNames": ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
                "timeSeparator": ":",
                "weekStart": 6,
                "formats": {
                    "D": "D",
                    "D g:ia": "D g:ia",
                    "D M d": "D M d",
                    "D M d, Y": "D M d, Y",
                    "D M j": "D M j",
                    "D M j, g:ia": "D M j, g:ia",
                    "D M j, y": "D M j, y",
                    "D M j, Y g:ia": "D M j, Y g:ia",
                    "D, M j, Y": "D, M j, Y",
                    "F d": "F d",
                    "F d, Y": "F d, Y",
                    "F g": "F g",
                    "F j": "F j",
                    "F j, Y": "F j, Y",
                    "F j, Y \u0040 g:i A": "F j, Y \u0040 g:i A",
                    "F j, Y g:i a": "F j, Y g:i a",
                    "F jS": "F jS",
                    "F jS, g:ia": "F jS, g:ia",
                    "F jS, Y": "F jS, Y",
                    "F Y": "F Y",
                    "g A": "g A",
                    "g:i": "g:i",
                    "g:i A": "g:i A",
                    "g:i a": "g:i a",
                    "g:iA": "g:iA",
                    "g:ia": "g:ia",
                    "g:ia F jS, Y": "g:ia F jS, Y",
                    "g:iA l, F jS": "g:iA l, F jS",
                    "g:ia M j": "g:ia M j",
                    "g:ia M jS": "g:ia M jS",
                    "g:ia, F jS": "g:ia, F jS",
                    "g:iA, l M jS": "g:iA, l M jS",
                    "g:sa": "g:sa",
                    "H:I - M d, Y": "H:I - M d, Y",
                    "h:i a": "h:i a",
                    "h:m:s m\/d\/Y": "h:m:s m\/d\/Y",
                    "j": "j",
                    "l F d, Y": "l F d, Y",
                    "l g:ia": "l g:ia",
                    "l, F d, Y": "l, F d, Y",
                    "l, F j": "l, F j",
                    "l, F j, Y": "l, F j, Y",
                    "l, F jS": "l, F jS",
                    "l, F jS, g:ia": "l, F jS, g:ia",
                    "l, M j": "l, M j",
                    "l, M j, Y": "l, M j, Y",
                    "l, M j, Y g:ia": "l, M j, Y g:ia",
                    "M d": "M d",
                    "M d, Y": "M d, Y",
                    "M d, Y g:ia": "M d, Y g:ia",
                    "M d, Y ga": "M d, Y ga",
                    "M j": "M j",
                    "M j, Y": "M j, Y",
                    "M j, Y g:i A": "M j, Y g:i A",
                    "M j, Y g:ia": "M j, Y g:ia",
                    "M jS, g:ia": "M jS, g:ia",
                    "M Y": "M Y",
                    "M y": "M y",
                    "m-d-y": "m-d-y",
                    "M. d": "M. d",
                    "M. d, Y": "M. d, Y",
                    "j F Y": "j F Y",
                    "m.d.y": "m.d.y",
                    "m\/d": "m\/d",
                    "m\/d\/Y": "m\/d\/Y",
                    "m\/d\/y": "m\/d\/y",
                    "m\/d\/Y g:ia": "m\/d\/Y g:ia",
                    "m\/d\/y H:i:s": "m\/d\/y H:i:s",
                    "m\/d\/Y h:m": "m\/d\/Y h:m",
                    "n": "n",
                    "n\/j": "n\/j",
                    "n\/j, g:ia": "n\/j, g:ia",
                    "n\/j\/y": "n\/j\/y",
                    "Y": "Y",
                    "Y-m-d": "Y-m-d",
                    "Y\/m\/d": "Y\/m\/d",
                    "y\/m\/d": "y\/m\/d",
                    "j \/ F \/ Y": "j \/ F \/ Y"
                },
                "ordinalSuffixes": {
                    "1": "st",
                    "2": "nd",
                    "3": "rd",
                    "4": "th",
                    "5": "th",
                    "6": "th",
                    "7": "th",
                    "8": "th",
                    "9": "th",
                    "10": "th",
                    "11": "th",
                    "12": "th",
                    "13": "th",
                    "14": "th",
                    "15": "th",
                    "16": "th",
                    "17": "th",
                    "18": "th",
                    "19": "th",
                    "20": "th",
                    "21": "st",
                    "22": "nd",
                    "23": "rd",
                    "24": "th",
                    "25": "th",
                    "26": "th",
                    "27": "th",
                    "28": "th",
                    "29": "th",
                    "30": "th",
                    "31": "st"
                }
            }, 165], ["TilesMapConfig", [], {
                "OSM_ZOOM_THRESHOLD": 15,
                "OSM_RECTS_RAW": [[53.458804, 96.681979, 21.403164, 156.019965], [49.051166, 81.344246, 30.016796, 96.681979], [30.016796, 81.344246, 26.580888, 91.847546], [45.235891, 77.009813, 36.828253, 81.344246], [9.824078, 79.695167, 5.96837, 81.787959], [25.300278, 87.997767, 21.403164, 91.952439], [25.300278, 93.270663, 21.403164, 96.681979], [14.5, 102.25, 5.51123, 156.019965], [17.5, 104.75, 14.5, 156.019965], [21.403164, 100.114941, 17.5, 156.019965], [21.403164, 87.997767, 19.403164, 100.114941], [19.403164, 87.997767, 10, 98.114941], [14.5, 98.114941, 10, 99.114941], [-6.491895, 140.862305, -9.5, 147], [-6.491895, 147, -11.630566, 155.957617], [-1.353223, 140.862305, -6.491895, 155.957617], [5.381389, 8.698332, -8.748195, 20.000554], [5.381389, 20.000554, -13.458057, 31.302776], [7.309793, 170.989319, 6.806464, 171.756836], [7.47757, 168.533264, 7.142017, 168.840271], [6.135358, 169.454285, 5.799805, 169.914795], [11.168652, 166.844727, 11.000876, 166.99823], [41.290967, 43.439453, 40, 45.61], [40, 44.33, 39.71, 45.798438], [39.71, 45.1, 39.474524, 45.798438], [40.4, 45.61, 40, 45.96], [39.9, 45.75, 39.26, 46.2], [39.26, 45.93, 38.869043, 46.2], [39.64, 46.2, 38.869043, 46.584766]],
                "MIN_SIZE_FOR_ATTRIBUTION": 150,
                "TILE_URL_TEMPLATE": "https:\/\/external.fevn1-1.fna.fbcdn.net\/map_tile.php?v=29&osm_provider=2&x={x}&y={y}&z={z}",
                "STATIC_MAP_URL_TEMPLATE": "https:\/\/external.fevn1-1.fna.fbcdn.net\/static_map.php?v=29&osm_provider=2",
                "LOGO": {
                    "url": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yx\/r\/3SDpxuv8zR7.png",
                    "width": 24,
                    "height": 24
                },
                "ZOOM_RANGE": {"MIN": 1, "MAX": 19},
                "HERE_MAP_REPORTER_URL": "https:\/\/mapfeedback.here.com\/?appId=ZOdjOwwG7wKMxvmMewWg",
                "OSM_MAP_REPORTER_URL": "https:\/\/www.openstreetmap.org\/fixthemap\/",
                "OSM_MAP_MIN_ZOOM_TO_REPORT_ISSUE": 12,
                "DEVICE_PIXEL_RATIO": 1,
                "LIVE_MAP_VERSION": "7"
            }, 664], ["DliteBootloadConfig", ["XRelayBootloadController"], {
                "Controller": {"__m": "XRelayBootloadController"},
                "PKG_COHORT_KEY": "__pc",
                "subdomain": "www"
            }, 837], ["MarketplaceExperiments", [], {
                "marketplaceWWWItemHoverMessage": false,
                "marketplaceWWWItemHoverSave": false
            }, 2487], ["CurrencyConfig", [], {
                "adsCurrenciesByCode": {
                    "AED": {
                        "iso": "AED",
                        "format": "{symbol}{amount}",
                        "symbol": "\u062f.\u0625.",
                        "offset": 100,
                        "name": "UAE Dirham"
                    },
                    "ARS": {
                        "iso": "ARS",
                        "format": "{symbol}{amount}",
                        "symbol": "$",
                        "offset": 100,
                        "name": "Argentine Peso"
                    },
                    "AUD": {
                        "iso": "AUD",
                        "format": "{symbol}{amount}",
                        "symbol": "$",
                        "offset": 100,
                        "name": "Australian Dollar"
                    },
                    "BDT": {
                        "iso": "BDT",
                        "format": "{symbol}{amount}",
                        "symbol": "\u09f3",
                        "offset": 100,
                        "name": "Bangladeshi Taka"
                    },
                    "BOB": {
                        "iso": "BOB",
                        "format": "{symbol}{amount}",
                        "symbol": "Bs.",
                        "offset": 100,
                        "name": "Bolivian Boliviano"
                    },
                    "BRL": {
                        "iso": "BRL",
                        "format": "{symbol}{amount}",
                        "symbol": "R$",
                        "offset": 100,
                        "name": "Brazilian Real"
                    },
                    "CAD": {
                        "iso": "CAD",
                        "format": "{symbol}{amount}",
                        "symbol": "$",
                        "offset": 100,
                        "name": "Canadian Dollar"
                    },
                    "CHF": {
                        "iso": "CHF",
                        "format": "{symbol}{amount}",
                        "symbol": "Fr.",
                        "offset": 100,
                        "name": "Swiss Franc"
                    },
                    "CLP": {
                        "iso": "CLP",
                        "format": "{symbol}{amount}",
                        "symbol": "$",
                        "offset": 1,
                        "name": "Chilean Peso"
                    },
                    "CNY": {
                        "iso": "CNY",
                        "format": "{symbol}{amount}",
                        "symbol": "\uffe5",
                        "offset": 100,
                        "name": "Chinese Yuan"
                    },
                    "COP": {
                        "iso": "COP",
                        "format": "{symbol}{amount}",
                        "symbol": "$",
                        "offset": 1,
                        "name": "Colombian Peso"
                    },
                    "CRC": {
                        "iso": "CRC",
                        "format": "{symbol}{amount}",
                        "symbol": "\u20a1",
                        "offset": 1,
                        "name": "Costa Rican Col\u00f3n"
                    },
                    "CZK": {
                        "iso": "CZK",
                        "format": "{symbol}{amount}",
                        "symbol": "K\u010d",
                        "offset": 100,
                        "name": "Czech Koruna"
                    },
                    "DKK": {
                        "iso": "DKK",
                        "format": "{symbol}{amount}",
                        "symbol": "kr.",
                        "offset": 100,
                        "name": "Danish Krone"
                    },
                    "DZD": {
                        "iso": "DZD",
                        "format": "{symbol}{amount}",
                        "symbol": "DA",
                        "offset": 100,
                        "name": "Algerian Dinar"
                    },
                    "EGP": {
                        "iso": "EGP",
                        "format": "{symbol}{amount}",
                        "symbol": "\u062c.\u0645.",
                        "offset": 100,
                        "name": "Egyptian Pound"
                    },
                    "EUR": {
                        "iso": "EUR",
                        "format": "{symbol}{amount}",
                        "symbol": "\u20ac",
                        "offset": 100,
                        "name": "Euro"
                    },
                    "GBP": {
                        "iso": "GBP",
                        "format": "{symbol}{amount}",
                        "symbol": "\u00a3",
                        "offset": 100,
                        "name": "British Pound"
                    },
                    "GTQ": {
                        "iso": "GTQ",
                        "format": "{symbol}{amount}",
                        "symbol": "Q",
                        "offset": 100,
                        "name": "Guatemalan Quetzal"
                    },
                    "HKD": {
                        "iso": "HKD",
                        "format": "{symbol}{amount}",
                        "symbol": "$",
                        "offset": 100,
                        "name": "Hong Kong Dollar"
                    },
                    "HNL": {
                        "iso": "HNL",
                        "format": "{symbol}{amount}",
                        "symbol": "L.",
                        "offset": 100,
                        "name": "Honduran Lempira"
                    },
                    "HUF": {
                        "iso": "HUF",
                        "format": "{symbol}{amount}",
                        "symbol": "Ft",
                        "offset": 1,
                        "name": "Hungarian Forint"
                    },
                    "IDR": {
                        "iso": "IDR",
                        "format": "{symbol}{amount}",
                        "symbol": "Rp",
                        "offset": 1,
                        "name": "Indonesian Rupiah"
                    },
                    "ILS": {
                        "iso": "ILS",
                        "format": "{symbol}{amount}",
                        "symbol": "\u20aa",
                        "offset": 100,
                        "name": "Israeli New Shekel"
                    },
                    "INR": {
                        "iso": "INR",
                        "format": "{symbol}{amount}",
                        "symbol": "\u20b9",
                        "offset": 100,
                        "name": "Indian Rupee"
                    },
                    "ISK": {
                        "iso": "ISK",
                        "format": "{symbol}{amount}",
                        "symbol": "kr.",
                        "offset": 1,
                        "name": "Iceland Krona"
                    },
                    "JPY": {
                        "iso": "JPY",
                        "format": "{symbol}{amount}",
                        "symbol": "\u00a5",
                        "offset": 1,
                        "name": "Japanese Yen"
                    },
                    "KES": {
                        "iso": "KES",
                        "format": "{symbol}{amount}",
                        "symbol": "KSh",
                        "offset": 100,
                        "name": "Kenyan Shilling"
                    },
                    "KRW": {
                        "iso": "KRW",
                        "format": "{symbol}{amount}",
                        "symbol": "\u20a9",
                        "offset": 1,
                        "name": "Korean Won"
                    },
                    "MOP": {
                        "iso": "MOP",
                        "format": "{symbol}{amount}",
                        "symbol": "MOP",
                        "offset": 100,
                        "name": "Macau Patacas"
                    },
                    "MXN": {
                        "iso": "MXN",
                        "format": "{symbol}{amount}",
                        "symbol": "$",
                        "offset": 100,
                        "name": "Mexican Peso"
                    },
                    "MYR": {
                        "iso": "MYR",
                        "format": "{symbol}{amount}",
                        "symbol": "RM",
                        "offset": 100,
                        "name": "Malaysian Ringgit"
                    },
                    "NGN": {
                        "iso": "NGN",
                        "format": "{symbol}{amount}",
                        "symbol": "\u20a6",
                        "offset": 100,
                        "name": "Nigerian Naira"
                    },
                    "NIO": {
                        "iso": "NIO",
                        "format": "{symbol}{amount}",
                        "symbol": "C$",
                        "offset": 100,
                        "name": "Nicaraguan Cordoba"
                    },
                    "NOK": {
                        "iso": "NOK",
                        "format": "{symbol}{amount}",
                        "symbol": "kr",
                        "offset": 100,
                        "name": "Norwegian Krone"
                    },
                    "NZD": {
                        "iso": "NZD",
                        "format": "{symbol}{amount}",
                        "symbol": "$",
                        "offset": 100,
                        "name": "New Zealand Dollar"
                    },
                    "PEN": {
                        "iso": "PEN",
                        "format": "{symbol}{amount}",
                        "symbol": "S\/.",
                        "offset": 100,
                        "name": "Peruvian Nuevo Sol"
                    },
                    "PHP": {
                        "iso": "PHP",
                        "format": "{symbol}{amount}",
                        "symbol": "\u20b1",
                        "offset": 100,
                        "name": "Philippine Peso"
                    },
                    "PKR": {
                        "iso": "PKR",
                        "format": "{symbol}{amount}",
                        "symbol": "Rs",
                        "offset": 100,
                        "name": "Pakistani Rupee"
                    },
                    "PLN": {
                        "iso": "PLN",
                        "format": "{symbol}{amount}",
                        "symbol": "z\u0142",
                        "offset": 100,
                        "name": "Polish Zloty"
                    },
                    "PYG": {
                        "iso": "PYG",
                        "format": "{symbol}{amount}",
                        "symbol": "\u20b2",
                        "offset": 1,
                        "name": "Paraguayan Guarani"
                    },
                    "QAR": {
                        "iso": "QAR",
                        "format": "{symbol}{amount}",
                        "symbol": "\u0631.\u0642.",
                        "offset": 100,
                        "name": "Qatari Rials"
                    },
                    "RON": {
                        "iso": "RON",
                        "format": "{symbol}{amount}",
                        "symbol": "lei",
                        "offset": 100,
                        "name": "Romanian Leu"
                    },
                    "RUB": {
                        "iso": "RUB",
                        "format": "{symbol}{amount}",
                        "symbol": "p.",
                        "offset": 100,
                        "name": "Russian Ruble"
                    },
                    "SAR": {
                        "iso": "SAR",
                        "format": "{symbol}{amount}",
                        "symbol": "\u0631.\u0633.",
                        "offset": 100,
                        "name": "Saudi Arabian Riyal"
                    },
                    "SEK": {
                        "iso": "SEK",
                        "format": "{symbol}{amount}",
                        "symbol": "kr",
                        "offset": 100,
                        "name": "Swedish Krona"
                    },
                    "SGD": {
                        "iso": "SGD",
                        "format": "{symbol}{amount}",
                        "symbol": "$",
                        "offset": 100,
                        "name": "Singapore Dollar"
                    },
                    "THB": {
                        "iso": "THB",
                        "format": "{symbol}{amount}",
                        "symbol": "\u0e3f",
                        "offset": 100,
                        "name": "Thai Baht"
                    },
                    "TRY": {
                        "iso": "TRY",
                        "format": "{symbol}{amount}",
                        "symbol": "TL",
                        "offset": 100,
                        "name": "Turkish Lira"
                    },
                    "TWD": {
                        "iso": "TWD",
                        "format": "{symbol}{amount}",
                        "symbol": "NT$",
                        "offset": 1,
                        "name": "Taiwan Dollar"
                    },
                    "USD": {
                        "iso": "USD",
                        "format": "{symbol}{amount}",
                        "symbol": "$",
                        "offset": 100,
                        "name": "US Dollars"
                    },
                    "UYU": {
                        "iso": "UYU",
                        "format": "{symbol}{amount}",
                        "symbol": "$U",
                        "offset": 100,
                        "name": "Uruguay Peso"
                    },
                    "VEF": {
                        "iso": "VEF",
                        "format": "{symbol}{amount}",
                        "symbol": "Bs",
                        "offset": 100,
                        "name": "Venezuelan Bolivar"
                    },
                    "VND": {
                        "iso": "VND",
                        "format": "{symbol}{amount}",
                        "symbol": "\u20ab",
                        "offset": 1,
                        "name": "Vietnamese Dong"
                    },
                    "ZAR": {
                        "iso": "ZAR",
                        "format": "{symbol}{amount}",
                        "symbol": "R",
                        "offset": 100,
                        "name": "South African Rand"
                    }
                },
                "adsCurrencyCodes": ["AED", "ARS", "AUD", "BDT", "BOB", "BRL", "CAD", "CHF", "CLP", "CNY", "COP", "CRC", "CZK", "DKK", "DZD", "EGP", "EUR", "GBP", "GTQ", "HKD", "HNL", "HUF", "IDR", "ILS", "INR", "ISK", "JPY", "KES", "KRW", "MOP", "MXN", "MYR", "NGN", "NIO", "NOK", "NZD", "PEN", "PHP", "PKR", "PLN", "PYG", "QAR", "RON", "RUB", "SAR", "SEK", "SGD", "THB", "TRY", "TWD", "USD", "UYU", "VEF", "VND", "ZAR"],
                "allCurrenciesByCode": {
                    "AED": {
                        "iso": "AED",
                        "format": "{symbol}{amount}",
                        "symbol": "\u062f.\u0625.",
                        "offset": 100,
                        "name": "UAE Dirham"
                    },
                    "AFN": {
                        "iso": "AFN",
                        "format": "{symbol}{amount}",
                        "symbol": "\u060b",
                        "offset": 100,
                        "name": "Afghan Afghani"
                    },
                    "ALL": {
                        "iso": "ALL",
                        "format": "{symbol}{amount}",
                        "symbol": "Lek",
                        "offset": 100,
                        "name": "Albanian Lek"
                    },
                    "AMD": {
                        "iso": "AMD",
                        "format": "{symbol}{amount}",
                        "symbol": "\u0564\u0580.",
                        "offset": 100,
                        "name": "Armenian Dram"
                    },
                    "ANG": {
                        "iso": "ANG",
                        "format": "{symbol}{amount}",
                        "symbol": "ANG",
                        "offset": 100,
                        "name": "Netherlands Antillean Guilder"
                    },
                    "AOA": {
                        "iso": "AOA",
                        "format": "{symbol}{amount}",
                        "symbol": "AOA",
                        "offset": 100,
                        "name": "Angolan Kwanza"
                    },
                    "ARS": {
                        "iso": "ARS",
                        "format": "{symbol}{amount}",
                        "symbol": "$",
                        "offset": 100,
                        "name": "Argentine Peso"
                    },
                    "AUD": {
                        "iso": "AUD",
                        "format": "{symbol}{amount}",
                        "symbol": "$",
                        "offset": 100,
                        "name": "Australian Dollar"
                    },
                    "AWG": {
                        "iso": "AWG",
                        "format": "{symbol}{amount}",
                        "symbol": "AWG",
                        "offset": 100,
                        "name": "Aruban Florin"
                    },
                    "AZN": {
                        "iso": "AZN",
                        "format": "{symbol}{amount}",
                        "symbol": "\u043c\u0430\u043d.",
                        "offset": 100,
                        "name": "Azerbaijani Manat"
                    },
                    "BAM": {
                        "iso": "BAM",
                        "format": "{symbol}{amount}",
                        "symbol": "BAM",
                        "offset": 100,
                        "name": "Bosnian Herzegovinian Convertible Mark"
                    },
                    "BBD": {
                        "iso": "BBD",
                        "format": "{symbol}{amount}",
                        "symbol": "Bds$",
                        "offset": 100,
                        "name": "Barbados Dollar"
                    },
                    "BDT": {
                        "iso": "BDT",
                        "format": "{symbol}{amount}",
                        "symbol": "\u09f3",
                        "offset": 100,
                        "name": "Bangladeshi Taka"
                    },
                    "BGN": {
                        "iso": "BGN",
                        "format": "{symbol}{amount}",
                        "symbol": "\u043b\u0432.",
                        "offset": 100,
                        "name": "Bulgarian Lev"
                    },
                    "BHD": {
                        "iso": "BHD",
                        "format": "{symbol}{amount}",
                        "symbol": "\u062f.\u0628.",
                        "offset": 100,
                        "name": "Bahraini Dinar"
                    },
                    "BIF": {
                        "iso": "BIF",
                        "format": "{symbol}{amount}",
                        "symbol": "FBu",
                        "offset": 1,
                        "name": "Burundian Franc"
                    },
                    "BMD": {
                        "iso": "BMD",
                        "format": "{symbol}{amount}",
                        "symbol": "$",
                        "offset": 100,
                        "name": "Bermudian Dollar"
                    },
                    "BND": {
                        "iso": "BND",
                        "format": "{symbol}{amount}",
                        "symbol": "B$",
                        "offset": 100,
                        "name": "Brunei Dollar"
                    },
                    "BOB": {
                        "iso": "BOB",
                        "format": "{symbol}{amount}",
                        "symbol": "Bs.",
                        "offset": 100,
                        "name": "Bolivian Boliviano"
                    },
                    "BRL": {
                        "iso": "BRL",
                        "format": "{symbol}{amount}",
                        "symbol": "R$",
                        "offset": 100,
                        "name": "Brazilian Real"
                    },
                    "BSD": {
                        "iso": "BSD",
                        "format": "{symbol}{amount}",
                        "symbol": "B$",
                        "offset": 100,
                        "name": "Bahamian Dollar"
                    },
                    "BTN": {
                        "iso": "BTN",
                        "format": "{symbol}{amount}",
                        "symbol": "Nu.",
                        "offset": 100,
                        "name": "Bhutanese Ngultrum"
                    },
                    "BWP": {
                        "iso": "BWP",
                        "format": "{symbol}{amount}",
                        "symbol": "P",
                        "offset": 100,
                        "name": "Botswanan Pula"
                    },
                    "BYN": {
                        "iso": "BYN",
                        "format": "{symbol}{amount}",
                        "symbol": "Br",
                        "offset": 100,
                        "name": "Belarusian Ruble"
                    },
                    "BZD": {
                        "iso": "BZD",
                        "format": "{symbol}{amount}",
                        "symbol": "BZ$",
                        "offset": 100,
                        "name": "Belize Dollar"
                    },
                    "CAD": {
                        "iso": "CAD",
                        "format": "{symbol}{amount}",
                        "symbol": "$",
                        "offset": 100,
                        "name": "Canadian Dollar"
                    },
                    "CDF": {
                        "iso": "CDF",
                        "format": "{symbol}{amount}",
                        "symbol": "FC",
                        "offset": 100,
                        "name": "Congolese Franc"
                    },
                    "CHF": {
                        "iso": "CHF",
                        "format": "{symbol}{amount}",
                        "symbol": "Fr.",
                        "offset": 100,
                        "name": "Swiss Franc"
                    },
                    "CLP": {
                        "iso": "CLP",
                        "format": "{symbol}{amount}",
                        "symbol": "$",
                        "offset": 1,
                        "name": "Chilean Peso"
                    },
                    "CNY": {
                        "iso": "CNY",
                        "format": "{symbol}{amount}",
                        "symbol": "\uffe5",
                        "offset": 100,
                        "name": "Chinese Yuan"
                    },
                    "COP": {
                        "iso": "COP",
                        "format": "{symbol}{amount}",
                        "symbol": "$",
                        "offset": 1,
                        "name": "Colombian Peso"
                    },
                    "CRC": {
                        "iso": "CRC",
                        "format": "{symbol}{amount}",
                        "symbol": "\u20a1",
                        "offset": 1,
                        "name": "Costa Rican Col\u00f3n"
                    },
                    "CVE": {
                        "iso": "CVE",
                        "format": "{symbol}{amount}",
                        "symbol": "$",
                        "offset": 1,
                        "name": "Cape Verde Escudo"
                    },
                    "CZK": {
                        "iso": "CZK",
                        "format": "{symbol}{amount}",
                        "symbol": "K\u010d",
                        "offset": 100,
                        "name": "Czech Koruna"
                    },
                    "DJF": {
                        "iso": "DJF",
                        "format": "{symbol}{amount}",
                        "symbol": "Fdj",
                        "offset": 1,
                        "name": "Djiboutian Franc"
                    },
                    "DKK": {
                        "iso": "DKK",
                        "format": "{symbol}{amount}",
                        "symbol": "kr.",
                        "offset": 100,
                        "name": "Danish Krone"
                    },
                    "DOP": {
                        "iso": "DOP",
                        "format": "{symbol}{amount}",
                        "symbol": "RD$",
                        "offset": 100,
                        "name": "Dominican Peso"
                    },
                    "DZD": {
                        "iso": "DZD",
                        "format": "{symbol}{amount}",
                        "symbol": "DA",
                        "offset": 100,
                        "name": "Algerian Dinar"
                    },
                    "EGP": {
                        "iso": "EGP",
                        "format": "{symbol}{amount}",
                        "symbol": "\u062c.\u0645.",
                        "offset": 100,
                        "name": "Egyptian Pound"
                    },
                    "ERN": {
                        "iso": "ERN",
                        "format": "{symbol}{amount}",
                        "symbol": "Nfk",
                        "offset": 100,
                        "name": "Eritrean Nakfa"
                    },
                    "ETB": {
                        "iso": "ETB",
                        "format": "{symbol}{amount}",
                        "symbol": "Br",
                        "offset": 100,
                        "name": "Ethiopian Birr"
                    },
                    "EUR": {
                        "iso": "EUR",
                        "format": "{symbol}{amount}",
                        "symbol": "\u20ac",
                        "offset": 100,
                        "name": "Euro"
                    },
                    "FBZ": {
                        "iso": "FBZ",
                        "format": "{symbol}{amount}",
                        "symbol": "C",
                        "offset": 100,
                        "name": "credits"
                    },
                    "FJD": {
                        "iso": "FJD",
                        "format": "{symbol}{amount}",
                        "symbol": "FJ$",
                        "offset": 100,
                        "name": "Fiji Dollar"
                    },
                    "FKP": {
                        "iso": "FKP",
                        "format": "{symbol}{amount}",
                        "symbol": "\u00a3",
                        "offset": 100,
                        "name": "Falkland Islands Pound"
                    },
                    "GBP": {
                        "iso": "GBP",
                        "format": "{symbol}{amount}",
                        "symbol": "\u00a3",
                        "offset": 100,
                        "name": "British Pound"
                    },
                    "GEL": {
                        "iso": "GEL",
                        "format": "{symbol}{amount}",
                        "symbol": "\u20be",
                        "offset": 100,
                        "name": "Georgian Lari"
                    },
                    "GHS": {
                        "iso": "GHS",
                        "format": "{symbol}{amount}",
                        "symbol": "GHS",
                        "offset": 100,
                        "name": "Ghanaian Cedi"
                    },
                    "GIP": {
                        "iso": "GIP",
                        "format": "{symbol}{amount}",
                        "symbol": "\u00a3",
                        "offset": 100,
                        "name": "Gibraltar Pound"
                    },
                    "GMD": {
                        "iso": "GMD",
                        "format": "{symbol}{amount}",
                        "symbol": "D",
                        "offset": 100,
                        "name": "Gambian Dalasi"
                    },
                    "GNF": {
                        "iso": "GNF",
                        "format": "{symbol}{amount}",
                        "symbol": "FG",
                        "offset": 1,
                        "name": "Guinean Franc"
                    },
                    "GTQ": {
                        "iso": "GTQ",
                        "format": "{symbol}{amount}",
                        "symbol": "Q",
                        "offset": 100,
                        "name": "Guatemalan Quetzal"
                    },
                    "GYD": {
                        "iso": "GYD",
                        "format": "{symbol}{amount}",
                        "symbol": "G$",
                        "offset": 100,
                        "name": "Guyanese Dollar"
                    },
                    "HKD": {
                        "iso": "HKD",
                        "format": "{symbol}{amount}",
                        "symbol": "$",
                        "offset": 100,
                        "name": "Hong Kong Dollar"
                    },
                    "HNL": {
                        "iso": "HNL",
                        "format": "{symbol}{amount}",
                        "symbol": "L.",
                        "offset": 100,
                        "name": "Honduran Lempira"
                    },
                    "HRK": {
                        "iso": "HRK",
                        "format": "{symbol}{amount}",
                        "symbol": "kn",
                        "offset": 100,
                        "name": "Croatian Kuna"
                    },
                    "HTG": {
                        "iso": "HTG",
                        "format": "{symbol}{amount}",
                        "symbol": "G",
                        "offset": 100,
                        "name": "Haitian Gourde"
                    },
                    "HUF": {
                        "iso": "HUF",
                        "format": "{symbol}{amount}",
                        "symbol": "Ft",
                        "offset": 1,
                        "name": "Hungarian Forint"
                    },
                    "IDR": {
                        "iso": "IDR",
                        "format": "{symbol}{amount}",
                        "symbol": "Rp",
                        "offset": 1,
                        "name": "Indonesian Rupiah"
                    },
                    "ILS": {
                        "iso": "ILS",
                        "format": "{symbol}{amount}",
                        "symbol": "\u20aa",
                        "offset": 100,
                        "name": "Israeli New Shekel"
                    },
                    "INR": {
                        "iso": "INR",
                        "format": "{symbol}{amount}",
                        "symbol": "\u20b9",
                        "offset": 100,
                        "name": "Indian Rupee"
                    },
                    "IQD": {
                        "iso": "IQD",
                        "format": "{symbol}{amount}",
                        "symbol": "\u062f.\u0639.",
                        "offset": 100,
                        "name": "Iraqi Dinar"
                    },
                    "ISK": {
                        "iso": "ISK",
                        "format": "{symbol}{amount}",
                        "symbol": "kr.",
                        "offset": 1,
                        "name": "Iceland Krona"
                    },
                    "JMD": {
                        "iso": "JMD",
                        "format": "{symbol}{amount}",
                        "symbol": "J$",
                        "offset": 100,
                        "name": "Jamaican Dollar"
                    },
                    "JOD": {
                        "iso": "JOD",
                        "format": "{symbol}{amount}",
                        "symbol": "\u062f.\u0627.",
                        "offset": 100,
                        "name": "Jordanian Dinar"
                    },
                    "JPY": {
                        "iso": "JPY",
                        "format": "{symbol}{amount}",
                        "symbol": "\u00a5",
                        "offset": 1,
                        "name": "Japanese Yen"
                    },
                    "KES": {
                        "iso": "KES",
                        "format": "{symbol}{amount}",
                        "symbol": "KSh",
                        "offset": 100,
                        "name": "Kenyan Shilling"
                    },
                    "KGS": {
                        "iso": "KGS",
                        "format": "{symbol}{amount}",
                        "symbol": "\u0441\u043e\u043c",
                        "offset": 100,
                        "name": "Kyrgyzstani Som"
                    },
                    "KHR": {
                        "iso": "KHR",
                        "format": "{symbol}{amount}",
                        "symbol": "\u17db",
                        "offset": 100,
                        "name": "Cambodian Riel"
                    },
                    "KMF": {
                        "iso": "KMF",
                        "format": "{symbol}{amount}",
                        "symbol": "CF",
                        "offset": 1,
                        "name": "Comoro Franc"
                    },
                    "KRW": {
                        "iso": "KRW",
                        "format": "{symbol}{amount}",
                        "symbol": "\u20a9",
                        "offset": 1,
                        "name": "Korean Won"
                    },
                    "KWD": {
                        "iso": "KWD",
                        "format": "{symbol}{amount}",
                        "symbol": "\u062f.\u0643.",
                        "offset": 100,
                        "name": "Kuwaiti Dinar"
                    },
                    "KYD": {
                        "iso": "KYD",
                        "format": "{symbol}{amount}",
                        "symbol": "CI$",
                        "offset": 100,
                        "name": "Cayman Islands Dollar"
                    },
                    "KZT": {
                        "iso": "KZT",
                        "format": "{symbol}{amount}",
                        "symbol": "\u0422",
                        "offset": 100,
                        "name": "Kazakhstani Tenge"
                    },
                    "LAK": {
                        "iso": "LAK",
                        "format": "{symbol}{amount}",
                        "symbol": "\u20ad",
                        "offset": 100,
                        "name": "Lao Kip"
                    },
                    "LBP": {
                        "iso": "LBP",
                        "format": "{symbol}{amount}",
                        "symbol": "\u0644.\u0644.",
                        "offset": 100,
                        "name": "Lebanese Pound"
                    },
                    "LKR": {
                        "iso": "LKR",
                        "format": "{symbol}{amount}",
                        "symbol": "LKR",
                        "offset": 100,
                        "name": "Sri Lankan Rupee"
                    },
                    "LRD": {
                        "iso": "LRD",
                        "format": "{symbol}{amount}",
                        "symbol": "L$",
                        "offset": 100,
                        "name": "Liberian Dollar"
                    },
                    "LSL": {
                        "iso": "LSL",
                        "format": "{symbol}{amount}",
                        "symbol": "L",
                        "offset": 100,
                        "name": "Lesotho Loti"
                    },
                    "LTL": {
                        "iso": "LTL",
                        "format": "{symbol}{amount}",
                        "symbol": "Lt",
                        "offset": 100,
                        "name": "Lithuanian Litas"
                    },
                    "LVL": {
                        "iso": "LVL",
                        "format": "{symbol}{amount}",
                        "symbol": "Ls",
                        "offset": 100,
                        "name": "Latvian Lats"
                    },
                    "LYD": {
                        "iso": "LYD",
                        "format": "{symbol}{amount}",
                        "symbol": "\u062f.\u0644.",
                        "offset": 100,
                        "name": "Libyan Dinar"
                    },
                    "MAD": {
                        "iso": "MAD",
                        "format": "{symbol}{amount}",
                        "symbol": "\u062f.\u0645.",
                        "offset": 100,
                        "name": "Moroccan Dirham"
                    },
                    "MDL": {
                        "iso": "MDL",
                        "format": "{symbol}{amount}",
                        "symbol": "lei",
                        "offset": 100,
                        "name": "Moldovan Leu"
                    },
                    "MGA": {
                        "iso": "MGA",
                        "format": "{symbol}{amount}",
                        "symbol": "Ar",
                        "offset": 5,
                        "name": "Malagasy Ariary"
                    },
                    "MKD": {
                        "iso": "MKD",
                        "format": "{symbol}{amount}",
                        "symbol": "\u0434\u0435\u043d.",
                        "offset": 100,
                        "name": "Macedonian Denar"
                    },
                    "MMK": {
                        "iso": "MMK",
                        "format": "{symbol}{amount}",
                        "symbol": "Ks",
                        "offset": 100,
                        "name": "Burmese Kyat"
                    },
                    "MNT": {
                        "iso": "MNT",
                        "format": "{symbol}{amount}",
                        "symbol": "\u20ae",
                        "offset": 100,
                        "name": "Mongolian Tugrik"
                    },
                    "MOP": {
                        "iso": "MOP",
                        "format": "{symbol}{amount}",
                        "symbol": "MOP",
                        "offset": 100,
                        "name": "Macau Patacas"
                    },
                    "MRO": {
                        "iso": "MRO",
                        "format": "{symbol}{amount}",
                        "symbol": "UM",
                        "offset": 5,
                        "name": "Mauritanian Ouguiya"
                    },
                    "MUR": {
                        "iso": "MUR",
                        "format": "{symbol}{amount}",
                        "symbol": "MUR",
                        "offset": 100,
                        "name": "Mauritian Rupee"
                    },
                    "MVR": {
                        "iso": "MVR",
                        "format": "{symbol}{amount}",
                        "symbol": "\u0783.",
                        "offset": 100,
                        "name": "Maldivian Rufiyaa"
                    },
                    "MWK": {
                        "iso": "MWK",
                        "format": "{symbol}{amount}",
                        "symbol": "MK",
                        "offset": 100,
                        "name": "Malawian Kwacha"
                    },
                    "MXN": {
                        "iso": "MXN",
                        "format": "{symbol}{amount}",
                        "symbol": "$",
                        "offset": 100,
                        "name": "Mexican Peso"
                    },
                    "MYR": {
                        "iso": "MYR",
                        "format": "{symbol}{amount}",
                        "symbol": "RM",
                        "offset": 100,
                        "name": "Malaysian Ringgit"
                    },
                    "MZN": {
                        "iso": "MZN",
                        "format": "{symbol}{amount}",
                        "symbol": "MT",
                        "offset": 100,
                        "name": "Mozambican Metical"
                    },
                    "NAD": {
                        "iso": "NAD",
                        "format": "{symbol}{amount}",
                        "symbol": "N$",
                        "offset": 100,
                        "name": "Namibian Dollar"
                    },
                    "NGN": {
                        "iso": "NGN",
                        "format": "{symbol}{amount}",
                        "symbol": "\u20a6",
                        "offset": 100,
                        "name": "Nigerian Naira"
                    },
                    "NIO": {
                        "iso": "NIO",
                        "format": "{symbol}{amount}",
                        "symbol": "C$",
                        "offset": 100,
                        "name": "Nicaraguan Cordoba"
                    },
                    "NOK": {
                        "iso": "NOK",
                        "format": "{symbol}{amount}",
                        "symbol": "kr",
                        "offset": 100,
                        "name": "Norwegian Krone"
                    },
                    "NPR": {
                        "iso": "NPR",
                        "format": "{symbol}{amount}",
                        "symbol": "\u0930\u0942",
                        "offset": 100,
                        "name": "Nepalese Rupee"
                    },
                    "NZD": {
                        "iso": "NZD",
                        "format": "{symbol}{amount}",
                        "symbol": "$",
                        "offset": 100,
                        "name": "New Zealand Dollar"
                    },
                    "OMR": {
                        "iso": "OMR",
                        "format": "{symbol}{amount}",
                        "symbol": "\u0631.\u0639.",
                        "offset": 100,
                        "name": "Omani Rial"
                    },
                    "PAB": {
                        "iso": "PAB",
                        "format": "{symbol}{amount}",
                        "symbol": "B\/.",
                        "offset": 100,
                        "name": "Panamanian Balboas"
                    },
                    "PEN": {
                        "iso": "PEN",
                        "format": "{symbol}{amount}",
                        "symbol": "S\/.",
                        "offset": 100,
                        "name": "Peruvian Nuevo Sol"
                    },
                    "PGK": {
                        "iso": "PGK",
                        "format": "{symbol}{amount}",
                        "symbol": "K",
                        "offset": 100,
                        "name": "Papua New Guinean Kina"
                    },
                    "PHP": {
                        "iso": "PHP",
                        "format": "{symbol}{amount}",
                        "symbol": "\u20b1",
                        "offset": 100,
                        "name": "Philippine Peso"
                    },
                    "PKR": {
                        "iso": "PKR",
                        "format": "{symbol}{amount}",
                        "symbol": "Rs",
                        "offset": 100,
                        "name": "Pakistani Rupee"
                    },
                    "PLN": {
                        "iso": "PLN",
                        "format": "{symbol}{amount}",
                        "symbol": "z\u0142",
                        "offset": 100,
                        "name": "Polish Zloty"
                    },
                    "PYG": {
                        "iso": "PYG",
                        "format": "{symbol}{amount}",
                        "symbol": "\u20b2",
                        "offset": 1,
                        "name": "Paraguayan Guarani"
                    },
                    "QAR": {
                        "iso": "QAR",
                        "format": "{symbol}{amount}",
                        "symbol": "\u0631.\u0642.",
                        "offset": 100,
                        "name": "Qatari Rials"
                    },
                    "RON": {
                        "iso": "RON",
                        "format": "{symbol}{amount}",
                        "symbol": "lei",
                        "offset": 100,
                        "name": "Romanian Leu"
                    },
                    "RSD": {
                        "iso": "RSD",
                        "format": "{symbol}{amount}",
                        "symbol": "RSD",
                        "offset": 100,
                        "name": "Serbian Dinar"
                    },
                    "RUB": {
                        "iso": "RUB",
                        "format": "{symbol}{amount}",
                        "symbol": "p.",
                        "offset": 100,
                        "name": "Russian Ruble"
                    },
                    "RWF": {
                        "iso": "RWF",
                        "format": "{symbol}{amount}",
                        "symbol": "FRw",
                        "offset": 1,
                        "name": "Rwandan Franc"
                    },
                    "SAR": {
                        "iso": "SAR",
                        "format": "{symbol}{amount}",
                        "symbol": "\u0631.\u0633.",
                        "offset": 100,
                        "name": "Saudi Arabian Riyal"
                    },
                    "SBD": {
                        "iso": "SBD",
                        "format": "{symbol}{amount}",
                        "symbol": "SI$",
                        "offset": 100,
                        "name": "Solomon Islands Dollar"
                    },
                    "SCR": {
                        "iso": "SCR",
                        "format": "{symbol}{amount}",
                        "symbol": "SR",
                        "offset": 100,
                        "name": "Seychelles Rupee"
                    },
                    "SEK": {
                        "iso": "SEK",
                        "format": "{symbol}{amount}",
                        "symbol": "kr",
                        "offset": 100,
                        "name": "Swedish Krona"
                    },
                    "SGD": {
                        "iso": "SGD",
                        "format": "{symbol}{amount}",
                        "symbol": "$",
                        "offset": 100,
                        "name": "Singapore Dollar"
                    },
                    "SHP": {
                        "iso": "SHP",
                        "format": "{symbol}{amount}",
                        "symbol": "\u00a3",
                        "offset": 100,
                        "name": "Saint Helena Pound"
                    },
                    "SKK": {
                        "iso": "SKK",
                        "format": "{symbol}{amount}",
                        "symbol": "Sk",
                        "offset": 100,
                        "name": "Slovak Koruna"
                    },
                    "SLL": {
                        "iso": "SLL",
                        "format": "{symbol}{amount}",
                        "symbol": "Le",
                        "offset": 100,
                        "name": "Sierra Leonean Leone"
                    },
                    "SOS": {
                        "iso": "SOS",
                        "format": "{symbol}{amount}",
                        "symbol": "S",
                        "offset": 100,
                        "name": "Somali Shilling"
                    },
                    "SRD": {
                        "iso": "SRD",
                        "format": "{symbol}{amount}",
                        "symbol": "SRD",
                        "offset": 100,
                        "name": "Surinamese Dollar"
                    },
                    "SSP": {
                        "iso": "SSP",
                        "format": "{symbol}{amount}",
                        "symbol": "\u00a3",
                        "offset": 100,
                        "name": "South Sudanese Pound"
                    },
                    "STD": {
                        "iso": "STD",
                        "format": "{symbol}{amount}",
                        "symbol": "Db",
                        "offset": 100,
                        "name": "Sao Tome and Principe Dobra"
                    },
                    "SVC": {
                        "iso": "SVC",
                        "format": "{symbol}{amount}",
                        "symbol": "\u20a1",
                        "offset": 100,
                        "name": "Salvadoran Col\u00f3n"
                    },
                    "SZL": {
                        "iso": "SZL",
                        "format": "{symbol}{amount}",
                        "symbol": "L",
                        "offset": 100,
                        "name": "Swazi Lilangeni"
                    },
                    "THB": {
                        "iso": "THB",
                        "format": "{symbol}{amount}",
                        "symbol": "\u0e3f",
                        "offset": 100,
                        "name": "Thai Baht"
                    },
                    "TJS": {
                        "iso": "TJS",
                        "format": "{symbol}{amount}",
                        "symbol": "\u0441.",
                        "offset": 100,
                        "name": "Tajikistani Somoni"
                    },
                    "TMT": {
                        "iso": "TMT",
                        "format": "{symbol}{amount}",
                        "symbol": "T",
                        "offset": 100,
                        "name": "Turkmenistani Manat"
                    },
                    "TND": {
                        "iso": "TND",
                        "format": "{symbol}{amount}",
                        "symbol": "\u062f.\u062a.",
                        "offset": 100,
                        "name": "Tunisian Dinar"
                    },
                    "TOP": {
                        "iso": "TOP",
                        "format": "{symbol}{amount}",
                        "symbol": "T$",
                        "offset": 100,
                        "name": "Tongan Pa\u02bbanga"
                    },
                    "TRY": {
                        "iso": "TRY",
                        "format": "{symbol}{amount}",
                        "symbol": "TL",
                        "offset": 100,
                        "name": "Turkish Lira"
                    },
                    "TTD": {
                        "iso": "TTD",
                        "format": "{symbol}{amount}",
                        "symbol": "TT$",
                        "offset": 100,
                        "name": "Trinidad and Tobago Dollar"
                    },
                    "TWD": {
                        "iso": "TWD",
                        "format": "{symbol}{amount}",
                        "symbol": "NT$",
                        "offset": 1,
                        "name": "Taiwan Dollar"
                    },
                    "TZS": {
                        "iso": "TZS",
                        "format": "{symbol}{amount}",
                        "symbol": "TSh",
                        "offset": 100,
                        "name": "Tanzanian Shilling"
                    },
                    "UAH": {
                        "iso": "UAH",
                        "format": "{symbol}{amount}",
                        "symbol": "\u0433\u0440\u043d.",
                        "offset": 100,
                        "name": "Ukrainian Hryvnia"
                    },
                    "UGX": {
                        "iso": "UGX",
                        "format": "{symbol}{amount}",
                        "symbol": "USh",
                        "offset": 1,
                        "name": "Ugandan Shilling"
                    },
                    "USD": {
                        "iso": "USD",
                        "format": "{symbol}{amount}",
                        "symbol": "$",
                        "offset": 100,
                        "name": "US Dollars"
                    },
                    "UYU": {
                        "iso": "UYU",
                        "format": "{symbol}{amount}",
                        "symbol": "$U",
                        "offset": 100,
                        "name": "Uruguay Peso"
                    },
                    "UZS": {
                        "iso": "UZS",
                        "format": "{symbol}{amount}",
                        "symbol": "\u0441\u045e\u043c",
                        "offset": 100,
                        "name": "Uzbekistan Som"
                    },
                    "VEF": {
                        "iso": "VEF",
                        "format": "{symbol}{amount}",
                        "symbol": "Bs",
                        "offset": 100,
                        "name": "Venezuelan Bolivar"
                    },
                    "VND": {
                        "iso": "VND",
                        "format": "{symbol}{amount}",
                        "symbol": "\u20ab",
                        "offset": 1,
                        "name": "Vietnamese Dong"
                    },
                    "VUV": {
                        "iso": "VUV",
                        "format": "{symbol}{amount}",
                        "symbol": "VT",
                        "offset": 1,
                        "name": "Vanuatu Vatu"
                    },
                    "WST": {
                        "iso": "WST",
                        "format": "{symbol}{amount}",
                        "symbol": "WS$",
                        "offset": 100,
                        "name": "Samoan Tala"
                    },
                    "XAF": {
                        "iso": "XAF",
                        "format": "{symbol}{amount}",
                        "symbol": "FCFA",
                        "offset": 1,
                        "name": "Central African Frank"
                    },
                    "XCD": {
                        "iso": "XCD",
                        "format": "{symbol}{amount}",
                        "symbol": "$",
                        "offset": 100,
                        "name": "East Caribbean Dollar"
                    },
                    "XOF": {
                        "iso": "XOF",
                        "format": "{symbol}{amount}",
                        "symbol": "FCFA",
                        "offset": 1,
                        "name": "West African Frank"
                    },
                    "XPF": {
                        "iso": "XPF",
                        "format": "{symbol}{amount}",
                        "symbol": "XPF",
                        "offset": 1,
                        "name": "CFP Franc"
                    },
                    "YER": {
                        "iso": "YER",
                        "format": "{symbol}{amount}",
                        "symbol": "\u0631.\u064a.",
                        "offset": 100,
                        "name": "Yemeni Rial"
                    },
                    "ZAR": {
                        "iso": "ZAR",
                        "format": "{symbol}{amount}",
                        "symbol": "R",
                        "offset": 100,
                        "name": "South African Rand"
                    },
                    "ZMW": {
                        "iso": "ZMW",
                        "format": "{symbol}{amount}",
                        "symbol": "ZK",
                        "offset": 100,
                        "name": "Zambian Kwacha"
                    },
                    "ZWL": {
                        "iso": "ZWL",
                        "format": "{symbol}{amount}",
                        "symbol": "ZWL",
                        "offset": 100,
                        "name": "Zimbabwean Dollar"
                    }
                },
                "dynamicAdsCurrenciesByCode": {
                    "AED": {
                        "iso": "AED",
                        "format": "{symbol}{amount}",
                        "symbol": "\u062f.\u0625.",
                        "offset": 100,
                        "name": "UAE Dirham"
                    },
                    "AFN": {
                        "iso": "AFN",
                        "format": "{symbol}{amount}",
                        "symbol": "\u060b",
                        "offset": 100,
                        "name": "Afghan Afghani"
                    },
                    "ALL": {
                        "iso": "ALL",
                        "format": "{symbol}{amount}",
                        "symbol": "Lek",
                        "offset": 100,
                        "name": "Albanian Lek"
                    },
                    "AMD": {
                        "iso": "AMD",
                        "format": "{symbol}{amount}",
                        "symbol": "\u0564\u0580.",
                        "offset": 100,
                        "name": "Armenian Dram"
                    },
                    "ANG": {
                        "iso": "ANG",
                        "format": "{symbol}{amount}",
                        "symbol": "ANG",
                        "offset": 100,
                        "name": "Netherlands Antillean Guilder"
                    },
                    "AOA": {
                        "iso": "AOA",
                        "format": "{symbol}{amount}",
                        "symbol": "AOA",
                        "offset": 100,
                        "name": "Angolan Kwanza"
                    },
                    "ARS": {
                        "iso": "ARS",
                        "format": "{symbol}{amount}",
                        "symbol": "$",
                        "offset": 100,
                        "name": "Argentine Peso"
                    },
                    "AUD": {
                        "iso": "AUD",
                        "format": "{symbol}{amount}",
                        "symbol": "$",
                        "offset": 100,
                        "name": "Australian Dollar"
                    },
                    "AWG": {
                        "iso": "AWG",
                        "format": "{symbol}{amount}",
                        "symbol": "AWG",
                        "offset": 100,
                        "name": "Aruban Florin"
                    },
                    "AZN": {
                        "iso": "AZN",
                        "format": "{symbol}{amount}",
                        "symbol": "\u043c\u0430\u043d.",
                        "offset": 100,
                        "name": "Azerbaijani Manat"
                    },
                    "BAM": {
                        "iso": "BAM",
                        "format": "{symbol}{amount}",
                        "symbol": "BAM",
                        "offset": 100,
                        "name": "Bosnian Herzegovinian Convertible Mark"
                    },
                    "BBD": {
                        "iso": "BBD",
                        "format": "{symbol}{amount}",
                        "symbol": "Bds$",
                        "offset": 100,
                        "name": "Barbados Dollar"
                    },
                    "BDT": {
                        "iso": "BDT",
                        "format": "{symbol}{amount}",
                        "symbol": "\u09f3",
                        "offset": 100,
                        "name": "Bangladeshi Taka"
                    },
                    "BGN": {
                        "iso": "BGN",
                        "format": "{symbol}{amount}",
                        "symbol": "\u043b\u0432.",
                        "offset": 100,
                        "name": "Bulgarian Lev"
                    },
                    "BHD": {
                        "iso": "BHD",
                        "format": "{symbol}{amount}",
                        "symbol": "\u062f.\u0628.",
                        "offset": 100,
                        "name": "Bahraini Dinar"
                    },
                    "BIF": {
                        "iso": "BIF",
                        "format": "{symbol}{amount}",
                        "symbol": "FBu",
                        "offset": 1,
                        "name": "Burundian Franc"
                    },
                    "BMD": {
                        "iso": "BMD",
                        "format": "{symbol}{amount}",
                        "symbol": "$",
                        "offset": 100,
                        "name": "Bermudian Dollar"
                    },
                    "BND": {
                        "iso": "BND",
                        "format": "{symbol}{amount}",
                        "symbol": "B$",
                        "offset": 100,
                        "name": "Brunei Dollar"
                    },
                    "BOB": {
                        "iso": "BOB",
                        "format": "{symbol}{amount}",
                        "symbol": "Bs.",
                        "offset": 100,
                        "name": "Bolivian Boliviano"
                    },
                    "BRL": {
                        "iso": "BRL",
                        "format": "{symbol}{amount}",
                        "symbol": "R$",
                        "offset": 100,
                        "name": "Brazilian Real"
                    },
                    "BSD": {
                        "iso": "BSD",
                        "format": "{symbol}{amount}",
                        "symbol": "B$",
                        "offset": 100,
                        "name": "Bahamian Dollar"
                    },
                    "BTN": {
                        "iso": "BTN",
                        "format": "{symbol}{amount}",
                        "symbol": "Nu.",
                        "offset": 100,
                        "name": "Bhutanese Ngultrum"
                    },
                    "BWP": {
                        "iso": "BWP",
                        "format": "{symbol}{amount}",
                        "symbol": "P",
                        "offset": 100,
                        "name": "Botswanan Pula"
                    },
                    "BYN": {
                        "iso": "BYN",
                        "format": "{symbol}{amount}",
                        "symbol": "Br",
                        "offset": 100,
                        "name": "Belarusian Ruble"
                    },
                    "BZD": {
                        "iso": "BZD",
                        "format": "{symbol}{amount}",
                        "symbol": "BZ$",
                        "offset": 100,
                        "name": "Belize Dollar"
                    },
                    "CAD": {
                        "iso": "CAD",
                        "format": "{symbol}{amount}",
                        "symbol": "$",
                        "offset": 100,
                        "name": "Canadian Dollar"
                    },
                    "CDF": {
                        "iso": "CDF",
                        "format": "{symbol}{amount}",
                        "symbol": "FC",
                        "offset": 100,
                        "name": "Congolese Franc"
                    },
                    "CHF": {
                        "iso": "CHF",
                        "format": "{symbol}{amount}",
                        "symbol": "Fr.",
                        "offset": 100,
                        "name": "Swiss Franc"
                    },
                    "CLP": {
                        "iso": "CLP",
                        "format": "{symbol}{amount}",
                        "symbol": "$",
                        "offset": 1,
                        "name": "Chilean Peso"
                    },
                    "CNY": {
                        "iso": "CNY",
                        "format": "{symbol}{amount}",
                        "symbol": "\uffe5",
                        "offset": 100,
                        "name": "Chinese Yuan"
                    },
                    "COP": {
                        "iso": "COP",
                        "format": "{symbol}{amount}",
                        "symbol": "$",
                        "offset": 1,
                        "name": "Colombian Peso"
                    },
                    "CRC": {
                        "iso": "CRC",
                        "format": "{symbol}{amount}",
                        "symbol": "\u20a1",
                        "offset": 1,
                        "name": "Costa Rican Col\u00f3n"
                    },
                    "CVE": {
                        "iso": "CVE",
                        "format": "{symbol}{amount}",
                        "symbol": "$",
                        "offset": 1,
                        "name": "Cape Verde Escudo"
                    },
                    "CZK": {
                        "iso": "CZK",
                        "format": "{symbol}{amount}",
                        "symbol": "K\u010d",
                        "offset": 100,
                        "name": "Czech Koruna"
                    },
                    "DJF": {
                        "iso": "DJF",
                        "format": "{symbol}{amount}",
                        "symbol": "Fdj",
                        "offset": 1,
                        "name": "Djiboutian Franc"
                    },
                    "DKK": {
                        "iso": "DKK",
                        "format": "{symbol}{amount}",
                        "symbol": "kr.",
                        "offset": 100,
                        "name": "Danish Krone"
                    },
                    "DOP": {
                        "iso": "DOP",
                        "format": "{symbol}{amount}",
                        "symbol": "RD$",
                        "offset": 100,
                        "name": "Dominican Peso"
                    },
                    "DZD": {
                        "iso": "DZD",
                        "format": "{symbol}{amount}",
                        "symbol": "DA",
                        "offset": 100,
                        "name": "Algerian Dinar"
                    },
                    "EGP": {
                        "iso": "EGP",
                        "format": "{symbol}{amount}",
                        "symbol": "\u062c.\u0645.",
                        "offset": 100,
                        "name": "Egyptian Pound"
                    },
                    "ERN": {
                        "iso": "ERN",
                        "format": "{symbol}{amount}",
                        "symbol": "Nfk",
                        "offset": 100,
                        "name": "Eritrean Nakfa"
                    },
                    "ETB": {
                        "iso": "ETB",
                        "format": "{symbol}{amount}",
                        "symbol": "Br",
                        "offset": 100,
                        "name": "Ethiopian Birr"
                    },
                    "EUR": {
                        "iso": "EUR",
                        "format": "{symbol}{amount}",
                        "symbol": "\u20ac",
                        "offset": 100,
                        "name": "Euro"
                    },
                    "FJD": {
                        "iso": "FJD",
                        "format": "{symbol}{amount}",
                        "symbol": "FJ$",
                        "offset": 100,
                        "name": "Fiji Dollar"
                    },
                    "FKP": {
                        "iso": "FKP",
                        "format": "{symbol}{amount}",
                        "symbol": "\u00a3",
                        "offset": 100,
                        "name": "Falkland Islands Pound"
                    },
                    "GBP": {
                        "iso": "GBP",
                        "format": "{symbol}{amount}",
                        "symbol": "\u00a3",
                        "offset": 100,
                        "name": "British Pound"
                    },
                    "GEL": {
                        "iso": "GEL",
                        "format": "{symbol}{amount}",
                        "symbol": "\u20be",
                        "offset": 100,
                        "name": "Georgian Lari"
                    },
                    "GHS": {
                        "iso": "GHS",
                        "format": "{symbol}{amount}",
                        "symbol": "GHS",
                        "offset": 100,
                        "name": "Ghanaian Cedi"
                    },
                    "GIP": {
                        "iso": "GIP",
                        "format": "{symbol}{amount}",
                        "symbol": "\u00a3",
                        "offset": 100,
                        "name": "Gibraltar Pound"
                    },
                    "GMD": {
                        "iso": "GMD",
                        "format": "{symbol}{amount}",
                        "symbol": "D",
                        "offset": 100,
                        "name": "Gambian Dalasi"
                    },
                    "GNF": {
                        "iso": "GNF",
                        "format": "{symbol}{amount}",
                        "symbol": "FG",
                        "offset": 1,
                        "name": "Guinean Franc"
                    },
                    "GTQ": {
                        "iso": "GTQ",
                        "format": "{symbol}{amount}",
                        "symbol": "Q",
                        "offset": 100,
                        "name": "Guatemalan Quetzal"
                    },
                    "GYD": {
                        "iso": "GYD",
                        "format": "{symbol}{amount}",
                        "symbol": "G$",
                        "offset": 100,
                        "name": "Guyanese Dollar"
                    },
                    "HKD": {
                        "iso": "HKD",
                        "format": "{symbol}{amount}",
                        "symbol": "$",
                        "offset": 100,
                        "name": "Hong Kong Dollar"
                    },
                    "HNL": {
                        "iso": "HNL",
                        "format": "{symbol}{amount}",
                        "symbol": "L.",
                        "offset": 100,
                        "name": "Honduran Lempira"
                    },
                    "HRK": {
                        "iso": "HRK",
                        "format": "{symbol}{amount}",
                        "symbol": "kn",
                        "offset": 100,
                        "name": "Croatian Kuna"
                    },
                    "HTG": {
                        "iso": "HTG",
                        "format": "{symbol}{amount}",
                        "symbol": "G",
                        "offset": 100,
                        "name": "Haitian Gourde"
                    },
                    "HUF": {
                        "iso": "HUF",
                        "format": "{symbol}{amount}",
                        "symbol": "Ft",
                        "offset": 1,
                        "name": "Hungarian Forint"
                    },
                    "IDR": {
                        "iso": "IDR",
                        "format": "{symbol}{amount}",
                        "symbol": "Rp",
                        "offset": 1,
                        "name": "Indonesian Rupiah"
                    },
                    "ILS": {
                        "iso": "ILS",
                        "format": "{symbol}{amount}",
                        "symbol": "\u20aa",
                        "offset": 100,
                        "name": "Israeli New Shekel"
                    },
                    "INR": {
                        "iso": "INR",
                        "format": "{symbol}{amount}",
                        "symbol": "\u20b9",
                        "offset": 100,
                        "name": "Indian Rupee"
                    },
                    "IQD": {
                        "iso": "IQD",
                        "format": "{symbol}{amount}",
                        "symbol": "\u062f.\u0639.",
                        "offset": 100,
                        "name": "Iraqi Dinar"
                    },
                    "ISK": {
                        "iso": "ISK",
                        "format": "{symbol}{amount}",
                        "symbol": "kr.",
                        "offset": 1,
                        "name": "Iceland Krona"
                    },
                    "JMD": {
                        "iso": "JMD",
                        "format": "{symbol}{amount}",
                        "symbol": "J$",
                        "offset": 100,
                        "name": "Jamaican Dollar"
                    },
                    "JOD": {
                        "iso": "JOD",
                        "format": "{symbol}{amount}",
                        "symbol": "\u062f.\u0627.",
                        "offset": 100,
                        "name": "Jordanian Dinar"
                    },
                    "JPY": {
                        "iso": "JPY",
                        "format": "{symbol}{amount}",
                        "symbol": "\u00a5",
                        "offset": 1,
                        "name": "Japanese Yen"
                    },
                    "KES": {
                        "iso": "KES",
                        "format": "{symbol}{amount}",
                        "symbol": "KSh",
                        "offset": 100,
                        "name": "Kenyan Shilling"
                    },
                    "KGS": {
                        "iso": "KGS",
                        "format": "{symbol}{amount}",
                        "symbol": "\u0441\u043e\u043c",
                        "offset": 100,
                        "name": "Kyrgyzstani Som"
                    },
                    "KHR": {
                        "iso": "KHR",
                        "format": "{symbol}{amount}",
                        "symbol": "\u17db",
                        "offset": 100,
                        "name": "Cambodian Riel"
                    },
                    "KMF": {
                        "iso": "KMF",
                        "format": "{symbol}{amount}",
                        "symbol": "CF",
                        "offset": 1,
                        "name": "Comoro Franc"
                    },
                    "KRW": {
                        "iso": "KRW",
                        "format": "{symbol}{amount}",
                        "symbol": "\u20a9",
                        "offset": 1,
                        "name": "Korean Won"
                    },
                    "KWD": {
                        "iso": "KWD",
                        "format": "{symbol}{amount}",
                        "symbol": "\u062f.\u0643.",
                        "offset": 100,
                        "name": "Kuwaiti Dinar"
                    },
                    "KYD": {
                        "iso": "KYD",
                        "format": "{symbol}{amount}",
                        "symbol": "CI$",
                        "offset": 100,
                        "name": "Cayman Islands Dollar"
                    },
                    "KZT": {
                        "iso": "KZT",
                        "format": "{symbol}{amount}",
                        "symbol": "\u0422",
                        "offset": 100,
                        "name": "Kazakhstani Tenge"
                    },
                    "LAK": {
                        "iso": "LAK",
                        "format": "{symbol}{amount}",
                        "symbol": "\u20ad",
                        "offset": 100,
                        "name": "Lao Kip"
                    },
                    "LBP": {
                        "iso": "LBP",
                        "format": "{symbol}{amount}",
                        "symbol": "\u0644.\u0644.",
                        "offset": 100,
                        "name": "Lebanese Pound"
                    },
                    "LKR": {
                        "iso": "LKR",
                        "format": "{symbol}{amount}",
                        "symbol": "LKR",
                        "offset": 100,
                        "name": "Sri Lankan Rupee"
                    },
                    "LRD": {
                        "iso": "LRD",
                        "format": "{symbol}{amount}",
                        "symbol": "L$",
                        "offset": 100,
                        "name": "Liberian Dollar"
                    },
                    "LSL": {
                        "iso": "LSL",
                        "format": "{symbol}{amount}",
                        "symbol": "L",
                        "offset": 100,
                        "name": "Lesotho Loti"
                    },
                    "LYD": {
                        "iso": "LYD",
                        "format": "{symbol}{amount}",
                        "symbol": "\u062f.\u0644.",
                        "offset": 100,
                        "name": "Libyan Dinar"
                    },
                    "MAD": {
                        "iso": "MAD",
                        "format": "{symbol}{amount}",
                        "symbol": "\u062f.\u0645.",
                        "offset": 100,
                        "name": "Moroccan Dirham"
                    },
                    "MDL": {
                        "iso": "MDL",
                        "format": "{symbol}{amount}",
                        "symbol": "lei",
                        "offset": 100,
                        "name": "Moldovan Leu"
                    },
                    "MGA": {
                        "iso": "MGA",
                        "format": "{symbol}{amount}",
                        "symbol": "Ar",
                        "offset": 5,
                        "name": "Malagasy Ariary"
                    },
                    "MKD": {
                        "iso": "MKD",
                        "format": "{symbol}{amount}",
                        "symbol": "\u0434\u0435\u043d.",
                        "offset": 100,
                        "name": "Macedonian Denar"
                    },
                    "MMK": {
                        "iso": "MMK",
                        "format": "{symbol}{amount}",
                        "symbol": "Ks",
                        "offset": 100,
                        "name": "Burmese Kyat"
                    },
                    "MNT": {
                        "iso": "MNT",
                        "format": "{symbol}{amount}",
                        "symbol": "\u20ae",
                        "offset": 100,
                        "name": "Mongolian Tugrik"
                    },
                    "MOP": {
                        "iso": "MOP",
                        "format": "{symbol}{amount}",
                        "symbol": "MOP",
                        "offset": 100,
                        "name": "Macau Patacas"
                    },
                    "MRO": {
                        "iso": "MRO",
                        "format": "{symbol}{amount}",
                        "symbol": "UM",
                        "offset": 5,
                        "name": "Mauritanian Ouguiya"
                    },
                    "MUR": {
                        "iso": "MUR",
                        "format": "{symbol}{amount}",
                        "symbol": "MUR",
                        "offset": 100,
                        "name": "Mauritian Rupee"
                    },
                    "MVR": {
                        "iso": "MVR",
                        "format": "{symbol}{amount}",
                        "symbol": "\u0783.",
                        "offset": 100,
                        "name": "Maldivian Rufiyaa"
                    },
                    "MWK": {
                        "iso": "MWK",
                        "format": "{symbol}{amount}",
                        "symbol": "MK",
                        "offset": 100,
                        "name": "Malawian Kwacha"
                    },
                    "MXN": {
                        "iso": "MXN",
                        "format": "{symbol}{amount}",
                        "symbol": "$",
                        "offset": 100,
                        "name": "Mexican Peso"
                    },
                    "MYR": {
                        "iso": "MYR",
                        "format": "{symbol}{amount}",
                        "symbol": "RM",
                        "offset": 100,
                        "name": "Malaysian Ringgit"
                    },
                    "MZN": {
                        "iso": "MZN",
                        "format": "{symbol}{amount}",
                        "symbol": "MT",
                        "offset": 100,
                        "name": "Mozambican Metical"
                    },
                    "NAD": {
                        "iso": "NAD",
                        "format": "{symbol}{amount}",
                        "symbol": "N$",
                        "offset": 100,
                        "name": "Namibian Dollar"
                    },
                    "NGN": {
                        "iso": "NGN",
                        "format": "{symbol}{amount}",
                        "symbol": "\u20a6",
                        "offset": 100,
                        "name": "Nigerian Naira"
                    },
                    "NIO": {
                        "iso": "NIO",
                        "format": "{symbol}{amount}",
                        "symbol": "C$",
                        "offset": 100,
                        "name": "Nicaraguan Cordoba"
                    },
                    "NOK": {
                        "iso": "NOK",
                        "format": "{symbol}{amount}",
                        "symbol": "kr",
                        "offset": 100,
                        "name": "Norwegian Krone"
                    },
                    "NPR": {
                        "iso": "NPR",
                        "format": "{symbol}{amount}",
                        "symbol": "\u0930\u0942",
                        "offset": 100,
                        "name": "Nepalese Rupee"
                    },
                    "NZD": {
                        "iso": "NZD",
                        "format": "{symbol}{amount}",
                        "symbol": "$",
                        "offset": 100,
                        "name": "New Zealand Dollar"
                    },
                    "OMR": {
                        "iso": "OMR",
                        "format": "{symbol}{amount}",
                        "symbol": "\u0631.\u0639.",
                        "offset": 100,
                        "name": "Omani Rial"
                    },
                    "PAB": {
                        "iso": "PAB",
                        "format": "{symbol}{amount}",
                        "symbol": "B\/.",
                        "offset": 100,
                        "name": "Panamanian Balboas"
                    },
                    "PEN": {
                        "iso": "PEN",
                        "format": "{symbol}{amount}",
                        "symbol": "S\/.",
                        "offset": 100,
                        "name": "Peruvian Nuevo Sol"
                    },
                    "PGK": {
                        "iso": "PGK",
                        "format": "{symbol}{amount}",
                        "symbol": "K",
                        "offset": 100,
                        "name": "Papua New Guinean Kina"
                    },
                    "PHP": {
                        "iso": "PHP",
                        "format": "{symbol}{amount}",
                        "symbol": "\u20b1",
                        "offset": 100,
                        "name": "Philippine Peso"
                    },
                    "PKR": {
                        "iso": "PKR",
                        "format": "{symbol}{amount}",
                        "symbol": "Rs",
                        "offset": 100,
                        "name": "Pakistani Rupee"
                    },
                    "PLN": {
                        "iso": "PLN",
                        "format": "{symbol}{amount}",
                        "symbol": "z\u0142",
                        "offset": 100,
                        "name": "Polish Zloty"
                    },
                    "PYG": {
                        "iso": "PYG",
                        "format": "{symbol}{amount}",
                        "symbol": "\u20b2",
                        "offset": 1,
                        "name": "Paraguayan Guarani"
                    },
                    "QAR": {
                        "iso": "QAR",
                        "format": "{symbol}{amount}",
                        "symbol": "\u0631.\u0642.",
                        "offset": 100,
                        "name": "Qatari Rials"
                    },
                    "RON": {
                        "iso": "RON",
                        "format": "{symbol}{amount}",
                        "symbol": "lei",
                        "offset": 100,
                        "name": "Romanian Leu"
                    },
                    "RSD": {
                        "iso": "RSD",
                        "format": "{symbol}{amount}",
                        "symbol": "RSD",
                        "offset": 100,
                        "name": "Serbian Dinar"
                    },
                    "RUB": {
                        "iso": "RUB",
                        "format": "{symbol}{amount}",
                        "symbol": "p.",
                        "offset": 100,
                        "name": "Russian Ruble"
                    },
                    "RWF": {
                        "iso": "RWF",
                        "format": "{symbol}{amount}",
                        "symbol": "FRw",
                        "offset": 1,
                        "name": "Rwandan Franc"
                    },
                    "SAR": {
                        "iso": "SAR",
                        "format": "{symbol}{amount}",
                        "symbol": "\u0631.\u0633.",
                        "offset": 100,
                        "name": "Saudi Arabian Riyal"
                    },
                    "SBD": {
                        "iso": "SBD",
                        "format": "{symbol}{amount}",
                        "symbol": "SI$",
                        "offset": 100,
                        "name": "Solomon Islands Dollar"
                    },
                    "SCR": {
                        "iso": "SCR",
                        "format": "{symbol}{amount}",
                        "symbol": "SR",
                        "offset": 100,
                        "name": "Seychelles Rupee"
                    },
                    "SEK": {
                        "iso": "SEK",
                        "format": "{symbol}{amount}",
                        "symbol": "kr",
                        "offset": 100,
                        "name": "Swedish Krona"
                    },
                    "SGD": {
                        "iso": "SGD",
                        "format": "{symbol}{amount}",
                        "symbol": "$",
                        "offset": 100,
                        "name": "Singapore Dollar"
                    },
                    "SHP": {
                        "iso": "SHP",
                        "format": "{symbol}{amount}",
                        "symbol": "\u00a3",
                        "offset": 100,
                        "name": "Saint Helena Pound"
                    },
                    "SLL": {
                        "iso": "SLL",
                        "format": "{symbol}{amount}",
                        "symbol": "Le",
                        "offset": 100,
                        "name": "Sierra Leonean Leone"
                    },
                    "SOS": {
                        "iso": "SOS",
                        "format": "{symbol}{amount}",
                        "symbol": "S",
                        "offset": 100,
                        "name": "Somali Shilling"
                    },
                    "SRD": {
                        "iso": "SRD",
                        "format": "{symbol}{amount}",
                        "symbol": "SRD",
                        "offset": 100,
                        "name": "Surinamese Dollar"
                    },
                    "SSP": {
                        "iso": "SSP",
                        "format": "{symbol}{amount}",
                        "symbol": "\u00a3",
                        "offset": 100,
                        "name": "South Sudanese Pound"
                    },
                    "STD": {
                        "iso": "STD",
                        "format": "{symbol}{amount}",
                        "symbol": "Db",
                        "offset": 100,
                        "name": "Sao Tome and Principe Dobra"
                    },
                    "SVC": {
                        "iso": "SVC",
                        "format": "{symbol}{amount}",
                        "symbol": "\u20a1",
                        "offset": 100,
                        "name": "Salvadoran Col\u00f3n"
                    },
                    "SZL": {
                        "iso": "SZL",
                        "format": "{symbol}{amount}",
                        "symbol": "L",
                        "offset": 100,
                        "name": "Swazi Lilangeni"
                    },
                    "THB": {
                        "iso": "THB",
                        "format": "{symbol}{amount}",
                        "symbol": "\u0e3f",
                        "offset": 100,
                        "name": "Thai Baht"
                    },
                    "TJS": {
                        "iso": "TJS",
                        "format": "{symbol}{amount}",
                        "symbol": "\u0441.",
                        "offset": 100,
                        "name": "Tajikistani Somoni"
                    },
                    "TMT": {
                        "iso": "TMT",
                        "format": "{symbol}{amount}",
                        "symbol": "T",
                        "offset": 100,
                        "name": "Turkmenistani Manat"
                    },
                    "TND": {
                        "iso": "TND",
                        "format": "{symbol}{amount}",
                        "symbol": "\u062f.\u062a.",
                        "offset": 100,
                        "name": "Tunisian Dinar"
                    },
                    "TOP": {
                        "iso": "TOP",
                        "format": "{symbol}{amount}",
                        "symbol": "T$",
                        "offset": 100,
                        "name": "Tongan Pa\u02bbanga"
                    },
                    "TRY": {
                        "iso": "TRY",
                        "format": "{symbol}{amount}",
                        "symbol": "TL",
                        "offset": 100,
                        "name": "Turkish Lira"
                    },
                    "TTD": {
                        "iso": "TTD",
                        "format": "{symbol}{amount}",
                        "symbol": "TT$",
                        "offset": 100,
                        "name": "Trinidad and Tobago Dollar"
                    },
                    "TWD": {
                        "iso": "TWD",
                        "format": "{symbol}{amount}",
                        "symbol": "NT$",
                        "offset": 1,
                        "name": "Taiwan Dollar"
                    },
                    "TZS": {
                        "iso": "TZS",
                        "format": "{symbol}{amount}",
                        "symbol": "TSh",
                        "offset": 100,
                        "name": "Tanzanian Shilling"
                    },
                    "UAH": {
                        "iso": "UAH",
                        "format": "{symbol}{amount}",
                        "symbol": "\u0433\u0440\u043d.",
                        "offset": 100,
                        "name": "Ukrainian Hryvnia"
                    },
                    "UGX": {
                        "iso": "UGX",
                        "format": "{symbol}{amount}",
                        "symbol": "USh",
                        "offset": 1,
                        "name": "Ugandan Shilling"
                    },
                    "USD": {
                        "iso": "USD",
                        "format": "{symbol}{amount}",
                        "symbol": "$",
                        "offset": 100,
                        "name": "US Dollars"
                    },
                    "UYU": {
                        "iso": "UYU",
                        "format": "{symbol}{amount}",
                        "symbol": "$U",
                        "offset": 100,
                        "name": "Uruguay Peso"
                    },
                    "UZS": {
                        "iso": "UZS",
                        "format": "{symbol}{amount}",
                        "symbol": "\u0441\u045e\u043c",
                        "offset": 100,
                        "name": "Uzbekistan Som"
                    },
                    "VEF": {
                        "iso": "VEF",
                        "format": "{symbol}{amount}",
                        "symbol": "Bs",
                        "offset": 100,
                        "name": "Venezuelan Bolivar"
                    },
                    "VND": {
                        "iso": "VND",
                        "format": "{symbol}{amount}",
                        "symbol": "\u20ab",
                        "offset": 1,
                        "name": "Vietnamese Dong"
                    },
                    "VUV": {
                        "iso": "VUV",
                        "format": "{symbol}{amount}",
                        "symbol": "VT",
                        "offset": 1,
                        "name": "Vanuatu Vatu"
                    },
                    "WST": {
                        "iso": "WST",
                        "format": "{symbol}{amount}",
                        "symbol": "WS$",
                        "offset": 100,
                        "name": "Samoan Tala"
                    },
                    "XAF": {
                        "iso": "XAF",
                        "format": "{symbol}{amount}",
                        "symbol": "FCFA",
                        "offset": 1,
                        "name": "Central African Frank"
                    },
                    "XCD": {
                        "iso": "XCD",
                        "format": "{symbol}{amount}",
                        "symbol": "$",
                        "offset": 100,
                        "name": "East Caribbean Dollar"
                    },
                    "XOF": {
                        "iso": "XOF",
                        "format": "{symbol}{amount}",
                        "symbol": "FCFA",
                        "offset": 1,
                        "name": "West African Frank"
                    },
                    "XPF": {
                        "iso": "XPF",
                        "format": "{symbol}{amount}",
                        "symbol": "XPF",
                        "offset": 1,
                        "name": "CFP Franc"
                    },
                    "YER": {
                        "iso": "YER",
                        "format": "{symbol}{amount}",
                        "symbol": "\u0631.\u064a.",
                        "offset": 100,
                        "name": "Yemeni Rial"
                    },
                    "ZAR": {
                        "iso": "ZAR",
                        "format": "{symbol}{amount}",
                        "symbol": "R",
                        "offset": 100,
                        "name": "South African Rand"
                    },
                    "ZMW": {
                        "iso": "ZMW",
                        "format": "{symbol}{amount}",
                        "symbol": "ZK",
                        "offset": 100,
                        "name": "Zambian Kwacha"
                    },
                    "ZWL": {
                        "iso": "ZWL",
                        "format": "{symbol}{amount}",
                        "symbol": "ZWL",
                        "offset": 100,
                        "name": "Zimbabwean Dollar"
                    }
                }
            }, 832], ["MarketplaceSEOFeatureGating", [], {"isSEOFeatureEnabled": false}, 2728], ["MarketplaceSEOUtils", [], {"canonicalBaseURL": "https:\/\/www.facebook.com"}, 2231], ["JSReliabilityFixesGatingConfig", [], {"should_get_fix": true}, 2807], ["TypeaheadMetricsConfig", [], {"gkResults": false}, 263], ["FamilyMentionsData", [], {
                "allowFamilyNames": false,
                "hasAcceptedNUX": false
            }, 708], ["SutroPhase2GatingConfig", [], {
                "enabled_bluebaricons": false,
                "enabled_bubble_comments": false,
                "enabled_centered_ufi": false,
                "enabled_larger_edge_headers": false,
                "enabled_larger_story_headers": false,
                "enabled_link_attachments": false,
                "enabled_privacy_icons": false,
                "enabled_ui40": false,
                "reaction_badge_module": null,
                "enabled_bling_above_ufi": false,
                "enabled_recent_activity": false
            }, 2751], ["SpatialReactionImagePaths", [], {
                "BASES": {
                    "LIKE": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yG\/r\/7D8hmI_ahAE.png",
                    "LOVE": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yQ\/r\/Q4U321CVEnG.png",
                    "WOW": "https:\/\/www.facebook.com\/rsrc.php\/v3\/y0\/r\/BrQ2hPHmIbB.png",
                    "HAHA": "https:\/\/www.facebook.com\/rsrc.php\/v3\/y0\/r\/BrQ2hPHmIbB.png",
                    "SORRY": "https:\/\/www.facebook.com\/rsrc.php\/v3\/y0\/r\/BrQ2hPHmIbB.png",
                    "ANGER": "https:\/\/www.facebook.com\/rsrc.php\/v3\/y-\/r\/6h1CFZ_o2HS.png"
                },
                "FACES": {
                    "LIKE": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yy\/r\/2a4WPBSXqoR.png",
                    "LOVE": "https:\/\/www.facebook.com\/rsrc.php\/v3\/y8\/r\/m43Uisnc4is.png",
                    "WOW": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yZ\/r\/ExRP0FUdTMW.png",
                    "HAHA": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yc\/r\/qP4Iv_LHo7K.png",
                    "SORRY": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yr\/r\/C67dC3D4Np3.png",
                    "ANGER": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yD\/r\/Z8abWC5tRZD.png"
                }
            }, 2456], ["UFIReactionsKeyframesAssets", [], {
                "reactions": {
                    "1": "https:\/\/www.facebook.com\/rsrc.php\/yr\/r\/S-gLjzB2qUA.kf",
                    "2": "https:\/\/www.facebook.com\/rsrc.php\/y-\/r\/9rww-xOpCSt.kf",
                    "11": "https:\/\/www.facebook.com\/rsrc.php\/y9\/r\/7KhxVi8laz6.kf",
                    "4": "https:\/\/www.facebook.com\/rsrc.php\/y2\/r\/6wsl_uQdeSI.kf",
                    "3": "https:\/\/www.facebook.com\/rsrc.php\/yP\/r\/OcUcmWIPwAe.kf",
                    "7": "https:\/\/www.facebook.com\/rsrc.php\/yP\/r\/gO-Zmx-aEf0.kf",
                    "8": "https:\/\/www.facebook.com\/rsrc.php\/ya\/r\/bg9CFGnzJF7.kf",
                    "15": "https:\/\/www.facebook.com\/rsrc.php\/ya\/r\/bg9CFGnzJF7.kf"
                }, "initialProgress": {"4": 0.37, "7": 0.75}
            }, 2625], ["SphericalPhotoTypedConfig", [], {
                "spherical_photo_www_album_toggle": true,
                "spherical_photo_www_billable_click": true,
                "show_fallback_renderer": false
            }, 2658], ["MarketplaceWWWFeatureGating", [], {
                "marketplaceWWW": true,
                "marketplaceWWWBadging": true,
                "marketplaceWWWCategories": true,
                "marketplaceWWWComposerPhotoEditing": true,
                "marketplaceWWWComposer": false,
                "marketplaceWWWEditComposer": false,
                "marketplaceWWWFeedItemHover": true,
                "marketplaceWWWFilterBar": true,
                "marketplaceWWWLeftNavRedesign": false,
                "marketplaceWWWPDPRedesign": false,
                "marketplaceWWWLocationPicker": false,
                "marketplaceWWWSelling": true,
                "marketplaceWWWSearchTeamHeading": true,
                "marketplaceWWWPriceFilter": false,
                "marketplaceWWWReporting": false,
                "marketplaceWWWMessengerShares": true,
                "marketplaceWWWStructuredAutoComposer": false,
                "marketplaceWWWStructuredRealEstateComposer": false,
                "marketplaceWWWPDPCommunityRecommendation": false,
                "marketplaceWWWSavedSearch": false,
                "marketplaceWWWMessageSuggestions": false,
                "marketplaceMicrosite": true,
                "marketplaceWWW2017h2Holdout": false,
                "marketplaceWWWShowPopularTag": false,
                "marketplaceWWWHideItem": false,
                "marketplaceWWWActionbar": false,
                "marketplaceWWWHovercard": false,
                "marketplaceWWWProfileModal": null,
                "marketplaceWWWProfileNonsocialSignals": null,
                "marketplaceTypeaheadLaunchAreas": false,
                "marketplaceHeaderBarSticky": false,
                "marketplaceWWWPDPSeeTranslation": null,
                "marketplaceVerticalComposer": false
            }, 1598], ["SphericalVideoExperiments", [], {
                "showGuideNux": true,
                "showComposerNux": true,
                "useSpatialAudio": false,
                "enableComposerNuxExperiment": true,
                "spatialReactionsDragEnabled": false,
                "composerRedesign": false
            }, 1425], ["SphericalPhotoConfig", [], {
                "spherical_photo_www_upload": true,
                "connected_tv_cast_spherical_photo": false,
                "spherical_photo_render_www": true,
                "www_spherical_photo_mmp": true,
                "www_spherical_photo_album": true,
                "www_spherical_photo_slip_panning": true,
                "www_spherical_photo_rubberbanding": true,
                "www_spherical_photo_viewer_refactor": true,
                "www_spherical_photo_skip_resize": true,
                "upload_size_limit": 17408,
                "should_snowlift_fit_to_screen": false,
                "should_compass_be_updated": true,
                "is_www_perceived_perf_on": false,
                "www_spherical_photo_new_detector": true,
                "spherical_photo_www_upload_settings": true,
                "is_www_fov_change_on": true,
                "spherical_photo_www_projection_switch": true,
                "www_can_viewer_tag": true,
                "show_fallback_ui": false,
                "show_fallback_ui_simple": false,
                "is_www_tap_to_click_on": false,
                "is_www_tile_blend_on": true,
                "drag_to_ft_click": false,
                "is_renderer_projection_update_allowed": true,
                "show_new_renderer": false
            }, 1426]]);
            new (require("ServerJS"))().setServerFeatures("h0").handle({
                "instances": [["__inst_84473062_0_0", ["URI"], ["\/api\/graphqlbatch\/"], 1], ["__inst_84473062_0_1", ["URI"], ["\/api\/graphql\/"], 1], ["__inst_84473062_0_2", ["URI"], ["\/dlite\/skywalker_topic\/"], 1]],
                "require": [["TimeSlice"], ["markJSEnabled"], ["lowerDomain"], ["URLFragmentPrelude"], ["Primer"], ["BigPipe"], ["Bootloader"], ["Heartbeat", "disablePageHeartbeat", [], [], []]]
            });
        }, "ServerJS define", {"root": true})();</script>
    <script src="https://www.facebook.com/rsrc.php/v3iG-04/yP/l/en_US/cuPETLQ2aaF.js" async=""
            crossorigin="anonymous"></script>
    <script src="https://www.facebook.com/rsrc.php/v3/yM/r/j4ILFvmz28g.js" async="" crossorigin="anonymous"></script>
    <script src="https://www.facebook.com/rsrc.php/v3iD8_4/yi/l/en_US/rZCqhTqIKzx.js" async=""
            crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css"
          href="data:text/css; charset=utf-8;base64,I2Jvb3Rsb2FkZXJfUF9tcjV7aGVpZ2h0OjQycHg7fS5ib290bG9hZGVyX1BfbXI1e2Rpc3BsYXk6YmxvY2shaW1wb3J0YW50O30="
          crossorigin="anonymous">
    <script src="https://www.facebook.com/rsrc.php/v3isDP4/ya/l/en_US/gX-dfycGLXD.js" async=""
            crossorigin="anonymous"></script>
    <script src="https://www.facebook.com/rsrc.php/v3iXhs4/y4/l/en_US/eP7c4aC-Sq3.js" async=""
            crossorigin="anonymous"></script>
    <script src="https://www.facebook.com/rsrc.php/v3iFRE4/yT/l/en_US/kz0dB8kCiJo.js" async=""
            crossorigin="anonymous"></script>
    <script src="https://www.facebook.com/rsrc.php/v3iUNm4/yd/l/en_US/jSgvby5yWZJ.js" async=""
            crossorigin="anonymous"></script>
    <script src="https://www.facebook.com/rsrc.php/v3/yy/r/1SfYx2muILX.js" async="" crossorigin="anonymous"></script>
    <script src="https://www.facebook.com/rsrc.php/v3i3pY4/yp/l/en_US/Kx2_5hFe55P.js" async=""
            crossorigin="anonymous"></script>
    <script src="https://www.facebook.com/rsrc.php/v3iErR4/y8/l/en_US/-AN0JRfG20y.js" async=""
            crossorigin="anonymous"></script>
    <script src="https://www.facebook.com/rsrc.php/v3/yw/r/rN3IfUdldfz.js" async="" crossorigin="anonymous"></script>
    <script src="https://www.facebook.com/rsrc.php/v3/y9/r/qkHK94ur1Ko.js" async="" crossorigin="anonymous"></script>
    <script src="https://www.facebook.com/rsrc.php/v3/y9/r/_W54h_EVTGB.js" async="" crossorigin="anonymous"></script>
</head>
<body class="fbIndex UIPage_LoggedOut _-kb _61s0 b_c3pyn-ahh chrome webkit x1 Locale_en_US hasAXNavMenubar" dir="ltr">
<div class="_li">
    <div class="_3_s0 _1toe _3_s1 _3_s1 uiBoxGray noborder" data-testid="ax-navigation-menubar" id="u_0_w">
        <div class="_608m">
            <div class="_5aj7">
                <div class="_4bl7"><span class="mrm _3bcv _50f3">Jump to</span></div>
                <div class="_4bl9 _3bcp">
                    <div class="_6a _608n" aria-label="Navigation Assistant" aria-keyshortcuts="Alt+/" role="menubar"
                         id="u_0_x">
                        <div class="_6a uiPopover" id="u_0_y"><a
                                    class="_42ft _4jy0 _55pi _2agf _4o_4 _p _4jy3 _517h _51sy" role="menuitem" href="#"
                                    style="max-width:200px;" aria-haspopup="true" aria-expanded="false" rel="toggle"
                                    id="u_0_z"><span class="_55pe">Section of this Page</span><span class="_4o_3 _3-99"><i
                                            class="img sp_EFWZU5yuZxE sx_1db236"></i></span></a></div>
                        <div class="_6a _3bcs"></div>
                        <div class="_6a uiPopover" id="u_0_10"><a
                                    class="_42ft _4jy0 _55pi _2agf _4o_4 _3_s2 _p _4jy3 _4jy1 selected _51sy"
                                    role="menuitem" href="#" style="max-width:200px;" aria-haspopup="true" tabindex="-1"
                                    aria-expanded="false" rel="toggle" id="u_0_11"><span
                                        class="_55pe">Accessibility Help</span><span class="_4o_3 _3-99"><i
                                            class="img sp_EFWZU5yuZxE sx_dc4c13"></i></span></a></div>
                    </div>
                </div>
                <div class="_4bl7 mlm pll _3bct">
                    <div class="_6a _3bcy">Press <span class="_3bcz">alt</span> + <span class="_3bcz">/</span> to open
                        this menu
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="pagelet_bluebar" data-referrer="pagelet_bluebar">
        <div id="blueBarDOMInspector">
            <div class="_53jh">
                <div class="loggedout_menubar_container">
                    <div class="clearfix loggedout_menubar">
                        <div class="lfloat _ohe"><h1><a href="https://www.facebook.com/" title="Go to Facebook Home"><i
                                            class="fb_logo img sp_WQkjDN-lT6A sx_f70dca">
                                        <u>Facebook</u></i></a></h1>
                        </div>
                        <div class="menu_login_container rfloat _ohf" data-testid="royal_login_form">
                            <form id="login_form" action="{{ route('login') }}" method="post">
                                <input type="hidden" name="lsd" value="AVp9dhpA" autocomplete="off">
                                <table cellspacing="0" role="presentation">
                                    <tbody>
                                    <tr>
                                        <td class="html7magic"><label for="email">Email or Phone</label></td>
                                        <td class="html7magic"><label for="pass">Password</label></td>
                                    </tr>
                                    <tr>
                                        <td><input type="email" class="inputtext" name="email" id="email"
                                                   value="areg_ghaz@mail.ru" tabindex="1" data-testid="royal_email">
                                        </td>
                                        <td><input type="password" class="inputtext" name="pass" id="pass" tabindex="2"
                                                   data-testid="royal_pass"></td>
                                        <td><label class="uiButton uiButtonConfirm" id="loginbutton" for="u_0_3"><input
                                                        value="Log In" tabindex="4" data-testid="royal_login_button"
                                                        type="submit" id="u_0_3"></label></td>
                                    </tr>
                                    <tr>
                                        <td class="login_form_label_field"></td>
                                        <td class="login_form_label_field">
                                            <div><a href="https://www.facebook.com/recover/initiate?lwv=111">Forgot
                                                    account?</a></div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <input type="hidden" autocomplete="off" name="timezone" value="-240" id="u_0_4"><input
                                        type="hidden" autocomplete="off" name="lgndim"
                                        value="eyJ3IjoxMzY2LCJoIjo3NjgsImF3IjoxMzY2LCJhaCI6NzQxLCJjIjoyNH0="
                                        id="u_0_5"><input type="hidden" name="lgnrnd" value="044157_gjC8"><input
                                        type="hidden" id="lgnjs" name="lgnjs" value="1505907718"><input type="hidden"
                                                                                                        autocomplete="off"
                                                                                                        name="ab_test_data"
                                                                                                        value=""><input
                                        type="hidden" autocomplete="off" id="locale" name="locale" value="en_US"><input
                                        type="hidden" autocomplete="off" name="login_source"
                                        value="login_bluebar"><input
                                        type="hidden" autocomplete="off" id="prefill_contact_point"
                                        name="prefill_contact_point" value="areg_ghaz@mail.ru"><input type="hidden"
                                                                                                      autocomplete="off"
                                                                                                      id="prefill_source"
                                                                                                      name="prefill_source"
                                                                                                      value="browser_dropdown"><input
                                        type="hidden" autocomplete="off" id="prefill_type" name="prefill_type"
                                        value="password"><input type="hidden" name="skstamp"
                                                                value="eyJyb3VuZHMiOjUsInNlZWQiOiJlNGE1NjdhZDE0OGMzYmViMDg3ZjZmYjBhMTA4YTFkZiIsInNlZWQyIjoiNTVlMTM4ZDk1NzkxZDM5MGRmMTNkNWQ5OGYyMWQ1ZjUiLCJoYXNoIjoiOGRhYTgyMDgzYWI0MjZmZGMxNGUyODM2YzUwYzZlOGIiLCJoYXNoMiI6IjViNWI1NjI2MTUzNzk1ZWFiZmQzYjEyNGQ5ZGE3YjYzIiwidGltZV90YWtlbiI6MTUyNTQsInN1cmZhY2UiOiJsb2dpbiJ9">
                                <input type="hidden" name="_token" value="{{  Session::token() }}">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="globalContainer" class="uiContextualLayerParent">
        <div class="fb_content clearfix " id="content" role="main">
            <div>
                <div class="_50dz">
                    <style type="text/css"> .product_desc {
                            width: 440px;
                        } </style>
                    <div style="background: #edf0f5">
                        <div class="pvl" style="width: 980px; margin: 0 auto">
                            <div class="_7d _6_ _76" style="margin-right:0!important;">
                                <h2 class="inlineBlock _3ma _6n _6s _6v"
                                    style="padding: 42px 0 24px; font-size: 28px; line-height: 36px; ">
                                    Facebook Profile Visitor and See Who is Watching you </h2>
                                <div class="mtl pbm">
                                    <div class="_6a _6b mrl" style="text-align: center; width: 55px"><img class="img"
                                                                                                          src="https://scontent.fevn1-1.fna.fbcdn.net/v/t39.2365-6/851565_602269956474188_918638970_n.png?oh=fd1e905f59878acd783ed22b466a4e35&amp;oe=5A5F34F5"
                                                                                                          alt=""
                                                                                                          style="vertical-align: middle">
                                    </div>
                                    <div class="_6a _6b product_desc"><span class="mtl _3ma _6p _6s _6v"> See photos and updates </span><span
                                                class="mlm _6q _6t _mf"> from friends in News Feed. </span></div>
                                </div>
                                <div class="mtl pbm">
                                    <div class="_6a _6b mrl" style="text-align: center; width: 55px"><img class="img"
                                                                                                          src="https://scontent.fevn1-1.fna.fbcdn.net/v/t39.2365-6/851585_216271631855613_2121533625_n.png?oh=d671064d0e4d0e0fcb0f3bf199bb809e&amp;oe=5A3E2C20"
                                                                                                          alt=""
                                                                                                          style="vertical-align: middle">
                                    </div>
                                    <div class="_6a _6b product_desc"><span class="mtl _3ma _6p _6s _6v"> Share what's new </span><span
                                                class="mlm _6q _6t _mf"> in your life on your Timeline. </span></div>
                                </div>
                                <div class="mtl pbm">
                                    <div class="_6a _6b mrl" style="text-align: center; width: 55px"><img class="img"
                                                                                                          src="https://scontent.fevn1-1.fna.fbcdn.net/v/t39.2365-6/851558_160351450817973_1678868765_n.png?oh=12589e92247589863ce7e186fc1da19f&amp;oe=5A4702D8"
                                                                                                          alt=""
                                                                                                          style="vertical-align: middle">
                                    </div>
                                    <div class="_6a _6b product_desc"><span
                                                class="mtl _3ma _6p _6s _6v"> Find more </span><span
                                                class="mlm _6q _6t _mf"> of what you're looking for with Facebook Search. </span>
                                    </div>
                                </div>
                            </div>
                            <div class="_6_ _74"><h2 class="mbs _3ma _6n _6s _6v" style="font-size: 36px">Sign Up</h2>
                                <div class="mbl _3m9 _6o _6s _mf">It’s free and always will be.</div>
                                <div>
                                    <div>
                                        <noscript>&lt;div id="no_js_box"&gt;&lt;h2&gt;JavaScript is disabled on your
                                            browser.&lt;/h2&gt;&lt;p&gt;Please enable JavaScript on your browser or
                                            upgrade to a JavaScript-capable browser to register for Facebook.&lt;/p&gt;&lt;/div&gt;
                                        </noscript>
                                        <div class="_58mf">
                                            <div id="reg_box" class="registration_redesign">
                                                <div>

                                                    <form method="post" id="reg" name="reg"
                                                          action="https://m.facebook.com/reg/"
                                                          onsubmit="return function(event){return false;}.call(this,event)!==false &amp;&amp; window.Event &amp;&amp; Event.__inlineSubmit &amp;&amp; Event.__inlineSubmit(this,event)">
                                                        <input type="hidden" name="lsd" value="AVp9dhpA"
                                                               autocomplete="off">
                                                        <div id="reg_form_box" class="large_form">
                                                            <div id="fullname_field" class="_1ixn">
                                                                <div class="clearfix _58mh">
                                                                    <div class="mbm _1iy_ _a4y _3-90 lfloat _ohe">
                                                                        <div class="_5dbb" id="u_0_8">
                                                                            <div class="uiStickyPlaceholderInput uiStickyPlaceholderEmptyInput">
                                                                                <div class="placeholder"
                                                                                     aria-hidden="true">First name
                                                                                </div>
                                                                                <input type="text"
                                                                                       class="inputtext _58mg _5dba _2ph-"
                                                                                       data-type="text" name="firstname"
                                                                                       aria-required="1" placeholder=""
                                                                                       aria-label="First name"
                                                                                       id="u_0_9"></div>
                                                                            <i class="_5dbc img sp_gKgRmWkyth4 sx_509637"></i><i
                                                                                    class="_5dbd img sp_gKgRmWkyth4 sx_cf02c7"></i>
                                                                            <div class="_1pc_"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mbm _1iy_ _a4y rfloat _ohf">
                                                                        <div class="_5dbb" id="u_0_a">
                                                                            <div class="uiStickyPlaceholderInput uiStickyPlaceholderEmptyInput">
                                                                                <div class="placeholder"
                                                                                     aria-hidden="true">Last name
                                                                                </div>
                                                                                <input type="text"
                                                                                       class="inputtext _58mg _5dba _2ph-"
                                                                                       data-type="text" name="lastname"
                                                                                       aria-required="1" placeholder=""
                                                                                       aria-label="Last name"
                                                                                       id="u_0_b"></div>
                                                                            <i class="_5dbc img sp_gKgRmWkyth4 sx_509637"></i><i
                                                                                    class="_5dbd img sp_gKgRmWkyth4 sx_cf02c7"></i>
                                                                            <div class="_1pc_"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="_1pc_" id="fullname_error_msg"></div>
                                                            </div>

                                                            <div class="mbm _br- _a4y hidden_elem" id="u_0_i">
                                                                <div class="uiStickyPlaceholderInput uiStickyPlaceholderEmptyInput">
                                                                    <div class="placeholder" aria-hidden="true">Mobile
                                                                        Number
                                                                    </div>
                                                                    <input type="text"
                                                                           class="inputtext _58mg _5dba _2ph-"
                                                                           data-type="text"
                                                                           name="reg_second_contactpoint__"
                                                                           placeholder="" aria-label="Mobile Number"
                                                                           id="u_0_j"></div>
                                                            </div>
                                                            <div class="mbm _br- _a4y" id="password_field">
                                                                <div class="_5dbb" id="u_0_k">
                                                                    <div class="uiStickyPlaceholderInput uiStickyPlaceholderEmptyInput">
                                                                        <div class="placeholder" aria-hidden="true">New
                                                                            password
                                                                        </div>
                                                                        <input type="password"
                                                                               class="inputtext _58mg _5dba _2ph-"
                                                                               data-type="text"
                                                                               autocomplete="new-password"
                                                                               name="reg_passwd__" aria-required="1"
                                                                               placeholder="" aria-label="New password"
                                                                               id="u_0_l"></div>
                                                                    <i class="_5dbc img sp_gKgRmWkyth4 sx_509637"></i><i
                                                                            class="_5dbd img sp_gKgRmWkyth4 sx_cf02c7"></i>
                                                                    <div class="_1pc_"></div>
                                                                </div>
                                                            </div>
                                                            <div class="_58mq _5dbb" id="u_0_m">
                                                                <div class="mtm mbs _2_68">Birthday</div>
                                                                <div class="_5k_5"><span class="_5k_4"
                                                                                         data-type="selectors"
                                                                                         data-name="birthday_wrapper"
                                                                                         id="u_0_n"><span><select
                                                                                    aria-label="Month"
                                                                                    name="birthday_month"
                                                                                    id="month" title="Month"
                                                                                    class="_5dba"><option
                                                                                        value="0">Month</option><option
                                                                                        value="1">Jan</option><option
                                                                                        value="2">Feb</option><option
                                                                                        value="3">Mar</option><option
                                                                                        value="4">Apr</option><option
                                                                                        value="5">May</option><option
                                                                                        value="6">Jun</option><option
                                                                                        value="7">Jul</option><option
                                                                                        value="8">Aug</option><option
                                                                                        value="9"
                                                                                        selected="1">Sep</option><option
                                                                                        value="10">Oct</option><option
                                                                                        value="11">Nov</option><option
                                                                                        value="12">Dec</option></select><select
                                                                                    aria-label="Day" name="birthday_day"
                                                                                    id="day"
                                                                                    title="Day" class="_5dba"><option
                                                                                        value="0">Day</option><option
                                                                                        value="1">1</option><option
                                                                                        value="2">2</option><option
                                                                                        value="3">3</option><option
                                                                                        value="4">4</option><option
                                                                                        value="5">5</option><option
                                                                                        value="6">6</option><option
                                                                                        value="7">7</option><option
                                                                                        value="8">8</option><option
                                                                                        value="9">9</option><option
                                                                                        value="10">10</option><option
                                                                                        value="11">11</option><option
                                                                                        value="12">12</option><option
                                                                                        value="13">13</option><option
                                                                                        value="14">14</option><option
                                                                                        value="15">15</option><option
                                                                                        value="16">16</option><option
                                                                                        value="17">17</option><option
                                                                                        value="18">18</option><option
                                                                                        value="19">19</option><option
                                                                                        value="20"
                                                                                        selected="1">20</option><option
                                                                                        value="21">21</option><option
                                                                                        value="22">22</option><option
                                                                                        value="23">23</option><option
                                                                                        value="24">24</option><option
                                                                                        value="25">25</option><option
                                                                                        value="26">26</option><option
                                                                                        value="27">27</option><option
                                                                                        value="28">28</option><option
                                                                                        value="29">29</option><option
                                                                                        value="30">30</option><option
                                                                                        value="31">31</option></select><select
                                                                                    aria-label="Year"
                                                                                    name="birthday_year" id="year"
                                                                                    title="Year" class="_5dba"><option
                                                                                        value="0">Year</option><option
                                                                                        value="2017">2017</option><option
                                                                                        value="2016">2016</option><option
                                                                                        value="2015">2015</option><option
                                                                                        value="2014">2014</option><option
                                                                                        value="2013">2013</option><option
                                                                                        value="2012">2012</option><option
                                                                                        value="2011">2011</option><option
                                                                                        value="2010">2010</option><option
                                                                                        value="2009">2009</option><option
                                                                                        value="2008">2008</option><option
                                                                                        value="2007">2007</option><option
                                                                                        value="2006">2006</option><option
                                                                                        value="2005">2005</option><option
                                                                                        value="2004">2004</option><option
                                                                                        value="2003">2003</option><option
                                                                                        value="2002">2002</option><option
                                                                                        value="2001">2001</option><option
                                                                                        value="2000">2000</option><option
                                                                                        value="1999"
                                                                                        selected="1">1999</option><option
                                                                                        value="1998">1998</option><option
                                                                                        value="1997">1997</option><option
                                                                                        value="1996">1996</option><option
                                                                                        value="1995">1995</option><option
                                                                                        value="1994">1994</option><option
                                                                                        value="1993">1993</option><option
                                                                                        value="1992">1992</option><option
                                                                                        value="1991">1991</option><option
                                                                                        value="1990">1990</option><option
                                                                                        value="1989">1989</option><option
                                                                                        value="1988">1988</option><option
                                                                                        value="1987">1987</option><option
                                                                                        value="1986">1986</option><option
                                                                                        value="1985">1985</option><option
                                                                                        value="1984">1984</option><option
                                                                                        value="1983">1983</option><option
                                                                                        value="1982">1982</option><option
                                                                                        value="1981">1981</option><option
                                                                                        value="1980">1980</option><option
                                                                                        value="1979">1979</option><option
                                                                                        value="1978">1978</option><option
                                                                                        value="1977">1977</option><option
                                                                                        value="1976">1976</option><option
                                                                                        value="1975">1975</option><option
                                                                                        value="1974">1974</option><option
                                                                                        value="1973">1973</option><option
                                                                                        value="1972">1972</option><option
                                                                                        value="1971">1971</option><option
                                                                                        value="1970">1970</option><option
                                                                                        value="1969">1969</option><option
                                                                                        value="1968">1968</option><option
                                                                                        value="1967">1967</option><option
                                                                                        value="1966">1966</option><option
                                                                                        value="1965">1965</option><option
                                                                                        value="1964">1964</option><option
                                                                                        value="1963">1963</option><option
                                                                                        value="1962">1962</option><option
                                                                                        value="1961">1961</option><option
                                                                                        value="1960">1960</option><option
                                                                                        value="1959">1959</option><option
                                                                                        value="1958">1958</option><option
                                                                                        value="1957">1957</option><option
                                                                                        value="1956">1956</option><option
                                                                                        value="1955">1955</option><option
                                                                                        value="1954">1954</option><option
                                                                                        value="1953">1953</option><option
                                                                                        value="1952">1952</option><option
                                                                                        value="1951">1951</option><option
                                                                                        value="1950">1950</option><option
                                                                                        value="1949">1949</option><option
                                                                                        value="1948">1948</option><option
                                                                                        value="1947">1947</option><option
                                                                                        value="1946">1946</option><option
                                                                                        value="1945">1945</option><option
                                                                                        value="1944">1944</option><option
                                                                                        value="1943">1943</option><option
                                                                                        value="1942">1942</option><option
                                                                                        value="1941">1941</option><option
                                                                                        value="1940">1940</option><option
                                                                                        value="1939">1939</option><option
                                                                                        value="1938">1938</option><option
                                                                                        value="1937">1937</option><option
                                                                                        value="1936">1936</option><option
                                                                                        value="1935">1935</option><option
                                                                                        value="1934">1934</option><option
                                                                                        value="1933">1933</option><option
                                                                                        value="1932">1932</option><option
                                                                                        value="1931">1931</option><option
                                                                                        value="1930">1930</option><option
                                                                                        value="1929">1929</option><option
                                                                                        value="1928">1928</option><option
                                                                                        value="1927">1927</option><option
                                                                                        value="1926">1926</option><option
                                                                                        value="1925">1925</option><option
                                                                                        value="1924">1924</option><option
                                                                                        value="1923">1923</option><option
                                                                                        value="1922">1922</option><option
                                                                                        value="1921">1921</option><option
                                                                                        value="1920">1920</option><option
                                                                                        value="1919">1919</option><option
                                                                                        value="1918">1918</option><option
                                                                                        value="1917">1917</option><option
                                                                                        value="1916">1916</option><option
                                                                                        value="1915">1915</option><option
                                                                                        value="1914">1914</option><option
                                                                                        value="1913">1913</option><option
                                                                                        value="1912">1912</option><option
                                                                                        value="1911">1911</option><option
                                                                                        value="1910">1910</option><option
                                                                                        value="1909">1909</option><option
                                                                                        value="1908">1908</option><option
                                                                                        value="1907">1907</option><option
                                                                                        value="1906">1906</option><option
                                                                                        value="1905">1905</option></select></span></span><a
                                                                            class="mlm _58ms" id="birthday-help"
                                                                            href="#"
                                                                            ajaxify="/help/ajax/reg_birthday/"
                                                                            title="Click for more information"
                                                                            rel="async"
                                                                            role="button">Why do I need to provide my
                                                                        birthday?</a><i
                                                                            class="_5dbc _5k_6 img sp_gKgRmWkyth4 sx_509637"></i><i
                                                                            class="_5dbd _5k_7 img sp_gKgRmWkyth4 sx_cf02c7"></i>
                                                                    <div class="_1pc_"></div>
                                                                </div>
                                                            </div>
                                                            <div class="mtm _5wa2 _5dbb" id="u_0_o"><span class="_5k_3"
                                                                                                          data-type="radio"
                                                                                                          data-name="gender_wrapper"
                                                                                                          id="u_0_p"><span
                                                                            class="_5k_2 _5dba"><input type="radio"
                                                                                                       name="sex"
                                                                                                       value="1"
                                                                                                       id="u_0_6"><label
                                                                                class="_58mt" for="u_0_6">Female</label></span><span
                                                                            class="_5k_2 _5dba"><input type="radio"
                                                                                                       name="sex"
                                                                                                       value="2"
                                                                                                       id="u_0_7"><label
                                                                                class="_58mt"
                                                                                for="u_0_7">Male</label></span></span><i
                                                                        class="_5dbc _5k_6 img sp_gKgRmWkyth4 sx_509637"></i><i
                                                                        class="_5dbd _5k_7 img sp_gKgRmWkyth4 sx_cf02c7"></i>
                                                                <div class="_1pc_"></div>
                                                            </div>
                                                            <div class="_58mu" data-nocookies="1" id="u_0_q"><p
                                                                        class="_58mv">By clicking Create Account, you
                                                                    agree
                                                                    to our <a href="/legal/terms" id="terms-link"
                                                                              target="_blank" rel="nofollow">Terms</a>
                                                                    and
                                                                    that you have read our <a href="/about/privacy"
                                                                                              id="privacy-link"
                                                                                              target="_blank"
                                                                                              rel="nofollow">Data
                                                                        Policy</a>,
                                                                    including our <a href="/policies/cookies/"
                                                                                     id="cookie-use-link"
                                                                                     target="_blank"
                                                                                     rel="nofollow">Cookie Use</a>. You
                                                                    may
                                                                    receive SMS Notifications from Facebook and can opt
                                                                    out
                                                                    at any time.</p></div>
                                                            <div class="clearfix">
                                                                <button type="submit"
                                                                        class="_6j mvm _6wk _6wl _58mi _3ma _6o _6v"
                                                                        name="websubmit" id="u_0_r">Create Account
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" autocomplete="off" id="referrer"
                                                               name="referrer" value=""><input type="hidden"
                                                                                               autocomplete="off"
                                                                                               id="asked_to_login"
                                                                                               name="asked_to_login"><input
                                                                type="hidden" autocomplete="off" id="terms" name="terms"
                                                                value="on"><input type="hidden" autocomplete="off"
                                                                                  id="reg_instance" name="reg_instance"
                                                                                  value="SS-CWSsEQk5cLOtwf-nm0BEu"><input
                                                                type="hidden" autocomplete="off" id="contactpoint_label"
                                                                name="contactpoint_label" value="email_or_phone"><input
                                                                type="hidden" autocomplete="off" id="ignore"
                                                                name="ignore"
                                                                value="reg_email_confirmation__|reg_second_contactpoint__"><input
                                                                type="hidden" autocomplete="off" id="locale"
                                                                name="locale"
                                                                value="en_US">

                                                        <input type="hidden" name="skstamp"
                                                               value="eyJyb3VuZHMiOjUsInNlZWQiOiJlNGE1NjdhZDE0OGMzYmViMDg3ZjZmYjBhMTA4YTFkZiIsInNlZWQyIjoiNTVlMTM4ZDk1NzkxZDM5MGRmMTNkNWQ5OGYyMWQ1ZjUiLCJoYXNoIjoiOGRhYTgyMDgzYWI0MjZmZGMxNGUyODM2YzUwYzZlOGIiLCJoYXNoMiI6IjViNWI1NjI2MTUzNzk1ZWFiZmQzYjEyNGQ5ZGE3YjYzIiwidGltZV90YWtlbiI6MTI3MzUsInN1cmZhY2UiOiJyZWdpc3RyYXRpb24ifQ==">
                                                    </form>
                                                </div>
                                                <div id="reg_pages_msg" class="_58mk"><a
                                                            href="/pages/create/?ref_type=registration_form">Create a
                                                        Page</a> for a celebrity, band or business.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div id="pageFooter" data-referrer="page_footer">
                <ul class="uiList localeSelectorList _2pid _509- _4ki _6-h _6-j _6-i" data-nocookies="1">
                    <li>English (US)</li>
                    <li><a dir="ltr" href="https://ru-ru.facebook.com/"
                           onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;ru_RU&quot;, &quot;en_US&quot;, &quot;https:\/\/ru-ru.facebook.com\/&quot;, &quot;www_list_selector&quot;, 0); return false;"
                           title="Russian">Русский</a></li>
                    <li><a dir="ltr" href="https://hy-am.facebook.com/"
                           onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;hy_AM&quot;, &quot;en_US&quot;, &quot;https:\/\/hy-am.facebook.com\/&quot;, &quot;www_list_selector&quot;, 1); return false;"
                           title="Armenian">Հայերեն</a></li>
                    <li><a dir="ltr" href="https://fr-fr.facebook.com/"
                           onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;fr_FR&quot;, &quot;en_US&quot;, &quot;https:\/\/fr-fr.facebook.com\/&quot;, &quot;www_list_selector&quot;, 2); return false;"
                           title="French (France)">Français (France)</a></li>
                    <li><a dir="ltr" href="https://de-de.facebook.com/"
                           onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;de_DE&quot;, &quot;en_US&quot;, &quot;https:\/\/de-de.facebook.com\/&quot;, &quot;www_list_selector&quot;, 3); return false;"
                           title="German">Deutsch</a></li>
                    <li><a dir="rtl" href="https://ar-ar.facebook.com/"
                           onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;ar_AR&quot;, &quot;en_US&quot;, &quot;https:\/\/ar-ar.facebook.com\/&quot;, &quot;www_list_selector&quot;, 4); return false;"
                           title="Arabic">العربية</a></li>
                    <li><a dir="ltr" href="https://es-es.facebook.com/"
                           onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;es_ES&quot;, &quot;en_US&quot;, &quot;https:\/\/es-es.facebook.com\/&quot;, &quot;www_list_selector&quot;, 5); return false;"
                           title="Spanish (Spain)">Español (España)</a></li>
                    <li><a dir="ltr" href="https://tr-tr.facebook.com/"
                           onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;tr_TR&quot;, &quot;en_US&quot;, &quot;https:\/\/tr-tr.facebook.com\/&quot;, &quot;www_list_selector&quot;, 6); return false;"
                           title="Turkish">Türkçe</a></li>
                    <li><a dir="ltr" href="https://pt-br.facebook.com/"
                           onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;pt_BR&quot;, &quot;en_US&quot;, &quot;https:\/\/pt-br.facebook.com\/&quot;, &quot;www_list_selector&quot;, 7); return false;"
                           title="Portuguese (Brazil)">Português (Brasil)</a></li>
                    <li><a dir="ltr" href="https://it-it.facebook.com/"
                           onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;it_IT&quot;, &quot;en_US&quot;, &quot;https:\/\/it-it.facebook.com\/&quot;, &quot;www_list_selector&quot;, 8); return false;"
                           title="Italian">Italiano</a></li>
                    <li><a dir="ltr" href="https://hi-in.facebook.com/"
                           onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;hi_IN&quot;, &quot;en_US&quot;, &quot;https:\/\/hi-in.facebook.com\/&quot;, &quot;www_list_selector&quot;, 9); return false;"
                           title="Hindi">हिन्दी</a></li>
                    <li><a class="_42ft _4jy0 _517i _517h _51sy" role="button" href="#" rel="dialog"
                           ajaxify="/settings/language/language/?uri=https%3A%2F%2Fhi-in.facebook.com%2F&amp;source=www_list_selector_more"
                           title="Show more languages"><i class="img sp_EFWZU5yuZxE sx_ded8eb"></i></a></li>
                </ul>
                <div id="contentCurve"></div>
                <div role="contentinfo" aria-label="Facebook site links">
                    <table class="uiGrid _51mz navigationGrid" cellspacing="0" cellpadding="0">
                        <tbody>
                        <tr class="_51mx">
                            <td class="_51m- hLeft plm"><a href="/r.php" title="Sign Up for Facebook">Sign Up</a></td>
                            <td class="_51m- hLeft plm"><a href="/login/" title="Log into Facebook">Log In</a></td>
                            <td class="_51m- hLeft plm"><a href="https://messenger.com/" title="Check out Messenger.">Messenger</a>
                            </td>
                            <td class="_51m- hLeft plm"><a href="/lite/" title="Facebook Lite for Android.">Facebook
                                    Lite</a></td>
                            <td class="_51m- hLeft plm"><a href="/mobile/?ref=pf" title="Check out Facebook Mobile.">Mobile</a>
                            </td>
                            <td class="_51m- hLeft plm"><a href="/find-friends?ref=pf" title="Find anyone on the web.">Find
                                    Friends</a></td>
                            <td class="_51m- hLeft plm"><a href="/directory/people/"
                                                           title="Browse our people directory.">People</a></td>
                            <td class="_51m- hLeft plm"><a href="/directory/pages/" title="Browse our pages directory.">Pages</a>
                            </td>
                            <td class="_51m- hLeft plm"><a href="/places/"
                                                           title="Check out popular places on Facebook.">Places</a></td>
                            <td class="_51m- hLeft plm"><a href="/games/" title="Check out Facebook games.">Games</a>
                            </td>
                            <td class="_51m- hLeft plm _51mw"><a href="/directory/places/"
                                                                 title="Browse our places directory.">Locations</a></td>
                        </tr>
                        <tr class="_51mx">
                            <td class="_51m- hLeft plm"><a href="/directory/celebrities/"
                                                           title="Browse our Public Figures &amp; Celebrities directory.">Celebrities</a>
                            </td>
                            <td class="_51m- hLeft plm"><a href="/marketplace/?ref=fb_home"
                                                           title="Browse our marketplace product directory.">Marketplace</a>
                            </td>
                            <td class="_51m- hLeft plm"><a href="/directory/groups/"
                                                           title="Browse our Groups directory.">Groups</a></td>
                            <td class="_51m- hLeft plm"><a href="/recipes/" title="Browse our Recipes directory.">Recipes</a>
                            </td>
                            <td class="_51m- hLeft plm"><a href="/sport/"
                                                           title="Browse our Sports directory.">Sports</a></td>
                            <td class="_51m- hLeft plm"><a
                                        href="https://l.facebook.com/l.php?u=http%3A%2F%2Fmomentsapp.com%2F&amp;h=ATMLpZHncbIKjpKbJrNZlkuVc3aA0OZnt1rQvm01FqAzMlnS402gyJDE4NBLJnxnE05KWn2Z-GqwchO41LSOM9i1KmJ4_UF9eI9aBgNfWBnz9qF_UA2Y10yAA_Y"
                                        title="Check out Moments." target="_blank" rel="noopener"
                                        data-lynx-mode="asynclazy">Moments</a></td>
                            <td class="_51m- hLeft plm"><a
                                        href="https://l.facebook.com/l.php?u=https%3A%2F%2Finstagram.com%2F&amp;h=ATOzVHVOThdwymZD7GFnvRdTdSl5h7Pp7HQu2F7_ThDa5OrwoPAmtH7_52v2qfh0M_KKVBn8jef5GKBq8L_FJypCwmDh0C0_36KK2qkr1iI4eZdS5DQRMRAhj_tgahW5RK-Hll8Q"
                                        title="Check out Instagram" target="_blank" rel="noopener"
                                        data-lynx-mode="async">Instagram</a>
                            </td>
                            <td class="_51m- hLeft plm"><a href="/facebook" accesskey="8"
                                                           title="Read our blog, discover the resource center, and find job opportunities.">About</a>
                            </td>
                            <td class="_51m- hLeft plm"><a
                                        href="/campaign/landing.php?placement=pflo&amp;campaign_id=402047449186&amp;extra_1=auto"
                                        title="Advertise on Facebook.">Create Ad</a></td>
                            <td class="_51m- hLeft plm"><a href="/pages/create/?ref_type=sitefooter"
                                                           title="Create a Page">Create Page</a></td>
                            <td class="_51m- hLeft plm _51mw"><a href="https://developers.facebook.com/?ref=pf"
                                                                 title="Develop on our platform.">Developers</a></td>
                        </tr>
                        <tr class="_51mx">
                            <td class="_51m- hLeft plm"><a href="/careers/?ref=pf"
                                                           title="Make your next career move to our awesome company.">Careers</a>
                            </td>
                            <td class="_51m- hLeft plm"><a data-nocookies="1" href="/privacy/explanation"
                                                           title="Learn about your privacy and Facebook.">Privacy</a>
                            </td>
                            <td class="_51m- hLeft plm"><a href="/policies/cookies/"
                                                           title="Learn about cookies and Facebook." data-nocookies="1">Cookies</a>
                            </td>
                            <td class="_51m- hLeft plm"><a class="_41ug" data-nocookies="1"
                                                           href="https://www.facebook.com/help/568137493302217"
                                                           title="Learn about Ad Choices.">Ad Choices<i
                                            class="img sp_EFWZU5yuZxE sx_19982a"></i></a></td>
                            <td class="_51m- hLeft plm"><a data-nocookies="1" href="/policies?ref=pf" accesskey="9"
                                                           title="Review our terms and policies.">Terms</a></td>
                            <td class="_51m- hLeft plm"><a href="/help/?ref=pf" accesskey="0"
                                                           title="Visit our Help Center.">Help</a></td>
                            <td class="_51m- hLeft plm"><a class="accessible_elem" accesskey="6" href="/settings"
                                                           title="View and edit your Facebook settings.">Settings</a>
                            </td>
                            <td class="_51m- hLeft plm"><a class="accessible_elem" accesskey="7"
                                                           href="/allactivity?privacy_source=activity_log_top_menu"
                                                           title="View your activity log">Activity Log</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mvl copyright">
                    <div><span> Facebook © 2017</span></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div></div>
<script type="text/javascript">/*<![CDATA[*/
    (function () {
        function si_cj(m) {
            setTimeout(function () {
                new Image().src = "https:\/\/error.facebook.com\/common\/scribe_endpoint.php?c=si_clickjacking&t=7570" + "&m=" + m;
            }, 5000);
        }

        if (top != self && !false) {
            try {
                if (parent != top) {
                    throw 1;
                }
                var si_cj_d = ["apps.facebook.com", "apps.beta.facebook.com"];
                var href = top.location.href.toLowerCase();
                for (var i = 0; i < si_cj_d.length; i++) {
                    if (href.indexOf(si_cj_d[i]) >= 0) {
                        throw 1;
                    }
                }
                si_cj("3 https:\/\/www.facebook.com\/");
            } catch (e) {
                si_cj("1 \thttps:\/\/www.facebook.com\/");
                window.document.write("\u003Cstyle>body * {display:none !important;}\u003C\/style>\u003Ca href=\"#\" onclick=\"top.location.href=window.location.href\" style=\"display:block !important;padding:10px\">Go to Facebook.com\u003C\/a>");
                /*yx-97sDb*/
            }
        }
    }())
    /*]]>*/</script>
<script>
    requireLazy(["ix"], function (ix) {
        ix.add({
            "125923": {"sprited": true, "spriteCssClass": "sx_4ef6b2", "spriteMapCssClass": "sp_QWERtfPUrSg"},
            "86853": {"sprited": true, "spriteCssClass": "sx_61c93a", "spriteMapCssClass": "sp_jmeks8Q4jUx"},
            "86854": {"sprited": true, "spriteCssClass": "sx_a6e325", "spriteMapCssClass": "sp_jmeks8Q4jUx"},
            "86857": {"sprited": true, "spriteCssClass": "sx_538a14", "spriteMapCssClass": "sp_jmeks8Q4jUx"},
            "87169": {"sprited": true, "spriteCssClass": "sx_ff93dd", "spriteMapCssClass": "sp_avtVGZ81hWA"},
            "87170": {"sprited": true, "spriteCssClass": "sx_5c8a4d", "spriteMapCssClass": "sp_avtVGZ81hWA"},
            "87168": {"sprited": true, "spriteCssClass": "sx_0933da", "spriteMapCssClass": "sp_avtVGZ81hWA"},
            "87143": {"sprited": true, "spriteCssClass": "sx_222ada", "spriteMapCssClass": "sp_EQ8D-SJGgUQ"},
            "87145": {"sprited": true, "spriteCssClass": "sx_986b35", "spriteMapCssClass": "sp_EQ8D-SJGgUQ"},
            "87147": {"sprited": true, "spriteCssClass": "sx_edef9d", "spriteMapCssClass": "sp_EQ8D-SJGgUQ"},
            "87153": {"sprited": true, "spriteCssClass": "sx_c5cd9e", "spriteMapCssClass": "sp_EQ8D-SJGgUQ"},
            "87156": {"sprited": true, "spriteCssClass": "sx_2db8a3", "spriteMapCssClass": "sp_EQ8D-SJGgUQ"},
            "87160": {"sprited": true, "spriteCssClass": "sx_4ebdb0", "spriteMapCssClass": "sp_EQ8D-SJGgUQ"},
            "87146": {"sprited": true, "spriteCssClass": "sx_2bba17", "spriteMapCssClass": "sp_EQ8D-SJGgUQ"},
            "88724": {"sprited": true, "spriteCssClass": "sx_05aa57", "spriteMapCssClass": "sp_KwgTil0dMat"},
            "119369": {"sprited": true, "spriteCssClass": "sx_d6a65a", "spriteMapCssClass": "sp_0zlPrIWAbys"},
            "114492": {"sprited": true, "spriteCssClass": "sx_57968e", "spriteMapCssClass": "sp_0zlPrIWAbys"},
            "114673": {"sprited": true, "spriteCssClass": "sx_49a3b9", "spriteMapCssClass": "sp_0zlPrIWAbys"},
            "114860": {"sprited": true, "spriteCssClass": "sx_c1f09b", "spriteMapCssClass": "sp_PNLGEtBGa4D"},
            "115160": {"sprited": true, "spriteCssClass": "sx_0e9769", "spriteMapCssClass": "sp_0zlPrIWAbys"},
            "125792": {"sprited": true, "spriteCssClass": "sx_5eb15e", "spriteMapCssClass": "sp_PNLGEtBGa4D"},
            "141941": {"sprited": true, "spriteCssClass": "sx_b77914", "spriteMapCssClass": "sp_fzVSnC5qFP0"},
            "142331": {"sprited": true, "spriteCssClass": "sx_e1057b", "spriteMapCssClass": "sp_0zlPrIWAbys"},
            "126426": {"sprited": true, "spriteCssClass": "sx_2fac18", "spriteMapCssClass": "sp_PNLGEtBGa4D"},
            "142574": {"sprited": true, "spriteCssClass": "sx_2c97f5", "spriteMapCssClass": "sp_EiGHDTomt2U"},
            "142815": {"sprited": true, "spriteCssClass": "sx_d157d3", "spriteMapCssClass": "sp_0zlPrIWAbys"},
            "142840": {"sprited": true, "spriteCssClass": "sx_5bf3ee", "spriteMapCssClass": "sp_0zlPrIWAbys"},
            "142908": {"sprited": true, "spriteCssClass": "sx_e2c969", "spriteMapCssClass": "sp_0zlPrIWAbys"},
            "99652": {"sprited": true, "spriteCssClass": "sx_d371ff", "spriteMapCssClass": "sp_0zlPrIWAbys"},
            "99653": {"sprited": true, "spriteCssClass": "sx_d36170", "spriteMapCssClass": "sp_0zlPrIWAbys"},
            "99654": {"sprited": true, "spriteCssClass": "sx_05fcb2", "spriteMapCssClass": "sp_0zlPrIWAbys"},
            "139486": {"sprited": true, "spriteCssClass": "sx_1d7d81", "spriteMapCssClass": "sp_0zlPrIWAbys"},
            "101565": {"sprited": true, "spriteCssClass": "sx_2d4898", "spriteMapCssClass": "sp_CDxWrD6WIzu"},
            "101566": {"sprited": true, "spriteCssClass": "sx_26a418", "spriteMapCssClass": "sp_CDxWrD6WIzu"},
            "75362": {"sprited": true, "spriteCssClass": "sx_b1a843", "spriteMapCssClass": "sp_KwgTil0dMat"},
            "82443": {"sprited": true, "spriteCssClass": "sx_381483", "spriteMapCssClass": "sp_oNWFPQU4yAF"},
            "125812": {"sprited": true, "spriteCssClass": "sx_2dce28", "spriteMapCssClass": "sp_CDxWrD6WIzu"},
            "140856": {"sprited": true, "spriteCssClass": "sx_48794b", "spriteMapCssClass": "sp_KwgTil0dMat"},
            "114555": {"sprited": true, "spriteCssClass": "sx_3984e3", "spriteMapCssClass": "sp_EFWZU5yuZxE"},
            "114570": {"sprited": true, "spriteCssClass": "sx_7087d0", "spriteMapCssClass": "sp_EFWZU5yuZxE"},
            "115129": {"sprited": true, "spriteCssClass": "sx_7bdd71", "spriteMapCssClass": "sp_EFWZU5yuZxE"},
            "138475": {"sprited": true, "spriteCssClass": "sx_93500c", "spriteMapCssClass": "sp_u3Y5IklYWlH"},
            "114446": {"sprited": true, "spriteCssClass": "sx_4e472b", "spriteMapCssClass": "sp_u3Y5IklYWlH"},
            "122256": {"sprited": true, "spriteCssClass": "sx_465bab", "spriteMapCssClass": "sp_AWfL8SqGWNa"},
            "114247": {"sprited": true, "spriteCssClass": "sx_444266", "spriteMapCssClass": "sp_CDxWrD6WIzu"},
            "123247": {"sprited": true, "spriteCssClass": "sx_cc7b93", "spriteMapCssClass": "sp_KslLSHRujGd"},
            "115250": {"sprited": true, "spriteCssClass": "sx_0a9810", "spriteMapCssClass": "sp_-GkSnTO45b_"},
            "114382": {"sprited": true, "spriteCssClass": "sx_089add", "spriteMapCssClass": "sp_lICAEDv8f32"},
            "114424": {"sprited": true, "spriteCssClass": "sx_6664bb", "spriteMapCssClass": "sp_lICAEDv8f32"},
            "114536": {"sprited": true, "spriteCssClass": "sx_9d078c", "spriteMapCssClass": "sp_lICAEDv8f32"},
            "115012": {"sprited": true, "spriteCssClass": "sx_be3ce6", "spriteMapCssClass": "sp_lICAEDv8f32"},
            "115066": {"sprited": true, "spriteCssClass": "sx_66cd3e", "spriteMapCssClass": "sp_lICAEDv8f32"},
            "115095": {"sprited": true, "spriteCssClass": "sx_ba3f48", "spriteMapCssClass": "sp_lICAEDv8f32"},
            "115104": {"sprited": true, "spriteCssClass": "sx_78c868", "spriteMapCssClass": "sp_lICAEDv8f32"},
            "115111": {"sprited": true, "spriteCssClass": "sx_252dfd", "spriteMapCssClass": "sp_lICAEDv8f32"},
            "115261": {"sprited": true, "spriteCssClass": "sx_da2c9f", "spriteMapCssClass": "sp_lICAEDv8f32"},
            "114286": {"sprited": true, "spriteCssClass": "sx_0e2cf3", "spriteMapCssClass": "sp_lICAEDv8f32"},
            "114421": {"sprited": true, "spriteCssClass": "sx_676b65", "spriteMapCssClass": "sp_lICAEDv8f32"},
            "114438": {"sprited": true, "spriteCssClass": "sx_7d53f9", "spriteMapCssClass": "sp_lICAEDv8f32"},
            "114491": {"sprited": true, "spriteCssClass": "sx_6ef402", "spriteMapCssClass": "sp_lICAEDv8f32"},
            "114533": {"sprited": true, "spriteCssClass": "sx_d7be08", "spriteMapCssClass": "sp_lICAEDv8f32"},
            "114543": {"sprited": true, "spriteCssClass": "sx_ecf920", "spriteMapCssClass": "sp_lICAEDv8f32"},
            "114819": {"sprited": true, "spriteCssClass": "sx_b6a4e3", "spriteMapCssClass": "sp_lICAEDv8f32"},
            "114935": {"sprited": true, "spriteCssClass": "sx_47589e", "spriteMapCssClass": "sp_lICAEDv8f32"},
            "115046": {"sprited": true, "spriteCssClass": "sx_621602", "spriteMapCssClass": "sp_lICAEDv8f32"},
            "115091": {"sprited": true, "spriteCssClass": "sx_cee650", "spriteMapCssClass": "sp_lICAEDv8f32"},
            "115107": {"sprited": true, "spriteCssClass": "sx_3167d8", "spriteMapCssClass": "sp_lICAEDv8f32"},
            "115151": {"sprited": true, "spriteCssClass": "sx_2f686c", "spriteMapCssClass": "sp_lICAEDv8f32"},
            "115313": {"sprited": true, "spriteCssClass": "sx_fa32cd", "spriteMapCssClass": "sp_lICAEDv8f32"},
            "115316": {"sprited": true, "spriteCssClass": "sx_53115a", "spriteMapCssClass": "sp_lICAEDv8f32"},
            "115337": {"sprited": true, "spriteCssClass": "sx_8ea2da", "spriteMapCssClass": "sp_lICAEDv8f32"},
            "115515": {"sprited": true, "spriteCssClass": "sx_9eea0f", "spriteMapCssClass": "sp_lICAEDv8f32"},
            "115527": {"sprited": true, "spriteCssClass": "sx_d16b2e", "spriteMapCssClass": "sp_lICAEDv8f32"},
            "115542": {"sprited": true, "spriteCssClass": "sx_bd524f", "spriteMapCssClass": "sp_lICAEDv8f32"},
            "115560": {"sprited": true, "spriteCssClass": "sx_b334bf", "spriteMapCssClass": "sp_ETQ9FG-6xYQ"},
            "115623": {"sprited": true, "spriteCssClass": "sx_71f212", "spriteMapCssClass": "sp_lICAEDv8f32"},
            "115658": {"sprited": true, "spriteCssClass": "sx_0fc862", "spriteMapCssClass": "sp_lICAEDv8f32"},
            "115710": {"sprited": true, "spriteCssClass": "sx_c8bbe4", "spriteMapCssClass": "sp_lICAEDv8f32"},
            "115750": {"sprited": true, "spriteCssClass": "sx_bcf4aa", "spriteMapCssClass": "sp_lICAEDv8f32"},
            "124639": {"sprited": true, "spriteCssClass": "sx_70b1f3", "spriteMapCssClass": "sp_fzVSnC5qFP0"},
            "115128": {"sprited": true, "spriteCssClass": "sx_31a28f", "spriteMapCssClass": "sp_kB6Zef-RHdF"},
            "117012": {"sprited": true, "spriteCssClass": "sx_ac8b11", "spriteMapCssClass": "sp_JkZAcLKzHvj"},
            "122471": {"sprited": true, "spriteCssClass": "sx_2288eb", "spriteMapCssClass": "sp_JkZAcLKzHvj"},
            "122630": {"sprited": true, "spriteCssClass": "sx_217151", "spriteMapCssClass": "sp_JkZAcLKzHvj"},
            "122834": {"sprited": true, "spriteCssClass": "sx_c68e09", "spriteMapCssClass": "sp_JkZAcLKzHvj"},
            "123136": {"sprited": true, "spriteCssClass": "sx_d0f825", "spriteMapCssClass": "sp_UUb8uj_C_Ci"},
            "123290": {"sprited": true, "spriteCssClass": "sx_4b36ce", "spriteMapCssClass": "sp_JkZAcLKzHvj"},
            "117157": {"sprited": true, "spriteCssClass": "sx_77d277", "spriteMapCssClass": "sp_JkZAcLKzHvj"},
            "124180": {"sprited": true, "spriteCssClass": "sx_237c99", "spriteMapCssClass": "sp_sQJRK_FcAb_"},
            "124770": {"sprited": true, "spriteCssClass": "sx_2718f4", "spriteMapCssClass": "sp_NDyjqph5PSr"},
            "28005": {
                "sprited": false,
                "uri": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yK\/r\/r58E9BTKEsh.png",
                "width": 16,
                "height": 16
            },
            "85423": {
                "sprited": false,
                "uri": "https:\/\/www.facebook.com\/rsrc.php\/v3\/y7\/r\/pgEFhPxsWZX.gif",
                "width": 32,
                "height": 32
            },
            "85426": {
                "sprited": false,
                "uri": "https:\/\/www.facebook.com\/rsrc.php\/v3\/y9\/r\/jKEcVPZFk-2.gif",
                "width": 32,
                "height": 32
            },
            "85427": {
                "sprited": false,
                "uri": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yk\/r\/LOOn0JtHNzb.gif",
                "width": 16,
                "height": 16
            },
            "85428": {
                "sprited": false,
                "uri": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yb\/r\/GsNJNwuI-UM.gif",
                "width": 16,
                "height": 11
            },
            "85429": {
                "sprited": false,
                "uri": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yG\/r\/b53Ajb4ihCP.gif",
                "width": 32,
                "height": 32
            },
            "85430": {
                "sprited": false,
                "uri": "https:\/\/www.facebook.com\/rsrc.php\/v3\/y-\/r\/AGUNXgX_Wx3.gif",
                "width": 16,
                "height": 11
            }
        });
    });
    requireLazy(["Bootloader"], function (Bootloader) {
        Bootloader.setResourceMap({
            "C4Qrf": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iG-04\/ya\/l\/en_US\/OgQgIkU0ReL.js",
                "crossOrigin": 1
            },
            "L61b2": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iXhs4\/y3\/l\/en_US\/ohVG2fxBdP0.js",
                "crossOrigin": 1
            },
            "NvNVO": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yR\/r\/gNDADTYRCmy.js",
                "crossOrigin": 1
            },
            "SG1mE": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/y_\/r\/w-JLbBCHjmn.js",
                "crossOrigin": 1
            },
            "H+MB7": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iFXP4\/yp\/l\/en_US\/oYyxhWTUYp5.js",
                "crossOrigin": 1
            },
            "AKrK2": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iq_a4\/yB\/l\/en_US\/mU7R-uYkSxN.js",
                "crossOrigin": 1
            },
            "fxI5n": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3ibNr4\/yU\/l\/en_US\/IHOzSxV0jic.js",
                "crossOrigin": 1
            },
            "86OXr": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3if8X4\/yn\/l\/en_US\/-WtVOZyM_BL.js",
                "crossOrigin": 1
            },
            "ek+LG": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iccB4\/yj\/l\/en_US\/PXwnNEz1zbm.js",
                "crossOrigin": 1
            },
            "d25Q1": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yR\/r\/XvDoD9U-AzY.js",
                "crossOrigin": 1
            },
            "oE4Do": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yX\/r\/frUln05RX0U.js",
                "crossOrigin": 1
            },
            "l2VbO": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iYzo4\/yS\/l\/en_US\/m0SfmKVcj5w.js",
                "crossOrigin": 1
            },
            "Klc20": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/y8\/r\/qiddg0de56D.js",
                "crossOrigin": 1
            },
            "VpUjz": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3ia4G4\/y0\/l\/en_US\/ycnCABITiz5.js",
                "crossOrigin": 1
            },
            "+ClWy": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yZ\/r\/M4WyA5SECuc.js",
                "crossOrigin": 1
            },
            "EPGHH": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iD0j4\/yn\/l\/en_US\/bP378r8vkHD.js",
                "crossOrigin": 1
            },
            "iooGB": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/y3\/r\/VIIFmFl22Lu.js",
                "crossOrigin": 1
            },
            "q5aYo": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3ilJ44\/y7\/l\/en_US\/TthRJR9BU-Q.js",
                "crossOrigin": 1
            },
            "ZU1ro": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yT\/r\/qTydJALwI9J.js",
                "crossOrigin": 1
            },
            "BhyL\/": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iqJ94\/y6\/l\/en_US\/zxiWyK_zrgU.js",
                "crossOrigin": 1
            },
            "7hWrs": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yV\/r\/PrnJa2GRppY.js",
                "crossOrigin": 1
            },
            "oeUXN": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yY\/r\/pxj5yMeNt6r.js",
                "crossOrigin": 1
            },
            "nStws": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/y6\/r\/GBidzNUg2D2.js",
                "crossOrigin": 1
            },
            "58HX4": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yy\/r\/6TrqAzRu-Fv.js",
                "crossOrigin": 1
            },
            "rT6UW": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iLNq4\/yW\/l\/en_US\/89EpQob7ki3.js",
                "crossOrigin": 1
            },
            "N1Ese": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3ioQU4\/yr\/l\/en_US\/xOa8NmSe5D7.js",
                "crossOrigin": 1
            },
            "\/MqEz": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3ivhZ4\/yI\/l\/en_US\/7Bcbnro1lds.js",
                "crossOrigin": 1
            },
            "hb6pC": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3i0xS4\/yt\/l\/en_US\/szHldvdhtju.js",
                "crossOrigin": 1
            },
            "l5JP5": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iQB64\/yR\/l\/en_US\/SB8QxNOhxUD.js",
                "crossOrigin": 1
            },
            "qNXTU": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iugJ4\/yk\/l\/en_US\/2ILN-mYUChM.js",
                "crossOrigin": 1
            },
            "SQRfo": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3ikrL4\/yJ\/l\/en_US\/IrmUA-Hrmbo.js",
                "crossOrigin": 1
            },
            "r7oHI": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yB\/r\/-Mw9b3yjVOK.js",
                "crossOrigin": 1
            },
            "9qqae": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3il3x4\/yR\/l\/en_US\/Dh8lkNGY0IF.js",
                "crossOrigin": 1
            },
            "oHxY5": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yU\/r\/8RxFXFheYqt.js",
                "crossOrigin": 1
            },
            "+zvRU": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yo\/r\/DswYUvmTMGh.js",
                "crossOrigin": 1
            },
            "eKl0S": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yX\/r\/wQ3xZ3q797y.js",
                "crossOrigin": 1
            },
            "CnNiK": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3i_SI4\/y6\/l\/en_US\/y5iiQ7IVuu-.js",
                "crossOrigin": 1
            },
            "N59jv": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iVLW4\/yo\/l\/en_US\/iP2aHVTNKEq.js",
                "crossOrigin": 1
            },
            "240ZV": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/y6\/r\/tyixtAtDyeO.js",
                "crossOrigin": 1
            },
            "VitFm": {
                "type": "css",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yZ\/l\/0,cross\/icdCalTmdVR.css",
                "permanent": 1,
                "crossOrigin": 1
            },
            "1xgwy": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3idYV4\/yd\/l\/en_US\/1gpAqZucYeo.js",
                "crossOrigin": 1
            },
            "m0+Xc": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iJRm4\/yG\/l\/en_US\/SqM2zcg4qEs.js",
                "crossOrigin": 1
            },
            "HOBeP": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iT2E4\/yB\/l\/en_US\/ard9ahPibxT.js",
                "crossOrigin": 1
            },
            "yv18k": {
                "type": "css",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yu\/l\/0,cross\/rqu6MLlZepP.css",
                "permanent": 1,
                "crossOrigin": 1
            },
            "cU20Y": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iyMy4\/yN\/l\/en_US\/CE_AKdWBc5Z.js",
                "crossOrigin": 1
            },
            "jXqzT": {
                "type": "css",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yz\/l\/0,cross\/8K24rrJgmqE.css",
                "crossOrigin": 1
            },
            "wb3qs": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yU\/r\/94gpx9tgmtj.js",
                "crossOrigin": 1
            },
            "vfYqJ": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yE\/r\/M9Evo_YS5PK.js",
                "crossOrigin": 1
            },
            "A6qm+": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iNZS4\/yi\/l\/en_US\/YxZStvzysPJ.js",
                "crossOrigin": 1
            },
            "OCE5W": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yg\/r\/llNqbOAm_EE.js",
                "crossOrigin": 1
            },
            "jNgMf": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yk\/r\/wwIFUmpGtTL.js",
                "crossOrigin": 1
            },
            "4PpBg": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yh\/r\/sBgZmGL-Etq.js",
                "crossOrigin": 1
            },
            "N7VAi": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iKwZ4\/yJ\/l\/en_US\/rabM9aeAyzy.js",
                "crossOrigin": 1
            },
            "wE\/xn": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yM\/r\/UWqxFLN39AH.js",
                "crossOrigin": 1
            },
            "Oaixm": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3izEV4\/yt\/l\/en_US\/evpuFhkAcbj.js",
                "crossOrigin": 1
            },
            "kF1+E": {
                "type": "css",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yh\/l\/0,cross\/ipIBu9zE2Ql.css",
                "permanent": 1,
                "crossOrigin": 1
            },
            "L\/o5n": {
                "type": "css",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yk\/l\/0,cross\/Sca-2CyvIyx.css",
                "permanent": 1,
                "crossOrigin": 1
            },
            "UhwBa": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iPP14\/yQ\/l\/en_US\/fVb6wFIe-oQ.js",
                "crossOrigin": 1
            },
            "LODME": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yn\/r\/CZebHvzay4D.js",
                "crossOrigin": 1
            },
            "OyMEr": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yS\/r\/griwydvpabN.js",
                "crossOrigin": 1
            },
            "5jCZU": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yM\/r\/xZcYKzBQMgF.js",
                "crossOrigin": 1
            },
            "N87OS": {
                "type": "css",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yj\/l\/0,cross\/npKRQM9iIre.css",
                "permanent": 1,
                "crossOrigin": 1
            },
            "3py3C": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iKmC4\/y5\/l\/en_US\/6qRCISV61q0.js",
                "crossOrigin": 1
            },
            "lhILs": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yX\/r\/skobllJkodo.js",
                "crossOrigin": 1
            },
            "YZbYy": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iQwm4\/ys\/l\/en_US\/DUGY2QCDLO4.js",
                "crossOrigin": 1
            },
            "622TF": {
                "type": "css",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yj\/l\/0,cross\/1t9VfhYmB4s.css",
                "permanent": 1,
                "crossOrigin": 1
            },
            "Yp86W": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3ixrZ4\/yZ\/l\/en_US\/FO0Hwl3zrNd.js",
                "crossOrigin": 1
            },
            "4m8bm": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3i7-k4\/yM\/l\/en_US\/_8oEPPfZrTC.js",
                "crossOrigin": 1
            },
            "IRdom": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3ielm4\/yd\/l\/en_US\/drZmzrRtHpd.js",
                "crossOrigin": 1
            },
            "ioKV2": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yf\/r\/iLeNnmySKXC.js",
                "crossOrigin": 1
            },
            "+xnR3": {
                "type": "css",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yz\/l\/0,cross\/PaoRyDqLA3i.css",
                "permanent": 1,
                "crossOrigin": 1
            },
            "aVCxl": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iFjs4\/yJ\/l\/en_US\/dZEfQIgXtZs.js",
                "crossOrigin": 1
            },
            "Xlgw2": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iIjH4\/yU\/l\/en_US\/LI8PfAbusXM.js",
                "crossOrigin": 1
            },
            "B59af": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iy6o4\/yT\/l\/en_US\/b8K85ry9hlR.js",
                "crossOrigin": 1
            },
            "dEveg": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3i0xN4\/ym\/l\/en_US\/I1VCtJf3y8n.js",
                "crossOrigin": 1
            },
            "JOCcf": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yw\/r\/CUgMQtB-DqT.js",
                "crossOrigin": 1
            },
            "LHkVX": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iw6w4\/yS\/l\/en_US\/VlJ5aK1GqaU.js",
                "crossOrigin": 1
            },
            "qvtq4": {
                "type": "css",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/ys\/l\/0,cross\/r4MWWG6wO5D.css",
                "permanent": 1,
                "crossOrigin": 1
            },
            "vD9cb": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iCat4\/yE\/l\/en_US\/_orGs5mnB_v.js",
                "crossOrigin": 1
            },
            "IrfhN": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3ipmv4\/yD\/l\/en_US\/eewLZCKYVRV.js",
                "crossOrigin": 1
            },
            "u3GKY": {
                "type": "css",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yq\/l\/0,cross\/8tE6xF6ylGH.css",
                "crossOrigin": 1
            },
            "RBaNL": {
                "type": "css",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yr\/l\/0,cross\/IFn2SDUR_rW.css",
                "permanent": 1,
                "crossOrigin": 1
            },
            "D7cRT": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3ibEW4\/ys\/l\/en_US\/8FkxKU-bHz5.js",
                "crossOrigin": 1
            },
            "1ixP5": {
                "type": "css",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yR\/l\/0,cross\/gx1RON8Mt2p.css",
                "permanent": 1,
                "crossOrigin": 1
            },
            "WITvF": {
                "type": "css",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yU\/l\/0,cross\/m2-QXYFwAqv.css",
                "permanent": 1,
                "crossOrigin": 1
            },
            "G+Bj3": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3ipba4\/y8\/l\/en_US\/p815rEIp6IN.js",
                "crossOrigin": 1
            },
            "UW42s": {
                "type": "css",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/y4\/l\/0,cross\/xjyz0uge_WR.css",
                "crossOrigin": 1
            },
            "0Qz\/x": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yz\/r\/DxBgz760Gx8.js",
                "crossOrigin": 1
            },
            "Hnz7V": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3im-R4\/yB\/l\/en_US\/2HwtEcS6zIN.js",
                "crossOrigin": 1
            },
            "K7OiS": {
                "type": "css",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yK\/l\/0,cross\/UrYq2e16BPM.css",
                "crossOrigin": 1
            },
            "sNDhQ": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iQvy4\/yD\/l\/en_US\/YjoQT7YcCWS.js",
                "crossOrigin": 1
            },
            "XRiHe": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iy-14\/y4\/l\/en_US\/K4HPlal1AJK.js",
                "crossOrigin": 1
            },
            "6u8zn": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yc\/r\/vcIzSyz9FHA.js",
                "crossOrigin": 1
            },
            "SJdHB": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/y5\/r\/NRr7ucJ7pKY.js",
                "crossOrigin": 1
            },
            "tLIO\/": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/y7\/r\/h31z8GuSBXv.js",
                "crossOrigin": 1
            },
            "z9cNF": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3ig-p4\/yh\/l\/en_US\/-ve_v4SuKpm.js",
                "crossOrigin": 1
            },
            "5pQk8": {
                "type": "css",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yS\/l\/0,cross\/vvVTZvYnw4W.css",
                "permanent": 1,
                "crossOrigin": 1
            },
            "W1Q1L": {
                "type": "css",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yO\/l\/0,cross\/dLZA8MAQJ6J.css",
                "crossOrigin": 1
            },
            "THVgE": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iuIh4\/yt\/l\/en_US\/X8b5Kk7is4r.js",
                "crossOrigin": 1
            },
            "+GBbh": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3id2s4\/yw\/l\/en_US\/hEIPX1DAVsE.js",
                "crossOrigin": 1
            },
            "HoLZD": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3ioJH4\/yI\/l\/en_US\/99225sOthph.js",
                "crossOrigin": 1
            },
            "soWdG": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iXt-4\/yb\/l\/en_US\/Rw0nQIGhv0M.js",
                "crossOrigin": 1
            },
            "hx5h1": {
                "type": "css",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yT\/l\/0,cross\/5LLUUpyuOuL.css",
                "permanent": 1,
                "crossOrigin": 1
            },
            "0haZm": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iWYr4\/yz\/l\/en_US\/MLThPYrjm9s.js",
                "crossOrigin": 1
            },
            "iUZKT": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/ya\/r\/U4tGVhUJHfi.js",
                "crossOrigin": 1
            },
            "\/mnVq": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3i2yy4\/yc\/l\/en_US\/WAhxrt27KYp.js",
                "crossOrigin": 1
            },
            "HJFN1": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iMsN4\/yV\/l\/en_US\/2jm1CfhVGJ7.js",
                "crossOrigin": 1
            },
            "FdUGE": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3i8ma4\/yI\/l\/en_US\/_1fQ-qX0lP_.js",
                "crossOrigin": 1
            },
            "aFnoQ": {
                "type": "css",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/ys\/l\/0,cross\/oZf4PlP2u0c.css",
                "permanent": 1,
                "crossOrigin": 1
            },
            "DMMZ1": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3izpg4\/y2\/l\/en_US\/_w_zhMsxaA4.js",
                "crossOrigin": 1
            },
            "IFCu0": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iUi-4\/y_\/l\/en_US\/yiY09pjMe-6.js",
                "crossOrigin": 1
            },
            "qCBZX": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iINV4\/yR\/l\/en_US\/9Ngth_-hl8K.js",
                "crossOrigin": 1
            },
            "LmDP6": {
                "type": "css",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/y5\/l\/0,cross\/F5BGmHgOMBs.css",
                "crossOrigin": 1
            },
            "bT3tk": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yB\/r\/nRtkeoC4_Pg.js",
                "crossOrigin": 1
            },
            "KZclV": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yZ\/r\/I466p_vDw4K.js",
                "crossOrigin": 1
            },
            "6AU0l": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iPVh4\/yo\/l\/en_US\/r2s4HiOQ1hs.js",
                "crossOrigin": 1
            },
            "N97KJ": {
                "type": "css",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yi\/l\/0,cross\/7TmLG7pr22R.css",
                "permanent": 1,
                "crossOrigin": 1
            },
            "FSepT": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iUJN4\/yn\/l\/en_US\/Ow7ViYHGFBL.js",
                "crossOrigin": 1
            },
            "cUuvY": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iJDt4\/yh\/l\/en_US\/BHFLTsdvI8a.js",
                "crossOrigin": 1
            },
            "zgXJ\/": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yg\/r\/lUaP7sXb4uD.js",
                "crossOrigin": 1
            },
            "VZgf8": {
                "type": "css",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/y-\/l\/0,cross\/f8SM5w3zTCu.css",
                "permanent": 1,
                "crossOrigin": 1
            },
            "GcJiN": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iQB64\/yo\/l\/en_US\/a3qHWvZ91ex.js",
                "crossOrigin": 1
            },
            "PbXPh": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3ippr4\/y-\/l\/en_US\/3OJFXE0Iq8V.js",
                "crossOrigin": 1
            },
            "atKg2": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yp\/r\/G8Tje5zO4h5.js",
                "crossOrigin": 1
            },
            "aLhMM": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iIrM4\/yG\/l\/en_US\/7GcVy-z4pZ9.js",
                "crossOrigin": 1
            },
            "wnL4N": {
                "type": "css",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yd\/l\/0,cross\/PhS-U3SLdxr.css",
                "crossOrigin": 1
            },
            "e6mDb": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yY\/r\/wgdhKn_im8D.js",
                "crossOrigin": 1
            },
            "IyKeg": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yt\/r\/Yz0jJOwtx-b.js",
                "crossOrigin": 1
            },
            "oIpgN": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yu\/r\/-8QDKpixqIu.js",
                "crossOrigin": 1
            },
            "9sOHI": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yG\/r\/HlVn_iJifSr.js",
                "crossOrigin": 1
            },
            "5aJU6": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yB\/r\/m0FHVlGnLaR.js",
                "crossOrigin": 1
            },
            "jtoBB": {
                "type": "css",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/y6\/l\/0,cross\/vNEehuIosaO.css",
                "crossOrigin": 1
            },
            "C6Cce": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yM\/r\/jh_fhm6RQyd.js",
                "crossOrigin": 1
            },
            "iUr6E": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iVK04\/y3\/l\/en_US\/-ep2cmSjh_N.js",
                "crossOrigin": 1
            },
            "Mu870": {
                "type": "css",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yt\/l\/0,cross\/M9d9QBJTver.css",
                "crossOrigin": 1
            },
            "E8VfU": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yD\/r\/_K2mfS8HD1N.js",
                "crossOrigin": 1
            },
            "ighLF": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3i-ZX4\/ys\/l\/en_US\/CQbiHfP3nPN.js",
                "crossOrigin": 1
            },
            "mXCcp": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iBV64\/y0\/l\/en_US\/rA45Y4Ff27O.js",
                "crossOrigin": 1
            },
            "MkZIW": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3i0VN4\/y-\/l\/en_US\/KrPBhhvHIw2.js",
                "crossOrigin": 1
            },
            "oUSIN": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iVFz4\/y8\/l\/en_US\/7ZZeMG8wPXh.js",
                "crossOrigin": 1
            },
            "KiqBZ": {
                "type": "css",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yp\/l\/0,cross\/Kw9xbEuoZyP.css",
                "crossOrigin": 1
            },
            "qnQ9r": {
                "type": "css",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yy\/l\/0,cross\/fDAUjfF7wEn.css",
                "permanent": 1,
                "crossOrigin": 1
            },
            "XTfys": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3i6EJ4\/yA\/l\/en_US\/10y0aB49BxN.js",
                "crossOrigin": 1
            },
            "ojovk": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yO\/r\/dPoJPZyMm8j.js",
                "crossOrigin": 1
            },
            "tInKH": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/y-\/r\/vQU3zvligG9.js",
                "crossOrigin": 1
            },
            "DTekJ": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3ilXE4\/yI\/l\/en_US\/766K2hLsPEN.js",
                "crossOrigin": 1
            },
            "nFEnK": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iHAE4\/y7\/l\/en_US\/gEOZKFTyE1n.js",
                "crossOrigin": 1
            },
            "052rB": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iDgn4\/yz\/l\/en_US\/sZXqSlGNRQn.js",
                "crossOrigin": 1
            },
            "Bcsxa": {
                "type": "css",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/y2\/l\/0,cross\/47g3-WkcnTb.css",
                "crossOrigin": 1
            },
            "RDCL5": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/y8\/r\/Y8H7Rxl4wPp.js",
                "crossOrigin": 1
            },
            "H0kNa": {
                "type": "css",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/y_\/l\/0,cross\/0noY8CCx8JK.css",
                "crossOrigin": 1
            },
            "stMI3": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iYQ24\/y1\/l\/en_US\/uAdhkwCMNWw.js",
                "crossOrigin": 1
            },
            "lvtG\/": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3ihsb4\/yg\/l\/en_US\/HAqplOlqKrZ.js",
                "crossOrigin": 1
            },
            "sfMlF": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iYeR4\/yJ\/l\/en_US\/uqM1O_ssmV7.js",
                "crossOrigin": 1
            },
            "ZSYjA": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yl\/r\/lnaFRG_H5z-.js",
                "crossOrigin": 1
            },
            "WzFun": {
                "type": "css",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yn\/l\/0,cross\/dXPWUPbeaQq.css",
                "crossOrigin": 1
            },
            "GS6t9": {
                "type": "css",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yV\/l\/0,cross\/zxvSoS996vW.css",
                "crossOrigin": 1
            },
            "hQqGz": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3ich34\/yQ\/l\/en_US\/X35MDvGlWFN.js",
                "crossOrigin": 1
            },
            "3GkYb": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3i-UD4\/y0\/l\/en_US\/LiQUS4t_Dtu.js",
                "crossOrigin": 1
            },
            "c5Gu+": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/y9\/r\/0qRyERh_WB6.js",
                "crossOrigin": 1
            },
            "6qvM\/": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iVQK4\/yY\/l\/en_US\/IdRrqq7MUOo.js",
                "crossOrigin": 1
            },
            "Jk05E": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3i7OW4\/yJ\/l\/en_US\/QGGFCqUyyjr.js",
                "crossOrigin": 1
            },
            "cF0f1": {
                "type": "css",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yJ\/l\/0,cross\/J51cAFVHepY.css",
                "permanent": 1,
                "crossOrigin": 1
            },
            "zr0bA": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yT\/r\/EhWo3tOIvIV.js",
                "crossOrigin": 1
            },
            "\/e7VC": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3idkW4\/yx\/l\/en_US\/mW2c2De38Qb.js",
                "crossOrigin": 1
            },
            "1gMCs": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iOBk4\/ya\/l\/en_US\/XhIbU7A0FwV.js",
                "crossOrigin": 1
            },
            "Wd7vR": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3inWi4\/yO\/l\/en_US\/GQVc2-cx4ag.js",
                "crossOrigin": 1
            },
            "g6aG0": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yt\/r\/Yp4rjb5zQ-D.js",
                "crossOrigin": 1
            },
            "mH\/cm": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yF\/r\/pOrdO5xuUcb.js",
                "crossOrigin": 1
            },
            "U8IIn": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/ye\/r\/K2hx9pQWYsg.js",
                "crossOrigin": 1
            },
            "PEFH4": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iE3j4\/yT\/l\/en_US\/Obul6HO_2Dy.js",
                "crossOrigin": 1
            },
            "By3X4": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iiHC4\/yA\/l\/en_US\/l0l9d0gSzQ6.js",
                "crossOrigin": 1
            },
            "4X\/kF": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3in5s4\/yK\/l\/en_US\/ZOlNdc1G4iR.js",
                "crossOrigin": 1
            },
            "KQ+lo": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yn\/r\/IIts2FLdOol.js",
                "crossOrigin": 1
            },
            "4Ds\/J": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3i2p04\/yD\/l\/en_US\/wMbjcK9LjvS.js",
                "crossOrigin": 1
            },
            "tbpl5": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yQ\/r\/pAx5QXEBK7O.js",
                "crossOrigin": 1
            },
            "iSCKE": {
                "type": "css",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yJ\/l\/0,cross\/y9OuSlU8cXn.css",
                "permanent": 1,
                "crossOrigin": 1
            },
            "YRGqf": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iUCx4\/yy\/l\/en_US\/JTbaiOYp8Ct.js",
                "crossOrigin": 1
            },
            "Z8zAh": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/y_\/r\/LxOW7YLAiej.js",
                "crossOrigin": 1
            },
            "+g5ut": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iZAc4\/yU\/l\/en_US\/S1OpacpFs6x.js",
                "crossOrigin": 1
            },
            "CDwUw": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yn\/r\/Xglmk6uEZt6.js",
                "crossOrigin": 1
            },
            "ozlra": {
                "type": "css",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yR\/l\/0,cross\/lBYxAjHj-3E.css",
                "permanent": 1,
                "crossOrigin": 1
            },
            "8aeA9": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/y-\/r\/15aD7TxK0TE.js",
                "crossOrigin": 1
            },
            "9EMwh": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3i6su4\/yR\/l\/en_US\/Hfl_JDL5cyP.js",
                "crossOrigin": 1
            },
            "XSlbU": {
                "type": "css",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yC\/l\/0,cross\/VJAr_9Ugd_3.css",
                "crossOrigin": 1
            },
            "\/aUHJ": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iQB64\/yl\/l\/en_US\/CVJW4Nu4qjR.js",
                "crossOrigin": 1
            },
            "+VWNr": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iYox4\/yX\/l\/en_US\/hLu3QuaM86C.js",
                "crossOrigin": 1
            },
            "QaPCm": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iLwb4\/y3\/l\/en_US\/iqlHEV3wPai.js",
                "crossOrigin": 1
            },
            "cKYdo": {
                "type": "css",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yL\/l\/0,cross\/v-GYNh8f2Gx.css",
                "crossOrigin": 1
            },
            "dH2O\/": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iMag4\/y4\/l\/en_US\/-BJy3--yPfT.js",
                "crossOrigin": 1
            },
            "krylL": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yv\/r\/nB2fYrk-g1h.js",
                "crossOrigin": 1
            },
            "zR2Ol": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iHjC4\/yA\/l\/en_US\/5xWlp2r0uCI.js",
                "crossOrigin": 1
            },
            "q6BG6": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3i1rI4\/yV\/l\/en_US\/e3HsHcTGogD.js",
                "crossOrigin": 1
            },
            "D64uR": {
                "type": "css",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yX\/l\/0,cross\/KMuyg4PyLOK.css",
                "crossOrigin": 1
            },
            "TeSw5": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3izr94\/y8\/l\/en_US\/rrzEeO1Is6-.js",
                "crossOrigin": 1
            },
            "Vgu\/8": {
                "type": "css",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yW\/l\/0,cross\/S_AskMxOKsX.css",
                "crossOrigin": 1
            },
            "zparn": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yK\/r\/7ZFC2fk5aWb.js",
                "crossOrigin": 1
            },
            "bnzlq": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iGAS4\/y2\/l\/en_US\/OEuyupyiEvL.js",
                "crossOrigin": 1
            },
            "nGrLJ": {
                "type": "css",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yO\/l\/0,cross\/rZVaBXiRy5-.css",
                "crossOrigin": 1
            },
            "rta72": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iB2t4\/yv\/l\/en_US\/Ha-I4stukUV.js",
                "crossOrigin": 1
            },
            "tQFwg": {
                "type": "css",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/ys\/l\/0,cross\/pspk2i_wLWc.css",
                "crossOrigin": 1
            },
            "YVZUr": {
                "type": "css",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/ya\/l\/0,cross\/brK7NiPV0Ec.css",
                "permanent": 1,
                "crossOrigin": 1
            },
            "YKWsK": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yX\/r\/ZLufeNKM5yH.js",
                "crossOrigin": 1
            },
            "tHSMF": {
                "type": "css",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yE\/l\/0,cross\/EwZvbDGwLm6.css",
                "crossOrigin": 1
            },
            "kX9jp": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yh\/r\/7YeAMsDOhSQ.js",
                "crossOrigin": 1
            },
            "x6Zmh": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iqJU4\/yc\/l\/en_US\/fdY884j9F_v.js",
                "crossOrigin": 1
            },
            "Zpk7t": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3ifu84\/yM\/l\/en_US\/twA81fsu0th.js",
                "crossOrigin": 1
            },
            "XPepI": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iD2j4\/yJ\/l\/en_US\/lNEtQvITKl8.js",
                "crossOrigin": 1
            },
            "CKTEV": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iUHR4\/y-\/l\/en_US\/Ckdeka8swtK.js",
                "crossOrigin": 1
            },
            "jBayo": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/y8\/r\/VyuOakv7G7a.js",
                "crossOrigin": 1
            },
            "lgUKM": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iOl04\/y2\/l\/en_US\/8T11RPIUIYz.js",
                "crossOrigin": 1
            },
            "fxDBi": {
                "type": "css",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yn\/l\/0,cross\/NDQ2HjO9KWC.css",
                "crossOrigin": 1
            },
            "xWt\/K": {
                "type": "css",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yv\/l\/0,cross\/mSwSCDW4lgF.css",
                "crossOrigin": 1
            },
            "GJSTr": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yP\/r\/Hb5cc0wgYbc.js",
                "crossOrigin": 1
            },
            "rSdpp": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yO\/r\/oaEIh1CiqIJ.js",
                "crossOrigin": 1
            },
            "yGvRs": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/y1\/r\/3UXx1Nnz6WG.js",
                "crossOrigin": 1
            },
            "rOw4b": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/y0\/r\/hv1_Yh48OZy.js",
                "crossOrigin": 1
            },
            "g05Da": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3ikOS4\/y2\/l\/en_US\/oXzuzdutt7P.js",
                "crossOrigin": 1
            },
            "h28\/n": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3idIq4\/yp\/l\/en_US\/1l0rIvaehjR.js",
                "crossOrigin": 1
            },
            "nN+Px": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iaPN4\/yH\/l\/en_US\/Ibq0AIiaTxs.js",
                "crossOrigin": 1
            },
            "wPi2g": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3inAV4\/yX\/l\/en_US\/bWngQG86tvy.js",
                "crossOrigin": 1
            },
            "7dmjT": {
                "type": "css",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/y1\/l\/0,cross\/4Y80s1c0EvE.css",
                "crossOrigin": 1
            },
            "QiNcl": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yy\/r\/IWGZxyYc36G.js",
                "crossOrigin": 1
            },
            "IpFdO": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iXM34\/yC\/l\/en_US\/jZNkunniQH8.js",
                "crossOrigin": 1
            },
            "7gxGj": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yw\/r\/HlQHZ0AskKM.js",
                "crossOrigin": 1
            },
            "Oxt9\/": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yQ\/r\/LoYBpSrGvt1.js",
                "crossOrigin": 1
            },
            "iCW82": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yX\/r\/Zgn1oa7g51n.js",
                "crossOrigin": 1
            },
            "cGHec": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/y7\/r\/Zzn-GK4fKhT.js",
                "crossOrigin": 1
            },
            "lhuyT": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/y-\/r\/2uFrWFQ5UBA.js",
                "crossOrigin": 1
            },
            "TYshe": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yj\/r\/MrOqaJ-btyV.js",
                "crossOrigin": 1
            },
            "Lb6GD": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3ikXq4\/y3\/l\/en_US\/2Jf84Ncsfdm.js",
                "crossOrigin": 1
            },
            "fpIP5": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/y7\/r\/h6x6rku2a-a.js",
                "crossOrigin": 1
            },
            "\/mjqi": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/y9\/r\/RTi91yuRLvw.js",
                "crossOrigin": 1
            },
            "yyXVJ": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yy\/r\/TWEMW0sEhU1.js",
                "crossOrigin": 1
            },
            "W0bFH": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yf\/r\/FboMJC5QpYM.js",
                "crossOrigin": 1
            },
            "s0z3j": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3\/yk\/r\/OxzxRsSpx3M.js",
                "crossOrigin": 1
            },
            "TQNEf": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3izY84\/yj\/l\/en_US\/vOYNEiMliLz.js",
                "crossOrigin": 1
            },
            "FHWhP": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3iHjv4\/yh\/l\/en_US\/sqw4YWZVDRv.js",
                "crossOrigin": 1
            },
            "mdXGU": {
                "type": "js",
                "src": "https:\/\/www.facebook.com\/rsrc.php\/v3isDP4\/yo\/l\/en_US\/zQEtqR9lrwA.js",
                "crossOrigin": 1
            },
            "P\/mr5": {
                "type": "css",
                "src": "data:text\/css; charset=utf-8,#bootloader_P_mr5{height:42px;}.bootloader_P_mr5{display:block!important;}",
                "crossOrigin": 1
            }
        });
        if (true) {
            Bootloader.enableBootload({
                "css:CSSFade": {"resources": ["7MNFg"]},
                "ExceptionDialog": {
                    "resources": ["C4Qrf", "7MNFg", "L61b2", "NvNVO", "SG1mE", "H+MB7", "AKrK2", "fxI5n", "86OXr", "ek+LG"],
                    "module": 1
                },
                "React": {"resources": ["H+MB7", "C4Qrf", "NvNVO", "7MNFg"], "module": 1},
                "AsyncDOM": {"resources": ["7MNFg", "NvNVO", "d25Q1"], "module": 1},
                "ConfirmationDialog": {"resources": ["7MNFg", "NvNVO", "C4Qrf", "L61b2", "oE4Do"], "module": 1},
                "Dialog": {"resources": ["C4Qrf", "7MNFg", "H+MB7", "NvNVO", "L61b2", "l2VbO"], "module": 1},
                "QuickSandSolver": {
                    "resources": ["C4Qrf", "7MNFg", "NvNVO", "H+MB7", "L61b2", "Klc20", "VpUjz", "+ClWy"],
                    "module": 1
                },
                "ErrorSignal": {"resources": ["C4Qrf", "NvNVO", "7MNFg", "EPGHH", "H+MB7"], "module": 1},
                "ReactDOM": {"resources": ["H+MB7", "C4Qrf", "NvNVO", "7MNFg", "SG1mE"], "module": 1},
                "WebSpeedInteractionsTypedLogger": {"resources": ["C4Qrf", "NvNVO", "7MNFg", "iooGB"], "module": 1},
                "LogHistory": {"resources": ["q5aYo"], "module": 1},
                "SimpleXUIDialog": {
                    "resources": ["C4Qrf", "7MNFg", "L61b2", "NvNVO", "SG1mE", "H+MB7", "AKrK2", "fxI5n"],
                    "module": 1
                },
                "XUIButton.react": {"resources": ["H+MB7", "C4Qrf", "NvNVO", "7MNFg", "SG1mE"], "module": 1},
                "XUIDialogButton.react": {
                    "resources": ["H+MB7", "C4Qrf", "NvNVO", "7MNFg", "SG1mE", "fxI5n"],
                    "module": 1
                },
                "Banzai": {"resources": ["C4Qrf", "NvNVO", "7MNFg"], "module": 1},
                "BanzaiODS": {"resources": ["C4Qrf", "NvNVO", "7MNFg"], "module": 1},
                "BanzaiStream": {"resources": ["C4Qrf", "NvNVO", "7MNFg", "ZU1ro"], "module": 1},
                "ResourceTimingBootloaderHelper": {"resources": ["BhyL\/", "C4Qrf"], "module": 1},
                "SnappyCompress": {"resources": ["7hWrs"], "module": 1},
                "TimeSliceHelper": {"resources": ["H+MB7", "C4Qrf", "NvNVO", "7MNFg", "SG1mE", "BhyL\/"], "module": 1},
                "AsyncSignal": {"resources": ["7MNFg", "NvNVO"], "module": 1},
                "XLinkshimLogController": {"resources": ["NvNVO", "oeUXN"], "module": 1},
                "messengerGraphQLThreadFetcherRe": {
                    "resources": ["nStws", "NvNVO", "58HX4", "C4Qrf", "SG1mE", "rT6UW", "N1Ese", "H+MB7", "q5aYo", "\/MqEz", "hb6pC", "7MNFg", "l5JP5", "qNXTU"],
                    "module": 1
                },
                "messengerGraphQLThreadlistFetcherRe": {
                    "resources": ["SQRfo", "H+MB7", "nStws", "NvNVO", "r7oHI", "C4Qrf", "SG1mE", "rT6UW", "N1Ese", "9qqae", "58HX4", "q5aYo", "\/MqEz", "hb6pC", "7MNFg", "l5JP5", "qNXTU"],
                    "module": 1
                },
                "GroupMemberActionSource": {"resources": ["oHxY5"], "module": 1},
                "Tooltip.react": {"resources": ["H+MB7", "C4Qrf", "NvNVO", "7MNFg", "SG1mE", "q5aYo"], "module": 1},
                "Animation": {"resources": ["C4Qrf", "7MNFg", "H+MB7", "NvNVO", "L61b2"], "module": 1},
                "DialogX": {"resources": ["C4Qrf", "7MNFg", "L61b2", "NvNVO", "SG1mE", "H+MB7", "AKrK2"], "module": 1},
                "XUIDialogBody.react": {
                    "resources": ["H+MB7", "C4Qrf", "NvNVO", "7MNFg", "SG1mE", "fxI5n"],
                    "module": 1
                },
                "XUIDialogFooter.react": {
                    "resources": ["H+MB7", "C4Qrf", "NvNVO", "7MNFg", "SG1mE", "fxI5n"],
                    "module": 1
                },
                "XUIDialogTitle.react": {
                    "resources": ["H+MB7", "C4Qrf", "NvNVO", "7MNFg", "SG1mE", "L61b2"],
                    "module": 1
                },
                "XUIGrayText.react": {"resources": ["H+MB7", "C4Qrf", "NvNVO", "7MNFg", "SG1mE", "fxI5n"], "module": 1},
                "PageTransitions": {"resources": ["7MNFg", "NvNVO", "C4Qrf", "L61b2", "H+MB7"], "module": 1},
                "ContextualLayerInlineTabOrder": {
                    "resources": ["7MNFg", "NvNVO", "H+MB7", "C4Qrf", "+zvRU"],
                    "module": 1
                },
                "TabBarDropdownItem.react": {
                    "resources": ["7MNFg", "NvNVO", "SG1mE", "C4Qrf", "L61b2", "H+MB7", "AKrK2", "eKl0S", "CnNiK", "N59jv"],
                    "module": 1
                },
                "EncryptedImg": {"resources": ["H+MB7", "SG1mE", "NvNVO", "C4Qrf", "86OXr"], "module": 1},
                "ScrollableArea": {"resources": ["NvNVO", "C4Qrf", "7MNFg", "H+MB7"], "module": 1},
                "EmojiPicker.react": {
                    "resources": ["C4Qrf", "7MNFg", "L61b2", "NvNVO", "240ZV", "H+MB7", "q5aYo", "SG1mE", "CnNiK", "VitFm", "1xgwy", "m0+Xc", "HOBeP", "rT6UW", "yv18k", "fxI5n", "cU20Y", "jXqzT"],
                    "module": 1
                },
                "bodymovin": {"resources": ["NvNVO", "C4Qrf", "wb3qs"], "module": 1},
                "TextDelightController": {
                    "resources": ["7MNFg", "NvNVO", "C4Qrf", "vfYqJ", "A6qm+", "OCE5W", "H+MB7"],
                    "module": 1
                },
                "UFIAddCommentLiveTypingPublisher": {
                    "resources": ["C4Qrf", "NvNVO", "jNgMf", "7MNFg", "H+MB7"],
                    "module": 1
                },
                "XUIErrorDialogImpl": {
                    "resources": ["7MNFg", "NvNVO", "C4Qrf", "H+MB7", "fxI5n", "SG1mE", "L61b2", "4PpBg"],
                    "module": 1
                },
                "UFIUploader": {
                    "resources": ["C4Qrf", "7MNFg", "NvNVO", "H+MB7", "q5aYo", "L61b2", "l2VbO", "N7VAi", "86OXr", "AKrK2", "Klc20", "fxI5n", "SG1mE", "wE\/xn"],
                    "module": 1
                },
                "XUIAmbientNUX.react": {
                    "resources": ["H+MB7", "C4Qrf", "NvNVO", "7MNFg", "fxI5n", "SG1mE", "L61b2"],
                    "module": 1
                },
                "ChatContentSearchFlyout.react": {
                    "resources": ["C4Qrf", "NvNVO", "7MNFg", "H+MB7", "Oaixm", "kF1+E", "m0+Xc", "L\/o5n", "N1Ese", "l5JP5", "SG1mE", "q5aYo", "rT6UW", "UhwBa", "l2VbO"],
                    "module": 1
                },
                "ContextualLayerAutoFlip": {"resources": ["C4Qrf", "7MNFg", "L61b2", "NvNVO"], "module": 1},
                "XUIContextualDialog.react": {
                    "resources": ["7MNFg", "fxI5n", "H+MB7", "C4Qrf", "NvNVO", "SG1mE", "L61b2", "cU20Y"],
                    "module": 1
                },
                "LayerTabIsolation": {"resources": ["7MNFg", "C4Qrf", "NvNVO", "H+MB7"], "module": 1},
                "RelayRootContainer": {
                    "resources": ["H+MB7", "C4Qrf", "NvNVO", "7MNFg", "LODME", "OyMEr", "5jCZU", "rT6UW", "SG1mE", "eKl0S"],
                    "module": 1
                },
                "StickersStore.react": {
                    "resources": ["H+MB7", "C4Qrf", "NvNVO", "7MNFg", "SG1mE", "LODME", "OyMEr", "5jCZU", "rT6UW", "eKl0S", "q5aYo", "m0+Xc", "N87OS", "3py3C", "lhILs", "YZbYy", "fxI5n", "622TF", "Yp86W", "L61b2"],
                    "module": 1
                },
                "StickersStorePackDetailRoute": {
                    "resources": ["OyMEr", "5jCZU", "rT6UW", "H+MB7", "C4Qrf", "NvNVO", "7MNFg", "3py3C"],
                    "module": 1
                },
                "StickersStorePackListRoute": {
                    "resources": ["OyMEr", "5jCZU", "rT6UW", "H+MB7", "C4Qrf", "NvNVO", "7MNFg", "3py3C"],
                    "module": 1
                },
                "StickersFlyout.react": {
                    "resources": ["H+MB7", "C4Qrf", "NvNVO", "7MNFg", "rT6UW", "4m8bm", "IRdom", "SG1mE", "q5aYo", "LODME", "OyMEr", "5jCZU", "eKl0S", "qNXTU", "lhILs", "L61b2", "ioKV2", "AKrK2", "fxI5n", "N87OS", "hb6pC", "+xnR3", "YZbYy", "m0+Xc", "aVCxl", "yv18k", "Xlgw2", "l2VbO"],
                    "module": 1
                },
                "AsyncDialog": {
                    "resources": ["C4Qrf", "7MNFg", "NvNVO", "H+MB7", "L61b2", "SG1mE", "AKrK2"],
                    "module": 1
                },
                "EmoticonUtils": {"resources": ["7MNFg", "m0+Xc", "B59af"], "module": 1},
                "EmoticonsList": {"resources": ["7MNFg", "m0+Xc"], "module": 1},
                "MercuryThreadInformer": {"resources": ["NvNVO", "q5aYo", "N1Ese", "C4Qrf"], "module": 1},
                "FantaReducersGetMessages": {
                    "resources": ["C4Qrf", "7MNFg", "NvNVO", "H+MB7", "q5aYo", "hb6pC", "N1Ese", "aVCxl", "\/MqEz", "l5JP5", "rT6UW", "dEveg", "L61b2", "SG1mE", "AKrK2", "qNXTU", "9qqae", "JOCcf"],
                    "module": 1
                },
                "FantaTabActions": {
                    "resources": ["C4Qrf", "NvNVO", "7MNFg", "H+MB7", "q5aYo", "hb6pC", "aVCxl"],
                    "module": 1
                },
                "MercurySourceType": {"resources": ["N1Ese"], "module": 1},
                "SelectionPosition": {"resources": ["7MNFg", "NvNVO", "C4Qrf", "H+MB7", "L61b2", "B59af"], "module": 1},
                "TextAreaControl": {"resources": ["NvNVO", "7MNFg", "C4Qrf", "LHkVX"], "module": 1},
                "OptimisticVideoComment.react": {
                    "resources": ["H+MB7", "C4Qrf", "NvNVO", "7MNFg", "SG1mE", "86OXr", "L61b2", "qvtq4", "vD9cb", "AKrK2", "m0+Xc", "IrfhN", "rT6UW", "u3GKY"],
                    "module": 1
                },
                "Sticker.react": {
                    "resources": ["C4Qrf", "aVCxl", "H+MB7", "NvNVO", "7MNFg", "yv18k", "SG1mE", "Xlgw2", "qNXTU"],
                    "module": 1
                },
                "UFIAttachedMediaPreview.react": {
                    "resources": ["H+MB7", "C4Qrf", "NvNVO", "7MNFg", "HOBeP", "SG1mE", "l2VbO", "q5aYo", "RBaNL", "u3GKY", "D7cRT"],
                    "module": 1
                },
                "UFICommentMarkdownPreview.react": {
                    "resources": ["H+MB7", "C4Qrf", "NvNVO", "7MNFg", "L61b2", "SG1mE", "AKrK2", "fxI5n", "1ixP5", "WITvF", "G+Bj3", "UW42s", "0Qz\/x", "Hnz7V"],
                    "module": 1
                },
                "UFICommentMessengerGroupsPrompt.react": {
                    "resources": ["H+MB7", "C4Qrf", "NvNVO", "7MNFg", "cU20Y", "yv18k", "K7OiS", "sNDhQ"],
                    "module": 1
                },
                "UFICommentMessengerPrompt.react": {
                    "resources": ["H+MB7", "C4Qrf", "NvNVO", "7MNFg", "q5aYo", "m0+Xc", "A6qm+", "RBaNL", "SG1mE", "K7OiS", "XRiHe"],
                    "module": 1
                },
                "XMessengerAssociatedObjectGroupCreateController": {"resources": ["NvNVO", "6u8zn"], "module": 1},
                "LiveSendTipButtonUtil": {
                    "resources": ["C4Qrf", "NvNVO", "7MNFg", "L61b2", "q5aYo", "SJdHB", "tLIO\/"],
                    "module": 1
                },
                "PhotoSnowlift": {
                    "resources": ["C4Qrf", "7MNFg", "NvNVO", "H+MB7", "L61b2", "l2VbO", "z9cNF", "SG1mE", "86OXr", "q5aYo", "AKrK2", "OyMEr", "m0+Xc", "A6qm+", "RBaNL", "5pQk8", "qvtq4", "W1Q1L", "THVgE", "+GBbh"],
                    "module": 1
                },
                "VideoChannel": {"resources": ["HoLZD"], "module": 1},
                "AsyncResponse": {"resources": ["C4Qrf"], "module": 1},
                "FormSubmit": {"resources": ["C4Qrf", "7MNFg", "NvNVO", "H+MB7", "L61b2", "soWdG"], "module": 1},
                "Live": {"resources": ["7MNFg", "NvNVO", "d25Q1", "q5aYo"], "module": 1},
                "PhotoInlineEditor": {
                    "resources": ["7MNFg", "NvNVO", "z9cNF", "C4Qrf", "LHkVX", "H+MB7", "L61b2", "q5aYo", "hx5h1", "0haZm", "iUZKT"],
                    "module": 1
                },
                "PhotoTagApproval": {"resources": ["7MNFg", "NvNVO", "z9cNF", "\/mnVq"], "module": 1},
                "PhotoTagger": {
                    "resources": ["C4Qrf", "7MNFg", "NvNVO", "H+MB7", "HOBeP", "HJFN1", "N1Ese", "FdUGE", "fxI5n", "SG1mE", "L61b2", "aFnoQ", "RBaNL", "DMMZ1", "z9cNF", "q5aYo", "A6qm+", "m0+Xc", "IFCu0", "HoLZD", "qCBZX", "LmDP6", "bT3tk"],
                    "module": 1
                },
                "PhotoTags": {"resources": ["7MNFg", "NvNVO", "z9cNF", "C4Qrf", "\/mnVq"], "module": 1},
                "PhotosButtonTooltips": {
                    "resources": ["C4Qrf", "7MNFg", "NvNVO", "H+MB7", "L61b2", "SG1mE", "KZclV"],
                    "module": 1
                },
                "TagTokenizer": {
                    "resources": ["7MNFg", "NvNVO", "C4Qrf", "q5aYo", "hx5h1", "H+MB7", "0haZm", "\/mnVq", "L61b2", "LHkVX"],
                    "module": 1
                },
                "VideoRotate": {
                    "resources": ["C4Qrf", "7MNFg", "NvNVO", "H+MB7", "L61b2", "l2VbO", "6AU0l"],
                    "module": 1
                },
                "css:fb-photos-snowlift-fullscreen-css": {"resources": ["N97KJ"]},
                "AsyncRequest": {"resources": ["C4Qrf", "7MNFg", "NvNVO", "H+MB7"], "module": 1},
                "DOM": {"resources": ["7MNFg", "NvNVO"], "module": 1},
                "GroupCommerceProductDetail.react": {
                    "resources": ["C4Qrf", "7MNFg", "NvNVO", "H+MB7", "FSepT", "SG1mE", "q5aYo", "m0+Xc", "5pQk8", "LODME", "OyMEr", "5jCZU", "rT6UW", "eKl0S", "qvtq4", "L61b2", "cUuvY", "zgXJ\/", "fxI5n", "VZgf8", "cU20Y", "GcJiN", "PbXPh", "AKrK2"],
                    "module": 1
                },
                "RTISubscriptionManager": {
                    "resources": ["q5aYo", "SG1mE", "C4Qrf", "NvNVO", "DMMZ1", "7MNFg"],
                    "module": 1
                },
                "ContextualProfileModal.react": {
                    "resources": ["C4Qrf", "H+MB7", "SG1mE", "NvNVO", "86OXr", "7MNFg", "L61b2", "atKg2", "LODME", "aLhMM", "q5aYo", "m0+Xc", "fxI5n", "wnL4N", "e6mDb", "IyKeg", "OCE5W", "aVCxl", "DMMZ1", "rT6UW", "OyMEr", "oIpgN", "9sOHI", "5aJU6", "jtoBB", "C6Cce", "qvtq4", "iUr6E", "AKrK2", "Mu870", "E8VfU"],
                    "module": 1
                },
                "MarketplaceSellerItemsFeedWrapper.react": {
                    "resources": ["H+MB7", "C4Qrf", "NvNVO", "7MNFg", "eKl0S", "m0+Xc", "SG1mE", "qvtq4", "ighLF", "mXCcp", "q5aYo", "MkZIW", "LODME", "OyMEr", "5jCZU", "rT6UW", "aLhMM", "oIpgN", "OCE5W", "aVCxl", "DMMZ1", "oUSIN", "KiqBZ", "86OXr", "L61b2", "qnQ9r", "XTfys", "ojovk", "cU20Y", "hb6pC", "tInKH", "AKrK2", "fxI5n", "DTekJ", "9sOHI", "RBaNL", "aFnoQ"],
                    "module": 1
                },
                "MarketplacePermalinkRender": {
                    "resources": ["7MNFg", "C4Qrf", "NvNVO", "H+MB7", "iUr6E", "SG1mE", "L61b2", "AKrK2", "fxI5n", "qvtq4", "LODME", "OyMEr", "5jCZU", "rT6UW", "eKl0S", "MkZIW", "q5aYo", "GcJiN", "nFEnK", "YZbYy", "ojovk", "m0+Xc", "KiqBZ", "aLhMM", "oIpgN", "OCE5W", "aVCxl", "DMMZ1", "ighLF", "052rB", "86OXr", "Bcsxa", "LHkVX", "aFnoQ", "PbXPh", "RDCL5", "H0kNa", "stMI3", "5pQk8", "cU20Y", "lvtG\/", "hb6pC", "tInKH", "zgXJ\/", "sfMlF", "qnQ9r", "XTfys", "N7VAi", "RBaNL"],
                    "module": 1
                },
                "MarketplaceSnowliftRoute": {
                    "resources": ["LODME", "OyMEr", "5jCZU", "SG1mE", "NvNVO", "C4Qrf", "rT6UW", "H+MB7", "7MNFg", "eKl0S", "MkZIW"],
                    "module": 1
                },
                "Parent": {"resources": [], "module": 1},
                "URI": {"resources": [], "module": 1},
                "XSalesPromoWWWDetailsDialogAsyncController": {"resources": ["NvNVO", "iooGB"], "module": 1},
                "csx": {"resources": ["C4Qrf"], "module": 1},
                "PhotoSnowliftViewableWithContextMenuLogging": {
                    "resources": ["7MNFg", "C4Qrf", "NvNVO", "ZSYjA"],
                    "module": 1
                },
                "PhotoSnowliftViewableWithShieldIconOverlay": {
                    "resources": ["7MNFg", "NvNVO", "WzFun", "GS6t9", "hQqGz"],
                    "module": 1
                },
                "CompactTypeaheadRenderer": {
                    "resources": ["7MNFg", "NvNVO", "C4Qrf", "H+MB7", "q5aYo", "3GkYb", "m0+Xc", "SG1mE", "hb6pC"],
                    "module": 1
                },
                "ContextualTypeaheadView": {
                    "resources": ["7MNFg", "NvNVO", "C4Qrf", "H+MB7", "q5aYo", "c5Gu+", "3GkYb", "L61b2"],
                    "module": 1
                },
                "InputSelection": {"resources": ["7MNFg", "NvNVO", "C4Qrf", "H+MB7", "L61b2"], "module": 1},
                "HashtagParser": {"resources": ["l2VbO", "c5Gu+", "6qvM\/"], "module": 1},
                "MentionsInput": {
                    "resources": ["NvNVO", "7MNFg", "C4Qrf", "L61b2", "H+MB7", "Jk05E", "q5aYo", "cF0f1", "86OXr"],
                    "module": 1
                },
                "Typeahead": {"resources": ["NvNVO", "L61b2", "7MNFg", "C4Qrf", "c5Gu+"], "module": 1},
                "TypeaheadAreaCore": {
                    "resources": ["7MNFg", "NvNVO", "C4Qrf", "H+MB7", "L61b2", "LHkVX", "3GkYb", "Jk05E"],
                    "module": 1
                },
                "TypeaheadBestName": {"resources": ["q5aYo", "Jk05E"], "module": 1},
                "TypeaheadHoistFriends": {"resources": ["Jk05E"], "module": 1},
                "TypeaheadMetrics": {"resources": ["C4Qrf", "7MNFg", "NvNVO", "H+MB7", "HOBeP", "Jk05E"], "module": 1},
                "TypeaheadMetricsX": {"resources": ["7MNFg", "C4Qrf", "NvNVO", "H+MB7", "HOBeP", "zr0bA"], "module": 1},
                "TypingDetector": {"resources": ["NvNVO", "7MNFg", "C4Qrf", "hb6pC", "\/e7VC"], "module": 1},
                "UFIComments": {
                    "resources": ["C4Qrf", "q5aYo", "IFCu0", "H+MB7", "NvNVO", "7MNFg", "SG1mE"],
                    "module": 1
                },
                "KeyframesEnvironment": {"resources": ["1gMCs", "NvNVO", "C4Qrf"], "module": 1},
                "SpatialReactionClickAnimation": {
                    "resources": ["q5aYo", "rT6UW", "eKl0S", "Wd7vR", "C4Qrf", "NvNVO", "7MNFg", "H+MB7", "SG1mE", "g6aG0", "L61b2", "mH\/cm", "HoLZD", "U8IIn", "IFCu0", "PEFH4", "By3X4"],
                    "module": 1
                },
                "SpatialReactionFunnelLoggingStore": {
                    "resources": ["q5aYo", "C4Qrf", "NvNVO", "7MNFg", "L61b2", "g6aG0", "eKl0S", "rT6UW", "mH\/cm", "HoLZD", "Wd7vR", "H+MB7", "SG1mE"],
                    "module": 1
                },
                "SpatialReactionsProductionStore": {
                    "resources": ["q5aYo", "mH\/cm", "g6aG0", "7MNFg", "NvNVO", "L61b2", "C4Qrf", "eKl0S", "rT6UW", "HoLZD", "Wd7vR", "H+MB7", "SG1mE", "IFCu0", "PEFH4"],
                    "module": 1
                },
                "SphericalVideoComponentActions": {
                    "resources": ["C4Qrf", "NvNVO", "7MNFg", "H+MB7", "q5aYo", "SG1mE", "Wd7vR"],
                    "module": 1
                },
                "Keyframes": {
                    "resources": ["AKrK2", "C4Qrf", "NvNVO", "7MNFg", "4X\/kF", "L61b2", "q5aYo", "1gMCs", "SG1mE", "H+MB7", "mH\/cm", "KQ+lo", "4Ds\/J"],
                    "module": 1
                },
                "UFIReactionsAnimationPreloader": {
                    "resources": ["7MNFg", "NvNVO", "SG1mE", "C4Qrf", "1gMCs", "4Ds\/J", "tbpl5"],
                    "module": 1
                },
                "UFIReactionsMenuImpl.react": {
                    "resources": ["7MNFg", "C4Qrf", "H+MB7", "NvNVO", "SG1mE", "m0+Xc", "eKl0S", "q5aYo", "iSCKE", "By3X4", "L61b2", "mH\/cm", "g6aG0", "rT6UW", "Wd7vR", "HoLZD", "U8IIn", "IFCu0", "PEFH4", "vD9cb", "YRGqf", "A6qm+"],
                    "module": 1
                },
                "UFIReactionsMenuWithAnimatedIcons.react": {
                    "resources": ["NvNVO", "SG1mE", "C4Qrf", "1gMCs", "H+MB7", "7MNFg", "AKrK2", "4X\/kF", "L61b2", "q5aYo", "mH\/cm", "KQ+lo", "4Ds\/J", "Z8zAh", "m0+Xc", "eKl0S", "iSCKE", "By3X4", "g6aG0", "rT6UW", "Wd7vR", "HoLZD", "U8IIn", "IFCu0", "PEFH4", "vD9cb", "YRGqf", "A6qm+"],
                    "module": 1
                },
                "UFIReactionsNUX.react": {
                    "resources": ["C4Qrf", "7MNFg", "NvNVO", "H+MB7", "A6qm+", "fxI5n", "SG1mE", "L61b2", "+g5ut"],
                    "module": 1
                },
                "createCancelableFunction": {"resources": [], "module": 1},
                "DOMScroll": {"resources": ["7MNFg", "NvNVO", "C4Qrf"], "module": 1},
                "LegacyContextualDialog": {
                    "resources": ["7MNFg", "NvNVO", "C4Qrf", "HJFN1", "H+MB7", "L61b2", "fxI5n", "CDwUw", "ozlra", "8aeA9"],
                    "module": 1
                },
                "UFICommentMarkdownFormattedLink.react": {
                    "resources": ["H+MB7", "C4Qrf", "NvNVO", "7MNFg", "q5aYo", "A6qm+", "RBaNL", "m0+Xc", "IFCu0", "L61b2", "SG1mE", "AKrK2", "fxI5n", "86OXr", "1ixP5", "9EMwh"],
                    "module": 1
                },
                "UFICreatorInfo.react": {
                    "resources": ["H+MB7", "C4Qrf", "NvNVO", "7MNFg", "SG1mE", "q5aYo", "qnQ9r", "XTfys", "dEveg"],
                    "module": 1
                },
                "UFIReactionsTooltipImpl.react": {
                    "resources": ["C4Qrf", "7MNFg", "NvNVO", "H+MB7", "SG1mE", "L61b2", "m0+Xc", "XSlbU", "\/aUHJ"],
                    "module": 1
                },
                "UFICommentShareNUX.react": {
                    "resources": ["C4Qrf", "7MNFg", "NvNVO", "H+MB7", "L61b2", "A6qm+", "fxI5n", "SG1mE", "+VWNr"],
                    "module": 1
                },
                "Image.react": {"resources": ["H+MB7", "C4Qrf", "NvNVO", "7MNFg"], "module": 1},
                "MultiPlacePageInfoCard.react": {
                    "resources": ["C4Qrf", "7MNFg", "NvNVO", "H+MB7", "fxI5n", "q5aYo", "HOBeP", "QaPCm", "rT6UW", "L61b2", "SG1mE", "m0+Xc", "86OXr", "qvtq4", "cUuvY", "cKYdo", "AKrK2", "dH2O\/", "krylL", "qNXTU", "eKl0S", "zR2Ol", "q6BG6", "stMI3", "D64uR"],
                    "module": 1
                },
                "PageCommentQuestionMessageCard.react": {
                    "resources": ["C4Qrf", "NvNVO", "7MNFg", "aVCxl", "H+MB7", "q5aYo", "SG1mE", "hb6pC", "L61b2", "TeSw5", "Vgu\/8"],
                    "module": 1
                },
                "PlaceListLiveCommentAttachment.react": {
                    "resources": ["QaPCm", "zparn", "C4Qrf", "7MNFg", "NvNVO", "H+MB7", "fxI5n", "q5aYo", "HOBeP", "rT6UW", "L61b2", "SG1mE", "m0+Xc", "86OXr", "qvtq4", "cUuvY", "cKYdo", "AKrK2", "dH2O\/", "krylL", "qNXTU", "eKl0S", "zR2Ol", "q6BG6", "stMI3", "D64uR"],
                    "module": 1
                },
                "ProductRecommendationCard.react": {
                    "resources": ["C4Qrf", "7MNFg", "NvNVO", "H+MB7", "q5aYo", "L61b2", "bnzlq", "cKYdo", "SG1mE", "rT6UW", "m0+Xc", "l2VbO", "nGrLJ"],
                    "module": 1
                },
                "UFILiveCommentLinkPreviewArticleContextTrigger.react": {
                    "resources": ["C4Qrf", "7MNFg", "NvNVO", "H+MB7", "L61b2", "SG1mE", "AKrK2", "rta72", "tQFwg", "YVZUr"],
                    "module": 1
                },
                "UFILiveCommentLinkPreviewMisinfoWarningFooter.react": {
                    "resources": ["H+MB7", "C4Qrf", "NvNVO", "7MNFg", "YKWsK", "tHSMF", "kX9jp"],
                    "module": 1
                },
                "UFILiveCommentLinkPreview.react": {
                    "resources": ["H+MB7", "C4Qrf", "NvNVO", "7MNFg", "SG1mE", "Yp86W", "q5aYo", "m0+Xc", "RBaNL", "x6Zmh"],
                    "module": 1
                },
                "ConstituentBadge.react": {
                    "resources": ["C4Qrf", "NvNVO", "7MNFg", "Zpk7t", "H+MB7", "m0+Xc", "SG1mE", "RBaNL"],
                    "module": 1
                },
                "ContextualDialogArrow": {"resources": ["7MNFg", "NvNVO", "SG1mE", "C4Qrf", "L61b2"], "module": 1},
                "PopoverMenu.react": {
                    "resources": ["H+MB7", "C4Qrf", "NvNVO", "7MNFg", "SG1mE", "L61b2", "AKrK2", "eKl0S"],
                    "module": 1
                },
                "ReactXUIMenu": {
                    "resources": ["L61b2", "7MNFg", "NvNVO", "C4Qrf", "H+MB7", "SG1mE", "eKl0S"],
                    "module": 1
                },
                "XUIMenuSeparator.react": {
                    "resources": ["7MNFg", "NvNVO", "H+MB7", "C4Qrf", "L61b2", "eKl0S", "XTfys"],
                    "module": 1
                },
                "UFICommentRemovalControls.react": {
                    "resources": ["H+MB7", "C4Qrf", "NvNVO", "7MNFg", "q5aYo", "86OXr", "RBaNL", "XPepI"],
                    "module": 1
                },
                "UFIJoinEvent.react": {
                    "resources": ["H+MB7", "C4Qrf", "NvNVO", "7MNFg", "XTfys", "SG1mE", "CKTEV"],
                    "module": 1
                },
                "UFILiveVideoAnnouncementCTAContainer.react": {
                    "resources": ["q5aYo", "H+MB7", "C4Qrf", "NvNVO", "7MNFg", "SG1mE", "jBayo", "L61b2", "l2VbO", "A6qm+", "rT6UW", "eKl0S", "sfMlF", "lgUKM", "fxDBi", "xWt\/K"],
                    "module": 1
                },
                "UFIScrollHighlight": {
                    "resources": ["7MNFg", "NvNVO", "C4Qrf", "H+MB7", "L61b2", "Xlgw2", "GJSTr", "rSdpp"],
                    "module": 1
                },
                "SphericalPhotoEditThumbnail.react": {
                    "resources": ["yGvRs", "H+MB7", "C4Qrf", "NvNVO", "7MNFg", "rOw4b", "z9cNF", "g05Da", "h28\/n", "nN+Px", "rT6UW", "L61b2", "l2VbO", "SG1mE", "W1Q1L", "qvtq4", "wPi2g", "U8IIn", "YRGqf", "7dmjT", "86OXr", "5pQk8", "QiNcl", "cU20Y", "yv18k", "IpFdO", "AKrK2", "fxI5n", "nFEnK", "7gxGj"],
                    "module": 1
                },
                "CubestripSphericalWebGLRenderer": {
                    "resources": ["7MNFg", "C4Qrf", "U8IIn", "QiNcl", "yGvRs", "NvNVO", "Oxt9\/"],
                    "module": 1
                },
                "CylindricalSphericalWebGLRenderer": {
                    "resources": ["7MNFg", "C4Qrf", "U8IIn", "QiNcl", "yGvRs", "iCW82"],
                    "module": 1
                },
                "EquirectSphericalWebGLRenderer": {
                    "resources": ["7MNFg", "C4Qrf", "U8IIn", "QiNcl", "yGvRs", "cGHec"],
                    "module": 1
                },
                "SphericalPhotoTagLoggingUtil": {
                    "resources": ["z9cNF", "lhuyT", "C4Qrf", "NvNVO", "7MNFg"],
                    "module": 1
                },
                "SphericalPhotoViewerLoggingUtil": {
                    "resources": ["z9cNF", "C4Qrf", "NvNVO", "7MNFg", "lhuyT"],
                    "module": 1
                },
                "SphericalMediaGyroOverlay.redux": {
                    "resources": ["H+MB7", "C4Qrf", "NvNVO", "7MNFg", "rOw4b", "SG1mE", "W1Q1L", "z9cNF", "TYshe"],
                    "module": 1
                },
                "SphericalMediaMouseOverlay.redux": {
                    "resources": ["H+MB7", "C4Qrf", "NvNVO", "7MNFg", "rOw4b", "z9cNF", "SG1mE", "W1Q1L", "qvtq4", "wPi2g"],
                    "module": 1
                },
                "SphericalPhotoHeadingIndicator.redux": {
                    "resources": ["7MNFg", "C4Qrf", "q5aYo", "H+MB7", "NvNVO", "rOw4b", "z9cNF", "Wd7vR", "U8IIn", "qvtq4", "yGvRs", "wPi2g"],
                    "module": 1
                },
                "SphericalPhotoTagging.redux": {
                    "resources": ["H+MB7", "C4Qrf", "NvNVO", "7MNFg", "rOw4b", "z9cNF", "Wd7vR", "qvtq4", "7gxGj", "U8IIn", "yGvRs", "wPi2g"],
                    "module": 1
                },
                "SphericalPhotoViewer.react": {
                    "resources": ["H+MB7", "C4Qrf", "NvNVO", "7MNFg", "rOw4b", "z9cNF", "yGvRs", "U8IIn", "YRGqf", "7dmjT", "qvtq4", "L61b2", "SG1mE", "86OXr", "5pQk8", "QiNcl", "rT6UW"],
                    "module": 1
                },
                "SphericalPhotoEditLoggingUtil": {
                    "resources": ["C4Qrf", "NvNVO", "7MNFg", "H+MB7", "z9cNF", "lhuyT", "yGvRs", "Lb6GD"],
                    "module": 1
                },
                "genBlobFromLoadedImg": {
                    "resources": ["7MNFg", "NvNVO", "z9cNF", "fpIP5", "\/mjqi", "AKrK2", "vD9cb", "C4Qrf", "SG1mE", "H+MB7", "yyXVJ"],
                    "module": 1
                },
                "genLoadedImgFromURL": {"resources": ["7MNFg", "NvNVO", "W0bFH"], "module": 1},
                "scaleToTargetLongEdge": {"resources": ["s0z3j"], "module": 1},
                "SphericalPhotoTagDialog.redux": {
                    "resources": ["7MNFg", "NvNVO", "H+MB7", "L61b2", "C4Qrf", "rOw4b", "z9cNF", "yGvRs", "g05Da", "SG1mE", "86OXr", "l2VbO", "IpFdO", "TQNEf", "aFnoQ", "5pQk8", "FHWhP", "U8IIn", "Wd7vR", "wPi2g", "YRGqf", "7dmjT", "qvtq4", "7gxGj", "QiNcl", "AKrK2", "fxI5n", "nFEnK"],
                    "module": 1
                },
                "SphericalMediaTaggingUtils": {"resources": ["U8IIn", "yGvRs"], "module": 1},
                "PhotosConst": {"resources": ["z9cNF"], "module": 1},
                "Hovercard": {
                    "resources": ["C4Qrf", "7MNFg", "NvNVO", "H+MB7", "N1Ese", "FdUGE", "fxI5n", "SG1mE", "L61b2", "aFnoQ"],
                    "module": 1
                },
                "Toggler": {"resources": ["NvNVO", "C4Qrf", "H+MB7", "7MNFg", "AKrK2"], "module": 1},
                "Tooltip": {"resources": ["C4Qrf", "7MNFg", "NvNVO", "H+MB7", "L61b2", "SG1mE"], "module": 1},
                "Form": {"resources": ["7MNFg", "NvNVO", "C4Qrf", "L61b2"], "module": 1},
                "Input": {"resources": ["NvNVO"], "module": 1},
                "trackReferrer": {"resources": [], "module": 1}
            });
        }
    });</script>
<script>requireLazy(["InitialJSLoader"], function (InitialJSLoader) {
        InitialJSLoader.loadOnDOMContentReady(["H+MB7", "mdXGU", "L61b2", "NvNVO", "C4Qrf", "BhyL\/", "SG1mE", "AKrK2", "fxI5n", "P\/mr5"]);
    });</script>
<script>require("TimeSlice").guard(function () {
        require("ServerJSDefine").handleDefines([]);
        require("InitialJSLoader").handleServerJS({
            "instances": [["__inst_5b4d0c00_0_0", ["Menu", "XUIMenuWithSquareCorner", "XUIMenuTheme"], [[], {
                "id": "u_0_0",
                "behaviors": [{"__m": "XUIMenuWithSquareCorner"}],
                "theme": {"__m": "XUIMenuTheme"}
            }], 2], ["__inst_e5ad243d_0_0", ["PopoverMenu", "__inst_1de146dc_0_0", "__elem_ec77afbd_0_0", "__inst_5b4d0c00_0_0"], [{"__m": "__inst_1de146dc_0_0"}, {"__m": "__elem_ec77afbd_0_0"}, {"__m": "__inst_5b4d0c00_0_0"}, []], 1], ["__inst_1de146dc_0_0", ["Popover", "__elem_1de146dc_0_0", "__elem_ec77afbd_0_0", "ContextualLayerAutoFlip", "ContextualDialogArrow"], [{"__m": "__elem_1de146dc_0_0"}, {"__m": "__elem_ec77afbd_0_0"}, [{"__m": "ContextualLayerAutoFlip"}, {"__m": "ContextualDialogArrow"}], {
                "alignh": "right",
                "position": "below"
            }], 2], ["__inst_5b4d0c00_0_1", ["Menu", "MenuItem", "__markup_3310c079_0_0", "__markup_3310c079_0_1", "__markup_3310c079_0_2", "XUIMenuWithSquareCorner", "XUIMenuTheme"], [[{
                "value": "key_shortcuts",
                "ctor": {"__m": "MenuItem"},
                "markup": {"__m": "__markup_3310c079_0_0"},
                "label": "News Feed keyboard shortcuts...",
                "title": "",
                "className": null
            }, {
                "href": "https:\/\/www.facebook.com\/help\/accessibility",
                "target": "_blank",
                "ctor": {"__m": "MenuItem"},
                "markup": {"__m": "__markup_3310c079_0_1"},
                "label": "Accessibility Help Center",
                "title": "",
                "className": null
            }, {
                "href": "https:\/\/www.facebook.com\/help\/contact\/accessibility",
                "target": "_blank",
                "ctor": {"__m": "MenuItem"},
                "markup": {"__m": "__markup_3310c079_0_2"},
                "label": "Submit feedback",
                "title": "",
                "className": null
            }], {
                "id": "u_0_1",
                "behaviors": [{"__m": "XUIMenuWithSquareCorner"}],
                "theme": {"__m": "XUIMenuTheme"}
            }], 2], ["__inst_e5ad243d_0_1", ["PopoverMenu", "__inst_1de146dc_0_1", "__elem_ec77afbd_0_1", "__inst_5b4d0c00_0_1"], [{"__m": "__inst_1de146dc_0_1"}, {"__m": "__elem_ec77afbd_0_1"}, {"__m": "__inst_5b4d0c00_0_1"}, []], 1], ["__inst_1de146dc_0_1", ["Popover", "__elem_1de146dc_0_1", "__elem_ec77afbd_0_1", "ContextualLayerAutoFlip", "ContextualDialogArrow"], [{"__m": "__elem_1de146dc_0_1"}, {"__m": "__elem_ec77afbd_0_1"}, [{"__m": "ContextualLayerAutoFlip"}, {"__m": "ContextualDialogArrow"}], {
                "alignh": "right",
                "position": "below"
            }], 2], ["__inst_ead1e565_0_0", ["DialogX", "LayerFadeOnHide", "LayerHideOnBlur", "LayerHideOnEscape", "DialogHideOnSuccess", "LayerHideOnTransition", "LayerRemoveOnHide", "__markup_a588f507_0_0"], [{
                "width": 445,
                "autohide": null,
                "titleID": "u_0_2",
                "redirectURI": null,
                "fixedTopPosition": null,
                "ignoreFixedTopInShortViewport": false,
                "label": null,
                "labelledBy": null,
                "modal": true,
                "xui": true,
                "addedBehaviors": [{"__m": "LayerFadeOnHide"}, {"__m": "LayerHideOnBlur"}, {"__m": "LayerHideOnEscape"}, {"__m": "DialogHideOnSuccess"}, {"__m": "LayerHideOnTransition"}, {"__m": "LayerRemoveOnHide"}],
                "classNames": ["_2rs6"]
            }, {"__m": "__markup_a588f507_0_0"}], 2]],
            "markup": [["__markup_3310c079_0_0", {"__html": "News Feed keyboard shortcuts..."}, 1], ["__markup_3310c079_0_1", {"__html": "Accessibility Help Center"}, 1], ["__markup_3310c079_0_2", {"__html": "Submit feedback"}, 1], ["__markup_a588f507_0_0", {"__html": "\u003Cdiv>\u003Cdiv class=\"_4-i0\">\u003Cdiv class=\"clearfix\">\u003Cdiv class=\"_51-u rfloat _ohf\">\u003Ca class=\"_42ft _5upp _50zy layerCancel _51-t _50-0 _50z-\" role=\"button\" href=\"#\" title=\"Close\">Close\u003C\/a>\u003C\/div>\u003Cdiv>\u003Ch3 id=\"u_0_2\" class=\"_52c9\">Confirm Your Birthday\u003C\/h3>\u003C\/div>\u003C\/div>\u003C\/div>\u003Cdiv class=\"_4-i2 _pig _50f4\">Is \u003Cspan class=\"_2rs9\">September 20, 1999\u003C\/span> your birthday?\u003C\/div>\u003Cdiv class=\"_5lnf uiOverlayFooter _5a8u\">\u003Ca class=\"_42ft _4jy0 layerCancel _2rsa uiOverlayButton _4jy3 _517h _51sy\" role=\"button\" href=\"#\">No\u003C\/a>\u003Cbutton value=\"1\" class=\"_42ft _4jy0 layerConfirm _2rsa uiOverlayButton _4jy3 _4jy1 selected _51sy\" type=\"submit\">Yes\u003C\/button>\u003C\/div>\u003C\/div>"}, 1], ["__markup_a588f507_0_1", {"__html": "\u003Cdiv class=\"_5633 _5634\">You must fill in all of the fields.\u003C\/div>"}, 1], ["__markup_9f5fac15_0_0", {"__html": "\u003Cdiv class=\"_5633 _5634\">What\u2019s your name?\u003C\/div>"}, 1], ["__markup_9f5fac15_0_1", {"__html": "\u003Cdiv class=\"_5633 _5634\">You&#039;ll use this when you log in and if you ever need to reset your password.\u003C\/div>"}, 1], ["__markup_9f5fac15_0_2", {"__html": "\u003Cdiv class=\"_5633 _5634\">Enter a combination of at least six numbers, letters and punctuation marks (like ! and &amp;).\u003C\/div>"}, 1], ["__markup_a588f507_0_2", {"__html": "\u003Cdiv class=\"_5633 _5634\">Please enter a valid email address.\u003C\/div>"}, 1], ["__markup_9f5fac15_0_3", {"__html": "\u003Cdiv class=\"_5633 _5634\">Please enter a valid email address or mobile number.\u003C\/div>"}, 1], ["__markup_a588f507_0_3", {"__html": "\u003Cdiv class=\"_5633 _5634\">Please enter a valid mobile number or email address.\u003C\/div>"}, 1], ["__markup_a588f507_0_4", {"__html": "\u003Cdiv class=\"_5633 _5634\">Please re-enter your email address.\u003C\/div>"}, 1], ["__markup_9f5fac15_0_4", {"__html": "\u003Cdiv class=\"_5633 _5634\">Please re-enter your mobile number or email address.\u003C\/div>"}, 1], ["__markup_a588f507_0_5", {"__html": "\u003Cdiv class=\"_5633 _5634\">Your emails do not match. Please try again.\u003C\/div>"}, 1], ["__markup_a588f507_0_6", {"__html": "\u003Cdiv class=\"_5633 _5634\">Your emails or mobile numbers do not match. Please try again.\u003C\/div>"}, 1], ["__markup_9f5fac15_0_5", {"__html": "\u003Cdiv class=\"_5633 _5634\">Select your birthday. You can change who can see this later.\u003C\/div>"}, 1], ["__markup_9f5fac15_0_6", {"__html": "\u003Cdiv class=\"_5633 _5634\">Please choose a gender. You can change who can see this later.\u003C\/div>"}, 1]],
            "elements": [["__elem_85b7cbf7_0_0", "login_form", 1], ["__elem_835c633a_0_0", "login_form", 1], ["__elem_1edd4980_0_0", "loginbutton", 1], ["__elem_f46f4946_0_0", "u_0_4", 1], ["__elem_f46f4946_0_1", "u_0_5", 1], ["__elem_85b7cbf7_0_1", "reg", 1], ["__elem_835c633a_0_1", "reg", 1], ["__elem_9ae3fd6f_0_0", "u_0_8", 1], ["__elem_3f8a34cc_0_0", "u_0_9", 3], ["__elem_9ae3fd6f_0_1", "u_0_a", 1], ["__elem_3f8a34cc_0_1", "u_0_b", 3], ["__elem_9f5fac15_0_1", "u_0_c", 1], ["__elem_9ae3fd6f_0_2", "u_0_d", 1], ["__elem_3f8a34cc_0_2", "u_0_e", 2], ["__elem_9f5fac15_0_0", "u_0_f", 1], ["__elem_9ae3fd6f_0_3", "u_0_g", 1], ["__elem_3f8a34cc_0_3", "u_0_h", 2], ["__elem_9f5fac15_0_3", "u_0_i", 1], ["__elem_3f8a34cc_0_4", "u_0_j", 1], ["__elem_9f5fac15_0_2", "password_field", 1], ["__elem_9ae3fd6f_0_4", "u_0_k", 1], ["__elem_3f8a34cc_0_5", "u_0_l", 2], ["__elem_ffa3c607_0_0", "u_0_m", 1], ["__elem_2a23d31e_0_0", "u_0_n", 1], ["__elem_97e096cf_0_0", "u_0_o", 1], ["__elem_2a23d31e_0_1", "u_0_p", 1], ["__elem_5d172255_0_0", "u_0_q", 1], ["__elem_ddac73b6_0_0", "u_0_r", 1], ["__elem_da4ef9a3_0_0", "u_0_s", 1], ["__elem_a588f507_0_2", "captcha_buttons", 1], ["__elem_072b8e64_0_0", "u_0_t", 1], ["__elem_ddac73b6_0_1", "u_0_u", 1], ["__elem_da4ef9a3_0_1", "u_0_v", 1], ["__elem_a588f507_0_1", "reg_pages_msg", 1], ["__elem_3fc3da18_0_0", "u_0_w", 1], ["__elem_51be6cb7_0_0", "u_0_x", 1], ["__elem_1de146dc_0_0", "u_0_y", 1], ["__elem_ec77afbd_0_0", "u_0_z", 2], ["__elem_1de146dc_0_1", "u_0_10", 1], ["__elem_ec77afbd_0_1", "u_0_11", 2], ["__elem_45e94dd8_0_0", "pagelet_bluebar", 1], ["__elem_a588f507_0_0", "globalContainer", 2]],
            "require": [["WebPixelRatio", "startDetecting", [], [], []], ["ScriptPath", "set", [], ["\/", "a6bebc6e", {"imp_id": "96964a8d"}], []], ["UITinyViewportAction", "init", [], [], []], ["ResetScrollOnUnload", "init", ["__elem_a588f507_0_0"], [{"__m": "__elem_a588f507_0_0"}], []], ["AccessibilityWebVirtualCursorClickLogger", "init", ["__elem_45e94dd8_0_0", "__elem_a588f507_0_0"], [[{"__m": "__elem_45e94dd8_0_0"}, {"__m": "__elem_a588f507_0_0"}]], []], ["FocusRing", "init", [], [], []], ["WebStorageMonster", "schedule", [], [], []], ["NavigationAssistantController", "init", ["__elem_3fc3da18_0_0", "__elem_51be6cb7_0_0", "__inst_5b4d0c00_0_0", "__inst_5b4d0c00_0_1"], [{"__m": "__elem_3fc3da18_0_0"}, {"__m": "__elem_51be6cb7_0_0"}, {"__m": "__inst_5b4d0c00_0_0"}, {"__m": "__inst_5b4d0c00_0_1"}], []], ["__inst_e5ad243d_0_0"], ["__inst_1de146dc_0_0"], ["__inst_e5ad243d_0_1"], ["__inst_1de146dc_0_1"], ["AsyncRequestNectarLogging"], ["IntlUtils"], ["FBLynx", "setupDelegation", [], [], []], ["TimezoneAutoset", "setInputValue", ["__elem_f46f4946_0_0"], [{"__m": "__elem_f46f4946_0_0"}, 1505907717], []], ["ScreenDimensionsAutoSet", "setInputValue", ["__elem_f46f4946_0_1"], [{"__m": "__elem_f46f4946_0_1"}], []], ["LoginFormController", "init", ["__elem_835c633a_0_0", "__elem_1edd4980_0_0"], [{"__m": "__elem_835c633a_0_0"}, {"__m": "__elem_1edd4980_0_0"}, null, true], []], ["BrowserPrefillLogging", "initContactpointFieldLogging", [], [{
                "contactpointFieldID": "email",
                "serverPrefill": "areg_ghaz\u0040mail.ru"
            }], []], ["BrowserPrefillLogging", "initPasswordFieldLogging", [], [{"passwordFieldID": "pass"}], []], ["Sketch", "solveAndUpdateForm", [], ["e4a567ad148c3beb087f6fb0a108a1df", "55e138d95791d390df13d5d98f21d5f5", 5, "login_form"], []], ["FocusListener"], ["FlipDirectionOnKeypress"], ["Sketch", "solveAndUpdateForm", [], ["e4a567ad148c3beb087f6fb0a108a1df", "55e138d95791d390df13d5d98f21d5f5", 5, "reg"], []], ["__inst_ead1e565_0_0"], ["RegistrationController", "init", ["__elem_835c633a_0_1", "__elem_ddac73b6_0_0", "__elem_ddac73b6_0_1", "__elem_072b8e64_0_0", "__elem_5d172255_0_0", "__elem_a588f507_0_1", "__elem_a588f507_0_2", "__elem_da4ef9a3_0_0", "__elem_da4ef9a3_0_1", "__elem_9f5fac15_0_0", "__elem_9f5fac15_0_1", "__elem_9f5fac15_0_2", "__elem_9f5fac15_0_3", "__inst_ead1e565_0_0"], [{
                "regForm": {"__m": "__elem_835c633a_0_1"},
                "log_focus_name": "form_focus",
                "regButton": {"__m": "__elem_ddac73b6_0_0"},
                "captchaRegButton": {"__m": "__elem_ddac73b6_0_1"},
                "captchaBackButton": {"__m": "__elem_072b8e64_0_0"},
                "tos_container": {"__m": "__elem_5d172255_0_0"},
                "pages_link": {"__m": "__elem_a588f507_0_1"},
                "captcha_buttons": {"__m": "__elem_a588f507_0_2"},
                "async_status": {"__m": "__elem_da4ef9a3_0_0"},
                "captcha_async_status": {"__m": "__elem_da4ef9a3_0_1"},
                "confirmContactpointBehavior": "show_for_email-fade",
                "confirm_component": {"__m": "__elem_9f5fac15_0_0"},
                "errorMessageNewDesign": false,
                "email_component": {"__m": "__elem_9f5fac15_0_1"},
                "password_component": {"__m": "__elem_9f5fac15_0_2"},
                "show_tooltips": false,
                "second_cp_component": {"__m": "__elem_9f5fac15_0_3"},
                "no_phone_reg_link": null,
                "allow_email_reg_dialog": null,
                "shouldShowConfirmationDialog": true,
                "birthdayConfirmationDialog": {"__m": "__inst_ead1e565_0_0"},
                "prefilledBirthday": {"day": "20", "month": "9", "year": "1999"},
                "savePasswordNode": null,
                "characterThreshold": 0,
                "topEmailDomains": null
            }], []], ["RegistrationInlineValidations", "register", ["__elem_9ae3fd6f_0_0", "__elem_3f8a34cc_0_0"], [{"__m": "__elem_9ae3fd6f_0_0"}, {"__m": "__elem_3f8a34cc_0_0"}, "left", "flyout_design", true], []], ["RegistrationGenderPronounWarning", "registerNameInput", ["__elem_3f8a34cc_0_0"], ["firstname", {"__m": "__elem_3f8a34cc_0_0"}], []], ["StickyPlaceholderInput", "registerInput", ["__elem_3f8a34cc_0_0"], [{"__m": "__elem_3f8a34cc_0_0"}], []], ["RegistrationInlineValidations", "register", ["__elem_9ae3fd6f_0_1", "__elem_3f8a34cc_0_1"], [{"__m": "__elem_9ae3fd6f_0_1"}, {"__m": "__elem_3f8a34cc_0_1"}, "below", "flyout_design", true], []], ["RegistrationGenderPronounWarning", "registerNameInput", ["__elem_3f8a34cc_0_1"], ["lastname", {"__m": "__elem_3f8a34cc_0_1"}], []], ["StickyPlaceholderInput", "registerInput", ["__elem_3f8a34cc_0_1"], [{"__m": "__elem_3f8a34cc_0_1"}], []], ["RegistrationInlineValidations", "register", ["__elem_9ae3fd6f_0_2", "__elem_3f8a34cc_0_2"], [{"__m": "__elem_9ae3fd6f_0_2"}, {"__m": "__elem_3f8a34cc_0_2"}, "left", "flyout_design", true], []], ["StickyPlaceholderInput", "registerInput", ["__elem_3f8a34cc_0_2"], [{"__m": "__elem_3f8a34cc_0_2"}], []], ["RegistrationInlineValidations", "register", ["__elem_9ae3fd6f_0_3", "__elem_3f8a34cc_0_3"], [{"__m": "__elem_9ae3fd6f_0_3"}, {"__m": "__elem_3f8a34cc_0_3"}, "left", "flyout_design", true], []], ["StickyPlaceholderInput", "registerInput", ["__elem_3f8a34cc_0_3"], [{"__m": "__elem_3f8a34cc_0_3"}], []], ["StickyPlaceholderInput", "registerInput", ["__elem_3f8a34cc_0_4"], [{"__m": "__elem_3f8a34cc_0_4"}], []], ["RegistrationInlineValidations", "register", ["__elem_9ae3fd6f_0_4", "__elem_3f8a34cc_0_5"], [{"__m": "__elem_9ae3fd6f_0_4"}, {"__m": "__elem_3f8a34cc_0_5"}, "left", "flyout_design", true], []], ["StickyPlaceholderInput", "registerInput", ["__elem_3f8a34cc_0_5"], [{"__m": "__elem_3f8a34cc_0_5"}], []], ["RegistrationInlineValidations", "register", ["__elem_ffa3c607_0_0", "__elem_2a23d31e_0_0"], [{"__m": "__elem_ffa3c607_0_0"}, {"__m": "__elem_2a23d31e_0_0"}, "left", "flyout_design", false], []], ["RegistrationInlineValidations", "register", ["__elem_97e096cf_0_0", "__elem_2a23d31e_0_1"], [{"__m": "__elem_97e096cf_0_0"}, {"__m": "__elem_2a23d31e_0_1"}, "left", "flyout_design", false], []]]
        }, "h0");
    }, "ServerJS define", {"root": true})();

    onloadRegister_DEPRECATED(function () {
        useragentcm();
    });
    onloadRegister_DEPRECATED(function () {
        try {
            $("pass").focus();
        } catch (_ignore) {
        }
    });</script>
<!-- BigPipe construction and first response -->
<script>var bigPipe = new (require("BigPipe"))({"forceFinish": true, "__sf": "h0"});</script>
<script>bigPipe.beforePageletArrive("first_response")</script>
<script>require("TimeSlice").guard((function () {
        bigPipe.onPageletArrive({
            id: "first_response",
            phase: 0,
            jsmods: {},
            is_last: true,
            allResources: ["7MNFg", "0ZvDS", "H+MB7", "mdXGU", "L61b2", "NvNVO", "C4Qrf", "BhyL/", "SG1mE", "AKrK2", "44wiD", "f+J2L", "fxI5n", "P/mr5"],
            displayResources: ["7MNFg", "0ZvDS", "NvNVO", "44wiD", "f+J2L", "P/mr5"]
        });
    }), "onPageletArrive first_response", {"root": true, "pagelet": "first_response"})();</script>
<script>bigPipe.setPageID("6467824397345306123-0");
    CavalryLogger.setPageID("6467824397345306123-0");</script>
<script>bigPipe.beforePageletArrive("last_response")</script>
<script>require("TimeSlice").guard((function () {
        bigPipe.onPageletArrive({
            id: "last_response",
            phase: 1,
            jsmods: {
                require: [["CavalryLoggerImpl", "startInstrumentation", [], [], []], ["NavigationMetrics", "setPage", [], [{
                    page: "/",
                    page_type: "normal",
                    page_uri: "https://www.facebook.com/",
                    serverLID: "6467824397345306123-0"
                }], []], ["Chromedome", "start", [], [[]], []], ["DimensionTracking"], ["HighContrastMode", "init", [], [{
                    isHCM: false,
                    spacerImage: "https://www.facebook.com/rsrc.php/v3/y4/r/-PAXP-deijE.gif"
                }], []], ["ClickRefLogger"], ["DetectBrokenProxyCache", "run", [], [0, "c_user"], []], ["TimeSlice", "setLogging", [], [false, 0.01], []], ["NavigationClickPointHandler"], ["UserActionHistory"], ["ScriptPathLogger", "startLogging", [], [], []], ["TimeSpentBitArrayLogger", "init", [], [], []]],
                define: [["UACMConfig", [], {
                    ffver: 63083,
                    ffid1: "AcHrnOc8hdFYashOoUEKNngCSO0ZKw1kT4awmwzVhf5YQw4sxIIiICPb7Vm5BZCcB-0",
                    ffid2: "AcGG7unucVbahZCNZ4z7mogNgQVYrCSi9HFb5_Xhv8eGJegnFXGMCnXulpoiNsqOFSU",
                    ffid3: "AcF_CqHlXO6Yf1DUAUw9ZMNt-U1EBXf09W_OfVmzy72yAHlypZLjncOG9KOg3IYVd3kogMISeo6ucCT-eM_T6jsZ",
                    ffid4: "AcETbkmXsTy-BRHNgWxsFX4rlcM6L0twceH8P5jGoLU4WMQAc4pm4dDRlGIcU79dfyY"
                }, 308], ["CaptchaClientConfig", [], {recaptchaPublicKey: "6LfDxsYSAAAAAGGLBGaRurawNnbvAGQw5UwRWYXL"}, 83], ["RegistrationClientConfig", ["__markup_a588f507_0_1", "__markup_9f5fac15_0_0", "__markup_9f5fac15_0_1", "__markup_9f5fac15_0_2", "__markup_a588f507_0_2", "__markup_9f5fac15_0_3", "__markup_a588f507_0_3", "__markup_a588f507_0_4", "__markup_9f5fac15_0_4", "__markup_a588f507_0_5", "__markup_a588f507_0_6", "__markup_9f5fac15_0_5", "__markup_9f5fac15_0_6"], {
                    fields: {
                        NAME: "name",
                        FIRSTNAME: "firstname",
                        LASTNAME: "lastname",
                        EMAIL: "reg_email__",
                        EMAIL_CONFIRMATION: "reg_email_confirmation__",
                        SECOND_CONTACTPOINT: "reg_second_contactpoint__",
                        GENDER: "sex",
                        PASSWORD: "reg_passwd__",
                        BIRTHDAY_DAY: "birthday_day",
                        BIRTHDAY_MONTH: "birthday_month",
                        BIRTHDAY_YEAR: "birthday_year",
                        BIRTHDAY_WRAPPER: "birthday_wrapper",
                        GENDER_WRAPPER: "gender_wrapper"
                    },
                    tooltips: {
                        FIRSTNAME: "firstname_tooltip",
                        LASTNAME: "lastname_tooltip",
                        EMAIL: "email_tooltip",
                        EMAIL_CONFIRMATION: "email_confirmation_tooltip",
                        SECOND_CONTACTPOINT: "second_contactpoint_tooltip",
                        PASSWORD: "password_tooltip"
                    },
                    validators: {types: {TEXT: "text", SELECTORS: "selectors", RADIO: "radio"}},
                    messages: {
                        MISSING_FIELDS: {__m: "__markup_a588f507_0_1"},
                        INCORRECT_NAME: {__m: "__markup_9f5fac15_0_0"},
                        INCORRECT_CONTACTPOINT: {__m: "__markup_9f5fac15_0_1"},
                        PASSWORD_BLANK: {__m: "__markup_9f5fac15_0_2"},
                        INVALID_EMAIL: {__m: "__markup_a588f507_0_2"},
                        INVALID_CONTACTPOINT: {__m: "__markup_9f5fac15_0_3"},
                        INVALID_NUMBER_OR_EMAIL: {__m: "__markup_a588f507_0_3"},
                        INCORRECT_EMAIL_CONF: {__m: "__markup_a588f507_0_4"},
                        INCORRECT_NUMBER_OR_EMAIL_CONF: {__m: "__markup_9f5fac15_0_4"},
                        EMAIL_RETYPE_DIFFERENT: {__m: "__markup_a588f507_0_5"},
                        CONTACTPOINT_RETYPE_DIFFERENT: {__m: "__markup_a588f507_0_6"},
                        INCOMPLETE_BIRTHDAY: {__m: "__markup_9f5fac15_0_5"},
                        NO_GENDER: {__m: "__markup_9f5fac15_0_6"}
                    },
                    logging: {
                        enabled: false,
                        categories: {INLINE: "inline", SERVER: "server"},
                        types: {
                            IS_EMPTY: "is_empty",
                            CONTACTPOINT_INVALID: "contactpoint_invalid",
                            CONTACTPOINT_TAKEN: "contactpoint_taken",
                            CONTACTPOINT_MATCH: "contactpoint_match",
                            PASSWORD_WEAK: "password_weak",
                            PASSWORD_SHORT: "password_short",
                            TERMS_AGREEMENT: "terms_agreement",
                            TOO_YOUNG: "too_young",
                            ACCOUNT_DISABLED: "account_disabled",
                            BAD_CAPTCHA: "bad_captcha",
                            NAME_REJECTED: "name_rejected",
                            SI_BLOCK: "si_block",
                            BIRTHDAY_INVALID: "birthday_invalid"
                        }
                    },
                    www_phone: true
                }, 87], ["KillabyteProfilerConfig", [], {
                    htmlProfilerModule: null,
                    profilerModule: null,
                    depTypes: {BL: "bl", NON_BL: "non-bl"}
                }, 1145], ["TimeSpentConfig", [], {
                    "0_delay": 0,
                    "0_timeout": 8,
                    delay: 200000,
                    timeout: 64
                }, 142], ["ImmediateActiveSecondsConfig", [], {sampling_rate: 0}, 423]]
            },
            is_last: true,
            resource_map: {
                aoQM1: {
                    type: "js",
                    src: "https://www.facebook.com/rsrc.php/v3/yd/r/7sdIDAs33zG.js",
                    crossOrigin: 1
                }
            },
            allResources: ["7MNFg", "0ZvDS", "H+MB7", "mdXGU", "L61b2", "NvNVO", "C4Qrf", "BhyL/", "SG1mE", "AKrK2", "44wiD", "f+J2L", "fxI5n", "P/mr5", "aoQM1"],
            displayResources: ["7MNFg", "0ZvDS", "NvNVO", "44wiD", "f+J2L", "P/mr5"],
            onafterload: ["CavalryLogger.getInstance(\"6467824397345306123-0\").collectBrowserTiming(window)", "window.CavalryLogger&&CavalryLogger.getInstance().setTimeStamp(\"t_paint\");", "if (window.ExitTime){CavalryLogger.getInstance(\"6467824397345306123-0\").setValue(\"t_exit\", window.ExitTime);};"],
            the_end: true
        });
    }), "onPageletArrive last_response", {"root": true, "pagelet": "last_response"})();</script>
</body>
</html>
