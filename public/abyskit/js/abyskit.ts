class ABYSKIT {
    private doc: HTMLDocument;
    private body: HTMLElement;

    constructor(doc) {
        if(doc === undefined) doc = document;
        this.doc = doc;
        this.body = this.doc.body;
    }

    counter(selector: string) {
        const _self = this;
        const selectorChar = selector.charAt(0);
        const counters: Array<HTMLElement> = [];
        const intervalTime = 20;

        if(selectorChar === '#') {
            counters.push(_self.doc.getElementById(selector.slice(1)))
        } else if (selectorChar === '.') {
            const counterElementCollection: HTMLCollectionOf<Element> = _self.doc.getElementsByClassName(selector.slice(1));

            for(let i=0; i<counterElementCollection.length; i++) {
                counters.push(<HTMLElement>counterElementCollection[i]);
            }
        } else return console.error('className must start from class(.) or id(#) selector!');

        const loop = function(options: any) {
            setTimeout(function() {
                options.loopCount += options.step;
                options.counter.innerHTML = parseInt(options.loopCount).toString();

                if(parseInt(options.loopCount) < options.maxNumber) loop(options);
            }, options.intervalTime)
        };

        for(let i=0; i<counters.length; i++) {
            const counterOption: any = {};

            counterOption.counter = counters[i];
            counterOption.maxNumber = parseInt(counterOption.counter.dataset.count);
            counterOption.step = counterOption.maxNumber / intervalTime;
            counterOption.loopCount = 0;
            counterOption.intervalTime = intervalTime;

            loop(counterOption);
        }
    }
}