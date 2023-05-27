function GetStudentInfo(Str) {
    $url = '/admin/borrowers-students/' + Str;

    $.ajax({
        url: $url,
        type: 'GET',
        dataType: 'JSON',
        success: function(data) {
            $('#id_number').val(data.id_number);
            $('#address').val(data.address);
            $('#grade_level_section').val(data.grade_level + " / " + data.section);

            var profile_photo = document.getElementById("imageResult");
            profile_photo.src = "{{ url(asset('student_profile/')) }}" + '/' + data.profile_path;
        }
    });
}

function GetBookInfo(Str) {
        $url1 = '/admin/books/';
        $url = $url1.concat(Str);

        $.ajax({
        url: $url,
        type: 'GET',
        dataType: 'JSON',
        success: function(data) {
            $('#book_description').val(data.description);
            $('#publish_date').val(data.publish_date);
            var imageElement = document.getElementById("book_photo");
            imageElement.src = "{{ url(asset('book_cover/')) }}" + '/' + data.book_cover_photo;
        }
    });
}