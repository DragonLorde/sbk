function request() {
    let url = 'http://sbk/core/row.php';
    let data = {
        "email": '',
        "name" : '',
        "phone": '' ,
        "text": ' ', 
    };

    //поле ввода для мыло
    //поле ввода для имя
    //поле ввода для телефона


    let elem = document.querySelectorAll("form");
        elem.forEach((e)=> {
           
               e.querySelectorAll('input').forEach((input) => {
                   for(let props in data) {
                      if(input.name == 'name' && props == 'name') {
                          data[props] = input.value;
                        }
                        if(input.name == 'email' && props == 'email') {
                            data[props] = input.value;
                        }
                        if(input.name == 'phone' && props == 'phone') {
                            data[props] = input.value;
                        }
                        if(input.name == 'text' && props == 'text') {
                            data[props] = input.value;
                        }
                   }
               });
        });
            console.log(data);
        
  
       console.log("asfsf");
        axios
        .post(url , data)
        .then(response => {
            if(response.data.code == 102) {
                console.log(response.data.code);
                    form.classList.add('form__slideDown');

                // hide.style.display = 'none';
                // errortext.innerHTML = "Вы уже отправляли данные";
                // errortext.style.fontSize = '20px';
                er.insertAdjacentText("afterbegin" ,"Вы уже отправляли данные");
                er.style.display = "block";
            } else {
                sessionStorage.setItem("send", true);
                console.log(response.data.code);
                // hide.style.display = 'none';
                // errortext.innerHTML = "Данные отправлены успешно";
                // errortext.style.fontSize = '20px';
                er.insertAdjacentText("afterbegin" ,"Данные отправлены успешно");
                er.style.display = "block";
                er.style.background =  "rgb(95,222,178)";
                sdd.style.opacity = 0;
                setTimeout(() =>  sdd.style.display = "none", 1000);
            }

        })
        .catch((e) => console.log(e));
  

}