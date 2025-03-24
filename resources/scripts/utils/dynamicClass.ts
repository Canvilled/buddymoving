import Slider from "@scripts/features/Slider";
import Header from "@scripts/features/Header";

interface DYNAMIC_CLASSES_PARAMS {
    className: string
    item: HTMLElement
    callback: string | string[]
    opt?: Record<string, unknown> | null
}

interface ClassConstructor {
    new (params: { item: HTMLElement, callback: string | string[], opt?: unknown }): any;
}

const CLASSES: { [key: string]: ClassConstructor } = {
    Slider,
    Header,
}

class DynamicClass {
    constructor({ className, item, callback, opt = null }: DYNAMIC_CLASSES_PARAMS) {
        return new CLASSES[className]({
            item,
            callback,
            opt,
        })
    }
}

export default DynamicClass
