// display posts
fetch("./config/json.php").then(response => response.json()).then(data => {
    for (let i = 0; i < data.length; i++) {
        const postscontainer = document.querySelector("#pending_posts")
        const element = data[i];
        const post = document.createElement("div")
        post.classList.add("post")
        post.innerHTML = `<div class="post-controls">
            <a class="btn btn-danger" href="./config/deletepost.php?id=${element.id}">X</a>
            <a class="btn btn-success" href="./config/publishpost.php?id=${element.id}">O</a>
        </div>
        <hr />
        <b>ამტვირთავი: ${element.postby}</b>
        <br /><br />
        <b>განცხადება: ${element.post}</b>
        <hr />
        <center>
            <img src="../../images/${element.image}" />
        </center>
        <br />
        <b>სტატუსი: ${element.status}</b>
        <br />
        <b>id: ${element.id}</b>`
        postscontainer.appendChild(post)
    }
})