<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Presentation</title>
</head>
<body>
    <div id="theLogo">
        <svg id="logo" viewBox="0 0 436 300.137" >
            <g>
            <path fill="#0036D9" d="M109,108.25H0L0.25,0C109,9.25,109,108.25,109,108.25z"/>
            <path fill="#0036D9" d="M327,107.25c0,0,0-30,0,89s-151,121-176.666,79.332C113.334,240.25,0,196.25,0,196.25v-90L327,107.25z"/>
            <g>
                <path fill="#FAC120" d="M0,108.25v90c0,0,4,91.666,107,101.791c24.668,1.875,43.334-24.459,43.334-24.459s16-96.334-49-68
                    C13,224.25,0,108.25,0,108.25z"/>
                <polygon fill="#FAC120" points="109,150.25 219,150.25 219,259.25 192.668,233.916 150.334,275.582 101.334,207.582 
                    134.668,175.582 		"/>
            </g>
            <path fill="#0036D9" d="M219.127,108.938L109,109.25L109.25,1C218,10.25,219.127,108.938,219.127,108.938z"/>
            <path fill="#0036D9" d="M219.123,108.25h108.754L327.627,0C219.123,9.25,219.123,108.25,219.123,108.25z"/>
            <path fill="#FAC120" d="M436,108.25H327L327.25,0C436,9.25,436,108.25,436,108.25z"/>
            </g>
            <circle id="eye" cx="278" cy="90.25" r="21" onClick="first()"/>
        </svg>
    </div>
    <div id="nav">
        <h1 id="title">
            Tech A Way
        </h1>
        <h3 id="slogan">
            The success way to work away
        </h3>
    </div>
    <main>
        <div id="svg1"><?php include("../Site/view/design/svg/p1 var 1.svg"); ?></div>
        <div><?php include("../Site/view/design/svg/p3.svg"); ?></div>
    </main>
</body>
<script src="gsap.min.js"></script>
<script src="animate.js"></script>
</html>