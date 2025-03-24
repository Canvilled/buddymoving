import DynamicClass from "@scripts/utils/dynamicClass";
class Main {
  constructor() {
    this.init();
  }

  getSectionCallFunction(): HTMLElement[] {
    return Array.prototype.slice.call(
      document.querySelectorAll("[data-call]")
    )
  }

  callFunctionDynamic(THIS: Main) {
    const selector: HTMLElement[] = THIS.getSectionCallFunction();
    if (selector.length > 0) {
      selector.forEach(item => {
        let functionNameString = item.getAttribute('data-call')
        let callBackString = item.getAttribute('data-callback')
        if (functionNameString) {
          let functionName = functionNameString.split(';')
          let callBack = callBackString ? callBackString.split(';') : ''
          functionName.forEach(functionNameItem => {
            new DynamicClass({
              className: functionNameItem,
              item: item,
              callback: callBack
            })
          })
        }
      })
    }
  }


  init() {
    const THIS = this
    this.callFunctionDynamic(THIS)
  }
}
export default Main


