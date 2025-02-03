


function loadMusic() {
    fetch('fetch_music.php')
        .then(response => response.json())
        .then(data => {
            let musicDiv = document.getElementById('music-tracks');
            musicDiv.innerHTML = "";

            data.forEach(track => {
                let trackElement = `<div class="track">
                    <strong>${track.title}</strong>
                    <audio controls>
                        <source src="${track.audio_url}" type="audio/mpeg">
                        Your browser does not support the audio tag.
                    </audio>
                    <a href="${track.audio_url}" download>Download</a>
                </div>`;
                musicDiv.innerHTML += trackElement;
            });
        })
        .catch(error => console.error("Error fetching music:", error));
}

function loadYouTubeVideos() {
    let channelId = "yourchannelID";
    let apiKey = "your_youtube_api_key";
    let youtubeUrl = `https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId=${channelId}&maxResults=5&key=${apiKey}`;

    fetch(youtubeUrl)
        .then(response => response.json())
        .then(data => {
            let videoDiv = document.getElementById('youtube-videos');
            videoDiv.innerHTML = "";

            data.items.forEach(video => {
                let videoId = video.id.videoId;
                let videoElement = `<iframe width="300" height="200" src="https://www.youtube.com/embed/${videoId}" frameborder="0" allowfullscreen></iframe>`;
                videoDiv.innerHTML += videoElement;
            });
        })
        .catch(error => console.error("Error fetching YouTube videos:", error));
}

loadMusic();
loadYouTubeVideos();
setInterval(loadMusic, 20000);
