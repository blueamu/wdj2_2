var old_info_outline;
var old_info_objective;

var old_place_title;
var old_place_body;
var old_place_img;

var file;
var filename;

var new_info_outline = this.document.createElement('input');
new_info_outline.setAttribute('type', 'text');
new_info_outline.setAttribute('id', 'info_outline');
new_info_outline.setAttribute('class', 'form-control');

var new_info_objective = this.document.createElement('input');
new_info_objective.setAttribute('type', 'text');
new_info_objective.setAttribute('id', 'info_objective');
new_info_objective.setAttribute('class', 'form-control');

var new_place_title = this.document.createElement('input');
new_place_title.setAttribute('type', 'text');
new_place_title.setAttribute('id', 'place_title');
// new_place_title.setAttribute('class', 'card-title');
new_place_title.setAttribute('class', 'form-control');

var new_place_body = this.document.createElement('input');
new_place_body.setAttribute('type', 'text');
new_place_body.setAttribute('id', 'place_body');
// new_place_body.setAttribute('class', 'card-body');
new_place_body.setAttribute('class', 'form-control');

var new_place_img = this.document.createElement('input');
new_place_img.setAttribute('type', 'img');
new_place_img.setAttribute('id', 'place_img');
new_place_img.addEventListener("change", handleFiles, false);
function handleFiles() {
    file = this.files[0]; /* now you can work with the file list */
}
// new_place_img.setAttribute('calss', 'card-img');


window.addEventListener('load', function() {
    this.document.getElementById('info_update_btn').addEventListener('click', () => {
        old_info_outline = this.document.getElementById('info_outline');
        old_info_objective = this.document.getElementById('info_objective');
        var btn_info = this.document.getElementById('info_update_btn').textContent;

        old_info_outline.parentNode.replaceChild(new_info_outline, old_info_outline);
        // parentNode 랑 replaceChild 의 정확한 기능 알아보기.
        change_element = old_info_outline;
        old_info_outline = new_info_outline;
        new_info_outline = change_element;

        old_info_objective.parentNode.replaceChild(new_info_objective, old_info_objective);
        change_element = old_info_objective;
        old_info_objective = new_info_objective;
        new_info_objective = change_element;

        this.document.getElementById('info_update_btn').textContent = (btn_info == "완료") ? "ajax 수정" : "완료";
        this.document.getElementById('info_update_btn').addEventListener('click', info_patch_event);
    })

    var create_check = 0;

    this.document.getElementById('place_create_btn').addEventListener('click', () => {
        if (create_check == 0) {
            document.getElementById("create_place").style.display="block"; // 보이기
            create_check = 1;
        }
        else if (create_check == 1) {
            document.getElementById("create_place").style.display="none"; // 숨기기
            create_check = 0;
        }
    })

    this.document.getElementById('p_store_btn').addEventListener('click', () => {
        fetch('/places/create', {
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json', 
                'X-CSRF-TOKEN': document.querySelector('#token').value,
            },
            method: "POST",
            body: JSON.stringify({
                place_title: this.document.getElementById('new_title').value,
                place_body: this.document.getElementById('new_body').value,
                place_img: this.document.getElementById('new_image').value
            }) 
            // 저장할때 json 형식으로 못 받아서 오류남.
            // js 파일에서 이미지 링크 변환시키고 컨트롤러로 넘겨야 할듯
            // 컨트롤러에서 create를 이미지 만들게 하고 store로 저장하듯이 하면
            .then(res =>res.json())
            .then( (res) => {
                console.log(res);
                // var place_con = document.createElement('div');
                // place_con.innerHTML = document.querySelector('#add_card').innerHTML;
                // place_con.removeAttribute('style', 'display:none;');
                // place_con.querySelector('img').value = document.querySelector('place_img').value;
                // place_con.querySelector('h4').textContent = document.querySelector('place_title').value;
                // place_con.querySelector('p').textContent = document.querySelector('place_body').value;
                
                var place_cards = document.createElement('div');
                place_cards.innerHTML = document.querySelector('#place_card').innerHTML;
                place_cards.setAttribute('class', 'col-xs-6 col-sm-3');
                //place_cards.querySelector('img').value = res.place_picture;
                place_card_img.innerHTML = document.querySelector('#place_img').innerHTML;
                place_card_img.setAttribute('src', '/images/places/{{' + res.place_picture + '}}');
                place_cards.querySelector('h4').textContent = res.title;
                place_cards.querySelector('p').textContent = res.body;
                
                var p_update_btn = place_con.querySelector('#p_update_btn');
                var p_delete_btn = place_con.querySelector('#p_delete_btn');

                this.document.querySelector('#places').append(place_con);

                p_delete_btn.addEventListener('click', () => {
                    p_delete_btn.addEventListener('click', place_delete_event(place_con, res.id));
                })
            })
        })
    })

    this.document.getElementById('p_update_btn').addEventListener('click', () => {
        old_place_title = this.document.getElementById('place_title');
        old_place_body = this.document.getElementById('place_body');
        old_place_img = this.document.getElementById('place_img');
        var btn_place = this.document.getElementById('p_update_btn').textContent;
        
        old_place_title.parentNode.replaceChild(new_place_title, old_place_title);
        change_element = old_place_title;
        old_place_title = new_place_title;
        new_place_title = change_element;

        old_place_body.parentNode.replaceChild(new_place_body, old_place_body);
        change_element = old_place_body;
        old_place_body = new_place_body;
        new_place_body = change_element;  

        old_place_img.parentNode.replaceChild(new_place_img, old_place_img);

        file_path = old_place_img.value;
        if(file) {
            var fr = new FileReader();
            fr.onload = function () {
                old_place_img.src = fr.result;
            }
            fr.readAsDataURL(file);
        }
        if (file_path) {
            var startIndex = (file_path.indexOf('\\') >= 0 ? file_path.lastIndexOf('\\') : file_path.lastIndexOf('/'));
            filename = file_path.substring(startIndex);
            if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
                filename = filename.substring(1);
            }
            alert(filename); // 파일이름 확인 ex) lemon.jpg
        }

        change_element = old_place_img;
        old_place_img = new_place_img;
        new_place_img = change_element;

        this.document.getElementById('p_update_btn').textContent = (btn_place == "완료") ? "ajax 수정" : "완료";
        this.document.getElementById('p_update_btn').addEventListener('click', place_patch_event(place_con, res.id));
    })
})


var info_patch_event = () => {
    fetch('/infos/update', {
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json', 
            'X-CSRF-TOKEN': document.querySelector('#token').value,
        },
        method: "PATCH",
        body: JSON.stringify({
            id: document.querySelector('#info_id').value,
            info_outline: new_info_outline.value,
            info_objective: new_info_objective.value,
            // 컨트롤러로 넘어가는 데이터, 컨트롤러에서 request한 데이터
        })
    })
    .then(res => res.json())
    .then( (res) => {
        console.log(res);
        old_info_outline.textContent = res.outline;
        old_info_objective.textContent = res.objective;
        // load 할때 id 선택한 내용 = res.컨트롤러에서 받은 내용??
        document.querySelector('#info_update_btn').removeEventListener('click', info_patch_event);
    })
}

var place_patch_event = () => {

    var fileData = new FormData();
    // fileData.append('place_img', file);
    fileData.set('place_img', file);
    console.log(fileData.getAll('place_img')); 

    fetch('/places/upload', {
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json', 
            'X-CSRF-TOKEN': document.querySelector('#token').value,
        },
        method: "PATCH",
        body: JSON.stringify({
            place_title: new_place_title.value,
            fileData
        })
    })
    .then(res => res.json())
    .then( (res) => {
        console.log(res);
        filename = res;
        
        fetch('/places/update', {
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json', 
                'X-CSRF-TOKEN': document.querySelector('#token').value,
            },
            method: "PATCH",
            body: JSON.stringify({
                place_id : document.getElementById('place_id').value,
                place_img : filename,
                place_title : new_place_title.value,
                place_body : new_place_body.value,
            })
        })
        .then(res => res.json())
        .then( (res) => {
            console.log(res);
            old_place_title.textContent = res.title;
            old_place_body.textConatent = res.body;
            document.querySelector('#p_update_btn').removeEventListener('click',place_patch_event);
        })
    })
}