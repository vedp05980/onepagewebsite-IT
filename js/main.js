function submitForm(formId) {
    debugger
    try {

        if (!$("#" + formId).valid()) {
            return false
        }
        $("button").attr('disabled', true)
        var postData = $('#' + formId).serialize()

        $.ajax({
            type: 'POST',
            url: "mail.php",
            data: postData,
            success: function (data) {
                $("button").attr('disabled', false)
                if (data == 1) {

                    $("#" + formId)[0].reset();
                    hideShowSnackBar()
                    
                    $("#myModalEnquiry").modal("hide");
                } else {
                    alert(data)
                }
            },
            error: function (error) {
                debugger
                $("button").attr('disabled', false)
                alert("Something went wrong, please try again later")
            }
        });
    } catch (error) {
        console.log(error.message);

        $("button").attr('disabled', false)
        alert("Something went wrong, please try again later")
    }
}

function hideShowSnackBar() {
    // Get the snackbar DIV
    var x = document.getElementById("snackbar");

    // Add the "show" class to DIV
    x.className = "show";

    // After 3 seconds, remove the show class from DIV
    setTimeout(function () {
        x.className = x.className.replace("show", "");
    }, 3000);
}

// navbar-close
 $('.navbar-collapse a').click(function(){
     $(".navbar-collapse").collapse('hide');
});
// navbar-close end


window.addEventListener("scroll", function (){
var header = document.querySelector("header");
header.classList.toggle("sticky", window.scrollY > 0);
})