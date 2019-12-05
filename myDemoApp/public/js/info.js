var old_info_outline;
var old_info_objective;

var new_info_outline = this.document.createElement('input');
new_info_outline.setAttribute('type', 'text');
new_info_outline.setAttribute('id', 'info_outline');
new_info_outline.setAttribute('rows', '10');
new_info_outline.setAttribute('class', 'form-control');

var new_info_objective = this.document.createElement('input');
new_info_objective.setAttribute('type', 'text');
new_info_objective.setAttribute('id', 'info_objective');
new_info_objective.setAttribute('rows', '10');
new_info_objective.setAttribute('class', 'form-control');


window.addEventListener('load', function() {
    // 개요 및 목표 수정 버튼 클릭시\
    console.log();
    this.document.getElementById('info_update_btn').addEventListener('click', () => {
        old_info_outline = this.document.getElementById('info_outline');
        old_info_objective = this.document.getElementById('info_objective');
        var btn_info = this.document.getElementById('info_update_btn').textContent;

        old_info_outline.parentNode.replaceChild(new_info_outline, old_info_outline);
        // parentNode 랑 replaceChild 의 정확한 기능 알아보기.
        change_element = old_info_outline;
        old_info_outline = new_info_outline;
        new_info_outline = change_element;
        console.log(old_info_outline);
        console.log(new_info_outline);

        old_info_objective.parentNode.replaceChild(new_info_objective, old_info_objective);
        change_element = old_info_objective;
        old_info_objective = new_info_objective;
        new_info_objective = change_element;
        console.log(old_info_objective);
        console.log(new_info_objective);

        this.document.getElementById('info_update_btn').textContent = (btn_info == "완료") ? "수정" : "완료";
        this.document.getElementById('info_update_btn').addEventListener('click', info_patch_event);
    });
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

/* 
    // '/infos' 에서  ajax로 체험지 바꿀려고 저장 버튼 눌렀을 때
    //  왜인지 fetch할 때  500 서버 에러 발생하지만..
    this.document.getElementById('p_store_btn').addEventListener('click', () => {
        
        console.log(file);
        console.log(image_file);
        console.log(file);
        
        var fileData = new FormData();
        fileData.append('new_img', file);
        console.log(fileData.getAll('new_img'));  

        fetch("{{ route('places.store') }}", {
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json', 
                'X-CSRF-TOKEN': document.querySelector('#token').value,
            },
            method: "PATCH",
            body: fileData
            // body: JSON.stringify({
            //     place_title: this.document.getElementById('new_title').value,
            //     place_body: this.document.getElementById('new_body').value,
            //     place_img: file_path
                // place_img: new_image.src
            // }) 
        // 저장할때 json 형식으로 못 받아서 오류남.
        // js 파일에서 이미지 링크 변환시키고 컨트롤러로 넘겨야 할듯
        // 컨트롤러에서 create를 이미지 만들게 하고 store로 저장하듯이 하면
        })
        .then(res =>res.json())
        .then( (res) => {
            console.log(res);
            filename = res;

            fetch('/places/store', {
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json', 
                    'X-CSRF-TOKEN': document.querySelector('#token').value,
                },
                method: "POST",
                body: JSON.stringify({
                    place_title: this.document.getElementById('new_title').value,
                    place_body: this.document.getElementById('new_body').value,
                    place_img: filename
                }) 
            })
            .then(res=>res.json())
            .then( (res) => {
                console.log(res);

                // var place_con = document.createElement('div');
                // place_con.innerHTML = document.querySelector('#add_card').innerHTML;
                // place_con.removeAttribute('style', 'display:none;');
                // place_con.querySelector('img').value = document.querySelector('place_img').value;
                // place_con.querySelector('h4').textContent = document.querySelector('place_title').value;
                // place_con.querySelector('p').textContent = document.querySelector('place_body').value;
                
                var place_card = document.createElement('div');
                place_card.innerHTML = document.querySelector('#place_cards').innerHTML;
                place_card.setAttribute('class', 'col-xs-6 col-sm-3');
                console.log(place_card);
                //place_cards.querySelector('img').value = res.place_picture;
                // place_card_img.innerHTML = document.querySelector('#place_img').innerHTML;
                // place_card_img.setAttribute('src', '/images/places/{{' + res.place_picture + '}}');
                // place_card.querySelector('h4').textContent = res.title;
                // place_card.querySelector('p').textContent = res.body;
                
                // var p_update_btn = place_con.querySelector('#p_update_btn');
                // var p_delete_btn = place_con.querySelector('#p_delete_btn');

                this.document.querySelector('#places').append(place_card);

                // p_delete_btn.addEventListener('click', () => {
                //     p_delete_btn.addEventListener('click', place_delete_event(place_con, res.id));
                // })
            })
        })
    }) */