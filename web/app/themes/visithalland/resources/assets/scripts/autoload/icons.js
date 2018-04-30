class Icons {
    constructor() {
        this.spriteURL = '/app/themes/visithalland/dist/icons/sprite.svg';
        this.getIcons(this.spriteURL);
    }

    getIcons(url) {
        var ajax = new XMLHttpRequest();
        ajax.open("GET", this.spriteURL, true);
        ajax.send();
        ajax.onload = function (e) {
            var div = document.createElement("div");
            div.innerHTML = ajax.responseText;
            document.body.insertBefore(div, document.body.childNodes[0]);
        }
    }
}

export default new Icons();
