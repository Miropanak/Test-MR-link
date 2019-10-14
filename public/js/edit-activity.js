
window.addEventListener("DOMContentLoaded", function(event) {
    document.getElementsByTagName("form")[0].addEventListener("submit", function (event) {

        var passed = "true";

        // test on header
        if (document.getElementById("title").value == ""){
            passed = "Chyba. Hlavička aktivity nemôže zostať prázdna."
        }
        if (CKEDITOR.instances['content'].getData() == ""){
            passed = "Chyba. Text aktivity nesmie zostať prázdny."
        }

        if (passed != "true"){
            alert(passed);
            event.preventDefault();
        }

    });
    CKEDITOR.replace('content');
});
