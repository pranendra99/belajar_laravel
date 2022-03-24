        // checkSlug
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');
    
        title.addEventListener('keyup', function() {
            slug.value = title.value.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
            
            // fetch('/dashboard/posts/checkSlug?title=' + title.value)
            //     .then(response => response.json())
            //     .then(data => slug.value = data.slug);

        });
        
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        });

        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const reader = new FileReader();
            reader.readAsDataURL(image.files[0]);

            reader.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    