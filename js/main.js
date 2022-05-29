// display posts
fetch("./config/json.php").then(response => response.json()).then(data => {
    for (let i = 0; i < data.length; i++) {
        const postscontainer = document.querySelector("#posts")
        const element = data[i];
        const post = document.createElement("div")
        post.classList.add("post")
        post.innerHTML = `<b>ამტვირთავი: ${element.postby}</b>
        <br /><br />
        <b>განცხადება: ${element.post}</b>
        <hr />
        <img src="./images/${element.image}" />`
        postscontainer.appendChild(post)
    }
})

// insert posts
const image = document.querySelector("#image")
const imageerror = document.querySelector("#imageerror")
const fullname = document.querySelector("#fullname")
const fullnameerror = document.querySelector("#fullnameerror")
const post = document.querySelector("#post")
const posterror = document.querySelector("#posterror")
const errorscontainer = document.querySelector("#errors")

document.querySelector("#uploadbutton").addEventListener("click", () => {
    if (image.files.length !== 1 || fullname.value === '' || post.value === '') {
        document.querySelector("form").addEventListener("click", (e) => {
            e.preventDefault()
        })
        if (image.files.length !== 1) {
            imageerror.innerHTML = `<b class="text-danger">ფოტოს ატვირთვა სავალდებულოა</b>`
        } else {
            imageerror.innerHTML = ``
        }
        if (fullname.value === '') {
            fullnameerror.innerHTML = `<b class="text-danger">ამ ველის შევსება სავალდებულოა</b>`
        } else {
            fullnameerror.innerHTML = ``
        }
        if (post.value === '') {
            posterror.innerHTML = `<b class="text-danger">ამ ველის შევსება სავალდებულოა</b>`
        } else {
            posterror.innerHTML = ``
        }
        document.querySelector("form").addEventListener("submit", (e) => {
            e.preventDefault()
        })
    } else {
        imageerror.innerHTML = ``
        fullnameerror.innerHTML = ``
        posterror.innerHTML = ``
        errorscontainer.style.padding = '5px'
        errorscontainer.style.borderRadius = '5px'
    }
})