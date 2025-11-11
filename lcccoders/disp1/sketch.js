let canvasWidth;
let canvasHeight;

let drawFunctionList = [nathanDraw];//,minaDraw];//, daniellaDraw]; //danielDraw];//charanDraw, alvandDraw, athanDraw , marcoDraw, maxDraw];
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
  drawFunction = drawFunctionList[drawFunctionIndex];
 // console.log(drawFunctionIndex);
  push();
  drawFunction();
  pop();
}

function nextProject(){
  console.log("nextProject", drawFunctionList.length);
  drawFunctionIndex = (drawFunctionIndex + 1) % drawFunctionList.length;
}

function showCaption(textString) {
  push();
  stroke("white");
  strokeWeight(2);
  fill("black");
  textAlign(RIGHT, BOTTOM);
  textSize(40);
  text(textString, canvasWidth - 10, canvasHeight - 10);
  pop();
}


function maxDraw() {
  background("rgb(190,0,33)");

  
  showCaption("Max Vanier - Creative Computing");

  scale(2);
  //base face
 
  let tooth_point_x = 472;
  let tooth_point_y = 315;
  let mustache_left_x = 480;
  let mustache_left_y = 270;
  let mustache_right_x = 520;
  let mustache_right_y = 270;
  

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


let squareX= 100;
let squareY= 0.1;
let squareW= 100;
let rampAplitude= 60;
let sinSpeed= 90;
let sinAmplitude= 90;
function daniellaDraw() {
  background(200,20,100); // Colour of background

  showCaption("Daniela Malka - Creative Computing");
  scale(2);

  let adjustedWidth = width / 2;
  let adjustedHeight = height / 2;

  let eyeColour="rgb(158,101,224)" // Eye colour
  let eyecolour2="rgb(240,133,185)" // Eye colour for the second eye

  let skinColour="rgb(112,173,100)" // Skin colour
  let nosesizeX=sin(frameCount*0.01)*203 // Nose size X-axis
  let nosesizeY=sin(frameCount*0.01)*250 // Nose size Y-axis
  let nosesizeRadius=sin(frameCount*0.01)*40 // Nose size radius
  let lowereyebrowX=sin(frameCount*0.05)*125 // To lower the eyebrow on the X-axis
  let lowereyebrowY=cos(frameCount*0.006)*120 //To lower the eyebrow on the Y-axis
  let lowereyebrowL=sin(frameCount*0.01)*50 // To lower the eyebrow length
  let lowereyebrowW=cos(frameCount*0.1)*30 // To lower the eyebrow width
  let eyesizeX=sin(frameCount*0.01)*160 // Eye size X-axis
  let eyesizeY=sin(frameCount*0.04)*190 // Eye size Y-axis
  let eyesizeL=cos(frameCount*0.3)*82 // Eye length
  let eyesizeW=sin(frameCount*0.1)*120 // Eye width
  let letterColour="rgb(311,422,353)" // Colour for the letters of my insignia.
  let eyebrowColour="rgb(0,0,0)" // Eyebrow colour
  
  fill(skinColour);
  circle(200, 200, 220); // Circle for my head
  square(250,60,60,300); // Antenna #1
  square(95, 60,60, 300); // Antenna #2 
  fill(255,255,255); // Colour for body
  ellipse(eyesizeX, eyesizeY, eyesizeL, eyesizeW); // Eye #1
  ellipse(245, 190, 82, 50); // Eye #2
  fill(eyeColour);
  ellipse(240, 200, 50, 60); // Iris #1
  fill(eyecolour2);
  ellipse(165, 200, 50, 20); // Iris #2
  fill(0,0,0);
  ellipse(240, 200, 30, 30, 0); // Retina #1
  ellipse(165, 200, 30, 30, 0); // Retina #2
  push();
  fill (0,0,0);
  circle(nosesizeX,nosesizeY,nosesizeRadius); // Nose
  pop();
  push();
  fill (eyebrowColour);
  ellipse(lowereyebrowX, lowereyebrowY, lowereyebrowL, lowereyebrowW);// Eyebrow #1
  ellipse(245, lowereyebrowY, lowereyebrowL, lowereyebrowW); // Eyebrow #2
  pop();
  push();
  arc(adjustedWidth*.35, adjustedHeight*.7, adjustedWidth*.2, adjustedHeight*.1, 0, 3.14); // Mouth
  fill(283,292,292);
  arc(adjustedWidth*.35, adjustedHeight*.7, adjustedWidth*.2, adjustedHeight*.1, 0, 3.14); // Smile (teeth)
  pop();
  fill(90,10,100);
  let offset = frameCount % rampAplitude;
  offset = offset - (rampAplitude / 1);  
  square(squareX = 200-offset, squareY + 20, squareW+offset /2);
  fill(letterColour);
  circle(50,40,50); // For the letter D
  noStroke(); // To get rid of the outline of the square that hides the rest of the circle to create a "D"-like shape.
  fill(200,20,100); // For the letter D
  square(1,15,50); // For the letter D
  fill(0,0,0); // For the inside of the D
  ellipse(60,43, 10, 20); // For the inside of the D
  fill(200,20,100); // For the letter M
  rect(90,20,50,40); // For the letter M
  fill(letterColour);
  rect(90,20,10,40); // For the letter M
  rect(130,20,10,40); // For the letter M
  rotate(50); // For the letter M
  rect(90,47,9,40); // For the letter M
  push(); // To make sure whatever is within the push and pop stays inside.
  fill(letterColour);
  rectMode(CENTER); // For the letter M
  translate(107,70); // For the letter M
  rotate(PI*0.2); // For the letter M
  rect(0,0,9,40); // For the letter M
  pop();
  fill(255, 192, 203); // Pink color
  ellipse(200, 200, 30, 50); // Petals
  fill(255, 255, 0); // Yellow color
  ellipse(200, 200, 30 / 3, 60 / 3); // Center
  fill(0); // Set text color to black
  textSize(50);
  textFont('Times New Roman');
  textAlign(CENTER);
  text('Gummy Bear', adjustedWidth / 2, adjustedHeight / 2);


}


let minaAngle;
let radius = 225;
let centerX, centerY;
let cloudOneX = 100
x=50
y=50
function minaDraw(){
  background("#B5C6DC");

  showCaption("Mina Wei - Creative Computing");

  rectMode(CENTER)

  //cloud
  strokeWeight(3);
  fill(255);
  ellipse(cloudOneX + 10, 40, 90, 50);
  ellipse(cloudOneX + 40, 85, 60, 30);
  ellipse(cloudOneX - 20, 75, 70, 20);
  ellipse(cloudOneX + 500, 200, 100, 50);
  ellipse(cloudOneX + 550, 230, 60, 25);
  ellipse(cloudOneX - 200, 220, 70, 25);
  ellipse(cloudOneX - 250, 175, 100, 50);
  ellipse(cloudOneX - 280, 200, 80, 20);
  //sets x coordinate to framecount
  //resets to left
  cloudOneX = frameCount % width;

  //sun
  push();
  let x = 300;
  let y = 400 * sin(frameCount * 0.01) + 50;
  fill("orange");
  translate(400, 10);
  line(300, y, x, y);
  circle(x, y, 100);
  pop();

  //grass
  strokeWeight(1);
  fill("green");
  rect(500, 450, 1000, 100);

  //rollercoaster carts
  let cartX = sin(frameCount * 0.02) * 500;
  let cartColourA = paletteLerp(
    [
      ["#F9BACF)", 0.025],
      ["#FFE7A1", 0.05],
      ["#AAD4F6", 0.25],
    ],
    (millis() / 10000) % 1
  );
  fill(cartColourA);
  strokeWeight(3);
  rect(cartX, 190, 50, 40);
  rect(cartX - 60, 190, 50, 40);
  rect(cartX - 120, 190, 50, 40);
  rect(cartX - 180, 190, 50, 40);
  rect(cartX - 240, 190, 50, 40);
  fill("black");
  circle(cartX + 15, 205, 15);
  circle(cartX - 15, 205, 15);
  circle(cartX - 45, 205, 15);
  circle(cartX - 75, 205, 15);
  circle(cartX - 105, 205, 15);
  circle(cartX - 135, 205, 15);
  circle(cartX - 165, 205, 15);
  circle(cartX - 195, 205, 15);
  circle(cartX - 225, 205, 15);
  circle(cartX - 255, 205, 15);

  //tracks
  strokeWeight(10);
  line(1, 210, 520, 210);
  strokeWeight(5);
  noFill();
  triangle(520, 210, 520, 400, 350, 400);
  triangle(350, 400, 190, 400, 190, 210);
  triangle(190, 210, 10, 400, 190, 400);
  triangle(190, 210, 10, 400, 190, 400);

  //ferris wheel
  push();
  translate(800, 230);
  stroke(0);
  strokeWeight(5);
  noFill();
  circle(0, 0, 300); //outer circle
  noFill();
  triangle(0, 18, -80, 170, 80, 170);
  //lines
  push();
  rotate(radians(frameCount));
  line(0, -150, 0, -15); //up
  line(0, 150, 0, 15); //down
  line(-150, 0, -15, 0); //left
  line(150, 0, 15, 0); //right
  line(-105, -105, -12, -12); //left up
  line(105, 105, 12, 12); // right down
  line(-105, 105, -12, 12); //left down
  line(105, -105, 12, -12); // right up
  stroke(0);
  strokeWeight(5);
  noFill();
  circle(0, 0, 30); //inner circle

  //carts
  let cartColour = paletteLerp(
    [
      ["#E91E63)", 0.025],
      ["#FFC107", 0.05],
      ["#2196F3", 0.25],
    ],
    (millis() / 10000) % 1
  );

  fill(cartColour);
  push(); //up
  translate(0, -150);
  rotate(radians(-frameCount));
  arc(0, -20, 70, 80, 0, PI, CHORD);
  // fill(255);
  // circle(0,0,2);
  pop();

  push(); // down
  translate(0, 150);
  rotate(radians(-frameCount));
  arc(0, -20, 70, 80, 0, PI, CHORD);
  // fill(255);
  // circle(0,0,2);
  pop();

  fill(cartColour);
  push(); //left
  translate(-150, 0);
  rotate(radians(-frameCount));
  arc(0, -20, 70, 80, 0, PI, CHORD);
  // fill(255);
  // circle(0,0,2);
  pop();

  push(); //right
  translate(150, 0);
  rotate(radians(-frameCount));
  arc(0, -20, 70, 80, 0, PI, CHORD);
  // fill(255);
  // circle(0,0,2);
  pop();

  fill(cartColour);
  push(); //left up
  translate(-106, -106);
  rotate(radians(-frameCount));
  arc(0, -20, 70, 80, 0, PI, CHORD);
  // fill(255);
  // circle(0,0,2);
  pop();

  push(); // right down
  translate(106, 106);
  rotate(radians(-frameCount));
  arc(0, -20, 70, 80, 0, PI, CHORD);
  // fill(255);
  // circle(0,0,2);
  pop();

  fill(cartColour);
  push(); //left down
  translate(-106, 106);
  rotate(radians(-frameCount));
  arc(0, -20, 70, 80, 0, PI, CHORD);
  // fill(255);
  // circle(0,0,2);
  pop();

  push(); // right up
  translate(106, -106);
  rotate(radians(-frameCount));
  arc(0, -20, 70, 80, 0, PI, CHORD);
  //   fill(255);
  //   circle(0,0,2);
  pop();

 
}



let hueValue = 0; //the starting color is red

function danielDraw(){
  background(hueValue, 100, 100); //color of the background
  
  showCaption("Daniel Kim - Creative Computing");

  scale(1.25);
  let bigEars = 260; //size of ears
  let kmLines = 10; //size of initials
  let eyeballSize = 50; //size of eyeballs
  let heightEars = 260; //height level of ears
  let rightearColor = "grey"; //color of right ear
  let leftearColor = "grey"; //color of left ear
  let faceColor = "darkgrey"; //color of face
  let mouthColor = "black"; //color of mouth
  let pupilColor = "black"; //color of pupils
  let noseColor = "black"; //color of nose
  let nosedroolColor = "lightblue"; //color of nose drool
  let eyeballOutlineSize = sin(frameCount * 0.03) * 20 + 25; //size of eyeball outline
  let pupilSize = sin(frameCount * 0.03) * 10 + 15; //pupils blinking
  let mouthSize = sin(frameCount * 0.0315) * 25 + 30; //mouth opening and closing
  let noseDroolSize = sin(frameCount * 0.025) * 50 + 60; //nosedrool hanging then going   back into nose
  let earSize = sin(frameCount * 0.05) * 5 + 220; //ears twitching
  let rampAmplitude = 200; 
  
  let rampOffset = 50; 
  
  let rampSpeed = 0.75; 

  strokeWeight(5); //thickness of lines

  fill(rightearColor); //color of the right ear

  circle(570, heightEars, earSize); //right ear

  fill(leftearColor); //colour of the left ear

  circle(210, heightEars, earSize); //left ear

  fill(faceColor); //color of the face

  circle(390, 320, 400); //face

  ellipse(310, 290, eyeballSize, eyeballOutlineSize); //outline of left eye

  ellipse(465, 290, eyeballSize, eyeballOutlineSize); //outline of right eye

  fill(pupilColor); //color of pupils

  ellipse(310, 290, 25, pupilSize); //pupil of left eye

  ellipse(465, 290, 25, pupilSize); //pupil of right eye

  fill(nosedroolColor); //color nose drool

  ellipse(390, 355, 30, noseDroolSize); //nose drool

  fill(noseColor); //nose

  ellipse(387, 330, 40, 100); //nose

  fill(mouthColor); //color of mouth

  ellipse(387, 450, 70, mouthSize); //mouth

  strokeWeight(5); //thickness of K, dot, and M

  line(30, kmLines, 30, 75); //straight line of K

  line(60, kmLines, 30, 55); //line facing upper right of K

  line(30, 42, 60, 75); //line facing lower right of K

  point(80, 75); //dot in between initials

  line(100, kmLines, 100, 75); //first line on the left M

  line(100, kmLines, 120, 75); //second line facing the middle point of M

  line(145, kmLines, 120, 75); //third line facing right corner of M

  line(145, kmLines, 145, 75); //fourth straight line on the right of M

  hueValue = (hueValue + 1) % 360; //color changing all the way to 360 for all colors of rainbow

}


// My 5 variables
let skyColor = [135, 206, 235] // starting sky color

let groundColor = [0, 128, 0] // made every variable (groundColor) so that the color changing is syncronised
let shirtColor = [0, 128, 0]
let pantsColor = [0, 128, 0]
let skinColor = [0, 128, 0]

// Sun Variables
let angle = 0
let amplitude = 150
let frequency = 0.01
let sunRadius = 50

// Clouds
let cloudX = 0
let cloudSpeed = 1.5
let cloudSize = 60

// Lasso
let lassoAngle = 0
let lassoSpeed = 0.07
function marcoDraw() {

  
  // Sun position
  let sunY = canvasHeight / 4 + sin(angle) * amplitude
  // t determines how orange the sky is
  let t = map(sunY, height/4 - amplitude, height/4 + amplitude, 0, 1)
  t = constrain(t, 0, 1)

  // Interpolate sky color
  let skyR = lerp(skyColor[0], 255, t)
  let skyG = lerp(skyColor[1], 165, t)
  let skyB = lerp(skyColor[2], 0, t)

  background(skyR, skyG, skyB)

  showCaption("Marco DiFruscia - Creative Computing");

  scale(2);

 
  // Clouds moving across the sky
  cloudX += cloudSpeed
  if (cloudX > width + cloudSize * 2) cloudX = -cloudSize

  noStroke()
  fill(255)
  ellipse(cloudX, 70, cloudSize, cloudSize * 0.8)
  ellipse(cloudX + 40, 70, cloudSize, cloudSize * 0.8)
  ellipse(cloudX + 20, 55, cloudSize, cloudSize * 0.8)

  // Sun
  fill(255, 255, 0)
  circle(100, sunY, sunRadius * 2)

  // Ground
  fill(groundColor[0] % 300, groundColor[1] % 200, groundColor[2] % 100)
  rect(0, 440, width, 60)
  groundColor[0]++
  groundColor[1]++
  groundColor[2]++

  // Legs
  fill(groundColor[0] % 300, groundColor[1] % 200, groundColor[2] % 100)
  rect(200, 300, 40, 120, 5)
  rect(260, 300, 40, 120, 5)

  // Boots
  fill(90, 50, 20)
  rect(195, 420, 45, 20, 3)
  rect(260, 420, 45, 20, 3)

  // Body
  fill(groundColor[0] % 300, groundColor[1] % 200, groundColor[2] % 100)
  rect(200, 180, 100, 140, 10)

  // Arms 
  fill(groundColor[0] % 300, groundColor[1] % 200, groundColor[2] % 100)
  rect(160, 200, 38, 88, 10)
  rect(302, 200, 38, 88, 10)

  // Hands
  fill(groundColor[0] % 300, groundColor[1] % 200, groundColor[2] % 100)
  circle(180, 290, 26)
  circle(320, 290, 24)

  // Belt
  fill(0)
  rect(200, 310, 100, 12)
  fill(255, 215, 0)
  rect(245, 310, 20, 12)

  // Bandana
  fill(200, 0, 0)
  triangle(200, 180, 300, 180, 250, 230)

  // Head
  fill(groundColor[0] % 300, groundColor[1] % 200, groundColor[2] % 100)
  ellipse(250, 120, 120, 130)

  // Hat
  fill(110, 70, 20)
  rect(215, 45, 70, 33, 6)
  ellipse(250, 85, 200, 40)

  // Face
  fill(255)
  ellipse(230, 120, 20, 18)
  ellipse(270, 120, 20, 18)
  fill(0)
  ellipse(230, 120, 8, 8)
  ellipse(270, 120, 8, 8)

  // Eyebrows
  stroke(60, 30, 10)
  strokeWeight(4)
  line(220, 105, 240, 110)
  line(260, 110, 280, 105)
  noStroke()

  // Mouth
  stroke(0)
  strokeWeight(3)
  line(230, 150, 270, 150)
  noStroke()

  // Badge
  fill(255, 215, 0)
  circle(280, 225, 16)

  // Lasso
  noFill()
  stroke(180, 120, 40)
  strokeWeight(4)
  let loopX = 350 + cos(lassoAngle) * 50
  let loopY = 240 + sin(lassoAngle) * 50
  line(350, 240, 320, 290)
  noFill()
  circle(loopX, loopY, 100)
  lassoAngle += lassoSpeed

  // Initials "C.B"
  stroke(0)
  strokeWeight(5)
  line(20, 20, 50, 20)
  line(20, 20, 20, 60)
  line(20, 60, 50, 60)
  line(70, 20, 70, 60)
  line(70, 20, 90, 30)
  line(90, 30, 70, 40)
  line(70, 40, 90, 50)
  line(90, 50, 70, 60)

  // Sun movement
  angle += frequency

 
}



//Variables
let faceSize = 250; // size of the head (main circle)
let earSize = 80; // diameter of the headphone earcups
let eyeSize = 67; // diameter of eyeballs
let pupilSize = 35; // diameter of pupils
let mouthSize = 100; // width/height of the mouth arc
let faceColor = "#FF539B"; //head/face color
let earColor = "#4AE6E6"; // headphone earcup color
let pupilLeft = 60; // left puupil size
let pupilRight = 60; // right pupil size

// starting values
let cx = 200;
let cy = 220;
faceSize = 230;
let mouthW = 110;
let earBase = 75;
let earOffsetX = 140;
bandHeight = 165;
let notes = []; //music notes

// ramp function
function ramp(period) {
  return (frameCount % period) / period;
}

// draw a triangle nose
function drawNose(x, y, w, h, c) {
  push();
  fill(c);
  stroke(0);
  strokeWeight(2);
  triangle(x, y - h * 0.6, x - w * 0.5, y + h * 0.4, x + w * 0.5, y + h * 0.4);
  pop();
}

//long music note
function drawNote(x, y, s, hueVal, alphaVal) {
  push();
  translate(x, y);
  noStroke();
  fill(hueVal, 70, 95, alphaVal);

  // note head
  ellipse(0, 0, s * 1.1, s * 0.8);

  // stem
  fill(hueVal, 70, 80, alphaVal);
  rect(s * 0.45, -s * 2.2, s * 0.15, s * 2.4, 2);

  // small curved flag
  noFill();
  stroke(hueVal, 70, 80, alphaVal);
  strokeWeight(2);
  arc(s * 0.52, -s * 2.1, s * 0.9, s * 0.9, -PI / 2, 0);
  pop();
}

// add a new note near the right side of the head
function spawnNote() {
  notes.push({
    x: cx + 40 + random(-10, 10),
    y: cy + 10 + random(-6, 6),
    vy: random(1.0, 1.8), // up speed
    wob: random(0.02, 0.04), // sideways wiggle
    s: random(10, 14), // size
    hue: random(190, 300), // color
    life: 0, // age (frames)
  });
}

// move and draw the notes
function updateNotes() {
  for (let i = notes.length - 1; i >= 0; i--) {
    let n = notes[i];
    n.y -= n.vy; // go up
    n.x += 6 * sin(n.life * n.wob); // wiggle
    n.life++;

    // fade out slowly (longer life)
    let a = map(n.life, 0, 260, 100, 0); // 260 frames ≈ 4+ sec
    drawNote(n.x, n.y, n.s, n.hue, a);

    if (n.life > 280 - n.y < -20) notes.splice(i, 1);
  }
}

// simple initials (unchanged)
function drawInitials() {
  push();
  stroke(0);
  strokeWeight(3);
  noFill();
  line(20, 40, 20, 10);
  line(20, 10, 30, 25);
  line(30, 25, 40, 10);
  line(40, 10, 40, 40);
  circle(55, 38, 5);
  line(70, 40, 70, 10);
  line(70, 10, 80, 25);
  line(80, 25, 90, 10);
  line(90, 10, 90, 40);
  pop();
}

function athanDraw(){
  colorMode(HSB);

  //time controls
  const slow = ramp(500); // slow  ramp
  const med = ramp(240); // medium ramp
  const fast = ramp(120); // fast  ramp

  // background (color change with sin)
  bgHue = map(sin(frameCount * 0.01), -1, 1, 220, 260);
  background(bgHue, 40, 25);

  showCaption("Athanassios Mavritsakis - Creative Computing");


  scale(2);


  // head bop
  headBop = 0.15 * sin(frameCount * 0.04);

  //variable animations
  eyeSize = 52 + 8 * sin(frameCount * 0.02); // small range
  pupilLeft = 18 + 14 * abs(sin(frameCount * 0.07)); // blink
  pupilRight = 18 + 14 * abs(sin(frameCount * 0.07 + 0.8)); // offset
  mouthH = 50 + 50 * med; // ramp
  earLeft = earBase + 18 * fast; // grows (low to high)
  earRight = earBase + 18 * (1 - fast); // shrinks (high to low)

  // headphone band
  bandWidth = earOffsetX * 2 + max(earLeft, earRight);
  bandY = cy - 60 + 3 * sin(frameCount * 0.02);

  // spawn long notes regularly (uses modulo for timing) ----
  if (frameCount % 14 === 0) spawnNote();
  updateNotes();

  // HEAD (rotate to bop) ----
  push();
  translate(cx, cy);
  rotate(headBop);

  // headphone band
  noFill();
  stroke(0);
  strokeWeight(8);
  arc(0, 90, 330, 450, PI + QUARTER_PI, TWO_PI - QUARTER_PI);

  // head
  fill(315, 70, 85);
  stroke(0);
  strokeWeight(4);
  circle(0, 0, faceSize);

  // earcups (outside + connected)
  fill(185, 65, 90);
  stroke(0);
  strokeWeight(3);
  circle(-earOffsetX, 0, earLeft);
  circle(earOffsetX, 0, earRight);

  // eyes
  fill(270, 60, 70);
  stroke(0);
  strokeWeight(2);
  ellipse(-45, -40, eyeSize, eyeSize);
  ellipse(45, -40, eyeSize, eyeSize);

  // pupils
  fill(0, 0, 100);
  circle(-45, -40, pupilLeft);
  circle(45, -40, pupilRight);

  // nose (custom function)
  drawNose(0, 5, 60, 55, color(230, 60, 80));

  // mouth (ramp opens/closes)
  fill(25, 70, 95);
  stroke(0);
  strokeWeight(3);
  arc(0, 60, mouthW, mouthH, 0, PI + QUARTER_PI);

  pop();

  // initials
  drawInitials();


}


// VARIABLES
let leftEarTipX = 100;
let rightEarTipX = 300;
let leftSideNose = 200;

// Track how many blinks have happened
let blinkCount = 0;
let eyeColorIsRed = true;
function alvandDraw(){

  background('#2C397D');

  showCaption("Alvand Mohammadpouryazdi - Creative Computing");

  scale(2);


  // --- ANIMATION VARIABLES ---
  let blinkSpeed = frameCount % 50; // resets every 4 seconds
  let eyeOpen;
  if (blinkSpeed < 10) {
    eyeOpen = map(blinkSpeed, 0, 10, 20, 2); // closing
  } else if (blinkSpeed < 20) {
    eyeOpen = map(blinkSpeed, 10, 20, 2, 20); // opening
  } else {
    eyeOpen = 20; // open
  }

  // Every time a blink cycle resets, toggle color
  if (blinkSpeed === 0) {
    blinkCount++;
    eyeColorIsRed = blinkCount % 2 === 0; // alternate each blink
  }

  // Set eye color
  let eyeColor = eyeColorIsRed ? color(174, 9, 9) : color(255);

  // Helmet metallic shine
  let helmetShade = 120 + sin(frameCount * 0.03) * 50;

  // Sword floating animation
  let swordY = 250 + sin(frameCount * 0.04) * 30;

  // --- KNIGHT HEAD ---
  fill(helmetShade);
  arc(200, 150, 200, 200, PI, 0); // helmet

  fill('black');
  circle(200, 150, 200); // face under armour

  fill('grey');
  triangle(190, leftSideNose, 200, 90, 210, 200); // nose
  triangle(210, 350, 210, 175, 300, 175); // armour cheek (left)
  triangle(190, 350, 190, 175, 100, 175); // armour cheek (right)
  triangle(rightEarTipX, 2, 210, 100, 300, 150); // right ear
  triangle(leftEarTipX, 2, 190, 100, 100, 150); // left ear

  // --- EYES (Blink + Color Toggle) ---
  fill(eyeColor);
  ellipse(150, 163, 20, eyeOpen);
  ellipse(250, 163, 20, eyeOpen);

  // --- SWORD (Full Design with Handle + Guard) ---
  push();
  translate(330, swordY);

  // Blade
  stroke(200);
  strokeWeight(5);
  line(0, -70, 0, 50);

  // Guard
  strokeWeight(8);
  stroke('gold');
  line(-20, 50, 20, 50);

  // Handle
  strokeWeight(6);
  stroke('#924C21');
  line(0, 50, 0, 80);

  // Pommel
  noStroke();
  fill('gold');
  circle(0, 85, 15);

  // Tip
  fill('silver');
  ellipse(0, -70, 15, 8);
  pop();

  // --- Glow around knight ---
  let glow = abs(sin(frameCount * 0.05)) * 100 + 50;
  noFill();
  stroke(255, 255, glow, 120);
  strokeWeight(2);
  circle(200, 150, 210 + sin(frameCount * 0.03) * 5);


}


//simple integer variables that change lengths and widths
let boulderShoulderRadius = 100;
let faceRadius = 200;
let abSize = 150; 

//boolean variables
let happiness = true; //for the smile
let invertColor = false; //boolean that is sent as a parameter to the invertible color function

//this is a custom fill function that also accepts a boolean to invert the color
function invertibleColor(boolean, r, g, b) { 
  if (boolean) {
    fill(256 - r, 256 - g, 256 - b);
  } else {
    fill(r,g,b);
  }  
} 

let increasingVal = 0;
let r = 255;
let b = 0;
let g = 0;
let phase = 0;

function charanDraw(){

  if (phase == 0) {
    b+= 2
    r-= 2
    background(r, g, b)
    if (b > 254) {
      b = 255
      r = 0
      phase = 1
    }
  } else if (phase == 1){
    g+= 2
    b-= 2
    background(r, g, b)
    if (g > 254) {
      g = 255
      b = 0
      phase = 2
    }
  } else if (phase == 2){
    r+= 2
    g-= 2
    background(r, g, b)
    if (r > 254) {
      r = 255
      g = 0
      phase = 0
    }
  }

  showCaption("Charan Veluru - Creative Computing");

  invertibleColor(invertColor, 88,57,39);
  ellipse(300, 400, 50, 100); //neck
  faceRadius+=0.03;
  circle(300, 275, map(sin(faceRadius), -1, 1, 200, 275)); //face
  
  if (happiness) {
    arc(300, 330, 80, 60, 0, PI, PIE, 5);
  } else {
    beginShape();
    vertex(250, 350)
    vertex(350, 350)
    vertex(300, 270)
    endShape(CLOSE);
  }
  
  invertibleColor(invertColor, 256,256,256);
  ellipse(250, 275, 50, 90); //left eye
  ellipse(350, 275, 50, 90); //right eye
  
  invertibleColor(invertColor, 0,0,0);
  circle(250, 250, 30); //left iris
  circle(350, 250, 30); //right iris
  
  invertibleColor(invertColor, 256, 256, 256);
  circle(260, 250, 10); //left eye reflection
  circle(360, 250, 10); //right eye reflection


  invertibleColor(invertColor, 256, 128, 128);
  triangle(210, 230, 170, 160, 260, 180) //ear1
  triangle(390, 230, 430, 160, 340, 180) //ear2
  
  invertibleColor(invertColor, 250, 180, 20);
  rect(100, 450, 80, 300) //Left Arm
  rect(180, 450, 240, 300) //Abdomen
  rect(420, 450, 80, 300) //Right Arm
  square(180, 450, 120) //pec1
  square(300, 450, 120) //pec
  
  ellipse(300, 450, 350, 50) //collarbobne
  
  let temporaryRadius = (boulderShoulderRadius % 121) + 80;
  circle(130, 450, temporaryRadius) //shoulder1
  circle(470, 450, temporaryRadius) //shoulder2
  console.log(temporaryRadius);
  boulderShoulderRadius++;
  //bouldershoulder radius from 80-200

  tempAbSize = map(sin(increasingVal), -1, 1, 150, 250)
  ellipse(300, 700, tempAbSize, abSize/3) //2pack
  ellipse(300, 650, tempAbSize, abSize/3) //4pack
  ellipse(300, 600, tempAbSize, abSize/3) //6pack
  increasingVal+=0.05;
//centerline to provide guidance and a mid x value to refer to


  scale(2);
}

function nathanDraw(){
  background(250, 150, 10); // Orange color of background

  showCaption("Nathan Goodman - Creative Computing");

  scale(2);

  let eyeColour = paletteLerp(
    [
      ["white", 0],
      ["red", 0.05],
      ["green", 0.25],
      ["blue", 1],
    ],
    (millis() / 10000) % 1
  ); // This is changing the colour of the eyes between 4 differnt colours and mixing them together creating a rainbow kind of feel
  let pupilSize = sin(frameCount * 0.15) * 60 + 35; //Size of both pupils 
  let buttonSize = (frameCount * 0.5) % 20; // Controller grey button size
  let faceColour = paletteLerp(
    [
      ["#00BCD4", 0],
      ["#673AB7", 0.05],
      ["#F34000", 0.25],
      ["#86FF8B", 1],
    ],
    (millis() / 10000) % 1
  ); // Changing ccolour of face
  let eyeballSize = (frameCount * 2) % 450 ; // Size of outer eye shell
  let mouthX = sin(frameCount * 0.4) * 30; // Moving the mouth left to right over and over again
  fill(faceColour); // Color of face
  stroke("#0E0E0D");
  strokeWeight(1);
  circle(0, 0, 250); // circle for my head.
  ellipse(-55, -50, 50, eyeballSize); // Left Eyeball
  fill(eyeColour); // Blue color for Left pupil
  circle(-55, -50, pupilSize); // Left Pupil
  fill(faceColour); // Color for the Right Eyeball
  ellipse(60, -50, 50, eyeballSize); // Right Eyeball
  fill(eyeColour); // Color for Right Pupil
  circle(60, -50, pupilSize); // Right Pupil
  fill("#F44336"); // Color for the Mouth
  arc(mouthX, 60, 90, 60, 0, PI); // The mouth
  fill(" #000000"); // Color For the Controller
  rect(115, 60, 110, 40); // Middle piece of the controller
  ellipse(130, 100, 30, 60); // Left handgrip of controller
  ellipse(210, 100, 30, 60); // Right handgrip of controller
  ellipse(170, 55, 112, 50); // Top part of controller
  strokeWeight(8); // Size of the 4 buttons on right side of controller
  stroke("#8BC34A"); // Colour of Button in top right
  point(210, 50); // The green button in top right
  stroke("#F44336"); //Colour of Button in bottom right
  point(210, 60); // Red button in bottom right
  stroke("#2196F3"); //Colour of button in bottom left
  point(200, 60); // Blue button in bottom left
  stroke("#FFEB3B"); // Colour od button in top left
  point(200, 50); // Yellow button in top left
  strokeWeight(1); // size of joysicks
  fill(" #9E9E9E");
  push();
  let twoAxis = [sin(frameCount * 0.1), sin(frameCount * 1), 0]; //Using sin to rotate the joysticks to give them a real-life feeling and assigning a variable to it
  translate(140, 70);//New functions that moves where the joysicks will rotate around
  rotate(QUARTER_PI, twoAxis);//Code that's rotating the left joystick
  circle(10, 20, 20); // Outer part of left joystick
  circle(10, 20, 15); // Inner part of left joystick
  pop();
  push();
  translate(120, 70);//New functions that moves where the joysicks will rotate around
  rotate(QUARTER_PI, twoAxis);//Code that's rotating the right joystick
  circle(70, 20, 20); // Outer part of right joystick
  circle(70, 20, 15); // Inner part of right joystick
  pop();
  circle(125, 50, buttonSize); // Grey button in top left
  circle(140, 50, buttonSize); // Grey button in top right
  circle(125, 65, buttonSize); // Grey button in bottom left
  circle(140, 65, buttonSize); // Grey button in bottom right
  fill("#795548"); // Hair color
  rect(-95, -130, 200, 50); // Middle piece of hair
  rect(-85, -130, -45, 120); // Left piece of hair
  rect(135, -130, -45, 120); // Right piece of hair
  fill(250, 150, 10); // Color of background to fill in middle of G and D
  strokeWeight(10); // Thickness of G
  arc(-145, -193, 80, 40, 0, PI + HALF_PI); // The main three quarters of a circle part of G
  line(-140, -195, -100, -195); // Line on the end of circle to make a G
  point(-90, -175); // Point between initials
  line(-70, -220, -70, -170); // Back Line part of D
  arc(-65, -195, 105, 50, -HALF_PI, HALF_PI); // Semi-Circle Part of D
  // G.D stands for Gamer Dude
  push();
  let axis = [sin(frameCount * 0.1), sin(frameCount * 1.25), 0];//Using sin to rotate the Nose and assigning a variable
  rotate(QUARTER_PI, axis); // Code that is rotating the nose and is a new function
  box(50, 60); //New Function
  pop();
}