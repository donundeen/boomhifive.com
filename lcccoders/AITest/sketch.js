/*
You Assignment
Using functions documented here: https://p5js.org/reference/#Shape

Draw your SUPER HERO FACE and INSIGNIA

What's your super hero identity? Make Draw your super hero face and super hero insignia


= Rules = 
- Change the Canvas Size https://p5js.org/reference/p5/createCanvas/ 
- Change the background color to be something other than grey (hint: RGB) https://p5js.org/reference/p5/background/
- You MUST NOT use text to draw your initial, you have to use shapes
- You MAY use text to make parts of your face, but you don't have to.
- You MUST use AT LEAST 3 different shape functions (ideally more!), and one of them has to be arc
- You MUST to use at least 3 different colors
- You MUST ADD something to your face, it can be normal or silly. Eg glasses, hat, fangs, mask, Robot antenna.
- you MUST add COMMENTS explaining what you're doing. eg "// this circle is the head"

= Hints =
- Calling stroke or fill to change a color changes the stroke or fill for every shape that follows,
  until you call stroke or fill again.
- Get used to looking up things in the documentation, instead of asking the teacher
- Get used to trying things out to see what happens, instead of asking the teacher
- Get used to fialing and trying agian and failing and trying again until it finally works!
- If you can't get something to work as expected, 
  try asking a classmate to look at it. 
  Sometimes it just needs fresh eyes.

*/
/*
Canvas size: 
NOTE: the hallway displays we are setting up have the dimensions
width: 1920, Height: 1080
So, always make your canvases that size, 
so it will be easy to show off your work on our screens.
createCanvas(1920, 1080); 

BUT, if you want the canvas to be SMALLER on your computer, you can SCALE the canvasWidth and canvasHeight by some amount, and call the scale(amount) function before you draw anything to the screen.
Then you can use all coordinates as if it's a 1920x1080 screen, 
but it will fit whatever size you need. SO:

createCanvas(canvasWidth * scaleAmount, canvasHeight * scaleAmount); // scale the canvas width and height 
scale(scaleAmount);  // this shrinks down everything that comes after it.

*/

let canvasWidth = 1920;
let canvasHeight = 1080;
let scaleAmount = .5;

function setup() {
  createCanvas(canvasWidth * scaleAmount, canvasHeight * scaleAmount); // scale the canvas width and height 
  scale(scaleAmount);  // this shrinks down everything that comes after it.
  console.log("TMNT starting");
}

function draw() {
  // Set background to dark green (sewer-like) instead of grey
  background(20, 60, 40);
  
  // Draw TMNT face and insignia
  drawTMNTFace();
  drawTMNTInsignia();
}

function drawTMNTFace() {
  // TMNT head (oval shape for turtle head)
  fill(50, 150, 50); // Green turtle skin
  stroke(0);
  strokeWeight(4);
  ellipse(960, 500, 400, 450); // Large turtle head (oval)
  
  // Turtle head texture/scales (small circles for realistic turtle skin)
  fill(40, 130, 40); // Slightly darker green for scales
  noStroke();
  // Top of head scales
  circle(900, 350, 15);
  circle(960, 330, 20);
  circle(1020, 350, 15);
  // Side scales
  circle(850, 450, 12);
  circle(1070, 450, 12);
  circle(870, 500, 10);
  circle(1050, 500, 10);
  
  // TMNT eye mask (red bandana with flowing tie ends)
  fill(200, 0, 0); // Red bandana
  noStroke();
  arc(960, 420, 300, 150, PI, TWO_PI); // Top part of mask
  rect(810, 420, 300, 80); // Bottom part of mask
  
  // Bandana tie ends (flapping in the wind)
  fill(150, 0, 0); // Darker red for tie ends
  noStroke();
  ellipse(780, 500, 40, 80); // Left tie end
  ellipse(1140, 500, 40, 80); // Right tie end
  
  // Eyes (visible through mask holes)
  fill(255, 255, 255); // White eyes
  stroke(0);
  strokeWeight(3);
  circle(880, 400, 35); // Left eye
  circle(1040, 400, 35); // Right eye
  
  // Eye pupils (determined look)
  fill(0, 0, 0); // Black pupils
  noStroke();
  circle(880, 400, 18); // Left pupil
  circle(1040, 400, 18); // Right pupil
  
  // Eye highlights (white dots for realistic eyes)
  fill(255, 255, 255);
  circle(875, 395, 6); // Left highlight
  circle(1035, 395, 6); // Right highlight
  
  // Turtle nose (small triangle with nostrils)
  fill(40, 120, 40); // Darker green for nose
  noStroke();
  triangle(960, 480, 950, 500, 970, 500); // Triangle nose
  // Nostrils
  fill(20, 100, 20);
  circle(955, 490, 4); // Left nostril
  circle(965, 490, 4); // Right nostril
  
  // Turtle mouth (determined expression)
  fill(0, 0, 0); // Black mouth
  noStroke();
  arc(960, 550, 100, 40, 0, PI); // Wide determined mouth
  
  // Turtle teeth (small triangles)
  fill(255, 255, 255); // White teeth
  noStroke();
  triangle(940, 550, 935, 570, 945, 570); // Left tooth
  triangle(980, 550, 975, 570, 985, 570); // Right tooth
  
  // Turtle chin/jawline
  fill(45, 140, 45); // Slightly different green for jaw
  noStroke();
  arc(960, 600, 120, 60, 0, PI); // Chin definition
}

function drawTMNTInsignia() {
  // Draw TMNT insignia in top right corner
  push(); // Save current transformation state
  translate(1400, 200); // Move to top right area
  
  // TMNT head silhouette (large oval)
  fill(30, 100, 30); // Dark green head
  stroke(0);
  strokeWeight(4);
  ellipse(0, 0, 200, 250); // Main head shape
  
  // Head texture/scales
  fill(20, 80, 20); // Darker green scales
  noStroke();
  circle(-30, -40, 8);
  circle(0, -50, 10);
  circle(30, -40, 8);
  circle(-20, -10, 6);
  circle(20, -10, 6);
  
  // Red bandana on head
  fill(200, 0, 0); // Red bandana
  noStroke();
  arc(0, -20, 150, 80, PI, TWO_PI); // Top part of bandana
  rect(-75, -20, 150, 40); // Bottom part of bandana
  
  // Bandana tie ends
  fill(150, 0, 0); // Darker red tie ends
  noStroke();
  ellipse(-60, 0, 20, 40); // Left tie end
  ellipse(60, 0, 20, 40); // Right tie end
  
  // Eyes (white circles)
  fill(255, 255, 255); // White eyes
  stroke(0);
  strokeWeight(2);
  circle(-30, -30, 20); // Left eye
  circle(30, -30, 20); // Right eye
  
  // Eye pupils
  fill(0, 0, 0); // Black pupils
  noStroke();
  circle(-30, -30, 10); // Left pupil
  circle(30, -30, 10); // Right pupil
  
  // Turtle nose
  fill(20, 80, 20); // Dark green nose
  noStroke();
  triangle(0, -10, -5, 5, 5, 5); // Triangle nose
  
  // Turtle mouth
  fill(0, 0, 0); // Black mouth
  noStroke();
  arc(0, 20, 40, 20, 0, PI); // Smile
  
  // Ninja weapons around the head
  fill(100, 100, 100); // Gray weapons
  stroke(0);
  strokeWeight(2);
  // Nunchucks
  line(-100, -60, -80, -40);
  line(-80, -40, -60, -60);
  circle(-100, -60, 6);
  circle(-60, -60, 6);
  
  // Sai (three-pronged weapon)
  line(100, -60, 120, -40);
  line(120, -40, 140, -60);
  line(120, -40, 120, -30);
  
  pop(); // Restore transformation state
}