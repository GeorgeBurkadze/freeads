// display posts
fetch("http://ufasoreklama.epizy.com/panel/config/json.php").then(response => response.json()).then(data => {
    for (let i = 0; i < data.length; i++) {
        const postscontainer = document.querySelector("#pending_posts")
        const element = data[i];
        const post = document.createElement("div")
        post.classList.add("post")
        post.innerHTML = `<b>ამტვირთავი: ${element.postby}</b>
        <br /><br />
        <b>განცხადება: ${element.post}</b>
        <hr />
        <center>
            <img src="http://ufasoreklama.epizy.com/images/${element.image}" />
        </center>
        <br />
        <b>სტატუსი: ${element.status}</b>
        <br />
        <b>id: ${element.id}</b>`
        postscontainer.appendChild(post)
    }
})