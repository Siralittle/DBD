Vue.component('feedback', {
    props: ['todo'],
    template: '<button type="button" class="list-group-item">{{todo.content}}</button>'
});

var pagenum = 0;
var resultobj;
var xhr = new XMLHttpRequest();
xhr.onreadystatechange = function() {
    if (xhr.readyState == 4 && xhr.status == 200) { resultobj = JSON.parse(xhr.response); }
}
xhr.open("GET", "php/test.php?page=" + pagenum * 10, false);
xhr.send();

var app7 = new Vue({
    el: '#feedbacklist',
    data: {
        result: resultobj
    }
});


function beable() {
    if (pagenum == 0) {
        pagechange[0].className = "disabled";
    } else {
        pagechange[0].className = "";
    }
}

// var newxhr = new XMLHttpRequest();
// var pagechange = document.querySelectorAll(".pagination li a");
// pagechange[1].addEventListener("click", function() {
//     // event.preventDefault();
//     // alert(1);
//     pagenum++;
//     beable();
//     xhr.open("GET", "php/test.php?page=" + pagenum * 10, false);
//     xhr.send();
//     // newxhr.onreadystatechange = function() {
//     //         if (newxhr.readyState == 4 && newxhr.status == 200) {
//     //             result = JSON.parse(newxhr.response);
//     //             // if (temp.length == 0) {
//     //             //     return;
//     //             // } else {
//     //             //     result = temp;
//     //             // }
//     //         }
//     //     }
//     //     newxhr.open("GET", "php/test.php?page=" + pagenum * 10, false);
//     //     newxhr.send();
//     Vue.set(app7.result, resultobj);
// }, false);

// // console.log(JSON.parse(result));