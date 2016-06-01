var regexEmail = /^(([a-zA-Z0-9])|([-]|[_]|[.]))+[@]([a-zA-Z0-9]){2,63}[.](([a-zA-Z0-9]){3,63})+$/;
var regexOnlyNumber =/^[0-9]+$/;
var regexOnlyText = /^[a-zA-Z]+$/;

//For the password is required at least six characters, a minus, a mayus and a number.
var regexPassword = /^((?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9]).{6,})\S$/;

var isEqual = function (field1, field2) {
    return (field1 === field2 || field1 == field2);
};

var isOnlyNumber = function (field) {
    return regexOnlyNumber.test(field);
}

var isOnlyText = function (field) {
    return regexOnlyText.test(field);
};

var isNullOrUndefined = function (field) {
    return (field === undefined || field === null);
};

var validateMail = function (field) {
    return regexEmail.test(field);
};

var validatePassWord = function (field) {
    return regexPassword.test(field);
};

var validateContactSubmit = function () {

};
