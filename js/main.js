let first = true;
let defaultcontentid = "about";

function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        vars[key] = value;
    });
    return vars;
}


function showTopic(contentid){

    clicked = "#nav_"+contentid;

    contentid = "#"+contentid;
    console.log(contentid);



    $("html, body").animate({ scrollTop: 0 }, "slow");

    let timeouttime = 1000;
    if(first){
        first = false;
        timeouttime = 1;
    }

    $(".unselected_nav").removeClass("unselected_nav");
    $(".selected_nav").addClass("unselected_nav");
    $(".selected_nav").removeClass("selected_nav");
    $(clicked).addClass("selected_nav");

    $(".unselected_item").removeClass("unselected_item");
    $(".selected_item").addClass("unselected_item");
    $(".selected_item").removeClass("selected_item");


//     if(!first){
        first = false;
        setTimeout(()=>{
          $(".unselected_item").hide();
          $(contentid).addClass("selected_item");

          $(contentid).show();
        },timeouttime);
        /*
    }else{
        $(contentid).show();
    }
    */
        //$(".unselected_item").hide();
    //$(contentid).show();

    /*
    $(".unselected_item").fadeOut(500, function(){
        $(contentid).fadeIn(500);
    });
    */
}

$(document).ready(function () {
    console.log("doc ready");

    let topic = window.location.hash.replace("#","");
    console.log(topic);
    if(topic){
        showTopic(topic);
    }else{
        showTopic(defaultcontentid);
    }

    $(".rightcontent .grid-item").hide();
    $(".itemsummary").hide();
    $(".navlist li").click(function(elem, target){
        console.log("clicked");

        if($(this).hasClass("selected_nav")){
            return true;
        };

        var contentid = $(this).data("content");
        window.location.hash = contentid;
        showTopic(contentid);
    });
});
