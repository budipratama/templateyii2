$(document).ajaxStart(function () {
    // Pace.restart()
});
function loading(show){
    if (show === true){
        $(".img-loading").removeClass("hide")
        $(".content-image-loading").css("z-index",9);
    }
    else{
        $(".img-loading").addClass("hide")
        $(".content-image-loading").css("z-index",0);
    }
}

function closeForm(){
    var dom = document.getElementById("global-form");
    dom.style.width = "0px";

    $("#global-form").removeClass("content");
    setTimeout(function () {
        dom.style.position = "absolute";
        mainContent(true);
    },500);
}
function submitConfiguration(ob) {
    var myObject = $(ob);
    var tipe = myObject.attr("type");
    if (tipe == 'checkbox'){

        if(myObject.is(":checked")){

        }
    }
    $.post("url",function(data){

    });
}
function mainContent(show){
    var sh = hiddenShow(show);
    $("#main-content").css("display",sh);
    $(".breadcrumb").css("display",sh);
}
function showForm(url){
    $('#content-form').css("display","none");
    mainContent(false);
    // loading(true);
    var dom = document.getElementById("global-form");
    $("#global-form").addClass("content");
    dom.style.width="100%";dom.style.position = "relative";
    setTimeout(function () {
        myAjax(url,function(data){
            $("#content-form").html(data);
            $('#content-form').css("display","block");
        });

        // $('#content-form').load(url);
    },510);
}

function myAjax(url, callback) {
    // Pace.restart()
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            callback(xhr.response);
        }
    }

    xhr.open('GET', url, true);
    xhr.send('');
}



function hiddenShow(status){
    if (status === true)
        return "block";
    else
        return "none";
}
