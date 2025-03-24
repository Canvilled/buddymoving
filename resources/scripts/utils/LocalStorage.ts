class LocalStorage{
  private constructor(){}

  static getItems(key: string): Record<string, any>{
    return JSON.parse(localStorage.getItem(key) as string);
  }

  static getItemsByLang(key: string, lang: string): Record<string, any>{
    const items = LocalStorage.getItems(key);
    return items ? items[lang] : null;
  }

  static setItems(key: string, value: any): void {
    localStorage.setItem(key, JSON.stringify(value));
  }

  static setItemsByLang(key: string, lang: string, value: any): void {
    const items = JSON.parse(localStorage.getItem(key) as string);
    items[lang] = value;
    LocalStorage.setItems(key, items);
  }

}

export default LocalStorage;
