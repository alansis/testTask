
function DateFromUser() {
    this.name = "";
    this.email = "";
    this.description = "";
    this.response = "";
}

function ValidateCaptch() {
    var response = grecaptcha.getResponse();
    if(response.length === 0)
    {
        alert("Bad captha");
    }
    else
    {
        alert("Good captha");
        getFromForm(response);
    }
}

function getFromForm(response) {
    let name = document.getElementById("nameSubname");
    let email = document.getElementById("email");
    let description = document.getElementById("description");
    var DateFromForm = new DateFromUser();
    DateFromForm.name = name.value;
    DateFromForm.email = email.value;
    DateFromForm.description = description.value;
    DateFromForm.response = response;

    ValidateForm(DateFromForm);
}

function ValidateForm(DateFromForm) {
    try {
        if (DateFromForm.name.match(/[\wа-яА-Я]+/gi)) {
            if (DateFromForm.email.match(/[\w]+/gi)) {
                if (DateFromForm.description.match(/[\wа-яА-Я]+/gi)){
                    SendtoServer(DateFromForm);
                }
            }
        }
    }

    catch(e) {
        console.log("Erorr: " + e);
    }
}

function SendtoServer(DateFromForm) {
    let data = JSON.stringify(DateFromForm);
    $.ajax({
        url: 'controller/SiteController.php',
        type: 'post',
        data: data,
        success: function(result) {
            alert("Ваш коментарій успішно записаний");
        },
        error: function (result) {
            alert("bad");
        }
    });
}