<div>
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#noi_dung',
            // width: 1000,
            // height: 500,
            plugins: [
                'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
                'searchreplace', 'wordcount', 'visualblocks', 'code', 'fullscreen', 'insertdatetime', 'media',
                'table', 'emoticons', 'help'
            ],
            toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | ' +
                'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
                'forecolor backcolor emoticons | help',
            menu: {
                favs: {
                    title: 'My Favorites',
                    items: 'code visualaid | searchreplace | emoticons'
                }
            },
            menubar: 'favs file edit view insert format tools table help',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [{
                    value: 'First.Name',
                    title: 'First Name'
                },
                {
                    value: 'Email',
                    title: 'Email'
                },
            ],

            automatic_uploads: true,
            images_upload_handler: function(blobInfo, success, failure) {
                var xhr = new XMLHttpRequest();
                xhr.withCredentials = false;

                xhr.open('POST', '/upload_image'); // Đảm bảo đường dẫn đúng đến API upload của bạn

                xhr.setRequestHeader("X-CSRF-Token", '{{ csrf_token() }}');

            xhr.onload = function() {
                    if (xhr.status !== 200) {
                        console.log('Upload failed:', xhr.responseText);
                        failure('HTTP Error: ' + xhr.status);
                        return;
                    }

                    var json = JSON.parse(xhr.responseText);

                    if (!json || typeof json.location !== 'string') {
                        console.log('Invalid JSON response:', xhr.responseText);
                        failure('Invalid JSON: ' + xhr.responseText);
                        return;
                    }

                    success(json.location);
                };

                xhr.onerror = function() {
                    console.log('An error occurred during the XMLHttpRequest');
                    failure('An error occurred during the XMLHttpRequest');
                };

                var formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());

                xhr.send(formData);
            }
        });
    </script>
</div>
