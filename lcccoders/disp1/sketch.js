let canvasWidth;
let canvasHeight;

let drawFunctionList = [maxDraw, daniellaDraw];
let drawFunctionIndex = drawFunctionList.length - 1;
let timingInterval = 20000;

function setup() {
  canvasWidth = displayWidth; //768;
  canvasHeight = displayHeight; //1024;  
  createCanvas(canvasWidth, canvasHeight);
  //scale(.5);
  //maxDraw();
  nextProject();
  setInterval(nextProject, timingInterval);
}
function draw() {
//  background(220);
}

function nextProject(){
  console.log("nextProject", drawFunctionList.length);
  drawFunctionIndex = (drawFunctionIndex + 1) % drawFunctionList.length;
  drawFunction = drawFunctionList[drawFunctionIndex];
  console.log(drawFunctionIndex);
  drawFunction();
}


function maxDraw() {
  background("rgb(190,0,33)");
  push();
  stroke("white");
  fill("black");
  textAlign(RIGHT, BOTTOM);
  textSize(40);
  text("Max Vanier - Creative Computing", canvasWidth - 10, canvasHeight - 10);
  pop();

  //base face
  strokeWeight(0);
  fill("rgb(224,202,163)");
  circle(500, 200, 220);
  fill("rgb(219,195,154)");
  beginShape();
  vertex(400, 200);
  vertex(600, 200);
  vertex(610, 310);
  vertex(580, 350);
  vertex(420, 350);
  vertex(390, 310);
  vertex(400, 200);
  endShape();

  //mouth and nose
  fill("rgb(212,188,150)");
  ellipse(500, 310, 160, 190);

  beginShape();
  fill("rgb(198,175,142)");
  vertex(480, 220);
  vertex(520, 220);
  vertex(525, 260);
  vertex(475, 260);

  endShape();

  beginShape();
  fill("rgb(198,170,129)");
  vertex(482, 210);
  vertex(518, 210);
  vertex(505, 270);
  vertex(495, 270);
  endShape();

  //right eye
  strokeWeight(1);
  fill("white");
  ellipse(550, 210, 40, 18);
  strokeWeight(0);
  fill("rgb(251,217,30)");
  circle(550, 212, 15);
  fill("rgb(93,58,15)");
  circle(549, 214, 8);

  //hairs left
  fill("rgb(222,222,222)");
  triangle(385, 140, 390, 200, 420, 160);
  fill("rgb(227,227,227)");
  triangle(370, 160, 395, 200, 420, 180);
  fill("rgb(220,219,219)");
  triangle(380, 155, 395, 180, 450, 170);

  //hairs right

  //mouth and teeth
  fill("black");
  rect(450, 290, 100, 55);

  fill("white");

  beginShape();
  vertex(472, 315);
  vertex(482, 315);
  vertex(480, 335);
  vertex(474, 335);
  endShape();

  beginShape();
  vertex(482, 314);
  vertex(492, 314);
  vertex(490, 334);
  vertex(484, 334);
  endShape();

  beginShape();
  vertex(492, 313);
  vertex(502, 313);
  vertex(500, 333);
  vertex(494, 333);
  endShape();

  beginShape();
  vertex(502, 313);
  vertex(512, 313);
  vertex(510, 333);
  vertex(504, 333);
  endShape();

  beginShape();
  vertex(512, 314);
  vertex(522, 314);
  vertex(520, 334);
  vertex(514, 334);
  endShape();

  beginShape();
  vertex(522, 315);
  vertex(532, 315);
  vertex(530, 335);
  vertex(524, 335);
  endShape();

  //lips, cheekbones, ears
  fill("rgb(212,188,150)");
  ellipse(480, 340, 65, 36);
  ellipse(520, 340, 65, 36);

  //scar
  fill("pink");
  triangle(582, 125, 590, 135, 480, 140);
  triangle(490, 140, 400, 300, 500, 138);

  //left eye
  strokeWeight(1);
  fill("white");
  ellipse(450, 210, 33, 18);

  //eyebrows
  strokeWeight(0);
  triangle(420, 300, 500, 300, 420, 400);

  // blocking off
  strokeWeight(0);
  fill("rgb(190,0,33)");
  square(430, 380, 140);

  //insignia
  fill("rgb(13,198,239)");
  circle(100, 105, 150);
  fill("rgb(190,0,33)");
  //lightning bolts
  beginShape();
  vertex(60, 20);
  vertex(60, 60);
  vertex(75, 40);
  vertex(60, 120);
  vertex(60, 70);
  vertex(45, 90);
  endShape();

  beginShape();
  vertex(100, 50);
  vertex(100, 100);
  vertex(115, 80);
  vertex(100, 160);
  vertex(100, 110);
  vertex(85, 130);
  endShape();

  beginShape();
  vertex(140, 90);
  vertex(140, 140);
  vertex(155, 120);
  vertex(140, 200);
  vertex(140, 150);
  vertex(125, 170);
  endShape();

  //letter C
  fill("rgb(13,198,239)");
  circle(100, 250, 120);
  fill("rgb(190,0,33)");
  circle(100, 250, 80);
  circle(180, 250, 120);
}




function daniellaDraw() {
  background(200, 50, 90); //
  push();
  stroke("white");
  fill("black");
  textAlign(RIGHT, BOTTOM);
  textSize(40);
  text("Daniela Malka - Creative Computing", canvasWidth - 10, canvasHeight - 10);
  pop();
  fill(57, 255, 20);
  circle(200, 200, 220); // Circle for my head
  square(250, 60, 60, 300); // Antenna #1
  square(95, 60, 60, 300); // Antenna #2
  fill(255, 255, 255); // Colour for body
  ellipse(160, 190, 82, 124, 50); // Eye #1
  ellipse(245, 190, 82, 124, 50); // Eye #2
  fill(189, 222, 236);
  ellipse(240, 200, 50, 60, 60); // Iris #1
  ellipse(165, 200, 50, 60, 60); // Iris #2
  fill(0, 0, 0);
  ellipse(240, 200, 30, 30, 0); // Retina #1
  ellipse(165, 200, 30, 30, 0); // Retina #2
  circle(203, 250, 40); // Nose
  ellipse(160, 110, 60, 10); // Eyebrow #1
  ellipse(245, 110, 60, 10); // Eyebrow #2
  arc(202.5,283.5,121.5,40.5, 0, 3.14); // Mouth
  fill(283, 292, 292);
  arc(202.5,283.5,121.5,40.5, 0, 3.14); // Smile (teeth)
  circle(50, 40, 50); // For the letter D
  noStroke();
  fill(200, 50, 90); // For the letter D
  square(1, 15, 50); // For the letter D
  fill(0, 0, 0); // For the inside of the D
  ellipse(60, 43, 10, 20); // For the inside of the D
  fill(200, 50, 90); // For the letter M
  rect(90, 20, 50, 40); // For the letter M
  fill(255, 255, 255);
  rect(90, 20, 10, 40); // For the letter M
  rect(130, 20, 10, 40); // For the letter M
  rotate(50); // For the letter M
  rect(90, 47, 9, 40); // For the letter M
  
  push(); // To make sure whatever is within the push and pop stays inside.
  rectMode(CENTER); // For the letter M
  translate(107, 70); // For the letter M
  rotate(PI * 0.2); // For the letter M
  rect(0, 0, 9, 40); // For the letter M
  pop();
}
