const viewProfileSection = document.getElementById('view-profile');
const editProfileSection = document.getElementById('edit-profile');
const changePasswordSection = document.getElementById('changePassword');
const changePassBtn = document.getElementById('changePassBtn');
const password = document.getElementById('password');
const rPassword = document.getElementById('rPassword');
const addFileBtn = document.getElementById('add-file-btn');
const backFileBtn = document.getElementById('go_back_btn');
const fileListSection = document.getElementById('file-list');
const addFileListSection = document.getElementById('add-file-section');
const fileDescriptionTxt = document.getElementById('fileDescriptionTxt');
const fileUploadBtn = document.getElementById('fileUploadBtn');
const oldFileID = document.getElementById('oldFileID');
const oldFilePath = document.getElementById('oldFilePath');

function editProfile() {

    viewProfileSection.style.display = 'none';
    editProfileSection.style.display = 'inline';
}

function viewProfile() {

    viewProfileSection.style.display = 'inline';
    editProfileSection.style.display = 'none';
}

function changePassEvent() {
    changePasswordSection.style.display = 'inline';
    changePassBtn.style.display = 'none';
    rPassword.setAttribute("required", "true");
    password.setAttribute("required", "true");

}

function addFileBtnEvent() {

    addFileBtn.style.display = "none";
    fileListSection.style.display = "none";
    addFileListSection.style.display = "inline";

}

function editFieldSetting(id, path, fileDes) {
    addFileBtnEvent();

    fileUploadBtn.value = "Edit File";
    fileDescriptionTxt.value = fileDes;
    oldFileID.value = id;
    oldFilePath.value = path;


}


