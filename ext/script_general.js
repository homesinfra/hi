(function () {
    var a = {};
    function trans(c, d) {
        var e = arguments['length'] === 0x1 ? [arguments[0x0]] : Array['apply'](null, arguments);
        a[e[0x0]] = e;
        return '';
    }
    function regTextVar(c, d) {
        var e = ![];
        d = d['toLowerCase']();
        var f = function () {
            var o = this['get']('data');
            o['updateText'](o['translateObjs'][c]);
        };
        var g = function (o) {
            var p = o['data']['nextSelectedIndex'];
            if (p >= 0x0) {
                var q = o['source']['get']('items')[p];
                var r = function () {
                    q['unbind']('begin', r, this);
                    f['call'](this);
                };
                q['bind']('begin', r, this);
            } else
                f['call'](this);
        };
        var h = function (o) {
            return function (p) {
                if (o in p) {
                    f['call'](this);
                }
            }['bind'](this);
        };
        var i = function (o, p) {
            return function (q, r) {
                if (o == q && p in r) {
                    f['call'](this);
                }
            }['bind'](this);
        };
        var j = function (o, p, q) {
            for (var r = 0x0; r < o['length']; ++r) {
                var s = o[r];
                var t = s['get']('selectedIndex');
                if (t >= 0x0) {
                    var u = p['split']('.');
                    var v = s['get']('items')[t];
                    if (q !== undefined && !q['call'](this, v))
                        continue;
                    for (var w = 0x0; w < u['length']; ++w) {
                        if (v == undefined)
                            return '';
                        v = 'get' in v ? v['get'](u[w]) : v[u[w]];
                    }
                    return v;
                }
            }
            return '';
        };
        var k = function (o) {
            var p = o['get']('player');
            return p !== undefined && p['get']('viewerArea') == this['MainViewer'];
        };
        switch (d) {
        case 'title':
        case 'subtitle':
            var m = function () {
                switch (d) {
                case 'title':
                    return 'media.label';
                case 'subtitle':
                    return 'media.data.subtitle';
                }
            }();
            if (m) {
                return function () {
                    var o = this['_getPlayListsWithViewer'](this['MainViewer']);
                    if (!e) {
                        for (var p = 0x0; p < o['length']; ++p) {
                            o[p]['bind']('changing', g, this);
                        }
                        e = !![];
                    }
                    return j['call'](this, o, m, k);
                };
            }
            break;
        default:
            if (d['startsWith']('quiz.') && 'Quiz' in TDV) {
                var n = undefined;
                var m = function () {
                    switch (d) {
                    case 'quiz.questions.answered':
                        return TDV['Quiz']['PROPERTY']['QUESTIONS_ANSWERED'];
                    case 'quiz.question.count':
                        return TDV['Quiz']['PROPERTY']['QUESTION_COUNT'];
                    case 'quiz.items.found':
                        return TDV['Quiz']['PROPERTY']['ITEMS_FOUND'];
                    case 'quiz.item.count':
                        return TDV['Quiz']['PROPERTY']['ITEM_COUNT'];
                    case 'quiz.score':
                        return TDV['Quiz']['PROPERTY']['SCORE'];
                    case 'quiz.score.total':
                        return TDV['Quiz']['PROPERTY']['TOTAL_SCORE'];
                    case 'quiz.time.remaining':
                        return TDV['Quiz']['PROPERTY']['REMAINING_TIME'];
                    case 'quiz.time.elapsed':
                        return TDV['Quiz']['PROPERTY']['ELAPSED_TIME'];
                    case 'quiz.time.limit':
                        return TDV['Quiz']['PROPERTY']['TIME_LIMIT'];
                    case 'quiz.media.items.found':
                        return TDV['Quiz']['PROPERTY']['PANORAMA_ITEMS_FOUND'];
                    case 'quiz.media.item.count':
                        return TDV['Quiz']['PROPERTY']['PANORAMA_ITEM_COUNT'];
                    case 'quiz.media.score':
                        return TDV['Quiz']['PROPERTY']['PANORAMA_SCORE'];
                    case 'quiz.media.score.total':
                        return TDV['Quiz']['PROPERTY']['PANORAMA_TOTAL_SCORE'];
                    case 'quiz.media.index':
                        return TDV['Quiz']['PROPERTY']['PANORAMA_INDEX'];
                    case 'quiz.media.count':
                        return TDV['Quiz']['PROPERTY']['PANORAMA_COUNT'];
                    case 'quiz.media.visited':
                        return TDV['Quiz']['PROPERTY']['PANORAMA_VISITED_COUNT'];
                    default:
                        var o = /quiz\.([\w_]+)\.(.+)/['exec'](d);
                        if (o !== undefined) {
                            n = o[0x1];
                            switch ('quiz.' + o[0x2]) {
                            case 'quiz.score':
                                return TDV['Quiz']['OBJECTIVE_PROPERTY']['SCORE'];
                            case 'quiz.score.total':
                                return TDV['Quiz']['OBJECTIVE_PROPERTY']['TOTAL_SCORE'];
                            case 'quiz.media.items.found':
                                return TDV['Quiz']['OBJECTIVE_PROPERTY']['PANORAMA_ITEMS_FOUND'];
                            case 'quiz.media.item.count':
                                return TDV['Quiz']['OBJECTIVE_PROPERTY']['PANORAMA_ITEM_COUNT'];
                            case 'quiz.questions.answered':
                                return TDV['Quiz']['OBJECTIVE_PROPERTY']['QUESTIONS_ANSWERED'];
                            case 'quiz.question.count':
                                return TDV['Quiz']['OBJECTIVE_PROPERTY']['QUESTION_COUNT'];
                            case 'quiz.items.found':
                                return TDV['Quiz']['OBJECTIVE_PROPERTY']['ITEMS_FOUND'];
                            case 'quiz.item.count':
                                return TDV['Quiz']['OBJECTIVE_PROPERTY']['ITEM_COUNT'];
                            case 'quiz.media.score':
                                return TDV['Quiz']['OBJECTIVE_PROPERTY']['PANORAMA_SCORE'];
                            case 'quiz.media.score.total':
                                return TDV['Quiz']['OBJECTIVE_PROPERTY']['PANORAMA_TOTAL_SCORE'];
                            }
                        }
                    }
                }();
                if (m) {
                    return function () {
                        var o = this['get']('data')['quiz'];
                        if (o) {
                            if (!e) {
                                if (n != undefined)
                                    o['bind'](TDV['Quiz']['EVENT_OBJECTIVE_PROPERTIES_CHANGE'], i['call'](this, n, m), this);
                                else
                                    o['bind'](TDV['Quiz']['EVENT_PROPERTIES_CHANGE'], h['call'](this, m), this);
                                e = !![];
                            }
                            var p = n != undefined ? o['getObjective'](n, m) : o['get'](m);
                            if (m == TDV['Quiz']['PROPERTY']['PANORAMA_INDEX'])
                                p += 0x1;
                            return p;
                        }
                    };
                }
            }
            break;
        }
        return '';
    }
    function createQuizConfig(player, c) {
        var d = {};
        d['player'] = player;
        d['playList'] = c;
        function e(h) {
            for (var j = 0x0; j < h['length']; ++j) {
                var k = h[j];
                if ('id' in k)
                    player[k['id']] = k;
            }
        }
        if (d['questions']) {
            e(d['questions']);
            for (var f = 0x0; f < d['questions']['length']; ++f) {
                var g = d['questions'][f];
                e(g['options']);
            }
        }
        if (d['objectives']) {
            e(d['objectives']);
        }
        if (d['califications']) {
            e(d['califications']);
        }
        if (d['score']) {
            player[d['score']['id']] = d['score'];
        }
        if (d['question']) {
            player[d['question']['id']] = d['question'];
        }
        if (d['timeout']) {
            player[d['timeout']['id']] = d['timeout'];
        }
        player['get']('data')['translateObjs'] = a;
        return d;
    }
    var b = {"start":"this.init()","id":"rootPlayer","width":"100%","backgroundPreloadEnabled":true,"paddingTop":0,"layout":"absolute","buttonToggleMute":"this.IconButton_570E2E34_5EBE_63DE_41B3_E36925A8158B","paddingLeft":0,"borderSize":0,"paddingBottom":0,"scrollBarWidth":10,"downloadEnabled":true,"contentOpaque":false,"borderRadius":0,"scrollBarVisible":"rollOver","definitions": [{"children":["this.Container_570E2E34_5EBE_63DE_41C2_D3D9C61EAF1F"],"backgroundOpacity":0,"id":"Container_4F25517C_4199_D6BB_41AC_2FBAB6682DA5","left":"0%","width":"100%","paddingTop":0,"layout":"horizontal","paddingLeft":0,"borderSize":0,"paddingBottom":0,"scrollBarWidth":10,"contentOpaque":false,"borderRadius":0,"scrollBarVisible":"rollOver","toolTipHorizontalAlign":"center","minHeight":1,"minWidth":1,"height":142,"shadow":false,"scrollBarOpacity":0.5,"propagateClick":false,"gap":10,"scrollBarColor":"#000000","overflow":"scroll","class":"Container","bottom":"0%","verticalAlign":"middle","horizontalAlign":"center","data":{"name":"Container44746"},"scrollBarMargin":2,"paddingRight":0},{"transparencyActive":true,"backgroundOpacity":0,"id":"IconButton_570E2E34_5EBE_63DE_41CF_DC0B2946505D","width":32,"paddingTop":0,"iconURL":"skin/IconButton_570E2E34_5EBE_63DE_41CF_DC0B2946505D.png","paddingLeft":0,"rollOverIconURL":"skin/IconButton_570E2E34_5EBE_63DE_41CF_DC0B2946505D_rollover.png","borderSize":0,"paddingBottom":0,"borderRadius":0,"toolTipHorizontalAlign":"center","minHeight":0,"minWidth":0,"height":32,"shadow":false,"mode":"push","propagateClick":false,"pressedIconURL":"skin/IconButton_570E2E34_5EBE_63DE_41CF_DC0B2946505D_pressed.png","class":"IconButton","verticalAlign":"middle","horizontalAlign":"center","data":{"name":"Button37510"},"cursor":"hand","paddingRight":0},{"children":["this.IconButton_570E2E34_5EBE_63DE_41BF_4A1E5F2D40AB","this.IconButton_570E2E34_5EBE_63DE_41D3_A0CB69EBDE25","this.IconButton_570E2E34_5EBE_63DE_41D1_76579067E321","this.IconButton_570E2E34_5EBE_63DE_41D0_8EA6B8C16A08","this.Container_570E2E34_5EBE_63DE_41C3_223EC62DD869","this.IconButton_570E2E34_5EBE_63DE_417E_9FF89E99273C","this.IconButton_570E2E34_5EBE_63DE_41C1_73844A18216B","this.IconButton_570E2E34_5EBE_63DE_41B3_E36925A8158B","this.IconButton_570E2E34_5EBE_63DE_41CF_DC0B2946505D"],"backgroundOpacity":0,"id":"Container_570E2E34_5EBE_63DE_41C2_D3D9C61EAF1F","width":360,"paddingTop":0,"layout":"horizontal","paddingLeft":0,"borderSize":0,"paddingBottom":0,"scrollBarWidth":10,"contentOpaque":false,"borderRadius":0,"scrollBarVisible":"rollOver","toolTipHorizontalAlign":"center","minHeight":20,"scrollBarColor":"#000000","scrollBarOpacity":0.5,"shadow":false,"propagateClick":false,"gap":4,"scrollBarMargin":2,"minWidth":360,"height":"95.07%","overflow":"hidden","class":"Container","verticalAlign":"middle","horizontalAlign":"center","data":{"name":"Container37498"},"paddingRight":0},{"transparencyActive":true,"backgroundOpacity":0,"id":"IconButton_570E2E34_5EBE_63DE_41C7_41F80DEDE689","width":32,"paddingTop":0,"iconURL":"skin/IconButton_570E2E34_5EBE_63DE_41C7_41F80DEDE689.png","paddingLeft":0,"rollOverIconURL":"skin/IconButton_570E2E34_5EBE_63DE_41C7_41F80DEDE689_rollover.png","borderSize":0,"paddingBottom":0,"borderRadius":0,"toolTipHorizontalAlign":"center","minHeight":0,"minWidth":0,"height":32,"shadow":false,"mode":"push","propagateClick":false,"pressedIconURL":"skin/IconButton_570E2E34_5EBE_63DE_41C7_41F80DEDE689_pressed.png","class":"IconButton","verticalAlign":"middle","horizontalAlign":"center","data":{"name":"Button37504"},"cursor":"hand","paddingRight":0},{"transparencyActive":true,"backgroundOpacity":0,"id":"IconButton_570E2E34_5EBE_63DE_41B8_BB2B515545D1","width":40,"paddingTop":0,"iconURL":"skin/IconButton_570E2E34_5EBE_63DE_41B8_BB2B515545D1.png","paddingLeft":0,"borderSize":0,"paddingBottom":0,"borderRadius":0,"toolTipHorizontalAlign":"center","minHeight":0,"minWidth":0,"height":40,"shadow":false,"mode":"toggle","propagateClick":false,"pressedIconURL":"skin/IconButton_570E2E34_5EBE_63DE_41B8_BB2B515545D1_pressed.png","class":"IconButton","verticalAlign":"middle","horizontalAlign":"center","data":{"name":"Button37505"},"cursor":"hand","paddingRight":0},{"transparencyActive":true,"backgroundOpacity":0,"id":"IconButton_570E2E34_5EBE_63DE_417E_9FF89E99273C","width":32,"paddingTop":0,"iconURL":"skin/IconButton_570E2E34_5EBE_63DE_417E_9FF89E99273C.png","paddingLeft":0,"rollOverIconURL":"skin/IconButton_570E2E34_5EBE_63DE_417E_9FF89E99273C_rollover.png","borderSize":0,"paddingBottom":0,"borderRadius":0,"toolTipHorizontalAlign":"center","minHeight":0,"minWidth":0,"height":32,"shadow":false,"mode":"push","propagateClick":false,"pressedIconURL":"skin/IconButton_570E2E34_5EBE_63DE_417E_9FF89E99273C_pressed.png","class":"IconButton","verticalAlign":"middle","horizontalAlign":"center","data":{"name":"Button37507"},"cursor":"hand","paddingRight":0},{"transparencyActive":true,"backgroundOpacity":0,"id":"IconButton_570E2E34_5EBE_63DE_41B6_6A9E5D4DE6FA","width":32,"paddingTop":0,"iconURL":"skin/IconButton_570E2E34_5EBE_63DE_41B6_6A9E5D4DE6FA.png","paddingLeft":0,"rollOverIconURL":"skin/IconButton_570E2E34_5EBE_63DE_41B6_6A9E5D4DE6FA_rollover.png","borderSize":0,"paddingBottom":0,"borderRadius":0,"toolTipHorizontalAlign":"center","minHeight":0,"minWidth":0,"height":32,"shadow":false,"mode":"push","propagateClick":false,"pressedIconURL":"skin/IconButton_570E2E34_5EBE_63DE_41B6_6A9E5D4DE6FA_pressed.png","class":"IconButton","verticalAlign":"middle","horizontalAlign":"center","data":{"name":"Button37506"},"cursor":"hand","paddingRight":0},{"children":["this.IconButton_570E2E34_5EBE_63DE_41C7_41F80DEDE689","this.IconButton_570E2E34_5EBE_63DE_41B8_BB2B515545D1","this.IconButton_570E2E34_5EBE_63DE_41B6_6A9E5D4DE6FA"],"backgroundOpacity":0,"id":"Container_570E2E34_5EBE_63DE_41C3_223EC62DD869","width":40,"paddingTop":0,"layout":"vertical","paddingLeft":0,"borderSize":0,"paddingBottom":0,"scrollBarWidth":10,"contentOpaque":false,"scrollBarMargin":2,"borderRadius":0,"scrollBarVisible":"rollOver","toolTipHorizontalAlign":"center","minHeight":20,"scrollBarColor":"#000000","scrollBarOpacity":0.5,"shadow":false,"propagateClick":false,"gap":4,"minWidth":20,"height":"100%","overflow":"hidden","class":"Container","verticalAlign":"middle","horizontalAlign":"center","data":{"name":"Container37503"},"paddingRight":0},{"transparencyActive":true,"backgroundOpacity":0,"id":"IconButton_570E2E34_5EBE_63DE_41D1_76579067E321","width":40,"paddingTop":0,"iconURL":"skin/IconButton_570E2E34_5EBE_63DE_41D1_76579067E321.png","paddingLeft":0,"rollOverIconURL":"skin/IconButton_570E2E34_5EBE_63DE_41D1_76579067E321_rollover.png","borderSize":0,"paddingBottom":0,"borderRadius":0,"toolTipHorizontalAlign":"center","minHeight":0,"minWidth":0,"height":40,"shadow":false,"mode":"push","propagateClick":false,"pressedIconURL":"skin/IconButton_570E2E34_5EBE_63DE_41D1_76579067E321_pressed.png","class":"IconButton","verticalAlign":"middle","horizontalAlign":"center","data":{"name":"Button37501"},"cursor":"hand","paddingRight":0},{"hfovMax":130,"hfov":350,"data":{"label":"PANO_20201208_141823"},"label":trans('panorama_4DC45D00_4199_CE4B_41C8_5209939A4B44.label'),"partial":true,"id":"panorama_4DC45D00_4199_CE4B_41C8_5209939A4B44","frames":[{"back":{"class":"ImageResource","levels":[{"url":"media/panorama_4DC45D00_4199_CE4B_41C8_5209939A4B44_0/b/0/{row}_{column}.jpg","colCount":12,"class":"TiledImageResourceLevel","width":6144,"rowCount":12,"tags":"ondemand","height":6144},{"url":"media/panorama_4DC45D00_4199_CE4B_41C8_5209939A4B44_0/b/1/{row}_{column}.jpg","colCount":6,"class":"TiledImageResourceLevel","width":3072,"rowCount":6,"tags":"ondemand","height":3072},{"url":"media/panorama_4DC45D00_4199_CE4B_41C8_5209939A4B44_0/b/2/{row}_{column}.jpg","colCount":3,"class":"TiledImageResourceLevel","width":1536,"rowCount":3,"tags":"ondemand","height":1536},{"url":"media/panorama_4DC45D00_4199_CE4B_41C8_5209939A4B44_0/b/3/{row}_{column}.jpg","colCount":2,"class":"TiledImageResourceLevel","width":1024,"rowCount":2,"tags":"ondemand","height":1024},{"url":"media/panorama_4DC45D00_4199_CE4B_41C8_5209939A4B44_0/b/4/{row}_{column}.jpg","colCount":1,"class":"TiledImageResourceLevel","width":512,"rowCount":1,"tags":["ondemand","preload"],"height":512},{"url":"media/panorama_4DC45D00_4199_CE4B_41C8_5209939A4B44_0/b/vr/0.jpg","colCount":1,"class":"TiledImageResourceLevel","width":1536,"rowCount":1,"tags":"mobilevr","height":1536}]},"front":{"class":"ImageResource","levels":[{"url":"media/panorama_4DC45D00_4199_CE4B_41C8_5209939A4B44_0/f/0/{row}_{column}.jpg","colCount":12,"class":"TiledImageResourceLevel","width":6144,"rowCount":12,"tags":"ondemand","height":6144},{"url":"media/panorama_4DC45D00_4199_CE4B_41C8_5209939A4B44_0/f/1/{row}_{column}.jpg","colCount":6,"class":"TiledImageResourceLevel","width":3072,"rowCount":6,"tags":"ondemand","height":3072},{"url":"media/panorama_4DC45D00_4199_CE4B_41C8_5209939A4B44_0/f/2/{row}_{column}.jpg","colCount":3,"class":"TiledImageResourceLevel","width":1536,"rowCount":3,"tags":"ondemand","height":1536},{"url":"media/panorama_4DC45D00_4199_CE4B_41C8_5209939A4B44_0/f/3/{row}_{column}.jpg","colCount":2,"class":"TiledImageResourceLevel","width":1024,"rowCount":2,"tags":"ondemand","height":1024},{"url":"media/panorama_4DC45D00_4199_CE4B_41C8_5209939A4B44_0/f/4/{row}_{column}.jpg","colCount":1,"class":"TiledImageResourceLevel","width":512,"rowCount":1,"tags":["ondemand","preload"],"height":512},{"url":"media/panorama_4DC45D00_4199_CE4B_41C8_5209939A4B44_0/f/vr/0.jpg","colCount":1,"class":"TiledImageResourceLevel","width":1536,"rowCount":1,"tags":"mobilevr","height":1536}]},"class":"CubicPanoramaFrame","thumbnailUrl":"media/panorama_4DC45D00_4199_CE4B_41C8_5209939A4B44_t.jpg","left":{"class":"ImageResource","levels":[{"url":"media/panorama_4DC45D00_4199_CE4B_41C8_5209939A4B44_0/l/0/{row}_{column}.jpg","colCount":12,"class":"TiledImageResourceLevel","width":6144,"rowCount":12,"tags":"ondemand","height":6144},{"url":"media/panorama_4DC45D00_4199_CE4B_41C8_5209939A4B44_0/l/1/{row}_{column}.jpg","colCount":6,"class":"TiledImageResourceLevel","width":3072,"rowCount":6,"tags":"ondemand","height":3072},{"url":"media/panorama_4DC45D00_4199_CE4B_41C8_5209939A4B44_0/l/2/{row}_{column}.jpg","colCount":3,"class":"TiledImageResourceLevel","width":1536,"rowCount":3,"tags":"ondemand","height":1536},{"url":"media/panorama_4DC45D00_4199_CE4B_41C8_5209939A4B44_0/l/3/{row}_{column}.jpg","colCount":2,"class":"TiledImageResourceLevel","width":1024,"rowCount":2,"tags":"ondemand","height":1024},{"url":"media/panorama_4DC45D00_4199_CE4B_41C8_5209939A4B44_0/l/4/{row}_{column}.jpg","colCount":1,"class":"TiledImageResourceLevel","width":512,"rowCount":1,"tags":["ondemand","preload"],"height":512},{"url":"media/panorama_4DC45D00_4199_CE4B_41C8_5209939A4B44_0/l/vr/0.jpg","colCount":1,"class":"TiledImageResourceLevel","width":1536,"rowCount":1,"tags":"mobilevr","height":1536}]},"right":{"class":"ImageResource","levels":[{"url":"media/panorama_4DC45D00_4199_CE4B_41C8_5209939A4B44_0/r/0/{row}_{column}.jpg","colCount":12,"class":"TiledImageResourceLevel","width":6144,"rowCount":12,"tags":"ondemand","height":6144},{"url":"media/panorama_4DC45D00_4199_CE4B_41C8_5209939A4B44_0/r/1/{row}_{column}.jpg","colCount":6,"class":"TiledImageResourceLevel","width":3072,"rowCount":6,"tags":"ondemand","height":3072},{"url":"media/panorama_4DC45D00_4199_CE4B_41C8_5209939A4B44_0/r/2/{row}_{column}.jpg","colCount":3,"class":"TiledImageResourceLevel","width":1536,"rowCount":3,"tags":"ondemand","height":1536},{"url":"media/panorama_4DC45D00_4199_CE4B_41C8_5209939A4B44_0/r/3/{row}_{column}.jpg","colCount":2,"class":"TiledImageResourceLevel","width":1024,"rowCount":2,"tags":"ondemand","height":1024},{"url":"media/panorama_4DC45D00_4199_CE4B_41C8_5209939A4B44_0/r/4/{row}_{column}.jpg","colCount":1,"class":"TiledImageResourceLevel","width":512,"rowCount":1,"tags":["ondemand","preload"],"height":512},{"url":"media/panorama_4DC45D00_4199_CE4B_41C8_5209939A4B44_0/r/vr/0.jpg","colCount":1,"class":"TiledImageResourceLevel","width":1536,"rowCount":1,"tags":"mobilevr","height":1536}]}}],"class":"Panorama","pitch":0,"thumbnailUrl":"media/panorama_4DC45D00_4199_CE4B_41C8_5209939A4B44_t.jpg","overlays":["this.overlay_4C2760A5_41A9_7655_41C1_62BDD151A76A","this.overlay_4C13AC4E_41A9_CED4_41B7_7428A40B93E2"],"vfov":61.64},{"subtitlesPaddingRight":5,"playbackBarHeadBorderColor":"#000000","progressBackgroundColorRatios":[0,1],"id":"MainViewer","left":0,"subtitlesTextShadowOpacity":1,"playbackBarBorderSize":2,"progressRight":10,"toolTipFontWeight":"normal","progressOpacity":1,"paddingTop":0,"subtitlesBorderSize":0,"width":"100%","progressBarBackgroundColorDirection":"vertical","paddingLeft":0,"borderSize":0,"paddingBottom":0,"subtitlesTextShadowColor":"#000000","toolTipBorderRadius":3,"toolTipShadowSpread":0,"progressBarBorderColor":"#000000","firstTransitionDuration":0,"progressBackgroundColorDirection":"vertical","transitionDuration":500,"playbackBarHeadShadowHorizontalLength":0,"progressBarBackgroundColorRatios":[0,1],"borderRadius":0,"subtitlesFontColor":"#FFFFFF","toolTipHorizontalAlign":"center","subtitlesBorderColor":"#FFFFFF","playbackBarHeadShadowBlurRadius":3,"toolTipTextShadowColor":"#000000","toolTipPaddingTop":4,"doubleClickAction":"toggle_fullscreen","toolTipPaddingRight":6,"playbackBarHeadHeight":30,"progressBorderColor":"#AAAAAA","playbackBarLeft":0,"shadow":false,"playbackBarHeadShadowColor":"#000000","toolTipBorderSize":1,"progressBackgroundColor":["#EEEEEE","#CCCCCC"],"playbackBarHeadBackgroundColorRatios":[0,1],"subtitlesTextDecoration":"none","toolTipFontFamily":"Arial","playbackBarHeadBorderSize":0,"progressBarBackgroundColor":["#222222","#444444"],"transitionMode":"blending","progressBottom":1,"toolTipBorderColor":"#767676","vrPointerColor":"#FFFFFF","progressBarOpacity":1,"subtitlesFontFamily":"Arial","playbackBarHeadOpacity":1,"progressBackgroundOpacity":1,"displayTooltipInTouchScreens":true,"playbackBarHeadShadow":true,"progressHeight":20,"subtitlesTextShadowBlurRadius":0,"toolTipTextShadowOpacity":0,"playbackBarOpacity":1,"subtitlesTextShadowVerticalLength":1,"height":"100%","progressBarBorderRadius":4,"playbackBarHeadBackgroundColor":["#111111","#666666"],"progressBorderSize":2,"subtitlesPaddingTop":5,"progressBarBorderSize":0,"subtitlesFontSize":"3vmin","playbackBarBottom":10,"toolTipShadowVerticalLength":0,"toolTipFontColor":"#606060","paddingRight":0,"playbackBarHeadShadowVerticalLength":0,"playbackBarProgressBackgroundColorDirection":"vertical","toolTipTextShadowBlurRadius":3,"progressBorderRadius":4,"toolTipShadowColor":"#333333","subtitlesTop":0,"playbackBarHeight":20,"playbackBarBackgroundColor":["#EEEEEE","#CCCCCC"],"toolTipPaddingBottom":4,"subtitlesShadow":false,"subtitlesOpacity":1,"progressLeft":10,"toolTipFontStyle":"normal","subtitlesFontWeight":"normal","playbackBarHeadWidth":6,"toolTipBackgroundColor":"#F6F6F6","toolTipDisplayTime":600,"playbackBarProgressBorderSize":0,"playbackBarRight":0,"toolTipFontSize":12,"vrPointerSelectionColor":"#FF6600","playbackBarProgressBorderRadius":0,"playbackBarHeadBackgroundColorDirection":"vertical","toolTipOpacity":1,"playbackBarProgressBackgroundColor":["#222222","#444444"],"playbackBarBackgroundColorDirection":"vertical","minWidth":100,"playbackBarHeadShadowOpacity":0.7,"minHeight":50,"subtitlesBackgroundColor":"#000000","subtitlesPaddingLeft":5,"subtitlesGap":0,"top":0,"subtitlesBottom":50,"playbackBarProgressBackgroundColorRatios":[0,1],"propagateClick":false,"toolTipShadowHorizontalLength":0,"subtitlesHorizontalAlign":"center","subtitlesPaddingBottom":5,"class":"ViewerArea","vrPointerSelectionTime":2000,"playbackBarBorderColor":"#AAAAAA","subtitlesTextShadowHorizontalLength":1,"toolTipPaddingLeft":6,"toolTipShadowBlurRadius":3,"playbackBarProgressBorderColor":"#000000","playbackBarBorderRadius":4,"subtitlesVerticalAlign":"bottom","data":{"name":"Main Viewer"},"toolTipShadowOpacity":1,"playbackBarHeadBorderRadius":0,"playbackBarProgressOpacity":1,"subtitlesBackgroundOpacity":0.2,"playbackBarBackgroundOpacity":1},{"transparencyActive":true,"backgroundOpacity":0,"id":"IconButton_570E2E34_5EBE_63DE_41C1_73844A18216B","width":40,"paddingTop":0,"iconURL":"skin/IconButton_570E2E34_5EBE_63DE_41C1_73844A18216B.png","paddingLeft":0,"rollOverIconURL":"skin/IconButton_570E2E34_5EBE_63DE_41C1_73844A18216B_rollover.png","borderSize":0,"paddingBottom":0,"borderRadius":0,"toolTipHorizontalAlign":"center","minHeight":0,"minWidth":0,"height":40,"shadow":false,"mode":"push","propagateClick":false,"pressedIconURL":"skin/IconButton_570E2E34_5EBE_63DE_41C1_73844A18216B_pressed.png","class":"IconButton","verticalAlign":"middle","horizontalAlign":"center","data":{"name":"Button37508"},"cursor":"hand","paddingRight":0},{"initialSequence":"this.sequence_4A7B3DBC_4199_49B4_41CC_2238B830B421","automaticZoomSpeed":10,"class":"PanoramaCamera","id":"panorama_4DC45D00_4199_CE4B_41C8_5209939A4B44_camera","initialPosition":{"yaw":0,"class":"PanoramaCameraPosition","pitch":0}},{"buttonPlayLeft":"this.IconButton_570E2E34_5EBE_63DE_41D1_76579067E321","touchControlMode":"drag_rotation","mouseControlMode":"drag_rotation","buttonPause":"this.IconButton_570E2E34_5EBE_63DE_41B8_BB2B515545D1","buttonMoveUp":"this.IconButton_570E2E34_5EBE_63DE_41C7_41F80DEDE689","buttonRestart":"this.IconButton_570E2E34_5EBE_63DE_41D3_A0CB69EBDE25","buttonZoomIn":"this.IconButton_570E2E34_5EBE_63DE_41CF_DC0B2946505D","id":"MainViewerPanoramaPlayer","gyroscopeVerticalDraggingEnabled":true,"displayPlaybackBar":true,"buttonPlayRight":"this.IconButton_570E2E34_5EBE_63DE_41C1_73844A18216B","buttonMoveLeft":"this.IconButton_570E2E34_5EBE_63DE_41D0_8EA6B8C16A08","class":"PanoramaPlayer","viewerArea":"this.MainViewer","buttonMoveRight":"this.IconButton_570E2E34_5EBE_63DE_417E_9FF89E99273C","buttonMoveDown":"this.IconButton_570E2E34_5EBE_63DE_41B6_6A9E5D4DE6FA","buttonZoomOut":"this.IconButton_570E2E34_5EBE_63DE_41BF_4A1E5F2D40AB"},{"transparencyActive":true,"backgroundOpacity":0,"id":"IconButton_570E2E34_5EBE_63DE_41BF_4A1E5F2D40AB","width":32,"paddingTop":0,"iconURL":"skin/IconButton_570E2E34_5EBE_63DE_41BF_4A1E5F2D40AB.png","paddingLeft":0,"rollOverIconURL":"skin/IconButton_570E2E34_5EBE_63DE_41BF_4A1E5F2D40AB_rollover.png","borderSize":0,"paddingBottom":0,"borderRadius":0,"toolTipHorizontalAlign":"center","minHeight":0,"minWidth":0,"height":32,"shadow":false,"mode":"push","propagateClick":false,"pressedIconURL":"skin/IconButton_570E2E34_5EBE_63DE_41BF_4A1E5F2D40AB_pressed.png","class":"IconButton","verticalAlign":"middle","horizontalAlign":"center","data":{"name":"Button37499"},"cursor":"hand","paddingRight":0},{"transparencyActive":true,"backgroundOpacity":0,"id":"IconButton_570E2E34_5EBE_63DE_41B3_E36925A8158B","width":40,"paddingTop":0,"iconURL":"skin/IconButton_570E2E34_5EBE_63DE_41B3_E36925A8158B.png","paddingLeft":0,"borderSize":0,"paddingBottom":0,"borderRadius":0,"toolTipHorizontalAlign":"center","minHeight":0,"minWidth":0,"height":40,"shadow":false,"mode":"toggle","propagateClick":false,"pressedIconURL":"skin/IconButton_570E2E34_5EBE_63DE_41B3_E36925A8158B_pressed.png","class":"IconButton","verticalAlign":"middle","horizontalAlign":"center","data":{"name":"Button37509"},"cursor":"hand","paddingRight":0},{"items":[{"media":"this.panorama_4DC45D00_4199_CE4B_41C8_5209939A4B44","end":"this.trigger('tourEnded')","class":"PanoramaPlayListItem","player":"this.MainViewerPanoramaPlayer","camera":"this.panorama_4DC45D00_4199_CE4B_41C8_5209939A4B44_camera"}],"id":"mainPlayList","class":"PlayList"},{"transparencyActive":true,"backgroundOpacity":0,"id":"IconButton_570E2E34_5EBE_63DE_41D3_A0CB69EBDE25","width":40,"paddingTop":0,"iconURL":"skin/IconButton_570E2E34_5EBE_63DE_41D3_A0CB69EBDE25.png","paddingLeft":0,"rollOverIconURL":"skin/IconButton_570E2E34_5EBE_63DE_41D3_A0CB69EBDE25_rollover.png","borderSize":0,"paddingBottom":0,"borderRadius":0,"toolTipHorizontalAlign":"center","minHeight":0,"minWidth":0,"height":40,"shadow":false,"mode":"push","propagateClick":false,"pressedIconURL":"skin/IconButton_570E2E34_5EBE_63DE_41D3_A0CB69EBDE25_pressed.png","class":"IconButton","verticalAlign":"middle","horizontalAlign":"center","data":{"name":"Button37500"},"cursor":"hand","paddingRight":0},{"transparencyActive":true,"backgroundOpacity":0,"id":"IconButton_570E2E34_5EBE_63DE_41D0_8EA6B8C16A08","width":32,"paddingTop":0,"iconURL":"skin/IconButton_570E2E34_5EBE_63DE_41D0_8EA6B8C16A08.png","paddingLeft":0,"rollOverIconURL":"skin/IconButton_570E2E34_5EBE_63DE_41D0_8EA6B8C16A08_rollover.png","borderSize":0,"paddingBottom":0,"borderRadius":0,"toolTipHorizontalAlign":"center","minHeight":0,"minWidth":0,"height":32,"shadow":false,"mode":"push","propagateClick":false,"pressedIconURL":"skin/IconButton_570E2E34_5EBE_63DE_41D0_8EA6B8C16A08_pressed.png","class":"IconButton","verticalAlign":"middle","horizontalAlign":"center","data":{"name":"Button37502"},"cursor":"hand","paddingRight":0},{"id":"overlay_4C2760A5_41A9_7655_41C1_62BDD151A76A","class":"LensFlarePanoramaOverlay","pitch":24.85,"bleachingDistance":0.4,"yaw":67.49,"bleaching":1},{"id":"overlay_4C13AC4E_41A9_CED4_41B7_7428A40B93E2","class":"LensFlarePanoramaOverlay","pitch":22.06,"bleachingDistance":0.4,"yaw":-79.84,"bleaching":1},{"movements":[{"easing":"cubic_in","yawSpeed":5.71,"class":"TargetPanoramaCameraMovement","path":"shortest","targetYaw":7},{"easing":"linear","yawSpeed":5.71,"class":"TargetPanoramaCameraMovement","path":"shortest","targetYaw":123},{"easing":"cubic_out","yawSpeed":5.71,"class":"TargetPanoramaCameraMovement","path":"shortest","targetYaw":130}],"restartMovementOnUserInteraction":false,"id":"sequence_4A7B3DBC_4199_49B4_41CC_2238B830B421","class":"PanoramaCameraSequence"}],"toolTipHorizontalAlign":"center","minHeight":20,"minWidth":20,"shadow":false,"desktopMipmappingEnabled":false,"scrollBarOpacity":0.5,"gap":10,"scrollBarColor":"#000000","propagateClick":false,"overflow":"hidden","class":"Player","scripts":{"showPopupPanoramaOverlay":TDV.Tour.Script.showPopupPanoramaOverlay,"getActiveMediaWithViewer":TDV.Tour.Script.getActiveMediaWithViewer,"pauseCurrentPlayers":TDV.Tour.Script.pauseCurrentPlayers,"getMediaHeight":TDV.Tour.Script.getMediaHeight,"mixObject":TDV.Tour.Script.mixObject,"getCurrentPlayers":TDV.Tour.Script.getCurrentPlayers,"initGA":TDV.Tour.Script.initGA,"setStartTimeVideoSync":TDV.Tour.Script.setStartTimeVideoSync,"setMediaBehaviour":TDV.Tour.Script.setMediaBehaviour,"getCurrentPlayerWithMedia":TDV.Tour.Script.getCurrentPlayerWithMedia,"openLink":TDV.Tour.Script.openLink,"quizShowQuestion":TDV.Tour.Script.quizShowQuestion,"getMediaFromPlayer":TDV.Tour.Script.getMediaFromPlayer,"getActivePlayerWithViewer":TDV.Tour.Script.getActivePlayerWithViewer,"showPopupPanoramaVideoOverlay":TDV.Tour.Script.showPopupPanoramaVideoOverlay,"visibleComponentsIfPlayerFlagEnabled":TDV.Tour.Script.visibleComponentsIfPlayerFlagEnabled,"resumePlayers":TDV.Tour.Script.resumePlayers,"changePlayListWithSameSpot":TDV.Tour.Script.changePlayListWithSameSpot,"setPanoramaCameraWithSpot":TDV.Tour.Script.setPanoramaCameraWithSpot,"getComponentByName":TDV.Tour.Script.getComponentByName,"autotriggerAtStart":TDV.Tour.Script.autotriggerAtStart,"setMapLocation":TDV.Tour.Script.setMapLocation,"loadFromCurrentMediaPlayList":TDV.Tour.Script.loadFromCurrentMediaPlayList,"quizShowScore":TDV.Tour.Script.quizShowScore,"registerKey":TDV.Tour.Script.registerKey,"setMainMediaByName":TDV.Tour.Script.setMainMediaByName,"stopGlobalAudio":TDV.Tour.Script.stopGlobalAudio,"quizShowTimeout":TDV.Tour.Script.quizShowTimeout,"quizStart":TDV.Tour.Script.quizStart,"setCameraSameSpotAsMedia":TDV.Tour.Script.setCameraSameSpotAsMedia,"getMediaByName":TDV.Tour.Script.getMediaByName,"pauseGlobalAudiosWhilePlayItem":TDV.Tour.Script.pauseGlobalAudiosWhilePlayItem,"historyGoForward":TDV.Tour.Script.historyGoForward,"setLocale":TDV.Tour.Script.setLocale,"unregisterKey":TDV.Tour.Script.unregisterKey,"historyGoBack":TDV.Tour.Script.historyGoBack,"getMediaWidth":TDV.Tour.Script.getMediaWidth,"isCardboardViewMode":TDV.Tour.Script.isCardboardViewMode,"existsKey":TDV.Tour.Script.existsKey,"stopGlobalAudios":TDV.Tour.Script.stopGlobalAudios,"getPixels":TDV.Tour.Script.getPixels,"startPanoramaWithCamera":TDV.Tour.Script.startPanoramaWithCamera,"setOverlayBehaviour":TDV.Tour.Script.setOverlayBehaviour,"resumeGlobalAudios":TDV.Tour.Script.resumeGlobalAudios,"setValue":TDV.Tour.Script.setValue,"init":TDV.Tour.Script.init,"getPlayListItems":TDV.Tour.Script.getPlayListItems,"keepCompVisible":TDV.Tour.Script.keepCompVisible,"fixTogglePlayPauseButton":TDV.Tour.Script.fixTogglePlayPauseButton,"setMainMediaByIndex":TDV.Tour.Script.setMainMediaByIndex,"showWindow":TDV.Tour.Script.showWindow,"setPanoramaCameraWithCurrentSpot":TDV.Tour.Script.setPanoramaCameraWithCurrentSpot,"initQuiz":TDV.Tour.Script.initQuiz,"getPlayListItemByMedia":TDV.Tour.Script.getPlayListItemByMedia,"changeBackgroundWhilePlay":TDV.Tour.Script.changeBackgroundWhilePlay,"getPlayListsWithMedia":TDV.Tour.Script.getPlayListsWithMedia,"getFirstPlayListWithMedia":TDV.Tour.Script.getFirstPlayListWithMedia,"setComponentVisibility":TDV.Tour.Script.setComponentVisibility,"stopAndGoCamera":TDV.Tour.Script.stopAndGoCamera,"quizSetItemFound":TDV.Tour.Script.quizSetItemFound,"playGlobalAudio":TDV.Tour.Script.playGlobalAudio,"translate":TDV.Tour.Script.translate,"playGlobalAudioWhilePlay":TDV.Tour.Script.playGlobalAudioWhilePlay,"updateMediaLabelFromPlayList":TDV.Tour.Script.updateMediaLabelFromPlayList,"syncPlaylists":TDV.Tour.Script.syncPlaylists,"getGlobalAudio":TDV.Tour.Script.getGlobalAudio,"triggerOverlay":TDV.Tour.Script.triggerOverlay,"setStartTimeVideo":TDV.Tour.Script.setStartTimeVideo,"quizFinish":TDV.Tour.Script.quizFinish,"updateVideoCues":TDV.Tour.Script.updateVideoCues,"getOverlays":TDV.Tour.Script.getOverlays,"showPopupMedia":TDV.Tour.Script.showPopupMedia,"assignObjRecursively":TDV.Tour.Script.assignObjRecursively,"copyObjRecursively":TDV.Tour.Script.copyObjRecursively,"_getPlayListsWithViewer":TDV.Tour.Script._getPlayListsWithViewer,"shareSocial":TDV.Tour.Script.shareSocial,"_initItemWithComps":TDV.Tour.Script._initItemWithComps,"showComponentsWhileMouseOver":TDV.Tour.Script.showComponentsWhileMouseOver,"getPanoramaOverlayByName":TDV.Tour.Script.getPanoramaOverlayByName,"setEndToItemIndex":TDV.Tour.Script.setEndToItemIndex,"executeFunctionWhenChange":TDV.Tour.Script.executeFunctionWhenChange,"showPopupImage":TDV.Tour.Script.showPopupImage,"pauseGlobalAudio":TDV.Tour.Script.pauseGlobalAudio,"playAudioList":TDV.Tour.Script.playAudioList,"getKey":TDV.Tour.Script.getKey,"cloneCamera":TDV.Tour.Script.cloneCamera,"pauseGlobalAudios":TDV.Tour.Script.pauseGlobalAudios},"height":"100%","verticalAlign":"top","defaultVRPointer":"laser","children":["this.MainViewer","this.Container_4F25517C_4199_D6BB_41AC_2FBAB6682DA5"],"mouseWheelEnabled":true,"horizontalAlign":"left","mobileMipmappingEnabled":false,"mediaActivationMode":"window","data":{"defaultLocale":"en","name":"Player43899","locales":{"en":"locale/en.txt"}},"paddingRight":0,"scrollBarMargin":2,"vrPolyfillScale":0.75};
    if (b['data'] == undefined)
        b['data'] = {};
    b['data']['translateObjs'] = a;
    b['data']['history'] = {};
    b['scripts']['createQuizConfig'] = createQuizConfig;
    TDV['PlayerAPI']['defineScript'](b);
}());
//# sourceMappingURL=http://localhost:9000/script_device_v2020.1.5.js.map
//Generated with v2020.2.0, Tue Dec 8 2020