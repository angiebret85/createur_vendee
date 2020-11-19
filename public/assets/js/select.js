$(document).ready(function() {
    $('select').select2();

});
$('#contactButton').click(e=>{
        e.preventDefault()
        $('#contactForm').slideDown();
        $('#contactButton').slideUp();
    }
)