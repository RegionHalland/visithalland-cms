class Icons {
    constructor() {
        this.spriteURL = '/app/themes/visithalland/dist/icons/sprite.svg';
        this.getIcons(this.spriteURL);
    }

    getIcons(url) {
        fetch(url)
            .then(function (response) {
                response.text().then(function (svgData) {
                    var div = document.createElement('div');

                    div.className = 'display-none';
                    div.innerHTML = svgData;
                    document.body.insertBefore(div, document.body.childNodes[0]);
                });
            })
    }
}

export default new Icons();
