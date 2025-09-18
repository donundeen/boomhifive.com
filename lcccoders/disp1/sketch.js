// click the > arrow thing just up and to the left from here.
// then click the + sign next to "Sketch Files"
// select "Upload file"
// drag your images into the box that appears
// load 10 images, one for each of the number 0-9 
// something that looks like, or reminds you of, that number, 
// that also represents something you like, are curious or passionate about
// then change the image names below to match the name of the images you uploaded


// HINT: you can download images from the web, 
// or use Command+Shift+4 to capture a selection of your screen and save it to the your desktop
// or use a web app to take a picture w your laptop camera: 
//     eg https://webcamtoy.com/#google_vignette or https://webcamtoy.com/ 

// make sure to DUPLICATE the file before editing 
//     (file->Duplicate and change the name to 00_Image_Clock_LastName_FirstName)

// and remember to SAVE (File->Save or Command+S)

let clockTitle = "Marco's NHL Clock"; // put a title for your clock here

// change the image names below to match the names of the images you upload for each number
let numberImages = [
  "WillSmith0.jpg", // image that looks like a 0
  "HockeyPlayerIndex1.jpg", // image that looks like a1
  "TchachukBrothers2.jpg", // image that looks like a 2
  "BiuimHatTrick3.jpg", // image that looks like a 3
  "MatthewsRookieGame4.jpg", // image that looks like 4
  "5Players.jpg", // image that looks like a 5
  "SheaWeb.jpg", // image that looks like a 6
  "Game7.jpg", // image that looks like a 7
  "ovi.jpg", // image that looks like a 8
  "JTMiller.jpg"  // image that looks like a 9
];


// these settings below you don't need to change, but you can, to see what happens.

// the background color of the clock. Note all the different ways you can define colors.
// try clicking on the colored square...
let backgroundColor = "rgb(162,162,247)";



// coloring the dots in the colons
// top dot in first colon
let dot1fill = "green";
let dot1StrokeWeight = 5;
let dot1Stroke = "red";

// bottom dot in first colon
let dot2fill = "green";
let dot2StrokeWeight = 5;
let dot2Stroke = "red";

// top dot in second colon
let dot3fill = "rgb(241,255,0)";
let dot3StrokeWeight = 5;
let dot3Stroke = "red";

// bottom dot in second colon
let dot4fill = "rgb(241,255,0)";
let dot4StrokeWeight = 5;
let dot4Stroke = "red";

// the width of the colon dot
let dotWidth = 50;
// the spacing between the dot and the numbers
let dotMargin = 5;
// the vertial spacing between the dots
let dotVerticalSpacing = 150;

// style information for the clock title
let textFill = "yellow"; //inside of text
let textStroke = "red"; // outline of text
let textStrokeWeight = "3"; // how thick the outline is
let textX = 20;  // the X position (starting from the left)
let textY = 40;  // the Y position of the BOTTOM of the text, starting from the TOP of the screen
let fontSize = 40;  // the text size

// the height of the clock
// (the width is calculated from the other elements)
//
let canvasHeight = 1080;
// the width of each number 
let imageWidth = 200;
// these are calculated values, you definitely don't want to change them.

// calculate the width of the whole thing based on the imageWidth, the dotWidth, and the margins
let canvasWidth = imageWidth * 6 + (dotWidth+dotMargin ) *2;

canvasWidth = 1920;





// set the vertical positioning of the colon dots. Math!
let upperDotY = (canvasHeight - dotVerticalSpacing + dotWidth) / 2;
let lowerDotY = canvasHeight - upperDotY;

let imgs = [];

// Load the image and create a p5.Image object.
function preload() {
  console.log("preload", numberImages);
  for(let i = 0; i < numberImages.length; i++){
    console.log("loading", numberImages[i]);
    imgs[i] = loadImage(numberImages[i]);
  }
}


function setup() {
  // this part runs once, and sets up the screen, aka the "CANVAS" that we're doing to draw onto
  createCanvas(canvasWidth, canvasHeight);
}

function draw() {
  // fill the whole backgroun with backgroundColor
  background(backgroundColor);
  stroke(255,0,0);
  strokeWeight(10);
  rect(0,0,canvasWidth,canvasHeight);
  line(0,0,canvasWidth,canvasHeight);
  line(0,canvasHeight,canvasWidth,0);
  return;
  // set up some variables that will hold each digit of the hour, minutes, and seconds
  let h0, h1, m0, m1, s0, s1;
  // these variables hold the images themselves
  let h0img, h1img, m0img, m1img, s0img, s1img;
  
  // figure out all the digits of the time and assign them to those variables
  let h = hour();  // this is by default 24 hour time. How could you change it to 12 hour time? (hint: use Modulo!)
  let m = minute();
  let s = second();
  h0 = floor(h / 10); // divide a number by 10 and round DOWN with floor()
  h1 = h % 10;
  m0 = floor(m / 10);
  m1 = m % 10;
  s0 = floor(s / 10);
  s1 = s % 10;
  
  console.log(h0,h1,m0,m1,s0,s1);
  
  h0img = imgs[h0];
  h1img = imgs[h1];
  m0img = imgs[m0];
  m1img = imgs[m1];
  s0img = imgs[s0];
  s1img = imgs[s1];
  
  h0img.resize(200,0);
  h1img.resize(200,0);
  m0img.resize(200,0);
  m1img.resize(200,0);
  s0img.resize(200,0);
  s1img.resize(200,0);
  
  let imageX = 0;
  
  
  // show the hour images
  image(h0img, imageX,   (canvasHeight - h0img.height)/2);
  imageX += imageWidth; // add the width to get the next image X position
  image(h1img, imageX, (canvasHeight - h1img.height)/2);

  imageX += imageWidth + dotMargin; // add the width to get the next colon X position
  
  // show the colon dots
  fill(dot2fill);
  stroke(dot3Stroke);
  strokeWeight(dot2StrokeWeight);
  circle(imageX + dotWidth / 2, lowerDotY, dotWidth);
  circle(imageX + dotWidth / 2, upperDotY, dotWidth);
  
  imageX += dotWidth + dotMargin; // add the width to get the next image X position
  
  
  // show the minute images
  image(m0img, imageX, (canvasHeight - m0img.height)/2);
  imageX += imageWidth;  // add the width to get the next image X position
  image(m1img, imageX, (canvasHeight - m1img.height)/2);
  
  
  // show the colons
  imageX += imageWidth + dotMargin ; // add the width to get the next colon X position
  fill(dot3fill);
  stroke(dot3Stroke);
  strokeWeight(dot3StrokeWeight);
  circle(imageX + dotWidth / 2, 150, dotWidth);
  
  fill(dot4fill);
  stroke(dot4Stroke);
  strokeWeight(dot4StrokeWeight);
  circle(imageX + dotWidth / 2, 250, dotWidth);
  
  imageX += dotWidth + dotMargin; // add the width to get the next image X position
  
  // show the second images
  image(s0img, imageX, (canvasHeight - s0img.height)/2);
  imageX += imageWidth; // add the width to get the next image X position
  image(s1img, imageX,(canvasHeight - s1img.height)/2);
  
  fill(textFill);
  stroke(textStroke);
  strokeWeight(textStrokeWeight);
  textSize(fontSize);
  text(clockTitle, textX, textY);
    
}




// If the mouse is pressed,
// toggle full-screen mode.
function mousePressed() {
  if (mouseX > 0 && mouseX < width && mouseY > 0 && mouseY < height) {
    let fs = fullscreen();
    fullscreen(!fs);
  }
}