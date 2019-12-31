const tabs = document.getElementById('radio');
const radio = document.getElementsByName('tab');
const paste = document.querySelectorAll('.paste .content');
const title = document.getElementById('title');
const titleTab = document.querySelectorAll('#field-tab .title-tab');
const contentTab = document.querySelectorAll('#field-tab .content-tab');
const createNew = document.getElementById('create-new');
let idRadio;

/*--------------------TAB-CONTENT-PASTE--------------------*/
document.addEventListener('DOMContentLoaded', () => {
    addEventosInputTitleTab();
    checkRadioSelected();
});

tabs.addEventListener('click', tabChecked);

function checkRadioSelected() {
    radio.forEach( (element, i) => {
        if(element.checked) {
            idRadio = element.id;
            activeContentPaste(idRadio);
        }
        changeNameRadio(i, titleTab[i]);
    });
}

function tabChecked(e) {
    if(e.target.nodeName=="INPUT") {
        idRadio = e.target.id;
        activeContentPaste(idRadio);
    }
}

function activeContentPaste(idRadio) {
    paste.forEach( (element) => {
        element.classList.remove('active');
        if(element.classList.contains(idRadio)) {
            element.classList.add('active');
        }
    });
}

function addEventosInputTitleTab() {
    titleTab.forEach( (tab, i) => {
        tab.addEventListener('input', (e) => {
            changeNameRadio(i, e.target);
        });
    });
}

function changeNameRadio(i, inputTitleTab) {
    if(inputTitleTab != null) {
        if(!isEmptyField(inputTitleTab.value)) {
            radio[i].nextElementSibling.innerText = inputTitleTab.value;
            radio[i].value = inputTitleTab.value;
        }
    }
}

/*--------------------VALIDATE-FIELDS-NEW-PASTE--------------------*/
if(createNew != null) {
    createNew.addEventListener('click', validarCamposNewPaste);
}

function validarCamposNewPaste(e) {
    let msjError = '';
    let pos;
    paste.forEach( (element, i) => {
        if(element.classList.contains('active')) {
            pos = i;
        }
    });
    if(isEmptyField(title.value)) {
        msjError += '<p>El título no puede quedar vacío.</p>';
    }
    if(isEmptyField(titleTab[pos].value)) {
        msjError += '<p>El nombre de la pestaña no puede quedar vacío.</p>';
    }
    if(isEmptyField(contentTab[pos].value)) {
        msjError += '<p>El contenido de la pestaña no puede quedar vacío.</p>';
    }
    if(!isEmptyField(msjError)) {
        e.preventDefault();
        let divError = document.createElement('div');
        divError.setAttribute('class', 'error');
        divError.innerHTML = `
            ${msjError}
        `;
        paste[pos].removeChild(paste[pos].lastChild);
        paste[pos].appendChild(divError);
    }else {
        console.log('Registrar');
    }
}

/*--------------------UTILITIES--------------------*/
function isEmptyField(field) {
    if(field.length == 0 || /^\s+$/.test(field)) {
        return true;
    }
    return false;
}