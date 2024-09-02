const csrfToken = document
    .querySelector('meta[name="csrf-token"]')
    .getAttribute("content");

const  headers =  {
    "Content-Type": "application/json",
    "X-CSRF-TOKEN": csrfToken,
} 

function updateView(data) {
    var videoStuff = document.getElementById("videoStuff");
    var videoPoster = document.getElementById("videoPoster");
    videoStuff ? (videoStuff.innerHTML = data.html_stuff) : false;
    videoPoster ? (videoPoster.innerHTML = data.html_poster) : false;
}


function addStuff(videoId) {
    fetch(`/stuff/${videoId}/add`, {
        method: "POST",
        headers:headers,
    })
        .then((response) => response.json())
        .then((data) => {
            updateView(data);
            activateJs();
        })
        .catch((error) => {
            console.error("Error:", error);
        });
}

function removeVideoFromList(videoId) {
    fetch(`/stuff/${videoId}/remove`, {
        method: "DELETE",
        headers: headers,
        body: JSON.stringify({
            videoId: videoId,
        }),
    })
        .then((response) => response.json())
        .then((data) => {
            updateView(data);
            activateJs();
        })
        .catch((error) => console.error("Error:", error));
}

function removeVideoFromListStuff(videoId) {
    fetch(`/stuff/${videoId}/remove-from-list`, {
        method: "DELETE",
        headers: headers,
        body: JSON.stringify({ videoId: videoId }),
    })
        .then((response) => response.json())
        .then((data) => {
            updateView(data);   
            activateJs();   
        })
        .catch((error) => console.error("Error:", error));
}

function removeVideoStuff(videoId) {
    fetch(`/stuff/${videoId}/remove`, {
        method: "DELETE",
        headers: headers,
        body: JSON.stringify({ videoId: videoId }),
    })
        .then((response) => response.json())
        .then((data) => {
            updateView(data);
            activateJs();
        })
        .catch((error) => console.error("Error:", error));
}

function goPlay(url) {
    window.location.href = url;
}

function addContinueWatching(videoid) {
    fetch(`/playvideo/${videoid}/add`, {
        method: "POST",
        headers: headers,
    })
        .then((response) => response.json())
        .then((data) => {
            document.getElementById("buttonsPlay").innerHTML = data.html;
        })
        .catch((error) => {
            console.error("Error:", error);
        });
}

function removeContinueWatching(videoId) {
    fetch(`/playvideo/${videoId}/remove`, {
        method: "DELETE",
        headers: headers,
        body: JSON.stringify({ videoId: videoId }),
    })
        .then((response) => response.json())
        .then((data) => {
            document.getElementById("videoPlayed").innerHTML = data.html;
            activateJs();
        })
        .catch((error) => console.error("Error:", error));
}


