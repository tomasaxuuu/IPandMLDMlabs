let cvs = document.getElementById("canvas");
let ctx = cvs.getContext("2d");

document.getElementById("butt1").onclick = function() {
    document.location.replace("Game.php");
}
document.getElementById("butt2").onclick = function() {
    document.location.replace("../template/sql.php");
}
let bird = new Image();
let bg = new Image();
let fg = new Image();
let upper = new Image();
let down = new Image();

let fly = new Audio();
let scor = new Audio();

fly.src = "sounds/fly.mp3";
scor.src = "sounds/score.mp3";

bird.src = "./img/bird.png";
bg.src = "../../IMG/space8.jpg";
fg.src = "./img/fg.png";
upper.src = "./img/upper.png";
down.src = "./img/down.png";


let pipe = [];
pipe[0] = {
    x : cvs.width,
    y : 0
}

let f = false;
let gap = 90;
let x = 10;
let y = 150;
let grav = 1.5;
var points = 0;
document.addEventListener("keydown", moveUp);

function moveUp() {
    y -= 25;
    fly.play();
}

function draw() {
    ctx.drawImage(bg, 0, 0);
    
    for (let i = 0; i < pipe.length; i++) {
        ctx.drawImage(upper, pipe[i].x, pipe[i].y);
        ctx.drawImage(down, pipe[i].x, pipe[i].y 
        + upper.height + gap);

        pipe[i].x--;
        
        if(pipe[i].x == 125) {
            pipe.push({
                x : cvs.width,
                y : Math.floor(Math.random() * upper.height) -
                upper.height
            });
        } 
        if (x + bird.width >= pipe[i].x
            && x <= pipe[i].x + upper.width
            && (y <= pipe[i].y + upper.height
            || y + bird.height >= pipe[i].y + upper.height + 
            gap) || y + bird.height >= cvs.height - fg.height) {
                document.querySelector(".main > canvas").remove();
                document.getElementById("butt").style.display = "inline-block"; 
                document.getElementById("butt1").style.display = "block";
                document.getElementById("butt2").style.display = "block";
                document.getElementById("count").style.display = "block";
                document.getElementById("points").style.display = "inline-block";  
                document.getElementById("points").value = points;  
            }
        if (pipe[i].x == 5) {
            points++;
            scor.play();
        }
    
        if (pipe.length > 2){
            pipe.shift();
        }
        
    }
    

    ctx.drawImage(fg, 0, cvs.height - fg.height);
    ctx.drawImage(bird, x, y);

    y += grav;
    ctx.fillStyle = "#000";
    ctx.font = "24px Verdana";
    document.getElementById("score").innerHTML = "Ваши очки: " + points;
    document.getElementById("points").innerHTML = "Ваши очки: " + points;
    requestAnimationFrame(draw);
}

down.onload = draw;