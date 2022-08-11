jQuery(document).ready(function ($) {
    // Author: Hoang Tran (https://www.facebook.com/profile.php?id=100004848287494)
    // Github verson (1 file .html): https://github.com/HoangTran0410/3DCarousel/blob/master/index.html
    var width = $(window).width();
    if(width<768){
    // You can change global variables here:
    var radius = (width/2)-10; // how big of the radius
    var imgWidth = 50; // width of images (unit: px)
    var imgHeight = 80;
    }else{
        var radius = 550; // how big of the radius
        var imgWidth = 150; // width of images (unit: px)
        var imgHeight = 170;
    }
    var autoRotate = true; // auto rotate or not
    var rotateSpeed = -35; // unit: seconds/360 degrees
     // height of images (unit: px)
    let all_data = document.querySelectorAll('.prof_image')

    // ===================== start =======================
    setTimeout(init, 100);
    var play = document.getElementById('play')
    var odrag = document.getElementById("drag-container");
    var ospin = document.getElementById("spin-container");
    var aEle = ospin.getElementsByTagName("img");


    // Size of images
    ospin.style.width = imgWidth + "px";
    ospin.style.height = imgHeight + "px";

    // Size of ground - depend on radius
    var ground = document.getElementById("ground");
    ground.style.width = radius * 3 + "px";
    ground.style.height = radius * 3 + "px";

    function init(delayTime) {
        for (var i = 0; i < aEle.length; i++) {
            aEle[i].style.transform =
                "rotateY(" +
                i * (360 / aEle.length) +
                "deg) translateZ(" +
                radius +
                "px)";
            aEle[i].style.transition = "transform 1s";
            aEle[i].style.transitionDelay =
                delayTime || (aEle.length - i) / 4 + "s";
        }
    }
    var stopped = true;
    play.addEventListener('click', () => {
        if (stopped) {
            clearInterval(odrag.timer);
            playSpin(false);
            play.innerText = 'Start'
        } else {
            clearInterval(odrag.timer);
            playSpin(true);
            play.innerText = 'Stop'
        }
        stopped ^= false
    })

    function applyTranform(obj) {
        // Constrain the angle of camera (between 0 and 180)
        if (tY > 180) tY = 180;
        if (tY < 0) tY = 0;

        // Apply the angle
        obj.style.transform = "rotateX(" + -tY + "deg) rotateY(" + tX + "deg)";
    }

    function playSpin(yes) {
        ospin.style.animationPlayState = yes ? "running" : "paused";
        stopped = yes ? true : false;
    }

    var sX,
        sY,
        nX,
        nY,
        desX = 0,
        desY = 0,
        tX = 0,
        tY = 10;

    // auto spin
    if (autoRotate) {
        var animationName = rotateSpeed > 0 ? "spin" : "spinRevert";
        ospin.style.animation = `${animationName} ${Math.abs(
          rotateSpeed
        )}s infinite linear`;
    }



    // setup events
    document.getElementById('drag-container').onpointerdown = function (e) {
        e = e || window.event;
        var sX = e.clientX,
            sY = e.clientY;

        this.onpointermove = function (e) {
            e = e || window.event;
            var nX = e.clientX,
                nY = e.clientY;
            desX = nX - sX;
            desY = nY - sY;
            tX += desX * 0.1;
            tY += desY * 0.1;
            applyTranform(odrag);
            sX = nX;
            sY = nY;

        };

        this.onpointerup = function (e) {

            odrag.timer = setInterval(function () {
                desX *= 0.95;
                desY *= 0.95;
                tX += desX * 0.1;
                tY += desY * 0.1;
                applyTranform(odrag);
                // playSpin(false);

                if (Math.abs(desX) < 0.5 && Math.abs(desY) < 0.5) {
                    clearInterval(odrag.timer);
                    // playSpin(false);
                }
            }, 17);
            this.onpointermove = this.onpointerup = null;
        };
        ospin.style.animationPlayState = "paused";
        stopped = false;
        play.innerText = 'Start'
        return false;
    };

    document.onmousewheel = function (e) {
        e = e || window.event;
        var d = e.wheelDelt / 20 || -e.detail;
        radius += d;
        init(1);
    };

    all_data.forEach(e => {
        e.addEventListener('click', zidor => {
			let id = document.getElementById('my_id').dataset.id
            let img = zidor.target
            let slyles = img.style.cssText

            if (!parseInt(id)) {
                let target = img.parentElement.children[2]
                img.style.filter = 'blur(3px)'
                target.style = slyles
                target.style.display = 'block'
                target.style.background = 'transparent'
            } else {
                let target = img.parentElement.children[1]
				target.style = slyles
                target.style.display = 'block'
                target.style.width = '100%'
                target.style.height = '100%'
            }
        })
    })

})
