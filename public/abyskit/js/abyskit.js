var ABYSKIT = (function () {
    function ABYSKIT(doc) {
        if (doc === undefined)
            doc = document;
        this.doc = doc;
        this.body = this.doc.body;
    }
    ABYSKIT.prototype.counter = function (selector) {
        var _self = this;
        var selectorChar = selector.charAt(0);
        var counters = [];
        var intervalTime = 20;
        if (selectorChar === '#') {
            counters.push(_self.doc.getElementById(selector.slice(1)));
        }
        else if (selectorChar === '.') {
            var counterElementCollection = _self.doc.getElementsByClassName(selector.slice(1));
            for (var i = 0; i < counterElementCollection.length; i++) {
                counters.push(counterElementCollection[i]);
            }
        }
        else
            return console.error('className must start from class(.) or id(#) selector!');
        var loop = function (options) {
            setTimeout(function () {
                options.loopCount += options.step;
                options.counter.innerHTML = parseInt(options.loopCount).toString();
                if (parseInt(options.loopCount) < options.maxNumber)
                    loop(options);
            }, options.intervalTime);
        };
        for (var i = 0; i < counters.length; i++) {
            var counterOption = {};
            counterOption.counter = counters[i];
            counterOption.maxNumber = parseInt(counterOption.counter.dataset.count);
            counterOption.step = counterOption.maxNumber / intervalTime;
            counterOption.loopCount = 0;
            counterOption.intervalTime = intervalTime;
            loop(counterOption);
        }
    };
    return ABYSKIT;
}());
