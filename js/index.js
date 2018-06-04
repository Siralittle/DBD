Vue.component('feedback', {
    props: ['todo'],
    template: '<button type="button" class="list-group-item">{{todo.content}}</button>'
});

var xhr = new XMLHttpRequest();
var result;
xhr.onreadystatechange = function() {
    if (xhr.readyState == 4 && xhr.status == 200) {
        result = JSON.parse(xhr.response);
    }
}
xhr.open("GET", "php/test.php", false);
xhr.send();

var app7 = new Vue({
    el: '#feedbacklist',
    data: {
        result: result
    }
});


// console.log(JSON.parse(result));