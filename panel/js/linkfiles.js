const date = new Date();
document.querySelector("#stylecss").href = "http://ufasoreklama.epizy.com/panel/css/style.css?dfhuifrgrigie=" + date.getTime() + Math.random()
const mainjs = document.querySelectorAll("#mainjs")
for (let i = 0; i < mainjs.length; i++) {
    const element = mainjs[i];
    element.src = "http://ufasoreklama.epizy.com/panel/js/main.js?usdgfywrf=" + date.getTime() + Math.random()
}

const signinjs = document.querySelectorAll("#signinjs")
for (let i = 0; i < signinjs.length; i++) {
    const element = signinjs[i];
    element.src = "http://ufasoreklama.epizy.com/panel/js/signin.js?usdgfywrf=" + date.getTime() + Math.random()
}