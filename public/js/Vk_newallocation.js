let validation_btn = document.getElementById("validation_btn");
validation_btn.style.display = 'none';
const fileInput = document.getElementById('img'); 

fileInput.addEventListener('change', function () {
    if (fileInput.files.length > 0) {
        validation_btn.style.display = 'inline-block';
    } else {
        validation_btn.style.display = 'none';
    }
});
  

validation_btn.addEventListener('click', function (event) {
    // $.ajax({
    //     type: "POST",
    //     url: "<?= URLROOT ?>/CustomerPawn/getTimeSlots",
    //     data: {
    //         date: selectedDate
    //     },
    //     dataType: "JSON",
    //     success: function(response) {
           

    //     },
    //     error: function(xhr, status, error) {
    //         console.log("Error: " + error);
    //     }
    // });



});