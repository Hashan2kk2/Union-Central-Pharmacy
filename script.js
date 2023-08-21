function emailSend(){

    let name = document.getElementById("indexName");
    let phone = document.getElementById("indexPhone");
    let email = document.getElementById("indexEmail");
    let msg = document.getElementById("indexMsg");

    // alert("ok");

    let f = new FormData();
    f.append("name",name.value);
    f.append("phone",phone.value);
    f.append("email",email.value);
    f.append("msg",msg.value);

    let r = new XMLHttpRequest();
    r.onreadystatechange = function(){
        if(r.readyState == 4){
            let t = this.responseText;
            alert(t);
        }
    }

    r.open("POST","emailProcess.php",true);
    r.send(f);
};