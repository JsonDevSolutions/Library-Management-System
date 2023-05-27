$("#update_book, #save_book").click(function(){
    validateDropdowns("author");
    validateDropdowns("category");
    validateDropdowns("publisher");
    validateDropdowns("book_type");

    let errors = document.getElementsByClassName("border-danger");
    
    if(errors.length > 0 && $(this).attr("id") != 'save_book'){
        return false;
    }
});

$('#upload').on('change', function () {
    readURL(this);
});

// Fetch uploaded photo and display in image element
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imageResult').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
// Checks if dropdown selected value is default
function validateDropdowns(dropdown_element){
    if($(`#${dropdown_element}`).val() == 0){
        $(`#${dropdown_element}`).siblings(".select2").addClass('border border-danger');
    } else {
        $(`#${dropdown_element}`).siblings(".select2").removeClass('border border-danger');
    }
}