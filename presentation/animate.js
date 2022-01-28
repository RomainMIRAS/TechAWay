function first(){
    //gsap.fromTo(".animateSvg", {opacity: 0, scale : 0.8}, {opacity: 1,scale : 1, stagger :0.2});
    gsap.fromTo("#logo", { 
        scale : 6
    }, 
    {
        scale: 1,duration:1.5,stagger:2
    });

    gsap.fromTo("#logo", {
        width: "100vw",height: "100vh"
    },
    {
        width: "200px",height: "200px",duration:1.5, ease: "power3.inOut", 
        onComplete(){
            document.getElementById('logo').style.animation = "hovering 1s infinite alternate";
            gsap.fromTo("#theLogo", {
                x:0,y:0
            },
            {   // 33.5    -35vh
                x: "38%",y:"-33vh",duration:1.5,ease: "power1.inOut"
            });
            gsap.fromTo("#title", {opacity: 0, y : -150,}, {opacity: 1,y : 0});
            gsap.fromTo("#slogan", {opacity: 0, x : -300,}, {opacity: 1,x : 0, stagger :0.2});
            gsap.fromTo("#svg1", {opacity: 0, scale : 0.8}, {opacity: 1,scale : 1, stagger :0.2});
            gsap.fromTo(".animateSvg", {opacity: 0, scale : 0.8}, {opacity: 1,scale : 1, stagger :0.2});
            gsap.fromTo(".animateSvg1", {opacity: 0, scale : 0.8,}, {opacity: 1,scale : 1, stagger :0.2});
            gsap.fromTo(".animateSvg2", {opacity: 0, scale : 0.8,}, {opacity: 1,scale : 1, stagger :0.2});
            gsap.fromTo(".words", {y: -50,opacity:0}, {y:0, opacity:1,duration:2, stagger :0.5,onComplete(){

            }});
        }
    });

}
function scrollPage(){
    let element = document.querySelector("#vid");
    element.scrollIntoView({ behavior: 'smooth', block: 'end',duration:20});
}
// Lien vidéo yt
document.getElementById("path98").onclick=function() {
    window.open("https://www.youtube.com/watch?v=TA_yrPnGzBc",'_blank');
}
