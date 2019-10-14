/**
 * Created by Bernad on 11/6/2017.
 *
 * Frontend check on form values during creating new event
 */

/**
 * After including of this JS a listener is added to window and will
 * create the CKEDITOR.
 */

window.addEventListener("DOMContentLoaded", function(options) {

    /**
     * This function will add an event listener to submit
     * button that is responsible for creating new event.
     */
    document.getElementById("buttonSubm1").addEventListener("click", function (event) {


        var passed = "true";

        //var num = 0;


        var num = localStorage.getItem("numChecked");




        /**
         * Check header value if it is not empty
         */

        if (document.getElementById("new-header").value == ""){
            passed = "Chyba. Hlavička udalosti nemôže zostať prázdna."
        }

        /**
         * Check CKEDITOR field if it is not empty
         */
        if (CKEDITOR.instances['new-event'].getData() == ""){
            passed = "Chyba. Text udalosti nesmie zostať prázdny."
        }

        var numChecked = document.querySelectorAll('input[type="checkbox"]:checked').length;


        var numChecked =  +numChecked + (+num);


        if(document.querySelector('input[name="input[]"]:checked')!=null)
        var selectedEventType = document.querySelector('input[name="input[]"]:checked').value;


        /**
         * If exist at least one checkbox
         */

        if ((document.querySelector('input[type="checkbox"]') !== null) || (numChecked > 0)) {
            /**
             * If it is more than one checked
             */
            if (numChecked > 1){
                if (selectedEventType != "Polytomická"){
                    passed = "Chyba. Len typ \"Polytomická\" môže mať viac správnych možností.";
                }
            }else if (numChecked == 1){
                if (selectedEventType != "Dichotomická"){
                    passed = "Chyba. Len typ \"Dichotomická\" má práve jednu správnu možnosť.";
                }
            }
            else if(numChecked == 0){
                passed = "Chyba. Nie je to udalosť typu Diktát, chýba aspoň jedna správna možnosť.";
            }
        }
        else{
            if (selectedEventType != "Diktát"){
                passed = "Chyba. Len udalosť Diktát nemusí mať možnosti."
            }
        }

        /**
         * BUG fix - input int test, receive input data
         *
         * @type {HTMLElement | null}
         */
        var inputTimeToExplain = document.getElementById("new_time_to_explain");
        var inputTimeToHandle =  document.getElementById("new_time_to_handle");


        /**
         * BUG fix - input int test, time to explain
         */
        if(!isNormalInteger(inputTimeToExplain.value)){
            passed = "Chyba. Čas pre vysvetlenie udalosti musí byť nezáporné celé číslo.";
        }else{
            if (inputTimeToExplain.value == 0){
                passed = "Chyba. Čas pre vysvetlenie udalosti musí byť nenulové číslo.";
            }
        }

        /**
         * BUG fix - input int test, time to handle
         */
        if(!isNormalInteger(inputTimeToHandle.value)){
            passed = "Chyba. Čas pre obsluhu udalosti musí byť nezáporné celé číslo.";
        }else{
            if (inputTimeToHandle.value == 0){
                passed = "Chyba. Čas pre obsluhu udalosti musí byť nenulové číslo.";
            }
        }

        /**
         * This is HACK due to dynamically added new ckeditor will
         * remove all value data from previous ckeditor and input
         */
        var childDivs = document.getElementById('myUL').getElementsByTagName("*");
        for (var i = 0, len = childDivs.length; i < len; i++) {
            if (childDivs[i].id.indexOf("optionData") !== -1) {
                var liId = childDivs[i].id.replace( /^\D+/g, '');
                document.getElementById("input"+liId).value = childDivs[i].innerHTML;
                if (childDivs[i].innerHTML == ""){
                    passed = "Chyba. Niektorá z možností je prázdna."
                    break;
                }
            }
        }

        if (passed != "true"){
            alert(passed);
            event.preventDefault();
        }

    });

    CKEDITOR.replace( 'new-event' );

});

/**
 * Function for creating antoher option of this event
 *
 * This function will create an area with new ckeditor,
 * checkbox if option is correct answer, delete button,
 * and save button
 *
 * @param {null}
 *
 * @return void
 */
function newOption(){

    mainUL = document.getElementById("myUL");

    counter = 0;

    if (localStorage.getItem("counter") != null) {
        counter = localStorage.getItem("counter");
    }
    counter = +counter + 1; // WTF IS THIS?!

    idName = "option" + counter;
    remButId = "removeBut" + counter;
    saveButId = "save" + counter;
    inputID = "input" + counter;
    optionDataId = "optionData" + counter;

    /**
     * NEW IMPLEMENTATION (fix unchecking checkboxes) - START
     */

        var optionsListPlaceLi = document.createElement("li");
        optionsListPlaceLi.id = idName;
        optionsListPlaceLi.style = "padding: 20px;";
        optionsListPlaceLi.classList.add("panel");
        optionsListPlaceLi.classList.add("panel-default");

        var optionTitle = document.createElement("h5");
        optionTitle.innerHTML = "Znenie možnosti";

        var mainOptionDiv = document.createElement("div");
        mainOptionDiv.class = "checkbox"+counter;
        mainOptionDiv.style['padding-top'] = "1px";

        var ckEditorInput = document.createElement("input");
        ckEditorInput.type ="text";
        ckEditorInput.style = "margin-right: 45px";
        ckEditorInput.name = "moznost[]";
        ckEditorInput.id = inputID;

        var  optionDatadiv = document.createElement("div");
        optionDatadiv.id = optionDataId;
        optionDatadiv.name = "optionData";
        optionDatadiv.style = "display:none;";
        optionDatadiv.innerHTML = "data";

        var checkboxInputHidden = document.createElement("input");
        checkboxInputHidden.type = "hidden";
        checkboxInputHidden.name = "spravnost[]";
        checkboxInputHidden.id = "hiddeninput"+counter;
        checkboxInputHidden.value = 0;

        var checkboxInput = document.createElement("input");
        checkboxInput.type = "checkbox";
        checkboxInput.name = "spravnost[]";
        checkboxInput.id = "new-checkbox"+counter;

        var bottomBar = document.createElement('div');
        bottomBar.style = "margin-top:25px";

        bottomBar.appendChild(checkboxInputHidden);
        bottomBar.appendChild(checkboxInput);
        bottomBar.insertAdjacentHTML("beforeend","<span style=\"margin-top:25px\"> Správna odpoveď</span>");
        bottomBar.insertAdjacentHTML("beforeend","<button id =\"" + remButId + "\" class=\"btn btn-danger\" onclick= \"remOption(this.id)\" style=\"margin-left: 15px\" type=button>Zmazať</button>");
        bottomBar.insertAdjacentHTML("beforeend","<button id =\"" + saveButId + "\" class=\"btn btn-success\" onclick= \"saveOption(this.id)\" style=\"margin-left: 15px\" type=button>Uložiť</button>");

        mainOptionDiv.appendChild(ckEditorInput);
        mainOptionDiv.appendChild(optionDatadiv);
        mainOptionDiv.appendChild(bottomBar);
        
        optionsListPlaceLi.appendChild(optionTitle);
        optionsListPlaceLi.appendChild(mainOptionDiv);

        mainUL.appendChild(optionsListPlaceLi);

    /**
     * NEW IMPLEMENTATION (fix unchecking checkboxes) - END
     */

    /**
     * OLD IMPLEMENTATION:
            *
               * mainUL.innerHTML = mainUL.innerHTML +
                   * "<li id=\"" + idName + "\" style=\"border:1px solid black; padding-left: 40px;\">" +
                      *  "<div class=\"checkbox" + counter + "\">" +
                      *      "<input type=\"text\" style=\"margin-right: 45px\" name=\"moznost[]\" id=\"" + inputID + "\" ></input>" +
                      *      "<div  id =\"" + optionDataId + "\" name=\"optionData\" style=\"display:none;\">data</div>" +
                      *      //<!-- https://stackoverflow.com/questions/14067215/unchecked-checkbox-returning-null-value
                      *      "<input type=\"hidden\" name=\"spravnost[]\" id=\"hiddeninput\" value=\"0\">" +
                      *      "<input type=\"checkbox\" name=\"spravnost[]\" id=\"new-checkbox" + counter + "\">Správna odpoveď</input>" +
                      *      "<button id =\"" + remButId + "\" onclick= \"remOption(this.id)\" style=\"margin-left: 15px\" type=button>*Zmazať*</button>" +
                      *      "<button id =\"" + saveButId + "\" onclick= \"saveOption(this.id)\" style=\"margin-left: 15px\" type=button>*Uložiť*</button>" +
                      *  "</div>" +
                   * "</li>";
            */

    localStorage.setItem("counter", counter);

            /**
     * This I had to solve with my StackOverflow community:
            *https://stackoverflow.com/questions/47423936/how-to-get-html-element-after-append-with-pure-javascript*/
            setTimeout(function() {
                CKEDITOR.replace(inputID).setData('Napíš znenie možnosti ...');

        document.getElementById("newOptionId").disabled = "disabled";
        document.getElementById(remButId).disabled = "disabled";
        document.getElementById("buttonSubm1").disabled = true;
    },0);


}

function addOption(options){

    mainUL = document.getElementById("myUL");

    counter = 0;
    if (localStorage.getItem("counter") != null) {
        counter = localStorage.getItem("counter");
    }
    counter = +counter + 1;

    idName = "option" + counter;
    remButId = "removeBut" + counter;
    saveButId = "save" + counter;
    inputID = "input" + counter;
    optionDataId = "optionData" + counter;

    // NEW IMPLEMENTATION (fix unchecking checkboxes):

    var li = document.createElement("li");
    li.id = idName;
    li.style = "border:1px solid black; padding-left: 40px;";

    var divA = document.createElement("div");
    divA.class = "checkbox"+counter;

    var inputA = document.createElement("input");
    inputA.type ="text";
    inputA.style = "margin-right: 45px";
    inputA.name = "moznost[]";
    inputA.id = inputID;

    var  divB = document.createElement("div");
    divB.id = optionDataId;
    divB.name = "optionData";
    divB.style = "display:none;";
    divB.innerHTML = "data";

    var inputB = document.createElement("input");
    inputB.type = "hidden";
    inputB.name = "spravnost[]";
    inputB.id = "hiddeninput"+counter;
    inputB.value = 0;

    var inputC = document.createElement("input");
    inputC.type = "checkbox";
    inputC.name = "spravnost[]";
    inputC.id = "new-checkbox"+counter;
    inputC.innerHTML = "Správna odpoveď";

    divA.appendChild(inputA);
    divA.appendChild(divB);
    divA.appendChild(inputB);
    divA.appendChild(inputC);
    divA.insertAdjacentHTML("beforeend","<button id =\"" + remButId + "\" onclick= \"remOption(this.id)\" style=\"margin-left: 15px\" type=button>Zmazať</button>");
    divA.insertAdjacentHTML("beforeend","<button id =\"" + saveButId + "\" onclick= \"saveOption(this.id)\" style=\"margin-left: 15px\" type=button>Uložiť</button>");

    li.appendChild(divA);

    mainUL.appendChild(li);

    // OLD IMPLEMENTATION:
    /*
        mainUL.innerHTML = mainUL.innerHTML +
            "<li id=\"" + idName + "\" style=\"border:1px solid black; padding-left: 40px;\">" +
                "<div class=\"checkbox" + counter + "\">" +
                    "<input type=\"text\" style=\"margin-right: 45px\" name=\"moznost[]\" id=\"" + inputID + "\" ></input>" +
                    "<div  id =\"" + optionDataId + "\" name=\"optionData\" style=\"display:none;\">data</div>" +
                    //<!-- https://stackoverflow.com/questions/14067215/unchecked-checkbox-returning-null-value
                    "<input type=\"hidden\" name=\"spravnost[]\" id=\"hiddeninput\" value=\"0\">" +
                    "<input type=\"checkbox\" name=\"spravnost[]\" id=\"new-checkbox" + counter + "\">Správna odpoveď</input>" +
                    "<button id =\"" + remButId + "\" onclick= \"remOption(this.id)\" style=\"margin-left: 15px\" type=button>Zmazať</button>" +
                    "<button id =\"" + saveButId + "\" onclick= \"saveOption(this.id)\" style=\"margin-left: 15px\" type=button>Uložiť</button>" +
                "</div>" +
            "</li>";
    */

    localStorage.setItem("counter", counter);

    // This I had to solve with my StackOverflow community:
    //https://stackoverflow.com/questions/47423936/how-to-get-html-element-after-append-with-pure-javascript
    setTimeout(function() {
        CKEDITOR.replace(inputID).setData();

        document.getElementById("newOptionId").disabled = "disabled";
        document.getElementById(remButId).disabled = "disabled";
        document.getElementById("buttonSubm1").disabled = true;
    },0);

}

/**
 * Function for removing option from actual event form
 *
 * This function will permanently remove option from
 * the event form on frontend.
 *
 * @param idToRem String ID of option for removing
 *
 * @return void
 */
function remOption(idToRem){

    var liId = idToRem.replace( /^\D+/g, '');
    document.getElementById("option"+liId).remove();

}

/**
 * Function for saving an option of this event
 *
 * This function will save option on frontend page. It means
 * that user will not be able to edit option anymore, just delete.
 *
 * @param id String ID identifying an option unit
 *
 * @return void
 */
function saveOption(id){

    var liId = id.replace( /^\D+/g, '');
    var editorId = "input"+liId;
    var optionDataId = "optionData" + liId;

    optionData = document.getElementById(optionDataId);
    /** Data for user to see before save */
    optionData.innerHTML = CKEDITOR.instances[editorId].getData();
    /** Data for controller */
    document.getElementById(editorId).value=CKEDITOR.instances[editorId].getData();

    optionData.style.display = "block";
    document.getElementById("save"+liId).style.display="none";
    document.getElementById("newOptionId").disabled = false;
    document.getElementById("removeBut"+liId).disabled = false;
    document.getElementById("buttonSubm1").disabled = false;

    /** This code generate errors later in console, but it works */
    CKEDITOR.instances[editorId].destroy(true);

    document.getElementById(editorId).style.display="none";
}

function isNormalInteger(str) {
    var n = Math.floor(Number(str));
    return String(n) === str && n >= 0;
}

function checkFormular(){

    var passed = "true";

    //var num = 0;


    var num = localStorage.getItem("numChecked");




    /**
     * Check header value if it is not empty
     */

    if (document.getElementById("new-header").value == ""){
        passed = "Chyba. Hlavička udalosti nemôže zostať prázdna."
    }

    /**
     * Check CKEDITOR field if it is not empty
     */
    if (CKEDITOR.instances['new-event'].getData() == ""){
        passed = "Chyba. Text udalosti nesmie zostať prázdny."
    }

    var numChecked = document.querySelectorAll('input[type="checkbox"]:checked').length;


    var numChecked =  +numChecked + (+num);


    if(document.querySelector('input[name="input[]"]:checked')!=null)
        var selectedEventType = document.querySelector('input[name="input[]"]:checked').value;


    /**
     * If exist at least one checkbox
     */

    if ((document.querySelector('input[type="checkbox"]') !== null) || (numChecked > 0)) {
        /**
         * If it is more than one checked
         */
        if (numChecked > 1){
            if (selectedEventType != "Polytomická"){
                passed = "Chyba. Len typ \"Polytomická\" môže mať viac správnych možností.";
            }
        }else if (numChecked == 1){
            if (selectedEventType != "Dichotomická"){
                passed = "Chyba. Len typ \"Dichotomická\" má práve jednu správnu možnosť.";
            }
        }
        else if(numChecked == 0){
            passed = "Chyba. Nie je to udalosť typu Diktát, chýba aspoň jedna správna možnosť.";
        }
    }
    else{
        if (selectedEventType != "diktat"){
            passed = "Chyba. Len udalosť Diktát nemusí mať možnosti."
        }
    }

    /**
     * BUG fix - input int test, receive input data
     *
     * @type {HTMLElement | null}
     */
    var inputTimeToExplain = document.getElementById("new_time_to_explain");
    var inputTimeToHandle =  document.getElementById("new_time_to_handle");


    /**
     * BUG fix - input int test, time to explain
     */
    if(!isNormalInteger(inputTimeToExplain.value)){
        passed = "Chyba. Čas pre vysvetlenie udalosti musí byť nezáporné celé číslo.";
    }else{
        if (inputTimeToExplain.value == 0){
            passed = "Chyba. Čas pre vysvetlenie udalosti musí byť nenulové číslo.";
        }
    }

    /**
     * BUG fix - input int test, time to handle
     */
    if(!isNormalInteger(inputTimeToHandle.value)){
        passed = "Chyba. Čas pre obsluhu udalosti musí byť nezáporné celé číslo.";
    }else{
        if (inputTimeToHandle.value == 0){
            passed = "Chyba. Čas pre obsluhu udalosti musí byť nenulové číslo.";
        }
    }

    /**
     * This is HACK due to dynamically added new ckeditor will
     * remove all value data from previous ckeditor and input
     */
    var childDivs = document.getElementById('myUL').getElementsByTagName("*");
    for (var i = 0, len = childDivs.length; i < len; i++) {
        if (childDivs[i].id.indexOf("optionData") !== -1) {
            var liId = childDivs[i].id.replace( /^\D+/g, '');
            document.getElementById("input"+liId).value = childDivs[i].innerHTML;
            if (childDivs[i].innerHTML == ""){
                passed = "Chyba. Niektorá z možností je prázdna."
                break;
            }
        }
    }

    if (passed != "true"){
        alert(passed);
        event.preventDefault();
    }



}

