import DynamicClass from "@scripts/utils/dynamicClass";

export interface MAIN_CLASS_PARAMS {
    item: HTMLElement,
    callback: string | string[]
}

class MainClass {
    protected selector: HTMLElement;
    protected callback: string | string[];
    protected initAllCallBack: (THIS: MainClass, selector: HTMLElement, functionName: string[]) => void;
    protected initOneCallBack: (THIS: MainClass, selector: HTMLElement, functionName: string[], index: number) => void;

    constructor(options: MAIN_CLASS_PARAMS) {
        this.selector = options.item;
        this.callback = options.callback;
        this.initAllCallBack = (THIS, selector, functionName = []) => {
            if (Array.isArray(THIS.callback)) {
                THIS.callback.forEach(callback => {
                    new DynamicClass({ className: callback, item: selector, callback: functionName });
                });
            }
        };
        this.initOneCallBack = (THIS, selector, functionName = [], index = 0) => {
            if (Array.isArray(THIS.callback)) {
                new DynamicClass({ className: THIS.callback[index], item: selector, callback: functionName });
            }
        };
    }
}

export default MainClass;