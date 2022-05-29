const username = document.querySelector("#username")
const usernamemsg = document.querySelector("#usernamemsg")
const password = document.querySelector("#password")
const passwordmsg = document.querySelector("#passwordmsg")
const showpassword = document.querySelector("#showpassword")
const signinbutton = document.querySelector("#signinbutton")

showpassword.addEventListener("change", () =>{
    if (password.type === 'password') {
        password.type = 'text'
    } else {
        password.type = 'password'
    }
})

fetch("http://ufasoreklama.epizy.com/panel/config/signin.php").then(response => response.text()).then(data => {
    if (data !== '') {
        usernamemsg.innerHTML = `<b class="text-success">${data}</b>`
    }
})

document.querySelector("form").addEventListener("submit", (e) => {
    e.preventDefault()
})

signinbutton.addEventListener("click", () => {
    if (username.value === '' || password.value === '') {
        if (username.value === '') {
            usernamemsg.innerHTML = `<b class="text-danger">ამ ველის შევსება სავალდებულოა</b>`
        } else {
            username.innerHTML = ``
        }
        if (password.value === '') {
            passwordmsg.innerHTML = `<b class="text-danger">ამ ველის შევსება სავალდებულოა</b>`
        } else {
            passwordmsg.innerHTML = ``
        }
    } else {
        fetch("http://ufasoreklama.epizy.com/panel/config/signin.php", {
            method: "POST",
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({
                "username": username.value,
                "password": password.value
            })
        }).then(response => response.text()).then(data => {
            if (data !== '') {
                usernamemsg.innerHTML = `<b class="text-danger">${data}</b>`
            } else {
                // document.location.href = './'
            }
        }).catch(error => console.log(error))
    }
})