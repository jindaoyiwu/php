(function (doc, win) {

    var docEl = doc.documentElement,

        resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize',

        recalc = function () {

            var clientWidth = docEl.clientWidth;

            /*clientWidth = clientWidth>=640 ? 640 : clientWidth;*/

            if (!clientWidth) return;

            docEl.style.fontSize =Math.floor(100*(clientWidth / 750))+ 'px';

        };

    // Abort if browser does not support addEventListener

    if (!doc.addEventListener) return;

    win.addEventListener(resizeEvt, recalc, false);

    doc.addEventListener('DOMContentLoaded', recalc, false);

})(document,window);

