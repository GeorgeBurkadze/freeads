// display posts
fetch("http://localhost:8000/panel/config/json.php").then(response => response.json()).then(data => {
    for (let i = 0; i < data.length; i++) {
        const postscontainer = document.querySelector("#pending_posts")
        const element = data[i];
        const post = document.createElement("div")
        post.classList.add("post")
        post.innerHTML = `<a class="btn btn-danger" href="http://localhost:8000/panel/config/deletepost.php?id=${element.id}">X</a>
        <hr />
        <b>ამტვირთავი: ${element.postby}</b>
        <br /><br />
        <b>განცხადება: ${element.post}</b>
        <hr />
        <center>
            <img src="http://localhost:8000/images/${element.image}" />
        </center>
        <br />
        <b>სტატუსი: ${element.status}</b>
        <br />
        <b>id: ${element.id}</b>`
        postscontainer.appendChild(post)
    }
})