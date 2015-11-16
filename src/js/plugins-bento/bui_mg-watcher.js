(function($,window){
    $.fn.mq_watcher = function() {

        $('<div id="mq-watcher"></div>')
            .appendTo(this)
            .hide();

        window.getActiveMQ = function () {

            var computed = window.getComputedStyle,
                watcher = document.getElementById('mq-watcher');

            if ('currentStyle' in watcher) {
                window.getActiveMQ = function () {
                    return watcher.currentStyle.fontFamily.replace(/['"]/g, '');
                };
            } else if (computed) {
                window.getActiveMQ = function () {
                    return computed(watcher, null).getPropertyValue('font-family').replace(/['"]/g, '');
                };
            } else {
                window.getActiveMQ = function () {
                    return 'unknown';
                };
            }
            return window.getActiveMQ();
        };
    };
}(jQuery, window));