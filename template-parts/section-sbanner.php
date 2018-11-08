<section id="section-sbanner">
  <div class="hidden-xs">
	<canvas id="canvas-interactive"></canvas>
	<canvas id="canvas-reference"></canvas>
	<img class="canvas-logo" src="<?php echo get_template_directory_uri() ?>/images/ologo.png" width="303" height="300" alt="..." id="img">
  </div>
  <div class="visible-xs">
    <img class="img-responsive img-centered img-ban-logo" src="<?php echo home_url(); ?>/wp-content/uploads/2018/10/logo.png" width="300" height="300" alt="">
  </div>
    <div class="text-con">
        <!-- <div class='console-container'>I am <span id='text'></span><span class='console-underscore' id='console'>&#95;</span></div> -->
        <div class="type-wrap">
            <div class="hidden-xs info-text">Hover over the logo</div>
            <span id="typed3"></span>
        </div>
    </div>
    
</section>
<style>	
#section-sbanner {
	width: 100vw;
	height: 100vh;
	position: relative;
	background-color: #303030;
	overflow: hidden;
}
#section-sbanner canvas {
	display:  block;
	position: absolute;
	top:     0;
	left:    0;
	z-index: 1;
}
#section-sbanner img.canvas-logo {
    display: none;
}
#section-sbanner .text-con {
    position: absolute;
    bottom: 60px;
    font-size: 60px;
    line-height: 1.2;
    width: 100%;
    color: #ffffff;
    text-align: center;
}
#section-sbanner .text-con .info-text {
    font-size: 14px;
}
#section-sbanner .img-ban-logo {
    margin-top: 20vw;
}
</style>
<script>
window.onload = function() {
var canvasInteractive = document.getElementById('canvas-interactive');
var canvasReference = document.getElementById('canvas-reference');
 
var contextInteractive = canvasInteractive.getContext('2d');
var contextReference = canvasReference.getContext('2d');

var image = document.getElementById('img');
 
var width = canvasInteractive.width = canvasReference.width = window.innerWidth;
var height = canvasInteractive.height = canvasReference.height = window.innerHeight;
 
var logoDimensions = {
    x: 340,
    y: 500
};
 
var center = {
    x: width / 2,
    y: height / 2
};
 
var logoLocation = {
    x: center.x - logoDimensions.x / 2,
    y: center.y - logoDimensions.y / 2
};
 
var mouse = {
    radius: Math.pow(200, 2),
    x: 0,
    y: 0
};
 
var particleArr = [];
var particleAttributes = {
    friction: 0.95,
    ease: 0.19,
    spacing: 3, //6
    size: 1, //4
    color: "#ffffff"
};

function Particle(x, y) {
    this.x = this.originX = x;
    this.y = this.originY = y;
    this.rx = 0;
    this.ry = 0;
    this.vx = 0;
    this.vy = 0;
    this.force = 0;
    this.angle = 0;
    this.distance = 0;
}
 
Particle.prototype.update = function() {
    this.rx = mouse.x - this.x;
    this.ry = mouse.y - this.y;
    this.distance = this.rx * this.rx + this.ry * this.ry;
    this.force = -mouse.radius / this.distance;
    if(this.distance < mouse.radius) {
         this.angle = Math.atan2(this.ry, this.rx);
         this.vx += this.force * Math.cos(this.angle);
         this.vy += this.force * Math.sin(this.angle);
    }
    this.x += (this.vx *= particleAttributes.friction) + (this.originX - this.x) * particleAttributes.ease;
    this.y += (this.vy *= particleAttributes.friction) + (this.originY - this.y) * particleAttributes.ease;
};

function init() {
    contextReference.drawImage(image,logoLocation.x, logoLocation.y);
    var pixels = contextReference.getImageData(0, 0, width, height).data;
    var index;
    for(var y = 0; y < height; y += particleAttributes.spacing) {
        for(var x = 0; x < width; x += particleAttributes.spacing) {
            index = (y * width + x) * 4;
            if(pixels[++index] > 0) {
                particleArr.push(new Particle(x, y));
            }
        }
    }
};
init();

function update() {
     for(var i = 0; i < particleArr.length; i++) {
         var p = particleArr[i];
         p.update();
     }
};

function render() {
     contextInteractive.clearRect(0, 0, width, height);
     for(var i = 0; i < particleArr.length; i++) {
         var p = particleArr[i];
         contextInteractive.fillStyle = particleAttributes.color;
         contextInteractive.fillRect(p.x, p.y, particleAttributes.size, particleAttributes.size);
     }
};

function animate() {
 update();
 render();
 requestAnimationFrame(animate);
}
animate();
document.body.addEventListener("mousemove", function(event) {
 mouse.x = event.clientX;
 mouse.y = event.clientY;
});
 
document.body.addEventListener("touchstart", function(event) {
 mouse.x = event.changedTouches[0].clientX;
 mouse.y = event.changedTouches[0].clientY;
}, false);
 
document.body.addEventListener("touchmove", function(event) {
 event.preventDefault();
 mouse.x = event.targetTouches[0].clientX;
 mouse.y = event.targetTouches[0].clientY;
}, false);
 
document.body.addEventListener("touchend", function(event) {
 event.preventDefault();
 mouse.x = 0;
 mouse.y = 0;
}, false);
};

/*Animated Text*/
/*
consoleText(['Mostak', 'Creative', 'Experienced'], 'text',['tomato','rebeccapurple','lightblue']);

function consoleText(words, id, colors) {
  if (colors === undefined) colors = ['#fff'];
  var visible = true;
  var con = document.getElementById('console');
  var letterCount = 1;
  var x = 1;
  var waiting = false;
  var target = document.getElementById(id)
  target.setAttribute('style', 'color:' + colors[0])
  window.setInterval(function() {

    if (letterCount === 0 && waiting === false) {
      waiting = true;
      target.innerHTML = words[0].substring(0, letterCount)
      window.setTimeout(function() {
        var usedColor = colors.shift();
        colors.push(usedColor);
        var usedWord = words.shift();
        words.push(usedWord);
        x = 1;
        target.setAttribute('style', 'color:' + colors[0])
        letterCount += x;
        waiting = false;
      }, 1000)
    } else if (letterCount === words[0].length + 1 && waiting === false) {
      waiting = true;
      window.setTimeout(function() {
        x = -1;
        letterCount += x;
        waiting = false;
      }, 1000)
    } else if (waiting === false) {
      target.innerHTML = words[0].substring(0, letterCount)
      letterCount += x;
    }
  }, 120)
  window.setInterval(function() {
    if (visible === true) {
      con.className = 'console-underscore hidden'
      visible = false;

    } else {
      con.className = 'console-underscore'

      visible = true;
    }
  }, 400)
}*/

  new Typed('#typed3', {
    strings: ['I am <strong>Md. Mostak Shahid</strong>', 'I am <strong>Creative</strong>', 'I am <strong>Experienced</strong>'],
    typeSpeed: 50,
    backSpeed: 50,
    backDelay: 1000,
    //startDelay: 1000,
    //smartBackspace: true,
    loop: true
  });
/*Animated Text*/

</script>