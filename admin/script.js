function loadGallery() {
    fetch('fetch_gallery.php')
        .then(response => response.json())
        .then(data => {
            let galleryDiv = document.getElementById('gallery-images');
            galleryDiv.innerHTML = "";

            data.forEach(image => {
                let imgElement = `<a href="#lightbox${image.id}">
                    <img src="${image.image_url}" alt="${image.caption}">
                </a>
                <div id="lightbox${image.id}" class="lightbox" onclick="this.style.display='none'">
                    <img src="${image.image_url}" alt="${image.caption}">
                </div>`;
                galleryDiv.innerHTML += imgElement;
            });
        })
        .catch(error => console.error("Error fetching gallery images:", error));
}

loadGallery();
setInterval(loadGallery, 20000);
