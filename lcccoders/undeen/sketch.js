// initialize the variables that hold the images. We'll populate them in the preload function
let skull, pears, ginger, guitar,eyeball, eyeball2, coke,pinkshag,catmelon, lemons, cereal;

// initialize the variables that hold the sample bezier curve, that we use to generate values we can plug into the code.
let bx1s, by1s, bc1xs, bc1ys, bc2xs, bc2ys, bx2s, by2s;

// the object that holds the text of the bezier values
let bezierText;

// set this to true to show the sample bezier curve. Set it to false to hide it, when we want to just show the art
let showSliders = true;

// canvas dimensions
let canvasWidth = 1200;
let canvasHeight = 800;

// Load the images and create a p5.Image objects.
function preload() {
  skull   = loadImage('stillLifeWithSkullAndWritingQuill.jpeg');
  pears   = loadImage('applesAndPears.jpeg');
  ginger  = loadImage("ginger.jpeg");
  guitar  = loadImage("guitar.jpeg");
  eyeball = loadImage("eyeball.png");
  eyeball2 = loadImage("eyeball2.jpg");
  shag    = loadImage("pinkshag.jpeg");
  coke    = loadImage("coke.png");
  catmelon  = loadImage("catmelon.gif");
  lemons    = loadImage("lemons.png");
  cereal    = loadImage("cereal.png");
}

// setup function: sets up the canvas and creates the slider elements for the sample bezier curve
function setup() {
  createCanvas(canvasWidth, canvasHeight);
  if(showSliders){
    createSliders();
  }
}

function draw() {
  background(220);
  
  // Draw the main background image
  image(ginger, 0, 0, width, height, 0, 0, ginger.width, ginger.height, CONTAIN);

  
  push(); // save the old graphics state, create a new one for this part of the artwork
  // call a function as a callback to clip() to make a clip mask we can put an image inside
  clip(jarOpeningCircle); 
  // put the  image in the clip mask, with positioning and size
  image(cereal, 370, 150, cereal.width/4, cereal.height/4);
  pop();
  
  push(); // save the old graphics state, create a new one for this part of the artwork
  // call a function as a callback to clip() to make a clip mask we can put an image inside  
  clip(bottleShape);
  // put the  image in the clip mask, with positioning and size  
  image(coke, 0, 10, width, height/2, 0,0, coke.width, coke.height, CONTAIN);
  pop();
  

  push(); // save the old graphics state, create a new one for this part of the artwork
  // call a function as a callback to clip() to make a clip mask we can put an image inside    
  clip(fabricRightShape);
  // put the  image in the clip mask, with positioning and size    
  image(shag, 0, 0, width, height, 0, 0, shag.width, shag.height, CONTAIN);
  pop();
  
  push(); // save the old graphics state, create a new one for this part of the artwork
  // call a function as a callback to clip() to make a clip mask we can put an image inside      
  clip(melonCircle);
  // put the  image in the clip mask, with positioning and size      
  image(catmelon, -170, 160, width, height/1.75, 0, 0, catmelon.width, catmelon.height, CONTAIN);  
  pop();
  
  push(); // save the old graphics state, create a new one for this part of the artwork
  // call a function as a callback to clip() to make a clip mask we can put an image inside        
  clip(lemonCircle);
  // put the  image in the clip mask, with positioning and size      
  image(lemons, 386,433, 180, 150);
  pop();  
  
  // show the bezier sliders, if showSliders is true
  if(showSliders){
    bezierTestDraw();
  }
  // show the mouse position
  stroke("black");
  fill("white");
  text(mouseX + ", " + mouseY, 10, 10);
  
}

// create the shape that covers the lemon
function lemonCircle(){
  fill(200,0,0,80);
  ellipse(453,484,60,60);
  ellipse(428,494,20,20);
}

// create the shape that covers the melon
function melonCircle(){
  ellipse(411,390, 175, 175);
}

// create the shape that covers the jar opening
function jarOpeningCircle(){
  ellipse(456,179, 120, 40);
}

// create the shape that covers the bottle
function bottleShape(){
  beginShape();
  fill(200,0,0,100);
  vertex(580,90);
  vertex(605,90);
  vertex(607,100);
  vertex(607,142);
  vertex(627,176);
  vertex(636,277);
  vertex(603,268);
  vertex(569,277);
  vertex(563,188);
  vertex(583,149);
  
  endShape();
  ellipse(595,91,40,20);
  
}

// create the shape that covers the fabric shape around the plants
function fabricRightShape(){
  fill(255,0,0,100);
  beginShape();
  //637, 467, 570, 514, 623, 547, 743, 506
  vertex(637,467);
  bezierVertex(570, 514, 623, 547, 743, 506);
  vertex(717,563);
  bezierVertex( 651, 531, 640, 552, 523, 583);
  bezierVertex(522, 508, 619, 459, 609, 465);
  endShape();
}




// functions for creating the UI sliders and showing the text Bezier curve
function createSliders(){
  
  bx1s = createSlider(0, canvasWidth);
  bx1s.position(10, 10);
  bx1s.size(200);
  
  by1s = createSlider(0, canvasHeight);
  by1s.position(10, 25);
  by1s.size(200);
  
  bc1xs = createSlider(0, canvasWidth);
  bc1xs.position(10, 40);
  bc1xs.size(200);
  
  bc1ys = createSlider(0, canvasHeight);
  bc1ys.position(10, 55);
  bc1ys.size(200);
  
  bc2xs = createSlider(0, canvasWidth);
  bc2xs.position(10, 70);
  bc2xs.size(200);
  
  bc2ys = createSlider(0, canvasHeight);
  bc2ys.position(10, 85);
  bc2ys.size(200);
    
  bx2s = createSlider(0, canvasWidth);
  bx2s.position(10, 100);
  bx2s.size(200);
  
  by2s = createSlider(0, canvasHeight);
  by2s.position(10, 115);
  by2s.size(200);  
  
  bezierText = createInput("bezierText");
  bezierText.style("color:black;");
  bezierText.size(300);
  bezierText.position(10, 130);
 // bezierText.html("bezierText");
  
}


function bezierTestDraw(){
  // make the control point dots, and lines from control points to start and end points
  push();  // push set up a isolated graphics state
  fill("white");
  stroke("black");
  circle( bc1xs.value(), bc1ys.value(),5);
  circle( bc2xs.value(), bc2ys.value(),5);
  stroke("white");
  line(bc1xs.value(), bc1ys.value(), bx1s.value(), by1s.value());
  line(bc1xs.value(), bc1ys.value(), bx2s.value(), by2s.value());
  line(bc2xs.value(), bc2ys.value(), bx1s.value(), by1s.value());
  line(bc2xs.value(), bc2ys.value(), bx2s.value(), by2s.value());
  pop(); // restore old state

  
  // create the Bezier Curve
  
  push(); // store old graphics state
  stroke(255,0,0,100);
  fill(0,0,255,100);
//  console.log(bx1s.value());
  strokeWeight(2);
  bezier(bx1s.value(), by1s.value(), bc1xs.value(), bc1ys.value(), bc2xs.value(), bc2ys.value(), bx2s.value(), by2s.value());
  pop(); // restore old graphics state
  
  // fill out the bezier curve text so people can copy and paste it back into the code.
  bezierText.value(bx1s.value() +", "+ by1s.value() +", "+  bc1xs.value() +", "+  bc1ys.value() +", "+  bc2xs.value() +", "+  bc2ys.value() +", "+  bx2s.value() +", "+  by2s.value()); 
  
}
