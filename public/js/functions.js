const csrfToken = document
.querySelector('meta[name="csrf-token"]')
.getAttribute("content");



function addStuff(videoId) {
    fetch(`/stuff/${videoId}/add`, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": csrfToken,
        },
    })
        .then((response) => response.json())
        .then((data) => {
          //  alert(data.html);
            document.getElementById('videoPoster').innerHTML = data.html
            activateModal()
        })
        .catch((error) => {
            console.error("Error:", error);
        });
}

function removeVideoFromList(videoId) {
    fetch(`/stuff/${videoId}/remove`, {
        method: "DELETE",
        headers: {
            "Content-Type": "application/json",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-Token": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        },
        body: JSON.stringify({ videoId: videoId }),
    })
        .then((response) => response.json())
        .then((data) => {
            document.getElementById('videoPoster').innerHTML = data.html
            activateModal()
        })
        .catch((error) => console.error("Error:", error));
}

function goPlay(url) {

    window.location.href = url;
    
}

function addContinueWatching(videoid) {

    fetch(`/playvideo/${videoid}/add`, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": csrfToken,
        },
    })
        .then((response) => response.json())
        .then((data) => {
          //  alert(data.html);
           // document.getElementById('videoPoster').innerHTML = data.html
           // activateModal()
        })
        .catch((error) => {
            console.error("Error:", error);
        });

    console.log(videoid);
    
}
