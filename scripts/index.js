  //если все ресурсы закгружены то вызывается эта функция 
  window.onload = function(){
    //если ширина экрана больше 1024 добовляется видео 
  if(window.innerWidth >= 1024)
  document.getElementById('video-container').innerHTML = ' <source src="res/video/videoplayback.mp4" type="video/mp4" codecs="avc1.42E01E, mp4a.40.2">';
  setTimeout( () => touch() , 50000 );
};


//находим элементы на странице
let scr = document.querySelector('#particles-js');
let pack = document.querySelector('.pack');


//полифил для эвента прокрутки мыши
if (scr.addEventListener) {
    if ('onwheel' in document) {
      // IE9+, FF17+
      scr.addEventListener("wheel", onWheel);
    } else if ('onmousewheel' in document) {
      // устаревший вариант события
      scr.addEventListener("mousewheel", onWheel);
    } else {
      // Firefox < 17
      scr.addEventListener("MozMousePixelScroll", onWheel);
    }
  } else { // IE8-
    scr.attachEvent("onmousewheel", onWheel);
}


//метод который вызывается при скроле
function onWheel (e) {
    console.log("scroll");
    if(e.deltaY  == 100 ) {
        setTimeout( () => {
            window.scrollBy( 0 , -6000 )
            scr.classList.add("hide");
            scr.removeEventListener('onwheel' , onWheel , false);
                let elm = document.querySelectorAll(".hide__slide");
                
                setTimeout( () => {
                    let bod = document.querySelector('body').style.overflowY = 'scroll';
                    pack.classList.add('pack__hide');
                } , 1100);
                setTimeout( () => pack.classList.add('pack__hide-none') , 2000);
                setTimeout( () => { 
                    for( let prop of elm) {
                        prop.classList.remove('hide__slide');
                    }
                } , 2200);         
          } , 10);   
    }
}

//метод который вызвается при скроле тачаем
function touch() {
  setTimeout( () => {
    window.scrollBy( 0 , -6000 )
    scr.classList.add("hide");
    scr.removeEventListener('onwheel' , onWheel , false);
        let elm = document.querySelectorAll(".hide__slide");
        
        setTimeout( () => {
           let bod = document.querySelector('body').style.overflowY = 'scroll';
            pack.classList.add('pack__hide');
        } , 1100);
        setTimeout( () => pack.classList.add('pack__hide-none') , 2000);
        setTimeout( () => { 
            for( let prop of elm) {
                prop.classList.remove('hide__slide');
            }
        } , 2200);         
  } , 10);   
}

//добовляем событие
scr.addEventListener('touchmove' , touch , { passive: false });


//находим эелменты
let btn = document.querySelectorAll('button');
let form = document.querySelector('.form');
let clos = document.querySelector('.can');
//добовляем событие
clos.addEventListener( 'click' , () => {
  form.classList.toggle('form__slideDown');
  
});
//добовляем событие в цикле
for(let prop of btn ) {
  prop.addEventListener( 'click' , (e) => {
    form.classList.remove("form__slideDown");
    if(form.classList.contains("form__slideUP")) {
      form.classList.remove("form__slideUP");
    }
  });
}

//находим эелменты

let view = document.querySelectorAll('.info__column');
let info = document.querySelector('.info');
let header = document.querySelector('.header');
//добовляем событие
window.addEventListener("scroll" , (e) => {
  if(100 + window.pageYOffset > info.offsetTop) {
      for(let prop of view) {
          setTimeout( () => prop.classList.remove('hide__info') , 50);
      }
  }
  // if(header.offsetTop < window.pageYOffset) {
  //     header.style.opacity = 1;
  //     header.style.position = "fixed";
  // } else if ( 400 > window.pageYOffset) {
  //     header.style.opacity = 0;
  //     header.style.position = "none";
  // }


});

//добовляем событие
scr.addEventListener('touchmove', function(e) {
  e.preventDefault();
  var touch = e.touches[0];
  //console.log(touch.pageX + " - " + touch.pageY);
  touch();
  touch();
  scr.removeEventListener('touchmove' , touch , false);
}, false);