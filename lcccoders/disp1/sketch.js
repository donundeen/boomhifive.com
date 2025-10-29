let canvasWidth;
let canvasHeight;

let drawFunctionList = [marcoDraw,danielDraw,minaDraw, maxDraw, daniellaDraw];
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
  push();
  drawFunction();
  pop();
}


function maxDraw() {
  push();
  stroke("white");
  strokeWeight(2);
  fill("black");
  textAlign(RIGHT, BOTTOM);
  textSize(40);
  text("Max Vanier - Creative Computing", canvasWidth - 10, canvasHeight - 10);
  pop();
  scale(2);
  //base face
 
  let tooth_point_x = 472;
  let tooth_point_y = 315;
  let mustache_left_x = 480;
  let mustache_left_y = 270;
  let mustache_right_x = 520;
  let mustache_right_y = 270;
  
  background("rgb(190,0,33)");

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
  vertex(480, 225);
  vertex(520, 225);
  vertex(525, 265);
  vertex(475, 265);

  endShape();

  beginShape();
  fill("rgb(198,170,129)");
  vertex(482, 215);
  vertex(518, 215);
  vertex(505, 275);
  vertex(495, 275);
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
  rect(455, 290, 90, 55);

  fill("white");

  beginShape();
  vertex(tooth_point_x, tooth_point_y);
  vertex(tooth_point_x + 10, tooth_point_y);
  vertex(tooth_point_x + 8, tooth_point_y + 20);
  vertex(tooth_point_x + 2, tooth_point_y + 20);
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
  triangle(420, 190, 480, 195, 420, 200);

  //Mustache
  beginShape();
  vertex(mustache_left_x, mustache_left_y);
  vertex(mustache_left_x + 20, mustache_left_y + 30);
  vertex(mustache_left_x - 20, mustache_left_y + 40);
  vertex(mustache_left_x - 50, mustache_left_y + 70);
  vertex(mustache_left_x - 40, mustache_left_y + 20);
  endShape();
  
  beginShape ()
  vertex(mustache_right_x , mustache_right_y);
  vertex(mustache_right_x -20 , mustache_right_y + 30 );
  vertex(mustache_right_x + 20, mustache_right_y + 40);
  vertex(mustache_right_x + 50, mustache_right_y + 70);
  vertex(mustache_right_x + 40, mustache_right_y + 20);
  
  endShape();
  
  triangle (500, 300, 520, 270, 480, 270)

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
  strokeWeight(2);
  fill("black");
  textAlign(RIGHT, BOTTOM);
  textSize(40);
  text("Daniela Malka - Creative Computing", canvasWidth - 10, canvasHeight - 10);
  pop();

  scale(2);
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

function minaDraw(){
  background("white"); //
  push();
  stroke("white");
  strokeWeight(2);
  fill("black");
  textAlign(RIGHT, BOTTOM);
  textSize(40);
  text("Mina Wei - Creative Computing", canvasWidth - 10, canvasHeight - 10);
  pop();
  stroke("black");
  strokeWeight(3);
  fill("#F14E28");
  ellipse(490, 270, 150, 400); // left bow

  stroke("black");
  strokeWeight(3);
  fill("#F14E28");
  ellipse(710, 270, 150, 400); // left bow

  stroke("black");
  strokeWeight(3);
  fill("#F14E28");
  circle(600, 355, 100); // center of bow

  stroke("black");
  strokeWeight(3);
  fill("#FDDAC6");
  ellipse(600, 600, 520, 500); // head base

  stroke("black");
  strokeWeight(3);
  fill("white");
  ellipse(450, 610, 220, 250); // eyes on the left

  stroke("#F583B7");
  strokeWeight(3);
  fill("#F583B7");
  ellipse(465, 605, 195, 205); // eye colour

  stroke("black");
  strokeWeight(3);
  fill("black");
  ellipse(475, 599, 175, 190); // pupil

  stroke("white");
  strokeWeight(3);
  fill("white");
  ellipse(520, 600, 45, 45); // white dot

  stroke("black");
  strokeWeight(3);
  fill("white");
  ellipse(750, 610, 220, 250); // eyes on the right

  stroke("#F583B7");
  strokeWeight(3);
  fill("#F583B7");
  ellipse(735, 605, 195, 205); // eye colour

  stroke("black");
  strokeWeight(3);
  fill("black");
  ellipse(720, 599, 175, 190); // pupil

  stroke("white");
  strokeWeight(3);
  fill("white");
  ellipse(680, 600, 45, 45); // white dot

  stroke("black");
  fill("#F68421");
  // OPEN fill mode.
  arc(600, 520, 490, 335, PI, PI - QUARTER_PI - QUARTER_PI - HALF_PI, OPEN); // hair

  stroke("#FDDAC6");
  strokeWeight(3);
  fill("#FDDAC6");
  triangle(620, 520, 600, 480, 580, 520); //cut of bangs

  stroke("black");
  strokeWeight(3);
  fill("black");
  triangle(430, 520, 470, 485, 470, 520); //cut of bangs

  stroke("black");
  strokeWeight(3);
  fill("black");
  triangle(770, 520, 730, 485, 730, 520); //cut of bangs

  fill("#FDDAC6");
  arc(600, 740, 50, 60, 0, PI, OPEN); // mouth

  line(620, 520, 846, 520); // bangs outline

  line(580, 520, 354, 520); // bangs outline

  line(600, 480, 580, 520); // bangs outline

  line(600, 480, 620, 520); // bangs outline
}

function danielDraw(){
  background(400); //color of the background
  

  push();
  stroke("white");
  strokeWeight(2);
  fill("black");
  textAlign(RIGHT, BOTTOM);
  textSize(40);
  text("Daniel Kim - Creative Computing", canvasWidth - 10, canvasHeight - 10);
  pop();  

  scale(2);
  let bigEars = 275; //size of ears
  let kmLines = 10; //size of initials
  let eyeballSize = 70; //size of eyeballs
  let heightEars = 270; //height level of ears
  let rightearColor = "gold"; //color of right ear
  let leftearColor = "gold"; //color of left ear
  let faceColor = "orange"; //color of face
  let mouthColor = "black"; //color of mouth
  let pupilColor = "black"; //color of pupils
  let noseColor = "black"; //color of nose
  let nosedroolColor = "lightblue"; //color of nose drool

  strokeWeight(10); //this is my new variable

  fill(rightearColor); //color of the right ear

  circle(570, heightEars, bigEars); //right ear

  fill(leftearColor); //colour of the left ear

  circle(210, heightEars, bigEars); //left ear

  fill(faceColor); //color of the face

  circle(390, 320, 400); //face

  ellipse(310, 290, eyeballSize, 50); //outline of left eye

  ellipse(465, 290, eyeballSize, 50); //outline of right eye

  fill(pupilColor); //color of pupils

  ellipse(310, 290, 40, 35); //pupil of left eye

  ellipse(465, 290, 50, 10); //pupil of right eye

  fill(noseColor); //nose

  ellipse(387, 330, 40, 100); //nose

  fill(mouthColor); //color of mouth

  ellipse(387, 450, 70, 5); //mouth

  fill(nosedroolColor); //color nose drool

  ellipse(395, 385, 20, 70); //nose drool

  strokeWeight(5); //thickness of K, dot, and M

  line(30, kmLines, 30, 75); //straight line of K

  line(60, kmLines, 30, 55); //line facing upper right of K

  line(30, 42, 60, 75); //line facing lower right of K

  point(80, 75); //dot in between initials

  line(100, kmLines, 100, 75); //first line on the left M

  line(100, kmLines, 120, 75); //second line facing the middle point of M

  line(145, kmLines, 120, 75); //third line facing right corner of M

  line(145, kmLines, 145, 75); //fourth straight line on the right of M

}

function marcoDraw() {
  push();
  stroke("white");
  strokeWeight(2);
  fill("black");
  textAlign(RIGHT, BOTTOM);
  textSize(40);
  text("Marco DiFruscia - Creative Computing", canvasWidth - 10, canvasHeight - 10);
  pop();
  scale(2);

  let skyColor = [135, 206, 235];
  let groundColor = [34, 139, 34];
  let shirtColor = [150, 75, 0];
  let pantsColor = [0, 0, 200];
  let skinColor = [210, 160, 100];

  background(skyColor[0], skyColor[1], skyColor[2]); // Sky
  noStroke();

  // Ground
  fill(groundColor[0], groundColor[1], groundColor[2]);
  rect(0,440,500,60);

  // Legs
  fill(pantsColor[0], pantsColor[1], pantsColor[2]); // Jeans
  rect(200, 300, 40, 120, 5); // left leg (front)
  rect(260, 300, 40, 120, 5); // right leg (back)

  // Boots
  fill(90, 50, 20);
  rect(195,420,45,20,3);
  rect(260,420,45,20,3);

  // Body
  fill(shirtColor[0], shirtColor[1], shirtColor[2]); // brown shirt
  rect(200,180,100,140,10);

  // Arms
  fill(shirtColor[0], shirtColor[1], shirtColor[2]);
  rect(160,200,40,90,10); // left arm
  rect(300,200,40,90,10); // right arm

  // Hands
  fill(skinColor[0],skinColor[1],skinColor[2]);
  circle(180,290,25);
  circle(320,290,25);

  // Belt
  fill(0);
  rect(200,310,100,12);
  fill(255,215,0);
  rect(245,310,20,12); // buckle

  // Bandana
  fill(200,0,0);
  triangle(200,180,300,180,250,230);

  // Head
  fill(skinColor[0],skinColor[1],skinColor[2]);
  ellipse(250,120,120,130);

  // Hat
  fill(110,70,20);
  rect(215,45,70,33,6);
  ellipse(250,85,200,40);

  // Face
  fill(255);
  ellipse(230,120,20,18); // left eye
  ellipse(270,120,20,18); // right eye
  fill(0);
  ellipse(230,120,8,8);
  ellipse(270,120,8,8);

  // Eyebrows
  stroke(60,30,10);
  strokeWeight(4);
  line(220,105,240,110);
  line(260,110,280,105);
  noStroke();

  // Mouth
  stroke(0);
  strokeWeight(3);
  line(230,150,270,150);
  noStroke();

  // Badge
  fill(255,215,0);
  circle(280,225,16);

  // Lasso
  noFill();
  stroke(180,120,40);
  strokeWeight(4);
  ellipse(350,200,80,80);
  line(350,240,320,290);

  // Initials "C.B" for Cow Boy
  stroke(0);
  strokeWeight(3);

  // Letter C
  line(20, 20, 50, 20); // top
  line(20, 20, 20, 60); // left
  line(20, 60, 50, 60); // bottom

  // Letter B
  line(70, 20, 70, 60); // main spine
  line(70, 20, 90, 30); // top downwards diagonal
  line(90, 30, 70, 40); // top upwards diagonal
  line(70, 40, 90, 50); // bottom downwards diagonal
  line(90, 50, 70, 60); // bottom upwards diagonal
}