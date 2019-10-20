/**
 * Created by Pacher on 12/4/2018.
 *
 * Displays the contents of help below options.
 */

const helpButtons = document.getElementsByClassName('help-btn');
const helpName = document.getElementById('help-name');
const helpText = document.getElementById('help-text');
const helpRow = document.getElementById('help-row');
const helpBtn = document.getElementById('btn-help');
const toggleBtn = document.getElementById('toggle-help-btn');

toggleBtn.onclick = function () {
    helpRow.style.display = "none";
};


for (let i = 0, len = helpButtons.length; i < len; i++) {
    helpButtons[i].onclick = function (){
        helpRow.style.display = "block";
        helpName.innerHTML = this.dataset.helpname;
        helpText.innerHTML = this.dataset.helptext;

		helpBtn.setAttribute("href", this.dataset.url);
    }
}