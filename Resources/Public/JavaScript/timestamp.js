!function(){function g(){if(!e&&(e=!0,f)){for(var a=0;a<f.length;a++)f[a].call(window,[]);f=[]}}function h(a){var b=window.onload;"function"!=typeof window.onload?window.onload=a:window.onload=function(){b&&b(),a()}}function i(){if(!d){if(d=!0,document.addEventListener&&!c.opera&&document.addEventListener("DOMContentLoaded",g,!1),c.msie&&window==top&&function(){if(!e){try{document.documentElement.doScroll("left")}catch(a){return void setTimeout(arguments.callee,0)}g()}}(),c.opera&&document.addEventListener("DOMContentLoaded",function(){if(!e){for(var a=0;a<document.styleSheets.length;a++)if(document.styleSheets[a].disabled)return void setTimeout(arguments.callee,0);g()}},!1),c.safari){var a;!function(){if(!e){if("loaded"!=document.readyState&&"complete"!=document.readyState)return void setTimeout(arguments.callee,0);if(void 0===a){for(var b=document.getElementsByTagName("link"),c=0;c<b.length;c++)"stylesheet"==b[c].getAttribute("rel")&&a++;var d=document.getElementsByTagName("style");a+=d.length}if(document.styleSheets.length!=a)return void setTimeout(arguments.callee,0);g()}}()}h(g)}}var a=window.DomReady={},b=navigator.userAgent.toLowerCase(),c={version:(b.match(/.+(?:rv|it|ra|ie)[\/: ]([\d.]+)/)||[])[1],safari:/webkit/.test(b),opera:/opera/.test(b),msie:/msie/.test(b)&&!/opera/.test(b),mozilla:/mozilla/.test(b)&&!/(compatible|webkit)/.test(b)},d=!1,e=!1,f=[];a.ready=function(a,b){i(),e?a.call(window,[]):f.push(function(){return a.call(window,[])})},i()}();
DomReady.ready(function() {
    var el = document.querySelectorAll('[name="tx_news_pi1[newApplication][formTimestamp]"]');
    if(el.length && el[0].value === '') {
        el[0].value = Math.round(new Date().getTime() / 1000);
    }
});

