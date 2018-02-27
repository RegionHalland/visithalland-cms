@import url("https://use.typekit.net/vzi2bvt.css");

a,
body,
div,
header,
html,
section,
span {
  margin: 0;
  padding: 0;
  border: 0;
  font-size: 100%;
  font: inherit;
  vertical-align: baseline;
}

header,
section {
  display: block;
}

html {
  box-sizing: border-box;
  -webkit-text-size-adjust: 100%;
  -moz-text-size-adjust: 100%;
  -ms-text-size-adjust: 100%;
  text-size-adjust: 100%;
}

@media (min-width:60em) {
  html {
    font-size: 112.5%;
  }
}

*,
:after,
:before {
  box-sizing: inherit;
}

body {
  font-family: fira-sans,-apple-system,BlinkMacSystemFont,Segoe UI,Helvetica,sans-serif;
  line-height: 1;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: palette(#000,light);
}

@media (min-width:80em) {
  body {
    background: #ecefef;
  }
}

a {
  text-decoration: none;
  color: #041d24;
}

button {
  font-family: inherit;
}

button {
  font-size: inherit;
  line-height: 1;
  background: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  border: 0;
  padding: 0;
  border-radius: 0;
}

.col-12 {
  width: 100%;
}

@media (min-width:40em) {
  .sm-col-12 {
    width: 100%;
  }
}

@media (min-width:60em) {
  .md-col-11 {
    width: 91.66667%;
  }
}

@media (min-width:80em) {
  .lg-col-10 {
    width: 83.33333%;
  }
}

.flex {
  display: -webkit-box;
  display: flex;
}

.items-center {
  -webkit-box-align: center;
  align-items: center;
}

.justify-between {
  -webkit-box-pack: justify;
  justify-content: space-between;
}

.relative {
  position: relative;
}

.z2 {
  z-index: 2;
}

.icon-button {
  height: 30px;
  width: 30px;
  background: #083644;
  border-radius: 50%;
  position: relative;
}

@media (min-width:40em) {
  .icon-button {
    height: 40px;
    width: 40px;
  }
}

.icon-button__icon {
  position: absolute;
  fill: #fff;
  font-size: 18px!important;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%,-50%);
  transform: translate(-50%,-50%);
}

.topographic-pattern {
  background-repeat: repeat;
  background-size: 80%;
}

@media (min-width:40em) {
  .topographic-pattern {
    background-size: 25%;
  }
}

.icon {
  display: inline-block;
  height: 16px;
  width: 16px;
  vertical-align: middle;
}

.header {
  position: fixed;
  max-width: 1600px;
  left: 0;
  right: 0;
  margin: 0 auto;
  z-index: 999;
  padding: 0;
}

.header__inner {
  box-shadow: 0 14px 28px rgba(0,0,0,.15),0 7px 10px rgba(0,0,0,.22);
  margin: 0 auto;
}

@media (min-width:40em) {
  .header__inner {
    border-radius: 0 0 4px 4px;
  }
}

.header__top-section {
  padding: .5rem;
  box-shadow: 0 14px 28px rgba(0,0,0,.15),0 7px 10px rgba(0,0,0,.22);
  background-color: #05242d;
}

@media (min-width:40em) {
  .header__top-section {
    padding: .5rem 2rem;
  }
}

@media (min-width:60em) {
  .header__top-section {
    padding: .5rem 2rem;
  }
}

.header__left {
  -webkit-box-flex: 2;
  flex: 2;
}

.skip-to-content {
  padding: 1rem;
  display: block;
  text-align: center;
  background-color: #041d24;
  left: -999px;
  position: absolute;
  top: auto;
  width: 1px;
  height: 1px;
  overflow: hidden;
  z-index: -999;
}

.skip-to-content__label {
  font-size: 1em;
  color: #fff;
  font-family: rift-soft,-apple-system,BlinkMacSystemFont,Segoe UI,Helvetica,sans-serif;
}
