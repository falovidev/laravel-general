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
            activateJs()
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
        body: JSON.stringify({
             videoId: videoId 
            }),
    })
        .then((response) => response.json())
        .then((data) => {
            document.getElementById('videoContainer').innerHTML = data.html
            activateJs()
        })
        .catch((error) => console.error("Error:", error));
}

function removeVideoFromListStuff(videoId) {
    fetch(`/stuff/${videoId}/remove-from-list`, {
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
            document.getElementById('videoContainer').innerHTML = data.html
            activateJs()
        })
        .catch((error) => console.error("Error:", error));
}

function removeVideoStuff(videoId) {
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
            document.getElementById('videoContainer').innerHTML = data.html
            activateJs()
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
            document.getElementById('buttonsPlay').innerHTML = data.html
        })
        .catch((error) => {
            console.error("Error:", error);
        });

    
}

function removeContinueWatching(videoId) {
    fetch(`/playvideo/${videoId}/remove`, {
        method: "DELETE",
        headers: {
            "Content-Type": "application/json",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-Token": csrfToken,
        },
        body: JSON.stringify({ videoId: videoId }),
    })
        .then((response) => response.json())
        .then((data) => {
            document.getElementById('videoPlayed').innerHTML = data.html
            activateJs()
        })
        .catch((error) => console.error("Error:", error));
}
